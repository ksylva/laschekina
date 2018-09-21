<?php

namespace LSI\MarketBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TarifNonAdministre
 *
 * @ORM\Table(name="tarif_non_administre")
 * @ORM\Entity(repositoryClass="LSI\MarketBundle\Repository\TarifNonAdministreRepository")
 */
class TarifNonAdministre
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
     * @ORM\OneToOne(targetEntity="LSI\MarketBundle\Entity\Annonce", inversedBy="tarifNonAdmins")
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
     * @return TarifNonAdministre
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

