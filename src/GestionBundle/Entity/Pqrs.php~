<?php

namespace GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pqrs
 *
 * @ORM\Table(name="pqrs")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\PqrsRepository")
 */
class Pqrs
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
     * @ORM\Column(name="tipo", type="integer")
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="nombres", type="string", length=100)
     */
    private $nombres;

    /**
     * @var string
     *
     * @ORM\Column(name="apellidos", type="string", length=130)
     */
    private $apellidos;

    /**
     * @var int
     *
     * @ORM\Column(name="tdocumento", type="integer")
     */
    private $tdocumento;

    /**
     * @var string
     *
     * @ORM\Column(name="documento", type="string", length=12)
     */
    private $documento;

    /**
     * @var string
     *
     * @ORM\Column(name="celular", type="string", length=11)
     */
    private $celular;

    /**
     * @var string
     *
     * @ORM\Column(name="telefonof", type="string", length=20)
     */
    private $telefonof;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=200)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="cuentanos", type="text")
     */
    private $texto;

    /**
     * @ORM\ManyToOne(targetEntity="Proyectos", inversedBy="pqrs")
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
     * Set tipo
     *
     * @param string $tipo
     * @return Pqrs
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set nombres
     *
     * @param string $nombres
     * @return Pqrs
     */
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;

        return $this;
    }

    /**
     * Get nombres
     *
     * @return string 
     */
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     * @return Pqrs
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
     * Set tdocumento
     *
     * @param integer $tdocumento
     * @return Pqrs
     */
    public function setTdocumento($tdocumento)
    {
        $this->tdocumento = $tdocumento;

        return $this;
    }

    /**
     * Get tdocumento
     *
     * @return integer 
     */
    public function getTdocumento()
    {
        return $this->tdocumento;
    }

    /**
     * Set documento
     *
     * @param string $documento
     * @return Pqrs
     */
    public function setDocumento($documento)
    {
        $this->documento = $documento;

        return $this;
    }

    /**
     * Get documento
     *
     * @return string 
     */
    public function getDocumento()
    {
        return $this->documento;
    }

    /**
     * Set celular
     *
     * @param string $celular
     * @return Pqrs
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
     * Set telefonof
     *
     * @param string $telefonof
     * @return Pqrs
     */
    public function setTelefonof($telefonof)
    {
        $this->telefonof = $telefonof;

        return $this;
    }

    /**
     * Get telefonof
     *
     * @return string 
     */
    public function getTelefonof()
    {
        return $this->telefonof;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Pqrs
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
     * Set texto
     *
     * @param string $texto
     * @return Pqrs
     */
    public function setTexto($texto)
    {
        $this->texto = $texto;

        return $this;
    }

    /**
     * Get texto
     *
     * @return string 
     */
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * Set proyecto
     *
     * @param \GestionBundle\Entity\Proyectos $proyecto
     * @return Pqrs
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
