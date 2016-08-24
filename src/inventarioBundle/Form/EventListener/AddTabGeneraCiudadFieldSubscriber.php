<?php

namespace inventarioBundle\Form\EventListener;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\PropertyAccess\PropertyAccess;

/**
 * select dependiente para TabGeneraCiudad
 *
 * @author Fabian Salinas <fabian.salinas@intrared.net>
 */

class AddTabGeneraCiudadFieldSubscriber implements EventSubscriberInterface {
	private $propertyPathToCiudad;

	private static $attr;

	public function __construct($propertyPathToCiudad, $attr = array()) {
		$this->propertyPathToCiudad = $propertyPathToCiudad;
		self::$attr                 = $attr;
	}

	public static function getSubscribedEvents() {
		return array(
			FormEvents::PRE_SET_DATA => 'preSetData',
			FormEvents::PRE_SUBMIT   => 'preSubmit',
		);
	}

	private function addTabGeneraCiudadForm($form, $depart_id) {
		$formOptions = array_merge(
			array(
				'auto_initialize' => false,
				'class'           => 'inventarioBundle:TabGeneraCiudad',
				'empty_value'     => 'Seleccione una Opción',
				'query_builder'   => function (EntityRepository $repository) use ($depart_id) {
					$qb = $repository->createQueryBuilder('c')
					->innerJoin('c.codDepart', 'd', 'WITH', 'c.codDepart = d.codDepart')
						->where('d.codDepart = :depart')
					->setParameter('depart', $depart_id);

					return $qb;
				}
			),
			self::$attr
		);

		$form->add($this->propertyPathToCiudad, 'entity', $formOptions);
	}

	public function preSetData(FormEvent $event) {
		$data = $event->getData();
		$form = $event->getForm();

		if (null === $data) {
			return;
		}

		$accessor = PropertyAccess::createPropertyAccessor();

		$ciudad    = $accessor->getValue($data, $this->propertyPathToCiudad);
		$depart_id = ($ciudad)?$ciudad->getTabGeneraDepart()->getCodDepart():null;

		$this->addTabGeneraCiudadForm($form, $depart_id);
	}

	public function preSubmit(FormEvent $event) {
		$data = $event->getData();
		$form = $event->getForm();

		$depart_id = array_key_exists('codDepart', $data)?$data['codDepart']:null;

		$this->addTabGeneraCiudadForm($form, $depart_id);
	}
}