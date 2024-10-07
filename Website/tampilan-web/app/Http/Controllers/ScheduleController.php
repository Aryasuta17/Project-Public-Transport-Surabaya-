<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Bus;
use App\Models\Route;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::with('bus', 'route')->get();
        return view('admin.schedules.index', compact('schedules'));
    }

    public function create()
    {
        $buses = Bus::all();
        $routes = Route::all();
        return view('admin.schedules.create', compact('buses', 'routes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bus_id' => 'required|exists:buses,id',
            'route_id' => 'required|exists:routes,id',
            'departure_time' => 'required|date_format:H:i:s',
        ]);

        Schedule::create($request->all());

        return redirect()->route('admin.schedules.index')->with('success', 'Schedule created successfully.');
    }

    public function edit($id)
    {
        $schedule = Schedule::findOrFail($id);
        $buses = Bus::all();
        $routes = Route::all();
        return view('admin.schedules.edit', compact('schedule', 'buses', 'routes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'bus_id' => 'required|exists:buses,id',
            'route_id' => 'required|exists:routes,id',
            'departure_time' => 'required|date_format:H:i:s',
        ]);

        $schedule = Schedule::findOrFail($id);
        $schedule->update($request->all());

        return redirect()->route('admin.schedules.index')->with('success', 'Schedule updated successfully.');
    }

    public function destroy($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();

        return redirect()->route('admin.schedules.index')->with('success', 'Schedule deleted successfully.');
    }
}
