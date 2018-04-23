<?php
/**
 * Created by PhpStorm.
 * User: nouha
 * Date: 23/04/2018
 * Time: 12:21
 */

namespace CoreBundle\Service;

use CoreBundle\Entity\Customer;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;


class CustomerService
{
    /**
     * @var EntityRepository
     */
    private $repository;

    public function __construct(EntityManager $em)
    {
        $this->repository=$em->getRepository(Customer::class);
    }
    /**
     * Retourner la liste  des clients
     * return array
     */
    public function getCustomers(){
        return $this->repository->findAll();
    }

}