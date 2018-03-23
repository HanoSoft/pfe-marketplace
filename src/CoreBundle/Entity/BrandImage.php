<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * BrandImage
 *
 * @ORM\Table(name="brand_image")
 * @ORM\Entity(repositoryClass="CoreBundle\Repository\BrandImageRepository")
 */
class BrandImage
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
        return 'uploads/brand';
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
     * @return BrandImage
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
}
