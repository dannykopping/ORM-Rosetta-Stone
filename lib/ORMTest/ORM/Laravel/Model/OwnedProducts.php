<?php
namespace ORMTest\ORM\Laravel\Model;

use Illuminate\Database\Eloquent\Model;
use ORMTest\ORM\Laravel\Model\UserDetail;

class OwnedProducts extends Model {

    protected $table = 'OwnedProducts';

    protected $privateKey = null;
}