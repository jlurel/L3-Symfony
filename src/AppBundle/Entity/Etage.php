<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Etage
 *
 * @ORM\Table(name="etage")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EtageRepository")
 */
class Etage
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Batiment", inversedBy="etages")
     */
    private $batiment;

    /**
     * @var int
     *
     * @ORM\Column(name="numEtage", type="integer")
     */
    private $numEtage;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Salle", mappedBy="etage")
     */
    private $salles;

    /**
     * Etage constructor.
     */
    public function __construct()
    {
        $this->salles = new ArrayCollection();
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
     * Set numEtage
     *
     * @param integer $numEtage
     *
     * @return Etage
     */
    public function setNumEtage($numEtage)
    {
        $this->numEtage = $numEtage;

        return $this;
    }

    /**
     * Get numEtage
     *
     * @return int
     */
    public function getNumEtage()
    {
        return $this->numEtage;
    }

    /**
     * @return Batiment
     */
    public function getBatiment()
    {
        return $this->batiment;
    }

    /**
     * @param Batiment $batiment
     */
    public function setBatiment($batiment)
    {
        $this->batiment = $batiment;
    }

    /**
     * Ajouter salle
     * @param Salle $salle
     *
     * @return Etage
     */
    public function ajouterSalle(Salle $salle)
    {
        $this->salles[] = $salle;
        $salle->setEtage($this);

        return $this;
    }

    /**
     * Supprimer salle
     * @param Salle $salle
     */
    public function supprimerSalle(Salle $salle)
    {
        $this->salles->removeElement($salle);
    }

    /**
     * @return Collection|Salle[]
     */
    public function getSalles()
    {
        return $this->salles;
    }

    /**
     * @return integer
     */
    public function getNombreSalles()
    {
        return $this->salles->count();
    }


}
