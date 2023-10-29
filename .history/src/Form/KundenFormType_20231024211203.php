<?php

namespace App\Form;

use App\Entity\Kunden;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
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

                    /* add kurs from kurse table as choices */


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

            /* ->add('kurs', ChoiceType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'form-control mb-3',
                    'id' => 'Kundenkurs',
                    'placeholder' => 'Kundenkurs',
                    'label' => 'Kundenkurs',
                    'for' => 'Kundenkurs'

                ],
            ]) */

            ->add('begin', DateType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'form-control mb-3',
                    'id' => 'Kundenbegin',
                    'placeholder' => 'Kursbegin',
                    'label' => 'Kursbegin',
                    'for' => 'Kursbegin'

                ],
            ])
            ->add('ende', DateType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'form-control mb-3',
                    'id' => 'Kundenende',
                    'placeholder' => 'Kursende',
                    'label' => 'Kursende',
                    'for' => 'Kursende'

                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void {
        $resolver->setDefaults([
            'data_class' => Kunden::class,
        ]);
    }
}
