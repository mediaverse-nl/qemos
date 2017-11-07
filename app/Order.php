<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
//    use SoftDeletes;

    protected $table = 'orders';

    public $timestamps = true;

    protected $fillable = ['status', 'payment_method', 'korting'];

    public function orderedItem()
    {
        return $this->hasMany('App\OrderedItem', 'order_id', 'id');
    }

    public function tafels()
    {
        return $this->belongsTo('App\Tafel', 'tafel_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo('App\Users', 'user_id', 'id');
    }

    public static function status(){
        return collect([
            'open' => 'open',
            'cancelled' => 'cancelled',
            'pending' => 'pending',
            'failed' => 'failed',
            'paid' => 'paid',
        ]);
    }

    public static function paymentMethod(){
        return collect([
            'ideal' => 'ideal',
            'contant' => 'contant',
            'paypal' => 'paypal',
            'bitcoin' => 'bitcoin',
        ]);
    }
}
