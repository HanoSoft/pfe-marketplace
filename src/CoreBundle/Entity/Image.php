<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
/**
 * Image
 *
 * @ORM\Table(name="image")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\ImageRepository")
 */
class Image
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=255)
     */
    private $label;

    /**
     * @var bool
     *
     * @ORM\Column(name="deleted", type="boolean")
     */
    private $deleted;

    /**
     *@ORM\ManyToOne(targetEntity="CoreBundle\Entity\Product",inversedBy="images",cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $product;

    private $file;

    public function upload()
    {

        if (null === $this->file) {
            return;
        }
        $date=new \Datetime();
        $dateString= $date->format('Y-m-d-H-i-s');

        $name =$dateString. $this->file->getClientOriginalName();


        $this->file->move($this->getUploadRootDir(), $name);


        $this->name = $name;


    }

    public function getUploadDir()
    {
             return 'uploads/product';
    }

    protected function getUploadRootDir()
    {

        return __DIR__.'/../../../web/'.$this->getUploadDir();
    }



    public function getFile()
    {
        return $this->file;
    }

    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }






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
     * Set name
     *
     * @param string $name
     *
     * @return Image
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set label
     *
     * @param string $label
     *
     * @return Image
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set deleted
     *
     * @param boolean $deleted
     *
     * @return Image
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
     * Set product
     *
     * @param \CoreBundle\Entity\Product $product
     *
     * @return Image
     */
    public function setProduct(\CoreBundle\Entity\Product $product)
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
}
