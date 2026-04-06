<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>GrafLearn — Ruang Belajar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        mono: ['Fira Code', 'monospace'],
                    },
                    colors: {
                        brand: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            900: '#1e3a8a',
                        },
                        darkbase: '#0B1120',
                        darkcard: '#111827',
                        darkborder: '#1F2937'
                    },
                    boxShadow: {
                        'soft': '0 4px 20px -2px rgba(0, 0, 0, 0.05)',
                        'hover': '0 10px 25px -5px rgba(0, 0, 0, 0.1)',
                    }
                }
            }
        }
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Fira+Code&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; background-color: #F8FAFC; color: #0F172A; -webkit-font-smoothing: antialiased; }
        .glass-panel { background: #FFFFFF; border: 1px solid #E2E8F0; box-shadow: 0 4px 20px -2px rgba(0, 0, 0, 0.03); }
        .module-card { background: #FFFFFF; border: 1px solid #E2E8F0; transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1); }
        .module-card:not(.locked):hover { border-color: #cbd5e1; transform: translateY(-2px); box-shadow: 0 12px 24px -8px rgba(37, 99, 235, 0.15); }
        .module-card.locked { background: #F8FAFC; border: 1px dashed #CBD5E1; opacity: 0.7; }
        .progress-track { background: #F1F5F9; }
        .text-muted { color: #64748B; }

        /* Dark Mode */
        html.dark body { background-color: #0B1120; color: #F1F5F9; }
        html.dark .glass-panel { background: #111827; border-color: #1F2937; box-shadow: 0 4px 20px -2px rgba(0, 0, 0, 0.4); }
        html.dark .module-card { background: #111827; border-color: #1F2937; }
        html.dark .module-card:not(.locked):hover { border-color: #374151; background: #151e2e; box-shadow: 0 12px 24px -8px rgba(0, 0, 0, 0.5); }
        html.dark .module-card.locked { background: #0B1120; border-color: #1F2937; opacity: 0.5; }
        html.dark .progress-track { background: #1F2937; }
        html.dark .text-muted { color: #94A3B8; }
        html.dark .bg-blue-50 { background-color: rgba(37, 99, 235, 0.1); }
        html.dark .text-slate-800 { color: #F8FAFC; }
        html.dark .border-b { border-color: #1F2937; }
    </style>
</head>

<body class="h-screen overflow-hidden flex flex-col transition-colors duration-300">

    @include('includes.header')
    @include('includes.sidebar')

    {{-- Notifikasi Sukses/Gagal --}}
    @if(session('success'))
        <div id="toast-success" class="fixed top-20 right-5 z-[150] bg-emerald-100 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-xl shadow-lg flex items-center gap-3 active:opacity-0 transition-opacity duration-300" role="alert">
            <i class="fa-solid fa-circle-check text-emerald-600"></i>
            <span class="text-sm font-medium">{{ session('success') }}</span>
        </div>
        <script>setTimeout(() => document.getElementById('toast-success').remove(), 3000);</script>
    @endif
    @if($errors->any())
        <div id="toast-error" class="fixed top-20 right-5 z-[150] bg-rose-100 border border-rose-200 text-rose-800 px-4 py-3 rounded-xl shadow-lg flex items-center gap-3 active:opacity-0 transition-opacity duration-300" role="alert">
            <i class="fa-solid fa-circle-exclamation text-rose-600"></i>
            <span class="text-sm font-medium">{{ $errors->first() }}</span>
        </div>
        <script>setTimeout(() => document.getElementById('toast-error').remove(), 4000);</script>
    @endif

    <main class="pt-[77px] md:pl-64 h-screen flex flex-col">
        <div class="flex-1 overflow-y-auto px-5 sm:px-10 py-8">
            <div class="max-w-6xl mx-auto">

                {{-- 1. WELCOME & PROGRESS SECTION --}}
                <div class="glass-panel rounded-2xl p-6 sm:p-8 mb-8 flex flex-col md:flex-row items-center justify-between gap-8 relative overflow-hidden">
                    <div class="absolute top-0 right-0 -mt-10 -mr-10 w-40 h-40 bg-brand-500 rounded-full blur-[80px] opacity-10 pointer-events-none"></div>

                    {{-- Left: User Info --}}
                    <div class="flex items-center gap-5 w-full md:w-auto relative z-10">
                        
                        <button onclick="openProfileModal()" class="relative group w-14 h-14 rounded-xl bg-gradient-to-br from-brand-500 to-brand-700 text-white flex items-center justify-center text-xl font-bold shadow-lg shadow-brand-500/30 overflow-hidden transition-all hover:scale-105" title="Ubah Foto Profil">
                            
                            @if($user->avatar)
                                <img src="{{ asset('storage/' . $user->avatar) }}" alt="Foto {{ $user->name }}" class="w-full h-full object-cover group-hover:opacity-60 transition-opacity">
                            @else
                                <span class="group-hover:opacity-0 transition-opacity">{{ substr($user->name, 0, 1) }}</span>
                            @endif

                            <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                <i class="fa-solid fa-camera text-sm text-white"></i>
                            </div>
                        </button>

                        <div>
                            <div class="flex items-center gap-3 mb-1">
                                <h1 class="text-2xl font-extrabold text-slate-800 tracking-tight leading-none">Selamat datang, {{ explode(' ', $user->name)[0] }}</h1>
                                <button onclick="openProfileModal()" class="text-[10px] bg-slate-100 hover:bg-slate-200 dark:bg-slate-800 dark:hover:bg-slate-700 text-slate-600 dark:text-slate-300 px-2.5 py-1 rounded-md font-bold tracking-wide transition-colors">Ubah Foto</button>
                            </div>
                            <p class="text-sm text-muted">Lanjutkan pembelajaran struktur data graf Anda.</p>
                        </div>
                    </div>

                    {{-- Right: Minimalist Progress Bar --}}
                    <div class="w-full md:max-w-sm relative z-10">
                        <div class="flex justify-between items-end mb-3">
                            <div>
                                <div class="text-xs font-medium text-muted uppercase tracking-wider">Capaian Akademik</div>
                                <div class="text-[10px] text-muted mt-0.5">{{ $completedModules }} dari 5 Modul Selesai</div>
                            </div>
                            <div class="text-2xl font-black text-slate-800" id="progress-text">0%</div>
                        </div>
                        <div class="w-full h-2 progress-track rounded-full overflow-hidden">
                            <div id="progress-fill" class="h-full bg-brand-600 rounded-full transition-all duration-1000 ease-out" style="width: 0%"></div>
                        </div>
                    </div>
                </div>

                {{-- 2. MODULES GRID --}}
                <div>
                    <div class="flex items-center justify-between mb-6 pb-2 border-b border-slate-200 dark:border-slate-800">
                        <h2 class="text-lg font-bold text-slate-800 tracking-tight">Daftar Materi</h2>
                        <span class="text-xs px-3 py-1 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 rounded-md font-mono border border-slate-200 dark:border-slate-700 shadow-sm">Semester Genap</span>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 pb-10">
                        @foreach ($modules as $index => $module)
                            @php $isLocked = $index + 1 > $completedModules + 1; if ($module['id'] == 1) $isLocked = false; @endphp
                            <div class="module-card p-6 h-[200px] rounded-2xl flex flex-col relative group {{ $isLocked ? 'locked pointer-events-none' : '' }}">
                                @if ($isLocked) <div class="absolute top-5 right-5 text-slate-400"><i class="fa-solid fa-lock text-sm"></i></div>
                                @elseif ($index + 1 <= $completedModules) <div class="absolute top-5 right-5 text-emerald-500 bg-emerald-50 dark:bg-emerald-500/10 p-1.5 rounded-full"><i class="fa-solid fa-check text-xs"></i></div>
                                @else <div class="absolute top-5 right-5 w-2.5 h-2.5 bg-brand-500 rounded-full animate-pulse"></div>
                                @endif
                                <div class="flex-1">
                                    <div class="text-[10px] font-black text-muted tracking-widest uppercase mb-3">MODUL {{ $module['id'] == 99 ? 'EVAL' : $module['id'] }}</div>
                                    <h3 class="font-bold text-slate-800 text-lg mb-2 leading-snug line-clamp-2">{{ $module['title'] }}</h3>
                                    <p class="text-xs text-muted leading-relaxed line-clamp-2 pr-4">{{ $module['desc'] }}</p>
                                </div>
                                <div class="mt-4 pt-4 border-t border-slate-100 dark:border-slate-800">
                                    @if ($isLocked) <span class="text-xs font-medium text-slate-400">Belum Memenuhi Syarat</span>
                                    @else <a href="{{ $module['route'] == '#' ? '#' : route($module['route']) }}" class="inline-flex items-center text-sm font-bold text-brand-600 dark:text-brand-400 hover:text-brand-800 dark:hover:text-brand-300 transition-colors">Buka Modul <i class="fa-solid fa-arrow-right ml-2 text-[10px] transform group-hover:translate-x-1 transition-transform"></i></a>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </main>

    {{-- MODAL PENGATURAN FOTO PROFIL (SANGAT MINIMALIS) --}}
    <div id="modal-profile" class="fixed inset-0 bg-slate-900/40 hidden items-center justify-center z-[100] backdrop-blur-sm flex transition-opacity duration-300 opacity-0">
        <div class="bg-white dark:bg-darkcard rounded-2xl shadow-xl w-full max-w-sm p-7 border border-slate-100 dark:border-darkborder transform scale-95 transition-transform duration-300">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h3 class="text-lg font-bold text-slate-800 dark:text-white">Ubah Foto Profil</h3>
                    <p class="text-xs text-slate-500 mt-1">Pilih foto terbaik Anda untuk dipasang.</p>
                </div>
                <button onclick="closeProfileModal()" class="w-8 h-8 flex items-center justify-center rounded-full bg-slate-100 dark:bg-slate-800 text-slate-500 hover:bg-slate-200 dark:hover:bg-slate-700 transition-colors">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="flex flex-col items-center mb-8 pt-4 border-t border-slate-100 dark:border-darkborder">
                    <div id="avatar-preview-container" class="w-24 h-24 rounded-xl bg-brand-50 dark:bg-brand-900/30 text-brand-600 dark:text-brand-400 flex items-center justify-center text-4xl font-bold mb-4 relative overflow-hidden group border-2 border-dashed border-brand-200 dark:border-brand-800 transition-colors">
                        @if($user->avatar)
                            <img src="{{ asset('storage/' . $user->avatar) }}" id="avatar-preview-img" class="w-full h-full object-cover">
                        @else
                            <span id="avatar-preview-initial">{{ substr($user->name, 0, 1) }}</span>
                        @endif
                    </div>
                    
                    <label class="cursor-pointer bg-brand-600 hover:bg-brand-700 text-white text-sm font-semibold px-5 py-2.5 rounded-xl shadow-md shadow-brand-500/20 transition-colors flex items-center gap-2.5">
                        <i class="fa-solid fa-cloud-arrow-up text-xs"></i>
                        Ganti Foto Profil
                        <input type="file" name="avatar" id="avatar-input" class="hidden" accept="image/jpeg,image/png,image/jpg,image/gif" onchange="previewImage(this)">
                    </label>
                    <p class="text-[11px] text-slate-400 mt-3 font-medium">Maksimal 2MB (JPG, PNG, GIF)</p>
                </div>

                <div class="space-y-4 mb-8">
                    <div>
                        <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 mb-1.5 uppercase tracking-wide">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="w-full bg-slate-50 dark:bg-[#0B1120] border border-slate-200 dark:border-slate-700 rounded-lg px-4 py-2.5 text-sm focus:border-brand-500 focus:bg-white dark:focus:bg-[#0B1120] focus:ring-4 focus:ring-brand-500/10 outline-none transition-all dark:text-white" required>
                    </div>
                </div>

                <div class="flex gap-3 pt-5 border-t border-slate-100 dark:border-darkborder">
                    <button type="button" onclick="closeProfileModal()" class="flex-1 px-4 py-2.5 bg-white dark:bg-darkcard border border-slate-200 dark:border-darkborder text-slate-600 dark:text-slate-300 font-semibold text-sm rounded-xl hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors">Batal</button>
                    <button type="submit" class="flex-1 px-4 py-2.5 bg-brand-600 text-white font-semibold text-sm rounded-xl hover:bg-brand-700 transition-colors shadow-md shadow-brand-600/20 flex items-center justify-center gap-2">
                        <i class="fa-solid fa-floppy-disk text-xs"></i>
                        Simpan Foto
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Animasi Progress Bar Halus
            const targetPercent = {{ $progressPercent ?? 0 }};
            const barFill = document.getElementById('progress-fill');
            const textPercent = document.getElementById('progress-text');
            setTimeout(() => { if(barFill) barFill.style.width = targetPercent + "%"; }, 150);
            let current = 0;
            if (targetPercent > 0) {
                const timer = setInterval(() => {
                    current++; if(textPercent) textPercent.innerText = current + "%";
                    if (current >= targetPercent) clearInterval(timer);
                }, 15);
            }
        });

        // Script Kendali Modal Profil (Dengan Animasi Mulus)
        const modal = document.getElementById('modal-profile');
        const modalContent = modal ? modal.querySelector('div') : null;

        function openProfileModal() {
            if(!modal) return;
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                if(modalContent) modalContent.classList.remove('scale-95');
            }, 10);
        }
        function closeProfileModal() {
            if(!modal) return;
            modal.classList.add('opacity-0');
            if(modalContent) modalContent.classList.add('scale-95');
            setTimeout(() => modal.classList.add('hidden'), 300);
        }

        // Preview Gambar Instan sebelum diupload
        function previewImage(input) {
            const file = input.files[0];
            const container = document.getElementById('avatar-preview-container');
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    container.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover">`;
                    container.classList.remove('border-dashed', 'border-brand-200', 'dark:border-brand-800');
                    container.classList.add('border-solid', 'border-brand-500');
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>
</html>