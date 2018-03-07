<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PUGX\MultiUserBundle\Validator\Constraints\UniqueEntity;

/**
 * Etudiant
 *
 * @ORM\Table(name="etudiant")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EtudiantRepository")
 * @UniqueEntity(fields = "username", targetClass="AppBundle\Entity\Utilisateur", message="fos_user.username.already_used")
 * @UniqueEntity(fields = "email", targetClass="AppBundle\Entity\Utilisateur", message="fos_user.email.already_used")
 */
class Etudiant extends Utilisateur
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var int
     *
     * @ORM\Column(name="numEtudiant", type="integer", unique=true)
     */
    protected $numEtudiant;


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
     * Set numEtudiant
     *
     * @param integer $numEtudiant
     *
     * @return Etudiant
     */
    public function setNumEtudiant($numEtudiant)
    {
        $this->numEtudiant = $numEtudiant;

        return $this;
    }

    /**
     * Get numEtudiant
     *
     * @return int
     */
    public function getNumEtudiant()
    {
        return $this->numEtudiant;
    }
}

