<?php
/**
 * Created by PhpStorm.
 * User: Hamdi
 * Date: 23/03/2018
 * Time: 10:22
 */

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AdminBundle\Form\BrandType;

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
    public function listAction(Request $request)
    {
        $manager = $this->get('core.service.brand_manager');
        $brands=$manager->getAll();
        $formDelete = $this->get('form.factory')->create();
        return $this->render('AdminBundle:Brand:index.html.twig', array(
            'brands' => $brands,
            'formDelete'   => $formDelete->createView(),
        ));
    }
    public function deleteAction(Request $request,$id)
    {
        $formDelete = $this->get('form.factory')->create();
        if ($request->isMethod('POST') && $formDelete->handleRequest($request)->isValid()) {
            $manager = $this->get('core.service.brand_manager');
            $manager->delete($id);
            return $this->redirectToRoute('admin_brand_list');
        }
        return $this->render('AdminBundle::delete.html.twig', array(
            'formDelete'   => $formDelete->createView(),
        ));
    }
}