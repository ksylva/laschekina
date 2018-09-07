<?php

namespace LSI\MarketBundle\Email;


use LSI\MarketBundle\Entity\Annonce;
use LSI\MarketBundle\Entity\User;
use Symfony\Component\Templating\EngineInterface;

class EnvoyerMail {

    /**
     * @var \Swift_Mailer
     */
    private $mailer;
    // Modèle du mail
    private $template;
    // Expéditeur
    private $from;
    // Nom auteur mail
    private $name = 'Civilink';


    public function __construct(\Swift_Mailer $mailer, $sender, EngineInterface $template) {
        $this->mailer = $mailer;
        $this->from = $sender;
        $this->template = $template;
    }

    public function sendMail($to, $subject, $body){
        $message = \Swift_Message::newInstance()
            ->setFrom($this->from, $this->name)
            ->setTo($to)
            ->setSubject($subject)
            ->setBody($body)
            ->setContentType('text/html')
        ;

        $this->mailer->send($message);
    }

    public function sendNewMessageToCumtomer(User $user, Annonce $annonce){
        $message = new \Swift_Message(
            'Nouvelle réservation',
            'Vous avez effectué une réservation sur l\'annonces '.$annonce->getTitre()
        );

        $message
            ->addTo($user->getEmail());
        $this->mailer->send($message);
    }

    public function sendNewMessageToSeller($email, Annonce $annonce){
        $message = new \Swift_Message(
            'Vous avez reçu une nouvelle demande de réservation',
                    ' Vous avez reçu une réservation sur votre annonce : '.$annonce->getTitre()
        );

        $message
            ->addTo($email);
        $this->mailer->send($message);
    }
}