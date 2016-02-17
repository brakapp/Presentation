<?php

namespace GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dpto
 *
 * @ORM\Table(name="dpto")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\dptoRepository")
 */
class Dpto
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
     * @ORM\Column(name="nombre", type="string", length=150, unique=true)
     */
    private $nombre;

    /**
     * @ORM\OneToMany(targetEntity="Contacto", mappedBy="dpto")
     */
    protected $contactos;

    /**
     * @ORM\OneToMany(targetEntity="Proveedores", mappedBy="dpto")
     */
    protected $proveedores;

    /**
     * @ORM\OneToMany(targetEntity="Personal", mappedBy="dpto")
     */
    protected $personals;




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
     * @return dpto
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
     * Constructor
     */
    public function __construct()
    {
        $this->contactos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->proveedores = new \Doctrine\Common\Collections\ArrayCollection();
        $this->personals = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add contactos
     *
     * @param \GestionBundle\Entity\Contacto $contactos
     * @return Dpto
     */
    public function addContacto(\GestionBundle\Entity\Contacto $contactos)
    {
        $this->contactos[] = $contactos;

        return $this;
    }

    /**
     * Remove contactos
     *
     * @param \GestionBundle\Entity\Contacto $contactos
     */
    public function removeContacto(\GestionBundle\Entity\Contacto $contactos)
    {
        $this->contactos->removeElement($contactos);
    }

    /**
     * Get contactos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContactos()
    {
        return $this->contactos;
    }

    /**
     * Add proveedores
     *
     * @param \GestionBundle\Entity\Proveedores $proveedores
     * @return Dpto
     */
    public function addProveedore(\GestionBundle\Entity\Proveedores $proveedores)
    {
        $this->proveedores[] = $proveedores;

        return $this;
    }

    /**
     * Remove proveedores
     *
     * @param \GestionBundle\Entity\Proveedores $proveedores
     */
    public function removeProveedore(\GestionBundle\Entity\Proveedores $proveedores)
    {
        $this->proveedores->removeElement($proveedores);
    }

    /**
     * Get proveedores
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProveedores()
    {
        return $this->proveedores;
    }

    /**
     * Add personals
     *
     * @param \GestionBundle\Entity\Personal $personals
     * @return Dpto
     */
    public function addPersonal(\GestionBundle\Entity\Personal $personals)
    {
        $this->personals[] = $personals;

        return $this;
    }

    /**
     * Remove personals
     *
     * @param \GestionBundle\Entity\Personal $personals
     */
    public function removePersonal(\GestionBundle\Entity\Personal $personals)
    {
        $this->personals->removeElement($personals);
    }

    /**
     * Get personals
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPersonals()
    {
        return $this->personals;
    }


    public function __toString()
    {
        return $this->nombre;
    }
}
