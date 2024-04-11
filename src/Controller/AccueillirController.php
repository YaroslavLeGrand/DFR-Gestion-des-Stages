<?php

namespace App\Controller;

use App\Entity\Accueillir;
use App\Form\AccueillirType;
use App\Repository\AccueillirRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/accueillir")
 */
class AccueillirController extends AbstractController
{
    /**
     * @Route("/", name="app_accueillir_index", methods={"GET"})
     */
    public function index(AccueillirRepository $accueillirRepository): Response
    {
        return $this->render('accueillir/index.html.twig', [
            'accueillirs' => $accueillirRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_accueillir_new", methods={"GET", "POST"})
     */
    public function new(Request $request, AccueillirRepository $accueillirRepository): Response
    {
        $accueillir = new Accueillir();
        $form = $this->createForm(AccueillirType::class, $accueillir);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $accueillirRepository->add($accueillir, true);

            return $this->redirectToRoute('app_accueillir_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('accueillir/new.html.twig', [
            'accueillir' => $accueillir,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{IdClasse}", name="app_accueillir_show", methods={"GET"})
     */
    public function show(Accueillir $accueillir): Response
    {
        return $this->render('accueillir/show.html.twig', [
            'accueillir' => $accueillir,
        ]);
    }

    /**
     * @Route("/{IdClasse}/edit", name="app_accueillir_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Accueillir $accueillir, AccueillirRepository $accueillirRepository): Response
    {
        $form = $this->createForm(AccueillirType::class, $accueillir);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $accueillirRepository->add($accueillir, true);

            return $this->redirectToRoute('app_accueillir_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('accueillir/edit.html.twig', [
            'accueillir' => $accueillir,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{IdClasse}", name="app_accueillir_delete", methods={"POST"})
     */
    public function delete(Request $request, Accueillir $accueillir, AccueillirRepository $accueillirRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$accueillir->getIdClasse(), $request->request->get('_token'))) {
            $accueillirRepository->remove($accueillir, true);
        }

        return $this->redirectToRoute('app_accueillir_index', [], Response::HTTP_SEE_OTHER);
    }
}
