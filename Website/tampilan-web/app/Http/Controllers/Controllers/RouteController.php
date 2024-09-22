<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RouteController extends Controller
{
    // Fungsi untuk menampilkan halaman Rute Bus
    public function showBusRoutes()
    {
        $busStops = [
            ['id' => 1, 'name' => 'Terminal Purabaya', 'lat' => -7.3407, 'lng' => 112.7266],
            // Tambahkan data titik pemberhentian bus lainnya (total 20 titik)
            // ...
        ];

        return view('rute_bus', ['busStops' => $busStops]);
    }

    // Fungsi untuk menampilkan halaman Rute Kereta
    public function showTrainRoutes()
    {
        $trainStations = [
            ['id' => 1, 'name' => 'Stasiun Gubeng', 'lat' => -7.2654, 'lng' => 112.7518],
            // Tambahkan data stasiun kereta lainnya
            // ...
        ];

        return view('rute_kereta', ['trainStations' => $trainStations]);
    }

    // Fungsi untuk mendapatkan rute dari OpenRouteService
    public function getRoute(Request $request)
    {
        $apiKey = env('OPENROUTESERVICE_API_KEY'); // Pastikan API Key disimpan di file .env

        $coordinates = $request->input('coordinates');

        $response = Http::withHeaders([
            'Authorization' => $apiKey,
            'Accept' => 'application/json, application/geo+json, application/gpx+xml, img/png; charset=utf-8',
        ])->post('https://api.openrouteservice.org/v2/directions/driving-car', [
            'coordinates' => $coordinates,
            'format' => 'geojson',
        ]);

        return $response->json();
    }
}
