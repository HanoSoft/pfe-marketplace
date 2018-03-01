<?php
/**
 * Created by PhpStorm.
 * User: Hamdi
 * Date: 01/03/2018
 * Time: 16:24
 */

namespace AdminBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{

    public function indexAction()
    {
        return $this->render('AdminBundle:Admin:index.html.twig');
    }

}