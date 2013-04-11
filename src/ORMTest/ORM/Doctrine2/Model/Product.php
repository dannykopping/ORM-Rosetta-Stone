<?php

namespace ORMTest\ORM\Doctrine2\Model;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * ORMTest\ORM\Doctrine2\Model\Product
 *
 * @Entity(repositoryClass="ORMTest\ORM\Doctrine2\Model\ProductRepository")
 * @Table(name="Product", indexes={@Index(name="fk_Product_Category1_idx", columns={"categoryId"})})
 */
class Product
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="float", precision=9, scale=2)
     */
    protected $price;

    /**
     * @Column(type="string", length=255, nullable=true)
     */
    protected $name;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $description;

    /**
     * @ManyToOne(targetEntity="Category", inversedBy="products")
     * @JoinColumn(name="categoryId", referencedColumnName="id")
     */
    protected $category;

    /**
     * @ManyToMany(targetEntity="User", mappedBy="products")
     */
    protected $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \ORMTest\ORM\Doctrine2\Model\Product
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of id.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of price.
     *
     * @param float $price
     * @return \ORMTest\ORM\Doctrine2\Model\Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of price.
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of name.
     *
     * @param string $name
     * @return \ORMTest\ORM\Doctrine2\Model\Product
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of description.
     *
     * @param string $description
     * @return \ORMTest\ORM\Doctrine2\Model\Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set Category entity (many to one).
     *
     * @param \ORMTest\ORM\Doctrine2\Model\Category $category
     * @return \ORMTest\ORM\Doctrine2\Model\Product
     */
    public function setCategory(Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get Category entity (many to one).
     *
     * @return \ORMTest\ORM\Doctrine2\Model\Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add User entity to collection.
     *
     * @param \ORMTest\ORM\Doctrine2\Model\User $user
     * @return \ORMTest\ORM\Doctrine2\Model\Product
     */
    public function addUser(User $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Get User entity collection.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }

    public function __sleep()
    {
        return array('id', 'price', 'name', 'description', 'categoryId');
    }
}