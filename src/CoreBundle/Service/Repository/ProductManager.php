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
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
    protected function setDeleted($objects){
        foreach ( $objects as $object){
            $object->setDeleted(true);
        }
    }
    public function add($form)
    {
        $product = new Product();
        $product = $form->getData();
        $this->save($product);
        return $product->getId();
    }
    public function edit($form)
    {
        // TODO: Implement edit() method.
    }
    public function delete($id)
    {
        $product=$this->find($id);
        if (null === $product) {
            throw new NotFoundHttpException("le Produit de l'".$id." n'existe pas.");
        }
        $product->setDeleted(true);
        $images=$product->getImages();
        $sizes=$product->getSizes();
        $this->setDeleted($images);
        $this->setDeleted($sizes);
        $this->save($product);
    }
    public function getAll($value)
    {
        $qb = $this->repository->createQueryBuilder('p');
        $qb
            ->where('p.deleted = :deleted')
            ->setParameter('deleted', $value) ;
        return $qb->getQuery()->getResult();
    }
    public function find($id)
    {
       return $this->repository->find($id);
    }
}