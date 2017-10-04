<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'location';

    public $timestamps = true;

    protected $fillable = ['adres', 'postcode', 'stad', 'lang', 'btw', 'kvk', 'status'];

    public function user()
    {
        return $this->hasMany('App\User', 'location_id', 'id');
    }

    public function product()
    {
        return $this->hasMany('App\Product', 'location_id', 'id');
    }

    public function kiosk()
    {
        return $this->hasMany('App\Kiosk', 'location_id', 'id');
    }

    public function whitelist()
    {
        return $this->hasMany('App\Whitelist', 'location_id', 'id');
    }

    public function tafel()
    {
        return $this->hasMany('App\Tafel', 'location_id', 'id');
    }

    public function order()
    {
        return $this->hasMany('App\Order', 'location_id', 'id');
    }

    public function menu()
    {
        return $this->hasMany('App\Order', 'location_id', 'id');
    }

    public function locationSwitch($request)
    {
        $rules = [
            'language' => 'in:en,fr' //list of supported languages of your application.
        ];

        $location = $request->location; //lang is name of form select field.

        $validator = Validator::make(compact($location), $rules);

        if($validator->passes())
        {
            Session::put('location', $location);
//            App::setLocale($language);
        }
        else
        {
            /**/
        }
    }
}
