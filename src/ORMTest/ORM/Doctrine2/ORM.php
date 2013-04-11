<?php
    namespace ORMTest\ORM\Doctrine2;

    use Doctrine\DBAL\DriverManager;
    use Doctrine\DBAL\Query\QueryBuilder;
    use Doctrine\ORM\EntityManager;
    use Doctrine\ORM\Tools\Setup;
    use Fig\Fig;
    use ORMTest\ORM\Doctrine2\Model\User as User;
    use PDO;

    class ORM extends \ORMTest\Base\ORM
    {
        protected $name = "Doctrine2";

        /**
         * @var EntityManager
         */
        private $entityManager;

        public function setup()
        {
            $paths = array(__DIR__."/Model");
            $isDevMode = true;

            $connectionParams = array(
                'driver'   => Fig::get('driver.doctrine'),
                'host'     => Fig::get('host'),
                'dbname'   => Fig::get('database'),
                'user'     => Fig::get('username'),
                'password' => Fig::get('password'),
            );

            $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
            $this->entityManager = EntityManager::create($connectionParams, $config);

            $query = $this->entityManager->createQuery('SELECT u FROM User u WHERE u.id = 1');
            $users = $query->getResult();
            print_r($users);
            die();
        }

        /**
         * @return EntityManager
         */
        public function getEntityManager()
        {
            return $this->entityManager;
        }

        protected function singleColumnSelect()
        {
            return $this->qb->select('firstName')
                ->from('User', 'u')
                ->where('u.id = '.$id)
                ->setMaxResults(1)
                ->execute()
                ->fetch(PDO::FETCH_ASSOC);
        }

        protected function singleTableSelect()
        {
            return $this->qb->select('*')
                ->from('User', 'u')
                ->where('u.id = '.$id)
                ->setMaxResults(1)
                ->execute()
                ->fetch(PDO::FETCH_ASSOC);
        }

        protected function singleViewSelect()
        {
            return $this->qb->select('op.*')
                ->from('OwnedProducts', 'op')
                ->setMaxResults(1)
                ->execute()
                ->fetch(PDO::FETCH_ASSOC);
        }
    }