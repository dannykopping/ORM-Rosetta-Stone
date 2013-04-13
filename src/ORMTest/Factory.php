<?php
namespace ORMTest;

use Exception;
use ORMTest\Base\ORM;
use ReflectionClass;

class Factory {

    const LARAVEL = "Laravel";
    const DOCTRINE2 = "Doctrine2";
    const REDBEAN = "RedBeanPHP";

    /**
     * @param $type
     * @param $args
     *
     * @throws \Exception
     * @return ORM
     */
    public static function create($type, $args = array())
    {
        if(!is_array($args))
            $args = array($args);

        $pattern = "\\ORMTest\\ORM\\%s\\ORM";
        $className = $type;

        $className = sprintf($pattern, $className);
        if(!class_exists($className))
            throw new Exception("Cannot create instance of $type; $className does not exist.");

        // create a new instance of class with arguments
        $class = new ReflectionClass($className);
        return $class->newInstanceArgs($args);
    }
}