<?php
/**
 * Created by PhpStorm.
 * User: Hamdi
 * Date: 23/03/2018
 * Time: 13:44
 */

namespace CoreBundle\Service\Repository;

use CoreBundle\Entity\Alert;
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
        $repository=$em->getRepository(Alert::class);
        $this->em=$em;
        parent::__construct($em,$repository);
    }

    public function edit($form,$id)
    {
        $alert=$this->find($id);
        $alert=$form->getData();
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
        $alert=new Alert();
        $alert=$form->getData();
        $this->save($alert);
    }



}