<?php

namespace ORMTest\ORM\Doctrine2\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="Category")
 * @ORM\Entity
 */
class Category
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
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var \ORMTest\ORM\Doctrine2\Model\Category
     *
     * @ORM\ManyToOne(targetEntity="ORMTest\ORM\Doctrine2\Model\Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parentCategoryId", referencedColumnName="id")
     * })
     */
    private $parentcategoryid;


}
