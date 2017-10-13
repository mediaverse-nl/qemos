<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';

    public $timestamps = false;

    protected $fillable = ['naam'];

    public function product()
    {
        return $this->hasOne('App\Product', 'menu_id');
    }
}
