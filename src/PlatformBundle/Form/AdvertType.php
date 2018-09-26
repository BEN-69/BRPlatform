<?php

namespace PlatformBundle\Form;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdvertType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('author')
            ->add('content')
            ->add('published')
            ->add('image',ImageType::class)
            ->add('categories', EntityType::class, array(
                'class'        => 'PlatformBundle:Category',
                'choice_label' => 'name',
                'multiple'     => true,
                'expanded'     => false
            ))


            ->add('skills', EntityType::class, array(
                'class'        => 'PlatformBundle:Skill',
                'choice_label' => 'name',
                'multiple'     => true,
                'expanded'     => false

            ))

        ;



    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PlatformBundle\Entity\Advert'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'platformbundle_advert';
    }


}
