<?php

namespace App\DataFixtures;

use App\Entity\Admin\Client;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ClientFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // La fixture alimente un jeu d'essais de 10 Client'
        for ($i = 0; $i < 10; $i++ )
        {
            $client = new Client();
            $client->setNameSociety('Société '.$i);
            $client->setFirstName('Société '.$i);
            $client->setLastName('Société '.$i);
            $manager->persist($client);
        }
        $manager->flush();
    }
}