<?php

namespace LSI\MarketBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Calendrier
 *
 * @ORM\Table(name="calendrier")
 * @ORM\Entity(repositoryClass="LSI\MarketBundle\Repository\CalendrierRepository")
 */
class Calendrier
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
     * @var \Date
     *
     * @ORM\Column(name="debut", type="date")
     */
    private $debut;

    /**
     * @var \Date
     *
     * @ORM\Column(name="fin", type="date")
     */
    private $fin;

    /**
     * @ORM\ManyToOne(targetEntity="LSI\MarketBundle\Entity\Statut", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $statut;

    /**
     * @ORM\ManyToOne(targetEntity="LSI\MarketBundle\Entity\Annonce", inversedBy="calendrier")
     * @ORM\JoinColumn(name="annonce_id",referencedColumnName="id", nullable=false)
     */
    private $annonce;

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
     * Set debut
     *
     * @param \Date $debut
     *
     * @return Calendrier
     */
    public function setDebut($debut)
    {
        $this->debut = $debut;

        return $this;
    }

    /**
     * Get debut
     *
     * @return \Date
     */
    public function getDebut()
    {
        return $this->debut;
    }

    /**
     * Set fin
     *
     * @param \Date $fin
     *
     * @return Calendrier
     */
    public function setFin($fin)
    {
        $this->fin = $fin;

        return $this;
    }

    /**
     * Get fin
     *
     * @return \Date
     */
    public function getFin()
    {
        return $this->fin;
    }

    /**
     * Set statut
     *
     * @param \LSI\MarketBundle\Entity\Statut $statut
     *
     * @return Calendrier
     */
    public function setStatut(\LSI\MarketBundle\Entity\Statut $statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return \LSI\MarketBundle\Entity\Statut
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set annonce
     *
     * @param \LSI\MarketBundle\Entity\Annonce $annonce
     *
     * @return Calendrier
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
}
