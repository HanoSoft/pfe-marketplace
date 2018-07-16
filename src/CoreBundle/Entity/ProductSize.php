<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductSize
 *
 * @ORM\Table(name="product_size")
 * @ORM\Entity(repositoryClass="CoreBundle\Repository\ProductSizeRepository")
 */
class ProductSize
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
     * @ORM\Column(name="size", type="string", length=255)
     */
    private $size;


    /**
     *@ORM\ManyToOne(targetEntity="CoreBundle\Entity\Product",inversedBy="sizes",cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=true,onDelete="CASCADE")
     */
    private $product;

    /**
     * @var bool
     *
     * @ORM\Column(name="deleted", type="boolean")
     */
    private $deleted=false;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set size
     *
     * @param string $size
     *
     * @return ProductSize
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return string
     */
    public function getSize()
    {
        return $this->size;
    }



    /**
     * Set product
     *
     * @param \CoreBundle\Entity\Product $product
     *
     * @return ProductSize
     */
    public function setProduct(\CoreBundle\Entity\Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \CoreBundle\Entity\Product
     */
    public function getProduct()
    {
        return $this->product;
    }
    /**
     * Set deleted
     *
     * @param boolean $deleted
     *
     * @return ProductSize
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * Get deleted
     *
     * @return bool
     */
    public function getDeleted()
    {
        return $this->deleted;
    }
}
