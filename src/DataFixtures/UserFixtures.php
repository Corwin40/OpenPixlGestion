<?php

namespace App\DataFixtures;

use App\Entity\Security\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

     public function __construct(UserPasswordEncoderInterface $passwordEncoder)
     {
         $this->passwordEncoder = $passwordEncoder;
     }

    public function load(ObjectManager $manager)
    {
        // Création du premier utilisateur avec pour rôle ROLE_ADMIN
        $user = new User();
        $user->setEmail('contact@openpixl.fr');
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            '12345678'
        ));
        $user->setRoles(array('ROLE_ADMIN'));
        $user->setCreatedAt(new \DateTime('now'));
        $user->setUpdatedAt(new \DateTime('now'));
        $manager->persist($user);
        $manager->flush();

    }
}
