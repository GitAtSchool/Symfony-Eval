<?php

namespace Estei\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * ExaminationSession
 *
 * @ORM\Table(name="examination_session", indexes={@ORM\Index(name="fk_examination_session_period1_idx", columns={"period_id"}), @ORM\Index(name="fk_examination_session_student_class_course1_idx", columns={"student_class_course_id"})})
 * @ORM\Entity(repositoryClass="Estei\AppBundle\Entity\ExaminationSessionRepository")
 */
class ExaminationSession
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
     * @ORM\Column(name="title", type="string", length=150, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=3000, nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="coefficient", type="integer", nullable=false)
     */
    private $coefficient;

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
     * @var \Period
     *
     * @ORM\ManyToOne(targetEntity="Period")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="period_id", referencedColumnName="id")
     * })
     */
    private $period;

    /**
     * @var \StudentClassCourse
     *
     * @ORM\ManyToOne(targetEntity="StudentClassCourse")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="student_class_course_id", referencedColumnName="id")
     * })
     */
    private $studentClassCourse;



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
     * Set title
     *
     * @param string $title
     * @return ExaminationSession
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
     * Set description
     *
     * @param string $description
     * @return ExaminationSession
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
     * @return ExaminationSession
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return ExaminationSession
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
     * @return ExaminationSession
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
     * Set period
     *
     * @param \Estei\AppBundle\Entity\Period $period
     * @return ExaminationSession
     */
    public function setPeriod(\Estei\AppBundle\Entity\Period $period = null)
    {
        $this->period = $period;

        return $this;
    }

    /**
     * Get period
     *
     * @return \Estei\AppBundle\Entity\Period 
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * Set studentClassCourse
     *
     * @param \Estei\AppBundle\Entity\StudentClassCourse $studentClassCourse
     * @return ExaminationSession
     */
    public function setStudentClassCourse(\Estei\AppBundle\Entity\StudentClassCourse $studentClassCourse = null)
    {
        $this->studentClassCourse = $studentClassCourse;

        return $this;
    }

    /**
     * Get studentClassCourse
     *
     * @return \Estei\AppBundle\Entity\StudentClassCourse 
     */
    public function getStudentClassCourse()
    {
        return $this->studentClassCourse;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->title;
    }
}
