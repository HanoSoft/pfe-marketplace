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
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\OptimisticLockException;


class ProductManager  implements AbstractRepository
{
    /**
     * @var EntityRepository
     */
    private $repository;

    private $em;

    public function __construct(EntityManager $em)
    {
        $this->repository=$em->getRepository(Product::class);
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
        $product = new Product();
        $product = $form->getData();
        $this->save($product);

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