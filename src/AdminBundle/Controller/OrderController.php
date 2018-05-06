<?php
/**
 * Created by PhpStorm.
 * User: nouha
 * Date: 06/05/2018
 * Time: 11:49
 */

namespace AdminBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;



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


}