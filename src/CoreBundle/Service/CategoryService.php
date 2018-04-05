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
     * Retourner la liste  des caegories
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

}