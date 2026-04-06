<section id="step-6" class="step-slide">

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

        /* === STYLE DRAG & DROP === */
        .dnd-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .source-zone {
            min-height: 80px;
            padding: 15px;
            background: #f1f5f9;
            border: 2px dashed #cbd5e1;
            border-radius: 10px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            align-items: center;
        }

        .target-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        @media (min-width: 768px) {
            .target-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        .drop-zone {
            background: white;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            min-height: 120px;
            display: flex;
            flex-direction: column;
        }

        .zone-header {
            padding: 8px;
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            text-align: center;
            border-bottom: 1px solid #e2e8f0;
            border-radius: 8px 8px 0 0;
        }

        .zone-body {
            flex: 1;
            padding: 10px;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .zone-vertex {
            border-color: #3b82f6;
        }

        .zone-vertex .zone-header {
            background: #eff6ff;
            color: #1e40af;
            border-color: #dbeafe;
        }

        .zone-edge {
            border-color: #10b981;
        }

        .zone-edge .zone-header {
            background: #ecfdf5;
            color: #047857;
            border-color: #d1fae5;
        }

        .zone-degree {
            border-color: #a855f7;
        }

        .zone-degree .zone-header {
            background: #faf5ff;
            color: #7e22ce;
            border-color: #f3e8ff;
        }

        .zone-distractor {
            border-color: #f43f5e;
        }

        .zone-distractor .zone-header {
            background: #fff1f2;
            color: #be123c;
            border-color: #ffe4e6;
        }

        .drag-item {
            padding: 8px 12px;
            background: white;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            cursor: grab;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            user-select: none;
            touch-action: none;
        }

        .drag-item:active {
            cursor: grabbing;
            border-color: #3b82f6;
        }

        input:disabled,
        textarea:disabled {
            color: #334155 !important;
            opacity: 1 !important;
            -webkit-text-fill-color: #334155 !important;
        }
    </style>

    {{-- WRAPPER UTAMA QUIZ --}}
    <div id="quiz-wrapper">
        {{-- HEADER QUIZ --}}
        <div class="h-16 bg-white border-b border-slate-200 flex justify-between items-center px-6 shrink-0 z-30">
            <div>
                <h2 class="font-bold text-slate-800 text-lg">Quiz Materi 1</h2>
                <p class="text-xs text-slate-500">Dasar-Dasar Graf</p>
            </div>
            <div class="flex items-center gap-3 bg-slate-50 px-4 py-2 rounded-lg border border-slate-100">
                <i class="fa-regular fa-clock text-slate-400"></i>
                <div id="timer-display" data-waktu="{{ $waktuMenit ?? 10 }}" class="font-mono font-bold text-xl text-slate-800 dark:text-white leading-none">
                    {{ sprintf('%02d:00', $waktuMenit ?? 10) }}
                </div>
            </div>
        </div>

        {{-- BODY --}}
        <div class="flex flex-1 overflow-hidden relative">

            {{-- KIRI: AREA SOAL --}}
            <div id="area-soal" class="custom-scroll">
                <div class="max-w-4xl mx-auto w-full pt-6 pb-24">

                    @foreach ($quiz1 as $index => $soal)
                        @php
                            $nomor = $index + 1;
                            $qid = 'soal_' . $nomor;
                        @endphp

                        <div id="container-{{ $nomor }}"
                            class="blok-soal {{ $index === 0 ? 'block' : 'hidden' }}">

                            {{-- Label Nomor --}}
                            <div class="flex justify-between items-center mb-4">
                                <span
                                    class="bg-slate-200 text-slate-700 px-3 py-1 rounded text-xs font-bold uppercase tracking-wider">
                                    Soal {{ $nomor }}
                                </span>
                            </div>

                            {{-- Kartu Soal --}}
                            <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm mb-6">
                                <div class="question-text text-base font-medium text-slate-800 leading-relaxed">
                                    {!! $soal->question_text !!}
                                </div>
                            </div>

                            {{-- Opsi Jawaban --}}
                            <div class="pl-1">

                                {{-- 1. Pilihan Ganda / Boolean --}}
                                @if (in_array($soal->type, ['MULTIPLE_CHOICE', 'BOOLEAN']))
                                    @if (isset($soal->options) && is_iterable($soal->options))
                                        @foreach ($soal->options as $key => $val)
                                            @php
                                                // Mencegah munculnya key aneh dengan mengubah ke format A,B,C,D
                                                $displayKey = in_array(strtoupper(trim($key)), [
                                                    'A',
                                                    'B',
                                                    'C',
                                                    'D',
                                                    'E',
                                                    'F',
                                                ])
                                                    ? strtoupper(trim($key))
                                                    : chr(65 + $loop->index);
                                            @endphp
                                            <button type="button" class="choice-btn group"
                                                data-key="{{ $key }}"
                                                onclick="q1_aksiPilihJawaban('{{ $qid }}', '{{ $key }}', this)">
                                                <span class="badge-key">{{ $displayKey }}</span>
                                                <span class="text-sm font-medium">{{ $val }}</span>
                                            </button>
                                        @endforeach
                                    @endif

                                    {{-- 2. Checkbox --}}
                                @elseif($soal->type == 'CHECKBOX')
                                    @if (isset($soal->options) && is_iterable($soal->options))
                                        @foreach ($soal->options as $key => $val)
                                            <label class="choice-btn flex items-center gap-4 cursor-pointer">
                                                <input type="checkbox" name="{{ $qid }}[]"
                                                    value="{{ $key }}"
                                                    class="w-5 h-5 text-slate-900 border-slate-300 rounded focus:ring-slate-900"
                                                    onchange="q1_aksiCekStatus({{ $nomor }})">
                                                <span class="text-sm font-medium">{{ $val }}</span>
                                            </label>
                                        @endforeach
                                    @endif

                                    {{-- 3. Isian Angka / Teks Singkat --}}
                                @elseif($soal->type == 'NUMBER' || $soal->type == 'FILL_BLANK')
                                    <input type="text" id="{{ $qid }}-input"
                                        class="w-full p-4 border border-slate-300 rounded-lg focus:border-slate-800 outline-none font-bold"
                                        placeholder="Ketik jawaban..." oninput="q1_aksiCekStatus({{ $nomor }})"
                                        autocomplete="off">

                                    {{-- 4. Isian Ganda (Tuple) --}}
                                @elseif($soal->type == 'FILL_BLANK_MULTI')
                                    <div class="bg-white border p-6 rounded-lg text-sm">
                                        <p class="mb-2">// Lengkapi:</p>
                                        @php
                                            $jml = 1;
                                            if (is_array($soal->correct_answer)) {
                                                $jml = count($soal->correct_answer);
                                            } elseif (is_string($soal->correct_answer)) {
                                                $jml = substr_count($soal->correct_answer, ',') + 1;
                                                if (str_contains($soal->correct_answer, '[')) {
                                                    $arr = json_decode(str_replace("'", '"', $soal->correct_answer));
                                                    if (is_array($arr)) {
                                                        $jml = count($arr);
                                                    }
                                                }
                                            }
                                            if ($jml < 1) {
                                                $jml = 1;
                                            }
                                        @endphp

                                        @for ($i = 0; $i < $jml; $i++)
                                            <div class="flex gap-2 mb-2 items-center">
                                                <span
                                                    class="text-slate-400 w-6 text-right">[{{ $i + 1 }}]</span>
                                                <input type="text"
                                                    class="input-multi border border-slate-300 rounded px-3 py-2 w-full focus:border-blue-500 outline-none"
                                                    oninput="q1_aksiCekStatus({{ $nomor }})">
                                            </div>
                                        @endfor
                                    </div>

                                    {{-- 5. Drag & Drop --}}
                                @elseif($soal->type == 'DRAG_AND_DROP')
                                    <div class="dnd-container" id="dnd-{{ $qid }}">
                                        <div>
                                            <p class="text-xs font-bold text-slate-500 mb-2">BANK DATA (Tarik ke kotak
                                                di bawah):</p>
                                            <div class="source-zone" data-zone="source">
                                                @php
                                                    $items = [];
                                                    if (is_string($soal->options)) {
                                                        $items = json_decode($soal->options);
                                                    } elseif (is_array($soal->options)) {
                                                        $items = json_decode(json_encode($soal->options));
                                                    }
                                                    if (is_array($items)) {
                                                        shuffle($items);
                                                    }
                                                @endphp

                                                @if (is_array($items))
                                                    @foreach ($items as $item)
                                                        <div class="drag-item" draggable="true"
                                                            data-id="{{ $item->id ?? $loop->index }}"
                                                            id="item-{{ $item->id ?? $loop->index }}">
                                                            {{ $item->text ?? $item }}
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>

                                        <div class="target-grid">
                                            <div class="drop-zone zone-vertex" data-zone="vertex">
                                                <div class="zone-header">Simpul (Vertex)</div>
                                                <div class="zone-body"></div>
                                            </div>
                                            <div class="drop-zone zone-edge" data-zone="edge">
                                                <div class="zone-header">Sisi (Edge)</div>
                                                <div class="zone-body"></div>
                                            </div>
                                            <div class="drop-zone zone-degree" data-zone="degree">
                                                <div class="zone-header">Derajat</div>
                                                <div class="zone-body"></div>
                                            </div>
                                            <div class="drop-zone zone-distractor" data-zone="distractor">
                                                <div class="zone-header">Bukan Graf</div>
                                                <div class="zone-body"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            {{-- Feedback Area --}}
                            <div id="feedback-{{ $nomor }}" class="hidden mt-8"></div>
                        </div>
                    @endforeach
                </div>

                {{-- Alert & Footer --}}
                <div id="quiz-alert"
                    class="hidden fixed top-20 left-1/2 -translate-x-1/2 bg-red-600 text-white px-6 py-3 rounded-full shadow-xl z-50 font-bold text-sm">
                </div>

                <div id="navigasi-bawah"
                    class="fixed bottom-0 left-0 right-0 md:right-[320px] h-20 bg-white border-t border-slate-200 px-8 flex justify-between items-center z-40">
                    <button id="btn-prev" onclick="q1_aksiGantiSoal(-1)"
                        class="px-5 py-2.5 border border-slate-300 rounded-lg text-slate-600 font-bold text-sm hover:bg-slate-50 disabled:opacity-50">SEBELUMNYA</button>
                    <button id="btn-next" onclick="q1_aksiGantiSoal(1)"
                        class="px-6 py-2.5 bg-slate-900 text-white rounded-lg font-bold text-sm hover:bg-slate-800 shadow-lg">SELANJUTNYA</button>
                </div>
            </div>

            {{-- KANAN: SIDEBAR NAVIGASI --}}
            <div id="sidebar-nav"
                class="hidden md:flex flex-col h-full bg-white border-l border-slate-200 w-[320px] shrink-0 z-30">
                <div class="p-5 border-b border-slate-100">
                    <h4 class="font-bold text-xs text-slate-400 uppercase tracking-widest">Navigasi Soal</h4>
                </div>
                <div class="p-5 flex-1 overflow-y-auto custom-scroll">
                    <div class="grid grid-cols-4 gap-3">
                        @foreach ($quiz1 as $index => $soal)
                            <button onclick="q1_aksiBukaSoal({{ $index + 1 }})" id="nav-btn-{{ $index + 1 }}"
                                class="nav-btn h-10 rounded-lg font-bold text-sm transition flex items-center justify-center">
                                {{ $index + 1 }}
                            </button>
                        @endforeach
                    </div>
                    <div class="mt-6 space-y-3">
                        <button onclick="q1_toggleRagu(window.q1_soalAktif)"
                            class="w-full py-2 bg-slate-100 hover:bg-slate-200 text-slate-600 text-sm font-bold rounded-lg transition">Tandai
                            Ragu-Ragu</button>
                        <button onclick="q1_aksiCekSelesai()"
                            class="w-full py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-bold rounded-lg transition shadow-md">KUMPULKAN</button>
                    </div>
                    {{-- Legend --}}
                    <div class="mt-8 pt-6 border-t border-slate-100 space-y-3 text-xs text-slate-500 font-medium">
                        <div class="flex items-center gap-3"><span class="w-3 h-3 bg-slate-900 rounded-sm"></span>
                            Aktif</div>
                        <div class="flex items-center gap-3"><span class="w-3 h-3 bg-green-700 rounded-sm"></span>
                            Terjawab</div>
                        <div class="flex items-center gap-3"><span class="w-3 h-3 bg-gray-400 rounded-sm"></span>
                            Ragu-ragu</div>
                        <div class="flex items-center gap-3"><span
                                class="w-3 h-3 bg-white border border-slate-300 rounded-sm"></span> Kosong</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- 🔥 MODAL MULAI DENGAN INSTRUKSI LENGKAP --}}
        <div id="modal-mulai"
            class="fixed inset-0 bg-slate-900/80 z-[9999] flex items-center justify-center p-4 backdrop-blur-sm">
            <div
                class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full max-h-[90vh] flex flex-col transform transition-all">

                {{-- Header Modal --}}
                <div
                    class="bg-slate-900 text-white p-4 md:p-5 text-center border-b-4 border-blue-500 shrink-0 rounded-t-2xl">
                    <h2 class="text-xl md:text-2xl font-bold tracking-wide uppercase">Quiz Materi 1 : Tantangan Arsitek
                        Data</h2>
                    <p class="text-slate-300 text-xs md:text-sm mt-1">Uji Pemahaman Dasar-Dasar Graf Anda</p>
                </div>

                {{-- Body Modal --}}
                <div class="p-4 md:p-6 text-slate-700 space-y-4 overflow-y-auto custom-scroll flex-1">

                    {{-- Box Info --}}
                    <div
                        class="flex items-start gap-3 p-3 md:p-4 bg-blue-50 border border-blue-200 rounded-xl shadow-sm">
                        <div class="text-blue-600 text-xl mt-0.5"><i class="fa-solid fa-circle-info"></i></div>
                        <div>
                            <h4 class="font-bold text-blue-900 mb-1 text-sm md:text-base">Status Misi & Instruksi Dasar
                            </h4>
                            <p class="text-xs md:text-sm text-blue-800 leading-relaxed text-justify">
                                Terdapat <strong>{{ count($quiz1) }} Tantangan</strong> yang harus Anda selesaikan.
                                Sebagai calon <em>engineer</em>, Anda dituntut mampu menganalisis permasalahan dunia
                                nyata ke dalam pemodelan abstraksi graf yang tepat sesuai format jawaban yang diminta!
                            </p>
                        </div>
                    </div>

                    {{-- Aturan Pengerjaan --}}
                    <div>
                        <h4 class="font-bold text-slate-900 dark:text-white mb-3 text-base md:text-lg border-b border-slate-200 dark:border-slate-700 pb-2 transition-colors">
                            Aturan Pengerjaan Kuis:
                        </h4>

                        <ul class="space-y-3 text-xs md:text-sm text-justify">

                            <li class="flex items-start gap-3">
                                <span class="w-6 h-6 rounded-full bg-slate-200 dark:bg-slate-700 flex items-center justify-center text-slate-700 dark:text-slate-300 font-bold shrink-0 transition-colors">1</span>
                                <span class="leading-relaxed">
                                    <strong>Durasi Waktu:</strong> Anda memiliki waktu <strong>{{ $waktuMenit }} menit</strong> untuk menyelesaikan <strong>{{ count($quiz1) }} misi</strong>. Timer akan berjalan otomatis setelah tombol mulai ditekan. Jika waktu habis, sistem akan otomatis mengumpulkan jawaban Anda.
                                </span>
                            </li>

                            <li class="flex items-start gap-3">
                                <span class="w-6 h-6 rounded-full bg-slate-200 dark:bg-slate-700 flex items-center justify-center text-slate-700 dark:text-slate-300 font-bold shrink-0 transition-colors">2</span>
                                <span class="leading-relaxed">
                                    <strong>Pahami Studi Kasus:</strong> Bacalah setiap misi dengan teliti sebelum menjawab. Setiap soal dirancang sebagai studi kasus yang menguji kemampuan Anda dalam menganalisis permasalahan dan memodelkannya ke dalam konsep graf.
                                </span>
                            </li>

                            <li class="flex items-start gap-3">
                                <span class="w-6 h-6 rounded-full bg-slate-200 dark:bg-slate-700 flex items-center justify-center text-slate-700 dark:text-slate-300 font-bold shrink-0 transition-colors">3</span>
                                <span class="leading-relaxed">
                                    <strong>Format Jawaban:</strong> Perhatikan jenis soal yang diberikan, seperti <strong>Pilihan Ganda</strong>, <strong>Benar/Salah</strong>, <strong>Input Teks</strong>, <strong>Input Angka</strong>, atau <strong>Checkbox</strong>. Ikuti format jawaban yang diminta pada setiap soal.
                                </span>
                            </li>

                            <li class="flex items-start gap-3">
                                <span class="w-6 h-6 rounded-full bg-slate-200 dark:bg-slate-700 flex items-center justify-center text-slate-700 dark:text-slate-300 font-bold shrink-0 transition-colors">4</span>
                                <span class="leading-relaxed">
                                    <strong>Periksa Jawaban:</strong> Pastikan jawaban sudah sesuai dengan instruksi (misalnya jumlah kata atau angka yang diminta) sebelum melanjutkan ke misi berikutnya.
                                </span>
                            </li>

                            <li class="flex items-start gap-3">
                                <span class="w-6 h-6 rounded-full bg-red-100 dark:bg-red-900/40 flex items-center justify-center text-red-600 dark:text-red-400 font-bold shrink-0 transition-colors">5</span>
                                <span class="leading-relaxed text-red-700 dark:text-red-400 transition-colors">
                                    <strong>Dilarang Keras:</strong> Jangan melakukan refresh halaman browser (F5 atau tarik layar ke bawah) selama kuis berlangsung, karena dapat menyebabkan waktu dan progres kuis Anda hilang atau terganggu.
                                </span>
                            </li>

                        </ul>
                    </div>
                </div>

                {{-- Footer Modal --}}
                <div
                    class="bg-slate-50 p-4 md:p-5 border-t border-slate-200 flex justify-center shrink-0 rounded-b-2xl">
                    <button onclick="q1_aksiMulaiUjian()"
                        class="w-full md:w-auto px-8 py-3.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg transition-transform active:scale-95 text-base flex justify-center items-center gap-3">
                        MULAI UJIAN SEKARANG <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>

        {{-- MODAL KONFIRMASI (FIXED SCREEN) --}}
        <div id="modal-konfirmasi" class="fixed inset-0 bg-slate-900/50 z-[9999] flex items-center justify-center p-4 hidden">
            <div class="bg-white dark:bg-slate-900 rounded-xl p-6 max-w-sm w-full shadow-2xl transform scale-100 transition-all border border-slate-200 dark:border-slate-700">
                <h3 class="text-lg font-bold text-slate-800 dark:text-white mb-2">Belum Selesai</h3>
                <p class="text-sm text-slate-600 dark:text-slate-300 mb-6">Masih ada soal kosong. Yakin?</p>
                <div class="flex justify-end gap-3">
                    <button onclick="document.getElementById('modal-konfirmasi').classList.add('hidden')"
                        class="px-4 py-2 rounded text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800 font-bold text-sm border border-slate-200 dark:border-slate-600 transition-colors">BATAL</button>
                    <button onclick="q1_aksiFinalisasi()"
                        class="px-4 py-2 rounded bg-red-600 text-white hover:bg-red-700 font-bold text-sm shadow transition-colors">YA, KUMPULKAN</button>
                </div>
            </div>
        </div>

        {{-- MODAL HASIL (FIXED SCREEN) --}}
        <div id="modal-hasil" class="fixed inset-0 bg-white dark:bg-slate-900 z-[9999] flex items-center justify-center p-4 hidden transition-colors">
            <div class="text-center w-full max-w-md mx-auto">
                <div class="text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-2 text-konfirmasi-label">
                    NILAI AKHIR
                </div>

                <div class="div-skor-wrapper text-8xl font-black text-slate-800 dark:text-white mb-6 transition-colors">
                    <span id="skor-akhir">0</span>
                </div>

                <div class="flex flex-col sm:flex-row gap-3 justify-center w-full">
                    <button onclick="q1_aksiUlangi()"
                        class="btn-ulangi-quiz px-6 py-3 border border-slate-200 dark:border-slate-700 rounded-lg font-bold text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors w-full">
                        ULANGI
                    </button>
                    <button onclick="q1_aksiReviewJawaban()"
                        class="btn-lihat-quiz px-6 py-3 bg-slate-800 dark:bg-slate-700 text-white rounded-lg font-bold hover:bg-slate-900 dark:hover:bg-slate-600 shadow-lg transition-colors w-full">
                        LIHAT PEMBAHASAN
                    </button>
                    <a href="{{ route('dashboard') }}"
                        class="btn-dashboard flex items-center justify-center px-6 py-3 bg-blue-600 text-white rounded-lg font-bold hover:bg-blue-700 transition-colors w-full shadow-lg">
                        DASHBOARD
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
        $rawAnswers = null;

        if (isset($progress) && isset($progress['quiz1'])) {
            $dataQuiz = $progress['quiz1'];
            $displayScore = $dataQuiz->score ?? 0;
            $isDone = true;

            if (!empty($dataQuiz->answers)) {
                $rawAnswers = $dataQuiz->answers;
            } elseif (!empty($dataQuiz->answer)) {
                $rawAnswers = $dataQuiz->answer;
            }
        }
    @endphp

    // --- VARIABEL GLOBAL DENGAN NAMA FUNGSI q1_ ---
    window.q1_hasHistory = {{ $isDone ? 'true' : 'false' }};
    window.q1_historyScore = {{ $displayScore }};
    window.q1_dataSoal = @json($quiz1);

    // VARIABEL STATE
    window.q1_totalSoal = window.q1_dataSoal.length;
    window.q1_isExamMode = false;
    window.q1_soalAktif = 1;
    window.q1_sisaDetik = 600;
    window.q1_timerUjian = null;
    window.q1_dbRagu = {};
    window.q1_dbJawabanUser = {};

    try {
        let rawData = @json($rawAnswers);

        if (rawData) {
            if (typeof rawData === 'string') {
                try {
                    rawData = JSON.parse(rawData);
                } catch (e) {}
            }

            let tempDb = {};
            const assignData = (key, val) => {
                let numMatch = String(key).match(/\d+/);
                if (numMatch) {
                    tempDb['soal_' + numMatch[0]] = val;
                }
            };

            if (Array.isArray(rawData)) {
                rawData.forEach((val, idx) => {
                    if (typeof val === 'object' && val !== null && !Array.isArray(val)) {
                        Object.keys(val).forEach(k => assignData(k, val[k]));
                    } else {
                        tempDb['soal_' + (idx + 1)] = val;
                    }
                });
            } else if (typeof rawData === 'object' && rawData !== null) {
                Object.keys(rawData).forEach(k => assignData(k, rawData[k]));
            }

            window.q1_dbJawabanUser = tempDb;
        }
    } catch (e) {
        console.error("Gagal memproses jawaban:", e);
        window.q1_dbJawabanUser = {};
    }

    // ==========================================
    // 2. INISIALISASI HALAMAN
    // ==========================================
    document.addEventListener("DOMContentLoaded", function() {
        if (window.q1_hasHistory) {
            let mMulai = document.getElementById('modal-mulai');
            if (mMulai) mMulai.classList.add('hidden');

            let mHasil = document.getElementById('modal-hasil');
            if (mHasil) mHasil.classList.remove('hidden');

            let elSkor = document.getElementById('skor-akhir');
            if (elSkor) elSkor.innerText = window.q1_historyScore;

            let navBawah = document.getElementById('navigasi-bawah');
            if (navBawah) navBawah.style.display = 'none';

            let btnDash = document.querySelector('.btn-dashboard');
            if (btnDash) btnDash.classList.remove('hidden');

            setTimeout(q1_restoreUserAnswers, 500);
        } else {
            if (window.q1_totalSoal > 0) {
                q1_aksiBukaSoal(1);
                if (typeof q1_initDragAndDrop === "function") q1_initDragAndDrop();
            }
        }
    });

    // ==========================================
    // 3. FUNGSI RESTORE (MENGEMBALIKAN DATA)
    // ==========================================
    function q1_restoreUserAnswers() {
        if (!window.q1_dbJawabanUser || Object.keys(window.q1_dbJawabanUser).length === 0) return;

        Object.keys(window.q1_dbJawabanUser).forEach(key => {
            let answer = window.q1_dbJawabanUser[key];
            let nomor = key.toString().replace('soal_', '');
            let container = document.getElementById('container-' + nomor);
            if (!container) return;

            // A. TEXT / FILL BLANK
            let textInputs = container.querySelectorAll('input[type="text"]');
            if (textInputs.length > 0) {
                if (Array.isArray(answer)) {
                    answer.forEach((val, idx) => {
                        if (textInputs[idx]) textInputs[idx].value = val || "";
                    });
                } else {
                    textInputs[0].value = answer || "";
                }
            }

            // B. CHECKBOX
            if (Array.isArray(answer)) {
                container.querySelectorAll('input[type="checkbox"]').forEach(cb => {
                    if (answer.includes(cb.value) || answer.includes(String(cb.value))) cb.checked =
                        true;
                });
            }

            // C. PILIHAN GANDA
            container.querySelectorAll('.choice-btn').forEach(btn => {
                let keyBtn = btn.getAttribute('data-key');
                if (keyBtn && String(keyBtn).trim() == String(answer).trim()) {
                    btn.classList.add('choice-selected');
                    btn.style.backgroundColor = "#1e293b";
                    btn.style.color = "white";
                    btn.style.borderColor = "#1e293b";
                    let badge = btn.querySelector('.badge-key');
                    if (badge) {
                        badge.style.backgroundColor = "#475569";
                        badge.style.color = "white";
                        badge.style.borderColor = "#475569";
                    }
                }
            });

            // D. DRAG & DROP
            if (typeof answer === 'object' && !Array.isArray(answer)) {
                Object.keys(answer).forEach(itemId => {
                    let zoneType = answer[itemId];
                    let itemEl = container.querySelector(`.drag-item[data-id="${itemId}"]`) || document
                        .getElementById(itemId);
                    let targetZone = container.querySelector(
                        `.drop-zone[data-zone="${zoneType}"] .zone-body`);

                    if (itemEl && targetZone) targetZone.appendChild(itemEl);
                });
            }
        });
        q1_updateTampilanNav();
    }

    // ==========================================
    // 4. FUNGSI REVIEW (HILANGKAN PEMBAHASAN JIKA SALAH)
    // ==========================================
    function q1_aksiReviewJawaban() {
        document.getElementById('modal-hasil').classList.add('hidden');
        if (window.q1_timerUjian) clearInterval(window.q1_timerUjian);
        const timer = document.getElementById('timer-display');
        if (timer) {
            timer.innerHTML =
                '<span class="text-blue-600 text-sm"><i class="fa-solid fa-eye mr-1"></i> MODE REVIEW</span>';
            timer.classList.remove('text-red-600', 'animate-pulse');
        }

        const navBawah = document.getElementById('navigasi-bawah');
        if (navBawah) {
            navBawah.style.display = "flex";
            if (!document.getElementById('btn-kembali-skor')) {
                let btn = document.createElement('button');
                btn.id = 'btn-kembali-skor';
                btn.innerHTML = '<i class="fa-solid fa-arrow-left mr-2"></i> KEMBALI KE SKOR';
                btn.className =
                    "px-6 py-2.5 bg-slate-900 text-white rounded-lg font-bold text-sm hover:bg-slate-800 shadow-md ml-3 transition-colors";
                btn.onclick = function() {
                    document.getElementById('modal-hasil').classList.remove('hidden');
                    document.getElementById('navigasi-bawah').style.display = 'none';
                };
                navBawah.appendChild(btn);
            }
        }

        document.querySelectorAll('[onclick^="q1_toggleRagu"], [onclick="q1_aksiCekSelesai()"]').forEach(btn => btn
            .style.display = "none");
        document.getElementById('sidebar-nav').classList.add('pointer-events-auto');

        q1_restoreUserAnswers();

        // GRADING & VISUALISASI
        window.q1_dataSoal.forEach((soal, index) => {
            let nomor = index + 1;
            let qid = 'soal_' + nomor;
            let container = document.getElementById('container-' + nomor);
            let feedbackArea = document.getElementById('feedback-' + nomor);
            if (!container) return;

            let userAnswer = window.q1_dbJawabanUser[qid];
            let rawKunci = soal.correct_answer;
            let isBenar = false;

            try {
                let u = String(userAnswer || "").trim().toUpperCase();
                let k = String(rawKunci).trim().replace(/['"]/g, '').toUpperCase();

                if (soal.type === "CHECKBOX" && Array.isArray(userAnswer)) {
                    let kArr = String(rawKunci).replace(/[\[\]'"]/g, '').split(',').map(x => x.trim()
                        .toUpperCase()).sort();
                    let uArr = userAnswer.map(x => String(x).trim().toUpperCase()).sort();
                    isBenar = (JSON.stringify(kArr) === JSON.stringify(uArr)) && uArr.length > 0;
                } else if (soal.type === "FILL_BLANK_MULTI" && Array.isArray(userAnswer)) {
                    let kArr = String(rawKunci).replace(/[\[\]'"]/g, '').split(',').map(x => x.trim()
                        .toUpperCase());
                    let uArr = userAnswer.map(x => String(x).trim().toUpperCase());
                    isBenar = (JSON.stringify(kArr) === JSON.stringify(uArr));
                } else if (soal.type === "DRAG_AND_DROP") {
                    if (userAnswer && typeof userAnswer === 'object') {
                        let opts = JSON.parse(soal.options);
                        let correctCount = 0;
                        opts.forEach(o => {
                            if (userAnswer[o.id] === o.category) correctCount++;
                        });
                        isBenar = (correctCount === opts.length);
                    }
                } else {
                    isBenar = (soal.type === "NUMBER") ? (parseFloat(u) === parseFloat(k)) : (u === k && u !==
                        "");
                }
            } catch (e) {
                isBenar = false;
            }

            // DISABLE INPUTS
            container.style.border = "1px solid #e2e8f0";
            container.querySelectorAll('input, button.choice-btn').forEach(el => el.disabled = true);
            container.querySelectorAll('.drag-item').forEach(el => {
                el.draggable = false;
                el.style.cursor = 'default';
            });

            // COLORING CHOICE
            if (soal.type === "MULTIPLE_CHOICE" || soal.type === "BOOLEAN") {
                container.querySelectorAll('.choice-btn').forEach(btn => {
                    let keyBtn = btn.getAttribute('data-key');
                    if (keyBtn == userAnswer) {
                        btn.style.backgroundColor = isBenar ? "#dcfce7" : "#fee2e2";
                        btn.style.borderColor = isBenar ? "#22c55e" : "#ef4444";
                        btn.style.color = isBenar ? "#14532d" : "#991b1b";
                        let badge = btn.querySelector('.badge-key');
                        if (badge) {
                            badge.style.backgroundColor = isBenar ? "#22c55e" : "#ef4444";
                            badge.style.color = "white";
                            badge.style.borderColor = "transparent";
                        }
                    } else {
                        btn.style.backgroundColor = "white";
                    }
                });
            }

            // COLORING TEXT
            if (soal.type === "NUMBER" || soal.type === "FILL_BLANK" || soal.type === "FILL_BLANK_MULTI") {
                let inps = container.querySelectorAll('input[type="text"]');
                inps.forEach(inp => {
                    if (inp.value.trim() !== "") {
                        inp.style.backgroundColor = isBenar ? "#dcfce7" : "#fee2e2";
                        inp.style.borderColor = isBenar ? "#22c55e" : "#ef4444";
                        inp.style.color = isBenar ? "#14532d" : "#991b1b";
                    }
                });
            }

            // FEEDBACK BOX (JIKA SALAH HANYA MUNCUL PESAN GENERIK)
            if (feedbackArea) {
                let html =
                    `<div class="mt-6 p-5 rounded-xl border ${isBenar ? 'bg-green-50 border-green-300' : 'bg-red-50 border-red-300'} shadow-sm">`;

                if (isBenar) {
                    html +=
                        `<div class="flex items-center gap-2 mb-2 text-green-700 font-extrabold text-lg"><i class="fa-solid fa-check-circle"></i> JAWABAN BENAR</div>`;
                    if (soal.explanation) {
                        html +=
                            `<div class="mt-3 pt-3 border-t border-green-200 text-sm text-green-900 leading-relaxed text-justify"><strong>Pembahasan Singkat:</strong><br>${soal.explanation}</div>`;
                    }
                } else {
                    html +=
                        `<div class="flex items-center gap-2 text-red-700 font-extrabold text-lg"><i class="fa-solid fa-times-circle"></i> KURANG TEPAT</div>`;
                    html +=
                        `<div class="text-sm text-red-800 mt-2 font-medium">Jawaban Anda masih belum tepat atau kosong. Kunci jawaban dan pembahasan sengaja disembunyikan agar Anda bisa mencobanya lagi!</div>`;
                }

                html += `</div>`;
                feedbackArea.innerHTML = html;
                feedbackArea.classList.remove('hidden');
            }
        });

        q1_aksiBukaSoal(1);
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }

    // ==========================================
    // 5. HELPER & HANDLERS
    // ==========================================
    function q1_updateTampilanNav() {
        for (let i = 1; i <= window.q1_totalSoal; i++) {
            let btn = document.getElementById('nav-btn-' + i);
            if (!btn) continue;

            // Hapus inline style lama agar bisa diatur murni oleh CSS
            btn.removeAttribute("style");
            
            // Set base class
            btn.className = "nav-btn h-10 rounded-lg font-bold text-sm transition flex items-center justify-center border shadow-sm";

            let terisi = q1_cekApakahTerisi(i);
            let aktif = (i === window.q1_soalAktif);
            let ragu = window.q1_dbRagu['soal_' + i];

            if (aktif) {
                btn.classList.add('nav-aktif');
            } else if (ragu) {
                btn.classList.add('nav-ragu');
            } else if (terisi) {
                btn.classList.add('nav-terjawab');
            } else {
                btn.classList.add('nav-kosong');
            }
        }
    }

    function q1_cekApakahTerisi(nomor) {
        let qid = 'soal_' + nomor;
        let data = window.q1_dbJawabanUser[qid];
        if (!data) return false;
        if (Array.isArray(data)) return data.length > 0;
        if (typeof data === 'object') return Object.keys(data).length > 0;
        return String(data).trim() !== "";
    }

    function q1_aksiBukaSoal(nomor) {
        document.querySelectorAll('.blok-soal').forEach(el => el.classList.add('hidden'));
        let target = document.getElementById('container-' + nomor);
        if (target) target.classList.remove('hidden');

        window.q1_soalAktif = nomor;
        q1_updateTampilanNav();

        let prev = document.getElementById('btn-prev');
        let next = document.getElementById('btn-next');
        if (prev) prev.disabled = (nomor === 1);
        if (next) {
            if (nomor === window.q1_totalSoal) next.classList.add('hidden');
            else next.classList.remove('hidden');
        }

        let areaSoal = document.getElementById('area-soal');
        if (areaSoal) areaSoal.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }

    function q1_aksiGantiSoal(arah) {
        let next = window.q1_soalAktif + arah;
        if (next >= 1 && next <= window.q1_totalSoal) q1_aksiBukaSoal(next);
    }

    function q1_toggleRagu(nomor) {
        window.q1_dbRagu['soal_' + nomor] = !window.q1_dbRagu['soal_' + nomor];
        q1_updateTampilanNav();
    }

    function q1_aksiPilihJawaban(qid, nilai, btn) {
        if (!window.q1_isExamMode) return;
        window.q1_dbJawabanUser[qid] = nilai;
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
        btn.style.backgroundColor = "#1e293b";
        btn.style.color = "white";
        btn.style.borderColor = "#1e293b";

        let selectedBadge = btn.querySelector('.badge-key');
        if (selectedBadge) {
            selectedBadge.style.backgroundColor = "#475569";
            selectedBadge.style.color = "white";
            selectedBadge.style.borderColor = "#475569";
        }

        q1_updateTampilanNav();
    }

    function q1_aksiCekStatus(nomor) {
        let qid = 'soal_' + nomor;
        let container = document.getElementById('container-' + nomor);
        if (!container) return;

        let checkboxes = container.querySelectorAll('input[type="checkbox"]');
        if (checkboxes.length > 0) {
            let checked = container.querySelectorAll('input[type="checkbox"]:checked');
            let vals = [];
            checked.forEach(c => vals.push(c.value));
            if (vals.length > 0) window.q1_dbJawabanUser[qid] = vals;
            else delete window.q1_dbJawabanUser[qid];
        } else {
            let texts = container.querySelectorAll('input[type="text"]');
            if (texts.length > 0) {
                let vals = [];
                let adaIsi = false;
                texts.forEach(t => {
                    vals.push(t.value);
                    if (t.value.trim()) adaIsi = true;
                });
                if (adaIsi) window.q1_dbJawabanUser[qid] = (texts.length === 1) ? vals[0] : vals;
                else delete window.q1_dbJawabanUser[qid];
            }
        }
        q1_updateTampilanNav();
    }

    function q1_initDragAndDrop() {
        const items = document.querySelectorAll('.drag-item');
        const zones = document.querySelectorAll('.drop-zone, .source-zone');
        items.forEach(item => {
            item.addEventListener('dragstart', (e) => {
                if (!window.q1_isExamMode) {
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
                if (!window.q1_isExamMode) return;
                e.preventDefault();
                zone.classList.add('bg-blue-50');
            });
            zone.addEventListener('dragleave', (e) => {
                zone.classList.remove('bg-blue-50');
            });
            zone.addEventListener('drop', (e) => {
                if (!window.q1_isExamMode) return;
                e.preventDefault();
                zone.classList.remove('bg-blue-50');
                const id = e.dataTransfer.getData('text/plain');
                const draggableElement = document.getElementById(id);
                if (!draggableElement) return;

                if (zone.classList.contains('zone-body') || zone.classList.contains('source-zone')) {
                    zone.appendChild(draggableElement);
                } else {
                    let bdy = zone.querySelector('.zone-body');
                    if (bdy) bdy.appendChild(draggableElement);
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
                    if (adaIsi) window.q1_dbJawabanUser[qid] = answerObj;
                    else delete window.q1_dbJawabanUser[qid];
                    q1_updateTampilanNav();
                }
            });
        });
    }

    // --- SUBMIT ---
    function q1_aksiCekSelesai() {
        let kosong = [];
        for (let i = 1; i <= window.q1_totalSoal; i++) {
            if (!q1_cekApakahTerisi(i)) kosong.push(i);
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

    function q1_aksiFinalisasi() {
        if (!window.q1_isExamMode) return;
        clearInterval(window.q1_timerUjian);
        window.q1_isExamMode = false;
        document.body.classList.remove('exam-mode');

        const btnKumpul = document.getElementById('btn-yakin-kumpul');
        if (btnKumpul) {
            btnKumpul.disabled = true;
            btnKumpul.innerText = "Menyimpan...";
        }

        fetch("{{ route('submit.quiz') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    chapter_code: 'bab1',
                    section_code: 'quiz1',
                    score: 0,
                    answers: window.q1_dbJawabanUser
                })
            })
            .then(res => res.json())
            .then(data => {
                document.getElementById('skor-akhir').innerText = data.score;
                document.getElementById('modal-konfirmasi').classList.add('hidden');
                document.getElementById('modal-hasil').classList.remove('hidden');

                let btnDash = document.querySelector('.btn-dashboard');
                if (btnDash) btnDash.classList.remove('hidden');

                window.q1_hasHistory = true;
                window.q1_historyScore = data.score;
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

    // --- MULAI UJIAN ---
    function q1_aksiMulaiUjian() {
        window.q1_isExamMode = true;
        document.getElementById('modal-mulai').classList.add('hidden');
        document.body.classList.add('exam-mode');

        let timerDisp = document.getElementById('timer-display');
        
        // --- BACA DURASI DARI DATABASE ---
        let menitKuis = 10; // Nilai jaga-jaga
        if (timerDisp && timerDisp.hasAttribute('data-waktu')) {
            // Tarik angka dari HTML (yang didapat dari database)
            menitKuis = parseInt(timerDisp.getAttribute('data-waktu')) || 10;
        }

        // Ubah menit menjadi total detik
        window.q1_sisaDetik = menitKuis * 60;
        // ---------------------------------

        if (timerDisp) {
            // Pasang tampilan waktu awal sebelum interval berjalan (misal: "20:00")
            let initialM = Math.floor(window.q1_sisaDetik / 60).toString().padStart(2, '0');
            let initialS = (window.q1_sisaDetik % 60).toString().padStart(2, '0');
            timerDisp.innerText = initialM + ":" + initialS;
            timerDisp.classList.remove('text-red-600', 'animate-pulse');
        }

        if (window.q1_timerUjian) clearInterval(window.q1_timerUjian);
        
        window.q1_timerUjian = setInterval(() => {
            window.q1_sisaDetik--;
            
            let m = Math.floor(window.q1_sisaDetik / 60).toString().padStart(2, '0');
            let s = (window.q1_sisaDetik % 60).toString().padStart(2, '0');
            
            if (timerDisp) {
                timerDisp.innerText = m + ":" + s;
                if (window.q1_sisaDetik <= 60) timerDisp.classList.add('text-red-600', 'animate-pulse');
            }
            
            if (window.q1_sisaDetik <= 0) {
                clearInterval(window.q1_timerUjian);
                q1_aksiFinalisasi(); 
            }
        }, 1000);
    }

    // --- ULANGI UJIAN (RESET) ---
    function q1_aksiUlangi() {
        const modal = document.getElementById('modal-hasil');
        const labelKonfirmasi = modal.querySelector('.text-konfirmasi-label');
        const skorText = modal.querySelector('#skor-akhir');
        const divSkorParent = modal.querySelector('.div-skor-wrapper');
        const btnDash = modal.querySelector('.btn-dashboard');

        const skorLamaHtml = skorText.innerText;

        // Tampilan Konfirmasi
        if (labelKonfirmasi) labelKonfirmasi.innerText = "KONFIRMASI";
        if (skorText) skorText.innerText = "Ulangi Ujian?";

        if (divSkorParent) {
            divSkorParent.classList.remove('text-8xl');
            divSkorParent.classList.add('text-3xl');
        }

        const btnUlangi = modal.querySelector('.btn-ulangi-quiz');
        const btnLihat = modal.querySelector('.btn-lihat-quiz');

        if (btnDash) btnDash.classList.add('hidden'); // Sembunyikan tombol dashboard saat mode konfirmasi

        if (btnUlangi) {
            btnUlangi.innerText = "YA, ULANGI";
            btnUlangi.classList.remove('w-full');
        }
        if (btnLihat) {
            btnLihat.innerText = "BATAL";
            btnLihat.classList.remove('w-full');
        }

        function restoreModalUI() {
            if (labelKonfirmasi) labelKonfirmasi.innerText = "NILAI AKHIR";
            if (skorText) skorText.innerText = skorLamaHtml;

            if (divSkorParent) {
                divSkorParent.classList.add('text-8xl');
                divSkorParent.classList.remove('text-3xl');
            }

            if (btnUlangi) {
                btnUlangi.innerText = "ULANGI";
                btnUlangi.classList.add('w-full');
                btnUlangi.onclick = q1_aksiUlangi;
            }
            if (btnLihat) {
                btnLihat.innerText = "LIHAT PEMBAHASAN";
                btnLihat.classList.add('w-full');
                btnLihat.onclick = q1_aksiReviewJawaban;
            }
            if (btnDash) btnDash.classList.remove('hidden');
        }

        if (btnUlangi) {
            btnUlangi.onclick = function() {
                restoreModalUI();
                modal.classList.add('hidden');

                window.q1_dbJawabanUser = {};
                window.q1_dbRagu = {};
                window.q1_hasHistory = false;
                window.q1_isExamMode = false;

                document.querySelectorAll('input, select').forEach(i => {
                    if (i.type === "checkbox") i.checked = false;
                    else i.value = '';
                    i.disabled = false;
                    i.style.backgroundColor = 'transparent';
                    i.style.borderColor = '#cbd5e1';
                    i.style.color = '#334155';
                });

                document.querySelectorAll('.choice-btn').forEach(b => {
                    b.classList.remove('choice-selected');
                    b.disabled = false;
                    b.style.backgroundColor = 'white';
                    b.style.color = '#475569';
                    b.style.borderColor = '#cbd5e1';
                    let badge = b.querySelector('.badge-key');
                    if (badge) {
                        badge.style.backgroundColor = "#f1f5f9";
                        badge.style.color = "#64748b";
                        badge.style.borderColor = "#e2e8f0";
                    }
                });

                document.querySelectorAll('.drag-item').forEach(d => {
                    d.draggable = true;
                    d.style.cursor = 'grab';
                    let sourceZone = d.closest('.dnd-container')?.querySelector('.source-zone');
                    if (sourceZone) sourceZone.appendChild(d);
                });

                document.querySelectorAll('[id^="feedback-"]').forEach(f => {
                    f.classList.add('hidden');
                    f.innerHTML = '';
                });
                document.querySelectorAll('.blok-soal').forEach(b => b.style.border = 'none');

                let navBawah = document.getElementById('navigasi-bawah');
                if (navBawah) navBawah.style.display = 'flex';

                let btnKembaliSkor = document.getElementById('btn-kembali-skor');
                if (btnKembaliSkor) btnKembaliSkor.remove();

                document.querySelectorAll('[onclick^="q1_toggleRagu"], [onclick="q1_aksiCekSelesai()"]').forEach(
                    btn => {
                        btn.style.display = "block";
                    });

                // ===============================================
                // PERBAIKAN FATAL: RESET TIMER SESUAI DATABASE
                // ===============================================
                let timerDisp = document.getElementById('timer-display');
                if (timerDisp) {
                    let resetMenit = 10;
                    if (timerDisp.hasAttribute('data-waktu')) {
                        resetMenit = parseInt(timerDisp.getAttribute('data-waktu')) || 10;
                    }
                    let mReset = resetMenit.toString().padStart(2, '0');
                    timerDisp.innerText = mReset + ':00'; // SEKARANG DINAMIS!
                    timerDisp.classList.remove('text-red-600', 'animate-pulse');
                }

                document.getElementById('modal-mulai').classList.remove('hidden');

                q1_updateTampilanNav();
                q1_aksiBukaSoal(1);

                if (typeof q1_initDragAndDrop === "function") setTimeout(q1_initDragAndDrop, 500);
            };
        }

        if (btnLihat) {
            btnLihat.onclick = function() {
                restoreModalUI();
            };
        }
    }
</script>
