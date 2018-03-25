<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Brand
 *
 * @ORM\Table(name="brand")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\BrandRepository")
 */
class Brand
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
     * @ORM\Column(name="description", type="string", length=10000)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="brandName", type="string", length=10000)
     */
    private $brandName;

    /**
     * @var bool
     *
     * @ORM\Column(name="deleted", type="boolean")
     */
    private $deleted=false;

    /**
     *@ORM\OneToMany(targetEntity="CoreBundle\Entity\Category",mappedBy="brand")
     * @ORM\JoinColumn(nullable=true)
     */
    private $categories;

    /**
     *@ORM\OneToOne(targetEntity="CoreBundle\Entity\BrandImage",cascade={"persist","remove"})
     */
    private $brandImage;

    /**
     *@ORM\OneToOne(targetEntity="CoreBundle\Entity\BrandImage",cascade={"persist","remove"})
     */
    private $logo;
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
     * Set description
     *
     * @param string $description
     *
     * @return Brand
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set deleted
     *
     * @param boolean $deleted
     *
     * @return Brand
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
        $this->categories = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add category
     *
     * @param \CoreBundle\Entity\Category $category
     *
     * @return Brand
     */
    public function addCategory(\CoreBundle\Entity\Category $category)
    {
        $this->categories[] = $category;

        return $this;
    }

    /**
     * Remove category
     *
     * @param \CoreBundle\Entity\Category $category
     */
    public function removeCategory(\CoreBundle\Entity\Category $category)
    {
        $this->categories->removeElement($category);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Set brandImage
     *
     * @param \CoreBundle\Entity\BrandImage $brandImage
     *
     * @return Brand
     */
    public function setBrandImage(\CoreBundle\Entity\BrandImage $brandImage = null)
    {
        $this->brandImage = $brandImage;

        return $this;
    }

    /**
     * Get brandImage
     *
     * @return \CoreBundle\Entity\BrandImage
     */
    public function getBrandImage()
    {
        return $this->brandImage;
    }

    /**
     * Set logo
     *
     * @param \CoreBundle\Entity\BrandImage $logo
     *
     * @return Brand
     */
    public function setLogo(\CoreBundle\Entity\BrandImage $logo = null)
    {
        $this->logo = $logo;

        return $this;
    }
    /**
     * Get logo
     *
     * @return \CoreBundle\Entity\BrandImage
     */
    public function getLogo()
    {
        return $this->logo;
    }
    /**
     * Set brandName
     *
     * @param string $brandName
     *
     * @return Brand
     */
    public function setBrandName($brandName)
    {
        $this->brandName = $brandName;

        return $this;
    }
    /**
     * Get brandName
     *
     * @return string
     */
    public function getBrandName()
    {
        return $this->brandName;
    }
}
