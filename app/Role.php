<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';

    protected $fillable = ['role'];

    public static function UserRoles(){
        return collect([
            'ober',
            'kok',
            'manager',
            'baas',
        ]);
    }

    public $timestamps = false;
}
