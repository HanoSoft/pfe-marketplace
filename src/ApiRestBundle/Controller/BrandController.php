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

class BrandController extends FOSRestController
{
    /**
     * @Get(
     *     path = "/api/brands",
     *     name = "api_brand_list",
     *
     * )
     * @View(StatusCode = 200)
     */
    public function indexAction()
    {
        $brandService=$this->get('core.service.brand');
        $brands=$brandService->getActiveBrands(false);
        return $brands;
    }
}