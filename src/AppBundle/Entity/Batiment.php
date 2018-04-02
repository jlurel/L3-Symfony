<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="libelle", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Etage", mappedBy="batiment")
     */
    private $etages;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Site", inversedBy="batiments")
     * @Assert\NotBlank()
     */
    private $site;

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
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param string $libelle
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    /**
     * @return Site
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * @param Site $site
     */
    public function setSite($site)
    {
        $this->site = $site;
    }



    /**
     * Ajouter etage
     * @param Etage $etage
     *
     * @return Batiment
     */
    public function ajouterSalle(Etage $etage)
    {
        $this->etages->add($etage);
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

    public function __toString()
    {
        return "Site : " .$this->site. " - Batiment : " .$this->libelle;
    }
}

