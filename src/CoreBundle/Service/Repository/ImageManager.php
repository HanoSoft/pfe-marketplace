<?php
/**
 * Created by PhpStorm.
 * User: Hamdi
 * Date: 19/03/2018
 * Time: 11:06
 */

namespace CoreBundle\Service\Repository;

use CoreBundle\Entity\Image;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class ImageManager extends RepositoryManager implements AbstractRepository
{
    /**
     * @var EntityRepository
     */
    private $repository;
    private $em;
    /**
     * @var ProductManager
     */
    private $productManager;

    public function __construct(EntityManager $em,ProductManager $productManager)
    {
        $repository=$em->getRepository(Image::class);
        $this->em=$em;
        $this->productManager=$productManager;
        parent::__construct($em,$repository);
    }

    public function addImage($id,$form){
        $product=$this->productManager->find($id);
        $image = new Image();
        $image = $form->getData();
        $image->setProduct($product);
        $image->upload();
        $this->save($image);
    }
    public function findByProduct($id){
        /**
         * @var $product\CoreBundle\Entity\Product
         */
        $product=$this->productManager->find($id);
        $images=$product->getImages();
        return $images;
    }

    public function add($form)
    {
        // TODO: Implement add() method.
    }

    public function edit($from,$id)
    {
        // TODO: Implement edit() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}