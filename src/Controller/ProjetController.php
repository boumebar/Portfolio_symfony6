<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjetController extends AbstractController
{
    #[Route('/projet', name: 'projet')]
    public function index(): Response
    {
        return $this->render('projet/index.html.twig');
    }

    #[Route('/projet/create', name: 'projet_create')]
    public function create(): Response
    {
        return $this->render('projet/create.html.twig');
    }
}
