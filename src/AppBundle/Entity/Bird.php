<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bird
 *
 * @ORM\Table(name="bird")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BirdRepository")
 */
class Bird
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
     * @ORM\Column(name="family", type="string", length=255)
     */
    private $family;

    /**
     * @var string
     *
     * @ORM\Column(name="rank", type="string", length=255)
     */
    private $rank;

    /**
     * @var string
     *
     * @ORM\Column(name="latin_name", type="string", length=255)
     */
    private $latin_name;

    /**
     * @var string
     *
     * @ORM\Column(name="full_name", type="string", length=255)
     */
    private $full_name;

    /**
     * @var string
     *
     * @ORM\Column(name="common_name", type="string", length=255)
     */
    private $common_name;


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
     * Set family
     *
     * @param string $family
     *
     * @return Bird
     */
    public function setFamily($family)
    {
        $this->family = $family;

        return $this;
    }

    /**
     * Get family
     *
     * @return string
     */
    public function getFamily()
    {
        return $this->family;
    }

    /**
     * Set rank
     *
     * @param string $rank
     *
     * @return Bird
     */
    public function setRank($rank)
    {
        $this->rank = $rank;

        return $this;
    }

    /**
     * Get rank
     *
     * @return string
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * Set latinName
     *
     * @param string $latinName
     *
     * @return Bird
     */
    public function setLatinName($latinName)
    {
        $this->latin_name = $latinName;

        return $this;
    }

    /**
     * Get latinName
     *
     * @return string
     */
    public function getLatinName()
    {
        return $this->latin_name;
    }

    /**
     * Set fullName
     *
     * @param string $fullName
     *
     * @return Bird
     */
    public function setFullName($fullName)
    {
        $this->full_name = $fullName;

        return $this;
    }

    /**
     * Get fullName
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->full_name;
    }

    /**
     * Set commonName
     *
     * @param string $commonName
     *
     * @return Bird
     */
    public function setCommonName($commonName)
    {
        $this->common_name = $commonName;

        return $this;
    }

    /**
     * Get commonName
     *
     * @return string
     */
    public function getCommonName()
    {
        return $this->common_name;
    }
}
