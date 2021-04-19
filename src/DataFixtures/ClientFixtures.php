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
            $client->setFirstName('prenom '.$i);
            $client->setLastName('Nom '.$i);
            $client->setEmail('contact'.$i.'@client.fr');
            $client->setPhoneDesk('05.58.65.54.43');
            $client->setClientUniq(bin2hex(openssl_random_pseudo_bytes(10)));
            $manager->persist($client);
        }
        $manager->flush();
    }
}