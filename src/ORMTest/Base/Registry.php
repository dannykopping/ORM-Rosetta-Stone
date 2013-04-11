<?php
namespace ORMTest\Base;

use Exception;

class Registry
{
    private static $map = array();

    public static function add($name, $instance)
    {
        $type = '\\ORMTest\\Base\\ORM';

        if (!is_subclass_of($instance, $type)) {
            throw new Exception("Instance must be of type $type");
        }

        if (!in_array($name, self::$map)) {
            self::$map[$name] = $instance;
        }
    }

    /**
     * @param $name
     * @return null|\ORMTest\Base\ORM
     */
    public static function get($name){
        return isset(self::$map[$name]) ? self::$map[$name] : null;
    }

    public static function getMany($names){
        if(!is_array($names))
            return self::get($names);

        $list = array();
        foreach($names as $name)
            $list[$name] = self::get($name);

        return $list;
    }

    public static function types() {
        return array_keys(self::$map);
    }
}