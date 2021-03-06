<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Customer
 *
 * @ORM\Table(name="customer")
 * @ORM\Entity(repositoryClass="CoreBundle\Repository\CustomerRepository")
 */
class Customer
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
     * @ORM\Column(name="familyName", type="string", length=255,nullable=true)
     */
    private $familyName;

    /**
     * @var string
     *
     * @ORM\Column(name="birthDate", type="string",length=255,nullable=true)
     */
    private $birthDate;

    /**
     * @return string
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @param string $birthDate
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;
    }


    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255,nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="pwd", type="string", length=255)
     */
    private $pwd;

    /**
     *@ORM\OneToMany(targetEntity="CoreBundle\Entity\Address",mappedBy="customer")
     * @ORM\JoinColumn(nullable=true)
     */
    private $addresses;
    /**
     *@ORM\OneToMany(targetEntity="CoreBundle\Entity\Orders",mappedBy="customer")
     * @ORM\JoinColumn(nullable=true)
     */
    private $orders;

    /**
     * @return mixed
     */
    public function getAddresses()
    {
        return $this->addresses;
    }

    /**
     * @param mixed $addresses
     */
    public function setAddresses($addresses)
    {
        $this->addresses = $addresses;
    }



    /**
     * @var string
     *
     * @ORM\Column(name="sponsorshipCode", type="string", length=255,nullable=true)
     */
    private $sponsorshipCode;

    /**
     * @var string
     *
     * @ORM\Column(name="sponsorCode", type="string", length=255,nullable=true)
     */
    private $sponsorCode;


    /**
     * @var int
     *
     * @ORM\Column(name="phoneNumber", type="integer", nullable=true)
     */
    private $phoneNumber;

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
     * Set name
     *
     * @param string $name
     *
     * @return Customer
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
     * Set familyName
     *
     * @param string $familyName
     *
     * @return Customer
     */
    public function setFamilyName($familyName)
    {
        $this->familyName = $familyName;

        return $this;
    }

    /**
     * Get familyName
     *
     * @return string
     */
    public function getFamilyName()
    {
        return $this->familyName;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Customer
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set pwd
     *
     * @param string $pwd
     *
     * @return Customer
     */
    public function setPwd($pwd)
    {
        $this->pwd = $pwd;

        return $this;
    }

    /**
     * Get pwd
     *
     * @return string
     */
    public function getPwd()
    {
        return $this->pwd;
    }

    /**
     * Set sponsorshipCode
     *
     * @param string $sponsorshipCode
     *
     * @return Customer
     */
    public function setSponsorshipCode($sponsorshipCode)
    {
        $this->sponsorshipCode = $sponsorshipCode;

        return $this;
    }

    /**
     * Get sponsorshipCode
     *
     * @return string
     */
    public function getSponsorshipCode()
    {
        return $this->sponsorshipCode;
    }

    /**
     * Set sponsorCode
     *
     * @param string $sponsorCode
     *
     * @return Customer
     */
    public function setSponsorCode($sponsorCode)
    {
        $this->sponsorCode = $sponsorCode;

        return $this;
    }

    /**
     * Get sponsorCode
     *
     * @return string
     */
    public function getSponsorCode()
    {
        return $this->sponsorCode;
    }




    /**
     * Set phoneNumber
     *
     * @param integer $phoneNumber
     *
     * @return Customer
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return integer
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set deleted
     *
     * @param boolean $deleted
     *
     * @return Customer
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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->address = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add address
     *
     * @param \CoreBundle\Entity\Address $address
     *
     * @return Customer
     */
    public function addAddress(\CoreBundle\Entity\Address $address)
    {
        $this->address[] = $address;

        return $this;
    }

    /**
     * Remove address
     *
     * @param \CoreBundle\Entity\Address $address
     */
    public function removeAddress(\CoreBundle\Entity\Address $address)
    {
        $this->address->removeElement($address);
    }

    /**
     * Get address
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAddress()
    {
        return $this->address;
    }
}
