<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public static function status(){
        return collect([
            'verwijdert',
            'zichtbaar',
            'verschuilen',
        ]);
    }
}
