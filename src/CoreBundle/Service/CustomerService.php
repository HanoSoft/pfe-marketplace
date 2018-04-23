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
     * Retourner la liste  des clients
     * return array
     */
    public function getCustomers(){
        return $this->repository->findAll();
    }
    /**
     * Retourner la liste  des client actives
     * return array
     */
    public function getActiveCustomers($active){
        return $this->repository->getActiveCustomers($active);
    }
    /**
     * Retourner un seul client selon l'id
     *
     */
    public function getCustomer($id){
        return $this->repository->find($id);
    }

    /**
     * permet de désactiver un client
     *
     */
    public function disableCustomer($id){
        $customer=$this->getCustomer($id);
        if (null === $customer) {
            throw new NotFoundHttpException("le client de l'".$id." n'existe pas.");
        }
        $customer->setDeleted(true);

    }

}