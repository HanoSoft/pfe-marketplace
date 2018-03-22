<?php

namespace AdminBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use CoreBundle\Entity\Color;

class LoadColor implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
   
   
        $manager->flush();

         $names = array(
            'Rouge',
            'Bleu',
            'Beige',
            'Amande',
            'Bleu ciel',
            'Brun',
            'Corail',
            'Gris',
            'Gris acier',
            'Jaune',
            'Jaune d\'or',
            'Noir',
            'Noisette',
            'Rose',
            'Saumon',
            'Turquoise',
            'Vert',
            'Violet',
            'Blanc',
            'Blanc cassé',
            'Rouge Bordeaux',
            'Bronze',
            'Bleu roi',
            'vert citron',
            'Marron',
        );

        foreach ($names as $name) {

           $color=new Color();
        $color->setColorName($name);
            $color->setDeleted(false);
            $manager->persist($color);

           
        }


        $manager->flush();
       

    }
}