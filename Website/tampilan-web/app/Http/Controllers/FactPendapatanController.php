<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FactPendapatan extends Model
{
    protected $table = 'fact_pendapatan';
    protected $fillable = ['bulan', 'Pendapatan'];
}
