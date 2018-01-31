<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Disponibility
 *
 * @ORM\Table(name="disponibility")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DisponibilityRepository")
 */
class Disponibility
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
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="heure", type="time", length=255)
     */
    private $heure;

     /**
     * @ORM\OneToMany(targetEntity="Agenda", mappedBy="disponibility")
     */
    private $disponibilities;


     public function __construct(){
        $this->disponibilities = new ArrayCollection();
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param string $date
     *
     * @return Disponibility
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set heure
     *
     * @param string $heure
     *
     * @return Disponibility
     */
    public function setHeure($heure)
    {
        $this->heure = $heure;

        return $this;
    }

    /**
     * Get heure
     *
     * @return string
     */
    public function getHeure()
    {
        return $this->heure;
    }

    /**
     * Add disponibility
     *
     * @param \AppBundle\Entity\Agenda $disponibility
     *
     * @return Disponibility
     */
    public function addDisponibility(\AppBundle\Entity\Agenda $disponibility)
    {
        $this->disponibilities[] = $disponibility;

        return $this;
    }

    /**
     * Remove disponibility
     *
     * @param \AppBundle\Entity\Agenda $disponibility
     */
    public function removeDisponibility(\AppBundle\Entity\Agenda $disponibility)
    {
        $this->disponibilities->removeElement($disponibility);
    }

    /**
     * Get disponibilities
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDisponibilities()
    {
        return $this->disponibilities;
    }
}
