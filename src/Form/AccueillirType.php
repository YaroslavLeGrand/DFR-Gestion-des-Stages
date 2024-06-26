<?php

namespace App\Form;

use App\Entity\Accueillir;
use App\Entity\Classe;
use App\Entity\Entreprise;
use App\Entity\Etudiant;
use App\Entity\Specialitee;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class AccueillirType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Annee')
            ->add('IdClasse',EntityType::class,['class' => Classe::class, 'choice_label' => 'Libelle'])
            ->add('IdSpecialitee',EntityType::class,['class' => Specialitee::class, 'choice_label' => 'Libelle'])
            ->add('IdEtudiant',EntityType::class,['class' => Etudiant::class, 'choice_label' => function($etudiant)
            {
                return $etudiant->getNom() . ' ' . $etudiant->getPrenom();
            }])
            ->add('IdEntreprise',EntityType::class,['class' => Entreprise::class, 'choice_label' => 'RS'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Accueillir::class,
        ]);
    }
}
