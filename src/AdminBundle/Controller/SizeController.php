<?php

namespace AdminBundle\Controller;

use CoreBundle\Form\ProductSizeEditType;
use CoreBundle\Form\ProductSizeType;
use CoreBundle\Entity\ProductSize;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SizeController extends Controller
{
    public function addAction($id, Request $request)
    {
        $size=new ProductSize();
        $session = new Session();
        $form = $this->get('form.factory')->create(ProductSizeType::class,$size);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $serviceProduct = $this->get('core.service.product');
            $product=$serviceProduct->getProduct($id);
            $em = $this->getDoctrine()->getManager();
            $size->setProduct($product);
            $em->persist($size);
            $em->flush();
            $session->getFlashBag()->add('success', 'la taille est bien enregistrée !');
            return $this->redirectToRoute('admin_product_size_add',array('id' => $id));
        }
        return $this->render('AdminBundle:ProductSize:add.html.twig', array(
            'form' => $form->createView(),
            'id'=>$id,
        ));
    }
    public function indexAction($id)
    {
        $serviceProduct = $this->get('core.service.product');
        $product=$serviceProduct->getProduct($id);
        $sizes=$product->getSizes();
        $formDelete = $this->get('form.factory')->create();
        return $this->render('AdminBundle:ProductSize:index.html.twig', array(
            'sizes' => $sizes,
            'formDelete'   => $formDelete->createView(),
            'idp' =>$id
        ));
    }
    public function editAction(Request $request ,$idp,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $serviceSize = $this->get('core.service.size');
        $size=$serviceSize->getSize($id);
        $form = $this->get('form.factory')->create(ProductSizeEditType::class,$size);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em->flush();
            return $this->redirectToRoute('admin_product_size_list',array('id' => $idp));
        }
        return $this->render('AdminBundle:ProductSize:edit.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    public function disableAction(Request $request,$idp,$id)
    {
        $formDelete = $this->get('form.factory')->create();
        if ($request->isMethod('POST') && $formDelete->handleRequest($request)->isValid()) {
            $serviceSize = $this->get('core.service.size');
            $em = $this->getDoctrine()->getManager();
            $size=$serviceSize->getSize($id);
            $size->setDeleted(true);
            $em->flush();
            return $this->redirectToRoute('admin_product_size_list',array('id' => $idp));
        }
        return $this->render('AdminBundle::delete.html.twig', array(
            'formDelete'   => $formDelete->createView(),
        ));
    }
    public function enableAction(Request $request,$idp,$id)
    {
        $formDelete = $this->get('form.factory')->create();
        if ($request->isMethod('POST') && $formDelete->handleRequest($request)->isValid()) {
            $serviceSize = $this->get('core.service.size');
            $em = $this->getDoctrine()->getManager();
            $size=$serviceSize->getSize($id);
            $size->setDeleted(false);
            $em->flush();
            return $this->redirectToRoute('admin_product_size_list',array('id' => $idp));
        }
        return $this->render('AdminBundle::delete.html.twig', array(
            'formDelete'   => $formDelete->createView(),
        ));
    }
    public function deleteAction(Request $request,$idp,$id){
        $em=$this->getDoctrine()->getManager();
        $serviceSize=$this->get('core.service.size');
        $size=$serviceSize->getSize($id);
        if (null === $size) {
            throw new NotFoundHttpException("La taille  de l'id ".$id." n'existe pas.");
        }
        $formDelete = $this->get('form.factory')->create();
        if ($request->isMethod('POST') && $formDelete->handleRequest($request)->isValid()) {
            $em->remove($size);
            $em->flush();
            return $this->redirectToRoute('admin_product_size_list',array('id' => $idp));
        }
        return $this->render('AdminBundle::delete.html.twig', array(
            'formDelete' => $formDelete->createView(),
        ));
    }
}