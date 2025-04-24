<?php

namespace App\Http\Controllers;
use App\Models\Banjar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;    
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class LoginController extends Controller
{
    //
    public function index(){
        $banjar = Banjar::all();
        return view('login.login', compact('banjar'));
    }

        public function login(Request $request)
    {
        // dd($request->input());
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'banjar'   => 'required|integer|exists:banjars,id',
        ]);

        $credentials = $request->only('username', 'password');
        $banjar = $request->input('banjar');
        // dd($banjar);
        // Coba login menggunakan Auth::attempt()
        if (Auth::attempt($credentials)) {
            $user = Auth::user(); // Ambil user yang sedang login
            // dd($user->banjar_id);
                if ($user->username !== 'admin' && $banjar != $user->banjar_id) {
                    Auth::logout();
                    return redirect()->back()->with('error', "Akun tidak diizinkan login");
                }

            // Jika berhasil login dan banjar sesuai, arahkan ke dashboard
            return redirect()->route('dashboard')->with('success', "Berhasil Login");
        }

        // Jika login gagal
        return redirect()->route('login')->with('error', 'Username atau password salah');
    }

    public function logout(Request $request)
    {
        // Hapus sesi pengguna
        Session::flush();

        // Logout pengguna
        Auth::logout();

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('login')->with('success', 'Anda telah berhasil logout');
    }

}