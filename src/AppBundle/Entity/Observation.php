<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use AppBundle\Validator\BirdName;

/**
 * Observation
 *
 * @ORM\Table(name="observation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ObservationRepository")
 */
class Observation
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
     * @ORM\Column(name="longitude", type="string", length=255)
     */
    private $longitude;

    /**
     * @var string
     *
     * @ORM\Column(name="lattitude", type="string", length=255)
     */
    private $lattitude;

    /**
     * @var string
     *
     * @ORM\Column(name="country",  type="string", length=255)
     */
    private $country;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Image", inversedBy="observation", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="bird_name", type="string", length=255)
     */
    private $bird_name;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string", length=255, nullable=true)
     */
    private $comment;

    /**
     * @var string
     *
     * @ORM\Column(name="seen", type="boolean")
     */
    private $seen;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="boolean", nullable=true)
     */
    private $status;

    public function __construct() 
    {
        $this->bird_id = new \Datetime();
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

    /**
     * Set longitude
     *
     * @param string $longitude
     *
     * @return Observation
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set lattitude
     *
     * @param string $lattitude
     *
     * @return Observation
     */
    public function setLattitude($lattitude)
    {
        $this->lattitude = $lattitude;

        return $this;
    }

    /**
     * Get lattitude
     *
     * @return string
     */
    public function getLattitude()
    {
        return $this->lattitude;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return Observation
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Observation
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set birdName
     *
     * @param string $birdName
     *
     * @return Observation
     */
    public function setBirdName($birdName)
    {
        $this->bird_name = $birdName;

        return $this;
    }

    /**
     * Get birdName
     *
     * @return string
     */
    public function getBirdName()
    {
        return $this->bird_name;
    }

    /**
     * Set birdId
     *
     * @param string $birdId
     *
     * @return Observation
     */
    public function setBirdId($birdId)
    {
        $this->bird_id = $birdId;

        return $this;
    }

    /**
     * Get birdId
     *
     * @return string
     */
    public function getBirdId()
    {
        return $this->bird_id;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Observation
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set seen
     *
     * @param boolean $seen
     *
     * @return Observation
     */
    public function setSeen($seen)
    {
        $this->seen = $seen;

        return $this;
    }

    /**
     * Get seen
     *
     * @return boolean
     */
    public function getSeen()
    {
        return $this->seen;
    }

    /**
     * Set status
     *
     * @param boolean $status
     *
     * @return Observation
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set image
     *
     * @param \AppBundle\Entity\Image $image
     *
     * @return Observation
     */
    public function setImage(\AppBundle\Entity\Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \AppBundle\Entity\Image
     */
    public function getImage()
    {
        return $this->image;
    }
}
