<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Category;
use AppBundle\Entity\Recipes;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadRecipesData extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $ontbijt = $manager->getRepository(Category::class)->findOneByName('Ontbijt');
        $lunch = $manager->getRepository(Category::class)->findOneByName('Lunch');
        $diner = $manager->getRepository(Category::class)->findOneByName('Diner');
        $snack = $manager->getRepository(Category::class)->findOneByName('Snack');

        // Ontbijt
        $recipes = new Recipes();
        $recipes->setName('Brood met pindakaas');
        $recipes->setIngredients('Brood pindakaas');
        $recipes->setPrepDesc('Pak een mes en smeer pindakaas op brood');
        $recipes->setPrepTime(1);
        $recipes->setCategory($ontbijt);
        $recipes->setAmountLikes(108972);
        $manager->persist($recipes);
        $manager->flush();

        $recipes = new Recipes();
        $recipes->setName('Brood met chocola');
        $recipes->setIngredients('Brood chocola');
        $recipes->setPrepDesc('Pak een mes en smeer chocola op brood');
        $recipes->setPrepTime(1);
        $recipes->setCategory($ontbijt);
        $recipes->setAmountLikes(108414972);
        $manager->persist($recipes);
        $manager->flush();

        // Lunch
        $recipes = new Recipes();
        $recipes->setName('Tosti');
        $recipes->setIngredients('Brood ham kaas brood');
        $recipes->setPrepDesc('Doe dit tussen een tosti ijzer');
        $recipes->setPrepTime(4);
        $recipes->setCategory($lunch);
        $recipes->setAmountLikes(997);
        $manager->persist($recipes);
        $manager->flush();

        $recipes = new Recipes();
        $recipes->setName('Broodje Döner');
        $recipes->setIngredients('Brood döner en andere dingen');
        $recipes->setPrepDesc('Maak het zelf of ga naar de dichtstbijzijnde turk');
        $recipes->setPrepTime(10);
        $recipes->setCategory($lunch);
        $recipes->setAmountLikes(9497);
        $manager->persist($recipes);
        $manager->flush();

        // Diner
        $recipes = new Recipes();
        $recipes->setName('Hutspot');
        $recipes->setIngredients('Aardappelen Wortels Uien');
        $recipes->setPrepDesc('STAMPEN MAAR');
        $recipes->setPrepTime(34);
        $recipes->setCategory($diner);
        $recipes->setAmountLikes(0);
        $manager->persist($recipes);
        $manager->flush();

        $recipes = new Recipes();
        $recipes->setName('Broodje hamburger');
        $recipes->setIngredients('Broodje, Hamburger, cedar kaas, uien');
        $recipes->setPrepDesc('Bak de hamburger met de cedar kaas erop en de uien erbij. Daarna doe alles in het broodjes');
        $recipes->setPrepTime(696);
        $recipes->setCategory($diner);
        $recipes->setAmountLikes(0);
        $manager->persist($recipes);
        $manager->flush();

        // Snack
        $recipes = new Recipes();
        $recipes->setName('Mars');
        $recipes->setIngredients('Mars met verpakking');
        $recipes->setPrepDesc('Open de verpakking');
        $recipes->setPrepTime(0);
        $recipes->setCategory($snack);
        $recipes->setAmountLikes(0);
        $manager->persist($recipes);
        $manager->flush();

        $recipes = new Recipes();
        $recipes->setName('Chips');
        $recipes->setIngredients('Chipzak');
        $recipes->setPrepDesc('Open de zak chips');
        $recipes->setPrepTime(0);
        $recipes->setCategory($snack);
        $recipes->setAmountLikes(0);
        $manager->persist($recipes);
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            LoadCategoryData::class,
        ];
    }
}