<?php

namespace App\DataFixtures;

use App\Entity\Skill;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SkillFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $skill1 = new Skill();
        $skill1->setTitre('fraîche');
        $manager->persist($skill1);

        $skill2 = new Skill();
        $skill2->setTitre('épicé');
        $manager->persist($skill2);

        $skill3 = new Skill();
        $skill3->setTitre('âcre');
        $manager->persist($skill3);

        $manager->flush();
    }
}
