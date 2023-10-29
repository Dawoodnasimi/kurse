<?php

namespace App\Form;

use App\Entity\Kurse;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType; 
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class KursFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => false,
                'attr' => ['class' => 'form-control mb-3', 
                'id' => 'kursname',
                'placeholder' => 'Kursname'
                'label' => 'Kursname',
                'for' => 'kursname'
                
            ],
            ])

            ->add('dauer', IntegerType::class, [
                'label' => false,
                'attr' => ['class' => 'form-control mb-3',
                'id' => 'kursdauer',
                'placeholder' => 'Kursdauer',
                'label' => 'Kursdauer',
                'for' => 'kursdauer'
            ],
            ])
            
            ->add('info', TextareaType::class, [
                'label' => false,
                'attr' => ['class' => 'form-control mb-3',
                'id' => 'kursinfo',
                'placeholder' => 'Kursinfo',
                'label' => 'Kursinfo',
                'for' => 'kursinfo'
            ],
            ])

            //->add('save', SubmitType::class, ['label' => 'Create Task'])
            //get rid of the labels and add a custom label


        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Kurse::class,
        ]);
    }
}
