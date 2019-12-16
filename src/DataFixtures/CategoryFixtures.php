<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
//        $categories = ['Développement Front', 'Développement Back', 'Développement Full Stack'];
        $categories = ['Integrateur'];
        foreach($categories as $c) {
            $category = new Category();
            $category ->setNom($c);
            $manager->persist($category);

        }

        $manager->flush();
    }

    public static function getGroups(): array
    {

        return ['category'];
    }
}
