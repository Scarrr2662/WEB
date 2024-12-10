<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\Supplier;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    // Menampilkan semua data barang masuk
    public function index()
    {
        $barangMasuk = BarangMasuk::all(); // Mengambil semua data barang masuk tanpa relasi
        return view('barang_masuk.index', compact('barangMasuk'));
    }

    // Menampilkan form untuk membuat barang masuk baru
    public function create()
    {
        $suppliers = Supplier::all();
        return view('barang_masuk.create', compact('suppliers'));
    }
    

    // Menyimpan data barang masuk ke database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_barang' => 'required|integer',
            'nama_barang' => 'required|string|max:255',
            'tgl_masuk' => 'required|date',
            'jml_masuk' => 'required|integer|min:1',
            'id_supplier' => 'required|integer', // Pastikan id_supplier ada di tabel suppliers
        ]);

        // Menyimpan barang masuk tanpa relasi
        BarangMasuk::create([
            'id_barang' => $validated['id_barang'],
            'nama_barang' => $validated['nama_barang'],
            'tgl_masuk' => strtotime($validated['tgl_masuk']),
            'jml_masuk' => $validated['jml_masuk'],
            'id_supplier' => $validated['id_supplier'], // Simpan id_supplier tanpa relasi
        ]);

        return redirect()->route('barang_masuk.index')->with('success', 'Barang Masuk berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit barang masuk
    public function edit($id)
    {
        $barangMasuk = BarangMasuk::findOrFail($id);
        $supplier = Supplier::all(); // Mengambil data supplier untuk dropdown
        return view('barang_masuk.edit', compact('barangMasuk', 'supplier'));
    }

    // Mengupdate data barang masuk
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_barang' => 'required|integer',
            'nama_barang' => 'required|string|max:255',
            'tgl_masuk' => 'required|date',
            'jml_masuk' => 'required|integer|min:1',
            'id_supplier' => 'required|integer',
        ]);

        $barangMasuk = BarangMasuk::findOrFail($id);
        $barangMasuk->update([
            'id_barang' => $validated['id_barang'],
            'nama_barang' => $validated['nama_barang'],
            'tgl_masuk' => strtotime($validated['tgl_masuk']),
            'jml_masuk' => $validated['jml_masuk'],
            'id_supplier' => $validated['id_supplier'],
        ]);

        return redirect()->route('barang_masuk.index')->with('success', 'Barang Masuk berhasil diupdate.');
    }

    // Menghapus data barang masuk
    public function destroy($id)
    {
        $barangMasuk = BarangMasuk::findOrFail($id);
        $barangMasuk->delete();

        return redirect()->route('barang_masuk.index')->with('success', 'Barang Masuk berhasil dihapus.');
    }
}
