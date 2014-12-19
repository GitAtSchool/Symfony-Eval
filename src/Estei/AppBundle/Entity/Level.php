<?php

namespace Estei\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Level
 *
 * @ORM\Table(name="level", indexes={@ORM\Index(name="fk_level_level_set1_idx", columns={"level_scale_id"})})
 * @ORM\Entity(repositoryClass="Estei\AppBundle\Entity\LevelRepository")
 */
class Level
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
     * @ORM\Column(name="name", type="string", length=100, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="name_abbrev", type="string", length=10, nullable=false)
     */
    private $nameAbbrev;

    /**
     * @var integer
     *
     * @Gedmo\SortablePosition
     * @ORM\Column(name="position", type="integer", nullable=false)
     */
    private $position;

    /**
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="updated_at", type="datetime", nullable=false)
     */
    private $updatedAt;

    /**
     * @var \LevelsScale
     *
     * @ORM\ManyToOne(targetEntity="LevelsScale", inversedBy="level")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="level_scale_id", referencedColumnName="id")
     * })
     */
    private $levelScale;



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
     * Set name
     *
     * @param string $name
     * @return Level
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set nameAbbrev
     *
     * @param string $nameAbbrev
     * @return Level
     */
    public function setNameAbbrev($nameAbbrev)
    {
        $this->nameAbbrev = $nameAbbrev;

        return $this;
    }

    /**
     * Get nameAbbrev
     *
     * @return string 
     */
    public function getNameAbbrev()
    {
        return $this->nameAbbrev;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return Level
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Level
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Level
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set levelScale
     *
     * @param \Estei\AppBundle\Entity\LevelsScale $levelScale
     * @return Level
     */
    public function setLevelScale(\Estei\AppBundle\Entity\LevelsScale $levelScale = null)
    {
        $this->levelScale = $levelScale;

        return $this;
    }

    /**
     * Get levelScale
     *
     * @return \Estei\AppBundle\Entity\LevelsScale 
     */
    public function getLevelScale()
    {
        return $this->levelScale;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }
}
