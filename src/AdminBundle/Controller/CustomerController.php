<?php
/**
 * Created by PhpStorm.
 * User: nouha
 * Date: 23/04/2018
 * Time: 13:02
 */

namespace AdminBundle\Controller;




class CustomerController
{
    public function indexAction()
    {
        return $this->render('AdminBundle:Customer:index.html.twig');
    }

}