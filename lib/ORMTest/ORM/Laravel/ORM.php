<?php
    namespace ORMTest\ORM\Laravel;

    use Capsule\DB;
    use Capsule\Database\Connection;
    use Fig\Fig;
    use Illuminate\Database\ConnectionResolver;
    use Illuminate\Database\Connectors\ConnectionFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Events\Dispatcher;
    use ORMTest\ORM\Laravel\Model\Product;
    use ORMTest\ORM\Laravel\Model\User;

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

        protected function singleColumnSelect()
        {
            return User::find(1)->firstName;
        }

        protected function singleTableSelect()
        {
            print_r(User::find(1)->toArray());
            return User::find(1)->toArray();
        }

        protected function singleViewSelect()
        {
            return DB::table('OwnedProducts')->first();
        }
    }