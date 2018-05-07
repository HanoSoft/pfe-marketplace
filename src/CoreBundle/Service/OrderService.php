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
     * Retourner la liste  des commandes
     * return array
     */
    public function getOrders(){
        return $this->repository->findAll();
    }
    /**
     * Retourner la liste  des commandes selon la variable $active
     * $active prend 2 valeur true ou false
     * return array
     */
    public function getActiveOrders($active,$id){
        return $this->repository->getActiveOrders($active,$id);
    }
    /**
     * Retourner une seule commande selon l'id
     *
     */
    public function getOrder($id){
        return $this->repository->find($id);
    }


}