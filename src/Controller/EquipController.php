<?php

namespace App\Controller;

use App\Entity\Equip;
use App\Form\EquipType;
use App\Repository\EquipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/equip")
 */
class EquipController extends AbstractController
{
    /**
     * @Route("/", name="equip_index", methods={"GET"})
     */
    public function index(EquipRepository $equipRepository): Response
    {
        return $this->render('equip/index.html.twig', [
            'equips' => $equipRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="equip_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $equip = new Equip();
        $form = $this->createForm(EquipType::class, $equip);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($equip);
            $entityManager->flush();

            return $this->redirectToRoute('equip_index');
        }

        return $this->render('equip/new.html.twig', [
            'equip' => $equip,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="equip_show", methods={"GET"})
     */
    public function show(Equip $equip): Response
    {
        return $this->render('equip/show.html.twig', [
            'equip' => $equip,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="equip_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Equip $equip): Response
    {
        $form = $this->createForm(EquipType::class, $equip);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('equip_index');
        }

        return $this->render('equip/edit.html.twig', [
            'equip' => $equip,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="equip_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Equip $equip): Response
    {
        if ($this->isCsrfTokenValid('delete'.$equip->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($equip);
            $entityManager->flush();
        }

        return $this->redirectToRoute('equip_index');
    }
}
