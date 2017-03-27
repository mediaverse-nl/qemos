<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderedItem extends Model
{
    protected $table = 'ordered_items';

    public $timestamps = true;

    protected $fillable = ['status', 'prijs', 'created_at', 'updated_at'];

    public function excluded()
    {
        return $this->hasMany('App\Excluded', 'ordered_items_id', 'id');
    }

    public function order()
    {
        return $this->belongsTo('App\Order', 'order_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }

    public static function status(){
        return collect([
            'open' => 'open',
            'wachtend' => 'wachtend',
            'bevestigd' => 'bevestigd',
            'geannuleerd' => 'geannuleerd',
        ]);
    }
}
