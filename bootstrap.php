<?php
    use Fig\Fig;
    use Monolog\Handler\StreamHandler;
    use Monolog\Logger;
    use ORMTest\Base\Registry;
    use ORMTest\Factory;

    // run Composer autoload
    require_once "vendor/autoload.php";

    // initialize config
    Fig::setUp(array(
            'driver'    => array(
                'laravel'  => 'mysql',
                'doctrine' => 'pdo_mysql',
            ),
            'host'      => '127.0.0.1',
            'database'  => 'ormtest',
            'username'  => 'ormtest',
            'password'  => 'ormtest',
            'collation' => 'utf8_general_ci',
            'charset'   => 'utf8',
            'prefix'    => ''
        )
    );

    // create logger
    $log = new Logger('orm');
    $log->pushHandler(new StreamHandler(__DIR__ . '/log.txt'));

    // create ORM instances
    $types = array(Factory::LARAVEL, Factory::REDBEAN);

    foreach ($types as $type) {
        Registry::add($type, Factory::create($type, $log));
    }