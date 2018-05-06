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
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


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
     * permet de parcourir un tableau d'objets et changer l'etat pour chaque element
     * selon la valeur de $value true/false
     */
    private function setStatus($objects,$value)
    {
        foreach ($objects as $object) {
            $object->setDeleted($value);
        }
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
    public function getActiveOrders($active){
        return $this->repository->getActiveOrders($active);
    }
    /**
     * Retourner une seule commande selon l'id
     *
     */
    public function getOrder($id){
        return $this->repository->find($id);
    }

}