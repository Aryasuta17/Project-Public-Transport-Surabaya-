<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $table = 'buses';

    // Tambahkan kolom yang bisa diisi secara massal
    protected $fillable = ['bus_number', 'driver', 'status'];

    public function schedule()
    {
        return $this->hasMany(Schedule::class);
    }
}
