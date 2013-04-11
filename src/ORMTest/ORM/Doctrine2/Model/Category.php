<?php

namespace ORMTest\ORM\Doctrine2\Model;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * ORMTest\ORM\Doctrine2\Model\Category
 *
 * @Entity(repositoryClass="ORMTest\ORM\Doctrine2\Model\CategoryRepository")
 * @Table(name="Category", indexes={@Index(name="fk_Category_Category1_idx", columns={"parentCategoryId"})})
 */
class Category
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string", length=255, nullable=true)
     */
    protected $name;

    /**
     * @OneToOne(targetEntity="Category", mappedBy="category")
     * @JoinColumn(name="parentCategoryId", referencedColumnName="id")
     */
    protected $category;

    /**
     * @OneToMany(targetEntity="Product", mappedBy="category")
     * @JoinColumn(name="categoryId", referencedColumnName="id")
     */
    protected $products;

    /**
     * @OneToOne(targetEntity="Category", inversedBy="category")
     * @JoinColumn(name="parentCategoryId", referencedColumnName="id")
     */
    protected $category;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \ORMTest\ORM\Doctrine2\Model\Category
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
     * Set the value of name.
     *
     * @param string $name
     * @return \ORMTest\ORM\Doctrine2\Model\Category
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
     * Set Category entity (one to one).
     *
     * @param \ORMTest\ORM\Doctrine2\Model\Category $category
     * @return \ORMTest\ORM\Doctrine2\Model\Category
     */
    public function setCategory(Category $category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get Category entity (one to one).
     *
     * @return \ORMTest\ORM\Doctrine2\Model\Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add Product entity to collection (one to many).
     *
     * @param \ORMTest\ORM\Doctrine2\Model\Product $product
     * @return \ORMTest\ORM\Doctrine2\Model\Category
     */
    public function addProduct(Product $product)
    {
        $this->products[] = $product;

        return $this;
    }

    /**
     * Get Product entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Set Category entity (one to one).
     *
     * @param \ORMTest\ORM\Doctrine2\Model\Category $category
     * @return \ORMTest\ORM\Doctrine2\Model\Category
     */
    public function setCategory(Category $category = null)
    {
        $category->setCategory($this);
        $this->category = $category;

        return $this;
    }

    /**
     * Get Category entity (one to one).
     *
     * @return \ORMTest\ORM\Doctrine2\Model\Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    public function __sleep()
    {
        return array('id', 'name', 'parentCategoryId');
    }
}