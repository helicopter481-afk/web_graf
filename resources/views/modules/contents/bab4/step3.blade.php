<section id="step-3" class="step-slide">
    {{-- Import Vis.js untuk visualisasi --}}
    <script type="text/javascript" src="https://unpkg.com/vis-network/standalone/umd/vis-network.min.js"></script>

    <style>
        /* CSS Animasi Buka Kunci (Unlock) */
        .unlock-transition {
            transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .locked-content {
            filter: blur(8px) grayscale(50%);
            opacity: 0.6;
            pointer-events: none;
            user-select: none;
        }

        .unlocked-content {
            filter: blur(0) grayscale(0%);
            opacity: 1;
            pointer-events: auto;
            user-select: auto;
        }

        /* Anti Copy untuk contoh kode */
        .anti-copas {
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            pointer-events: none;
        }
    </style>

    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-8 md:p-10 max-w-6xl mx-auto -mt-8">

        {{-- JUDUL MATERI --}}
        <div class="border-b border-slate-200 pb-6 mb-8 text-left">
            <h2 class="text-2xl md:text-3xl font-bold text-slate-900 mb-2">4.3 Jantung Dijkstra: Proses <span
                    class="italic text-blue-600">Relaxation</span></h2>
            <p class="text-slate-500 font-medium">Logika inti untuk memperbarui jarak terpendek saat menemukan rute
                alternatif yang lebih cepat.</p>
        </div>

        {{-- KONTEN TEORI & VISUALISASI INTERAKTIF (MISI) --}}
        <div class="grid md:grid-cols-12 gap-8 mb-10 items-start">

            {{-- Kolom Kiri: Teori & Instruksi --}}
            <div
                class="md:col-span-7 prose prose-slate text-slate-700 leading-relaxed text-justify max-w-none flex flex-col h-full">
                <p class="mb-3">
                    Ini adalah rahasia terbesar dari algoritma Dijkstra. Saat komputer mengunjungi sebuah simpul, ia
                    akan mengecek semua tetangganya dan menghitung:
                </p>
                <div
                    class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded text-blue-800 font-medium text-sm italic mb-3 shadow-sm">
                    "Apakah jarak lamaku + jarak ke tetangga ini, hasilnya <strong>LEBIH KECIL</strong> daripada catatan
                    jarak di tabelku saat ini?"
                </div>
                <p>
                    Jika <strong>YA</strong>, maka komputer akan <strong>menghapus catatan lama</strong>, dan
                    menggantinya dengan rute baru yang lebih cepat. Proses <em>update</em> rute inilah yang disebut
                    <strong>Relaxation</strong>.
                </p>

                <div class="mt-4 bg-amber-50 border border-amber-200 p-5 rounded-xl shadow-sm flex-1">
                    <h4 class="text-sm font-bold text-amber-900 mb-2 flex items-center gap-2">
                        <i class="fa-solid fa-bolt"></i> Uji Analisa Anda!
                    </h4>
                    <p class="text-sm text-amber-800 font-medium m-0 leading-relaxed">
                        Tabel memori saat ini mencatat jarak <strong>Rumah</strong> &rarr; <strong>Kampus</strong>
                        adalah <strong>15 KM</strong>. Namun, komputer baru saja memindai ada rute baru memutar lewat
                        <strong>Pasar</strong> (8 KM + 4 KM). <br><br>
                        <strong>Tugas Anda:</strong> Berdasarkan prinsip <em>Relaxation</em>, <strong>klik
                            jalur</strong> pada graf di samping yang pada akhirnya akan <strong>disimpan</strong> oleh
                        algoritma!
                    </p>
                </div>
            </div>

            {{-- Kolom Kanan: Visualisasi Graf Berbobot (INTERAKTIF KLIK) --}}
            <div
                class="md:col-span-5 bg-slate-50 border-2 border-slate-200 rounded-xl overflow-hidden shadow-inner flex flex-col items-center relative h-[380px]">
                <div
                    class="bg-slate-200/80 py-2 px-4 border-b border-slate-300 flex justify-between items-center w-full backdrop-blur-sm z-20">
                    <span class="text-xs font-bold text-slate-700 uppercase tracking-widest">Visualisasi
                        Relaxation</span>
                    <i class="fa-solid fa-hand-pointer text-slate-500"></i>
                </div>

                {{-- Container Vis.js --}}
                <div id="relax-graph-vis-43" class="w-full flex-1 focus:outline-none bg-white"></div>

                {{-- Status Bar Hasil Klik --}}
                <div id="relax-feedback-43"
                    class="absolute bottom-3 inset-x-3 bg-white border border-slate-300 rounded-lg p-3 text-center text-xs font-bold text-slate-500 shadow-md transition-colors z-20">
                    Pilih (Klik) jalur yang benar pada graf...
                </div>
            </div>
        </div>

        {{-- KESIMPULAN MISI (MUNCUL SETELAH BERHASIL KLIK GRAF) --}}
        <div id="misi-conclusion-43"
            class="hidden mb-10 bg-emerald-50 border border-emerald-200 p-6 rounded-xl shadow-sm transition-all duration-500 text-left">
            <h4 class="font-bold text-emerald-800 text-base mb-2 flex items-center gap-2">
                <i class="fa-solid fa-lightbulb text-emerald-600"></i> Inti dari Relaxation
            </h4>
            <p class="text-sm text-emerald-800 leading-relaxed text-justify">
                Tepat Sekali! Algoritma Dijkstra tidak tertipu oleh "jalur lurus". Karena 8 KM + 4 KM = <strong>12
                    KM</strong> (Lebih kecil dari rute lurus 15 KM), maka catatan lama 15 KM akan
                <strong>dihapus</strong> dari memori dan digantikan oleh jarak baru yaitu 12 KM.
            </p>
        </div>

        {{-- CONTOH KODE PROGRAM (ANTI-COPY) --}}
        <div class="mb-6">
            <h3 class="text-lg font-bold text-slate-800 mb-4 flex items-center gap-2 text-left">
                <i class="fa-solid fa-laptop-code text-slate-500"></i> Implementasi Logika Inti
            </h3>

            {{-- Tampilan Gambar Kode (Hanya Baca) --}}
            <div
                class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 select-none pointer-events-none anti-copas text-left">
                <div class="bg-[#2d2d2d] px-4 py-2.5 flex items-center gap-2 border-b border-slate-700">
                    <div class="flex gap-1.5">
                        <div class="w-3 h-3 rounded-full bg-[#ff5f56]"></div>
                        <div class="w-3 h-3 rounded-full bg-[#ffbd2e]"></div>
                        <div class="w-3 h-3 rounded-full bg-[#27c93f]"></div>
                    </div>
                    <span class="text-slate-400 text-xs ml-2 font-mono">Contoh Kode (Hanya Baca)</span>
                </div>
                <div class="p-6 font-mono text-sm leading-loose overflow-x-auto text-[#d4d4d4]">
                    <span class="text-[#6a9955]"># Catatan lama di tabel: Menuju Kampus butuh 15 KM</span>
                    <div><span class="text-[#9cdcfe]">jarak_ke_kampus</span> = <span class="text-[#b5cea8]">15</span>
                    </div>
                    <br>
                    <span class="text-[#6a9955]"># Komputer mencoba rute baru lewat Pasar</span>
                    <div><span class="text-[#9cdcfe]">jarak_ke_pasar</span> = <span class="text-[#b5cea8]">8</span>
                    </div>
                    <div><span class="text-[#9cdcfe]">pasar_ke_kampus</span> = <span class="text-[#b5cea8]">4</span>
                    </div>
                    <br>
                    <span class="text-[#6a9955]"># Proses Relaxation (Pengecekan Total Jarak Baru)</span>
                    <div><span class="text-[#9cdcfe]">jarak_rute_baru</span> = <span
                            class="text-[#9cdcfe]">jarak_ke_pasar</span> + <span
                            class="text-[#9cdcfe]">pasar_ke_kampus</span></div>
                    <br>
                    <div><span class="text-[#c586c0]">if</span> <span class="text-[#9cdcfe]">jarak_rute_baru</span>
                        < <span class="text-[#9cdcfe]">jarak_ke_kampus</span>:
                    </div>
                    <div class="ml-4"><span class="text-[#9cdcfe]">jarak_ke_kampus</span> = <span
                            class="text-[#9cdcfe]">jarak_rute_baru</span> <span class="text-[#6a9955]"># UPDATE DATA
                            LAMA!</span></div>
                    <div class="ml-4"><span class="text-[#dcdcaa]">print</span>(<span class="text-[#ce9178]">"Rute
                            baru lebih cepat! Jarak diupdate menjadi:"</span>, <span
                            class="text-[#9cdcfe]">jarak_ke_kampus</span>)</div>
                </div>
            </div>
        </div>

        {{-- PENJELASAN KODE PROGRAM DI BAWAH KODE --}}
        <div class="mb-10 p-6 border border-slate-200 rounded-xl bg-slate-50 shadow-sm text-left">
            <h4 class="font-bold text-slate-800 text-sm mb-3">Penjelasan Kode:</h4>
            <ul class="list-disc list-outside ml-5 text-sm text-slate-700 space-y-2 leading-relaxed text-justify">
                <li>Awalnya jarak langsung ke Kampus disimpan sebesar <strong>15 KM</strong>.</li>
                <li>Komputer mencoba rute alternatif memutar lewat Pasar. Total rute baru dihitung: 8 + 4 = <strong>12
                        KM</strong>.</li>
                <li>Program menggunakan operator <code>if</code> untuk membandingkan jarak lama dengan jarak baru.</li>
                <li>Karena 12 lebih kecil dari 15 (<code>
                        << /code>), maka variabel jarak lama ditimpa (diperbarui) menjadi 12.</li>
                <li>Proses mengganti jarak lama dengan jarak baru yang lebih pendek inilah yang disebut
                    <strong>Relaxation</strong>.</li>
            </ul>
        </div>

        {{-- ========================================== --}}
        {{-- INTERACTIVE SANDBOX: KETIK ULANG KODE --}}
        {{-- ========================================== --}}
        <div class="mb-10 bg-blue-50/30 border-2 border-blue-200 p-6 rounded-xl shadow-sm text-left">
            <h3 class="text-lg font-bold text-slate-800 mb-2">Buktikan Pemahaman Anda!</h3>
            <p class="text-sm text-slate-600 mb-4">
                Ketik ulang logika kode <span class="italic font-bold">Relaxation</span> di atas ke dalam editor kosong
                di bawah ini (baris komentar hijau tidak perlu). Jalankan programnya untuk <strong>membuka
                    kunci</strong> penjelasan <em>output</em> serta Aktivitas 4.3!
            </p>

            <div
                class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 font-mono text-sm flex flex-col">
                <div
                    class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700 shrink-0">
                    <span class="text-slate-400 text-xs">Terminal Editor Pyodide</span>
                    <button onclick="window.runDemoBox43()" id="btn-demo43"
                        class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors shadow-sm active:scale-95">
                        <i class="fa-solid fa-play mr-1"></i> Jalankan Kode
                    </button>
                </div>

                <textarea id="editor-demo43"
                    class="w-full min-h-[220px] bg-[#1e1e1e] text-[#d4d4d4] px-5 pt-5 pb-2 font-mono text-sm outline-none resize-none leading-relaxed overflow-hidden text-left"
                    spellcheck="false" placeholder="# Ketik ulang kode Python di sini..." oninput="window.autoResizeEditor(this)"></textarea>

                {{-- WADAH OUTPUT (RATA KIRI & RAPI) --}}
                <div class="px-5 pb-5 pt-2 bg-[#1e1e1e] text-left w-full">
                    <hr class="border-slate-700 mb-4">
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-slate-500 text-[10px] font-bold tracking-widest uppercase">OUTPUT
                            TERMINAL</span>
                        <span id="status-demo43"
                            class="bg-slate-800 text-slate-400 px-2 py-0.5 rounded text-[10px]">Ready</span>
                    </div>
                    <div id="output-demo43"
                        class="block text-left text-[#4af626] whitespace-pre-wrap break-words min-h-[20px] italic opacity-60 m-0 p-0">
                        (Output terminal akan tampil di sini setelah dijalankan)</div>
                </div>
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- KONTEN TERKUNCI (OUTPUT + AKTIVITAS 4.3) --}}
        {{-- ========================================== --}}
        <div id="locked-section-43" class="relative locked-content unlock-transition pb-6 text-left">

            {{-- Overlay Gembok --}}
            <div id="lock-overlay-43"
                class="absolute inset-0 z-30 flex flex-col items-center justify-center bg-white/50 backdrop-blur-[3px] rounded-xl transition-opacity duration-500">
                <div
                    class="bg-white p-5 rounded-2xl shadow-xl flex flex-col items-center border border-slate-200 animate-bounce">
                    <i class="fa-solid fa-lock text-4xl text-slate-400 mb-3"></i>
                    <p class="text-sm font-bold text-slate-600 text-center">Konten Terkunci</p>
                    <p class="text-xs text-slate-500 text-center mt-1">Ketik dan jalankan kode di atas<br>dengan benar
                        untuk membuka.</p>
                </div>
            </div>

            {{-- Penjelasan Output Program --}}
            <div id="explanation-box-43"
                class="mb-10 p-6 border border-slate-200 rounded-xl bg-white shadow-sm scroll-mt-24">
                <h4 class="font-bold text-slate-800 text-base mb-3">Penjelasan Output Program:</h4>
                <div
                    class="bg-black text-[#4af626] text-left font-mono text-sm p-4 rounded-md shadow-inner mb-4 inline-block block w-fit">
                    Rute baru lebih cepat! Jarak diupdate menjadi: 12
                </div>
                <p class="text-sm text-slate-700 text-justify leading-relaxed mb-3">
                    Output di atas membuktikan bahwa proses komputasi <em>Relaxation</em> berhasil dilakukan:
                </p>
                <ul class="list-disc list-outside ml-5 text-sm text-slate-700 space-y-2 leading-relaxed text-justify">
                    <li>Awalnya jarak ke Kampus adalah <strong>15 KM</strong>. Karena rute memutar bernilai <strong>12
                            KM</strong> (lebih kecil dari 15), maka program berhasil masuk ke dalam blok
                        <code>if</code>.</li>
                    <li>Sistem menimpa (mengganti) variabel memori lama dengan angka 12. Pesan output yang muncul adalah
                        bukti bahwa proses pembaruan data berhasil dieksekusi sempurna oleh mesin.</li>
                </ul>
            </div>

            {{-- AKTIVITAS 4.3: FILL IN THE BLANKS --}}
            <div id="activity-43-container" class="border-2 border-slate-200 rounded-xl overflow-hidden shadow-sm">
                <div class="bg-yellow-50 px-6 py-4 border-b border-yellow-200 flex justify-between items-center">
                    <h3 class="font-bold text-yellow-800 text-lg flex items-center gap-2">
                        <i class="fa-solid fa-lightbulb text-yellow-600"></i> Aktivitas 4.3 – Live Coding: Evaluasi
                        Rute
                    </h3>
                    <span id="badge-act43"
                        class="hidden bg-green-500 text-white px-3 py-1 rounded text-xs font-bold shadow-sm flex items-center gap-1"><i
                            class="fa-solid fa-check"></i> Selesai</span>
                </div>
                <div class="p-6 bg-white">
                    <p class="text-sm text-slate-700 leading-relaxed text-justify mb-3">
                        <strong>Skenario Lanjutan:</strong> Komputer sedang mengevaluasi rute logistik menuju
                        <strong>Bandara</strong>. Jarak lama yang tersimpan di tabel adalah <strong>50 KM</strong>. Kini
                        ada rute baru melewati Pelabuhan dengan rincian: (Jarak ke Pelabuhan: 15 KM) + (Pelabuhan ke
                        Bandara: 20 KM).
                    </p>
                    <div
                        class="bg-white/80 p-4 rounded border border-blue-200 font-medium text-blue-900 text-sm shadow-sm leading-relaxed mb-6">
                        <strong>Tugas Anda:</strong> Lengkapi sintaks <code>if</code> di bawah ini dengan
                        <strong>Operator Perbandingan Matematika</strong> yang tepat agar komputer bisa mengecek apakah
                        rute baru lebih cepat (lebih kecil) dari rute lama!
                    </div>

                    <div
                        class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 font-mono text-sm flex flex-col">
                        <div
                            class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700">
                            <span class="text-slate-400 text-xs">Terminal Aktivitas (main.py)</span>
                            <button onclick="window.runAktivitas43()" id="btnRunAct43"
                                class="bg-yellow-600 hover:bg-yellow-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors shadow-sm active:scale-95"
                                disabled>
                                Jalankan & Periksa
                            </button>
                        </div>

                        <div class="p-6 leading-relaxed text-[#d4d4d4] overflow-x-auto whitespace-nowrap text-left">
                            <div><span class="text-[#9cdcfe]">jarak_lama</span> = <span
                                    class="text-[#b5cea8]">50</span></div>
                            <div><span class="text-[#9cdcfe]">jarak_baru</span> = <span
                                    class="text-[#b5cea8]">15</span> + <span class="text-[#b5cea8]">20</span></div>
                            <br>
                            <div class="text-[#6a9955]"># Masukkan operator Lebih Kecil Dari</div>
                            <div class="flex items-center mt-1 text-left mb-2">
                                <span class="text-[#c586c0]">if</span> <span class="text-[#9cdcfe]">jarak_baru</span>
                                <input type="text" id="input43_1"
                                    class="bg-[#3c3c3c] text-[#dcdcaa] font-bold border border-slate-500 rounded px-2 py-0.5 mx-1 w-12 outline-none focus:border-blue-400 focus:bg-[#2d2d2d] text-center transition-colors shadow-inner"
                                    autocomplete="off" spellcheck="false" disabled> <span
                                    class="text-[#9cdcfe]">jarak_lama</span>:
                            </div>
                            <div class="ml-4"><span class="text-[#9cdcfe]">jarak_lama</span> = <span
                                    class="text-[#9cdcfe]">jarak_baru</span></div>
                            <div class="ml-4"><span class="text-[#dcdcaa]">print</span>(<span
                                    class="text-[#ce9178]">"Update jarak menjadi:"</span>, <span
                                    class="text-[#9cdcfe]">jarak_lama</span>)</div>
                            <div class="ml-4"><span class="text-[#dcdcaa]">print</span>(<span
                                    class="text-[#ce9178]">"Proses Relaxation Berhasil!"</span>)</div>

                            {{-- WADAH OUTPUT (RATA KIRI & RAPI) --}}
                            <div class="mt-6 pt-4 border-t border-slate-700 text-left w-full">
                                <div class="flex justify-between items-center mb-3">
                                    <span class="text-slate-500 text-[10px] font-bold tracking-widest uppercase">OUTPUT
                                        TERMINAL</span>
                                    <span id="status-act43"
                                        class="bg-slate-800 text-slate-400 px-2 py-0.5 rounded text-[10px]">Ready</span>
                                </div>
                                <div id="console-text-43"
                                    class="block text-left text-[#4af626] whitespace-pre-wrap break-words leading-relaxed text-sm italic opacity-60 m-0 p-0">
                                    (Output terminal akan tampil di sini setelah dijalankan)</div>
                            </div>
                        </div>
                    </div>

                    <div id="alert-43"
                        class="hidden mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border transition-all text-left">
                    </div>
                </div>
            </div>

            {{-- Navigasi Bawah --}}
            <div class="flex justify-between gap-4 mt-12 pt-6 border-t border-slate-200">
                <button type="button" onclick="prevStep()"
                    class="px-6 py-2.5 rounded-lg border border-slate-300 font-bold text-slate-600 hover:bg-slate-50 transition shadow-sm active:scale-95">
                    Kembali
                </button>
                <button type="button" id="btnNext43" onclick="nextStep()"
                    class="px-6 py-2.5 bg-slate-900 hover:bg-slate-800 text-white font-bold rounded-lg shadow-md transition-all active:scale-95 opacity-50 cursor-not-allowed"
                    disabled>
                    Lanjut
                </button>
            </div>
        </div>

    </div>

    {{-- SCRIPT LOGIKA (ISOLATED VARIABLES, ANTI BUG, PYODIDE SAFE) --}}
    <script>
        // --- 1. VISUALISASI INTERAKTIF RELAXATION (KUIS KLIK) ---
        // Isolasi variabel menggunakan unique object/namespace
        window.relaxGame43 = {
            net: null,
            nodes: null,
            edges: null,
            clickedSet: new Set()
        };

        function initGraphRelax43() {
            const container = document.getElementById('relax-graph-vis-43');
            if (!container) return;

            // Posisi absolut terkunci agar graf tidak goyang
            window.relaxGame43.nodes = new vis.DataSet([{
                    id: 'R',
                    label: 'Rumah\n(Awal)',
                    x: -140,
                    y: 30,
                    fixed: true,
                    shape: 'circle',
                    color: {
                        background: '#1e293b',
                        border: '#0f172a'
                    },
                    font: {
                        color: 'white',
                        bold: true,
                        size: 12
                    },
                    margin: 15
                },
                {
                    id: 'P',
                    label: 'Pasar\n(Transit)',
                    x: 0,
                    y: -80,
                    fixed: true,
                    shape: 'circle',
                    color: {
                        background: '#f8fafc',
                        border: '#cbd5e1'
                    },
                    font: {
                        color: '#64748b',
                        bold: true,
                        size: 11
                    },
                    margin: 12
                },
                {
                    id: 'K',
                    label: 'Kampus\n(Tujuan)',
                    x: 140,
                    y: 30,
                    fixed: true,
                    shape: 'circle',
                    color: {
                        background: '#1e293b',
                        border: '#0f172a'
                    },
                    font: {
                        color: 'white',
                        bold: true,
                        size: 12
                    },
                    margin: 15
                },
                // Dummy node pengunci kamera
                {
                    id: 'd_bot',
                    x: 0,
                    y: 100,
                    fixed: true,
                    hidden: true
                },
                {
                    id: 'd_top',
                    x: 0,
                    y: -130,
                    fixed: true,
                    hidden: true
                }
            ]);

            // Default: Jalur lama 15 KM (Bawah)
            window.relaxGame43.edges = new vis.DataSet([{
                    id: 'R_K',
                    from: 'R',
                    to: 'K',
                    label: '15 KM\n(Catatan Lama)',
                    font: {
                        align: 'bottom',
                        size: 13,
                        color: '#ef4444',
                        bold: true,
                        strokeWidth: 3,
                        strokeColor: '#ffffff'
                    },
                    width: 4,
                    color: '#ef4444',
                    smooth: false
                },
                {
                    id: 'R_P',
                    from: 'R',
                    to: 'P',
                    label: '8 KM',
                    font: {
                        align: 'top',
                        size: 12,
                        color: '#94a3b8',
                        strokeWidth: 3,
                        strokeColor: '#ffffff',
                        bold: true
                    },
                    width: 2,
                    color: '#cbd5e1',
                    smooth: false
                },
                {
                    id: 'P_K',
                    from: 'P',
                    to: 'K',
                    label: '4 KM',
                    font: {
                        align: 'top',
                        size: 12,
                        color: '#94a3b8',
                        strokeWidth: 3,
                        strokeColor: '#ffffff',
                        bold: true
                    },
                    width: 2,
                    color: '#cbd5e1',
                    smooth: false
                }
            ]);

            const options = {
                physics: false,
                interaction: {
                    dragNodes: false,
                    dragView: false,
                    zoomView: false,
                    hover: true,
                    selectable: true
                }
            };

            window.relaxGame43.net = new vis.Network(container, {
                nodes: window.relaxGame43.nodes,
                edges: window.relaxGame43.edges
            }, options);
            window.relaxGame43.net.once('afterDrawing', () => window.relaxGame43.net.fit({
                animation: false
            }));

            // Logika Klik (Kuis Interaktif)
            const feedbackEl = document.getElementById('relax-feedback-43');
            const conclusionEl = document.getElementById('misi-conclusion-43');

            window.relaxGame43.net.on("click", function(params) {
                if (params.edges.length > 0) {
                    const edgeId = params.edges[0];

                    if (edgeId === 'R_K') {
                        // Salah
                        window.relaxGame43.edges.update({
                            id: 'R_K',
                            color: '#ef4444',
                            width: 5
                        });
                        window.relaxGame43.edges.update([{
                            id: 'R_P',
                            color: '#cbd5e1',
                            width: 3
                        }, {
                            id: 'P_K',
                            color: '#cbd5e1',
                            width: 3
                        }]);
                        window.relaxGame43.nodes.update({
                            id: 'P',
                            color: {
                                background: '#f8fafc',
                                border: '#cbd5e1'
                            },
                            font: {
                                color: '#64748b'
                            }
                        });
                        window.relaxGame43.clickedSet.clear();
                        if (conclusionEl) conclusionEl.classList.add('hidden');

                        feedbackEl.className =
                            "absolute bottom-3 inset-x-3 bg-red-50 border border-red-300 rounded-lg p-3 text-center text-xs font-bold text-red-600 shadow-md transition-colors z-20";
                        feedbackEl.innerHTML =
                            "❌ Salah! Jalur lurus 15 KM lebih besar dari 12 KM. Algoritma akan MEMBUANG jalur ini.";
                    } else if (edgeId === 'R_P' || edgeId === 'P_K') {
                        // Benar 
                        window.relaxGame43.clickedSet.add(edgeId);
                        window.relaxGame43.edges.update({
                            id: 'R_K',
                            color: '#e2e8f0',
                            width: 2,
                            font: {
                                color: '#cbd5e1'
                            }
                        });
                        window.relaxGame43.nodes.update({
                            id: 'P',
                            color: {
                                background: '#dcfce7',
                                border: '#22c55e'
                            },
                            font: {
                                color: '#166534'
                            }
                        });
                        window.relaxGame43.edges.update([{
                            id: edgeId,
                            color: '#22c55e',
                            width: 5,
                            font: {
                                color: '#15803d'
                            }
                        }]);

                        if (window.relaxGame43.clickedSet.has('R_P') && window.relaxGame43.clickedSet.has('P_K')) {
                            feedbackEl.className =
                                "absolute bottom-3 inset-x-3 bg-green-50 border border-green-300 rounded-lg p-3 text-center text-xs font-bold text-green-700 shadow-md transition-colors z-20";
                            feedbackEl.innerHTML =
                                "✅ TEPAT SEKALI! Catatan 15 KM dihapus dan memori diperbarui menjadi rute 12 KM.";
                            if (conclusionEl) conclusionEl.classList.remove('hidden');
                        } else {
                            feedbackEl.className =
                                "absolute bottom-3 inset-x-3 bg-blue-50 border border-blue-300 rounded-lg p-3 text-center text-xs font-bold text-blue-700 shadow-md transition-colors z-20";
                            feedbackEl.innerHTML =
                                "Bagus! Silakan klik satu jalur hijau lagi untuk melengkapi rute memutar.";
                        }
                    }
                }
            });
        }

        // --- 2. FUNGSI AUTO RESIZE EDITOR ---
        window.autoResizeEditor = function(el) {
            if (!el) return;
            el.style.height = 'auto';
            if (el.scrollHeight > 0) {
                el.style.height = el.scrollHeight + 'px';
            } else {
                const lineCount = (el.value.match(/\n/g) || []).length + 1;
                el.style.height = (lineCount * 22 + 40) + 'px';
            }
        };

        function cleanCodeStr(str) {
            return str.replace(/\s+/g, '').replace(/'/g, '"');
        }

        // --- 3. PYODIDE GLOBAL LOADER ---
        window.pyodideReadyPromise = null;
        window.ensurePyodideReady = async function() {
            if (window.pyodide) return window.pyodide;
            if (!window.pyodideReadyPromise) {
                window.pyodideReadyPromise = new Promise((resolve, reject) => {
                    if (window.loadPyodide) {
                        window.loadPyodide({
                                indexURL: 'https://cdn.jsdelivr.net/pyodide/v0.24.1/full/'
                            })
                            .then(resolve).catch(reject);
                    } else {
                        const script = document.createElement('script');
                        script.src = 'https://cdn.jsdelivr.net/pyodide/v0.24.1/full/pyodide.js';
                        script.onload = () => {
                            window.loadPyodide({
                                    indexURL: 'https://cdn.jsdelivr.net/pyodide/v0.24.1/full/'
                                })
                                .then(resolve).catch(reject);
                        };
                        script.onerror = () => reject(new Error("Gagal memuat Pyodide script."));
                        document.head.appendChild(script);
                    }
                });
            }
            window.pyodide = await window.pyodideReadyPromise;
            return window.pyodide;
        };

        // --- 4. INIT & PERSISTENCE ---
        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(initGraphRelax43, 300);

            const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";

            // Cek Status Sandbox Demo
            if (localStorage.getItem('materi4_3_demo_' + userId) === 'true') {
                const edDemo = document.getElementById('editor-demo43');
                const outDemoText = document.getElementById('output-demo43');
                const statusDemo = document.getElementById('status-demo43');
                const btnDemo = document.getElementById('btn-demo43');

                if (edDemo && outDemoText && statusDemo && btnDemo) {
                    edDemo.value = localStorage.getItem('materi4_3_demo_code_' + userId) || "";
                    window.autoResizeEditor(edDemo);

                    outDemoText.innerHTML = `
                        <div class="mb-1 text-slate-400">&gt; python main.py</div>
                        <div class="text-[#4af626]">Rute baru lebih cepat! Jarak diupdate menjadi: 12</div>
                    `;
                    outDemoText.classList.remove('italic', 'opacity-60');

                    statusDemo.innerText = "Success";
                    statusDemo.className = "bg-green-700 text-white px-2 py-0.5 rounded text-[10px]";

                    btnDemo.innerHTML = 'Program Berhasil';
                    btnDemo.classList.replace('bg-blue-600', 'bg-emerald-600');
                    btnDemo.classList.replace('hover:bg-blue-500', 'hover:bg-emerald-500');

                    unlockSection43(true);
                }
            }

            // Cek Status Aktivitas
            const isDoneServer = {{ isset($progress['4.3']) && $progress['4.3']->score == 100 ? 'true' : 'false' }};
            const savedInput1 = localStorage.getItem('act_4_3_ans1_' + userId) || "<";

            if (isDoneServer || localStorage.getItem('act_4_3_done_' + userId) === 'true') {
                window.kunciJawabanAktivitas43(savedInput1);
            }
        });

        // --- 5. VALIDATOR SANDBOX DEMO KODE ---
        window.runDemoBox43 = async function() {
            const code = document.getElementById('editor-demo43').value;
            const outText = document.getElementById('output-demo43');
            const statusTerm = document.getElementById('status-demo43');
            const btnRun = document.getElementById('btn-demo43');

            if (!outText || !statusTerm || !btnRun) return;

            outText.classList.remove('italic', 'opacity-60');
            window.autoResizeEditor(document.getElementById('editor-demo43'));

            if (code.trim() === "") {
                outText.innerHTML =
                    '<span class="text-[#ff5f56]">SyntaxError: Editor kosong. Ketikkan contoh kode di atas.</span>';
                return;
            }

            btnRun.innerHTML = 'Memproses...';
            btnRun.disabled = true;
            statusTerm.innerText = "Running...";
            statusTerm.className = "bg-yellow-600 text-white px-2 py-0.5 rounded text-[10px] animate-pulse";

            try {
                const py = await window.ensurePyodideReady();
                py.runPython(`import sys\nfrom io import StringIO\nsys.stdout = StringIO()`);
                py.runPython(code);
                let stdout = py.runPython('sys.stdout.getvalue()');
                stdout = stdout.trim();

                const clean = cleanCodeStr(code.replace(/#.*/g, ''));
                const hasIf = clean.includes("ifjarak_rute_baru<jarak_ke_kampus:");
                const hasAssign = clean.includes("jarak_ke_kampus=jarak_rute_baru");
                const hasPrint = stdout.includes("12");

                if (hasIf && hasAssign && hasPrint) {
                    outText.innerHTML = `
                        <div class="mb-1 text-slate-400">&gt; python main.py</div>
                        <div class="text-[#4af626]">${stdout.replace(/\n/g, '<br>')}</div>
                    `;

                    statusTerm.innerText = "Success";
                    statusTerm.className = "bg-green-700 text-white px-2 py-0.5 rounded text-[10px]";

                    btnRun.innerHTML = 'Program Berhasil';
                    btnRun.classList.replace('bg-blue-600', 'bg-emerald-600');
                    btnRun.classList.replace('hover:bg-blue-500', 'hover:bg-emerald-500');

                    const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                    localStorage.setItem('materi4_3_demo_' + userId, 'true');
                    localStorage.setItem('materi4_3_demo_code_' + userId, code);

                    unlockSection43(false);
                } else {
                    outText.innerHTML = `
                        <div class="mb-1 text-slate-400">&gt; python main.py</div>
                        <div class="text-[#ffbd2e]">${stdout.replace(/\n/g, '<br>')} <br><br>> Validasi Gagal: Pastikan Anda mengetik logika if (<) dan memperbarui variabel sesuai contoh.</div>
                    `;
                    statusTerm.innerText = "Logic Error";
                    statusTerm.className = "bg-amber-600 text-white px-2 py-0.5 rounded text-[10px]";
                }
            } catch (err) {
                outText.innerHTML =
                    `<span class="text-[#ff5f56]">Traceback (most recent call last):<br>${err.message}</span>`;
                statusTerm.innerText = "Error";
                statusTerm.className = "bg-red-800 text-red-200 px-2 py-0.5 rounded text-[10px]";
            } finally {
                if (btnRun.innerHTML.includes('Memproses')) {
                    btnRun.innerHTML = 'Coba Lagi';
                    btnRun.disabled = false;
                }
            }
        };

        function unlockSection43(isInstant = false) {
            const section = document.getElementById('locked-section-43');
            const overlay = document.getElementById('lock-overlay-43');
            const btnAct = document.getElementById('btnRunAct43');
            const in1 = document.getElementById('input43_1');

            if (!section || !overlay) return;

            section.classList.remove('locked-content');
            section.classList.add('unlocked-content');

            if (isInstant) {
                overlay.style.display = 'none';
            } else {
                overlay.classList.add('opacity-0');
                setTimeout(() => {
                    overlay.classList.add('hidden');
                }, 500);
                setTimeout(() => {
                    const explanationBox = document.getElementById('explanation-box-43');
                    if (explanationBox) {
                        explanationBox.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                    }
                }, 600);
            }

            if (btnAct) btnAct.disabled = false;
            if (in1) in1.disabled = false;
        }

        // --- 6. VALIDATOR AKTIVITAS 4.3 ---
        window.runAktivitas43 = async function() {
            const in1 = document.getElementById('input43_1').value.trim();
            const alertBox = document.getElementById('alert-43');
            const consoleText = document.getElementById('console-text-43');
            const statusTerm = document.getElementById('status-act43');
            const btnRun = document.getElementById('btnRunAct43');

            if (!consoleText || !alertBox || !statusTerm || !btnRun) return;

            consoleText.classList.remove('italic', 'opacity-60');

            if (in1 === "") {
                alertBox.className =
                    "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-yellow-50 text-yellow-800 border-yellow-200 text-left";
                alertBox.innerHTML = "⚠️ Error: Kotak input operator masih kosong.";
                alertBox.classList.remove('hidden');
                consoleText.innerHTML = "SyntaxError: invalid syntax";
                consoleText.className =
                    "text-[#ff5f56] whitespace-pre-wrap break-words leading-relaxed text-sm text-left block";
                return;
            }

            btnRun.innerHTML = 'Memproses...';
            btnRun.disabled = true;

            try {
                const py = await window.ensurePyodideReady();
                py.runPython(`import sys\nfrom io import StringIO\nsys.stdout = StringIO()`);

                const pythonCode = `
jarak_lama = 50
jarak_baru = 15 + 20
if jarak_baru ${in1} jarak_lama:
    jarak_lama = jarak_baru
    print("Update jarak menjadi:", jarak_lama)
    print("Proses Relaxation Berhasil!")
else:
    print("Rute baru tidak lebih cepat.")
`;

                py.runPython(pythonCode);
                let stdout = py.runPython('sys.stdout.getvalue()');
                stdout = stdout.trim();

                if (in1 === "<" && stdout.includes("35")) {
                    const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                    localStorage.setItem('act_4_3_done_' + userId, 'true');
                    localStorage.setItem('act_4_3_ans1_' + userId, in1);

                    alertBox.className =
                        "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-green-50 text-green-800 border-green-400 text-left";
                    alertBox.innerHTML =
                        "✅ Tepat Sekali! Anda menggunakan operator <code><</code> (lebih kecil dari) untuk mengecek apakah rute baru (35) lebih cepat dari rute lama (50).";
                    alertBox.classList.remove('hidden');

                    statusTerm.innerText = "Success";
                    statusTerm.className = "bg-green-700 text-white px-2 py-0.5 rounded text-[10px]";

                    consoleText.className =
                        "text-[#4af626] whitespace-pre-wrap break-words leading-relaxed text-sm text-left block";
                    consoleText.innerHTML = `
                        <div class="mb-1 text-slate-400">&gt; python main.py</div>
                        <div>${stdout.replace(/\n/g, '<br>')}</div>
                    `;

                    window.kunciJawabanAktivitas43(in1);

                    // ========================================================
                    // DIRECT FETCH: TEMBAK LANGSUNG KE CONTROLLER (ANTI GAGAL)
                    // ========================================================
                    fetch("{{ route('submit.score') }}", { // Pastikan nama route ini benar di web.php Anda
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            },
                            body: JSON.stringify({
                                chapter: "bab4",
                                section: "4.3",
                                score: 100,
                                answer: "Berhasil Live Coding 4.3"
                            })
                        })
                        .then(async response => {
                            const data = await response.json();
                            if (!response.ok) throw new Error(data.message || 'Server menolak data');
                            console.log("🔥 BOOM! Nilai 4.3 sukses masuk DB:", data);
                        })
                        .catch(error => {
                            console.error("❌ GAGAL SIMPAN KE DB:", error);
                            alert(
                                "Gagal menyimpan progress ke server. Buka F12 -> Console untuk melihat errornya!");
                        });

                } else {
                    statusTerm.innerText = "Logic Error";
                    statusTerm.className = "bg-amber-600 text-white px-2 py-0.5 rounded text-[10px]";

                    consoleText.className =
                        "text-[#ffbd2e] whitespace-pre-wrap break-words leading-relaxed text-sm text-left block";
                    consoleText.innerHTML = `
                        <div class="mb-1 text-slate-400">&gt; python main.py</div>
                        <div>${stdout.replace(/\n/g, '<br>')}</div>
                    `;

                    alertBox.className =
                        "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-amber-50 text-amber-800 border-amber-300 animate-pulse text-left";
                    alertBox.innerHTML =
                        "❌ Logika Salah: Ingat, Dijkstra mencari nilai yang paling KECIL. Gunakan operator 'Lebih Kecil Dari'.";
                    alertBox.classList.remove('hidden');
                }

            } catch (err) {
                consoleText.className =
                    "text-[#ff5f56] whitespace-pre-wrap break-words leading-relaxed text-sm text-left block";
                consoleText.innerHTML = "Traceback (most recent call last):<br>" + err.message;
                statusTerm.innerText = "Syntax Error";
                statusTerm.className = "bg-red-800 text-red-200 px-2 py-0.5 rounded text-[10px]";

                alertBox.className =
                    "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-red-50 text-red-800 border-red-300 animate-pulse text-left";
                alertBox.innerHTML =
                    "❌ Syntax Error: Pastikan hanya mengisi dengan simbol matematika (contoh: > atau < atau ==).";
                alertBox.classList.remove('hidden');
            } finally {
                if (btnRun.innerHTML.includes('Memproses')) {
                    btnRun.innerHTML = 'Jalankan & Periksa';
                    btnRun.disabled = false;
                }
            }
        }

        window.kunciJawabanAktivitas43 = function(val1) {
            const in1 = document.getElementById('input43_1');

            if (in1) {
                in1.value = val1 || "<";
                in1.disabled = true;
                in1.classList.replace('text-[#dcdcaa]', 'text-[#4af626]');
                in1.classList.add('bg-green-900/30', 'border-green-500', 'cursor-not-allowed');
            }

            const btnRun = document.getElementById('btnRunAct43');
            if (btnRun) {
                btnRun.innerHTML = 'Diselesaikan';
                btnRun.classList.replace('bg-yellow-600', 'bg-slate-600');
                btnRun.classList.replace('hover:bg-yellow-500', 'cursor-not-allowed');
                btnRun.disabled = true;
            }

            const consoleText = document.getElementById('console-text-43');
            if (consoleText && consoleText.innerHTML.includes('Output terminal')) {
                consoleText.classList.remove('italic', 'opacity-60');
                consoleText.className =
                    "text-[#4af626] whitespace-pre-wrap break-words leading-relaxed text-sm text-left block";
                consoleText.innerHTML = `
                    <div class="mb-1 text-slate-400">&gt; python main.py</div>
                    <div>Update jarak menjadi: 35<br>Proses Relaxation Berhasil!</div>
                 `;
            }

            const badgeAct = document.getElementById('badge-act43');
            if (badgeAct) badgeAct.classList.remove('hidden');

            const btnNext = document.getElementById('btnNext43');
            if (btnNext) {
                btnNext.disabled = false;
                btnNext.classList.remove('opacity-50', 'cursor-not-allowed', 'bg-slate-900');
                btnNext.classList.add('bg-blue-600', 'hover:bg-blue-700');
            }
        }
    </script>
</section>
