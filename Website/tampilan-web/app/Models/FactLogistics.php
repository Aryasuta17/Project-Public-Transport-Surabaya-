<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FactLogistics extends Model
{
    protected $table = 'fact_logistics';
    protected $fillable = ['log_date', 'destination', 'log_type', 'log_count'];
}
