<?php

namespace App\DataFixtures;

use App\Entity\Kurse;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class KursFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $kurs = new Kurse();
        $kurs->setName('Keyboard');
        $kurs->setDauer(2);
        $kurs->setInfo('Phyiseotherapy');
        $manager->persist($kurs);

        $manager->flush();
    }
}
