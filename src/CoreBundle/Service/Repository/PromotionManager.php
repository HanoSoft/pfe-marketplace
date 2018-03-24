<?php
/**
 * Created by PhpStorm.
 * User: Hamdi
 * Date: 24/03/2018
 * Time: 13:48
 */

namespace CoreBundle\Service\Repository;

use CoreBundle\Entity\Promotion;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class PromotionManager extends RepositoryManager implements AbstractRepository
{
    /**
     * @var EntityRepository
     */
    private $repository;
    private $em;

    public function __construct(EntityManager $em)
    {
        $repository=$em->getRepository(Promotion::class);
        $this->em=$em;
        parent::__construct($em,$repository);
    }

    public function edit($form,$id)
    {

    }

    public function delete($id)
    {
        $alert=$this->find($id);
        $alert->setDeleted(true);
        $this->save($alert);
    }

    public function add($form)
    {
        $promotion = new Promotion();
        $promotion = $form->getData();
        $this->save($promotion);
    }

}