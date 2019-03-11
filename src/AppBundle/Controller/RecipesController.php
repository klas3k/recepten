<?php

namespace AppBundle\Controller;


use AppBundle\Form\Processor\RecipeFormProcessor;
use AppBundle\Form\Type\RecipeType;
use AppBundle\Manager\RecipesManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

class RecipesController extends Controller
{
    private $recipesManager;
    private $recipeFormProcessor;

    public function __construct(RecipesManager $recipesManager, RecipeFormProcessor $recipeFormProcessor)
    {
        $this->recipesManager = $recipesManager;
        $this->recipeFormProcessor = $recipeFormProcessor;
    }

    /**
     * @Route(path="recipes/{name}", name="recipes_list")
     */
    public function showRecipesAction($name = null)
    {
        return $this->render('recipes/recipesList.html.twig', [
            'recipes' => $this->getRecipes($name),
            'category' => $name
        ]);
    }


    /**
     * @Route(path="recipe/{name}/{id}/like", name="recipe_name_like")
     * @Route(path="recipe/{id}/like", name="recipe_like")
     */
    public function likeRecipeAction($name = null, $id)
    {
        $this->recipesManager->addLikeToRecipe($id);

        if (!$name) {
            return $this->redirectToRoute('recipes_list');
        } else {
            return $this->redirectToRoute('recipes_list', ['name' => $name]);
        }
    }


    /**
     * @Route(path="recipe/{id}/edit", name="recipe_edit")
     */
    public function editRecipeAction($id)
    {
        //create the edit form
        $form = $this->createForm(RecipeType::class, $this->recipesManager->getRecipeById($id));

        //let the form processor handle the rest
        $form = $this->recipeFormProcessor->processForm($form);
        $name = $form->getData()->getCategory()->getName();

        // add a toast when form is submitted
        if ($form->isSubmitted() && $form->isValid()) {
            if (!$name) {
                return $this->redirectToRoute('recipes_list');
            } else {
                return $this->redirectToRoute('recipes_list', ['name' => $name]);
            }
        }

        return $this->render('recipes/edit.html.twig', array(
            'form'  => $form->createView()
        ));
    }


    /**
     * @Route(path="recipe/create", name="recipe_create")
     */
    public function createRecipeAction()
    {
        //create the edit form
        $form = $this->createForm(RecipeType::class);

        //let the form processor handle the rest
        $form = $this->recipeFormProcessor->processForm($form);
        if ($form->getData()) {
            $name = $form->getData()->getCategory()->getName();
        }

        // add a toast when form is submitted
        if ($form->isSubmitted() && $form->isValid()) {
            if (!$name) {
                return $this->redirectToRoute('recipes_list');
            } else {
                return $this->redirectToRoute('recipes_list', ['name' => $name]);
            }
        }

        return $this->render('recipes/edit.html.twig', array(
            'form'  => $form->createView()
        ));
    }

    private function getRecipes($name)
    {
        if ($name != null) {
            return $this->recipesManager->getRecipesByCategory($name);
        } else {
            return $this->recipesManager->getAllRecipes();
        }
    }

}