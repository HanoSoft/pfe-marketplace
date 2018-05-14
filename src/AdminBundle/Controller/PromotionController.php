<?php
/**
 * Created by PhpStorm.
 * User: nouha
 * Date: 14/05/2018
 * Time: 15:31
 */

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PromotionController extends Controller
{
    public function indexAction()
    {
        $servicePromotion = $this->get('core.service.promotion');
        $promotions=$servicePromotion->getPromotions();
        $formDelete = $this->get('form.factory')->create();
        return $this->render('AdminBundle:Promotion:index.html.twig', array(
            'promotions' => $promotions,
            'formDelete'   => $formDelete->createView(),
        ));
    }

}