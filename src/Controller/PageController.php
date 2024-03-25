<?php
namespace App\Controller;

use App\Entity\Utilisateur;
use App\Formulaire\UtilisateurType;

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

    /**
     * @Route("AjoutUtilisateur.pdf",name="AjoutUtilisateur")
     */
    function AjoutEntreprise (Request $requeteHTTP,ManagerRegistry $doctrine){
        $util = new Utilisateur();
        $formulaireAjout = $this->createForm(UtilisateurType :: class,$util);
        $formulaireAjout->handleRequest($requeteHTTP);
        if ($formulaireAjout->isSubmitted() && $formulaireAjout->isValid())
        {
            $entityManager = $doctrine->getManager();
            $annonceInfos = $formulaireAjout->getData();
            $entityManager->persist($annonceInfos);
            $entityManager->flush();
            return $this->redirectToRoute("listeAnnonces");
        }
        return $this->render('ajouteannonces.html.twig', ['annonceForm'=> $formulaireAjout->createView()]);
    }

}