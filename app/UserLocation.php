<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLocation extends Model
{
    protected $primaryKey = null;

    public $incrementing = false;

    protected $table = 'user_location';

    protected $fillable = ['user_id', 'location_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function location()
    {
        return $this->belongsTo('App\Location');
    }
}
