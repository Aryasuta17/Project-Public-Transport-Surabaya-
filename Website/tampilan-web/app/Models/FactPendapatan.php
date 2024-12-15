<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FactPendapatan extends Model
{
    protected $table = 'fact_pendapatan';
    protected $fillable = ['id_pendapatan', 'user_id', 'rute_awal', 'rute_akhir', 'bulan', 'Pendapatan'];
}
