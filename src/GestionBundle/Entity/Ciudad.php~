<?php

namespace GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ciudad
 *
 * @ORM\Table(name="ciudad")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\CiudadRepository")
 */
class Ciudad
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
     * @ORM\Column(name="nombreciud", type="string", length=150)
     */
    private $nombreciud;


    /**
     * @ORM\ManyToOne(targetEntity="Departamento", inversedBy="ciudades")
     * @ORM\JoinColumn(name="dpto_id", referencedColumnName="id")
     */
    protected $departamento;

    /**
     * @ORM\OneToMany(targetEntity="Curriculums", mappedBy="ciudad")
     */
    protected $curriculums;

    /**
     * @ORM\OneToMany(targetEntity="Proveedores", mappedBy="ciudad")
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
     * Set nombre
     *
     * @param string $nombre
     * @return Ciudad
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
     * Set nombreciud
     *
     * @param string $nombreciud
     * @return Ciudad
     */
    public function setNombreciud($nombreciud)
    {
        $this->nombreciud = $nombreciud;

        return $this;
    }

    /**
     * Get nombreciud
     *
     * @return string 
     */
    public function getNombreciud()
    {
        return $this->nombreciud;
    }

    /**
     * Set departamento
     *
     * @param \GestionBundle\Entity\Departamento $dpto
     * @return Ciudad
     */
    public function setDepartamento(\GestionBundle\Entity\Departamento $departamento = null)
    {
        $this->departamento = $departamento;

        return $this;
    }

    /**
     * Get departamento
     *
     * @return \GestionBundle\Entity\Departamento 
     */
    public function getDepartamento()
    {
        return $this->departamento;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->curriculums = new \Doctrine\Common\Collections\ArrayCollection();
        $this->proveedores = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add curriculums
     *
     * @param \GestionBundle\Entity\Curriculums $curriculums
     * @return Ciudad
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
     * @return Ciudad
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
        return $this->nombreciud;
    }
}
