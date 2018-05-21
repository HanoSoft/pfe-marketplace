<?php
/**
 * Created by PhpStorm.
 * User: nouha
 * Date: 06/05/2018
 * Time: 11:49
 */

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use CoreBundle\Form\OrderEditType;

class OrderController extends Controller
{
    public function indexAction()
    {
        $serviceOrder = $this->get('core.service.order');
        $orders=$serviceOrder->getOrders();
        $formDelete = $this->get('form.factory')->create();
        return $this->render('AdminBundle:Order:index.html.twig', array(
            'orders' => $orders,
            'formDelete'   => $formDelete->createView(),
        ));
    }
    public function editAction(Request $request ,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $serviceOrder = $this->get('core.service.order');
        $order=$serviceOrder->getOrder($id);
        $form = $this->get('form.factory')->create(OrderEditType::class,$order);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em->flush();
            return $this->redirectToRoute('admin_order_list',array('id' => $id));
        }
        return $this->render('AdminBundle:Order:edit.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}