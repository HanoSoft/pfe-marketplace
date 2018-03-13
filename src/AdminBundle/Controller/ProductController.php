<?php
/**
 * Created by PhpStorm.
 * User: Hamdi
 * Date: 03/03/2018
 * Time: 12:42
 */
namespace AdminBundle\Controller;

use AdminBundle\Form\ProductEditType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use CoreBundle\Entity\Product;
use AdminBundle\Form\ProductType;
use CoreBundle\Entity\ProductSize;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function indexAction()
    {
        return $this->render('AdminBundle:Product:index.html.twig');
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
        return $this->render('AdminBundle:Product:add.html.twig', array(
            'form' => $form->createView(),
        ));

    }

    public function showAction(Request $request)
    {
            $repository = $this->getDoctrine()
            ->getManager()->
            getRepository('AdminBundle:Product');
            $products = $repository->getAllProducts(false);
        $formDelete = $this->get('form.factory')->create();

        /**
         * @var $paginator\knp\component\Pager\Paginator
         */
            $paginator=$this->get('knp_paginator');
            $pagination=$paginator->paginate(
            $products,
            $request->query->getInt('page',1),
            $request->query->getInt('limit',5)
        );

        return $this->render('AdminBundle:Product:index.html.twig', array(
            'products' => $pagination,
            'formDelete'   => $formDelete->createView(),

            ));
    }
    public function deleteAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository('AdminBundle:Product')->find($id);

        if (null === $product) {
            throw new NotFoundHttpException("L'article  ".$id." n'existe pas.");
        }

        $formDelete = $this->get('form.factory')->create();

        if ($request->isMethod('POST') && $formDelete->handleRequest($request)->isValid()) {
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
        return $this->render('AdminBundle:Product:delete.html.twig', array(
            'product' => $product,
            'formDelete'   => $formDelete->createView(),
        ));
    }
    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $product = $em->getRepository('AdminBundle:Product')->find($id);
        $sizes=$product->getSizes();
        $images=$product->getImages();
        $form = $this->get('form.factory')->create(ProductEditType::class, $product);
        $formDelete = $this->get('form.factory')->create();
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em->flush();
            return $this->redirectToRoute('admin_product_show');
        }
        return $this->render('AdminBundle:Product:edit.html.twig', array(
            'product' => $product,
            'form'   => $form->createView(),
            'formDelete'   => $formDelete->createView(),
            'sizes'  => $sizes,
            'images'  => $images,

        ));
    }


}