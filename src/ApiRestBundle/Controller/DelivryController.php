<?php
/**
 * Created by PhpStorm.
 * User: Hamdi
 * Date: 12/05/2018
 * Time: 13:53
 */

namespace ApiRestBundle\Controller;

use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\FOSRestController;

class DelivryController extends FOSRestController
{
    /**
     * @Get(
     *     path = "/api/delivery",
     *     name = "api_delivery_list",
     *
     * )
     * @View
     */
    public function indexAction()
    {
        $serviceDelivery=$this->get('core.service.delivery');
        $delivery=$serviceDelivery->getActiveDeliveries(false);
        return $delivery;
    }
}