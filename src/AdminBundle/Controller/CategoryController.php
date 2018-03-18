<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AdminBundle\Form\CategoryType;
use Symfony\Component\HttpFoundation\Request;
use AdminBundle\Form\CategoryEditType;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CategoryController extends Controller
{
        public function addAction(Request $request)
    {

        $form   = $this->get('form.factory')->create(CategoryType::class);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $manager = $this->get('core.service.category.manager');
            $manager->add($form);
            return $this->redirectToRoute('admin_category_show');
        }
        return $this->render('AdminBundle:Category:add.html.twig', array(
            'form' => $form->createView(),
        ));    }
     public function showAction(Request $request)
    {
            $repository = $this->getDoctrine()
            ->getManager()->
            getRepository('CoreBundle:Category');
            $category = $repository->getAllCategories(false);


        return $this->render('AdminBundle:Category:index.html.twig', array(
            'categories' => $category,
            ));
    }

         public function editAction($id, Request $request)
  {
              $em = $this->getDoctrine()->getManager();
              $category = $em->getRepository('CoreBundle:Category')->find($id);
              $form = $this->get('form.factory')->create(CategoryEditType::class, $category);

               if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

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