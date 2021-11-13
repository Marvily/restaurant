<?php

namespace App\DataFixtures;

use App\Entity\Restaurant;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);


        for ($x = 0; $x <= 10; $x++){
            $restaurent = new Restaurant();
            $restaurent->setTitre('Restaurant_'.$x);
            $restaurent->setNombreDePlace(20+$x);
            $restaurent->setContenu('orem ipsum dolor sit amet, consectetur adipiscing elit. Integer sit amet risus tellus. Ut in ligula ut nibh viverra dapibus nec id tellus. Nunc in efficitur nulla. Vivamus tincidunt sem nisl, eu semper dolor laoreet sed. Lorem ipsum dolor sit amet, consectetur adipiscing elit. ');
            $manager->persist($restaurent);
            $manager->flush();
        }

        for ($y = 0; $y<= 20; $y++){
            $user = new User();
            $plaintextPassword = 1234;
//
        // hash the password (based on the security.yaml config for the $user class)
        $hashedPassword = $this->passwordHasher->hashPassword(
            $user,
            $plaintextPassword
        );
        $user->setPassword($hashedPassword);
        $user->setEmail('user_'.$y.'@hotmail.fr');
        if ($y < 1){
            $user->setRoles(['ROLE_ADMIN']);
        }else{
            $user->setRoles(['ROLE_USER']);
        }
        $manager->persist($user);
        $manager->flush();
        }


    }
}
