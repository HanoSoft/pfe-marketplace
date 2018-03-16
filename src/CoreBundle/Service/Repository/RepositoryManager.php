<?php
/**
 * Created by PhpStorm.
 * User: Hamdi
 * Date: 16/03/2018
 * Time: 12:06
 */
namespace CoreBundle\Service\Repository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class RepositoryManager
{
    /**
     * @var EntityRepository
     */
    private $repository;
    /**
     * EntityManager
     */
    private $entityManager;


    public function __construct(EntityManager $entityManager,EntityRepository $repository)
    {
        $this->repository=$repository;
        $this->entityManager=$entityManager;
    }

    /**
     * @return mixed
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }

    /**
     * @param mixed $entityManager
     */
    public function setEntityManager($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @return EntityRepository
     */
    public function getRepository()
    {
        return $this->repository;
    }

    /**
     * @param EntityRepository $repository
     */
    public function setRepository($repository)
    {
        $this->repository = $repository;
    }

}