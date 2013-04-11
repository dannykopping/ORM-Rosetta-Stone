<?php

namespace ORMTest\ORM\Doctrine2\Model;

/**
 * ORMTest\ORM\Doctrine2\Model\UserProduct
 *
 * @Entity(repositoryClass="ORMTest\ORM\Doctrine2\Model\UserProductRepository")
 * @Table(name="UserProduct", indexes={@Index(name="fk_User_has_Product_Product1_idx", columns={"productId"}), @Index(name="fk_User_has_Product_User_idx", columns={"userId"})})
 */
class UserProduct
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ManyToOne(targetEntity="User", inversedBy="userProducts")
     * @JoinColumn(name="userId", referencedColumnName="id", nullable=false)
     */
    protected $user;

    /**
     * @ManyToOne(targetEntity="Product", inversedBy="userProducts")
     * @JoinColumn(name="productId", referencedColumnName="id", nullable=false)
     */
    protected $product;

    public function __construct()
    {
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \ORMTest\ORM\Doctrine2\Model\UserProduct
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
     * Set User entity (many to one).
     *
     * @param \ORMTest\ORM\Doctrine2\Model\User $user
     * @return \ORMTest\ORM\Doctrine2\Model\UserProduct
     */
    public function setUser(User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get User entity (many to one).
     *
     * @return \ORMTest\ORM\Doctrine2\Model\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set Product entity (many to one).
     *
     * @param \ORMTest\ORM\Doctrine2\Model\Product $product
     * @return \ORMTest\ORM\Doctrine2\Model\UserProduct
     */
    public function setProduct(Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get Product entity (many to one).
     *
     * @return \ORMTest\ORM\Doctrine2\Model\Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    public function __sleep()
    {
        return array('id', 'userId', 'productId');
    }
}