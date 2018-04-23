<?php

namespace CoreBundle\Repository;

/**
 * CustomerRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CustomerRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * Retourner la liste  des clients selon la variable $active
     * $active contenir 2 valeur true ou false
     * return array
     */
    public function getActiveCustomers($active)
    {
        $qb = $this->createQueryBuilder('c');
        $qb
            ->where('c.deleted =:active')
            ->setParameter('active', $active)
            ->orderBy('c.id', 'DESC');
        ;
        return $qb->getQuery()
            ->getResult();
    }
}