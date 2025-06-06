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
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use Mpdf\Mpdf;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    // public function index()
    // {
    //     $relasi = [
    //         'banjar',
    //         'pendidikan',
    //         'pendidikan_sedang',
    //         'pekerjaan',
    //         'agama',
    //         'hubungan_keluarga',
    //         'jenis_kelamin',
    //         'warga_negara',
    //         'status_penduduk',
    //         'status_dasar',
    //         'kawin'
    //     ];
    //     $user = Auth::user();
        
    //     if ($user->username === 'admin') {
    //         $penduduk = Penduduk::with($relasi)->paginate(5);
    //         $total = Penduduk::count();
    //     } else {
    //         $penduduk = Penduduk::with($relasi)
    //             ->where('banjar_id', $user->banjar_id)
    //             ->paginate(5);
    //         $total = Penduduk::where('banjar_id', $user->banjar_id)->count();
    //     }

    //     $banjar = Cache::remember('data_banjar', 3600, function () {
    //         return Banjar::all();
    //     });

    //     $status_penduduk = Cache::remember('data_status_penduduk', 3600, function () {
    //         return StatusPenduduk::all();
    //     });

    //     $status_dasar = Cache::remember('data_status_dasar', 3600, function () {
    //         return StatusDasar::all();
    //     });

    //     $jenis_kelamin = Cache::remember('data_jenis_kelamin', 3600, function () {
    //         return JenisKelamin::all();
    //     });

    //     return view('penduduk.penduduk', compact(
    //         'penduduk',
    //         'banjar',
    //         'total',
    //         'status_penduduk',
    //         'status_dasar',
    //         'jenis_kelamin'
    //     ));
    // }


    public function index()
    {
        $relasi = [
            'banjar',
            'pendidikan',
            'pendidikan_sedang',
            'pekerjaan',
            'agama',
            'hubungan_keluarga',
            'jenis_kelamin',
            'warga_negara',
            'status_penduduk',
            'status_dasar',
            'kawin'
        ];

        $user = Auth::user();

        // Tentukan key cache yang berbeda untuk admin dan user biasa
        $cacheKey = $user->username === 'admin' 
            ? 'data_penduduk_admin' 
            : 'data_penduduk_banjar_' . $user->banjar_id;

        // Simpan ke cache selama 1 jam (3600 detik)
        $penduduk = Cache::remember($cacheKey, 3600, function () use ($user, $relasi) {
            if ($user->username === 'admin') {
                return Penduduk::with($relasi)->paginate(5);
            } else {
                return Penduduk::with($relasi)
                    ->where('banjar_id', $user->banjar_id)
                    ->paginate(5);
            }
        });
        // Hitung total (boleh juga di-cache jika perlu)
        $total = $user->username === 'admin' 
            ? Cache::remember('total_penduduk_admin', 3600, fn() => Penduduk::count())
            : Cache::remember('total_penduduk_banjar_' . $user->banjar_id, 3600, fn() => Penduduk::where('banjar_id', $user->banjar_id)->count());

        // Cache untuk data lainnya
        $banjar = Cache::remember('data_banjar', 3600, fn() => Banjar::all());
        $status_penduduk = Cache::remember('data_status_penduduk', 3600, fn() => StatusPenduduk::all());
        $status_dasar = Cache::remember('data_status_dasar', 3600, fn() => StatusDasar::all());
        $jenis_kelamin = Cache::remember('data_jenis_kelamin', 3600, fn() => JenisKelamin::all());

        return view('penduduk.penduduk', compact(
            'penduduk',
            'banjar',
            'total',
            'status_penduduk',
            'status_dasar',
            'jenis_kelamin'
        ));
    }




    // public function keluarga(){
    //     $relasi= [
    //         'banjar',
    //         'pendidikan',
    //         'pendidikan_sedang',
    //         'pekerjaan',
    //         'agama',
    //         'hubungan_keluarga',
    //         'jenis_kelamin',
    //         'warga_negara',
    //         'status_penduduk',
    //         'status_dasar',
    //         'kawin'
    //       ];
    //     $keluargaa = Penduduk::with($relasi)->where('hubungan_keluarga_id', 1);
    //     $user = Auth::user();
    //     // dd($user);  
    //     if($user->username === 'admin'){
    //         $total = $keluargaa->count();
    //         $keluarga = $keluargaa->paginate(5);
    //     }else{
    //         $keluarga = $keluargaa->where('banjar_id', $user->banjar_id)->paginate(5);
    //         $total = $keluarga->count();
    //     }
    //     $total = $keluargaa->count();
    //     $banjar = Cache::remember('data_banjar', 3600, function () {
    //         return Banjar::all();
    //     });

    //     $status_penduduk = Cache::remember('data_status_penduduk', 3600, function () {
    //         return StatusPenduduk::all();
    //     });

    //     $status_dasar = Cache::remember('data_status_dasar', 3600, function () {
    //         return StatusDasar::all();
    //     });

    //     $jenis_kelamin = Cache::remember('data_jenis_kelamin', 3600, function () {
    //         return JenisKelamin::all();
    //     });
    //     // $keluarga = $keluargaa->paginate(5);
    //     return view('keluarga.keluarga', compact('keluarga', 'banjar', 'total', 'status_penduduk', 'status_dasar','jenis_kelamin'));
    // }


    public function keluarga()
    {
        $relasi = [
            'banjar',
            'pendidikan',
            'pendidikan_sedang',
            'pekerjaan',
            'agama',
            'hubungan_keluarga',
            'jenis_kelamin',
            'warga_negara',
            'status_penduduk',
            'status_dasar',
            'kawin'
        ];

        $user = Auth::user();

        // Buat cache key unik untuk setiap user (admin atau banjar)
        $cacheKey = $user->username === 'admin'
            ? 'data_keluarga_admin'
            : 'data_keluarga_banjar_' . $user->banjar_id;

        $keluarga = Cache::remember($cacheKey, 3600, function () use ($relasi, $user) {
            $query = Penduduk::with($relasi)->where('hubungan_keluarga_id', 1);

            if ($user->username !== 'admin') {
                $query->where('banjar_id', $user->banjar_id);
            }

            // Catatan: paginate disarankan tidak langsung di-cache karena hanya menyimpan halaman pertama
            return $query->paginate(5);
        });

        // Untuk total count, bisa pakai cache terpisah
        $cacheTotalKey = $user->username === 'admin'
            ? 'total_keluarga_admin'
            : 'total_keluarga_banjar_' . $user->banjar_id;

        $total = Cache::remember($cacheTotalKey, 3600, function () use ($user) {
            $query = Penduduk::where('hubungan_keluarga_id', 1);

            if ($user->username !== 'admin') {
                $query->where('banjar_id', $user->banjar_id);
            }

            return $query->count();
        });

        // Data referensi lain tetap pakai cache
        $banjar = Cache::remember('data_banjar', 3600, fn() => Banjar::all());
        $status_penduduk = Cache::remember('data_status_penduduk', 3600, fn() => StatusPenduduk::all());
        $status_dasar = Cache::remember('data_status_dasar', 3600, fn() => StatusDasar::all());
        $jenis_kelamin = Cache::remember('data_jenis_kelamin', 3600, fn() => JenisKelamin::all());

        return view('keluarga.keluarga', compact(
            'keluarga',
            'banjar',
            'total',
            'status_penduduk',
            'status_dasar',
            'jenis_kelamin'
        ));
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
        $banjar = Cache::remember('data_banjar', 3600, function () {
            return Banjar::all();
        });
    
        $status_penduduk = Cache::remember('data_status_penduduk', 3600, function () {
            return StatusPenduduk::all();
        });
    
        $status_dasar = Cache::remember('data_status_dasar', 3600, function () {
            return StatusDasar::all();
        });
    
        $jenis_kelamin = Cache::remember('data_jenis_kelamin', 3600, function () {
            return JenisKelamin::all();
        });
    
        $kawin = Cache::remember('data_kawin', 3600, function () {
            return Kawin::all();
        });
    
        $warga_negara = Cache::remember('data_warga_negara', 3600, function () {
            return WargaNegara::all();
        });
    
        $agama = Cache::remember('data_agama', 3600, function () {
            return Agama::all();
        });
    
        $pendidikan = Cache::remember('data_pendidikan', 3600, function () {
            return Pendidikan::all();
        });
    
        $hubungan_keluarga = Cache::remember('data_hubungan_keluarga', 3600, function () {
            return HubunganKeluarga::all();
        });
    
        $pekerjaan = Cache::remember('data_pekerjaan', 3600, function () {
            return Pekerjaan::all();
        });
    
        $pendidikan_sedang = Cache::remember('data_pendidikan_sedang', 3600, function () {
            return PendidikanSedang::all();
        });
    
        return view('penduduk.tambah_penduduk', compact(
            'banjar',
            'status_penduduk',
            'status_dasar',
            'jenis_kelamin',
            'kawin',
            'warga_negara',
            'agama',
            'pendidikan',
            'hubungan_keluarga',
            'pekerjaan',
            'pendidikan_sedang'
        ));
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
                'no_telepon' => 'nullable',
                'email' => 'nullable|email',
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

            Cache::forget('data_penduduk_admin');
            Cache::forget('data_penduduk_banjar');
            Cache::forget('data_keluarga_admin');
            Cache::forget('data_keluarga_banjar');
    
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

            Cache::forget('data_penduduk_admin');
            Cache::forget('data_penduduk_banjar');
            Cache::forget('data_keluarga_admin');
            Cache::forget('data_keluarga_banjar');
        
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
        $relasi= [
            'banjar',
            'pendidikan',
            'pendidikan_sedang',
            'pekerjaan',
            'agama',
            'hubungan_keluarga',
            'jenis_kelamin',
            'warga_negara',
            'status_penduduk',
            'status_dasar',
            'kawin'
          ];
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

        $penduduks = Penduduk::with($relasi)
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
        $relasi= [
            'banjar',
            'pendidikan',
            'pendidikan_sedang',
            'pekerjaan',
            'agama',
            'hubungan_keluarga',
            'jenis_kelamin',
            'warga_negara',
            'status_penduduk',
            'status_dasar',
            'kawin'
          ];
          
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

        $penduduks = Penduduk::with($relasi)
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



    



        public function detail_penduduk($id)
    {
        $penduduk = Penduduk::find($id);
        $type = 'penduduk';

        $banjar = Cache::remember('data_banjar', 3600, function () {
            return Banjar::all();
        });

        $status_penduduk = Cache::remember('data_status_penduduk', 3600, function () {
            return StatusPenduduk::all();
        });

        $status_dasar = Cache::remember('data_status_dasar', 3600, function () {
            return StatusDasar::all();
        });

        $jenis_kelamin = Cache::remember('data_jenis_kelamin', 3600, function () {
            return JenisKelamin::all();
        });

        $kawin = Cache::remember('data_kawin', 3600, function () {
            return Kawin::all();
        });

        $warga_negara = Cache::remember('data_warga_negara', 3600, function () {
            return WargaNegara::all();
        });

        $agama = Cache::remember('data_agama', 3600, function () {
            return Agama::all();
        });

        $pendidikan = Cache::remember('data_pendidikan', 3600, function () {
            return Pendidikan::all();
        });

        $hubungan_keluarga = Cache::remember('data_hubungan_keluarga', 3600, function () {
            return HubunganKeluarga::all();
        });

        $pekerjaan = Cache::remember('data_pekerjaan', 3600, function () {
            return Pekerjaan::all();
        });

        $pendidikan_sedang = Cache::remember('data_pendidikan_sedang', 3600, function () {
            return PendidikanSedang::all();
        });

        return view('penduduk.detail_penduduk', compact(
            'penduduk',
            'banjar',
            'type',
            'status_penduduk',
            'status_dasar',
            'jenis_kelamin',
            'kawin',
            'warga_negara',
            'agama',
            'pendidikan',
            'hubungan_keluarga',
            'pekerjaan',
            'pendidikan_sedang'
        ));
    }

    public function detail_keluarga($id)
{
    $penduduk = Penduduk::find($id);
    $type = 'keluarga';

    $banjar = Cache::remember('data_banjar', 3600, function () {
        return Banjar::all();
    });

    $status_penduduk = Cache::remember('data_status_penduduk', 3600, function () {
        return StatusPenduduk::all();
    });

    $status_dasar = Cache::remember('data_status_dasar', 3600, function () {
        return StatusDasar::all();
    });

    $jenis_kelamin = Cache::remember('data_jenis_kelamin', 3600, function () {
        return JenisKelamin::all();
    });

    $kawin = Cache::remember('data_kawin', 3600, function () {
        return Kawin::all();
    });

    $warga_negara = Cache::remember('data_warga_negara', 3600, function () {
        return WargaNegara::all();
    });

    $agama = Cache::remember('data_agama', 3600, function () {
        return Agama::all();
    });

    $pendidikan = Cache::remember('data_pendidikan', 3600, function () {
        return Pendidikan::all();
    });

    $hubungan_keluarga = Cache::remember('data_hubungan_keluarga', 3600, function () {
        return HubunganKeluarga::all();
    });

    $pekerjaan = Cache::remember('data_pekerjaan', 3600, function () {
        return Pekerjaan::all();
    });

    $pendidikan_sedang = Cache::remember('data_pendidikan_sedang', 3600, function () {
        return PendidikanSedang::all();
    });

    return view('keluarga.detail_keluarga', compact(
        'penduduk',
        'banjar',
        'type',
        'status_penduduk',
        'status_dasar',
        'jenis_kelamin',
        'kawin',
        'warga_negara',
        'agama',
        'pendidikan',
        'hubungan_keluarga',
        'pekerjaan',
        'pendidikan_sedang'
    ));
}


    public function kartu_keluarga($no_kk){
        $keluargaa = Penduduk::where('no_kk', $no_kk)->with('agama', 'pekerjaan', 'pendidikan','jenis_kelamin', 'kawin', 'hubungan_keluarga', 'warga_negara')->orderBy('hubungan_keluarga_id', 'asc');
        
        $keluarga = $keluargaa->get();
        $kepala = $keluargaa->first();
        // Buat HTML untuk PDF dari Blade
        $html = view('kartu_keluarga.index', [
            'data' => $keluarga,
            'kepala' => $kepala
        ])->render();
    
        // Buat PDF dengan orientasi landscape
        $mpdf = new \Mpdf\Mpdf(['format' => 'A4', 'orientation' => 'L']); // 'L' untuk Landscape
        $mpdf->WriteHTML($html);
    
        // Output sebagai file yang bisa di-download
        $pdfOutput = $mpdf->Output('', 'S'); // S = return as string
    
        return response($pdfOutput)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="kartu_keluarga.pdf"') // <-- inline, bukan attachment
            ->header('Content-Transfer-Encoding', 'binary')
            ->header('Accept-Ranges', 'bytes');
    }


    public function ubah_kk_penduduk(Request $request, $no_kk){
        
        // dd($request->input());
        $penduduk = Penduduk::where('no_kk', $no_kk);

        $penduduk->update([
           'no_kk' =>  $request->input('no_kk_baru')
        ]);

        return redirect()->route('penduduk.list.keluarga', $request->input('no_kk_baru'))->with('success', 'Berhasil merubah Nomor Kartu Keluarga!');
    }

    public function ubah_kk_keluarga($no_kk){
        dd($no_kk);
    }
    

}