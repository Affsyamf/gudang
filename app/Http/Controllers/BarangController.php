<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $barangs = Barang::latest()->get();
       return view('barangs.index', ['barangs' => $barangs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barangs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
         $validatedData = $request->validate([
            'kode_barang' => 'required|unique:barangs|max:255',
            'nama_barang' => 'required|max:255',
            'satuan' => 'required|string|alpha|max:50',
            'deskripsi' => 'nullable|string',
        ]);

        // Simpan data ke database
        Barang::create($validatedData);

        // Redirect kembali ke halaman utama dengan pesan sukses
        return redirect()->route('barangs.index')
                         ->with('success', 'Barang baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        return view('barangs.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        $validatedData = $request->validate([
            // Pastikan kode barang unik, kecuali untuk dirinya sendiri
            'kode_barang' => ['required', 'max:255', Rule::unique('barangs')->ignore($barang->id)],
            'nama_barang' => 'required|max:255',
            'satuan' => 'required|string|alpha|max:50',
            'deskripsi' => 'nullable|string',
        ]);
        
        // Update data di database
        $barang->update($validatedData);

        // Redirect kembali ke halaman utama dengan pesan sukses
        return redirect()->route('barangs.index')
                         ->with('success', 'Data barang berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
         // Hapus data barang dari database
        $barang->delete();

        // Redirect kembali ke halaman utama dengan pesan sukses
        return redirect()->route('barangs.index')
                         ->with('success', 'Data barang berhasil dihapus!');
    }
}
