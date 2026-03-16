<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <title>Daftar Isi Materi - GrafLearn</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;600&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { 
            darkMode: 'class', 
            theme: { 
                extend: { 
                    colors: { 
                        primary: '#2563EB', 
                        dark: '#0F172A', 
                        darker: '#0B1120', 
                        surface: '#F8FAFC',
                        cardDark: '#1E293B' // Warna card dark mode persis referensi
                    } 
                } 
            } 
        }
    </script>
</head>
<body class="bg-surface dark:bg-darker text-slate-800 dark:text-slate-200 antialiased pt-24 min-h-screen flex flex-col transition-colors duration-300">
    
    @include('includes.header_landing')

    <main class="flex-1">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 pb-20 mt-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <h1 class="text-3xl md:text-4xl font-black text-slate-900 dark:text-white uppercase tracking-wide">Daftar Isi Materi</h1>
                <div class="w-16 h-1.5 bg-primary mx-auto mt-4 rounded-full"></div>
                <p class="mt-5 text-slate-600 dark:text-slate-400 text-lg">Silabus pembelajaran terstruktur dari konsep dasar hingga implementasi algoritma.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                
                <div class="bg-white dark:bg-cardDark rounded-2xl border border-slate-200 dark:border-slate-700/60 p-6 md:p-8 shadow-sm hover:shadow-xl dark:shadow-none dark:hover:border-blue-500/50 transition-all duration-300 hover:-translate-y-1">
                    <div class="flex items-center gap-4 mb-6 border-b border-slate-100 dark:border-slate-700/60 pb-5">
                        <div class="w-11 h-11 rounded-xl bg-primary text-white flex items-center justify-center font-black text-xl shadow-md shadow-blue-500/30 shrink-0">1</div>
                        <h3 class="font-extrabold text-slate-800 dark:text-white uppercase tracking-wider text-[15px]">Dasar-Dasar Graf</h3>
                    </div>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3 text-slate-600 dark:text-slate-300 text-sm font-medium"><div class="w-1.5 h-1.5 rounded-full bg-blue-400 mt-1.5 shrink-0"></div> Mengapa Kita Perlu Graf?</li>
                        <li class="flex items-start gap-3 text-slate-600 dark:text-slate-300 text-sm font-medium"><div class="w-1.5 h-1.5 rounded-full bg-blue-400 mt-1.5 shrink-0"></div> Komponen Utama Graf</li>
                        <li class="flex items-start gap-3 text-slate-600 dark:text-slate-300 text-sm font-medium"><div class="w-1.5 h-1.5 rounded-full bg-blue-400 mt-1.5 shrink-0"></div> Jenis-Jenis Karakteristik Graf</li>
                        <li class="flex items-start gap-3 text-slate-600 dark:text-slate-300 text-sm font-medium"><div class="w-1.5 h-1.5 rounded-full bg-blue-400 mt-1.5 shrink-0"></div> Representasi Graf di Dunia Nyata</li>
                        
                        <div class="pt-2"></div>
                        <li class="flex items-center gap-3 text-slate-800 dark:text-slate-200 font-semibold text-sm"><i class="fa-solid fa-list-check text-blue-500 w-4 text-center"></i> Kuis Modul 1</li>
                        <li class="flex items-center gap-3 text-slate-800 dark:text-slate-200 font-semibold text-sm"><i class="fa-solid fa-book-journal-whills text-blue-500 w-4 text-center"></i> Jurnal Refleksi</li>
                    </ul>
                </div>

                <div class="bg-white dark:bg-cardDark rounded-2xl border border-slate-200 dark:border-slate-700/60 p-6 md:p-8 shadow-sm hover:shadow-xl dark:shadow-none dark:hover:border-blue-500/50 transition-all duration-300 hover:-translate-y-1">
                    <div class="flex items-center gap-4 mb-6 border-b border-slate-100 dark:border-slate-700/60 pb-5">
                        <div class="w-11 h-11 rounded-xl bg-primary text-white flex items-center justify-center font-black text-xl shadow-md shadow-blue-500/30 shrink-0">2</div>
                        <h3 class="font-extrabold text-slate-800 dark:text-white uppercase tracking-wider text-[15px]">Representasi Graf</h3>
                    </div>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3 text-slate-600 dark:text-slate-300 text-sm font-medium"><div class="w-1.5 h-1.5 rounded-full bg-blue-400 mt-1.5 shrink-0"></div> Implementasi Dasar Python</li>
                        <li class="flex items-start gap-3 text-slate-600 dark:text-slate-300 text-sm font-medium"><div class="w-1.5 h-1.5 rounded-full bg-blue-400 mt-1.5 shrink-0"></div> Adjacency List</li>
                        <li class="flex items-start gap-3 text-slate-600 dark:text-slate-300 text-sm font-medium"><div class="w-1.5 h-1.5 rounded-full bg-blue-400 mt-1.5 shrink-0"></div> Adjacency Matrix</li>
                        
                        <div class="pt-2"></div>
                        <li class="flex items-center gap-3 text-slate-800 dark:text-slate-200 font-semibold text-sm"><i class="fa-solid fa-laptop-code text-blue-500 w-4 text-center"></i> Praktikum Live Coding</li>
                        <li class="flex items-center gap-3 text-slate-800 dark:text-slate-200 font-semibold text-sm"><i class="fa-solid fa-list-check text-blue-500 w-4 text-center"></i> Kuis Modul 2</li>
                        <li class="flex items-center gap-3 text-slate-800 dark:text-slate-200 font-semibold text-sm"><i class="fa-solid fa-book-journal-whills text-blue-500 w-4 text-center"></i> Jurnal Refleksi</li>
                    </ul>
                </div>

                <div class="bg-white dark:bg-cardDark rounded-2xl border border-slate-200 dark:border-slate-700/60 p-6 md:p-8 shadow-sm hover:shadow-xl dark:shadow-none dark:hover:border-blue-500/50 transition-all duration-300 hover:-translate-y-1">
                    <div class="flex items-center gap-4 mb-6 border-b border-slate-100 dark:border-slate-700/60 pb-5">
                        <div class="w-11 h-11 rounded-xl bg-primary text-white flex items-center justify-center font-black text-xl shadow-md shadow-blue-500/30 shrink-0">3</div>
                        <h3 class="font-extrabold text-slate-800 dark:text-white uppercase tracking-wider text-[15px]">Penelusuran Graf</h3>
                    </div>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3 text-slate-600 dark:text-slate-300 text-sm font-medium"><div class="w-1.5 h-1.5 rounded-full bg-blue-400 mt-1.5 shrink-0"></div> Breadth-First Search (BFS)</li>
                        <li class="flex items-start gap-3 text-slate-600 dark:text-slate-300 text-sm font-medium"><div class="w-1.5 h-1.5 rounded-full bg-blue-400 mt-1.5 shrink-0"></div> Depth-First Search (DFS)</li>
                        
                        <div class="pt-2"></div>
                        <li class="flex items-center gap-3 text-slate-800 dark:text-slate-200 font-semibold text-sm"><i class="fa-solid fa-laptop-code text-blue-500 w-4 text-center"></i> Praktikum Live Coding</li>
                        <li class="flex items-center gap-3 text-slate-800 dark:text-slate-200 font-semibold text-sm"><i class="fa-solid fa-list-check text-blue-500 w-4 text-center"></i> Kuis Modul 3</li>
                        <li class="flex items-center gap-3 text-slate-800 dark:text-slate-200 font-semibold text-sm"><i class="fa-solid fa-book-journal-whills text-blue-500 w-4 text-center"></i> Jurnal Refleksi</li>
                    </ul>
                </div>

                <div class="bg-white dark:bg-cardDark rounded-2xl border border-slate-200 dark:border-slate-700/60 p-6 md:p-8 shadow-sm hover:shadow-xl dark:shadow-none dark:hover:border-blue-500/50 transition-all duration-300 hover:-translate-y-1">
                    <div class="flex items-center gap-4 mb-6 border-b border-slate-100 dark:border-slate-700/60 pb-5">
                        <div class="w-11 h-11 rounded-xl bg-primary text-white flex items-center justify-center font-black text-xl shadow-md shadow-blue-500/30 shrink-0">4</div>
                        <h3 class="font-extrabold text-slate-800 dark:text-white uppercase tracking-wider text-[15px]">Algoritma Jalur Terpendek</h3>
                    </div>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3 text-slate-600 dark:text-slate-300 text-sm font-medium"><div class="w-1.5 h-1.5 rounded-full bg-blue-400 mt-1.5 shrink-0"></div> Modifikasi Memori (Nested Dictionary)</li>
                        <li class="flex items-start gap-3 text-slate-600 dark:text-slate-300 text-sm font-medium"><div class="w-1.5 h-1.5 rounded-full bg-blue-400 mt-1.5 shrink-0"></div> Logika Infinity & Tabel Jarak</li>
                        <li class="flex items-start gap-3 text-slate-600 dark:text-slate-300 text-sm font-medium"><div class="w-1.5 h-1.5 rounded-full bg-blue-400 mt-1.5 shrink-0"></div> Proses Relaxation (Jantung Dijkstra)</li>
                        
                        <div class="pt-2"></div>
                        <li class="flex items-center gap-3 text-slate-800 dark:text-slate-200 font-semibold text-sm"><i class="fa-solid fa-laptop-code text-blue-500 w-4 text-center"></i> Praktikum Live Coding</li>
                        <li class="flex items-center gap-3 text-slate-800 dark:text-slate-200 font-semibold text-sm"><i class="fa-solid fa-list-check text-blue-500 w-4 text-center"></i> Kuis Modul 4</li>
                        <li class="flex items-center gap-3 text-slate-800 dark:text-slate-200 font-semibold text-sm"><i class="fa-solid fa-book-journal-whills text-blue-500 w-4 text-center"></i> Jurnal Refleksi</li>
                    </ul>
                </div>

                <div class="bg-white dark:bg-cardDark rounded-2xl border border-slate-200 dark:border-slate-700/60 p-6 md:p-8 shadow-sm hover:shadow-xl dark:shadow-none dark:hover:border-amber-500/50 transition-all duration-300 hover:-translate-y-1 md:col-span-2">
                    <div class="flex items-center gap-4 mb-5 border-b border-slate-100 dark:border-slate-700/60 pb-5">
                        <div class="w-11 h-11 rounded-xl bg-amber-500 text-white flex items-center justify-center font-black text-xl shadow-md shadow-amber-500/30 shrink-0">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </div>
                        <h3 class="font-extrabold text-slate-800 dark:text-white uppercase tracking-wider text-[15px]">Pengujian Akhir & Refleksi</h3>
                    </div>
                    <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed font-medium">
                        Setiap akhir modul dilengkapi dengan Kuis Evaluasi objektif. Pada tahap paling akhir, Anda diwajibkan menyelesaikan <strong class="text-slate-800 dark:text-slate-200">Ujian Post-Test komprehensif</strong> untuk mengukur keseluruhan pemahaman Anda terhadap struktur data graf dan mendapatkan nilai kelulusan akhir.
                    </p>
                </div>
            </div>
        </div>
    </main>

    {{-- FOOTER (Sederhana agar tidak terpotong) --}}
    <footer class="bg-white dark:bg-darker border-t border-slate-200 dark:border-slate-800 transition-colors duration-300 py-8 mt-auto">
        <div class="max-w-7xl mx-auto px-6 text-center text-sm text-slate-500 dark:text-slate-400">
            &copy; {{ date('Y') }} GrafLearn. Dikembangkan untuk tugas akhir.
        </div>
    </footer>

    <script src="{{ asset('js/landing.js') }}"></script>
</body>
</html>