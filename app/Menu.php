<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use SoftDeletes;

    protected $table = 'menu';

    public $timestamps = false;

    protected $fillable = ['naam'];

    public function product()
    {
        return $this->hasOne('App\Product', 'menu_id');
    }


}
