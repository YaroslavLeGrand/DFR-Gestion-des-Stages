<?php

namespace App\Form;

use App\Entity\Salarie;
use App\Entity\Telephone;
use App\Entity\Email;
use App\Entity\Poste;
use App\Entity\Entreprise;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class SalarieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Nom',TextType :: class)
            ->add('Prenom',TextType :: class)
            ->add('Telephone',EntityType::class,['class' => Telephone::class, 'choice_label' => 'Telephone','mapped' => false])
            ->add('Email', EntityType::class,['class' => Email::class, 'choice_label' => 'Email','mapped' => false])
            ->add('Poste',EntityType::class,['class' => Poste::class, 'choice_label' => 'Libelle','mapped' => false])
            ->add('Entreprise',EntityType::class,['class' => Entreprise::class, 'choice_label' => 'RS','mapped' => false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Salarie::class,
        ]);
    }
}
