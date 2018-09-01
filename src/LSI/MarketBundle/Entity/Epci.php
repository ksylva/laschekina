<?php

namespace LSI\MarketBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Epci
 *
 * @ORM\Table(name="epci")
 * @ORM\Entity(repositoryClass="LSI\MarketBundle\Repository\EpciRepository")
 * @UniqueEntity("nom")
 */
class Epci
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
     * @ORM\Column(name="nom", type="string", length=50, unique=true)
     * @Assert\Length(
     *     min = 5,
     *     max = 50,
     *     minMessage = "Le nom doit comporter au moins {{ limit }} caractères.",
     *     maxMessage = "Le nom ne doit pas comporter plus de {{ limit }} caractères."
     * )
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=100)
     * @Assert\Length(
     *     min = 10,
     *     max = 100,
     *     minMessage = "La description doit comporter au moins {{ limit }} caractères.",
     *     maxMessage = "La description ne doit pas comporter plus de {{ limit }} caractères."
     * )
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity="LSI\MarketBundle\Entity\CodePostal", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $codePostal;



    /**
     * @var datetime
     * @ORM\Column(name="date_creation", type="datetime")
     */
    private $dateCreation;

    public function __construct(){
        $this->dateCreation = new \Datetime();
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
     * Set nom
     *
     * @param string $nom
     *
     * @return Epci
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Epci
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
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return Epci
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    

    /**
     * Add codePostal
     *
     * @param \LSI\MarketBundle\Entity\CodePostal $codePostal
     *
     * @return Epci
     */
    public function addCodePostal(\LSI\MarketBundle\Entity\CodePostal $codePostal)
    {
        $this->codePostal[] = $codePostal;

        return $this;
    }

    /**
     * Remove codePostal
     *
     * @param \LSI\MarketBundle\Entity\CodePostal $codePostal
     */
    public function removeCodePostal(\LSI\MarketBundle\Entity\CodePostal $codePostal)
    {
        $this->codePostal->removeElement($codePostal);
    }

    /**
     * Get codePostal
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }
}
