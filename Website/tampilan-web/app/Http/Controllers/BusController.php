<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BusController extends Controller
{
    public function search()
    {
        // Only get positions within Surabaya
        $positions = DB::table('position')
            ->whereBetween('latitude', [-7.3506, -7.1506])  // Surabaya latitude bounds
            ->whereBetween('longitude', [112.6079, 112.8079])  // Surabaya longitude bounds
            ->get();
        
        return view('bus.search', compact('positions'));
    }

    public function searchRoute(Request $request)
    {
        $startPoint = $request->input('startPoint');
        $endPoint = $request->input('endPoint');
        
        $results = collect([]);
        
        if ($startPoint && $endPoint) {
            $results = DB::table('route_stop as start_stop')
                ->join('routes', 'start_stop.route_id', '=', 'routes.id')
                ->join('schedules', 'routes.id', '=', 'schedules.route_id')
                ->join('buses', 'schedules.bus_id', '=', 'buses.id')
                ->join('position as start_pos', 'start_stop.stop_id', '=', 'start_pos.id')
                ->join('route_stop as end_stop', 'start_stop.route_id', '=', 'end_stop.route_id')
                ->join('position as end_pos', 'end_stop.stop_id', '=', 'end_pos.id')
                ->select(
                    'routes.id as route_id',
                    'schedules.id as schedule_id',
                    'routes.route_name',
                    'buses.bus_number',
                    'buses.driver',
                    'schedules.departure_time',
                    'start_pos.halte_name as start_halte',
                    'end_pos.halte_name as end_halte',
                    DB::raw('(end_stop.stop_order - start_stop.stop_order) as stops_passed')
                )
                ->where('start_pos.id', '=', $startPoint)
                ->where('end_pos.id', '=', $endPoint)
                ->where('start_stop.stop_order', '<', DB::raw('end_stop.stop_order'))
                // Ensure only routes within Surabaya
                ->whereExists(function ($query) {
                    $query->select(DB::raw(1))
                        ->from('position')
                        ->whereColumn('position.id', 'start_pos.id')
                        ->whereBetween('latitude', [-7.3506, -7.1506])
                        ->whereBetween('longitude', [112.6079, 112.8079]);
                })
                ->get();

            foreach ($results as $result) {
                $travelTimeInMinutes = $result->stops_passed * 5; // Adjusted for Surabaya traffic
                $result->travel_time = $travelTimeInMinutes;
                
                $departureTime = Carbon::createFromFormat('H:i:s', $result->departure_time);
                $result->adjusted_departure_time = $departureTime->format('H:i');
                
                $estimatedArrivalTime = $departureTime->copy()->addMinutes($travelTimeInMinutes);
                $result->estimated_arrival_time = $estimatedArrivalTime->format('H:i');
            }
        }
        
        $positions = DB::table('position')
            ->whereBetween('latitude', [-7.3506, -7.1506])
            ->whereBetween('longitude', [112.6079, 112.8079])
            ->get();
            
        return view('bus.search', compact('results', 'positions', 'startPoint', 'endPoint'));
    }

    public function showDetails($routeId, $scheduleId)
    {
        $busDetails = DB::table('routes')
            ->join('schedules', 'routes.id', '=', 'schedules.route_id')
            ->join('buses', 'schedules.bus_id', '=', 'buses.id')
            ->where('routes.id', $routeId)
            ->where('schedules.id', $scheduleId)
            ->select('routes.route_name', 'buses.bus_number', 'buses.driver', 'schedules.departure_time')
            ->first();

        $stops = DB::table('route_stop')
            ->join('position', 'route_stop.stop_id', '=', 'position.id')
            ->where('route_stop.route_id', $routeId)
            // Menggunakan array untuk whereBetween
            ->whereBetween('position.latitude', [-7.3506, -7.1506])
            ->whereBetween('position.longitude', [112.6079, 112.8079])
            ->orderBy('route_stop.stop_order')
            ->select('position.halte_name', 'position.latitude', 'position.longitude')
            ->get();

        return view('bus.details', compact('busDetails', 'stops'));
    }
}
