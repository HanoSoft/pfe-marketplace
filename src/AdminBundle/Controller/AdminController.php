<?php

namespace AdminBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function indexAction()
    {
        $serviceCustomer=$this->get('core.service.customer');
        $serviceDelivery=$this->get('core.service.delivery');
        $serviceOrder=$this->get('core.service.order');
        $serviceProduct=$this->get('core.service.product');
        $orders=$serviceOrder->getOrders();
        $deliveries =$serviceDelivery->getDeliveries();
        $customers =$serviceCustomer->getCustomers();
        $products =$serviceProduct->getProducts();
        $sum=0;
        foreach ($orders as $order) {
            $sum+=$order->getAmount();
        }
        return $this->render('AdminBundle:Admin:index.html.twig',array(
            "customers" => count($customers),
            "delivries" => count($deliveries),
            "orders" => count($orders),
            "products" => count($products),
            "sum" => $sum,
        ));
    }

    public function accessDeniedAction()
    {
        return $this->render('AdminBundle:Admin:accessDenied.html.twig');
    }
}