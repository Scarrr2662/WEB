<?php

namespace App\Http\Controllers;

use App\Models\PinjamBarang;
use Illuminate\Http\Request;

class PinjamBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pinjam_barang = PinjamBarang::paginate(10); // Menampilkan 10 data per halaman
        return view('pinjam_barang.index', compact('pinjam_barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pinjam_barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_pinjam' => 'required|integer',
            'peminjam' => 'required|string|max:255',
            'tgl_pinjam' => 'required|date',
            'id_barang' => 'required|integer',
            'nama_barang' => 'required|string|max:255',
            'jml_barang' => 'required|integer',
            'tgl_kembali' => 'required|date',
            'kondisi' => 'required|string|max:255',
        ]);

        PinjamBarang::create($request->all());

        return redirect()->route('pinjam_barang.index')->with('success', 'Data peminjaman berhasil disimpan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pinjam_barang = PinjamBarang::findOrFail($id);

        return view('pinjam_barang.edit', compact('pinjam_barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pinjam' => 'required|integer',
            'peminjam' => 'required|string|max:255',
            'tgl_pinjam' => 'required|date',
            'id_barang' => 'required|integer',
            'nama_barang' => 'required|string|max:255',
            'jml_barang' => 'required|integer',
            'tgl_kembali' => 'required|date',
            'kondisi' => 'required|string|max:255',
        ]);

        $pinjam_barang = PinjamBarang::findOrFail($id);
        $pinjam_barang->update($request->all());

        return redirect()->route('pinjam_barang.index')
                         ->with('success', 'Data peminjaman berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pinjam_barang = PinjamBarang::findOrFail($id);
        $pinjam_barang->delete();

        return redirect()->route('pinjam_barang.index')
                         ->with('success', 'Data peminjaman berhasil dihapus.');
    }
}
