<?php


namespace CoreBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CoreBundle\Form\ColorType;
use Symfony\Component\HttpFoundation\Request;
use CoreBundle\Entity\Color;
use CoreBundle\Form\ColorEditType;

class ColorController extends Controller
{
        public function showAction(Request $request)
    {
              $repository = $this->getDoctrine()
              ->getManager()->
              getRepository('CoreBundle:Color');
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

        return $this->render('CoreBundle:Color:index.html.twig', array(
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
        return $this->render('CoreBundle:Color:add.html.twig', array(
            'form' => $form->createView(),
        ));    }


}