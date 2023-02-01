<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Categorie;

class CategorieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i = 0; $i < 11; $i++) {
            $myParent = new Categorie();
            $myParent->setName("Catégorie $i");
            $myParent->setSlug("cat$i");
            $manager->persist($myParent);

            $this->addReference("Cat$i", $myParent);
        }

        $manager->flush();
    }
}
