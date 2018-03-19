<?php

namespace AdminBundle\Controller;

use AdminBundle\Form\ProductSizeType;
use CoreBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class ProductSizeController extends Controller
{
    public function addAction($id, Request $request)
    {
        $session = new Session();
        $form = $this->get('form.factory')->create(ProductSizeType::class);
        $product=$this->get('core.service.product.manager')->find($id);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

            $manager=$this->get('core.service.product.size.manager');
            $manager->addSize($id,$form);
            $session->getFlashBag()->add('success', 'la taille est bien enregistrée !');
            return $this->redirectToRoute('admin_product_size_add',array('id' => $id));
        }

        return $this->render('AdminBundle:ProductSize:add.html.twig', array(
            'form' => $form->createView(),
            'product'=>$product,
        ));
    }

}