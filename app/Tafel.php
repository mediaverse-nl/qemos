<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tafel extends Model
{
    protected $table = 'tafels';

    protected $fillable = ['aantal_plaatsen', 'bezet'];

    public $timestamps = false;

    public static function status(){
        return collect([
            'verwijdert' => 'verwijdert',
            'zichtbaar' => 'zichtbaar',
            'verschuilen' => 'verschuilen',
        ]);
    }
}
