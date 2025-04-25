<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\Penduduk;
use App\Models\Banjar;
use App\Models\HubunganKeluarga;
use App\Models\StatusPenduduk;
use App\Models\StatusDasar;
use App\Models\JenisKelamin;
use App\Models\Kawin;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\PendidikanSedang;
use App\Models\WargaNegara;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $user = Auth::user();
        // dd($user);
        if ($user->username === 'admin') {
            $penduduk = Penduduk::paginate(5);
            $total = Penduduk::count();
        } else {
            $penduduk = Penduduk::where('banjar_id', $user->banjar_id)->paginate(5);
            $total = Penduduk::where('banjar_id', $user->banjar_id)->count();
        }

        $banjar = Banjar::all();
        $status_penduduk = StatusPenduduk::all();
        $status_dasar = StatusDasar::all();
        $jenis_kelamin = JenisKelamin::all();

        return view('penduduk.penduduk', compact('penduduk', 'banjar', 'total', 'status_penduduk', 'status_dasar', 'jenis_kelamin'));
    }


    public function keluarga(){
        $keluargaa = Penduduk::where('hubungan_keluarga_id', 1);
        $user = Auth::user();
        // dd($user);  
        if($user->username === 'admin'){
            $total = $keluargaa->count();
            $keluarga = $keluargaa->paginate(5);
        }else{
            $keluarga = $keluargaa->where('banjar_id', $user->banjar_id)->paginate(5);
            $total = $keluarga->count();
        }
        $banjar = Banjar::all();
        $total = $keluargaa->count();
        $status_penduduk = StatusPenduduk::all();
        $status_dasar = StatusDasar::all();
        $jenis_kelamin = JenisKelamin::all();
        // $keluarga = $keluargaa->paginate(5);
        return view('keluarga.keluarga', compact('keluarga', 'banjar', 'total', 'status_penduduk', 'status_dasar','jenis_kelamin'));
    }


    public function penduduk_list_keluarga($no_kk){
        $penduduk = Penduduk::where('no_kk', $no_kk)->orderBy('hubungan_keluarga_id', 'asc')->get();
        $kepala = Penduduk::where('no_kk', $no_kk)->where('hubungan_keluarga_id', 1)->first();
        if (!$kepala) {
            return redirect()->route('penduduk.index')->with('error', 'Kepala keluarga tidak ditemukan.');
        }
        return view('penduduk.list_keluarga', compact('penduduk', 'kepala'));
    }

    public function keluarga_list_keluarga($no_kk){
        $penduduk = Penduduk::where('no_kk', $no_kk)->orderBy('hubungan_keluarga_id', 'asc')->get();
        $kepala = Penduduk::where('no_kk', $no_kk)->where('hubungan_keluarga_id', 1)->first();
        if (!$kepala) {
            return redirect()->route('keluarga.index')->with('error', 'Kepala keluarga tidak ditemukan.');
        }
        return view('keluarga.list_keluarga', compact('penduduk', 'kepala'));
    }

    public function create()
    {
        //
        $banjar = Banjar::all();
        $status_penduduk = StatusPenduduk::all();
        $status_dasar = StatusDasar::all();
        $jenis_kelamin = JenisKelamin::all();
        $kawin = Kawin::all();
        $warga_negara = WargaNegara::all();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $hubungan_keluarga = HubunganKeluarga::all();
        $pekerjaan = Pekerjaan::all();
        $pendidikan_sedang = PendidikanSedang::all();

        return view('penduduk.tambah_penduduk', compact('banjar', 'status_penduduk', 'status_dasar', 'jenis_kelamin', 'kawin', 'warga_negara', 'agama', 'pendidikan', 'hubungan_keluarga', 'pekerjaan', 'pendidikan_sedang'));
        
    }

    public function store(Request $request)
    {
        try {
            // Validasi data request
            $validated = $request->validate([
                'image' => 'image',
                'no_kk' => 'required',
                'nik' => 'required',
                'nama' => 'required',
                'anak_ke' => 'required',
                'no_telepon' => 'required',
                'email' => 'required|email',
                'warga_negara_id' => 'required',
                'nama_ayah' => 'required',
                'nama_ibu' => 'required',
                'nik_ayah' => 'required',
                'nik_ibu' => 'required',
                'alamat' => 'required',
                'agama_id' => 'required',
                'banjar_id' => 'required',
                'pendidikan_id' => 'required',
                'kawin_id' => 'required',
                'hubungan_keluarga_id' => 'required',
                'jenis_kelamin_id' => 'required',
                'status_penduduk_id' => 'required',
                'akta_kelahiran' => 'required',
                'tempat_lahir' => 'required',
                'tgl_lahir' => 'required|date',
                'pendidikan_sedang_id' => 'required',
                'pekerjaan_id' => 'required',
                'status_dasar_id' => 'required',
                'golongan_darah' => 'required',
                'negara_asal' => 'nullable',
                'akta_nikah' => 'nullable',
                'akta_perceraian' => 'nullable',
                'tgl_perkawinan' => 'nullable',
                'tgl_perceraian' => 'nullable'
                
            ]);

            // Hitung umur dari tgl_lahir
            $umur = Carbon::parse($request->tgl_lahir)->age;
            if($request->file('image')){
                $validated['image'] = $request->file('image')->store('post-images');
            }
            $validated['umur'] = $umur;
            Penduduk::create($validated);
    
            return redirect()->route('penduduk.index')->with('success', 'Data berhasil disimpan!');
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            // dd($e->validator->errors());
            return redirect()->back()
            ->with('error', 'Pastikan data terisi dengan benar')
            ->withErrors($e->validator->errors())
            ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Penduduk $penduduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penduduk $penduduk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        
        $penduduk = Penduduk::find($id);
        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $image = $request->file('image')->store('post-images');
        }else{
            $image = $penduduk->image;
        }

        $umur = Carbon::parse($request->tgl_lahir)->age;
        
        $penduduk->update([
            'image' => $image,
            'no_kk' => $request->no_kk,
            'nik' => $request->nik,
            'nama' => $request->nama,
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'nik_ayah' => $request->nik_ayah,
            'nik_ibu' => $request->nik_ibu,
            'alamat' => $request->alamat,
            'banjar_id' => $request->banjar_id,
            'pendidikan_id' => $request->pendidikan_id,
            'akta_kelahiran' => $request->akta_kelahiran,
            'umur' => $umur,
            'kawin_id' => $request->kawin_id,
            'hubungan_keluarga_id' => $request->hubungan_keluarga_id,
            'jenis_kelamin_id' => $request->jenis_kelamin_id,
            'agama_id' => $request->agama_id,
            'status_penduduk_id' => $request->status_penduduk_id,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'pendidikan_sedang_id' => $request->pendidikan_sedang_id,
            'pekerjaan_id' => $request->pekerjaan_id,
            'warga_negara_id' => $request->warga_negara_id,
            'negara_asal' => $request->negara_asal,
            'status_dasar_id' => $request->status_dasar_id,
            'anak_ke' => $request->anak_ke,
            'no_telepon' => $request->no_telepon,
            'email' => $request->email,
            'akta_nikah' => $request->akta_nikah,
            'akta_perceraian' => $request->akta_perceraian,
            'tgl_perkawinan' => $request->tgl_perkawinan,
            'tgl_perceraian' => $request->tgl_perceraian,
            'golongan_darah' => $request->golongan_darah
            
        ]);
        
        // Redirect berdasarkan tipe request
        if ($request->type == 'penduduk') {
            return redirect()->route('penduduk.index')->with('success', 'Data penduduk berhasil diperbarui');
        } else {
            return redirect()->route('keluarga.index')->with('success', 'Data keluarga berhasil diperbarui');
        }
            
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $penduduk = Penduduk::findOrFail($id);
        if($penduduk->image){
            Storage::delete($penduduk->image);
        }
        $penduduk->delete();

        return response()->json(['success' => true]);
    }

    public function filterPenduduk(Request $request)
{
    $search = $request->search;
    $status = $request->status;
    $jenis_kelamin = $request->jenis_kelamin;
    $umur = $request->umur;
    $status_dasar = $request->status_dasar;
    // dd($status_dasar);
    if(Auth::user()->username == 'admin'){
        $banjar = $request->banjar;
    }else{
        $banjar = Auth::user()->banjar_id;
    }

    $penduduks = Penduduk::query()
        ->where(function ($query) use ($search) {
            $query
                ->where(function ($q) use ($search) {
                    if ($search) {
                        $q->where('nama', 'LIKE', "%$search%")
                            ->orWhere('no_kk', 'LIKE', "%$search%")
                            ->orWhere('nik', 'LIKE', "%$search%");
                    }
                });
        })->when($status, function ($query) use ($status) {
            return $query->where('status_penduduk_id', $status);
        })->when($jenis_kelamin, function ($query) use ($jenis_kelamin) {
            return $query->where('jenis_kelamin_id', $jenis_kelamin);
        })->when($banjar, function ($query) use ($banjar) {
            return $query->where('banjar_id', $banjar);
        })->when($umur, function ($query) use ($umur) {
            return $query->where('umur', $umur);
        })->when($status_dasar, function ($query) use ($status_dasar) {
            return $query->where('status_dasar_id', $status_dasar);
        });
    
    $total = $penduduks->count();
    $penduduk = $penduduks->paginate(5);

    return response()->json([
        'table' => view('penduduk.partial_table_penduduk', compact('penduduk'))->render(),
        'pagination' => view('penduduk.paginate', compact('penduduk'))->render(),
        'total_penduduk' => $total
    ]);
}

    public function filterKeluarga(Request $request)
{
    $search = $request->search;
    $status = $request->status;
    $jenis_kelamin = $request->jenis_kelamin;
    $umur = $request->umur;
    $status_dasar = $request->status_dasar;
    if(Auth::user()->username == 'admin'){
        $banjar = $request->banjar;
    }else{
        $banjar = Auth::user()->banjar_id;
    }

    $penduduks = Penduduk::query()
        ->where(function ($query) use ($search) {
            $query->where('hubungan_keluarga_id', 1)
                  ->where(function ($q) use ($search) {
                      if ($search) {
                          $q->where('nama', 'LIKE', "%$search%")
                            ->orWhere('no_kk', 'LIKE', "%$search%")
                            ->orWhere('nik', 'LIKE', "%$search%");
                      }
                  });
        })
        ->when($status, function ($query) use ($status) {
            return $query->where('status_penduduk_id', $status);
        })
        ->when($jenis_kelamin, function ($query) use ($jenis_kelamin) {
            return $query->where('jenis_kelamin_id', $jenis_kelamin);
        })
        ->when($banjar, function ($query) use ($banjar) {
            return $query->where('banjar_id', $banjar);
        })
        ->when($umur, function ($query) use ($umur) {
            return $query->where('umur', $umur);
        })
        ->when($status_dasar, function ($query) use ($status_dasar) {
            return $query->where('status_dasar_id', $status_dasar);
        });

    $total = $penduduks->count();
    $penduduk = $penduduks->paginate(5);

    return response()->json([
        'table' => view('penduduk.partial_table_penduduk', compact('penduduk'))->render(),
        'pagination' => view('penduduk.paginate', compact('penduduk'))->render(),
        'total_keluarga' => $total
    ]);
}



    



    public function detail_penduduk($id){
        $penduduk = Penduduk::find($id);
        $type = 'penduduk';
        $banjar = Banjar::all();
        $status_penduduk = StatusPenduduk::all();
        $status_dasar = StatusDasar::all();
        $jenis_kelamin = JenisKelamin::all();
        $kawin = Kawin::all();
        $warga_negara = WargaNegara::all();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $hubungan_keluarga = HubunganKeluarga::all();
        $pekerjaan = Pekerjaan::all();
        $pendidikan_sedang = PendidikanSedang::all();

        return view('penduduk.detail_penduduk', compact('penduduk', 'banjar','type', 'status_penduduk', 'status_dasar', 'jenis_kelamin', 'kawin', 'warga_negara', 'agama', 'pendidikan', 'hubungan_keluarga', 'pekerjaan', 'pendidikan_sedang'));
    }

    public function detail_keluarga($id){
        $penduduk = Penduduk::find($id);
        $banjar = Banjar::all();
        $type = 'keluarga';
        $status_penduduk = StatusPenduduk::all();
        $status_dasar = StatusDasar::all();
        $jenis_kelamin = JenisKelamin::all();
        $kawin = Kawin::all();
        $warga_negara = WargaNegara::all();
        $agama = Agama::all();
        $pendidikan = Pendidikan::all();
        $hubungan_keluarga = HubunganKeluarga::all();
        $pekerjaan = Pekerjaan::all();
        $pendidikan_sedang = PendidikanSedang::all();

        return view('keluarga.detail_keluarga', compact('penduduk', 'banjar','type', 'status_penduduk', 'status_dasar', 'jenis_kelamin', 'kawin', 'warga_negara', 'agama', 'pendidikan', 'hubungan_keluarga', 'pekerjaan', 'pendidikan_sedang'));
    }

}