<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BusController extends Controller
{
    // Display the search page
    public function search()
    {
        $positions = DB::table('position')->get();
        return view('bus.search', compact('positions'));
    }

    // Handle the route search logic
    public function searchRoute(Request $request)
    {
        $startPoint = $request->input('startPoint');
        $endPoint = $request->input('endPoint');

        // Fetch the routes based on start and end points
        $results = DB::table('route_stop as start_stop')
            ->join('routes', 'start_stop.route_id', '=', 'routes.id')
            ->join('schedules', 'routes.id', '=', 'schedules.route_id')
            ->join('buses', 'schedules.bus_id', '=', 'buses.id')
            ->join('position as start_pos', 'start_stop.stop_id', '=', 'start_pos.id')
            ->join('route_stop as end_stop', 'start_stop.route_id', '=', 'end_stop.route_id')
            ->join('position as end_pos', 'end_stop.stop_id', '=', 'end_pos.id')
            ->select(
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
            ->get();

        // Calculate the travel time and estimated arrival
        foreach ($results as $result) {
            $travelTimeInMinutes = $result->stops_passed * 7.5;
            $result->travel_time = $travelTimeInMinutes;

            $departureTime = Carbon::createFromFormat('H:i:s', $result->departure_time);
            $adjustedDepartureTime = $departureTime->copy()->addMinutes($result->stops_passed * 7.5);
            $result->adjusted_departure_time = $adjustedDepartureTime->format('H:i:s');

            $estimatedArrivalTime = $adjustedDepartureTime->copy()->addMinutes($travelTimeInMinutes);
            $result->estimated_arrival_time = $estimatedArrivalTime->format('H:i:s');
        }

        // Return search results and position data to the view
        $positions = DB::table('position')->get();
        return view('bus.search', compact('results', 'positions', 'startPoint', 'endPoint'));
    }
}
