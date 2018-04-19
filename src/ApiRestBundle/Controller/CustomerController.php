<?php
/**
 * Created by PhpStorm.
 * User: Hamdi
 * Date: 08/04/2018
 * Time: 10:44
 */

namespace ApiRestBundle\Controller;

use CoreBundle\Entity\Customer;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class CustomerController extends FOSRestController
{
    /**
     * @Post(
     *    path = "api/customer/register",
     *    name = "api_customer_create"
     * )
     * @View(StatusCode = 201)
     * @ParamConverter("customer", converter="fos_rest.request_body")
     *
     */
    public function createAction(Customer $customer)
    {
        $em = $this->getDoctrine()->getManager();
        $em->persist($customer);
        $em->flush();
    }
}

