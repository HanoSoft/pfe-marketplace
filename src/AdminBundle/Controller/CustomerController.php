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
        $app=$this->getUser();
        $historyService=$this->get('core.service.history');
        $historyService->addHistory($app->getUserName(),'Consulter clients',0);
        $formDelete = $this->get('form.factory')->create();
        return $this->render('AdminBundle:Customer:index.html.twig', array(
            'customers' => $customers,
            'formDelete'   => $formDelete->createView(),
        ));
    }
    public function enableAction(Request $request,$id)
    {
        $formDelete = $this->get('form.factory')->create();
        if ($request->isMethod('POST') && $formDelete->handleRequest($request)->isValid()) {
            $serviceCustomer = $this->get('core.service.customer');
            $em = $this->getDoctrine()->getManager();
            $customer=$serviceCustomer->getCustomer($id);
            $customer->setDeleted(false);
            $em->flush();
            $app=$this->getUser();
            $historyService=$this->get('core.service.history');
            $historyService->addHistory($app->getUserName(),'Activer Client',$customer->getId());
            return $this->redirectToRoute('admin_customer_list');
        }
        return $this->render('AdminBundle::delete.html.twig', array(
            'formDelete'   => $formDelete->createView(),
        ));
    }
    public function disableAction(Request $request,$id)
    {
        $formDelete = $this->get('form.factory')->create();
        if ($request->isMethod('POST') && $formDelete->handleRequest($request)->isValid()) {
            $serviceCustomer = $this->get('core.service.customer');
            $em = $this->getDoctrine()->getManager();
            $customer=$serviceCustomer->getCustomer($id);
            $customer->setDeleted(true);
            $em->flush();
            $app=$this->getUser();
            $historyService=$this->get('core.service.history');
            $historyService->addHistory($app->getUserName(),'Désactiver Client',$customer->getId());
            return $this->redirectToRoute('admin_customer_list');
        }
        return $this->render('AdminBundle::delete.html.twig', array(
            'formDelete'   => $formDelete->createView(),
        ));
    }
}