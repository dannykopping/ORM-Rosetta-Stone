<?php
namespace ORMTest\ORM\Laravel\Model;

use Illuminate\Database\Eloquent\Model;
use ORMTest\ORM\Laravel\Model\UserDetail;

class User extends Model {

    protected $table = 'User';

    protected $fillable = array('firstName', 'lastName');
    protected $guarded = array('id', 'password');

    public $timestamps = true;

    public function freshTimestamp()
    {
        return time();
    }

    public function detail()
    {
        return $this->hasOne('\\ORMTest\\ORM\\Laravel\\Model\\UserDetail', 'userId');
    }

    public function products()
    {
        return $this->belongsToMany('\\ORMTest\\ORM\\Laravel\\Model\\Product', 'UserProduct', 'userId', 'productId');
    }
}