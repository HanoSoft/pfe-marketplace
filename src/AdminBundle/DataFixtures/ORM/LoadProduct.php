<?php


namespace CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use CoreBundle\Entity\Product;
use CoreBundle\Entity\Category;


class LoadProduct implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $names = array(
            'Vêtements',
            'Beauté et Parfums',
            'DVD & Blu-ray',
            'High-Tech',
            'Chaussures',
            'VOYAGES'
        );

        foreach ($names as $name) {

            $category = new Category();
            $category->setName($name);
            $category->setDeleted(false);
            $manager->persist($category);

            for ($i=0;$i<10;$i++){
                $product=new Product();
                $product->setCategory($category);
                $product->setProductName('produit' .$i);
                $product->setPrice(10);
                $product->setProductColor('noir');
                $product->setProductDetails('description de produit'. $i);
                $product->setQuantity(120);
                $product->setDeleted(false);
                $manager->persist($product);
            }
        }


        $manager->flush();

    }
}