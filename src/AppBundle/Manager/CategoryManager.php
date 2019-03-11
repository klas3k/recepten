<?php

namespace AppBundle\Manager;


use AppBundle\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;

class CategoryManager
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getAllCategories()
    {
        return $this->em->getRepository(Category::class)->findAll();
    }
}