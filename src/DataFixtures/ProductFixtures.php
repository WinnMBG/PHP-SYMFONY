<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Product;
use App\Entity\Categorie;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i=4; $i < 50; $i++){
            $entity = new Product();
            $myParent = new Categorie();
            $myParent->setName("Parent $i");
            $this->addReference("myParent$i", $entity);
            $entity
                ->setName("Product n°$i")
                ->setSlug("product$i")
                ->setPrice($i)
                ->setDescription("This product is going to make you smile a lot: Mister $i")
                ->setImage("https://via.placeholder.com/200");
            $manager->persist($entity);
        }
        $manager->flush();
    }
}
