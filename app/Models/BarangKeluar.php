<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;

    protected $table = 'barang_keluar'; // Table name
    protected $primaryKey = 'id'; // Primary key field

    protected $fillable = [
        'id_barang',
        'nama_barang',
        'tgl_keluar',
        'jml_keluar',
        'lokasi',
        'penerima',
    ];

    public $timestamps = true; // Enabling timestamps (created_at, updated_at)
}
