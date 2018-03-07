<?php

namespace AppBundle\Entity;

<<<<<<< HEAD
use Doctrine\Common\Collections\ArrayCollection;
=======
>>>>>>> ed3011fc1e6bc1ea52415db0577c1957b9aae0dc
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
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="numSalle", type="integer")
     */
    private $numSalle;

    /**
     * @var bool
     *
     * @ORM\Column(name="disponibilite", type="boolean")
     */
    private $disponibilite;

<<<<<<< HEAD
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

=======
>>>>>>> ed3011fc1e6bc1ea52415db0577c1957b9aae0dc

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
<<<<<<< HEAD
        $this->reservations = new ArrayCollection();
=======
>>>>>>> ed3011fc1e6bc1ea52415db0577c1957b9aae0dc
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
<<<<<<< HEAD

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
     * @return Collection|Reservation[]
     */
    public function getReservations()
    {
        return $this->reservations;
    }
}
=======
}

>>>>>>> ed3011fc1e6bc1ea52415db0577c1957b9aae0dc
