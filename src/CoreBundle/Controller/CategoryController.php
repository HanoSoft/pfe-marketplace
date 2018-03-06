<?php

namespace CoreBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CoreBundle\Form\CategoryType;
use Symfony\Component\HttpFoundation\Request;
use CoreBundle\Entity\Category;
use CoreBundle\Form\CategoryEditType;



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
        return $this->render('CoreBundle:Category:add.html.twig', array(
            'form' => $form->createView(),
        ));    }



        public function showAction(Request $request)
    {

            $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('CoreBundle:Category');

            // On récupère l'entité correspondante hna tw jibna l3ndhom delted false n7bou
            $category = $repository->findCategories(false);

            // Le render ne change pas, on passait avant un tableau, maintenant un objet
             return $this->render('CoreBundle:Category:index.html.twig', array(
            'listCategory' => $category,
        ));
    }


    /*modifier categorie*/

         public function editAction($id, Request $request)
  {
              $em = $this->getDoctrine()->getManager();

              $category = $em->getRepository('CoreBundle:Category')->find($id);


              $form = $this->get('form.factory')->create(CategoryEditType::class, $category);

               if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
                // Inutile de persister ici, Doctrine connait déjà notre annonce
              $em->flush();
                return $this->redirectToRoute('admin_category_show');}

                 return $this->render('CoreBundle:Category:edit.html.twig', array(
                    'category' => $category,
                    'form'   => $form->createView(),
    ));
  }



public function deleteAction(Request $request, $id)
  {
      $em = $this->getDoctrine()->getManager();
      $category  = $em->getRepository('CoreBundle:Category')->find($id);
      $category->setDeleted(true);
  
        if (null === $category) {
          throw new NotFoundHttpException("La categorie  ".$id." n'existe pas.");
              }

        // On crée un formulaire vide, qui ne contiendra que le champ CSRF
       // Cela permet de protéger la suppression d'annonce contre cette faille
        $form = $this->get('form.factory')->create();
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
          $em->flush();
            return $this->redirectToRoute('admin_category_show');
          }
    
        return $this->render('CoreBundle:Category:delete.html.twig', array(
          'category' => $category,
          'form'   => $form->createView(),
    ));
  }

}