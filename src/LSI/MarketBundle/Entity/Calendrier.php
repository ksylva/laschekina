<?php

namespace LSI\MarketBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/* use Symfony\Component\Validator\Constraints\Date; */

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
     * @ORM\Column(name="debut", type="date")
     */
    private $debut;

    /**
     * @ORM\Column(name="fin", type="date")
     */
    private $fin;

    /**
     * @ORM\ManyToOne(targetEntity="LSI\MarketBundle\Entity\Statut", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $statut;

    /**
     * @ORM\ManyToMany(targetEntity="LSI\MarketBundle\Entity\Annonce", inversedBy="calendrier", cascade={"persist"})
     * @ORM\JoinColumn(name="annonce_id", referencedColumnName="id", nullable=false)
     *
    private $annonce;*/

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

    /**
     * Set debut
     *
     * @param \DateTime $debut
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
     * @return \DateTime
     */
    public function getDebut()
    {
        return $this->debut;
    }
}
