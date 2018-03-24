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
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class PromotionController extends Controller
{
    public function addAction(Request $request)
    {
        $session=new Session();
        $form= $this->get('form.factory')->create(PromotionType::class);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $manager = $this->get('core.service.promotion_manager');
            $manager->add($form);
            $session->getFlashBag()->add('success', 'le promotion est bien enregistrée !');
            return $this->redirectToRoute('admin_product_add');
        }
        return $this->render('AdminBundle:Promotion:add.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}