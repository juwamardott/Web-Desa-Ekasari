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
            $table->foreignId('banjar_id');
            $table->foreignId('pendidikan_id');
            $table->bigInteger('umur');
            $table->foreignId('kawin_id');
            $table->foreignId('hubungan_keluarga_id');
            $table->foreignId('jenis_kelamin_id');
            $table->foreignId('agama_id');
            $table->foreignId('status_penduduk_id');
            $table->string('akta_kelahiran');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->foreignId('pendidikan_sedang_id');
            $table->foreignId('pekerjaan_id');
            $table->foreignId('warga_negara_id');
            $table->string('negara_asal')->nullable();
            $table->foreignId('status_dasar_id');
            $table->integer('anak_ke');
            $table->string('no_telepon');
            $table->string('email');
            $table->string('akta_nikah')->nullable();
            $table->string('akta_perceraian')->nullable();
            $table->date('tgl_perkawinan')->nullable();
            $table->date('tgl_perceraian')->nullable();
            $table->string('golongan_darah')->nullable();
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