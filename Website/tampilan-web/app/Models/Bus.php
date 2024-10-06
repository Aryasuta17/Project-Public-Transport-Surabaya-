<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $table = 'buses';

    public function schedule()
    {
        return $this->hasMany(Schedule::class);
    }
}
