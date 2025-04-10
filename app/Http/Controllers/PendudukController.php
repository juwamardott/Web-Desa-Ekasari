<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Models\Banjar;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $user = Auth::user();

        if ($user->username === 'admin') {
            $penduduk = Penduduk::paginate(5);
            $total = Penduduk::count();
        } else {
            $penduduk = Penduduk::where('banjar', $user->banjar)->paginate(5);
            $total = Penduduk::where('banjar', $user->banjar)->count();
        }

        $banjar = Banjar::all();

        return view('penduduk.penduduk', compact('penduduk', 'banjar', 'total'));
    }


    public function keluarga(){
        $keluargaa = Penduduk::where('hubungan_keluarga', 'Kepala Keluarga');
        $user = Auth::user();

        if($user->username === 'admin'){
            $total = $keluargaa->count();
            $keluarga = $keluargaa->paginate(5);
        }else{
            $keluarga = $keluargaa->where('banjar', $user->banjar)->paginate(5);
            $total = $keluarga->count();
        }
        
        $banjar = Banjar::all();
        $total = $keluargaa->count();
        // $keluarga = $keluargaa->paginate(5);
        return view('keluarga.keluarga', compact('keluarga', 'banjar', 'total'));
    }


    public function penduduk_list_keluarga($no_kk){
        $penduduk = Penduduk::where('no_kk', $no_kk)->get();
        $kepala = Penduduk::where('no_kk', $no_kk)->where('hubungan_keluarga', 'Kepala Keluarga')->first();
        if (!$kepala) {
            return redirect()->route('penduduk.index')->with('error', 'Kepala keluarga tidak ditemukan.');
        }
        return view('penduduk.list_keluarga', compact('penduduk', 'kepala'));
    }

    public function keluarga_list_keluarga($no_kk){
        $penduduk = Penduduk::where('no_kk', $no_kk)->get();
        $kepala = Penduduk::where('no_kk', $no_kk)->where('hubungan_keluarga', 'Kepala Keluarga')->first();
        if (!$kepala) {
            return redirect()->route('keluarga.index')->with('error', 'Kepala keluarga tidak ditemukan.');
        }
        return view('keluarga.list_keluarga', compact('penduduk', 'kepala'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $banjar = Banjar::all();

        return view('penduduk.tambah_penduduk', compact('banjar'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->file('image')->store('post-images');
        // dd($request->input());
        try {
            // Validasi data request
            $validated = $request->validate([
                'image' => 'image',
                'no_kk' => 'required',
                'nik' => 'required',
                'nama' => 'required',
                'warga_negara' => 'required',
                'nama_ayah' => 'required',
                'nama_ibu' => 'required',
                'nik_ayah' => 'required',
                'nik_ibu' => 'required',
                'alamat' => 'required',
                'banjar' => 'required',
                'pendidikan' => 'required',
                'umur' => 'required',
                'kawin' => 'required',
                'hubungan_keluarga' => 'required',
                'jenis_kelamin' => 'required',
                'agama' => 'nullable',
                'status_penduduk' => 'required',
                'akta_kelahiran' => 'required',
                'ttl' => 'required',
                'pendidikan_sedang_ditempuh' => 'required',
                'pekerjaan' => 'required', 
            ]);

            if($request->file('image')){
                $validated['image'] = $request->file('image')->store('post-images');
            }
            
            
    
            // Jika validasi berhasil, lanjutkan menyimpan data
            Penduduk::create($validated);
    
            // Jika berhasil, redirect ke halaman lain
            return redirect()->route('penduduk.index')->with('success', 'Data berhasil disimpan!');
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Tangani jika validasi gagal (opsional, Laravel sudah otomatis menangani pengalihan)
            return redirect()->back()
            ->with('error', 'Pastikan data terisi dengan benar.')  // Menggunakan with untuk menyertakan pesan error
            ->withErrors($e->validator->errors())  // Menyertakan kesalahan validasi
            ->withInput();  // Menyertakan input yang sudah dimasukkan pengguna
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
            'banjar' => $request->banjar,
            'pendidikan' => $request->pendidikan,
            'akta_kelahiran' => $request->akta_kelahiran,
            'umur' => $request->umur,
            'kawin' => $request->kawin,
            'hubungan_keluarga' => $request->hubungan_keluarga,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'status_penduduk' => $request->status_penduduk,
            'ttl' => $request->ttl,
            'pendidikan_sedang_ditempuh' => $request->pendidikan_sedang_ditempuh,
            'pekerjaan' => $request->pekerjaan
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
    if(Auth::user()->username == 'admin'){
        $banjar = $request->banjar;
    }else{
        $banjar = Auth::user()->banjar;
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
            return $query->where('status_penduduk', $status);
        })->when($jenis_kelamin, function ($query) use ($jenis_kelamin) {
            return $query->where('jenis_kelamin', $jenis_kelamin);
        })->when($banjar, function ($query) use ($banjar) {
            return $query->where('banjar', $banjar);
        })->when($umur, function ($query) use ($umur) {
            return $query->where('umur', $umur);
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
    if(Auth::user()->username == 'admin'){
        $banjar = $request->banjar;
    }else{
        $banjar = Auth::user()->banjar;
    }

    $penduduks = Penduduk::query()
        ->where(function ($query) use ($search) {
            $query->where('hubungan_keluarga', 'Kepala Keluarga')
                  ->where(function ($q) use ($search) {
                      if ($search) {
                          $q->where('nama', 'LIKE', "%$search%")
                            ->orWhere('no_kk', 'LIKE', "%$search%")
                            ->orWhere('nik', 'LIKE', "%$search%");
                      }
                  });
        })
        ->when($status, function ($query) use ($status) {
            return $query->where('status_penduduk', $status);
        })
        ->when($jenis_kelamin, function ($query) use ($jenis_kelamin) {
            return $query->where('jenis_kelamin', $jenis_kelamin);
        })
        ->when($banjar, function ($query) use ($banjar) {
            return $query->where('banjar', $banjar);
        })
        ->when($umur, function ($query) use ($umur) {
            return $query->where('umur', $umur);
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
        $banjar = Banjar::all();
        $type = 'penduduk';

        return view('penduduk.detail_penduduk', compact('penduduk', 'banjar','type'));
    }

    public function detail_keluarga($id){
        $penduduk = Penduduk::find($id);
        $banjar = Banjar::all();
        $type = 'keluarga';

        return view('keluarga.detail_keluarga', compact('penduduk', 'banjar', 'type'));
    }




    
}