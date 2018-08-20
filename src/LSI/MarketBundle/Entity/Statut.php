<?php

namespace LSI\MarketBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Statut
 *
 * @ORM\Table(name="statut")
 * @ORM\Entity(repositoryClass="LSI\MarketBundle\Repository\StatutRepository")
 */
class Statut
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
     * @ORM\Column(name="libelle", type="string", length=50)
     */
    private $libelle;

    /**
     * @ORM\OneToOne(targetEntity="LSI\MarketBundle\Entity\Calendrier", inversedBy="statut")
     * @ORM\JoinColumn(nullable=false)
     */
    private $calendrier;

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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Statut
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }


    /**
     * Set calendrier
     *
     * @param \LSI\MarketBundle\Entity\Calendrier $calendrier
     *
     * @return Statut
     */
    public function setCalendrier(\LSI\MarketBundle\Entity\Calendrier $calendrier)
    {
        $this->calendrier = $calendrier;

        return $this;
    }

    /**
     * Get calendrier
     *
     * @return \LSI\MarketBundle\Entity\Calendrier
     */
    public function getCalendrier()
    {
        return $this->calendrier;
    }
}
