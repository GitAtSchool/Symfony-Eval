<?php

namespace Estei\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * StudentClass
 *
 * @ORM\Table(name="student_class", indexes={@ORM\Index(name="fk_student_class_degree1_idx", columns={"degree_id"})})
 * @ORM\Entity(repositoryClass="Estei\AppBundle\Entity\StudentClassRepository")
 */
class StudentClass
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
     * @ORM\Column(name="name", type="string", length=25, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="name_abbrev", type="string", length=10, nullable=false)
     */
    private $nameAbbrev;

    /**
     * @var string
     *
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(name="slug", type="text", nullable=false)
     */
    private $slug;

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
     * @var \Degree
     *
     * @ORM\ManyToOne(targetEntity="Degree")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="degree_id", referencedColumnName="id")
     * })
     */
    private $degree;



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
     * @return StudentClass
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
     * @return StudentClass
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
     * Set slug
     *
     * @param string $slug
     * @return StudentClass
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return StudentClass
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
     * @return StudentClass
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
     * @return StudentClass
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
     * Set degree
     *
     * @param \Estei\AppBundle\Entity\Degree $degree
     * @return StudentClass
     */
    public function setDegree(\Estei\AppBundle\Entity\Degree $degree = null)
    {
        $this->degree = $degree;

        return $this;
    }

    /**
     * Get degree
     *
     * @return \Estei\AppBundle\Entity\Degree 
     */
    public function getDegree()
    {
        return $this->degree;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }
}
