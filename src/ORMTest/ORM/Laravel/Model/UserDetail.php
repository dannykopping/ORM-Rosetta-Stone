<?php
namespace ORMTest\ORM\Laravel\Model;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model {

    protected $table = 'UserDetail';

    protected $fillable = array('phoneNumber', 'address');
    protected $guarded = array('id', 'userId');

    public $timestamps = true;

    public function freshTimestamp()
    {
        return time();
    }

    public function user()
    {
        return $this->belongsTo('\\ORMTest\\ORM\\Laravel\\Model\\User', 'id');
    }
}