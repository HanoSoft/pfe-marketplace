<?php
/**
 * Created by PhpStorm.
 * User: nouha
 * Date: 14/05/2018
 * Time: 15:31
 */

namespace AdminBundle\Controller;

use CoreBundle\Entity\Promotion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CoreBundle\Form\PromotionType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

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
    public function addAction(Request $request)
    {
        $promotion=new Promotion();
        $session = new Session();
        $form = $this->createForm(PromotionType::class,$promotion);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($promotion);
            $em->flush();
            $session->getFlashBag()->add('success', 'la livraison est bien enregistrée !');
            return $this->redirectToRoute('admin_delivery_add');
        }
        return $this->render('AdminBundle:Promotion:add.html.twig', array(
            'form' => $form->createView(),
        ));

    }
    public function editAction(Request $request ,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $servicePromotion = $this->get('core.service.promotion');
        $promotion=$servicePromotion->getPromotion($id);
        $form = $this->get('form.factory')->create(PromotionEditType::class,$promotion);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em->flush();
            return $this->redirectToRoute('admin_promotion_list');
        }
        return $this->render('AdminBundle:Promotion:edit.html.twig', array(
            'form' => $form->createView(),
        ));
    }


}