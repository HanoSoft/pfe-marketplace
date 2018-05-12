<?php
/**
 * Created by PhpStorm.
 * User: nouha
 * Date: 12/05/2018
 * Time: 10:54
 */

namespace AdminBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AlertController extends Controller
{
    public function indexAction()
    {
        $serviceProduct = $this->get('core.service.product');
        $products=$serviceProduct->getProducts();
        $formDelete = $this->get('form.factory')->create();
        return $this->render('AdminBundle:Product:index.html.twig', array(
            'products' => $products,
            'formDelete'   => $formDelete->createView(),
        ));
    }

}