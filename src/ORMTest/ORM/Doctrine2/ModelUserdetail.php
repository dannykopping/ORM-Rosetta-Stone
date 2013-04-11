<?php

namespace ORMTest\ORM\Doctrine2;

use Doctrine\ORM\Mapping as ORM;

/**
 * ModelUserdetail
 *
 * @ORM\Table(name="UserDetail")
 * @ORM\Entity
 */
class ModelUserdetail
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="phoneNumber", type="string", length=20, nullable=true)
     */
    private $phonenumber;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="text", nullable=true)
     */
    private $address;

    /**
     * @var \ORMTest\ORM\Doctrine2\ModelUser
     *
     * @ORM\ManyToOne(targetEntity="ORMTest\ORM\Doctrine2\ModelUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="userId", referencedColumnName="id")
     * })
     */
    private $userid;


}
