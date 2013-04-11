<?php

namespace ORMTest\ORM\Doctrine2\Model;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * ORMTest\ORM\Doctrine2\Model\User
 *
 * @Entity(repositoryClass="ORMTest\ORM\Doctrine2\Model\UserRepository")
 * @Table(name="User")
 */
class User
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
    protected $firstName;

    /**
     * @Column(type="string", length=255, nullable=true)
     */
    protected $lastName;

    /**
     * SHA1 password
     *
     * @Column(type="string", length=40, nullable=true)
     */
    protected $password;

    /**
     * @Column(type="datetime", nullable=true)
     */
    protected $createdAt;

    /**
     * @Column(type="datetime", nullable=true)
     */
    protected $updatedAt;

    /**
     * @OneToOne(targetEntity="UserDetail", mappedBy="user")
     * @JoinColumn(name="userId", referencedColumnName="id", nullable=false)
     */
    protected $userDetail;

    /**
     * @ManyToMany(targetEntity="Product", inversedBy="users")
     * @JoinTable(name="UserProduct",
     *     joinColumns={@JoinColumn(name="userId", referencedColumnName="id")},
     *     inverseJoinColumns={@JoinColumn(name="productId", referencedColumnName="id")}
     * )
     */
    protected $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \ORMTest\ORM\Doctrine2\Model\User
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
     * Set the value of firstName.
     *
     * @param string $firstName
     * @return \ORMTest\ORM\Doctrine2\Model\User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get the value of firstName.
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set the value of lastName.
     *
     * @param string $lastName
     * @return \ORMTest\ORM\Doctrine2\Model\User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get the value of lastName.
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set the value of password.
     *
     * @param string $password
     * @return \ORMTest\ORM\Doctrine2\Model\User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of password.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of createdAt.
     *
     * @param datetime $createdAt
     * @return \ORMTest\ORM\Doctrine2\Model\User
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get the value of createdAt.
     *
     * @return datetime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set the value of updatedAt.
     *
     * @param datetime $updatedAt
     * @return \ORMTest\ORM\Doctrine2\Model\User
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get the value of updatedAt.
     *
     * @return datetime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set UserDetail entity (one to one).
     *
     * @param \ORMTest\ORM\Doctrine2\Model\UserDetail $userDetail
     * @return \ORMTest\ORM\Doctrine2\Model\User
     */
    public function setUserDetail(UserDetail $userDetail)
    {
        $this->userDetail = $userDetail;

        return $this;
    }

    /**
     * Get UserDetail entity (one to one).
     *
     * @return \ORMTest\ORM\Doctrine2\Model\UserDetail
     */
    public function getUserDetail()
    {
        return $this->userDetail;
    }

    /**
     * Add Product entity to collection.
     *
     * @param \ORMTest\ORM\Doctrine2\Model\Product $product
     * @return \ORMTest\ORM\Doctrine2\Model\User
     */
    public function addProduct(Product $product)
    {
        $product->addUser($this);
        $this->products[] = $product;

        return $this;
    }

    /**
     * Get Product entity collection.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProducts()
    {
        return $this->products;
    }

    public function __sleep()
    {
        return array('id', 'firstName', 'lastName', 'password', 'createdAt', 'updatedAt');
    }
}