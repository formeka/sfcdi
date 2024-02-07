<?php

namespace App\DataFixtures;

use App\Entity\Etudiant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class EtudiantFixtures extends Fixture
{
    
    private $userPasswordHasherInterface;

    public function __construct (UserPasswordHasherInterface $userPasswordHasherInterface) 
    {
        $this->userPasswordHasherInterface = $userPasswordHasherInterface;
    }
    
    public function load(ObjectManager $manager): void
    {

        $user1 = new Etudiant();

        $user1->setEmail('admin@admin.fr')
        ->setPassword($this->userPasswordHasherInterface->hashPassword(
            $user1, "admin"
        ))
        ->setRoles(['ROLE_ADMIN']);
        $manager->persist($user1);

        $user2 = new Etudiant();

        $user2->setEmail('user@user.fr')
        ->setPassword($this->userPasswordHasherInterface->hashPassword(
            $user2, "azerty"
        ))
        ->setRoles(['ROLE_USER']);
        $manager->persist($user2);

        $manager->flush();
    }
}
