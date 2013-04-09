<?php
    use Monolog\Handler\StreamHandler;
    use Monolog\Logger;
    use ORMTest\Base\Registry;

    abstract class BaseTest extends PHPUnit_Framework_TestCase
    {
        /**
         * @var     Logger
         */
        protected $log;

        protected function setUp()
        {
            $this->log = new Logger('orm-log');
            $this->log->pushHandler(new StreamHandler(__DIR__ . '/../log.txt'));

            new ORMTest\ORM\Laravel\ORM($this->log);
            new ORMTest\ORM\Doctrine2\ORM($this->log);
        }

        /**
         * @return array[ORMTest\Base\ORM]
         */
        protected function getORMs()
        {
            return Registry::getMany(Registry::types());
        }
    }