<?php
/**
 * Created by PhpStorm.
 * User: nouha
 * Date: 23/04/2018
 * Time: 13:02
 */

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class CustomerController extends Controller
{
    public function indexAction()
    {
        $serviceCustomer = $this->get('core.service.customer');
        $customers=$serviceCustomer->getCustomers();
        $formDelete = $this->get('form.factory')->create();
        return $this->render('AdminBundle:Customer:index.html.twig', array(
            'customers' => $customers,
            'formDelete'   => $formDelete->createView(),
        ));
    }

}