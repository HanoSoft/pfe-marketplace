<?php

namespace AdminBundle\Controller;

use AdminBundle\Form\ProductSizeEditType;
use AdminBundle\Form\ProductSizeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class ProductSizeController extends Controller
{
    public function addAction($id, Request $request)
    {
        $session = new Session();
        $form = $this->get('form.factory')->create(ProductSizeType::class);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $manager=$this->get('core.service.product.size_manager');
            $manager->addSize($id,$form);
            $session->getFlashBag()->add('success', 'la taille est bien enregistrée !');
            return $this->redirectToRoute('admin_product_size_add',array('id' => $id));
        }
        return $this->render('AdminBundle:ProductSize:add.html.twig', array(
            'form' => $form->createView(),
            'id'=>$id,
        ));
    }
    public function listAction($id)
    {
        $manager = $this->get('core.service.product.size_manager');
        $sizes=$manager->findByProduct($id);
        $formDelete = $this->get('form.factory')->create();
        return $this->render('AdminBundle:ProductSize:list.html.twig', array(
            'sizes' => $sizes,
            'formDelete'   => $formDelete->createView(),
            'idp' =>$id
        ));
    }

    public function editAction(Request $request ,$idp,$id)
    {
        $manager = $this->get('core.service.product.size_manager');
        $size=$manager->find($id);
        $form = $this->get('form.factory')->create(ProductSizeEditType::class,$size);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $manager->edit($form,$id);
            return $this->redirectToRoute('admin_product_size_list',array('id' => $idp));
        }
        return $this->render('AdminBundle:ProductSize:edit.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    public function deleteAction(Request $request,$idp,$id)
    {
        $formDelete = $this->get('form.factory')->create();
        if ($request->isMethod('POST') && $formDelete->handleRequest($request)->isValid()) {
            $manager = $this->get('core.service.product.size_manager');
            $manager->delete($id);
            return $this->redirectToRoute('admin_product_size_list',array('id' => $idp));
        }
        return $this->render('AdminBundle::delete.html.twig', array(
            'formDelete'   => $formDelete->createView(),
        ));
    }
}