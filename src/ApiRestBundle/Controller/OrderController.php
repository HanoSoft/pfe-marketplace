<?php
/**
 * Created by PhpStorm.
 * User: Hamdi
 * Date: 05/05/2018
 * Time: 12:10
 */

namespace ApiRestBundle\Controller;

use CoreBundle\Entity\Orders;
use FOS\RestBundle\Controller\Annotations\Get;
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
        $serviceProduct=$this->get('core.service.product');
        $em = $this->getDoctrine()->getManager();
        $customer=$serviceCustomer->getCustomer($id);
        $order->setCustomer($customer);
        $order->setOrderDate(new \DateTime());
        $order->setDeliveryDate(new \DateTime('14 days'));
        $em->persist($order);
        foreach ($order->getItems() as $item) {
            $item->setOrder($order);
            $em->persist($item);
            $product=$serviceProduct->getProduct($item->getProduct());
            $product->setQuantity($product->getQuantity()-$item->getQuantity());
        }
        $em->flush();
    }
    /**
     * @Get(
     *     path = "/api/orders/{id}",
     *     name = "api_order_list",
     *
     * )
     * @View
     */
    public function indexAction($id)
    {
        $serviceOrder=$this->get('core.service.order');
        $orders=$serviceOrder->getActiveOrders(false,$id);
        return $orders;
    }
    /**
     * @Rest\Put(
     *    path = "api/orders/cancel/{id}",
     *    name = "api_orders_cancel",
     * )
     * @View(StatusCode = 200)
     *
     *
     */
    public function cancelAction($id)
    {
        $serviceOrder= $this->get('core.service.order');
        $serviceProduct=$this->get('core.service.product');
        $em = $this->getDoctrine()->getManager();
        $order=$serviceOrder->getOrder($id);
        $order->setStatus('Annuler');
        $em->persist($order);
        foreach ($order->getItems() as $item) {
            $product=$serviceProduct->getProduct($item->getProduct());
            $product->setQuantity($product->getQuantity()+$item->getQuantity());
        }
        $em->flush();
    }
}