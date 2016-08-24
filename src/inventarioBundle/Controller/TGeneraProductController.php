<?php

namespace inventarioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use inventarioBundle\Entity\TGeneraProduct;
use inventarioBundle\Form\TGeneraProductType;

/**
 * TGeneraProduct controller.
 *
 * @Route("/product")
 */

class TGeneraProductController extends Controller {
	/**
	 * Lists all TGeneraProduct entities.
	 *
	 * @Route("/", name="product_index")
	 * @Method("GET")
	 */
	public function indexAction(Request $request) {
		$em         = $this->getDoctrine()->getManager();
		$dql        = "SELECT Pro FROM inventarioBundle:TGeneraProduct Pro";
		$query      = $em->createQuery($dql);
		$paginator  = $this->get('knp_paginator');
		$pagination = $paginator->paginate(
			$query,
			$request->query->get('page', 1)/*page number*/,
			2/*limit per page*/
		);

		return $this->render('tgeneraproduct/index.html.twig', array(
				'tGeneraProducts' => $pagination,
			));

	}

	/**
	 * Creates a new TGeneraProduct entity.
	 *
	 * @Route("/new", name="product_new")
	 * @Method({"GET", "POST"})
	 */
	public function newAction(Request $request) {
		$tGeneraProduct = new TGeneraProduct();
		$form           = $this->createForm('inventarioBundle\Form\TGeneraProductType', $tGeneraProduct);
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
      $tGeneraProduct->setUsrCreate('juan');
      $tGeneraProduct->setFecCreaci(new \DateTime());
      $em = $this->getDoctrine()->getManager();
			$em->persist($tGeneraProduct);
			$em->flush();

			return $this->redirectToRoute('product_show', array('id' => $tGeneraProduct->getId()));
		}

		return $this->render('tgeneraproduct/new.html.twig', array(
				'tGeneraProduct' => $tGeneraProduct,
				'form'           => $form->createView(),
			));
	}

	/**
	 * Finds and displays a TGeneraProduct entity.
	 *
	 * @Route("/{id}", name="product_show")
	 * @Method("GET")
	 */
	public function showAction(TGeneraProduct $tGeneraProduct) {
		$deleteForm = $this->createDeleteForm($tGeneraProduct);

		return $this->render('tgeneraproduct/show.html.twig', array(
				'tGeneraProduct' => $tGeneraProduct,
				'delete_form'    => $deleteForm->createView(),
			));
	}

	/**
	 * Displays a form to edit an existing TGeneraProduct entity.
	 *
	 * @Route("/{id}/edit", name="product_edit")
	 * @Method({"GET", "POST"})
	 */
	public function editAction(Request $request, TGeneraProduct $tGeneraProduct) {
		$deleteForm = $this->createDeleteForm($tGeneraProduct);
		$editForm   = $this->createForm('inventarioBundle\Form\TGeneraProductType', $tGeneraProduct);
		$editForm->handleRequest($request);

		if ($editForm->isSubmitted() && $editForm->isValid()) {
      $tGeneraProduct->setUsrModify('juan');
      $tGeneraProduct->setFecModify(new \DateTime());
			$em = $this->getDoctrine()->getManager();
			$em->persist($tGeneraProduct);
			$em->flush();

			return $this->redirectToRoute('product_edit', array('id' => $tGeneraProduct->getId()));
		}

		return $this->render('tgeneraproduct/edit.html.twig', array(
				'tGeneraProduct' => $tGeneraProduct,
				'edit_form'      => $editForm->createView(),
				'delete_form'    => $deleteForm->createView(),
			));
	}

	/**
	 * Deletes a TGeneraProduct entity.
	 *
	 * @Route("/{id}", name="product_delete")
	 * @Method("DELETE")
	 */
	public function deleteAction(Request $request, TGeneraProduct $tGeneraProduct) {
		$form = $this->createDeleteForm($tGeneraProduct);
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->remove($tGeneraProduct);
			$em->flush();
		}

		return $this->redirectToRoute('product_index');
	}

	/**
	 * Creates a form to delete a TGeneraProduct entity.
	 *
	 * @param TGeneraProduct $tGeneraProduct The TGeneraProduct entity
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createDeleteForm(TGeneraProduct $tGeneraProduct) {
		return $this->createFormBuilder()
		            ->setAction($this->generateUrl('product_delete', array('id' => $tGeneraProduct->getId())))
		->setMethod('DELETE')
		->getForm()
		;
	}
}
