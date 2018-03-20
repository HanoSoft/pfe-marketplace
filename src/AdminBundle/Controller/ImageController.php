<?php

namespace AdminBundle\Controller;

use AdminBundle\Form\ImageType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class ImageController extends Controller
{
    public function addAction($id,Request $request)
    {
        $session = new Session();
        $form = $this->get('form.factory')->create(ImageType::class);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $manager=$this->get('core.service.image_manager');
            $manager->addImage($id,$form);
            $session->getFlashBag()->add('success', "L'image est bien enregistrée !");
            return $this->redirectToRoute('admin_product_image_add',array('id' => $id));
        }
        return $this->render('AdminBundle:Image:add.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function listAction($id)
    {
        $manager = $this->get('core.service.image_manager');
        $images=$manager->findByProduct($id);
        $formDelete = $this->get('form.factory')->create();
        return $this->render('AdminBundle:Image:list.html.twig', array(
            'images' => $images,
            'formDelete'   => $formDelete->createView(),
        ));
    }

}