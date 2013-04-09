<?php
    namespace ORMTest\ORM\Doctrine2;

    use Doctrine\DBAL\Configuration;
    use Doctrine\DBAL\DriverManager;
    use Doctrine\DBAL\Query\QueryBuilder;
    use Fig\Fig;
    use PDO;

    class ORM extends \ORMTest\Base\ORM
    {
        protected $name = "Doctrine2";

        /**
         * @var QueryBuilder
         */
        private $qb;

        public function setup()
        {
            $connectionParams = array(
                'driver'   => Fig::get('driver.doctrine'),
                'host'     => Fig::get('host'),
                'dbname'   => Fig::get('database'),
                'user'     => Fig::get('username'),
                'password' => Fig::get('password'),
            );

            $config   = new Configuration();
            $conn     = DriverManager::getConnection($connectionParams, $config);
            $this->qb = $conn->createQueryBuilder();
        }

        protected function singleColumnSelect($table, $id)
        {
            return $this->qb->select('firstName')
                ->from('User', 'u')
                ->where('u.id = '.$id)
                ->setMaxResults(1)
                ->execute()
                ->fetch(PDO::FETCH_ASSOC);
        }

        protected function singleTableSelect($table, $id)
        {
            return $this->qb->select('*')
                ->from('User', 'u')
                ->where('u.id = '.$id)
                ->setMaxResults(1)
                ->execute()
                ->fetch(PDO::FETCH_ASSOC);
        }

        protected function singleViewSelect($view)
        {
            return $this->qb->select('op.*')
                ->from('OwnedProducts', 'op')
                ->setMaxResults(1)
                ->execute()
                ->fetch(PDO::FETCH_ASSOC);
        }
    }