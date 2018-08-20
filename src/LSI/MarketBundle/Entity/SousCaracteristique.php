<?php

namespace LSI\MarketBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SousCaracteristique
 *
 * @ORM\Table(name="sous_caracteristique")
 * @ORM\Entity(repositoryClass="LSI\MarketBundle\Repository\SousCaracteristiqueRepository")
 */
class SousCaracteristique
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
     * @var string
     *
     * @ORM\Column(name="nom_groupe", type="string", length=50)
     */
    private $nomGroupe;

    /**
     * @var int
     *
     * @ORM\Column(name="position", type="integer")
     */
    private $position;

    /**
     * @ORM\ManyToOne(targetEntity="LSI\MarketBundle\Entity\Caracteristique")
     * @ORM\JoinColumn(nullable=false)
     */
    private $caracteristique;

    /**
     * @ORM\Column(name="date_ajout", type="datetime")
     */
    private $dateAjout;

    /**
     * @ORM\Column(name="date_modif", type="datetime", nullable=true)
     */
    private $dateModif;

    public function __construct() {
        $this->dateAjout = new \Datetime();
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
     * Set nomGroupe
     *
     * @param string $nomGroupe
     *
     * @return SousCaracteristique
     */
    public function setNomGroupe($nomGroupe)
    {
        $this->nomGroupe = $nomGroupe;

        return $this;
    }

    /**
     * Get nomGroupe
     *
     * @return string
     */
    public function getNomGroupe()
    {
        return $this->nomGroupe;
    }


    /**
     * Set caracteristique
     *
     * @param \LSI\MarketBundle\Entity\Caracteristique $caracteristique
     *
     * @return SousCaracteristique
     */
    public function setCaracteristique(\LSI\MarketBundle\Entity\Caracteristique $caracteristique)
    {
        $this->caracteristique = $caracteristique;

        return $this;
    }

    /**
     * Get caracteristique
     *
     * @return \LSI\MarketBundle\Entity\Caracteristique
     */
    public function getCaracteristique()
    {
        return $this->caracteristique;
    }

    /**
     * Set position
     *
     * @param integer $position
     *
     * @return SousCaracteristique
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set dateAjout
     *
     * @param \DateTime $dateAjout
     *
     * @return SousCaracteristique
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
     * Set dateModif
     *
     * @param \DateTime $dateModif
     *
     * @return SousCaracteristique
     */
    public function setDateModif($dateModif)
    {
        $this->dateModif = $dateModif;

        return $this;
    }

    /**
     * Get dateModif
     *
     * @return \DateTime
     */
    public function getDateModif()
    {
        return $this->dateModif;
    }
}
