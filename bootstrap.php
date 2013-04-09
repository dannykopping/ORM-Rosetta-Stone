<?php
    use Fig\Fig;

    require_once "vendor/autoload.php";

    Fig::setUp(array(
            'driver'          => array(
                'laravel' => 'mysql',
                'doctrine' => 'pdo_mysql',
            ),
            'host'            => '127.0.0.1',
            'database'        => 'ORMTest',
            'username'        => 'ormtest',
            'password'        => 'ormtest',
            'collation'       => 'utf8_general_ci',
            'charset'         => 'utf8',
            'prefix'          => ''
        )
    );