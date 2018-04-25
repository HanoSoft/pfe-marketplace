<?php
/**
 * Created by PhpStorm.
 * User: Hamdi
 * Date: 08/04/2018
 * Time: 10:44
 */

namespace ApiRestBundle\Controller;

use CoreBundle\Entity\Customer;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Put;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class CustomerController extends FOSRestController
{
    /**
     * @Post(
     *    path = "api/customers",
     *    name = "api_customer_create",
     * )
     * @View(StatusCode = 201)
     * @ParamConverter("customer", converter="fos_rest.request_body")
     *
     */
    public function createAction(Customer $customer)
    {
        /**
         * $sponsorshipCode est un code auto-généré représente le code de parrainage
         */
        $sponsorshipCode=substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0,8);
        $customer->setSponsorshipCode($sponsorshipCode);
        $em = $this->getDoctrine()->getManager();
        $em->persist($customer);
        $em->flush();
    }
    /**
     * @Get(
     *     path = "/api/customers",
     *     name = "api_customer_list",
     *
     * )
     * @View
     */
    public function indexAction()
    {
       $serviceCustomer=$this->get('core.service.customer');
       $customers=$serviceCustomer->getActiveCustomers(false);
        return $customers;
    }
    /**
     * @Put(
     *    path = "api/customers/edit",
     *    name = "api_customer_edit",
     * )
     * @View(StatusCode = 200 )
     * @ParamConverter("customerApi", converter="fos_rest.request_body")
     *
     */
    public function editAction(Customer $customerApi)
    {
        $serviceCustomer=$this->get('core.service.customer');
        $em = $this->getDoctrine()->getManager();
        $customer=$serviceCustomer->getCustomer($customerApi->getId());
        $customer->setName($customerApi->getName());
        $customer->setFamilyName($customerApi->getfamilyName());
        $customer->setEmail($customerApi->getEmail());
        $customer->setBirthDate($customerApi->getBirthDate());
        $customer->setPhoneNumber($customerApi->getPhoneNumber());
        $customer->setSex($customerApi->getSex());
        $em->flush();
    }
}

