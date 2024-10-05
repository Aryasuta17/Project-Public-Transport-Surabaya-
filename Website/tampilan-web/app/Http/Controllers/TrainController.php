<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrainController extends Controller
{
    public function ruteKereta()
    {
        $stations = [
            1 => "Stasiun Gubeng",
            2 => "Stasiun Pasar Turi",
            3 => "Stasiun Wonokromo",
            4 => "Stasiun Waru",
             5 => "Stasiun Sidoarjo",
             6 => "Stasiun Mojokerto",
        ];

        return view('rute_kereta', compact('stations'));
    }

    public function detailRuteKereta($start, $end)
    {
        $stations = $this->getStations();
        $routes = $this->getTrainRoutes();

        $validRoute = [];

        foreach ($routes as $route) {
            $startKey = array_search($stations[$start], array_column($route['stations'], 'name'));
            $endKey = array_search($stations[$end], array_column($route['stations'], 'name'));

            if ($startKey !== false && $endKey !== false && $startKey < $endKey) {
                $validRoute = $route;
                break;
            }
        }

        return view('detail_rute_kereta', compact('start', 'end', 'validRoute', 'stations'));
    }

    private function getStations()
    {
        return [
            1 => "Stasiun Gubeng",
            2 => "Stasiun Pasar Turi",
            3 => "Stasiun Wonokromo",
            4 => "Stasiun Waru",
            5 => "Stasiun Sidoarjo",
            6 => "Stasiun Mojokerto",
        ];
    }

    private function getTrainRoutes()
    {
        return [
            [
                'route' => 'Rute Kereta 1',
                'stations' => [
                    ['name' => 'Stasiun Gubeng', 'lat' => -7.2654, 'lng' => 112.7518],
                    ['name' => 'Stasiun Pasar Turi', 'lat' => -7.2485, 'lng' => 112.7266],
                    ['name' => 'Stasiun Wonokromo', 'lat' => -7.3210, 'lng' => 112.7371]
                ]
            ],
            [
                'route' => 'Rute Kereta 2',
                'stations' => [
                    ['name' => 'Stasiun Gubeng', 'lat' => -7.2654, 'lng' => 112.7518],
                    ['name' => 'Stasiun Waru', 'lat' => -7.3449, 'lng' => 112.7579],
                    ['name' => 'Stasiun Sidoarjo', 'lat' => -7.4538, 'lng' => 112.7178]
                ]
            ]
        ];
    }
}
