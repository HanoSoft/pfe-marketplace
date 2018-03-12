<?php
/**
 * Created by PhpStorm.
 * User: Hamdi
 * Date: 03/03/2018
 * Time: 12:42
 */

namespace CoreBundle\Controller;

use CoreBundle\Form\ProductEditType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use CoreBundle\Entity\Product;
use CoreBundle\Form\ProductType;
use CoreBundle\Entity\ProductSize;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;

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
        $form = $this->get('form.factory')->create();

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
            'form'   => $form->createView(),

            ));
    }

    public function deleteAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository('CoreBundle:Product')->find($id);

        if (null === $product) {
            throw new NotFoundHttpException("L'article  ".$id." n'existe pas.");
        }

        $form = $this->get('form.factory')->create();

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $product->setDeleted(true);
            $images=$product->getImages();
            $sizes=$product->getSizes();
            foreach ( $images as $image){
                $image->setDeleted(true);
            }

            foreach ( $sizes as $size){
                $size->setDeleted(true);
            }

           $em->flush();

            return $this->redirectToRoute('admin_product_show');
        }
        return $this->render('CoreBundle:Product:delete.html.twig', array(
            'product' => $product,
            'form'   => $form->createView(),

        ));

    }

    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $product = $em->getRepository('CoreBundle:Product')->find($id);
        $sizes=$product->getSizes();
        $images=$product->getImages();
        $form = $this->get('form.factory')->create(ProductEditType::class, $product);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

            $em->flush();
            return $this->redirectToRoute('admin_product_show');
        }

        return $this->render('CoreBundle:Product:edit.html.twig', array(
            'product' => $product,
            'form'   => $form->createView(),
            'sizes'  => $sizes,
            'images'  => $images,

        ));
    }


}