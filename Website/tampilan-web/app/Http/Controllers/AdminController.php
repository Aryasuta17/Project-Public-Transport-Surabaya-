<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        // 1. Distribusi Jumlah Keterlambatan
        $keterlambatanDistribusi = DB::table('fact_pengemudi')
            ->select('Keterlambatan', DB::raw('COUNT(*) as jumlah'))
            ->groupBy('Keterlambatan')
            ->get();

        // 2. Jumlah Pelanggan per Bulan
        $pelangganPerBulan = DB::table('fact_pelanggan')
            ->select(DB::raw('bulan as bulan'), DB::raw('COUNT(user_id) as jumlah_pelanggan'))
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        // 3. Proporsi Pendapatan per Rute
        $totalPendapatanPerRute = DB::table('fact_pendapatan')
            ->select('rute_awal', DB::raw('SUM(Pendapatan) as total_pendapatan'))
            ->groupBy('rute_awal')
            ->get();

        // 4. Jumlah Pelanggan per Rute
        $pelangganPerRute = DB::table('fact_pendapatan')
            ->select('route_name', DB::raw('COUNT(user_id) as jumlah_pelanggan'))
            ->groupBy('route_name')
            ->get();

        // 5. Pendapatan per Bulan
        $bulanTerpilih = $request->input('bulan'); // Input bulan dari dropdown
        $pendapatanBulanan = DB::table('fact_pendapatan')
            ->join('pendapatan', 'fact_pendapatan.id_pendapatan', '=', 'pendapatan.id_pendapatan')
            ->select(DB::raw('DATE_FORMAT(pendapatan.tanggal, "%Y-%m") as bulan'), DB::raw('SUM(fact_pendapatan.Pendapatan) as total_pendapatan'))
            ->groupBy(DB::raw('DATE_FORMAT(pendapatan.tanggal, "%Y-%m")'))
            ->orderBy(DB::raw('DATE_FORMAT(pendapatan.tanggal, "%Y-%m")'))
            ->get();

        // 6. Pendapatan Harian untuk Bulan Tertentu
        $pendapatanHarian = null;
        if ($bulanTerpilih) {
            $pendapatanHarian = DB::table('fact_pendapatan')
                ->join('pendapatan', 'fact_pendapatan.id_pendapatan', '=', 'pendapatan.id_pendapatan')
                ->select(DB::raw('DATE(pendapatan.tanggal) as tanggal'), DB::raw('SUM(fact_pendapatan.Pendapatan) as total_pendapatan'))
                ->where(DB::raw('DATE_FORMAT(pendapatan.tanggal, "%Y-%m")'), $bulanTerpilih)
                ->groupBy(DB::raw('DATE(pendapatan.tanggal)'))
                ->orderBy(DB::raw('DATE(pendapatan.tanggal)'))
                ->get();
        }

        // Kirim data ke view
        return view('admin.dashboard', [
            'keterlambatanLabels' => $keterlambatanDistribusi->pluck('Keterlambatan'),
            'keterlambatanData' => $keterlambatanDistribusi->pluck('jumlah'),
            'pelangganBulanLabels' => $pelangganPerBulan->pluck('bulan'),
            'pelangganBulanData' => $pelangganPerBulan->pluck('jumlah_pelanggan'),
            'pendapatanRuteBarLabels' => $totalPendapatanPerRute->pluck('rute_awal'),
            'pendapatanRuteBarData' => $totalPendapatanPerRute->pluck('total_pendapatan'),
            'pelangganRuteLabels' => $pelangganPerRute->pluck('route_name'),
            'pelangganRuteData' => $pelangganPerRute->pluck('jumlah_pelanggan'),
            'bulanLabels' => $pendapatanBulanan->pluck('bulan'),
            'bulanData' => $pendapatanBulanan->pluck('total_pendapatan'),
            'bulanTerpilih' => $bulanTerpilih,
            'harianLabels' => $pendapatanHarian ? $pendapatanHarian->pluck('tanggal') : [],
            'harianData' => $pendapatanHarian ? $pendapatanHarian->pluck('total_pendapatan') : [],
        ]);
    }

    public function news()
    {
        return view('admin.news');
    }

    public function buses()
    {
        return view('admin.buses');
    }

    public function profile()
    {
        return view('admin.profile');
    }
}
