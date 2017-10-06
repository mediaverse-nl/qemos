<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPeculiarity extends Model
{
    protected $primaryKey = null;

    public $incrementing = false;

    protected $table = 'product_peculiarity';

    protected $fillable = ['product_id', 'peculiarity_id'];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function peculiarity()
    {
        return $this->belongsTo('App\Peculiarity');
    }
}
