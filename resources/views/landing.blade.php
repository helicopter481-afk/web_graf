<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <title>GrafLearn - Eksplorasi Struktur Data Graf</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;600&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    
    <script>
        tailwind.config = {
            darkMode: 'class', // PASTIKAN DARK MODE AKTIF
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        mono: ['Fira Code', 'monospace'],
                    },
                    colors: {
                        primary: '#2563EB',   // Blue 600
                        primaryHover: '#1D4ED8', // Blue 700
                        accent: '#0891B2',    // Cyan 600
                        dark: '#0F172A',      // Slate 900
                        darker: '#0B1120',    // Untuk background utama dark mode
                        surface: '#F8FAFC',   // Slate 50
                        borderline: '#E2E8F0' // Slate 200
                    },
                    boxShadow: {
                        'float': '0 4px 24px -6px rgba(15, 23, 42, 0.08)',
                        'glow': '0 0 20px rgba(37, 99, 235, 0.3)'
                    }
                }
            }
        }
    </script>

    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
    
    <style>
        /* Custom Background Pattern untuk Hero */
        .bg-grid-pattern {
            background-image: 
                linear-gradient(to right, rgba(255,255,255,0.05) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255,255,255,0.05) 1px, transparent 1px);
            background-size: 32px 32px;
        }
        .mask-radial {
            mask-image: radial-gradient(ellipse 80% 50% at 50% 0%, #000 60%, transparent 100%);
            -webkit-mask-image: radial-gradient(ellipse 80% 50% at 50% 0%, #000 60%, transparent 100%);
        }
    </style>
</head>

<body class="bg-white dark:bg-darker text-slate-800 dark:text-slate-200 selection:bg-primary/20 selection:text-primary antialiased transition-colors duration-300">

    {{-- navbar landing --}}
    @include('includes.header_landing')

    <main>
        {{-- SECTION HERO (Gelap & Elegan) --}}
        <section class="relative bg-dark pt-32 pb-20 md:pt-40 md:pb-28 overflow-hidden">
            <div class="absolute inset-0 bg-grid-pattern mask-radial pointer-events-none"></div>
            <canvas id="graphCanvas" class="absolute inset-0 w-full h-full opacity-20 pointer-events-none"></canvas>

            <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
                <div class="max-w-3xl mx-auto text-center">
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/5 border border-white/10 text-slate-300 text-xs font-mono font-medium tracking-wide mb-6">
                        <span class="w-2 h-2 rounded-full bg-accent"></span>
                        Platform Pembelajaran Terintegrasi
                    </div>
                    
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white leading-tight tracking-tight">
                        Pahami Struktur Data Graf <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-400">Secara Visual</span>
                    </h1>
                    
                    <p class="mt-6 text-lg md:text-xl text-slate-400 leading-relaxed max-w-2xl mx-auto">
                        Pelajari teori, lihat visualisasi interaktifnya, dan tulis kode Python secara langsung melalui satu jendela peramban. Tanpa perlu konfigurasi tambahan.
                    </p>

                    <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
                        @auth
                            <a href="{{ route('dashboard') }}"
                               class="w-full sm:w-auto px-8 py-3.5 bg-primary hover:bg-primaryHover text-white font-semibold rounded-lg shadow-glow transition-all active:scale-95 text-center">
                                Lanjutkan Belajar
                            </a>
                        @else
                            <a href="{{ route('register') }}"
                               class="w-full sm:w-auto px-8 py-3.5 bg-primary hover:bg-primaryHover text-white font-semibold rounded-lg shadow-glow transition-all active:scale-95 text-center">
                                Buat Akun Sekarang
                            </a>
                            <a href="{{ route('login') }}"
                               class="w-full sm:w-auto px-8 py-3.5 bg-transparent text-white border border-slate-700 hover:bg-slate-800 font-semibold rounded-lg transition-all active:scale-95 text-center">
                                Masuk
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </section>

        {{-- SECTION FITUR (DIREVISI MENJADI 3 KOTAK UTAMA) --}}
        <section id="fitur" class="py-20 md:py-28 bg-surface dark:bg-dark border-b border-borderline dark:border-slate-800 transition-colors duration-300">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="text-center max-w-2xl mx-auto mb-16">
                    <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight">Fasilitas Pembelajaran</h2>
                    <p class="mt-4 text-slate-600 dark:text-slate-400 text-lg">
                        Sistem dirancang untuk menyederhanakan konsep rumit menjadi materi yang siap dipraktikkan.
                    </p>
                </div>

                {{-- Ubah menjadi 3 Kolom agar lebih lega dan proporsional --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    
                    {{-- Kotak 1: Visualisasi --}}
                    <div class="bg-white dark:bg-slate-800/50 p-8 rounded-3xl border border-borderline dark:border-slate-700 shadow-float hover:border-primary/30 dark:hover:border-primary/50 transition-colors">
                        <div class="w-14 h-14 rounded-xl bg-blue-50 dark:bg-primary/20 text-primary dark:text-blue-400 flex items-center justify-center mb-6">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">Visualisasi Interaktif</h3>
                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                            Pahami konsep abstrak struktur data graf melalui representasi visual dinamis yang secara langsung merespons setiap interaksi dan klik Anda.
                        </p>
                    </div>

                    {{-- Kotak 2: Live Coding --}}
                    <div class="bg-white dark:bg-slate-800/50 p-8 rounded-3xl border border-borderline dark:border-slate-700 shadow-float hover:border-primary/30 dark:hover:border-primary/50 transition-colors">
                        <div class="w-14 h-14 rounded-xl bg-blue-50 dark:bg-primary/20 text-primary dark:text-blue-400 flex items-center justify-center mb-6">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">Live Coding Python</h3>
                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                            Praktikkan langsung algoritma yang dipelajari. Tulis, modifikasi, dan jalankan kode Python secara <em>real-time</em> tepat di dalam peramban Anda.
                        </p>
                    </div>

                    {{-- Kotak 3: Pembelajaran Terstruktur (Evaluasi Otomatis + Scaffolding) --}}
                    <div class="bg-white dark:bg-slate-800/50 p-8 rounded-3xl border border-borderline dark:border-slate-700 shadow-float hover:border-primary/30 dark:hover:border-primary/50 transition-colors">
                        <div class="w-14 h-14 rounded-xl bg-blue-50 dark:bg-primary/20 text-primary dark:text-blue-400 flex items-center justify-center mb-6">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">Pembelajaran Terstruktur</h3>
                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                            Kuasai BFS, DFS, hingga Dijkstra tahap demi tahap. Sistem akan mengevaluasi otomatis kode Anda dan membuka materi lanjutan (<em>scaffolding</em>).
                        </p>
                    </div>

                </div>
            </div>
        </section>

        {{-- SECTION TENTANG (Layout Berimbang) --}}
        <section id="tentang" class="py-20 md:py-28 bg-white dark:bg-darker transition-colors duration-300">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
                    
                    <div class="order-2 lg:order-1">
                        <div class="text-primary dark:text-blue-400 font-bold text-sm tracking-wider uppercase mb-3">Pendekatan Terstruktur</div>
                        <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 dark:text-white mb-6">Mengapa GrafLearn?</h2>
                        <p class="text-slate-600 dark:text-slate-400 text-base md:text-lg leading-relaxed mb-6">
                            Mempelajari struktur data berbasis graf seringkali terhambat oleh proses instalasi lingkungan pemrograman yang rumit dan absennya simulasi bentuk visual.
                        </p>
                        <p class="text-slate-600 dark:text-slate-400 text-base md:text-lg leading-relaxed mb-8">
                            GrafLearn mengeliminasi batasan tersebut. Modul disusun secara kronologis mulai dari konsep dasar <strong class="text-slate-800 dark:text-slate-200 font-semibold">Node</strong> dan <strong class="text-slate-800 dark:text-slate-200 font-semibold">Edge</strong>, hingga implementasi algoritma penelusuran (BFS/DFS) dan pencarian rute terpendek (<strong class="text-slate-800 dark:text-slate-200 font-semibold">Dijkstra</strong>).
                        </p>
                        
                        <div class="flex flex-wrap gap-3">
                            <span class="inline-flex items-center px-4 py-2 rounded-lg bg-surface dark:bg-slate-800 border border-borderline dark:border-slate-700 text-sm font-medium text-slate-700 dark:text-slate-300">
                                <svg class="w-4 h-4 mr-2 text-primary dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Tanpa Konfigurasi Awal
                            </span>
                            <span class="inline-flex items-center px-4 py-2 rounded-lg bg-surface dark:bg-slate-800 border border-borderline dark:border-slate-700 text-sm font-medium text-slate-700 dark:text-slate-300">
                                <svg class="w-4 h-4 mr-2 text-primary dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Kurikulum Bertahap
                            </span>
                            <span class="inline-flex items-center px-4 py-2 rounded-lg bg-surface dark:bg-slate-800 border border-borderline dark:border-slate-700 text-sm font-medium text-slate-700 dark:text-slate-300">
                                <svg class="w-4 h-4 mr-2 text-primary dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Orientasi Praktik
                            </span>
                        </div>
                    </div>

                    <div class="order-1 lg:order-2">
                        <div class="bg-slate-900 rounded-2xl p-6 shadow-2xl border border-slate-800 relative overflow-hidden">
                            <div class="flex gap-2 mb-6">
                                <div class="w-3 h-3 rounded-full bg-slate-600"></div>
                                <div class="w-3 h-3 rounded-full bg-slate-600"></div>
                                <div class="w-3 h-3 rounded-full bg-slate-600"></div>
                            </div>
                            
                            <svg class="w-full h-48 md:h-64" viewBox="0 0 400 280" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <style>
                                        .node-text { font-family: 'Fira Code', monospace; font-size: 14px; font-weight: bold; fill: #ffffff; }
                                    </style>
                                </defs>
                                <line x1="100" y1="80" x2="300" y2="80" stroke="#334155" stroke-width="3" />
                                <line x1="100" y1="80" x2="200" y2="180" stroke="#334155" stroke-width="3" />
                                <line x1="300" y1="80" x2="200" y2="180" stroke="#334155" stroke-width="3" />
                                <line x1="200" y1="180" x2="80" y2="240" stroke="#334155" stroke-width="3" />
                                <line x1="200" y1="180" x2="320" y2="240" stroke="#334155" stroke-width="3" />
                                
                                <circle cx="100" cy="80" r="18" fill="#2563EB" stroke="#1E3A8A" stroke-width="3" />
                                <text x="100" y="85" text-anchor="middle" class="node-text">A</text>
                                
                                <circle cx="300" cy="80" r="18" fill="#0891B2" stroke="#164E63" stroke-width="3" />
                                <text x="300" y="85" text-anchor="middle" class="node-text">B</text>
                                
                                <circle cx="200" cy="180" r="18" fill="#2563EB" stroke="#1E3A8A" stroke-width="3" />
                                <text x="200" y="185" text-anchor="middle" class="node-text">C</text>
                                
                                <circle cx="80" cy="240" r="18" fill="#0891B2" stroke="#164E63" stroke-width="3" />
                                <text x="80" y="245" text-anchor="middle" class="node-text">D</text>
                                
                                <circle cx="320" cy="240" r="18" fill="#0891B2" stroke="#164E63" stroke-width="3" />
                                <text x="320" y="245" text-anchor="middle" class="node-text">E</text>
                            </svg>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        {{-- SECTION CALL TO ACTION --}}
        <section id="cta" class="py-20 bg-surface dark:bg-dark transition-colors duration-300">
            <div class="max-w-5xl mx-auto px-6 lg:px-8">
                <div class="rounded-3xl bg-slate-900 border border-slate-800 p-10 md:p-16 text-center relative overflow-hidden shadow-2xl">
                    <div class="absolute top-0 right-0 -mt-16 -mr-16 w-64 h-64 bg-primary rounded-full blur-3xl opacity-20 pointer-events-none"></div>
                    <div class="absolute bottom-0 left-0 -mb-16 -ml-16 w-64 h-64 bg-accent rounded-full blur-3xl opacity-20 pointer-events-none"></div>

                    <div class="relative z-10">
                        <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4">
                            Siap Memulai Sesi Belajar Anda?
                        </h2>
                        <p class="text-slate-400 text-lg mb-8 max-w-xl mx-auto">
                            Akses seluruh materi graf dasar hingga lanjut tanpa biaya instalasi perangkat lunak.
                        </p>
                        
                        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                            @auth
                                <a href="{{ route('dashboard') }}" class="w-full sm:w-auto px-8 py-3.5 bg-primary hover:bg-primaryHover text-white font-semibold rounded-lg transition-colors">
                                    Buka Panel Navigasi
                                </a>
                            @else
                                <a href="{{ route('register') }}" class="w-full sm:w-auto px-8 py-3.5 bg-primary hover:bg-primaryHover text-white font-semibold rounded-lg transition-colors">
                                    Registrasi Akun
                                </a>
                                <a href="{{ route('login') }}" class="w-full sm:w-auto px-8 py-3.5 bg-transparent text-white border border-slate-600 hover:bg-slate-700 font-semibold rounded-lg transition-colors">
                                    Log Masuk
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    {{-- FOOTER --}}
    <footer id="kontak" class="bg-white dark:bg-darker border-t border-borderline dark:border-slate-800 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-6 py-10">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/logo_aplikasi.png') }}" alt="Logo GrafLearn" class="w-8 h-8 rounded object-cover border border-slate-200 dark:border-slate-700 bg-white" />
                    <span class="font-bold text-slate-800 dark:text-white text-lg tracking-tight">GrafLearn</span>
                </div>
                
                <div class="text-slate-500 dark:text-slate-400 text-sm text-center md:text-right">
                    <p>&copy; <span id="year">{{ date('Y') }}</span> Muhammad Rifqi Azmi Asshidiqi.</p>
                    <p class="text-xs mt-1">Dikembangkan untuk tugas akhir — Universitas Lambung Mangkurat.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/landing.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Skrip Pindah Halus (Smooth Scrolling)
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    if(targetId === '#') return;
                    
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        targetElement.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start' 
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>