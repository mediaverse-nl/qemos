<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    protected $table = 'floor';

    public $timestamps = false;

    public function tafel()
    {
        return $this->hasMany('App\Tafel', 'floor_id', 'id');
    }

    public function location()
    {
        return $this->belongsTo('App\Location', 'location_id', 'id');
    }
}
