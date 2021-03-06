<?php

namespace AdminBundle\Controller;

use CoreBundle\Form\ProductEditType;
use CoreBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use CoreBundle\Form\ProductType;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductController extends Controller
{
    public function indexAction()
    {
        $serviceProduct = $this->get('core.service.product');
        $products=$serviceProduct->getProducts();
        $formDelete = $this->get('form.factory')->create();
        $app=$this->getUser();
        $historyService=$this->get('core.service.history');
        $historyService->addHistory($app->getUserName(),'Consulter produits',0);
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
            $em->flush();
            $app=$this->getUser();
            $historyService=$this->get('core.service.history');
            $historyService->addHistory($app->getUserName(),'Ajouter produit',$product->getId());
            $id=$product->getId();
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
            $app=$this->getUser();
            $historyService=$this->get('core.service.history');
            $historyService->addHistory($app->getUserName(),'Modifier produit',$product->getId());
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
        $app=$this->getUser();
        $historyService=$this->get('core.service.history');
        $historyService->addHistory($app->getUserName(),'consulter un produit',$product->getId());
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
            $app=$this->getUser();
            $historyService=$this->get('core.service.history');
            $historyService->addHistory($app->getUserName(),'Désactiver produit',$id);
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
            $app=$this->getUser();
            $historyService=$this->get('core.service.history');
            $historyService->addHistory($app->getUserName(),'Activer Client',$id);
            return $this->redirectToRoute('admin_product_list');
        }
        return $this->render('AdminBundle::delete.html.twig', array(
            'formDelete' => $formDelete->createView(),
        ));
    }
    public function deleteAction(Request $request,$id){
        $em=$this->getDoctrine()->getManager();
        $serviceProduct=$this->get('core.service.product');
        $product=$serviceProduct->getProduct($id);
        if (null === $product) {
            throw new NotFoundHttpException("Le produit de l'id ".$id." n'existe pas.");
        }
        $formDelete = $this->get('form.factory')->create();
        if ($request->isMethod('POST') && $formDelete->handleRequest($request)->isValid()) {
            $em->remove($product);
            $app=$this->getUser();
            $historyService=$this->get('core.service.history');
            $historyService->addHistory($app->getUserName(),'Supprimer produit',$product->getId());
            $em->flush();
            return $this->redirectToRoute('admin_product_list');
        }
        return $this->render('AdminBundle::delete.html.twig', array(
            'formDelete' => $formDelete->createView(),
        ));
    }
}