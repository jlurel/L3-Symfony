<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PUGX\MultiUserBundle\Validator\Constraints\UniqueEntity;

/**
 * AgentAdministratif
 *
 * @ORM\Table(name="agent_administratif")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AgentAdministratifRepository")
 * @UniqueEntity(fields = "username", targetClass="AppBundle\Entity\Utilisateur", message="fos_user.username.already_used")
 * @UniqueEntity(fields = "email", targetClass="AppBundle\Entity\Utilisateur", message="fos_user.email.already_used")
 */
class AgentAdministratif extends Utilisateur
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
     * @var string
     *
     * @ORM\Column(name="matricule", type="string", length=15, unique=true)
     */
    protected $matricule;


    public function __construct()
    {
        parent::__construct();
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
     * Set matricule
     *
     * @param string $matricule
     *
     * @return AgentAdministratif
     */
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;

        return $this;
    }

    /**
     * Get matricule
     *
     * @return string
     */
    public function getMatricule()
    {
        return $this->matricule;
    }
}

