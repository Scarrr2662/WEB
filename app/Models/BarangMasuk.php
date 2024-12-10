<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    // Tabel yang digunakan
    protected $table = 'barang_masuk';
    protected $primaryKey = 'id'; // Primary key field

    // Kolom yang dapat diisi
    protected $fillable = ['id_barang', 'nama_barang', 'tgl_masuk', 'jml_masuk', 'id_supplier'];

    // Relasi dengan tabel Supplier
}
