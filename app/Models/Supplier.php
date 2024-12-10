<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_supplier';
    protected $table = 'Supplier';
    protected $fillable =['id_supplier', 'nama_supplier', 'alamat_supplier', 'telepon_supplier'];
}