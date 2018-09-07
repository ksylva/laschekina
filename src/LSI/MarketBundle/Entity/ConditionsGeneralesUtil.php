<?php

namespace LSI\MarketBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConditionsGeneralesUtil
 *
 * @ORM\Table(name="cgu")
 * @ORM\Entity(repositoryClass="LSI\MarketBundle\Repository\ConditionsGeneralesUtilRepository")
 */
class ConditionsGeneralesUtil {
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
     * @ORM\Column(name="cgu", type="text")
     */
    private $cgu;


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
     * Set cgu
     *
     * @param string $cgu
     *
     * @return ConditionsGeneralesUtil
     */
    public function setCgu($cgu)
    {
        $this->cgu = $cgu;

        return $this;
    }

    /**
     * Get cgu
     *
     * @return string
     */
    public function getCgu()
    {
        return $this->cgu;
    }
}

