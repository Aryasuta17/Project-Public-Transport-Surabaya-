<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FactPelanggan extends Model
{
    protected $table = 'fact_pelanggan';
    protected $fillable = ['rute_awal', 'name'];
}
