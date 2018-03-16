<?php
/**
 * Created by PhpStorm.
 * User: Hamdi
 * Date: 16/03/2018
 * Time: 12:13
 */

namespace CoreBundle\Service\Repository;


use CoreBundle\Entity\Product;
use Doctrine\ORM\EntityManager;


class ProductManager extends RepositoryManager implements \AbstractRepository
{
    public function __construct()
    {   $em=$this->getEntityManager();
        $repository=$em->getRepository(Product::class);
        parent::__construct($em,$repository);
    }


    public function add()
    {
        // TODO: Implement add() method.
    }

    public function edit()
    {
        // TODO: Implement edit() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
    }
}