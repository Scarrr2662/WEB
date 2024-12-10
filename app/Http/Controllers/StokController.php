<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use Illuminate\Http\Request;

class StokController extends Controller
{
    // Menampilkan semua data stok
    public function index()
    {
        $stok = Stok::all();
        return view('stok.index', compact('stok'));
    }

    // Menampilkan form untuk menambahkan data stok baru
    public function create()
    {
        return view('stok.create');
    }

    // Menyimpan data stok baru ke database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_barang' => 'required|integer',
            'nama_barang' => 'required|string|max:255',
            'jml_masuk' => 'nullable|integer',
            'jml_keluar' => 'nullable|integer',
            'total_barang' => 'nullable|integer',
        ]);

        Stok::create($validated);

        return redirect()->route('stok.index')->with('success', 'Data stok berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit data stok
    public function edit($id)
    {
        $stok = Stok::findOrFail($id);
        return view('stok.edit', compact('stok'));
    }

    // Mengupdate data stok di database
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_barang' => 'required|integer',
            'nama_barang' => 'required|string|max:255',
            'jml_masuk' => 'nullable|integer',
            'jml_keluar' => 'nullable|integer',
            'total_barang' => 'nullable|integer',
        ]);

        $stok = Stok::findOrFail($id);
        $stok->update($validated);

        return redirect()->route('stok.index')->with('success', 'Data stok berhasil diperbarui.');
    }

    // Menghapus data stok
    public function destroy($id)
    {
        $stok = Stok::findOrFail($id);
        $stok->delete();

        return redirect()->route('stok.index')->with('success', 'Data stok berhasil dihapus.');
    }
}
