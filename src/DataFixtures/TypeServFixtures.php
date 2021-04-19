<?php

namespace App\DataFixtures;

use App\Entity\Admin\TypeServ;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TypeServFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $typeserv = new TypeServ();
        $typeserv->setName('nextcloud');
        $typeserv->setPrice('20.50 ');
        $typeserv->setIsDisponibility(1);
        $manager->persist($typeserv);

        $typeserv = new TypeServ();
        $typeserv->setName('site');
        $typeserv->setPrice('99.99 ');
        $typeserv->setIsDisponibility(1);
        $manager->persist($typeserv);

        $typeserv = new TypeServ();
        $typeserv->setName('wp');
        $typeserv->setPrice('99.99 ');
        $typeserv->setIsDisponibility(1);
        $manager->persist($typeserv);

        $manager->flush();
    }
}