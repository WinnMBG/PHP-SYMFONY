<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategorieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i = 4; $i < 50; $i) {
            $entity = new Product();
            $myParent = new Categorie();
            $randomParent = random_int(0, 10);
            $entity->setCategory(
                $this->getReference("myParent$randomParent")
            );
            $manager->persist($entity);
        }

        $manager->flush();
    }
}
