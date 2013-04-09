<?php
    namespace ORMTest\ORM\Laravel;

    use Capsule\DB;
    use Capsule\Database\Connection;
    use Fig\Fig;
    use Illuminate\Database\ConnectionResolver;
    use Illuminate\Database\Connectors\ConnectionFactory;
    use Illuminate\Database\Eloquent\Model;

    class ORM extends \ORMTest\Base\ORM
    {
        protected $name = "Laravel";

        public function setup()
        {
            $settings = array(
                'driver'    => Fig::get('driver.laravel'),
                'host'      => Fig::get('host'),
                'database'  => Fig::get('database'),
                'username'  => Fig::get('username'),
                'password'  => Fig::get('password'),
                'collation' => Fig::get('collation'),
                'charset'   => Fig::get('charset'),
                'prefix'    => Fig::get('prefix')
            );

            // Bootstrap Eloquent ORM
            $connFactory = new ConnectionFactory();
            $conn        = $connFactory->make($settings);
            $resolver    = new ConnectionResolver();
            $resolver->addConnection('default', $conn);
            $resolver->setDefaultConnection('default');
            Model::setConnectionResolver($resolver);

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