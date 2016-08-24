<?php

namespace inventarioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use inventarioBundle\Entity\TabInventSalida;
use inventarioBundle\Entity\TSalidaLog;
use inventarioBundle\Form\TabInventSalidaType;
use Symfony\Component\HttpFoundation\Response;
/**
 * TabInventSalida controller.
 *
 * @Route("/salida")
 */
class TabInventSalidaController extends Controller
{

    /**
     * Lists all TabInventSalida entities.
     *
     * @Route("/", name="salida_index")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
      $parameters = array();
      if($request->query->get('entrada') && $request->query->get('entrada') == 'true'){
        $em = $this->getDoctrine()->getManager();
        $dql        = "SELECT a FROM inventarioBundle:TabInventEntrada a ";
        if($request->query->get('nomAlmacen') && $request->query->get('nomAlmacen') != ''){
          $dql .= " INNER  JOIN inventarioBundle:TGeneraAlmacen b with  a.Almacen = b.id AND b.nomAlmacen LIKE '%".$request->query->get('nomAlmacen')."%' ";
          $parameters['nomAlmacen'] = $request->query->get('nomAlmacen');
        }
        if($request->query->get('nomProducto') && $request->query->get('nomProducto') != ''){
          $dql .= " INNER  JOIN inventarioBundle:TGeneraProduct c with  a.Producto = c.id AND c.nomProduct  LIKE '%".$request->query->get('nomProducto')."%' ";
          $parameters['nomProducto'] = $request->query->get('nomProducto');
        }
        if($request->query->get('codEntrada') && $request->query->get('codEntrada') != ''){
          $dql .= " WHERE   a.id = '".$request->query->get('codEntrada')."'";
          $parameters['codEntrada'] = $request->query->get('codEntrada');
        }
        
        $query      = $em->createQuery($dql);
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
        $query,
        $request->query->get('page', 1)/*page number*/,
             2/*limit per page*/
        );
        return $this->render('tabinventsalida/list.entrada.html.twig', array(
          'tabInventEntradas' => $pagination,'param'=> $parameters)); 

      }
      $dql        = "SELECT a FROM inventarioBundle:TabInventSalida a ";
      if($request->query->get('filter') && $request->query->get('filter') == 'true'){
        $dql .= "" ;
        if($request->query->get('nomAlmacen') && $request->query->get('nomAlmacen') != ''){
          $dql .= " INNER  JOIN inventarioBundle:TGeneraAlmacen b with  a.almacen = b.id AND b.nomAlmacen LIKE '%".$request->query->get('nomAlmacen')."%' ";
          $parameters['nomAlmacen'] = $request->query->get('nomAlmacen');
        }
        if($request->query->get('nomProduct') && $request->query->get('nomProduct') != ''){
          $dql .= " INNER  JOIN inventarioBundle:TGeneraProduct c with  a.product = c.id AND c.nomProduct  LIKE '%".$request->query->get('nomProduct')."%' ";
          $parameters['nomProduct'] = $request->query->get('nomProduct');
        }
        $dql .= " WHERE 1 = 1 ";
        if($request->query->get('idSalida') && $request->query->get('idSalida') != ''){
          $dql .= " AND  a.id = '".$request->query->get('idSalida')."'";
          $parameters['idSalida'] = $request->query->get('idSalida');
        }
        if($request->query->get('codDocum') && $request->query->get('codDocum') != ''){
          $dql .= " AND a.codDocument = '".$request->query->get('codDocum')."'";
          $parameters['codDocum'] = $request->query->get('codDocum');
        }
      }
      

      $em = $this->getDoctrine()->getManager();
      $query      = $em->createQuery($dql);
      $paginator  = $this->get('knp_paginator');
      $pagination = $paginator->paginate(
      $query,
      $request->query->get('page', 1)/*page number*/,
             2/*limit per page*/
      );
      return $this->render('tabinventsalida/index.html.twig', array(
         'tabInventSalidas' => $pagination,'param'=> $parameters)); 
    }

    /**
     * Creates a new TabInventSalida entity.
     *
     * @Route("/new", name="salida_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
      if($request->query->get('consulta') && $request->query->get('consulta') == 'cantidad' && $request->query->get('almacen') && $request->query->get('producto')){
        
        return new Response(json_encode(array('cod'=>'2000' ,'message' => array("result" => $this->getDoctrine()->getManager()->getRepository('inventarioBundle:TabInventSalida')->numberOfStuff($request->query->get('almacen'),$request->query->get('producto'))))), 200, array(
         'Content-Type' => 'application/json'
          ));
        
      }
      if($request->query->get('consulta') && $request->query->get('consulta') == 'valor' && $request->query->get('almacen') && $request->query->get('producto')&& $request->query->get('cantidad')){
        return new Response(json_encode(array('cod'=>'2000' ,'message' => array("result" => $this->getDoctrine()->getManager()->getRepository('inventarioBundle:TabInventSalida')->getSalidaValue($request->query->get('almacen'),$request->query->get('producto'),$request->query->get('cantidad'))))), 200, array(
         'Content-Type' => 'application/json'
          ));
        
      }
      
        $tabInventSalida = new TabInventSalida();
        $form = $this->createForm('inventarioBundle\Form\TabInventSalidaType', $tabInventSalida);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tabInventSalida->setUsrCreaci('Juan');
            $tabInventSalida->setFecCreaci(new \DateTime());
            $values = $request->request->get('tab_invent_salida');
            $values1 = $this->getDoctrine()->getManager()->getRepository('inventarioBundle:TabInventSalida')->getSalidas($values['almacen'],$values['product'],$values['canProducto']);
            echo var_dump($values);
            $em = $this->getDoctrine()->getManager();
            $em->persist($tabInventSalida);
            $em->flush();
            for ($i=0; $i < count($values1); $i++) { 
                $tlogSalida = new TSalidaLog();
                $tlogSalida->setIdEntrada($values1[$i]['id']);
                $tlogSalida->setIdSalida($tabInventSalida->getId());
                $tlogSalida->setCantidad($values['canProducto']);
                $tlogSalida->setCodProduc($values['product']);
                $tlogSalida->setCodAlmacen($values['almacen']);
                $tlogSalida->setUsrCreaci('Juan');
                $tlogSalida->setFecCreaci(new \DateTime());
                $em = $this->getDoctrine()->getManager();
                $em->persist($tlogSalida);
                $em->flush();
            }
            return $this->redirectToRoute('salida_show', array('id' => $tabInventSalida->getId()));
        }

        return $this->render('tabinventsalida/new.html.twig', array(
            'tabInventSalida' => $tabInventSalida,
            'form' => $form->createView()
            ));
    }

    /**
     * Finds and displays a TabInventSalida entity.
     *
     * @Route("/{id}", name="salida_show")
     * @Method("GET")
     */
    public function showAction(TabInventSalida $tabInventSalida)
    {
        $deleteForm = $this->createDeleteForm($tabInventSalida);

        return $this->render('tabinventsalida/show.html.twig', array(
            'tabInventSalida' => $tabInventSalida,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TabInventSalida entity.
     *
     * @Route("/{id}/edit", name="salida_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TabInventSalida $tabInventSalida)
    {
        $deleteForm = $this->createDeleteForm($tabInventSalida);
        $editForm = $this->createForm('inventarioBundle\Form\TabInventSalidaType', $tabInventSalida);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tabInventSalida);
            $em->flush();

            return $this->redirectToRoute('salida_edit', array('id' => $tabInventSalida->getId()));
        }

        return $this->render('tabinventsalida/edit.html.twig', array(
            'tabInventSalida' => $tabInventSalida,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a TabInventSalida entity.
     *
     * @Route("/{id}", name="salida_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TabInventSalida $tabInventSalida)
    {
        $form = $this->createDeleteForm($tabInventSalida);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tabInventSalida);
            $em->flush();
        }

        return $this->redirectToRoute('salida_index');
    }

    /**
     * Creates a form to delete a TabInventSalida entity.
     *
     * @param TabInventSalida $tabInventSalida The TabInventSalida entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TabInventSalida $tabInventSalida)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('salida_delete', array('id' => $tabInventSalida->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
