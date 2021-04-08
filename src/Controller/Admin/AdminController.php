<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/", name="admin_dashboard")
     */
    public function index(): Response
    {
        return $this->render('admin/admin/index.html.twig');
    }
}
