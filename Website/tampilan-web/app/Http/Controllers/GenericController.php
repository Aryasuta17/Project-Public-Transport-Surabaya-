<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenericController extends Controller
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function index()
    {
        // Mengambil semua data dari tabel
        $data = $this->model::all();
        return response()->json($data);
    }

    public function groupBy(Request $request, $column)
    {
        // Validasi kolom
        $columns = $this->model::getFillable();
        if (!in_array($column, $columns)) {
            return response()->json(['error' => 'Invalid column'], 400);
        }

        // Grouping berdasarkan kolom tertentu
        $data = $this->model::selectRaw("$column, COUNT(*) as total")
            ->groupBy($column)
            ->get();

        return response()->json($data);
    }

    public function filter(Request $request)
    {
        // Ambil filter dari request
        $filters = $request->only($this->model::getFillable());
        $query = $this->model::query();

        // Terapkan filter
        foreach ($filters as $column => $value) {
            $query->where($column, $value);
        }

        $data = $query->get();
        return response()->json($data);
    }
}
