<?php
/**
 * Created by PhpStorm.
 * User: nouha
 * Date: 12/05/2018
 * Time: 10:54
 */

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class StockController extends Controller
{
    public function indexAction()
    {
        $serviceProduct = $this->get('core.service.product');
        $products=$serviceProduct->getProducts();
        return $this->render('AdminBundle:Stock:index.html.twig', array(
            'products' => $products,
        ));
    }
    public function addAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $qte=$request->request->get("quantity");
        $serviceProduct = $this->get('core.service.product');
        $product=$serviceProduct->getProduct($id);
        $form = $this->get('form.factory')->create();
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $product->setQuantity($product->getQuantity()+$qte);
            $em->flush();
            return $this->redirectToRoute('admin_stock_list');
        }
        return $this->render('AdminBundle:Stock:edit.html.twig', array(
            'form' => $form->createView(),
            'product'=>$product,
        ));
    }
    public function decreaseAction($id, Request $request)
    {
        $error="";
        $em = $this->getDoctrine()->getManager();
        $qte=$request->request->get("quantity");
        $serviceProduct = $this->get('core.service.product');
        $product=$serviceProduct->getProduct($id);
        $form = $this->get('form.factory')->create();
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            if ($qte< $product->getQuantity()){
                $product->setQuantity($product->getQuantity()-$qte);
                $em->flush();
                return $this->redirectToRoute('admin_stock_list');
            }
            elseif ($qte == $product->getQuantity()){
                $product->setQuantity($product->getQuantity()-$qte);
                $product->setStatus('Epuisé');
                $em->flush();
                return $this->redirectToRoute('admin_stock_list');
            }
            else {
                $error = "La quantité ne doit pas dépasser la quantité en stock";
            }
        }
        return $this->render('AdminBundle:Stock:decrease.html.twig', array(
            'form' => $form->createView(),
            'product'=>$product,
            'msg' =>$error,
        ));
    }
}