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

    private $em; // hatha entity manegr rti 3mlin 3ena 2 attributs wa7ed entity manegr w lo5er repositoryey je vois donc entity
    // manger em hatha nfsh hatha houwa appel ta3servive netitymanger hatha attribut repository fi classe ta3na hey cv taw
    // kima em ey wadha7

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

    public function getAll($value)
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