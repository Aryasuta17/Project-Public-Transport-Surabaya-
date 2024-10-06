<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $table = 'routes'; // Nama tabel

    // Hubungan antara route dan posisi
    public function startingPoint()
    {
        return $this->belongsTo(Position::class, 'starting_point');
    }

    public function endingPoint()
    {
        return $this->belongsTo(Position::class, 'ending_point');
    }
}
