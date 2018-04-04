<?php
/**
 * Created by PhpStorm.
 * User: Hamdi
 * Date: 04/04/2018
 * Time: 17:49
 */

namespace CoreBundle\Service;

use CoreBundle\Entity\Image;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class ImageService
{
    /**
     * @var EntityRepository
     */
    private $repository;

    public function __construct(EntityManager $em)
    {
        $this->repository=$em->getRepository(Image::class);
    }
    /**
     * Retourner un seul image selon l'id
     * return object
     */
    public function getImage($id){
        return $this->repository->find($id);
    }

}