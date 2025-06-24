<?php

namespace App\Controller;

use App\Entity\Glace;
use App\Form\AddDessertForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class AddDessertController extends AbstractController
{
    #[Route('/add/dessert', name: 'addDessert')]
    public function addDessert(Request $request, EntityManagerInterface $entityManager): Response
    {
        $glace = new Glace();

        $form = $this->createForm(AddDessertForm::class, $glace);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($glace);
            $entityManager->flush();
            return $this->redirectToRoute('glace');
        }
        return $this->render('add_dessert/addDessert.html.twig', [
            'glaceForm'=> $form->createView(),
        ]);
    }
}
