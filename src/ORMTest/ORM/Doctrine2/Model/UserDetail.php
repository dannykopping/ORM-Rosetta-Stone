<?php

namespace ORMTest\ORM\Doctrine2\Model;

/**
 * ORMTest\ORM\Doctrine2\Model\UserDetail
 *
 * @Entity(repositoryClass="ORMTest\ORM\Doctrine2\Model\UserDetailRepository")
 * @Table(name="UserDetail", indexes={@Index(name="fk_UserDetail_User1_idx", columns={"userId"})})
 */
class UserDetail
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string", length=20, nullable=true)
     */
    protected $phoneNumber;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $address;

    /**
     * @OneToOne(targetEntity="User", inversedBy="userDetail")
     * @JoinColumn(name="userId", referencedColumnName="id", nullable=false)
     */
    protected $user;

    public function __construct()
    {
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \ORMTest\ORM\Doctrine2\Model\UserDetail
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
     * Set the value of phoneNumber.
     *
     * @param string $phoneNumber
     * @return \ORMTest\ORM\Doctrine2\Model\UserDetail
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get the value of phoneNumber.
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set the value of address.
     *
     * @param string $address
     * @return \ORMTest\ORM\Doctrine2\Model\UserDetail
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of address.
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set User entity (one to one).
     *
     * @param \ORMTest\ORM\Doctrine2\Model\User $user
     * @return \ORMTest\ORM\Doctrine2\Model\UserDetail
     */
    public function setUser(User $user = null)
    {
        $user->setUserDetail($this);
        $this->user = $user;

        return $this;
    }

    /**
     * Get User entity (one to one).
     *
     * @return \ORMTest\ORM\Doctrine2\Model\User
     */
    public function getUser()
    {
        return $this->user;
    }

    public function __sleep()
    {
        return array('id', 'phoneNumber', 'address', 'userId');
    }
}