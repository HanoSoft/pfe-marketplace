<?php
/**
 * Created by PhpStorm.
 * User: Hamdi
 * Date: 23/03/2018
 * Time: 18:57
 */

namespace AdminBundle\Controller;

use AdminBundle\Form\PromotionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PromotionController extends Controller
{
    public function addAction()
    {$form   = $this->get('form.factory')->create(PromotionType::class);

        return $this->render('AdminBundle:Promotion:add.html.twig', array(
            'form' => $form->createView()));
    }
}