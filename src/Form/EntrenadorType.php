<?php

namespace App\Form;

use App\Entity\Entrenador;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EntrenadorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('cognom')
            ->add('primer_entrenador')
            ->add('edat')
            ->add('partits_jugats')
            ->add('partits_guanyats')
            ->add('partits_empatats')
            ->add('partits_perduts')
            ->add('equips')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Entrenador::class,
        ]);
    }
}
