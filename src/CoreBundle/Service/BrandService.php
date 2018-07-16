<?php
/**
 * Created by PhpStorm.
 * User: Hamdi
 * Date: 04/04/2018
 * Time: 23:17
 */

namespace CoreBundle\Service;

use CoreBundle\Entity\Brand;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class BrandService
{
    /**
     * @var EntityRepository
     */
    private $repository;

    public function __construct(EntityManager $em)
    {
        $this->repository=$em->getRepository(Brand::class);
    }
    /**
     * Return all brands
     * @return array \CoreBundle\Entity\Brand
     */
    public function getBrands(){
        return $this->repository->findAll();
    }
    /**
     * Return a brand list according to the variable $active
     * @param boolean $active it represents the brand status.
     * @return array \CoreBundle\Entity\Brand
     */
    public function getActiveBrands($active){
        return $this->repository->getActiveBrands($active);
    }
    /**
     * return a single brand according to the Id
     * @param number $id it represents the brand Id
     * @return \CoreBundle\Entity\Brand
     */
    public function getBrand($id){
        return $this->repository->find($id);
    }
}