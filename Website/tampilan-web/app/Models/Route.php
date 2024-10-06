<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    // Jika nama tabel berbeda dari default (yaitu plural dari model), tambahkan nama tabel secara eksplisit:
    protected $table = 'routes'; 
}
