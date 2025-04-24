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

    public function post(Request $request)
{
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
    $logoPath = public_path('lte/dist/assets/img/Picture1.png'); // Ganti backslash ke slash agar cross-platform

    // Ambil jenis surat
    $jenisSurat = JenisSurat::findOrFail($request->jenis_surat);

    // Simpan data ke database
    Surat::create([
        'nomor_surat' => $request->nomor_surat,
        'jenis_surat_id' => $request->jenis_surat,
        'penduduk_id' => $request->penduduk_id,
        'keperluan' => $request->keperluan,
        'tanggal_dibuat' => $request->tanggal_dibuat
    ]);

    // Buat HTML untuk PDF dari Blade
    $html = view('surat.template', [
        'data' => $penduduk,
        'keperluan' => $request->keperluan,
        'tanggal_dibuat' => $request->tanggal_dibuat,
        'nomor_surat' => $request->nomor_surat,
        'jenis_surat' => $jenisSurat,
        'logo_path' => $logoPath,
        'keterangan' => $request->keterangan
    ])->render();

    // Buat PDF
    $mpdf = new Mpdf(['format' => 'A4']);
    $mpdf->WriteHTML($html);

    // Output sebagai file yang bisa di-download
    $pdfOutput = $mpdf->Output('', 'S'); // S = return as string

    // Kembalikan sebagai response file untuk download
    return response($pdfOutput)
        ->header('Content-Type', 'application/pdf')
        ->header('Content-Disposition', 'attachment; filename="surat.pdf"')
        ->header('Content-Transfer-Encoding', 'binary')
        ->header('Accept-Ranges', 'bytes');
}



    public function create(){
        return view('data_master.crud_jenis_surat.tambah');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis_surat' => 'required',
            'keterangan' => 'required',
        ]);

        JenisSurat::create($validated);

        return redirect()->route('jenis_surat.index')->with('success', 'Data jenis surat berhasil ditambah.');
    }


    public function edit($id){
        $jenis_surat = JenisSurat::find($id);
        return view('data_master.crud_jenis_surat.update', compact('jenis_surat'));
    }


    public function update(Request $request, $id){
        // dd($id);

        // Validasi input
        $validated = $request->validate([
            'jenis_surat' => 'required',
            'keterangan' => 'required'
        ]);
        // Cari data berdasarkan ID
        $jenis_surat = JenisSurat::find($id);

        // Jika tidak ditemukan, redirect dengan pesan error
        if (!$jenis_surat) {
            return redirect()->route('jenis_surat.edit')->with('error', 'Data gagal diperbarui.');
        }

        // Update data
        $jenis_surat->update([
            'jenis_surat' => $validated['jenis_surat'],
            'keterangan' => $validated['keterangan']

        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('jenis_surat.index')->with('success', 'Data berhasil diperbarui.');
    }
}