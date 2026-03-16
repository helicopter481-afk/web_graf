<header class="fixed top-0 inset-x-0 z-50">
    <nav class="glass bg-white/70 dark:bg-darker/80 border-b border-slate-200 dark:border-slate-800 backdrop-blur-md transition-colors duration-300">
        <div class="px-6 sm:px-8 h-16 flex items-center justify-between">
            <a href="{{ route('landing') }}" class="flex items-center gap-2 sm:gap-3 hover:opacity-90 transition-opacity">
                <img src="{{ asset('images/logo_aplikasi.png') }}" alt="Logo Aplikasi"
                     class="w-10 h-10 rounded-xl object-cover shadow-md border border-slate-200 dark:border-slate-700" />
                <div>
                    <div class="font-bold text-lg text-primary dark:text-blue-400">GrafLearn</div>
                    <div class="text-[10px] text-slate-500 dark:text-slate-400 font-medium hidden sm:block leading-tight">Belajar Struktur Data Graf</div>
                </div>
            </a>

            <div class="hidden md:flex items-center gap-6">
                <a href="{{ route('landing') }}" class="text-sm font-semibold {{ request()->routeIs('landing') ? 'text-primary dark:text-blue-400' : 'text-slate-600 dark:text-slate-300 hover:text-primary dark:hover:text-blue-400' }} transition-colors">Beranda</a>
                <a href="{{ route('materi.public') }}" class="text-sm font-semibold {{ request()->routeIs('materi.public') ? 'text-primary dark:text-blue-400' : 'text-slate-600 dark:text-slate-300 hover:text-primary dark:hover:text-blue-400' }} transition-colors">Materi</a>
                <a href="{{ route('petunjuk.public') }}" class="text-sm font-semibold {{ request()->routeIs('petunjuk.public') ? 'text-primary dark:text-blue-400' : 'text-slate-600 dark:text-slate-300 hover:text-primary dark:hover:text-blue-400' }} transition-colors">Petunjuk Penggunaan</a>
                <a href="{{ route('tentang.public') }}" class="text-sm font-semibold {{ request()->routeIs('tentang.public') ? 'text-primary dark:text-blue-400' : 'text-slate-600 dark:text-slate-300 hover:text-primary dark:hover:text-blue-400' }} transition-colors">Tentang</a>
                
                <button id="theme-toggle" class="p-2 rounded-lg text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors" type="button">
                    <svg id="theme-toggle-icon" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M21 12.79A9 9 0 1111.21 3a7 7 0 109.79 9.79z" />
                    </svg>
                </button>

                @guest
                    <a href="{{ url('/register') }}" class="rounded-xl px-4 py-2 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 shadow-sm hover:shadow text-slate-700 dark:text-slate-200 text-sm font-semibold transition-all">
                        Daftar
                    </a>
                    <a href="{{ url('/login') }}" class="rounded-xl px-4 py-2 bg-primary hover:bg-primaryHover text-white shadow-glow text-sm font-semibold transition-all">
                        Login
                    </a>
                @else
                    <a href="{{ route('dashboard') }}" class="rounded-xl px-4 py-2 bg-primary hover:bg-primaryHover text-white shadow-glow text-sm font-semibold transition-all">
                        Dashboard
                    </a>
                @endguest
            </div>
        </div>
    </nav>
</header>