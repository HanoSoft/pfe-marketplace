<?php
/**
 * Created by PhpStorm.
 * User: Hamdi
 * Date: 03/03/2018
 * Time: 12:42
 */

namespace CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use CoreBundle\Entity\Product;
use CoreBundle\Form\ProductType;
use CoreBundle\Entity\ProductSize;
class ProductController extends Controller
{
    public function indexAction()
    {
        return $this->render('CoreBundle:Product:index.html.twig');
    }

    public function addAction(Request $request)
    {
        $product = new Product();
        $form = $this->get('form.factory')->create(ProductType::class, $product);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

            $product->setDeleted(false);
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();
            $id=$product->getId();
            return $this->redirectToRoute('admin_product_size_add',array('id' => $id));
         }
        return $this->render('CoreBundle:Product:add.html.twig', array(
            'form' => $form->createView(),
        ));

    }

    public function showAction(Request $request)
    {
        $repository = $this->getDoctrine()
            ->getManager()->
            getRepository('CoreBundle:Product');
        $products = $repository->getAllProducts(false);

        /**
         * @var $paginator\knp\component\Pager\Paginator
         */
        $paginator=$this->get('knp_paginator');
        $pagination=$paginator->paginate(
            $products,
            $request->query->getInt('page',1),
            $request->query->getInt('limit',5)
        );



        return $this->render('CoreBundle:Product:index.html.twig', array(
            'products' => $pagination,
            ));
    }
}