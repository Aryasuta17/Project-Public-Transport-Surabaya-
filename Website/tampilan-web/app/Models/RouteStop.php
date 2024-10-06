<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RouteStop extends Model
{
    protected $table = 'route_stop';

    public function route()
    {
        return $this->belongsTo(Route::class, 'route_id');
    }
}
