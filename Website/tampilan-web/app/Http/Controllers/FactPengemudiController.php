<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FactPengemudiController extends Controller
{
    public function index()
    {
        // 1. Distribusi Jumlah Keterlambatan
        $keterlambatanDistribusi = DB::table('fact_pengemudi')
            ->select('Keterlambatan', DB::raw('COUNT(*) as jumlah'))
            ->groupBy('Keterlambatan')
            ->get();

         // 3. Jumlah Pelanggan per Bulan
         $pelangganPerBulan = DB::table('fact_pelanggan')
         ->select(DB::raw('bulan as bulan'), DB::raw('COUNT(user_id) as jumlah_pelanggan'))
         ->groupBy('bulan')
         ->orderBy('bulan')
         ->get();

        // 3. Proporsi Pendapatan per Rute (Bar Chart)
        $totalPendapatanPerRute = DB::table('fact_pendapatan')
            ->select('rute_awal', DB::raw('SUM(Pendapatan) as total_pendapatan'))
            ->groupBy('rute_awal')
            ->get();

        // Kirim data ke view
        return view('admin.dashboard', [
            'keterlambatanLabels' => $keterlambatanDistribusi->pluck('Keterlambatan'),
            'keterlambatanData' => $keterlambatanDistribusi->pluck('jumlah'),
            'pelangganBulanLabels' => $pelangganPerBulan->pluck('bulan'),
            'pelangganBulanData' => $pelangganPerBulan->pluck('jumlah_pelanggan'),
            'pendapatanRuteBarLabels' => $totalPendapatanPerRute->pluck('rute_awal'),
            'pendapatanRuteBarData' => $totalPendapatanPerRute->pluck('total_pendapatan'),
        ]);
    }
}
