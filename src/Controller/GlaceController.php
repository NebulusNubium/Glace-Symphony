<?php

namespace App\Controller;

use App\Repository\GlaceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class GlaceController extends AbstractController
{
    #[Route('/glace', name: 'glace')]
    public function index(GlaceRepository $repository): Response
    {
        
        $glaces = $repository->findAll();
        return $this->render('glace/glace.html.twig', [
        'glaces'=>$glaces,
        ]);
    }
}
