<?php

namespace inventarioBundle\Controller;

use inventarioBundle\Entity\TGeneraAlmacen;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use inventarioBundle\Form\TGeneraAlmacenType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;


/**
 * TGeneraAlmacen controller.
 *
 * @Route("/almacen")
 */

class TGeneraAlmacenController extends Controller {

	/**
	 * Switch de enrutamiento para las fucniones
	 * @param \Symfony\Component\HttpFoundation\Request $request
	 * @return \Symfony\Component\HttpFoundation\JsonResponse
	 * @Route("/ajaxStanda", name="ajaxStanda")
	 * @Method({"GET", "POST"})
	 */
	public function ajaxAction(Request $request) {
		$val = $request->query->get('val');

		switch ($request->query->get('option')) {
			case 'ListDepart':
				return $this->optionsDepart($val);
			case 'ListCiudad':
				return $this->optionsCiudad($val);
		}
	}

	/**
	 * Opciones para Departamento segun Pais
	 * @param integer $id
	 * @return \Symfony\Component\HttpFoundation\JsonResponse
	 */
	private function optionsDepart($id = 1) {
		$mData = $this->getDoctrine()->getManager()
		              ->getRepository('inventarioBundle:TabGeneraDepart')
		              ->createQueryBuilder('p')
                   ->select('p.nomDepart name,p.codDepart value')
		              ->where('p.codPaisxx = :pais')
		              ->setParameter('pais', $id)
		->getQuery()
		->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
		return new JsonResponse($mData);
	}

	/**
	 * Opciones para Ciudad segun Departamento
	 * @param integer $id
	 * @return \Symfony\Component\HttpFoundation\JsonResponse
	 */
	private function optionsCiudad($id = 1) {
		$mData = $this->getDoctrine()->getManager()
		              ->getRepository('inventarioBundle:TabGeneraCiudad')
		              ->createQueryBuilder('p')
                   ->select('p.nomCiudad name,p.codCiudad value')
		              ->where('p.codDepart = :depart')
		              ->setParameter('depart',$id)
    ->getQuery()
		->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
		return new JsonResponse($mData);
	}

	/**
	 * Lists all TGeneraAlmacen entities.
	 *
	 * @Route("/", name="almacen_index")
	 * @Method("GET")
	 */
	public function indexAction(Request $request) {
		$em         = $this->getDoctrine()->getManager();
		$dql        = "SELECT a FROM inventarioBundle:TGeneraAlmacen a ";
		$query      = $em->createQuery($dql);
		$paginator  = $this->get('knp_paginator');
		$pagination = $paginator->paginate(
			$query,
			$request->query->get('page', 1)/*page number*/,
			2/*limit per page*/

		);
		return $this->render('tgeneraalmacen/index.html.twig', array(
				'tGeneraAlmacens' => $pagination,

			));
		//$em = $this->getDoctrine()->getManager();

		//$tGeneraAlmacens = $em->getRepository('inventarioBundle:TGeneraAlmacen')->findAll();

		//return $this->render('tgeneraalmacen/index.html.twig', array(
		//    'tGeneraAlmacens' => $tGeneraAlmacens,
		//));
	}

	/**
	 * Creates a new TGeneraAlmacen entity.
	 *
	 * @Route("/new", name="almacen_new")
	 * @Method({"GET", "POST"})
	 */

  public function newAction(Request $request) {
        $tGeneraAlmacen = new TGeneraAlmacen();
            $form = $this->createForm('inventarioBundle\Form\TGeneraAlmacenType', $tGeneraAlmacen,array('em' => $this->getDoctrine()->getEntityManager(),));
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
            	$tGeneraAlmacen->setUsrcreaci('juan');
      			$tGeneraAlmacen->setFeccreaci(new \DateTime());
                $em = $this->getDoctrine()->getManager();    
                $em->persist($tGeneraAlmacen);
                $em->flush();
                return $this->redirectToRoute('almacen_show', array('id' => $tGeneraAlmacen->getId()));
            }
        return $this->render('tgeneraalmacen/new.html.twig', array(
                      'tGeneraAlmacen' => $tGeneraAlmacen,
                              'form'           => $form->createView(),
        ));      
  }


  /**
	 * Finds and displays a TGeneraAlmacen entity.
	 *
	 * @Route("/{id}", name="almacen_show")
	 * @Method("GET")
	 */
	public function showAction(TGeneraAlmacen $tGeneraAlmacen) {
		$deleteForm = $this->createDeleteForm($tGeneraAlmacen);
		return $this->render('tgeneraalmacen/show.html.twig', array(
				'tGeneraAlmacen' => $tGeneraAlmacen,
				'delete_form'    => $deleteForm->createView(),
			));
	}

	/**
	 * Displays a form to edit an existing TGeneraAlmacen entity.
	 *
	 * @Route("/{id}/edit", name="almacen_edit")
	 * @Method({"GET", "POST"})
	 */
	public function editAction(Request $request, TGeneraAlmacen $tGeneraAlmacen) {
		$deleteForm = $this->createDeleteForm($tGeneraAlmacen);
		$editForm   = $this->createForm('inventarioBundle\Form\TGeneraAlmacenType', $tGeneraAlmacen);
		$editForm->handleRequest($request);
		if ($editForm->isSubmitted() && $editForm->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($tGeneraAlmacen);
			$em->flush();
			return $this->redirectToRoute('almacen_edit', array('id' => $tGeneraAlmacen->getId()));
		}
		return $this->render('tgeneraalmacen/edit.html.twig', array(
			'tGeneraAlmacen' => $tGeneraAlmacen,
			'edit_form'      => $editForm->createView(),
			'delete_form'    => $deleteForm->createView(),
		));
	}

	/**
	 * Deletes a TGeneraAlmacen entity.
	 *
	 * @Route("/{id}", name="almacen_delete")
	 * @Method("DELETE")
	 */
	public function deleteAction(Request $request, TGeneraAlmacen $tGeneraAlmacen) {
		$form = $this->createDeleteForm($tGeneraAlmacen);
		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->remove($tGeneraAlmacen);
			$em->flush();
		}
		return $this->redirectToRoute('almacen_index');
	}

	/**
	 * Creates a form to delete a TGeneraAlmacen entity.
	 *
	 * @param TGeneraAlmacen $tGeneraAlmacen The TGeneraAlmacen entity
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createDeleteForm(TGeneraAlmacen $tGeneraAlmacen) {
		return $this->createFormBuilder()
		            ->setAction($this->generateUrl('almacen_delete', array('id' => $tGeneraAlmacen->getId())))
		->setMethod('DELETE')
		->getForm()
		;
	}
}
