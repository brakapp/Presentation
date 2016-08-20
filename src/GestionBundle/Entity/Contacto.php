<?php

namespace GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contacto
 *
 * @ORM\Table(name="contacto")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\contactoRepository")
 */
class Contacto
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
     * @ORM\Column(name="nombre", type="string", length=150)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=15)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="mensaje", type="text")
     */
    private $mensaje;

    /**
     * @ORM\ManyToOne(targetEntity="Dpto", inversedBy="contactos")
     * @ORM\JoinColumn(name="dpto_id", referencedColumnName="id")
     */
    protected $dpto;

    /**
     * @var bool
     *
     * @ORM\Column(name="acceppolitica", type="boolean")
     */
    private $acceppolitica;

    /**
     * @var bool
     *
     * @ORM\Column(name="accepcel", type="boolean", nullable=true)
     */
    private $accepcel;

    /**
     * @var bool
     *
     * @ORM\Column(name="accepmail", type="boolean", nullable=true)
     */
    private $accepmail;
    
    /**
     * @ORM\ManyToOne(targetEntity="Proyectos", inversedBy="contactos")
     * @ORM\JoinColumn(name="proyecto_id", referencedColumnName="id")
     */
    protected $proyecto;


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
     * @return contacto
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
     * Set email
     *
     * @param string $email
     * @return contacto
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
     * @return Dpto
     */
    public function setDpto(\GestionBundle\Entity\Dpto $dpto = null)
    {
        $this->dpto = $dpto;

        return $this;
    }

    /**
     * Get dpto
     *
     * @return \GestionBundle\Entity\Contacto 
     */
    public function getDpto()
    {
        return $this->dpto;
    }

    /**
     * Set mensaje
     *
     * @param string $mensaje
     * @return Contacto
     */
    public function setMensaje($mensaje)
    {
        $this->mensaje = $mensaje;

        return $this;
    }

    /**
     * Get mensaje
     *
     * @return string 
     */
    public function getMensaje()
    {
        return $this->mensaje;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return Contacto
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set acceppolitica
     *
     * @param boolean $acceppolitica
     * @return Contacto
     */
    public function setAcceppolitica($acceppolitica)
    {
        $this->acceppolitica = $acceppolitica;

        return $this;
    }

    /**
     * Get acceppolitica
     *
     * @return boolean 
     */
    public function getAcceppolitica()
    {
        return $this->acceppolitica;
    }

    /**
     * Set accepcel
     *
     * @param boolean $accepcel
     * @return Contacto
     */
    public function setAccepcel($accepcel)
    {
        $this->accepcel = $accepcel;

        return $this;
    }

    /**
     * Get accepcel
     *
     * @return boolean 
     */
    public function getAccepcel()
    {
        return $this->accepcel;
    }

    /**
     * Set accepmail
     *
     * @param boolean $accepmail
     * @return Contacto
     */
    public function setAccepmail($accepmail)
    {
        $this->accepmail = $accepmail;

        return $this;
    }

    /**
     * Get accepmail
     *
     * @return boolean 
     */
    public function getAccepmail()
    {
        return $this->accepmail;
    }

    /**
     * Set proyecto
     *
     * @param \GestionBundle\Entity\Proyectos $proyecto
     * @return Contacto
     */
    public function setProyecto(\GestionBundle\Entity\Proyectos $proyecto = null)
    {
        $this->proyecto = $proyecto;

        return $this;
    }

    /**
     * Get proyecto
     *
     * @return \GestionBundle\Entity\Proyectos 
     */
    public function getProyecto()
    {
        return $this->proyecto;
    }
}
