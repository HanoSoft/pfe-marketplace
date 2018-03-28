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
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class BrandManager extends RepositoryManager implements AbstractRepository
{
    /**
     * @var EntityRepository
     */
    private $repository;
    private $em;

    public function __construct(EntityManager $em)
    {
        $repository=$em->getRepository(Brand::class);
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
        $brand = new Brand();
        $brand = $form->getData();
        $brand->getLogo()->upload();
        $brand->getBrandImage()->upload();
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
        $this->save($brand);

    }
    public function enable($id)
    {
        $brand=$this->find($id);
        if (null === $brand) {
            throw new NotFoundHttpException("la marque de l'".$id." n'existe pas.");
        }
        $brand->setDeleted(false);
        $this->setDeleted($brand,false);
        $this->save($brand);
    }







}