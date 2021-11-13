<?php

namespace App\Controller\Admin;

use App\Entity\Reservation;
use App\Entity\Restaurant;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Restaurant');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Restaurant', 'fas fa-list', Restaurant::class);
        yield MenuItem::linkToCrud('Reservation', 'fas fa-list', Reservation::class);
        yield MenuItem::linkToCrud('User', 'fas fa-list', User::class);
    }
}
