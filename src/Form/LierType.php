<?php

namespace App\Form;

use App\Entity\Lier;
use App\Entity\Profil;
use App\Entity\Salarie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class LierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Annee')
            ->add('IdSalarie',EntityType::class,['class' => Salarie::class, 'choice_label' => function($salarie)
            {
                return $salarie->getNom() . ' ' . $salarie->getPrenom();
            }])
            ->add('IdProfil',EntityType::class,['class' => Profil::class, 'choice_label' => 'Libelle']);
        }
        
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Lier::class,
        ]);
    }
}
