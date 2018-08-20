<?php

namespace LSI\MarketBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Parametre
 *
 * @ORM\Table(name="parametre")
 * @ORM\Entity(repositoryClass="LSI\MarketBundle\Repository\ParametreRepository")
 */
class Parametre
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
     * @ORM\Column(name="uniteDeTemps", type="integer")
     */
    private $uniteDeTemps;

    /**
     * @var int
     *
     * @ORM\Column(name="dureeMinPrestation", type="integer")
     */
    private $dureeMinPrestation;

    /**
     * @var int
     *
     * @ORM\Column(name="prixMinAnnonce", type="integer")
     */
    private $prixMinAnnonce;

    /**
     * @var int
     *
     * @ORM\Column(name="dureeMinReservation", type="integer")
     */
    private $dureeMinReservation;

    /**
     * @var int
     *
     * @ORM\Column(name="dureeMaxReservation", type="integer")
     */
    private $dureeMaxReservation;

    /**
     * @var int
     *
     * @ORM\Column(name="delaiMinDemandeReservationDebutPrestation", type="integer")
     */
    private $delaiMinDemandeReservationDebutPrestation;

    /**
     * @var int
     *
     * @ORM\Column(name="nbreMaxPhotoAnnonce", type="integer")
     */
    private $nbreMaxPhotoAnnonce;


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
     * Set uniteDeTemps
     *
     * @param integer $uniteDeTemps
     *
     * @return Parametre
     */
    public function setUniteDeTemps($uniteDeTemps)
    {
        $this->uniteDeTemps = $uniteDeTemps;

        return $this;
    }

    /**
     * Get uniteDeTemps
     *
     * @return int
     */
    public function getUniteDeTemps()
    {
        return $this->uniteDeTemps;
    }

    /**
     * Set dureeMinPrestation
     *
     * @param integer $dureeMinPrestation
     *
     * @return Parametre
     */
    public function setDureeMinPrestation($dureeMinPrestation)
    {
        $this->dureeMinPrestation = $dureeMinPrestation;

        return $this;
    }

    /**
     * Get dureeMinPrestation
     *
     * @return int
     */
    public function getDureeMinPrestation()
    {
        return $this->dureeMinPrestation;
    }

    /**
     * Set prixMinAnnonce
     *
     * @param integer $prixMinAnnonce
     *
     * @return Parametre
     */
    public function setPrixMinAnnonce($prixMinAnnonce)
    {
        $this->prixMinAnnonce = $prixMinAnnonce;

        return $this;
    }

    /**
     * Get prixMinAnnonce
     *
     * @return int
     */
    public function getPrixMinAnnonce()
    {
        return $this->prixMinAnnonce;
    }

    /**
     * Set dureeMinReservation
     *
     * @param integer $dureeMinReservation
     *
     * @return Parametre
     */
    public function setDureeMinReservation($dureeMinReservation)
    {
        $this->dureeMinReservation = $dureeMinReservation;

        return $this;
    }

    /**
     * Get dureeMinReservation
     *
     * @return int
     */
    public function getDureeMinReservation()
    {
        return $this->dureeMinReservation;
    }

    /**
     * Set dureeMaxReservation
     *
     * @param integer $dureeMaxReservation
     *
     * @return Parametre
     */
    public function setDureeMaxReservation($dureeMaxReservation)
    {
        $this->dureeMaxReservation = $dureeMaxReservation;

        return $this;
    }

    /**
     * Get dureeMaxReservation
     *
     * @return int
     */
    public function getDureeMaxReservation()
    {
        return $this->dureeMaxReservation;
    }

    /**
     * Set delaiMinDemandeReservationDebutPrestation
     *
     * @param integer $delaiMinDemandeReservationDebutPrestation
     *
     * @return Parametre
     */
    public function setDelaiMinDemandeReservationDebutPrestation($delaiMinDemandeReservationDebutPrestation)
    {
        $this->delaiMinDemandeReservationDebutPrestation = $delaiMinDemandeReservationDebutPrestation;

        return $this;
    }

    /**
     * Get delaiMinDemandeReservationDebutPrestation
     *
     * @return int
     */
    public function getDelaiMinDemandeReservationDebutPrestation()
    {
        return $this->delaiMinDemandeReservationDebutPrestation;
    }

    /**
     * Set nbreMaxPhotoAnnonce
     *
     * @param integer $nbreMaxPhotoAnnonce
     *
     * @return Parametre
     */
    public function setNbreMaxPhotoAnnonce($nbreMaxPhotoAnnonce)
    {
        $this->nbreMaxPhotoAnnonce = $nbreMaxPhotoAnnonce;

        return $this;
    }

    /**
     * Get nbreMaxPhotoAnnonce
     *
     * @return int
     */
    public function getNbreMaxPhotoAnnonce()
    {
        return $this->nbreMaxPhotoAnnonce;
    }
}

