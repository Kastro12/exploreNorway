<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreateRoute extends Model
{
    protected $table = 'create_routes';

    public $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
