<?php
    namespace ORMTest\ORM\RedBeanPHP;

    use Fig\Fig;
    use ORMTest\ORM\RedBeanPHP\Model\OwnedProducts;
    use ORMTest\ORM\RedBeanPHP\Model\User;
    use ORMTest\ORM\RedBeanPHP\Util\ModelFormatter;
    use RedBean_Facade as R;
    use RedBean_ModelHelper;

    class ORM extends \ORMTest\Base\ORM
    {
        protected $name = "RedBeanPHP";

        public function setup()
        {
            $dsn = 'mysql:host='.Fig::get('host').';dbname='.Fig::get('database');

            R::setup($dsn, Fig::get('username'), Fig::get('password'));
            R::freeze();

            // improve performance by setting tables statically
            $listOfTables = R::$writer->getTables();
            R::$duplicationManager->setTables($listOfTables);
        }

        protected function singleColumnSelect()
        {
            return R::load('User', 1)->firstName;
        }

        protected function singleTableSelect()
        {
            return R::load('User', 1)->export();
        }

        protected function singleViewSelect()
        {
            return R::getRow('SELECT * FROM OwnedProducts LIMIT 1');
        }
    }