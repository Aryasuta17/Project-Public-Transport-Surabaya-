<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $table = 'routes';

    public function schedule()
    {
        return $this->hasMany(Schedule::class);
    }

    public function stops()
    {
        return $this->hasMany(RouteStop::class);
    }
}
