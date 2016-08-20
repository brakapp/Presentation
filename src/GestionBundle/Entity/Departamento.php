<?php

namespace GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Departamento
 *
 * @ORM\Table(name="departamento")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\DepartamentoRepository")
 */
class Departamento
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
     * @ORM\Column(name="nombredpto", type="string", length=255)
     */
    private $nombredpto;

    /**
     * @ORM\OneToMany(targetEntity="Ciudad", mappedBy="departamento")
     */
    protected $ciudades;


    /**
     * @ORM\OneToMany(targetEntity="Curriculums", mappedBy="departamento")
     */
    protected $curriculums;

    /**
     * @ORM\OneToMany(targetEntity="Proveedores", mappedBy="departamento")
     */
    protected $proveedores;


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
     * Set nombredpto
     *
     * @param string $nombredpto
     * @return Departamento
     */
    public function setNombredpto($nombredpto)
    {
        $this->nombredpto = $nombredpto;

        return $this;
    }

    /**
     * Get nombredpto
     *
     * @return string 
     */
    public function getNombredpto()
    {
        return $this->nombredpto;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ciudades = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add ciudades
     *
     * @param \GestionBundle\Entity\Ciudad $ciudades
     * @return Departamento
     */
    public function addCiudade(\GestionBundle\Entity\Ciudad $ciudades)
    {
        $this->ciudades[] = $ciudades;

        return $this;
    }

    /**
     * Remove ciudades
     *
     * @param \GestionBundle\Entity\Ciudad $ciudades
     */
    public function removeCiudade(\GestionBundle\Entity\Ciudad $ciudades)
    {
        $this->ciudades->removeElement($ciudades);
    }

    /**
     * Get ciudades
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCiudades()
    {
        return $this->ciudades;
    }

    /**
     * Add curriculums
     *
     * @param \GestionBundle\Entity\Curriculums $curriculums
     * @return Departamento
     */
    public function addCurriculum(\GestionBundle\Entity\Curriculums $curriculums)
    {
        $this->curriculums[] = $curriculums;

        return $this;
    }

    /**
     * Remove curriculums
     *
     * @param \GestionBundle\Entity\Curriculums $curriculums
     */
    public function removeCurriculum(\GestionBundle\Entity\Curriculums $curriculums)
    {
        $this->curriculums->removeElement($curriculums);
    }

    /**
     * Get curriculums
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCurriculums()
    {
        return $this->curriculums;
    }

    /**
     * Add proveedores
     *
     * @param \GestionBundle\Entity\Proveedores $proveedores
     * @return Departamento
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

    public function __toString()
    {
        return $this->nombredpto;
    }

}
