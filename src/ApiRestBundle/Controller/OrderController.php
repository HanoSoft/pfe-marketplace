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
     *    path = "api/orders",
     *    name = "api_orders_create",
     * )
     * @View(StatusCode = 201)
     * @ParamConverter("order", converter="fos_rest.request_body")
     *
     */
    public function createAction(Orders $order)
    {
        $em = $this->getDoctrine()->getManager();
        $em->persist($order);
        $em->flush();
    }
}