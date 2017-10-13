<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kiosk extends Model
{
    protected $table = 'kiosk';

    public $timestamps = true;

    protected $fillable = ['status', 'api_key', 'model_nr', 'status'];

    public function location()
    {
        return $this->belongsTo('App\Location', 'location_id', 'id');
    }

    public function pin()
    {
        return $this->hasMany('App\Pin', 'kiosk_id', 'id');
    }

    public static function status()
    {
        return [
            'online' => 'online',
            'offline' => 'offline',
        ];
    }
}
