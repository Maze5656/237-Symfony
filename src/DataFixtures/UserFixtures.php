<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;

class UserFixtures extends Fixture {

    public function load(ObjectManager $manager)
    {
        $user = new User;
        $user->setUsername('joe');
        $user->setEmail('joe@dirt.com');
        $user->setPlainPassword('test123');
        $user->addRole('ROLE_ADMIN');
        $user->setEnabled(true);

        $manager->persist($user);

        $user = new User;
        $user->setUsername('kate');
        $user->setEmail('kate@example.com');
        $user->setPlainPassword('secret');
        $user->addRole('ROLE_ADMIN');
        $user->setEnabled(true);

        $manager->persist($user);
        $manager->flush();
    }

}