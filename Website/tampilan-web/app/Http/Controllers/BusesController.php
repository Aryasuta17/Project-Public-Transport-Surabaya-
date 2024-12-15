<?php

namespace App\Http\Controllers;

use App\Models\Buses;

class BusesController extends GenericController
{
    public function __construct()
    {
        parent::__construct(Buses::class);
    }
}
