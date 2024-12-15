<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FactLogistics;

class FactLogisticsController extends Controller
{
    public function index()
    {
        $data = FactLogistics::all();
        return response()->json($data);
    }

    public function groupBy(Request $request, $column)
    {
        $columns = ['log_date', 'destination', 'log_type'];
        if (!in_array($column, $columns)) {
            return response()->json(['error' => 'Invalid column'], 400);
        }

        $data = FactLogistics::selectRaw("$column, COUNT(*) as total_logs")
            ->groupBy($column)
            ->orderBy($column)
            ->get();

        return response()->json($data);
    }

    public function filter(Request $request)
    {
        $filters = $request->only(['log_date', 'destination', 'log_type']);
        $query = FactLogistics::query();

        foreach ($filters as $column => $value) {
            $query->where($column, $value);
        }

        $data = $query->get();
        return response()->json($data);
    }
}
