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
     * Return all items
     * @return array \CoreBundle\Entity\Item
     */
    public function getItems(){
        return $this->repository->findAll();
    }
    /**
     * Return a item list according to the variable $active
     * @param boolean $active it represents the item status.
     * @return array \CoreBundle\Entity\Item
     */
    public function getActiveItems($active,$id){
        return $this->repository->getActiveItems($active,$id);
    }
    /**
     * return a single item according to the Id
     * @param number $id it represents the item Id
     * @return \CoreBundle\Entity\Item
     */
    public function getItem($id){
        return $this->repository->find($id);
    }
}