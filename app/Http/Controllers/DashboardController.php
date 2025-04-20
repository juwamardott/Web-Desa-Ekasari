<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;

class DashboardController extends Controller
{
    //
    public function index(){
        $penduduk =  Penduduk::where('status_penduduk_id',1)->count();
        $keluarga = Penduduk::where('hubungan_keluarga_id', 1)->count();
        $laki = Penduduk::where('jenis_kelamin_id', 1)->count();
        $perempuan = Penduduk::where('jenis_kelamin_id', 2)->count();
        return view('dashboard.dashboard', compact('penduduk', 'keluarga', 'laki', 'perempuan'));
    }
}