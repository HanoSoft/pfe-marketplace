<?php
/**
 * Created by PhpStorm.
 * User: Hamdi
 * Date: 04/04/2018
 * Time: 15:02
 */

namespace CoreBundle\Service;


use CoreBundle\Entity\ProductSize;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class SizeService
{
    /**
     * @var EntityRepository
     */
    private $repository;

    public function __construct(EntityManager $em)
    {
        $this->repository=$em->getRepository(ProductSize::class);
    }
    /**
     * Retourner la liste  des tailles
     * return array
     */
    public function getSizes(){
        return $this->repository->findAll();
    }
    /**
     * Retourner la liste  des tailles actives
     * return array
     */
    public function getActiveProducts(){
        return $this->repository->getActiveSizes();
    }
    /**
     * Retourner un seul taille selon l'id
     *
     */
    public function getSize($id){
        return $this->repository->find($id);
    }
}