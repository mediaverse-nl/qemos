<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use SoftDeletes;

    protected $table = 'banner';

    public $timestamps = false;

    protected $fillable = [];

    public function product()
    {
        return $this->hasOne('App\Menu', 'menu_id');
    }
}
