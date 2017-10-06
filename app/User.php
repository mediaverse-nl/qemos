<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function order()
    {
        return $this->hasMany('App\Order', 'user_id', 'id');
    }

    public function userLocation()
    {
        return $this->hasMany('App\UserLocation');
    }

    public function locations()
    {
        return $this->userLocation()->with('location')->get()->pluck('location.adres', 'location.id');
    }

    public function currentLocation()
    {
//       todo set default location if not selected
        session('location', $this->userLcation()->first()->location_id);

        return session('location', 'default');
    }

    public function checkRole($roles)
    {
//        $user = $this->role;
        $user = ['admin', 'manager', 'developer', 'staff', 'support'];

        foreach ($roles as $role)
        {
            if (in_array($role, $user)){
                return true;
            }
        }

        return false;
    }

}
