<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Position;
use App\Models\Route;
use App\Models\RouteStop;
use App\Models\Schedule;
use App\Models\Bus;

class BusController extends Controller
{
    public function showSearchPage()
    {
        $positions = Position::all();
        return view('bus.search', ['positions' => $positions]);
    }

    public function searchRoute(Request $request)
    {
        $startPointId = $request->input('startPoint');
        $endPointId = $request->input('endPoint');

        // Cari rute yang mencakup titik awal dan akhir
        $routes = Route::whereHas('startingPoint', function ($query) use ($startPointId) {
            $query->where('id', $startPointId);
        })
        ->whereHas('endingPoint', function ($query) use ($endPointId) {
            $query->where('id', $endPointId);
        })
        ->first();

        if ($routes) {
            // Ambil jadwal bus untuk rute tersebut
            $schedules = Schedule::where('route_id', $routes->id)->get();

            if ($schedules->count() > 0) {
                $data = [];

                foreach ($schedules as $schedule) {
                    $bus = Bus::find($schedule->bus_id);
                    $routeStops = RouteStop::where('route_id', $routes->id)->get();
                    $totalStops = $routeStops->count();
                    
                    // Perhitungan jarak dan waktu tempuh
                    $distance = $this->calculateDistance($startPointId, $endPointId);
                    $totalMinutes = $distance * 4; // 4 menit per km
                    
                    // Hitung jam tiba (berdasarkan departure_time + waktu tempuh)
                    $arrivalTime = date('H:i', strtotime($schedule->departure_time) + ($totalMinutes * 60));

                    $data[] = [
                        'bus_number' => $bus->bus_number,
                        'driver' => $bus->driver_name,
                        'departure_time' => $schedule->departure_time,
                        'arrival_time' => $arrivalTime, // Waktu sampai
                        'stops_count' => $totalStops,
                        'distance' => $distance, // Jarak (km)
                    ];
                }

                return response()->json([
                    'success' => true,
                    'routes' => $data
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Tidak ada jadwal bus untuk rute ini.'
                ]);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Rute tidak ditemukan.'
            ]);
        }
    }

    // Fungsi untuk menghitung jarak antar halte
    public function calculateDistance($startPointId, $endPointId)
    {
        $start = Position::find($startPointId);
        $end = Position::find($endPointId);

        if ($start && $end) {
            $theta = $start->longitude - $end->longitude;
            $dist = sin(deg2rad($start->latitude)) * sin(deg2rad($end->latitude)) +  cos(deg2rad($start->latitude)) * cos(deg2rad($end->latitude)) * cos(deg2rad($theta));
            $dist = acos($dist);
            $dist = rad2deg($dist);
            $miles = $dist * 60 * 1.1515;
            $kilometers = $miles * 1.609344;

            return $kilometers;
        }

        return 0;
    }
}
