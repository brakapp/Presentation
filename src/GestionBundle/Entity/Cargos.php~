<?php

namespace GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cargos
 *
 * @ORM\Table(name="cargos")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\cargosRepository")
 */
class Cargos
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
     * @ORM\Column(name="nombre", type="string", length=255, unique=true)
     */
    private $nombre;

    /**
     * @ORM\OneToMany(targetEntity="Curriculums", mappedBy="cargo")
     */
    protected $curriculums;


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
     * @return cargos
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
        $this->curriculums = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add curriculums
     *
     * @param \GestionBundle\Entity\Curriculums $curriculums
     * @return Cargos
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


    public function __toString()
    {
        return $this->nombre;
    }
}
