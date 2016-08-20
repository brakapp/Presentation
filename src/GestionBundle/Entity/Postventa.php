<?php

namespace GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Postventa
 *
 * @ORM\Table(name="postventa")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\PostventaRepository")
 */
class Postventa
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
     * @ORM\ManyToOne(targetEntity="Proyectos", inversedBy="postventa")
     * @ORM\JoinColumn(name="proyecto_id", referencedColumnName="id")
     */
    protected $proyecto;

    /**
     * @var int
     *
     * @ORM\Column(name="TipoInmueble", type="integer")
     */
    private $tipoInmueble;

    /**
     * @var string
     *
     * @ORM\Column(name="unidad", type="string", length=150, nullable=true)
     */
    private $unidad;

    /**
     * @var string
     *
     * @ORM\Column(name="TorreBloque", type="string", length=100, nullable=true)
     */
    private $torreBloque;

    /**
     * @var string
     *
     * @ORM\Column(name="Apartamento", type="string", length=100, nullable=true)
     */
    private $apartamento;

    /**
     * @var string
     *
     * @ORM\Column(name="fechaentrega", type="string", length=100, nullable=false)
     */
    private $fechaentrega;

    /**
     * @var int
     *
     * @ORM\Column(name="tipodocumento", type="integer")
     */
    private $tipodocumento;

    /**
     * @var string
     *
     * @ORM\Column(name="numerodocumento", type="string", length=12)
     */
    private $numerodocumento;

    /**
     * @var string
     *
     * @ORM\Column(name="nombrepropietario", type="string", length=255)
     */
    private $nombrepropietario;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreapellidosol", type="string", length=255)
     */
    private $nombreapellidosol;

    /**
     * @var int
     *
     * @ORM\Column(name="tipodocumentosol", type="integer")
     */
    private $tipodocumentosol;

    /**
     * @var string
     *
     * @ORM\Column(name="numerodocumentosol", type="string", length=12)
     */
    private $numerodocumentosol;

    /**
     * @var string
     *
     * @ORM\Column(name="celular", type="string", length=12)
     */
    private $celular;

    /**
     * @var string
     *
     * @ORM\Column(name="fijo", type="string", length=8)
     */
    private $fijo;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var int
     *
     * @ORM\Column(name="tipocliente", type="integer")
     */
    private $tipocliente;

    /**
     * @var string
     *
     * @ORM\Column(name="solicitudarreglo", type="text")
     */
    private $solicitudarreglo;


   


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
     * Set tipoInmueble
     *
     * @param integer $tipoInmueble
     * @return Postventa
     */
    public function setTipoInmueble($tipoInmueble)
    {
        $this->tipoInmueble = $tipoInmueble;

        return $this;
    }

    /**
     * Get tipoInmueble
     *
     * @return integer 
     */
    public function getTipoInmueble()
    {
        return $this->tipoInmueble;
    }

    /**
     * Set unidad
     *
     * @param string $unidad
     * @return Postventa
     */
    public function setUnidad($unidad)
    {
        $this->unidad = $unidad;

        return $this;
    }

    /**
     * Get unidad
     *
     * @return string 
     */
    public function getUnidad()
    {
        return $this->unidad;
    }

    /**
     * Set torreBloque
     *
     * @param string $torreBloque
     * @return Postventa
     */
    public function setTorreBloque($torreBloque)
    {
        $this->torreBloque = $torreBloque;

        return $this;
    }

    /**
     * Get torreBloque
     *
     * @return string 
     */
    public function getTorreBloque()
    {
        return $this->torreBloque;
    }

    /**
     * Set apartamento
     *
     * @param string $apartamento
     * @return Postventa
     */
    public function setApartamento($apartamento)
    {
        $this->apartamento = $apartamento;

        return $this;
    }

    /**
     * Get apartamento
     *
     * @return string 
     */
    public function getApartamento()
    {
        return $this->apartamento;
    }

    /**
     * Set fechaentrega
     *
     * @param string $fechaentrega
     * @return Postventa
     */
    public function setFechaentrega($fechaentrega)
    {
        $this->fechaentrega = $fechaentrega;

        return $this;
    }

    /**
     * Get fechaentrega
     *
     * @return string 
     */
    public function getFechaentrega()
    {
        return $this->fechaentrega;
    }

    /**
     * Set tipodocumento
     *
     * @param integer $tipodocumento
     * @return Postventa
     */
    public function setTipodocumento($tipodocumento)
    {
        $this->tipodocumento = $tipodocumento;

        return $this;
    }

    /**
     * Get tipodocumento
     *
     * @return integer 
     */
    public function getTipodocumento()
    {
        return $this->tipodocumento;
    }

    /**
     * Set numerodocumento
     *
     * @param string $numerodocumento
     * @return Postventa
     */
    public function setNumerodocumento($numerodocumento)
    {
        $this->numerodocumento = $numerodocumento;

        return $this;
    }

    /**
     * Get numerodocumento
     *
     * @return string 
     */
    public function getNumerodocumento()
    {
        return $this->numerodocumento;
    }

    /**
     * Set nombrepropietario
     *
     * @param string $nombrepropietario
     * @return Postventa
     */
    public function setNombrepropietario($nombrepropietario)
    {
        $this->nombrepropietario = $nombrepropietario;

        return $this;
    }

    /**
     * Get nombrepropietario
     *
     * @return string 
     */
    public function getNombrepropietario()
    {
        return $this->nombrepropietario;
    }

    /**
     * Set nombreapellidosol
     *
     * @param string $nombreapellidosol
     * @return Postventa
     */
    public function setNombreapellidosol($nombreapellidosol)
    {
        $this->nombreapellidosol = $nombreapellidosol;

        return $this;
    }

    /**
     * Get nombreapellidosol
     *
     * @return string 
     */
    public function getNombreapellidosol()
    {
        return $this->nombreapellidosol;
    }

    /**
     * Set tipodocumentosol
     *
     * @param integer $tipodocumentosol
     * @return Postventa
     */
    public function setTipodocumentosol($tipodocumentosol)
    {
        $this->tipodocumentosol = $tipodocumentosol;

        return $this;
    }

    /**
     * Get tipodocumentosol
     *
     * @return integer 
     */
    public function getTipodocumentosol()
    {
        return $this->tipodocumentosol;
    }

    /**
     * Set numerodocumentosol
     *
     * @param string $numerodocumentosol
     * @return Postventa
     */
    public function setNumerodocumentosol($numerodocumentosol)
    {
        $this->numerodocumentosol = $numerodocumentosol;

        return $this;
    }

    /**
     * Get numerodocumentosol
     *
     * @return string 
     */
    public function getNumerodocumentosol()
    {
        return $this->numerodocumentosol;
    }

    /**
     * Set celular
     *
     * @param string $celular
     * @return Postventa
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;

        return $this;
    }

    /**
     * Get celular
     *
     * @return string 
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * Set fijo
     *
     * @param string $fijo
     * @return Postventa
     */
    public function setFijo($fijo)
    {
        $this->fijo = $fijo;

        return $this;
    }

    /**
     * Get fijo
     *
     * @return string 
     */
    public function getFijo()
    {
        return $this->fijo;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Postventa
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
     * Set tipocliente
     *
     * @param integer $tipocliente
     * @return Postventa
     */
    public function setTipocliente($tipocliente)
    {
        $this->tipocliente = $tipocliente;

        return $this;
    }

    /**
     * Get tipocliente
     *
     * @return integer 
     */
    public function getTipocliente()
    {
        return $this->tipocliente;
    }

    /**
     * Set solicitudarreglo
     *
     * @param string $solicitudarreglo
     * @return Postventa
     */
    public function setSolicitudarreglo($solicitudarreglo)
    {
        $this->solicitudarreglo = $solicitudarreglo;

        return $this;
    }

    /**
     * Get solicitudarreglo
     *
     * @return string 
     */
    public function getSolicitudarreglo()
    {
        return $this->solicitudarreglo;
    }

    /**
     * Set proyecto
     *
     * @param \GestionBundle\Entity\Proyectos $proyecto
     * @return Postventa
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
