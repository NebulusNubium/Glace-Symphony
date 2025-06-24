<?php

namespace App\Controller;

use App\Entity\Glace;
use App\Form\UpdateDessertForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class UpdateDessertController extends AbstractController
{
    #[Route('/updateDessert/{id}', name: 'updateDessert')]
    public function modifier(Glace $glace, Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(UpdateDessertForm::class, $glace);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($glace);
            $entityManager->flush();
            return $this->redirectToRoute('glace');
        }
        return $this->render('updateDessert/updateDessert.html.twig', [
            'updateForm'=> $form->createView(),
        ]);
    }
}
