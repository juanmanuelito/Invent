<?php

namespace inventarioBundle\Form;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TabInventEntradaType extends AbstractType {
	/**
	 * @param FormBuilderInterface $builder
	 * @param array $options
	 */
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder
      ->add('canProduct', IntegerType::class , array('attr'  => array('placeholder'=>'Cantidad','style'=>'width:30%;','min' => 0,'max' => 50),'label' => 'Cantidad de Producto '))
			->add('valEntrada', TextType::class , array('attr'  => array('placeholder'=>'Valor Entrada','style'=>'width:30%;'),'label' => 'Valor de Entrada '))
			->add('codDocument', TextType::class , array('attr' => array('placeholder'=>'Numero Documento','style'=>'width:30%;'),'label' => 'Documento '))
			->add('Almacen', 'entity', array(
				'class'    => 'inventarioBundle:TGeneraAlmacen',
				'property' => 'nomAlmacen','attr'  => array('placeholder'=>'Cantidad','class' => 'ui mini search dropdown','style'=>'min-height: 0;width:30%;')))
			->add('Producto', 'entity', array(
				'class'    => 'inventarioBundle:TGeneraProduct',
				'property' => 'nomProduct','attr'  => array('placeholder'=>'Cantidad','class' => 'ui mini search dropdown','style'=>'min-height: 0;width:30%;')))
		;
	}

	/**
	 * @param OptionsResolver $resolver
	 */
	public function configureOptions(OptionsResolver $resolver) {
		$resolver->setDefaults(array(
				'data_class' => 'inventarioBundle\Entity\TabInventEntrada',
			));
	}
}
