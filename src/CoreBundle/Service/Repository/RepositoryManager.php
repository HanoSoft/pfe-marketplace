<?php
/**
 * Created by PhpStorm.
 * User: Hamdi
 * Date: 17/03/2018
 * Time: 20:22
 */

namespace CoreBundle\Service\Repository;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\OptimisticLockException;

class RepositoryManager
{
    /**
     * @var EntityRepository
     */
    private $repository;
    private $em;

    public function __construct(EntityManager $em,EntityRepository $repository)
    {
       $this->repository=$repository;
        $this->em=$em;
    }
    public function find($id){
        return $this->repository->find($id);
    }
    /**
     * @param $object
     */
    protected function save($object){
        $this->em->persist($object);
        try {
            $this->em->flush();
        } catch (OptimisticLockException $e) {
        }
    }
    public function getAll(){
       return $this->repository->findAll();
    }
    public function getDeleted($value)
    {
        $qb = $this->repository->createQueryBuilder('p');
        $qb
            ->where('p.deleted = :deleted')
            ->setParameter('deleted', $value) ;
        return $qb->getQuery()->getResult();
    }
    /**
     * @return EntityManager
     */
    public function getEm()
    {
        return $this->em;
    }
}