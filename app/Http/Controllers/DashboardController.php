<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;

class DashboardController extends Controller
{
    //
    public function index(){
        $penduduk =  Penduduk::where('status_penduduk','Aktif')->count();
        $keluarga = Penduduk::where('hubungan_keluarga', 'Kepala Keluarga')->Where('status_penduduk', 'Aktif')->count();
        $laki = Penduduk::where('jenis_kelamin', 'Laki-laki')->Where('status_penduduk', 'Aktif')->count();
        $perempuan = Penduduk::where('jenis_kelamin', 'Perempuan')->Where('status_penduduk', 'Aktif')->count();
        return view('dashboard.dashboard', compact('penduduk', 'keluarga', 'laki', 'perempuan'));
    }
}