<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peculiarity extends Model
{
    protected $table = 'peculiarity';

    protected $fillable = ['value'];

    public function productPeculiarity()
    {
        return $this->hasMany('App\ProductPeculiarity', 'peculiarity_id', 'id');
    }

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
