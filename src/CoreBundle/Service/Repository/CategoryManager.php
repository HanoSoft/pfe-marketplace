<?php
/**
 * Created by PhpStorm.
 * User: nouha
 * Date: 17/03/2018
 * Time: 22:07
 */

namespace CoreBundle\Service\Repository;

use CoreBundle\Entity\Category;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class CategoryManager extends RepositoryManager implements AbstractRepository
{
    /**
     * @var EntityRepository
     */
    private $repository;

    private $em;
    public function __construct(EntityManager $em)
    {
        $repository=$em->getRepository(Category::class);
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
        $category=new Category();
        $category=$form->getData();
        $this->save($category);
    }
    public function edit($from,$id)
    {
        $category=$this->find($id);
        $category=$from->getData();
        $this->save($category);
    }
    public function delete($id)
    {
        $category=$this->find($id);
        if (null === $category) {
            throw new NotFoundHttpException("la categorie de l'".$id." n'existe pas.");
        }
        $category=$this->find($id);
        $category->setDeleted(true);
        $product=$category->getProducts();
        $this->setDeleted($product);
        $this->save($category);
    }
    public function enable($id)
    {
        $category=$this->find($id);
        if (null === $category) {
            throw new NotFoundHttpException("la catégorie de l'".$id." n'existe pas.");
        }
        $category->setDeleted(true);
        $product=$category->getProducts();
        $this->setDeleted($product,false);
        $this->save($category);
    }
}