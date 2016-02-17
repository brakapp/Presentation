<?php

namespace GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * proyectoimg
 *
 * @ORM\Table(name="proyectoimg")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\proyectoimgRepository")
 */
class Proyectoimg
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
     * @ORM\Column(name="imagen", type="string", length=200)
     */
    private $imagen;

    /**
     * @Assert\File(maxSize="6000000")
     */
    private $file;

    /**
     * @ORM\ManyToOne(targetEntity="Proyectos", inversedBy="proyectoimg")
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
     * Set imagen
     *
     * @param string $imagen
     * @return proyectoimg
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get imagen
     *
     * @return string 
     */
    public function getImagen()
    {
        return $this->imagen;
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
        return null === $this->imagen ? null : $this->getUploadDir().'/'.$this->imagen;
    }

    protected function getUploadRootDir($basepath)
    {
        // the absolute directory path where uploaded documents should be saved
        return $basepath.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
        return 'uploads/proyectosimg';
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
        $this->setImagen($new_name);

        // clean up the file property as you won't need it anymore
        $this->file = null;
    }

    /**
     * Set proyecto
     *
     * @param \GestionBundle\Entity\Proyectos $proyecto
     * @return Proyectoimg
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
