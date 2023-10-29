<?php

namespace App\Form;

use App\Entity\Kunden;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class KundenFormType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options): void {
        $builder
            ->add('name', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'form-control mb-3',
                    'id' => 'Kundenname',
                    'placeholder' => 'Kundenname',
                    'label' => 'Kundenname',
                    'for' => 'Kundenname'

                ],
            ])
            ->add('anschrift', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'form-control mb-3',
                    'id' => 'Kundenanschrift',
                    'placeholder' => 'Kundenanschrift',
                    'label' => 'Kundenanschrift',
                    'for' => 'Kundenanschrift'

                ],
            ])
            ->add('kurs')
            ->add('begin')
            ->add('ende');
    }

    public function configureOptions(OptionsResolver $resolver): void {
        $resolver->setDefaults([
            'data_class' => Kunden::class,
        ]);
    }
}
