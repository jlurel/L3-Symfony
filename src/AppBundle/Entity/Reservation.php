<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ReservationRepository")
 */
class Reservation
{

    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     */
    private $numReservation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateReservation", type="date")
     */
    private $dateReservation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heureDebut", type="time")
     */
    private $heureDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heureFin", type="time")
     */
    private $heureFin;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Utilisateur", inversedBy="reservations")
     * @ORM\JoinColumn(nullable=true)
     */
    private $demandeur;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Salle", inversedBy="reservations")
     * @ORM\JoinColumn(nullable=true)
     */
    private $salle;

    /**
     * Set numReservation
     *
     * @param integer $numReservation
     *
     * @return Reservation
     */
    public function setNumReservation($numReservation)
    {
        $this->numReservation = $numReservation;

        return $this;
    }

    /**
     * Get numReservation
     *
     * @return int
     */
    public function getNumReservation()
    {
        return $this->numReservation;
    }

    /**
     * Set dateReservation
     *
     * @param \DateTime $dateReservation
     *
     * @return Reservation
     */
    public function setDateReservation($dateReservation)
    {
        $this->dateReservation = $dateReservation;

        return $this;
    }

    /**
     * Get dateReservation
     *
     * @return \DateTime
     */
    public function getDateReservation()
    {
        return $this->dateReservation;
    }

    /**
     * Set heureDebut
     *
     * @param \DateTime $heureDebut
     *
     * @return Reservation
     */
    public function setHeureDebut($heureDebut)
    {
        $this->heureDebut = $heureDebut;

        return $this;
    }

    /**
     * Get heureDebut
     *
     * @return \DateTime
     */
    public function getHeureDebut()
    {
        return $this->heureDebut;
    }

    /**
     * Set heureFin
     *
     * @param \DateTime $heureFin
     *
     * @return Reservation
     */
    public function setHeureFin($heureFin)
    {
        $this->heureFin = $heureFin;

        return $this;
    }

    /**
     * Get heureFin
     *
     * @return \DateTime
     */
    public function getHeureFin()
    {
        return $this->heureFin;
    }

    /**
     * @return Utilisateur
     */
    public function getDemandeur()
    {
        return $this->demandeur;
    }

    /**
     * @param Utilisateur $demandeur
     */
    public function setDemandeur(Utilisateur $demandeur)
    {
        $this->demandeur = $demandeur;
    }

    /**
     * @return Salle
     */
    public function getSalle()
    {
        return $this->salle;
    }

    /**
     * @param Salle $salle
     */
    public function setSalle(Salle $salle)
    {
        $this->salle = $salle;
    }
}

