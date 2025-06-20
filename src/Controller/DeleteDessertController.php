<?php

namespace App\Controller;

use App\Entity\Glace;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class DeleteDessertController extends AbstractController
{
    #[Route('/glace/{id}', name: 'deleteDessert')]
    public function delete(Glace $glace, Request $request, EntityManagerInterface $entityManager)
    {
        if($this->isCsrfTokenValid("SUP".$glace->getId(), $request->get('_token'))){
            $entityManager->remove($glace);
            $entityManager->flush();
            $this->addFlash("success", "La suppression a été effectuée");
            return $this->redirectToRoute('glace');
        }
    }
}
