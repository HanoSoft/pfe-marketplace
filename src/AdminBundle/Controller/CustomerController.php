<?php
/**
 * Created by PhpStorm.
 * User: nouha
 * Date: 23/04/2018
 * Time: 13:02
 */

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


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
    public function disableAction(Request $request,$id)
    {
        $formDelete = $this->get('form.factory')->create();
        if ($request->isMethod('POST') && $formDelete->handleRequest($request)->isValid()) {
            $serviceCustomer = $this->get('core.service.customer');
            $em = $this->getDoctrine()->getManager();
            $serviceCustomer->disableCustomer($id);
            $em->flush();
            return $this->redirectToRoute('admin_customer_list');
        }
        return $this->render('AdminBundle::delete.html.twig', array(
            'formDelete' => $formDelete->createView(),
        ));
    }

}