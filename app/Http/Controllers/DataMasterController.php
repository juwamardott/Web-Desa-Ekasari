<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\HubunganKeluarga;
use App\Models\JenisKelamin;
use App\Models\JenisSurat;
use App\Models\Kawin;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\PendidikanSedang;
use App\Models\StatusDasar;
use App\Models\StatusPenduduk;
use App\Models\WargaNegara;
use Illuminate\Http\Request;

class DataMasterController extends Controller
{
    //
    public function jenis_kelamin(){
        $jenis_kelamin = JenisKelamin::paginate(5);
        return view('data_master.jenis_kelamin', compact('jenis_kelamin'));
    }

    public function pendidikan(){
        $pendidikan = Pendidikan::paginate(5);
        return view('data_master.pendidikan', compact('pendidikan'));
    }

    public function pendidikan_sedang(){
        $pendidikan_sedang = PendidikanSedang::paginate(5);
        return view('data_master.pendidikan_sedang', compact('pendidikan_sedang'));
    }

    public function status_dasar(){
        $status_dasar = StatusDasar::paginate(5);
        return view('data_master.status_dasar', compact('status_dasar'));
    }

    public function pekerjaan(){
        $pekerjaan = Pekerjaan::paginate(5);
        return view('data_master.pekerjaan', compact('pekerjaan'));
    }

    public function jenis_surat(){
        $jenis_surat = JenisSurat::paginate(5);
        return view('data_master.jenis_surat', compact('jenis_surat'));
    }
}