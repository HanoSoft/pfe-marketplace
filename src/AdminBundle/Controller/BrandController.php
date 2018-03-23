<?php
/**
 * Created by PhpStorm.
 * User: Hamdi
 * Date: 23/03/2018
 * Time: 10:22
 */

namespace AdminBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BrandController extends Controller
{
    public function indexAction()
    {
        return $this->render('AdminBundle:Brand:index.html.twig');
    }
    public function addAction(Request $request)
    {

        $form   = $this->get('form.factory')->create(BrandType::class);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $manager = $this->get('core.service.brand_manager');
            $manager->add($form);

            return $this->redirectToRoute('admin_brand_add');
        }
        return $this->render('AdminBundle:Brand:add.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}