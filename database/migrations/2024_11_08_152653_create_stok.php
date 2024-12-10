<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stok', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_barang'); // ID barang (foreign key jika ada tabel barang)
            $table->string('nama_barang');
            $table->integer('jml_masuk')->default(0); // Jumlah barang masuk
            $table->integer('jml_keluar')->default(0); // Jumlah barang keluar
            $table->integer('total_barang')->default(0); // Total stok barang
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stok_barang');
    }
};
