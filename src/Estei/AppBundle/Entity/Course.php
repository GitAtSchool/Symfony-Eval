<?php

namespace Estei\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Course
 *
 * @ORM\Table(name="course", indexes={@ORM\Index(name="fk_course_levels_scale1_idx", columns={"levels_scale_id"})})
 * @ORM\Entity(repositoryClass="Estei\AppBundle\Entity\CourseRepository")
 */
class Course
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
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="full_name", type="string", length=255, nullable=true)
     */
    private $fullName;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=3000, nullable=false)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="coefficient", type="integer", nullable=true)
     */
    private $coefficient;

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
     * @ORM\ManyToOne(targetEntity="LevelsScale")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="levels_scale_id", referencedColumnName="id")
     * })
     */
    private $levelsScale;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Degree", inversedBy="course")
     * @ORM\JoinTable(name="course_degree",
     *   joinColumns={
     *     @ORM\JoinColumn(name="course_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="degree_id", referencedColumnName="id")
     *   }
     * )
     */
    private $degree;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Criterion", inversedBy="course")
     * @ORM\JoinTable(name="criterion_course",
     *   joinColumns={
     *     @ORM\JoinColumn(name="course_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="criterion_id", referencedColumnName="id")
     *   }
     * )
     */
    private $criterion;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->degree = new \Doctrine\Common\Collections\ArrayCollection();
        $this->criterion = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Course
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
     * Set fullName
     *
     * @param string $fullName
     * @return Course
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * Get fullName
     *
     * @return string 
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Course
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set coefficient
     *
     * @param integer $coefficient
     * @return Course
     */
    public function setCoefficient($coefficient)
    {
        $this->coefficient = $coefficient;

        return $this;
    }

    /**
     * Get coefficient
     *
     * @return integer 
     */
    public function getCoefficient()
    {
        return $this->coefficient;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return Course
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
     * @return Course
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
     * @return Course
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
     * Set levelsScale
     *
     * @param \Estei\AppBundle\Entity\LevelsScale $levelsScale
     * @return Course
     */
    public function setLevelsScale(\Estei\AppBundle\Entity\LevelsScale $levelsScale = null)
    {
        $this->levelsScale = $levelsScale;

        return $this;
    }

    /**
     * Get levelsScale
     *
     * @return \Estei\AppBundle\Entity\LevelsScale 
     */
    public function getLevelsScale()
    {
        return $this->levelsScale;
    }

    /**
     * Add degree
     *
     * @param \Estei\AppBundle\Entity\Degree $degree
     * @return Course
     */
    public function addDegree(\Estei\AppBundle\Entity\Degree $degree)
    {
        $this->degree[] = $degree;

        return $this;
    }

    /**
     * Remove degree
     *
     * @param \Estei\AppBundle\Entity\Degree $degree
     */
    public function removeDegree(\Estei\AppBundle\Entity\Degree $degree)
    {
        $this->degree->removeElement($degree);
    }

    /**
     * Get degree
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDegree()
    {
        return $this->degree;
    }

    /**
     * Add criterion
     *
     * @param \Estei\AppBundle\Entity\Criterion $criterion
     * @return Course
     */
    public function addCriterion(\Estei\AppBundle\Entity\Criterion $criterion)
    {
        $this->criterion[] = $criterion;

        return $this;
    }

    /**
     * Remove criterion
     *
     * @param \Estei\AppBundle\Entity\Criterion $criterion
     */
    public function removeCriterion(\Estei\AppBundle\Entity\Criterion $criterion)
    {
        $this->criterion->removeElement($criterion);
    }

    /**
     * Get criterion
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCriterion()
    {
        return $this->criterion;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }
}
