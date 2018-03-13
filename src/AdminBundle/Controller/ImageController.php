<?php
/**
 * Created by PhpStorm.
 * User: Hamdi
 * Date: 06/03/2018
 * Time: 10:40
 */

namespace AdminBundle\Controller;


use CoreBundle\Entity\Image;
use AdminBundle\Form\ImageEditType;
use AdminBundle\Form\ImageType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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

        return $this->render('AdminBundle:Image:add.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $image = $em->getRepository('CoreBundle:Image')->find($id);
        $form = $this->get('form.factory')->create(ImageEditType::class, $image);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

            $em->flush();
            return $this->redirectToRoute('admin_product_show');
        }

        return $this->render('AdminBundle:Image:edit.html.twig', array(
            'image' => $image,
            'form'   => $form->createView(),

        ));
    }

    public function deleteAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $image = $em->getRepository('CoreBundle:Image')->find($id);

        if (null === $image) {
            throw new NotFoundHttpException("L'image  ".$id." n'existe pas.");
        }

        $formDelete = $this->get('form.factory')->create();

        if ($request->isMethod('POST') && $formDelete->handleRequest($request)->isValid()) {
            $image->setDeleted(true);

            $em->flush();

            return $this->redirectToRoute('admin_product_show');
        }
        return $this->render('CoreBundle:Product:delete.html.twig', array(
            'image' => $image,
            'formDelete'   => $formDelete->createView(),

        ));

    }

}