<?php
/**
 * Created by PhpStorm.
 * User: Nouha
 * Date: 23/03/2018
 * Time: 10:22
 */

namespace AdminBundle\Controller;

use CoreBundle\Entity\Brand;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AdminBundle\Form\BrandType;
use Symfony\Component\HttpFoundation\Session\Session;
use AdminBundle\Form\BrandEditType;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BrandController extends Controller
{
    public function indexAction()
    {
        $serviceBrand = $this->get('core.service.brand');
        $brands=$serviceBrand->getBrands();
        $formDelete = $this->get('form.factory')->create();
        return $this->render('AdminBundle:Brand:index.html.twig', array(
            'brands' => $brands,
            'formDelete'   => $formDelete->createView(),
        ));
    }
    public function addAction(Request $request)
    {
        $brand=new Brand();
        $session = new Session();
        $id = $request->request->get("user");
        $form = $this->get('form.factory')->create(BrandType::class,$brand);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $brand->getLogo()->upload();
            $brand->getBrandImage()->upload();
            $serviceUser = $this->get('fos_user.user_manager');
            $user = $serviceUser->findUserBy(array('id'=>$id));
            $brand->setUser($user);
            $em->persist($brand);
            $em->flush();
            $session->getFlashBag()->add('success', 'la marque est bien enregistrée !');
            return $this->redirectToRoute('admin_brand_add');
        }
        return $this->render('AdminBundle:Brand:add.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    public function showAction($id)
    {
        $serviceBrand = $this->get('core.service.brand');
        $brand = $serviceBrand->getBrand($id);
        return $this->render('AdminBundle:Brand:show.html.twig', array(
            'brand' => $brand,
        ));
    }
    public function disableAction(Request $request,$id)
    {
        $formDelete = $this->get('form.factory')->create();
        if ($request->isMethod('POST') && $formDelete->handleRequest($request)->isValid()) {
            $serviceBrand = $this->get('core.service.brand');
            $em = $this->getDoctrine()->getManager();
            $brand=$serviceBrand->getBrand($id);
            $brand->setDeleted(true);
            $em->flush();
            return $this->redirectToRoute('admin_brand_list');
        }
        return $this->render('AdminBundle::delete.html.twig', array(
            'formDelete'   => $formDelete->createView(),
        ));
    }
    public function enableAction(Request $request,$id)
    {
        $formDelete = $this->get('form.factory')->create();
        if ($request->isMethod('POST') && $formDelete->handleRequest($request)->isValid()) {
            $serviceBrand = $this->get('core.service.brand');
            $em = $this->getDoctrine()->getManager();
            $brand=$serviceBrand->getBrand($id);
            $brand->setDeleted(false);
            $em->flush();
            return $this->redirectToRoute('admin_brand_list');
        }
        return $this->render('AdminBundle::delete.html.twig', array(
            'formDelete'   => $formDelete->createView(),
        ));
    }
    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $serviceBrand = $this->get('core.service.brand');
        $brand=$serviceBrand->getBrand($id);
        $form = $this->get('form.factory')->create(BrandEditType::class,$brand);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em->flush();
            return $this->redirectToRoute('admin_brand_list');
        }
        return $this->render('AdminBundle:Brand:edit.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
