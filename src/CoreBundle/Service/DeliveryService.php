<?php
/**
 * Created by PhpStorm.
 * User: nouha
 * Date: 13/05/2018
 * Time: 13:33
 */

namespace CoreBundle\Service;

use CoreBundle\Entity\Delivery;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class DeliveryService
{
    /**
     * @var EntityRepository
     */
    private $repository;

    public function __construct(EntityManager $em)
    {
        $this->repository=$em->getRepository(Delivery::class);
    }

    /**
     * Return all deliveries
     * @return array \CoreBundle\Entity\Delivery
     */
    public function getDeliveries(){
        return $this->repository->findAll();
    }
    /**
     * Return a delivery list according to the variable $active
     * @param boolean $active it represents the delivery status.
     * @return array \CoreBundle\Entity\Delivery
     */
    public function getActiveDeliveries($active){
        return $this->repository->getActiveDeliveries($active);
    }
    /**
     * return a single delivery according to the Id
     * @param number $id it represents the delivery Id
     * @return \CoreBundle\Entity\Delivery
     */
    public function getDelivery($id){
        return $this->repository->find($id);
    }

}