<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\RouteStop;
use App\Models\Route;
use Illuminate\Http\Request;

class BusController extends Controller
{
    public function showSearchPage()
    {
        // Ambil semua halte dari tabel positions
        $positions = Position::all();
        return view('bus.search', compact('positions'));
    }

    public function searchRoute(Request $request)
    {
        // Ambil titik awal dan akhir dari request
        $startId = $request->input('startPoint');
        $endId = $request->input('endPoint');

        // Ambil data halte start dan end dari tabel positions
        $start = Position::find($startId);
        $end = Position::find($endId);

        if (!$start || !$end) {
            return response()->json(['success' => false, 'message' => 'Halte tidak valid.'], 400);
        }

        // Cari rute yang melewati startPoint dan endPoint berdasarkan stop_order pada route_stop
        $startStops = RouteStop::where('stop_id', $startId)->get();
        $endStops = RouteStop::where('stop_id', $endId)->get();

        // Logika untuk memastikan rute yang benar ditemukan
        $validRoutes = collect();

        foreach ($startStops as $startStop) {
            foreach ($endStops as $endStop) {
                if ($startStop->route_id == $endStop->route_id && $startStop->stop_order < $endStop->stop_order) {
                    $validRoutes->push($startStop->route_id);
                }
            }
        }

        // Ambil rute yang valid berdasarkan route_id yang ditemukan
        $routes = Route::whereIn('id', $validRoutes)->get();

        if ($routes->isNotEmpty()) {
            // Menghitung jarak dan waktu tempuh
            $distance = $this->calculateDistance($start->latitude, $start->longitude, $end->latitude, $end->longitude);
            $time = $this->calculateTime($distance);

            // Ambil starting_point dan ending_point dari rute
            $route = $routes->first(); // Ambil rute pertama yang valid
            $startingPoint = $route->starting_point;
            $endingPoint = $route->ending_point;

            return response()->json([
                'success' => true,
                'route_description' => 'Rute dari ' . $startingPoint . ' ke ' . $endingPoint, // Gabungan starting dan ending
                'distance' => $distance,
                'time' => $time,
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Rute tidak ditemukan.']);
    }

    // Function untuk menghitung jarak
    private function calculateDistance($lat1, $lon1, $lat2, $lon2)
    {
        $earthRadius = 6371; // Radius bumi dalam kilometer
        $latDiff = deg2rad($lat2 - $lat1);
        $lonDiff = deg2rad($lon2 - $lon1);
        $a = sin($latDiff / 2) * sin($latDiff / 2) +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
            sin($lonDiff / 2) * sin($lonDiff / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        return $earthRadius * $c;
    }

    // Function untuk menghitung waktu tempuh (4 menit per km)
    private function calculateTime($distance)
    {
        return $distance * 4; // 4 menit per km
    }
}
