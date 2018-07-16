<?php
/**
 * Created by PhpStorm.
 * User: Hamdi
 * Date: 22/05/2018
 * Time: 13:17
 */

namespace CoreBundle\Service;

use CoreBundle\Entity\History;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class HistoryService
{
    /**
     * @var EntityRepository
     */
    private $repository;
    private $em;
    public function __construct(EntityManager $em)
    {
        $this->repository=$em->getRepository(History::class);
        $this->em=$em;
    }
    /**
     * Return all  operations
     * @return array \CoreBundle\Entity\History
     */
    public function getHistory(){
        return $this->repository->findAll();
    }

    /**
     * add a new  operation
     * @param string $user the user name
     * @param string $type the operation name
     * @param number $elemnt the id of the element affected by the operation
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function addHistory($user,$type,$elemnt){
        $history=new History();
        $history->setUser($user);
        $history->setOperationDate(new \DateTime('now'));
        $history->setType($type);
        $history->setElementId($elemnt);
        $this->em->persist($history);
        $this->em->flush();
    }
}