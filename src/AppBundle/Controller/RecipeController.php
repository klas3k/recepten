<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Recipe;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Recipe controller.
 *
 * @Route("/recepies")
 */
class RecipeController extends Controller
{
    /**
     * Finds and displays all recipe entities.
     *
     * @Route("/", name="recepies_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $recipes = $em->getRepository('AppBundle:Recipe')->findAll();

        return $this->render('recipe/index.html.twig', [
            'recipes' => $recipes,
        ]);
    }

    /**
     * Adds a like to the recepe
     *
     * @Route("/like/{id}", name="recipe_like")
     * @Method("GET")
     */
    public function likeAction(Request $request, Recipe $recipe)
    {
        $em = $this->getDoctrine()->getManager();
        $recipe->addLike();
        $em->persist($recipe);
        $em->flush();

        return $this->redirectToRoute('recepies_show', ['name' => $recipe->getCategory()]);
    }

    /**
     * Removes a like from the recepe
     *
     * @Route("/dislike/{id}", name="recipe_dislike")
     * @Method("GET")
     */
    public function dislikeAction(Request $request, Recipe $recipe)
    {
        $em = $this->getDoctrine()->getManager();
        $recipe->takeLike();
        $em->persist($recipe);
        $em->flush();

        return $this->redirectToRoute('recepies_show', ['name' => $recipe->getCategory()]);
    }

    /**
     * Displays a form to edit an existing recipe entity.
     *
     * @Route("/{id}/edit", name="recipe_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Recipe $recipe)
    {
        $editForm = $this->createForm('AppBundle\Form\RecipeType', $recipe);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('recipe_edit', ['id' => $recipe->getId()]);
        }

        return $this->render('recipe/edit.html.twig', [
            'recipe'      => $recipe,
            'edit_form'   => $editForm->createView(),
        ]);
    }
}
