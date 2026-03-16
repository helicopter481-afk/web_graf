@php
    // ambil user login, pakai dummy jika belum login (untuk preview)
    $user = auth()->user() ?? (object) [
        'name' => 'Mahasiswa',
        'role' => 'Student',
    ];
@endphp

<header class="fixed top-0 left-0 right-0 h-[77px] bg-white dark:bg-[#111827] border-b border-slate-200 dark:border-[#1F2937] z-50 transition-colors duration-300">
    <div class="h-full px-6 sm:px-10 flex items-center justify-between">
        <div class="flex items-center gap-3 sm:gap-5">
            {{-- <button id="sidebar-toggle" class="md:hidden p-3 rounded-lg hover:bg-teal-50" aria-label="Toggle sidebar">
                <svg xmlns="hittp://www.w3.org/2000/svg" class="w-6 h-6 text-slate-800 dark:text-slate-200" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button> --}}

            <a href="{{ route('dashboard') }}"
                class="flex items-center gap-3 sm:gap-4 hover:opacity-90 transition-opacity">
                <img src="{{ asset('images/logo_aplikasi.png') }}" alt="Logo Aplikasi"
                    class="w-12 h-12 sm:w-[52px] sm:h-[52px] rounded-xl object-cover shadow-md border-2 border-slate-800 dark:border-slate-600" />
                <div>
                    <div class="font-bold text-[22px] sm:text-[26px] text-blue-600 dark:text-blue-400">GrafLearn</div>
                    <div class="text-[12px] text-slate-400 -mt-0.5 hidden sm:block">Belajar Struktur Data Graf</div>
                </div>
            </a>
        </div>

        <nav class="flex items-center gap-5 sm:gap-6">
            <button id="theme-toggle" class="p-3 rounded-lg hover:bg-slate-100 dark:hover:bg-[#1F2937] transition-colors" title="Ganti mode tema">
                <svg id="theme-toggle-icon" xmlns="http://www.w3.org/2000/svg" class="w-[26px] h-[26px] text-slate-800 dark:text-slate-200"
                    viewBox="0 0 24 24" fill="currentColor">
                    <path d="M21 12.79A9 9 0 1111.21 3a7 7 0 109.79 9.79z" />
                </svg>
            </button>

            <div class="flex items-center gap-4 sm:gap-5">
                <div class="hidden sm:block text-right leading-tight">
                    <div class="font-bold text-[15px] text-slate-800 dark:text-slate-100">{{ $user->name }}</div>
                    <div class="text-slate-500 dark:text-slate-400 text-[14px]">
                        {{-- Logika Translate Sederhana di View --}}
                        {{ $user->role == 'student' ? 'Mahasiswa' : ($user->role == 'admin' ? 'Dosen' : $user->role) }}
                    </div>
                </div>

                <a href="{{ route('logout') }}" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   class="hidden sm:inline-block text-[15px] px-5 py-2.5 rounded-lg bg-slate-100 text-slate-700 hover:bg-slate-200 dark:bg-[#1F2937] dark:text-slate-200 dark:hover:bg-slate-700 transition-colors font-medium border border-transparent dark:border-slate-600">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </div>
        </nav>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // sidebar mobile
        var btnSidebar = document.getElementById('sidebar-toggle');
        var sidebar = document.querySelector('aside');

        if (btnSidebar && sidebar) {
            btnSidebar.addEventListener('click', function() {
                sidebar.classList.toggle('hidden');
            });
        }

        // tema
        var btnTheme = document.getElementById('theme-toggle');
        var html = document.documentElement;
        var saved = localStorage.getItem('theme');

        // cek tema tersimpan
        if (saved === 'dark') {
            html.classList.add('dark');
        } else if (saved === 'light') {
            html.classList.remove('dark');
        } else {
            // ikut tema sistem
            if (window.matchMedia &&
                window.matchMedia('(prefers-color-scheme: dark)').matches) {
                html.classList.add('dark');
            }
        }

        // klik tombol tema
        if (btnTheme) {
            btnTheme.addEventListener('click', function() {
                var isDark = html.classList.toggle('dark');
                localStorage.setItem('theme', isDark ? 'dark' : 'light');
            });
        }
    });
</script>

<style>
    /* Transisi untuk pergantian tema */
    body {
        transition: background-color 0.3s ease, color 0.3s ease;
    }
</style>