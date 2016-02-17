<?php

namespace PruebaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Producto
 *
 * @ORM\Table(name="producto")
 * @ORM\Entity(repositoryClass="PruebaBundle\Repository\ProductoRepository")
 */
class Producto
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
     * @ORM\ManyToOne(targetEntity="Categoria", inversedBy="productos")
     * @ORM\JoinColumn(name="categoria_id", referencedColumnName="id")
     */
    protected $producto;

    /**
     * @ORM\OneToMany(targetEntity="Seleccion", mappedBy="producto")
     */
    protected $selecciones;


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
     * @return Producto
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
     * Set categoria
     *
     * @param \PruebaBundle\Entity\Categoria $categoria
     * @return Producto
     */
    public function setCategoria(\PruebaBundle\Entity\Categoria $categoria = null)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return \PruebaBundle\Entity\Categoria 
     */
    public function getCategoria()
    {
        return $this->categoria;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->selecciones = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set producto
     *
     * @param \PruebaBundle\Entity\Categoria $producto
     * @return Producto
     */
    public function setProducto(\PruebaBundle\Entity\Categoria $producto = null)
    {
        $this->producto = $producto;

        return $this;
    }

    /**
     * Get producto
     *
     * @return \PruebaBundle\Entity\Categoria 
     */
    public function getProducto()
    {
        return $this->producto;
    }

    /**
     * Add selecciones
     *
     * @param \PruebaBundle\Entity\Seleccion $selecciones
     * @return Producto
     */
    public function addSeleccione(\PruebaBundle\Entity\Seleccion $selecciones)
    {
        $this->selecciones[] = $selecciones;

        return $this;
    }

    /**
     * Remove selecciones
     *
     * @param \PruebaBundle\Entity\Seleccion $selecciones
     */
    public function removeSeleccione(\PruebaBundle\Entity\Seleccion $selecciones)
    {
        $this->selecciones->removeElement($selecciones);
    }

    /**
     * Get selecciones
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSelecciones()
    {
        return $this->selecciones;
    }

    public function __toString()
    {
        return $this->nombre;
    }
}
