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
    #[Route('/', name: 'landing_page', methods: ['GET', 'POST'])]
    public function index(Request $request, OrderRepository $orderRepository, EntityManagerInterface $entityManager): Response
    {
        $order = new Order();
        $form = $this->createForm(OrderType::class, $order);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           
            $addressData = $order->getAddress();
            $entityManager->persist($addressData);
            $entityManager->flush();

            $billingdata = $order->getBilling();
            $entityManager->persist( $billingdata);
            $entityManager->flush();


            $clientData = $order->getClient();
            $entityManager->persist($clientData);
            $entityManager->flush();

 
            $order->setAddress($addressData);
            $order->setClient($clientData);

         
            $entityManager->persist($order);          
            $entityManager->flush();

            $this->addFlash('success', 'Form submitted successfully.');

            return $this->redirectToRoute('confirmation');
        }

        return $this->render('landing_page/index_new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/confirmation', name: 'confirmation')]
    public function confirmation(): Response
    {
        return $this->render('landing_page/confirmation.html.twig');
    }
}
