<?php

namespace LSI\MarketBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reduction
 *
 * @ORM\Table(name="reduction")
 * @ORM\Entity(repositoryClass="LSI\MarketBundle\Repository\ReductionRepository")
 */
class Reduction
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
     * @var integer
     *
     * @ORM\Column(name="taux", type="integer")
     */
    private $taux;

    /**
     * @var integer
     *
     * @ORM\Column(name="seuil", type="integer")
     */
    private $seuil;

    /**
     * @ORM\ManyToOne(targetEntity="LSI\MarketBundle\Entity\Annonce", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $annonce;

    /**
     * @var datetime
     * @ORM\Column(name="date_ajout", type="datetime")
     */
    private $dateAjout;

    /**
     * @ORM\Column(name="publie", type="boolean")
     */
    private $publie = true;

    /**
     * @var datetime
     * @ORM\Column(name="update_at", type="datetime", nullable=true)
     */
    private $updateAt;

    public function __construct(){
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
     * Set annonce
     *
     * @param \LSI\MarketBundle\Entity\Annonce $annonce
     *
     * @return Reduction
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
     * Set taux
     *
     * @param integer $taux
     *
     * @return Reduction
     */
    public function setTaux($taux)
    {
        $this->taux = $taux;

        return $this;
    }

    /**
     * Get taux
     *
     * @return integer
     */
    public function getTaux()
    {
        return $this->taux;
    }

    /**
     * Set seuil
     *
     * @param integer $seuil
     *
     * @return Reduction
     */
    public function setSeuil($seuil)
    {
        $this->seuil = $seuil;

        return $this;
    }

    /**
     * Get seuil
     *
     * @return integer
     */
    public function getSeuil()
    {
        return $this->seuil;
    }

    /**
     * Set dateAjout
     *
     * @param \DateTime $dateAjout
     *
     * @return Reduction
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
     * Set publie
     *
     * @param boolean $publie
     *
     * @return Reduction
     */
    public function setPublie($publie)
    {
        $this->publie = $publie;

        return $this;
    }

    /**
     * Get publie
     *
     * @return boolean
     */
    public function getPublie()
    {
        return $this->publie;
    }

    /**
     * Set updateAt
     *
     * @param \DateTime $updateAt
     *
     * @return Reduction
     */
    public function setUpdateAt($updateAt)
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    /**
     * Get updateAt
     *
     * @return \DateTime
     */
    public function getUpdateAt()
    {
        return $this->updateAt;
    }
}
