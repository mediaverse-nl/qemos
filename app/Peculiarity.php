<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peculiarity extends Model
{
    protected $table = 'peculiarity';

    protected $fillable = ['value'];

    public static function values(){
        return collect([
            'vega',
            'scherp',
            'zoet',
            'zuur',
            'glutten',
            'halal',
            'noot',
        ]);
    }

    public $timestamps = false;
}
