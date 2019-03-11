<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Recipes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $name;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $ingredients;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $prepDesc;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $prepTime;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="id", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private $category;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $amountLikes = 0;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }

    /**
     * @param mixed $ingredients
     */
    public function setIngredients($ingredients)
    {
        $this->ingredients = $ingredients;
    }

    /**
     * @return mixed
     */
    public function getPrepDesc()
    {
        return $this->prepDesc;
    }

    /**
     * @param mixed $prepDesc
     */
    public function setPrepDesc($prepDesc)
    {
        $this->prepDesc = $prepDesc;
    }

    /**
     * @return mixed
     */
    public function getPrepTime()
    {
        return $this->prepTime;
    }

    /**
     * @param mixed $prepTime
     */
    public function setPrepTime($prepTime)
    {
        $this->prepTime = $prepTime;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getAmountLikes()
    {
        return $this->amountLikes;
    }

    /**
     * @param mixed $amountLikes
     */
    public function setAmountLikes($amountLikes)
    {
        $this->amountLikes = $amountLikes;
    }

    public function addLike() {
        $this->amountLikes+= 1;
    }

    // Function for future use
    public function removeLike() {
        if ($this->amountLikes != 0) {
            $this->amountLikes -= 1;
        }
    }

}