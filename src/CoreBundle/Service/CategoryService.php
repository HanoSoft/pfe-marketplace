<?php
/**
 * Created by PhpStorm.
 * User: nouha
 * Date: 05/04/2018
 * Time: 11:14
 */

namespace CoreBundle\Service;

use CoreBundle\Entity\Category;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class CategoryService
{
    /**
     * @var EntityRepository
     */
    private $repository;

    public function __construct(EntityManager $em)
    {
        $this->repository=$em->getRepository(Category::class);
    }
    /**
     * permet de parcourir un tableau d'objets et changer l'etat pour chaque element
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
    public function getCategories(){
        return $this->repository->findAll();
    }
    /**
     * Retourner la liste  des categories actives
     * return array
     */
    public function getActiveCategories(){
        return $this->repository->getActiveCategories();
    }
    /**
     * Retourner une seule categorie selon l'id
     *
     */
    public function getCategory($id){
        return $this->repository->find($id);
    }
    /**
     * permet de désactiver une catégorie
     *
     */
    public function disableCategory($id){
        $category=$this->getCategory($id);
        if (null === $category){
            throw new NotFoundHttpException("la categorie de l'".$id." n'existe pas.");
        }
        $category->setDeleted(true);
        $product=$category->getProduct();
        $this->setStatus($product,true);
    }



}