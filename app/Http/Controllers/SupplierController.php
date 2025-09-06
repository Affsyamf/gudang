<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::latest()->paginate(10); 
        return view('suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_supplier' => 'required| string| max:255',
            'alamat' => 'required|string',
            'telepon' => 'required|string|max:20',
            'email' => 'required|email|unique:suppliers,email',
        ]);

        supplier::create($request->all());
        return redirect()->route('suppliers.index')
                         ->with('success', 'Supplier created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        return view('suppliers.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
         $request->validate([
            'nama_supplier' => 'required|string|max:255',
            'alamat' => 'required|string',
            'telepon' => 'required|string|max:20',
            // Pastikan email unik, kecuali untuk data supplier ini sendiri
            'email' => 'required|email|unique:suppliers,email,' . $supplier->id, 
        ]);

        $supplier->update($request->all());

        return redirect()->route('suppliers.index')
                         ->with('success', 'Data supplier berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
         $supplier->delete();

        return redirect()->route('suppliers.index')
                         ->with('success', 'Supplier berhasil dihapus.');
    }
}
