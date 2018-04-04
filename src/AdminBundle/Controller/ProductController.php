<?php

namespace AdminBundle\Controller;

use AdminBundle\Form\ProductEditType;
use CoreBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AdminBundle\Form\ProductType;

class ProductController extends Controller
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
    public function addAction(Request $request)
    {
        $product=new Product();
        $form = $this->createForm(ProductType::class,$product);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $id=$product->getId();
            $em->flush();
            return $this->redirectToRoute('admin_product_size_add',array('id' => $id));
        }
        return $this->render('AdminBundle:Product:add.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $serviceProduct = $this->get('core.service.product');
        $product=$serviceProduct->getProduct($id);
        $form = $this->get('form.factory')->create(ProductEditType::class,$product);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em->flush();
            return $this->redirectToRoute('admin_product_list');
        }
        return $this->render('AdminBundle:Product:edit.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    public function showAction($id)
    {
        $serviceProduct = $this->get('core.service.product');
        $product=$serviceProduct->getProduct($id);
        return $this->render('AdminBundle:Product:show.html.twig', array(
            'product' => $product,
        ));
    }
    public function disableAction(Request $request,$id)
    {
        $formDelete = $this->get('form.factory')->create();
        if ($request->isMethod('POST') && $formDelete->handleRequest($request)->isValid()) {
            $serviceProduct = $this->get('core.service.product');
            $em = $this->getDoctrine()->getManager();
            $serviceProduct->disableProduct($id);
            $em->flush();
            return $this->redirectToRoute('admin_product_list');
        }
        return $this->render('AdminBundle::delete.html.twig', array(
            'formDelete' => $formDelete->createView(),
        ));
    }
    public function enableAction(Request $request,$id)
    {
        $formDelete = $this->get('form.factory')->create();
        if ($request->isMethod('POST') && $formDelete->handleRequest($request)->isValid()) {
            $serviceProduct = $this->get('core.service.product');
            $em = $this->getDoctrine()->getManager();
            $serviceProduct->enableProduct($id);
            $em->flush();
            return $this->redirectToRoute('admin_product_list');
        }
        return $this->render('AdminBundle::delete.html.twig', array(
            'formDelete' => $formDelete->createView(),
        ));
    }

/*





    public function enableAction(Request $request,$id)
    {
        $formDelete = $this->get('form.factory')->create();
        if ($request->isMethod('POST') && $formDelete->handleRequest($request)->isValid()) {
            $manager = $this->get('core.service.product_manager');
            $manager->enable($id);
            return $this->redirectToRoute('admin_product_list');
        }
        return $this->render('AdminBundle::delete.html.twig', array(
            'formDelete'   => $formDelete->createView(),
        ));
    }

*/

}