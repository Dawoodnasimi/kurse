<?php

namespace App\Form;

use App\Entity\Kunden;
use Doctrine\DBAL\Types\DateType;
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
            ->add('kurs', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'form-control mb-3',
                    'id' => 'Kundenkurs',
                    'placeholder' => 'Kundenkurs',
                    'label' => 'Kundenkurs',
                    'for' => 'Kundenkurs'

                ],
            ])
            ->add('begin', DateType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'form-control mb-3',
                    'id' => 'Kundenbegin',
                    'placeholder' => 'Kundenbegin',
                    'label' => 'Kundenbegin',
                    'for' => 'Kundenbegin'

                ],
            ])
            ->add('ende');
    }

    public function configureOptions(OptionsResolver $resolver): void {
        $resolver->setDefaults([
            'data_class' => Kunden::class,
        ]);
    }
}
