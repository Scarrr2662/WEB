<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        // Retrieve all data from barang_keluar table and pass it to the view
        $barangKeluar = BarangKeluar::all();
        return view('barang_keluar.index', compact('barangKeluar'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('barang_keluar.create');
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required|integer',
            'nama_barang' => 'required|string|max:255',
            'tgl_keluar' => 'required|date',
            'jml_keluar' => 'required|integer',
            'lokasi' => 'required|string|max:255',
            'penerima' => 'required|string|max:255',
        ]);

        BarangKeluar::create([
            'id_barang' => $request->id_barang,
            'nama_barang' => $request->nama_barang,
            'tgl_keluar' => $request->tgl_keluar,
            'jml_keluar' => $request->jml_keluar,
            'lokasi' => $request->lokasi,
            'penerima' => $request->penerima,
        ]);

        return redirect()->route('barang_keluar.index')->with('success', 'Data barang keluar added successfully.');
    }

    // Show the form for editing the specified resource
    public function edit($id)
    {
        $barangKeluar = BarangKeluar::find($id);
        return view('barang_keluar.edit', compact('barangKeluar'));
    }
    

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_barang' => 'required|integer',
            'nama_barang' => 'required|string|max:255',
            'tgl_keluar' => 'required|date',
            'jml_keluar' => 'required|integer',
            'lokasi' => 'required|string|max:255',
            'penerima' => 'required|string|max:255',
        ]);

        $barang = BarangKeluar::findOrFail($id);
        $barang->update([
            'id_barang' => $request->id_barang,
            'nama_barang' => $request->nama_barang,
            'tgl_keluar' => $request->tgl_keluar,
            'jml_keluar' => $request->jml_keluar,
            'lokasi' => $request->lokasi,
            'penerima' => $request->penerima,
        ]);

        return redirect()->route('barang_keluar.index')->with('success', 'Data barang keluar updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $barang = BarangKeluar::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang_keluar.index')->with('success', 'Data barang keluar deleted successfully.');
    }
}
