<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Dosen - GrafLearn</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif']
                    },
                    colors: {
                        primary: '#2563EB',
                        surface: '#F8FAFC',
                        borderline: '#E2E8F0',
                        ink: '#0F172A',
                        muted: '#64748B'
                    },
                    boxShadow: {
                        'soft': '0 4px 20px -2px rgba(0, 0, 0, 0.05)',
                        'card': '0 1px 3px rgba(0,0,0,0.05), 0 1px 2px rgba(0,0,0,0.02)'
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #F4F7F9;
            color: #0F172A;
        }

        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: #CBD5E1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94A3B8;
        }

        .glass-card {
            background: #FFFFFF;
            border: 1px solid #E2E8F0;
            border-radius: 12px;
            box-shadow: 0 2px 10px -2px rgba(0, 0, 0, 0.03);
        }

        .stat-card {
            background: #FFFFFF;
            border-radius: 12px;
            padding: 20px;
            border: 1px solid #E2E8F0;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 14px;
            color: #64748B;
            font-size: 0.875rem;
            font-weight: 500;
            border-radius: 8px;
            transition: all 0.2s;
            margin-bottom: 4px;
        }

        .nav-link:hover {
            background-color: #F1F5F9;
            color: #0F172A;
        }

        .nav-link.active {
            background-color: #EFF6FF;
            color: #2563EB;
            font-weight: 600;
        }

        th {
            font-size: 0.75rem;
            font-weight: 600;
            color: #64748B;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            background: #F8FAFC;
        }

        td {
            font-size: 0.875rem;
            color: #334155;
            border-bottom: 1px solid #F1F5F9;
        }

        tr {
            transition: background-color 0.2s;
        }

        tr:hover {
            background-color: #F8FAFC;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            padding: 2px 8px;
            border-radius: 6px;
            font-size: 0.7rem;
            font-weight: 600;
        }

        .badge-success {
            background: #ECFDF5;
            color: #059669;
            border: 1px solid #A7F3D0;
        }

        .badge-danger {
            background: #FEF2F2;
            color: #DC2626;
            border: 1px solid #FECACA;
        }

        .badge-neutral {
            background: #F1F5F9;
            color: #64748B;
            border: 1px solid #E2E8F0;
        }
    </style>
</head>

<body class="h-screen flex overflow-hidden text-sm antialiased">
    @if (session('success'))
        <div id="toast-notification"
            class="fixed top-5 right-5 z-50 flex items-center w-full max-w-xs p-4 bg-white rounded-xl shadow-lg border border-slate-200 toast-animate"
            role="alert">
            <div
                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-emerald-500 bg-emerald-50 rounded-lg">
                <i class="fa-solid fa-check"></i></div>
            <div class="ml-3 text-sm font-medium text-slate-700">{{ session('success') }}</div>
            <button type="button" onclick="this.parentElement.remove()"
                class="ml-auto -mx-1.5 -my-1.5 text-slate-400 hover:text-slate-900 rounded-lg p-1.5 hover:bg-slate-100 transition-colors"><i
                    class="fa-solid fa-xmark"></i></button>
        </div>
    @endif

    <aside class="w-64 bg-white border-r border-slate-200 flex-shrink-0 flex flex-col hidden md:flex z-20">
        <div class="h-16 flex items-center px-6 border-b border-slate-100">
            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center gap-3 hover:opacity-80 transition-opacity">
                <img src="{{ asset('images/logo_aplikasi.png') }}" alt="Logo"
                    class="w-8 h-8 rounded-lg object-cover border border-slate-200" />
                <span class="font-bold text-lg text-slate-800 tracking-tight">GrafLearn<span
                        class="text-primary">.</span></span>
            </a>
        </div>
        <div class="p-5 border-b border-slate-100">
            <div class="flex justify-between items-center mb-4">
                <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Manajemen Kelas</label>
                <div class="flex gap-1.5">
                    <button onclick="konfirmasiHapusKelas()"
                        class="w-6 h-6 flex items-center justify-center rounded text-slate-400 hover:bg-rose-50 hover:text-rose-600"><i
                            class="fa-solid fa-trash-can text-[11px]"></i></button>
                    <button onclick="openModalKelas()"
                        class="w-6 h-6 flex items-center justify-center rounded text-slate-400 hover:bg-blue-50 hover:text-blue-600"><i
                            class="fa-solid fa-plus text-[12px]"></i></button>
                </div>
            </div>
            <div id="class-buttons-container" class="flex flex-wrap gap-2"></div>
        </div>
        <div class="p-4 flex-1 overflow-y-auto">
            <div class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-3 px-2">Menu Utama</div>
            <nav>
                <a href="#" class="nav-link active"><i class="fa-solid fa-chart-pie w-5 text-center"></i>
                    Rekapitulasi Nilai</a>
                <a href="{{ route('admin.questions.index') }}" class="nav-link"><i
                        class="fa-solid fa-file-pen w-5 text-center"></i> Bank Soal (Edit)</a>
            </nav>
        </div>
        <div class="p-4 border-t border-slate-100">
            <form action="{{ route('logout') }}" method="POST">
                @csrf <button type="submit"
                    class="flex items-center gap-3 w-full px-4 py-2.5 text-sm font-medium text-slate-600 rounded-lg hover:bg-slate-100"><i
                        class="fa-solid fa-arrow-right-from-bracket text-slate-400"></i> Keluar Sistem</button>
            </form>
        </div>
    </aside>

    <main class="flex-1 flex flex-col overflow-hidden">
        <header
            class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-8 z-10 sticky top-0">
            <div>
                <h1 id="header-title" class="text-xl font-bold text-slate-800 tracking-tight">Kelas - Struktur Data Graf
                </h1>
                <div class="flex items-center gap-2 mt-0.5"><span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                    <p class="text-[11px] font-medium text-slate-500 uppercase tracking-wide">Semester Genap 2025/2026
                    </p>
                </div>
            </div>
            <div class="flex items-center gap-3 bg-slate-50 px-3 py-1.5 rounded-lg border border-slate-200">
                <i class="fa-solid fa-filter text-slate-400 text-xs"></i>
                <select id="chapter-filter" onchange="updateDashboard()"
                    class="bg-transparent text-sm font-medium text-slate-700 focus:outline-none cursor-pointer border-none py-1">
                    <option value="all">Ringkasan Kumulatif</option>
                    <option value="0">Materi 1: Dasar-Dasar Graf</option>
                    <option value="1">Materi 2: Representasi Graf</option>
                    <option value="2">Materi 3: Penelusuran Graf</option>
                    <option value="3">Materi 4: Pencarian Jalur Terpendek</option>
                    <option value="4">Evaluasi Akhir</option>
                </select>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="stat-card">
                    <div class="absolute -right-4 -top-4 text-slate-50 opacity-50"><i
                            class="fa-solid fa-chart-simple text-8xl"></i></div>
                    <div class="relative z-10">
                        <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-1">Rata-Rata Kelas</p>
                        <div class="flex items-baseline gap-2">
                            <h3 id="stat-avg" class="text-4xl font-black text-slate-800 tracking-tighter">0</h3><span
                                class="text-sm font-medium text-slate-400 mb-1">/ 100 Pts</span>
                        </div>
                    </div>
                </div>
                <div class="stat-card group cursor-default">
                    <div class="absolute -right-4 -top-4 text-emerald-50 opacity-50"><i
                            class="fa-solid fa-graduation-cap text-8xl"></i></div>
                    <div class="relative z-10 flex flex-col h-full justify-between">
                        <div class="flex justify-between items-start">
                            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-1">Tingkat Kelulusan
                            </p>
                            <button onclick="openKKMModal()"
                                class="text-[10px] bg-white border border-slate-200 hover:bg-slate-50 text-slate-600 px-2.5 py-1 rounded-md font-bold transition-colors shadow-sm flex items-center gap-1.5"><i
                                    class="fa-solid fa-pen text-[9px]"></i> Ubah KKM ({{ $kkm }})</button>
                        </div>
                        <div class="flex items-baseline gap-2">
                            <h3 id="stat-pass" class="text-4xl font-black text-emerald-600 tracking-tighter">0%</h3>
                            <span class="text-sm font-medium text-slate-400 mb-1">Diatas KKM</span>
                        </div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="absolute -right-4 -top-4 text-blue-50 opacity-50"><i
                            class="fa-solid fa-bars-progress text-8xl"></i></div>
                    <div class="relative z-10">
                        <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-1">Progress Modul</p>
                        <div class="flex items-baseline gap-2 mb-3">
                            <h3 id="stat-prog" class="text-4xl font-black text-primary tracking-tighter">0%</h3><span
                                class="text-sm font-medium text-slate-400 mb-1">Tuntas</span>
                        </div>
                        <div class="w-full bg-slate-100 h-1.5 rounded-full overflow-hidden">
                            <div id="prog-bar" class="bg-primary h-full rounded-full transition-all"
                                style="width: 0%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="glass-card overflow-hidden">
                <div
                    class="px-6 py-4 border-b border-slate-200 flex flex-col sm:flex-row justify-between items-center gap-4 bg-white">
                    <h3 class="font-bold text-slate-800 text-base">Daftar Mahasiswa</h3>
                    <div class="flex items-center gap-3">
                        <div class="relative">
                            <i
                                class="fa-solid fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-slate-400 text-xs"></i>
                            <input type="text" id="search-input" onkeyup="updateDashboard()"
                                placeholder="Cari mahasiswa..."
                                class="pl-8 pr-4 py-2 border border-slate-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-primary w-56">
                        </div>
                        <button onclick="openModal('add')"
                            class="bg-slate-900 hover:bg-slate-800 text-white px-4 py-2 rounded-lg text-sm font-semibold flex items-center gap-2"><i
                                class="fa-solid fa-plus text-xs"></i> Tambah Data</button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr>
                                <th class="px-6 py-4">Identitas Mahasiswa</th>
                                <th class="px-6 py-4 text-center w-32" id="col-score-title">Rata-Rata</th>
                                <th class="px-6 py-4 text-center w-48">Progress</th>
                                <th class="px-6 py-4 text-center w-32">Status</th>
                                <th class="px-6 py-4 text-center w-32">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="student-table-body" class="bg-white"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    {{-- MODALS BAWAAN (TAMBAH KELAS, HAPUS KELAS, KKM, DLL) --}}
    <div id="modal-tambah-kelas"
        class="fixed inset-0 bg-slate-900/40 hidden items-center justify-center z-50 backdrop-blur-sm flex">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-sm p-6 border border-slate-100">
            <div class="flex flex-col items-center text-center mb-5">
                <div
                    class="w-12 h-12 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center text-xl mb-3">
                    <i class="fa-solid fa-chalkboard-user"></i></div>
                <h3 class="text-xl font-bold text-slate-800">Buat Kelas Baru</h3>
            </div>
            <div class="mb-6"><input type="text" id="input-nama-kelas-baru"
                    class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-bold uppercase text-center focus:border-blue-500 outline-none"
                    placeholder="NAMA KELAS" autocomplete="off" onkeypress="handleEnterKelas(event)"></div>
            <div class="flex gap-3"><button type="button" onclick="closeModalKelas()"
                    class="flex-1 px-4 py-2.5 bg-white border border-slate-200 text-slate-600 font-semibold text-sm rounded-xl">Batal</button><button
                    type="button" onclick="simpanKelasBaru()"
                    class="flex-1 px-4 py-2.5 bg-blue-600 text-white font-semibold text-sm rounded-xl">Simpan</button>
            </div>
        </div>
    </div>
    <div id="modal-konfirmasi-hapus"
        class="fixed inset-0 bg-slate-900/40 hidden items-center justify-center z-[60] backdrop-blur-sm flex">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-sm p-6 text-center border border-slate-100">
            <div
                class="w-14 h-14 bg-rose-50 text-rose-500 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl">
                <i class="fa-solid fa-trash-can"></i></div>
            <h3 class="text-xl font-bold text-slate-800 mb-2">Hapus Kelas?</h3>
            <div class="flex justify-center gap-3"><button
                    onclick="document.getElementById('modal-konfirmasi-hapus').classList.add('hidden')"
                    class="flex-1 px-4 py-2.5 bg-white border border-slate-200 text-slate-600 font-semibold text-sm rounded-xl">Batal</button><button
                    onclick="eksekusiHapusKelas()"
                    class="flex-1 px-4 py-2.5 bg-rose-600 text-white font-semibold text-sm rounded-xl">Ya,
                    Hapus</button></div>
        </div>
    </div>
    <div id="modal-peringatan"
        class="fixed inset-0 bg-slate-900/40 hidden items-center justify-center z-[70] backdrop-blur-sm flex">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-sm p-6 text-center border border-slate-100">
            <div
                class="w-14 h-14 bg-amber-50 text-amber-500 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl">
                <i class="fa-solid fa-triangle-exclamation"></i></div>
            <h3 class="text-xl font-bold text-slate-800 mb-2" id="peringatan-title">Peringatan</h3>
            <p class="text-sm text-slate-600 mb-6" id="peringatan-text">Pesan di sini.</p>
            <button onclick="document.getElementById('modal-peringatan').classList.add('hidden')"
                class="w-full px-4 py-3 bg-slate-900 text-white font-bold text-sm rounded-xl">Mengerti</button>
        </div>
    </div>
    <div id="modal-form"
        class="fixed inset-0 bg-slate-900/40 hidden items-center justify-center z-50 backdrop-blur-sm flex">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-md p-6 border border-slate-100">
            <h3 id="modal-title" class="text-xl font-bold text-slate-800 mb-6 text-center">Tambah Mahasiswa</h3>
            <form id="student-form" method="POST" action="">
                @csrf <div id="method-spoofing"></div>
                <div class="space-y-4 mb-6">
                    <div><label class="block text-xs font-bold text-slate-500 mb-1.5 uppercase">Nama
                            Lengkap</label><input type="text" name="name" id="input-name"
                            class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-2.5 text-sm outline-none"
                            required></div>
                    <div><label class="block text-xs font-bold text-slate-500 mb-1.5 uppercase">Email</label><input
                            type="email" name="email" id="input-email"
                            class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-2.5 text-sm outline-none"
                            required></div>
                    <div><label class="block text-xs font-bold text-slate-500 mb-1.5 uppercase">Kelas
                            Aktif</label><input type="text" name="kelas" id="input-kelas"
                            class="w-full bg-slate-100 border border-slate-200 rounded-lg px-4 py-2.5 text-sm uppercase text-slate-500 font-bold cursor-not-allowed"
                            readonly required></div>
                    <div><label class="block text-xs font-bold text-slate-500 mb-1.5 uppercase">Password
                            (Opsional)</label>
                        <div class="relative"><input type="password" name="password" id="input-password"
                                class="w-full bg-slate-50 border border-slate-200 rounded-lg pl-4 pr-10 py-2.5 text-sm outline-none"
                                placeholder="Isi untuk mengubah sandi"><button type="button"
                                onclick="togglePasswordVisibility()"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-blue-600 focus:outline-none"><i
                                    class="fa-regular fa-eye" id="toggle-password-icon"></i></button></div>
                    </div>
                </div>
                <div class="flex gap-3 pt-2 border-t border-slate-100"><button type="button"
                        onclick="closeFormModal()"
                        class="flex-1 px-4 py-2.5 border border-slate-200 text-slate-600 font-semibold text-sm rounded-xl">Batal</button><button
                        type="submit"
                        class="flex-1 px-4 py-2.5 bg-slate-900 text-white font-semibold text-sm rounded-xl">Simpan
                        Data</button></div>
            </form>
        </div>
    </div>
    <div id="modal-delete"
        class="fixed inset-0 bg-slate-900/40 hidden items-center justify-center z-50 backdrop-blur-sm flex">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-sm p-6 text-center border border-slate-100">
            <div
                class="w-14 h-14 bg-rose-50 text-rose-500 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl">
                <i class="fa-solid fa-user-xmark"></i></div>
            <h3 class="text-xl font-bold text-slate-800 mb-2">Hapus Mahasiswa?</h3>
            <p class="text-sm text-slate-600 mb-6">Data <strong id="del-name"></strong> beserta riwayat nilainya akan
                dihapus permanen.</p>
            <div class="flex justify-center gap-3"><button onclick="closeDeleteModal()"
                    class="flex-1 px-4 py-2.5 bg-white border border-slate-200 rounded-xl font-semibold text-slate-700 text-sm">Batal</button>
                <form id="form-delete" method="POST" action="" class="flex-1">@csrf @method('DELETE')<button
                        type="submit"
                        class="w-full px-4 py-2.5 bg-rose-600 rounded-xl font-semibold text-white text-sm">Ya,
                        Hapus</button></form>
            </div>
        </div>
    </div>
    <div id="modal-kkm"
        class="fixed inset-0 bg-slate-900/40 hidden items-center justify-center z-50 backdrop-blur-sm flex">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-sm p-6 border border-slate-100">
            <h3 class="text-lg font-bold text-slate-800 mb-1 text-center">Batas Kelulusan (KKM)</h3>
            <form action="{{ route('admin.kkm.update') }}" method="POST">@csrf <div class="mb-6 mt-4"><input
                        type="number" name="kkm_value" value="{{ $kkm }}"
                        class="w-32 mx-auto block border border-slate-200 bg-slate-50 rounded-xl px-3 py-4 text-4xl font-black text-center text-emerald-600 outline-none"
                        required></div>
                <div class="flex gap-3 border-t border-slate-100 pt-4"><button type="button"
                        onclick="document.getElementById('modal-kkm').classList.add('hidden')"
                        class="flex-1 px-4 py-2.5 border border-slate-200 font-semibold rounded-xl text-sm">Batal</button><button
                        type="submit"
                        class="flex-1 px-4 py-2.5 bg-emerald-600 font-semibold text-white rounded-xl text-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    {{-- MODAL DETAIL SISWA --}}
    <div id="modal-detail"
        class="fixed inset-0 bg-slate-900/40 hidden items-center justify-center z-[40] backdrop-blur-sm flex">
        <div
            class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl max-h-[90vh] flex flex-col m-4 border border-slate-100 overflow-hidden">
            <div class="bg-slate-50 px-6 py-5 border-b border-slate-200 flex justify-between items-center shrink-0">
                <div>
                    <h3 class="text-sm font-bold text-slate-500 uppercase tracking-widest mb-1">Rincian Hasil Studi
                    </h3>
                    <p class="text-lg text-slate-800 font-bold leading-none" id="modal-name">-</p>
                </div>
                <button onclick="closeModal()"
                    class="w-8 h-8 flex items-center justify-center rounded-full bg-white border border-slate-200 text-slate-500 hover:bg-slate-100"><i
                        class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="p-6 overflow-y-auto flex-1 custom-scroll bg-slate-50/50">
                <table
                    class="w-full text-sm text-left border-collapse mb-8 bg-white shadow-sm rounded-xl overflow-hidden border border-slate-200">
                    <thead
                        class="bg-slate-50 text-slate-500 font-bold text-xs uppercase tracking-wider border-b border-slate-200">
                        <tr>
                            <th class="px-5 py-4">Aktivitas Modul</th>
                            <th class="px-5 py-4 text-center w-24">Skor</th>
                            <th class="px-5 py-4 text-center w-40">Waktu</th>
                            <th class="px-5 py-4 text-center w-32">Status</th>
                        </tr>
                    </thead>
                    <tbody id="modal-tbody" class="divide-y divide-slate-100"></tbody>
                </table>
                <div id="history-container"></div>
            </div>
        </div>
    </div>

    {{-- MODAL ANALISIS KUIS --}}
    <div id="modal-quiz-analysis"
        class="fixed inset-0 bg-slate-900/60 hidden items-center justify-center z-[90] backdrop-blur-sm flex">
        <div
            class="bg-white rounded-2xl shadow-2xl w-full max-w-4xl max-h-[85vh] flex flex-col m-4 border border-slate-200 overflow-hidden">
            <div
                class="bg-indigo-900 px-6 py-4 border-b border-indigo-800 flex justify-between items-center shrink-0 text-white">
                <div>
                    <h3 class="text-xs font-bold text-indigo-300 uppercase tracking-widest mb-1"><i
                            class="fa-solid fa-magnifying-glass-chart mr-1"></i> Analisis Item Ujian</h3>
                    <p class="text-lg font-bold leading-none" id="qa-title">-</p>
                </div>
                <button onclick="closeQuizAnalysis()"
                    class="w-8 h-8 flex items-center justify-center rounded-full bg-white/10 hover:bg-white/20"><i
                        class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="p-6 overflow-y-auto flex-1 custom-scroll bg-slate-50">
                <div class="flex gap-4 mb-6">
                    <div
                        class="bg-white border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl shadow-sm flex-1 text-center">
                        <div class="text-[10px] font-bold uppercase tracking-wider mb-1 text-emerald-500">Jawaban Tepat
                        </div>
                        <div class="text-3xl font-black" id="qa-correct-count">0</div>
                    </div>
                    <div
                        class="bg-white border border-rose-200 text-rose-700 px-4 py-3 rounded-xl shadow-sm flex-1 text-center">
                        <div class="text-[10px] font-bold uppercase tracking-wider mb-1 text-rose-500">Kekeliruan</div>
                        <div class="text-3xl font-black" id="qa-wrong-count">0</div>
                    </div>
                    <div
                        class="bg-white border border-slate-200 text-slate-800 px-4 py-3 rounded-xl shadow-sm flex-1 text-center">
                        <div class="text-[10px] font-bold uppercase tracking-wider mb-1 text-slate-400">Skor Akhir
                        </div>
                        <div class="text-3xl font-black text-blue-600" id="qa-score">0</div>
                    </div>
                </div>
                <div class="bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm">
                    <table class="w-full text-sm text-left border-collapse">
                        <thead
                            class="bg-slate-50 text-slate-600 font-bold text-[10px] uppercase tracking-wider border-b border-slate-200">
                            <tr>
                                <th class="px-5 py-4 w-12 text-center">No</th>
                                <th class="px-5 py-4">Detail Pilihan Siswa</th>
                                <th class="px-5 py-4 w-32 text-center">Validasi</th>
                            </tr>
                        </thead>
                        <tbody id="qa-tbody" class="divide-y divide-slate-100"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL REVIEW PRAKTIKUM --}}
    <div id="modal-review-praktikum"
        class="fixed inset-0 bg-slate-900/60 hidden items-center justify-center z-[80] backdrop-blur-sm flex">
        <div
            class="bg-white rounded-2xl shadow-2xl w-full max-w-5xl max-h-[90vh] flex flex-col m-4 border border-slate-100 overflow-hidden">
            <div class="bg-slate-900 px-6 py-4 flex justify-between items-center shrink-0 text-white">
                <div>
                    <div class="flex items-center gap-2 mb-1 opacity-80 text-xs font-medium uppercase tracking-wider">
                        <i class="fa-solid fa-microscope"></i> Mode Penilaian Praktikum</div>
                    <h3 class="text-lg font-bold leading-none" id="rev-student-name">Nama Siswa</h3>
                    <p class="text-slate-400 text-sm mt-1" id="rev-activity-name">Nama Aktivitas</p>
                </div>
                <button onclick="closeModalReview()"
                    class="w-8 h-8 flex items-center justify-center rounded-full bg-white/10 hover:bg-white/20 transition"><i
                        class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="p-6 overflow-y-auto flex-1 custom-scroll grid grid-cols-1 lg:grid-cols-2 gap-6 bg-slate-50">
                <div class="flex flex-col gap-4 h-full">
                    <div
                        class="bg-[#1e1e1e] rounded-xl overflow-hidden border border-slate-800 shadow-lg flex flex-col flex-1">
                        <div
                            class="bg-[#2d2d2d] px-4 py-2.5 text-slate-300 text-xs font-bold border-b border-slate-700 flex items-center gap-2">
                            <i class="fa-brands fa-python text-blue-400"></i> Source Code</div>
                        <div class="p-4 text-sm font-mono text-emerald-300 whitespace-pre-wrap overflow-y-auto custom-scroll flex-1"
                            id="rev-code"></div>
                        <div class="bg-[#0f0f0f] p-4 border-t border-slate-800">
                            <div class="text-slate-500 text-[10px] mb-2 font-bold tracking-widest uppercase">Console
                                Output</div>
                            <div id="rev-output" class="font-mono text-xs text-slate-300 whitespace-pre-wrap"></div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-4 h-full">
                    <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm flex-1 flex flex-col"><label
                            class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-3 flex items-center gap-2"><i
                                class="fa-solid fa-book-open-reader"></i> Analisis Siswa</label>
                        <div
                            class="bg-slate-50 border border-slate-100 rounded-lg p-4 flex-1 overflow-y-auto custom-scroll">
                            <p id="rev-explanation" class="text-sm text-slate-700 leading-relaxed"></p>
                        </div>
                    </div>
                    <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm"><label
                            class="block text-xs font-bold text-slate-400 mb-3 uppercase tracking-widest">Input Nilai
                            Final (0-100)</label>
                        <div class="flex gap-3"><input type="number" id="input-nilai-review" min="0"
                                max="100"
                                class="w-24 bg-slate-50 text-center border border-slate-200 rounded-lg px-3 py-2 text-2xl font-black text-blue-700 focus:border-blue-500 outline-none transition-all"><button
                                onclick="simpanNilaiReview()" id="btn-simpan-review"
                                class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition-colors flex items-center justify-center gap-2"><i
                                    class="fa-solid fa-floppy-disk"></i> Publikasi Nilai</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const rawDbData = `{!! isset($dbData) ? str_replace('\\', '\\\\', $dbData) : '{"A1":[], "A2":[]}' !!}`;
        let db = {};
        try {
            db = JSON.parse(rawDbData);
        } catch (e) {
            console.error("Gagal parsing JSON dari server:", e);
        }
        const activeKKM = {{ $kkm }};

        let savedManualClasses = JSON.parse(localStorage.getItem('graflearn_manual_classes') || '[]');
        savedManualClasses.forEach(cls => {
            if (!db[cls]) db[cls] = [];
        });

        let availableClasses = Object.keys(db);
        if (availableClasses.length === 0) {
            availableClasses = ['A1'];
            db['A1'] = [];
        }
        let currentClass = availableClasses[0];

        const bab1Activities = [{
            code: '1.1',
            name: 'Mengapa Kita Perlu Graf?'
        }, {
            code: '1.2',
            name: 'Komponen Utama Graf'
        }, {
            code: '1.3',
            name: 'Jenis-Jenis Karakteristik Graf'
        }, {
            code: '1.4',
            name: 'Representasi Graf'
        }, {
            code: 'quiz1',
            name: 'Kuis Modul 1'
        }, {
            code: 'refleksi1',
            name: 'Jurnal Refleksi'
        }];
        const bab2Activities = [{
            code: '2.1',
            name: 'Implementasi Dasar'
        }, {
            code: '2.2',
            name: 'Adjacency List'
        }, {
            code: '2.3',
            name: 'Adjacency Matrix'
        }, {
            code: 'quiz2',
            name: 'Kuis Modul 2'
        }, {
            code: '2.5_praktikum',
            name: 'Live Coding Praktikum'
        }, {
            code: 'refleksi2',
            name: 'Jurnal Refleksi'
        }];
        const bab3Activities = [{
            code: '3.1',
            name: 'Breadth-First Search (BFS)'
        }, {
            code: '3.2',
            name: 'Depth-First Search (DFS)'
        }, {
            code: 'quiz3',
            name: 'Kuis Modul 3'
        }, {
            code: '3.5_praktikum',
            name: 'Live Coding Praktikum'
        }, {
            code: 'refleksi3',
            name: 'Jurnal Refleksi'
        }];
        const bab4Activities = [{
            code: '4.1',
            name: 'Modifikasi Memori'
        }, {
            code: '4.2',
            name: 'Logika Infinity & Tabel Jarak'
        }, {
            code: '4.3',
            name: 'Proses Relaxation'
        }, {
            code: 'quiz4',
            name: 'Kuis Modul 4'
        }, {
            code: '4.6_praktikum',
            name: 'Live Coding Praktikum'
        }, {
            code: 'refleksi4',
            name: 'Jurnal Refleksi'
        }];
        const evaluasiActivities = [{
            code: 'ujian_akhir',
            name: 'Ujian Post-Test'
        }];
        const reflectionTemplates = {
            'bab1': {
                'q1': 'Konsep Utama',
                'q2': 'Bagian Tersulit',
                'q3': 'Penerapan Nyata',
                'q4': 'Langkah Lanjutan'
            },
            'bab2': {
                'q1': 'Konsep Utama',
                'q2': 'Bagian Tersulit',
                'q3': 'Penerapan Nyata',
                'q4': 'Langkah Lanjutan'
            },
            'bab3': {
                'q1': 'Konsep Utama',
                'q2': 'Bagian Tersulit',
                'q3': 'Penerapan Nyata',
                'q4': 'Langkah Lanjutan'
            },
            'bab4': {
                'q1': 'Konsep Utama',
                'q2': 'Bagian Tersulit',
                'q3': 'Penerapan Nyata',
                'q4': 'Langkah Lanjutan'
            }
        };

        function renderClassButtons() {
            const container = document.getElementById('class-buttons-container');
            container.innerHTML = '';
            availableClasses.forEach(cls => {
                const btn = document.createElement('button');
                btn.innerText = cls;
                btn.onclick = () => switchClass(cls);
                btn.id = `btn-class-${cls.replace(/\s+/g, '-')}`;
                container.appendChild(btn);
            });
        }

        function switchClass(cls) {
            currentClass = cls;
            Object.keys(db).forEach(c => {
                const btn = document.getElementById(`btn-class-${c.replace(/\s+/g, '-')}`);
                if (btn) {
                    btn.className = c === cls ?
                        "px-4 py-1.5 rounded-lg border text-xs font-bold transition-all bg-primary text-white border-primary shadow-md shadow-blue-500/20" :
                        "px-4 py-1.5 rounded-lg border text-xs font-semibold transition-all bg-white text-slate-500 border-slate-200 hover:bg-slate-50 hover:text-slate-700";
                }
            });
            document.getElementById('header-title').innerText = `Kelas ${cls}`;
            updateDashboard();
        }

        function updateDashboard() {
            const babIndex = document.getElementById('chapter-filter').value;
            const searchKeyword = document.getElementById('search-input').value.toLowerCase();
            let students = db[currentClass] || [];
            if (searchKeyword) students = students.filter(s => s.name.toLowerCase().includes(searchKeyword));

            const tbody = document.getElementById('student-table-body');
            const colTitle = document.getElementById('col-score-title');
            tbody.innerHTML = '';

            let totalScore = 0,
                passCount = 0,
                activeCount = 0,
                totalProgressSum = 0;

            if (students.length === 0) {
                tbody.innerHTML =
                    `<tr><td colspan="5" class="text-center py-12 bg-slate-50/50"><div class="flex flex-col items-center"><div class="w-12 h-12 bg-slate-100 text-slate-300 rounded-full flex items-center justify-center text-xl mb-3"><i class="fa-solid fa-folder-open"></i></div><p class="text-sm font-medium text-slate-500">Belum ada mahasiswa di kelas ini.</p></div></td></tr>`;
                document.getElementById('stat-avg').innerText = 0;
                document.getElementById('stat-pass').innerText = "0%";
                document.getElementById('stat-prog').innerText = "0%";
                document.getElementById('prog-bar').style.width = "0%";
                return;
            }

            students.forEach(s => {
                let displayScore = 0,
                    displayProgress = 0,
                    statusBadge = '';
                const scores = s.scores || [0, 0, 0, 0, 0],
                    details = s.detail_scores || {};

                const hitungProgress = (keys, babCode) => {
                    let count = 0;
                    keys.forEach(k => {
                        if (k.includes('refleksi')) {
                            if (s.reflections_raw && s.reflections_raw[babCode]) count++;
                        } else {
                            if (details[k]) count++;
                        }
                    });
                    return Math.round((count / keys.length) * 100);
                };

                if (babIndex === 'all') {
                    const avgQuiz = ((scores[0] || 0) + (scores[1] || 0) + (scores[2] || 0) + (scores[3] || 0)) / 4;
                    displayScore = Math.round((avgQuiz * 0.4) + ((scores[4] || 0) * 0.6));
                    displayProgress = s.progress || 0;
                    colTitle.innerText = "Nilai Akhir";
                } else if (babIndex === '0') {
                    displayScore = scores[0] || 0;
                    displayProgress = hitungProgress(['1.1', '1.2', '1.3', '1.4', 'quiz1', 'refleksi1'], 'bab1');
                    colTitle.innerText = "Skor Modul 1";
                } else if (babIndex === '1') {
                    displayScore = scores[1] || 0;
                    displayProgress = hitungProgress(['2.1', '2.2', '2.3', 'quiz2', '2.5_praktikum', 'refleksi2'],
                        'bab2');
                    colTitle.innerText = "Skor Modul 2";
                } else if (babIndex === '2') {
                    displayScore = scores[2] || 0;
                    displayProgress = hitungProgress(['3.1', '3.2', 'quiz3', '3.5_praktikum', 'refleksi3'], 'bab3');
                    colTitle.innerText = "Skor Modul 3";
                } else if (babIndex === '3') {
                    displayScore = scores[3] || 0;
                    displayProgress = hitungProgress(['4.1', '4.2', '4.3', 'quiz4', '4.6_praktikum', 'refleksi4'],
                        'bab4');
                    colTitle.innerText = "Skor Modul 4";
                } else if (babIndex === '4') {
                    displayScore = scores[4] || 0;
                    displayProgress = Math.round(((details['ujian_akhir'] ? 1 : 0) / 1) * 100);
                    colTitle.innerText = "Skor Final";
                }

                if (displayProgress > 100) displayProgress = 100;
                totalProgressSum += displayProgress;
                if (displayScore > 0) {
                    totalScore += displayScore;
                    activeCount++;
                    if (displayScore >= activeKKM) passCount++;
                }

                if (displayScore === 0) statusBadge = '<span class="badge badge-neutral">Kosong</span>';
                else if (displayScore >= activeKKM) statusBadge =
                    '<span class="badge badge-success"><i class="fa-solid fa-check mr-1.5"></i>Lulus</span>';
                else statusBadge =
                    '<span class="badge badge-danger"><i class="fa-solid fa-xmark mr-1.5"></i>Remedial</span>';

                tbody.innerHTML += `
                    <tr>
                        <td class="px-6 py-4"><div class="flex items-center gap-3"><div class="w-8 h-8 rounded-full bg-slate-100 text-slate-500 flex items-center justify-center font-bold text-xs">${s.name.charAt(0).toUpperCase()}</div><div><p class="font-bold text-slate-800 text-sm leading-tight">${s.name}</p><p class="text-[11px] text-slate-400 mt-0.5">${s.email}</p></div></div></td>
                        <td class="px-6 py-4 text-center font-black text-slate-700 text-sm">${displayScore}</td>
                        <td class="px-6 py-4"><div class="flex items-center gap-3"><div class="flex-1 bg-slate-100 rounded-full h-1.5 overflow-hidden"><div class="bg-primary h-full rounded-full" style="width: ${displayProgress}%"></div></div><span class="text-xs font-bold text-slate-500 w-8 text-right">${displayProgress}%</span></div></td>
                        <td class="px-6 py-4 text-center">${statusBadge}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-2">
                                <button onclick="showStudentDetail('${s.id}')" class="px-3 py-1.5 rounded bg-slate-100 text-slate-600 hover:bg-primary hover:text-white font-medium text-xs transition-colors border border-slate-200 hover:border-primary">Rincian</button>
                                <button onclick="openModal('edit', ${s.id}, '${s.name}', '${s.email}', '${currentClass}')" class="w-7 h-7 rounded flex items-center justify-center text-slate-400 hover:text-blue-600 hover:bg-blue-50 transition-colors"><i class="fa-solid fa-pen-to-square text-[11px]"></i></button>
                                <button onclick="openDeleteModal(${s.id}, '${s.name}')" class="w-7 h-7 rounded flex items-center justify-center text-slate-400 hover:text-rose-600 hover:bg-rose-50 transition-colors"><i class="fa-solid fa-trash text-[11px]"></i></button>
                            </div>
                        </td>
                    </tr>`;
            });
            document.getElementById('stat-avg').innerText = activeCount > 0 ? Math.round(totalScore / activeCount) : 0;
            document.getElementById('stat-pass').innerText = (activeCount > 0 ? Math.round((passCount / activeCount) *
                100) : 0) + "%";
            document.getElementById('stat-prog').innerText = (students.length > 0 ? Math.round(totalProgressSum / students
                .length) : 0) + "%";
            document.getElementById('prog-bar').style.width = (students.length > 0 ? Math.round(totalProgressSum / students
                .length) : 0) + "%";
        }

        // ==========================================
        // FUNGSI TAMPILKAN MODAL ANALISIS KUIS (DIPERBAIKI)
        // ==========================================
        function showQuizAnalysis(studentId, chapterCode, quizCode, historyIndex) {
            const student = db[currentClass].find(s => s.id == studentId);
            if (!student || !student.eval_history) return;

            const filteredHistory = student.eval_history.filter(h => h.chapter_code === chapterCode && h.section_code ===
                quizCode);
            const sortedHistory = [...filteredHistory].sort((a, b) => new Date(a.time) - new Date(b.time));
            const h = sortedHistory[historyIndex];
            if (!h) return;

            document.getElementById('qa-title').innerText =
                `${student.name} - Percobaan #${sortedHistory.length - historyIndex}`;
            document.getElementById('qa-score').innerText = h.score;

            const tbody = document.getElementById('qa-tbody');
            tbody.innerHTML = '';
            let correctCount = 0,
                wrongCount = 0,
                detailsParsed = [];

            try {
                // LOGIKA YANG SUDAH KEBAL DARI DOUBLE ENCODING
                let rawData = h.answer || h.answers;
                if (rawData) {
                    if (typeof rawData === 'string') {
                        try {
                            rawData = JSON.parse(rawData);
                        } catch (e) {}
                    }
                    if (Array.isArray(rawData)) {
                        detailsParsed = rawData;
                    } else if (typeof rawData === 'object') {
                        Object.keys(rawData).forEach(k => {
                            detailsParsed.push({
                                id: k,
                                user_answer: rawData[k],
                                is_correct: rawData[k] === true || rawData[k] === 'benar' || rawData[k] ===
                                    1
                            });
                        });
                    }
                }
            } catch (e) {
                console.warn("Gagal membaca data json:", e);
            }

            if (detailsParsed.length === 0) {
                tbody.innerHTML =
                    `<tr><td colspan="3" class="px-4 py-10 text-center bg-slate-50"><div class="flex flex-col items-center justify-center text-slate-400"><i class="fa-solid fa-database text-3xl mb-3 opacity-50"></i><p class="text-xs font-medium">Sistem database Anda saat ini hanya menyimpan skor akhir (angka).<br>Data rincian item soal yang dijawab siswa belum terekam di riwayat ujian lama ini.</p></div></td></tr>`;
            } else {
                detailsParsed.forEach((ans, idx) => {
                    let isCorrect = false;
                    if (ans.is_correct !== undefined) isCorrect = ans.is_correct;
                    else if (ans.status !== undefined) isCorrect = ans.status;

                    if (isCorrect) correctCount++;
                    else wrongCount++;

                    let badge = isCorrect ?
                        '<span class="bg-emerald-100 border border-emerald-200 text-emerald-700 px-3 py-1 rounded text-[10px] font-bold uppercase tracking-wide">Benar</span>' :
                        '<span class="bg-rose-100 border border-rose-200 text-rose-700 px-3 py-1 rounded text-[10px] font-bold uppercase tracking-wide">Salah</span>';

                    let qText = ans.question_text || ans.question ||
                        `Pertanyaan ID Soal: ${ans.id || ans.question_id || (idx+1)}`;
                    let uAns = ans.user_answer || ans.answer || '-';

                    tbody.innerHTML += `
                        <tr class="hover:bg-slate-50 border-b border-slate-100 last:border-0 transition-colors">
                            <td class="px-5 py-4 text-center font-black text-slate-500 text-lg">${idx + 1}</td>
                            <td class="px-5 py-4"><div class="text-xs text-slate-500 mb-2 font-medium leading-relaxed">${qText}</div><div class="text-xs bg-slate-50 border border-slate-200 inline-block px-3 py-1.5 rounded-lg font-semibold text-slate-800">Jawaban Siswa: <span class="${isCorrect ? 'text-emerald-600' : 'text-rose-600'} ml-1">${uAns}</span></div></td>
                            <td class="px-5 py-4 text-center">${badge}</td>
                        </tr>`;
                });
            }

            document.getElementById('qa-correct-count').innerText = correctCount;
            document.getElementById('qa-wrong-count').innerText = wrongCount;
            document.getElementById('modal-quiz-analysis').classList.remove('hidden');
        }

        function closeQuizAnalysis() {
            document.getElementById('modal-quiz-analysis').classList.add('hidden');
        }

        function showStudentDetail(studentId) {
            const student = db[currentClass].find(s => s.id == studentId);
            if (!student) return;

            document.getElementById('modal-name').innerText = student.name;
            const tbody = document.getElementById('modal-tbody');
            const historyContainer = document.getElementById('history-container');
            tbody.innerHTML = '';
            historyContainer.innerHTML = '';
            const details = student.detail_scores || {};
            const babIndex = document.getElementById('chapter-filter').value;
            let configs = [];

            if (babIndex === 'all') {
                configs = [{
                        name: 'Modul 1: Dasar-Dasar Graf',
                        code: 'bab1',
                        quiz: 'quiz1',
                        acts: bab1Activities
                    },
                    {
                        name: 'Modul 2: Representasi Graf',
                        code: 'bab2',
                        quiz: 'quiz2',
                        acts: bab2Activities
                    },
                    {
                        name: 'Modul 3: Penelusuran Graf',
                        code: 'bab3',
                        quiz: 'quiz3',
                        acts: bab3Activities
                    },
                    {
                        name: 'Modul 4: Algoritma Jalur Terpendek ',
                        code: 'bab4',
                        quiz: 'quiz4',
                        acts: bab4Activities
                    },
                    {
                        name: 'PENGUJIAN FINAL',
                        code: 'evaluasi',
                        quiz: 'ujian_akhir',
                        acts: evaluasiActivities
                    }
                ];
            } else if (babIndex === '0') configs = [{
                name: 'Modul 1: Dasar Graf',
                code: 'bab1',
                quiz: 'quiz1',
                acts: bab1Activities
            }];
            else if (babIndex === '1') configs = [{
                name: 'Modul 2: Representasi',
                code: 'bab2',
                quiz: 'quiz2',
                acts: bab2Activities
            }];
            else if (babIndex === '2') configs = [{
                name: 'Modul 3: Penelusuran',
                code: 'bab3',
                quiz: 'quiz3',
                acts: bab3Activities
            }];
            else if (babIndex === '3') configs = [{
                name: 'Modul 4: Algoritma Jalur Terpendek',
                code: 'bab4',
                quiz: 'quiz4',
                acts: bab4Activities
            }];
            else if (babIndex === '4') configs = [{
                name: 'PENGUJIAN FINAL',
                code: 'evaluasi',
                quiz: 'ujian_akhir',
                acts: evaluasiActivities
            }];

            let tbodyHTML = '';
            let historyHTML = '';

            configs.forEach(cfg => {
                tbodyHTML +=
                    `<tr class="bg-slate-100/50"><td colspan="4" class="px-5 py-2 font-bold text-slate-800 text-[11px] uppercase tracking-wider">${cfg.name}</td></tr>`;

                cfg.acts.forEach(act => {
                    let isReflection = act.code.includes('refleksi');
                    let hasReflectionData = isReflection && student.reflections_raw && student
                        .reflections_raw[cfg.code];
                    const data = details[act.code];
                    let scoreDisplay = '-';
                    let timeDisplay = '-';
                    let statusBadge = '<span class="text-[10px] text-slate-400 italic">Kosong</span>';

                    if (hasReflectionData) {
                        scoreDisplay = '<i class="fa-solid fa-check text-emerald-500"></i>';
                        timeDisplay = 'Tersimpan';
                        statusBadge = '<span class="badge badge-success">Selesai</span>';
                    } else if (data) {
                        timeDisplay = data.time || '-';
                        if (act.code.includes('praktikum')) {
                            let prakData = null;
                            try {
                                prakData = JSON.parse(data.answers);
                            } catch (e) {}
                            if (prakData && prakData.status === 'pending') {
                                scoreDisplay = '<i class="fa-solid fa-clock text-amber-500"></i>';
                                statusBadge =
                                    `<button onclick="openReviewModal(${studentId}, '${act.code}', '${cfg.code}', '${student.name}', '${act.name}')" class="bg-amber-100 text-amber-700 hover:bg-amber-600 hover:text-white border border-amber-200 px-2 py-1 rounded text-[10px] font-bold transition-colors">Beri Nilai</button>`;
                            } else {
                                scoreDisplay = data.score;
                                statusBadge =
                                    `<button onclick="openReviewModal(${studentId}, '${act.code}', '${cfg.code}', '${student.name}', '${act.name}')" class="bg-emerald-50 text-emerald-600 hover:bg-emerald-500 hover:text-white border border-emerald-200 px-2 py-1 rounded text-[10px] font-bold transition-colors">Dinilai</button>`;
                            }
                        } else {
                            scoreDisplay = data.score;
                            if (act.code.includes('quiz') || act.code.includes('ujian')) {
                                statusBadge = data.score >= activeKKM ?
                                    '<span class="badge badge-success">Lulus</span>' :
                                    '<span class="badge badge-danger">Remedial</span>';
                            } else {
                                statusBadge = data.score > 0 ?
                                    '<span class="badge badge-success">Selesai</span>' :
                                    '<span class="badge badge-neutral">Kosong</span>';
                            }
                        }
                    }
                    tbodyHTML +=
                        `<tr class="hover:bg-slate-50"><td class="px-5 py-3 text-xs font-medium text-slate-600">${act.name}</td><td class="px-5 py-3 text-center font-bold text-sm text-slate-800">${scoreDisplay}</td><td class="px-5 py-3 text-center text-[10px] text-slate-400 font-mono">${timeDisplay}</td><td class="px-5 py-3 text-center">${statusBadge}</td></tr>`;
                });

                historyHTML +=
                    `<div class="mb-6 bg-white p-5 rounded-xl border border-slate-200"><h3 class="font-bold text-xs text-slate-800 uppercase tracking-widest mb-4 border-b border-slate-100 pb-2">${cfg.name}</h3><div class="grid grid-cols-1 md:grid-cols-2 gap-6">`;
                historyHTML +=
                    `<div><h4 class="font-bold text-[10px] uppercase tracking-widest text-slate-400 mb-3"><i class="fa-solid fa-clock-rotate-left mr-1"></i> Log Ujian</h4>`;

                if (student.eval_history && student.eval_history.length > 0) {
                    const filteredHistory = student.eval_history.filter(h => h.chapter_code === cfg.code && h
                        .section_code === cfg.quiz);
                    if (filteredHistory.length > 0) {
                        const sortedHistory = [...filteredHistory].sort((a, b) => new Date(a.time) - new Date(b
                            .time));
                        historyHTML += `<div class="space-y-3 max-h-48 overflow-y-auto pr-2 custom-scroll">`;
                        const total = sortedHistory.length;

                        for (let i = total - 1; i >= 0; i--) {
                            const h = sortedHistory[i];
                            const isPass = h.score >= activeKKM;
                            const borderCol = isPass ? 'border-emerald-200 bg-emerald-50/50' :
                                'border-rose-200 bg-rose-50/50';
                            const textCol = isPass ? 'text-emerald-700' : 'text-rose-700';

                            historyHTML += `
                                <div class="flex justify-between items-center p-3 border rounded-xl ${borderCol} shadow-sm transition-transform hover:-translate-y-0.5">
                                    <div class="flex flex-col">
                                        <strong class="text-[10px] uppercase text-slate-600 tracking-wider">Percobaan #${total - i}</strong>
                                        <span class="text-[9px] text-slate-400 font-mono mt-0.5">${h.time}</span>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <div class="font-black text-xl ${textCol}">${h.score}</div>
                                        <button onclick="showQuizAnalysis('${studentId}', '${cfg.code}', '${cfg.quiz}', ${i})" class="w-8 h-8 rounded-lg bg-white border border-slate-200 text-slate-500 hover:border-blue-300 hover:text-blue-600 flex items-center justify-center transition-colors shadow-sm" title="Lihat Analisis Detail">
                                            <i class="fa-solid fa-chart-bar text-xs"></i>
                                        </button>
                                    </div>
                                </div>`;
                        }
                        historyHTML += `</div>`;
                    } else historyHTML +=
                        `<div class="p-4 bg-slate-50 border border-dashed border-slate-200 rounded-xl text-center text-xs text-slate-400">Belum ada riwayat ujian.</div>`;
                } else historyHTML +=
                    `<div class="p-4 bg-slate-50 border border-dashed border-slate-200 rounded-xl text-center text-xs text-slate-400">Belum ada riwayat ujian.</div>`;
                historyHTML += `</div>`;

                if (cfg.code !== 'evaluasi') {
                    historyHTML +=
                        `<div><h4 class="font-bold text-[10px] uppercase tracking-widest text-slate-400 mb-3"><i class="fa-solid fa-book-journal-whills mr-1"></i> Jurnal Refleksi</h4>`;
                    let currentReflection = null;
                    let rawRef = student.reflections_raw ? student.reflections_raw[cfg.code] : null;
                    if (rawRef) {
                        if (typeof rawRef === 'string') {
                            try {
                                currentReflection = JSON.parse(rawRef);
                            } catch (e) {
                                currentReflection = rawRef;
                            }
                            if (typeof currentReflection === 'string') {
                                try {
                                    currentReflection = JSON.parse(currentReflection);
                                } catch (e) {}
                            }
                        } else {
                            currentReflection = rawRef;
                        }
                    }

                    if (currentReflection && Object.keys(currentReflection).length > 0) {
                        historyHTML += `<div class="space-y-3 max-h-48 overflow-y-auto pr-2 custom-scroll">`;
                        const template = reflectionTemplates[cfg.code] || reflectionTemplates['bab1'];
                        Object.keys(template).forEach(key => {
                            const answer = currentReflection[key] || '-';
                            historyHTML +=
                                `<div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200 shadow-sm"><strong class="block mb-1.5 text-[10px] text-slate-500 uppercase tracking-wide border-b border-slate-200 pb-1.5">${template[key]}</strong><p class="text-xs text-slate-700 leading-relaxed font-medium">${answer}</p></div>`;
                        });
                        historyHTML += `</div>`;
                    } else historyHTML +=
                        `<div class="p-4 bg-slate-50 border border-dashed border-slate-200 rounded-xl text-center text-xs text-slate-400">Siswa belum mengisi jurnal.</div>`;
                    historyHTML += `</div>`;
                }
                historyHTML += `</div></div>`;
            });

            tbody.innerHTML = tbodyHTML;
            historyContainer.innerHTML = historyHTML;
            document.getElementById('modal-detail').classList.remove('hidden');
        }

        window.openReviewModal = function(studentId, sectionCode, chapterCode, studentName, activityName) {
            currentReviewStudentId = studentId;
            currentReviewSection = sectionCode;
            currentReviewChapter = chapterCode;
            document.getElementById('modal-detail').classList.add('hidden');
            document.getElementById('rev-student-name').innerText = studentName;
            document.getElementById('rev-activity-name').innerText = activityName;

            const student = db[currentClass].find(s => s.id == studentId);
            const data = student.detail_scores[sectionCode];
            let prakData = {
                kode: "",
                output: "",
                penjelasan: "",
                status: "pending"
            };
            let rawDBText = data && data.answer ? data.answer : "";

            try {
                if (data && data.answer) {
                    let parsed = data.answer;
                    while (typeof parsed === 'string') {
                        let temp = JSON.parse(parsed);
                        if (typeof temp === 'string') {
                            parsed = temp;
                        } else {
                            parsed = temp;
                            break;
                        }
                    }
                    if (parsed && typeof parsed === 'object') {
                        prakData = parsed;
                    }
                }
            } catch (e) {}

            document.getElementById('rev-code').innerText = prakData.kode ? prakData.kode : rawDBText;
            document.getElementById('rev-output').innerText = prakData.output || "Tidak ada output";
            document.getElementById('rev-explanation').innerText = prakData.penjelasan ? prakData.penjelasan : "-";

            if (prakData.status && prakData.status !== 'pending' && data.score) {
                document.getElementById('input-nilai-review').value = data.score;
            } else {
                document.getElementById('input-nilai-review').value = "";
            }

            document.getElementById('modal-review-praktikum').classList.remove('hidden');
        }

        window.closeModalReview = function() {
            document.getElementById('modal-review-praktikum').classList.add('hidden');
            document.getElementById('modal-detail').classList.remove('hidden');
        }

        window.simpanNilaiReview = function() {
            const inputVal = document.getElementById('input-nilai-review').value;
            if (inputVal === "" || inputVal < 0 || inputVal > 100) {
                alert("Masukkan nilai valid (0-100)");
                return;
            }

            const btn = document.getElementById('btn-simpan-review');
            btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Menyimpan...';
            btn.disabled = true;

            fetch("/admin/review-praktikum", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    student_id: currentReviewStudentId,
                    chapter_code: currentReviewChapter,
                    section_code: currentReviewSection,
                    score: parseInt(inputVal)
                })
            }).then(res => res.json()).then(data => {
                btn.innerHTML = '<i class="fa-solid fa-check"></i> Berhasil';
                btn.classList.replace('bg-indigo-600', 'bg-emerald-600');
                const student = db[currentClass].find(s => s.id == currentReviewStudentId);
                student.detail_scores[currentReviewSection].score = parseInt(inputVal);
                let prakData = student.detail_scores[currentReviewSection].answer;
                if (typeof prakData === 'string') prakData = JSON.parse(prakData);
                if (typeof prakData === 'string') prakData = JSON.parse(prakData);
                prakData.status = "reviewed";
                student.detail_scores[currentReviewSection].answer = JSON.stringify(prakData);
                setTimeout(() => {
                    window.closeModalReview();
                    btn.disabled = false;
                    btn.innerHTML = '<i class="fa-solid fa-floppy-disk"></i> Publikasi Nilai';
                    btn.classList.replace('bg-emerald-600', 'bg-indigo-600');
                    showStudentDetail(currentReviewStudentId);
                    updateDashboard();
                }, 800);
            }).catch(err => {
                alert("Gagal. Cek koneksi.");
                btn.innerHTML = 'Coba Lagi';
                btn.disabled = false;
            });
        }

        function openModalKelas() {
            document.getElementById('input-nama-kelas-baru').value = '';
            document.getElementById('modal-tambah-kelas').classList.remove('hidden');
            setTimeout(() => document.getElementById('input-nama-kelas-baru').focus(), 100);
        }

        function closeModalKelas() {
            document.getElementById('modal-tambah-kelas').classList.add('hidden');
        }

        function handleEnterKelas(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                simpanKelasBaru();
            }
        }

        function openDeleteModal(id, name) {
            document.getElementById('del-name').innerText = name;
            document.getElementById('form-delete').action = `/admin/student/${id}`;
            document.getElementById('modal-delete').classList.remove('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('modal-delete').classList.add('hidden');
        }

        function openKKMModal() {
            document.getElementById('modal-kkm').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('modal-detail').classList.add('hidden');
        }

        function openModal(mode, id = null, name = '', email = '', kelas = '') {
            const modal = document.getElementById('modal-form');
            const title = document.getElementById('modal-title');
            const form = document.getElementById('student-form');
            const spoof = document.getElementById('method-spoofing');
            document.getElementById('input-name').value = mode === 'add' ? '' : name;
            document.getElementById('input-email').value = mode === 'add' ? '' : email;
            document.getElementById('input-kelas').value = mode === 'add' ? (currentClass !== 'Tanpa Kelas' ? currentClass :
                '') : kelas;
            const pwdInput = document.getElementById('input-password');
            const pwdIcon = document.getElementById('toggle-password-icon');
            pwdInput.value = '';
            pwdInput.required = mode === 'add';
            pwdInput.type = 'password';
            pwdIcon.className = 'fa-regular fa-eye';
            title.innerText = mode === 'add' ? 'Tambah Mahasiswa' : 'Edit Data Mahasiswa';
            form.action = mode === 'add' ? "{{ route('admin.student.store') }}" : `/admin/student/${id}`;
            spoof.innerHTML = mode === 'add' ? '' : `@method('PUT')`;
            modal.classList.remove('hidden');
        }

        function togglePasswordVisibility() {
            const pwdInput = document.getElementById('input-password');
            const pwdIcon = document.getElementById('toggle-password-icon');
            if (pwdInput.type === 'password') {
                pwdInput.type = 'text';
                pwdIcon.classList.remove('fa-eye');
                pwdIcon.classList.add('fa-eye-slash');
            } else {
                pwdInput.type = 'password';
                pwdIcon.classList.remove('fa-eye-slash');
                pwdIcon.classList.add('fa-eye');
            }
        }

        function closeFormModal() {
            document.getElementById('modal-form').classList.add('hidden');
        }

        document.addEventListener('DOMContentLoaded', () => {
            renderClassButtons();
            switchClass(availableClasses[0]);
        });
    </script>
</body>

</html>
