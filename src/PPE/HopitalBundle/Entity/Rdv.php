<?php

namespace PPE\HopitalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

/**
 * Rdv
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="PPE\HopitalBundle\Entity\RdvRepository")
 */
class Rdv
{   


    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\Column(name="etat", type="integer")
     */
    private $etat;


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
     * Set date
     *
     * @param \DateTime $date
     * @return Rdv
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
     * Set etat
     *
     * @param integer $etat
     * @return Rdv
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return integer 
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
    * @var Patient $lePatient
    * @ORM\ManyToOne(targetEntity="Patient")
    */
    private $lePatient;

    /**
    * @var Medecin $leMedecin
    * @ORM\ManyToOne(targetEntity="Medecin")
    */
    private $leMedecin;

    /**
     * Set lePatient
     *
     * @param \PPE\HopitalBundle\Entity\Patient $lePatient
     * @return Rdv
     */
    public function setLePatient(\PPE\HopitalBundle\Entity\Patient $lePatient = null)
    {
        $this->lePatient = $lePatient;

        return $this;
    }

    /**
     * Get lePatient
     *
     * @return \PPE\HopitalBundle\Entity\Patient 
     */
    public function getLePatient()
    {
        return $this->lePatient;
    }

    /**
     * Set leMedecin
     *
     * @param \PPE\HopitalBundle\Entity\Medecin $leMedecin
     * @return Rdv
     */
    public function setLeMedecin(\PPE\HopitalBundle\Entity\Medecin $leMedecin = null)
    {
        $this->leMedecin = $leMedecin;

        return $this;
    }

    /**
     * Get leMedecin
     *
     * @return \PPE\HopitalBundle\Entity\Medecin 
     */
    public function getLeMedecin()
    {
        return $this->leMedecin;
    }
}
