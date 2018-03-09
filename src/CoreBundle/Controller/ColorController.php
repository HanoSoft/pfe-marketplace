<?php


namespace CoreBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use CoreBundle\Form\ColorType;
use Symfony\Component\HttpFoundation\Request;
use CoreBundle\Entity\Color;
use CoreBundle\Form\ColorEditType;


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
              $category,
              $request->query->getInt('page',1),
              $request->query->getInt('limit',5)
        );

        return $this->render('CoreBundle:Color:index.html.twig', array(
            'colors' => $pagination,
            ));
    }

