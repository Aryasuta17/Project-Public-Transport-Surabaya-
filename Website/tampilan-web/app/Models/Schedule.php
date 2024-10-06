<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedules'; // Nama tabel

    public function bus()
    {
        return $this->belongsTo(Bus::class, 'bus_id');
    }

    public function route()
    {
        return $this->belongsTo(Route::class, 'route_id');
    }
}
