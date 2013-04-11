<?php
namespace ORMTest\ORM\Laravel\Model;

use Illuminate\Database\Eloquent\Model;
use ORMTest\ORM\Laravel\Model\UserDetail;

class Product extends Model {

    protected $table = 'Product';

    public $timestamps = true;

    public function freshTimestamp()
    {
        return time();
    }

    public function users()
    {
        return $this->belongsToMany('\\ORMTest\\ORM\\Laravel\\Model\\User', 'UserProduct', 'productId', 'userId')
                ->groupBy('User.id');
    }
}