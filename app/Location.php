<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Validator;

class Location extends Model
{
    protected $table = 'location';

    public $timestamps = true;

    protected $fillable = ['adres', 'postcode', 'stad', 'lang', 'btw', 'kvk', 'status'];

    public function userLocation()
    {
        return $this->hasMany('App\UserLocation', 'location_id', 'id');
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
        return $this->hasMany('App\Menu', 'location_id', 'id');
    }

    public static function status(){
        return collect([
            'online' => 'online',

//            'zichtbaar' => 'zichtbaar',N
            'offline' => 'offline',
        ]);
    }

    public function allowedLocation($request)
    {
        $keys = array_keys(auth()->user()->locations()->toArray());

        $allowed = implode(',',$keys);

        $rules = [
            'location' => 'required|in:'.$allowed, //list of supported languages of your application.
        ];

        return Validator::make($request->all(), $rules)->passes();
    }

    /**
     * @param $location
     */
    public function setLocation($request)
    {
//        dd(auth()->user()->locations()->toArray());
        if($this->allowedLocation($request))
        {
            Session::put('location', $request->location);
        }else{
//            Session::put('location', auth()->user()->locations()->toArray());
        }
    }

    /**
     * @param $request
     */
    public function locationSwitch($request)
    {
        $this->setLocation($request);
    }
}
