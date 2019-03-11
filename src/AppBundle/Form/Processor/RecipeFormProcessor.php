<?php

namespace AppBundle\Form\Processor;


use AppBundle\Manager\RecipesManager;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\RequestStack;

class RecipeFormProcessor
{
    private $recipesManager;
    private $requestStack;

    public function __construct(RecipesManager $recipesManager, RequestStack $requestStack)
    {
        $this->recipesManager = $recipesManager;
        $this->requestStack = $requestStack;
    }

    public function processForm(Form $form)
    {
        $request = $this->requestStack->getCurrentRequest();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->recipesManager->update($form->getData());
        }

        return $form;
    }
}