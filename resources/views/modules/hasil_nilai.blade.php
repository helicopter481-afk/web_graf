<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>GrafLearn — Hasil & Nilai</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'], mono: ['Fira Code', 'monospace'] },
                    colors: {
                        brand: { 50: '#eff6ff', 100: '#dbeafe', 500: '#3b82f6', 600: '#2563eb', 700: '#1d4ed8' },
                        darkbase: '#0B1120', darkcard: '#111827', darkborder: '#1F2937'
                    },
                    boxShadow: { soft: '0 4px 20px -2px rgba(0, 0, 0, 0.05)' }
                }
            }
        }
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #F8FAFC; color: #0F172A; }
        .glass-panel { background: #FFFFFF; border: 1px solid #E2E8F0; box-shadow: 0 4px 20px -2px rgba(0, 0, 0, 0.03); }
        .table-row-hover { transition: all 0.2s; }
        .table-row-hover:hover { background-color: #F8FAFC; }
        
        /* Dark Mode */
        html.dark body { background-color: #0B1120; color: #F1F5F9; }
        html.dark .glass-panel { background: #111827; border-color: #1F2937; }
        html.dark .table-row-hover:hover { background-color: #1F2937; }
        html.dark .bg-slate-50 { background-color: rgba(31, 41, 55, 0.5); }
        html.dark .border-slate-100, html.dark .border-slate-200 { border-color: #1F2937; }
        html.dark .text-slate-800 { color: #F1F5F9; }
        html.dark .text-slate-500 { color: #9CA3AF; }
    </style>
</head>
<body class="h-screen overflow-hidden flex flex-col transition-colors duration-300">

    @include('includes.header')
    @include('includes.sidebar')

    <main class="pt-[77px] md:pl-64 h-screen flex flex-col">
        <div class="flex-1 overflow-y-auto px-5 sm:px-10 py-8">
            <div class="max-w-5xl mx-auto">

                {{-- Header Section --}}
                <div class="mb-8">
                    <h1 class="text-2xl font-extrabold text-slate-800 tracking-tight mb-2">Transkrip Akademik</h1>
                    <p class="text-sm text-slate-500">Pantau progres dan kelengkapan tugas Anda di setiap modul.</p>
                </div>

                {{-- Highlight Stats --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-8">
                    <div class="glass-panel rounded-2xl p-6 flex items-center gap-5">
                        <div class="w-14 h-14 rounded-full bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 flex items-center justify-center text-2xl">
                            <i class="fa-solid fa-chart-line"></i>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Rata-Rata Kuis</p>
                            <h2 class="text-3xl font-black text-slate-800">{{ number_format($rataRataKuis, 1) }}<span class="text-lg text-slate-400 font-medium">/100</span></h2>
                        </div>
                    </div>
                    <div class="glass-panel rounded-2xl p-6 flex items-center gap-5">
                        <div class="w-14 h-14 rounded-full bg-emerald-50 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400 flex items-center justify-center text-2xl">
                            <i class="fa-solid fa-list-check"></i>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Aktivitas Selesai</p>
                            <h2 class="text-3xl font-black text-slate-800">{{ $totalAktivitas }} <span class="text-lg text-slate-400 font-medium">Tugas</span></h2>
                        </div>
                    </div>
                </div>

                {{-- MASTER SILABUS (Menentukan semua aktivitas yang WAJIB ada) --}}
                @php
                    $syllabus = [
                        'bab1' => [
                            'title' => 'Modul 1: Dasar-Dasar Graf',
                            'items' => [
                                ['code' => '1.1', 'name' => 'Aktivitas 1.1: Mengapa Kita Perlu Graf?', 'type' => 'activity', 'icon' => 'fa-book-open'],
                                ['code' => '1.2', 'name' => 'Aktivitas 1.2: Komponen Utama Graf', 'type' => 'activity', 'icon' => 'fa-book-open'],
                                ['code' => '1.3', 'name' => 'Aktivitas 1.3: Jenis Karakteristik Graf', 'type' => 'activity', 'icon' => 'fa-book-open'],
                                ['code' => '1.4', 'name' => 'Aktivitas 1.4: Representasi dalam Kehidupan', 'type' => 'activity', 'icon' => 'fa-book-open'],
                                ['code' => 'quiz1', 'name' => 'Kuis Evaluasi Modul 1', 'type' => 'quiz', 'icon' => 'fa-file-signature'],
                            ]
                        ],
                        'bab2' => [
                            'title' => 'Modul 2: Representasi Graf',
                            'items' => [
                                ['code' => '2.1', 'name' => 'Aktivitas 2.1: Implementasi Dasar', 'type' => 'activity', 'icon' => 'fa-book-open'],
                                ['code' => '2.2', 'name' => 'Aktivitas 2.2: Adjacency List', 'type' => 'activity', 'icon' => 'fa-book-open'],
                                ['code' => '2.3', 'name' => 'Aktivitas 2.3: Adjacency Matrix', 'type' => 'activity', 'icon' => 'fa-book-open'],
                                ['code' => '2.5_praktikum', 'name' => 'Praktikum: Live Coding Representasi', 'type' => 'praktikum', 'icon' => 'fa-laptop-code'],
                                ['code' => 'quiz2', 'name' => 'Kuis Evaluasi Modul 2', 'type' => 'quiz', 'icon' => 'fa-file-signature'],
                            ]
                        ],
                        'bab3' => [
                            'title' => 'Modul 3: Penelusuran Graf',
                            'items' => [
                                ['code' => '3.1', 'name' => 'Aktivitas 3.1: Breadth-First Search (BFS)', 'type' => 'activity', 'icon' => 'fa-book-open'],
                                ['code' => '3.2', 'name' => 'Aktivitas 3.2: Depth-First Search (DFS)', 'type' => 'activity', 'icon' => 'fa-book-open'],
                                ['code' => '3.5_praktikum', 'name' => 'Praktikum: Live Coding Penelusuran', 'type' => 'praktikum', 'icon' => 'fa-laptop-code'],
                                ['code' => 'quiz3', 'name' => 'Kuis Evaluasi Modul 3', 'type' => 'quiz', 'icon' => 'fa-file-signature'],
                            ]
                        ],
                        'bab4' => [
                            'title' => 'Modul 4: Algoritma Dijkstra',
                            'items' => [
                                ['code' => '4.1', 'name' => 'Aktivitas 4.1: Modifikasi Memori', 'type' => 'activity', 'icon' => 'fa-book-open'],
                                ['code' => '4.2', 'name' => 'Aktivitas 4.2: Logika Infinity & Tabel Jarak', 'type' => 'activity', 'icon' => 'fa-book-open'],
                                ['code' => '4.3', 'name' => 'Aktivitas 4.3: Proses Relaxation', 'type' => 'activity', 'icon' => 'fa-book-open'],
                                ['code' => '4.6_praktikum', 'name' => 'Praktikum: Live Coding Dijkstra', 'type' => 'praktikum', 'icon' => 'fa-laptop-code'],
                                ['code' => 'quiz4', 'name' => 'Kuis Evaluasi Modul 4', 'type' => 'quiz', 'icon' => 'fa-file-signature'],
                            ]
                        ],
                        'evaluasi' => [
                            'title' => 'Pengujian Final (Post-Test)',
                            'items' => [
                                ['code' => 'ujian_akhir', 'name' => 'Evaluasi Akhir', 'type' => 'quiz', 'icon' => 'fa-graduation-cap'],
                            ]
                        ]
                    ];
                @endphp

                {{-- Daftar Nilai Per Modul --}}
                <div class="glass-panel rounded-2xl overflow-hidden mb-10">
                    
                    @foreach($syllabus as $chapterCode => $chapterData)
                        <div class="bg-slate-50 dark:bg-[#151e2e] px-6 py-4 border-b border-slate-200 dark:border-slate-800 border-t {{ $loop->first ? 'border-t-0' : '' }}">
                            <h3 class="font-bold text-sm text-slate-800 dark:text-slate-200 uppercase tracking-wider">{{ $chapterData['title'] }}</h3>
                        </div>

                        <div class="px-6 py-2 bg-white dark:bg-[#111827]">
                            <table class="w-full text-left border-collapse">
                                <tbody>
                                    @foreach($chapterData['items'] as $item)
                                        @php
                                            $isDone = false;
                                            $scoreDisplay = '<span class="text-slate-300 dark:text-slate-600">-</span>';
                                            $statusBadge = '<span class="text-[11px] font-bold px-2.5 py-1 rounded bg-slate-100 text-slate-500 dark:bg-slate-800 dark:text-slate-400">Wajib</span>';
                                            $titleColor = 'text-slate-500 dark:text-slate-400';
                                            $iconColor = 'bg-slate-100 text-slate-400 dark:bg-slate-800 dark:text-slate-500';

                                            // Logika Kuis & Ujian (Diambil dari tabel evaluations)
                                            if ($item['type'] === 'quiz') {
                                                $record = collect($evaluations[$chapterCode] ?? [])->firstWhere('section_code', $item['code']);
                                                if ($record) {
                                                    $isDone = true;
                                                    $scoreDisplay = '<span class="font-black text-lg text-slate-800 dark:text-slate-200">' . $record->max_score . '</span>';
                                                    $titleColor = 'text-slate-800 dark:text-slate-200 font-semibold';
                                                    $iconColor = 'bg-brand-50 text-brand-600 dark:bg-brand-900/20 dark:text-brand-400';
                                                    
                                                    // Asumsi KKM = 70
                                                    if ($record->max_score >= 70) {
                                                        $statusBadge = '<span class="text-[11px] font-bold px-2.5 py-1 rounded bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400"><i class="fa-solid fa-check mr-1"></i>Lulus</span>';
                                                    } else {
                                                        $statusBadge = '<span class="text-[11px] font-bold px-2.5 py-1 rounded bg-rose-100 text-rose-700 dark:bg-rose-900/30 dark:text-rose-400">Remedial</span>';
                                                    }
                                                }
                                            } 
                                            // Logika Aktivitas Biasa & Praktikum (Diambil dari tabel progress)
                                            else {
                                                $record = collect($progress[$chapterCode] ?? [])->firstWhere('section_code', $item['code']);
                                                if ($record && $record->score > 0) {
                                                    $isDone = true;
                                                    $titleColor = 'text-slate-800 dark:text-slate-200 font-medium';
                                                    $iconColor = 'bg-emerald-50 text-emerald-600 dark:bg-emerald-900/20 dark:text-emerald-400';
                                                    
                                                    if ($item['type'] === 'praktikum') {
                                                        $isPending = false;
                                                        try {
                                                            $ansData = json_decode($record->answer);
                                                            if (isset($ansData->status) && $ansData->status === 'pending') $isPending = true;
                                                        } catch(\Exception $e) {}

                                                        if ($isPending) {
                                                            $statusBadge = '<span class="text-[11px] font-bold px-2.5 py-1 rounded bg-amber-100 text-amber-700 dark:bg-amber-900/30 dark:text-amber-400">Diperiksa Dosen</span>';
                                                            $scoreDisplay = '<i class="fa-solid fa-clock text-amber-400"></i>';
                                                            $iconColor = 'bg-amber-50 text-amber-600 dark:bg-amber-900/20 dark:text-amber-400';
                                                        } else {
                                                            $statusBadge = '<span class="text-[11px] font-bold px-2.5 py-1 rounded bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400">Dinilai</span>';
                                                            $scoreDisplay = '<span class="font-black text-lg text-slate-800 dark:text-slate-200">' . $record->score . '</span>';
                                                        }
                                                    } else {
                                                        $statusBadge = '<span class="text-[11px] font-bold px-2.5 py-1 rounded bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400"><i class="fa-solid fa-check mr-1"></i>Tuntas</span>';
                                                        $scoreDisplay = '<span class="text-xs font-bold text-emerald-600 dark:text-emerald-400 uppercase tracking-widest">Selesai</span>';
                                                    }
                                                }
                                            }
                                        @endphp

                                        <tr class="border-b border-slate-100 dark:border-slate-800 last:border-0 table-row-hover {{ !$isDone ? 'opacity-70' : '' }}">
                                            <td class="py-4 pl-2">
                                                <div class="flex items-center gap-3">
                                                    <div class="w-8 h-8 rounded flex items-center justify-center {{ $iconColor }}">
                                                        <i class="fa-solid {{ $item['icon'] }} text-xs"></i>
                                                    </div>
                                                    <span class="text-sm {{ $titleColor }}">
                                                        {{ $item['name'] }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="py-4 text-center w-28">
                                                {!! $scoreDisplay !!}
                                            </td>
                                            <td class="py-4 text-right pr-2 w-32">
                                                {!! $statusBadge !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </main>

</body>
</html>