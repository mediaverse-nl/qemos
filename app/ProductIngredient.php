<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductIngredient extends Model
{
    protected $table = 'product_ingredient';

    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }

    public function ingredient()
    {
        return $this->belongsTo('App\Ingredient', 'ingredient_id', 'id');
    }
}
