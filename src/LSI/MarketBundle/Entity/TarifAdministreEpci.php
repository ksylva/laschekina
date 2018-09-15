<?php

namespace LSI\MarketBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TarifAdministreEpci
 *
 * @ORM\Table(name="tarif_administre_epci")
 * @ORM\Entity(repositoryClass="LSI\MarketBundle\Repository\TarifAdministreEpciRepository")
 */
class TarifAdministreEpci
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
     * @ORM\Column(name="prix", type="integer")
     */
    private $prix;

    /**
     * @ORM\OneToOne(targetEntity="LSI\MarketBundle\Entity\Annonce", inversedBy="tarifAdminisEpci")
     * @ORM\JoinColumn(name="annonce_id", referencedColumnName="id")
     */
    private $adminisepci;


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
     * @return TarifAdministreEpci
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

