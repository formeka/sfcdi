<?php

namespace App\DataFixtures;

use App\Entity\Livre;
use App\Entity\Genre;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class LivreFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $faker = Factory::create('fr_FR');

        $genres = [];
        for ($i = 0; $i<= 10; $i++) :
            $genre = new Genre();

            $genre->setNom($faker->word())
                ->setDescription($faker->sentence());

            $genres[] = $genre;
            $manager->persist($genre);
        endfor;


        for($j=0 ; $j<= 50 ; $j++):
            $livre = new Livre();

            $livre->setTitre($faker->sentence())
            ->setEditeur($faker->word())
            ->setAuteur($faker->name())
            ->setIsbn($faker->isbn10())
            ->setDatePublication($faker->dateTimeThisDecade())
            ->setImage($faker->imageUrl())
            ->setResume($faker->paragraph());

            for($k=0 ; $k < mt_rand(1, 3); $k++) :
                $livre->addGenre($genres[mt_rand(0, count($genres) - 1)]);
            endfor;   

            $manager->persist($livre);
        endfor;

       $manager->flush();
    }
}
