<?php
namespace ORMTest\Base;

use Monolog\Logger;

abstract class ORM
{

    protected $name;

    protected $log;

    public function __construct(Logger $log)
    {
        $this->log = $log;

        $this->register($this->name);

        $this->setup();
    }

    protected function register($name)
    {
        Registry::add($name, $this);
    }

    public function __call($name, $arguments)
    {
        $result = call_user_func_array(array($this, $name), $arguments);
        $this->log->debug("Calling $name on {$this->name} instance");
        $this->log->debug(var_export($result, true));

        return $result;
    }

    abstract public function setup();

    abstract protected function singleColumnSelect($table, $id);

    abstract protected function singleTableSelect($table, $id);

    abstract protected function singleViewSelect($view);
}