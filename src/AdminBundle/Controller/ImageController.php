<?php

namespace AdminBundle\Controller;

use AdminBundle\Form\ImageEditType;
use AdminBundle\Form\ImageType;
use CoreBundle\Entity\Image;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class ImageController extends Controller
{
    public function indexAction($id)
    {
        $serviceProduct = $this->get('core.service.product');
        $product=$serviceProduct->getProduct($id);
        $images=$product->getImages();
        $formDelete = $this->get('form.factory')->create();
        return $this->render('AdminBundle:Image:index.html.twig', array(
            'images' => $images,
            'formDelete'   => $formDelete->createView(),
            'idp' =>$id
        ));
    }
    public function addAction($id,Request $request)
    {
        $image=new Image();
        $session = new Session();
        $form = $this->get('form.factory')->create(ImageType::class,$image);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $serviceProduct = $this->get('core.service.product');
            $product=$serviceProduct->getProduct($id);
            $em = $this->getDoctrine()->getManager();
            $image->setProduct($product);
            $image->upload();
            $em->persist($image);
            $em->flush();
            $session->getFlashBag()->add('success', "L'image est bien enregistrée !");
            return $this->redirectToRoute('admin_product_image_add',array('id' => $id));
        }
        return $this->render('AdminBundle:Image:add.html.twig', array(
            'form' => $form->createView(),
        ));
    }


    /*
     *


    public function editAction(Request $request ,$idp,$id)
    {
        $manager = $this->get('core.service.image_manager');
        $image=$manager->find($id);
        $form = $this->get('form.factory')->create(ImageEditType::class,$image);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $manager->edit($form,$id);
            return $this->redirectToRoute('admin_product_image_list',array('id' => $idp));
        }
        return $this->render('AdminBundle:Image:edit.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    public function deleteAction(Request $request,$idp,$id)
    {
        $formDelete = $this->get('form.factory')->create();
        if ($request->isMethod('POST') && $formDelete->handleRequest($request)->isValid()) {
            $manager = $this->get('core.service.image_manager');
            $manager->delete($id);
            return $this->redirectToRoute('admin_product_image_list',array('id' => $idp));
        }
        return $this->render('AdminBundle::delete.html.twig', array(
            'formDelete'   => $formDelete->createView(),
        ));
    }*/
}