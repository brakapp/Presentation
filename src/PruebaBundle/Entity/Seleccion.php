<?php

namespace PruebaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Seleccion
 *
 * @ORM\Table(name="seleccion")
 * @ORM\Entity(repositoryClass="PruebaBundle\Repository\SeleccionRepository")
 */
class Seleccion
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
     * @ORM\Column(name="codigo", type="string", length=10)
     */
    private $codigo;

    /**
     * @ORM\ManyToOne(targetEntity="Categoria", inversedBy="selecciones")
     * @ORM\JoinColumn(name="categoria_id", referencedColumnName="id")
     */
    protected $categoria;

    /**
     * @ORM\ManyToOne(targetEntity="Producto", inversedBy="selecciones")
     * @ORM\JoinColumn(name="producto_id", referencedColumnName="id")
     */
    protected $productos;


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
     * Set codigo
     *
     * @param string $codigo
     * @return Seleccion
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set categoria
     *
     * @param \PruebaBundle\Entity\Categoria $categoria
     * @return Seleccion
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
     * Set productos
     *
     * @param \PruebaBundle\Entity\Producto $productos
     * @return Seleccion
     */
    public function setProductos(\PruebaBundle\Entity\Producto $productos = null)
    {
        $this->productos = $productos;

        return $this;
    }

    /**
     * Get productos
     *
     * @return \PruebaBundle\Entity\Producto 
     */
    public function getProductos()
    {
        return $this->productos;
    }
}
