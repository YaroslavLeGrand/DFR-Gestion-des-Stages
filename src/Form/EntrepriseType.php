<?php
namespace App\Formulaire;

use App\Entity\Role;
use App\Entity\Utilisateur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType ;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;



class AnnonceType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $option){
        
        $builder->add('Titre', TextType :: class)
        ->add('Auteur', TextType :: class)
        ->add('Contenu', TextareaType :: class)
        ->add('MaCategorie',EntityType::class,['class' => Utilisateur::class, 'choice_label' => 'libelle'])
        ->add('LesLivraisons', EntityType::class,['class' => Role::class,'choice_label' => 'mode','multiple' => true, 'expanded' => true])
        ->add('Sauvegarde', SubmitType :: class);
    }

}


?>