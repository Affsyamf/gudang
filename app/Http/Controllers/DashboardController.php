<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Supplier;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
     public function index()
    {
        // Menghitung jumlah total barang dan supplier
        $jumlahBarang = Barang::count();
        $jumlahSupplier = Supplier::count();

        // Mengirim data ke view
        return view('dashboard', [
            'jumlahBarang' => $jumlahBarang,
            'jumlahSupplier' => $jumlahSupplier,
        ]);
    }
}
