<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';

    protected $fillable = ['role'];

    public $timestamps = false;

    public function userRole()
    {
        return $this->hasMany('App\UserRole', 'role_id', 'id');
    }

    public static function UserRoles(){
        return collect([
            'support',
            'staff',
            'manager',
//            'baas',
        ]);
    }

}
