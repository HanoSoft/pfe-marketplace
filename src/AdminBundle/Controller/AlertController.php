<?php
/**
 * Created by PhpStorm.
 * User: Hamdi
 * Date: 23/03/2018
 * Time: 13:50
 */

namespace AdminBundle\Controller;

use AdminBundle\Form\AlertEditType;
use AdminBundle\Form\AlertType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AlertController extends Controller
{
    public function addAction(Request $request)
    {
        $manager = $this->get('core.service.alert_manager');
        $form  = $this->get('form.factory')->create(AlertType::class);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

            $manager->add($form);
            return $this->redirectToRoute('admin_alert_show');
        }
        $alerts=$manager->getAll();
        return $this->render('AdminBundle:Alert:add.html.twig', array(
            'form' => $form->createView(),
            'alert' => $alerts
        ));
    }
    public function listAction(Request $request)
    {
        $manager= $this->get('core.service.alert_manager');
        $alerts=$manager->getAll();
            if ($alerts != null) {
                return $this->redirectToRoute('admin_alert_edit', array(
                    'alert' => $alerts,
                ));
        }
        return $this->redirectToRoute('admin_alert_add');
    }
    public function editAction($id, Request $request)
    {
        $manager = $this->get('core.service.alert_manager');
        $alert=$manager->find($id);
        $form = $this->get('form.factory')->create(AlertEditType::class,$alert);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $manager->edit($form,$id);
            return $this->redirectToRoute('admin_alert_show');
        }
        return $this->render('AdminBundle:Alert:edit.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}