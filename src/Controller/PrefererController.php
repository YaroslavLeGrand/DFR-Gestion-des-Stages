<?php

namespace App\Controller;

use App\Entity\Preferer;
use App\Form\PrefererType;
use App\Repository\PrefererRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/preferer")
 */
class PrefererController extends AbstractController
{
    /**
     * @Route("/", name="app_preferer_index", methods={"GET"})
     */
    public function index(PrefererRepository $prefererRepository): Response
    {
        return $this->render('preferer/index.html.twig', [
            'preferers' => $prefererRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_preferer_new", methods={"GET", "POST"})
     */
    public function new(Request $request, PrefererRepository $prefererRepository): Response
    {
        $preferer = new Preferer();
        $form = $this->createForm(PrefererType::class, $preferer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $prefererRepository->add($preferer, true);

            return $this->redirectToRoute('app_preferer_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('preferer/new.html.twig', [
            'preferer' => $preferer,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{IdSpecialitee}", name="app_preferer_show", methods={"GET"})
     */
    public function show(Preferer $preferer): Response
    {
        return $this->render('preferer/show.html.twig', [
            'preferer' => $preferer,
        ]);
    }

    /**
     * @Route("/{IdSpecialitee}/edit", name="app_preferer_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Preferer $preferer, PrefererRepository $prefererRepository): Response
    {
        $form = $this->createForm(PrefererType::class, $preferer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $prefererRepository->add($preferer, true);

            return $this->redirectToRoute('app_preferer_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('preferer/edit.html.twig', [
            'preferer' => $preferer,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{IdSpecialitee}", name="app_preferer_delete", methods={"POST"})
     */
    public function delete(Request $request, Preferer $preferer, PrefererRepository $prefererRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$preferer->getIdSpecialitee(), $request->request->get('_token'))) {
            $prefererRepository->remove($preferer, true);
        }

        return $this->redirectToRoute('app_preferer_index', [], Response::HTTP_SEE_OTHER);
    }
}
