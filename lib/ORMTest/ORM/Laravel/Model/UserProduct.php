<?php
namespace ORMTest\ORM\Laravel\Model;

use Illuminate\Database\Eloquent\Model;
use ORMTest\ORM\Laravel\Model\UserDetail;

class UserProduct extends Model {

    protected $table = 'UserProduct';

    protected $primaryKey = array('userId', 'productId');

    public $timestamps = false;

    public function user()
    {
        return $this->belongsToMany('\\ORMTest\\ORM\\Laravel\\Model\\User', 'User', 'userId', 'id');
    }

    public function products()
    {
        return $this->belongsToMany('\\ORMTest\\ORM\\Laravel\\Model\\User', 'User', 'id', 'userId');
    }
}