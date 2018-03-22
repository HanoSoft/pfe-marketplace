<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\ProductRepository")
 */
class Product
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
     * @ORM\Column(name="product_name", type="string", length=255)
     */
    private $productName;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * @var int
     *
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;

    /**
     * @var bool
     *
     * @ORM\Column(name="deleted", type="boolean")
     */
    private $deleted=false;

    /**
     *@ORM\OneToMany(targetEntity="CoreBundle\Entity\Image",mappedBy="product")
     * @ORM\JoinColumn(nullable=false)
     */
    private $images;

    /**
     * @var string
     *
     * @ORM\Column(name="product_details", type="string",length=10000)
     */

    private $productDetails;

    /**
     *@ORM\ManyToOne(targetEntity="CoreBundle\Entity\Color",inversedBy="products",cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */

      private $color;

    /**
     *@ORM\OneToMany(targetEntity="CoreBundle\Entity\ProductSize",mappedBy="product")
     * @ORM\JoinColumn(nullable=true)
     */
    private $sizes;

    /**
     *@ORM\ManyToOne(targetEntity="CoreBundle\Entity\Category",inversedBy="products",cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

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
     * Set productName
     *
     * @param string $productName
     *
     * @return Product
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;

        return $this;
    }

    /**
     * Get productName
     *
     * @return string
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return Product
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set deleted
     *
     * @param boolean $deleted
     *
     * @return Product
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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->images = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add image
     *
     * @param \CoreBundle\Entity\Image $image
     *
     * @return Product
     */
    public function addImage(\CoreBundle\Entity\Image $image)
    {
        $this->images[] = $image;

        return $this;
    }

    /**
     * Remove image
     *
     * @param \CoreBundle\Entity\Image $image
     */
    public function removeImage(\CoreBundle\Entity\Image $image)
    {
        $this->images->removeElement($image);
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Set productDetails
     *
     * @param string $productDetails
     *
     * @return Product
     */
    public function setProductDetails($productDetails)
    {
        $this->productDetails = $productDetails;

        return $this;
    }

    /**
     * Get productDetails
     *
     * @return string
     */
    public function getProductDetails()
    {
        return $this->productDetails;
    }

    /**
     * Set category
     *
     * @param \CoreBundle\Entity\Category $category
     *
     * @return Product
     */
    public function setCategory(\CoreBundle\Entity\Category $category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \CoreBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }



    /**
     * Add size
     *
     * @param \CoreBundle\Entity\ProductSize $size
     *
     * @return Product
     */
    public function addSize(\CoreBundle\Entity\ProductSize $size)
    {
        $this->sizes[] = $size;

        return $this;
    }

    /**
     * Remove size
     *
     * @param \CoreBundle\Entity\ProductSize $size
     */
    public function removeSize(\CoreBundle\Entity\ProductSize $size)
    {
        $this->sizes->removeElement($size);
    }

    /**
     * Get sizes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSizes()
    {
        return $this->sizes;
    }

    /**
     * Set color
     *
     * @param \CoreBundle\Entity\Color $color
     *
     * @return Product
     */
    public function setColor(\CoreBundle\Entity\Color $color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return \CoreBundle\Entity\Color
     */
    public function getColor()
    {
        return $this->color;
    }
}
