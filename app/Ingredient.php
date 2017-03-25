<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $table = 'ingredients';

    public $timestamps = false;

    protected $fillable = ['naam'];

    public function productIngredient()
    {
        return $this->hasMany('App\ProductIngredient', 'ingredient_id', 'id');
    }

    public function excluded()
    {
        return $this->hasMany('App\Excluded', 'ingredient_id', 'id');
    }
}
