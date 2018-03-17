<?php

namespace AdminBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TranslateController extends Controller
{
    public function translateAction()
    {
        return $this->render('AdminBundle:Admin:leftSideNav.html.twig');
    }
}
