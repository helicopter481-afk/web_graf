<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>GrafLearn - Materi</title>
  
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
        darkMode: 'class', 
        theme: {
            extend: {
                colors: {
                    darkbase: '#0B1120',  
                    darkcard: '#1E293B',  
                    darkborder: '#334155' 
                }
            }
        }
    }
  </script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vis/4.21.0/vis.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/vis/4.21.0/vis.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  <style>
      /* Transisi mulus saat pindah tema */
      body, aside, header, div, p, span, h1, h2, h3, h4, h5, h6, button, a { 
          transition: background-color 0.3s, border-color 0.3s, color 0.3s; 
      }

      /* ==========================================================
         1. KANVAS & GAME AMAN (TETAP PUTIH 100%)
      ========================================================== */
      html.dark #content-area .vis-network,
      html.dark #content-area .sim-card .relative,
      html.dark #content-area .map-wrapper,
      html.dark #content-area [id*="graph-container"] {
          background-color: #FFFFFF !important; border-color: #CBD5E1 !important; border-radius: 0.75rem;
      }
      html.dark #content-area .vis-network *,
      html.dark #content-area .sim-card .relative *,
      html.dark #content-area .map-wrapper * {
          color: #0F172A !important; 
      }

      /* ==========================================================
         2. BACKGROUND GLOBAL (Ubah Putih/Terang -> Gelap)
      ========================================================== */
      html.dark #content-area .bg-white, html.dark #content-area [class*="bg-white"],
      html.dark #content-area [class*="bg-slate-50"], html.dark #content-area [class*="bg-slate-100"], html.dark #content-area [class*="bg-slate-200"],
      html.dark #content-area [class*="bg-gray-50"], html.dark #content-area [class*="bg-gray-100"], html.dark #content-area [class*="bg-gray-200"] {
          background-color: #1E293B !important; border-color: #334155 !important;
      }

      /* ==========================================================
         3. TEKS GLOBAL (Ubah Gelap -> Terang & Pastel)
      ========================================================== */
      html.dark #content-area [class*="text-slate-6"], html.dark #content-area [class*="text-slate-7"], html.dark #content-area [class*="text-slate-8"], html.dark #content-area [class*="text-slate-9"],
      html.dark #content-area [class*="text-gray-"], html.dark #content-area .text-black,
      html.dark #content-area h1, html.dark #content-area h2, html.dark #content-area h3, html.dark #content-area h4 {
          color: #F8FAFC !important;
      }
      
      html.dark #content-area [class*="text-blue-"] { color: #93C5FD !important; }
      html.dark #content-area [class*="text-yellow-"], html.dark #content-area [class*="text-amber-"] { color: #FDE047 !important; }
      html.dark #content-area [class*="text-green-"], html.dark #content-area [class*="text-emerald-"] { color: #6EE7B7 !important; }
      html.dark #content-area [class*="text-red-"], html.dark #content-area [class*="text-rose-"] { color: #FCA5A5 !important; }

      html.dark #content-area button[class*="bg-"] *, html.dark #content-area a[class*="bg-"] * { color: #FFFFFF !important; }

      /* ==========================================================
         4. KOTAK ALERT (Tugas / Fun Fact) SOLID & PEKAT
      ========================================================== */
      html.dark #content-area [class*="bg-blue-50"], html.dark #content-area [class*="bg-blue-100"], html.dark #content-area .bg-indigo-50 { background-color: #172554 !important; border-color: #1E3A8A !important; }
      html.dark #content-area [class*="bg-yellow-50"], html.dark #content-area [class*="bg-amber-50"] { background-color: #422006 !important; border-color: #713F12 !important; }
      html.dark #content-area [class*="bg-green-50"], html.dark #content-area [class*="bg-emerald-50"] { background-color: #022C22 !important; border-color: #064E3B !important; }
      html.dark #content-area [class*="bg-red-50"], html.dark #content-area [class*="bg-rose-50"] { background-color: #4C0519 !important; border-color: #881337 !important; }

      /* ==========================================================
         5. TOMBOL KEMBALI, DRAG & DROP, & INPUT
      ========================================================== */
      html.dark #content-area button.bg-slate-100, html.dark #content-area button.bg-white { background-color: #334155 !important; color: #F8FAFC !important; border: 1px solid #475569 !important; }
      html.dark #content-area button.bg-slate-100:hover, html.dark #content-area button.bg-white:hover { background-color: #475569 !important; color: #FFFFFF !important; }
      
      html.dark .bg-blue-600, html.dark button[class*="bg-blue-"], html.dark a[class*="bg-blue-"] { background-color: #2563EB !important; color: #FFFFFF !important; border-color: #3B82F6 !important; }

      html.dark .source-zone, html.dark .drop-zone { background-color: #0F172A !important; border-color: #334155 !important; }
      html.dark .drag-item, html.dark .draggable-item { background-color: #1E293B !important; color: #F8FAFC !important; border-color: #475569 !important; }
      html.dark .zone-vertex .zone-header { background-color: #172554 !important; color: #93C5FD !important; border-color: #1E3A8A !important; }
      html.dark .zone-edge .zone-header { background-color: #022C22 !important; color: #6EE7B7 !important; border-color: #064E3B !important; }
      html.dark .zone-degree .zone-header { background-color: #2E1065 !important; color: #D8B4FE !important; border-color: #4C1D95 !important; }
      html.dark .zone-distractor .zone-header { background-color: #4C0519 !important; color: #FCA5A5 !important; border-color: #881337 !important; }

      html.dark #content-area select, html.dark #content-area input:not([type="radio"]):not([type="checkbox"]), html.dark #content-area textarea, html.dark body.exam-mode input {
          background-color: #0F172A !important; color: #F8FAFC !important; border-color: #475569 !important;
      }

      /* ==========================================================
         6. THE ULTIMATE QUIZ FIXER (EXAM MODE)
      ========================================================== */
      html.dark body.exam-mode #quiz-wrapper { background-color: #0B1120 !important; }
      html.dark body.exam-mode #area-soal { background-color: transparent !important; }
      
      html.dark body.exam-mode .h-16.bg-white { background-color: #1E293B !important; border-bottom-color: #334155 !important; }
      html.dark body.exam-mode .h-16 .text-slate-800 { color: #F8FAFC !important; }
      html.dark body.exam-mode .h-16 .bg-slate-50 { background-color: #0F172A !important; border-color: #334155 !important; }
      html.dark body.exam-mode #timer-display { color: #F8FAFC !important; }

      html.dark body.exam-mode .blok-soal .bg-white { background-color: #1E293B !important; border-color: #334155 !important; }
      html.dark body.exam-mode .question-text, html.dark body.exam-mode .question-text * { color: #F1F5F9 !important; background-color: transparent !important; }

      html.dark body.exam-mode .choice-btn { background-color: #1E293B !important; border-color: #475569 !important; color: #F8FAFC !important; }
      html.dark body.exam-mode .choice-btn * { color: inherit !important; }
      html.dark body.exam-mode .choice-btn:hover:not(:disabled) { background-color: #334155 !important; border-color: #64748B !important; }
      html.dark body.exam-mode .choice-btn .badge-key { background-color: #0F172A !important; border-color: #334155 !important; color: #94A3B8 !important; }
      
      html.dark body.exam-mode .choice-selected { background-color: #1E3A8A !important; border-color: #3B82F6 !important; color: #FFFFFF !important; }
      html.dark body.exam-mode .choice-selected * { color: inherit !important; }
      html.dark body.exam-mode .choice-selected .badge-key { background-color: #3B82F6 !important; border-color: #60A5FA !important; color: #FFFFFF !important; }

      html.dark body.exam-mode #sidebar-nav { background-color: #1E293B !important; border-color: #334155 !important; }
      html.dark body.exam-mode #sidebar-nav .border-b, html.dark body.exam-mode #sidebar-nav .border-t { border-color: #334155 !important; }
      html.dark body.exam-mode #sidebar-nav .text-slate-400, html.dark body.exam-mode #sidebar-nav .text-slate-500 { color: #CBD5E1 !important; }

      /* --- STYLE KELAS BARU NAVIGASI KUIS (LIGHT & DARK MODE) --- */
      /* Light Mode (Pakai !important agar warna tidak kalah dari CSS Tailwind bawaan) */
      .nav-kosong { background-color: #FFFFFF !important; color: #64748B !important; border-color: #E2E8F0 !important; }
      .nav-aktif { background-color: #1E293B !important; color: #FFFFFF !important; border-color: #0F172A !important; }
      .nav-ragu { background-color: #E2E8F0 !important; color: #475569 !important; border-color: #CBD5E1 !important; }
      .nav-terjawab { background-color: #15803D !important; color: #FFFFFF !important; border-color: #15803D !important; }

      /* Dark Mode */
      html.dark body.exam-mode .nav-kosong { background-color: #1E293B !important; border-color: #334155 !important; color: #94A3B8 !important; }
      html.dark body.exam-mode .nav-kosong:hover { background-color: #334155 !important; }
      html.dark body.exam-mode .nav-aktif { background-color: #3B82F6 !important; border-color: #60A5FA !important; color: #FFFFFF !important; }
      html.dark body.exam-mode .nav-ragu { background-color: #F59E0B !important; border-color: #FCD34D !important; color: #FFFFFF !important; } 
      html.dark body.exam-mode .nav-terjawab { background-color: #10B981 !important; border-color: #34D399 !important; color: #FFFFFF !important; } 

      /* Menyelaraskan Legenda Navigasi di Bawah Sidebar */
      html.dark body.exam-mode .bg-slate-900.rounded-sm { background-color: #3B82F6 !important; } 
      html.dark body.exam-mode .bg-green-700.rounded-sm { background-color: #10B981 !important; } 
      html.dark body.exam-mode .bg-gray-400.rounded-sm { background-color: #F59E0B !important; }  
      html.dark body.exam-mode .w-3.h-3.bg-white { background-color: #1E293B !important; border-color: #334155 !important; } 

      html.dark body.exam-mode button.bg-slate-100.text-slate-600 { background-color: #334155 !important; color: #F8FAFC !important; border: 1px solid #475569 !important; }
      html.dark body.exam-mode button.bg-slate-100.text-slate-600:hover { background-color: #475569 !important; }

      html.dark body.exam-mode #navigasi-bawah { background-color: #1E293B !important; border-color: #334155 !important; }
      html.dark body.exam-mode #btn-prev { background-color: #0F172A !important; border-color: #475569 !important; color: #F8FAFC !important; }
      html.dark body.exam-mode #btn-prev:hover { background-color: #334155 !important; }
      html.dark body.exam-mode #btn-next { background-color: #3B82F6 !important; color: #FFFFFF !important; }

      html.dark #modal-mulai .bg-white, html.dark #modal-konfirmasi .bg-white, html.dark #modal-hasil.bg-white { background-color: #1E293B !important; border-color: #334155 !important; }
      html.dark #modal-mulai .bg-slate-50, html.dark #modal-hasil .bg-slate-50 { background-color: #0F172A !important; border-color: #334155 !important; }
      html.dark #modal-mulai .text-slate-700, html.dark #modal-konfirmasi .text-slate-600 { color: #E2E8F0 !important; }
      html.dark #modal-mulai .text-slate-900, html.dark #modal-konfirmasi .text-slate-800 { color: #FFFFFF !important; }
      html.dark #modal-hasil .text-slate-800 { color: #F8FAFC !important; }
      html.dark #modal-hasil .btn-ulangi-quiz, html.dark #modal-hasil .btn-dashboard { background-color: #0F172A !important; color: #F8FAFC !important; border-color: #475569 !important;}
      html.dark #modal-hasil .btn-ulangi-quiz:hover, html.dark #modal-hasil .btn-dashboard:hover { background-color: #334155 !important; }

      i:empty { display: none !important; }
  </style>
</head>
<body class="bg-slate-50 dark:bg-darkbase text-slate-800 dark:text-slate-200">
  <div id="toast-root"></div>

  @php
    $activeBab = request()->get('bab', $activeBab ?? 1);
    $activeBab = (int) $activeBab;
    if (!in_array($activeBab, [1, 2, 3, 4, 99])) $activeBab = 1;

    $isBab1Done = isset($progress['quiz1']) && $progress['quiz1']->score > 0;
    $isBab2Done = isset($progress['quiz2']) && $progress['quiz2']->score > 0;
    $isBab3Done = isset($progress['quiz3']) && $progress['quiz3']->score > 0;
    $isBab4Done = true; 
  @endphp

  {{-- Sidebar --}}
  <aside class="fixed top-0 left-0 h-screen w-64 bg-white dark:bg-darkcard border-r border-slate-200 dark:border-darkborder z-50 overflow-y-auto">
    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-5 py-4 border-b border-slate-100 dark:border-darkborder hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors">
      <img src="{{ asset('images/logo_aplikasi.png') }}" alt="Logo Aplikasi" class="w-10 h-10 rounded-xl object-cover shadow-md border border-slate-200 dark:border-slate-700" />
      <div>
        <div class="font-bold text-lg text-blue-600 dark:text-blue-400">GrafLearn</div>
        <div class="text-[10px] text-slate-400 dark:text-slate-500 -mt-0.5">Belajar Struktur Data Graf</div>
      </div>
    </a>

    <nav class="p-4 space-y-4">
      <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800 hover:text-blue-600 dark:hover:text-blue-400 rounded-xl transition-all group">
        <svg class="w-5 h-5 text-slate-400 dark:text-slate-500 group-hover:text-blue-500 dark:group-hover:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
        <span class="font-medium text-sm">Dashboard</span>
      </a>

      {{-- BAB 1 --}}
      <div id="sidebar-bab-1">
        <button onclick="loadBab(1)" class="bab-btn w-full flex items-center justify-between px-4 py-3 {{ $activeBab == 1 ? 'bg-blue-600 text-white rounded-xl shadow-md shadow-blue-200 dark:shadow-none' : 'text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800 hover:text-blue-600 dark:hover:text-blue-400 rounded-xl' }} transition-all mb-2">
          <div class="flex items-center gap-3">
            <svg class="w-6 h-6 flex-shrink-0 {{ $activeBab == 1 ? '' : 'text-slate-400 dark:text-slate-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            <span class="font-semibold text-sm text-left">Materi 1: Dasar - Dasar Graf</span>
          </div>
          <svg class="w-4 h-4 {{ $activeBab == 1 ? 'transform rotate-180' : 'text-slate-300 dark:text-slate-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
        </button>

        @if($activeBab == 1)
        <div id="subnav-bab-1" class="bg-slate-50 dark:bg-slate-800/50 rounded-xl border border-slate-100 dark:border-slate-700 p-2 space-y-1">
          <button onclick="goToStep(0)" data-step="0" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-blue-600 dark:text-blue-400 bg-white dark:bg-slate-800 shadow-sm transition-colors flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-blue-600 dark:bg-blue-400 item-dot flex-shrink-0"></span> Pengantar</button>
          <button onclick="goToStep(1)" data-step="1" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-white dark:hover:bg-slate-800 transition-colors flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-300 dark:bg-slate-600 item-dot flex-shrink-0"></span> 1.1 Mengapa Kita Perlu Graf?</button>
          <button onclick="goToStep(2)" data-step="2" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-white dark:hover:bg-slate-800 transition-colors flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-300 dark:bg-slate-600 item-dot flex-shrink-0"></span> 1.2 Komponen Utama Graf</button>
          <button onclick="goToStep(3)" data-step="3" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-white dark:hover:bg-slate-800 transition-colors flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-300 dark:bg-slate-600 item-dot flex-shrink-0"></span> 1.3 Jenis Karakteristik Graf</button>
          <button onclick="goToStep(4)" data-step="4" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-white dark:hover:bg-slate-800 transition-colors flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-300 dark:bg-slate-600 item-dot flex-shrink-0"></span> 1.4 Representasi Graf </button>
          <button onclick="goToStep(5)" data-step="5" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-white dark:hover:bg-slate-800 transition-colors flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-300 dark:bg-slate-600 item-dot flex-shrink-0"></span> Rangkuman</button>
          <button onclick="goToStep(6)" data-step="6" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-white dark:hover:bg-slate-800 transition-colors flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-300 dark:bg-slate-600 item-dot flex-shrink-0"></span> Quiz</button>
          <button onclick="goToStep(7)" data-step="7" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-white dark:hover:bg-slate-800 transition-colors flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-300 dark:bg-slate-600 item-dot flex-shrink-0"></span> Refleksi</button>
        </div>
        @endif
      </div>

      {{-- BAB 2 --}}
      <div id="sidebar-bab-2">
        <button onclick="loadBab(2)" class="bab-btn w-full flex items-center justify-between px-4 py-3 {{ $activeBab == 2 ? 'bg-blue-600 text-white rounded-xl shadow-md shadow-blue-200 dark:shadow-none' : 'text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800 hover:text-blue-600 dark:hover:text-blue-400 rounded-xl' }} transition-all mb-2">
          <div class="flex items-center gap-3">
            <svg class="w-6 h-6 flex-shrink-0 {{ $activeBab == 2 ? '' : 'text-slate-400 dark:text-slate-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            <span class="font-semibold text-sm text-left">Materi 2: Representasi Graf</span>
          </div>
          <svg class="w-4 h-4 {{ $activeBab == 2 ? 'transform rotate-180' : 'text-slate-300 dark:text-slate-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
        </button>

        @if($activeBab == 2)
        <div id="subnav-bab-2" class="bg-slate-50 dark:bg-slate-800/50 rounded-xl border border-slate-100 dark:border-slate-700 p-2 space-y-1">
          <button onclick="goToStep(0)" data-step="0" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-blue-600 dark:text-blue-400 bg-white dark:bg-slate-800 shadow-sm transition-colors flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-blue-600 dark:bg-blue-400 item-dot flex-shrink-0"></span> Pengantar</button>
          <button onclick="goToStep(1)" data-step="1" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-white dark:hover:bg-slate-800 transition-colors flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-300 dark:bg-slate-600 item-dot flex-shrink-0"></span> 2.1 Implementasi Dasar </button>
          <button onclick="goToStep(2)" data-step="2" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-white dark:hover:bg-slate-800 transition-colors flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-300 dark:bg-slate-600 item-dot flex-shrink-0"></span> 2.2 Adjacency List</button>
          <button onclick="goToStep(3)" data-step="3" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-white dark:hover:bg-slate-800 transition-colors flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-300 dark:bg-slate-600 item-dot flex-shrink-0"></span> 2.3 Adjacency Matrix</button>
          <button onclick="goToStep(4)" data-step="4" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-white dark:hover:bg-slate-800 transition-colors flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-300 dark:bg-slate-600 item-dot flex-shrink-0"></span> Rangkuman</button>
          <button onclick="goToStep(5)" data-step="5" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-white dark:hover:bg-slate-800 transition-colors flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-300 dark:bg-slate-600 item-dot flex-shrink-0"></span> Quiz</button>
          <button onclick="goToStep(6)" data-step="6" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-white dark:hover:bg-slate-800 transition-colors flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-300 dark:bg-slate-600 item-dot flex-shrink-0"></span> Praktikum</button>
          <button onclick="goToStep(7)" data-step="7" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-white dark:hover:bg-slate-800 transition-colors flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-300 dark:bg-slate-600 item-dot flex-shrink-0"></span> Refleksi</button>
        </div>
        @endif
      </div>

      {{-- BAB 3 --}}
      <div id="sidebar-bab-3">
        <button onclick="loadBab(3)" class="bab-btn w-full flex items-center justify-between px-4 py-3 {{ $activeBab == 3 ? 'bg-blue-600 text-white rounded-xl shadow-md shadow-blue-200 dark:shadow-none' : 'text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800 hover:text-blue-600 dark:hover:text-blue-400 rounded-xl' }} transition-all mb-2">
          <div class="flex items-center gap-3">
            <svg class="w-6 h-6 flex-shrink-0 {{ $activeBab == 3 ? '' : 'text-slate-400 dark:text-slate-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            <span class="font-semibold text-sm text-left">Materi 3: Penelusuran Graf</span>
          </div>
          <svg class="w-4 h-4 {{ $activeBab == 3 ? 'transform rotate-180' : 'text-slate-300 dark:text-slate-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
        </button>

        @if($activeBab == 3)
        <div id="subnav-bab-3" class="bg-slate-50 dark:bg-slate-800/50 rounded-xl border border-slate-100 dark:border-slate-700 p-2 space-y-1">
          <button onclick="goToStep(0)" data-step="0" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-blue-600 dark:text-blue-400 bg-white dark:bg-slate-800 shadow-sm transition-colors flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-blue-600 dark:bg-blue-400 item-dot flex-shrink-0"></span> Pengantar</button>
          <button onclick="goToStep(1)" data-step="1" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-white dark:hover:bg-slate-800 transition-colors flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-300 dark:bg-slate-600 item-dot flex-shrink-0"></span> 3.1 Breadth-First Search</button>
          <button onclick="goToStep(2)" data-step="2" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-white dark:hover:bg-slate-800 transition-colors flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-300 dark:bg-slate-600 item-dot flex-shrink-0"></span> 3.2 Depth-First Search</button>
          <button onclick="goToStep(3)" data-step="3" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-white dark:hover:bg-slate-800 transition-colors flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-300 dark:bg-slate-600 item-dot flex-shrink-0"></span> Rangkuman</button>
          <button onclick="goToStep(4)" data-step="4" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-white dark:hover:bg-slate-800 transition-colors flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-300 dark:bg-slate-600 item-dot flex-shrink-0"></span> Quiz</button>
          <button onclick="goToStep(5)" data-step="5" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-white dark:hover:bg-slate-800 transition-colors flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-300 dark:bg-slate-600 item-dot flex-shrink-0"></span> Praktikum</button>
          <button onclick="goToStep(6)" data-step="6" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-white dark:hover:bg-slate-800 transition-colors flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-300 dark:bg-slate-600 item-dot flex-shrink-0"></span> Refleksi</button>
        </div>
        @endif
      </div>

      <div class="space-y-2 mt-4 border-t border-slate-100 dark:border-darkborder pt-4">
        {{-- MATERI 4: ALGORITMA JALUR TERPENDEK --}}
        <div id="sidebar-bab-4">
        <button onclick="loadBab(4)" class="bab-btn w-full flex items-center justify-between px-4 py-3 {{ $activeBab == 4 ? 'bg-blue-600 text-white rounded-xl shadow-md shadow-blue-200 dark:shadow-none' : 'text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800 hover:text-blue-600 dark:hover:text-blue-400 rounded-xl' }} transition-all mb-2">
          <div class="flex items-center gap-3">
            <svg class="w-6 h-6 flex-shrink-0 {{ $activeBab == 4 ? '' : 'text-slate-400 dark:text-slate-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            <span class="font-semibold text-sm text-left">Materi 4: Algoritma Jalur Terpendek</span>
          </div>
          <svg class="w-4 h-4 {{ $activeBab == 4 ? 'transform rotate-180' : 'text-slate-300 dark:text-slate-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
        </button>

          @if($activeBab == 4)
          <div id="subnav-bab-4" class="bg-slate-50 dark:bg-slate-800/50 rounded-xl border border-slate-100 dark:border-slate-700 p-2 space-y-1">
            <button onclick="goToStep(0)" data-step="0" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-blue-600 dark:text-blue-400 bg-white dark:bg-slate-800 shadow-sm transition-colors flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-blue-600 dark:bg-blue-400 item-dot flex-shrink-0"></span> Pengantar</button>
            <button onclick="goToStep(1)" data-step="1" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-white dark:hover:bg-slate-800 transition-colors flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-300 dark:bg-slate-600 item-dot flex-shrink-0"></span> 4.1 Modifikasi Memori</button>
            <button onclick="goToStep(2)" data-step="2" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-white dark:hover:bg-slate-800 transition-colors flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-300 dark:bg-slate-600 item-dot flex-shrink-0"></span> 4.2 Tabel Jarak</button>
            <button onclick="goToStep(3)" data-step="3" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-white dark:hover:bg-slate-800 transition-colors flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-300 dark:bg-slate-600 item-dot flex-shrink-0"></span> 4.3 Proses Relaxation</button>
            <button onclick="goToStep(4)" data-step="4" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-white dark:hover:bg-slate-800 transition-colors flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-300 dark:bg-slate-600 item-dot flex-shrink-0"></span> Rangkuman</button>
            <button onclick="goToStep(5)" data-step="5" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-white dark:hover:bg-slate-800 transition-colors flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-300 dark:bg-slate-600 item-dot flex-shrink-0"></span> Quiz</button>
            <button onclick="goToStep(6)" data-step="6" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-white dark:hover:bg-slate-800 transition-colors flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-300 dark:bg-slate-600 item-dot flex-shrink-0"></span> Praktikum</button>
            <button onclick="goToStep(7)" data-step="7" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-white dark:hover:bg-slate-800 transition-colors flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-300 dark:bg-slate-600 item-dot flex-shrink-0"></span> Refleksi</button>
          </div>
          @endif
        </div>
        
        {{-- EVALUASI AKHIR --}}
        @if($isBab4Done)
        <a href="{{ url('/modul?bab=99') }}" class="w-full flex items-center justify-between px-4 py-3 {{ $activeBab == 99 ? 'bg-[#0f172a] text-yellow-400 rounded-xl shadow-md' : 'text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800 hover:text-[#0f172a] dark:hover:text-white rounded-xl' }} transition-all">
          <div class="flex items-center gap-3">
            <svg class="w-6 h-6 flex-shrink-0 {{ $activeBab == 99 ? 'text-yellow-400' : 'text-slate-400 dark:text-slate-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <span class="font-bold text-sm text-left">Evaluasi Akhir</span>
          </div>
        </a>
        @else
        <div class="flex items-center justify-between px-4 py-3 text-slate-400 dark:text-slate-600 rounded-xl opacity-60 cursor-not-allowed" title="Selesaikan Materi 4 untuk membuka">
          <div class="flex items-center gap-3">
            <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <span class="font-medium text-sm text-left">Evaluasi Akhir</span>
          </div>
          <span class="text-xs bg-slate-100 dark:bg-slate-800 text-slate-500 dark:text-slate-400 px-2 py-1 rounded"><i class="fa-solid fa-lock mr-1"></i>Terkunci</span>
        </div>
        @endif
      </div>

    </nav>
  </aside>

  {{-- Main Content --}}
  <main class="pl-64 min-h-screen bg-slate-50 dark:bg-darkbase transition-colors duration-300">
    
    {{-- Header --}}
    <header class="sticky top-0 z-40 bg-white/95 dark:bg-darkcard/95 backdrop-blur-sm border-b border-slate-200 dark:border-darkborder px-8 py-4 transition-colors duration-300">
      <div class="flex items-center justify-between">
        <div class="flex items-center gap-4">
          <div class="w-10 h-10 rounded-lg {{ $activeBab == 99 ? 'bg-yellow-100 text-yellow-600' : 'bg-blue-100 dark:bg-blue-900/40 text-blue-600 dark:text-blue-400' }} flex items-center justify-center">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
          </div>
          <div>
            <div class="text-xs font-bold {{ $activeBab == 99 ? 'text-yellow-600' : 'text-blue-600 dark:text-blue-400' }} uppercase tracking-wider" id="header-bab-label">
                @if($activeBab == 99) POST-TEST @else Materi {{ $activeBab }} @endif
            </div>
            <h1 class="text-2xl font-bold text-slate-900 dark:text-white" id="header-bab-title">
              @if($activeBab == 1) Dasar-Dasar Graf 
              @elseif($activeBab == 2) Representasi Graf  
              @elseif($activeBab == 3) Penelusuran Graf 
              @elseif($activeBab == 4) Algoritma Jalur Terpendek
              @elseif($activeBab == 99) Evaluasi Akhir
              @endif
            </h1>
          </div>
        </div>
        <div class="text-right flex items-center gap-6">
          
          <button id="theme-toggle" type="button" class="text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 focus:outline-none rounded-lg text-sm p-2.5 transition-colors">
            <svg id="theme-toggle-icon" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
            </svg>
          </button>

          <div>
            <div class="text-sm text-slate-500 dark:text-slate-400 mb-1">Progres Keseluruhan</div>
            <div class="flex items-center gap-3">
              <div class="w-32 h-2 bg-slate-200 dark:bg-slate-700 rounded-full overflow-hidden">
                <div id="progressBar" class="h-2 {{ $activeBab == 99 ? 'bg-yellow-500' : 'bg-blue-500' }} transition-all duration-500" style="width: 0%"></div>
              </div>
              <span class="text-sm font-semibold text-slate-700 dark:text-slate-300"><span id="progressPercent">0</span>%</span>
            </div>
          </div>

        </div>
      </div>
    </header>

    {{-- Content Area - Konten bab di-include di sini --}}
    <div id="content-area" class="p-8 text-slate-800 dark:text-slate-200">
      @if($activeBab == 1)
        @include('modules.bab1')
      @elseif($activeBab == 2)
        @include('modules.bab2')
      @elseif($activeBab == 3)
        @include('modules.bab3')
      @elseif($activeBab == 4)
        @include('modules.bab4')
      @elseif($activeBab == 99)
        @include('modules.evaluasi_akhir')
      @endif
    </div>
    
  </main>

  <script>
    let currentBab = {{ $activeBab }};

    // SCRIPT UTAMA UNTUK TOGGLE DAN OBSERVASI KONTEN
    document.addEventListener('DOMContentLoaded', () => {
        const themeToggleBtn = document.getElementById('theme-toggle');
        const themeToggleIcon = document.getElementById('theme-toggle-icon');
        const html = document.documentElement;

        const iconSun = '<path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>';
        const iconMoon = '<path d="M21 12.79A9 9 0 1111.21 3a7 7 0 109.79 9.79z"></path>';

        if (localStorage.getItem('graflearn_theme') === 'dark' || (!('graflearn_theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            html.classList.add('dark'); themeToggleIcon.innerHTML = iconSun;
        } else {
            html.classList.remove('dark'); themeToggleIcon.innerHTML = iconMoon;
        }

        themeToggleBtn.addEventListener('click', () => {
            html.classList.toggle('dark');
            if (html.classList.contains('dark')) {
                localStorage.setItem('graflearn_theme', 'dark'); themeToggleIcon.innerHTML = iconSun;
            } else {
                localStorage.setItem('graflearn_theme', 'light'); themeToggleIcon.innerHTML = iconMoon;
            }
        });
    });
  </script>

  <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>