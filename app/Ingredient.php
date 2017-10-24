<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingredient extends Model
{
    use SoftDeletes;

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
