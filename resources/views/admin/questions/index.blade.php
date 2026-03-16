<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Bank Soal - Admin</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
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

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <style>
        body { font-family: 'Inter', sans-serif; background-color: #F4F7F9; color: #0F172A; }

        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #CBD5E1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94A3B8; }

        /* Sidebar Nav (Disamakan dengan Dashboard) */
        .nav-link {
            display: flex; align-items: center; gap: 12px; padding: 10px 14px;
            color: #64748B; font-size: 0.875rem; font-weight: 500;
            border-radius: 8px; transition: all 0.2s; margin-bottom: 4px;
        }
        .nav-link:hover { background-color: #F1F5F9; color: #0F172A; }
        .nav-link.active { background-color: #EFF6FF; color: #2563EB; font-weight: 600; }

        /* Table Styles */
        th { font-size: 0.75rem; font-weight: 600; color: #64748B; text-transform: uppercase; letter-spacing: 0.05em; background: #F8FAFC; border-bottom: 1px solid #E2E8F0; }
        td { font-size: 0.875rem; color: #334155; border-bottom: 1px solid #F1F5F9; }
        tr { transition: background-color 0.2s; }
        tr:hover { background-color: #F8FAFC; }

        /* ============================================
           UNIFIED QUESTION TEXT FORMATTING
        ============================================ */
        .question-text, .preview-box { line-height: 1.8; color: #1e3a5f; }
        .question-text p, .preview-box p { margin-bottom: 0.75rem; }
        .question-text p:last-child, .preview-box p:last-child { margin-bottom: 0; }
        .question-text p:first-child, .preview-box p:first-child { margin-top: 0; }
        .question-text p:empty, .preview-box p:empty { display: none; }
        .question-text ol, .preview-box ol { list-style-type: decimal; margin-left: 1.75rem; margin-top: 0.5rem; margin-bottom: 0.5rem; padding-left: 0; }
        .question-text ul, .preview-box ul { list-style-type: disc; margin-left: 1.75rem; margin-top: 0.5rem; margin-bottom: 0.5rem; padding-left: 0; }
        .question-text li, .preview-box li { margin-bottom: 0.4rem; line-height: 1.6; }
        .question-text li p, .preview-box li p { margin-bottom: 0; display: inline; }
        .question-text strong, .question-text b, .preview-box strong, .preview-box b { font-weight: 700; color: #0f172a; }
        .question-text em, .question-text i, .preview-box em, .preview-box i { font-style: italic; }
        .question-text u, .preview-box u { text-decoration: underline; }
        .question-text>*:first-child, .preview-box>*:first-child { margin-top: 0 !important; }
        .question-text>*:last-child, .preview-box>*:last-child { margin-bottom: 0 !important; }
        .question-text p br:only-child, .preview-box p br:only-child { display: none; }
        .question-text ol ol, .question-text ul ul, .preview-box ol ol, .preview-box ul ul { margin-top: 0.25rem; margin-bottom: 0.25rem; }
        
        /* Auto Resize TextArea */
        textarea.auto-resize { min-height: 120px; resize: vertical; font-family: monospace; }
        
        /* Quill Editor Customizations */
        .ql-toolbar.ql-snow { border-color: #E2E8F0; border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem; background: #F8FAFC; }
        .ql-container.ql-snow { border-color: #E2E8F0; border-bottom-left-radius: 0.5rem; border-bottom-right-radius: 0.5rem; min-height: 150px; }
    </style>
</head>

<body class="h-screen flex overflow-hidden antialiased">

    {{-- SIDEBAR --}}
    <aside class="w-64 bg-white border-r border-slate-200 flex-shrink-0 flex flex-col hidden md:flex z-20">
        <div class="h-16 flex items-center px-6 border-b border-slate-100">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 hover:opacity-80 transition-opacity">
                <img src="{{ asset('images/logo_aplikasi.png') }}" alt="Logo" class="w-8 h-8 rounded-lg object-cover border border-slate-200" />
                <span class="font-bold text-lg text-slate-800 tracking-tight">GrafLearn<span class="text-primary">.</span></span>
            </a>
        </div>

        <div class="p-4 flex-1 overflow-y-auto mt-4">
            <div class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-3 px-2">Menu Utama</div>
            <nav>
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="fa-solid fa-chart-pie w-5 text-center"></i> Rekapitulasi Nilai
                </a>
                <a href="#" class="nav-link active">
                    <i class="fa-solid fa-file-pen w-5 text-center"></i> Bank Soal (Edit)
                </a>
            </nav>
        </div>

        <div class="p-4 border-t border-slate-100">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="flex items-center gap-3 w-full px-4 py-2.5 text-sm font-medium text-slate-600 transition-colors rounded-lg hover:bg-slate-100 hover:text-slate-900 group">
                    <i class="fa-solid fa-arrow-right-from-bracket text-slate-400 group-hover:text-slate-600 transition-colors"></i>
                    Keluar Sistem
                </button>
            </form>
        </div>
    </aside>

    {{-- MAIN CONTENT --}}
    <main class="flex-1 flex flex-col overflow-hidden bg-slate-50/50">
        
        {{-- Header Top --}}
        <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-8 shadow-sm z-10 sticky top-0">
            <div>
                <h1 class="text-xl font-bold text-slate-800 tracking-tight">Manajemen Konten</h1>
                <div class="flex items-center gap-2 mt-0.5">
                    <p class="text-[11px] font-medium text-slate-500 uppercase tracking-wide">Database Bank Soal & Aktivitas</p>
                </div>
            </div>
            <button onclick="openModal('add')" class="bg-slate-900 hover:bg-slate-800 text-white px-4 py-2 rounded-lg text-sm font-semibold transition-colors shadow-sm flex items-center gap-2">
                <i class="fa-solid fa-plus text-xs"></i> Buat Soal Baru
            </button>
        </header>

        <div class="flex-1 overflow-y-auto p-8">
            
            @if (session('success'))
                <div class="bg-emerald-100 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-lg mb-6 text-sm font-medium flex justify-between items-center shadow-sm">
                    <div class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-emerald-600"></i> {{ session('success') }}</div>
                    <button onclick="this.parentElement.remove()" class="text-emerald-600 hover:text-emerald-900"><i class="fa-solid fa-xmark"></i></button>
                </div>
            @endif

            <div class="bg-white border border-slate-200 rounded-xl shadow-soft overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr>
                                <th class="px-6 py-4 w-24">Kode</th>
                                <th class="px-6 py-4 w-20 text-center">Bobot</th>
                                <th class="px-6 py-4">Teks Pertanyaan / Instruksi</th>
                                <th class="px-6 py-4 w-40 text-center">Tipe Soal</th>
                                <th class="px-6 py-4 w-28 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse ($questions as $q)
                                <tr>
                                    <td class="px-6 py-4">
                                        <span class="font-mono text-xs font-bold text-slate-500 bg-slate-100 px-2 py-1 rounded">{{ $q->section_code }}</span>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <span class="text-slate-800 font-bold">{{ (int) ($q->weight ?? 10) }}</span><span class="text-[10px] text-slate-400 font-medium ml-1">pts</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-slate-700 text-sm font-medium line-clamp-2" title="{{ strip_tags($q->question_text) }}">
                                            {{ strip_tags($q->question_text) }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <span class="bg-blue-50 text-blue-600 border border-blue-100 px-2.5 py-1 rounded-md text-[10px] uppercase font-bold tracking-wide">{{ str_replace('_', ' ', $q->type) }}</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-center gap-2">
                                            <button onclick='openModal("edit", @json($q))' class="w-8 h-8 rounded flex items-center justify-center bg-slate-100 text-slate-500 hover:bg-blue-50 hover:text-blue-600 transition-colors" title="Edit Soal">
                                                <i class="fa-solid fa-pen-to-square text-xs"></i>
                                            </button>
                                            <form action="{{ route('admin.questions.destroy', $q->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus soal ini secara permanen?');">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="w-8 h-8 rounded flex items-center justify-center bg-slate-100 text-slate-500 hover:bg-rose-50 hover:text-rose-600 transition-colors" title="Hapus Soal">
                                                    <i class="fa-solid fa-trash text-xs"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center">
                                            <div class="w-12 h-12 bg-slate-50 text-slate-300 rounded-full flex items-center justify-center text-xl mb-3"><i class="fa-solid fa-box-open"></i></div>
                                            <p class="text-sm font-medium text-slate-500">Bank soal masih kosong.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    {{-- MODAL FORM IMPROVED (Split View) --}}
    <div id="questionModal" class="fixed inset-0 bg-slate-900/60 hidden items-center justify-center z-50 backdrop-blur-sm flex py-8">
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-7xl mx-6 flex h-full max-h-full overflow-hidden border border-slate-200 transform transition-all">

            {{-- LEFT: FORM EDITOR --}}
            <div class="w-[55%] border-r border-slate-200 flex flex-col bg-white">
                <div class="px-6 py-4 border-b border-slate-100 bg-slate-50 flex items-center gap-3">
                    <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center"><i class="fa-solid fa-pen-ruler"></i></div>
                    <h3 id="modalTitle" class="font-bold text-slate-800 text-lg">Editor Soal</h3>
                </div>

                <form id="questionForm" method="POST" action="" class="p-6 overflow-y-auto flex-1 custom-scroll" onsubmit="return handleFormSubmit()">
                    @csrf
                    <div id="methodSpoof"></div>

                    {{-- PENGATURAN DASAR --}}
                    <div class="bg-slate-50 border border-slate-200 p-5 mb-6 rounded-xl">
                        <h4 class="font-bold text-slate-700 mb-4 text-xs uppercase tracking-widest flex items-center gap-2"><i class="fa-solid fa-sliders text-slate-400"></i> Atribut Soal</h4>

                        <div class="mb-4">
                            <label class="block text-[11px] font-bold text-slate-500 mb-1.5 uppercase">Pemetaan Bab</label>
                            <select name="chapter_code" id="in_chapter" class="w-full border border-slate-300 rounded-lg p-2.5 text-sm bg-white font-medium focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none transition-all" onchange="updateDefaultSectionCode()">
                                <option value="bab1">Modul 1 (Dasar Graf)</option>
                                <option value="bab2">Modul 2 (Representasi Graf)</option>
                                <option value="bab3">Modul 3 (Penelusuran Graf)</option>
                                <option value="bab4">Modul 4 (Algoritma Dijkstra)</option>
                                <option value="evaluasi">Evaluasi Akhir (Post-Test)</option>
                            </select>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[11px] font-bold text-slate-500 mb-1.5 uppercase">Kode / Urutan</label>
                                <input type="text" name="section_code" id="in_section" class="w-full border border-slate-300 rounded-lg p-2.5 text-sm bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none font-mono" placeholder="Misal: quiz1" required>
                            </div>
                            <div>
                                <label class="block text-[11px] font-bold text-slate-500 mb-1.5 uppercase">Bobot Nilai Maks.</label>
                                <input type="number" name="weight" id="in_weight" class="w-full border border-slate-300 rounded-lg p-2.5 text-sm font-bold text-blue-600 bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none" value="10" required>
                            </div>
                        </div>
                    </div>

                    {{-- TIPE SOAL --}}
                    <div class="mb-6">
                        <label class="block text-[11px] font-bold text-slate-500 mb-1.5 uppercase tracking-widest">Jenis Interaksi</label>
                        <select name="type" id="in_type" class="w-full border-2 border-slate-200 rounded-xl p-3 text-sm bg-white font-bold text-slate-700 hover:border-blue-400 focus:border-blue-500 outline-none transition-colors" onchange="changeType()">
                            <option value="MULTIPLE_CHOICE">Pilihan Ganda Klasik (A, B, C, D)</option>
                            <option value="CHECKBOX">Kotak Centang (Banyak Jawaban)</option>
                            <option value="BOOLEAN">Logika Benar / Salah</option>
                            <option value="NUMBER">Input Numerik (1 Angka Pasti)</option>
                            <option value="FILL_BLANK">Isian Teks Singkat</option>
                            <option value="FILL_BLANK_MULTI">Isian Ganda Bertingkat</option>
                            <option value="DRAG_AND_DROP">Kategorisasi (Drag & Drop)</option>
                            <option value="LIVE_CODING">Terminal Python (Live Coding)</option>
                        </select>
                    </div>

                    {{-- PERTANYAAN (WYSIWYG EDITOR) --}}
                    <div class="mb-6">
                        <label class="block text-[11px] font-bold text-slate-500 mb-1.5 uppercase tracking-widest">Konten / Instruksi</label>
                        <div class="bg-white rounded-lg">
                            <div id="editor-container"></div>
                        </div>
                    </div>

                    {{-- BUILDER JAWABAN / KODE AWAL --}}
                    <div id="visualBuilderArea" class="bg-white p-5 rounded-xl border border-slate-200 shadow-sm mb-6">
                        <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-widest mb-4 border-b border-slate-100 pb-2" id="builderTitle">
                            <i class="fa-solid fa-list-check mr-1"></i> Formulator Kunci Jawaban
                        </label>

                        <div id="builderContainer" class="space-y-3 mb-4"></div>

                        <div id="liveCodingArea" class="hidden space-y-5">
                            <div>
                                <label class="block text-xs font-bold text-slate-600 mb-2 flex items-center gap-2"><i class="fa-brands fa-python text-blue-500"></i> Setup Script Awal (Opsional)</label>
                                <textarea id="in_live_code" class="auto-resize w-full border border-slate-800 bg-[#1e1e1e] text-[#d4d4d4] rounded-lg p-4 text-sm focus:ring-2 focus:ring-blue-500/50 outline-none font-mono shadow-inner" placeholder="# Tulis komentar atau kerangka kode di sini..." oninput="updatePreviewOptions()"></textarea>
                            </div>
                            <div class="bg-emerald-50 border border-emerald-200 p-4 rounded-lg">
                                <label class="block text-xs font-bold text-emerald-800 mb-2"><i class="fa-solid fa-terminal mr-1"></i> Target Output Terminal (Harus Sama Persis)</label>
                                <input type="text" id="in_live_answer" class="w-full border border-emerald-300 rounded bg-white p-2.5 text-sm font-bold font-mono text-emerald-700 outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20" placeholder="Misal: 35 atau [0, 1, 2]">
                            </div>
                        </div>

                        <button type="button" id="btnAddRow" onclick="addRow()" class="w-full border-2 border-dashed border-blue-200 text-blue-600 text-sm font-bold py-2.5 rounded-lg hover:bg-blue-50 hover:border-blue-400 transition-colors mt-2">
                            <i class="fa-solid fa-plus mr-1"></i> Tambah Opsi Baru
                        </button>

                        <div id="simpleAnswerArea" class="hidden mt-5 bg-emerald-50 p-4 rounded-lg border border-emerald-200">
                            <label class="block text-xs font-bold text-emerald-800 uppercase mb-2">Validasi Jawaban Singkat</label>
                            <input type="text" id="in_simple_answer" class="w-full border border-emerald-300 rounded bg-white p-2.5 text-sm font-bold text-emerald-700 outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20" placeholder="Ketik jawaban yang paling tepat...">
                        </div>
                    </div>

                    {{-- PENJELASAN --}}
                    <div class="mb-2">
                        <label class="block text-[11px] font-bold text-slate-500 mb-1.5 uppercase tracking-widest">Penjelasan Pasca-Ujian</label>
                        <textarea name="explanation" id="in_explanation" rows="3" class="w-full border border-slate-300 rounded-lg p-3 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none" placeholder="Opsional. Alasan logis mengapa jawaban tersebut benar..."></textarea>
                    </div>

                    <textarea name="question_text" id="in_question_hidden" class="hidden" style="display:none;"></textarea>
                    <textarea name="options" id="final_options" class="hidden" style="display:none;"></textarea>
                    <textarea name="correct_answer" id="final_answer" class="hidden" style="display:none;"></textarea>
                </form>

                <div class="px-6 py-4 border-t border-slate-200 bg-white flex justify-end gap-3 shrink-0">
                    <button type="button" onclick="closeModal()" class="px-5 py-2.5 bg-slate-100 rounded-lg text-slate-600 font-bold hover:bg-slate-200 transition-colors">Tutup</button>
                    <button type="submit" form="questionForm" class="px-6 py-2.5 bg-blue-600 text-white rounded-lg font-bold hover:bg-blue-700 shadow-md shadow-blue-600/20 transition-colors flex items-center gap-2">
                        <i class="fa-solid fa-floppy-disk"></i> Simpan ke Database
                    </button>
                </div>
            </div>

            {{-- RIGHT: LIVE PREVIEW --}}
            <div class="w-[45%] bg-[#F8FAFC] flex flex-col border-l border-slate-200">
                <div class="px-6 py-4 border-b border-slate-200 bg-white flex items-center gap-2 shrink-0">
                    <i class="fa-regular fa-eye text-slate-400"></i>
                    <h3 class="font-bold text-slate-700 text-sm tracking-wide uppercase">Simulasi Tampilan Siswa</h3>
                </div>

                <div class="p-8 overflow-y-auto flex-1 custom-scroll">
                    
                    <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
                        <div class="flex items-start gap-4 mb-5">
                            <div class="bg-blue-600 text-white w-8 h-8 rounded-full flex items-center justify-center font-bold text-sm shrink-0 shadow-sm mt-0.5">1</div>
                            <div class="w-full">
                                <div class="flex justify-between items-center mb-2">
                                    <h4 class="font-bold text-slate-500 text-[10px] uppercase tracking-widest bg-slate-100 px-2 py-0.5 rounded inline-block" id="preview-type-label">Tipe Soal</h4>
                                    <span class="text-xs font-bold text-amber-500 bg-amber-50 px-2 py-0.5 rounded">10 pts</span>
                                </div>
                                <div class="preview-box border-b border-slate-100 pb-5 mb-5 min-h-[50px]">
                                    <div id="preview-question" class="text-[15px] text-slate-800">
                                        <em class="text-slate-400 font-normal">Konten instruksi akan dirender di sini...</em>
                                    </div>
                                </div>
                                
                                {{-- Preview Options --}}
                                <div id="preview-options-container" class="w-full">
                                    <div class="text-slate-400 text-sm italic text-center py-4 bg-slate-50 rounded-lg border border-dashed border-slate-200">Pilihan UI akan menyesuaikan tipe soal...</div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    {{-- JAVASCRIPT TETAP SAMA KARENA LOGIKANYA SUDAH SANGAT SOLID --}}
    <script>
        function updateDefaultSectionCode() {
            const chapter = document.getElementById('in_chapter').value;
            const section = document.getElementById('in_section');
            if (chapter === 'bab1') section.value = 'quiz1';
            else if (chapter === 'bab2') section.value = 'quiz2';
            else if (chapter === 'bab3') section.value = 'quiz3';
            else if (chapter === 'bab4') section.value = 'quiz4'; 
            else if (chapter === 'evaluasi') section.value = 'ujian_akhir'; 
        }

        let quill;
        document.addEventListener('DOMContentLoaded', function() {
            quill = new Quill('#editor-container', {
                theme: 'snow',
                placeholder: 'Ketik narasi soal, rumus, atau deskripsi masalah...',
                modules: {
                    toolbar: [
                        ['bold', 'italic', 'underline', 'strike'],
                        ['code-block'],
                        [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                        [{ 'script': 'sub' }, { 'script': 'super' }],
                        [{ 'color': [] }, { 'background': [] }],
                        ['clean']
                    ]
                }
            });
            quill.on('text-change', function() { updatePreview(); });
        });

        function updatePreview() {
            const html = quill.root.innerHTML;
            const previewQuestion = document.getElementById('preview-question');
            if (html.trim() === '<p><br></p>' || html.trim() === '') {
                previewQuestion.innerHTML = '<em class="text-slate-400 font-normal">Konten instruksi akan dirender di sini...</em>';
            } else {
                previewQuestion.innerHTML = html;
            }
            
            // Auto update weight preview
            const weightVal = document.getElementById('in_weight').value;
            const weightBadge = document.querySelector('.bg-amber-50.px-2');
            if(weightBadge) weightBadge.innerText = weightVal + ' pts';
        }

        // Event listener tambahan untuk update point real-time
        document.getElementById('in_weight').addEventListener('input', updatePreview);

        const TYPE_CONFIG = {
            'MULTIPLE_CHOICE': { title: 'Pilihan Ganda', hasRows: true, inputType: 'radio', hasSimple: false, isLiveCode: false },
            'CHECKBOX': { title: 'Kotak Centang', hasRows: true, inputType: 'checkbox', hasSimple: false, isLiveCode: false },
            'BOOLEAN': { title: 'Benar / Salah', hasRows: true, inputType: 'radio', hasSimple: false, fixed: true, isLiveCode: false },
            'NUMBER': { title: 'Input Angka', hasRows: false, hasSimple: true, isLiveCode: false },
            'FILL_BLANK': { title: 'Isian Singkat', hasRows: false, hasSimple: true, isLiveCode: false },
            'FILL_BLANK_MULTI': { title: 'Isian Bertingkat', hasRows: true, inputType: 'text_only', hasSimple: false, isLiveCode: false },
            'DRAG_AND_DROP': { title: 'Kategorisasi', hasRows: true, inputType: 'hidden', hasSimple: false, customRow: true, isLiveCode: false },
            'LIVE_CODING': { title: 'Live Coding', hasRows: false, hasSimple: false, isLiveCode: true }
        };

        function openModal(mode, data = null) {
            const modal = document.getElementById('questionModal');
            const form = document.getElementById('questionForm');
            const spoof = document.getElementById('methodSpoof');
            const title = document.getElementById('modalTitle');

            form.reset();
            spoof.innerHTML = '';
            document.getElementById('builderContainer').innerHTML = '';
            document.getElementById('in_live_code').value = '';
            document.getElementById('in_live_answer').value = '';
            quill.setText('');

            const typeInput = document.getElementById('in_type');
            typeInput.value = 'MULTIPLE_CHOICE';

            modal.classList.remove('hidden');

            if (mode === 'edit' && data) {
                title.innerText = 'Edit Data Soal';
                form.action = "/admin/questions/" + data.id;
                spoof.innerHTML = `@method('PUT')`;

                document.getElementById('in_chapter').value = data.chapter_code || 'bab1';
                document.getElementById('in_section').value = data.section_code;
                document.getElementById('in_weight').value = Math.round(data.weight);

                let safeType = (data.type || 'MULTIPLE_CHOICE').toUpperCase();
                typeInput.value = safeType;

                quill.root.innerHTML = data.question_text || '';
                document.getElementById('in_explanation').value = data.explanation || '';

                initBuilder(safeType, data.options, data.correct_answer);
            } else {
                title.innerText = 'Konstruksi Soal Baru';
                form.action = "{{ route('admin.questions.store') }}";
                document.getElementById('in_chapter').value = 'bab1';
                updateDefaultSectionCode();
                changeType();
            }
            updatePreview();
        }

        function closeModal() { document.getElementById('questionModal').classList.add('hidden'); }

        function changeType() {
            const type = document.getElementById('in_type').value;
            const container = document.getElementById('builderContainer');
            container.innerHTML = '';

            const config = TYPE_CONFIG[type] || TYPE_CONFIG['MULTIPLE_CHOICE'];
            document.getElementById('preview-type-label').innerText = config.title;

            if (type === 'BOOLEAN') {
                addRow('BOOLEAN', 'T', 'Pernyataan Benar (True)', false);
                addRow('BOOLEAN', 'F', 'Pernyataan Salah (False)', false);
            } else if (config.hasRows) {
                addRow(type);
                if (type !== 'DRAG_AND_DROP') addRow(type); 
            }

            updateUiState();
            updatePreviewOptions();
        }

        function initBuilder(type, optionsJson, answerJson) {
            const container = document.getElementById('builderContainer');
            container.innerHTML = '';

            let opts = parseJsonSafe(optionsJson) || {};
            let ans = parseJsonSafe(answerJson);
            if (ans === null && answerJson) ans = answerJson; 

            const config = TYPE_CONFIG[type] || TYPE_CONFIG['MULTIPLE_CHOICE'];
            document.getElementById('preview-type-label').innerText = config.title;

            if (type === 'LIVE_CODING') {
                document.getElementById('in_live_code').value = optionsJson || '';
                document.getElementById('in_live_answer').value = answerJson || '';
            } else if (type === 'DRAG_AND_DROP' && Array.isArray(opts)) {
                opts.forEach(item => { addRow(type, item.id, item.text, false, item.category); });
            } else if (config.hasSimple) {
                const val = Array.isArray(ans) ? JSON.stringify(ans) : (ans || '');
                document.getElementById('in_simple_answer').value = val;
            } else if (config.hasRows) {
                const letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                let itemsToRender = [];

                if (Array.isArray(opts)) {
                    itemsToRender = opts.map((val, idx) => ({ oldKey: val, val: val }));
                } else if (typeof opts === 'object') {
                    itemsToRender = Object.entries(opts).map(([k, v]) => ({ oldKey: k, val: v }));
                }

                itemsToRender.forEach((item, idx) => {
                    let newKey = (type === 'MULTIPLE_CHOICE' || type === 'CHECKBOX') ? (letters[idx] || (idx + 1).toString()) : item.oldKey;
                    let isSelected = checkAnswerMatch(ans, item.oldKey, item.val);
                    addRow(type, newKey, item.val, isSelected);
                });
            }
            updateUiState();
            updatePreviewOptions();
        }

        function checkAnswerMatch(ans, key, val) {
            if (!ans) return false;
            let sAns = Array.isArray(ans) ? ans.map(String) : [String(ans)];
            sAns = sAns.map(s => s.toLowerCase());
            return sAns.includes(String(key).toLowerCase());
        }

        function addRow(typeArg, key = '', val = '', isSelected = false, category = '') {
            const container = document.getElementById('builderContainer');
            const type = typeArg || document.getElementById('in_type').value;
            const config = TYPE_CONFIG[type];

            const div = document.createElement('div');
            div.className = 'flex gap-2 items-center builder-row mb-3 relative group';

            if (!key && type !== 'BOOLEAN') {
                if (type === 'MULTIPLE_CHOICE' || type === 'CHECKBOX') {
                    const letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                    const existingRows = container.querySelectorAll('.row-text').length;
                    key = letters[existingRows] || (existingRows + 1).toString();
                } else {
                    key = 'var_' + Math.floor(Math.random() * 1000);
                }
            }

            let cleanVal = val ? String(val).replace(/"/g, '&quot;') : '';
            let inputHtml = '';

            if (type === 'DRAG_AND_DROP') {
                const cats = { 'distractor': 'Pengecoh (Distractor)', 'vertex': 'Simpul (Vertex)', 'edge': 'Sisi (Edge)', 'degree': 'Derajat (Degree)' };
                let catOptions = '';
                for (const [k, v] of Object.entries(cats)) {
                    let selected = (k === category) ? 'selected' : '';
                    catOptions += `<option value="${k}" ${selected}>${v}</option>`;
                }
                inputHtml += `
                <div class="flex-1 flex gap-2">
                    <input type="text" class="row-text border border-slate-300 p-2.5 rounded-lg w-1/2 text-sm focus:border-blue-500 outline-none" placeholder="Teks Label Kartu" value="${cleanVal}" data-key="${key}" required oninput="updatePreviewOptions()"> 
                    <select class="row-category border border-slate-300 bg-slate-50 p-2.5 rounded-lg w-1/2 text-sm font-semibold text-slate-700 outline-none focus:border-blue-500" onchange="updatePreviewOptions()">
                        <option value="" disabled ${!category ? 'selected' : ''}>-- Kelompokkan --</option>
                        ${catOptions}
                    </select>
                </div>`;
            } else if (type === 'FILL_BLANK_MULTI') {
                inputHtml += `
                <div class="flex-1 flex gap-2">
                    <input type="text" class="row-text border border-slate-300 p-2.5 rounded-lg w-1/2 text-sm focus:border-blue-500 outline-none" placeholder="Konteks (Misal: Degree C =)" value="${key}" data-key="${key}" required oninput="updatePreviewOptions()"> 
                    <input type="text" class="row-answer border border-emerald-300 bg-emerald-50 text-emerald-800 font-bold p-2.5 rounded-lg w-1/2 text-sm focus:border-emerald-500 outline-none" placeholder="Jawaban Valid" value="${cleanVal}" required oninput="updatePreviewOptions()"> 
                </div>`;
            } else {
                if (config.inputType === 'radio' || config.inputType === 'checkbox') {
                    const checked = isSelected ? 'checked' : '';
                    const nameAttr = config.inputType === 'radio' ? 'name="correct_visual"' : '';
                    inputHtml += `<div class="flex items-center justify-center w-10 h-10 bg-slate-50 border border-slate-200 rounded-lg shrink-0"><input type="${config.inputType}" ${nameAttr} class="w-4 h-4 cursor-pointer answer-selector" ${checked} onchange="updatePreviewOptions()"></div>`;
                }
                let label = (type === 'MULTIPLE_CHOICE') ? `<span class="text-sm font-black text-slate-400 w-6 text-center">${key}</span>` : '';
                let isRequired = (type === 'BOOLEAN') ? '' : 'required';
                inputHtml += `<div class="flex-1 flex items-center gap-2 border border-slate-300 rounded-lg bg-white px-3 focus-within:border-blue-500 transition-colors">
                                ${label}
                                <input type="text" class="row-text w-full p-2.5 text-sm outline-none bg-transparent" placeholder="Ketik redaksi jawaban..." value="${cleanVal}" data-key="${key}" ${isRequired} oninput="updatePreviewOptions()">
                              </div>`;
            }

            if (type !== 'BOOLEAN') {
                inputHtml += `<button type="button" onclick="this.parentElement.remove(); updatePreviewOptions();" class="bg-rose-50 text-rose-500 w-10 h-10 rounded-lg hover:bg-rose-500 hover:text-white transition-colors shrink-0 flex items-center justify-center" title="Hapus baris"><i class="fa-solid fa-trash"></i></button>`;
            }

            div.innerHTML = inputHtml;
            container.appendChild(div);
            updatePreviewOptions();
        }

        function updateUiState() {
            const type = document.getElementById('in_type').value;
            const config = TYPE_CONFIG[type];
            if (!config) return;

            const btn = document.getElementById('btnAddRow');
            const simpleArea = document.getElementById('simpleAnswerArea');
            const liveCodeArea = document.getElementById('liveCodingArea');

            btn.classList.toggle('hidden', !config.hasRows || config.fixed);
            simpleArea.classList.toggle('hidden', !config.hasSimple);
            liveCodeArea.classList.toggle('hidden', !config.isLiveCode);
        }

        function updatePreviewOptions() {
            const type = document.getElementById('in_type').value;
            const config = TYPE_CONFIG[type];
            const container = document.getElementById('preview-options-container');
            const rows = document.querySelectorAll('.builder-row');

            if (type === 'LIVE_CODING') {
                const codeVal = document.getElementById('in_live_code').value;
                container.innerHTML = `
                <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow border border-slate-700 flex flex-col">
                    <div class="bg-[#2d2d2d] px-4 py-2.5 flex items-center justify-between border-b border-slate-700">
                        <span class="text-slate-400 text-xs font-bold tracking-widest uppercase"><i class="fa-solid fa-code mr-1 text-blue-400"></i> Terminal Editor</span>
                        <button type="button" class="bg-slate-700 text-slate-400 px-3 py-1 rounded text-[10px] font-bold cursor-not-allowed uppercase tracking-wider">Run Code</button>
                    </div>
                    <pre class="w-full min-h-[140px] p-5 font-mono text-[13px] text-[#d4d4d4] m-0 overflow-x-auto whitespace-pre-wrap">${codeVal || '# Area ini dapat diketik oleh siswa nanti...'}</pre>
                </div>`;
                return;
            }

            if (type === 'BOOLEAN') {
                let booleanHtml = '<div class="space-y-3">';
                rows.forEach((r) => {
                    const val = r.querySelector('.row-text')?.value || '';
                    const key = r.querySelector('.row-text')?.getAttribute('data-key') || '';
                    booleanHtml += `
                    <div class="flex items-center gap-4 p-4 border border-slate-200 rounded-xl bg-white shadow-sm">
                        <div class="w-5 h-5 rounded-full border-2 border-slate-300"></div>
                        <span class="font-semibold text-slate-700 text-sm">${val}</span>
                    </div>`;
                });
                container.innerHTML = booleanHtml + '</div>';
                return;
            }

            if (rows.length === 0 && !config.hasSimple) {
                container.innerHTML = '<div class="text-slate-400 text-sm italic text-center py-4 bg-slate-50 rounded-lg border border-dashed border-slate-200">Tambahkan opsi di editor untuk melihat *preview*</div>';
                return;
            }

            if (config.hasSimple) {
                container.innerHTML = '<input type="text" class="w-full border border-slate-300 p-3 rounded-xl bg-white shadow-sm text-sm" placeholder="Siswa akan mengetik jawaban di sini..." disabled>';
                return;
            }

            let html = '<div class="space-y-3">';
            rows.forEach(r => {
                const val = r.querySelector('.row-text')?.value || '';
                const key = r.querySelector('.row-text')?.getAttribute('data-key') || '';

                if (type === 'DRAG_AND_DROP') {
                    const cat = r.querySelector('.row-category')?.value || 'Uncategorized';
                    html += `<div class="text-xs border border-slate-200 p-2.5 rounded-lg bg-white shadow-sm inline-block mr-2 mb-2 font-medium">${val} <span class="text-slate-400 font-normal ml-1">(${cat})</span></div>`;
                } else if (type === 'CHECKBOX') {
                    html += `<div class="flex items-center gap-4 p-3.5 border border-slate-200 rounded-xl bg-white shadow-sm"><div class="w-5 h-5 rounded border-2 border-slate-300"></div><span class="text-sm font-medium text-slate-700">${val}</span></div>`;
                } else if (type === 'MULTIPLE_CHOICE') {
                    html += `<div class="flex items-center gap-4 p-3.5 border border-slate-200 rounded-xl bg-white shadow-sm"><div class="w-8 h-8 rounded-lg bg-slate-100 text-slate-500 font-bold flex items-center justify-center shrink-0 text-sm border border-slate-200">${key}</div><span class="text-sm font-medium text-slate-700">${val}</span></div>`;
                } else {
                    html += `<div class="p-3 border border-slate-200 rounded-xl bg-white shadow-sm flex items-center gap-3"><span class="text-slate-400 text-xs font-bold w-16 text-right">${key} :</span> <input type="text" class="border border-slate-200 bg-slate-50 rounded p-1.5 text-xs flex-1" disabled placeholder="Isian..."></div>`;
                }
            });
            container.innerHTML = html + (type === 'DRAG_AND_DROP' ? '' : '</div>');
        }

        function handleFormSubmit() {
            document.getElementById('in_question_hidden').value = quill.root.innerHTML;
            const type = document.getElementById('in_type').value;
            const config = TYPE_CONFIG[type];

            let finalOptions = null; let finalAnswer = null;

            if (type === 'LIVE_CODING') {
                finalOptions = document.getElementById('in_live_code').value; 
                finalAnswer = document.getElementById('in_live_answer').value; 
            } else if (config.hasSimple) {
                finalOptions = "[]"; 
                let ans = document.getElementById('in_simple_answer').value;
                finalAnswer = ans.includes('/') ? JSON.stringify(ans.split('/').map(s => s.trim())) : JSON.stringify([ans]);
            } else if (type === 'DRAG_AND_DROP') {
                let optionsArray = [];
                document.querySelectorAll('.builder-row').forEach((r, index) => {
                    optionsArray.push({ 'id': 'item_' + index, 'text': r.querySelector('.row-text').value, 'category': r.querySelector('.row-category').value });
                });
                finalOptions = JSON.stringify(optionsArray);
                finalAnswer = JSON.stringify(['check_json']);
            } else if (type === 'FILL_BLANK_MULTI') {
                let optsArr = [], ansArr = [];
                document.querySelectorAll('.builder-row').forEach(r => {
                    optsArr.push(r.querySelector('.row-text').value);
                    ansArr.push(r.querySelector('.row-answer').value);
                });
                finalOptions = JSON.stringify(optsArr);
                finalAnswer = JSON.stringify(ansArr);
            } else {
                let optsObj = {}, correctKeys = [];
                document.querySelectorAll('.builder-row').forEach(r => {
                    let key = r.querySelector('.row-text').getAttribute('data-key');
                    optsObj[key] = r.querySelector('.row-text').value;
                    if (r.querySelector('.answer-selector')?.checked) correctKeys.push(key);
                });
                finalOptions = JSON.stringify(optsObj);
                finalAnswer = JSON.stringify(config.inputType === 'radio' ? [correctKeys[0] || ''] : correctKeys);
            }

            document.getElementById('final_options').value = finalOptions;
            document.getElementById('final_answer').value = finalAnswer;
            return true;
        }

        function parseJsonSafe(str) {
            try { return typeof str === 'object' ? str : JSON.parse(str); } catch (e) { return null; }
        }
    </script>
</body>
</html>