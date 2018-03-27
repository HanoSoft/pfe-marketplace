<?php
/**
 * Created by PhpStorm.
 * User: Hamdi
 * Date: 27/03/2018
 * Time: 18:15
 */

namespace AdminBundle\Controller;

use AdminBundle\Form\RegistrationFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    public function addAction(Request $request)
    {
        $userManager = $this->get('fos_user.user_manager');
        $user = $userManager->createUser();
        $form = $this->createForm(RegistrationFormType::class);
        $form->setData($user);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $userManager->updateUser($user);
            return $this->redirectToRoute('admin_product_list');
        }
        return $this->render('AdminBundle:User:add.html.twig', array(
            'form' => $form->createView(),
        ));
    }



}