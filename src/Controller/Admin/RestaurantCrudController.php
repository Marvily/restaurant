<?php

namespace App\Controller\Admin;

use App\Entity\Restaurant;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Component\Routing\Annotation\Route;

class RestaurantCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Restaurant::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */

    #[Route('/retaurant/{id}', name: 'restaurant')]
    public function restaurantAction($id){
        $em = $this->getDoctrine()->getManager();
            $restaurant = $em->getRepository(Restaurant::class)->find($id);

            return $this->render('restaurant/restaurant.html.twig',[
                'restaurant' => $restaurant
            ]);
        }

}
