<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tafel extends Model
{
    protected $table = 'tafels';

    protected $fillable = ['aantal_plaatsen'];

    public $timestamps = false;
}
