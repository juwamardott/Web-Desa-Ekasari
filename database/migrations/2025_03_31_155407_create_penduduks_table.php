<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    //  

    
    public function up(): void
{
    Schema::create('penduduks', function (Blueprint $table) {
        $table->id();
        $table->string('image')->nullable();
        $table->bigInteger('no_kk');
        $table->bigInteger('nik');
        $table->string('nama');
        $table->string('nama_ayah');
        $table->string('nama_ibu');
        $table->bigInteger('nik_ayah');
        $table->bigInteger('nik_ibu');
        $table->string('alamat');
        $table->string('banjar');
        $table->string('pendidikan');
        $table->bigInteger('umur');
        $table->string('kawin');
        $table->string('hubungan_keluarga');
        $table->string('jenis_kelamin');
        $table->string('agama');
        $table->string('status_penduduk');
        $table->bigInteger('akta_kelahiran');
        $table->string('ttl');  // Perbaikan disini
        $table->string('pendidikan_sedang_ditempuh');
        $table->string('pekerjaan');
        $table->string('warga_negara');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penduduks');
    }
};