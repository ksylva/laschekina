<?php

namespace LSI\MarketBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TarifNonEpci
 *
 * @ORM\Table(name="tarif_non_epci")
 * @ORM\Entity(repositoryClass="LSI\MarketBundle\Repository\TarifNonEpciRepository")
 */
class TarifNonEpci
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
     * @var int
     *
     * @ORM\Column(name="prix", type="integer", nullable=true)
     */
    private $prix;

    /**
     * @ORM\OneToOne(targetEntity="LSI\MarketBundle\Entity\Annonce", inversedBy="tarifNonEpci")
     * @ORM\JoinColumn(name="annonce_id", referencedColumnName="id")
     */
    private $nonAdminis;



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
     * Set prix
     *
     * @param integer $prix
     *
     * @return TarifNonEpci
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return int
     */
    public function getPrix()
    {
        return $this->prix;
    }
}

