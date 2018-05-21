<?php
/**
 * Created by PhpStorm.
 * User: nouha
 * Date: 08/05/2018
 * Time: 14:46
 */

namespace CoreBundle\Service;

use CoreBundle\Entity\Item;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class ItemService
{
    /**
     * @var EntityRepository
     */
    private $repository;

    public function __construct(EntityManager $em)
    {
        $this->repository=$em->getRepository(Item::class);
    }
    /**
     * Retourner la liste  des articles
     * return array
     */
    public function getItems(){
        return $this->repository->findAll();
    }
    /**
     * Retourner la liste  des articles selon la variable $active
     * $active prend 2 valeur true ou false
     * return array
     */
    public function getActiveItems($active,$id){
        return $this->repository->getActiveItems($active,$id);
    }
    /**
     * Retourner un seul article selon l'id
     *
     */
    public function getItem($id){
        return $this->repository->find($id);
    }
}