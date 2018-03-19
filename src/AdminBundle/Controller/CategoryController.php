<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AdminBundle\Form\CategoryType;
use Symfony\Component\HttpFoundation\Request;
use AdminBundle\Form\CategoryEditType;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CategoryController extends Controller
{
    public function addAction(Request $request)
    {
        $session=new Session();
        $form   = $this->get('form.factory')->create(CategoryType::class);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $manager = $this->get('core.service.category_manager');
            $manager->add($form);
            $session->getFlashBag()->add('success', 'la Catégorie est bien enregistrée !');
            return $this->redirectToRoute('admin_category_add');
        }
        return $this->render('AdminBundle:Category:add.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    public function listAction(Request $request)
    {
        $manager= $this->get('core.service.category_manager');
        $categories=$manager->getAll(false);
        $formDelete= $this->get('form.factory')->create();
        return $this->render('AdminBundle:Category:index.html.twig', array(
            'categories' => $categories,
            'formDelete' => $formDelete->createView(),
        ));
    }
    public function editAction($id, Request $request)
    {
        $manager = $this->get('core.service.category_manager');
        $category=$manager->find($id);
        $form = $this->get('form.factory')->create(CategoryEditType::class,$category);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $manager->edit($form,$id);
            return $this->redirectToRoute('admin_category_list');
        }
        return $this->render('AdminBundle:Category:edit.html.twig', array(
            'form' => $form->createView(),
        ));
  }
  public function deleteAction(Request $request, $id)
  {
      $manager = $this->get('core.service.category_manager');
      $category=$manager->find($id);
      $formDelete = $this->get('form.factory')->create();
      if ($request->isMethod('POST') && $formDelete->handleRequest($request)->isValid()) {
          $manager->delete($id);
          return $this->redirectToRoute('admin_category_list');
      }
      return $this->render('AdminBundle:Category:delete.html.twig', array(
          'formDelete'   => $formDelete->createView(),
          'category' => $category,
      ));
  }

}