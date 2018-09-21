<?php

namespace LSI\MarketBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
<<<<<<< HEAD
use FOS\MessageBundle\Entity\Message as BaseMessage;
=======
//use FOS\MessageBundle\Entity\Message as BaseMessage;
>>>>>>> master

/**
 * Message
 *
 * @ORM\Table(name="message")
 * @ORM\Entity(repositoryClass="LSI\MarketBundle\Repository\MessageRepository")
 */
<<<<<<< HEAD
class Message 
=======
class Message //extends BaseMessage
>>>>>>> master
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="sujet", type="string", length=50)
     */
    private $sujet;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text")
     */
    /*private $contenu;*/

    /**
     * @var string
     *
     * @ORM\Column(name="dest", type="string", length=50)
     */
    private $dest;

    /**
     * @var string
     *
     * @ORM\Column(name="dest", type="string", length=50)
     */
    private $dest;

    /**
     * @var datetime
     * @ORM\Column(name="date_ajout", type="datetime")
     */
    private $dateAjout;

    /**
     * @ORM\ManyToOne(targetEntity="LSI\MarketBundle\Entity\Administre")
     *@ORM\JoinColumn(nullable=true)
     */
    private $administre;

    /**
     * @ORM\ManyToOne(targetEntity="LSI\MarketBundle\Entity\Mairie")
     * @ORM\JoinColumn(nullable=true)
     */
    private $mairie;


    public function __construct(){
        $this->dateAjout = new \DateTime();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Set administre
     *
     * @param \LSI\MarketBundle\Entity\Administre $administre
     *
     * @return Message
     */
    public function setAdministre(\LSI\MarketBundle\Entity\Administre $administre)
    {
        $this->administre = $administre;

        return $this;
    }

    /**
     * Get administre
     *
     * @return \LSI\MarketBundle\Entity\Administre
     */
    public function getAdministre()
    {
        return $this->administre;
    }

    /**
     * Set mairie
     *
     * @param \LSI\MarketBundle\Entity\Mairie $mairie
     *
     * @return Message
     */
    public function setMairie(\LSI\MarketBundle\Entity\Mairie $mairie)
    {
        $this->mairie = $mairie;

        return $this;
    }

    /**
     * Get mairie
     *
     * @return \LSI\MarketBundle\Entity\Mairie
     */
    public function getMairie()
    {
        return $this->mairie;
    }

    /**
     * Set sujet
     *
     * @param string $sujet
     *
     * @return Message
     */
    public function setSujet($sujet)
    {
        $this->sujet = $sujet;

        return $this;
    }

    /**
     * Get sujet
     *
     * @return string
     */
    public function getSujet()
    {
        return $this->sujet;
    }

    /**
     * @ORM\ManyToOne(
     *   targetEntity="LSI\MarketBundle\Entity\Thread",
     *   inversedBy="messages"
     * )
     * @var \FOS\MessageBundle\Model\ThreadInterface
     *
    protected $thread;*/

    /**
     * @ORM\ManyToOne(targetEntity="LSI\MarketBundle\Entity\User")
     * @var \FOS\MessageBundle\Model\ParticipantInterface
     *
    protected $sender;*/

    /**
     * @ORM\OneToMany(
     *   targetEntity="LSI\MarketBundle\Entity\MessageMetadata",
     *   mappedBy="message",
     *   cascade={"all"}
     * )
     * @var MessageMetadata[]|Collection
     *
    protected $metadata;*/




    /**
     * Set dateAjout
     *
     * @param \DateTime $dateAjout
     *
     * @return Message
     */
    public function setDateAjout($dateAjout)
    {
        $this->dateAjout = $dateAjout;

        return $this;
    }

    /**
     * Get dateAjout
     *
     * @return \DateTime
     */
    public function getDateAjout()
    {
        return $this->dateAjout;
    }

    /**
<<<<<<< HEAD
     * Set dest
     *
     * @param string $dest
     *
     * @return Message
     */
    public function setDest($dest)
    {
        $this->dest = $dest;

        return $this;
    }

    /**
     * Get dest
     *
     * @return string
     */
    public function getDest()
    {
        return $this->dest;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     *
     * @return Message
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
=======
     * Add metadatum
     *
     * @param \LSI\MarketBundle\Entity\MessageMetadata $metadatum
     *
     * @return Message
     *
    public function addMetadatum(\LSI\MarketBundle\Entity\MessageMetadata $metadatum)
    {
        $this->metadata[] = $metadatum;

        return $this;
    }*/

    /**
     * Remove metadatum
     *
     * @param \LSI\MarketBundle\Entity\MessageMetadata $metadatum
     *
    public function removeMetadatum(\LSI\MarketBundle\Entity\MessageMetadata $metadatum)
    {
        $this->metadata->removeElement($metadatum);
    }*/

    /**
     * Get metadata
     *
     * @return \Doctrine\Common\Collections\Collection
     *
    public function getMetadata()
    {
        return $this->metadata;
    }*/

    /**
     * Set dest
     *
     * @param string $dest
     *
     * @return Message
     */
    public function setDest($dest)
    {
        $this->dest = $dest;
>>>>>>> master

        return $this;
    }

    /**
<<<<<<< HEAD
     * Get contenu
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
=======
     * Get dest
     *
     * @return string
     */
    public function getDest()
    {
        return $this->dest;
>>>>>>> master
    }
}
