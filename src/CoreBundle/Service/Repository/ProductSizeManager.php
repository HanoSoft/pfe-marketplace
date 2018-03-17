<?php
/**
 * Created by PhpStorm.
 * User: Hamdi
 * Date: 17/03/2018
 * Time: 19:54
 */

namespace CoreBundle\Service\Repository;

use CoreBundle\Entity\ProductSize;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\OptimisticLockException;

class ProductSizeManager implements AbstractRepository
{
    /**
     * @var EntityRepository
     */
    private $repository;
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->repository=$em->getRepository(ProductSize::class);
        $this->em=$em;
    }

    /**
     * @param $object
     */
    protected function save($object){
        $this->em->persist($object);
        try {
            $this->em->flush();
        } catch (OptimisticLockException $e) {
        }
    }

    public function add($form)
    {
        $size = new ProductSize();
        $size = $form->getData();
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

    public function getAll($value)
    {
        // TODO: Implement getAll() method.
    }

    public function find($id)
    {
        // TODO: Implement find() method.
    }
}