<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - GrafLearn</title>
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- Tambahkan FontAwesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 min-h-screen flex items-center justify-center p-4 py-8">

    <div class="w-full max-w-md bg-white rounded-3xl shadow-xl border border-slate-100 overflow-hidden">
        <div class="p-8">
            {{-- HEADER BRANDING --}}
            <div class="flex justify-center mb-8">
                <a href="{{ url('/') }}" class="flex items-center gap-3 sm:gap-4 hover:opacity-90 transition-opacity">
                    <img src="{{ asset('images/logo_aplikasi.png') }}" alt="Logo Aplikasi"
                        class="w-12 h-12 sm:w-[52px] sm:h-[52px] rounded-xl object-cover shadow-md border-2 border-slate-800" />
                    <div class="text-left">
                        <div class="font-bold text-[22px] sm:text-[26px] text-blue-600 leading-none">GrafLearn</div>
                        <div class="text-[12px] text-slate-400 mt-1">Belajar Struktur Data Graf</div>
                    </div>
                </a>
            </div>

            <h2 class="text-xl font-bold text-slate-800 text-center mb-2">Buat Akun Baru</h2>
            <p class="text-sm text-slate-500 text-center mb-6">Isi data diri kamu untuk mulai belajar.</p>

            @if ($errors->any())
                <div class="mb-4 p-3 bg-red-50 border border-red-200 text-red-600 text-sm rounded-lg">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register.post') }}" method="POST">
                @csrf
                
                <div class="mb-4">
                    <label class="block text-xs font-bold text-slate-700 mb-1 uppercase">Nama Lengkap</label>
                    <input type="text" name="name" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition-all text-sm bg-white" placeholder="Masukkan nama lengkapmu" required value="{{ old('name') }}">
                </div>

                <div class="mb-4">
                    <label class="block text-xs font-bold text-slate-700 mb-1 uppercase">Email</label>
                    <input type="email" name="email" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition-all text-sm bg-white" placeholder="nama@email.com" required value="{{ old('email') }}">
                </div>

                <div class="mb-4">
                    <label class="block text-xs font-bold text-slate-700 mb-1 uppercase">Token Kelas</label>
                    {{-- Menggunakan border solid biasa agar seragam dengan input lain --}}
                    <input type="text" name="token_kelas" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition-all text-sm font-mono text-blue-600 placeholder-slate-400 bg-white" placeholder="Contoh: GRAF-A1" required value="{{ old('token_kelas') }}">
                    <p class="text-[10px] text-slate-400 mt-1">*Minta token kelas kepada dosen pengampu.</p>
                </div>

                {{-- PASSWORD UTAMA --}}
                <div class="mb-4">
                    <label class="block text-xs font-bold text-slate-700 mb-1 uppercase">Password</label>
                    <div class="relative">
                        <input type="password" name="password" id="password" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition-all text-sm bg-white pr-10" placeholder="Minimal 6 karakter" required>
                        <button type="button" onclick="togglePassword('password', 'eye-icon-1')" class="absolute inset-y-0 right-0 px-3 flex items-center text-slate-400 hover:text-slate-600 transition-colors">
                            <i id="eye-icon-1" class="fa-solid fa-eye"></i>
                        </button>
                    </div>
                </div>

                {{-- KONFIRMASI PASSWORD --}}
                <div class="mb-6">
                    <label class="block text-xs font-bold text-slate-700 mb-1 uppercase">Konfirmasi Password</label>
                    <div class="relative">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition-all text-sm bg-white pr-10" placeholder="Ulangi password" required>
                        <button type="button" onclick="togglePassword('password_confirmation', 'eye-icon-2')" class="absolute inset-y-0 right-0 px-3 flex items-center text-slate-400 hover:text-slate-600 transition-colors">
                            <i id="eye-icon-2" class="fa-solid fa-eye"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-xl shadow-lg shadow-blue-500/30 transition-all active:scale-[0.98]">
                    Daftar Sekarang
                </button>
            </form>

            <div class="mt-6 text-center text-sm text-slate-500">
                Sudah punya akun? 
                <a href="{{ route('login') }}" class="text-blue-600 font-bold hover:underline">Masuk (Login)</a>
            </div>
        </div>
    </div>

    {{-- SCRIPT TOGGLE PASSWORD --}}
    <script>
        function togglePassword(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);

            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                input.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }
    </script>

</body>
</html>