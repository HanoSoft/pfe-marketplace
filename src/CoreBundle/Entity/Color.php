<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Color
 *
 * @ORM\Table(name="color")
 * @ORM\Entity(repositoryClass="CoreBundle\Repository\ColorRepository")
 */
class Color
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
     * @ORM\Column(name="colorName", type="string", length=255)
     */
    private $colorName;

    
    /**
     * @var string
     *
     * @ORM\Column(name="deleted", type="boolean")
     */
    private $deleted=false;

    /**
     *@ORM\OneToMany(targetEntity="CoreBundle\Entity\Product",mappedBy="color")
     * @ORM\JoinColumn(nullable=false)
     */

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
     * Set colorName
     *
     * @param string $colorName
     *
     * @return Color
     */
    public function setColorName($colorName)
    {
        $this->colorName = $colorName;

        return $this;
    }

    /**
     * Get colorName
     *
     * @return string
     */
    public function getColorName()
    {
        return $this->colorName;
    }

    /**
     * Set deleted
     *
     * @param boolean $deleted
     *
     * @return Color
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * Get deleted
     *
     * @return boolean
     */
    public function getDeleted()
    {
        return $this->deleted;
    }
}
