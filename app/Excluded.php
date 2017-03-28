<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Excluded extends Model
{
    protected $table = 'excluded_ingredient';

    public $timestamps = false;

    public function orderedItem()
    {
        return $this->belongsTo('App\OrderedItem', 'ordered_items_id', 'id');
    }

    public function ingredient()
    {
        return $this->belongsTo('App\Ingredient', 'ingredient_id', 'id');
    }
}
