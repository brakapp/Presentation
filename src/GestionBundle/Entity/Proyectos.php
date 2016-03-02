<?php

namespace GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Proyectos
 *
 * @ORM\Table(name="proyectos")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\ProyectosRepository")
 */
class Proyectos
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
     * @ORM\Column(name="latitud", type="string", length=30)
     */
    private $latitud;

    /**
     * @var string
     *
     * @ORM\Column(name="longitud", type="string", length=30)
     */
    private $longitud;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text")
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=100)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="icono", type="string", length=200)
     */
    private $icono;

    /**
     * @var string
     *
     * @ORM\Column(name="video", type="text")
     */
    private $video;

    /**
     * @Assert\File(maxSize="6000000")
     */
    private $file;

    /**
     * @ORM\OneToMany(targetEntity="Proyectoimg", mappedBy="proyecto")
     */
    protected $proyectoimg;

    /**
     * @ORM\OneToMany(targetEntity="Proyectogeo", mappedBy="proyecto")
     */
    protected $proyectogeo;

    /**
     * @ORM\OneToMany(targetEntity="Planos", mappedBy="proyecto")
     */
    protected $planos;

    /**
     * @ORM\OneToMany(targetEntity="Slider", mappedBy="proyecto")
     */
    protected $slider;


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
     * @return Proyectos
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
     * Set latitud
     *
     * @param string $latitud
     * @return Proyectos
     */
    public function setLatitud($latitud)
    {
        $this->latitud = $latitud;

        return $this;
    }

    /**
     * Get latitud
     *
     * @return string 
     */
    public function getLatitud()
    {
        return $this->latitud;
    }

    /**
     * Set longitud
     *
     * @param string $longitud
     * @return Proyectos
     */
    public function setLongitud($longitud)
    {
        $this->longitud = $longitud;

        return $this;
    }

    /**
     * Get longitud
     *
     * @return string 
     */
    public function getLongitud()
    {
        return $this->longitud;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Proyectos
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Proyectos
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
        return null === $this->icono ? null : $this->getUploadDir().'/'.$this->icono;
    }

    protected function getUploadRootDir($basepath)
    {
        // the absolute directory path where uploaded documents should be saved
        return $basepath.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
        return 'uploads/proyectos';
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
        $new_name = $this->getUploadDir().'/'. mt_rand(0,9999999).".".$ext;


        // move takes the target directory and then the target filename to move to
        $this->file->move($this->getUploadRootDir($basepath), $new_name );

        // set the path property to the filename where you'ved saved the file
        $this->setIcono($new_name);

        // clean up the file property as you won't need it anymore
        $this->file = null;
    }

    /**
     * Set icono
     *
     * @param string $icono
     * @return Proyectos
     */
    public function setIcono($icono)
    {
        $this->icono = $icono;

        return $this;
    }

    /**
     * Get icono
     *
     * @return string 
     */
    public function getIcono()
    {
        return $this->icono;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->proyectoimg = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add proyectoimg
     *
     * @param \GestionBundle\Entity\Proyectoimg $proyectoimg
     * @return Proyectos
     */
    public function addProyectoimg(\GestionBundle\Entity\Proyectoimg $proyectoimg)
    {
        $this->proyectoimg[] = $proyectoimg;

        return $this;
    }

    /**
     * Remove proyectoimg
     *
     * @param \GestionBundle\Entity\Proyectoimg $proyectoimg
     */
    public function removeProyectoimg(\GestionBundle\Entity\Proyectoimg $proyectoimg)
    {
        $this->proyectoimg->removeElement($proyectoimg);
    }

    /**
     * Get proyectoimg
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProyectoimg()
    {
        return $this->proyectoimg;
    }

    public function __toString()
    {
        return $this->nombre;
    }

    /**
     * Add planos
     *
     * @param \GestionBundle\Entity\Planos $planos
     * @return Proyectos
     */
    public function addPlano(\GestionBundle\Entity\Planos $planos)
    {
        $this->planos[] = $planos;

        return $this;
    }

    /**
     * Remove planos
     *
     * @param \GestionBundle\Entity\Planos $planos
     */
    public function removePlano(\GestionBundle\Entity\Planos $planos)
    {
        $this->planos->removeElement($planos);
    }

    /**
     * Get planos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPlanos()
    {
        return $this->planos;
    }

    /**
     * Set video
     *
     * @param string $video
     * @return Proyectos
     */
    public function setVideo($video)
    {
        $this->video = $video;

        return $this;
    }

    /**
     * Get video
     *
     * @return string 
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * Add proyectogeo
     *
     * @param \GestionBundle\Entity\Proyectogeo $proyectogeo
     * @return Proyectos
     */
    public function addProyectogeo(\GestionBundle\Entity\Proyectogeo $proyectogeo)
    {
        $this->proyectogeo[] = $proyectogeo;

        return $this;
    }

    /**
     * Remove proyectogeo
     *
     * @param \GestionBundle\Entity\Proyectogeo $proyectogeo
     */
    public function removeProyectogeo(\GestionBundle\Entity\Proyectogeo $proyectogeo)
    {
        $this->proyectogeo->removeElement($proyectogeo);
    }

    /**
     * Get proyectogeo
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProyectogeo()
    {
        return $this->proyectogeo;
    }

    /**
     * Add slider
     *
     * @param \GestionBundle\Entity\Slider $slider
     * @return Proyectos
     */
    public function addSlider(\GestionBundle\Entity\Slider $slider)
    {
        $this->slider[] = $slider;

        return $this;
    }

    /**
     * Remove slider
     *
     * @param \GestionBundle\Entity\Slider $slider
     */
    public function removeSlider(\GestionBundle\Entity\Slider $slider)
    {
        $this->slider->removeElement($slider);
    }

    /**
     * Get slider
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSlider()
    {
        return $this->slider;
    }
}
