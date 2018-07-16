<?php
/**
 * Created by PhpStorm.
 * User: Hamdi
 * Date: 05/05/2018
 * Time: 20:11
 */

namespace ApiRestBundle\Controller;

use CoreBundle\Entity\Item;
use CoreBundle\Entity\Orders;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\Annotations\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class ItemController extends FOSRestController
{
    /**
     * @Rest\Post(
     *    path = "api/items",
     *    name = "api_item_create",
     * )
     * @View(StatusCode = 201)
     * @ParamConverter("item", converter="fos_rest.request_body")
     *
     */
    public function createAction(Item $item)
    {
        $em = $this->getDoctrine()->getManager();
        $order = new Orders();
        $order = $item->getOrder();
        $em->persist($order);
        $item->setOrder($order);
        $em->persist($item);
        $em->flush();
    }
}