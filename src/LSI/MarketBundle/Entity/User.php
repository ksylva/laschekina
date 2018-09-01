<?php

namespace LSI\MarketBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping\AttributeOverride;

/**
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="LSI\MarketBundle\Repository\UserRepository")
 *
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="LSI\MarketBundle\Entity\Mairie", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    protected $mairie;

    /**
     * @ORM\ManyToOne(targetEntity="LSI\MarketBundle\Entity\Administre", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    protected $administre;

    /**
     * @var string
     * 
     * @ORM\Column(name="nom", type="string", length=50, nullable=true)
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min = 5,
     *     max = 15,
     *     minMessage = "Le nom doit comporter au moins {{ limit }} caractères",
     *     maxMessage = "Le nom ne doit pas comporter plus de {{ limit }} caractères"
     * )
     */
    protected $nom;

    /**
     * @var \DateTime
     * 
     * @ORM\Column(name="date_inscription", type="datetime")
     */
    protected $dateInscription;

    /**
     * @var integer
     *
     * @ORM\Column(name="indicatif", type="string", length=4, nullable=true)
     * @Assert\NotBlank()
     * @Assert\Regex(
     *     pattern = "/^[\d]*$/",
     *     match = true,
     *     message = "L'indicatif est invalide"
     * )
     * @Assert\Length(
     *     min = 1,
     *     max = 4,
     *     minMessage =" L'indicatif doit comporter {{ limmit }} caractères",
     *     maxMessage = "L'indicatif ne doit pas comporter plus de {{ limit }} caractères"
     * )
     */
    protected $indicatif;

    /**
     * @var \DateTime
     * @ORM\Column(name="date_modif", type="datetime", nullable=true)
     * @Assert\IdenticalTo("today")
     */
    protected $dateModif;

    /**
     * @var string
     * @ORM\Column(name="langue", type="string", length=3, nullable=true)
     * @Assert\NotBlank()
     */
    protected $langue;

    /**
     * @var string
     * @ORM\Column(name="telephone", type="string", length=15, nullable=true)
     * @Assert\NotBlank()
     * @Assert\Regex(
     *     pattern = "/^[\d]*$/",
     *     match = true,
     *     message = "Le numéro est invalide"
     * )
     * @Assert\Length(
     *     min = 8,
     *     max = 15,
     *     minMessage =" Le numéro doit comporter {{ limmit }} caractères",
     *     maxMessage = "Le numéro ne doit pas comporter plus de {{ limit }} caractères"
     * )
     */
    protected $telephone;

    /**
     * @var string
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="LSI\MarketBundle\Entity\Adresse", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    protected $adresse;

    /**
     * @var array
     */
    protected $roles;

    public function __construct()
    {
        parent::__construct();
        $this->dateInscription = new \Datetime();
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
     * Set dateInscription
     *
     * @param \DateTime $dateInscription
     *
     * @return User
     */
    public function setDateInscription($dateInscription)
    {
        $this->dateInscription = $dateInscription;

        return $this;
    }

    /**
     * Get dateInscription
     *
     * @return \DateTime
     */
    public function getDateInscription()
    {
        return $this->dateInscription;
    }

    /**
     * Set indicatif
     *
     * @param integer $indicatif
     *
     * @return User
     */
    public function setIndicatif($indicatif)
    {
        $this->indicatif = $indicatif;

        return $this;
    }

    /**
     * Get indicatif
     *
     * @return int
     */
    public function getIndicatif()
    {
        return $this->indicatif;
    }

    /**
     * Set dateModif
     *
     * @param \DateTime $dateModif
     *
     * @return User
     */
    public function setDateModif($dateModif)
    {
        $this->dateModif = $dateModif;

        return $this;
    }

    /**
     * Get dateModif
     *
     * @return \DateTime
     */
    public function getDateModif()
    {
        return $this->dateModif;
    }

    /**
     * Set langue
     *
     * @param string $langue
     *
     * @return User
     */
    public function setLangue($langue)
    {
        $this->langue = $langue;

        return $this;
    }

    /**
     * Get langue
     *
     * @return string
     */
    public function getLangue()
    {
        return $this->langue;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return User
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return User
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
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }



    /**
     * Set mairie
     *
     * @param \LSI\MarketBundle\Entity\Mairie $mairie
     *
     * @return User
     */
    public function setMairie(\LSI\MarketBundle\Entity\Mairie $mairie = null)
    {
        $this->mairie = $mairie;

        return $this;
    }

    /**
     * Get mairie
     *
     * @return \LSI\MarketBundle\Entity\Mairie
     */
    public function getMairie()
    {
        return $this->mairie;
    }

    /**
     * Set administre
     *
     * @param \LSI\MarketBundle\Entity\Administre $administre
     *
     * @return User
     */
    public function setAdministre(\LSI\MarketBundle\Entity\Administre $administre = null)
    {
        $this->administre = $administre;

        return $this;
    }

    /**
     * Get administre
     *
     * @return \LSI\MarketBundle\Entity\Administre
     */
    public function getAdministre()
    {
        return $this->administre;
    }


    /**
     * Set adresse
     *
     * @param \LSI\MarketBundle\Entity\Adresse $adresse
     *
     * @return User
     */
    public function setAdresse(\LSI\MarketBundle\Entity\Adresse $adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return \LSI\MarketBundle\Entity\Adresse
     */
    public function getAdresse()
    {
        return $this->adresse;
    }
}
