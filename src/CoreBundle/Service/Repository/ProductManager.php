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
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductManager extends RepositoryManager implements AbstractRepository
{
    /**
     * @var EntityRepository
     */
    private $repository;

    private $em;

    public function __construct(EntityManager $em)
    {
        $repository=$em->getRepository(Product::class);
        $this->em=$em;
        parent::__construct($em,$repository);
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
}