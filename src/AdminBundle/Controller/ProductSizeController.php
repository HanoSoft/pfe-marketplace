<?php

namespace AdminBundle\Controller;

use AdminBundle\Form\ProductSizeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use CoreBundle\Entity\ProductSize;
use Symfony\Component\HttpFoundation\Session\Session;

class ProductSizeController extends Controller
{
    public function addAction($id, Request $request){
        $session = new Session();
        $em = $this->getDoctrine()->getManager();
        $size = new ProductSize();
        $form = $this->get('form.factory')->create(ProductSizeType::class, $size);
        $product = $em->getRepository('CoreBundle:Product')->find($id);
        $size->setProduct($product);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

            $size->setDeleted(false);
            $em->persist($size);
            $em->flush();
            $session->getFlashBag()->add('success', 'la taille  est bien enregistrée !');
            return $this->redirectToRoute('admin_product_size_add',array('id' => $id));

        }
        return $this->render('AdminBundle:ProductSize:add.html.twig', array(
            'form' => $form->createView(),
            'product'=>$product
        ));
    }

}