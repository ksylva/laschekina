<?php

namespace LSI\MarketBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande")
 * @ORM\Entity(repositoryClass="LSI\MarketBundle\Repository\CommandeRepository")
 */
class Commande
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
     * @ORM\ManyToOne(targetEntity="LSI\MarketBundle\Entity\Administre")
     *@ORM\JoinColumn(nullable=false)
     */
    private $administre;

    /**
     * @ORM\ManyToOne(targetEntity="LSI\MarketBundle\Entity\Mairie")
     *@ORM\JoinColumn(nullable=false)
     */
    private $mairie;

    /**
     * @ORM\OneToOne(targetEntity="LSI\MarketBundle\Entity\Reserver")
     * @ORM\JoinColumn(nullable=false)
     */
    private $reserver;

    /**
     * @ORM\Column(name="commande_at", type="datetime")
     */
    private $commandeAt;

    /**
     * @ORM\Column(name="commande_update_at", type="datetime", nullable=true)
     */
    private $commandeUpdateAt;

    /**
     * @ORM\Column(name="commande_etat", type="string", length=4)
     */
    private $commandeEtat;

    function __construct()
    {
    }

    /**
     * Set commandeAt
     *
     * @param \DateTime $commandeAt
     *
     * @return Commande
     */
    public function setCommandeAt($commandeAt)
    {
        $this->commandeAt = $commandeAt;

        return $this;
    }

    /**
     * Get commandeAt
     *
     * @return \DateTime
     */
    public function getCommandeAt()
    {
        return $this->commandeAt;
    }

    /**
     * Set commandeUpdateAt
     *
     * @param \DateTime $commandeUpdateAt
     *
     * @return Commande
     */
    public function setCommandeUpdateAt($commandeUpdateAt)
    {
        $this->commandeUpdateAt = $commandeUpdateAt;

        return $this;
    }

    /**
     * Get commandeUpdateAt
     *
     * @return \DateTime
     */
    public function getCommandeUpdateAt()
    {
        return $this->commandeUpdateAt;
    }

    /**
     * Set commandeEtat
     *
     * @param string $commandeEtat
     *
     * @return Commande
     */
    public function setCommandeEtat($commandeEtat)
    {
        $this->commandeEtat = $commandeEtat;

        return $this;
    }

    /**
     * Get commandeEtat
     *
     * @return string
     */
    public function getCommandeEtat()
    {
        return $this->commandeEtat;
    }

    /**
     * Set administre
     *
     * @param \LSI\MarketBundle\Entity\Administre $administre
     *
     * @return Commande
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
     * Set mairie
     *
     * @param \LSI\MarketBundle\Entity\Mairie $mairie
     *
     * @return Commande
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
     * Set reserver
     *
     * @param \LSI\MarketBundle\Entity\Reserver $reserver
     *
     * @return Commande
     */
    public function setReserver(\LSI\MarketBundle\Entity\Reserver $reserver = null)
    {
        $this->reserver = $reserver;

        return $this;
    }

    /**
     * Get reserver
     *
     * @return \LSI\MarketBundle\Entity\Reserver
     */
    public function getReserver()
    {
        return $this->reserver;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
