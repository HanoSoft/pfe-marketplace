<?php
/**
 * Created by PhpStorm.
 * User: nouha
 * Date: 14/05/2018
 * Time: 15:34
 */

namespace CoreBundle\Service;


use CoreBundle\Entity\Promotion;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class PromotionService
{
    /**
     * @var EntityRepository
     */
    private $repository;

    public function __construct(EntityManager $em)
    {
        $this->repository=$em->getRepository(Promotion::class);
    }
    /**
     * Return all promotions
     * @return array \CoreBundle\Entity\Promotion
     */
    public function getPromotions(){
        return $this->repository->findAll();
    }
    /**
     * Return a promotion list according to the variable $active
     * @param boolean $active it represents the promotion status.
     * @return array \CoreBundle\Entity\Promotion
     */
    public function getActivePromotions($active){
        return $this->repository->getActivePromotions($active);
    }
    /**
     * return a single promotion according to the Id
     * @param number $id it represents the promotion Id
     * @return \CoreBundle\Entity\Promotion
     */
    public function getPromotion($id){
        return $this->repository->find($id);
    }
}