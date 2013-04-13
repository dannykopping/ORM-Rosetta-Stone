<?php
    use ORMTest\Base\Registry;

    abstract class BaseTest extends PHPUnit_Framework_TestCase
    {
        /**
         * @return array[ORMTest\Base\ORM]
         */
        protected function getORMs()
        {
            return Registry::getMany(Registry::types());
        }
    }