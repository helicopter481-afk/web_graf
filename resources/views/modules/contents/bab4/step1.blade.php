<section id="step-1" class="step-slide step-active">
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
            <h2 class="text-2xl md:text-3xl font-bold text-slate-900 mb-2">4.1 Modifikasi Memori: <span class="text-blue-600 italic font-mono">Nested Dictionary</span></h2>
            <p class="text-slate-500 font-medium">Menyimpan graf berbobot (Weighted Graph) ke dalam memori komputer.</p>
        </div>

        {{-- KONTEN TEORI & VISUALISASI INTERAKTIF --}}
        <div class="grid md:grid-cols-12 gap-8 mb-10 items-start">
            
            {{-- Kolom Kiri: Teori & Instruksi Misi --}}
            <div class="md:col-span-7 prose prose-slate text-slate-700 leading-relaxed text-justify max-w-none flex flex-col h-full">
                <p class="mb-3">
                    Pada Materi 2, kita menyimpan Graf Tak Berbobot menggunakan <em>Dictionary</em> biasa, di mana <em>Value</em>-nya berupa <em>List</em> (contoh: <code>"Pasar": ["Kampus"]</code>).
                </p>
                <p>
                    Namun, untuk Graf Berbobot (<em>Weighted Graph</em>), kita harus menyimpan nama lokasi sekaligus <strong>angka bobotnya</strong> (jarak/waktu). Oleh karena itu, kita memutakhirkan struktur datanya menjadi <strong>Nested Dictionary (Dictionary Bersarang)</strong>, yaitu sebuah <em>Dictionary</em> di dalam <em>Dictionary</em>.
                </p>
                
                {{-- Box Misi Interaktif --}}
                <div class="mt-6 bg-amber-50 border-l-4 border-amber-500 p-5 rounded-r-lg shadow-sm flex-1">
                    <h4 class="text-sm font-bold text-amber-900 mb-2 flex items-center gap-2">
                        <i class="fa-solid fa-bullseye"></i> Misi Visual Interaktif!
                    </h4>
                    <p class="text-sm text-amber-800 font-medium m-0 leading-relaxed">
                        Perhatikan graf di samping. Angka merah pada garis adalah <strong>jarak tempuh (KM)</strong>.<br><br>
                        <strong>Tugas Anda:</strong> Gunakan mouse Anda untuk mengklik garis (rute) yang menurut Anda akan menghasilkan <strong>total jarak terpendek</strong> dari titik <strong>Kayutangi</strong> ke titik <strong>Duta Mall</strong>.
                    </p>
                </div>
            </div>

            {{-- Kolom Kanan: Visualisasi Graf Berbobot (INTERAKTIF KLIK) --}}
            <div class="md:col-span-5 bg-slate-50 border-2 border-slate-200 rounded-xl overflow-hidden shadow-inner h-[350px] relative flex flex-col items-center">
                <div class="bg-slate-200/80 py-2 px-4 border-b border-slate-300 flex justify-between items-center z-20 absolute top-0 w-full backdrop-blur-sm pointer-events-none">
                    <span class="text-xs font-bold text-slate-700 uppercase tracking-widest">Uji Coba Rute (Klik Garis)</span>
                    <i class="fa-solid fa-hand-pointer text-slate-500"></i>
                </div>
                
                {{-- Container Vis.js --}}
                <div id="interactive-graph-vis" class="w-full h-full mt-6 focus:outline-none"></div>

                {{-- Status Bar Hasil Klik --}}
                <div id="graph-feedback" class="absolute bottom-3 inset-x-3 bg-white border border-slate-300 rounded-lg p-2.5 text-center text-xs font-bold text-slate-500 shadow-md transition-colors z-20">
                    Menunggu Anda memilih rute...
                </div>
            </div>
        </div>

        {{-- KESIMPULAN MISI (MUNCUL SETELAH BERHASIL KLIK GRAF) --}}
        <div id="misi-conclusion" class="hidden mb-10 bg-emerald-50 border border-emerald-200 p-6 rounded-xl shadow-sm transition-all duration-500">
            <h4 class="font-bold text-emerald-800 text-base mb-2 flex items-center gap-2">
                <i class="fa-solid fa-lightbulb text-emerald-600"></i> Makna dari Misi Ini
            </h4>
            <p class="text-sm text-emerald-800 leading-relaxed text-justify">
                Anda baru saja mempraktikkan inti pemikiran dari <strong>Algoritma Dijkstra</strong>! Jika menggunakan logika BFS biasa, komputer akan memilih jalur lurus yang berjarak 10 KM karena "jumlah ruas jalannya" paling sedikit (cuma 1 langkah). Namun, algoritma Dijkstra sangat cerdas; ia memperhitungkan total bobot. Ia menyadari bahwa memutar melewati rute Siring (5 KM + 2 KM = 7 KM) <strong>jauh lebih dekat</strong> daripada lewat jalur lurus (10 KM).
            </p>
        </div>

        {{-- CONTOH KODE PROGRAM (ANTI-COPY) --}}
        <div class="mb-10">
            <h3 class="text-lg font-bold text-slate-800 mb-4 flex items-center gap-2 text-left">
                <i class="fa-solid fa-laptop-code text-slate-500"></i> Implementasi ke dalam Kode Python
            </h3>
            
            {{-- Tampilan Gambar Kode (Hanya Baca) --}}
            <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 select-none pointer-events-none mb-6 anti-copas text-left">
                <div class="bg-[#2d2d2d] px-4 py-2.5 flex items-center gap-2 border-b border-slate-700">
                    <div class="flex gap-1.5">
                        <div class="w-3 h-3 rounded-full bg-[#ff5f56]"></div>
                        <div class="w-3 h-3 rounded-full bg-[#ffbd2e]"></div>
                        <div class="w-3 h-3 rounded-full bg-[#27c93f]"></div>
                    </div>
                    <span class="text-slate-400 text-xs ml-2 font-mono">Contoh Kode dari Modul (Hanya Baca)</span>
                </div>
                <div class="p-6 font-mono text-sm leading-loose overflow-x-auto text-[#d4d4d4]">
<span class="text-[#6a9955]"># Merepresentasikan Graf Berbobot dengan Nested Dictionary</span>
<div class="mt-1"><span class="text-[#9cdcfe]">graf_rute</span> = {</div>
<div class="ml-4"><span class="text-[#ce9178]">"Kayutangi"</span>: {<span class="text-[#ce9178]">"Siring"</span>: <span class="text-[#b5cea8]">5</span>, <span class="text-[#ce9178]">"Duta Mall"</span>: <span class="text-[#b5cea8]">10</span>},</div>
<div class="ml-4"><span class="text-[#ce9178]">"Siring"</span>: {<span class="text-[#ce9178]">"Kayutangi"</span>: <span class="text-[#b5cea8]">5</span>, <span class="text-[#ce9178]">"Duta Mall"</span>: <span class="text-[#b5cea8]">2</span>},</div>
<div class="ml-4"><span class="text-[#ce9178]">"Duta Mall"</span>: {<span class="text-[#ce9178]">"Siring"</span>: <span class="text-[#b5cea8]">2</span>, <span class="text-[#ce9178]">"Kayutangi"</span>: <span class="text-[#b5cea8]">10</span>}</div>
<div>}</div>
<br>
<span class="text-[#6a9955]"># Mengakses jarak spesifik dari Kayutangi ke Siring:</span>
<div class="mt-1 mb-2"><span class="text-[#9cdcfe]">jarak</span> = graf_rute[<span class="text-[#ce9178]">"Kayutangi"</span>][<span class="text-[#ce9178]">"Siring"</span>]</div>
<div><span class="text-[#dcdcaa]">print</span>(<span class="text-[#ce9178]">"Jarak tempuh:"</span>, jarak, <span class="text-[#ce9178]">"KM"</span>)</div>
                </div>
            </div>

            {{-- PENJELASAN KODE PROGRAM --}}
            <div class="p-6 border border-slate-200 rounded-xl bg-slate-50 shadow-sm text-left">
                <h4 class="font-bold text-slate-800 text-sm mb-3">Penjelasan Kode:</h4>
                <ul class="list-disc list-outside ml-5 text-sm text-slate-700 space-y-2 leading-relaxed text-justify">
                    <li><code>graf_rute</code> adalah memori peta yang disimpan dalam bentuk <em>nested dictionary</em> (dictionary di dalam dictionary).</li>
                    <li>Setiap <em>key</em> utama (kolom paling kiri) menunjukkan <strong>lokasi asal</strong>.</li>
                    <li>Isi di dalamnya (seperti <code>{"Siring": 5}</code>) berisi <strong>lokasi tujuan</strong> beserta <strong>bobot jaraknya</strong> (dalam KM).</li>
                    <li>Sintaks <code>graf_rute["Kayutangi"]["Siring"]</code> digunakan untuk mengekstrak/menarik angka jarak tersebut secara lurus dan presisi dari dalam memori.</li>
                </ul>
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- INTERACTIVE SANDBOX: KETIK ULANG KODE --}}
        {{-- ========================================== --}}
        <div class="mb-10 bg-blue-50/30 border-2 border-blue-200 p-6 rounded-xl shadow-sm text-left">
            <h3 class="text-lg font-bold text-slate-800 mb-2">Buktikan Pemahaman Anda!</h3>
            <p class="text-sm text-slate-600 mb-4">
                Ketik ulang keseluruhan kode contoh di atas ke dalam editor di bawah ini (baris komentar warna hijau tidak wajib diketik). Buktikan bahwa kodenya bisa berjalan tanpa error, dan <strong>buka kunci</strong> penjelasan output serta Aktivitas 4.1!
            </p>

            <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 font-mono text-sm flex flex-col">
                <div class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700 shrink-0">
                    <span class="text-slate-400 text-xs">Terminal Editor Pyodide</span>
                    <button onclick="window.runDemoBox41()" id="btn-demo41" class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors shadow-sm active:scale-95">
                        <i class="fa-solid fa-play mr-1"></i> Jalankan Kode
                    </button>
                </div>
                
                <textarea id="editor-demo41" class="w-full min-h-[160px] bg-[#1e1e1e] text-[#d4d4d4] px-5 pt-5 pb-2 font-mono text-sm outline-none resize-none leading-relaxed overflow-hidden text-left" spellcheck="false" placeholder="# Ketik ulang kode Python di sini..." oninput="window.autoResizeEditor(this)"></textarea>

                {{-- WADAH OUTPUT (RATA KIRI & RAPI) --}}
                <div class="px-5 pb-5 pt-2 bg-[#1e1e1e] text-left w-full">
                    <hr class="border-slate-700 mb-4">
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-slate-500 text-[10px] font-bold tracking-widest uppercase">OUTPUT TERMINAL</span>
                        <span id="status-demo41" class="bg-slate-800 text-slate-400 px-2 py-0.5 rounded text-[10px]">Ready</span>
                    </div>
                    {{-- Block khusus untuk text output agar tidak bergeser --}}
                    <div id="output-demo41" class="block text-left text-[#4af626] whitespace-pre-wrap break-words min-h-[20px] italic opacity-60 m-0 p-0">(Output terminal akan tampil di sini setelah dijalankan)</div>
                </div>
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- KONTEN TERKUNCI (OUTPUT + AKTIVITAS 4.1) --}}
        {{-- ========================================== --}}
        <div id="locked-section-41" class="relative locked-content unlock-transition pb-6 text-left">
            
            {{-- Overlay Gembok --}}
            <div id="lock-overlay-41" class="absolute inset-0 z-30 flex flex-col items-center justify-center bg-white/50 backdrop-blur-[3px] rounded-xl transition-opacity duration-500">
                <div class="bg-white p-5 rounded-2xl shadow-xl flex flex-col items-center border border-slate-200 animate-bounce">
                    <i class="fa-solid fa-lock text-4xl text-slate-400 mb-3"></i>
                    <p class="text-sm font-bold text-slate-600 text-center">Konten Terkunci</p>
                    <p class="text-xs text-slate-500 text-center mt-1">Ketik dan jalankan kode di atas<br>dengan benar untuk membuka.</p>
                </div>
            </div>

            {{-- Penjelasan Output Program --}}
            <div id="explanation-box-41" class="mb-10 p-6 border border-slate-200 rounded-xl bg-white shadow-sm scroll-mt-24">
                <h4 class="font-bold text-slate-800 text-base mb-3">Penjelasan Output Program:</h4>
                <div class="bg-black text-[#4af626] text-left font-mono text-sm p-4 rounded-md shadow-inner mb-4 inline-block block w-fit">
                    Jarak tempuh: 5 KM
                </div>
                <p class="text-sm text-slate-700 text-justify leading-relaxed">
                    Output di atas menunjukkan bahwa program berhasil mengekstrak data jarak dari Kayutangi ke Siring yang bernilai 5 kilometer. Angka 5 ditarik langsung dari dalam graf <em>nested dictionary</em>, kemudian ditampilkan ke layar menggunakan perintah <code>print()</code> yang digabungkan dengan keterangan string tambahan agar hasilnya mudah dipahami oleh pengguna.
                </p>
            </div>

            {{-- AKTIVITAS 4.1: FILL IN THE BLANKS --}}
            <div id="activity-41-container" class="border-2 border-slate-200 rounded-xl overflow-hidden shadow-sm">
                <div class="bg-yellow-50 px-6 py-4 border-b border-yellow-200 flex justify-between items-center">
                    <h3 class="font-bold text-yellow-800 text-lg flex items-center gap-2">
                        <i class="fa-solid fa-lightbulb text-yellow-600"></i> Aktivitas 4.1 – Live Coding: Ekstraksi Bobot
                    </h3>
                    <span id="badge-act41" class="hidden bg-green-500 text-white px-3 py-1 rounded text-xs font-bold shadow-sm flex items-center gap-1"><i class="fa-solid fa-check"></i> Selesai</span>
                </div>
                <div class="p-6 bg-white">
                    <p class="text-sm text-slate-700 leading-relaxed text-justify mb-3">
                        <strong>Skenario:</strong> Anda adalah <em>programmer</em> di perusahaan ojek <em>online</em> yang mengelola data tarif antarkota.<br>
                    </p>
                    <div class="bg-white/80 p-4 rounded border border-blue-200 font-medium text-blue-900 text-sm shadow-sm leading-relaxed mb-6">
                        <strong>Tugas Anda:</strong> Lengkapi sintaks pemanggilan <em>Nested Dictionary</em> di dalam kotak editor ini agar sistem dapat mem-print (mencetak) tarif perjalanan dari asal <strong>"Pelabuhan"</strong> menuju tujuan <strong>"Bandara"</strong>.
                    </div>

                    <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 font-mono text-sm flex flex-col">
                        <div class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700">
                            <span class="text-slate-400 text-xs">Terminal Aktivitas (main.py)</span>
                            <button onclick="window.runAktivitas41()" id="btnRunAct41" class="bg-yellow-600 hover:bg-yellow-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors shadow-sm active:scale-95" disabled>
                                Jalankan & Periksa
                            </button>
                        </div>
                        
                        <div class="p-6 leading-relaxed text-[#d4d4d4] overflow-x-auto whitespace-nowrap text-left">
                            <div><span class="text-[#9cdcfe]">tarif_ojek</span> = {</div>
                            <div class="ml-4"><span class="text-[#ce9178]">"Stasiun"</span>: {<span class="text-[#ce9178]">"Pelabuhan"</span>: <span class="text-[#b5cea8]">15000</span>},</div>
                            <div class="ml-4"><span class="text-[#ce9178]">"Pelabuhan"</span>: {<span class="text-[#ce9178]">"Stasiun"</span>: <span class="text-[#b5cea8]">15000</span>, <span class="text-[#ce9178]">"Bandara"</span>: <span class="text-[#b5cea8]">35000</span>},</div>
                            <div class="ml-4"><span class="text-[#ce9178]">"Bandara"</span>: {<span class="text-[#ce9178]">"Pelabuhan"</span>: <span class="text-[#b5cea8]">35000</span>}</div>
                            <div>}</div>
                            <br>
                            <div class="text-[#6a9955]"># Ketikkan Kunci (Key) asal dan tujuan di dalam kurung siku. Ingat tanda petiknya!</div>
                            
                            <div class="flex items-center mt-1 text-left">
                                <span class="text-[#9cdcfe]">tarif_dicari</span> = <span class="text-[#9cdcfe]">tarif_ojek</span>[<input type="text" id="input41_1" class="bg-[#3c3c3c] text-[#ce9178] border border-slate-500 rounded px-2 py-0.5 mx-1 w-28 outline-none focus:border-blue-400 focus:bg-[#2d2d2d] text-center transition-colors shadow-inner" autocomplete="off" spellcheck="false" disabled>][<input type="text" id="input41_2" class="bg-[#3c3c3c] text-[#ce9178] border border-slate-500 rounded px-2 py-0.5 mx-1 w-24 outline-none focus:border-blue-400 focus:bg-[#2d2d2d] text-center transition-colors shadow-inner" autocomplete="off" spellcheck="false" disabled>]
                            </div>

                            <br>
                            <div><span class="text-[#dcdcaa]">print</span>(<span class="text-[#ce9178]">"Tarif yang harus dibayar: Rp"</span>, tarif_dicari)</div>
                            
                            {{-- WADAH OUTPUT (RATA KIRI & RAPI) --}}
                            <div class="mt-6 pt-4 border-t border-slate-700 text-left w-full">
                                <div class="flex justify-between items-center mb-3">
                                    <span class="text-slate-500 text-[10px] font-bold tracking-widest uppercase">OUTPUT TERMINAL</span>
                                    <span id="status-act41" class="bg-slate-800 text-slate-400 px-2 py-0.5 rounded text-[10px]">Ready</span>
                                </div>
                                <div id="console-text-41" class="block text-left text-[#4af626] whitespace-pre-wrap break-words leading-relaxed text-sm italic opacity-60 m-0 p-0">(Output terminal akan tampil di sini setelah dijalankan)</div>
                            </div>
                        </div>
                    </div>

                    <div id="alert-41" class="hidden mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border transition-all text-left"></div>

                    <div id="feedback-edukatif-41" class="hidden mt-4 bg-[#f0fdf4] border border-[#bbf7d0] p-6 rounded-xl shadow-sm text-left">
                        <h4 class="font-bold text-[#166534] mb-2 flex items-center gap-2"><i class="fa-solid fa-check-circle"></i> Kunci Jawaban Sistem:</h4>
                        <p class="text-sm text-[#166534] leading-relaxed">
                            Luar biasa! Untuk mengekstrak tarif dari Pelabuhan menuju Bandara, Anda memanggil kunci utama asal <code class="bg-[#dcfce7] px-2 py-0.5 rounded font-bold border border-[#bbf7d0]">"Pelabuhan"</code>, dilanjutkan dengan memanggil kunci sub-tujuan <code class="bg-[#dcfce7] px-2 py-0.5 rounded font-bold border border-[#bbf7d0]">"Bandara"</code>. Jangan lupa, tipe data string (teks) wajib selalu diapit tanda petik (<code>" "</code>).
                        </p>
                    </div>

                </div>
            </div>

            {{-- Navigasi Bawah --}}
            <div class="flex justify-between gap-4 mt-12 pt-6 border-t border-slate-200">
                <button type="button" onclick="prevStep()" class="px-6 py-2.5 rounded-lg border border-slate-300 font-bold text-slate-600 hover:bg-slate-50 transition shadow-sm active:scale-95">
                    Kembali
                </button>
                <button type="button" id="btnNext41" onclick="nextStep()" class="px-6 py-2.5 bg-slate-900 hover:bg-slate-800 text-white font-bold rounded-lg shadow-md transition-all active:scale-95 opacity-50 cursor-not-allowed" disabled>
                    Lanjut
                </button>
            </div>
        </div>

    </div>

    {{-- SCRIPT LOGIKA (ANTI BUG, PYODIDE SAFE, GRAPH FIXED) --}}
    <script>
        // --- 1. PYODIDE GLOBAL LOADER (SANGAT AMAN ANTI ERROR NULL) ---
        window.pyodideReadyPromise = null;
        window.ensurePyodideReady = async function() {
            if (window.pyodide) return window.pyodide;
            if (!window.pyodideReadyPromise) {
                window.pyodideReadyPromise = new Promise((resolve, reject) => {
                    if (window.loadPyodide) {
                        window.loadPyodide({ indexURL: 'https://cdn.jsdelivr.net/pyodide/v0.24.1/full/' })
                            .then(resolve).catch(reject);
                    } else {
                        const script = document.createElement('script');
                        script.src = 'https://cdn.jsdelivr.net/pyodide/v0.24.1/full/pyodide.js';
                        script.onload = () => {
                            window.loadPyodide({ indexURL: 'https://cdn.jsdelivr.net/pyodide/v0.24.1/full/' })
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

        // --- 2. VISUALISASI INTERAKTIF (MISI MENCARI RUTE TERPENDEK) ---
        let vNet = null;
        let vNodes = null;
        let vEdges = null;
        let clickedRouteCount = 0;
        let clickedEdgesSet = new Set();

        function initGraphMisi41() {
            const container = document.getElementById('interactive-graph-vis');
            if (!container) return;

            // Posisi absolut agar tidak goyang dan tidak bisa di zoom/drag
            vNodes = new vis.DataSet([
                { id: 'Kayutangi', label: 'Kayutangi\n(Awal)', x: -140, y: 30, fixed: true, shape: 'circle', color: { background: '#1e293b', border: '#0f172a' }, font: { color: 'white', bold: true, size: 12 }, margin: 15 },
                { id: 'Siring', label: 'Siring\n(Transit)', x: 0, y: -90, fixed: true, shape: 'circle', color: { background: '#f8fafc', border: '#cbd5e1' }, font: { color: '#64748b', bold: true, size: 11 }, margin: 12 },
                { id: 'Duta Mall', label: 'Duta Mall\n(Tujuan)', x: 140, y: 30, fixed: true, shape: 'circle', color: { background: '#1e293b', border: '#0f172a' }, font: { color: 'white', bold: true, size: 12 }, margin: 15 },
                // Dummy pengunci view agar grafik pas ditengah
                { id: 'd_top', x: 0, y: -130, fixed: true, hidden: true },
                { id: 'd_bot', x: 0, y: 70, fixed: true, hidden: true }
            ]);

            vEdges = new vis.DataSet([
                { id: 'K_D', from: 'Kayutangi', to: 'Duta Mall', label: '10 KM', font: { align: 'bottom', size: 15, color: '#ef4444', bold: true, strokeWidth: 3, strokeColor: '#ffffff' }, width: 3, color: '#cbd5e1', smooth: false },
                { id: 'K_S', from: 'Kayutangi', to: 'Siring', label: '5 KM', font: { align: 'top', size: 13, color: '#64748b', bold: true, strokeWidth: 3, strokeColor: '#ffffff' }, width: 3, color: '#cbd5e1', smooth: false },
                { id: 'S_D', from: 'Siring', to: 'Duta Mall', label: '2 KM', font: { align: 'top', size: 13, color: '#64748b', bold: true, strokeWidth: 3, strokeColor: '#ffffff' }, width: 3, color: '#cbd5e1', smooth: false }
            ]);

            const options = {
                physics: false,
                interaction: { 
                    dragNodes: false, dragView: false, zoomView: false, hover: true, selectable: true 
                }
            };

            vNet = new vis.Network(container, { nodes: vNodes, edges: vEdges }, options);
            vNet.once('afterDrawing', () => vNet.fit({ animation: false }));

            // Logika Evaluasi Klik Rute
            const feedbackEl = document.getElementById('graph-feedback');
            const conclusionEl = document.getElementById('misi-conclusion');
            
            vNet.on("click", function (params) {
                if (params.edges.length > 0) {
                    const edgeId = params.edges[0];
                    
                    if (edgeId === 'K_D') {
                        // Salah (Pilih jalur langsung 10 KM)
                        vEdges.update({ id: 'K_D', color: '#ef4444', width: 5 }); // Merah menyala
                        vEdges.update([{ id: 'K_S', color: '#cbd5e1', width: 3 }, { id: 'S_D', color: '#cbd5e1', width: 3 }]); 
                        vNodes.update({ id: 'Siring', color: { background: '#f8fafc', border: '#cbd5e1' }, font: { color: '#64748b'} });
                        clickedEdgesSet.clear();
                        if(conclusionEl) conclusionEl.classList.add('hidden');
                        
                        feedbackEl.className = "absolute bottom-3 inset-x-3 bg-red-50 border border-red-300 rounded-lg p-3 text-center text-xs font-bold text-red-600 shadow-md z-20";
                        feedbackEl.innerHTML = "❌ Kurang Tepat! Jalur lurus ini berjarak 10 KM. Coba cari kombinasi rute yang total jaraknya lebih kecil.";
                    } 
                    else if (edgeId === 'K_S' || edgeId === 'S_D') {
                        // Benar (Pilih jalur memutar)
                        clickedEdgesSet.add(edgeId);
                        vEdges.update({ id: edgeId, color: '#22c55e', width: 5, font: {color: '#15803d'} }); // Hijau menyala
                        vNodes.update({ id: 'Siring', color: { background: '#dcfce7', border: '#22c55e' }, font: { color: '#166534'} });
                        vEdges.update({ id: 'K_D', color: '#cbd5e1', width: 3 }); // Reset merah
                        
                        if (clickedEdgesSet.has('K_S') && clickedEdgesSet.has('S_D')) {
                            // Sukses penuh
                            feedbackEl.className = "absolute bottom-3 inset-x-3 bg-green-50 border border-green-300 rounded-lg p-3 text-center text-xs font-bold text-green-700 shadow-md z-20";
                            feedbackEl.innerHTML = "✅ TEPAT SEKALI! (5 KM + 2 KM = 7 KM). Total jaraknya lebih pendek!";
                            if(conclusionEl) conclusionEl.classList.remove('hidden'); 
                        } else {
                            feedbackEl.className = "absolute bottom-3 inset-x-3 bg-blue-50 border border-blue-300 rounded-lg p-3 text-center text-xs font-bold text-blue-700 shadow-md z-20";
                            feedbackEl.innerHTML = "Bagus! Silakan klik satu jalur lagi untuk melengkapi rute sampai ke Duta Mall.";
                        }
                    }
                }
            });
        }

        // --- 3. FUNGSI AUTO RESIZE EDITOR ---
        window.autoResizeEditor = function(el) {
            if(!el) return;
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

        // --- 4. INIT & PERSISTENCE ---
        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(initGraphMisi41, 300);

            const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
            
            // Cek Status Sandbox Demo (PERSISTENCE SAFE)
            if (localStorage.getItem('materi4_demo_' + userId) === 'true') {
                const edDemo = document.getElementById('editor-demo41');
                const outDemoText = document.getElementById('output-demo41');
                const statusDemo = document.getElementById('status-demo41');
                const btnDemo = document.getElementById('btn-demo41');
                
                if (edDemo && outDemoText && statusDemo && btnDemo) {
                    edDemo.value = localStorage.getItem('materi4_demo_code_' + userId) || "";
                    window.autoResizeEditor(edDemo);
                    
                    // Format Output Blok yang Rapi Rata Kiri
                    outDemoText.innerHTML = `
                        <div class="mb-1 text-slate-400">&gt; python main.py</div>
                        <div class="text-[#4af626]">Jarak tempuh: 5 KM</div>
                    `;
                    outDemoText.classList.remove('italic', 'opacity-60');
                    
                    statusDemo.innerText = "Success";
                    statusDemo.className = "bg-green-700 text-white px-2 py-0.5 rounded text-[10px]";

                    btnDemo.innerHTML = 'Program Berhasil';
                    btnDemo.classList.replace('bg-blue-600', 'bg-emerald-600');
                    btnDemo.classList.replace('hover:bg-blue-500', 'hover:bg-emerald-500');

                    unlockSection41(true); // Unlock instantly
                }
            }

            // Cek Status Aktivitas (PERSISTENCE SAFE)
            const isDoneServer = {{ isset($progress['4.1']) && $progress['4.1']->score == 100 ? 'true' : 'false' }};
            const savedInput1 = localStorage.getItem('act_4_1_ans1_' + userId) || '"Pelabuhan"';
            const savedInput2 = localStorage.getItem('act_4_1_ans2_' + userId) || '"Bandara"';

            if (isDoneServer || localStorage.getItem('act_4_1_done_' + userId) === 'true') {
                window.kunciJawabanAktivitas41(savedInput1, savedInput2);
            }
        });

        // --- 5. VALIDATOR SANDBOX DEMO KODE ---
        window.runDemoBox41 = async function() {
            const code = document.getElementById('editor-demo41').value;
            const outText = document.getElementById('output-demo41');
            const statusTerm = document.getElementById('status-demo41');
            const btnRun = document.getElementById('btn-demo41');
            
            if(!outText || !statusTerm || !btnRun) return;

            outText.classList.remove('italic', 'opacity-60');
            window.autoResizeEditor(document.getElementById('editor-demo41'));

            if (code.trim() === "") {
                outText.innerHTML = '<span class="text-[#ff5f56]">SyntaxError: Editor kosong. Ketikkan contoh kode di atas.</span>';
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
                stdout = stdout.trim(); // Menghilangkan spasi/enter berlebih di akhir
                
                const clean = cleanCodeStr(code.replace(/#.*/g, ''));
                const hasDict = clean.includes('graf_rute={"Kayutangi":{"Siring":5,"DutaMall":10},"Siring":{"Kayutangi":5,"DutaMall":2},"DutaMall":{"Siring":2,"Kayutangi":10}}');
                const hasExtract = clean.includes('jarak=graf_rute["Kayutangi"]["Siring"]');
                const hasPrint = stdout.includes("Jarak tempuh: 5");

                if (hasDict && hasExtract && hasPrint) {
                    // Format Output Blok yang Rapi Rata Kiri
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
                    localStorage.setItem('materi4_demo_' + userId, 'true');
                    localStorage.setItem('materi4_demo_code_' + userId, code);
                    
                    unlockSection41(false); // Buka kunci dengan efek transisi
                } else {
                    outText.innerHTML = `
                        <div class="mb-1 text-slate-400">&gt; python main.py</div>
                        <div class="text-[#ffbd2e]">${stdout.replace(/\n/g, '<br>')} <br><br>> Validasi Gagal: Pastikan Anda mengetik dictionary graf_rute dan print sesuai contoh di atas.</div>
                    `;
                    statusTerm.innerText = "Logic Error";
                    statusTerm.className = "bg-amber-600 text-white px-2 py-0.5 rounded text-[10px]";
                }
            } catch (err) {
                outText.innerHTML = `<span class="text-[#ff5f56]">Traceback (most recent call last):<br>${err.message}</span>`;
                statusTerm.innerText = "Error";
                statusTerm.className = "bg-red-800 text-red-200 px-2 py-0.5 rounded text-[10px]";
            } finally {
                if (btnRun.innerHTML.includes('Memproses')) {
                    btnRun.innerHTML = 'Coba Lagi';
                    btnRun.disabled = false;
                }
            }
        };

        function unlockSection41(isInstant = false) {
            const section = document.getElementById('locked-section-41');
            const overlay = document.getElementById('lock-overlay-41');
            const btnAct = document.getElementById('btnRunAct41');
            const in1 = document.getElementById('input41_1');
            const in2 = document.getElementById('input41_2');

            if(!section || !overlay) return;

            section.classList.remove('locked-content');
            section.classList.add('unlocked-content');
            
            if (isInstant) {
                overlay.style.display = 'none';
            } else {
                overlay.classList.add('opacity-0');
                setTimeout(() => { overlay.classList.add('hidden'); }, 500);
                
                // Perbaikan Auto-scroll agar pas ke tengah (center) dan tidak terpotong navbar
                setTimeout(() => { 
                    const explanationBox = document.getElementById('explanation-box-41');
                    if (explanationBox) {
                        explanationBox.scrollIntoView({ behavior: 'smooth', block: 'center' }); 
                    }
                }, 600);
            }

            if(btnAct) btnAct.disabled = false;
            if(in1) in1.disabled = false;
            if(in2) in2.disabled = false;
        }

        // --- 6. VALIDATOR AKTIVITAS 4.1 ---
        window.runAktivitas41 = async function() {
            const in1 = document.getElementById('input41_1').value.trim();
            const in2 = document.getElementById('input41_2').value.trim();
            const alertBox = document.getElementById('alert-41');
            const consoleText = document.getElementById('console-text-41');
            const statusTerm = document.getElementById('status-act41');
            const btnRun = document.getElementById('btnRunAct41');

            if(!consoleText || !alertBox || !statusTerm || !btnRun) return;

            consoleText.classList.remove('italic', 'opacity-60');

            if(in1 === "" || in2 === "") {
                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-yellow-50 text-yellow-800 border-yellow-200 text-left";
                alertBox.innerHTML = "⚠️ Error: Syntax Tidak Lengkap. Masih ada kotak input yang kosong.";
                alertBox.classList.remove('hidden');
                consoleText.innerHTML = "SyntaxError: Key cannot be empty.";
                consoleText.className = "text-[#ff5f56] whitespace-pre-wrap break-words leading-relaxed text-sm text-left block";
                return;
            }

            btnRun.innerHTML = 'Memproses...';
            btnRun.disabled = true;

            try {
                const py = await window.ensurePyodideReady();
                py.runPython(`import sys\nfrom io import StringIO\nsys.stdout = StringIO()`);
                
                // Construct logic untuk tes
                const pythonCode = `
tarif_ojek = {
    "Stasiun": {"Pelabuhan": 15000},
    "Pelabuhan": {"Stasiun": 15000, "Bandara": 35000},
    "Bandara": {"Pelabuhan": 35000}
}
try:
    tarif_dicari = tarif_ojek[${in1}][${in2}]
    print("Tarif yang harus dibayar: Rp", tarif_dicari)
except Exception as e:
    print("Error KeyError:", e)
`;
                
                py.runPython(pythonCode);
                let stdout = py.runPython('sys.stdout.getvalue()');
                stdout = stdout.trim();

                if(stdout.includes("35000") && !stdout.includes("Error")) {
                    const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                    localStorage.setItem('act_4_1_done_' + userId, 'true'); 
                    localStorage.setItem('act_4_1_ans1_' + userId, in1);
                    localStorage.setItem('act_4_1_ans2_' + userId, in2);

                    alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-green-50 text-green-800 border-green-400 text-left";
                    alertBox.innerHTML = "✅ Kompilasi Berhasil! Anda sukses mengekstrak tarif sebesar 35000.";
                    alertBox.classList.remove('hidden');

                    statusTerm.innerText = "Success";
                    statusTerm.className = "bg-green-700 text-white px-2 py-0.5 rounded text-[10px]";

                    consoleText.className = "text-[#4af626] whitespace-pre-wrap break-words leading-relaxed text-sm text-left block";
                    consoleText.innerHTML = `
                        <div class="mb-1 text-slate-400">&gt; python main.py</div>
                        <div>${stdout.replace(/\n/g, '<br>')}</div>
                    `;

                    window.kunciJawabanAktivitas41(in1, in2);

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
        section: "4.1",
        score: 100,
        answer: "Berhasil Live Coding 4.1"
    })
})
.then(async response => {
    const data = await response.json();
    if (!response.ok) throw new Error(data.message || 'Server menolak data');
    console.log("🔥 BOOM! Nilai 4.3 sukses masuk DB:", data);
})
.catch(error => {
    console.error("❌ GAGAL SIMPAN KE DB:", error);
    alert("Gagal menyimpan progress ke server. Buka F12 -> Console untuk melihat errornya!");
});

                } else {
                    statusTerm.innerText = "KeyError";
                    statusTerm.className = "bg-amber-600 text-white px-2 py-0.5 rounded text-[10px]";
                    
                    consoleText.className = "text-[#ff5f56] whitespace-pre-wrap break-words leading-relaxed text-sm text-left block";
                    consoleText.innerHTML = `
                        <div class="mb-1 text-slate-400">&gt; python main.py</div>
                        <div>${stdout.replace(/\n/g, '<br>')}</div>
                    `;

                    alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-amber-50 text-amber-800 border-amber-300 animate-pulse text-left";
                    
                    if(in1 === "Pelabuhan" && in2 === "Bandara") {
                        alertBox.innerHTML = "❌ Syntax Error: Ingat, teks (string) harus diapit dengan tanda petik ganda <code>\" \"</code> atau tunggal <code>' '</code>.";
                    } else {
                        alertBox.innerHTML = "❌ KeyError: Kunci lokasi yang Anda panggil salah atau tidak ada dalam Nested Dictionary.";
                    }
                    
                    alertBox.classList.remove('hidden');
                }

            } catch (err) {
                consoleText.className = "text-[#ff5f56] whitespace-pre-wrap break-words leading-relaxed text-sm text-left block";
                consoleText.innerHTML = "Traceback (most recent call last):<br>" + err.message;
                statusTerm.innerText = "Error";
                statusTerm.className = "bg-red-800 text-red-200 px-2 py-0.5 rounded text-[10px]";

                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-red-50 text-red-800 border-red-300 animate-pulse text-left";
                alertBox.innerHTML = "❌ Syntax Error: Terdapat kesalahan ketik pada input Anda (pastikan pakai tanda petik).";
                alertBox.classList.remove('hidden');
            } finally {
                if (btnRun.innerHTML.includes('Memproses')) {
                    btnRun.innerHTML = 'Jalankan & Periksa';
                    btnRun.disabled = false;
                }
            }
        }

        window.kunciJawabanAktivitas41 = function(val1, val2) {
            const in1 = document.getElementById('input41_1');
            const in2 = document.getElementById('input41_2');
            
            if(in1) {
                in1.value = val1 || '"Pelabuhan"'; 
                in1.disabled = true;
                in1.classList.replace('text-[#ce9178]', 'text-[#4af626]');
                in1.classList.add('bg-green-900/30', 'border-green-500', 'cursor-not-allowed');
            }
            if(in2) {
                in2.value = val2 || '"Bandara"'; 
                in2.disabled = true;
                in2.classList.replace('text-[#ce9178]', 'text-[#4af626]');
                in2.classList.add('bg-green-900/30', 'border-green-500', 'cursor-not-allowed');
            }

            const btnRun = document.getElementById('btnRunAct41');
            if(btnRun) {
                btnRun.innerHTML = 'Diselesaikan';
                btnRun.classList.replace('bg-yellow-600', 'bg-slate-600');
                btnRun.classList.replace('hover:bg-yellow-500', 'cursor-not-allowed');
                btnRun.disabled = true;
            }

            const consoleText = document.getElementById('console-text-41');
            if (consoleText && consoleText.innerHTML.includes('Output terminal')) {
                 consoleText.classList.remove('italic', 'opacity-60');
                 consoleText.className = "text-[#4af626] whitespace-pre-wrap break-words leading-relaxed text-sm text-left block";
                 consoleText.innerHTML = `
                    <div class="mb-1 text-slate-400">&gt; python main.py</div>
                    <div>Tarif yang harus dibayar: Rp 35000</div>
                 `;
            }

            const feedbackEdu = document.getElementById('feedback-edukatif-41');
            if(feedbackEdu) feedbackEdu.classList.remove('hidden');
            
            const badgeAct = document.getElementById('badge-act41');
            if(badgeAct) badgeAct.classList.remove('hidden');

            const btnNext = document.getElementById('btnNext41');
            if(btnNext) {
                btnNext.disabled = false;
                btnNext.classList.remove('opacity-50', 'cursor-not-allowed', 'bg-slate-900');
                btnNext.classList.add('bg-blue-600', 'hover:bg-blue-700');
            }
        }
    </script>
</section>