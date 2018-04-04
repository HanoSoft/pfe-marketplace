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
     * permet de parcourir un tableau d'objets et changer l'etat pour chaque elemnt
     * selon la valeur de $value true/false
     */
    private function setStatus($objects,$value)
    {
        foreach ($objects as $object) {
            $object->setDeleted($value);
        }
    }
    /**
     * Retourner la liste  des produits
     * return array
     */
    public function getProducts(){
        return $this->repository->findAll();
    }
    /**
     * Retourner la liste  des produits actives
     * return array
     */
    public function getActiveProducts(){
        return $this->repository->getActiveProducts();
    }
    /**
     * Retourner un seul produit selon l'id
     *
     */
    public function getProduct($id){
        return $this->repository->find($id);
    }
    /**
     * permet de désactiver un produit
     *
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
     * permet d'activer un produit
     *
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