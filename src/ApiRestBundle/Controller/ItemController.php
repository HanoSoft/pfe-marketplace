<?php
/**
 * Created by PhpStorm.
 * User: Hamdi
 * Date: 05/05/2018
 * Time: 20:11
 */

namespace ApiRestBundle\Controller;

use CoreBundle\Entity\Item;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\Annotations\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class ItemController extends FOSRestController
{
    /**
     * @Rest\Post(
     *    path = "api/items/{id}",
     *    name = "api_item_create",
     * )
     * @View(StatusCode = 201)
     * @ParamConverter("item", converter="fos_rest.request_body")
     *
     */
    public function createAction($id,Item $item)
    {
        $serviceOrder=$this->get('core.service.order');
        $order =$serviceOrder->getOrder($id);
        $em = $this->getDoctrine()->getManager();
        $item->setOrder($order);
        $em->persist($item);
        $em->flush();
    }
}