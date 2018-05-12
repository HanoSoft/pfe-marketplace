<?php
/**
 * Created by PhpStorm.
 * User: nouha
 * Date: 12/05/2018
 * Time: 10:54
 */

namespace AdminBundle\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StockController extends Controller
{
    public function indexAction()
    {
        $serviceProduct = $this->get('core.service.product');
        $products=$serviceProduct->getProducts();

        return $this->render('AdminBundle:Stock:index.html.twig', array(
            'products' => $products,

        ));
    }
    public function editAction()
    {

    }

}