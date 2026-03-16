<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // 1. Tampilkan Halaman Login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // 2. Proses Login
    public function login(Request $request)
    {
        // Validasi Input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Cek apakah user mencentang "Remember Me"
        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            // Cek Role & Redirect
            $role = Auth::user()->role;

            if ($role === 'admin') {
                // Admin ke Dashboard Guru
                return redirect()->route('admin.dashboard');
            } 
            
            // Siswa ke Dashboard Utama (Beranda)
            return redirect()->intended(route('dashboard'));
        }

        // Jika Gagal
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    // 3. Tampilkan Halaman Register
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // 4. Proses Register
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'token_kelas' => 'required|string',
        ]);

        // LOGIKA TOKEN KELAS DINAMIS
        $inputToken = strtoupper(trim($request->token_kelas));
        $kelas = null;

        // Cek apakah token diawali dengan teks "GRAF-"
        if (str_starts_with($inputToken, 'GRAF-')) {
            // Potong 5 huruf pertama ("GRAF-") untuk mengambil nama kelas aslinya
            // Contoh: Jika user input "GRAF-REGULER", $kelas akan berisi "REGULER"
            $kelas = substr($inputToken, 5); 
            
            if (empty($kelas)) {
                return back()->withErrors(['token_kelas' => 'Format Token Kelas tidak lengkap. Harap isi nama kelas setelah strip (-).'])->withInput();
            }
        } else {
            return back()->withErrors(['token_kelas' => 'Token Kelas tidak valid. Token harus diawali dengan GRAF-'])->withInput();
        }

        // Simpan User
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'student',
            'kelas' => $kelas,
        ]);

        // Langsung lempar ke login dengan pesan sukses
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // 5. Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        // Redirect ke halaman Login
        return redirect()->route('login');
    }
}