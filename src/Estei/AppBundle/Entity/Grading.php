<?php

namespace Estei\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Grading
 *
 * @ORM\Table(name="grading", indexes={@ORM\Index(name="fk_grading_user1_idx", columns={"user_id"}), @ORM\Index(name="fk_grading_examination_session1_idx", columns={"examination_session_id"})})
 * @ORM\Entity(repositoryClass="Estei\AppBundle\Entity\GradingRepository")
 */
class Grading
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
     * @ORM\Column(name="comment", type="string", length=3000, nullable=true)
     */
    private $comment;

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
     * @var \ExaminationSession
     *
     * @ORM\ManyToOne(targetEntity="ExaminationSession")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="examination_session_id", referencedColumnName="id")
     * })
     */
    private $examinationSession;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="GradingDetail", mappedBy="grading", cascade={"persist"})
     */
    private $gradingDetail;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->gradingDetail = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set comment
     *
     * @param string $comment
     * @return Grading
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Grading
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
     * @return Grading
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
     * Set examinationSession
     *
     * @param \Estei\AppBundle\Entity\ExaminationSession $examinationSession
     * @return Grading
     */
    public function setExaminationSession(\Estei\AppBundle\Entity\ExaminationSession $examinationSession = null)
    {
        $this->examinationSession = $examinationSession;

        return $this;
    }

    /**
     * Get examinationSession
     *
     * @return \Estei\AppBundle\Entity\ExaminationSession 
     */
    public function getExaminationSession()
    {
        return $this->examinationSession;
    }

    /**
     * Set user
     *
     * @param \Estei\AppBundle\Entity\User $user
     * @return Grading
     */
    public function setUser(\Estei\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Estei\AppBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set gradingDetail(s)
     *
     * @param \Doctrine\Common\Collections\ArrayCollection $gradingDetails
     * @return Grading
     */
    public function setGradingDetail(ArrayCollection $gradingDetails)
    {
        foreach ($gradingDetails as $gradingDetail) {
            $gradingDetail->setGrading($this);
        }
        $this->gradingDetail = $gradingDetails;
        
        return $this;
    }

    /**
     * Get gradingDetail(s)
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGradingDetail()
    {
        return $this->gradingDetail;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return 'To customize';
    }
}
