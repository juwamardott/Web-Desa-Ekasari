<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use App\Models\Penduduk;
use App\Models\Surat;
use Illuminate\Http\Request;
use Mpdf\Mpdf;

class SuratController extends Controller
{
    //

    public function index(){
        $jenis_surat = JenisSurat::all();
        $penduduks = Penduduk::orderBy('nama')->get();
        return view('surat.surat', compact('jenis_surat', 'penduduks'));
    }

    public function post(Request $request){
            // Validasi input
        $request->validate([
            'nomor_surat' => 'required',
            'jenis_surat' => 'required',
            'penduduk_id' => 'required',
            'keperluan' => 'required',
            'tanggal_dibuat' => 'required|date',
        ]);

        // Ambil data penduduk
        $penduduk = Penduduk::findOrFail($request->penduduk_id);
        $logoPath = public_path('lte\dist\assets\img\Picture1.png');

        // Ambil jenis surat
        $jenisSurat = JenisSurat::findOrFail($request->jenis_surat);

        Surat::create([
        'nomor_surat' => $request->input('nomor_surat'),
        'jenis_surat_id' => $request->input('jenis_surat'),
        'penduduk_id' => $request->input('penduduk_id'),
        'keperluan' => $request->input('keperluan'),
        'tanggal_dibuat' => $request->input('tanggal_dibuat')
        ]);

        // Buat HTML surat untuk dimasukkan ke mPDF
        $html = view('surat.template', [
            'data' => $penduduk,
            'keperluan' => $request->keperluan,
            'tanggal_dibuat' => $request->tanggal_dibuat,
            'nomor_surat' => $request->nomor_surat,
            'jenis_surat' => $jenisSurat,
            'logo_path' => $logoPath
        ])->render();

        
        $mpdf = new Mpdf(['format' => 'A4']);
        $mpdf->WriteHTML($html);
        return $mpdf->Output('surat-keterangan.pdf', 'D');
    }
}