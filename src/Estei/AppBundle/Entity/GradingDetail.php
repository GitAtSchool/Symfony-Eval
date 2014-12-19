<?php

namespace Estei\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * GradingDetail
 *
 * @ORM\Table(name="grading_detail", indexes={@ORM\Index(name="fk_grading_detail_grading1_idx", columns={"grading_id"}), @ORM\Index(name="fk_grading_detail_criterion1_idx", columns={"criterion_id"})})
 * @ORM\Entity(repositoryClass="Estei\AppBundle\Entity\GradingDetailRepository")
 */
class GradingDetail
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
     * @ORM\Column(name="percentage", type="decimal", precision=5, scale=2, nullable=false)
     */
    private $percentage;

    /**
     * @var \Criterion
     *
     * @ORM\ManyToOne(targetEntity="Criterion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="criterion_id", referencedColumnName="id")
     * })
     */
    private $criterion;

    /**
     * @var \Grading
     *
     * @ORM\ManyToOne(targetEntity="Grading", inversedBy="gradingDetail")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="grading_id", referencedColumnName="id")
     * })
     */
    private $grading;



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
     * Set percentage
     *
     * @param string $percentage
     * @return GradingDetail
     */
    public function setPercentage($percentage)
    {
        $this->percentage = $percentage;

        return $this;
    }

    /**
     * Get percentage
     *
     * @return string 
     */
    public function getPercentage()
    {
        return $this->percentage;
    }

    /**
     * Set criterion
     *
     * @param \Estei\AppBundle\Entity\Criterion $criterion
     * @return GradingDetail
     */
    public function setCriterion(\Estei\AppBundle\Entity\Criterion $criterion = null)
    {
        $this->criterion = $criterion;

        return $this;
    }

    /**
     * Get criterion
     *
     * @return \Estei\AppBundle\Entity\Criterion 
     */
    public function getCriterion()
    {
        return $this->criterion;
    }

    /**
     * Set grading
     *
     * @param \Estei\AppBundle\Entity\Grading $grading
     * @return GradingDetail
     */
    public function setGrading(\Estei\AppBundle\Entity\Grading $grading = null)
    {
        $this->grading = $grading;

        return $this;
    }

    /**
     * Get grading
     *
     * @return \Estei\AppBundle\Entity\Grading 
     */
    public function getGrading()
    {
        return $this->grading;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return 'To customize';
    }
}
