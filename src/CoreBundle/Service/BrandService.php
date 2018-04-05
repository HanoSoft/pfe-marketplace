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
     * Retourner la liste  des marques
     * return array
     */
    public function getBrands(){
        return $this->repository->findAll();
    }
    /**
     * Retourner la liste  des marques actives
     * return array
     */
    public function getActiveBrands(){
        return $this->repository->getActiveBrands();
    }
    /**
     * Retourner un seul marque selon l'id
     *
     */
    public function getBrand($id){
        return $this->repository->find($id);
    }

}