<?php

namespace App\Controller;

use App\Entity\Email;
use App\Form\EmailType;
use App\Repository\EmailRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/email")
 */
class EmailController extends AbstractController
{
    /**
     * @Route("/", name="app_email_index", methods={"GET"})
     */
    public function index(EmailRepository $emailRepository): Response
    {
        return $this->render('email/index.html.twig', [
            'emails' => $emailRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_email_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EmailRepository $emailRepository): Response
    {
        $email = new Email();
        $form = $this->createForm(EmailType::class, $email);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $emailRepository->add($email, true);

            return $this->redirectToRoute('app_email_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('email/new.html.twig', [
            'email' => $email,
            'form' => $form
        ]);
    }

    /**
     * @Route("/{id}", name="app_email_show", methods={"GET"})
     */
    public function show(Email $email): Response
    {
        return $this->render('email/show.html.twig', [
            'email' => $email,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_email_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Email $email, EmailRepository $emailRepository): Response
    {
        $form = $this->createForm(EmailType::class, $email);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $emailRepository->add($email, true);

            return $this->redirectToRoute('app_email_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('email/edit.html.twig', [
            'email' => $email,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_email_delete", methods={"POST"})
     */
    public function delete(Request $request, Email $email, EmailRepository $emailRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$email->getId(), $request->request->get('_token'))) {
            $emailRepository->remove($email, true);
        }

        return $this->redirectToRoute('app_email_index', [], Response::HTTP_SEE_OTHER);
    }
}
