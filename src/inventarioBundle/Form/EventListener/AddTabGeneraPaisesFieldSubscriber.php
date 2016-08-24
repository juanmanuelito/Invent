<?php

namespace inventarioBundle\Form\EventListener;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\PropertyAccess\PropertyAccess;

/**
 * select dependiente para TabGeneraPaisxx
 *
 * @author Fabian Salinas <fabian.salinas@intrared.net>
 */

class AddTabGeneraPaisesFieldSubscriber implements EventSubscriberInterface {
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

	private function addTabGeneraPaisesForm($form, $pais = null) {
		$formOptions = array_merge(
			array(
				'empty_value'   => 'Seleccione una Opción',
				'class'         => 'inventarioBundle:TabGeneraPaises',
				'query_builder' => function (EntityRepository $repository) {
					$qb = $repository->createQueryBuilder('p')
					->orderBy('p.nomPaisxx');
					return $qb;
				}
			),
			self::$attr
		);

		if ($pais) {
			$formOptions['data'] = $pais;
		}

		$form->add('codpais', 'entity', $formOptions);
	}

	public function preSetData(FormEvent $event) {
		$data = $event->getData();
		$form = $event->getForm();

		if (null === $data) {
			return;
		}

		$accessor = PropertyAccess::getPropertyAccessor();

		$ciudad = $accessor->getValue($data, $this->propertyPathToCiudad);
		$pais   = ($ciudad)?$ciudad->getTabGeneraDepart()->getTabGeneraPaises():null;

		$this->addTabGeneraPaisesForm($form, $pais);
	}

	public function preSubmit(FormEvent $event) {
		$form = $event->getForm();

		$this->addTabGeneraPaisesForm($form);
	}

	public function preBind(FormEvent $event) {
		$data = $event->getData();
		$form = $event->getForm();

		if (null === $data) {
			return;
		}

		$pais = array_key_exists('codPaisxx', $data)?$data['codPaisxx']:null;
		$this->addTabGeneraPaisesForm($form, $pais);
	}
}
