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
        
        for($j=0 ; $j<= 50 ; $j++):
            $livre = new Livre();

            $livre->setTitre($faker->sentence())
            ->setEditeur($faker->word())
            ->setAuteur($faker->name())
            ->setIsbn($faker->isbn10())
            ->setDatePublication($faker->dateTimeThisDecade())
            ->setImage($faker->imageUrl())
            ->setResume($faker->paragraph())
            ;

            $manager->persist($livre);
        endfor;

        $manager->flush();
    }
}
