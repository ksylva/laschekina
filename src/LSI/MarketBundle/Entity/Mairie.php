<?php

namespace LSI\MarketBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="mairie")
 * @ORM\Entity(repositoryClass="LSI\MarketBundle\Repository\MairieRepository")
 *
 */
class Mairie
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
     * @ORM\Column(name="description", type="text")
     *
     */
    private $description;

    /**
     * @var string
     * @ORM\Column(name="service", type="text")
     *
     */
    private $service;

    /**
     * @var float
     * @ORM\Column(name="longitude", type="float", nullable=true)
     */
    private $longitude;

    /**
     * @var float
     * @ORM\Column(name="latitude", type="float", nullable=true)
     */
    private $latitude;

    /**
     * @ORM\ManyToOne(targetEntity="LSI\MarketBundle\Entity\Epci")
     * @ORM\JoinColumn(nullable=true)
     */
    private $epci;

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
     * Set description
     *
     * @param string $description
     *
     * @return Mairie
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set service
     *
     * @param string $service
     *
     * @return Mairie
     */
    public function setService($service)
    {
        $this->service = $service;

        return $this;
    }

    /**
     * Get service
     *
     * @return string
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     *
     * @return Mairie
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set latitude
     *
     * @param float $latitude
     *
     * @return Mairie
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set epci
     *
     * @param \LSI\MarketBundle\Entity\Epci $epci
     *
     * @return Mairie
     */
    public function setEpci(\LSI\MarketBundle\Entity\Epci $epci = null)
    {
        $this->epci = $epci;

        return $this;
    }

    /**
     * Get epci
     *
     * @return \LSI\MarketBundle\Entity\Epci
     */
    public function getEpci()
    {
        return $this->epci;
    }
}
