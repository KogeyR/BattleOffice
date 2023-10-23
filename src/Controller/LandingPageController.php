<?php

namespace App\Controller;

use App\Entity\Order;
use App\Form\OrderType;
use App\Repository\OrderRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class LandingPageController extends AbstractController
{
    #[Route('/', name: 'landing_page')]
    public function index(Request $request, OrderRepository $orderRepository, EntityManagerInterface $entityManager): Response
    {
        $order = new Order();
        $form = $this->createForm(OrderType::class, $order);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($order);
            $entityManager->flush();

            return $this->redirectToRoute('app_order_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('landing_page/index_new.html.twig', [
            'orders' => $orderRepository->findAll(),
            'form' => $form,
        ]);
        
    }

    #[Route('/confirmation', name: 'confirmation')]
    public function confirmation(): Response
    {
        return $this->render('landing_page/confirmation.html.twig');
    }
}