<?php
    namespace ORMTest\Base;

    use Analog\Analog;

    abstract class ORM
    {
        protected $name;

        public function __construct()
        {
            $this->setup();
        }

        public function __call($name, $arguments)
        {
            // first call parent function
            call_user_func_array(array($this, "parent::$name"), $arguments);

            // call function
            $result = call_user_func_array(array($this, $name), $arguments);

            // log results
            Analog::debug("Calling $name on {$this->name} instance");
            Analog::debug(var_export($result, true));

            return $result;
        }

        abstract public function setup();

        /**
         * Select a single column from a single table
         */
        protected function singleColumnSelect()
        {
            Analog::info("Selecting single column from a table");
        }

        /**
         * Select a single table
         */
        protected function singleTableSelect()
        {
            Analog::info("Selecting single table");
        }

        /**
         * Select a single view
         */
        protected function singleViewSelect()
        {
            Analog::info("Selecting single view");
        }
    }