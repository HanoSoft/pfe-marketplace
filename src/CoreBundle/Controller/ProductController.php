<?php
/**
 * Created by PhpStorm.
 * User: Hamdi
 * Date: 03/03/2018
 * Time: 12:42
 */

namespace CoreBundle\Controller;



use CoreBundle\Entity\Image;
use CoreBundle\Form\ImageType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use CoreBundle\Entity\Product;
use CoreBundle\Form\ProductType;
class ProductController extends Controller
{
    public function indexAction()
    {
        return $this->render('CoreBundle:Product:index.html.twig');
    }

    public function addAction(Request $request)
    {
        $product = new Product();
        $image=new Image();
        $file = $request->request->get("file1");
        $image->setFile($file);

        $form = $this->get('form.factory')->create(ProductType::class, $product);

            if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

                $product->setDeleted(false);
                $image->setDeleted(false);
                $image->setProduct($product->getId());

                $em = $this->getDoctrine()->getManager();
                $em->persist($product);
                $em->flush();
                return $this->redirectToRoute('admin_product_show');
            }
        return $this->render('CoreBundle:Product:add.html.twig', array(
            'form' => $form->createView(),
        ));

    }
}