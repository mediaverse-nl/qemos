<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kiosk extends Model
{
    use SoftDeletes;

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
