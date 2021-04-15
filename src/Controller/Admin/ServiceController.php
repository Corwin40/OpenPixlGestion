<?php

namespace App\Controller\Admin;

use App\Entity\Admin\Service;
use App\Form\Admin\ServiceType;
use App\Repository\Admin\ServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/service")
 */
class ServiceController extends AbstractController
{
    /**
     * @Route("/", name="admin_service_index", methods={"GET"})
     */
    public function index(ServiceRepository $serviceRepository): Response
    {
        return $this->render('admin/service/index.html.twig', [
            'services' => $serviceRepository->findAll(),
        ]);
    }

    /**
     * @Route("/birthday", name="admin_service_birthday", methods={"GET"})
     */
    public function listbirtthday(ServiceRepository $serviceRepository): Response
    {
        $today = new \DateTime('now');
        // pour ajouter en supprimer des jours dans le datetime s'exprimer directemen sur les jours
        $thirtyday = new \DateTime('+1months');

        $listbirthdays = $this->getDoctrine()->getRepository(Service::class)->ListServicesEnd($today, $thirtyday);

        return $this->render('admin/admin/thirty.html.twig', [
            'listbirthdays' => $listbirthdays,
        ]);
    }

    /**
     * @Route("/firstremind", name="admin_service_firstremind", methods={"GET"})
     */
    public function firstremind(ServiceRepository $serviceRepository): Response
    {
        //Variable Date
        $today = new \DateTime('now');
        $datelimite = new \DateTime('+45days');
        // Liste les service à terme dans 15 jours

        $listfirstreminders = $this->getDoctrine()->getRepository(Service::class)->ListFirstReminder($today, $datelimite);

        // Update la liste "foreach" avec le champs remind15 true
        foreach ($listfirstreminders as $listfirstreminder )
        {
            $em = $this->getDoctrine()->getManager();
            $service = $em->getRepository(Service::class)->find($listfirstreminder[0]);
            if (!$service){
                throw $this->createNotFoundException(
                    'No product found for id '
                );
            }
            $service->setFirstreminder(1);
            $em->flush();
        }
        // Envoie d'un mail pour chaques services à termes

        return $this->render('admin/service/index.html.twig', [
            'services' => $serviceRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_service_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $service = new Service();
        $form = $this->createForm(ServiceType::class, $service);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($service);
            $entityManager->flush();

            return $this->redirectToRoute('admin_service_index');
        }

        return $this->render('admin/service/new.html.twig', [
            'service' => $service,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_service_show", methods={"GET"})
     */
    public function show(Service $service): Response
    {
        return $this->render('admin/service/show.html.twig', [
            'service' => $service,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_service_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Service $service): Response
    {
        $form = $this->createForm(ServiceType::class, $service);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_service_index');
        }

        return $this->render('admin/service/edit.html.twig', [
            'service' => $service,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_service_delete", methods={"POST"})
     */
    public function delete(Request $request, Service $service): Response
    {
        if ($this->isCsrfTokenValid('delete'.$service->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($service);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_service_index');
    }

    public function thirdreminder()
    {
        // Liste les services à termes dans 15 jours condition third_reminder = false
        // Update la liste "foreach" avec le champs remind15 true
        // Envoie d'un mail pour chaques services à termes
    }

    public function secondreminder()
    {
        // Liste les service à terme dans 15 jours
        // update la liste "foreach" avec le champs remind15 true
        // envopie d'un mail pour chaque service à terme

    }


}
