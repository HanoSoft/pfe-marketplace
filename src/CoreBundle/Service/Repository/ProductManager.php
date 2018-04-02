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

class ProductManager extends RepositoryManager
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
    protected function setDeleted($objects,$value){
        foreach ( $objects as $object){
            $object->setDeleted($value);
        }
    }
    public function add($form)
    {
        $product = new Product();
        $product = $form->getData();
        $this->save($product);
        return $product->getId();
    }
    public function edit($form,$id)
    {
        $product=$this->find($id);
        $product=$form->getData();
        $this->save($product);
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
        $this->setDeleted($images,true);
        $this->setDeleted($sizes,true);
        $this->save($product);
    }
    public function enable($id)
    {
        $product=$this->find($id);
        if (null === $product) {
            throw new NotFoundHttpException("le Produit de l'".$id." n'existe pas.");
        }
        $product->setDeleted(false);
        $images=$product->getImages();
        $sizes=$product->getSizes();
        $this->setDeleted($images,false);
        $this->setDeleted($sizes,false);
        $this->save($product);
    }
}