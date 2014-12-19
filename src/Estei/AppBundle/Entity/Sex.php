<?php

namespace Estei\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Sex
 *
 * @ORM\Table(name="sex")
 * @ORM\Entity(repositoryClass="Estei\AppBundle\Entity\SexRepository")
 */
class Sex
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=1, nullable=false)
     */
    private $gender;

    /**
     * @var integer
     *
     * @ORM\Column(name="code", type="integer", nullable=false)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=15, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="title_abbrev", type="string", length=5, nullable=true)
     */
    private $titleAbbrev;

    /**
     * @var integer
     *
     * @Gedmo\SortablePosition
     * @ORM\Column(name="position", type="integer", nullable=false)
     */
    private $position;



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
     * Set gender
     *
     * @param string $gender
     * @return Sex
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set code
     *
     * @param integer $code
     * @return Sex
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return integer 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Sex
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set titleAbbrev
     *
     * @param string $titleAbbrev
     * @return Sex
     */
    public function setTitleAbbrev($titleAbbrev)
    {
        $this->titleAbbrev = $titleAbbrev;

        return $this;
    }

    /**
     * Get titleAbbrev
     *
     * @return string 
     */
    public function getTitleAbbrev()
    {
        return $this->titleAbbrev;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return Sex
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->title;
    }
}
