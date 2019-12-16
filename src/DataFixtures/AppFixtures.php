<?php

namespace App\DataFixtures;

use App\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $tag = new Tag();
        $tag ->setNom('php');
        $tag ->setIsOnline('1');
        $manager ->persist($tag);

        $tag = new Tag();
        $tag ->setNom('js');
        $tag ->setIsOnline('1');
        $manager ->persist($tag);

        $tag = new Tag();
        $tag ->setNom('sql');
        $tag ->setIsOnline('1');
        $manager ->persist($tag);


        $manager->flush();
    }
}
