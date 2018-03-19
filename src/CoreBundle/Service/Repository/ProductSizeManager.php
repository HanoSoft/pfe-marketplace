<?php
/**
 * Created by PhpStorm.
 * User: Hamdi
 * Date: 17/03/2018
 * Time: 19:54
 */

namespace CoreBundle\Service\Repository;

use CoreBundle\Entity\Product;
use CoreBundle\Entity\ProductSize;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\OptimisticLockException;

class ProductSizeManager extends RepositoryManager  implements AbstractRepository
{
    /**
     * @var EntityRepository
     */
    private $repository;
    private $em;
    /**
     * @var ProductManager
     */
    private $productManager;

    public function __construct(EntityManager $em,ProductManager $productManager)
    {
        $repository=$em->getRepository(ProductSize::class);
        $this->em=$em;
        $this->productManager=$productManager;
        parent::__construct($em,$repository);
    }

    public function addSize($id,$form){
        $product=$this->productManager->find($id);
        $size = new ProductSize();
        $size = $form->getData();
        $size->setProduct($product);
        $this->save($size);
    }
    public function edit($from)
    {
        // TODO: Implement edit() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function find($id)
    {
        // TODO: Implement find() method.
    }

    public function add($form)
    {
        // TODO: Implement add() method.
    }
}