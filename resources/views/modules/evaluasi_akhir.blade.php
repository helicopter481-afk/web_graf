<section id="step-0" class="step-slide step-active" style="display: block !important; opacity: 1 !important; visibility: visible !important;">

    {{-- Import Pyodide untuk Live Coding --}}
    <script src="https://cdn.jsdelivr.net/pyodide/v0.24.1/full/pyodide.js"></script>

    <style>
        /* ========================================= */
        /* CSS KHUSUS UJIAN: FIX ANIMASI & LAYOUT    */
        /* ========================================= */

        /* 1. MATIKAN SEMUA ANIMASI BAWAAN (KUNCI AGAR TIDAK GESER) */
        body.exam-mode,
        body.exam-mode * {
            transition: none !important;
            animation: none !important;
        }

        /* 2. PAKSA WRAPPER AGAR DIAM & FULLSCREEN */
        body.exam-mode .step-slide,
        body.exam-mode .step-active {
            transform: none !important;
            position: static !important;
            width: 100% !important;
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            opacity: 1 !important;
        }

        /* 3. SEMBUNYIKAN ELEMEN PENGGANGGU */
        body.exam-mode aside,
        body.exam-mode header,
        body.exam-mode nav,
        body.exam-mode .sb-container,
        body.exam-mode footer,
        body.exam-mode #navigasi-bawah-asli {
            display: none !important;
        }

        /* 4. RESET CONTAINER UTAMA LARAVEL */
        body.exam-mode main {
            padding: 0 !important;
            margin: 0 !important;
            width: 100vw !important;
            max-width: none !important;
            transform: none !important;
        }

        body.exam-mode #content-area {
            padding: 0 !important;
            margin: 0 !important;
            width: 100% !important;
            max-width: none !important;
        }

        /* 5. WRAPPER QUIZ MENGUASAI LAYAR (SNAP INSTAN) */
        body.exam-mode #quiz-wrapper {
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            right: 0 !important;
            bottom: 0 !important;
            width: 100vw !important;
            height: 100vh !important;
            background: #f8fafc !important;
            z-index: 2147483647 !important;
            display: flex;
            flex-direction: column;
            margin: 0 !important;
            border-radius: 0 !important;
        }

        /* 6. LAYOUT AREA SOAL */
        body.exam-mode #area-soal {
            flex: 1;
            width: 100%;
            overflow-y: auto;
            padding: 20px 40px;
            background-color: #f8fafc;
            scroll-behavior: auto !important;
        }

        /* 7. SIDEBAR KANAN */
        body.exam-mode #sidebar-nav {
            width: 320px;
            flex-shrink: 0;
            border-left: 1px solid #e2e8f0;
            background: white;
            overflow-y: auto;
            z-index: 20;
        }

        /* === Styling Elemen Kecil (Tombol, dll) === */
        .choice-btn {
            background: #fff;
            border: 1px solid #cbd5e1;
            color: #475569;
            padding: 1rem 1rem 1rem 3.5rem;
            position: relative;
            border-radius: 0.5rem;
            width: 100%;
            text-align: left;
            margin-bottom: 0.75rem;
        }

        body.exam-mode .choice-btn {
            transition: border-color 0.2s, background-color 0.2s !important;
        }

        .choice-btn:hover:not(:disabled) {
            background: #f1f5f9;
            border-color: #94a3b8;
        }

        .choice-selected {
            background: #1e293b !important;
            color: #fff !important;
            border-color: #1e293b !important;
        }

        .badge-key {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            width: 1.8rem;
            height: 1.8rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: 700;
            border-radius: 4px;
            background: #f1f5f9;
            color: #64748b;
            border: 1px solid #e2e8f0;
        }

        .choice-selected .badge-key {
            background: #475569;
            color: #fff;
            border-color: #475569;
        }

        .nav-btn {
            background: #fff;
            border: 1px solid #e2e8f0;
            color: #64748b;
            font-weight: 600;
        }

        .nav-active {
            background: #1e293b !important;
            color: #fff !important;
            border-color: #1e293b !important;
        }

        .nav-answered {
            background: #15803d !important;
            color: #fff !important;
            border-color: #15803d !important;
        }

        .nav-ragu {
            background: #e2e8f0 !important;
            color: #475569 !important;
            border-color: #cbd5e1 !important;
        }

        html.exam-active,
        body.exam-mode {
            overflow: hidden !important;
        }

        .question-text ul,
        .question-text ol {
            padding-left: 1.5rem;
            margin-top: 0.5rem;
            margin-bottom: 0.5rem;
        }

        /* Style Live Coding */
        textarea.live-editor { 
            min-height: 160px; 
            font-family: monospace; 
            font-size: 14px; 
            background: #1e1e1e; 
            color: #d4d4d4; 
        }

        /* Style Drag & Drop */
        .dnd-container { display: flex; flex-direction: column; gap: 20px; }
        .source-zone { min-height: 80px; padding: 15px; background: #f1f5f9; border: 2px dashed #cbd5e1; border-radius: 10px; display: flex; flex-wrap: wrap; gap: 10px; align-items: center; }
        .target-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px; }
        @media (min-width: 768px) { .target-grid { grid-template-columns: repeat(4, 1fr); } }
        .drop-zone { background: white; border: 2px solid #e2e8f0; border-radius: 10px; min-height: 120px; display: flex; flex-direction: column; }
        .zone-header { padding: 8px; font-size: 12px; font-weight: 800; text-transform: uppercase; text-align: center; border-bottom: 1px solid #e2e8f0; border-radius: 8px 8px 0 0; }
        .zone-body { flex: 1; padding: 10px; display: flex; flex-direction: column; gap: 8px; }
        .zone-vertex { border-color: #3b82f6; } .zone-vertex .zone-header { background: #eff6ff; color: #1e40af; border-color: #dbeafe; }
        .zone-edge { border-color: #10b981; } .zone-edge .zone-header { background: #ecfdf5; color: #047857; border-color: #d1fae5; }
        .zone-degree { border-color: #a855f7; } .zone-degree .zone-header { background: #faf5ff; color: #7e22ce; border-color: #f3e8ff; }
        .zone-distractor { border-color: #f43f5e; } .zone-distractor .zone-header { background: #fff1f2; color: #be123c; border-color: #ffe4e6; }
        .drag-item { padding: 8px 12px; background: white; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; font-weight: 600; cursor: grab; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05); user-select: none; touch-action: none; }
        .drag-item:active { cursor: grabbing; border-color: #3b82f6; }
        input:disabled, textarea:disabled { color: #334155 !important; opacity: 1 !important; -webkit-text-fill-color: #334155 !important; }
    </style>

    {{-- WRAPPER UTAMA QUIZ --}}
    <div id="quiz-wrapper">
        {{-- HEADER QUIZ --}}
        <div class="h-16 bg-[#0f172a] border-b border-slate-700 flex justify-between items-center px-6 shrink-0 z-30 shadow-md">
            <div>
                <h2 class="font-black text-white text-lg tracking-widest">EVALUASI AKHIR</h2>
                <p class="text-xs text-slate-400">Post-Test Struktur Data Graf</p>
            </div>
            <div class="flex items-center gap-3 bg-slate-800 px-4 py-2 rounded-lg border border-slate-600">
                <i class="fa-regular fa-clock text-slate-300"></i>
                <div id="timer-display" class="font-mono font-bold text-xl text-yellow-400 leading-none">
                    {{ sprintf('%02d:00', $waktuMenit ?? 40) }}
                </div>
            </div>
        </div>

        {{-- BODY --}}
        <div class="flex flex-1 overflow-hidden relative">

            {{-- KIRI: AREA SOAL --}}
            <div id="area-soal" class="custom-scroll">
                <div class="max-w-6xl mx-auto w-full pt-6 pb-24">

                    @if (isset($evaluasi) && count($evaluasi) > 0)
                        @foreach ($evaluasi as $index => $soal)
                            @php
                                $nomor = $index + 1;
                                $qid = 'soal_' . $nomor;
                            @endphp

                            <div id="container-{{ $nomor }}" class="blok-soal {{ $index === 0 ? 'block' : 'hidden' }}">

                                {{-- Label Nomor & Indikator --}}
                                <div class="flex justify-between items-center mb-4">
                                    <span class="bg-slate-200 text-slate-700 px-3 py-1 rounded text-xs font-bold uppercase tracking-wider">
                                        Soal {{ $nomor }}
                                    </span>
                                    @if($soal->type == 'LIVE_CODING')
                                        <span class="bg-blue-100 text-blue-700 border border-blue-200 px-3 py-1 rounded text-xs font-bold flex items-center gap-2 shadow-sm animate-pulse">
                                            <i class="fa-brands fa-python"></i> Ujian Praktik
                                        </span>
                                    @endif
                                </div>

                                {{-- Kartu Soal --}}
                                <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm mb-6">
                                    <div class="question-text text-base font-medium text-slate-800 leading-relaxed">
                                        {!! $soal->question_text !!}
                                    </div>
                                </div>

                                {{-- Opsi Jawaban --}}
                                <div class="pl-1">

                                    {{-- 1. LIVE CODING --}}
                                    @if($soal->type == 'LIVE_CODING')
                                        <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 flex flex-col">
                                            <div class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700 shrink-0">
                                                <span class="text-slate-400 text-xs"><i class="fa-solid fa-terminal mr-1"></i> Terminal Editor (Python)</span>
                                                <button type="button" onclick="jalankanLiveCoding('{{ $qid }}', {{ $nomor }}, '{{ addslashes(str_replace(['[', ']', '"', "'"], '', $soal->correct_answer)) }}')" id="btn-run-{{ $nomor }}" class="bg-emerald-600 hover:bg-emerald-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors flex items-center gap-2 shadow-sm">
                                                    <i class="fa-solid fa-play"></i> Jalankan Kode
                                                </button>
                                            </div>
                                            <textarea id="editor-{{ $nomor }}" class="live-editor w-full p-5 outline-none resize-none leading-relaxed overflow-hidden" spellcheck="false" oninput="window.autoResizeEditor(this)">{{ trim(str_replace(['"', '\"'], '', strip_tags($soal->options))) }}</textarea>
                                            
                                            <div class="px-5 pb-5 pt-3 bg-black text-left w-full border-t border-slate-700 shadow-inner">
                                                <div class="flex justify-between items-center mb-2">
                                                    <span class="text-slate-500 text-[10px] font-bold tracking-widest uppercase">OUTPUT TERMINAL</span>
                                                    <span id="status-{{ $nomor }}" class="text-slate-500 text-[10px]">Belum dieksekusi</span>
                                                </div>
                                                <div id="output-{{ $nomor }}" class="text-[#d4d4d4] font-mono text-xs whitespace-pre-wrap break-words min-h-[20px] italic opacity-60">Tekan "Jalankan Kode" untuk menguji hasil print program Anda...</div>
                                                
                                                <input type="hidden" id="{{ $qid }}-input">
                                            </div>
                                        </div>

                                    {{-- 2. Pilihan Ganda / Boolean --}}
                                    @elseif (in_array($soal->type, ['MULTIPLE_CHOICE', 'BOOLEAN']))
                                        @php
                                            $opsi = [];
                                            if (is_string($soal->options)) $opsi = json_decode($soal->options, true) ?? [];
                                            elseif (is_array($soal->options)) $opsi = $soal->options;
                                        @endphp
                                        @if (is_iterable($opsi))
                                            @foreach ($opsi as $key => $val)
                                                @php $displayKey = in_array(strtoupper(trim($key)), ['A','B','C','D','E','F']) ? strtoupper(trim($key)) : chr(65 + $loop->index); @endphp
                                                <button type="button" class="choice-btn group" data-key="{{ $key }}"
                                                    onclick="ev_aksiPilihJawaban('{{ $qid }}', '{{ $key }}', this)">
                                                    <span class="badge-key">{{ $displayKey }}</span>
                                                    <span class="text-sm font-medium">{{ $val }}</span>
                                                </button>
                                            @endforeach
                                        @endif

                                    {{-- 3. Checkbox --}}
                                    @elseif($soal->type == 'CHECKBOX')
                                        @php
                                            $opsi = is_string($soal->options) ? json_decode($soal->options, true) ?? [] : $soal->options;
                                        @endphp
                                        @if (is_iterable($opsi))
                                            @foreach ($opsi as $key => $val)
                                                <label class="choice-btn flex items-center gap-4 cursor-pointer">
                                                    <input type="checkbox" name="{{ $qid }}[]" value="{{ $key }}"
                                                        class="w-5 h-5 text-slate-900 border-slate-300 rounded focus:ring-slate-900"
                                                        onchange="ev_aksiCekStatus({{ $nomor }})">
                                                    <span class="text-sm font-medium">{{ $val }}</span>
                                                </label>
                                            @endforeach
                                        @endif

                                    {{-- 4. Isian Angka / Teks Singkat --}}
                                    @elseif($soal->type == 'NUMBER' || $soal->type == 'FILL_BLANK')
                                        <input type="text" id="{{ $qid }}-input"
                                            class="w-full p-4 border border-slate-300 rounded-lg focus:border-slate-800 outline-none font-bold"
                                            placeholder="Ketik jawaban..." oninput="ev_aksiCekStatus({{ $nomor }})" autocomplete="off" spellcheck="false">

                                    {{-- 5. Isian Ganda (Tuple) --}}
                                    @elseif($soal->type == 'FILL_BLANK_MULTI')
                                        <div class="bg-white border p-6 rounded-lg text-sm">
                                            <p class="mb-2">// Lengkapi rumpang berikut:</p>
                                            @php
                                                $jml = 1;
                                                if (is_array($soal->correct_answer)) $jml = count($soal->correct_answer);
                                                elseif (is_string($soal->correct_answer)) {
                                                    $jml = substr_count($soal->correct_answer, ',') + 1;
                                                    if (str_contains($soal->correct_answer, '[')) {
                                                        $arr = json_decode(str_replace("'", '"', $soal->correct_answer));
                                                        if (is_array($arr)) $jml = count($arr);
                                                    }
                                                }
                                                if ($jml < 1) $jml = 1;
                                            @endphp

                                            @for ($i = 0; $i < $jml; $i++)
                                                <div class="flex gap-2 mb-2 items-center">
                                                    <span class="text-slate-400 w-6 text-right">[{{ $i + 1 }}]</span>
                                                    <input type="text"
                                                        class="input-multi border border-slate-300 rounded px-3 py-2 w-full focus:border-blue-500 outline-none"
                                                        oninput="ev_aksiCekStatus({{ $nomor }})" placeholder="..." spellcheck="false">
                                                </div>
                                            @endfor
                                        </div>

                                    {{-- 6. Drag & Drop --}}
                                    @elseif($soal->type == 'DRAG_AND_DROP')
                                        <div class="dnd-container" id="dnd-{{ $qid }}">
                                            <div>
                                                <p class="text-xs font-bold text-slate-500 mb-2">BANK DATA (Tarik ke kotak di bawah):</p>
                                                <div class="source-zone" data-zone="source">
                                                    @php
                                                        $items = is_string($soal->options) ? json_decode($soal->options, true) : json_decode(json_encode($soal->options), true);
                                                        if (is_array($items)) shuffle($items);
                                                    @endphp
                                                    @if (is_array($items))
                                                        @foreach ($items as $item)
                                                            <div class="drag-item" draggable="true" data-id="{{ $item['id'] ?? $loop->index }}" id="item-{{ $item['id'] ?? $loop->index }}">{{ $item['text'] ?? $item }}</div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="target-grid">
                                                <div class="drop-zone zone-vertex" data-zone="inisialisasi"><div class="zone-header">Fase Inisialisasi</div><div class="zone-body"></div></div>
                                                <div class="drop-zone zone-edge" data-zone="penelusuran"><div class="zone-header">Fase Penelusuran</div><div class="zone-body"></div></div>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                {{-- Feedback Area (Sengaja dikosongkan untuk Evaluasi Akhir) --}}
                                <div id="feedback-{{ $nomor }}" class="hidden mt-8"></div>
                            </div>
                        @endforeach
                    @else
                        <div class="text-center py-20 text-slate-500">
                            <p class="font-medium">Data soal Evaluasi belum tersedia di database.</p>
                        </div>
                    @endif

                </div>

                {{-- Alert & Footer --}}
                <div id="quiz-alert" class="hidden fixed top-20 left-1/2 -translate-x-1/2 bg-red-600 text-white px-6 py-3 rounded-full shadow-xl z-50 font-bold text-sm"></div>

                <div id="navigasi-bawah" class="fixed bottom-0 left-0 right-0 md:right-[320px] h-20 bg-white border-t border-slate-200 px-8 flex justify-between items-center z-40">
                    <button id="btn-prev" onclick="ev_aksiGantiSoal(-1)" class="px-5 py-2.5 border border-slate-300 rounded-lg text-slate-600 font-bold text-sm hover:bg-slate-50 disabled:opacity-50">SEBELUMNYA</button>
                    <button id="btn-next" onclick="ev_aksiGantiSoal(1)" class="px-6 py-2.5 bg-[#0f172a] text-white rounded-lg font-bold text-sm hover:bg-slate-800 shadow-lg">SELANJUTNYA</button>
                </div>
            </div>

            {{-- KANAN: SIDEBAR NAVIGASI --}}
            <div id="sidebar-nav" class="hidden md:flex flex-col h-full bg-white border-l border-slate-200 w-[320px] shrink-0 z-30">
                <div class="p-5 border-b border-slate-100">
                    <h4 class="font-bold text-xs text-slate-400 uppercase tracking-widest">Navigasi Soal</h4>
                </div>
                <div class="p-5 flex-1 overflow-y-auto custom-scroll">
                    <div class="grid grid-cols-4 gap-3">
                        @if (isset($evaluasi))
                            @foreach ($evaluasi as $index => $soal)
                                <button onclick="ev_aksiBukaSoal({{ $index + 1 }})" id="nav-btn-{{ $index + 1 }}" class="nav-btn h-10 rounded-lg font-bold text-sm transition flex items-center justify-center">
                                    {{ $index + 1 }}
                                </button>
                            @endforeach
                        @endif
                    </div>
                    <div class="mt-6 space-y-3">
                        <button onclick="ev_toggleRagu(window.ev_soalAktif)" class="w-full py-2 bg-slate-100 hover:bg-slate-200 text-slate-600 text-sm font-bold rounded-lg transition">Tandai Ragu-Ragu</button>
                        <button onclick="ev_aksiCekSelesai()" class="w-full py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-bold rounded-lg transition shadow-md">KUMPULKAN</button>
                    </div>
                    {{-- Legend --}}
                    <div class="mt-8 pt-6 border-t border-slate-100 space-y-3 text-xs text-slate-500 font-medium">
                        <div class="flex items-center gap-3"><span class="w-3 h-3 bg-[#0f172a] rounded-sm"></span> Aktif</div>
                        <div class="flex items-center gap-3"><span class="w-3 h-3 bg-green-700 rounded-sm"></span> Terjawab</div>
                        <div class="flex items-center gap-3"><span class="w-3 h-3 bg-gray-400 rounded-sm"></span> Ragu-ragu</div>
                        <div class="flex items-center gap-3"><span class="w-3 h-3 bg-white border border-slate-300 rounded-sm"></span> Kosong</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- 🔥 MODAL MULAI DENGAN INSTRUKSI LENGKAP --}}
        <div id="modal-mulai" class="fixed inset-0 min-h-screen bg-slate-900/80 z-[9999] flex justify-center p-4 backdrop-blur-sm items-center w-full ">
            <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full max-h-[90vh] flex flex-col">
                
                {{-- Header Modal --}}
                <div class="bg-slate-900 text-white p-4 md:p-5 text-center border-b-4 border-blue-500 shrink-0 rounded-t-2xl">
                    <h2 class="text-xl md:text-2xl font-black tracking-wider uppercase">EVALUASI AKHIR</h2>
                    <p class="text-slate-300 text-xs md:text-sm mt-1">Ujian Post-Test Pemahaman Struktur Data Graf</p>
                </div>
                
                {{-- Body Modal --}}
                <div class="p-4 md:p-6 text-slate-700 space-y-4 overflow-y-auto custom-scroll flex-1">
                    
                    <div class="flex items-start gap-3 p-3 md:p-4 bg-red-50 border border-red-200 rounded-xl shadow-sm">
                        <div class="text-red-500 text-xl mt-0.5"><i class="fa-solid fa-triangle-exclamation"></i></div>
                        <div>
                            <h4 class="font-bold text-red-900 mb-1 text-sm md:text-base">Perhatian</h4>
                            <p class="text-xs md:text-sm text-red-800 leading-relaxed text-justify">
                                Ujian ini bersifat final dan menentukan kelulusan Anda. Anda tidak akan bisa melihat kunci jawaban setelah ujian selesai.
                            </p>
                        </div>
                    </div>

                    {{-- Aturan Pengerjaan --}}
                    <div>
                        <h4 class="font-extrabold text-slate-900 mb-3 text-lg">Aturan Pengerjaan:</h4>
                        <ul class="space-y-3 text-sm text-justify text-slate-700">
                            <li class="flex items-start gap-3">
                                <span class="w-6 h-6 rounded-full bg-slate-200 border border-slate-300 flex items-center justify-center text-slate-700 font-bold shrink-0 text-xs">1</span>
                                <span class="leading-relaxed pt-0.5"><strong>Durasi Waktu:</strong> Anda memiliki waktu <strong>{{ $waktuMenit ?? 40 }} Menit</strong>. Timer tidak dapat di-pause.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="w-6 h-6 rounded-full bg-slate-200 border border-slate-300 flex items-center justify-center text-slate-700 font-bold shrink-0 text-xs">2</span>
                                <span class="leading-relaxed pt-0.5"><strong>Live Coding:</strong> Terdapat soal ujian praktik. Ketik kode Python dan pastikan Output Terminal sesuai dengan kunci jawaban sebelum *submit*.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="w-6 h-6 rounded-full bg-slate-200 border border-slate-300 flex items-center justify-center text-slate-700 font-bold shrink-0 text-xs">3</span>
                                <span class="leading-relaxed pt-0.5"><strong>Format Teks:</strong> Pada soal isian singkat, harap perhatikan penggunaan huruf besar/kecil dan tanda baca sesuai instruksi.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="w-6 h-6 rounded-full bg-red-100 border border-red-200 flex items-center justify-center text-red-600 font-bold shrink-0 text-xs"><i class="fa-solid fa-ban"></i>4</span>
                                <span class="leading-relaxed pt-0.5 text-red-700"><strong>Dilarang Keras:</strong> Jangan merefresh halaman browser (F5) saat ujian berlangsung.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- Footer Modal --}}
                <div class="bg-slate-50 p-4 md:p-5 border-t border-slate-200 flex justify-center shrink-0 rounded-b-2xl">
                    <button onclick="ev_aksiMulaiUjian()" class="w-full md:w-auto px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg transition-transform active:scale-95 text-sm md:text-base flex justify-center items-center gap-3">
                        MULAI UJIAN SEKARANG
                    </button>
                </div>
            </div>
        </div>

    
        {{-- MODAL KONFIRMASI (FIXED SCREEN) --}}
        <div id="modal-konfirmasi" class="fixed inset-0 bg-slate-900/50 z-[9999] flex items-center justify-center p-4 hidden">
            <div class="bg-white rounded-xl p-6 max-w-sm w-full shadow-2xl transform scale-100 transition-transform">
                <h3 class="text-lg font-bold text-slate-800 mb-2">Belum Selesai</h3>
                <p class="text-sm text-slate-600 mb-6">Masih ada soal kosong. Yakin?</p>
                <div class="flex justify-end gap-3">
                    <button onclick="document.getElementById('modal-konfirmasi').classList.add('hidden')" class="px-4 py-2 rounded text-slate-600 hover:bg-slate-50 font-bold text-sm border border-slate-200">BATAL</button>
                    <button onclick="ev_aksiFinalisasi()" class="px-4 py-2 rounded bg-red-600 text-white hover:bg-red-700 font-bold text-sm shadow">YA, KUMPULKAN</button>
                </div>
            </div>
        </div>

        {{-- MODAL HASIL (BLIND GRADING - NO REVIEW) --}}
        <div id="modal-hasil" class="fixed inset-0 bg-white z-[9999] flex items-center justify-center p-4 hidden">
            <div class="text-center w-full max-w-md mx-auto">
                <div class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-2 text-konfirmasi-label">
                    NILAI EVALUASI AKHIR
                </div>

                <div class="div-skor-wrapper text-8xl font-black text-slate-800 mb-6">
                    <span id="skor-akhir">0</span>
                </div>
                
                <h3 id="teks-lulus" class="text-xl font-bold mb-8"></h3>

                <div class="flex gap-3 justify-center w-full">
                    <a href="{{ route('dashboard') }}" class="btn-dashboard px-6 py-3 bg-[#0f172a] text-white rounded-lg font-bold hover:bg-slate-800 shadow-lg transition-colors w-full text-center">
                        KEMBALI KE DASHBOARD
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // ==========================================
    // 1. DATA DARI SERVER (PHP -> JS)
    // ==========================================
    @php
        $displayScore = 0;
        $isDone = false;
        $evData = !empty($evaluasi) ? $evaluasi : [];

        if (isset($progress) && isset($progress['ujian_akhir'])) {
            $isDone = true;
            $displayScore = $progress['ujian_akhir']->score ?? 0;
        }
    @endphp

    // --- VARIABEL GLOBAL ---
    window.ev_hasHistory = {{ $isDone ? 'true' : 'false' }};
    window.ev_historyScore = {{ $displayScore }};
    window.ev_dataSoal = @json($evData);

    // VARIABEL STATE
    window.ev_totalSoal = window.ev_dataSoal ? window.ev_dataSoal.length : 0;
    window.ev_isExamMode = false;
    window.ev_soalAktif = 1;
    window.ev_sisaDetik = {{ ($waktuMenit ?? 40) * 60 }};
    window.ev_timerUjian = null;
    window.ev_dbRagu = {};
    window.ev_dbJawabanUser = {};

    // Auto Resize Editor Python
    window.autoResizeEditor = function(el) {
        if(!el) return;
        el.style.height = 'auto';
        if(el.scrollHeight > 0) el.style.height = el.scrollHeight + 'px';
    };

    // Initialize Pyodide
    window.pyodideReadyPromise = null;
    async function loadPyodideEngine() {
        if(window.pyodide) return window.pyodide;
        window.pyodideReadyPromise = loadPyodide({ indexURL: 'https://cdn.jsdelivr.net/pyodide/v0.24.1/full/' });
        window.pyodide = await window.pyodideReadyPromise;
        return window.pyodide;
    }

    // ==========================================
    // 2. INISIALISASI HALAMAN
    // ==========================================
    document.addEventListener("DOMContentLoaded", function() {
        loadPyodideEngine(); // Preload

        if (window.ev_hasHistory) {
            // TAMPILKAN SKOR JIKA SUDAH PERNAH MENGERJAKAN
            let mMulai = document.getElementById('modal-mulai');
            if (mMulai) mMulai.classList.add('hidden');

            let mHasil = document.getElementById('modal-hasil');
            if (mHasil) mHasil.classList.remove('hidden');

            document.getElementById('skor-akhir').innerText = window.ev_historyScore;
            
            const kkm = 75;
            let teksLulus = document.getElementById('teks-lulus');
            if(window.ev_historyScore >= kkm) {
                teksLulus.innerText = "LULUS";
                teksLulus.classList.add('text-green-600');
                document.getElementById('skor-akhir').classList.add('text-green-600');
            } else {
                teksLulus.innerText = "TIDAK LULUS KKM";
                teksLulus.classList.add('text-red-600');
                document.getElementById('skor-akhir').classList.add('text-red-600');
            }

            document.getElementById('navigasi-bawah').style.display = 'none';
        } else {
            if (window.ev_totalSoal > 0) {
                ev_aksiBukaSoal(1);
                if (typeof ev_initDragAndDrop === "function") ev_initDragAndDrop();
            }
        }
    });

    // ==========================================
    // 3. FUNGSI LIVE CODING
    // ==========================================
    window.jalankanLiveCoding = async function(qid, nomor, kunciJawabanOutput) {
        const code = document.getElementById('editor-' + nomor).value;
        const outBox = document.getElementById('output-' + nomor);
        const statusBox = document.getElementById('status-' + nomor);
        const hiddenInput = document.getElementById(qid + '-input');
        const btn = document.getElementById('btn-run-' + nomor);

        let cleanKunci = String(kunciJawabanOutput).replace(/['"]/g, '').trim();

        outBox.classList.remove('italic', 'opacity-60', 'text-[#d4d4d4]');
        outBox.classList.add('text-green-400');
        btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Loading...';
        btn.disabled = true;

        try {
            const py = await loadPyodideEngine();
            py.runPython(`import sys\nfrom io import StringIO\nsys.stdout = StringIO()`);
            py.runPython(code);
            let stdout = py.runPython('sys.stdout.getvalue()').trim();

            outBox.innerHTML = `> python main.py\n${stdout}`.replace(/\n/g, '<br>');
            
            if(stdout.includes(cleanKunci) && cleanKunci !== "") {
                statusBox.innerHTML = "<span class='text-green-500 font-bold'>BENAR</span>";
                hiddenInput.value = stdout; 
                window.ev_dbJawabanUser[qid] = stdout; 
            } else {
                statusBox.innerHTML = "<span class='text-yellow-500 font-bold'>TEREKSEKUSI</span>";
                window.ev_dbJawabanUser[qid] = "SALAH: " + stdout;
            }
            
            btn.classList.replace('bg-emerald-600', 'bg-blue-600');
            btn.innerHTML = '<i class="fa-solid fa-check"></i> Output Tersimpan';
            ev_updateTampilanNav();

        } catch(err) {
            outBox.classList.replace('text-green-400', 'text-red-500');
            outBox.innerHTML = `> python main.py\nError:\n${err.message}`.replace(/\n/g, '<br>');
            statusBox.innerHTML = "<span class='text-red-500 font-bold'>ERROR</span>";
            window.ev_dbJawabanUser[qid] = "SALAH: ERROR";
        } finally {
            btn.disabled = false;
        }
    }

    // ==========================================
    // 4. HELPER & HANDLERS
    // ==========================================
    function ev_updateTampilanNav() {
        for (let i = 1; i <= window.ev_totalSoal; i++) {
            let btn = document.getElementById('nav-btn-' + i);
            if (!btn) continue;

            btn.className = "nav-btn h-10 rounded-lg font-bold text-sm transition flex items-center justify-center border shadow-sm";
            btn.style.backgroundColor = "white";
            btn.style.color = "#64748b";
            btn.style.borderColor = "#e2e8f0";

            let terisi = ev_cekApakahTerisi(i);
            let aktif = (i === window.ev_soalAktif);
            let ragu = window.ev_dbRagu['soal_' + i];

            if (aktif) {
                btn.style.backgroundColor = "#0f172a";
                btn.style.color = "white";
                btn.style.borderColor = "#0f172a";
            } else if (ragu) {
                btn.style.backgroundColor = "#e2e8f0"; 
                btn.style.color = "#475569"; 
                btn.style.borderColor = "#cbd5e1";
            } else if (terisi) {
                btn.style.backgroundColor = "#15803d";
                btn.style.color = "white";
                btn.style.borderColor = "#15803d";
            }
        }
    }

    function ev_cekApakahTerisi(nomor) {
        let qid = 'soal_' + nomor;
        let data = window.ev_dbJawabanUser[qid];
        if (!data) return false;
        if (Array.isArray(data)) return data.length > 0;
        if (typeof data === 'object') return Object.keys(data).length > 0;
        return String(data).trim() !== "";
    }

    function ev_aksiBukaSoal(nomor) {
        document.querySelectorAll('.blok-soal').forEach(el => el.classList.add('hidden'));
        let target = document.getElementById('container-' + nomor);
        if(target) target.classList.remove('hidden');
        
        window.ev_soalAktif = nomor;
        ev_updateTampilanNav();
        
        let prev = document.getElementById('btn-prev');
        let next = document.getElementById('btn-next');
        if (prev) prev.disabled = (nomor === 1);
        if (next) {
            if (nomor === window.ev_totalSoal) next.classList.add('hidden');
            else next.classList.remove('hidden');
        }

        let areaSoal = document.getElementById('area-soal');
        if (areaSoal) areaSoal.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function ev_aksiGantiSoal(arah) {
        let next = window.ev_soalAktif + arah;
        if (next >= 1 && next <= window.ev_totalSoal) ev_aksiBukaSoal(next);
    }

    function ev_toggleRagu(nomor) {
        window.ev_dbRagu['soal_' + nomor] = !window.ev_dbRagu['soal_' + nomor];
        ev_updateTampilanNav();
    }

    function ev_aksiPilihJawaban(qid, nilai, btn) {
        if (!window.ev_isExamMode) return;
        window.ev_dbJawabanUser[qid] = nilai;
        let parent = btn.parentElement;
        parent.querySelectorAll('.choice-btn').forEach(b => {
            b.classList.remove('choice-selected');
            b.style.backgroundColor = "white";
            b.style.color = "#475569";
            b.style.borderColor = "#cbd5e1";
            let badge = b.querySelector('.badge-key');
            if (badge) {
                badge.style.backgroundColor = "#f1f5f9";
                badge.style.color = "#64748b";
                badge.style.borderColor = "#e2e8f0";
            }
        });
        
        btn.classList.add('choice-selected');
        btn.style.backgroundColor = "#0f172a";
        btn.style.color = "white";
        btn.style.borderColor = "#0f172a";
        
        let selectedBadge = btn.querySelector('.badge-key');
        if (selectedBadge) {
            selectedBadge.style.backgroundColor = "#334155";
            selectedBadge.style.color = "white";
            selectedBadge.style.borderColor = "#334155";
        }
        
        ev_updateTampilanNav();
    }
    function ev_aksiCekStatus(nomor) {
        let qid = 'soal_' + nomor;
        let container = document.getElementById('container-' + nomor);
        let checkboxes = container.querySelectorAll('input[type="checkbox"]');
        if (checkboxes.length > 0) {
            let checked = container.querySelectorAll('input[type="checkbox"]:checked');
            let vals = [];
            checked.forEach(c => vals.push(c.value));
            if (vals.length > 0) window.ev_dbJawabanUser[qid] = vals;
            else delete window.ev_dbJawabanUser[qid];
        } else {
            let texts = container.querySelectorAll('input[type="text"]');
            if (texts.length > 0) {
                let vals = [];
                let adaIsi = false;
                texts.forEach(t => {
                    vals.push(t.value);
                    if (t.value.trim()) adaIsi = true;
                });
                if (adaIsi) window.ev_dbJawabanUser[qid] = (texts.length === 1) ? vals[0] : vals;
                else delete window.ev_dbJawabanUser[qid];
            }
        }
        ev_updateTampilanNav();
    }

    function ev_initDragAndDrop() {
        const items = document.querySelectorAll('.drag-item');
        const zones = document.querySelectorAll('.drop-zone, .source-zone');
        items.forEach(item => {
            item.addEventListener('dragstart', (e) => {
                if (!window.ev_isExamMode) {
                    e.preventDefault();
                    return;
                }
                e.dataTransfer.setData('text/plain', e.target.id);
                e.target.classList.add('opacity-50');
            });
            item.addEventListener('dragend', (e) => {
                e.target.classList.remove('opacity-50');
            });
        });
        zones.forEach(zone => {
            zone.addEventListener('dragover', (e) => {
                if (!window.ev_isExamMode) return;
                e.preventDefault();
                zone.classList.add('bg-blue-50');
            });
            zone.addEventListener('dragleave', (e) => {
                zone.classList.remove('bg-blue-50');
            });
            zone.addEventListener('drop', (e) => {
                if (!window.ev_isExamMode) return;
                e.preventDefault();
                zone.classList.remove('bg-blue-50');
                const id = e.dataTransfer.getData('text/plain');
                const draggableElement = document.getElementById(id);
                if (!draggableElement) return;

                if (zone.classList.contains('zone-body') || zone.classList.contains('source-zone')) {
                    zone.appendChild(draggableElement);
                } else {
                    let bdy = zone.querySelector('.zone-body');
                    if(bdy) bdy.appendChild(draggableElement);
                }

                let containerSoal = zone.closest('.blok-soal');
                if (containerSoal) {
                    let nomorSoal = containerSoal.id.split('-')[1];
                    let qid = 'soal_' + nomorSoal;
                    let answerObj = {};
                    let adaIsi = false;
                    containerSoal.querySelectorAll('.drop-zone').forEach(z => {
                        let cat = z.getAttribute('data-zone');
                        z.querySelectorAll('.drag-item').forEach(i => {
                            let itemId = i.getAttribute('data-id');
                            answerObj[itemId] = cat;
                            adaIsi = true;
                        });
                    });
                    if (adaIsi) window.ev_dbJawabanUser[qid] = answerObj;
                    else delete window.ev_dbJawabanUser[qid];
                    ev_updateTampilanNav();
                }
            });
        });
    }
    function ev_aksiCekSelesai() {
        let kosong = [];
        for (let i = 1; i <= window.ev_totalSoal; i++) {
            if (!ev_cekApakahTerisi(i)) kosong.push(i);
        }
        let modal = document.getElementById('modal-konfirmasi');
        let btnConfirm = modal.querySelector('button.bg-red-600');
        let btnCancel = modal.querySelector('button.text-slate-600');

        if (kosong.length > 0) {
            modal.querySelector('h3').innerText = "Belum Lengkap!";
            modal.querySelector('p').innerHTML = `Masih ada soal yang belum dijawab: <b>${kosong.join(', ')}</b>`;
            if (btnConfirm) btnConfirm.classList.add('hidden');
            if (btnCancel) btnCancel.innerText = "KEMBALI KERJAKAN";
        } else {
            modal.querySelector('h3').innerText = "Selesai?";
            modal.querySelector('p').innerHTML = "Anda yakin ingin mengumpulkan semua jawaban sekarang?";
            if (btnConfirm) btnConfirm.classList.remove('hidden');
            if (btnCancel) btnCancel.innerText = "BATAL";
        }
        modal.classList.remove('hidden');
    }

    function ev_aksiFinalisasi(isForced = false) {
        if (!window.ev_isExamMode && !isForced) return;
        clearInterval(window.ev_timerUjian);
        window.ev_isExamMode = false;
        document.body.classList.remove('exam-mode');

        const btnKumpul = document.getElementById('btn-yakin-kumpul');
        if (btnKumpul) {
            btnKumpul.disabled = true;
            btnKumpul.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Menyimpan...';
        }

        fetch("{{ route('submit.quiz') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    chapter_code: 'evaluasi',
                    section_code: 'ujian_akhir',
                    score: 0, 
                    answers: window.ev_dbJawabanUser 
                })
            })
            .then(res => res.json())
            .then(data => {
                document.getElementById('skor-akhir').innerText = data.score;
                document.getElementById('modal-konfirmasi').classList.add('hidden');
                document.getElementById('modal-hasil').classList.remove('hidden');
                
                const kkm = 75;
                let teksLulus = document.getElementById('teks-lulus');
                let skorAkhir = document.getElementById('skor-akhir');

                if(data.score >= kkm) {
                    teksLulus.innerText = "LULUS";
                    teksLulus.classList.add('text-green-600');
                    skorAkhir.classList.add('text-green-600');
                } else {
                    teksLulus.innerText = "TIDAK LULUS KKM";
                    teksLulus.classList.add('text-red-600');
                    skorAkhir.classList.add('text-red-600');
                }
                
                window.ev_hasHistory = true;
            })
            .catch(err => {
                console.error(err);
                alert("Gagal menyimpan ke server. Silakan cek koneksi internet Anda.");
                if (btnKumpul) {
                    btnKumpul.disabled = false;
                    btnKumpul.innerText = "YA, KUMPULKAN SAJA";
                }
            });
    }

    function ev_aksiMulaiUjian() {
        window.ev_isExamMode = true;
        document.getElementById('modal-mulai').classList.add('hidden');
        document.body.classList.add('exam-mode');
        
        let timerDisp = document.getElementById('timer-display');
        if (timerDisp) timerDisp.classList.remove('text-red-600', 'animate-pulse');

        if (window.ev_timerUjian) clearInterval(window.ev_timerUjian);
        window.ev_timerUjian = setInterval(() => {
            window.ev_sisaDetik--;
            let m = Math.floor(window.ev_sisaDetik / 60).toString().padStart(2, '0');
            let s = (window.ev_sisaDetik % 60).toString().padStart(2, '0');
            if (timerDisp) {
                timerDisp.innerText = m + ":" + s;
                if (window.ev_sisaDetik <= 300) timerDisp.classList.add('text-red-600', 'animate-pulse'); // 5 mnt
            }
            if (window.ev_sisaDetik <= 0) {
                clearInterval(window.ev_timerUjian);
                alert("Waktu Habis! Ujian otomatis dikumpulkan.");
                ev_aksiFinalisasi(true);
            }
        }, 1000);
    }
</script>