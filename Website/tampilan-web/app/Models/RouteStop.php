<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RouteStop extends Model
{
    protected $table = 'route_stop'; // Nama tabel

    public function route()
    {
        return $this->belongsTo(Route::class, 'route_id');
    }

    public function stop()
    {
        return $this->belongsTo(Position::class, 'stop_id');
    }
}
