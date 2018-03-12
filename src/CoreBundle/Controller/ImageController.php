<?php
/**
 * Created by PhpStorm.
 * User: Hamdi
 * Date: 06/03/2018
 * Time: 10:40
 */

namespace CoreBundle\Controller;


use CoreBundle\Entity\Image;
use CoreBundle\Form\ImageType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
class ImageController extends Controller
{
    public function addAction($id, Request $request){
        $session = new Session();
        $em = $this->getDoctrine()->getManager();
        $image = new Image();
        $form = $this->get('form.factory')->create(ImageType::class, $image);
        $product = $em->getRepository('CoreBundle:Product')->find($id);
        $image->setProduct($product);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

            $image->setDeleted(false);
            $image->upload();

            $em->persist($image);
            $em->flush();
            $session->getFlashBag()->add('success', 'Image est bien enregistrée !');
            return $this->redirectToRoute('admin_product_image_add',array('id' => $id));
        }
        return $this->render('CoreBundle:Image:add.html.twig', array(
            'form' => $form->createView(),
        ));
    }

}