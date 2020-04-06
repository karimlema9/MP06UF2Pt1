<?php

namespace App\Form;

use App\Entity\Equip;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EquipType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('categoria')
            ->add('divisio')
            ->add('any_fundacio')
            ->add('partits_jugats')
            ->add('partits_guanyats')
            ->add('partits_empatats')
            ->add('partits_perduts')
            ->add('entrenadors')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Equip::class,
        ]);
    }
}
