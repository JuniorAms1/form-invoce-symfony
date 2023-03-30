<?php

namespace App\Form;

use App\Entity\Invoice;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class InvoiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Invoice_date', DateType::class, [
                'label' => 'Date de la facture',
                'format' => 'yyyy-MM-dd',
                'widget' => 'choice',
                
            ])
            ->add('Invoice_number', NumberType::class, [
                'label' => 'Facture N°',
                
            ])
            ->add('Custumer_Id', TextType::class, [
                'label' => 'Client associé',
                
            ])

            ->add('submit', SubmitType::class, [
                'label' => "Sauvegarder",
                'attr' => [
                    'class' => 'btn btn-black btn-md'
                ]
            ])
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Invoice::class,
        ]);
    }
}
