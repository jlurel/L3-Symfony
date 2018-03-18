<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Salle
 *
 * @ORM\Table(name="salle")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SalleRepository")
 */
class Salle
{

    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     */
    private $numSalle;


    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Etage", inversedBy="salles")
     */
    private $etage;

    /**
     * @var int
     * @ORM\Column(name="capacite", type="integer")
     */
    private $capacite;

    /**
     * @var bool
     *
     * @ORM\Column(name="disponibilite", type="boolean")
     */
    private $disponibilite;

    /**
     * @var bool
     *
     * @ORM\Column(name="projecteur", type="boolean")
     */
    private $contientProjecteur;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Reservation", mappedBy="salle")
     */
    private $reservations;

    /**
     * Salle constructor.
     */
    public function __construct()
    {
        $this->reservations = new ArrayCollection();
    }

    /**
     * Set numSalle
     *
     * @param integer $numSalle
     *
     * @return Salle
     */
    public function setNumSalle($numSalle)
    {
        $this->numSalle = $numSalle;

        return $this;
    }

    /**
     * Get numSalle
     *
     * @return int
     */
    public function getNumSalle()
    {
        return $this->numSalle;
    }

    /**
     * @return Etage
     */
    public function getEtage()
    {
        return $this->etage;
    }

    /**
     * @param Etage $etage
     */
    public function setEtage(Etage $etage)
    {
        $this->etage = $etage;
    }

    /**
     * @return int
     */
    public function getCapacite()
    {
        return $this->capacite;
    }

    /**
     * @param int $capacite
     */
    public function setCapacite($capacite)
    {
        $this->capacite = $capacite;
    }

    /**
     * Set disponibilite
     *
     * @param boolean $disponibilite
     *
     * @return Salle
     */
    public function setDisponibilite($disponibilite)
    {
        $this->disponibilite = $disponibilite;

        return $this;
    }

    /**
     * Get disponibilite
     *
     * @return bool
     */
    public function getDisponibilite()
    {
        return $this->disponibilite;
    }

    /**
     * Set contientProjecteur
     *
     * @param boolean $contientProjecteur
     *
     * @return Salle
     */
    public function setContientProjecteur($contientProjecteur)
    {
        $this->contientProjecteur = $contientProjecteur;

        return $this;
    }

    /**
     * Get contientProjecteur
     *
     * @return boolean
     */
    public function getContientProjecteur()
    {
        return $this->contientProjecteur;
    }

    /**
     * Ajouter reservation
     * @param Reservation $reservation
     *
     * @return Salle
     */
    public function ajouterReservation(Reservation $reservation)
    {
        $this->reservations[] = $reservation;
        $reservation->setSalle();

        return $this;
    }

    /**
     * Supprimer reservation
     * @param Reservation $reservation
     */
    public function supprimerReservation(Reservation $reservation)
    {
        $this->reservations->removeElement($reservation);
    }

    /**
     * @return Collection|Reservation[]
     */
    public function getReservations()
    {
        return $this->reservations;
    }

    /**
     * @return integer
     */
    public function getNombreReservations()
    {
        return $this->reservations->count();
    }
}
