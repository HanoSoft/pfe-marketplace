<?php
/**
 * Created by PhpStorm.
 * User: Hamdi
 * Date: 06/03/2018
 * Time: 10:40
 */

namespace CoreBundle\Controller;


use CoreBundle\Form\ImageType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ImageController extends Controller
{
    public function addAction($id, Request $request){

        $em = $this->getDoctrine()->getManager();

        $image = $em->getRepository('CoreBundle:Image')->find($id);


        $form = $this->get('form.factory')->create(ImageType::class, $image);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
           $image->setDeleted(false);
            $em->persist($image);
            $em->flush();
            return $this->redirectToRoute('admin_category_show');
        }

        return $this->render('CoreBundle:Image:add.html.twig', array(
            'image' => $image,
            'form'   => $form->createView(),
        ));
    }

}