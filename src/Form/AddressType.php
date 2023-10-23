<?php

namespace App\Form;

use App\Entity\Address;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('address_line1')
            ->add('address_line2')
            ->add('city')
            ->add('zipcode')
            ->add('country', ChoiceType::class, [
                'choices' => [
                    'France' => 'France',
                    'Luxembourg' => 'Luxembourg',
                    'Belgium' => 'Belgique',
                ],
                'placeholder' => 'Pays', // Optional placeholder text
            ])
            ->add('phone')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Address::class,
        ]);
    }
}
