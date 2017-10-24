<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use SoftDeletes;

    protected $table = 'images';

    public $timestamps = true;

    protected $fillable = ['path'];

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }
}
