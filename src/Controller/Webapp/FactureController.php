<?php

namespace App\Controller\Webapp;

use App\Entity\Admin\Client;
use App\Entity\Webapp\Facture;
use App\Form\Webapp\FactureType;
use App\Repository\Webapp\FactureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/webapp/facture")
 */
class FactureController extends AbstractController
{
    /**
     * @Route("/", name="webapp_facture_index", methods={"GET"})
     */
    public function index(FactureRepository $factureRepository): Response
    {
        return $this->render('webapp/facture/index.html.twig', [
            'factures' => $factureRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="webapp_facture_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $facture = new Facture();
        $form = $this->createForm(FactureType::class, $facture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($facture);
            $entityManager->flush();

            return $this->redirectToRoute('webapp_facture_index');
        }

        return $this->render('webapp/facture/new.html.twig', [
            'facture' => $facture,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="webapp_facture_show", methods={"GET"})
     */
    public function show(Facture $facture): Response
    {
        return $this->render('webapp/facture/show.html.twig', [
            'facture' => $facture,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="webapp_facture_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Facture $facture): Response
    {
        $form = $this->createForm(FactureType::class, $facture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('webapp_facture_index');
        }

        return $this->render('webapp/facture/edit.html.twig', [
            'facture' => $facture,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="webapp_facture_delete", methods={"POST"})
     */
    public function delete(Request $request, Facture $facture): Response
    {
        if ($this->isCsrfTokenValid('delete'.$facture->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($facture);
            $entityManager->flush();
        }

        return $this->redirectToRoute('webapp_facture_index');
    }

    /**
     * @Route("/client/{id}", name="webapp_facture_listbyclient", methods={"GET"})
     */
    public function listFactByClients($id)
    {
        $listFact = $this->getDoctrine()->getRepository(Client::class)->find($id);

        return $this ->render('webapp/facture/listfactbyclient.html.twig', [
            'factures' => $listFact,
        ]);
    }
}
