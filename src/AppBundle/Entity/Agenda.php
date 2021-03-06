<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Agenda
 *
 * @ORM\Table(name="agenda")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AgendaRepository")
 */
class Agenda
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
     * @ORM\ManyToOne(targetEntity="Disponibility", inversedBy="agendas")
     * @ORM\JoinColumn(name = "disponiblity_id", referencedColumnName="id")
     */
    private $disponibility;

     /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="agendas")
     * @ORM\JoinColumn(name = "user_id", referencedColumnName="id")
     */
    private $user;

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
     * Get disponibilities
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDisponibilities()
    {
        return $this->disponibilities;
    }

    /**
     * Set disponibility
     *
     * @param \AppBundle\Entity\Disponibility $disponibility
     *
     * @return Agenda
     */
    public function setDisponibility(\AppBundle\Entity\Disponibility $disponibility = null)
    {
        $this->disponibility = $disponibility;

        return $this;
    }

    /**
     * Get disponibility
     *
     * @return \AppBundle\Entity\Disponibility
     */
    public function getDisponibility()
    {
        return $this->disponibility;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Agenda
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
