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

    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-8 md:p-10 max-w-6xl mx-auto">

        {{-- JUDUL MATERI --}}
        <div class="border-b border-slate-200 dark:border-slate-700 pb-6 mb-8 text-left">
            <h2 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white mb-2">4.1 Modifikasi Memori: <span class="text-blue-600 dark:text-blue-400 italic font-mono">Nested Dictionary</span></h2>
            <p class="text-slate-500 dark:text-slate-400 font-medium">Menyimpan graf berbobot (Weighted Graph) ke dalam memori komputer.</p>
        </div>

        {{-- KONTEN TEORI & VISUALISASI INTERAKTIF --}}
        <div class="grid md:grid-cols-12 gap-8 mb-10 items-start">
            
            {{-- Kolom Kiri: Teori & Instruksi Misi --}}
            <div class="md:col-span-7 prose prose-slate dark:prose-invert text-slate-700 dark:text-slate-300 leading-relaxed text-justify max-w-none flex flex-col h-full">
                <p class="mb-3">
                    Pada Materi 2, kita menyimpan Graf Tak Berbobot menggunakan <em>Dictionary</em> biasa, di mana <em>Value</em>-nya berupa <em>List</em> (contoh: <code>"Pasar": ["Kampus"]</code>).
                </p>
                <p>
                    Namun, untuk Graf Berbobot (<em>Weighted Graph</em>), kita harus menyimpan nama lokasi sekaligus <strong>angka bobotnya</strong> (jarak/waktu). Oleh karena itu, kita memutakhirkan struktur datanya menjadi <strong>Nested Dictionary (Dictionary Bersarang)</strong>, yaitu sebuah <em>Dictionary</em> di dalam <em>Dictionary</em>.
                </p>
                
                {{-- Box Misi Interaktif --}}
                <div class="mt-6 bg-amber-50 dark:bg-amber-950/40 border-l-4 border-amber-500 dark:border-amber-600 p-5 rounded-r-lg shadow-sm flex-1 transition-colors">
                    <h4 class="text-sm font-bold text-amber-900 dark:text-amber-300 mb-2 flex items-center gap-2">
                        <i class="fa-solid fa-bullseye"></i> Misi Visual Interaktif!
                    </h4>
                    <p class="text-sm text-amber-800 dark:text-amber-100 font-medium m-0 leading-relaxed">
                        Perhatikan graf di samping. Angka merah pada garis adalah <strong>jarak tempuh (KM)</strong>.<br><br>
                        <strong>Tugas Anda:</strong> Gunakan mouse Anda untuk mengklik garis (rute) yang menurut Anda akan menghasilkan <strong>total jarak terpendek</strong> dari titik <strong>Kayutangi</strong> ke titik <strong>Duta Mall</strong>.
                    </p>
                </div>
            </div>

            {{-- Kolom Kanan: Visualisasi Graf Berbobot (INTERAKTIF KLIK) --}}
            <div class="md:col-span-5 bg-slate-50 dark:bg-slate-800/50 border-2 border-slate-200 dark:border-slate-700 rounded-xl overflow-hidden shadow-inner h-[350px] relative flex flex-col items-center transition-colors">
                <div class="bg-slate-200/80 dark:bg-slate-800/80 py-2 px-4 border-b border-slate-300 dark:border-slate-700 flex justify-between items-center z-20 absolute top-0 w-full backdrop-blur-sm pointer-events-none">
                    <span class="text-xs font-bold text-slate-700 dark:text-slate-300 uppercase tracking-widest">Uji Coba Rute (Klik Garis)</span>
                    <i class="fa-solid fa-hand-pointer text-slate-500 dark:text-slate-400"></i>
                </div>
                
                {{-- Container Vis.js --}}
                <div id="interactive-graph-vis" class="w-full h-full mt-6 focus:outline-none"></div>

                {{-- Status Bar Hasil Klik --}}
                <div id="graph-feedback" class="absolute bottom-3 inset-x-3 bg-white dark:bg-slate-900 border border-slate-300 dark:border-slate-600 rounded-lg p-2.5 text-center text-xs font-bold text-slate-500 dark:text-slate-400 shadow-md transition-colors z-20">
                    Menunggu Anda memilih rute...
                </div>
            </div>
        </div>

        {{-- KESIMPULAN MISI (MUNCUL SETELAH BERHASIL KLIK GRAF) --}}
        <div id="misi-conclusion" class="hidden mb-10 bg-emerald-50 dark:bg-emerald-950/30 border border-emerald-200 dark:border-emerald-800 p-6 rounded-xl shadow-sm transition-all duration-500">
            <h4 class="font-bold text-emerald-800 dark:text-emerald-400 text-base mb-2 flex items-center gap-2">
                <i class="fa-solid fa-lightbulb text-emerald-600 dark:text-emerald-500"></i> Makna dari Misi Ini
            </h4>
            <p class="text-sm text-emerald-800 dark:text-emerald-200 leading-relaxed text-justify">
                Anda baru saja mempraktikkan inti pemikiran dari <strong>Algoritma Dijkstra</strong>! Jika menggunakan logika BFS biasa, komputer akan memilih jalur lurus yang berjarak 10 KM karena "jumlah ruas jalannya" paling sedikit (cuma 1 langkah). Namun, algoritma Dijkstra sangat cerdas; ia memperhitungkan total bobot. Ia menyadari bahwa memutar melewati rute Siring (5 KM + 2 KM = 7 KM) <strong>jauh lebih dekat</strong> daripada lewat jalur lurus (10 KM).
            </p>
        </div>

        {{-- CONTOH KODE PROGRAM DENGAN LINE NUMBERS (ANTI-COPY) --}}
        <div class="mb-10">
            <h3 class="text-lg font-bold text-slate-800 dark:text-slate-100 mb-4 flex items-center gap-2 text-left">
                <i class="fa-solid fa-laptop-code text-slate-500"></i> Implementasi ke dalam Kode Python
            </h3>
            
            {{-- Tampilan Gambar Kode (Hanya Baca) --}}
            <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 select-none pointer-events-none mb-6 anti-copas text-left flex flex-col h-auto">
                <div class="bg-[#2d2d2d] px-4 py-2.5 flex items-center gap-2 border-b border-slate-700 shrink-0">
                    <div class="flex gap-1.5">
                        <div class="w-3 h-3 rounded-full bg-[#ff5f56]"></div>
                        <div class="w-3 h-3 rounded-full bg-[#ffbd2e]"></div>
                        <div class="w-3 h-3 rounded-full bg-[#27c93f]"></div>
                    </div>
                    <span class="text-slate-400 text-xs ml-2 font-mono">Contoh Kode dari Modul (Hanya Baca)</span>
                </div>
                
                {{-- CODE BLOCK WITH LINE NUMBERS --}}
                <div class="flex font-mono text-[12px] md:text-sm leading-[1.625] text-[#d4d4d4] overflow-x-auto">
                    {{-- Line Numbers --}}
                    <div class="flex flex-col text-[#858585] text-right select-none py-5 pl-4 pr-4 border-r border-[#404040] bg-[#1e1e1e] shrink-0 leading-[1.625] z-10">
                        <span>1</span><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span><span>7</span><span>8</span><span>9</span><span>10</span>
                    </div>
                    
                    {{-- Code Content (10 Baris Tepat) --}}
                    <div class="flex flex-col whitespace-pre py-5 pl-4 pr-6 leading-[1.625] z-0">
                        <div class="text-[#6a9955] z-0"># Merepresentasikan Graf Berbobot dengan Nested Dictionary</div>
                        <div class="z-0"><span class="text-[#9cdcfe]">graf_rute</span> = {</div>
                        <div class="z-0">&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-[#ce9178]">"Kayutangi"</span>: {<span class="text-[#ce9178]">"Siring"</span>: <span class="text-[#b5cea8]">5</span>, <span class="text-[#ce9178]">"Duta Mall"</span>: <span class="text-[#b5cea8]">10</span>},</div>
                        <div class="z-0">&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-[#ce9178]">"Siring"</span>: {<span class="text-[#ce9178]">"Kayutangi"</span>: <span class="text-[#b5cea8]">5</span>, <span class="text-[#ce9178]">"Duta Mall"</span>: <span class="text-[#b5cea8]">2</span>},</div>
                        <div class="z-0">&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-[#ce9178]">"Duta Mall"</span>: {<span class="text-[#ce9178]">"Siring"</span>: <span class="text-[#b5cea8]">2</span>, <span class="text-[#ce9178]">"Kayutangi"</span>: <span class="text-[#b5cea8]">10</span>}</div>
                        <div class="z-0">}</div>
                        <div class="z-0">&nbsp;</div>
                        <div class="text-[#6a9955] z-0"># Mengakses jarak spesifik dari Kayutangi ke Siring:</div>
                        <div class="z-0"><span class="text-[#9cdcfe]">jarak</span> = graf_rute[<span class="text-[#ce9178]">"Kayutangi"</span>][<span class="text-[#ce9178]">"Siring"</span>]</div>
                        <div class="z-0"><span class="text-[#dcdcaa]">print</span>(<span class="text-[#ce9178]">"Jarak tempuh:"</span>, jarak, <span class="text-[#ce9178]">"KM"</span>)</div>
                    </div>
                </div>
            </div>

            {{-- PENJELASAN KODE PROGRAM --}}
            <div class="p-6 border border-slate-200 dark:border-slate-700 rounded-xl bg-slate-50 dark:bg-slate-800/50 shadow-sm text-left transition-colors">
                <h4 class="font-bold text-slate-800 dark:text-slate-200 text-sm mb-4">Pembedahan Sintaks:</h4>
                <ul class="list-disc list-outside ml-5 text-sm text-slate-700 dark:text-slate-300 space-y-3 leading-relaxed text-justify">
                    <li><strong>Baris 2 sampai 6:</strong> <code>graf_rute</code> adalah memori peta yang disimpan dalam bentuk <em>nested dictionary</em> (sebuah dictionary yang di dalamnya ada dictionary lagi).</li>
                    <li><strong>Baris 3, 4, dan 5:</strong> Setiap <em>key</em> utama (kolom teks paling kiri, seperti "Kayutangi") menunjukkan <strong>lokasi asal</strong>. Isi di sebelahnya (seperti <code>{"Siring": 5}</code>) memuat <strong>lokasi tujuan</strong> beserta angka <strong>bobot jaraknya</strong> dalam KM.</li>
                    <li><strong>Baris 9:</strong> Sintaks <code>graf_rute["Kayutangi"]["Siring"]</code> digunakan untuk menembus ke bagian dalam <em>Nested Dictionary</em> guna mengekstrak nilai jarak (angka 5) tersebut secara presisi.</li>
                </ul>
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- INTERACTIVE SANDBOX: KETIK ULANG KODE --}}
        {{-- ========================================== --}}
        <div class="mb-10 bg-blue-50/30 dark:bg-blue-950/20 border-2 border-blue-200 dark:border-blue-800/60 p-6 rounded-xl shadow-sm text-left transition-colors">
            <h3 class="text-lg font-bold text-slate-800 dark:text-slate-100 mb-2">Buktikan Pemahaman Anda!</h3>
            <p class="text-sm text-slate-600 dark:text-slate-300 mb-4">
                Ketik ulang keseluruhan kode contoh di atas ke dalam editor di bawah ini (baris komentar warna hijau tidak wajib diketik). Buktikan bahwa kodenya bisa berjalan tanpa error, dan <strong>buka kunci</strong> penjelasan output serta Aktivitas 4.1!
            </p>

            <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 font-mono text-sm flex flex-col">
                <div class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700 shrink-0">
                    <span class="text-slate-400 text-xs">Terminal Editor Pyodide</span>
                    <button onclick="window.runDemoBox41()" id="btn-demo41" class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors shadow-sm active:scale-95 z-10">
                        <i class="fa-solid fa-play mr-1"></i> Jalankan Kode
                    </button>
                </div>
                
                {{-- DYNAMIC EDITOR LAYOUT --}}
                <div class="flex font-mono text-[12px] md:text-sm text-[#d4d4d4] bg-[#1e1e1e] relative min-h-[160px] leading-[1.625]">
                    {{-- Container Angka Baris (Kiri) --}}
                    <div id="line-numbers-demo41" class="text-[#858585] text-right select-none py-5 pl-4 pr-4 border-r border-[#404040] bg-[#1e1e1e] shrink-0 z-10 leading-[1.625]">
                        <div>1</div>
                    </div>
                    
                    {{-- Textarea Editor (Kanan) --}}
                    <textarea id="editor-demo41" class="w-full bg-transparent text-[#d4d4d4] outline-none resize-none py-5 pl-4 pr-6 whitespace-pre overflow-x-auto z-0 leading-[1.625]" spellcheck="false" placeholder="# Ketik ulang kode Python di sini..." oninput="window.syncLineNumbersDemo41()"></textarea>
                </div>

                {{-- WADAH OUTPUT (RATA KIRI & RAPI) --}}
                <div class="px-5 pb-5 pt-2 bg-[#1e1e1e] text-left w-full z-0">
                    <hr class="border-slate-700 mb-4">
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-slate-500 text-[10px] font-bold tracking-widest uppercase">OUTPUT TERMINAL</span>
                        <span id="status-demo41" class="bg-slate-800 text-slate-400 px-2 py-0.5 rounded text-[10px]">Ready</span>
                    </div>
                    <div id="output-demo41" class="block text-left text-[#4af626] whitespace-pre-wrap break-words min-h-[20px] italic opacity-60 m-0 p-0">(Output terminal akan tampil di sini setelah dijalankan)</div>
                </div>
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- KONTEN TERKUNCI (OUTPUT + AKTIVITAS 4.1) --}}
        {{-- ========================================== --}}
        <div id="locked-section-41" class="relative locked-content unlock-transition pb-6 text-left">
            
            {{-- Overlay Gembok --}}
            <div id="lock-overlay-41" class="absolute inset-0 z-30 flex flex-col items-center justify-center bg-white/50 dark:bg-slate-900/50 backdrop-blur-[3px] rounded-xl transition-opacity duration-500">
                <div class="bg-white dark:bg-slate-800 p-5 rounded-2xl shadow-xl flex flex-col items-center border border-slate-200 dark:border-slate-700 animate-bounce">
                    <i class="fa-solid fa-lock text-4xl text-slate-400 dark:text-slate-500 mb-3"></i>
                    <p class="text-sm font-bold text-slate-600 dark:text-slate-300 text-center">Konten Terkunci</p>
                    <p class="text-xs text-slate-500 dark:text-slate-400 text-center mt-1">Ketik dan jalankan kode di atas<br>dengan benar untuk membuka.</p>
                </div>
            </div>

            {{-- Penjelasan Output Program --}}
            <div id="explanation-box-41" class="mb-10 p-6 border border-slate-200 dark:border-slate-700 rounded-xl bg-white dark:bg-slate-800/50 shadow-sm scroll-mt-24 transition-colors">
                <h4 class="font-bold text-slate-800 dark:text-slate-200 text-base mb-3">Penjelasan Output Program:</h4>
                <div class="bg-black text-[#4af626] text-left font-mono text-sm p-4 rounded-md shadow-inner mb-4 inline-block block w-fit border border-slate-800 dark:border-green-900/50">
                    Jarak tempuh: 5 KM
                </div>
                <p class="text-sm text-slate-700 dark:text-slate-300 text-justify leading-relaxed">
                    Output di atas menunjukkan bahwa program berhasil mengekstrak data jarak dari Kayutangi ke Siring yang bernilai 5 kilometer. Angka 5 ditarik langsung dari dalam graf <em>nested dictionary</em>, kemudian ditampilkan ke layar menggunakan perintah <code>print()</code> yang digabungkan dengan keterangan string tambahan agar hasilnya mudah dipahami oleh pengguna.
                </p>
            </div>

            {{-- ========================================== --}}
        {{-- AKTIVITAS 4.1: FILL IN THE BLANKS DENGAN LINE NUMBERS --}}
        {{-- ========================================== --}}
        <div id="activity-41-container" class="border-2 border-slate-200 dark:border-slate-700 rounded-xl overflow-hidden shadow-sm transition-colors">
            <div class="bg-yellow-50 dark:bg-yellow-900/40 px-6 py-4 border-b border-yellow-200 dark:border-yellow-700/50 flex justify-between items-center transition-colors">
                <h3 class="font-bold text-yellow-800 dark:text-yellow-400 text-lg flex items-center gap-2">
                    <i class="fa-solid fa-lightbulb text-yellow-600"></i> Aktivitas 4.1 – Uji Pemahaman Modifikasi Memori
                </h3>
                <span id="badge-act41" class="hidden bg-green-500 text-white px-3 py-1 rounded text-xs font-bold shadow-sm flex items-center gap-1"><i class="fa-solid fa-check"></i> Selesai</span>
            </div>
            
            <div class="p-6 bg-white dark:bg-slate-900 transition-colors">

                {{-- SOAL 1: EKSTRAKSI BOBOT --}}
                <div id="activity-41-1-container" class="mb-10 transition-opacity duration-500">
                    <h4 class="font-bold text-slate-800 dark:text-slate-200 text-lg mb-3">1. Ekstraksi Data Tarif (Bobot)</h4>
                    <p class="text-sm text-slate-700 dark:text-slate-300 leading-relaxed text-justify mb-3">
                        <strong>Skenario:</strong> Anda adalah <em>programmer</em> di perusahaan ojek <em>online</em> yang mengelola data tarif antarkota.<br>
                    </p>
                    <div class="bg-white/80 dark:bg-slate-800/80 p-4 rounded border border-blue-200 dark:border-blue-800/50 font-medium text-blue-900 dark:text-blue-300 text-sm shadow-sm leading-relaxed mb-6 transition-colors">
                        <strong>Tugas Anda:</strong> Lengkapi sintaks pemanggilan <em>Nested Dictionary</em> di dalam kotak editor ini agar sistem dapat mem-print (mencetak) tarif perjalanan dari asal <strong>"Pelabuhan"</strong> menuju tujuan <strong>"Bandara"</strong>.
                    </div>

                    <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 font-mono text-sm flex flex-col">
                        <div class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700 z-10">
                            <span class="text-slate-400 text-xs">Terminal Aktivitas (main.py)</span>
                            <button onclick="window.runAktivitas41_1()" id="btnRunAct41_1" class="bg-yellow-600 hover:bg-yellow-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors shadow-sm active:scale-95" disabled>
                                Jalankan & Periksa
                            </button>
                        </div>
                        
                        {{-- KODE EDITOR DENGAN LINE NUMBERS --}}
                        <div class="flex font-mono text-[12px] md:text-sm leading-[1.625] text-[#d4d4d4] overflow-x-auto text-left z-0">
                            <div class="flex flex-col text-[#858585] text-right select-none py-6 pl-4 pr-4 border-r border-[#404040] bg-[#1e1e1e] shrink-0">
                                 <span>1</span><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span><span>7</span><span>8</span><span>9</span><span>10</span>
                            </div>
                            
                            <div class="flex flex-col whitespace-pre py-6 pl-4 pr-6 w-full text-left">
<div><span class="text-[#9cdcfe]">tarif_ojek</span> = {</div>
<div>    <span class="text-[#ce9178]">"Stasiun"</span>: {<span class="text-[#ce9178]">"Pelabuhan"</span>: <span class="text-[#b5cea8]">15000</span>},</div>
<div>    <span class="text-[#ce9178]">"Pelabuhan"</span>: {<span class="text-[#ce9178]">"Stasiun"</span>: <span class="text-[#b5cea8]">15000</span>, <span class="text-[#ce9178]">"Bandara"</span>: <span class="text-[#b5cea8]">35000</span>},</div>
<div>    <span class="text-[#ce9178]">"Bandara"</span>: {<span class="text-[#ce9178]">"Pelabuhan"</span>: <span class="text-[#b5cea8]">35000</span>}</div>
<div>}</div>
<div> </div>
<div class="text-[#6a9955]"># Ketikkan Kunci (Key) asal dan tujuan di dalam kurung siku. Ingat tanda petiknya!</div>
<div><span class="text-[#9cdcfe]">tarif_dicari</span> = <span class="text-[#9cdcfe]">tarif_ojek</span>[<input type="text" id="input41_1_1" class="inline-block align-middle bg-[#3c3c3c] dark:bg-slate-700 text-[#ce9178] border border-slate-500 dark:border-slate-500 rounded px-2 mx-1 w-28 outline-none focus:border-blue-400 focus:bg-[#2d2d2d] dark:focus:bg-slate-800 text-center transition-colors shadow-inner h-6 leading-none text-sm" autocomplete="off" spellcheck="false" placeholder='"..."' disabled>][<input type="text" id="input41_1_2" class="inline-block align-middle bg-[#3c3c3c] dark:bg-slate-700 text-[#ce9178] border border-slate-500 dark:border-slate-500 rounded px-2 mx-1 w-28 outline-none focus:border-blue-400 focus:bg-[#2d2d2d] dark:focus:bg-slate-800 text-center transition-colors shadow-inner h-6 leading-none text-sm" autocomplete="off" spellcheck="false" placeholder='"..."' disabled>]</div>
<div> </div>
<div><span class="text-[#dcdcaa]">print</span>(<span class="text-[#ce9178]">"Tarif yang harus dibayar: Rp"</span>, tarif_dicari)</div>
                            </div>
                        </div>

                        {{-- WADAH OUTPUT TERMINAL --}}
                        <div class="px-5 pb-5 pt-0 bg-[#1e1e1e] text-left w-full z-0">
                            <hr class="border-slate-700 mb-4 mt-2">
                            <div class="flex justify-between items-center mb-3">
                                <span class="text-slate-500 text-[10px] font-bold tracking-widest uppercase">OUTPUT TERMINAL</span>
                                <span id="status-terminal-41-1" class="bg-slate-800 text-slate-400 px-2 py-0.5 rounded text-[10px]">Ready</span>
                            </div>
                            <div id="console-text-41-1" class="block text-left text-[#4af626] whitespace-pre-wrap break-words leading-relaxed text-sm italic opacity-60 m-0 p-0">(Output terminal akan tampil di sini setelah dijalankan)</div>
                        </div>
                    </div>

                    <div id="alert-41-1" class="hidden mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border transition-all text-left"></div>

                    <div id="feedback-edukatif-41-1" class="hidden mt-4 bg-[#f0fdf4] dark:bg-green-950/40 border border-[#bbf7d0] dark:border-green-800 p-6 rounded-xl shadow-sm text-left transition-colors">
                        <h4 class="font-bold text-[#166534] dark:text-green-400 mb-2 flex items-center gap-2"><i class="fa-solid fa-check-circle"></i> Kunci Jawaban Sistem:</h4>
                        <p class="text-sm text-[#166534] dark:text-green-200 leading-relaxed mb-0">
                            Luar biasa! Untuk mengekstrak tarif dari Pelabuhan menuju Bandara, Anda memanggil kunci utama asal <code class="bg-[#dcfce7] dark:bg-green-900/60 px-2 py-0.5 rounded font-bold border border-[#bbf7d0] dark:border-green-700 font-mono">"Pelabuhan"</code>, dilanjutkan dengan memanggil kunci sub-tujuan <code class="bg-[#dcfce7] dark:bg-green-900/60 px-2 py-0.5 rounded font-bold border border-[#bbf7d0] dark:border-green-700 font-mono">"Bandara"</code>. Jangan lupa, tipe data string (teks) wajib selalu diapit tanda petik.
                        </p>
                    </div>
                </div>

                {{-- SOAL 2: MENAMBAHKAN RUTE BARU --}}
                <div id="activity-41-2-container" class="mb-10 opacity-50 pointer-events-none transition-opacity duration-500 relative">
                    <h4 class="font-bold text-slate-800 dark:text-slate-200 text-lg mb-3">2. Menambahkan Rute Baru</h4>
                    <p class="text-sm text-slate-700 dark:text-slate-300 leading-relaxed text-justify mb-3">
                        <strong>Skenario:</strong> Perusahaan ojek <em>online</em> Anda baru saja membuka jalur baru dari "Stasiun" langsung menuju "Kampus" dengan tarif promo Rp 12.000.
                    </p>
                    <div class="bg-white/80 dark:bg-slate-800/80 p-4 rounded border border-blue-200 dark:border-blue-800/50 font-medium text-blue-900 dark:text-blue-300 text-sm shadow-sm leading-relaxed mb-6 transition-colors">
                        <strong>Tugas Anda:</strong> Tambahkan rute dan tarif baru tersebut ke dalam <em>Nested Dictionary</em> khusus milik rute asal <code>"Stasiun"</code>.
                    </div>

                    <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 font-mono text-sm flex flex-col">
                        <div class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700 z-10">
                            <span class="text-slate-400 text-xs">Terminal Aktivitas (main.py)</span>
                            <button onclick="window.runAktivitas41_2()" id="btnRunAct41_2" class="bg-yellow-600 hover:bg-yellow-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors shadow-sm active:scale-95">
                                Jalankan & Periksa
                            </button>
                        </div>
                        
                        <div class="flex font-mono text-[12px] md:text-sm leading-[1.625] text-[#d4d4d4] overflow-x-auto text-left z-0">
                            <div class="flex flex-col text-[#858585] text-right select-none py-6 pl-4 pr-4 border-r border-[#404040] bg-[#1e1e1e] shrink-0">
                                 <span>1</span><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span><span>7</span><span>8</span>
                            </div>
                            
                            <div class="flex flex-col whitespace-pre py-6 pl-4 pr-6 w-full text-left">
<div><span class="text-[#9cdcfe]">tarif_ojek</span> = {</div>
<div>    <span class="text-[#ce9178]">"Stasiun"</span>: {<span class="text-[#ce9178]">"Pelabuhan"</span>: <span class="text-[#b5cea8]">15000</span>},</div>
<div>    <span class="text-[#ce9178]">"Kampus"</span>: {}</div>
<div>}</div>
<div> </div>
<div class="text-[#6a9955]"># Tambahkan rute baru dari Stasiun ke Kampus seharga 12000!</div>
<div><span class="text-[#9cdcfe]">tarif_ojek</span>[<span class="text-[#ce9178]">"Stasiun"</span>][<input type="text" id="input41_2_1" class="inline-block align-middle bg-[#3c3c3c] dark:bg-slate-700 text-[#ce9178] border border-slate-500 dark:border-slate-500 rounded px-2 mx-1 w-24 outline-none focus:border-blue-400 focus:bg-[#2d2d2d] dark:focus:bg-slate-800 text-center transition-colors shadow-inner h-6 leading-none text-sm" autocomplete="off" spellcheck="false" placeholder='"..."'>] = <input type="text" id="input41_2_2" class="inline-block align-middle bg-[#3c3c3c] dark:bg-slate-700 text-[#b5cea8] border border-slate-500 dark:border-slate-500 rounded px-2 mx-1 w-20 outline-none focus:border-blue-400 focus:bg-[#2d2d2d] dark:focus:bg-slate-800 text-center transition-colors shadow-inner h-6 leading-none text-sm" autocomplete="off" spellcheck="false" placeholder="angka"></div>
<div> </div>
<div><span class="text-[#dcdcaa]">print</span>(<span class="text-[#ce9178]">"Rute dari Stasiun:"</span>, <span class="text-[#9cdcfe]">tarif_ojek</span>[<span class="text-[#ce9178]">"Stasiun"</span>])</div>
                            </div>
                        </div>

                        <div class="px-5 pb-5 pt-0 bg-[#1e1e1e] text-left w-full z-0">
                            <hr class="border-slate-700 mb-4 mt-2">
                            <div class="flex justify-between items-center mb-3">
                                <span class="text-slate-500 text-[10px] font-bold tracking-widest uppercase">OUTPUT TERMINAL</span>
                                <span id="status-terminal-41-2" class="bg-slate-800 text-slate-400 px-2 py-0.5 rounded text-[10px]">Ready</span>
                            </div>
                            <div id="console-text-41-2" class="block text-left text-[#4af626] whitespace-pre-wrap break-words leading-relaxed text-sm italic opacity-60 m-0 p-0">(Output terminal akan tampil di sini setelah dijalankan)</div>
                        </div>
                    </div>

                    <div id="alert-41-2" class="hidden mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border transition-all text-left"></div>

                    <div id="feedback-edukatif-41-2" class="hidden mt-4 bg-[#f0fdf4] dark:bg-green-950/40 border border-[#bbf7d0] dark:border-green-800 p-6 rounded-xl shadow-sm text-left transition-colors">
                        <h4 class="font-bold text-[#166534] dark:text-green-400 mb-2 flex items-center gap-2"><i class="fa-solid fa-check-circle"></i> Kunci Jawaban Sistem:</h4>
                        <p class="text-sm text-[#166534] dark:text-green-200 leading-relaxed mb-0">
                            Bagus sekali! Pada <em>Nested Dictionary</em>, Anda memanggil <em>Key</em> pertama (<code>"Stasiun"</code>) lalu langsung membuat <em>Key</em> kedua di sebelahnya (<code>"Kampus"</code>) dan mengisinya dengan <em>Value</em> (12000). Penulisan <code>[asal][tujuan] = bobot</code> ini sangat praktis untuk memetakan graf secara dinamis!
                        </p>
                    </div>
                </div>

                {{-- SOAL 3: MENGUPDATE BOBOT --}}
                <div id="activity-41-3-container" class="mb-4 opacity-50 pointer-events-none transition-opacity duration-500 relative">
                    <h4 class="font-bold text-slate-800 dark:text-slate-200 text-lg mb-3">3. Meng-update Bobot Lama</h4>
                    <p class="text-sm text-slate-700 dark:text-slate-300 leading-relaxed text-justify mb-3">
                        <strong>Skenario:</strong> Menjelang hari libur, terjadi lonjakan penumpang. Tarif dari "Pelabuhan" menuju ke "Stasiun" yang awalnya Rp 15.000 terpaksa dinaikkan harganya menjadi Rp 25.000.
                    </p>
                    <div class="bg-white/80 dark:bg-slate-800/80 p-4 rounded border border-blue-200 dark:border-blue-800/50 font-medium text-blue-900 dark:text-blue-300 text-sm shadow-sm leading-relaxed mb-6 transition-colors">
                        <strong>Tugas Anda:</strong> Timpa (ubah) nilai tarif lama di memori dictionary tersebut dengan angka tarif yang baru.
                    </div>

                    <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 font-mono text-sm flex flex-col">
                        <div class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700 z-10">
                            <span class="text-slate-400 text-xs">Terminal Aktivitas (main.py)</span>
                            <button onclick="window.runAktivitas41_3()" id="btnRunAct41_3" class="bg-yellow-600 hover:bg-yellow-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors shadow-sm active:scale-95">
                                Jalankan & Periksa
                            </button>
                        </div>
                        
                        <div class="flex font-mono text-[12px] md:text-sm leading-[1.625] text-[#d4d4d4] overflow-x-auto text-left z-0">
                            <div class="flex flex-col text-[#858585] text-right select-none py-6 pl-4 pr-4 border-r border-[#404040] bg-[#1e1e1e] shrink-0">
                                 <span>1</span><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span><span>7</span><span>8</span>
                            </div>
                            
                            <div class="flex flex-col whitespace-pre py-6 pl-4 pr-6 w-full text-left">
<div><span class="text-[#9cdcfe]">tarif_ojek</span> = {</div>
<div>    <span class="text-[#ce9178]">"Pelabuhan"</span>: {<span class="text-[#ce9178]">"Stasiun"</span>: <span class="text-[#b5cea8]">15000</span>, <span class="text-[#ce9178]">"Bandara"</span>: <span class="text-[#b5cea8]">35000</span>}</div>
<div>}</div>
<div> </div>
<div class="text-[#6a9955]"># Update tarif Pelabuhan menuju Stasiun menjadi 25000!</div>
<div><span class="text-[#9cdcfe]">tarif_ojek</span>[<input type="text" id="input41_3_1" class="inline-block align-middle bg-[#3c3c3c] dark:bg-slate-700 text-[#ce9178] border border-slate-500 dark:border-slate-500 rounded px-2 mx-1 w-28 outline-none focus:border-blue-400 focus:bg-[#2d2d2d] dark:focus:bg-slate-800 text-center transition-colors shadow-inner h-6 leading-none text-sm" autocomplete="off" spellcheck="false" placeholder='"..."'>][<input type="text" id="input41_3_2" class="inline-block align-middle bg-[#3c3c3c] dark:bg-slate-700 text-[#ce9178] border border-slate-500 dark:border-slate-500 rounded px-2 mx-1 w-24 outline-none focus:border-blue-400 focus:bg-[#2d2d2d] dark:focus:bg-slate-800 text-center transition-colors shadow-inner h-6 leading-none text-sm" autocomplete="off" spellcheck="false" placeholder='"..."'>] = <span class="text-[#b5cea8]">25000</span></div>
<div> </div>
<div><span class="text-[#dcdcaa]">print</span>(<span class="text-[#ce9178]">"Tarif Pelabuhan ke Stasiun sekarang:"</span>, <span class="text-[#9cdcfe]">tarif_ojek</span>[<span class="text-[#ce9178]">"Pelabuhan"</span>][<span class="text-[#ce9178]">"Stasiun"</span>])</div>
                            </div>
                        </div>

                        <div class="px-5 pb-5 pt-0 bg-[#1e1e1e] text-left w-full z-0">
                            <hr class="border-slate-700 mb-4 mt-2">
                            <div class="flex justify-between items-center mb-3">
                                <span class="text-slate-500 text-[10px] font-bold tracking-widest uppercase">OUTPUT TERMINAL</span>
                                <span id="status-terminal-41-3" class="bg-slate-800 text-slate-400 px-2 py-0.5 rounded text-[10px]">Ready</span>
                            </div>
                            <div id="console-text-41-3" class="block text-left text-[#4af626] whitespace-pre-wrap break-words leading-relaxed text-sm italic opacity-60 m-0 p-0">(Output terminal akan tampil di sini setelah dijalankan)</div>
                        </div>
                    </div>

                    <div id="alert-41-3" class="hidden mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border transition-all text-left"></div>

                    <div id="feedback-edukatif-41-3" class="hidden mt-4 bg-[#f0fdf4] dark:bg-green-950/40 border border-[#bbf7d0] dark:border-green-800 p-6 rounded-xl shadow-sm text-left transition-colors">
                        <h4 class="font-bold text-[#166534] dark:text-green-400 mb-2 flex items-center gap-2"><i class="fa-solid fa-check-circle"></i> Kunci Jawaban Sistem:</h4>
                        <p class="text-sm text-[#166534] dark:text-green-200 leading-relaxed mb-0">
                            Sempurna! Sama seperti variabel biasa, data nilai di dalam <em>Nested Dictionary</em> bisa ditimpa kapan saja menggunakan tanda sama dengan (<code>=</code>). Fitur <em>update</em> langsung ini akan sangat kita butuhkan saat algoritma Dijkstra menemukan rute jarak yang lebih pendek nantinya!
                        </p>
                    </div>
                </div>

            </div>
        </div>

        {{-- Navigasi Bawah --}}
        <div class="flex justify-between gap-4 mt-12 pt-6 border-t border-slate-200 dark:border-slate-700 transition-colors">
            <button type="button" onclick="prevStep()" class="px-6 py-2.5 rounded-lg border border-slate-300 dark:border-slate-700 font-bold text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 transition shadow-sm active:scale-95">
                Kembali
            </button>
            <button type="button" id="btnNext41" onclick="nextStep()" class="px-6 py-2.5 bg-slate-900 dark:bg-slate-700 hover:bg-slate-800 dark:hover:bg-slate-600 text-white font-bold rounded-lg shadow-md transition-all active:scale-95 opacity-50 cursor-not-allowed" disabled>
                Lanjut
            </button>
        </div>
    </div>

    {{-- SCRIPT LOGIKA (ANTI BUG, PYODIDE SAFE, BERJENJANG) --}}
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

        // --- FUNGSI LINE NUMBERS EDITOR SANDBOX DEMO 4.1 ---
        window.syncLineNumbersDemo41 = function() {
            const editor = document.getElementById('editor-demo41');
            const lineNumEl = document.getElementById('line-numbers-demo41');
            if(!editor || !lineNumEl) return;

            editor.style.height = 'auto'; 
            if (editor.scrollHeight > 0) {
                editor.style.height = editor.scrollHeight + 'px'; 
            } else {
                const lineCount = (editor.value.match(/\n/g) || []).length + 1;
                editor.style.height = (lineCount * 26 + 40) + 'px'; 
            }

            lineNumEl.style.height = editor.style.height;
            const lines = editor.value.split('\n').length;
            let numHtml = '';
            for (let i = 1; i <= lines; i++) {
                numHtml += `<div>${i}</div>`;
            }
            lineNumEl.innerHTML = numHtml;
        }

        // --- 2. VISUALISASI INTERAKTIF (MISI MENCARI RUTE TERPENDEK) ---
        let vNet = null;
        let vNodes = null;
        let vEdges = null;
        let clickedRouteCount = 0;
        let clickedEdgesSet = new Set();

        function initGraphMisi41() {
            const container = document.getElementById('interactive-graph-vis');
            if (!container) return;

            vNodes = new vis.DataSet([
                { id: 'Kayutangi', label: 'Kayutangi\n(Awal)', x: -140, y: 30, fixed: true, shape: 'circle', color: { background: '#1e293b', border: '#0f172a' }, font: { color: 'white', bold: true, size: 12 }, margin: 15 },
                { id: 'Siring', label: 'Siring\n(Transit)', x: 0, y: -90, fixed: true, shape: 'circle', color: { background: '#f8fafc', border: '#cbd5e1' }, font: { color: '#64748b', bold: true, size: 11 }, margin: 12 },
                { id: 'Duta Mall', label: 'Duta Mall\n(Tujuan)', x: 140, y: 30, fixed: true, shape: 'circle', color: { background: '#1e293b', border: '#0f172a' }, font: { color: 'white', bold: true, size: 12 }, margin: 15 },
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
                interaction: { dragNodes: false, dragView: false, zoomView: false, hover: true, selectable: true }
            };

            vNet = new vis.Network(container, { nodes: vNodes, edges: vEdges }, options);
            vNet.once('afterDrawing', () => vNet.fit({ animation: false }));

            const feedbackEl = document.getElementById('graph-feedback');
            const conclusionEl = document.getElementById('misi-conclusion');
            
            vNet.on("click", function (params) {
                if (params.edges.length > 0) {
                    const edgeId = params.edges[0];
                    if (edgeId === 'K_D') {
                        vEdges.update({ id: 'K_D', color: '#ef4444', width: 5 }); 
                        vEdges.update([{ id: 'K_S', color: '#cbd5e1', width: 3 }, { id: 'S_D', color: '#cbd5e1', width: 3 }]); 
                        vNodes.update({ id: 'Siring', color: { background: '#f8fafc', border: '#cbd5e1' }, font: { color: '#64748b'} });
                        clickedEdgesSet.clear();
                        if(conclusionEl) conclusionEl.classList.add('hidden');
                        
                        feedbackEl.className = "absolute bottom-3 inset-x-3 bg-red-50 dark:bg-red-950/40 border border-red-300 dark:border-red-700 rounded-lg p-3 text-center text-xs font-bold text-red-600 dark:text-red-400 shadow-md z-20 transition-colors";
                        feedbackEl.innerHTML = "Kurang Tepat! Jalur lurus ini berjarak 10 KM. Coba cari kombinasi rute yang total jaraknya lebih kecil.";
                    } 
                    else if (edgeId === 'K_S' || edgeId === 'S_D') {
                        clickedEdgesSet.add(edgeId);
                        vEdges.update({ id: edgeId, color: '#22c55e', width: 5, font: {color: '#15803d'} }); 
                        vNodes.update({ id: 'Siring', color: { background: '#dcfce7', border: '#22c55e' }, font: { color: '#166534'} });
                        vEdges.update({ id: 'K_D', color: '#cbd5e1', width: 3 });
                        
                        if (clickedEdgesSet.has('K_S') && clickedEdgesSet.has('S_D')) {
                            feedbackEl.className = "absolute bottom-3 inset-x-3 bg-green-50 dark:bg-green-950/40 border border-green-300 dark:border-green-700 rounded-lg p-3 text-center text-xs font-bold text-green-700 dark:text-green-400 shadow-md z-20 transition-colors";
                            feedbackEl.innerHTML = "TEPAT SEKALI! (5 KM + 2 KM = 7 KM). Total jaraknya lebih pendek!";
                            if(conclusionEl) conclusionEl.classList.remove('hidden'); 
                        } else {
                            feedbackEl.className = "absolute bottom-3 inset-x-3 bg-blue-50 dark:bg-blue-950/40 border border-blue-300 dark:border-blue-700 rounded-lg p-3 text-center text-xs font-bold text-blue-700 dark:text-blue-400 shadow-md z-20 transition-colors";
                            feedbackEl.innerHTML = "Bagus! Silakan klik satu jalur lagi untuk melengkapi rute sampai ke Duta Mall.";
                        }
                    }
                }
            });
        }

        function cleanCodeStr(str) {
            return str.replace(/\s+/g, '').replace(/'/g, '"');
        }

        // --- 4. INIT & PERSISTENCE ---
        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(initGraphMisi41, 300);

            const edDemo = document.getElementById('editor-demo41');
            if (edDemo) edDemo.addEventListener('input', window.syncLineNumbersDemo41);

            const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
            
            // Cek Status Sandbox Demo (PERSISTENCE SAFE)
            if (localStorage.getItem('materi4_demo_' + userId) === 'true') {
                const outDemoText = document.getElementById('output-demo41');
                const statusDemo = document.getElementById('status-demo41');
                const btnDemo = document.getElementById('btn-demo41');
                
                if (edDemo && outDemoText && statusDemo && btnDemo) {
                    edDemo.value = localStorage.getItem('materi4_demo_code_' + userId) || "";
                    
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

                    unlockSection41(true); 
                    setTimeout(window.syncLineNumbersDemo41, 100);
                }
            } else {
                setTimeout(window.syncLineNumbersDemo41, 100);
            }

            // Cek Status Aktivitas (PERSISTENCE SAFE)
            const isDoneServer = {{ isset($progress['4.1']) && $progress['4.1']->score == 100 ? 'true' : 'false' }};
            const isDoneLocal1 = localStorage.getItem('act_4_1_1_done_v2_' + userId) === 'true';
            const isDoneLocal2 = localStorage.getItem('act_4_1_2_done_v2_' + userId) === 'true';
            const isDoneLocal3 = localStorage.getItem('act_4_1_3_done_v2_' + userId) === 'true';

            if (isDoneServer || isDoneLocal1) {
                window.kunciJawabanAktivitas41_1(localStorage.getItem('act_4_1_1_ans1_v2_' + userId), localStorage.getItem('act_4_1_1_ans2_v2_' + userId));
            }
            if (isDoneServer || isDoneLocal2) {
                window.kunciJawabanAktivitas41_2(localStorage.getItem('act_4_1_2_ans1_v2_' + userId), localStorage.getItem('act_4_1_2_ans2_v2_' + userId));
            }
            if (isDoneServer || isDoneLocal3) {
                window.kunciJawabanAktivitas41_3(localStorage.getItem('act_4_1_3_ans1_v2_' + userId), localStorage.getItem('act_4_1_3_ans2_v2_' + userId));
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
                let stdout = py.runPython('sys.stdout.getvalue()').trim();
                
                const clean = cleanCodeStr(code.replace(/#.*/g, ''));
                const hasDict = clean.includes('graf_rute={"Kayutangi":{"Siring":5,"DutaMall":10},"Siring":{"Kayutangi":5,"DutaMall":2},"DutaMall":{"Siring":2,"Kayutangi":10}}');
                const hasExtract = clean.includes('jarak=graf_rute["Kayutangi"]["Siring"]');
                const hasPrint = stdout.includes("Jarak tempuh: 5");

                if (hasDict && hasExtract && hasPrint) {
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
                    
                    unlockSection41(false); 
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

        // FUNGSI MEMBUKA KUNCI WRAPPER AKTIVITAS 4.1
        function unlockSection41(isInstant = false) {
            const section = document.getElementById('locked-section-41');
            const overlay = document.getElementById('lock-overlay-41');
            const btnAct1 = document.getElementById('btnRunAct41_1');
            const in1_1 = document.getElementById('input41_1_1');
            const in1_2 = document.getElementById('input41_1_2');

            if(section) {
                section.classList.remove('locked-content');
                section.classList.add('unlocked-content');
            }
            
            if(overlay) {
                if (isInstant) {
                    overlay.style.display = 'none';
                } else {
                    overlay.classList.add('opacity-0');
                    setTimeout(() => { overlay.classList.add('hidden'); }, 500);
                    
                    setTimeout(() => { 
                        const explanationBox = document.getElementById('explanation-box-41');
                        if (explanationBox) {
                            explanationBox.scrollIntoView({ behavior: 'smooth', block: 'center' }); 
                        }
                    }, 600);
                }
            }

            if(btnAct1) btnAct1.disabled = false;
            if(in1_1) in1_1.disabled = false;
            if(in1_2) in1_2.disabled = false;
        }

        // --- 6. VALIDATOR AKTIVITAS 4.1 (SOAL 1) ---
        window.runAktivitas41_1 = async function() {
            const in1 = document.getElementById('input41_1_1').value.trim();
            const in2 = document.getElementById('input41_1_2').value.trim();
            const alertBox = document.getElementById('alert-41-1');
            const consoleText = document.getElementById('console-text-41-1');
            const statusTerm = document.getElementById('status-terminal-41-1');
            const btnRun = document.getElementById('btnRunAct41_1');

            if(!consoleText || !alertBox || !statusTerm || !btnRun) return;
            consoleText.classList.remove('italic', 'opacity-60');

            if(in1 === "" || in2 === "") {
                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-yellow-50 dark:bg-yellow-950/40 text-yellow-800 dark:text-yellow-400 border-yellow-200 dark:border-yellow-800 text-left transition-colors";
                alertBox.innerHTML = "Error: Syntax Tidak Lengkap. Masih ada kotak input yang kosong.";
                alertBox.classList.remove('hidden');
                consoleText.innerHTML = "SyntaxError: Key cannot be empty.";
                consoleText.className = "text-[#ff5f56] whitespace-pre-wrap break-words leading-relaxed text-sm text-left block";
                return;
            }

            btnRun.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Memproses...';
            btnRun.disabled = true;

            try {
                const py = await window.ensurePyodideReady();
                py.runPython(`import sys\nfrom io import StringIO\nsys.stdout = StringIO()`);
                
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
                let stdout = py.runPython('sys.stdout.getvalue()').trim();

                if(stdout.includes("35000") && !stdout.includes("Error")) {
                    const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                    localStorage.setItem('act_4_1_1_done_v2_' + userId, 'true'); 
                    localStorage.setItem('act_4_1_1_ans1_v2_' + userId, in1);
                    localStorage.setItem('act_4_1_1_ans2_v2_' + userId, in2);

                    alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-green-50 dark:bg-green-950/40 text-green-800 dark:text-green-400 border-green-400 dark:border-green-800 text-left transition-colors";
                    alertBox.innerHTML = "Kompilasi Berhasil! Anda sukses mengekstrak tarif sebesar 35000.";
                    alertBox.classList.remove('hidden');

                    statusTerm.innerText = "Success";
                    statusTerm.className = "bg-green-700 text-white px-2 py-0.5 rounded text-[10px]";

                    consoleText.className = "text-[#4af626] whitespace-pre-wrap break-words leading-relaxed text-sm text-left block font-bold";
                    consoleText.innerHTML = `
                        <div class="mb-1 text-slate-400 font-normal">&gt; python main.py</div>
                        <div>${stdout.replace(/\n/g, '<br>')}</div>
                    `;

                    window.kunciJawabanAktivitas41_1(in1, in2);

                } else {
                    statusTerm.innerText = "KeyError";
                    statusTerm.className = "bg-amber-600 text-white px-2 py-0.5 rounded text-[10px]";
                    
                    consoleText.className = "text-[#ff5f56] whitespace-pre-wrap break-words leading-relaxed text-sm text-left block";
                    consoleText.innerHTML = `
                        <div class="mb-1 text-slate-400">&gt; python main.py</div>
                        <div>${stdout.replace(/\n/g, '<br>')}</div>
                    `;

                    alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-amber-50 dark:bg-amber-950/40 text-amber-800 dark:text-amber-400 border-amber-300 dark:border-amber-800 text-left transition-colors";
                    
                    if(in1 === "Pelabuhan" && in2 === "Bandara") {
                        alertBox.innerHTML = "Syntax Error: Ingat, teks (string) harus diapit dengan tanda petik ganda <code>\" \"</code> atau tunggal <code>' '</code>.";
                    } else {
                        alertBox.innerHTML = "KeyError: Kunci lokasi yang Anda panggil salah atau tidak ada dalam Nested Dictionary.";
                    }
                    alertBox.classList.remove('hidden');
                }

            } catch (err) {
                consoleText.className = "text-[#ff5f56] whitespace-pre-wrap break-words leading-relaxed text-sm text-left block";
                consoleText.innerHTML = "Traceback (most recent call last):<br>" + err.message;
                statusTerm.innerText = "Error";
                statusTerm.className = "bg-red-800 text-red-200 px-2 py-0.5 rounded text-[10px]";

                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-red-50 dark:bg-red-950/40 text-red-800 dark:text-red-400 border-red-300 dark:border-red-800 text-left transition-colors";
                alertBox.innerHTML = "Syntax Error: Terdapat kesalahan ketik pada input Anda (pastikan pakai tanda petik).";
                alertBox.classList.remove('hidden');
            } finally {
                if (btnRun.innerHTML.includes('Memproses')) {
                    btnRun.innerHTML = 'Jalankan & Periksa';
                    btnRun.disabled = false;
                }
            }
        }


        // --- 7. VALIDATOR AKTIVITAS 4.1 (SOAL 2) ---
        window.runAktivitas41_2 = async function() {
            const in1 = document.getElementById('input41_2_1').value.trim();
            const in2 = document.getElementById('input41_2_2').value.trim();
            const alertBox = document.getElementById('alert-41-2');
            const consoleText = document.getElementById('console-text-41-2');
            const statusTerm = document.getElementById('status-terminal-41-2');
            const btnRun = document.getElementById('btnRunAct41_2');

            consoleText.classList.remove('italic', 'opacity-60');

            if(in1 === "" || in2 === "") {
                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-yellow-50 dark:bg-yellow-950/40 text-yellow-800 dark:text-yellow-400 border-yellow-200 dark:border-yellow-800 text-left transition-colors";
                alertBox.innerHTML = "Error: Syntax Tidak Lengkap. Masih ada kotak input yang kosong.";
                alertBox.classList.remove('hidden');
                consoleText.innerHTML = "SyntaxError: Values cannot be empty.";
                consoleText.className = "text-[#ff5f56] whitespace-pre-wrap break-words leading-relaxed text-sm text-left block";
                return;
            }

            btnRun.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Memproses...';
            btnRun.disabled = true;

            try {
                const py = await window.ensurePyodideReady();
                py.runPython(`import sys\nfrom io import StringIO\nsys.stdout = StringIO()`);
                
                const pythonCode = `
tarif_ojek = {
    "Stasiun": {"Pelabuhan": 15000},
    "Kampus": {}
}
try:
    tarif_ojek["Stasiun"][${in1}] = ${in2}
    print("Rute dari Stasiun:", tarif_ojek["Stasiun"])
except Exception as e:
    print("Error:", e)
`;
                
                py.runPython(pythonCode);
                let stdout = py.runPython('sys.stdout.getvalue()').trim();

                if(stdout.includes("'Kampus': 12000") && !stdout.includes("Error")) {
                    const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                    localStorage.setItem('act_4_1_2_done_v2_' + userId, 'true'); 
                    localStorage.setItem('act_4_1_2_ans1_v2_' + userId, in1);
                    localStorage.setItem('act_4_1_2_ans2_v2_' + userId, in2);

                    alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-green-50 dark:bg-green-950/40 text-green-800 dark:text-green-400 border-green-400 dark:border-green-800 text-left transition-colors";
                    alertBox.innerHTML = "Kompilasi Berhasil! Rute baru menuju Kampus berhasil ditambahkan ke dalam memori Stasiun.";
                    alertBox.classList.remove('hidden');

                    statusTerm.innerText = "Success";
                    statusTerm.className = "bg-green-700 text-white px-2 py-0.5 rounded text-[10px]";

                    consoleText.className = "text-[#4af626] whitespace-pre-wrap break-words leading-relaxed text-sm text-left block font-bold";
                    consoleText.innerHTML = `
                        <div class="mb-1 text-slate-400 font-normal">&gt; python main.py</div>
                        <div>${stdout.replace(/\n/g, '<br>')}</div>
                    `;

                    window.kunciJawabanAktivitas41_2(in1, in2);

                } else {
                    statusTerm.innerText = "Logic Error";
                    statusTerm.className = "bg-amber-600 text-white px-2 py-0.5 rounded text-[10px]";
                    
                    consoleText.className = "text-[#ff5f56] whitespace-pre-wrap break-words leading-relaxed text-sm text-left block";
                    consoleText.innerHTML = `
                        <div class="mb-1 text-slate-400">&gt; python main.py</div>
                        <div>${stdout.replace(/\n/g, '<br>')}</div>
                    `;

                    alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-amber-50 dark:bg-amber-950/40 text-amber-800 dark:text-amber-400 border-amber-300 dark:border-amber-800 text-left transition-colors";
                    alertBox.innerHTML = "Logika Salah: Pastikan rute yang ditambahkan adalah 'Kampus' (dengan tanda petik) dan tarifnya 12000 (tanpa tanda petik).";
                    alertBox.classList.remove('hidden');
                }

            } catch (err) {
                consoleText.className = "text-[#ff5f56] whitespace-pre-wrap break-words leading-relaxed text-sm text-left block";
                consoleText.innerHTML = "Traceback (most recent call last):<br>" + err.message;
                statusTerm.innerText = "Error";
                statusTerm.className = "bg-red-800 text-red-200 px-2 py-0.5 rounded text-[10px]";

                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-red-50 dark:bg-red-950/40 text-red-800 dark:text-red-400 border-red-300 dark:border-red-800 text-left transition-colors";
                alertBox.innerHTML = "Syntax Error: Terdapat kesalahan ketik pada input Anda.";
                alertBox.classList.remove('hidden');
            } finally {
                if (btnRun.innerHTML.includes('Memproses')) {
                    btnRun.innerHTML = 'Jalankan & Periksa';
                    btnRun.disabled = false;
                }
            }
        }


        // --- 8. VALIDATOR AKTIVITAS 4.1 (SOAL 3) ---
        window.runAktivitas41_3 = async function() {
            const in1 = document.getElementById('input41_3_1').value.trim();
            const in2 = document.getElementById('input41_3_2').value.trim();
            const alertBox = document.getElementById('alert-41-3');
            const consoleText = document.getElementById('console-text-41-3');
            const statusTerm = document.getElementById('status-terminal-41-3');
            const btnRun = document.getElementById('btnRunAct41_3');

            consoleText.classList.remove('italic', 'opacity-60');

            if(in1 === "" || in2 === "") {
                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-yellow-50 dark:bg-yellow-950/40 text-yellow-800 dark:text-yellow-400 border-yellow-200 dark:border-yellow-800 text-left transition-colors";
                alertBox.innerHTML = "Error: Syntax Tidak Lengkap. Masih ada kotak input yang kosong.";
                alertBox.classList.remove('hidden');
                consoleText.innerHTML = "SyntaxError: Key cannot be empty.";
                consoleText.className = "text-[#ff5f56] whitespace-pre-wrap break-words leading-relaxed text-sm text-left block";
                return;
            }

            btnRun.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Memproses...';
            btnRun.disabled = true;

            try {
                const py = await window.ensurePyodideReady();
                py.runPython(`import sys\nfrom io import StringIO\nsys.stdout = StringIO()`);
                
                const pythonCode = `
tarif_ojek = {
    "Pelabuhan": {"Stasiun": 15000, "Bandara": 35000}
}
try:
    tarif_ojek[${in1}][${in2}] = 25000
    print("Tarif Pelabuhan ke Stasiun sekarang:", tarif_ojek["Pelabuhan"]["Stasiun"])
except Exception as e:
    print("Error:", e)
`;
                
                py.runPython(pythonCode);
                let stdout = py.runPython('sys.stdout.getvalue()').trim();

                if(stdout.includes("25000") && !stdout.includes("Error")) {
                    const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                    localStorage.setItem('act_4_1_3_done_v2_' + userId, 'true'); 
                    localStorage.setItem('act_4_1_3_ans1_v2_' + userId, in1);
                    localStorage.setItem('act_4_1_3_ans2_v2_' + userId, in2);

                    alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-green-50 dark:bg-green-950/40 text-green-800 dark:text-green-400 border-green-400 dark:border-green-800 text-left transition-colors";
                    alertBox.innerHTML = "Kompilasi Berhasil! Tarif rute Pelabuhan -> Stasiun sukses di-update.";
                    alertBox.classList.remove('hidden');

                    statusTerm.innerText = "Success";
                    statusTerm.className = "bg-green-700 text-white px-2 py-0.5 rounded text-[10px]";

                    consoleText.className = "text-[#4af626] whitespace-pre-wrap break-words leading-relaxed text-sm text-left block font-bold";
                    consoleText.innerHTML = `
                        <div class="mb-1 text-slate-400 font-normal">&gt; python main.py</div>
                        <div>${stdout.replace(/\n/g, '<br>')}</div>
                    `;

                    window.kunciJawabanAktivitas41_3(in1, in2);

                    // TEMBAK DB KETIKA KETIGANYA SELESAI
                    fetch("{{ route('submit.score') }}", { 
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
                    }).catch(error => { console.error("GAGAL SIMPAN KE DB:", error); });

                } else {
                    statusTerm.innerText = "Logic Error";
                    statusTerm.className = "bg-amber-600 text-white px-2 py-0.5 rounded text-[10px]";
                    
                    consoleText.className = "text-[#ff5f56] whitespace-pre-wrap break-words leading-relaxed text-sm text-left block";
                    consoleText.innerHTML = `
                        <div class="mb-1 text-slate-400">&gt; python main.py</div>
                        <div>${stdout.replace(/\n/g, '<br>')}</div>
                    `;

                    alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-amber-50 dark:bg-amber-950/40 text-amber-800 dark:text-amber-400 border-amber-300 dark:border-amber-800 text-left transition-colors";
                    alertBox.innerHTML = "KeyError: Pastikan Anda menargetkan kunci asal 'Pelabuhan' lalu ke 'Stasiun'.";
                    alertBox.classList.remove('hidden');
                }

            } catch (err) {
                consoleText.className = "text-[#ff5f56] whitespace-pre-wrap break-words leading-relaxed text-sm text-left block";
                consoleText.innerHTML = "Traceback (most recent call last):<br>" + err.message;
                statusTerm.innerText = "Error";
                statusTerm.className = "bg-red-800 text-red-200 px-2 py-0.5 rounded text-[10px]";

                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-red-50 dark:bg-red-950/40 text-red-800 dark:text-red-400 border-red-300 dark:border-red-800 text-left transition-colors";
                alertBox.innerHTML = "Syntax Error: Terdapat kesalahan ketik pada input Anda (pastikan pakai tanda petik).";
                alertBox.classList.remove('hidden');
            } finally {
                if (btnRun.innerHTML.includes('Memproses')) {
                    btnRun.innerHTML = 'Jalankan & Periksa';
                    btnRun.disabled = false;
                }
            }
        }


        // --- 9. FUNGSI UPDATE UI JAWABAN BENAR ---
        window.kunciJawabanAktivitas41_1 = function(val1, val2) {
            const in1 = document.getElementById('input41_1_1');
            const in2 = document.getElementById('input41_1_2');
            
            if(in1) {
                in1.value = val1 || '"Pelabuhan"'; 
                in1.disabled = true;
                in1.classList.remove('bg-[#3c3c3c]', 'dark:bg-slate-700', 'text-[#ce9178]', 'border-slate-500', 'dark:border-slate-500');
                in1.classList.add('bg-emerald-500', 'text-white', 'border-emerald-400', 'font-bold', 'cursor-not-allowed', 'shadow-md');
            }
            if(in2) {
                in2.value = val2 || '"Bandara"'; 
                in2.disabled = true;
                in2.classList.remove('bg-[#3c3c3c]', 'dark:bg-slate-700', 'text-[#ce9178]', 'border-slate-500', 'dark:border-slate-500');
                in2.classList.add('bg-emerald-500', 'text-white', 'border-emerald-400', 'font-bold', 'cursor-not-allowed', 'shadow-md');
            }

            const btnRun = document.getElementById('btnRunAct41_1');
            if(btnRun) {
                btnRun.innerHTML = 'Diselesaikan';
                btnRun.classList.replace('bg-yellow-600', 'bg-slate-600');
                btnRun.classList.replace('hover:bg-yellow-500', 'cursor-not-allowed');
                btnRun.disabled = true;
            }

            const consoleText = document.getElementById('console-text-41-1');
            if (consoleText && consoleText.innerHTML.includes('Output terminal')) {
                 consoleText.classList.remove('italic', 'opacity-60');
                 consoleText.className = "text-[#4af626] whitespace-pre-wrap break-words leading-relaxed text-sm text-left block font-bold";
                 consoleText.innerHTML = `
                    <div class="mb-1 text-slate-400 font-normal">&gt; python main.py</div>
                    <div>Tarif yang harus dibayar: Rp 35000</div>
                 `;
            }

            const feedbackEdu = document.getElementById('feedback-edukatif-41-1');
            if(feedbackEdu) feedbackEdu.classList.remove('hidden');

            document.getElementById('activity-41-2-container').classList.remove('opacity-50', 'pointer-events-none');
        }

        window.kunciJawabanAktivitas41_2 = function(val1, val2) {
            const in1 = document.getElementById('input41_2_1');
            const in2 = document.getElementById('input41_2_2');
            
            if(in1) {
                in1.value = val1 || '"Kampus"'; 
                in1.disabled = true;
                in1.classList.remove('bg-[#3c3c3c]', 'dark:bg-slate-700', 'text-[#ce9178]', 'border-slate-500', 'dark:border-slate-500');
                in1.classList.add('bg-emerald-500', 'text-white', 'border-emerald-400', 'font-bold', 'cursor-not-allowed', 'shadow-md');
            }
            if(in2) {
                in2.value = val2 || '12000'; 
                in2.disabled = true;
                in2.classList.remove('bg-[#3c3c3c]', 'dark:bg-slate-700', 'text-[#b5cea8]', 'border-slate-500', 'dark:border-slate-500');
                in2.classList.add('bg-emerald-500', 'text-white', 'border-emerald-400', 'font-bold', 'cursor-not-allowed', 'shadow-md');
            }

            const btnRun = document.getElementById('btnRunAct41_2');
            if(btnRun) {
                btnRun.innerHTML = 'Diselesaikan';
                btnRun.classList.replace('bg-yellow-600', 'bg-slate-600');
                btnRun.classList.replace('hover:bg-yellow-500', 'cursor-not-allowed');
                btnRun.disabled = true;
            }

            const consoleText = document.getElementById('console-text-41-2');
            if (consoleText && consoleText.innerHTML.includes('Output terminal')) {
                 consoleText.classList.remove('italic', 'opacity-60');
                 consoleText.className = "text-[#4af626] whitespace-pre-wrap break-words leading-relaxed text-sm text-left block font-bold";
                 consoleText.innerHTML = `
                    <div class="mb-1 text-slate-400 font-normal">&gt; python main.py</div>
                    <div>Rute dari Stasiun: {'Pelabuhan': 15000, 'Kampus': 12000}</div>
                 `;
            }

            const feedbackEdu = document.getElementById('feedback-edukatif-41-2');
            if(feedbackEdu) feedbackEdu.classList.remove('hidden');

            document.getElementById('activity-41-3-container').classList.remove('opacity-50', 'pointer-events-none');
        }

        window.kunciJawabanAktivitas41_3 = function(val1, val2) {
            const in1 = document.getElementById('input41_3_1');
            const in2 = document.getElementById('input41_3_2');
            
            if(in1) {
                in1.value = val1 || '"Pelabuhan"'; 
                in1.disabled = true;
                in1.classList.remove('bg-[#3c3c3c]', 'dark:bg-slate-700', 'text-[#ce9178]', 'border-slate-500', 'dark:border-slate-500');
                in1.classList.add('bg-emerald-500', 'text-white', 'border-emerald-400', 'font-bold', 'cursor-not-allowed', 'shadow-md');
            }
            if(in2) {
                in2.value = val2 || '"Stasiun"'; 
                in2.disabled = true;
                in2.classList.remove('bg-[#3c3c3c]', 'dark:bg-slate-700', 'text-[#ce9178]', 'border-slate-500', 'dark:border-slate-500');
                in2.classList.add('bg-emerald-500', 'text-white', 'border-emerald-400', 'font-bold', 'cursor-not-allowed', 'shadow-md');
            }

            const btnRun = document.getElementById('btnRunAct41_3');
            if(btnRun) {
                btnRun.innerHTML = 'Diselesaikan';
                btnRun.classList.replace('bg-yellow-600', 'bg-slate-600');
                btnRun.classList.replace('hover:bg-yellow-500', 'cursor-not-allowed');
                btnRun.disabled = true;
            }

            const consoleText = document.getElementById('console-text-41-3');
            if (consoleText && consoleText.innerHTML.includes('Output terminal')) {
                 consoleText.classList.remove('italic', 'opacity-60');
                 consoleText.className = "text-[#4af626] whitespace-pre-wrap break-words leading-relaxed text-sm text-left block font-bold";
                 consoleText.innerHTML = `
                    <div class="mb-1 text-slate-400 font-normal">&gt; python main.py</div>
                    <div>Tarif Pelabuhan ke Stasiun sekarang: 25000</div>
                 `;
            }

            const feedbackEdu = document.getElementById('feedback-edukatif-41-3');
            if(feedbackEdu) feedbackEdu.classList.remove('hidden');

            const btnNext = document.getElementById('btnNext41');
            if(btnNext) {
                btnNext.disabled = false;
                btnNext.classList.remove('opacity-50', 'cursor-not-allowed', 'bg-slate-900');
                btnNext.classList.add('bg-blue-600', 'hover:bg-blue-700');
            }
            
            const badgeAct = document.getElementById('badge-act41');
            if(badgeAct) badgeAct.classList.remove('hidden');
        }
    </script>
</section>