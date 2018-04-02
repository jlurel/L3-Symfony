<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="num_etage", type="integer")
     */
    private $numEtage;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Batiment", inversedBy="etages")
     */
    private $batiment;

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
        $this->salles->add($salle);
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

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->batiment. " " .strval($this->numEtage);
    }


}

