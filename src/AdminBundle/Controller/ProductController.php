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
class ProductController extends Controller
{
    public function indexAction()
    {
        return $this->render('AdminBundle:Product:index.html.twig');
    }
    public function addArticleAction(Request $request)
    {

        $product = new Product();
        $form   = $this->get('form.factory')->create(ProductType::class, $product);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

            $article->getImage()->upload();



            $article->setPublished(new \Datetime());

            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();
            return $this->redirectToRoute('hn_admin_menu');

        }
        return $this->render('HNAdminBundle:Default:add.html.twig', array(
            'form' => $form->createView(),
        ));

    }
}