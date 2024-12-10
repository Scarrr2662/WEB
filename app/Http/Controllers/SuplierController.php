<?php


namespace App\Http\Controllers;


use App\Models\Supplier;
use Illuminate\Http\Request;


class SuplierController extends Controller {
   //Menampilkan semua data suplier
   public function index()
   {
       $supliers = Supplier::all();
       return view('suplier.index', compact('supliers'));
   }

   //Menampilkan form untuk membuat suplier baru
   public function create()
   {
       return view('suplier.create');
   }


   // Menyimpan data Supplier ke database
   public function store(Request $request)
   {
       $validated = $request->validate([
           'nama_supplier' => 'required|string|max:255',
           'alamat_supplier' => 'nullable|string',
           'telepon_supplier' => 'nullable|string|max:15',
       ]);

       
       Supplier::create($validated);


       return redirect()->route('suplier.index')->with('success', 'Supplier berhasil ditambahkan.');
   }


   // Menghapus data Supplier dari database
   public function destroy($id)
   {
       $supplier = Supplier::findOrFail($id);
   
       // Jika ada file yang terkait, hapus file tersebut
       if ($supplier->file_path && file_exists(storage_path('app/' . $supplier->file_path))) {
           unlink(storage_path('app/' . $supplier->file_path));
       }
   
       $supplier->delete();
   
       return redirect()->route('suplier.index')->with('success', 'Supplier deleted successfully');
   }
   

   public function edit($id)
   {
       $supplier = Supplier::findOrFail($id);
       return view('suplier.edit', compact('supplier'));
   }
   
   public function update(Request $request, $id)
   {
       $validated = $request->validate([
           'nama_supplier' => 'required|string|max:255',
           'alamat_supplier' => 'nullable|string',
           'telepon_supplier' => 'nullable|string|max:15',
       ]);
   
       $supplier = Supplier::findOrFail($id);
       $supplier->update($validated);
   
       return redirect()->route('suplier.index')->with('success', 'Supplier updated successfully');
   }
}   
