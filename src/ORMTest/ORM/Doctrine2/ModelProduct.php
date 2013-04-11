<?php

namespace ORMTest\ORM\Doctrine2;

use Doctrine\ORM\Mapping as ORM;

/**
 * ModelProduct
 *
 * @ORM\Table(name="Product")
 * @ORM\Entity
 */
class ModelProduct
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
     * @var float
     *
     * @ORM\Column(name="price", type="float", nullable=false)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var \ORMTest\ORM\Doctrine2\ModelCategory
     *
     * @ORM\ManyToOne(targetEntity="ORMTest\ORM\Doctrine2\ModelCategory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categoryId", referencedColumnName="id")
     * })
     */
    private $categoryid;


}
