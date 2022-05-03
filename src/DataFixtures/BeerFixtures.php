<?php

namespace App\DataFixtures;

use App\Entity\Beer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class BeerFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $beer1 = new Beer();
        $beer1->setTitle('La daurade');
        $beer1->setDescription('Bière blanche de Toulon');
        $beer1->setUser($this->getReference('user1'));
        $manager->persist($beer1);

        $beer2 = new Beer();
        $beer2->setTitle('Mont blanc');
        $beer2->setDescription('Chamonix style');
        $beer2->setUser($this->getReference('user1'));
        $manager->persist($beer2);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
        ];
    }
}
