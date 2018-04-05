<?php

namespace AdminBundle\Controller;

use AdminBundle\Form\CategoryType;
use CoreBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AdminBundle\Form\CategoryEditType;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CategoryController extends Controller
{
    public function indexAction()
    {
        $serviceCategory = $this->get('core.service.category');
        $categories=$serviceCategory->getCategories();
        $formDelete = $this->get('form.factory')->create();
        return $this->render('AdminBundle:Category:index.html.twig', array(
            'categories' => $categories,
            'formDelete'   => $formDelete->createView(),
        ));
    }
    public function addAction(Request $request)
    {
        $category=new Category();
        $session = new Session();
        $form = $this->createForm(CategoryType::class,$category);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();
            $id=$category->getId();
            $session->getFlashBag()->add('success', 'la categorie est bien enregistrée !');
            return $this->redirectToRoute('admin_category_add',array('id' => $id));
        }
        return $this->render('AdminBundle:Category:add.html.twig', array(
            'form' => $form->createView(),
        ));
    }
   public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $serviceCategory = $this->get('core.service.category');
        $category=$serviceCategory->getCategory($id);
        $form = $this->get('form.factory')->create(CategoryEditType::class,$category);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em->flush();
            return $this->redirectToRoute('admin_category_list');
        }
        return $this->render('AdminBundle:Category:edit.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    public function disableAction(Request $request,$id)
    {
        $formDelete = $this->get('form.factory')->create();
        if ($request->isMethod('POST') && $formDelete->handleRequest($request)->isValid()) {
            $serviceCategory = $this->get('core.service.category');
            $serviceProduct = $this->get('core.service.product');
            $category=$serviceCategory->getCategory($id);
            $category->setDeleted(true);
            $em = $this->getDoctrine()->getManager();
            $products=$category->getProducts();
            foreach ($products as $product){
                $serviceProduct->disableProduct($product->getId());
            }
            $em->flush();
            return $this->redirectToRoute('admin_category_list');
        }
        return $this->render('AdminBundle::delete.html.twig', array(
            'formDelete' => $formDelete->createView(),
        ));
    }
    public function enableAction(Request $request,$id)
    {
        $formDelete = $this->get('form.factory')->create();
        if ($request->isMethod('POST') && $formDelete->handleRequest($request)->isValid()) {
            $serviceCategory = $this->get('core.service.category');
            $serviceProduct = $this->get('core.service.product');
            $category=$serviceCategory->getCategory($id);
            $category->setDeleted(false);
            $em = $this->getDoctrine()->getManager();
            $products=$category->getProducts();
            foreach ($products as $product){
                $serviceProduct->disableProduct($product->getId());
            }
            $em->flush();
            return $this->redirectToRoute('admin_category_list');
        }
        return $this->render('AdminBundle::delete.html.twig', array(
            'formDelete' => $formDelete->createView(),
        ));
    }
    public function deleteAction(Request $request,$id){
        $em=$this->getDoctrine()->getManager();
        $serviceProduct=$this->get('core.service.product');
        $serviceCategory=$this->get('core.service.category');
        $category=$serviceCategory->getCategory($id);
        if (null === $category) {
            throw new NotFoundHttpException("Le produit de l'id ".$id." n'existe pas.");
        }
        $formDelete = $this->get('form.factory')->create();
        if ($request->isMethod('POST') && $formDelete->handleRequest($request)->isValid()) {

            foreach ($category->getProducts() as $product) {
                foreach ($product->getImages() as $image){
                    $em->remove($image);
                }
                foreach ($product->getSizes() as $size){
                    $em->remove($size);
                }
               $em->remove($product);
            }
            $em->remove($category);
            $em->flush();
            return $this->redirectToRoute('admin_category_list');
        }
        return $this->render('AdminBundle::delete.html.twig', array(
            'formDelete' => $formDelete->createView(),
        ));
    }
}