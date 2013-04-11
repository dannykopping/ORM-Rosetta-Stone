<?php

namespace ORMTest\ORM\Doctrine2;

use Doctrine\ORM\Mapping as ORM;

/**
 * ModelUserproduct
 *
 * @ORM\Table(name="UserProduct")
 * @ORM\Entity
 */
class ModelUserproduct
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
     * @var \ORMTest\ORM\Doctrine2\ModelUser
     *
     * @ORM\ManyToOne(targetEntity="ORMTest\ORM\Doctrine2\ModelUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="userId", referencedColumnName="id")
     * })
     */
    private $userid;

    /**
     * @var \ORMTest\ORM\Doctrine2\ModelProduct
     *
     * @ORM\ManyToOne(targetEntity="ORMTest\ORM\Doctrine2\ModelProduct")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="productId", referencedColumnName="id")
     * })
     */
    private $productid;


}
