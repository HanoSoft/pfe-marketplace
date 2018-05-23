<?php
/**
 * Created by PhpStorm.
 * User: nouha
 * Date: 13/05/2018
 * Time: 13:31
 */

namespace AdminBundle\Controller;

use CoreBundle\Entity\Delivery;
use CoreBundle\Form\DeliveryEditType;
use CoreBundle\Form\DeliveryType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DeliveryController extends Controller
{
    public function indexAction()
    {
        $serviceDelivery = $this->get('core.service.delivery');
        $deliveries=$serviceDelivery->getDeliveries();
        $app=$this->getUser();
        $historyService=$this->get('core.service.history');
        $historyService->addHistory($app->getUserName(),'Consulter livreurs',0);
        $formDelete = $this->get('form.factory')->create();
        return $this->render('AdminBundle:Delivery:index.html.twig', array(
            'deliveries' => $deliveries,
            'formDelete'   => $formDelete->createView(),
        ));
    }
    public function addAction(Request $request)
    {
        $delivery=new Delivery();
        $session = new Session();
        $form = $this->createForm(DeliveryType::class,$delivery);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($delivery);
            $app=$this->getUser();
            $historyService=$this->get('core.service.history');
            $historyService->addHistory($app->getUserName(),'Ajouter livreur',$delivery->getId());
            $em->flush();
            $session->getFlashBag()->add('success', 'la livraison est bien enregistrée !');
            return $this->redirectToRoute('admin_delivery_add');
        }
        return $this->render('AdminBundle:Delivery:add.html.twig', array(
            'form' => $form->createView(),
        ));

    }
    public function editAction(Request $request ,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $serviceDelivery = $this->get('core.service.delivery');
        $delivery=$serviceDelivery->getDelivery($id);
        $app=$this->getUser();
        $historyService=$this->get('core.service.history');
        $historyService->addHistory($app->getUserName(),'Modifier livreur',$delivery->getId());
        $form = $this->get('form.factory')->create(DeliveryEditType::class,$delivery);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em->flush();
            return $this->redirectToRoute('admin_delivery_list');
        }
        return $this->render('AdminBundle:Delivery:edit.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function deleteAction(Request $request,$id){
        $em=$this->getDoctrine()->getManager();
        $serviceDelivery = $this->get('core.service.delivery');
        $delivery=$serviceDelivery->getDelivery($id);
        if (null === $delivery) {
            throw new NotFoundHttpException("La livraison  de l'id ".$id." n'existe pas.");
        }
        $formDelete = $this->get('form.factory')->create();
        if ($request->isMethod('POST') && $formDelete->handleRequest($request)->isValid()) {
            $em->remove($delivery);
            $app=$this->getUser();
            $historyService=$this->get('core.service.history');
            $historyService->addHistory($app->getUserName(),'Supprimer livreur',$delivery->getId());
            $em->flush();
            return $this->redirectToRoute('admin_delivery_list');
        }
        return $this->render('AdminBundle::delete.html.twig', array(
            'formDelete' => $formDelete->createView(),
        ));
    }
    public function disableAction(Request $request,$id)
    {
        $formDelete = $this->get('form.factory')->create();
        if ($request->isMethod('POST') && $formDelete->handleRequest($request)->isValid()) {
            $serviceDelivery = $this->get('core.service.delivery');
            $em = $this->getDoctrine()->getManager();
            $delivery=$serviceDelivery->getDelivery($id);
            $delivery->setDeleted(true);
            $app=$this->getUser();
            $historyService=$this->get('core.service.history');
            $historyService->addHistory($app->getUserName(),'Désactiver livreur',$delivery->getId());
            $em->flush();
            return $this->redirectToRoute('admin_delivery_list');
        }
        return $this->render('AdminBundle::delete.html.twig', array(
            'formDelete'   => $formDelete->createView(),
        ));
    }
    public function enableAction(Request $request,$id)
    {
        $formDelete = $this->get('form.factory')->create();
        if ($request->isMethod('POST') && $formDelete->handleRequest($request)->isValid()) {
            $serviceDelivery = $this->get('core.service.delivery');
            $em = $this->getDoctrine()->getManager();
            $delivery=$serviceDelivery->getDelivery($id);
            $delivery->setDeleted(false);
            $app=$this->getUser();
            $historyService=$this->get('core.service.history');
            $historyService->addHistory($app->getUserName(),'Activer livreur',$delivery->getId());
            $em->flush();
            return $this->redirectToRoute('admin_delivery_list');
        }
        return $this->render('AdminBundle::delete.html.twig', array(
            'formDelete'   => $formDelete->createView(),
        ));
    }

}