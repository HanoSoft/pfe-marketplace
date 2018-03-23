<?php
/**
 * Created by PhpStorm.
 * User: Hamdi
 * Date: 23/03/2018
 * Time: 13:44
 */

namespace CoreBundle\Service\Repository;

use AdminBundle\Repository\AlertRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class AlertManager extends RepositoryManager  implements AbstractRepository
{
    /**
     * @var EntityRepository
     */
    private $repository;
    private $em;

    public function __construct(EntityManager $em)
    {
        $repository=$em->getRepository(AlertRepository::class);
        $this->em=$em;
        parent::__construct($em,$repository);
    }

    public function edit($from,$id)
    {
        $alert=$this->find($id);
        $alert=$from->getData();
        $this->save($alert);
    }

    public function delete($id)
    {
        $alert=$this->find($id);
        $alert->setDeleted(true);
        $this->save($alert);
    }

    public function add($form)
    {
        // TODO: Implement add() method.
    }

}