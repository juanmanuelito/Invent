<?php

namespace inventarioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use inventarioBundle\Entity\TabInventEntrada;
use inventarioBundle\Form\TabInventEntradaType;

/**
 * TabInventEntrada controller.
 *
 * @Route("/entrada")
 */

class TabInventEntradaController extends Controller {
	/**
	 * Lists all TabInventEntrada entities.
	 *
	 * @Route("/", name="entrada_index")
	 * @Method("GET")
	 */
	public function indexAction(Request $request) {
		$em         = $this->getDoctrine()->getManager();
		$dql        = "SELECT a FROM inventarioBundle:TabInventEntrada a ";
    $parameters = array();
    if($request->query->get('nomAlmacen') && $request->query->get('nomAlmacen') != ''){
          $dql .= " INNER  JOIN inventarioBundle:TGeneraAlmacen b with  a.Almacen = b.id AND b.nomAlmacen LIKE '%".$request->query->get('nomAlmacen')."%' ";
          $parameters['nomAlmacen'] = $request->query->get('nomAlmacen');
        }
        if($request->query->get('nomProducto') && $request->query->get('nomProducto') != ''){
          $dql .= " INNER  JOIN inventarioBundle:TGeneraProduct c with  a.Producto = c.id AND c.nomProduct  LIKE '%".$request->query->get('nomProducto')."%' ";
          $parameters['nomProducto'] = $request->query->get('nomProducto');
        }
        $dql .= " WHERE 1 = 1 ";
        if($request->query->get('idEntrada') && $request->query->get('idEntrada') != ''){
          $dql .= " AND a.id = '".$request->query->get('idEntrada')."'";
          $parameters['codEntrada'] = $request->query->get('idEntrada');
    }
     if($request->query->get('codDocum') && $request->query->get('codDocum') != ''){
          $dql .= " AND a.codDocument LIKE '%".$request->query->get('codDocum')."%'";
          $parameters['codDocument'] = $request->query->get('codDocum');
    }
    $query      = $em->createQuery($dql);
		$paginator  = $this->get('knp_paginator');
		$pagination = $paginator->paginate(
			$query,
			$request->query->get('page', 1)/*page number*/,
			2/*limit per page*/
		);

		return $this->render('tabinvententrada/index.html.twig', array(
				'tabInventEntradas' => $pagination,'param' => $parameters
			));

	}

	/**
	 * Creates a new TabInventEntrada entity.
	 *
	 * @Route("/new", name="entrada_new")
	 * @Method({"GET", "POST"})
	 */
	public function newAction(Request $request) {
		$tabInventEntrada = new TabInventEntrada();
		$form             = $this->createForm('inventarioBundle\Form\TabInventEntradaType', $tabInventEntrada);
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			$tabInventEntrada->setUsrCreaci('juan');
			$tabInventEntrada->setFecCreaci(new \DateTime());
			$em = $this->getDoctrine()->getManager();
			$em->persist($tabInventEntrada);
			$em->flush();

			return $this->redirectToRoute('entrada_show', array('id' => $tabInventEntrada->getId()));
		}

		return $this->render('tabinvententrada/new.html.twig', array(
				'tabInventEntrada' => $tabInventEntrada,
				'form'             => $form->createView(),
			));
	}

	/**
	 * Finds and displays a TabInventEntrada entity.
	 *
	 * @Route("/{id}", name="entrada_show")
	 * @Method("GET")
	 */
	public function showAction(TabInventEntrada $tabInventEntrada) {
		$deleteForm = $this->createDeleteForm($tabInventEntrada);

		return $this->render('tabinvententrada/show.html.twig', array(
				'tabInventEntrada' => $tabInventEntrada,
				'delete_form'      => $deleteForm->createView(),
			));
	}

	/**
	 * Displays a form to edit an existing TabInventEntrada entity.
	 *
	 * @Route("/{id}/edit", name="entrada_edit")
	 * @Method({"GET", "POST"})
	 */
	public function editAction(Request $request, TabInventEntrada $tabInventEntrada) {
		$deleteForm = $this->createDeleteForm($tabInventEntrada);
		$editForm   = $this->createForm('inventarioBundle\Form\TabInventEntradaType', $tabInventEntrada);
		$editForm->handleRequest($request);

		if ($editForm->isSubmitted() && $editForm->isValid()) {
			$tabInventEntrada->setUsrModify('juan');
			$tabInventEntrada->setFecModify(new \DateTime());
			$em = $this->getDoctrine()->getManager();
			$em->persist($tabInventEntrada);
			$em->flush();

			return $this->redirectToRoute('entrada_edit', array('id' => $tabInventEntrada->getId()));
		}

		return $this->render('tabinvententrada/edit.html.twig', array(
				'tabInventEntrada' => $tabInventEntrada,
				'edit_form'        => $editForm->createView(),
				'delete_form'      => $deleteForm->createView(),
			));
	}

	/**
	 * Deletes a TabInventEntrada entity.
	 *
	 * @Route("/{id}", name="entrada_delete")
	 * @Method("DELETE")
	 */
	public function deleteAction(Request $request, TabInventEntrada $tabInventEntrada) {
		$form = $this->createDeleteForm($tabInventEntrada);
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->remove($tabInventEntrada);
			$em->flush();
		}

		return $this->redirectToRoute('entrada_index');
	}

	/**
	 * Creates a form to delete a TabInventEntrada entity.
	 *
	 * @param TabInventEntrada $tabInventEntrada The TabInventEntrada entity
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createDeleteForm(TabInventEntrada $tabInventEntrada) {
		return $this->createFormBuilder()
		            ->setAction($this->generateUrl('entrada_delete', array('id' => $tabInventEntrada->getId())))
		->setMethod('DELETE')
		->getForm()
		;
	}
}
