<?php

namespace inventarioBundle\Form\EventListener;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\PropertyAccess\PropertyAccess;

/**
 * select dependiente para TabGeneraDepart
 *
 * @author Fabian Salinas <fabian.salinas@intrared.net>
 */

class AddTabGeneraDepartFieldSubscriber implements EventSubscriberInterface {
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

	private function addTabGeneraDepartForm($form, $pais_id, $depart = null) {
		$formOptions = array_merge(
			array(
				'class'         => 'inventarioBundle:TabGeneraDepart',
				'empty_value'   => 'Seleccione una Opción',
				'query_builder' => function (EntityRepository $repository) use ($pais_id) {
					$qb = $repository->createQueryBuilder('d')
					//->innerJoin('d.codPaisxx', 'p', 'WITH', 'd.codPaisxx = p.codPaisxx')
						->where('d.codDepart = :depart')
					->setParameter('depart', 1);

					return $qb;
				}
			),
			self::$attr
		);

		if ($depart) {
			$formOptions = $depart;
		}

		$form->add('codDepart', 'entity', $formOptions);

	}

	public function preSetData(FormEvent $event) {
		$data = $event->getData();
		$form = $event->getForm();

		if (null === $data) {
			return;
		}

		$accessor = PropertyAccess::getPropertyAccessor();

		$ciudad  = $accessor->getValue($data, $this->propertyPathToCiudad);
		$depart  = ($ciudad)?$ciudad->getTabGeneraDepart():null;
		$pais_id = ($depart)?$depart->getTabGeneraPaises()->getCodPaisxx():null;

		$this->addTabGeneraDepartForm($form, $pais_id, $depart,array(
				'class'         => 'inventarioBundle:TabGeneraDepart',
				'empty_value'   => 'Seleccione una Opción',
			));
	}

	public function preSubmit(FormEvent $event) {
		$data = $event->getData();
		$form = $event->getForm();

		$pais_id = array_key_exists('codPaisxx', $data)?$data['codPaisxx']:null;

		$this->addTabGeneraDepartForm($form, $pais_id,array(
				'class'         => 'inventarioBundle:TabGeneraDepart',
				'empty_value'   => 'Seleccione una Opción',
			));
	}

	public function preBind(FormEvent $event) {
		$data = $event->getData();
		$form = $event->getForm();

		if (null === $data) {
			return;
		}

		$pais_id = array_key_exists('codPaisxx', $data)?$data['codPaisxx']:null;
		$this->addTabGeneraDepartForm($form, $pais_id,array(
				'class'         => 'inventarioBundle:TabGeneraDepart',
				'empty_value'   => 'Seleccione una Opción',
			));
	}
}