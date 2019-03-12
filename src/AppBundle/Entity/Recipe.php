<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Category;

/**
 * Recipe
 *
 * @ORM\Table(name="recipe")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RecipeRepository")
 */
class Recipe
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ingredients", type="string")
     */
    private $ingredients;

    /**
     * @var string
     *
     * @ORM\Column(name="preperation", type="string", length=255)
     */
    private $preperation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time", type="time")
     */
    private $time;

    /**
     * @var Category
     * 
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id", nullable=false)
     */
    private $category;

    /**
     * @var int
     *
     * @ORM\Column(name="likes", type="integer")
     */
    private $likes;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set ingredients
     *
     * @param string $ingredients
     *
     * @return Recipe
     */
    public function setIngredients($ingredients)
    {
        $this->ingredients = $ingredients;

        return $this;
    }

    /**
     * Get ingredients
     *
     * @return array
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }

    /**
     * Set preperation
     *
     * @param string $preperation
     *
     * @return Recipe
     */
    public function setPreperation($preperation)
    {
        $this->preperation = $preperation;

        return $this;
    }

    /**
     * Get preperation
     *
     * @return string
     */
    public function getPreperation()
    {
        return $this->preperation;
    }

    /**
     * Set time
     *
     * @param \DateTime $time
     *
     * @return Recipe
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return \DateTime
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set category
     *
     * @param integer $category
     *
     * @return Recipe
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return int
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set likes
     *
     * @param integer $likes
     *
     * @return Recipe
     */
    public function setLikes($likes)
    {
        $this->likes = $likes;

        return $this;
    }

    /**
     * Get likes
     *
     * @return int
     */
    public function getLikes()
    {
        return $this->likes;
    }

    /**
     * Add one like
     * 
     * @return Recipe
     */
    public function addLike()
    {
        $this->likes += 1;

        return $this;
    }

    /**
     * Take one like
     * 
     * @return Recipe
     */
    public function takeLike()
    {
        $this->likes -= 1;

        return $this;
    }
}

