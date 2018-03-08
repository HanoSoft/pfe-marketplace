<?php
/**
 * Created by PhpStorm.
 * User: Hamdi
 * Date: 08/03/2018
 * Time: 19:03
 */

namespace CoreBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use CoreBundle\Entity\ProductSize;
class ProductSizeController extends Controller
{
    public function addAction($id, Request $request){
        $em = $this->getDoctrine()->getManager();
        $size = new ();
        $form = $this->get('form.factory')->create(ImageType::class, $image);
        $product = $em->getRepository('CoreBundle:Product')->find($id);
        $image->setProduct($product);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

            $image->setDeleted(false);
            $image->upload();

            $em->persist($image);
            $em->flush();


        }
        return $this->render('CoreBundle:Image:add.html.twig', array(
            'form' => $form->createView(),
        ));
    }

}