<?php


namespace AdminBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AdminBundle\Form\ColorType;
use Symfony\Component\HttpFoundation\Request;
use CoreBundle\Entity\Color;
use AdminBundle\Form\ColorEditType;

class ColorController extends Controller
{
        public function showAction(Request $request)
    {
              $repository = $this->getDoctrine()
              ->getManager()->
              getRepository('AdminBundle:Color');
              $color = $repository->getAllColors(false);

          /**
           * @var $paginator\knp\component\Pager\Paginator
           */
              $paginator=$this->get('knp_paginator');
              $pagination=$paginator->paginate(
              $color,
              $request->query->getInt('page',1),
              $request->query->getInt('limit',5)
        );

        return $this->render('AdminBundle:Color:index.html.twig', array(
            'colors' => $pagination,
            ));
    }


        public function addAction(Request $request)
        {
            $color = new Color();


        $form   = $this->get('form.factory')->create(ColorType::class, $color);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            


            $em = $this->getDoctrine()->getManager();
            $em->persist($color);
            $em->flush();
            return $this->redirectToRoute('admin_color_show');

        }
        return $this->render('AdminBundle:Color:add.html.twig', array(
            'form' => $form->createView(),
        ));    }


}