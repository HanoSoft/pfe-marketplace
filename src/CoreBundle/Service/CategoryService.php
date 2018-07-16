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
     * Return all categories
     * @return array \CoreBundle\Entity\Category
     */
    public function getCategories(){
        return $this->repository->findAll();
    }
    /**
     * Return a category list according to the variable $active
     * @param boolean $active it represents the category status.
     * @return array \CoreBundle\Entity\Category
     */
    public function getActiveCategories(){
        return $this->repository->getActiveCategories();
    }
    /**
     * return a single category according to the Id
     * @param number $id it represents the category Id
     * @return \CoreBundle\Entity\Category
     */
    public function getCategory($id){
        return $this->repository->find($id);
    }
}