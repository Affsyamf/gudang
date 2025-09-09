<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Supplier;
use App\Models\Transaksi;
use App\Rules\StokCukup;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil kata kunci pencarian dari request
        $searchTerm = $request->input('search');

        // Mulai query dasar
        $transaksisQuery = Transaksi::with(['barang', 'supplier'])
            ->latest('tanggal_transaksi');

        // Jika ada kata kunci pencarian, tambahkan kondisi 'where'
        if ($searchTerm) {
            $transaksisQuery->where(function ($query) use ($searchTerm) {
                // Cari di nama barang (melalui relasi)
                $query->whereHas('barang', function ($q) use ($searchTerm) {
                    $q->where('nama_barang', 'ILIKE', "%{$searchTerm}%");
                })
                // ATAU cari di nama supplier (melalui relasi)
                ->orWhereHas('supplier', function ($q) use ($searchTerm) {
                    $q->where('nama_supplier', 'ILIKE', "%{$searchTerm}%");
                });
            });
        }
        
        // Lakukan pagination pada hasil query (baik yang difilter maupun tidak)
        $transaksis = $transaksisQuery->paginate(10);

         if ($request->ajax()) {
            return view('transaksis.transaksi_table', compact('transaksis'))->render();
        }

        return view('transaksis.index', compact('transaksis'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function createMasuk()
    {
        $barangs = Barang::orderBy('nama_barang')->get(['id', 'nama_barang' ]);
        $suppliers = Supplier::orderBy('nama_supplier')->get(['id', 'nama_supplier']);
        return view('transaksis.create_masuk', compact('barangs', 'suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeMasuk(Request $request)
    {
        $validated = $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal_transaksi' => 'required|date',
        ]);

        $validated['jenis'] = 'masuk';

        Transaksi::create($validated);

        return redirect()->route('transaksis.index')->with('success', 'Transaksi barang masuk berhasil dicatat.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createKeluar()
    {
        $barangs = Barang::all()->filter(function($barang) {
            return $barang->stok() > 0;
        })->map(function($barang) {
            return [
                'id' => $barang->id, 
                'nama_barang' => $barang->nama_barang . ' (Stok: ' . $barang->stok() . ')'
            ];
            })->values();
        $suppliers = Supplier::orderBy('nama_supplier')->get(['id', 'nama_supplier']);
        return view('transaksis.create_keluar', compact('barangs', 'suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeKeluar(Request $request)
    {
        $validated = $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'supplier_id' => 'nullable|exists:suppliers,id',
            'jumlah' => ['required', 'integer', 'min:1', new StokCukup($request->barang_id)],
            'tanggal_transaksi' => 'required|date',
        ]);
        
        $validated['jenis'] = 'keluar';

        Transaksi::create($validated);

        return redirect()->route('transaksis.index')->with('success', 'Transaksi barang keluar berhasil dicatat.');
    }

    // Menambahkan method cetak
    public function cetak(Request $request)
    {
        // Validasi input tanggal
        $validated = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $startDate = $validated['start_date'];
        $endDate = $validated['end_date'];

        // Ambil data transaksi dalam rentang tanggal yang dipilih
        $transaksis = Transaksi::with(['barang', 'supplier'])
            ->whereBetween('tanggal_transaksi', [$startDate, $endDate])
            ->latest('tanggal_transaksi')
            ->get(); // Gunakan get() karena kita mau semua data dalam rentang itu

        // Kirim data ke view cetak
        return view('transaksis.cetak', compact('transaksis', 'startDate', 'endDate'));
    }
}

