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