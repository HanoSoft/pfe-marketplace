<?php

namespace AdminBundle\Controller;

use AdminBundle\Form\CategoryType;
use CoreBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AdminBundle\Form\CategoryEditType;


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
        $form = $this->createForm(CategoryType::class,$category);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();
            $id=$category->getId();
            return $this->redirectToRoute('admin_category_add',array('id' => $id));
        }
        return $this->render('AdminBundle:Category:add.html.twig', array(
            'form' => $form->createView(),
        ));
    }

  /*  public function editAction($id, Request $request)
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
            $em = $this->getDoctrine()->getManager();
            $serviceCategory->disableCategory($id);
            $em->flush();
            return $this->redirectToRoute('admin_category_list');
        }
        return $this->render('AdminBundle::delete.html.twig', array(
            'formDelete' => $formDelete->createView(),
        ));
    }*/









}