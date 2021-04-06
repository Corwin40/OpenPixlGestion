<?php

namespace App\Controller\Admin;

use App\Entity\Admin\Server;
use App\Form\Admin\ServerType;
use App\Repository\Admin\ServerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/server")
 */
class ServerController extends AbstractController
{
    /**
     * @Route("/", name="admin_server_index", methods={"GET"})
     */
    public function index(ServerRepository $serverRepository): Response
    {
        return $this->render('admin/server/index.html.twig', [
            'servers' => $serverRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_server_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $server = new Server();
        $form = $this->createForm(ServerType::class, $server);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($server);
            $entityManager->flush();

            return $this->redirectToRoute('admin_server_index');
        }

        return $this->render('admin/server/new.html.twig', [
            'server' => $server,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_server_show", methods={"GET"})
     */
    public function show(Server $server): Response
    {
        return $this->render('admin/server/show.html.twig', [
            'server' => $server,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_server_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Server $server): Response
    {
        $form = $this->createForm(ServerType::class, $server);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_server_index');
        }

        return $this->render('admin/server/edit.html.twig', [
            'server' => $server,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_server_delete", methods={"POST"})
     */
    public function delete(Request $request, Server $server): Response
    {
        if ($this->isCsrfTokenValid('delete'.$server->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($server);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_server_index');
    }
}
