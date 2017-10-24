<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

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

    public function productPeculiarity()
    {
        return $this->hasMany('App\ProductPeculiarity', 'product_id', 'id');
    }

    public function menu()
    {
        return $this->belongsTo('App\Menu', 'menu_id', 'id');
    }

    public function location()
    {
        return $this->belongsTo('App\Location', 'location_id', 'id');
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
