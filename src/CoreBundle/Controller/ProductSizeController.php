<?php
/**
 * Created by PhpStorm.
 * User: Hamdi
 * Date: 08/03/2018
 * Time: 19:03
 */

namespace CoreBundle\Controller;
use CoreBundle\Form\ProductSizeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use CoreBundle\Entity\ProductSize;
class ProductSizeController extends Controller
{
    public function addAction($id, Request $request){
        $em = $this->getDoctrine()->getManager();
        $size = new ProductSize();
        $form = $this->get('form.factory')->create(ProductSizeType::class, $size);
        $product = $em->getRepository('CoreBundle:Product')->find($id);
        $size->setProduct($product);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

            $size->setDeleted(false);


            $em->persist($size);
            $em->flush();

        }
        return $this->render('CoreBundle:ProductSize:add.html.twig', array(
            'form' => $form->createView(),
            'product'=>$product
        ));
    }

}