<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';

    public $timestamps = false;

    protected $fillable = ['naam'];

    public function menuProduct()
    {
        return $this->hasMany('App\MenuProduct', 'menu_id', 'id');
    }
}
