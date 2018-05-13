<?php

namespace CoreBundle\Repository;

/**
 * DeliveryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class DeliveryRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * Retourner la liste  des livraisons selon la variable $active
     * $active contenir 2 valeur true ou false
     * return array
     */
    public function getActiveDeliveries($active)
    {
        $qb = $this->createQueryBuilder('d');
        $qb
            ->where('d.deleted =:active')
            ->setParameter('active', $active)
        ;
        return $qb->getQuery()
            ->getResult();
    }
}
