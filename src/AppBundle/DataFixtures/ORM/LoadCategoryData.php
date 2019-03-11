<?php

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class LoadCategoryData extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $category = new Category();
        $category->setName('Ontbijt');
        $manager->persist($category);
        $manager->flush();

        $category = new Category();
        $category->setName('Lunch');
        $manager->persist($category);
        $manager->flush();

        $category = new Category();
        $category->setName('Diner');
        $manager->persist($category);
        $manager->flush();

        $category = new Category();
        $category->setName('Snack');
        $manager->persist($category);
        $manager->flush();
    }
}