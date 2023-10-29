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
                'attr' => ['class' => 'form-control', 
                'id' => 'kursname',
                'placeholder' => 'Kursname'],
            ])
            ->add('dauer', IntegerType::class, [
                'attr' => ['class' => 'form-control'],
            ])
            ->add('info', TextareaType::class, [
                'attr' => ['class' => 'form-control'],
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
