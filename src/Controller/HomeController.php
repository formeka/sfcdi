<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig');
    }

    #[Route('/secret', name: 'app_home_access')]
    #[IsGranted('ROLE_ADMIN')]
    public function access(): Response
    {
        return new Response(
            '<html><body>Coucou je suis ADMIN !</body></html>'
        );
    }
}
