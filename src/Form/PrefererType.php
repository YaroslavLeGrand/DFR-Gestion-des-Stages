<?php

namespace App\Form;

use App\Entity\Classe;
use App\Entity\Entreprise;
use App\Entity\Preferer;
use App\Entity\Specialitee;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class PrefererType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('IdSpecialitee',EntityType::class,['class' => Specialitee::class, 'choice_label' => 'Libelle','mapped' => false])
            ->add('IdClasse',EntityType::class,['class' => Classe::class, 'choice_label' => 'Libelle','mapped' => false])
            ->add('IdEntreprise',EntityType::class,['class' => Entreprise::class, 'choice_label' => 'RS','mapped' => false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Preferer::class,
        ]);
    }
}
