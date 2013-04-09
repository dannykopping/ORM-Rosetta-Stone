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

            $this->setup();
        }

        public function __call($name, $arguments)
        {
            // first call parent function
            call_user_func_array(array($this, "parent::$name"), $arguments);

            // call function
            $result = call_user_func_array(array($this, $name), $arguments);

            // log results
            $this->log->debug("Calling $name on {$this->name} instance");
            $this->log->debug(var_export($result, true));

            return $result;
        }

        abstract public function setup();

        /**
         * Select a single column from a single table
         *
         * @param $table
         * @param $id
         */
        protected function singleColumnSelect($table, $id)
        {
            $this->log->info("Selecting single column from [$table] with user [$id]");
        }

        /**
         * Select a single table
         *
         * @param $table
         * @param $id
         */
        protected function singleTableSelect($table, $id)
        {
            $this->log->info("Selecting single table [$table] with user [$id]");
        }

        /**
         * Select a single view
         *
         * @param $view
         */
        protected function singleViewSelect($view)
        {
            $this->log->info("Selecting single view [$view]");
        }
    }