<?php

namespace LSI\MarketBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConditionsGeneralesVentes
 *
 * @ORM\Table(name="cgv")
 * @ORM\Entity(repositoryClass="LSI\MarketBundle\Repository\ConditionsGeneralesVentesRepository")
 */
class ConditionsGeneralesVentes
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
     * @ORM\Column(name="cgv", type="text")
     */
    private $cgv;


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
     * Set cgv
     *
     * @param string $cgv
     *
     * @return ConditionsGeneralesVentes
     */
    public function setCgv($cgv)
    {
        $this->cgv = $cgv;

        return $this;
    }

    /**
     * Get cgv
     *
     * @return string
     */
    public function getCgv()
    {
        return $this->cgv;
    }
}

