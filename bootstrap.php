<?php
    use Analog\Analog;
    use Analog\Handler\File;
    use Fig\Fig;
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
    Analog::handler(File::init(__DIR__ . '/log.txt'));
    Analog::alert(str_repeat('-',10).'ORM Rosetta Stone'.str_repeat('-',10));

    // create ORM instances
    $types = array(Factory::LARAVEL, Factory::REDBEAN);

    foreach ($types as $type) {
        Registry::add($type, Factory::create($type));
    }