<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $table = 'position';  // pastikan tabelnya benar
    protected $fillable = ['halte_name', 'latitude', 'longitude', 'route'];
}
