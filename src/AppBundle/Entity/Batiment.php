<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Batiment
 *
 * @ORM\Table(name="batiment")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BatimentRepository")
 */
class Batiment
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
     * @ORM\Column(name="idBatiment", type="string", length=4, unique=true)
     */
    private $idBatiment;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Etage", mappedBy="batiment")
     */
    private $etages;

    /**
     * Batiment constructor.
     */
    public function __construct()
    {
        $this->etages = new ArrayCollection();
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
     * Set idBatiment
     *
     * @param string $idBatiment
     *
     * @return Batiment
     */
    public function setIdBatiment($idBatiment)
    {
        $this->idBatiment = $idBatiment;

        return $this;
    }

    /**
     * Get idBatiment
     *
     * @return string
     */
    public function getIdBatiment()
    {
        return $this->idBatiment;
    }

    /**
     * Ajouter etage
     * @param Etage $etage
     *
     * @return Batiment
     */
    public function ajouterSalle(Etage $etage)
    {
        $this->etages[] = $etage;
        $etage->setBatiment($this);

        return $this;
    }

    /**
     * Supprimer salle
     * @param Etage $etage
     */
    public function supprimerSalle(Etage $etage)
    {
        $this->etages->removeElement($etage);
    }

    /**
     * @return Collection|Etage[]
     */
    public function getSalles()
    {
        return $this->etages;
    }

    /**
     * @return integer
     */
    public function getNombreEtages()
    {
        return $this->etages->count();
    }
}

