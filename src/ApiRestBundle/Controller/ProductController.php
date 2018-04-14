<?php
/**
 * Created by PhpStorm.
 * User: Hamdi
 * Date: 08/04/2018
 * Time: 10:44
 */

namespace ApiRestBundle\Controller;

use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\FOSRestController;

class ProductController extends FOSRestController
{
    /**
     * @Get(
     *     path = "/api/products",
     *     name = "api_product_list",
     *
     * )
     * @View
     */
    public function indexAction()
    {
        $productService=$this->get('core.service.product');
        $product=$productService->getActiveProducts(false);
        return $product;
    }

}