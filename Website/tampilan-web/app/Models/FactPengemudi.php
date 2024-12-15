<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactPengemudi extends Model
{
    use HasFactory;
    protected $table = 'fact_pengemudi';
    protected $fillable = ['arrival_time', 'employee_number', 'phone', 'bus_number', 'driver', 'Keterlambatan'];
}
