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
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
     * Return all customers
     * @return array \CoreBundle\Entity\Customer
     */
    public function getCustomers(){
        return $this->repository->findAll();
    }
    /**
     * Return a customer list according to the variable $active
     * @param boolean $active it represents the customer status.
     * @return array \CoreBundle\Entity\Customer
     */
    public function getActiveCustomers($active){
        return $this->repository->getActiveCustomers($active);
    }
    /**
     * return a single customer according to the Id
     * @param number $id it represents the customer Id
     * @return \CoreBundle\Entity\Customer
     */
    public function getCustomer($id){
        return $this->repository->find($id);
    }
}