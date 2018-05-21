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
     * Retourner la liste  des livraisons
     * return array
     */
    public function getDeliveries(){
        return $this->repository->findAll();
    }
    /**
     * Retourner la liste  des livraisons selon la variable $active
     * $active prend 2 valeur true ou false
     * return array
     */
    public function getActiveDeliveries($active){
        return $this->repository->getActiveDeliveries($active);
    }
    /**
     * Retourner un seul livraison selon l'id
     *
     */
    public function getDelivery($id){
        return $this->repository->find($id);
    }

}