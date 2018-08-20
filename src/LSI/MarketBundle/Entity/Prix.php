<?php

namespace LSI\MarketBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Prix
 *
 * @ORM\Table(name="prix")
 * @ORM\Entity(repositoryClass="LSI\MarketBundle\Repository\PrixRepository")
 */
class Prix
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
     * @ORM\Column(name="tarif1", type="decimal", precision=10, scale=4)
     */
    private $tarif1;

    /**
     * @var string
     *
     * @ORM\Column(name="tarif2", type="decimal", precision=10, scale=4)
     */
    private $tarif2;

    /**
     * @var string
     *
     * @ORM\Column(name="tarif3", type="decimal", precision=10, scale=4)
     */
    private $tarif3;

    /**
     * @var string
     *
     * @ORM\Column(name="tarif4", type="decimal", precision=10, scale=4)
     */
    private $tarif4;

    /**
     * @var string
     *
     * @ORM\Column(name="tarif5", type="decimal", precision=10, scale=4)
     */
    private $tarif5;




    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set tarif1
     *
     * @param string $tarif1
     *
     * @return Prix
     */
    public function setTarif1($tarif1)
    {
        $this->tarif1 = $tarif1;

        return $this;
    }

    /**
     * Get tarif1
     *
     * @return string
     */
    public function getTarif1()
    {
        return $this->tarif1;
    }

    /**
     * Set tarif2
     *
     * @param string $tarif2
     *
     * @return Prix
     */
    public function setTarif2($tarif2)
    {
        $this->tarif2 = $tarif2;

        return $this;
    }

    /**
     * Get tarif2
     *
     * @return string
     */
    public function getTarif2()
    {
        return $this->tarif2;
    }

    /**
     * Set tarif3
     *
     * @param string $tarif3
     *
     * @return Prix
     */
    public function setTarif3($tarif3)
    {
        $this->tarif3 = $tarif3;

        return $this;
    }

    /**
     * Get tarif3
     *
     * @return string
     */
    public function getTarif3()
    {
        return $this->tarif3;
    }

    /**
     * Set tarif4
     *
     * @param string $tarif4
     *
     * @return Prix
     */
    public function setTarif4($tarif4)
    {
        $this->tarif4 = $tarif4;

        return $this;
    }

    /**
     * Get tarif4
     *
     * @return string
     */
    public function getTarif4()
    {
        return $this->tarif4;
    }

    /**
     * Set tarif5
     *
     * @param string $tarif5
     *
     * @return Prix
     */
    public function setTarif5($tarif5)
    {
        $this->tarif5 = $tarif5;

        return $this;
    }

    /**
     * Get tarif5
     *
     * @return string
     */
    public function getTarif5()
    {
        return $this->tarif5;
    }
}
