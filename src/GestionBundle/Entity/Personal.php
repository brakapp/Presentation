<?php

namespace GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Personal
 *
 * @ORM\Table(name="personal")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\personalRepository")
 */
class Personal
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
     * @ORM\Column(name="nombre", type="string", length=80)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellidos", type="string", length=80)
     */
    private $apellidos;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=200, unique=true)
     */
    private $email;

    /**
     * @ORM\ManyToOne(targetEntity="Dpto", inversedBy="personals")
     * @ORM\JoinColumn(name="dpto_id", referencedColumnName="id")
     */
    protected $dpto;


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
     * Set nombre
     *
     * @param string $nombre
     * @return personal
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     * @return personal
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string 
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return personal
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set dpto
     *
     * @param \GestionBundle\Entity\Dpto $dpto
     * @return Personal
     */
    public function setDpto(\GestionBundle\Entity\Dpto $dpto = null)
    {
        $this->dpto = $dpto;

        return $this;
    }

    /**
     * Get dpto
     *
     * @return \GestionBundle\Entity\Dpto 
     */
    public function getDpto()
    {
        return $this->dpto;
    }
}
