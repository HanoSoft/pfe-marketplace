<?php
/**
 * Created by PhpStorm.
 * User: nouha
 * Date: 23/03/2018
 * Time: 13:02
 */

namespace CoreBundle\Service\Repository;

use CoreBundle\Entity\Brand;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use FOS\UserBundle\Model\UserManager;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BrandManager extends RepositoryManager
{
    /**
     * @var EntityRepository
     */
    private $repository;
    private $em;
    private $user;

    public function __construct(EntityManager $em,UserManager $user)
    {
        $repository=$em->getRepository(Brand::class);
        $this->em=$em;
        $this->user=$user;
        parent::__construct($em,$repository);
    }
    protected function setDeleted($objects,$value){
        foreach ( $objects as $object){
            $object->setDeleted($value);
        }
    }
    public function addBrand($form,$id)
    {
        $user=$this->user->findUserBy(array('id'=>$id));
        $brand = new Brand();
        $brand = $form->getData();
        $brand->getLogo()->upload();
        $brand->getBrandImage()->upload();
        $brand->setUser($user);
        $this->save($brand);
    }
    public function edit($from,$id)
    {
        $brand=$this->find($id);
        $brand=$from->getData();
        $this->save($brand);
    }
    public function delete($id)
    {
        $brand=$this->find($id);
        if (null === $brand) {
            throw new NotFoundHttpException("la marque de l'".$id." n'existe pas.");
        }
        $brand->setDeleted(true);
        $categories=$brand->getCategories();
        $this->setDeleted($categories,true);
        foreach ( $categories as $category){
            $products=$category->getProducts();
            $this->setDeleted($products,true);
        }
        $this->save($brand);
    }
    public function enable($id)
    {
        $brand=$this->find($id);
        if (null === $brand) {
            throw new NotFoundHttpException("la marque de l'".$id." n'existe pas.");
        }
        $brand->setDeleted(false);
        $categories=$brand->getCategories();
        $this->setDeleted($categories,false);
        foreach ( $categories as $category){
            $products=$category->getProducts();
            $this->setDeleted($products,false);
        }
        $this->save($brand);
    }


}