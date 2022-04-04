<?php

namespace App\Controller;

use App\Entity\Formation;
use App\Form\FormationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FormationController extends AbstractController
{
    #[Route('/formation', name: 'formation')]
    public function index(): Response
    {
        return $this->render('formation/index.html.twig');
    }

    #[Route('/formation/create', name: 'formation_create')]
    public function create(Request $request, EntityManagerInterface $em): Response
    {
        $formation = new Formation;
        $form = $this->createForm(FormationType::class, $formation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($formation);
            $em->flush();
            $this->addFlash("success", "La formation a été ajouté");
            return $this->redirectToRoute('formation');
        }
        return $this->render('formation/create.html.twig', [
            "formView" => $form->createView()
        ]);
    }
}
