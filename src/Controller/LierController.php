<?php

namespace App\Controller;

use App\Entity\Lier;
use App\Form\LierType;
use App\Repository\LierRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/lier")
 */
class LierController extends AbstractController
{
    /**
     * @Route("/", name="app_lier_index", methods={"GET"})
     */
    public function index(LierRepository $lierRepository): Response
    {
        return $this->render('lier/index.html.twig', [
            'liers' => $lierRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_lier_new", methods={"GET", "POST"})
     */
    public function new(Request $request, LierRepository $lierRepository): Response
    {
        $lier = new Lier();
        $form = $this->createForm(LierType::class, $lier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $lierRepository->add($lier, true);

            return $this->redirectToRoute('app_lier_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('lier/new.html.twig', [
            'lier' => $lier,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{IdProfil}", name="app_lier_show", methods={"GET"})
     */
    public function show(Lier $lier): Response
    {
        return $this->render('lier/show.html.twig', [
            'lier' => $lier,
        ]);
    }

    /**
     * @Route("/{IdProfil}/edit", name="app_lier_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Lier $lier, LierRepository $lierRepository): Response
    {
        $form = $this->createForm(LierType::class, $lier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $lierRepository->add($lier, true);

            return $this->redirectToRoute('app_lier_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('lier/edit.html.twig', [
            'lier' => $lier,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{IdProfil}", name="app_lier_delete", methods={"POST"})
     */
    public function delete(Request $request, Lier $lier, LierRepository $lierRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$lier->getIdProfil(), $request->request->get('_token'))) {
            $lierRepository->remove($lier, true);
        }

        return $this->redirectToRoute('app_lier_index', [], Response::HTTP_SEE_OTHER);
    }
}
