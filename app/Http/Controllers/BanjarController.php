<?php

namespace App\Http\Controllers;

use App\Models\Banjar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BanjarController extends Controller
{
    //
    public function index(){
        $banjars = Banjar::all();
        $total_banjar = $banjars->count();
        $banjar = Banjar::paginate(5);

        return view('banjar.banjar', compact('banjar','total_banjar'));
    }
    public function filterBanjar(Request $request)
    {
        $search = $request->search;

        $banjars = Banjar::query()
        ->when($search, function ($query) use ($search) {
            return $query->where('id', 'LIKE', "%$search%")
                        ->orWhere('banjar', 'LIKE', "%$search%");
        });

        $total = $banjars->count();

        $banjar = $banjars->paginate(5);
        
        return response()->json([
            'table' => view('banjar.partial_table_banjar', compact('banjar'))->render(),
            'pagination' => view('banjar.banjar_paginate', compact('banjar'))->render(),
            'total_banjar' => $total
        ]);
    }

    public function create(){
        return view('banjar.tambah_banjar');
    }

    public function store(Request $request)
    {
         // Buat validator manual agar bisa dikontrol
            $validator = Validator::make($request->all(), [
                'banjar' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/'],
            ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error', 'Pastikan data terisi dengan benar.')
                ->withErrors($validator)
                ->withInput();
        }else{
            Banjar::create([
                'banjar' => $request->banjar
            ]);
        }


        

        return redirect()->route('banjar.index')->with('success', 'Data berhasil disimpan!');
    }


    public function destroy($id)
    {
        //
        $banjar = Banjar::findOrFail($id);
        $banjar->delete();

        return response()->json(['success' => true]);
    }



    public function edit($id){
        $banjar = Banjar::find($id);
        
        return view('banjar.update_banjar', compact('banjar'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'banjar' => 'required|string'
        ]);
        // Cari data berdasarkan ID
        $banjar = Banjar::find($id);

        // Jika tidak ditemukan, redirect dengan pesan error
        if (!$banjar) {
            return redirect()->route('banjar.edit')->with('error', 'Data gagal diperbarui.');
        }

        // Update data
        $banjar->update([
            'banjar' => $validated['banjar'],
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('banjar.index')->with('success', 'Data berhasil diperbarui.');
    }

}