<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    protected $table = 'reserves';

    public $primaryKey = 'id';

    public function user()
    {
        return  $this->belongsTo('App\User');
    }
    public function route()
    {
        return $this->belongsTo('App\Route');
    }
}
