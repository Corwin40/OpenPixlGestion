<?php

namespace App\Controller\Admin;

use App\Entity\Admin\Client;
use App\Entity\Admin\Service;
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
        $clients = $this->getDoctrine()->getRepository(Client::class)->findAll();
        $services = $this->getDoctrine()->getRepository(Service::class)->findAll();

        return $this->render('admin/admin/dashboard.html.twig',[
            'clients' => $clients,
            'services' => $services
        ]);
    }
}
