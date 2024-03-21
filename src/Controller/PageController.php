<?php
namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;


class PageController extends AbstractController {
    /**
     * @Route("Login",name="PageConnxion")
     */
    function PageConnxion(Request $requeteHTTP,ManagerRegistry $doctrine){
        

        return $this->render('PageConnexion.html.twig');
    }

    /**
     * @Route("Accueil",name="ListeEntreprise")
     */
    function PageEntreprise(Request $requeteHTTP,ManagerRegistry $doctrine){
        

        return $this->render('ListeEntreprise.html.twig');
    }

    /**
     * @Route("Detail",name="DetailEntreprise")
     */
    function PageDetailEntreprise(Request $requeteHTTP,ManagerRegistry $doctrine){
        

        return $this->render('DetailEntreprise.html.twig');
    }

}