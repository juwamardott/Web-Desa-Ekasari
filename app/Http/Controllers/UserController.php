<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Banjar;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
     //
     public function index(){
        $users = User::all();
        $total_user = $users->count();
        $user = User::paginate(5);

        return view('user.user', compact('user','total_user'));
    }
    public function filterUser(Request $request)
    {
        $search = $request->search;

        $users = User::query()
        ->when($search, function ($query) use ($search) {
            return $query->where('id', 'LIKE', "%$search%")
                        ->orWhere('username', 'LIKE', "%$search%")
                        ->orWhere('banjar', 'LIKE', "%$search%");
        });

        $total = $users->count();

        $user = $users->paginate(5);
        
        return response()->json([
            'table' => view('user.partial_table_user', compact('user'))->render(),
            'pagination' => view('user.user_paginate', compact('user'))->render(),
            'total_user' => $total
        ]);
    }

    public function create(){
        $banjar = Banjar::all();
        return view('user.tambah_user', compact('banjar'));
    }

    public function store(Request $request){
        // dd($request->input());
        try {
            // Validasi data request
            $validated = $request->validate([
                'username' => 'required', 
                'banjar' => 'required',
                'password' => 'required'
            ]);

             // Hash password sebelum disimpan
            $validated['password'] = Hash::make($validated['password']);
    
            // Jika validasi berhasil, lanjutkan menyimpan data
            User::create($validated);
    
            // Jika berhasil, redirect ke halaman lain
            return redirect()->route('user.index')->with('success', 'Data berhasil disimpan!');
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Tangani jika validasi gagal (opsional, Laravel sudah otomatis menangani pengalihan)
            return redirect()->back()
            ->with('error', 'Pastikan data terisi dengan benar.')  // Menggunakan with untuk menyertakan pesan error
            ->withErrors($e->validator->errors())  // Menyertakan kesalahan validasi
            ->withInput();  // Menyertakan input yang sudah dimasukkan pengguna
        }
    }


    public function destroy($id)
    {
        //
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['success' => true]);
    }

    public function edit($id){
        $user = User::find($id);
        $banjar = Banjar::all();
        
        return view('user.user_update', compact('user', 'banjar'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data input
        $validated = $request->validate([
            'username' => 'required|string',
            'banjar' => 'required|string',
            'password' => 'nullable', // boleh kosong, tapi kalau diisi harus minimal 6 karakter
        ]);

        // Cari user berdasarkan ID
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('user.index')->with('error', 'User tidak ditemukan.');
        }

        // Update data yang pasti
        $user->username = $validated['username'];
        $user->banjar = $validated['banjar'];

        // Jika password diisi, update dengan hash
        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->route('user.index')->with('success', 'Data berhasil diperbarui!');
    }
}