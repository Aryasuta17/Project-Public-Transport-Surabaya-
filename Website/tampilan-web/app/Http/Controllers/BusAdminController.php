<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;

class BusAdminController extends Controller
{
    public function index()
    {
        $buses = Bus::all();
        return view('admin.buses.index', compact('buses'));
    }

    public function create()
    {
        return view('admin.buses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'bus_number' => 'required',
            'driver' => 'required',
            'status' => 'required|in:active,inactive'
        ]);

        Bus::create($request->all());

        return redirect()->route('admin.buses.index')
            ->with('success', 'Bus created successfully.');
    }

    public function edit($id)
    {
        $bus = Bus::find($id);
        return view('admin.buses.edit', compact('bus'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'bus_number' => 'required',
            'driver' => 'required',
            'status' => 'required|in:active,inactive'
        ]);

        $bus = Bus::find($id);
        $bus->update($request->all());

        return redirect()->route('admin.buses.index')
            ->with('success', 'Bus updated successfully.');
    }

    public function destroy($id)
    {
        $bus = Bus::find($id);
        $bus->delete();

        return redirect()->route('admin.buses.index')
            ->with('success', 'Bus deleted successfully.');
    }
}
