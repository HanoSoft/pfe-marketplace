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
        $serviceItem= $this->get('core.service.item');
        $items=$serviceItem->getItems();
        $formDelete = $this->get('form.factory')->create();
        return $this->render('AdminBundle:Order:item.html.twig', array(
            'items' => $items,
            'formDelete'   => $formDelete->createView(),
        ));
    }

}