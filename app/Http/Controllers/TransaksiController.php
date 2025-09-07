<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;


class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index()
    {
        // Ambil semua transaksi, urutkan dari yang terbaru
        // Gunakan eager loading untuk efisiensi query
        $transaksis = Transaksi::with(['barang', 'supplier'])
                                ->orderBy('tanggal_transaksi', 'desc')
                                ->paginate(10); // Tampilkan 15 data per halaman

        return view('transaksis.index', compact('transaksis'));
    }


    // --- FUNGSI UNTUK BARANG MASUK ---
     public function createMasuk()
    {
        $barangs = Barang::orderBy('nama_barang')->get();
        $suppliers = Supplier::orderBy('nama_supplier')->get();
        return view('transaksis.create_masuk', compact('barangs', 'suppliers'));
    }

     public function storeMasuk(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal_transaksi' => 'required|date',
        ]);

        Transaksi::create([
            'barang_id' => $request->barang_id,
            'supplier_id' => $request->supplier_id,
            'jumlah' => $request->jumlah,
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'jenis' => 'masuk',
        ]);

        return redirect()->route('dashboard')->with('success', 'Transaksi barang masuk berhasil dicatat!');
    }

     // --- FUNGSI UNTUK BARANG KELUAR ---

    /**
     * Menampilkan form untuk mencatat barang keluar.
     */
    public function createKeluar()
    {
        // Kita hanya akan menampilkan barang yang memiliki stok > 0
        $barangs = Barang::orderBy('nama_barang')->get();
        $suppliers = Supplier::orderBy('nama_supplier')->get();
        return view('transaksis.create_keluar', compact('barangs', 'suppliers'));
    }

    // Menyimpan data transaksi barang keluar dengan validasi stok. //
    
    
    public function storeKeluar(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'supplier_id' => 'nullable|exists:suppliers,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal_transaksi' => 'required|date',
        ]);

        $barang = Barang::findOrFail($request->barang_id);

        // VALIDASI KRUSIAL: Cek apakah stok mencukupi
        if ($barang->stok_tersedia < $request->jumlah) {
            return back()->withInput()->withErrors(['jumlah' => 'Stok tidak mencukupi. Sisa stok: ' . $barang->stok_tersedia]);
        }

        Transaksi::create([
            'barang_id' => $request->barang_id,
            'supplier_id' =>  $request->supplier_id, // Barang keluar tidak butuh supplier
            'jumlah' => $request->jumlah,
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'jenis' => 'keluar',
        ]);

        return redirect()->route('dashboard')->with('success', 'Transaksi barang keluar berhasil dicatat!');
    }

    /**
     * Show the form for creating a new resource.
     */
    
}
