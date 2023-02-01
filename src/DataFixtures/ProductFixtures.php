<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Product;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i=4; $i < 50; $i++){
            $entity = new Product();
            $randomParent = random_int(0, 10);
            $entity
                ->setCategory(
                    $this->getReference("Cat$randomParent")
                )
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
