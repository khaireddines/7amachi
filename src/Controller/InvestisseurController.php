<?php

namespace App\Controller;

use App\Entity\Investisseur;
use App\Form\InvestisseurType;
use App\Repository\InvestisseurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/investisseur")
 */
class InvestisseurController extends AbstractController
{
    /**
     * @Route("/", name="investisseur_index", methods={"GET"})
     */
    public function index(InvestisseurRepository $investisseurRepository): Response
    {
        return $this->render('investisseur/index.html.twig', [
            'investisseurs' => $investisseurRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="investisseur_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $investisseur = new Investisseur();
        $form = $this->createForm(InvestisseurType::class, $investisseur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($investisseur);
            $entityManager->flush();

            return $this->redirectToRoute('investisseur_index');
        }

        return $this->render('investisseur/new.html.twig', [
            'investisseur' => $investisseur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="investisseur_show", methods={"GET"})
     */
    public function show(Investisseur $investisseur): Response
    {
        return $this->render('investisseur/show.html.twig', [
            'investisseur' => $investisseur,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="investisseur_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Investisseur $investisseur): Response
    {
        $form = $this->createForm(InvestisseurType::class, $investisseur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('investisseur_index', [
                'id' => $investisseur->getId(),
            ]);
        }

        return $this->render('investisseur/edit.html.twig', [
            'investisseur' => $investisseur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="investisseur_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Investisseur $investisseur): Response
    {
        if ($this->isCsrfTokenValid('delete'.$investisseur->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($investisseur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('investisseur_index');
    }
}
