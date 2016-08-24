<?php

namespace inventarioBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use inventarioBundle\Form\EventListener\AddTabGeneraCiudadFieldSubscriber;
use inventarioBundle\Form\EventListener\AddTabGeneraDepartFieldSubscriber;
use inventarioBundle\Form\EventListener\AddTabGeneraPaisesFieldSubscriber;
use \Symfony\Component\Validator\Constraints\NotBlank;
use inventarioBundle\Form\DataTransformer\IssueToNumberTransformer;

class TGeneraAlmacenType extends AbstractType {
	/**
	 * @param FormBuilderInterface $builder
	 * @param array $options
	 */
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$propertyCiudad = 'codCiudad';
		$entityManager = $options['em'];
        $transformer = new IssueToNumberTransformer($entityManager);

		$paisSubscriber = new AddTabGeneraPaisesFieldSubscriber($propertyCiudad, array(
				'label'     => 'Pais Matricula',
				'attr'      => array(
					'onChange' => 'getOptionSelect( $(this),"t_genera_almacen_codDepart" );',
					'children' => 't_genera_almacen_coddepart',
					'target'   => 'select',
					'option'   => 'ListDepart',
					'route'    => 'ajaxStanda',
					'style'    => 'min-height: 0;width:30%;',
					'class'    => 'ui mini search dropdown',
				)
			));

		$departSubscriber = new AddTabGeneraDepartFieldSubscriber($propertyCiudad, array(
				'label'     => 'Departamento Matricula',
				'attr'      => array(
					'onChange' => 'getOptionSelect( $(this),"t_genera_almacen_codCiudad" );',
					'children' => 't_genera_almacen_codCiudad',
					'target'   => 'select',
					'option'   => 'ListCiudad',
					'route'    => 'ajaxStanda',
					'style'    => 'min-height: 0;width:30%;',
					'class'    => 'ui mini search dropdown',
				)
        ,'constraints' => new NotBlank()
			));

		$ciudadSubscriber = new AddTabGeneraCiudadFieldSubscriber($propertyCiudad, array(
				'label'  => 'Ciudad Matricula',
				'attr'   => array('style'   => 'min-height: 0;width:30%;',
					'class' => 'ui mini search dropdown', )
			));

		$builder
			->addEventSubscriber($paisSubscriber)
			->addEventSubscriber($departSubscriber)
			/*->add($builder->create('codDepart', 'entity', array(
				'query_builder' => function (EntityRepository $er) {
					return $er->createQueryBuilder('u')
					->where('u.codDepart = :id')
						->setParameter('id', '1');
				},

				'class'    => 'inventarioBundle:TabGeneraCiudad',
				'property' => 'nomCiudad', 'attr' => array('placeholder' => 'Ciudad', 'class' => 'ui mini search dropdown', 'style' => 'min-height: 0;width:30%;')))->addModelTransformer($transformer))*/
			->addEventSubscriber($ciudadSubscriber)
			/*->add($builder->create('codCiudad', 'entity', array(
				'query_builder' => function (EntityRepository $er) {
					return $er->createQueryBuilder('u')
					->where('u.codCiudad = :id')
						->setParameter('id', '1');
				},

				'class'    => 'inventarioBundle:TabGeneraCiudad',
				'property' => 'nomCiudad', 'attr' => array('placeholder' => 'Ciudad', 'class' => 'ui mini search dropdown', 'style' => 'min-height: 0;width:30%;'))
				))
*/
			->add('nomAlmacen', TextType::class , array('attr' => array('placeholder' => 'Nombre', 'style' => 'width:30%;'), 'label' => 'Nombre'));
			
			//$builder->get('codDepart')->addModelTransformer($transformer);
			//$builder->get('codCiudad')->addEventSubscriber($departSubscriber);

			/*->add('codPais', 'entity', array(
				'class'    => 'inventarioBundle:TabGeneraPaises',
				'property' => 'nomPaisxx', 'attr' => array('placeholder' => 'Pais', 'class' => 'ui mini search dropdown', 'style' => 'min-height: 0;width:30%;')))
			->add('codDepart', 'entity', array(
				'query_builder' => function (EntityRepository $er) use ($options) {
					return $er->createQueryBuilder('u')
					->where('u.codDepart = :id')
						->setParameter('id', '1');
				},
				'class'    => 'inventarioBundle:TabGeneraDepart',
				'property' => 'nomDepart', 'attr' => array('placeholder' => 'Depatamento', 'class' => 'ui mini search dropdown', 'style' => 'min-height: 0;width:30%;')))
			->add('codCiudad', 'entity', array(
				'query_builder' => function (EntityRepository $er) {
					return $er->createQueryBuilder('u')
					->where('u.codCiudad = :id')
						->setParameter('id', '1');
				},

				'class'    => 'inventarioBundle:TabGeneraCiudad',
				'property' => 'nomCiudad', 'attr' => array('placeholder' => 'Ciudad', 'class' => 'ui mini search dropdown', 'style' => 'min-height: 0;width:30%;')));*/
}

	/**
	 * @param OptionsResolver $resolver
	 */
	public function configureOptions(OptionsResolver $resolver) {
		$resolver->setDefaults(array(
				'data_class' => 'inventarioBundle\Entity\TGeneraAlmacen',
			));
		$resolver->setRequired(array(
            'em',
        ));

        $resolver->setAllowedTypes(array(
            'em' => 'Doctrine\Common\Persistence\ObjectManager',
        ));

	}
}
