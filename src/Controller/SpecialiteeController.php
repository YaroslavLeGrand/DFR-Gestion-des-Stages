<?php

namespace App\Controller;

use App\Entity\Specialitee;
use App\Form\SpecialiteeType;
use App\Repository\SpecialiteeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/specialitee")
 */
class SpecialiteeController extends AbstractController
{
    /**
     * @Route("/", name="app_specialitee_index", methods={"GET"})
     */
    public function index(SpecialiteeRepository $specialiteeRepository): Response
    {
        return $this->render('specialitee/index.html.twig', [
            'specialitees' => $specialiteeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_specialitee_new", methods={"GET", "POST"})
     */
    public function new(Request $request, SpecialiteeRepository $specialiteeRepository): Response
    {
        $specialitee = new Specialitee();
        $form = $this->createForm(SpecialiteeType::class, $specialitee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $specialiteeRepository->add($specialitee, true);

            return $this->redirectToRoute('app_specialitee_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('specialitee/new.html.twig', [
            'specialitee' => $specialitee,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_specialitee_show", methods={"GET"})
     */
    public function show(Specialitee $specialitee): Response
    {
        return $this->render('specialitee/show.html.twig', [
            'specialitee' => $specialitee,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_specialitee_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Specialitee $specialitee, SpecialiteeRepository $specialiteeRepository): Response
    {
        $form = $this->createForm(SpecialiteeType::class, $specialitee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $specialiteeRepository->add($specialitee, true);

            return $this->redirectToRoute('app_specialitee_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('specialitee/edit.html.twig', [
            'specialitee' => $specialitee,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_specialitee_delete", methods={"POST"})
     */
    public function delete(Request $request, Specialitee $specialitee, SpecialiteeRepository $specialiteeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$specialitee->getId(), $request->request->get('_token'))) {
            $specialiteeRepository->remove($specialitee, true);
        }

        return $this->redirectToRoute('app_specialitee_index', [], Response::HTTP_SEE_OTHER);
    }
}
