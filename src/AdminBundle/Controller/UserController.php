<?php
/**
 * Created by PhpStorm.
 * User: Hamdi
 * Date: 27/03/2018
 * Time: 18:15
 */

namespace AdminBundle\Controller;

use AdminBundle\Form\RegistrationFormType;
use AdminBundle\Form\UserEditType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    public function indexAction()
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('admin_access_denied');
        }
        $userManager = $this->get('fos_user.user_manager');
        $users = $userManager->findUsers();
        $formDelete = $this->get('form.factory')->create();
        return $this->render('AdminBundle:User:index.html.twig', array(
            'users' => $users,
            'formDelete'   => $formDelete->createView(),
        ));
    }
    public function addAction(Request $request)
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('admin_access_denied');
        }
        $userManager = $this->get('fos_user.user_manager');
        $user = $userManager->createUser();
        $role = $request->request->get("role");
        $form = $this->createForm(RegistrationFormType::class);
        $form->setData($user);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $user->addRole($role);
            $user->setEnabled(true);
            $userManager->updateUser($user);
            $app=$this->getUser();
            $historyService=$this->get('core.service.history');
            $historyService->addHistory($app->getUserName(),'Ajouter un utilisateur',$user->getId());
;           return $this->redirectToRoute('admin_user_list');
        }
        return $this->render('AdminBundle:User:add.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    public function editAction(Request $request,$id)
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('admin_access_denied');
        }
        $userManager = $this->get('fos_user.user_manager');
        $user = $userManager->findUserBy(array('id'=>$id));
        $form = $this->get('form.factory')->create(UserEditType::class);
        $form->setData($user);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $userManager->updateUser($user);
            $app=$this->getUser();
            $historyService=$this->get('core.service.history');
            $historyService->addHistory($app->getUserName(),'Modifier un utilisateur',$user->getId());
            return $this->redirectToRoute('admin_user_list');
        }
        return $this->render('AdminBundle:User:edit.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    public function disableAction(Request $request,$id)
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('admin_access_denied');
        }
        $formDelete = $this->get('form.factory')->create();
        if ($request->isMethod('POST') && $formDelete->handleRequest($request)->isValid()) {
            $userManager = $this->get('fos_user.user_manager');
            $user = $userManager->findUserBy(array('id'=>$id));
            $user->setEnabled(false);
            $userManager->updateUser($user);
            $app=$this->getUser();
            $historyService=$this->get('core.service.history');
            $historyService->addHistory($app->getUserName(),'Désactiver un utilisateur',$user->getId());
            return $this->redirectToRoute('admin_user_list');
        }
        return $this->render('AdminBundle::delete.html.twig', array(
            'formDelete'   => $formDelete->createView(),
        ));
    }

    public function enableAction(Request $request,$id)
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('admin_access_denied');
        }
        $formDelete = $this->get('form.factory')->create();
        if ($request->isMethod('POST') && $formDelete->handleRequest($request)->isValid()) {
            $userManager = $this->get('fos_user.user_manager');
            $user = $userManager->findUserBy(array('id'=>$id));
            $user->setEnabled(true);
            $userManager->updateUser($user);
            $app=$this->getUser();
            $historyService=$this->get('core.service.history');
            $historyService->addHistory($app->getUserName(),'Activer un utilisateur',$user->getId());
            return $this->redirectToRoute('admin_user_list');
        }
        return $this->render('AdminBundle::delete.html.twig', array(
            'formDelete'   => $formDelete->createView(),
        ));
    }
    public function deleteAction(Request $request,$id){
        $em=$this->getDoctrine()->getManager();
        $formDelete = $this->get('form.factory')->create();
        if ($request->isMethod('POST') && $formDelete->handleRequest($request)->isValid()) {
            $userManager = $this->get('fos_user.user_manager');
            $user = $userManager->findUserBy(array('id'=>$id));
            $app=$this->getUser();
            $historyService=$this->get('core.service.history');
            $historyService->addHistory($app->getUserName(),'Supprimer un utilisateur',$user->getId());
            $em->remove($user);
            $em->flush();
            return $this->redirectToRoute('admin_user_list');
        }
        return $this->render('AdminBundle::delete.html.twig', array(
            'formDelete' => $formDelete->createView(),
        ));
    }
}