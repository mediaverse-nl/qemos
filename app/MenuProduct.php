<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuProduct extends Model
{
    protected $table = 'menu_product';

    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }

    public function menu()
    {
        return $this->belongsTo('App\Menu', 'menu_id', 'id');
    }
}
