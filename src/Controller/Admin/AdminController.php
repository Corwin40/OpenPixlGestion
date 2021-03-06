<?php

namespace App\Controller\Admin;

use App\Entity\Admin\Client;
use App\Entity\Admin\Server;
use App\Entity\Admin\Service;
use App\Entity\Webapp\Facture;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/", name="admin_dashboard_index")
     */
    public function index(): Response
    {
        return $this->redirectToRoute('admin_dashboard_dashboard');
    }

    /**
     * @Route("/admin/dashboard", name="admin_dashboard_dashboard")
     */
    public function dashboard(): Response
    {
        // Je récupère la liste des clients depuis l'entité client
        $clients = $this->getDoctrine()->getRepository(Client::class)->findAll();
        // Je récupère la liste des servies depuis l'entité service
        $services = $this->getDoctrine()->getRepository(Service::class)->findAll();
        // Je récupère la liste des serveurs depuis l'entité server
        $servers = $this->getDoctrine()->getRepository(Server::class)->findAll();
        // Je récupère la liste des facture depuis l'entité facture
        $factures = $this->getDoctrine()->getRepository(Facture::class)->findAll();

        return $this->render('admin/admin/dashboard.html.twig',[
            'clients' => $clients,
            'services' => $services,
            'servers' => $servers,
            'factures' => $factures
        ]);
    }
}
