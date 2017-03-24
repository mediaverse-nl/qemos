<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public $timestamps = true;

    protected $fillable = ['bereidingsduur', 'naam', 'prijs', 'status', 'beschrijving', 'status', 'bezonderheden'];

    public function orderedItems()
    {
        return $this->hasMany('App\OrderedItems', 'product_id', 'id');
    }

    public function productIngredient()
    {
        return $this->hasMany('App\ProductIngredient', 'product_id', 'id');
    }

    public function menuProduct()
    {
        return $this->hasMany('App\MenuProduct', 'product_id', 'id');
    }

    public function image()
    {
        return $this->hasMany('App\Image', 'product_id', 'id');
    }

    public static function status(){
        return collect([
            'verwijdert' => 'verwijdert',
            'zichtbaar' => 'zichtbaar',
            'verschuilen' => 'verschuilen',
        ]);
    }
}
