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
    protected function setDeleted($objects)
    {
        foreach ($objects as $object) {
            $object->setDeleted(true);
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
        $brand->setDeleted(true);
        $this->save($brand);

    }







}