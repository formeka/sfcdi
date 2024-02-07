<?php

namespace App\Controller;

use App\Repository\LivreRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(
        LivreRepository $livreRepository,
        PaginatorInterface $paginator,
        Request $request
        ): Response
    {
        
        $livres_pagination = $paginator->paginate(
            $livreRepository->findBy([],['id' => 'DESC']),
            $request->query->getInt('page',1),
            3
        );

        return $this->render('home/index.html.twig',[
            'livres' => $livres_pagination
        ]);
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
