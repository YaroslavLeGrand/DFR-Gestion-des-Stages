<?php
namespace App\Formulaire;

use App\Entity\Role;
use Symfony\Component\Form\AbstractType ;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;



class UtilisateurType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $option){
        
        $builder->add('Identifiant', TextType :: class)
        ->add('mot_de_passe', TextType :: class)
        ->add('id_Role', Role :: class)
        ->add('Sauvegarde', SubmitType :: class);
    }

}


?>