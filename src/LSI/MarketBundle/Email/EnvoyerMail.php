<?php

namespace LSI\MarketBundle\Email;


use LSI\MarketBundle\Entity\Annonce;
use LSI\MarketBundle\Entity\User;

class EnvoyerMail {

    /**
     * @var \Swift_Mailer
     */
    private $mailer;

    public function __construct(\Swift_Mailer $mailer) {
        $this->mailer = $mailer;
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
            'Nouvelle réservation',
            'Vous avez reçu une réservation sur votre annonce : '.$annonce->getTitre()
        );

        $message
            ->addTo($email);
        $this->mailer->send($message);
    }
}