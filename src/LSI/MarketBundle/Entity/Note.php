<?php

namespace LSI\MarketBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Note
 *
 * @ORM\Table(name="note")
 * @ORM\Entity(repositoryClass="LSI\MarketBundle\Repository\NoteRepository")
 */
class Note
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var datetime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $dateNote;

    /**
     * @var integer
     *
     * @ORM\Column(name="note", type="integer")
     */
    private $note;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="text")
     */
    private $commentaire;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255)
     *
    private $photo;*/

    /**
     * @ORM\ManyToOne(targetEntity="LSI\MarketBundle\Entity\Annonce")
     * @ORM\JoinColumn(nullable=false)
     */
    private $annonce;

    /**
     * @ORM\ManyToOne(targetEntity="LSI\MarketBundle\Entity\Administre")
     *@ORM\JoinColumn(nullable=false)
     */
    private $administre;

    /**
     * @ORM\ManyToOne(targetEntity="LSI\MarketBundle\Entity\Mairie")
     * @ORM\JoinColumn(nullable=false)
     */
    private $mairie;

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
     * Set dateNote
     *
     * @param \DateTime $dateNote
     *
     * @return Note
     */
    public function setDateNote($dateNote)
    {
        $this->dateNote = $dateNote;

        return $this;
    }

    /**
     * Get dateNote
     *
     * @return \DateTime
     */
    public function getDateNote()
    {
        return $this->dateNote;
    }

    /**
     * Set note
     *
     * @param integer $note
     *
     * @return Note
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return integer
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return Note
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set annonce
     *
     * @param \LSI\MarketBundle\Entity\Annonce $annonce
     *
     * @return Note
     */
    public function setAnnonce(\LSI\MarketBundle\Entity\Annonce $annonce)
    {
        $this->annonce = $annonce;

        return $this;
    }

    /**
     * Get annonce
     *
     * @return \LSI\MarketBundle\Entity\Annonce
     */
    public function getAnnonce()
    {
        return $this->annonce;
    }

    /**
     * Set administre
     *
     * @param \LSI\MarketBundle\Entity\Administre $administre
     *
     * @return Note
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
     * @return Note
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
}
