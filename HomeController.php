<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', 'home.index', methods:['GET'])]
    public function index(): JsonResponse
    {
        return $this->render('home.html.twig', [
            'message' => 'Bienvenue dans votre nouveau contrôleur !',
        ]);
    }
}
