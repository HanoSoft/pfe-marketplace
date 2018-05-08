<?php
/**
 * Created by PhpStorm.
 * User: nouha
 * Date: 08/05/2018
 * Time: 14:29
 */

namespace AdminBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ItemController extends Controller
{
    public function indexAction()
    {
       $products = array();
        $something = array(
            'product' => '',
            'quantity' => ''
        );
        $serviceItem= $this->get('core.service.item');
        $serviceProduct= $this->get('core.service.product');
        $items=$serviceItem->getItems();
        foreach ($items as $item) {
            array_push($products,array(
                'product' => $serviceProduct->getProduct($item->getProduct()),
                'quantity' => $item->getQuantity(),
                'size' => $item->getSize()
            ));
        }
        return $this->render('AdminBundle:Item:index.html.twig', array(
            'items' => $products,
        ));
    }

}