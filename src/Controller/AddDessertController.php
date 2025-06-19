<?php

namespace App\Controller;

use App\Entity\Gallery;
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
        $glace = new Gallery();

        $form = $this->createForm(AddDessertForm::class, $glace);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($glace);
            $entityManager->flush();
            return $this->redirectToRoute('home');
        }
        return $this->render('add_dessert/addDessert.html.twig', [
            'glaceForm'=> $form->createView(),
        ]);
    }
}
