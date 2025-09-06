<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Supplier;
use App\Models\Transaksi; // <-- Tambahkan ini
use Carbon\Carbon;  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
     public function index()
    {
        // --- DATA UNTUK KARTU STATISTIK ---
        $totalBarang = Barang::count();
        $totalSupplier = Supplier::count();
        $barangMasukBulanIni = Transaksi::where('jenis', 'masuk')->whereMonth('tanggal_transaksi', Carbon::now()->month)->sum('jumlah');
        $barangKeluarBulanIni = Transaksi::where('jenis', 'keluar')->whereMonth('tanggal_transaksi', Carbon::now()->month)->sum('jumlah');

        // --- LOGIKA BARU UNTUK GRAFIK TRANSAKSI ---
        $tanggalMulai = Carbon::now()->subDays(29)->startOfDay();
        $tanggalSelesai = Carbon::now()->endOfDay();

         // 1. Ambil data transaksi masuk dan keluar
        $barangMasuk = Transaksi::where('jenis', 'masuk')
            ->whereBetween('tanggal_transaksi', [$tanggalMulai, $tanggalSelesai])
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get([
                DB::raw('DATE(tanggal_transaksi) as date'),
                DB::raw('SUM(jumlah) as total')
            ])
            ->pluck('total', 'date');

        $barangKeluar = Transaksi::where('jenis', 'keluar')
            ->whereBetween('tanggal_transaksi', [$tanggalMulai, $tanggalSelesai])
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get([
                DB::raw('DATE(tanggal_transaksi) as date'),
                DB::raw('SUM(jumlah) as total')
            ])
            ->pluck('total', 'date');

         // 2. Siapkan rentang tanggal selama 30 hari
        $dates = collect();
        for ($i = 0; $i < 30; $i++) {
            $date = $tanggalMulai->copy()->addDays($i);
            $dates->put($date->format('Y-m-d'), 0);
        }

         // 3. Gabungkan data transaksi dengan rentang tanggal
        $dataMasuk = $dates->merge($barangMasuk);
        $dataKeluar = $dates->merge($barangKeluar);

         
        // 4. Format data untuk ApexCharts
        $chartData = [
            'categories' => $dataMasuk->keys()->map(function($date) {
                return Carbon::parse($date)->format('d M');
            })->toArray(),
            'series' => [
                [
                    'name' => 'Barang Masuk',
                    'data' => $dataMasuk->values()->toArray(),
                ],
                [
                    'name' => 'Barang Keluar',
                    'data' => $dataKeluar->values()->toArray(),
                ],
            ]
        ];

        return view('dashboard', [
            'totalBarang' => $totalBarang,
            'totalSupplier' => $totalSupplier,
            'barangMasukBulanIni' => $barangMasukBulanIni,
            'barangKeluarBulanIni' => $barangKeluarBulanIni,
            'chartData' => json_encode($chartData)
        ]);
    }
}
