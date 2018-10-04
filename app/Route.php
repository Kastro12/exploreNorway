<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $table = 'routes';

    public $primaryKey = 'id';

    public function reserve()
    {
        return $this->hasMany('App\Reserve');
    }

}
