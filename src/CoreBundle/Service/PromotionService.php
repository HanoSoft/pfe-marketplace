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
     * Retourner la liste  des promotions
     * return array
     */
    public function getPromotions(){
        return $this->repository->findAll();
    }
    /**
     * Retourner la liste  des promotions selon la variable $active
     * $active prend 2 valeur true ou false
     * return array
     */
    public function getActivePromotions($active){
        return $this->repository->getActivePromotions($active);
    }
    /**
     * Retourner un seul promotion selon l'id
     *
     */
    public function getPromotion($id){
        return $this->repository->find($id);
    }

}