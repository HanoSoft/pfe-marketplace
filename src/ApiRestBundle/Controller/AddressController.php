<?php
/**
 * Created by PhpStorm.
 * User: Hamdi
 * Date: 05/05/2018
 * Time: 11:29
 */

namespace ApiRestBundle\Controller;

use CoreBundle\Entity\Address;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class AddressController extends FOSRestController
{
    /**
     * @Rest\Post(
     *    path = "api/customers/addresses/{id}",
     *    name = "api_address_create",
     * )
     * @View(StatusCode = 201)
     * @ParamConverter("address", converter="fos_rest.request_body")
     *
     */
    public function createAction($id,Address $address)
    {
        $serviceCustomer=$this->get('core.service.customer');
        $em = $this->getDoctrine()->getManager();
        $customer=$serviceCustomer->getCustomer($id);
        $address->setCustomer($customer);
        $em->persist($address);
        $em->flush();
    }
}