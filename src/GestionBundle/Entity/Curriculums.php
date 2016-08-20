<?php

namespace GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Curriculums
 *
 * @ORM\Table(name="curriculums")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\curriculumsRepository")
 */
class Curriculums
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
     * @ORM\Column(name="nombre", type="string", length=100)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="cedula", type="string", length=11)
     */
    private $cedula;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=200, unique=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="urldocumento", type="string", length=255)
     */
    private $urldocumento;

    /**
     * @ORM\ManyToOne(targetEntity="Cargos", inversedBy="curriculums")
     * @ORM\JoinColumn(name="cargo_id", referencedColumnName="id")
     */
    protected $cargo;

    /**
     * @Assert\File(maxSize="6000000")
     */
    private $file;


    /**
     * @ORM\ManyToOne(targetEntity="Departamento", inversedBy="curriculums")
     * @ORM\JoinColumn(name="departamento_id", referencedColumnName="id")
     */
    protected $departamento;

    /**
     * @ORM\ManyToOne(targetEntity="Ciudad", inversedBy="curriculums")
     * @ORM\JoinColumn(name="ciudad_id", referencedColumnName="id")
     */
    protected $ciudad;

    protected $route;

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
     * @return curriculums
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
     * @return curriculums
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
     * Set urlcurriculum
     *
     * @param string $urlcurriculum
     * @return curriculums
     */
    public function setUrldocumento($urldocumento)
    {
        $this->urldocumento = $urldocumento;

        return $this;
    }

    /**
     * Get urlcurriculum
     *
     * @return string 
     */
    public function getUrldocumento()
    {
        return $this->urldocumento;
    }

    /**
     * Set cargo
     *
     * @param \GestionBundle\Entity\Cargos $cargo
     * @return Curriculums
     */
    public function setCargo(\GestionBundle\Entity\Cargos $cargo = null)
    {
        $this->cargo = $cargo;

        return $this;
    }

    /**
     * Get cargo
     *
     * @return \GestionBundle\Entity\Cargos 
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * Set departamento
     *
     * @param \GestionBundle\Entity\Departamento $departamento
     * @return Curriculums
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
     * @return Curriculums
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
        return null === $this->urlcurriculum ? null : $this->getUploadDir().'/'.$this->urlcurriculum;
    }

    protected function getUploadRootDir($basepath)
    {
        // the absolute directory path where uploaded documents should be saved
        return $basepath.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
        return 'uploads/curriculums';
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
        $ext = $this->file->getClientOriginalExtension();
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
     * @return Curriculums
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
