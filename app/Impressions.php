<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Impressions extends Model
{
    protected $table = 'impressions';

    public $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
