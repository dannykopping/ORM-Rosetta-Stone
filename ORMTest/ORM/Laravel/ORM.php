<?php
namespace ORMTest\ORM\Laravel;

use Capsule\DB;
use Capsule\Database\Connection;
use Illuminate\Database\ConnectionResolver;
use Illuminate\Database\Connectors\ConnectionFactory;
use Illuminate\Database\Eloquent\Model;

class ORM extends \ORMTest\Base\ORM
{
    protected $name = "Laravel";

    public function setup()
    {
        $settings = array(
            'driver' => 'mysql',
            'host' => '127.0.0.1',
            'database' => 'ORMTest',
            'username' => 'ormtest',
            'password' => 'ormtest',
            'collation' => 'utf8_general_ci',
            'charset' => 'utf8',
            'prefix' => ''
        );

        // Bootstrap Eloquent ORM
//        $connFactory = new ConnectionFactory();
//        $conn = $connFactory->make($settings);
//        $resolver = new ConnectionResolver();
//        $resolver->addConnection('default', $conn);
//        $resolver->setDefaultConnection('default');
//        Model::setConnectionResolver($resolver);

        Connection::make('main', $settings, true);
    }

    protected function singleColumnSelect($table, $id)
    {
        return DB::table($table)->where('id', '=', $id)->select('firstName')->first();
    }

    protected function singleTableSelect($table, $id)
    {
        return DB::table($table)->where('id', '=', $id)->first();
    }

    protected function singleViewSelect($view)
    {
        return DB::table($view)->first();
    }
}