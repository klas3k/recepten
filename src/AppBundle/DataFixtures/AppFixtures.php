<?php

namespace AppBundle\DataFixtures;

use DateTime;
use AppBundle\Entity\Recipe;
use AppBundle\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $categories = [];

        $category = new Category();
        $category->setName('ontbijt');
        $manager->persist($category);
        array_push($categories, $category);

        $category = new Category();
        $category->setName('lunch');
        $manager->persist($category);
        array_push($categories, $category);

        $category = new Category();
        $category->setName('diner');
        $manager->persist($category);
        array_push($categories, $category);

        $category = new Category();
        $category->setName('snack');
        $manager->persist($category);
        array_push($categories, $category);

        for ($i = 0; $i < 20; $i++) {
            $recipe = new Recipe();
            $recipe->setIngredients("appel, banaan, peer");
            $recipe->setPreperation('stir');
            $recipe->setTime(new DateTime('00:00:10'));
            $recipe->setCategory($categories[array_rand($categories)]);
            $recipe->setLikes(mt_rand(0, 100));
            $manager->persist($recipe);
        }

        $manager->flush();
    }
}
