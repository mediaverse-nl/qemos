<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Whitelist extends Model
{
    protected $table = 'whitelist';

    protected $fillable = ['role', 'status'];

    public $timestamps = true;

    public static function status()
    {
        return collect([
            'offline',
            'online',
        ]);
    }

    public function location()
    {
        return $this->belongsTo('App\Location', 'location_id', 'id');
    }
}
