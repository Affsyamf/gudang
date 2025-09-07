<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class HomeController extends Controller
{
      public function index()
    {
        // Ambil 8 barang terbaru untuk ditampilkan di galeri
        $barangs = Barang::latest()->take(8)->get();
        
        return view('welcome', compact('barangs'));
    }
}
