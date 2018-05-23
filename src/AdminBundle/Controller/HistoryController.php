<?php
/**
 * Created by PhpStorm.
 * User: Hamdi
 * Date: 22/05/2018
 * Time: 14:06
 */

namespace AdminBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HistoryController extends Controller
{
    public function indexAction()
    {
        $serviceHistory = $this->get('core.service.history');
        $history=$serviceHistory->getHistory();
        return $this->render('AdminBundle:History:index.html.twig', array(
            'histories' => $history,
        ));
    }
}