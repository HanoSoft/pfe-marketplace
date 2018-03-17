<?php

namespace AdminBundle\Controller;

use AdminBundle\Form\ProductEditType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AdminBundle\Form\ProductType;

class ProductController extends Controller
{
    public function indexAction()
    {
        return $this->render('AdminBundle:Product:index.html.twig');
    }
    public function addAction(Request $request)
    {
        $form = $this->createForm(ProductType::class);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $manager = $this->get('core.service.product.manager');
            $manager->add($form);
            return $this->redirectToRoute('admin_product_list');
        }
        return $this->render('AdminBundle:Product:add.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    public function listAction(Request $request)
    {
        $manager = $this->get('core.service.product.manager');
        $products=$manager->getAll(false);
        $formDelete = $this->get('form.factory')->create();
        return $this->render('AdminBundle:Product:index.html.twig', array(
            'products' => $products,
            'formDelete'   => $formDelete->createView(),
        ));
    }
    public function deleteAction(Request $request,$id)
    {
        $formDelete = $this->get('form.factory')->create();
        if ($request->isMethod('POST') && $formDelete->handleRequest($request)->isValid()) {
            $manager = $this->get('core.service.product.manager');
            $manager->delete($id);
            return $this->redirectToRoute('admin_product_list');
        }
        return $this->render('AdminBundle::delete.html.twig', array(
            'formDelete'   => $formDelete->createView(),
        ));
    }


    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $product = $em->getRepository('CoreBundle:Product')->find($id);
        $sizes=$product->getSizes();
        $images=$product->getImages();
        $form = $this->get('form.factory')->create(ProductEditType::class, $product);
        $formDelete = $this->get('form.factory')->create();
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em->flush();
            return $this->redirectToRoute('admin_product_show');
        }
        return $this->render('AdminBundle:Product:edit.html.twig', array(
            'product' => $product,
            'form'   => $form->createView(),
            'formDelete'   => $formDelete->createView(),
            'sizes'  => $sizes,
            'images'  => $images,

        ));
    }


}