<?php

namespace App\Form;

use App\Entity\InvoiceLines;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class InvoiceLinesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Description', TextareaType::class, [
                'label' => 'Description de la facture',
                'constraints' => new Length([
                    'min' => 10,
                    'max' => 150
                ]),
                
            ])
            ->add('Quantity', NumberType::class, [
                'label' => 'Quantité'
                ])
            ->add('Amount', NumberType::class, [
                'label' => 'Montant'
                ])
            ->add('VAT_Amount', NumberType::class, [
                'label' => 'Montant de la TVA'
                ])
            ->add('Total_with_VAT', NumberType::class, [
                'label' => 'Total'
                ])
            ->add('Invoice_Id')
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
            'data_class' => InvoiceLines::class,
        ]);
    }
}
