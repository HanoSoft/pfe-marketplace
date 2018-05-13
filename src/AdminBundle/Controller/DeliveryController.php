<?php
/**
 * Created by PhpStorm.
 * User: nouha
 * Date: 13/05/2018
 * Time: 13:31
 */

namespace AdminBundle\Controller;


use CoreBundle\Entity\Delivery;
use CoreBundle\Form\DeliveryType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class DeliveryController extends Controller
{
    public function indexAction()
    {
        $serviceDelivery = $this->get('core.service.delivery');
        $deliveries=$serviceDelivery->getDeliveries();
        $formDelete = $this->get('form.factory')->create();
        return $this->render('AdminBundle:Delivery:index.html.twig', array(
            'deliveries' => $deliveries,
            'formDelete'   => $formDelete->createView(),
        ));
    }
    public function addAction(Request $request)
    {
        $delivery=new Delivery();
        $session = new Session();
        $form = $this->createForm(DeliveryType::class,$delivery);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($delivery);
            $em->flush();
            $id=$delivery->getId();
            $session->getFlashBag()->add('success', 'la livraison est bien enregistrée !');
            return $this->redirectToRoute('admin_delivery_add',array('id' => $id));
        }
        return $this->render('AdminBundle:Delivery:add.html.twig', array(
            'form' => $form->createView(),
        ));

    }

}