<?php

namespace App\Controller;

use App\Entity\Entrenador;
use App\Form\EntrenadorType;
use App\Repository\EntrenadorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/entrenador")
 */
class EntrenadorController extends AbstractController
{
    /**
     * @Route("/", name="entrenador_index", methods={"GET"})
     */
    public function index(EntrenadorRepository $entrenadorRepository): Response
    {
        return $this->render('entrenador/index.html.twig', [
            'entrenadors' => $entrenadorRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="entrenador_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $entrenador = new Entrenador();
        $form = $this->createForm(EntrenadorType::class, $entrenador);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($entrenador);
            $entityManager->flush();

            return $this->redirectToRoute('entrenador_index');
        }

        return $this->render('entrenador/new.html.twig', [
            'entrenador' => $entrenador,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="entrenador_show", methods={"GET"})
     */
    public function show(Entrenador $entrenador): Response
    {
        return $this->render('entrenador/show.html.twig', [
            'entrenador' => $entrenador,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="entrenador_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Entrenador $entrenador): Response
    {
        $form = $this->createForm(EntrenadorType::class, $entrenador);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('entrenador_index');
        }

        return $this->render('entrenador/edit.html.twig', [
            'entrenador' => $entrenador,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="entrenador_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Entrenador $entrenador): Response
    {
        if ($this->isCsrfTokenValid('delete'.$entrenador->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($entrenador);
            $entityManager->flush();
        }

        return $this->redirectToRoute('entrenador_index');
    }
}
