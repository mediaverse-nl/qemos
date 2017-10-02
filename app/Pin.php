<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pin extends Model
{
    protected $table = 'pin';

    public $timestamps = true;

    protected $fillable = ['status', 'prijs', 'korting', 'sn'];

    public function kiosk()
    {
        return $this->hasMany('App\Kiosk', 'kiosk_id', 'id');
    }
}
