<?php

namespace App\DataFixtures;

use App\Entity\Livre;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class LivreFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $faker = Factory::create('fr_FR');
        
        for($j=0 ; $j<= 5 ; $j++):
            $livre = new Livre();

            $livre->setTitre($faker->words())
            ->setEditeur($faker->sentence());

            $manager->persist($livre);
        endfor;

        $manager->flush();
    }
}
