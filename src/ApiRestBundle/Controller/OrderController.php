<?php
/**
 * Created by PhpStorm.
 * User: Hamdi
 * Date: 05/05/2018
 * Time: 12:10
 */

namespace ApiRestBundle\Controller;

use CoreBundle\Entity\Orders;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class OrderController extends FOSRestController
{
    /**
     * @Rest\Post(
     *    path = "api/orders/{id}",
     *    name = "api_orders_create",
     * )
     * @View(StatusCode = 201)
     * @ParamConverter("order", converter="fos_rest.request_body")
     *
     */
    public function createAction($id,Orders $order)
    {
        $serviceCustomer=$this->get('core.service.customer');
        $em = $this->getDoctrine()->getManager();
        $customer=$serviceCustomer->getCustomer($id);
        $order->setCustomer($customer);
        $em->persist($order);
        $em->flush();
    }
}