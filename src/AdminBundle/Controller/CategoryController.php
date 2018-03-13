<?php

namespace AdminBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AdminBundle\Form\CategoryType;
use Symfony\Component\HttpFoundation\Request;
use CoreBundle\Entity\Category;
use AdminBundle\Form\CategoryEditType;

class CategoryController extends Controller
{
        public function addAction(Request $request)
    {
        $category = new category();
        $form   = $this->get('form.factory')->create(CategoryType::class, $category);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();
            return $this->redirectToRoute('admin_category_show');

        }
        return $this->render('AdminBundle:Category:add.html.twig', array(
            'form' => $form->createView(),
        ));    }

        public function showAction(Request $request)
    {
            $repository = $this->getDoctrine()
            ->getManager()->
            getRepository('AdminBundle:Category');
            $category = $repository->getAllCategories(false);
        /**
         * @var $paginator\knp\component\Pager\Paginator
         */
            $paginator=$this->get('knp_paginator');
            $pagination=$paginator->paginate(
            $category,
            $request->query->getInt('page',1),
            $request->query->getInt('limit',5)
        );

        return $this->render('AdminBundle:Category:index.html.twig', array(
            'categories' => $pagination,
            ));
    }

         public function editAction($id, Request $request)
  {
              $em = $this->getDoctrine()->getManager();
              $category = $em->getRepository('AdminBundle:Category')->find($id);
              $form = $this->get('form.factory')->create(CategoryEditType::class, $category);

               if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
                // Inutile de persister ici, Doctrine connait déjà notre annonce
              $em->flush();
                return $this->redirectToRoute('admin_category_show');}
                 return $this->render('AdminBundle:Category:edit.html.twig', array(
                    'category' => $category,
                    'form'   => $form->createView(),
    ));
  }
        public function deleteAction(Request $request, $id)
  {
          $em = $this->getDoctrine()->getManager();
          $category  = $em->getRepository('AdminBundle:Category')->find($id);
          $category->setDeleted(true);
      
            if (null === $category) {
              throw new NotFoundHttpException("La categorie  ".$id." n'existe pas.");
                  }
            $form = $this->get('form.factory')->create();
            if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
              $em->flush();

                return $this->redirectToRoute('admin_category_show');
              }
            return $this->render('AdminBundle:Category:delete.html.twig', array(
              'category' => $category,
              'form'   => $form->createView(),
        ));
  }

}