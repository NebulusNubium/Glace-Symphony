<?php

namespace App\Controller;

use App\Repository\GalleryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class GalleryController extends AbstractController
{
    #[Route('/gallery', name: 'gallery')]
    public function index(GalleryRepository $repository): Response
    {
        
        $glaces = $repository->findAll();
        return $this->render('gallery/gallery.html.twig', [
        'glaces'=>$glaces,
        ]);
    }
}
