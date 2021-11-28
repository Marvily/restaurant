<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Form\ReservationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Restaurant;

class RestaurantController extends AbstractController
{
//    #[Route('/restaurant', name: 'restaurant')]
//    public function index(): Response
//    {
//        return $this->render('restaurant/index.html.twig', [
//            'controller_name' => 'RestaurantController',
//        ]);
//    }
    #[Route('/restaurants', name: 'restaurants')]
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $restaurants = $em->getRepository(Restaurant::class)->findAll();

        return $this->render('restaurant/index.html.twig', [
            'restaurants'=>$restaurants,
            'controller_name' => 'Liste de Restaurants',
        ]);
    }

    #[Route('/restaurant/{id}', name: 'restaurant_show')]
    public function show($id, Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();
        $restaurant = $em->getRepository(Restaurant::class)->find($id);
        if (null === $restaurant) {
            throw $this->createNotFoundException();
        }

        $reservation = new Reservation();
        $reservation
            ->setRestaurant($restaurant)
            ->setUser($this->getUser());

        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em->persist($reservation);
            $em->flush();
        }

        return $this->render('restaurant/restaurant.html.twig',[
            'restaurant' => $restaurant,
            'form'=> $form->createView()
        ]);
    }
}
