<?php
/**
 * Created by PhpStorm.
 * User: nouha
 * Date: 06/05/2018
 * Time: 12:19
 */

namespace CoreBundle\Service;

use CoreBundle\Entity\Orders;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class OrderService
{
    /**
     * @var EntityRepository
     */
    private $repository;

    public function __construct(EntityManager $em)
    {
        $this->repository=$em->getRepository(Orders::class);
    }

    /**
     * Return all orders
     * @return array \CoreBundle\Entity\Orders
     */
    public function getOrders(){
        return $this->repository->findAll();
    }
    /**
     * Return a order list according to the variable $active
     * @param boolean $active it represents the order status.
     * @return array \CoreBundle\Entity\Orders
     */
    public function getActiveOrders($active,$id){
        return $this->repository->getActiveOrders($active,$id);
    }
    /**
     * return a single order according to the Id
     * @param number $id it represents the order Id
     * @return \CoreBundle\Entity\Orders
     */
    public function getOrder($id){
        return $this->repository->find($id);
    }
}