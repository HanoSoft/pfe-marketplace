<?php
/**
 * Created by PhpStorm.
 * User: nouha
 * Date: 13/05/2018
 * Time: 13:31
 */

namespace AdminBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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

}