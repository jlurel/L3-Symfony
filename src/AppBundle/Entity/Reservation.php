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
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
<<<<<<< HEAD
     * @var int
     *
     * @ORM\Column(name="numReservation", type="integer")
     */
    private $numReservation;

    /**
=======
>>>>>>> ed3011fc1e6bc1ea52415db0577c1957b9aae0dc
     * @var \DateTime
     *
     * @ORM\Column(name="dateReservation", type="date")
     */
    private $dateReservation;

    /**
     * @var \DateTime
     *
<<<<<<< HEAD
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Salle", inversedBy="reservations")
     * @ORM\JoinColumn(nullable=true)
     */
    private $salle;


=======
     * @ORM\Column(name="heureReservation", type="datetime")
     */
    private $heureReservation;
    
>>>>>>> ed3011fc1e6bc1ea52415db0577c1957b9aae0dc
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
<<<<<<< HEAD
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
=======
>>>>>>> ed3011fc1e6bc1ea52415db0577c1957b9aae0dc
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
<<<<<<< HEAD
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
=======
     * Set heureReservation
     *
     * @param \DateTime $heureReservation
     *
     * @return Reservation
     */
    public function setHeureReservation($heureReservation)
    {
        $this->heureReservation = $heureReservation;
>>>>>>> ed3011fc1e6bc1ea52415db0577c1957b9aae0dc

        return $this;
    }

    /**
<<<<<<< HEAD
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
    public function getDemandeur(): Utilisateur
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
    public function getSalle(): Salle
    {
        return $this->salle;
    }

    /**
     * @param Salle $salle
     */
    public function setSalle(Salle $salle)
    {
        $this->salle = $salle;
=======
     * Get heureReservation
     *
     * @return \DateTime
     */
    public function getHeureReservation()
    {
        return $this->heureReservation;
>>>>>>> ed3011fc1e6bc1ea52415db0577c1957b9aae0dc
    }
}

