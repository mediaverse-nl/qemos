<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Whitelist extends Model
{
    use SoftDeletes;

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
