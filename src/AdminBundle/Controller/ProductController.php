<?php
/**
 * Created by PhpStorm.
 * User: Hamdi
 * Date: 03/03/2018
 * Time: 12:42
 */

namespace AdminBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AdminBundle\Entity\Product;
use AdminBundle\Form\ProductType;
class ProductController extends Controller
{
    public function indexAction()
    {
        return $this->render('AdminBundle:Product:index.html.twig');
    }
    public function addAction(Request $request)
    {

        $product = new Product();
        $form   = $this->get('form.factory')->create(ProductType::class, $product);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

           /* $product->getImage()->upload();*/

            $product->setDeleted(false);
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();
            return $this->redirectToRoute('admin_product_show');

        }
        return $this->render('AdminBundle:Product:add.html.twig', array(
            'form' => $form->createView(),
        ));

    }
}