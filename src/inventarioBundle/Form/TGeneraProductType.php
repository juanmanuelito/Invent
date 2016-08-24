<?php

namespace inventarioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TGeneraProductType extends AbstractType {
	/**
	 * @param FormBuilderInterface $builder
	 * @param array $options
	 */
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder
			->add('nomProduct', TextType::class , array('attr' => array('placeholder' => 'Nombre', 'style' => 'width:30%;'), 'label' => 'Nombre '))
			->add('desProduct', TextType::class , array('attr' => array('placeholder' => 'Descripcion', 'style' => 'width:30%;'), 'label' => 'Descripcion '));
	}

	/**
	 * @param OptionsResolver $resolver
	 */
	public function configureOptions(OptionsResolver $resolver) {
		$resolver->setDefaults(array('data_class' => 'inventarioBundle\Entity\TGeneraProduct'));
	}
}
