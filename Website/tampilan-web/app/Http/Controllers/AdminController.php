<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function olapDashboard()
    {
        // 1. Pendapatan per bulan
        $pendapatanBulan = DB::table('fact_pendapatan')
            ->selectRaw('bulan, SUM(Pendapatan) as totalPendapatan')
            ->groupBy('bulan')
            ->orderBy('bulan', 'asc')
            ->get();
        $pendapatanBulanLabels = $pendapatanBulan->pluck('bulan')->toArray();
        $pendapatanBulanData = $pendapatanBulan->pluck('totalPendapatan')->toArray();

        // 2. Jumlah pelanggan per rute
        $pelangganRute = DB::table('fact_pelanggan')
            ->selectRaw('rute_awal, COUNT(*) as totalPelanggan')
            ->groupBy('rute_awal')
            ->orderBy('totalPelanggan', 'desc')
            ->get();
        $ruteLabels = $pelangganRute->pluck('rute_awal')->toArray();
        $rutePelangganData = $pelangganRute->pluck('totalPelanggan')->toArray();

        // 3. Jumlah pengemudi per bus
        $pengemudiBus = DB::table('fact_pengemudi')
            ->selectRaw('bus_number, COUNT(*) as totalPengemudi')
            ->groupBy('bus_number')
            ->orderByDesc('totalPengemudi')
            ->get();
        $busLabels = $pengemudiBus->pluck('bus_number')->toArray();
        $busPengemudiData = $pengemudiBus->pluck('totalPengemudi')->toArray();

        // 4. Distribusi keterlambatan
        $keterlambatan = DB::table('fact_pengemudi')
            ->selectRaw('Keterlambatan, COUNT(*) as total')
            ->groupBy('Keterlambatan')
            ->get();
        $keterlambatanLabels = $keterlambatan->pluck('Keterlambatan')->toArray();
        $keterlambatanData = $keterlambatan->pluck('total')->toArray();

        return view('admin.olap-dashboard', compact(
            'pendapatanBulanLabels', 'pendapatanBulanData',
            'ruteLabels', 'rutePelangganData',
            'busLabels', 'busPengemudiData',
            'keterlambatanLabels', 'keterlambatanData'
        ));
    }
}
