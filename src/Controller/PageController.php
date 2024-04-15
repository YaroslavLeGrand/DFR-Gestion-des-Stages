<?php
namespace App\Controller;
session_start();

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Utilisateur;
use Symfony\Component\HttpFoundation\Request;


class PageController extends AbstractController {
    /**
     * @Route("Login",name="PageConnexion")
     */
    function PageConnxion(Request $requeteHTTP,ManagerRegistry $doctrine){
        if (isset($_SESSION['isConnected']) && $_SESSION['isConnected'] == true) {return $this->redirectToRoute('ListeEntreprise');}
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $utilisateur = $doctrine->getRepository(Utilisateur::class)->findOneBy(['Identifiant' => $_POST['identifiant']]);
            if ($utilisateur){
                $mdp = $utilisateur->getMotDePasse();
                if (password_verify($_POST["password"], $mdp)) {
                    $_SESSION['isConnected'] = true;
                    $_SESSION['userId'] = $utilisateur->getId();
                    $_SESSION['userIdentifiant'] = $utilisateur->getIdentifiant();
                    $_SESSION['userRole'] = $utilisateur->getIdRole();
                    return $this->redirectToRoute('ListeEntreprise');
                } else {return $this->render('PageConnexion.html.twig');}
            } else {return $this->render('PageConnexion.html.twig');}
        } else {
            return $this->render('PageConnexion.html.twig');
        }
    }

    /**
     * @Route("Accueil",name="ListeEntreprise")
     */
    function PageEntreprise(Request $requeteHTTP,ManagerRegistry $doctrine){
        if (!isset($_SESSION['isConnected']) || $_SESSION['isConnected'] != true) {return $this->redirectToRoute('PageConnexion');}
        
        return $this->render('ListeEntreprise.html.twig');
    }

    /**
     * @Route("Detail",name="DetailEntreprise")
     */
    function PageDetailEntreprise(Request $requeteHTTP,ManagerRegistry $doctrine){
        if (!isset($_SESSION['isConnected']) || $_SESSION['isConnected'] != true) {return $this->redirectToRoute('PageConnexion');}

        return $this->render('DetailEntreprise.html.twig');
    }

    /**
     * @Route("BigBother.crypto",name="GestionAdmin")
     */
    function GestionAdmin(Request $requeteHTTP,ManagerRegistry $doctrine){
        

        return $this->render('GestionAdmin.html.twig');
    }
}