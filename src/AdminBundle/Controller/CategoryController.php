<?php

namespace AdminBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AdminBundle\Form\CategoryType;
use Symfony\Component\HttpFoundation\Request;
use AdminBundle\Entity\Category;

class CategoryController extends Controller
{


    

    /* ajout*/

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



/*lister les categories*/
        public function showAction(Request $request)
    {


        // On récupère le repository
        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('AdminBundle:category')
        ;
        // On récupère l'entité correspondante

        $category = $repository->findAll();

        // Le render ne change pas, on passait avant un tableau, maintenant un objet
        return $this->render('AdminBundle:Category:index.html.twig', array(
            'listCategory' => $category,

        ));


    }
}