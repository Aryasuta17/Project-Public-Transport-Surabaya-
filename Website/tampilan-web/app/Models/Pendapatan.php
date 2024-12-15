<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendapatan extends Model
{
    use HasFactory;

    protected $table = 'pendapatan'; // Nama tabel
    protected $primaryKey = 'id_pendapatan'; // Primary key tabel

    protected $fillable = [
        'user_id',
        'rute_awal',
        'rute_akhir',
        'jam_keberangkatan',
        'tanggal',
        'pendapatan',
    ];
}
