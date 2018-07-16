<?php
/**
 * Created by PhpStorm.
 * User: Hamdi
 * Date: 04/04/2018
 * Time: 10:31
 */

namespace CoreBundle\Service;

use CoreBundle\Entity\Product;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductService
{
    /**
     * @var EntityRepository
     */
    private $repository;

    public function __construct(EntityManager $em)
    {
        $this->repository=$em->getRepository(Product::class);
    }
    /**
     * browse an array of objects and change the status for each element
     * @param array $objects
     * @param boolean $value
     */
    private function setStatus($objects,$value)
    {
        foreach ($objects as $object) {
            $object->setDeleted($value);
        }
    }
    /**
     * Return all products
     * @return array \CoreBundle\Entity\Product
     */
    public function getProducts(){
        return $this->repository->findAll();
    }
    /**
     * Return a product list according to the variable $active
     * @param boolean $active it represents the product status.
     * @return array \CoreBundle\Entity\Product
     */
    public function getActiveProducts($active){
        return $this->repository->getActiveProducts($active);
    }
    /**
     * return a single product according to the Id
     * @param number $id it represents the product Id
     * @return \CoreBundle\Entity\Product
     */
    public function getProduct($id){
        return $this->repository->find($id);
    }
    /**
     * disable a product
     * @param number $id it represents the product Id
     */
    public function disableProduct($id){
        $product=$this->getProduct($id);
        if (null === $product) {
            throw new NotFoundHttpException("le Produit de l'".$id." n'existe pas.");
        }
        $product->setDeleted(true);
        $images=$product->getImages();
        $sizes=$product->getSizes();
        $this->setStatus($images,true);
        $this->setStatus($sizes,true);
    }
    /**
     * activate a product
     *@param number $id it represents the product Id
     */
    public function enableProduct($id){
        $product=$this->getProduct($id);
        if (null === $product) {
            throw new NotFoundHttpException("le Produit de l'".$id." n'existe pas.");
        }
        $product->setDeleted(false);
        $images=$product->getImages();
        $sizes=$product->getSizes();
        $this->setStatus($images,false);
        $this->setStatus($sizes,false);
    }
}