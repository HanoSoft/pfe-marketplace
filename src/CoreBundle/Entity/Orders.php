<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Orders
 *
 * @ORM\Table(name="orders")
 * @ORM\Entity(repositoryClass="CoreBundle\Repository\OrdersRepository")
 */
class Orders
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
     * @var \string
     *
     * @ORM\Column(name="orderDate", type="string", length=255,nullable=true)
     */
    private $orderDate;

    /**
     * @var string
     *
     * @ORM\Column(name="amount", type="decimal", precision=10, scale=0)
     */
    private $amount;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255,nullable=true)
     */
    private $status;

    /**
     * @return string
     */
    public function getOrderDate()
    {
        return $this->orderDate;
    }

    /**
     * @param string $orderDate
     */
    public function setOrderDate($orderDate)
    {
        $this->orderDate = $orderDate;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getDeliveryDate()
    {
        return $this->deliveryDate;
    }

    /**
     * @param string $deliveryDate
     */
    public function setDeliveryDate($deliveryDate)
    {
        $this->deliveryDate = $deliveryDate;
    }

    /**
     * @return mixed
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param mixed $customer
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;
    }

    /**
     * @return mixed
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param mixed $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }

    /**
     * @var \string
     *
     * @ORM\Column(name="deliveryDate", type="string", length=255,nullable=true)
     */
    private $deliveryDate;


    /**
     * @var bool
     *
     * @ORM\Column(name="deleted", type="boolean")
     */
    private $deleted = false;

    /**
     *@ORM\ManyToOne(targetEntity="CoreBundle\Entity\Customer",inversedBy="orders",cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $customer;

    /**
     *@ORM\OneToMany(targetEntity="CoreBundle\Entity\Item",mappedBy="order")
     * @ORM\JoinColumn(nullable=true)
     */
    private $items;
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
     * Set amount
     *
     * @param string $amount
     *
     * @return Orders
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Orders
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }




    /**
     * Set deleted
     *
     * @param boolean $deleted
     *
     * @return Orders
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

