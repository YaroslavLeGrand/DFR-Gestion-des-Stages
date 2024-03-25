<?php
namespace App\Formulaire;

use App\Entity\Role;
use Symfony\Component\Form\AbstractType ;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;



class UtilisateurType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $option){
        
        $builder->add('Identifiant', TextType :: class)
        ->add('MotDePasse', TextType :: class)
        ->add('IdRole',EntityType::class,['class' => Role::class, 'choice_label' => 'libelle'])
        ->add('Sauvegarde', SubmitType :: class);
    }

}


?>