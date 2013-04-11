<?php

namespace ORMTest\ORM\Doctrine2\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * Userproduct
 *
 * @ORM\Table(name="UserProduct")
 * @ORM\Entity
 */
class Userproduct
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
     * @var \ORMTest\ORM\Doctrine2\Model\User
     *
     * @ORM\ManyToOne(targetEntity="ORMTest\ORM\Doctrine2\Model\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="userId", referencedColumnName="id")
     * })
     */
    private $userid;

    /**
     * @var \ORMTest\ORM\Doctrine2\Model\Product
     *
     * @ORM\ManyToOne(targetEntity="ORMTest\ORM\Doctrine2\Model\Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="productId", referencedColumnName="id")
     * })
     */
    private $productid;


}
