<?php

namespace AppBundle\Manager;


use AppBundle\Entity\Category;
use AppBundle\Entity\Recipes;
use Doctrine\ORM\EntityManagerInterface;

class RecipesManager
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function update(Recipes $recipes) {
        $this->em->persist($recipes);
        $this->em->flush();
    }

    public function getAllRecipes()
    {
        return $this->em->getRepository(Recipes::class)->findAll();
    }

    public function getRecipeById($id)
    {
        return $this->em->getRepository(Recipes::class)->find($id);
    }

    public function getRecipesByCategory($name) {
        $category = $this->em->getRepository(Category::class)->findOneByName($name);

        return $this->em->getRepository(Recipes::class)->findBy(['category' => $category]);
    }

    public function addLikeToRecipe($id) {
        $recipe = $this->em->getRepository(Recipes::class)->find($id);
        $recipe->addLike();
        $this->em->persist($recipe);
        $this->em->flush();
    }
}