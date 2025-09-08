<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::orderBy('nama_barang', 'asc')->get();
        return view('barangs.index', compact('barangs'));
    }

    public function create()
    {
        return view('barangs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_barang' => 'required|string|unique:barangs,kode_barang|max:50',
            'nama_barang' => 'required|string|max:255',
            'satuan'      => 'required|string|alpha|max:50',
            'deskripsi'   => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('barangs', 'public');
            $validated['image'] = $path;
        }

        Barang::create($validated);

        return redirect()->route('barangs.index')
                         ->with('success', 'Barang baru berhasil ditambahkan.');
    }

    public function edit(Barang $barang)
    {
        return view('barangs.edit', compact('barang'));
    }

    public function update(Request $request, Barang $barang)
    {
        $validated = $request->validate([
            'kode_barang' => 'required|string|max:50|unique:barangs,kode_barang,' . $barang->id,
            'nama_barang' => 'required|string|max:255',
            'satuan'      => 'required|string|alpha|max:50',
            'deskripsi'   => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($barang->image) {
                Storage::disk('public')->delete($barang->image);
            }
            $path = $request->file('image')->store('barangs', 'public');
            $validated['image'] = $path;
        }

        $barang->update($validated);

        return redirect()->route('barangs.index')
                         ->with('success', 'Data barang berhasil diperbarui.');
    }

    public function destroy(Barang $barang)
    {
        if ($barang->image) {
           Storage::disk('public')->delete($barang->image);
        }
        $barang->delete();
        return redirect()->route('barangs.index')
                         ->with('success', 'Data barang berhasil dihapus.');
    }
}

