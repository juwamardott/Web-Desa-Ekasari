<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index(){
        // dd(Auth::user());
        if(auth::user()->username == 'admin'){
            $penduduk =  Penduduk::where('status_penduduk_id',1)->count();
            $keluarga = Penduduk::where('hubungan_keluarga_id', 1)->count();
            $laki = Penduduk::where('jenis_kelamin_id', 1)->count();
            $perempuan = Penduduk::where('jenis_kelamin_id', 2)->count();
            return view('dashboard.dashboard', compact('penduduk', 'keluarga', 'laki', 'perempuan'));
        }else{
            $banjar_id = Auth::user()->banjar_id;
            $penduduk =  Penduduk::where('status_penduduk_id',1)->count();
            $keluarga = Penduduk::where('hubungan_keluarga_id', 1)->where('banjar_id', $banjar_id)->count();
            $laki = Penduduk::where('jenis_kelamin_id', 1)->where('banjar_id', $banjar_id)->count();
            $perempuan = Penduduk::where('jenis_kelamin_id', 2)->where('banjar_id', $banjar_id)->count();
            return view('dashboard.dashboard', compact('penduduk', 'keluarga', 'laki', 'perempuan'));
        }
        
    }
}