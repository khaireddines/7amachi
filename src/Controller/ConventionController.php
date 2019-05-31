<?php

namespace App\Controller;

use App\Entity\Convention;
use App\Form\ConventionType;
use App\Repository\ConventionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/convention")
 */
class ConventionController extends AbstractController
{
    /**
     * @Route("/", name="convention_index", methods={"GET"})
     */
    public function index(ConventionRepository $conventionRepository): Response
    {
        return $this->render('convention/index.html.twig', [
            'conventions' => $conventionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="convention_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $convention = new Convention();
        $form = $this->createForm(ConventionType::class, $convention);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($convention);
            $entityManager->flush();

            return $this->redirectToRoute('convention_index');
        }

        return $this->render('convention/new.html.twig', [
            'convention' => $convention,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="convention_show", methods={"GET"})
     */
    public function show(Convention $convention): Response
    {
        return $this->render('convention/show.html.twig', [
            'convention' => $convention,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="convention_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Convention $convention): Response
    {
        $form = $this->createForm(ConventionType::class, $convention);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('convention_index', [
                'id' => $convention->getId(),
            ]);
        }

        return $this->render('convention/edit.html.twig', [
            'convention' => $convention,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="convention_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Convention $convention): Response
    {
        if ($this->isCsrfTokenValid('delete'.$convention->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($convention);
            $entityManager->flush();
        }

        return $this->redirectToRoute('convention_index');
    }
}
