<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public $timestamps = true;

    protected $fillable = ['bereidingsduur', 'naam', 'prijs', 'status', 'beschrijving', 'status', 'bezonderheden'];

    public function orderedItem()
    {
        return $this->hasMany('App\OrderedItem', 'product_id', 'id');
    }

    public function productIngredient()
    {
        return $this->hasMany('App\ProductIngredient', 'product_id', 'id');
    }

    public function menuProduct()
    {
        return $this->hasOne('App\MenuProduct', 'product_id', 'id');
    }

    public function image()
    {
        return $this->hasMany('App\Image', 'product_id', 'id');
    }

    public static function status(){
        return collect([
            'zichtbaar' => 'zichtbaar',
            'verwijdert' => 'verwijdert',
            'verschuilen' => 'verschuilen',
        ]);
    }

    public static function bezonderheden(){
        return collect([
            'vega' => 'vega',
            'scherp' => 'scherp',
            'zoet' => 'zoet',
            'zuur' => 'zuur',
            'noot' => 'noot',
            'glutten' => 'glutten',
            'halal' => 'glutten',
        ]);
//        'vega','scherp','zoet','zuur','noot','glutten','halal'
    }
}
