<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public static function status(){
        return collect([
            'verwijdert' => 'verwijdert',
            'zichtbaar' => 'zichtbaar',
            'verschuilen' => 'verschuilen',
        ]);
    }
}
