<section id="step-3" class="step-slide">
    {{-- IMPORT VIS JS --}}
    <script type="text/javascript" src="https://unpkg.com/vis-network/standalone/umd/vis-network.min.js"></script>

    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-8 md:p-10 max-w-6xl mx-auto -mt-8">
        
        {{-- JUDUL MATERI --}}
        <div class="border-b border-slate-200 pb-6 mb-8">
            <h2 class="text-2xl md:text-3xl font-bold text-slate-900 mb-2">2.3 Adjacency Matrix (Matriks Ketetanggaan)</h2>
            <p class="text-slate-500 font-medium text-justify">Merepresentasikan Graf menggunakan format Array atau List 2 Dimensi (Baris & Kolom).</p>
        </div>

        {{-- PENGANTAR TEORI --}}
        <div class="prose prose-slate text-slate-700 leading-relaxed text-justify mb-8 max-w-none">
            <p>
                Selain menggunakan <em>Dictionary</em>, graf juga dapat direpresentasikan menggunakan format Matrix 2 Dimensi (Baris dan Kolom). Di Python, matriks direpresentasikan menggunakan <strong>List di dalam List</strong>.
            </p>
            <p>
                Format matriks sangat sempurna untuk memodelkan <strong>Graf Berbobot</strong> (<em>Weighted Graph</em>), di mana isi matriks bukanlah sekadar status terhubung (1 atau 0), melainkan diisi dengan angka bobot yang merepresentasikan jarak (KM), biaya, atau waktu tempuh.
            </p>

            <div class="bg-amber-50 border-l-4 border-amber-500 p-5 rounded-r-lg mt-6 mb-6 shadow-inner">
                <h4 class="font-bold text-amber-900 mb-2 text-sm uppercase tracking-wider flex items-center gap-2">
                    <i class="fa-solid fa-list-ol"></i> Aturan Penulisan Adjacency Matrix:
                </h4>
                <ul class="list-disc list-outside ml-4 text-amber-900 space-y-1.5 text-sm">
                    <li>Indeks <strong>Baris</strong> mewakili <strong>Simpul Asal</strong> (Dari).</li>
                    <li>Indeks <strong>Kolom</strong> mewakili <strong>Simpul Tujuan</strong> (Ke).</li>
                    <li>Angka <strong>0</strong> menandakan tidak ada jalur langsung antar simpul tersebut.</li>
                    <li>Angka <strong>selain nol</strong> menandakan adanya jalur beserta <strong>Bobot/Jarak</strong>-nya.</li>
                </ul>
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- UI WEB: INTERAKTIF VIS.JS & MATRIX SYNC --}}
        {{-- ========================================== --}}
        <div class="bg-slate-50 p-6 rounded-xl border border-slate-200 shadow-inner mb-8 overflow-hidden">
            <div class="border-b border-slate-200 pb-4 mb-5 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h3 class="font-bold text-slate-800 text-sm"><i class="fa-solid fa-table-cells text-indigo-500 mr-2"></i> Interaktif: Sinkronisasi Graf Berbobot ke Matrix</h3>
                    <p class="text-xs text-slate-500 mt-1"><em>Klik murni pada <strong>garis (sisi) KM</strong> di graf untuk melihat letak datanya di tabel!</em></p>
                </div>
                <div class="shrink-0 font-mono text-[10px] bg-indigo-100 text-indigo-700 px-3 py-1.5 rounded border border-indigo-200 shadow-sm uppercase font-bold tracking-widest text-center">
                    Tak Berarah
                </div>
            </div>

            <div class="grid lg:grid-cols-2 gap-6 items-stretch">
                {{-- Canvas Vis.js --}}
                <div class="bg-white rounded-lg border border-slate-300 shadow-sm h-[280px] relative overflow-hidden flex flex-col transition-all">
                    <div id="vis_matrix_23" class="w-full flex-1 cursor-default outline-none"></div>
                </div>

                {{-- Visualisasi Tabel Matriks --}}
                <div class="bg-white rounded-lg border border-slate-300 shadow-sm p-4 h-[280px] flex flex-col justify-between">
                    <table class="w-full text-center border-collapse text-xs md:text-sm border border-slate-300 rounded-lg overflow-hidden">
                        <thead class="bg-slate-100 border-b border-slate-300">
                            <tr class="divide-x divide-slate-300">
                                <th class="p-2 text-slate-500 text-[10px] font-semibold">Asal \ Tujuan</th>
                                <th class="p-2 text-slate-800 font-bold w-1/4 leading-tight">0<br><span class="text-[9px] font-normal text-slate-500">Jakarta</span></th>
                                <th class="p-2 text-slate-800 font-bold w-1/4 leading-tight">1<br><span class="text-[9px] font-normal text-slate-500">Bandung</span></th>
                                <th class="p-2 text-slate-800 font-bold w-1/4 leading-tight">2<br><span class="text-[9px] font-normal text-slate-500">Semarang</span></th>
                            </tr>
                        </thead>
                        <tbody class="text-sm font-mono divide-y divide-slate-200">
                            <tr class="divide-x divide-slate-200 bg-white">
                                <th class="p-2 bg-slate-50 text-slate-700 text-left pl-3 leading-tight border-r border-slate-300">0 <span class="text-[9px] font-normal text-slate-400 ml-1">Jakarta</span></th>
                                <td id="cell-0-0" class="p-2 transition-all duration-300 text-slate-300 font-normal">0</td>
                                <td id="cell-0-1" class="p-2 transition-all duration-300 text-slate-800 font-bold">150</td>
                                <td id="cell-0-2" class="p-2 transition-all duration-300 text-slate-300 font-normal">0</td>
                            </tr>
                            <tr class="divide-x divide-slate-200 bg-slate-50/50">
                                <th class="p-2 bg-slate-50 text-slate-700 text-left pl-3 leading-tight border-r border-slate-300">1 <span class="text-[9px] font-normal text-slate-400 ml-1">Bandung</span></th>
                                <td id="cell-1-0" class="p-2 transition-all duration-300 text-slate-800 font-bold">150</td>
                                <td id="cell-1-1" class="p-2 transition-all duration-300 text-slate-300 font-normal">0</td>
                                <td id="cell-1-2" class="p-2 transition-all duration-300 text-slate-800 font-bold">250</td>
                            </tr>
                            <tr class="divide-x divide-slate-200 bg-white">
                                <th class="p-2 bg-slate-50 text-slate-700 text-left pl-3 leading-tight border-r border-slate-300">2 <span class="text-[9px] font-normal text-slate-400 ml-1">Semarang</span></th>
                                <td id="cell-2-0" class="p-2 transition-all duration-300 text-slate-300 font-normal">0</td>
                                <td id="cell-2-1" class="p-2 transition-all duration-300 text-slate-800 font-bold">250</td>
                                <td id="cell-2-2" class="p-2 transition-all duration-300 text-slate-300 font-normal">0</td>
                            </tr>
                        </tbody>
                    </table>
                    <div id="info-matrix-23" class="mt-4 text-[11px] text-center text-slate-500 bg-slate-100 px-3 py-2 rounded border border-slate-200 h-[46px] flex items-center justify-center transition-colors">
                        <em>Pilih murni pada garis (sisi) di graf untuk melihat letak data.</em>
                    </div>
                </div>
            </div>

            {{-- PENJELASAN VISUALISASI AGAR MAHASISWA PAHAM --}}
            <div class="mt-6 bg-white p-5 rounded-lg border border-slate-200 shadow-sm">
                <h4 class="font-bold text-slate-800 text-sm mb-2 flex items-center gap-2">
                    <i class="fa-solid fa-microscope text-indigo-500"></i> Analisis Visual: Cara Membaca Matriks
                </h4>
                <ul class="list-disc list-outside ml-4 text-sm text-slate-600 space-y-2 text-justify">
                    <li><strong>Mencari Jarak:</strong> Tarik garis dari Baris (Kota Asal) ke kanan, lalu cari titik persilangannya dengan Kolom (Kota Tujuan). Contoh: Baris 1 (Bandung) menyilang dengan Kolom 2 (Semarang) di angka <strong>250</strong>.</li>
                    <li><strong>Diagonal Nol:</strong> Perhatikan deretan angka <code>0</code> yang membelah tabel miring dari kiri atas ke kanan bawah. Itu terjadi karena jarak dari sebuah kota ke kota itu sendiri selalu 0 (tidak ada jalur <em>self-loop</em>).</li>
                    <li><strong>Efek Cermin (Simetris):</strong> Karena graf ini <strong>Tak Berarah (Dua Arah)</strong>, nilai di atas garis diagonal sama persis dengan di bawahnya. Jarak Jakarta &rarr; Bandung (150) sama dengan Bandung &rarr; Jakarta (150).</li>
                </ul>
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- CONTOH KODE PROGRAM (FULL VIEW & ANTI COPY) --}}
        {{-- ========================================== --}}
        <div class="mb-10">
            <h3 class="text-lg font-bold text-slate-800 mb-3">Contoh Kode Program:</h3>
            
            <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 select-none flex flex-col h-auto">
                <div class="bg-[#2d2d2d] px-4 py-2.5 flex items-center gap-2 border-b border-slate-700 shrink-0">
                    <div class="w-2.5 h-2.5 rounded-full bg-[#ff5f56]"></div>
                    <div class="w-2.5 h-2.5 rounded-full bg-[#ffbd2e]"></div>
                    <div class="w-2.5 h-2.5 rounded-full bg-[#27c93f]"></div>
                    <span class="text-slate-400 text-[10px] ml-2 font-mono">graf_matriks.py (Hanya Baca)</span>
                </div>
                
                <div class="p-6 font-mono text-[12px] md:text-sm leading-loose text-[#d4d4d4] flex-1">
                    <div class="text-[#6a9955]"># Matriks 3x3 untuk Graf Berbobot (Jarak dalam KM)</div>
                    <div class="text-[#6a9955]"># Keterangan Indeks: 0 (Jakarta), 1 (Bandung), 2 (Semarang)</div>
                    <div><span class="text-[#9cdcfe]">matrix_bobot</span> = [</div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;[<span class="text-[#b5cea8]">0</span>, <span class="text-[#b5cea8]">150</span>, <span class="text-[#b5cea8]">0</span>],&nbsp;&nbsp;<span class="text-[#6a9955]"># Baris 0 (Jakarta): Jarak ke Bandung = 150 KM</span></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;[<span class="text-[#b5cea8]">150</span>, <span class="text-[#b5cea8]">0</span>, <span class="text-[#b5cea8]">250</span>],&nbsp;&nbsp;<span class="text-[#6a9955]"># Baris 1 (Bandung): Ke JKT = 150 KM, SMG = 250 KM</span></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;[<span class="text-[#b5cea8]">0</span>, <span class="text-[#b5cea8]">250</span>, <span class="text-[#b5cea8]">0</span>]&nbsp;&nbsp;&nbsp;<span class="text-[#6a9955]"># Baris 2 (Semarang): Jarak ke Bandung = 250 KM</span></div>
                    <div>]</div>
                    <br>
                    <div class="text-[#6a9955]"># Rumus membaca matriks: nama_variabel[baris][kolom]</div>
                    <div class="text-[#6a9955]"># Mencari jarak dari Bandung (Indeks 1) ke Semarang (Indeks 2)</div>
                    <div><span class="text-[#9cdcfe]">jarak</span> = <span class="text-[#9cdcfe]">matrix_bobot</span>[<span class="text-[#b5cea8]">1</span>][<span class="text-[#b5cea8]">2</span>]</div>
                    <br>
                    <div><span class="text-[#dcdcaa]">print</span>(<span class="text-[#ce9178]">"Jarak dari Bandung ke Semarang adalah:"</span>, <span class="text-[#9cdcfe]">jarak</span>, <span class="text-[#ce9178]">"KM"</span>)</div>
                </div>
            </div>
        </div>

        {{-- PENJELASAN KODE --}}
        <div class="mt-4 mb-10 bg-slate-50 p-6 rounded-lg border border-slate-200 shadow-sm">
            <h4 class="font-bold text-slate-800 text-sm mb-3">Penjelasan Kode:</h4>
            <ul class="list-disc list-outside ml-4 text-sm text-slate-700 space-y-3 text-justify">
                <li>Komentar pada kode (tanda <code>#</code>) hanya untuk penjelasan agar mudah dipahami. Komentar tidak dijalankan oleh Python, jadi kalau dihapus pun program tetap berjalan normal.</li>
                <li>Komputer membaca <strong>Baris</strong> dari atas ke bawah (mulai dari indeks 0), dan membaca <strong>Kolom</strong> dari kiri ke kanan (mulai dari indeks 0).</li>
                <li>Saat kita menulis <code>matrix_bobot[1][2]</code>, komputer akan turun ke Baris indeks 1 (yaitu daftar <code>[150, 0, 250]</code>), lalu mengambil data di Kolom indeks 2 dari baris tersebut (yaitu angka <code>250</code>).</li>
            </ul>
        </div>


        {{-- ========================================== --}}
        {{-- INTERACTIVE SANDBOX: KETIK ULANG KODE --}}
        {{-- ========================================== --}}
        <div class="mb-10 p-6 border-2 border-indigo-200 bg-indigo-50/30 rounded-xl shadow-sm">
            <h3 class="text-lg font-bold text-slate-800 mb-2 flex items-center gap-2">
                <i class="fa-solid fa-keyboard text-indigo-600"></i> Coba Sendiri!
            </h3>
            <p class="text-sm text-slate-600 mb-4 text-justify">
                Ketik ulang keseluruhan kode pada contoh di atas ke dalam editor di bawah ini (tidak perlu mengetik komentarnya). Biasakan jari Anda dengan sintaks Array 2 Dimensi!
            </p>

            <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 font-mono text-sm relative">
                <div class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700">
                    <span class="text-slate-400 text-xs tracking-wider">Terminal Editor (main.py)</span>
                    <button onclick="window.runSandbox23()" id="btnRunSandbox-23" class="bg-indigo-600 hover:bg-indigo-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors flex items-center gap-2 shadow-sm active:scale-95">
                        <i class="fa-solid fa-play"></i> Jalankan Program
                    </button>
                </div>
                
                {{-- Textarea Editor (FIX AUTO RESIZE & NO SCROLLBAR) --}}
                <textarea id="editor-sandbox-23" class="w-full min-h-[160px] bg-[#1e1e1e] text-[#d4d4d4] p-6 font-mono text-xs md:text-sm outline-none resize-none overflow-hidden leading-relaxed" spellcheck="false" placeholder="# Ketik kode Python di sini..." oninput="window.autoResizeEditor(this)"></textarea>

                {{-- Console Output Sandbox --}}
                <div id="console-sandbox-23" class="hidden border-t border-slate-700 bg-black p-5 text-xs font-mono">
                    <span class="text-slate-400">> root@graflearn: python main.py</span><br>
                    <div id="sandbox-output-text-23" class="mt-2 leading-relaxed"></div>
                </div>
            </div>
        </div>

        {{-- OUTPUT EXPLANATION (MUNCUL SETELAH SANDBOX BERHASIL) --}}
        <div id="output-explanation-23" class="mb-12 hidden transition-all duration-700 border-l-4 border-green-400 pl-6 py-2">
            <h3 class="text-lg font-bold text-slate-800 mb-3">Analisis Output:</h3>
            
            <div class="bg-black text-[#4af626] font-mono text-sm p-4 rounded-lg shadow-inner mb-4 inline-block pr-20 border border-green-900">
                Jarak dari Bandung ke Semarang adalah: 250 KM
            </div>

            <p class="text-sm text-slate-700 text-justify leading-relaxed">
                Output tersebut menunjukkan hasil perhitungan jarak antara Bandung dan Semarang, yaitu sejauh <strong>250 kilometer</strong>. Ini membuktikan program berhasil menampilkan data jarak antar lokasi menggunakan teknik ekstraksi indeks <strong>Baris (Bandung=1)</strong> dan <strong>Kolom (Semarang=2)</strong> pada Array 2 Dimensi.
            </p>
        </div>


        {{-- ========================================== --}}
        {{-- AKTIVITAS 2.3: LIVE CODING EKSTRAKSI MATRIKS --}}
        {{-- ========================================== --}}
        <div id="activity-23-container" class="mt-12 pt-8 border-t-[3px] border-dashed border-slate-200 opacity-50 pointer-events-none transition-opacity duration-500">
            
            <div class="flex items-center gap-3 mb-6">
                <span class="bg-yellow-500 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider shadow-sm">💡 Aktivitas 2.3</span>
                <h3 class="font-bold text-slate-900 text-xl">Live Coding: Ekstraksi Data Matriks</h3>
            </div>

            <div class="bg-indigo-50 border border-indigo-200 rounded-xl p-6 mb-6 shadow-sm">
                <p class="text-sm text-indigo-900 leading-relaxed text-justify mb-3">
                    <strong>Skenario:</strong> Anda adalah analis data logistik yang menggunakan matriks jarak tak berarah antar 3 kota besar. Keterangan Indeks: <strong>0</strong> = Jakarta, <strong>1</strong> = Bandung, <strong>2</strong> = Semarang.
                </p>
                <div class="bg-white/80 p-4 rounded border border-indigo-200 font-medium text-indigo-900 text-sm shadow-sm leading-relaxed">
                    <strong>Tugas Anda:</strong> Ganti tanda tanya (?) pada kode editor di bawah ini menggunakan <strong>indeks baris dan kolom yang tepat</strong> untuk melacak jarak dari <strong>Jakarta (Indeks 0)</strong> menuju <strong>Bandung (Indeks 1)</strong>!
                </div>
            </div>

            {{-- Interactive IDE Fill in the blanks --}}
            <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 font-mono text-sm flex flex-col">
                <div class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700 shrink-0">
                    <span class="text-slate-400 text-xs">Terminal Editor Pyodide</span>
                    <button onclick="window.runAktivitas23()" id="btnRun23" class="bg-green-600 hover:bg-green-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors flex items-center gap-2 shadow-sm active:scale-95">
                        <i class="fa-solid fa-play"></i> Run Code
                    </button>
                </div>
                
                <div class="p-6 leading-relaxed text-[#d4d4d4] overflow-x-auto whitespace-nowrap flex-1 text-xs md:text-sm">
                    <div class="text-[#6a9955]"># Keterangan Indeks: 0 (Jakarta), 1 (Bandung), 2 (Semarang)</div>
                    <div><span class="text-[#9cdcfe]">matrix_kota</span> = [</div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;[<span class="text-[#b5cea8]">0</span>, <span class="text-[#b5cea8]">150</span>, <span class="text-[#b5cea8]">400</span>],&nbsp;&nbsp;&nbsp;<span class="text-[#6a9955]"># Baris 0 (Jakarta)</span></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;[<span class="text-[#b5cea8]">150</span>, <span class="text-[#b5cea8]">0</span>, <span class="text-[#b5cea8]">250</span>],&nbsp;&nbsp;&nbsp;<span class="text-[#6a9955]"># Baris 1 (Bandung)</span></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;[<span class="text-[#b5cea8]">400</span>, <span class="text-[#b5cea8]">250</span>, <span class="text-[#b5cea8]">0</span>]&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-[#6a9955]"># Baris 2 (Semarang)</span></div>
                    <div class="mb-4">]</div>

                    <div class="text-[#6a9955]"># Ganti tanda tanya (?) dengan angka indeks baris dan kolom yang tepat!</div>
                    <div class="text-[#6a9955]"># Instruksi: Ambil data Dari Jakarta (Baris 0) Ke Bandung (Kolom 1)</div>
                    <div class="flex items-center">
                        <span class="text-[#9cdcfe]">jarak_dicari</span> = <span class="text-[#9cdcfe]">matrix_kota</span>[<input type="text" id="input23_1" class="bg-[#3c3c3c] text-[#b5cea8] border border-slate-600 rounded px-1.5 py-0.5 mx-0.5 w-10 outline-none focus:border-indigo-400 focus:bg-[#2d2d2d] text-center transition-colors shadow-inner font-bold" autocomplete="off" placeholder="?">][<input type="text" id="input23_2" class="bg-[#3c3c3c] text-[#b5cea8] border border-slate-600 rounded px-1.5 py-0.5 mx-0.5 w-10 outline-none focus:border-indigo-400 focus:bg-[#2d2d2d] text-center transition-colors shadow-inner font-bold" autocomplete="off" placeholder="?">]
                    </div>
                    
                    <div class="mt-4"><span class="text-[#dcdcaa]">print</span>(<span class="text-[#ce9178]">"Jarak Jakarta ke Bandung:"</span>, <span class="text-[#9cdcfe]">jarak_dicari</span>, <span class="text-[#ce9178]">"KM"</span>)</div>
                </div>

                {{-- Console Output Activity --}}
                <div id="console-output-23" class="hidden border-t border-slate-700 bg-black p-5 text-xs font-mono shrink-0">
                    <span class="text-slate-400">> root@graflearn: python main.py</span><br>
                    <div id="console-text-23" class="mt-2 leading-relaxed whitespace-pre-wrap"></div>
                </div>
            </div>

            {{-- Alert Status --}}
            <div id="alert-23" class="hidden mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border transition-all text-center"></div>

            {{-- KOTAK PEMBAHASAN --}}
            <div id="feedback-edukatif-23" class="hidden mt-6 bg-indigo-50 border border-indigo-200 p-6 rounded-xl shadow-sm text-slate-800 text-sm leading-relaxed transition-all">
                <h4 class="font-bold text-indigo-900 mb-3 flex items-center gap-2 border-b border-indigo-200 pb-2">
                    <i class="fa-solid fa-lightbulb text-yellow-500"></i> Pembahasan Analisis
                </h4>
                <ul class="list-disc pl-5 space-y-2 text-slate-700 text-justify">
                    <li>Instruksi meminta melacak rute dari <strong>Jakarta</strong> menuju <strong>Bandung</strong>.</li>
                    <li>Sesuai keterangan di graf dan komentar kode, kota <strong>Jakarta</strong> berada pada Baris indeks ke-<code class="bg-white px-1.5 py-0.5 rounded text-indigo-700 shadow-sm border border-slate-200 font-mono">0</code>, dan kota <strong>Bandung</strong> berada pada Kolom indeks ke-<code class="bg-white px-1.5 py-0.5 rounded text-indigo-700 shadow-sm border border-slate-200 font-mono">1</code>.</li>
                    <li>Sehingga, rumus ekstraksinya adalah <code class="bg-white px-2 py-1 rounded text-green-700 font-bold shadow-sm border border-slate-200 font-mono">matrix_kota[0][1]</code> yang menghasilkan nilai data 150 KM.</li>
                </ul>
            </div>
        </div>

        {{-- Navigasi Bawah --}}
        <div class="flex justify-between gap-4 mt-12 pt-6 border-t border-slate-200">
            <button type="button" onclick="prevStep()" class="px-6 py-2.5 rounded-lg border border-slate-300 font-bold text-slate-600 hover:bg-slate-50 transition shadow-sm active:scale-95">
                Kembali
            </button>
            <button type="button" id="btnNext23" onclick="nextStep()" class="px-6 py-2.5 bg-slate-900 hover:bg-slate-800 text-white font-bold rounded-lg shadow-md transition-all active:scale-95 opacity-50 cursor-not-allowed" disabled>
                Lanjut
            </button>
        </div>

    </div>

    {{-- SCRIPT KHUSUS STEP 2.3 --}}
    <script>
        // FUNGSI SUPER RESIZE EDITOR (DITAMBAHKAN)
        window.autoResizeEditor = function(el) {
            if(!el) return;
            el.style.height = 'auto'; // Reset dulu
            if (el.scrollHeight > 0) {
                el.style.height = el.scrollHeight + 'px'; // Cara normal
            } else {
                const lineCount = (el.value.match(/\n/g) || []).length + 1;
                el.style.height = (lineCount * 24 + 40) + 'px'; 
            }
        };

        window.gl_net_matrix_23 = null;

        document.addEventListener("DOMContentLoaded", function() {
            
            // ==========================================
            // 1. INIT GRAF VISUAL SYNC MATRIX
            // ==========================================
            const containerMatrix = document.getElementById('vis_matrix_23');
            const infoMatrix = document.getElementById('info-matrix-23');
            
            const nodes = new vis.DataSet([
                { id: 0, label: '0\n(Jakarta)', x: -160, y: 0, color: { background: '#3b82f6', border: '#2563eb' }, font: { color: 'white', size: 14, bold: true }, shape: 'circle', margin: 12, fixed: true },
                { id: 1, label: '1\n(Bandung)', x: 0, y: 0, color: { background: '#10b981', border: '#059669' }, font: { color: 'white', size: 14, bold: true }, shape: 'circle', margin: 12, fixed: true },
                { id: 2, label: '2\n(Semarang)', x: 160, y: 0, color: { background: '#f59e0b', border: '#d97706' }, font: { color: 'white', size: 14, bold: true }, shape: 'circle', margin: 12, fixed: true }
            ]);

            const edges = new vis.DataSet([
                { id: 'e_0_1', from: 0, to: 1, label: '150 KM', font: { align: 'top', size: 13, color: '#4338ca', bold: true, background: 'white' }, color: { color: '#cbd5e1', highlight: '#fbbf24', hover: '#fbbf24' }, width: 3, selectionWidth: 2, hoverWidth: 2 },
                { id: 'e_1_2', from: 1, to: 2, label: '250 KM', font: { align: 'top', size: 13, color: '#4338ca', bold: true, background: 'white' }, color: { color: '#cbd5e1', highlight: '#fbbf24', hover: '#fbbf24' }, width: 3, selectionWidth: 2, hoverWidth: 2 }
            ]);

            const optionsMatrix = {
                physics: false,
                interaction: { dragNodes: false, dragView: false, zoomView: false, hover: true, selectable: true, multiselect: false },
                nodes: { borderWidth: 2 },
                edges: { smooth: { enabled: false } },
                layout: { randomSeed: 2 }
            };

            if(containerMatrix) {
                window.gl_net_matrix_23 = new vis.Network(containerMatrix, { nodes, edges }, optionsMatrix);
                
                infoMatrix.innerHTML = '<em>Pilih murni pada <strong>garis (sisi) KM</strong> di graf untuk melihat letak data.</em>';

                window.gl_net_matrix_23.on("click", function (params) {
                    const classVal = "p-2 transition-all duration-300 text-slate-800 font-bold border-2 border-slate-200";
                    const classZero = "p-2 transition-all duration-300 text-slate-300 font-normal border-2 border-slate-200";
                    
                    document.getElementById('cell-0-0').className = classZero;
                    document.getElementById('cell-0-1').className = classVal;
                    document.getElementById('cell-0-2').className = classZero;
                    
                    document.getElementById('cell-1-0').className = classVal;
                    document.getElementById('cell-1-1').className = classZero;
                    document.getElementById('cell-1-2').className = classVal;
                    
                    document.getElementById('cell-2-0').className = classZero;
                    document.getElementById('cell-2-1').className = classVal;
                    document.getElementById('cell-2-2').className = classZero;

                    if (params.edges.length > 0 && params.nodes.length === 0) { 
                        const edgeId = params.edges[0];
                        const edgeData = edges.get(edgeId);
                        
                        const cell1 = document.getElementById(`cell-${edgeData.from}-${edgeData.to}`);
                        const cell2 = document.getElementById(`cell-${edgeData.to}-${edgeData.from}`);
                        
                        const highlightClass = "p-2 border-2 border-amber-400 bg-amber-100 text-amber-950 font-black scale-110 shadow-md transition-all duration-300";

                        if(cell1) cell1.className = highlightClass;
                        if(cell2) cell2.className = highlightClass;

                        infoMatrix.innerHTML = `Garis dipilih. Nilai jarak <strong>${edgeData.label}</strong> disimpan simetris pada <code class="bg-white px-1.5 py-0.5 border border-indigo-200 rounded text-indigo-700 font-mono font-bold shadow-sm">[${edgeData.from}][${edgeData.to}]</code> & <code class="bg-white px-1.5 py-0.5 border border-indigo-200 rounded text-indigo-700 font-mono font-bold shadow-sm">[${edgeData.to}][${edgeData.from}]</code>.`;
                        infoMatrix.className = "mt-4 text-[11px] text-center text-indigo-800 bg-indigo-100 border-indigo-300 px-3 py-2 rounded border font-medium h-[46px] flex items-center justify-center shadow-inner transition-colors";

                    } else {
                        window.gl_net_matrix_23.unselectAll(); 
                        infoMatrix.innerHTML = '<em>Pilih murni pada <strong>garis (sisi) KM</strong> di graf untuk melihat letak data.</em>';
                        infoMatrix.className = "mt-4 text-[11px] text-center text-slate-500 bg-slate-100 px-3 py-2 rounded border border-slate-200 h-[46px] flex items-center justify-center transition-colors";
                    }
                });

                window.gl_net_matrix_23.on("hoverEdge", function () { containerMatrix.classList.add('cursor-pointer'); });
                window.gl_net_matrix_23.on("blurEdge", function () { containerMatrix.classList.remove('cursor-pointer'); });

                const resizeObserver = new ResizeObserver(() => {
                    if (containerMatrix.offsetWidth > 0 && window.gl_net_matrix_23) {
                        window.gl_net_matrix_23.redraw();
                        window.gl_net_matrix_23.fit({ animation: false });
                    }
                });
                resizeObserver.observe(containerMatrix);
            }

            // ==========================================
            // 2. CEK PERSISTENCE
            // ==========================================
            const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
            const savedSandboxCode = localStorage.getItem('sandbox_2_3_code_' + userId);
            
            if(localStorage.getItem('sandbox_2_3_done_' + userId) === 'true') {
                const editor = document.getElementById('editor-sandbox-23');
                if(savedSandboxCode && editor) editor.value = savedSandboxCode;
                window.renderHasilSandbox23(false);
                
                // Triger auto-resize saat load data lama
                setTimeout(() => window.autoResizeEditor(editor), 100);
            }

            const keyDone = 'act_2_3_livecode_done_' + userId;
            const isDoneServer = {{ isset($progress['2.3']) && $progress['2.3']->score == 100 ? 'true' : 'false' }};
            if(isDoneServer || localStorage.getItem(keyDone) === 'true') window.kunciJawaban23();
        });

        // ==========================================
        // FUNGSI 1: VALIDASI SANDBOX 2.3
        // ==========================================
        window.runSandbox23 = function() {
            const editor = document.getElementById('editor-sandbox-23');
            const code = editor.value; 
            const consoleBox = document.getElementById('console-sandbox-23');
            const outputText = document.getElementById('sandbox-output-text-23'); 
            const btnRunSandbox = document.getElementById('btnRunSandbox-23');

            consoleBox.classList.remove('hidden');

            if(code.trim() === "") {
                outputText.className = "text-[#ff5f56]";
                outputText.innerHTML = "SyntaxError: Editor masih kosong. Silakan ketik kodenya terlebih dahulu!";
                return;
            }

            const codeWithoutComments = code.replace(/#.*/g, '');
            const cleanCode = codeWithoutComments.replace(/\s+/g, '').replace(/'/g, '"');

            const hasMatrixStructure = cleanCode.includes('matrix_bobot=[') && cleanCode.includes('[0,150,0]') && cleanCode.includes('[150,0,250]') && cleanCode.includes('[0,250,0]');
            const hasExtraction = cleanCode.includes('matrix_bobot[1][2]');
            const hasPrint = cleanCode.includes('print(');

            if((hasMatrixStructure || cleanCode.includes('matrix_bobot=')) && hasExtraction && hasPrint) {
                outputText.className = "text-[#4af626]"; 
                outputText.innerHTML = "Jarak dari Bandung ke Semarang adalah: 250 KM";
                
                btnRunSandbox.innerHTML = '<i class="fa-solid fa-check"></i> Program Berhasil';
                btnRunSandbox.classList.replace('bg-indigo-600', 'bg-emerald-600');
                
                const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                localStorage.setItem('sandbox_2_3_done_' + userId, 'true');
                localStorage.setItem('sandbox_2_3_code_' + userId, code);

                window.renderHasilSandbox23(true);
            } else {
                outputText.className = "text-[#ffbd2e]"; 
                let errorMsg = "Program gagal dieksekusi atau belum lengkap.<br>";
                if(!hasMatrixStructure) errorMsg += "- Struktur matriks <code>matrix_bobot</code> Anda keliru. Pastikan nilainya persis seperti di contoh kode atas.<br>";
                if(!hasExtraction) errorMsg += "- Anda belum mengekstrak jarak Bandung ke Semarang menggunakan indeks <code>[1][2]</code>.<br>";
                if(!hasPrint) errorMsg += "- Anda belum memanggil perintah <code>print()</code>.<br>";
                
                outputText.innerHTML = errorMsg;
                btnRunSandbox.innerHTML = '<i class="fa-solid fa-rotate-right"></i> Coba Lagi';
            }
        }

        window.renderHasilSandbox23 = function(doScroll) {
            const explanationBox = document.getElementById('output-explanation-23');
            const actContainer = document.getElementById('activity-23-container');
            
            explanationBox.classList.remove('hidden');
            actContainer.classList.remove('opacity-50', 'pointer-events-none');
            
            if(doScroll) {
                setTimeout(() => { explanationBox.scrollIntoView({ behavior: 'smooth', block: 'center' }); }, 300);
            }
        }

        // ==========================================
        // FUNGSI VALIDASI AKTIVITAS 2.3
        // ==========================================
        window.runAktivitas23 = function() {
            let input1Raw = document.getElementById('input23_1').value.trim();
            let input2Raw = document.getElementById('input23_2').value.trim();
            
            const alertBox = document.getElementById('alert-23');
            const consoleBox = document.getElementById('console-output-23');
            const consoleText = document.getElementById('console-text-23');

            alertBox.classList.add('hidden');
            consoleBox.classList.add('hidden');

            if(input1Raw === "" || input2Raw === "") {
                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-yellow-50 text-yellow-800 border-yellow-200 text-center";
                alertBox.innerHTML = "⚠️ Error: Indeks baris dan kolom tidak boleh kosong. Silakan isi dengan angka indeks yang tepat.";
                alertBox.classList.remove('hidden');
                return;
            }

            if(input1Raw === "0" && input2Raw === "1") {
                const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                localStorage.setItem('act_2_3_livecode_done_' + userId, 'true');

                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-green-50 text-green-800 border-green-400 text-center";
                alertBox.innerHTML = "✅ Analisis Tepat! Anda berhasil mengekstrak jarak Jakarta (Baris 0) ke Bandung (Kolom 1).";
                alertBox.classList.remove('hidden');

                consoleBox.classList.remove('hidden');
                consoleText.className = "mt-2 text-[#4af626]";
                consoleText.innerHTML = "Jarak Jakarta ke Bandung: 150 KM";

                window.kunciJawaban23();

                if (typeof simpanProgressAktivitas === 'function') {
                    simpanProgressAktivitas('bab2', '2.3', 100);
                }

            } else if (input1Raw === "1" && input2Raw === "0") {
                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-red-50 text-red-800 border-red-300 animate-pulse text-center";
                alertBox.innerHTML = "❌ Logika Terbalik: Angka 150 KM memang benar, tetapi kode Anda `[1][0]` itu artinya membaca dari Bandung menuju Jakarta. Instruksi meminta Jakarta ke Bandung.";
                alertBox.classList.remove('hidden');
                consoleBox.classList.remove('hidden');
                consoleText.className = "mt-2 text-[#ffbd2e]";
                consoleText.innerHTML = `Jarak Jakarta ke Bandung: 150 KM<br>Peringatan: Arah pembacaan matriks terbalik (Baris 1, Kolom 0)!`;
                
            } else if ((input1Raw === "0" && input2Raw === "2") || (input1Raw === "2" && input2Raw === "0")) {
                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-red-50 text-red-800 border-red-300 animate-pulse text-center";
                alertBox.innerHTML = "❌ Rute Keliru: Anda malah mengekstrak jarak antara Jakarta dan Semarang (Indeks 2). Cek kembali indeks kota Bandung.";
                alertBox.classList.remove('hidden');
                consoleBox.classList.remove('hidden');
                consoleText.className = "mt-2 text-[#ff5f56]";
                consoleText.innerHTML = `Jarak Jakarta ke Bandung: 400 KM<br>Peringatan: Data yang diambil adalah jarak ke Semarang!`;
                
            } else {
                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-red-50 text-red-800 border-red-300 text-center";
                alertBox.innerHTML = `❌ IndexError: Indeks matriks \`[${input1Raw}][${input2Raw}]\` tidak menghasilkan rute yang tepat, atau berada di luar batas. Ingat, Jakarta adalah indeks 0 dan Bandung indeks 1.`;
                alertBox.classList.remove('hidden');
                consoleBox.classList.remove('hidden');
                consoleText.className = "mt-2 text-[#ff5f56]";
                consoleText.innerHTML = `Traceback (most recent call last):<br>IndexError: list index out of range atau salah sasaran.`;
            }
        }

        window.kunciJawaban23 = function() {
            document.getElementById('input23_1').value = "0";
            document.getElementById('input23_1').disabled = true;
            // REVISI DESAIN: Ganti jadi latar Hijau Solid & Teks Putih
            document.getElementById('input23_1').classList.remove('bg-[#3c3c3c]', 'text-[#b5cea8]', 'border-slate-600');
            document.getElementById('input23_1').classList.add('bg-emerald-600', 'text-white', 'border-emerald-500', 'cursor-not-allowed', 'shadow-inner');
            
            document.getElementById('input23_2').value = "1";
            document.getElementById('input23_2').disabled = true;
            // REVISI DESAIN: Ganti jadi latar Hijau Solid & Teks Putih
            document.getElementById('input23_2').classList.remove('bg-[#3c3c3c]', 'text-[#b5cea8]', 'border-slate-600');
            document.getElementById('input23_2').classList.add('bg-emerald-600', 'text-white', 'border-emerald-500', 'cursor-not-allowed', 'shadow-inner');

            const btnRun = document.getElementById('btnRun23');
            if(btnRun) {
                btnRun.innerHTML = '<i class="fa-solid fa-check"></i> Code Valid';
                btnRun.classList.replace('bg-green-600', 'bg-slate-600');
                btnRun.classList.replace('hover:bg-green-500', 'cursor-not-allowed');
                btnRun.disabled = true;
            }

            document.getElementById('feedback-edukatif-23').classList.remove('hidden');

            const btnNext = document.getElementById('btnNext23');
            if(btnNext) {
                btnNext.disabled = false;
                btnNext.classList.remove('opacity-50', 'cursor-not-allowed');
            }
        }
    </script>
</section>