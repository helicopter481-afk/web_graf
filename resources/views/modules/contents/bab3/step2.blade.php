<section id="step-2" class="step-slide">
    {{-- IMPORT VIS JS --}}
    <script type="text/javascript" src="https://unpkg.com/vis-network/standalone/umd/vis-network.min.js"></script>

    <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm p-8 md:p-10 max-w-6xl mx-auto -mt-8 transition-colors">

        {{-- JUDUL MATERI --}}
        <div class="border-b border-slate-200 dark:border-slate-700 pb-6 mb-8 flex justify-between items-center transition-colors">
            <div>
                <h2 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white mb-2 flex items-center gap-3">
                    <i class="fa-solid fa-route text-orange-500"></i> 3.2 Depth-First Search (DFS)
                </h2>
                <p class="text-slate-500 dark:text-slate-400 font-medium">Menelusuri graf secara mendalam (Menembus Jalan Buntu) menggunakan Stack.</p>
            </div>
        </div>

        {{-- KONTEN TEORI YANG DISEMPURNAKAN (LEBIH MENDALAM & RELEVAN) --}}
        <div class="space-y-8 mb-12">
            
            {{-- Pengantar Utama --}}
            <div class="bg-orange-50 dark:bg-orange-900/20 border-l-4 border-orange-500 p-5 rounded-r-xl transition-colors">
                <h3 class="text-lg font-bold text-orange-900 dark:text-orange-300 mb-2">Apa itu Konsep Pencarian Mendalam (DFS)?</h3>
                <p class="text-sm md:text-base text-orange-800 dark:text-orange-200 leading-relaxed text-justify">
                    Berbeda 180 derajat dengan BFS yang menyapu merata, <strong>Depth-First Search (DFS)</strong> adalah algoritma nekat yang lebih suka menjelajah <strong>sedalam mungkin</strong> menyusuri satu cabang tunggal. Ia akan terus berjalan lurus menembus titik demi titik sampai ia tidak bisa melangkah lagi (jalan buntu).
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-8 items-start">
                <div class="prose prose-slate dark:prose-invert text-slate-700 dark:text-slate-300 leading-relaxed text-justify text-sm md:text-base max-w-none">
                    <p>
                        <strong>Analogi Dunia Nyata: Terjebak di Labirin (Maze)</strong><br>
                        Bayangkan Anda sedang mencari jalan keluar di dalam sebuah labirin besar. Saat bertemu persimpangan, Anda memilih belok kiri dan terus berjalan menelusuri lorong tersebut sampai mentok ke tembok (jalan buntu). Saat sadar itu buntu, Anda tidak langsung terbang kembali ke garis <em>start</em>, bukan? Anda pasti akan <strong>mundur selangkah demi selangkah (<em>backtrack</em>)</strong> ke persimpangan terakhir yang Anda lewati, lalu mencoba belokan yang lain.
                    </p>
                    <p class="mt-4">
                        <strong>Mengapa Menggunakan Stack (Tumpukan)?</strong><br>
                        Agar tidak tersesat saat mundur (<em>backtrack</em>), komputer menyimpan jejak persimpangannya ke dalam struktur data <strong>Stack (Tumpukan)</strong>. Prinsipnya persis seperti tumpukan piring kotor: <strong>Last-In First-Out (LIFO)</strong>. Persimpangan yang "terakhir" kali Anda temui adalah yang "pertama" kali Anda kunjungi kembali saat mundur. Di Python, kita mengekstrak data paling akhir (paling atas) dari tumpukan ini cukup dengan fungsi <code>pop()</code> kosong.
                    </p>
                </div>
                
                {{-- ILUSTRASI JEMBATAN KONSEPTUAL --}}
                <div class="bg-slate-50 dark:bg-slate-800/50 border-2 border-slate-200 dark:border-slate-700 rounded-xl p-5 shadow-sm transition-colors flex flex-col items-center justify-center">
                    <div class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-widest mb-2">Ilustrasi Analogi "Jalan Buntu"</div>
                    
                    <p class="text-[11px] text-slate-500 dark:text-slate-400 text-center mb-6 max-w-[260px] leading-relaxed">
                        Anggap <strong>A</strong> adalah pintu masuk labirin, dan <strong>B</strong> adalah persimpangan. Lorong <strong>D</strong> ternyata buntu, sehingga Anda harus mundur (<em>backtrack</em>) ke <strong>B</strong> untuk mencoba lorong <strong>E</strong>.
                    </p>
                    
                    {{-- Diagram Deep Dive Presisi (Garis Nyambung Sempurna) --}}
                    <div class="relative w-full flex flex-col items-center font-bold text-sm mt-2 mb-2">
                        
                        {{-- ROW 1: Node A --}}
                        <div class="relative flex items-center justify-center z-20">
                            <div class="absolute right-full mr-3 text-right leading-tight w-24">
                                <span class="text-xs text-slate-500 dark:text-slate-400 font-bold">Pintu Masuk</span><br>
                                <span class="text-[10px] text-slate-400 font-normal">Start &rarr;</span>
                            </div>
                            <div class="w-10 h-10 rounded-full bg-orange-600 text-white flex items-center justify-center shadow-md border-2 border-white dark:border-slate-800">A</div>
                        </div>

                        {{-- Line A to B --}}
                        <div class="w-0.5 h-8 bg-slate-300 dark:bg-slate-600 -my-2 z-0"></div>

                        {{-- ROW 2: Node B --}}
                        <div class="relative flex items-center justify-center z-20">
                            <div class="w-10 h-10 rounded-full bg-orange-500 text-white flex items-center justify-center shadow-md border-2 border-white dark:border-slate-800">B</div>
                            <div class="absolute left-full ml-3 text-[10px] text-slate-500 dark:text-slate-400 italic w-24 text-left">Persimpangan</div>
                        </div>

                        {{-- Line B to branches --}}
                        <div class="w-0.5 h-5 bg-slate-300 dark:bg-slate-600 -my-1 z-0"></div>

                        {{-- Cabang (Diperlebar menjadi 180px) --}}
                        <div class="w-[180px] h-0.5 bg-slate-300 dark:bg-slate-600 mt-0 flex justify-between z-0"></div>

                        {{-- Vertical Drops (Diperlebar mengikuti cabang, 180px) --}}
                        <div class="w-[180px] flex justify-between z-0">
                            <div class="w-0.5 h-5 bg-slate-300 dark:bg-slate-600"></div>
                            <div class="w-0.5 h-5 bg-slate-300 dark:bg-slate-600"></div>
                        </div>

                        {{-- ROW 3: Nodes D & E (Diperlebar menjadi 220px) --}}
                        {{-- Rumusnya: 180px (Garis) + 40px (Ukuran Bola) = 220px --}}
                        <div class="w-[220px] flex justify-between z-20 -mt-2">
                            
                            {{-- Node D (Kiri - Buntu) --}}
                            <div class="relative flex flex-col items-center -translate-x-2 translate-y-2">
                                <div class="w-10 h-10 rounded-full bg-red-500 text-white flex items-center justify-center shadow-md border-2 border-white dark:border-slate-800">D</div>
                                <span class="bg-red-100 dark:bg-red-900/50 text-red-600 dark:text-red-400 text-[10px] px-2 py-0.5 rounded mt-2 border border-red-200 dark:border-red-800 text-center leading-tight">Buntu!<br><span class="font-normal text-[9px]">(Lorong Kiri)</span></span>
                                
                                {{-- Panah Mundur --}}
                                <div class="absolute left-full top-0 ml-1 text-red-500 dark:text-red-400 text-[10px] font-bold animate-bounce flex flex-col items-center bg-slate-50/80 dark:bg-slate-800/80 px-1 py-0.5 rounded backdrop-blur-sm whitespace-nowrap">
                                    <i class="fa-solid fa-arrow-turn-up -scale-x-100 text-xs mb-0.5"></i>
                                    <span>Mundur</span>
                                </div>
                            </div>

                            {{-- Node E (Kanan - Dilanjutkan) --}}
                           <div class="flex flex-col items-center translate-x-2 translate-y-2 opacity-40 transition-opacity duration-700 hover:opacity-100">
                                <div class="w-10 h-10 rounded-full bg-orange-400 text-white flex items-center justify-center shadow-md border-2 border-white dark:border-slate-800">E</div>
                                <span class="text-slate-400 text-[10px] mt-2 italic text-center leading-tight">Coba jalur ini<br><span class="font-normal text-[9px]">(Lorong Kanan)</span></span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- INFO SKENARIO BIASA DENGAN TITIK AWAL & TARGET --}}
        <div class="flex items-start gap-4 p-4 bg-slate-50 dark:bg-slate-800/50 rounded-xl border border-slate-200 dark:border-slate-700 shadow-sm mb-6 transition-colors">
            <div>
                <h4 class="font-bold text-slate-800 dark:text-slate-200 mb-1">Menerapkan Teori ke dalam Simulasi Komputer</h4>
                <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                    Sistem akan memulai penelusuran dari <strong>Simpul A (Titik Awal)</strong> dengan tujuan menemukan lokasi <strong>Simpul D (Titik Target)</strong>. Perhatikan bagaimana DFS meluncur tajam ke kedalaman graf terlebih dahulu sebelum mencoba cabang yang lain.
                </p>
            </div>
        </div>

        {{-- VISUALISASI INTERAKTIF DFS (LAYOUT BARU - BEBAS TUMPANG TINDIH) --}}
        <div class="bg-slate-50 dark:bg-slate-800/50 p-5 rounded-xl border border-slate-200 dark:border-slate-700 shadow-inner w-full flex flex-col items-center mb-10 transition-colors">
            
            {{-- Bagian Atas: Judul & Tombol Kontrol --}}
            <div class="w-full flex justify-between items-center mb-3">
                <span class="font-bold text-slate-700 dark:text-slate-200 text-sm">Simulasi DFS Interaktif</span>
                <div class="flex gap-2">
                    <button onclick="window.resetDFS_32()" class="bg-white dark:bg-slate-700 border border-slate-300 dark:border-slate-600 hover:bg-slate-100 dark:hover:bg-slate-600 text-slate-700 dark:text-slate-200 px-3 py-1.5 rounded text-xs font-bold transition-colors shadow-sm active:scale-95">
                        <i class="fa-solid fa-rotate-left mr-1"></i> Ulangi
                    </button>
                    <button id="btnNextDFS" onclick="window.nextStepDFS_32()" class="bg-orange-600 hover:bg-orange-700 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors shadow-sm active:scale-95">
                        Langkah Selanjutnya <i class="fa-solid fa-play ml-1"></i>
                    </button>
                </div>
            </div>
            
            {{-- Bagian Tengah: Kanvas Graf --}}
            <div id="dfs_isolasi_32" class="w-full h-[400px] bg-white dark:bg-slate-900 rounded-lg border border-slate-200 dark:border-slate-700 relative overflow-hidden cursor-crosshair transition-colors"></div>
            
            {{-- Bagian Bawah: Panel Info Statis (Tepat di bawah Kanvas, Tidak Menimpa) --}}
            <div class="w-full bg-slate-900 dark:bg-slate-800 border border-slate-700 text-white text-sm mt-4 p-4 rounded-lg shadow-inner flex items-center justify-center gap-3 text-center transition-all duration-300 pointer-events-auto">
                <i class="fa-solid fa-hand-pointer text-orange-400 animate-bounce"></i>
                <div id="dfs-info-panel" class="w-full">
                    Tekan tombol <strong class="text-orange-400 mx-1">Langkah Selanjutnya</strong> untuk memulai simulasi DFS.
                </div>
            </div>
        </div>
        
        {{-- PENJELASAN LANGKAH SIMULASI DFS --}}
        <div class="mb-12 p-6 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 rounded-xl shadow-sm transition-colors">
            <h4 class="font-bold text-slate-800 dark:text-slate-200 text-sm mb-4 flex items-center gap-2">
                <i class="fa-solid fa-shoe-prints text-orange-500"></i> Rincian Alur Penelusuran DFS:
            </h4>
            <ul class="list-disc list-outside ml-5 text-sm text-slate-700 dark:text-slate-300 space-y-3 leading-relaxed text-justify">
                <li>
                    <strong>Langkah 1 (Titik Awal):</strong> Algoritma memulai penelusuran dari <strong>Simpul A (Start)</strong> dan memasukkannya ke dalam tumpukan (<em>Stack</em>).
                </li>
                <li>
                    <strong>Langkah 2 (Menyelam Dalam):</strong> Berbeda dengan BFS yang melebar, DFS langsung menukik tajam ke satu cabang hingga mentok. Komputer menelusuri jalur secara mendalam menuju <strong>Simpul C</strong> lalu terus ke ujung <strong>Simpul F</strong>.
                </li>
                <li>
                    <strong>Langkah 3 (Backtrack):</strong> Karena Simpul F adalah jalan buntu (<em>dead end</em>), algoritma membuang data F dari tumpukan dan mundur (<em>backtrack</em>). Ia lalu mencoba cabang lain dengan menelusuri <strong>Simpul B</strong> dan turun lagi hingga mentok di <strong>Simpul E</strong>.
                </li>
                <li>
                    <strong>Langkah 4 (Target Ditemukan):</strong> Simpul E juga buntu, sehingga komputer mundur lagi ke B dan mengecek sisa cabang yang belum dikunjungi, yaitu <strong>Simpul D (Target)</strong>. Penelusuran selesai!
                </li>
            </ul>
        </div>

        {{-- ========================================== --}}
        {{-- CONTOH KODE PROGRAM DFS (ANTI-COPY) --}}
        {{-- ========================================== --}}
        <div class="mb-12">
            <h3 class="text-lg font-bold text-slate-800 dark:text-slate-100 mb-3 border-l-4 border-orange-500 pl-3">Contoh Implementasi Python:</h3>
            
            <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 select-none flex flex-col h-auto mb-4 relative group">
                <div class="bg-[#2d2d2d] px-4 py-2.5 flex items-center gap-2 border-b border-slate-700 shrink-0">
                    <div class="w-2.5 h-2.5 rounded-full bg-[#ff5f56]"></div>
                    <div class="w-2.5 h-2.5 rounded-full bg-[#ffbd2e]"></div>
                    <div class="w-2.5 h-2.5 rounded-full bg-[#27c93f]"></div>
                    <span class="text-slate-400 text-[10px] ml-2 font-mono leading-none">dfs_traversal.py (Hanya Baca)</span>
                </div>
                
                {{-- CODE BLOCK WITH LINE NUMBERS --}}
                <div class="flex font-mono text-[12px] md:text-sm text-[#d4d4d4] overflow-x-auto leading-[1.625]">
                    {{-- Line Numbers --}}
                    <div class="flex flex-col text-[#858585] text-right select-none py-5 pl-4 pr-4 border-r border-[#404040] bg-[#1e1e1e] shrink-0 leading-[1.625] z-10">
                        <span>1</span><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span><span>7</span><span>8</span><span>9</span><span>10</span><span>11</span><span>12</span><span>13</span><span>14</span><span>15</span><span>16</span><span>17</span><span>18</span><span>19</span><span>20</span><span>21</span><span>22</span><span>23</span><span>24</span>
                    </div>
                    
                    {{-- Code Content (Presisi Baris dengan NBSP) --}}
                    <div class="flex flex-col whitespace-pre py-5 pl-4 pr-6 leading-[1.625] z-0">
                        <div class="z-0"><span class="text-[#569cd6]">def</span> <span class="text-[#dcdcaa]">jalankan_dfs</span>(graf, titik_awal):</div>
                        <div class="ml-4 z-0">dikunjungi = []</div>
                        <div class="ml-4 z-0">stack = [titik_awal]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-[#6a9955]"># Menyimpan tumpukan simpul yang akan dicek</span></div>
                        <div class="z-0">&nbsp;</div>
                        <div class="ml-4 z-0"><span class="text-[#c586c0]">while</span> stack:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-[#6a9955]"># Selama tumpukan belum kosong</span></div>
                        <div class="ml-8 z-0">simpul_saat_ini = stack.<span class="text-[#dcdcaa]">pop</span>()&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-[#6a9955]"># Ambil data paling BELAKANG/ATAS (LIFO)</span></div>
                        <div class="z-0">&nbsp;</div>
                        <div class="ml-8 z-0"><span class="text-[#c586c0]">if</span> simpul_saat_ini <span class="text-[#c586c0]">not in</span> dikunjungi:</div>
                        <div class="ml-12 z-0">dikunjungi.<span class="text-[#dcdcaa]">append</span>(simpul_saat_ini)&nbsp;<span class="text-[#6a9955]"># Tandai sudah dikunjungi</span></div>
                        <div class="z-0">&nbsp;</div>
                        <div class="ml-12 z-0"><span class="text-[#6a9955]"># Tambahkan semua tetangganya ke dalam tumpukan</span></div>
                        <div class="ml-12 z-0">stack.<span class="text-[#dcdcaa]">extend</span>(graf[simpul_saat_ini])</div>
                        <div class="z-0">&nbsp;</div>
                        <div class="ml-4 z-0"><span class="text-[#c586c0]">return</span> dikunjungi</div>
                        <div class="z-0">&nbsp;</div>
                        <div class="text-[#6a9955] z-0"># Dictionary Graf (Format sedikit berbeda dari BFS)</div>
                        <div class="z-0">graf_kota = {</div>
                        <div class="ml-4 z-0"><span class="text-[#ce9178]">'A'</span>: [<span class="text-[#ce9178]">'B'</span>, <span class="text-[#ce9178]">'C'</span>],</div>
                        <div class="ml-4 z-0"><span class="text-[#ce9178]">'B'</span>: [<span class="text-[#ce9178]">'D'</span>, <span class="text-[#ce9178]">'E'</span>],</div>
                        <div class="ml-4 z-0"><span class="text-[#ce9178]">'C'</span>: [<span class="text-[#ce9178]">'F'</span>],</div>
                        <div class="ml-4 z-0"><span class="text-[#ce9178]">'D'</span>: [], <span class="text-[#ce9178]">'E'</span>: [], <span class="text-[#ce9178]">'F'</span>: []</div>
                        <div class="z-0">}</div>
                        <div class="z-0">&nbsp;</div>
                        <div class="z-0"><span class="text-[#dcdcaa]">print</span>(<span class="text-[#ce9178]">"Hasil Penelusuran DFS:"</span>, jalankan_dfs(graf_kota, <span class="text-[#ce9178]">'A'</span>))</div>
                    </div>
                </div>
            </div>
            
            {{-- PENJELASAN KODE PROGRAM --}}
            <div class="p-6 border border-slate-200 dark:border-slate-700 rounded-xl bg-slate-50 dark:bg-slate-900/50 transition-colors">
                <h4 class="font-bold text-slate-800 dark:text-slate-200 text-sm mb-4">Pembedahan Sintaks (Langkah demi Langkah):</h4>
                <ul class="list-disc list-outside ml-5 text-sm text-slate-700 dark:text-slate-300 space-y-3 leading-relaxed text-justify">
                    <li><strong>Baris 2 & 3 (Persiapan):</strong> Kita menyiapkan wadah <code>dikunjungi</code> ibarat <strong>"Buku Jejak"</strong>, dan wadah <code>stack</code> ibarat <strong>"Tumpukan Piring"</strong>. <code>titik_awal</code> ('A') diletakkan sebagai piring pertama.</li>
                    <li><strong>Baris 5 (Memulai Penelusuran):</strong> Perulangan <code>while stack:</code> artinya: <em>"Selama tumpukan piring belum habis, komputer akan terus bekerja memprosesnya."</em></li>
                    <li><strong>Baris 6 (Konsep LIFO):</strong> Ini adalah nyawa utama algoritma DFS! Perintah <code>stack.pop()</code> <strong>tanpa angka di dalam kurungnya</strong> memaksa komputer mengambil piring yang <strong>paling atas/terakhir kali ditaruh</strong>. Sifat inilah yang membuat DFS menukik tajam ke jalan yang baru ditemukan sebelum mengurus jalan yang lama!</li>
                    <li><strong>Baris 8 & 9 (Mencatat Jejak):</strong> Sistem mengecek apakah jalan (simpul) ini sudah pernah dilewati. Jika belum, catat ke dalam "Buku Jejak" (<code>dikunjungi</code>) agar algoritma tidak berputar-putar di rute yang sama.</li>
                    <li><strong>Baris 12 (Menambah Tumpukan Baru):</strong> Saat tiba di sebuah titik, perintah <code>extend()</code> mengambil semua cabang jalan (tetangga) yang tersedia, lalu menaruhnya <strong>tepat di bagian paling atas</strong> tumpukan piring.</li>
                </ul>
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- INTERACTIVE SANDBOX: KETIK ULANG KODE --}}
        {{-- ========================================== --}}
        <div class="mb-10 bg-orange-50/30 dark:bg-orange-950/20 border-2 border-orange-200 dark:border-orange-800/60 p-6 rounded-xl shadow-sm transition-colors">
            <h3 class="text-lg font-bold text-slate-800 dark:text-slate-100 mb-2">Coba Sendiri!</h3>
            <p class="text-sm text-slate-600 dark:text-slate-300 mb-4">
                Ketik ulang keseluruhan kode pada contoh di atas ke dalam editor di bawah ini (tidak perlu mengetik komentarnya). Perhatikan perubahan dari <code>pop(0)</code> menjadi <code>pop()</code>. Biasakan jari Anda dengan sintaks Python!
            </p>

            <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 font-mono text-sm relative flex flex-col transition-colors">
                <div class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700 shrink-0">
                    <span class="text-slate-400 text-xs z-0"><i class="fa-solid fa-terminal mr-1"></i> Terminal Editor Pyodide</span>
                    <button onclick="window.runSandbox32()" id="btnRunSandbox32" class="bg-green-600 hover:bg-green-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors flex items-center gap-2 shadow-sm">
                        Jalankan Program
                    </button>
                </div>
                
                {{-- DYNAMIC EDITOR LAYOUT --}}
                <div class="flex font-mono text-[12px] md:text-sm text-[#d4d4d4] bg-[#1e1e1e] relative min-h-[160px] leading-[1.625]">
                    {{-- Container Angka Baris (Kiri) --}}
                    <div id="line-numbers-32" class="text-[#858585] text-right select-none py-5 pl-4 pr-4 border-r border-[#404040] bg-[#1e1e1e] shrink-0 z-10 leading-[1.625]">
                        <div>1</div>
                    </div>
                    
                    {{-- Textarea Editor (Kanan) --}}
                    <textarea id="editor-sandbox-32" class="w-full bg-transparent text-[#d4d4d4] outline-none resize-none py-5 pl-4 pr-6 whitespace-pre overflow-x-auto z-0 leading-[1.625]" spellcheck="false" placeholder="# Ketik kode Python di sini..." oninput="window.syncLineNumbers32()"></textarea>
                </div>

                {{-- WADAH OUTPUT TERMINAL --}}
                <div class="px-5 pb-5 pt-2 bg-[#1e1e1e]">
                    <hr class="border-slate-700 mb-4">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-slate-500 text-[10px] font-bold tracking-widest uppercase z-0">OUTPUT TERMINAL</span>
                        <span id="status-sandbox-32" class="bg-slate-800 text-slate-400 px-2 py-0.5 rounded text-[10px] z-0">Ready</span>
                    </div>
                    <div id="sandbox-output-text-32" class="text-[#4af626] whitespace-pre-wrap break-words min-h-[20px] italic opacity-60 z-0">(Output akan tampil di sini setelah dijalankan)</div>
                </div>
            </div>
        </div>

        {{-- OUTPUT EXPLANATION (MUNCUL SETELAH SANDBOX BERHASIL) --}}
        <div id="output-explanation-32" class="mb-12 hidden transition-all duration-700">
            <div class="bg-white dark:bg-slate-900 p-6 rounded-xl border border-slate-200 dark:border-slate-700 shadow-sm transition-colors overflow-hidden prose prose-slate dark:prose-invert prose-sm max-w-none prose-justify leading-relaxed">
                <h4 class="font-bold text-slate-800 dark:text-slate-200 text-sm mb-3 border-l-4 border-orange-500 pl-3">Output Program:</h4>
                <div class="bg-black text-[#4af626] font-mono text-sm p-4 rounded-md shadow-inner mb-6 border border-slate-800 dark:border-green-900/50">
                    Hasil Penelusuran DFS: ['A', 'C', 'F', 'B', 'E', 'D']
                </div>
                
                <h4 class="font-bold text-slate-800 dark:text-slate-200 text-sm mb-3 pl-3">Analisis Output:</h4>
                <ul class="list-disc list-outside ml-4 text-sm text-slate-700 dark:text-slate-300 space-y-2 text-justify">
                    <li>Lihat perbedaannya! DFS tidak membaca simpul 'B' dan 'C' secara berurutan seperti pada BFS.</li>
                    <li>Karena kita menggunakan perintah <code>pop()</code>, DFS menembus lurus ke kedalaman graf: dari 'A' langsung menuju 'C', lalu 'F' (sampai mentok buntu).</li>
                    <li>Setelah itu, barulah sistem kembali (<em>backtrack</em>) untuk memproses cabang lainnya ('B', 'E', 'D').</li>
                </ul>
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- BLOK AKTIVITAS UTAMA 3.2 (TERKUNCI SECARA DEFAULT) --}}
        {{-- ========================================== --}}
        <div id="main-activity-wrapper-32" class="mt-12 pt-8 border-t-[3px] border-dashed border-slate-200 dark:border-slate-700 transition-all duration-700 opacity-50 pointer-events-none relative">
            
            {{-- Pesan Terkunci --}}
            <div id="lock-message-32" class="absolute top-20 left-1/2 -translate-x-1/2 z-10 flex items-center justify-center w-full">
                <div class="bg-slate-800/90 dark:bg-slate-900/90 border border-slate-600 text-white text-sm px-6 py-3 rounded-full font-bold shadow-xl backdrop-blur-sm flex items-center gap-3">
                    <i class="fa-solid fa-lock text-slate-400"></i> Selesaikan "Coba Sendiri" untuk membuka aktivitas
                </div>
            </div>

            <div class="flex items-center gap-3 mb-8">
                <span class="bg-orange-600 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider shadow-sm">Aktivitas 3.2</span>
                <h3 class="font-bold text-slate-900 dark:text-slate-100 text-xl">Uji Pemahaman: Depth-First Search</h3>
            </div>

            {{-- SOAL 1: VARIASI PYTHON LIST --}}
            <div id="activity-32-1-container" class="mb-10 transition-opacity duration-500">
                <h4 class="font-bold text-slate-800 dark:text-slate-200 text-lg mb-3">1. Variasi Python <em>List</em></h4>
                <div class="bg-orange-50 dark:bg-orange-950/30 border border-orange-200 dark:border-orange-800 rounded-xl p-6 mb-6 shadow-sm transition-colors">
                    <p class="text-sm text-slate-700 dark:text-slate-300 mb-4 leading-relaxed text-justify">
                        <strong>Skenario:</strong> Dalam pemrograman Python, seringkali kita tidak hanya mengambil data antrean terdepan, namun kita juga perlu mengambil data dari urutan <strong>paling terakhir</strong> (misalnya untuk menyimulasikan logika <em>Stack / LIFO</em> pada DFS).
                    </p>
                    <div class="bg-white/80 dark:bg-slate-800/80 p-4 rounded border border-orange-200 dark:border-orange-700/50 font-medium text-orange-900 dark:text-orange-300 text-sm leading-relaxed flex flex-wrap items-center gap-2 transition-colors">
                        <strong>Tugas Anda:</strong> Lengkapi bagian 
                        <span class="bg-orange-100 dark:bg-orange-900/60 px-1.5 py-0.5 rounded border border-orange-200 dark:border-orange-700 font-mono text-xs text-orange-800 dark:text-orange-200">pop(____)</span> 
                        di bawah ini agar memanggil data Pasien_C (urutan <strong>paling terakhir</strong>).
                    </div>
                </div>

                <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 font-mono text-sm relative flex flex-col transition-colors">
                    <div class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700 shrink-0">
                        <span class="text-slate-400 text-xs z-0">Terminal Editor Pyodide</span>
                        <button onclick="window.runAktivitas32_1()" id="btnRun32_1" class="bg-orange-600 hover:bg-orange-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors shadow-sm active:scale-95 z-10">
                            Cek Jawaban
                        </button>
                    </div>
                    
                    <div class="flex font-mono text-[12px] md:text-sm leading-[1.625] text-[#d4d4d4] overflow-x-auto z-0">
                        <div class="flex flex-col text-[#858585] text-right select-none py-6 pl-4 pr-4 border-r border-[#404040] bg-[#1e1e1e] shrink-0">
                             <span>1</span><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span><span>7</span>
                        </div>
                        
                        <div class="flex flex-col whitespace-pre py-6 pl-4 pr-6">
                            <div><span class="text-[#9cdcfe]">antrean_pasien</span> = [<span class="text-[#ce9178]">"Pasien_A"</span>, <span class="text-[#ce9178]">"Pasien_B"</span>, <span class="text-[#ce9178]">"Pasien_C"</span>]</div>
                            <div>&nbsp;</div>
                            <div class="text-[#6a9955]"># Panggil pasien yang terakhir kali datang!</div>
                            
                            <div class="flex items-center h-[26px] mt-1 mb-1">
                                <span class="text-[#9cdcfe]">pasien_dipanggil</span> = <span class="text-[#9cdcfe]">antrean_pasien</span>.<span class="text-[#dcdcaa]">pop</span>(<input type="text" id="input32_1_1" class="bg-[#3c3c3c] dark:bg-slate-700 text-[#b5cea8] border border-slate-500 dark:border-slate-500 rounded px-2 py-0.5 mx-1 w-16 outline-none focus:border-orange-400 focus:bg-[#2d2d2d] dark:focus:bg-slate-800 text-center transition-colors shadow-inner font-bold h-6 leading-none text-sm" autocomplete="off" spellcheck="false">)
                            </div>

                            <div>&nbsp;</div>
                            <div class="leading-none"><span class="text-[#dcdcaa]">print</span>(<span class="text-[#ce9178]">"Pasien yang dilayani:"</span>, pasien_dipanggil)</div>
                            <div class="leading-none mt-[6.5px]"><span class="text-[#dcdcaa]">print</span>(<span class="text-[#ce9178]">"Sisa antrean:"</span>, antrean_pasien)</div>
                        </div>
                    </div>

                    <div class="px-5 pb-5 pt-0 bg-[#1e1e1e]">
                        <hr class="border-slate-700 mb-4 mt-2">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-slate-500 text-[10px] font-bold tracking-widest uppercase z-0">OUTPUT TERMINAL</span>
                            <span id="status-terminal-32-1" class="bg-slate-800 text-slate-400 px-2 py-0.5 rounded text-[10px] z-0">Ready</span>
                        </div>
                        <div id="console-text-32-1" class="text-[#4af626] whitespace-pre-wrap break-words leading-relaxed text-sm italic opacity-60 z-0">(Output terminal akan tampil di sini setelah dijalankan)</div>
                    </div>
                </div>

                <div id="alert-32-1" class="hidden mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border transition-all text-center"></div>

                <div id="feedback-edukatif-32-1" class="hidden mt-4 bg-green-50 dark:bg-green-950/40 border border-green-200 dark:border-green-800 p-6 rounded-xl shadow-sm transition-colors prose prose-slate dark:prose-invert prose-sm max-w-none prose-justify overflow-hidden leading-relaxed">
                    <h4 class="font-bold text-green-900 dark:text-green-400 mb-3 border-b border-green-200 dark:border-green-800 pb-2">
                        Pembahasan Evaluasi
                    </h4>
                    <p class="text-sm text-green-800 dark:text-green-200 leading-relaxed text-justify mb-3">
                        Luar biasa! Anda telah memanggil elemen ketiga yang berada di indeks ke- <code class="bg-white dark:bg-slate-800 px-1.5 py-0.5 rounded border border-green-300 dark:border-green-700 text-green-800 dark:text-green-400 font-mono text-xs">2</code>.
                    </p>
                    <div class="bg-white/80 dark:bg-slate-800/80 p-4 rounded-lg border border-green-200 dark:border-green-700 text-sm text-green-900 dark:text-green-200 leading-relaxed shadow-sm transition-colors">
                        <strong>Tahukah Anda?</strong> Di Python, ada trik cepat untuk mengambil elemen <strong>paling akhir</strong> tanpa harus menghitung jumlah datanya secara manual, yaitu menggunakan indeks negatif <code class="bg-slate-100 dark:bg-slate-700 px-1.5 py-0.5 rounded border border-slate-300 dark:border-slate-600 font-mono text-xs text-slate-800 dark:text-slate-300">pop(-1)</code>.<br><br>
                        Anda juga dapat menuliskan fungsi <code class="bg-slate-100 dark:bg-slate-700 px-1.5 py-0.5 rounded border border-slate-300 dark:border-slate-600 font-mono text-xs text-slate-800 dark:text-slate-300">pop()</code> (kosong tanpa angka). Jika dikosongkan, secara otomatis fungsi ini akan memotong elemen paling belakang (sama persis kerjanya dengan `pop(-1)`).
                    </div>
                </div>
            </div>

            {{-- SOAL 2: PEMBUKTIAN LIFO --}}
            <div id="activity-32-2-container" class="mb-10 opacity-50 pointer-events-none transition-opacity duration-500 relative">
                <h4 class="font-bold text-slate-800 dark:text-slate-200 text-lg mb-3">2. Pembuktian Logika LIFO</h4>
                <div class="bg-orange-50 dark:bg-orange-950/30 border border-orange-200 dark:border-orange-800 rounded-xl p-6 mb-6 shadow-sm transition-colors">
                    <p class="text-sm text-slate-700 dark:text-slate-300 mb-4 leading-relaxed text-justify">
                        <strong>Skenario:</strong> Algoritma DFS Anda sedang berada di Simpul "A". Simpul "A" memiliki dua cabang: "B" dan "C". Komputer memasukkan keduanya ke dalam <em>Stack</em> (Tumpukan) sehingga menjadi <code>["B", "C"]</code>.
                    </p>
                    <p class="text-sm text-slate-700 dark:text-slate-300 mb-6 leading-relaxed text-justify">
                        <strong>Tugas Anda:</strong> Karena DFS menggunakan fungsi <code class="bg-orange-100 dark:bg-orange-900/60 px-1.5 py-0.5 rounded border border-orange-200 dark:border-orange-700 font-mono text-xs text-orange-800 dark:text-orange-200">pop()</code> kosong (mengambil dari paling belakang), simpul manakah yang akan diekstrak dan dikunjungi oleh komputer tepat setelah simpul "A"? Ketik satu huruf saja (HURUF KAPITAL).
                    </p>

                    <div class="flex flex-col sm:flex-row items-center gap-4 bg-white dark:bg-slate-800 p-5 rounded-lg border border-slate-200 dark:border-slate-700 shadow-sm">
                        <div class="flex items-center gap-3 text-slate-800 dark:text-slate-200 font-medium">
                            <span>Simpul yang dikunjungi selanjutnya adalah:</span>
                            <input type="text" id="input32_2_1" class="border-b-2 border-slate-400 dark:border-slate-500 bg-transparent text-center text-lg font-bold text-orange-600 dark:text-orange-400 focus:border-orange-500 outline-none w-16 uppercase" autocomplete="off" spellcheck="false" maxlength="1">
                        </div>
                        <button onclick="window.runAktivitas32_2()" id="btnRun32_2" class="mt-4 sm:mt-0 sm:ml-auto bg-orange-600 hover:bg-orange-500 text-white px-5 py-2 rounded-lg text-sm font-bold transition-colors shadow-sm active:scale-95">
                            Cek Jawaban
                        </button>
                    </div>
                </div>

                <div id="alert-32-2" class="hidden mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border transition-all text-center"></div>

                <div id="feedback-edukatif-32-2" class="hidden mt-4 bg-green-50 dark:bg-green-950/40 border border-green-200 dark:border-green-800 p-6 rounded-xl shadow-sm transition-colors prose prose-slate dark:prose-invert prose-sm max-w-none prose-justify overflow-hidden leading-relaxed">
                    <h4 class="font-bold text-green-900 dark:text-green-400 mb-3 border-b border-green-200 dark:border-green-800 pb-2">
                        Pembahasan Evaluasi
                    </h4>
                    <p class="text-sm text-green-800 dark:text-green-200 leading-relaxed text-justify mb-0">
                        Brilian! Anda benar-benar memahami cara kerja <em>Stack</em> (Tumpukan). Karena 'C' dimasukkan paling terakhir (berada di ujung kanan list <code>["B", "C"]</code>), maka perintah <code>pop()</code> akan mencabut 'C' lebih dulu. Inilah yang membuat DFS menukik tajam ke satu cabang (jalur C) sebelum memproses cabang lainnya (jalur B).
                    </p>
                </div>
            </div>

            {{-- SOAL 3: EARLY EXIT (DETEKSI TARGET) --}}
            <div id="activity-32-3-container" class="mb-4 opacity-50 pointer-events-none transition-opacity duration-500 relative">
                <h4 class="font-bold text-slate-800 dark:text-slate-200 text-lg mb-3">3. Deteksi Target (Early Exit)</h4>
                <div class="bg-orange-50 dark:bg-orange-950/30 border border-orange-200 dark:border-orange-800 rounded-xl p-6 mb-6 shadow-sm transition-colors">
                    <p class="text-sm text-slate-700 dark:text-slate-300 mb-4 leading-relaxed text-justify">
                        <strong>Skenario:</strong> Tim SAR menggunakan algoritma DFS untuk mencari orang hilang di dalam goa. Sang korban diketahui berada di goa "Zona_X". Jika korban sudah ditemukan, pencarian harus langsung dihentikan agar hemat waktu.
                    </p>
                    <div class="bg-white/80 dark:bg-slate-800/80 p-4 rounded border border-orange-200 dark:border-orange-700/50 font-medium text-orange-900 dark:text-orange-300 text-sm leading-relaxed transition-colors">
                        <strong>Tugas Anda:</strong> Lengkapi logika kode di bawah ini. Berikan perintah <code>break</code> (untuk menghentikan loop) jika <code>simpul_saat_ini</code> sama dengan <code>target</code>.
                    </div>
                </div>

                <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 font-mono text-sm relative flex flex-col transition-colors">
                    <div class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700 shrink-0">
                        <span class="text-slate-400 text-xs z-0">Terminal Editor Pyodide</span>
                        <button onclick="window.runAktivitas32_3()" id="btnRun32_3" class="bg-orange-600 hover:bg-orange-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors shadow-sm active:scale-95 z-10">
                            Cek Jawaban
                        </button>
                    </div>
                    
                    <div class="flex font-mono text-[12px] md:text-sm leading-[1.625] text-[#d4d4d4] overflow-x-auto z-0">
                        <div class="flex flex-col text-[#858585] text-right select-none py-6 pl-4 pr-4 border-r border-[#404040] bg-[#1e1e1e] shrink-0">
                             <span>1</span><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span><span>7</span><span>8</span><span>9</span><span>10</span><span>11</span><span>12</span><span>13</span>
                        </div>
                        
                        <div class="flex flex-col whitespace-pre py-6 pl-4 pr-6 w-full">
<div><span class="text-[#9cdcfe]">stack</span> = [<span class="text-[#ce9178]">"Zona_A"</span>, <span class="text-[#ce9178]">"Zona_C"</span>, <span class="text-[#ce9178]">"Zona_X"</span>, <span class="text-[#ce9178]">"Zona_F"</span>]</div>
<div><span class="text-[#9cdcfe]">target</span> = <span class="text-[#ce9178]">"Zona_X"</span></div>
<div> </div>
<div><span class="text-[#c586c0]">while</span> stack:</div>
<div>    <span class="text-[#9cdcfe]">simpul_saat_ini</span> = stack.<span class="text-[#dcdcaa]">pop</span>()</div>
<div>    <span class="text-[#dcdcaa]">print</span>(<span class="text-[#ce9178]">"Mengecek:"</span>, <span class="text-[#9cdcfe]">simpul_saat_ini</span>)</div>
<div> </div>
<div class="text-[#6a9955]">    # Jika simpul saat ini adalah target, HENTIKAN pencarian!</div>
<div>    <span class="text-[#c586c0]">if</span> <span class="text-[#9cdcfe]">simpul_saat_ini</span> == <input type="text" id="input32_3_1" class="inline-block align-middle bg-[#3c3c3c] dark:bg-slate-700 text-[#9cdcfe] border border-slate-500 dark:border-slate-500 rounded px-2 mx-1 w-24 outline-none focus:border-orange-400 focus:bg-[#2d2d2d] dark:focus:bg-slate-800 text-center transition-colors shadow-inner font-bold h-6 text-sm" autocomplete="off" spellcheck="false" placeholder="variabel"><span class="text-[#c586c0]">:</span></div>
<div>        <span class="text-[#dcdcaa]">print</span>(<span class="text-[#ce9178]">"Target Ditemukan!"</span>)</div>
<div>        <input type="text" id="input32_3_2" class="inline-block align-middle bg-[#3c3c3c] dark:bg-slate-700 text-[#c586c0] border border-slate-500 dark:border-slate-500 rounded px-2 mx-1 w-24 outline-none focus:border-orange-400 focus:bg-[#2d2d2d] dark:focus:bg-slate-800 text-center transition-colors shadow-inner font-bold h-6 text-sm" autocomplete="off" spellcheck="false" placeholder="perintah"> <span class="text-[#6a9955]"># Keluar dari loop</span></div>
<div> </div>
<div><span class="text-[#dcdcaa]">print</span>(<span class="text-[#ce9178]">"Operasi SAR Selesai."</span>)</div>
                        </div>
                    </div>

                    <div class="px-5 pb-5 pt-0 bg-[#1e1e1e]">
                        <hr class="border-slate-700 mb-4 mt-2">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-slate-500 text-[10px] font-bold tracking-widest uppercase z-0">OUTPUT TERMINAL</span>
                            <span id="status-terminal-32-3" class="bg-slate-800 text-slate-400 px-2 py-0.5 rounded text-[10px] z-0">Ready</span>
                        </div>
                        <div id="console-text-32-3" class="text-[#4af626] whitespace-pre-wrap break-words leading-relaxed text-sm italic opacity-60 z-0">(Output terminal akan tampil di sini setelah dijalankan)</div>
                    </div>
                </div>

                <div id="alert-32-3" class="hidden mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border transition-all text-center"></div>

                <div id="feedback-edukatif-32-3" class="hidden mt-4 bg-green-50 dark:bg-green-950/40 border border-green-200 dark:border-green-800 p-6 rounded-xl shadow-sm transition-colors prose prose-slate dark:prose-invert prose-sm max-w-none prose-justify overflow-hidden leading-relaxed">
                    <h4 class="font-bold text-green-900 dark:text-green-400 mb-3 border-b border-green-200 dark:border-green-800 pb-2">
                        Pembahasan Evaluasi
                    </h4>
                    <p class="text-sm text-green-800 dark:text-green-200 leading-relaxed text-justify mb-0">
                        Sempurna! Dalam kasus nyata, kita jarang melakukan traversal murni (mengunjungi semua titik sampai habis). Biasanya, BFS/DFS digunakan sebagai mesin pencari (Pendeteksi Target). Menggunakan kondisi <code>if</code> yang dikombinasikan dengan perintah <code>break</code> (atau <code>return</code>) akan sangat menghemat waktu pemrosesan CPU komputer Anda karena sisa antrean tidak perlu dikerjakan lagi.
                    </p>
                </div>
            </div>

        </div>

        <div class="flex justify-between gap-4 mt-12 pt-6 border-t border-slate-200 dark:border-slate-700">
            <button type="button" onclick="prevStep()" class="px-6 py-2.5 rounded-lg border border-slate-300 dark:border-slate-700 font-bold text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 transition shadow-sm active:scale-95">
                Kembali
            </button>
            <button type="button" id="btnNext32" onclick="nextStep()" class="px-6 py-2.5 bg-slate-900 dark:bg-slate-700 hover:bg-slate-800 dark:hover:bg-slate-600 text-white font-bold rounded-lg shadow-md transition-all active:scale-95 opacity-50 cursor-not-allowed" disabled>
                Lanjut
            </button>
        </div>

    </div>

    <script>
        window.ensurePyodideReady = async function() {
            if (window.pyodide) return window.pyodide;
            if (!window.loadPyodide) {
                await new Promise((resolve, reject) => {
                    const script = document.createElement('script');
                    script.src = 'https://cdn.jsdelivr.net/pyodide/v0.24.1/full/pyodide.js';
                    script.onload = resolve;
                    script.onerror = reject;
                    document.head.appendChild(script);
                });
            }
            window.pyodide = await window.loadPyodide({ indexURL: 'https://cdn.jsdelivr.net/pyodide/v0.24.1/full/' });
            return window.pyodide;
        };

        // FUNGSI LINE NUMBERS EDITOR SANDBOX 3.2
        window.syncLineNumbers32 = function() {
            const editor = document.getElementById('editor-sandbox-32');
            const lineNumEl = document.getElementById('line-numbers-32');
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

        window.net_isolasi_32 = null;
        window.nodes_32 = null;
        window.edges_32 = null;
        window.step_anim_32 = 0;

        document.addEventListener("DOMContentLoaded", function() {
            
            const editor32 = document.getElementById('editor-sandbox-32');
            if(editor32) {
                editor32.addEventListener('input', window.syncLineNumbers32);
            }
            
            window.nodes_32 = new vis.DataSet([
                { id: 'A', label: 'A\n(Start)', x: 0, y: -150, color: '#e2e8f0', font: {size: 14} },
                { id: 'B', label: 'B', x: -80, y: -60, color: '#e2e8f0' },
                { id: 'C', label: 'C', x: 80, y: -60, color: '#e2e8f0' },
                { id: 'D', label: 'D\n(Target)', x: -120, y: 30, color: '#e2e8f0', font: {size: 14} },
                { id: 'E', label: 'E', x: -40, y: 30, color: '#e2e8f0' },
                { id: 'F', label: 'F', x: 80, y: 30, color: '#e2e8f0' }
            ]);

            window.edges_32 = new vis.DataSet([
                { id: 'eAB', from: 'A', to: 'B', color: '#cbd5e1' },
                { id: 'eAC', from: 'A', to: 'C', color: '#cbd5e1' },
                { id: 'eBD', from: 'B', to: 'D', color: '#cbd5e1' },
                { id: 'eBE', from: 'B', to: 'E', color: '#cbd5e1' },
                { id: 'eCF', from: 'C', to: 'F', color: '#cbd5e1' }
            ]);

            const container = document.getElementById('dfs_isolasi_32');
            
            const options = {
                physics: false,
                interaction: { dragNodes: false, dragView: false, zoomView: false, hover: false, selectable: false },
                nodes: { shape: 'circle', font: { color: '#64748b', size: 16, bold: true }, borderWidth: 2, borderColor: 'white', margin: 12 },
                edges: { width: 3, arrows: 'to' }
            };

            if(container) {
                try {
                    window.net_isolasi_32 = new vis.Network(container, { nodes: window.nodes_32, edges: window.edges_32 }, options);
                    const forceCenterGraph = setInterval(() => {
                        if (container.offsetWidth > 0 && window.net_isolasi_32) {
                            window.net_isolasi_32.redraw();
                            window.net_isolasi_32.fit({ animation: false });
                        }
                    }, 200);
                    setTimeout(() => { clearInterval(forceCenterGraph); }, 3000);

                    if (window.ResizeObserver) {
                        new ResizeObserver(() => {
                            if (window.net_isolasi_32) {
                                window.net_isolasi_32.redraw();
                                window.net_isolasi_32.fit({ animation: false });
                            }
                        }).observe(container);
                    }
                } catch (error) { console.error(error); }
            }

            const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
            
            // Restore Sandbox
            const savedCode = localStorage.getItem('sandbox_3_2_code_' + userId);
            const defaultCode32 = `def jalankan_dfs(graf, titik_awal):
    dikunjungi = []
    stack = [titik_awal]                # Menyimpan tumpukan simpul yang akan dicek

    while stack:                      # Selama tumpukan belum kosong
        simpul_saat_ini = stack.pop()     # Ambil data paling BELAKANG/ATAS (LIFO)

        if simpul_saat_ini not in dikunjungi:
            dikunjungi.append(simpul_saat_ini) # Tandai sudah dikunjungi

            # Tambahkan semua tetangganya ke dalam tumpukan
            stack.extend(graf[simpul_saat_ini])

    return dikunjungi

# Dictionary Graf (Format sedikit berbeda dari BFS)
graf_kota = {
    'A': ['B', 'C'],
    'B': ['D', 'E'],
    'C': ['F'],
    'D': [], 'E': [], 'F': []
}

print("Hasil Penelusuran DFS:", jalankan_dfs(graf_kota, 'A'))`;

            // BUKA GEMBOK UTAMA JIKA SANDBOX SUDAH SELESAI
            if(localStorage.getItem('sandbox_3_2_done_' + userId) === 'true') {
                document.getElementById('output-explanation-32').classList.remove('hidden');
                
                // UNLOCK MAIN WRAPPER
                document.getElementById('main-activity-wrapper-32').classList.remove('opacity-50', 'pointer-events-none');
                const lockMsg = document.getElementById('lock-message-32');
                if(lockMsg) lockMsg.style.display = 'none';

                if(savedCode && editor32) {
                    editor32.value = savedCode; 
                } else if(editor32) {
                    editor32.value = defaultCode32;
                }
                setTimeout(window.syncLineNumbers32, 100);
                
                const btnRunSandbox = document.getElementById('btnRunSandbox32');
                if (btnRunSandbox) {
                    btnRunSandbox.innerHTML = '<i class="fa-solid fa-check"></i> Program Berhasil';
                    btnRunSandbox.classList.replace('bg-orange-600', 'bg-emerald-600');
                    btnRunSandbox.classList.replace('hover:bg-orange-500', 'hover:bg-emerald-500');
                }
                
                const outText = document.getElementById('sandbox-output-text-32');
                if (outText) {
                    outText.innerHTML = "Hasil Penelusuran DFS: ['A', 'C', 'F', 'B', 'E', 'D']";
                    outText.classList.remove('italic', 'opacity-60');
                    document.getElementById('status-sandbox-32').innerText = "Success";
                    document.getElementById('status-sandbox-32').className = "bg-green-700 text-white px-2 py-0.5 rounded text-[10px]";
                }
            } else {
                if(editor32) editor32.value = defaultCode32;
                setTimeout(window.syncLineNumbers32, 100);
            }

            // CEK PROGRESS MASING-MASING SUB-AKTIVITAS
            const isDoneServer = {{ isset($progress['3.2']) && $progress['3.2']->score == 100 ? 'true' : 'false' }};
            const isDoneLocal1 = localStorage.getItem('act_3_2_1_done_v2_' + userId) === 'true';
            const isDoneLocal2 = localStorage.getItem('act_3_2_2_done_v2_' + userId) === 'true';
            const isDoneLocal3 = localStorage.getItem('act_3_2_3_done_v2_' + userId) === 'true';

            if(isDoneServer || isDoneLocal1) { window.kunciJawaban32_1(localStorage.getItem('act_3_2_1_ans_v2_' + userId)); }
            if(isDoneServer || isDoneLocal2) { window.kunciJawaban32_2(); }
            if(isDoneServer || isDoneLocal3) { window.kunciJawaban32_3(); }
        });

        window.nextStepDFS_32 = function() {
            if (!window.nodes_32) return;
            const infoPanel = document.getElementById('dfs-info-panel');
            const btn = document.getElementById('btnNextDFS');
            window.step_anim_32++;

            if (window.step_anim_32 === 1) {
                window.nodes_32.update({id: 'A', color: '#ea580c', font: {color: 'white'}}); 
                infoPanel.innerHTML = `Robot memulai penelusuran dari <span class="text-orange-400 font-bold mx-1">Simpul A (Start)</span>.`;
            } 
            else if (window.step_anim_32 === 2) {
                window.nodes_32.update([{id: 'C', color: '#ea580c', font: {color: 'white'}}, {id: 'F', color: '#ea580c', font: {color: 'white'}}]);
                window.edges_32.update([{id: 'eAC', color: '#ea580c'}, {id: 'eCF', color: '#ea580c'}]);
                infoPanel.innerHTML = `Robot menembus lurus cabang terdalam <span class="text-orange-400 font-bold mx-1">A &rarr; C &rarr; F</span>.`;
            }
            else if (window.step_anim_32 === 3) {
                window.nodes_32.update([{id: 'B', color: '#f97316', font: {color: 'white'}}, {id: 'E', color: '#f97316', font: {color: 'white'}}]); 
                window.edges_32.update([{id: 'eAB', color: '#f97316'}, {id: 'eBE', color: '#f97316'}]);
                infoPanel.innerHTML = `F buntu. Robot mundur (Backtrack) dan mencoba cabang: <span class="text-orange-400 font-bold mx-1">B &rarr; E</span>.`;
            }
            else if (window.step_anim_32 === 4) {
                window.nodes_32.update([{id: 'D', color: '#10b981', font: {color: 'white'}}]); 
                window.edges_32.update([{id: 'eBD', color: '#10b981'}]);
                infoPanel.innerHTML = `E buntu. Robot mundur ke B, lalu berhasil menemukan <span class="text-green-400 font-bold mx-1">Simpul D (Target)</span>. Selesai!`;
                btn.disabled = true;
                btn.innerHTML = `<i class="fa-solid fa-flag-checkered mr-1"></i> Selesai`;
                btn.className = "bg-slate-300 dark:bg-slate-700 text-slate-500 dark:text-slate-400 px-4 py-1.5 rounded text-xs font-bold cursor-not-allowed shadow-none";
            }
        }

        window.resetDFS_32 = function() {
            if (!window.nodes_32) return;
            window.step_anim_32 = 0;
            window.nodes_32.forEach(n => window.nodes_32.update({id: n.id, color: '#e2e8f0', font: {color: '#64748b'}}));
            window.edges_32.forEach(e => window.edges_32.update({id: e.id, color: '#cbd5e1'}));
            
            document.getElementById('dfs-info-panel').innerHTML = `Tekan tombol <strong class="text-orange-400 mx-1">Langkah Selanjutnya</strong> untuk memulai simulasi DFS.`;
            const btn = document.getElementById('btnNextDFS');
            btn.disabled = false;
            btn.innerHTML = `Langkah Selanjutnya <i class="fa-solid fa-play ml-1"></i>`;
            btn.className = "bg-orange-600 hover:bg-orange-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors shadow-sm active:scale-95";
        }

        // --- VALIDASI SANDBOX 3.2 ---
        window.runSandbox32 = async function() {
            const editor = document.getElementById('editor-sandbox-32');
            const code = editor.value; 
            const outputText = document.getElementById('sandbox-output-text-32');
            const statusTerm = document.getElementById('status-sandbox-32');
            const explanation = document.getElementById('output-explanation-32');
            const actContainer = document.getElementById('activity-32-container');
            const btnRunSandbox = document.getElementById('btnRunSandbox32');

            outputText.classList.remove('italic', 'opacity-60');

            if(code.trim() === "") {
                outputText.className = "text-[#ff5f56]"; 
                outputText.innerHTML = "SyntaxError: Unexpected EOF while parsing. (Editor masih kosong!)";
                return;
            }

            btnRunSandbox.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Loading...';
            btnRunSandbox.disabled = true;
            statusTerm.innerText = "Running...";
            statusTerm.className = "bg-yellow-600 text-white px-2 py-0.5 rounded text-[10px] animate-pulse";

            try {
                const py = await window.ensurePyodideReady();
                py.runPython(`import sys\nfrom io import StringIO\nsys.stdout = StringIO()`);
                py.runPython(code);
                const stdout = py.runPython('sys.stdout.getvalue()');
                
                const cleanCode = code.replace(/\s/g, '').replace(/'/g, '"');
                const hasPop = cleanCode.includes("pop()");
                const hasWhile = cleanCode.includes("while");
                const hasAppend = cleanCode.includes("append");

                if (hasPop && hasWhile && hasAppend && stdout.includes("['A', 'C', 'F', 'B', 'E', 'D']")) {
                    outputText.className = "text-[#4af626]";
                    outputText.innerHTML = stdout.replace(/\n/g, '<br>');
                    
                    statusTerm.innerText = "Success";
                    statusTerm.className = "bg-green-700 text-white px-2 py-0.5 rounded text-[10px]";

                    btnRunSandbox.innerHTML = '<i class="fa-solid fa-check"></i> Program Berhasil';
                    btnRunSandbox.classList.replace('bg-orange-600', 'bg-emerald-600');
                    btnRunSandbox.classList.replace('hover:bg-orange-500', 'hover:bg-emerald-500');
                    
                    const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                    localStorage.setItem('sandbox_3_2_done_' + userId, 'true');
                    localStorage.setItem('sandbox_3_2_code_' + userId, code);

                    explanation.classList.remove('hidden');

                    // UNLOCK MAIN WRAPPER SETELAH SANDBOX BENAR
                    document.getElementById('main-activity-wrapper-32').classList.remove('opacity-50', 'pointer-events-none');
                    const lockMsg = document.getElementById('lock-message-32');
                    if(lockMsg) lockMsg.style.display = 'none';

                    setTimeout(() => { explanation.scrollIntoView({ behavior: 'smooth', block: 'center' }); }, 300);

                } else {
                    outputText.className = "text-[#ffbd2e]";
                    outputText.innerHTML = stdout.replace(/\n/g, '<br>') + `<br>> Validasi Gagal: Pastikan Anda menggunakan "pop()" tanpa indeks untuk menarik data dari Tumpukan (Stack).`;
                    statusTerm.innerText = "Logic Error";
                    statusTerm.className = "bg-amber-600 text-white px-2 py-0.5 rounded text-[10px]";
                }

            } catch (err) {
                outputText.className = "text-[#ff5f56]";
                outputText.innerHTML = "Traceback (most recent call last):<br>" + err.message;
                statusTerm.innerText = "Error";
                statusTerm.className = "bg-red-800 text-red-200 px-2 py-0.5 rounded text-[10px]";
            } finally {
                if (btnRunSandbox.innerHTML.includes('Loading')) {
                    btnRunSandbox.innerHTML = 'Coba Lagi';
                    btnRunSandbox.disabled = false;
                }
            }
        }

        // --- VALIDASI AKTIVITAS 1 ---
        window.runAktivitas32_1 = async function() {
            const inputVal = document.getElementById('input32_1_1').value.trim();
            const alertBox = document.getElementById('alert-32-1');
            const consoleText = document.getElementById('console-text-32-1');
            const statusTerm = document.getElementById('status-terminal-32-1');
            const btnRun = document.getElementById('btnRun32_1');

            consoleText.classList.remove('italic', 'opacity-60');

            if(inputVal === "") {
                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-yellow-50 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-400 border-yellow-200 dark:border-yellow-800 text-center transition-colors";
                alertBox.innerHTML = "Error: Syntax Tidak Lengkap. Masih ada bagian kode yang kosong.";
                alertBox.classList.remove('hidden');
                consoleText.innerHTML = "SyntaxError: Unexpected token '____'";
                consoleText.className = "text-[#ff5f56] whitespace-pre-wrap break-words leading-relaxed text-sm";
                return;
            }

            btnRun.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Memproses...';
            btnRun.disabled = true;

            try {
                const py = await window.ensurePyodideReady();
                py.runPython(`import sys\nfrom io import StringIO\nsys.stdout = StringIO()`);
                
                const pythonCode = `
antrean_pasien = ["Pasien_A", "Pasien_B", "Pasien_C"]
pasien_dipanggil = antrean_pasien.pop(${inputVal})
print("Pasien yang dilayani:", pasien_dipanggil)
print("Sisa antrean:", antrean_pasien)
                `;
                
                py.runPython(pythonCode);
                const stdout = py.runPython('sys.stdout.getvalue()');

                if((inputVal === "2" || inputVal === "-1" || inputVal === "") && stdout.includes("Pasien_C")) {
                    const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                    localStorage.setItem('act_3_2_1_done_v2_' + userId, 'true');
                    localStorage.setItem('act_3_2_1_ans_v2_' + userId, inputVal);

                    alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-green-50 dark:bg-green-900/30 text-green-800 dark:text-green-400 border-green-400 dark:border-green-800 text-center transition-colors";
                    alertBox.innerHTML = "Kompilasi Berhasil! Anda telah memanggil elemen terakhir dengan akurat.";
                    alertBox.classList.remove('hidden');

                    statusTerm.innerText = "Success";
                    statusTerm.className = "bg-green-700 text-white px-2 py-0.5 rounded text-[10px]";

                    consoleText.className = "text-[#4af626] whitespace-pre-wrap break-words leading-relaxed text-sm";
                    consoleText.innerHTML = stdout.replace(/\n/g, '<br>');

                    window.kunciJawaban32_1(inputVal);

                } else {
                    statusTerm.innerText = "Logic Error";
                    statusTerm.className = "bg-amber-600 text-white px-2 py-0.5 rounded text-[10px]";
                    
                    consoleText.className = "text-[#ff5f56] whitespace-pre-wrap break-words leading-relaxed text-sm";
                    consoleText.innerHTML = stdout.replace(/\n/g, '<br>') + `<br><span class="text-[#ffbd2e]">> Validasi Gagal: Anda tidak mengambil Pasien_C (elemen terakhir).</span>`;

                    alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-amber-50 dark:bg-amber-900/30 text-amber-800 dark:text-amber-400 border-amber-300 dark:border-amber-800 text-center transition-colors";
                    alertBox.innerHTML = "Logika Kurang Tepat: Untuk mengambil data paling belakang, pastikan Anda memasukkan indeks yang benar (yaitu indeks ke-2).";
                    alertBox.classList.remove('hidden');
                }

            } catch (err) {
                consoleText.className = "text-[#ff5f56] whitespace-pre-wrap break-words leading-relaxed text-sm";
                consoleText.innerHTML = "Traceback (most recent call last):<br>" + err.message;
                statusTerm.innerText = "Error";
                statusTerm.className = "bg-red-800 text-red-200 px-2 py-0.5 rounded text-[10px]";

                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-red-50 dark:bg-red-900/30 text-red-800 dark:text-red-400 border-red-300 dark:border-red-800 text-center transition-colors";
                alertBox.innerHTML = "Syntax Error: Pastikan Anda hanya mengisi bagian dalam kurung dengan angka (Integer) saja.";
                alertBox.classList.remove('hidden');
            } finally {
                btnRun.innerHTML = 'Cek Jawaban';
                btnRun.disabled = false;
            }
        }

        // --- VALIDASI AKTIVITAS 2 ---
        window.runAktivitas32_2 = function() {
            const inputVal = document.getElementById('input32_2_1').value.trim().toUpperCase();
            const alertBox = document.getElementById('alert-32-2');

            if(inputVal === "") {
                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-yellow-50 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-400 border-yellow-200 dark:border-yellow-800 text-center transition-colors";
                alertBox.innerHTML = "Jawaban masih kosong.";
                alertBox.classList.remove('hidden');
                return;
            }

            if(inputVal === "C") {
                const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                localStorage.setItem('act_3_2_2_done_v2_' + userId, 'true'); 

                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-green-50 dark:bg-green-900/30 text-green-800 dark:text-green-400 border-green-400 dark:border-green-800 text-center transition-colors";
                alertBox.innerHTML = "Tepat sekali! Anda memahami cara kerja Stack LIFO secara akurat.";
                alertBox.classList.remove('hidden');

                window.kunciJawaban32_2();

            } else {
                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-amber-50 dark:bg-amber-900/30 text-amber-800 dark:text-amber-400 border-amber-300 dark:border-amber-800 text-center transition-colors";
                alertBox.innerHTML = "Kurang Tepat: Ingat, struktur LIFO (Last-In First-Out) akan mengambil elemen yang diletakkan PALING AKHIR di dalam List.";
                alertBox.classList.remove('hidden');
            }
        }

        // --- VALIDASI AKTIVITAS 3 ---
        window.runAktivitas32_3 = async function() {
            const inputVal1 = document.getElementById('input32_3_1').value.trim();
            const inputVal2 = document.getElementById('input32_3_2').value.trim().toLowerCase();
            
            const alertBox = document.getElementById('alert-32-3');
            const consoleText = document.getElementById('console-text-32-3');
            const statusTerm = document.getElementById('status-terminal-32-3');
            const btnRun = document.getElementById('btnRun32_3');

            consoleText.classList.remove('italic', 'opacity-60');

            if(inputVal1 === "" || inputVal2 === "") {
                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-yellow-50 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-400 border-yellow-200 dark:border-yellow-800 text-center transition-colors";
                alertBox.innerHTML = "Error: Syntax Tidak Lengkap. Masih ada bagian kode yang kosong.";
                alertBox.classList.remove('hidden');
                consoleText.innerHTML = "SyntaxError: invalid syntax";
                consoleText.className = "text-[#ff5f56] whitespace-pre-wrap break-words leading-relaxed text-sm";
                return;
            }

            btnRun.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Memproses...';
            btnRun.disabled = true;

            try {
                const py = await window.ensurePyodideReady();
                py.runPython(`import sys\nfrom io import StringIO\nsys.stdout = StringIO()`);
                
                const pythonCode = `
stack = ["Zona_A", "Zona_C", "Zona_X", "Zona_F"]
target = "Zona_X"

while stack:
    simpul_saat_ini = stack.pop()
    print("Mengecek:", simpul_saat_ini)
    
    if simpul_saat_ini == ${inputVal1}:
        print("Target Ditemukan!")
        ${inputVal2}

print("Operasi SAR Selesai.")
                `;
                
                py.runPython(pythonCode);
                const stdout = py.runPython('sys.stdout.getvalue()');

                if(inputVal1 === "target" && inputVal2 === "break" && stdout.includes("Target Ditemukan!") && !stdout.includes("Zona_C")) {
                    const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                    localStorage.setItem('act_3_2_3_done_v2_' + userId, 'true'); 

                    alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-green-50 dark:bg-green-900/30 text-green-800 dark:text-green-400 border-green-400 dark:border-green-800 text-center transition-colors";
                    alertBox.innerHTML = "Kompilasi Berhasil! Anda sukses menghentikan pencarian tepat saat target ditemukan.";
                    alertBox.classList.remove('hidden');

                    statusTerm.innerText = "Success";
                    statusTerm.className = "bg-green-700 text-white px-2 py-0.5 rounded text-[10px]";

                    consoleText.className = "text-[#4af626] whitespace-pre-wrap break-words leading-relaxed text-sm";
                    consoleText.innerHTML = stdout.replace(/\n/g, '<br>');

                    window.kunciJawaban32_3();

                    // DIRECT FETCH: TEMBAK LANGSUNG KE CONTROLLER (ANTI GAGAL) SETELAH FULL 3 SOAL SELESAI
                    fetch("{{ route('submit.score') }}", { 
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            chapter: "bab3",
                            section: "3.2",
                            score: 100,
                            answer: "Berhasil Live Coding 3.2"
                        })
                    })
                    .then(async response => {
                        const data = await response.json();
                        if (!response.ok) throw new Error(data.message || 'Server menolak data');
                    })
                    .catch(error => {
                        console.error("GAGAL SIMPAN KE DB:", error);
                    });

                } else {
                    statusTerm.innerText = "Logic Error";
                    statusTerm.className = "bg-amber-600 text-white px-2 py-0.5 rounded text-[10px]";
                    
                    consoleText.className = "text-[#ff5f56] whitespace-pre-wrap break-words leading-relaxed text-sm";
                    consoleText.innerHTML = stdout.replace(/\n/g, '<br>') + `<br><span class="text-[#ffbd2e]">> Validasi Gagal: Program gagal mendeteksi target atau gagal berhenti (looping kelewatan).</span>`;

                    alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-amber-50 dark:bg-amber-900/30 text-amber-800 dark:text-amber-400 border-amber-300 dark:border-amber-800 text-center transition-colors";
                    alertBox.innerHTML = "Logika Kurang Tepat: Pastikan Anda membandingkan simpul_saat_ini dengan variabel yang menyimpan Zona_X, lalu gunakan perintah bawaan Python untuk menghancurkan (break) loop.";
                    alertBox.classList.remove('hidden');
                }

            } catch (err) {
                consoleText.className = "text-[#ff5f56] whitespace-pre-wrap break-words leading-relaxed text-sm";
                consoleText.innerHTML = "Traceback (most recent call last):<br>" + err.message;
                statusTerm.innerText = "Error";
                statusTerm.className = "bg-red-800 text-red-200 px-2 py-0.5 rounded text-[10px]";

                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-red-50 dark:bg-red-900/30 text-red-800 dark:text-red-400 border-red-300 dark:border-red-800 text-center transition-colors";
                alertBox.innerHTML = "Syntax Error: Nama variabel atau sintaks yang Anda ketikkan salah/tidak terdefinisi.";
                alertBox.classList.remove('hidden');
            } finally {
                btnRun.innerHTML = 'Cek Jawaban';
                btnRun.disabled = false;
            }
        }


        // ==========================================
        // KUNCI JAWABAN & UNLOCK BERUNTUN
        // ==========================================
        window.kunciJawaban32_1 = function(answeredValue) {
            const el = document.getElementById('input32_1_1');
            if(el) {
                el.value = answeredValue || "2"; 
                el.disabled = true;
                el.classList.remove('bg-[#3c3c3c]', 'dark:bg-slate-700', 'text-[#b5cea8]', 'border-slate-500', 'dark:border-slate-500');
                el.classList.add('bg-emerald-600', 'text-white', 'border-emerald-500', 'cursor-not-allowed', 'shadow-inner');
            }

            const btnRun = document.getElementById('btnRun32_1');
            if(btnRun) {
                btnRun.innerHTML = 'Diselesaikan';
                btnRun.classList.replace('bg-orange-600', 'bg-slate-600');
                btnRun.classList.replace('hover:bg-orange-500', 'cursor-not-allowed');
                btnRun.disabled = true;
            }

            document.getElementById('feedback-edukatif-32-1').classList.remove('hidden');

            // UNLOCK ACTIVITY 2
            document.getElementById('activity-32-2-container').classList.remove('opacity-50', 'pointer-events-none');
        }

        window.kunciJawaban32_2 = function() {
            const el = document.getElementById('input32_2_1');
            if(el) {
                el.value = "C"; 
                el.disabled = true;
                el.classList.remove('bg-transparent', 'text-orange-600', 'dark:text-orange-400', 'border-slate-400', 'dark:border-slate-500');
                el.classList.add('bg-emerald-600', 'text-white', 'border-emerald-500', 'cursor-not-allowed', 'shadow-inner');
            }

            const btnRun = document.getElementById('btnRun32_2');
            if(btnRun) {
                btnRun.innerHTML = 'Diselesaikan';
                btnRun.classList.replace('bg-orange-600', 'bg-slate-600');
                btnRun.classList.replace('hover:bg-orange-500', 'cursor-not-allowed');
                btnRun.disabled = true;
            }

            document.getElementById('feedback-edukatif-32-2').classList.remove('hidden');

            // UNLOCK ACTIVITY 3
            document.getElementById('activity-32-3-container').classList.remove('opacity-50', 'pointer-events-none');
        }

        window.kunciJawaban32_3 = function() {
            const el1 = document.getElementById('input32_3_1');
            const el2 = document.getElementById('input32_3_2');
            
            if(el1) {
                el1.value = "target"; 
                el1.disabled = true;
                el1.classList.remove('bg-[#3c3c3c]', 'dark:bg-slate-700', 'text-[#9cdcfe]', 'border-slate-500', 'dark:border-slate-500');
                el1.classList.add('bg-emerald-600', 'text-white', 'border-emerald-500', 'cursor-not-allowed', 'shadow-inner');
            }
            if(el2) {
                el2.value = "break"; 
                el2.disabled = true;
                el2.classList.remove('bg-[#3c3c3c]', 'dark:bg-slate-700', 'text-[#c586c0]', 'border-slate-500', 'dark:border-slate-500');
                el2.classList.add('bg-emerald-600', 'text-white', 'border-emerald-500', 'cursor-not-allowed', 'shadow-inner');
            }

            const btnRun = document.getElementById('btnRun32_3');
            if(btnRun) {
                btnRun.innerHTML = 'Diselesaikan';
                btnRun.classList.replace('bg-orange-600', 'bg-slate-600');
                btnRun.classList.replace('hover:bg-orange-500', 'cursor-not-allowed');
                btnRun.disabled = true;
            }

            document.getElementById('feedback-edukatif-32-3').classList.remove('hidden');

            // UNLOCK NEXT BUTTON
            const btnNext = document.getElementById('btnNext32');
            if(btnNext) {
                btnNext.disabled = false;
                btnNext.classList.remove('opacity-50', 'cursor-not-allowed');
                btnNext.classList.replace('bg-slate-900', 'bg-orange-600');
                btnNext.classList.replace('dark:bg-slate-700', 'dark:bg-orange-600');
                btnNext.classList.replace('hover:bg-slate-800', 'hover:bg-orange-700');
            }
        }
    </script>
</section>