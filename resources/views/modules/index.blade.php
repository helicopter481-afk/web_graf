<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>GrafLearn</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vis/4.21.0/vis.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/vis/4.21.0/vis.min.css" rel="stylesheet" />
  
  {{-- Pemanggilan CSS Eksternal --}}
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bg-slate-50 text-slate-800">
  <div id="toast-root"></div>

  @php
    $activeBab = request()->get('bab', $activeBab ?? 1);
    $activeBab = (int) $activeBab;
    
    // [PENTING]: Tambahkan 99 ke array agar sistem mengizinkan akses ke Evaluasi Akhir
    if (!in_array($activeBab, [1, 2, 3, 4, 99])) $activeBab = 1;

    // Logika untuk membuka kunci materi
    $isBab1Done = isset($progress['quiz1']) && $progress['quiz1']->score > 0;
    $isBab2Done = isset($progress['quiz2']) && $progress['quiz2']->score > 0;
    $isBab3Done = isset($progress['quiz3']) && $progress['quiz3']->score > 0;
    
    // [KHUSUS TESTING]: Evaluasi Akhir di-bypass agar selalu terbuka
    $isBab4Done = true; 
  @endphp

  {{-- Sidebar --}}
  <aside class="fixed top-0 left-0 h-screen w-64 bg-white border-r border-slate-200 z-50 overflow-y-auto">
    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-5 py-4 border-b border-slate-100 hover:bg-slate-50 transition-colors">
      <img src="{{ asset('images/logo_aplikasi.png') }}" alt="Logo Aplikasi"
           class="w-10 h-10 rounded-xl object-cover shadow-md border-2 border-slate-800" />
      <div>
        <div class="font-bold text-lg text-blue-600">GrafLearn</div>
        <div class="text-[10px] text-slate-400 -mt-0.5">Belajar Struktur Data Graf</div>
      </div>
    </a>

    <nav class="p-4 space-y-4">
      
      {{-- Dashboard --}}
      <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-slate-50 hover:text-blue-600 rounded-xl transition-all group">
        <svg class="w-5 h-5 text-slate-400 group-hover:text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
        <span class="font-medium text-sm">Dashboard</span>
      </a>

      {{-- BAB 1 --}}
      <div id="sidebar-bab-1">
        <button onclick="loadBab(1)" class="bab-btn w-full flex items-center justify-between px-4 py-3 {{ $activeBab == 1 ? 'bg-blue-600 text-white rounded-xl shadow-md shadow-blue-200' : 'text-slate-600 hover:bg-slate-50 hover:text-blue-600 rounded-xl' }} transition-all mb-2">
          <div class="flex items-center gap-3">
            <svg class="w-6 h-6 flex-shrink-0 {{ $activeBab == 1 ? '' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            <span class="font-semibold text-sm text-left">Materi 1: Dasar - Dasar Graf</span>
          </div>
          <svg class="w-4 h-4 {{ $activeBab == 1 ? 'transform rotate-180' : 'text-slate-300' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
        </button>

        @if($activeBab == 1)
        <div id="subnav-bab-1" class="bg-slate-50 rounded-xl border border-slate-100 p-2 space-y-1">
          <button onclick="goToStep(0)" data-step="0" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-blue-600 bg-white shadow-sm transition-colors flex items-center gap-2">
            <span class="w-1.5 h-1.5 rounded-full bg-blue-600 item-dot flex-shrink-0"></span>
            Pengantar
          </button>
          <button onclick="goToStep(1)" data-step="1" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 hover:text-blue-600 hover:bg-white transition-colors flex items-center gap-2">
            <span class="w-1.5 h-1.5 rounded-full bg-slate-300 item-dot flex-shrink-0"></span>
            1.1 Mengapa Kita Perlu Graf?
          </button>
          <button onclick="goToStep(2)" data-step="2" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 hover:text-blue-600 hover:bg-white transition-colors flex items-center gap-2">
            <span class="w-1.5 h-1.5 rounded-full bg-slate-300 item-dot flex-shrink-0"></span>
            1.2 Komponen Utama Graf
          </button>
          <button onclick="goToStep(3)" data-step="3" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 hover:text-blue-600 hover:bg-white transition-colors flex items-center gap-2">
            <span class="w-1.5 h-1.5 rounded-full bg-slate-300 item-dot flex-shrink-0"></span>
            1.3 Jenis-Jenis Karakteristik Graf
          </button>
          <button onclick="goToStep(4)" data-step="4" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 hover:text-blue-600 hover:bg-white transition-colors flex items-center gap-2">
            <span class="w-1.5 h-1.5 rounded-full bg-slate-300 item-dot flex-shrink-0"></span>
            1.4 Representasi Graf dalam Kehidupan Nyata
          </button>
          <button onclick="goToStep(5)" data-step="5" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 hover:text-blue-600 hover:bg-white transition-colors flex items-center gap-2">
            <span class="w-1.5 h-1.5 rounded-full bg-slate-300 item-dot flex-shrink-0"></span>
            Rangkuman
          </button>
          <button onclick="goToStep(6)" data-step="6" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 hover:text-blue-600 hover:bg-white transition-colors flex items-center gap-2">
            <span class="w-1.5 h-1.5 rounded-full bg-slate-300 item-dot flex-shrink-0"></span>
            Quiz
          </button>
          <button onclick="goToStep(7)" data-step="7" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 hover:text-blue-600 hover:bg-white transition-colors flex items-center gap-2">
            <span class="w-1.5 h-1.5 rounded-full bg-slate-300 item-dot flex-shrink-0"></span>
            Refleksi
          </button>
        </div>
        @endif
      </div>

      {{-- BAB 2 --}}
      <div id="sidebar-bab-2">
        <button onclick="loadBab(2)" class="bab-btn w-full flex items-center justify-between px-4 py-3 {{ $activeBab == 2 ? 'bg-blue-600 text-white rounded-xl shadow-md shadow-blue-200' : 'text-slate-600 hover:bg-slate-50 hover:text-blue-600 rounded-xl' }} transition-all mb-2">
          <div class="flex items-center gap-3">
            <svg class="w-6 h-6 flex-shrink-0 {{ $activeBab == 2 ? '' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            <span class="font-semibold text-sm text-left">Materi 2: Representasi Graf</span>
          </div>
          <svg class="w-4 h-4 {{ $activeBab == 2 ? 'transform rotate-180' : 'text-slate-300' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
        </button>

        @if($activeBab == 2)
        <div id="subnav-bab-2" class="bg-slate-50 rounded-xl border border-slate-100 p-2 space-y-1">
          <button onclick="goToStep(0)" data-step="0" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-blue-600 bg-white shadow-sm transition-colors flex items-center gap-2">
            <span class="w-1.5 h-1.5 rounded-full bg-blue-600 item-dot flex-shrink-0"></span>
            Pengantar
          </button>
          <button onclick="goToStep(1)" data-step="1" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 hover:text-blue-600 hover:bg-white transition-colors flex items-center gap-2">
            <span class="w-1.5 h-1.5 rounded-full bg-slate-300 item-dot flex-shrink-0"></span>
            2.1 Implementasi Dasar (Simpul dan Sisi)
          </button>
          <button onclick="goToStep(2)" data-step="2" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 hover:text-blue-600 hover:bg-white transition-colors flex items-center gap-2">
            <span class="w-1.5 h-1.5 rounded-full bg-slate-300 item-dot flex-shrink-0"></span>
            2.2 Adjacency List (Daftar Ketetanggaan)
          </button>
          <button onclick="goToStep(3)" data-step="3" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 hover:text-blue-600 hover:bg-white transition-colors flex items-center gap-2">
            <span class="w-1.5 h-1.5 rounded-full bg-slate-300 item-dot flex-shrink-0"></span>
            2.3 Adjacency Matrix (Matriks Ketetanggaan)
          </button>
          <button onclick="goToStep(4)" data-step="4" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 hover:text-blue-600 hover:bg-white transition-colors flex items-center gap-2">
            <span class="w-1.5 h-1.5 rounded-full bg-slate-300 item-dot flex-shrink-0"></span>
            Rangkuman
          </button>
          <button onclick="goToStep(5)" data-step="5" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 hover:text-blue-600 hover:bg-white transition-colors flex items-center gap-2">
            <span class="w-1.5 h-1.5 rounded-full bg-slate-300 item-dot flex-shrink-0"></span>
            Quiz
          </button>
          <button onclick="goToStep(6)" data-step="6" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 hover:text-blue-600 hover:bg-white transition-colors flex items-center gap-2">
            <span class="w-1.5 h-1.5 rounded-full bg-slate-300 item-dot flex-shrink-0"></span>
            Praktikum
          </button>
          <button onclick="goToStep(7)" data-step="7" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 hover:text-blue-600 hover:bg-white transition-colors flex items-center gap-2">
            <span class="w-1.5 h-1.5 rounded-full bg-slate-300 item-dot flex-shrink-0"></span>
            Refleksi
          </button>
        </div>
        @endif
      </div>

      {{-- BAB 3 --}}
      <div id="sidebar-bab-3">
        <button onclick="loadBab(3)" class="bab-btn w-full flex items-center justify-between px-4 py-3 {{ $activeBab == 3 ? 'bg-blue-600 text-white rounded-xl shadow-md shadow-blue-200' : 'text-slate-600 hover:bg-slate-50 hover:text-blue-600 rounded-xl' }} transition-all mb-2">
          <div class="flex items-center gap-3">
            <svg class="w-6 h-6 flex-shrink-0 {{ $activeBab == 3 ? '' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            <span class="font-semibold text-sm text-left">Materi 3: Penelusuran Graf (Graph Traversal)</span>
          </div>
          <svg class="w-4 h-4 {{ $activeBab == 3 ? 'transform rotate-180' : 'text-slate-300' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
        </button>

        @if($activeBab == 3)
        <div id="subnav-bab-3" class="bg-slate-50 rounded-xl border border-slate-100 p-2 space-y-1">
          <button onclick="goToStep(0)" data-step="0" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-blue-600 bg-white shadow-sm transition-colors flex items-center gap-2">
            <span class="w-1.5 h-1.5 rounded-full bg-blue-600 item-dot flex-shrink-0"></span>
            Pengantar
          </button>
          <button onclick="goToStep(1)" data-step="1" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 hover:text-blue-600 hover:bg-white transition-colors flex items-center gap-2">
            <span class="w-1.5 h-1.5 rounded-full bg-slate-300 item-dot flex-shrink-0"></span>
            3.1 Breadth-First Search (BFS)
          </button>
          <button onclick="goToStep(2)" data-step="2" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 hover:text-blue-600 hover:bg-white transition-colors flex items-center gap-2">
            <span class="w-1.5 h-1.5 rounded-full bg-slate-300 item-dot flex-shrink-0"></span>
            3.2 Depth-First Search (DFS)
          </button>
          <button onclick="goToStep(3)" data-step="3" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 hover:text-blue-600 hover:bg-white transition-colors flex items-center gap-2">
            <span class="w-1.5 h-1.5 rounded-full bg-slate-300 item-dot flex-shrink-0"></span>
            Rangkuman
          </button>
          <button onclick="goToStep(4)" data-step="4" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 hover:text-blue-600 hover:bg-white transition-colors flex items-center gap-2">
            <span class="w-1.5 h-1.5 rounded-full bg-slate-300 item-dot flex-shrink-0"></span>
            Quiz
          </button>
          <button onclick="goToStep(5)" data-step="5" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 hover:text-blue-600 hover:bg-white transition-colors flex items-center gap-2">
            <span class="w-1.5 h-1.5 rounded-full bg-slate-300 item-dot flex-shrink-0"></span>
            Praktikum
          </button>
          <button onclick="goToStep(6)" data-step="6" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 hover:text-blue-600 hover:bg-white transition-colors flex items-center gap-2">
            <span class="w-1.5 h-1.5 rounded-full bg-slate-300 item-dot flex-shrink-0"></span>
            Refleksi
          </button>
        </div>
        @endif
      </div>

      <div class="space-y-2 mt-4 border-t border-slate-100 pt-4">
        
        {{-- MATERI 4: ALGORITMA JALUR TERPENDEK --}}
        <div id="sidebar-bab-4">
        <button onclick="loadBab(4)" class="bab-btn w-full flex items-center justify-between px-4 py-3 {{ $activeBab == 4 ? 'bg-blue-600 text-white rounded-xl shadow-md shadow-blue-200' : 'text-slate-600 hover:bg-slate-50 hover:text-blue-600 rounded-xl' }} transition-all mb-2">
          <div class="flex items-center gap-3">
            <svg class="w-6 h-6 flex-shrink-0 {{ $activeBab == 4 ? '' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            <span class="font-semibold text-sm text-left">Materi 4: Algoritma Jalur Terpendek</span>
          </div>
          <svg class="w-4 h-4 {{ $activeBab == 4 ? 'transform rotate-180' : 'text-slate-300' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
        </button>

          @if($activeBab == 4)
          <div id="subnav-bab-4" class="bg-slate-50 rounded-xl border border-slate-100 p-2 space-y-1">
            <button onclick="goToStep(0)" data-step="0" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-blue-600 bg-white shadow-sm transition-colors flex items-center gap-2">
              <span class="w-1.5 h-1.5 rounded-full bg-blue-600 item-dot flex-shrink-0"></span>
              Pengantar
            </button>
            <button onclick="goToStep(1)" data-step="1" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 hover:text-blue-600 hover:bg-white transition-colors flex items-center gap-2">
              <span class="w-1.5 h-1.5 rounded-full bg-slate-300 item-dot flex-shrink-0"></span>
              4.1 Modifikasi Memori: Nested Dictionary
            </button>
            <button onclick="goToStep(2)" data-step="2" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 hover:text-blue-600 hover:bg-white transition-colors flex items-center gap-2">
              <span class="w-1.5 h-1.5 rounded-full bg-slate-300 item-dot flex-shrink-0"></span>
              4.2 Logika Infinity dan Tabel Jarak
            </button>
            <button onclick="goToStep(3)" data-step="3" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 hover:text-blue-600 hover:bg-white transition-colors flex items-center gap-2">
              <span class="w-1.5 h-1.5 rounded-full bg-slate-300 item-dot flex-shrink-0"></span>
              4.3 Jantung Dijkstra: Proses Relaxation
            </button>
            <button onclick="goToStep(4)" data-step="4" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 hover:text-blue-600 hover:bg-white transition-colors flex items-center gap-2">
              <span class="w-1.5 h-1.5 rounded-full bg-slate-300 item-dot flex-shrink-0"></span>
              Rangkuman
            </button>
            <button onclick="goToStep(5)" data-step="5" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 hover:text-blue-600 hover:bg-white transition-colors flex items-center gap-2">
              <span class="w-1.5 h-1.5 rounded-full bg-slate-300 item-dot flex-shrink-0"></span>
              Quiz
            </button>
            <button onclick="goToStep(6)" data-step="6" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 hover:text-blue-600 hover:bg-white transition-colors flex items-center gap-2">
              <span class="w-1.5 h-1.5 rounded-full bg-slate-300 item-dot flex-shrink-0"></span>
              Praktikum
            </button>
            <button onclick="goToStep(7)" data-step="7" class="sidebar-nav-item w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-slate-500 hover:text-blue-600 hover:bg-white transition-colors flex items-center gap-2">
              <span class="w-1.5 h-1.5 rounded-full bg-slate-300 item-dot flex-shrink-0"></span>
              Refleksi
            </button>
          </div>
          @endif
        </div>
        
        {{-- EVALUASI AKHIR --}}
        @if($isBab4Done)
        <a href="{{ url('/modul?bab=99') }}" class="w-full flex items-center justify-between px-4 py-3 {{ $activeBab == 99 ? 'bg-[#0f172a] text-yellow-400 rounded-xl shadow-md' : 'text-slate-600 hover:bg-slate-50 hover:text-[#0f172a] rounded-xl' }} transition-all">
          <div class="flex items-center gap-3">
            <svg class="w-6 h-6 flex-shrink-0 {{ $activeBab == 99 ? 'text-yellow-400' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <span class="font-bold text-sm text-left">Evaluasi Akhir</span>
          </div>
        </a>
        @else
        <div class="flex items-center justify-between px-4 py-3 text-slate-400 rounded-xl opacity-60 cursor-not-allowed" title="Selesaikan Materi 4 untuk membuka">
          <div class="flex items-center gap-3">
            <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <span class="font-medium text-sm text-left">Evaluasi Akhir</span>
          </div>
          <span class="text-xs bg-slate-100 text-slate-500 px-2 py-1 rounded"><i class="fa-solid fa-lock mr-1"></i>Terkunci</span>
        </div>
        @endif
      </div>

    </nav>
  </aside>

  {{-- Main Content --}}
  <main class="pl-64 min-h-screen">
    
    {{-- Header --}}
    <header class="sticky top-0 z-40 bg-white/95 backdrop-blur-sm border-b border-slate-200 px-8 py-4">
      <div class="flex items-center justify-between">
        <div class="flex items-center gap-4">
          <div class="w-10 h-10 rounded-lg {{ $activeBab == 99 ? 'bg-yellow-100 text-yellow-600' : 'bg-blue-100 text-blue-600' }} flex items-center justify-center">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
          </div>
          <div>
            <div class="text-xs font-bold {{ $activeBab == 99 ? 'text-yellow-600' : 'text-blue-600' }} uppercase tracking-wider" id="header-bab-label">
                @if($activeBab == 99) POST-TEST @else Materi {{ $activeBab }} @endif
            </div>
            <h1 class="text-2xl font-bold text-slate-900" id="header-bab-title">
              @if($activeBab == 1) Dasar-Dasar Graf 
              @elseif($activeBab == 2) Representasi Graf  
              @elseif($activeBab == 3) Penelusuran Graf 
              @elseif($activeBab == 4) Algoritma Jalur Terpendek
              @elseif($activeBab == 99) Evaluasi Akhir (Ujian Praktik)
              @endif
            </h1>
          </div>
        </div>
        <div class="text-right">
          <div class="text-sm text-slate-500 mb-1">Progres Keseluruhan</div>
          <div class="flex items-center gap-3">
            <div class="w-32 h-2 bg-slate-200 rounded-full overflow-hidden">
              <div id="progressBar" class="h-2 {{ $activeBab == 99 ? 'bg-yellow-500' : 'bg-blue-500' }} transition-all duration-500" style="width: 0%"></div>
            </div>
            <span class="text-sm font-semibold text-slate-700"><span id="progressPercent">0</span>%</span>
          </div>
        </div>
      </div>
    </header>

    
    {{-- Content Area - Konten bab di-include di sini --}}
    <div id="content-area" class="p-8">
      @if($activeBab == 1)
        @include('modules.bab1')
      @elseif($activeBab == 2)
        @include('modules.bab2')
      @elseif($activeBab == 3)
        @include('modules.bab3')
      @elseif($activeBab == 4)
        @include('modules.bab4')
      @elseif($activeBab == 99)
        {{-- NAMA FILE HARUS evaluasi_akhir.blade.php SESUAI KESEPAKATAN --}}
        @include('modules.evaluasi_akhir')
      @endif
    </div>
    
  </main>

  <script>
    // Variabel PHP di-pass ke JavaScript di sini
    let currentBab = {{ $activeBab }};
  </script>

  {{-- Pemanggilan JS Eksternal --}}
  <script src="{{ asset('js/script.js') }}"></script>

</body>
</html>