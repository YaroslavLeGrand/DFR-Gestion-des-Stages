<?php

namespace App\Form;

use App\Entity\Entreprise;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EntrepriseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('RS', null, [
                'label' => 'Raison Sociale',
            ])
            ->add('Adresse', null, [
                'label' => 'Adresse',
            ])
            ->add('Ville', null, [
                'label' => 'Ville',
            ])
            ->add('CodePostal', null, [
                'label' => 'Code Postal',
            ])
            ->add('Pays', null, [
                'label' => 'Pays',
            ])
            ->add('Activitee', null, [
                'label' => 'Activité',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Entreprise::class,
        ]);
    }
}
