<?php
/**
 * Created by PhpStorm.
 * User: nouha
 * Date: 23/03/2018
 * Time: 13:02
 */

namespace CoreBundle\Service\Repository;

use CoreBundle\Entity\Brand;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class BrandManager extends RepositoryManager implements AbstractRepository
{
    /**
     * @var EntityRepository
     */
    private $repository;

    private $em;
    public function __construct(EntityManager $em)
    {
        $repository=$em->getRepository(Brand::class);
        $this->em=$em;
        parent::__construct($em,$repository);
    }

    public function add($form)
    {
        $brand = new Brand();
        $brand = $form->getData();
        $this->save($brand);

    }
    public function edit($from,$id)
    {

    }
    public function delete($id)
    {

    }







}