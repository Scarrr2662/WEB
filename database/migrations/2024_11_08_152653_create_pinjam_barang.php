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
        Schema::create('pinjam_barang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pinjam');
            $table->foreign('id_pinjam')->references('id')->on('pinjam_barang');
            $table->integer('peminjam');
            $table->date('tgl_pinjam');
            $table->unsignedBigInteger('id_barang');
            $table->string('nama_barang');
            $table->integer('jml_barang');
            $table->date('tgl_kembali');
            $table->integer('kondisi');
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
        Schema::dropIfExists('supplier');
    }
};
