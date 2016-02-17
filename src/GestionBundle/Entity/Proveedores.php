<?php

namespace GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Proveedores
 *
 * @ORM\Table(name="proveedores")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\proveedoresRepository")
 */
class Proveedores
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
     * @ORM\Column(name="cedula", type="string", length=15)
     */
    private $cedula;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=60)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=150)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=15)
     */
    private $telefono;


    /**
     * @var string
     *
     * @ORM\Column(name="urldocumento", type="string", length=255)
     */
    private $urldocumento;

    /**
     * @ORM\ManyToOne(targetEntity="Departamento", inversedBy="proveedores")
     * @ORM\JoinColumn(name="departamento_id", referencedColumnName="id")
     */
    protected $departamento;


    /**
     * @ORM\ManyToOne(targetEntity="Ciudad", inversedBy="proveedores")
     * @ORM\JoinColumn(name="ciudad_id", referencedColumnName="id")
     */
    protected $ciudad;

    /**
     * @Assert\File(maxSize="6000000")
     */
    private $file;


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
     * @return proveedores
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
     * Set direccion
     *
     * @param string $direccion
     * @return proveedores
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return proveedores
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
     * Set propuesta
     *
     * @param string $propuesta
     * @return proveedores
     */
    public function setUrldocumento($urldocumento)
    {
        $this->urldocumento = $urldocumento;

        return $this;
    }

    /**
     * Get propuesta
     *
     * @return string 
     */
    public function getUrldocumento()
    {
        return $this->urldocumento;
    }

    

    /**
     * Set departamento
     *
     * @param \GestionBundle\Entity\Departamento $departamento
     * @return Proveedores
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
     * Set ciudad
     *
     * @param \GestionBundle\Entity\Ciudad $ciudad
     * @return Proveedores
     */
    public function setCiudad(\GestionBundle\Entity\Ciudad $ciudad = null)
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    /**
     * Get ciudad
     *
     * @return \GestionBundle\Entity\Ciudad 
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }


    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }

    public function getWebPath()
    {
        return null === $this->propuesta ? null : $this->getUploadDir().'/'.$this->propuesta;
    }

    protected function getUploadRootDir($basepath)
    {
        // the absolute directory path where uploaded documents should be saved
        return $basepath.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
        return 'uploads/proveedores';
    }

    public function upload($basepath = '')
    {
        // the file property can be empty if the field is not required
        if (null === $this->file) {
            return;
        }

        if (null === $basepath) {
            return;
        }

        // we use the original file name here but you should
        // sanitize it at least to avoid any security issues

        //capturo al extencion original del archivo
        $ext = $this->file->guessClientExtension();
        $new_name = $this->getUploadDir().'/'. mt_rand(0,9999999999).".".$ext;


        // move takes the target directory and then the target filename to move to
        $this->file->move($this->getUploadRootDir($basepath), $new_name );

        // set the path property to the filename where you'ved saved the file
        $this->setUrldocumento($new_name);

        // clean up the file property as you won't need it anymore
        $this->file = null;
    }

    /**
     * Set cedula
     *
     * @param string $cedula
     * @return Proveedores
     */
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;

        return $this;
    }

    /**
     * Get cedula
     *
     * @return string 
     */
    public function getCedula()
    {
        return $this->cedula;
    }
}
