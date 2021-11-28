<?php

namespace App\Controller;

use App\Entity\Reservation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationController extends AbstractController
{
    #[Route('/reservations', name: 'reservations')]
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $reservations = $em->getRepository(Reservation::class)->findAll();
        return $this->render('reservation/index.html.twig', [
            'controller_name' => 'ReservationController',
            'reservations'=> $reservations
        ]);
    }

    #[Route('/reservation/{id}', name: 'reservation_show')]
    public function action($id): Response
    {
        $em = $this->getDoctrine()->getManager();

        $reservation = $em->getRepository(Reservation::class)->find($id);


        return $this->render('reservation/index.html.twig', [
            'controller_name' => 'ReservationController',
            'reservation'=> $reservation
        ]);
    }


}
