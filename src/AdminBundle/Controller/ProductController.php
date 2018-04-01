<?php

namespace AdminBundle\Controller;

use AdminBundle\Form\ProductEditType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AdminBundle\Form\ProductType;

class ProductController extends Controller
{
    public function addAction(Request $request)
    {
        $form = $this->createForm(ProductType::class);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $manager = $this->get('core.service.product_manager');
            $id=$manager->add($form);
            return $this->redirectToRoute('admin_product_size_add',array('id' => $id));
        }
        return $this->render('AdminBundle:Product:add.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    public function indexAction()
    {
        $manager = $this->get('core.service.product_manager');
        $products=$manager->getAll();
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
            $manager = $this->get('core.service.product_manager');
            $manager->delete($id);
            return $this->redirectToRoute('admin_product_list');
        }
        return $this->render('AdminBundle::delete.html.twig', array(
            'formDelete'   => $formDelete->createView(),
        ));
    }
    public function editAction($id, Request $request)
    {
        $manager = $this->get('core.service.product_manager');
        $product=$manager->find($id);
        $form = $this->get('form.factory')->create(ProductEditType::class,$product);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $manager->edit($form,$id);
            return $this->redirectToRoute('admin_product_list');
        }
        return $this->render('AdminBundle:Product:edit.html.twig', array(
            'form' => $form->createView(),
        ));
    }
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
    public function showAction($id)
    {
        $manager = $this->get('core.service.product_manager');
        $product=$manager->find($id);
        return $this->render('AdminBundle:Product:show.html.twig', array(
            'product' => $product,
        ));
    }
}