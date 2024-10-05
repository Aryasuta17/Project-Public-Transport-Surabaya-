<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BusController extends Controller
{
    // Fungsi untuk menampilkan halaman rute bus
    public function index()
    {
        return view('rute_bus');
    }

    // Fungsi untuk menampilkan detail rute bus berdasarkan ID
    public function show($id)
    {
        // Contoh data untuk rute bus, harga, waktu, dan koordinat
        $busRoutes = [
            'A273' => [
                'busCode' => 'A273',
                'departureTime' => '07:15',
                'estimatedTime' => '30',
                'price' => '5000',
                'route' => [
                    ['lat' => -7.2575, 'lng' => 112.7521],
                    ['lat' => -7.2675, 'lng' => 112.7621],
                    ['lat' => -7.2775, 'lng' => 112.7721],
                ]
            ],
            'B354' => [
                'busCode' => 'B354',
                'departureTime' => '08:30',
                'estimatedTime' => '40',
                'price' => '6000',
                'route' => [
                    ['lat' => -7.2818, 'lng' => 112.7957],
                    ['lat' => -7.2884, 'lng' => 112.7333],
                    ['lat' => -7.2332, 'lng' => 112.7384],
                ]
            ],
            'D442' => [
                'busCode' => 'D442',
                'departureTime' => '09:45',
                'estimatedTime' => '45',
                'price' => '7000',
                'route' => [
                    ['lat' => -7.3493, 'lng' => 112.7708],
                    ['lat' => -7.2654, 'lng' => 112.7378],
                    ['lat' => -7.2818, 'lng' => 112.7957],
                ]
            ],
            // Tambahkan bus lainnya di sini
        ];

        // Memastikan busCode yang di-request ada di data
        if (!array_key_exists($id, $busRoutes)) {
            abort(404, 'Bus route not found');
        }

        // Ambil detail bus berdasarkan ID
        $busDetails = $busRoutes[$id];

        return view('detail_rute_bus', $busDetails);
    }
}
