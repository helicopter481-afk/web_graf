<section id="step-1" class="step-slide">
    {{-- IMPORT VIS JS --}}
    <script type="text/javascript" src="https://unpkg.com/vis-network/standalone/umd/vis-network.min.js"></script>

    <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm p-8 md:p-10 max-w-6xl mx-auto -mt-8 transition-colors">

        {{-- JUDUL MATERI --}}
        <div class="border-b border-slate-200 dark:border-slate-700 pb-6 mb-8 transition-colors">
            <h2 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white mb-2 flex items-center gap-3">
                <i class="fa-solid fa-water text-blue-500"></i> 3.1 Breadth-First Search (BFS)
            </h2>
            <p class="text-slate-500 dark:text-slate-400 font-medium">Menelusuri graf secara melebar (Level demi Level) menggunakan Queue.</p>
        </div>

        {{-- KONTEN TEORI YANG DISEMPURNAKAN (LEBIH MENDALAM & RELEVAN) --}}
        <div class="space-y-8 mb-12">
            
            {{-- Pengantar Utama --}}
            <div class="bg-blue-50 dark:bg-blue-900/20 border-l-4 border-blue-500 p-5 rounded-r-xl transition-colors">
                <h3 class="text-lg font-bold text-blue-900 dark:text-blue-300 mb-2">Apa itu Konsep Pencarian Melebar (BFS)?</h3>
                <p class="text-sm md:text-base text-blue-800 dark:text-blue-200 leading-relaxed text-justify">
                    <strong>Breadth-First Search (BFS)</strong> adalah salah satu algoritma fundamental untuk menelusuri atau mencari sebuah simpul (node) pada graf. Alih-alih menyusuri satu jalan sempit sampai mentok ke ujung (seperti menyusuri lorong labirin), BFS lebih memilih menyapu bersih semua area di sekitarnya secara merata sebelum melangkah lebih jauh. Ibarat gelombang air yang tercipta saat Anda melempar batu ke danau: riaknya akan meluas lingkaran demi lingkaran.
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-8 items-start">
                <div class="prose prose-slate dark:prose-invert text-slate-700 dark:text-slate-300 leading-relaxed text-justify text-sm md:text-base max-w-none">
                    <p>
                        <strong>Analogi Dunia Nyata: Jaringan Pertemanan</strong><br>
                        Bayangkan Anda sedang mencari informasi lowongan kerja di sebuah kota. Logikanya, Anda pasti akan bertanya kepada <strong>"teman dekat" (Level 1)</strong> Anda terlebih dahulu. Jika tidak ada satupun teman dekat yang tahu, barulah Anda meminta tolong kepada mereka untuk menanyakannya kepada <strong>"teman dari teman Anda" (Level 2)</strong>, dan begitu seterusnya. BFS bekerja persis dengan pola <em>ekspansi bertahap</em> seperti ini.
                    </p>
                    <p class="mt-4">
                        <strong>Mengapa Menggunakan Queue (Antrean)?</strong><br>
                        Agar komputer tidak "lupa" dan tidak melompati urutan level, BFS menggunakan bantuan struktur data memori bernama <strong>Queue (Antrean)</strong>. Prinsipnya persis antrean kasir supermarket: <strong>First-In First-Out (FIFO)</strong>. Simpul yang ditemukan lebih dulu akan dimasukkan ke antrean paling belakang, dan komputer <em>wajib mengeksplorasi</em> simpul yang berada di antrean paling depan terlebih dahulu. Di Python, kita memanggil elemen antrean paling depan ini menggunakan perintah <code>pop(0)</code>.
                    </p>
                </div>
                
                {{-- ILUSTRASI JEMBATAN KONSEPTUAL --}}
                <div class="bg-slate-50 dark:bg-slate-800/50 border-2 border-slate-200 dark:border-slate-700 rounded-xl p-5 shadow-sm transition-colors flex flex-col items-center justify-center">
                    <div class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-widest mb-4">Ilustrasi Analogi "Level"</div>
                    
                    {{-- Diagram Level CSS murni (Aman Dark Mode) --}}
                    <div class="relative w-full max-w-[280px] font-bold text-sm text-center">
                        {{-- Level 0 --}}
                        <div class="flex items-center gap-3 w-full mb-6 relative z-10">
                            <div class="w-20 text-right text-xs text-slate-400">Level 0<br><span class="font-normal text-[10px]">(Anda)</span></div>
                            <div class="flex-1 flex justify-center">
                                <div class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center shadow-md ring-4 ring-blue-100 dark:ring-blue-900/50 relative z-20">A</div>
                            </div>
                        </div>
                        
                        {{-- Garis Penghubung --}}
                        <div class="absolute top-[20px] left-[50%] w-[100px] h-[35px] border-b-2 border-r-2 border-l-2 border-slate-300 dark:border-slate-600 rounded-b-xl -translate-x-1/2 z-0"></div>
                        <div class="absolute top-[75px] left-[50%] w-[10px] h-[35px] border-r-2 border-slate-300 dark:border-slate-600 z-0"></div>

                        {{-- Level 1 --}}
                        <div class="flex items-center gap-3 w-full mb-6 relative z-10">
                            <div class="w-20 text-right text-xs text-slate-400">Level 1<br><span class="font-normal text-[10px]">(Teman Dekat)</span></div>
                            <div class="flex-1 flex justify-between px-10">
                                <div class="w-10 h-10 rounded-full bg-emerald-500 text-white flex items-center justify-center shadow-md ring-4 ring-emerald-100 dark:ring-emerald-900/50 relative z-20">B</div>
                                <div class="w-10 h-10 rounded-full bg-emerald-500 text-white flex items-center justify-center shadow-md ring-4 ring-emerald-100 dark:ring-emerald-900/50 relative z-20">C</div>
                            </div>
                        </div>

                        {{-- Level 2 --}}
                        <div class="flex items-center gap-3 w-full relative z-10">
                            <div class="w-20 text-right text-xs text-slate-400">Level 2<br><span class="font-normal text-[10px]">(Temannya Teman)</span></div>
                            <div class="flex-1 flex justify-center">
                                <div class="w-10 h-10 rounded-full border-2 border-dashed border-slate-400 dark:border-slate-500 text-slate-400 flex items-center justify-center relative z-20">D..</div>
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
                    Sekarang, mari kita lihat bagaimana algoritma tersebut bekerja pada sebuah struktur graf. Sistem akan memulai penelusuran dari <strong>Simpul A (Titik Awal)</strong> dengan tujuan menemukan lokasi <strong>Simpul E (Titik Target)</strong>. Perhatikan bagaimana radar BFS menyapu simpul-simpul terdekat (B dan C) terlebih dahulu secara bersamaan.
                </p>
            </div>
        </div>

        {{-- VISUALISASI INTERAKTIF BFS --}}
        <div class="bg-slate-50 dark:bg-slate-800/50 p-5 rounded-xl border border-slate-200 dark:border-slate-700 shadow-inner w-full flex flex-col items-center mb-10 group relative transition-colors">
            <div class="w-full flex justify-between items-center mb-3">
                <span class="font-bold text-slate-700 dark:text-slate-200 text-sm">Simulasi BFS Interaktif</span>
                <div class="flex gap-2">
                    <button onclick="window.resetBFS_31()" class="bg-white dark:bg-slate-700 border border-slate-300 dark:border-slate-600 hover:bg-slate-100 dark:hover:bg-slate-600 text-slate-700 dark:text-slate-200 px-3 py-1.5 rounded text-xs font-bold transition-colors shadow-sm active:scale-95">
                        <i class="fa-solid fa-rotate-left mr-1"></i> Ulangi
                    </button>
                    <button id="btnNextBFS" onclick="window.nextStepBFS_31()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors shadow-sm active:scale-95">
                        Langkah Selanjutnya <i class="fa-solid fa-play ml-1"></i>
                    </button>
                </div>
            </div>
            
            {{-- Ditinggikan menjadi 400px agar terhindar dari panel bawah yang menutupi node E --}}
            <div id="bfs_isolasi_31" class="w-full h-[400px] bg-white dark:bg-slate-900 rounded-lg border border-slate-200 dark:border-slate-700 shadow-sm relative overflow-hidden cursor-crosshair transition-colors"></div>
            
            {{-- Panel Info Interaktif --}}
            <div class="absolute bottom-6 left-0 right-0 px-4 flex justify-center pointer-events-none">
                <div id="bfs-info-panel" class="bg-slate-900 dark:bg-slate-800 border border-slate-700 text-white text-sm px-6 py-3 rounded-full shadow-lg text-center transition-all duration-300 w-auto max-w-4xl mx-auto flex items-center gap-3">
                    <i class="fa-solid fa-hand-pointer text-blue-400 animate-bounce"></i> Tekan tombol <strong>Langkah Selanjutnya</strong> untuk memulai simulasi.
                </div>
            </div>
        </div>
        
        {{-- PENJELASAN LANGKAH SIMULASI BFS --}}
        <div class="mb-12 p-6 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 rounded-xl shadow-sm transition-colors">
            <h4 class="font-bold text-slate-800 dark:text-slate-200 text-sm mb-4 flex items-center gap-2">
                <i class="fa-solid fa-shoe-prints text-blue-500"></i> Rincian Alur Penelusuran BFS:
            </h4>
            <ul class="list-disc list-outside ml-5 text-sm text-slate-700 dark:text-slate-300 space-y-3 leading-relaxed text-justify">
                <li>
                    <strong>Langkah 1 (Level 0):</strong> Algoritma selalu bergerak dari titik awal. <strong>Simpul A</strong> dikunjungi pertama kali dan datanya direkam ke dalam antrean.
                </li>
                <li>
                    <strong>Langkah 2 (Level 1):</strong> Sesuai sifatnya yang menyapu <strong>melebar</strong>, komputer akan mengunjungi semua tetangga terdekat dari A secara merata terlebih dahulu, yaitu <strong>Simpul B dan C</strong>.
                </li>
                <li>
                    <strong>Langkah 3 (Level 2):</strong> Setelah seluruh area di Level 1 habis dicek, barulah algoritma turun. Ia mengunjungi tetangga dari B (yaitu <strong>Simpul D</strong>) dan tetangga dari C (yaitu <strong>Simpul F</strong>).
                </li>
                <li>
                    <strong>Langkah 4 (Level 3):</strong> Terakhir, algoritma turun lagi menuju ujung jalur dan berhasil menemukan <strong>Simpul E (Target)</strong>. Penelusuran graf selesai secara sistematis!
                </li>
            </ul>
        </div>

        {{-- ========================================== --}}
        {{-- CONTOH KODE PROGRAM (ANTI-COPY) --}}
        {{-- ========================================== --}}
        <div class="mb-12">
            <h3 class="text-lg font-bold text-slate-800 dark:text-slate-100 mb-3 border-l-4 border-blue-500 pl-3">Contoh Implementasi Python:</h3>
            
            <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 select-none flex flex-col h-auto mb-4 relative group">
                <div class="bg-[#2d2d2d] px-4 py-2.5 flex items-center gap-2 border-b border-slate-700 shrink-0">
                    <div class="w-2.5 h-2.5 rounded-full bg-[#ff5f56]"></div>
                    <div class="w-2.5 h-2.5 rounded-full bg-[#ffbd2e]"></div>
                    <div class="w-2.5 h-2.5 rounded-full bg-[#27c93f]"></div>
                    <span class="text-slate-400 text-[10px] ml-2 font-mono">bfs_traversal.py (Hanya Baca)</span>
                </div>
                
                {{-- CODE BLOCK WITH LINE NUMBERS --}}
                <div class="flex font-mono text-[12px] md:text-sm text-[#d4d4d4] overflow-x-auto">
                    {{-- Line Numbers --}}
                    <div class="flex flex-col text-[#858585] text-right select-none py-5 pl-4 pr-4 border-r border-[#404040] bg-[#1e1e1e] leading-[1.625] shrink-0">
                        <span>1</span><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span><span>7</span><span>8</span><span>9</span><span>10</span><span>11</span><span>12</span><span>13</span><span>14</span><span>15</span><span>16</span><span>17</span><span>18</span><span>19</span><span>20</span><span>21</span><span>22</span><span>23</span><span>24</span>
                    </div>
                    
                    {{-- Code Content (Presisi 24 Baris) --}}
                    <div class="flex flex-col whitespace-pre py-5 pl-4 pr-6 leading-[1.625]">
                        <div class="text-[#569cd6]">def <span class="text-[#dcdcaa]">jalankan_bfs</span>(graf, titik_awal):</div>
                        <div class="ml-4">dikunjungi = []</div>
                        <div class="ml-4">antrean = [titik_awal]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-[#6a9955]"># Menyimpan antrean simpul yang akan dicek</span></div>
                        <div>&nbsp;</div>
                        <div class="ml-4"><span class="text-[#c586c0]">while</span> antrean:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-[#6a9955]"># Selama antrean belum kosong</span></div>
                        <div class="ml-8">simpul_saat_ini = antrean.<span class="text-[#dcdcaa]">pop</span>(<span class="text-[#b5cea8]">0</span>)&nbsp;<span class="text-[#6a9955]"># Ambil antrean paling DEPAN (Indeks 0)</span></div>
                        <div>&nbsp;</div>
                        <div class="ml-8"><span class="text-[#c586c0]">if</span> simpul_saat_ini <span class="text-[#c586c0]">not in</span> dikunjungi:</div>
                        <div class="ml-12">dikunjungi.<span class="text-[#dcdcaa]">append</span>(simpul_saat_ini)&nbsp;<span class="text-[#6a9955]"># Tandai sudah dikunjungi</span></div>
                        <div>&nbsp;</div>
                        <div class="ml-12"><span class="text-[#6a9955]"># Tambahkan semua tetangganya ke dalam antrean</span></div>
                        <div class="ml-12">antrean.<span class="text-[#dcdcaa]">extend</span>(graf[simpul_saat_ini])</div>
                        <div>&nbsp;</div>
                        <div class="ml-4"><span class="text-[#c586c0]">return</span> dikunjungi</div>
                        <div>&nbsp;</div>
                        <div class="text-[#6a9955]"># Dictionary Graf</div>
                        <div>graf_kota = {</div>
                        <div class="ml-4"><span class="text-[#ce9178]">'A'</span>: [<span class="text-[#ce9178]">'B'</span>, <span class="text-[#ce9178]">'C'</span>],</div>
                        <div class="ml-4"><span class="text-[#ce9178]">'B'</span>: [<span class="text-[#ce9178]">'D'</span>],</div>
                        <div class="ml-4"><span class="text-[#ce9178]">'C'</span>: [<span class="text-[#ce9178]">'F'</span>],</div>
                        <div class="ml-4"><span class="text-[#ce9178]">'D'</span>: [<span class="text-[#ce9178]">'E'</span>], <span class="text-[#ce9178]">'E'</span>: [], <span class="text-[#ce9178]">'F'</span>: []</div>
                        <div>}</div>
                        <div>&nbsp;</div>
                        <div><span class="text-[#dcdcaa]">print</span>(<span class="text-[#ce9178]">"Hasil Penelusuran BFS:"</span>, jalankan_bfs(graf_kota, <span class="text-[#ce9178]">'A'</span>))</div>
                    </div>
                </div>
            </div>
            
            {{-- PENJELASAN KODE PROGRAM --}}
            <div class="p-6 border border-slate-200 dark:border-slate-700 rounded-xl bg-slate-50 dark:bg-slate-900/50 transition-colors">
                <h4 class="font-bold text-slate-800 dark:text-slate-200 text-sm mb-4">Pembedahan Sintaks (Langkah demi Langkah):</h4>
                <ul class="list-disc list-outside ml-5 text-sm text-slate-700 dark:text-slate-300 space-y-3 leading-relaxed text-justify">
                    <li><strong>Baris 2 & 3 (Persiapan):</strong> Kita membuat wadah `dikunjungi` ibarat <strong>"Buku Tamu"</strong>, dan `antrean` ibarat <strong>"Kursi Tunggu Kasir"</strong>. <code>titik_awal</code> ('A') langsung disuruh duduk di kursi tunggu pertama.</li>
                    <li><strong>Baris 5 (Memulai Antrean):</strong> Perintah <code>while antrean:</code> artinya: <em>"Selama masih ada orang yang duduk di kursi tunggu, kasir akan terus bekerja memanggil."</em></li>
                    <li><strong>Baris 6 (Konsep FIFO):</strong> Ini adalah kunci utama BFS! Perintah <code>antrean.pop(0)</code> memaksa kasir untuk memanggil orang yang duduk di <strong>urutan ke-0 (paling depan)</strong>. Siapa yang datang duluan, dia yang dilayani duluan.</li>
                    <li><strong>Baris 8 & 9 (Mencatat Buku Tamu):</strong> Sistem mengecek, apakah orang ini sudah pernah dilayani? Jika belum (<code>not in dikunjungi</code>), maka catat namanya di buku tamu agar tidak dipanggil dua kali.</li>
                    <li><strong>Baris 12 (Menyebarkan BFS):</strong> Setelah dilayani, orang tersebut ditanya siapa saja temannya (tetangga graf). Perintah <code>extend()</code> menyuruh semua temannya itu untuk langsung masuk dan duduk di kursi tunggu <strong>paling belakang</strong>.</li>
                </ul>
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- INTERACTIVE SANDBOX: KETIK ULANG KODE --}}
        {{-- ========================================== --}}
        <div class="mb-10 bg-blue-50/30 dark:bg-blue-950/20 border-2 border-blue-200 dark:border-blue-800/60 p-6 rounded-xl shadow-sm transition-colors">
            <h3 class="text-lg font-bold text-slate-800 dark:text-slate-100 mb-2">Coba Sendiri!</h3>
            <p class="text-sm text-slate-600 dark:text-slate-300 mb-4">
                Ketik ulang keseluruhan kode pada contoh di atas ke dalam editor di bawah ini (tidak perlu mengetik komentarnya). Biasakan jari Anda dengan sintaks Python!
            </p>

            <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 font-mono text-sm flex flex-col">
                <div class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700 shrink-0">
                    <span class="text-slate-400 text-xs">Terminal Editor Pyodide</span>
                    <button onclick="window.runSandbox31()" id="btnRunSandbox31" class="bg-green-600 hover:bg-green-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors shadow-sm active:scale-95">
                        Jalankan Program
                    </button>
                </div>
                
                {{-- DYNAMIC EDITOR LAYOUT --}}
                <div class="flex font-mono text-[12px] md:text-sm text-[#d4d4d4] bg-[#1e1e1e] relative min-h-[160px] leading-[1.625]">
                    {{-- Container Angka Baris (Kiri) --}}
                    <div id="line-numbers-31" class="text-[#858585] text-right select-none py-5 pl-4 pr-4 border-r border-[#404040] bg-[#1e1e1e] shrink-0 z-10 leading-[1.625]">
                        <div>1</div>
                    </div>
                    
                    {{-- Textarea Editor (Kanan) --}}
                    <textarea id="editor-sandbox-31" class="w-full bg-transparent text-[#d4d4d4] outline-none resize-none py-5 pl-4 pr-6 whitespace-pre overflow-x-auto z-0 leading-[1.625]" spellcheck="false" placeholder="# Ketik kode Python di sini..." oninput="window.syncLineNumbers31()"></textarea>
                </div>

                {{-- WADAH OUTPUT TERMINAL --}}
                <div class="px-5 pb-5 pt-2 bg-[#1e1e1e]">
                    <hr class="border-slate-700 mb-4">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-slate-500 text-[10px] font-bold tracking-widest uppercase">OUTPUT TERMINAL</span>
                        <span id="status-sandbox-31" class="bg-slate-800 text-slate-400 px-2 py-0.5 rounded text-[10px]">Ready</span>
                    </div>
                    <div id="sandbox-output-text" class="text-[#4af626] whitespace-pre-wrap break-words min-h-[20px] italic opacity-60">(Output akan tampil di sini setelah dijalankan)</div>
                </div>
            </div>
        </div>

        {{-- OUTPUT EXPLANATION (MUNCUL SETELAH SANDBOX BERHASIL) --}}
        <div id="output-explanation-31" class="mb-12 hidden transition-all duration-700 border-l-4 border-green-400 dark:border-green-600 pl-6 py-2 overflow-hidden prose prose-slate dark:prose-invert prose-sm prose-compact max-w-none prose-justify">
            <h4 class="font-bold text-slate-800 dark:text-slate-200 text-sm mb-3">Output Program:</h4>
            <div class="bg-black text-[#4af626] font-mono text-sm p-4 rounded-md shadow-inner mb-6 border border-slate-800 dark:border-green-900/50">
                Hasil Penelusuran BFS: ['A', 'B', 'C', 'D', 'F', 'E']
            </div>
            
            <h4 class="font-bold text-slate-800 dark:text-slate-200 text-sm mb-3">Analisis Output:</h4>
            <ul class="list-disc list-outside ml-4 text-sm text-slate-700 dark:text-slate-300 space-y-2 text-justify">
                <li>Sesuai dengan hasil eksekusi, algoritma BFS mengunjungi tetangga terdekat dari 'A' terlebih dahulu (yaitu 'B' dan 'C').</li>
                <li>Setelah itu, barulah algoritma turun ke level berikutnya untuk mengunjungi 'D' dan 'F', lalu yang terakhir adalah 'E'.</li>
                <li>Hal ini membuktikan bahwa sifat FIFO (Antrean) membuat pencarian target dilakukan secara merata (level demi level).</li>
            </ul>
        </div>

        {{-- ========================================== --}}
        {{-- BLOK AKTIVITAS UTAMA 3.1 (TERKUNCI SECARA DEFAULT) --}}
        {{-- ========================================== --}}
        <div id="main-activity-wrapper-31" class="mt-12 pt-8 border-t-[3px] border-dashed border-slate-200 dark:border-slate-700 transition-all duration-700 opacity-50 pointer-events-none relative">
            
            {{-- Pesan Terkunci --}}
            <div id="lock-message-31" class="absolute top-20 left-1/2 -translate-x-1/2 z-10 flex items-center justify-center w-full">
                <div class="bg-slate-800/90 dark:bg-slate-900/90 border border-slate-600 text-white text-sm px-6 py-3 rounded-full font-bold shadow-xl backdrop-blur-sm flex items-center gap-3">
                    <i class="fa-solid fa-lock text-slate-400"></i> Selesaikan "Coba Sendiri" untuk membuka aktivitas
                </div>
            </div>

            <div class="flex items-center gap-3 mb-8">
                <span class="bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider shadow-sm">Aktivitas 3.1</span>
                <h3 class="font-bold text-slate-900 dark:text-slate-100 text-xl">Uji Pemahaman: Breadth-First Search</h3>
            </div>

            {{-- SOAL 1: FLEKSIBILITAS INDEKS --}}
            <div id="activity-31-1-container" class="mb-10 transition-opacity duration-500">
                <h4 class="font-bold text-slate-800 dark:text-slate-200 text-lg mb-3">1. Fleksibilitas Indeks Antrean</h4>
                <div class="bg-blue-50 dark:bg-blue-950/30 border border-blue-200 dark:border-blue-800 rounded-xl p-6 mb-6 shadow-sm transition-colors">
                    <p class="text-sm text-blue-900 dark:text-blue-200 leading-relaxed text-justify mb-3">
                        <strong>Skenario:</strong> Anda sedang membuat sistem antrean rumah sakit. Tiba-tiba, pasien di urutan pertama (Pasien_A) izin ke toilet. Sistem harus melompati antrean dan memanggil pasien di urutan <strong>kedua</strong> (Pasien_B) terlebih dahulu.
                    </p>
                    <div class="bg-white/80 dark:bg-slate-800/80 p-4 rounded border border-blue-200 dark:border-blue-700 font-medium text-blue-900 dark:text-blue-300 text-sm shadow-sm leading-relaxed flex flex-wrap items-center gap-2 transition-colors">
                        <strong>Tugas Anda:</strong> Lengkapi bagian 
                        <span class="bg-blue-100 dark:bg-blue-900/60 px-1.5 py-0.5 rounded text-blue-700 dark:text-blue-300 border border-blue-200 dark:border-blue-700 font-mono text-xs">pop(____)</span> 
                        di bawah ini agar sistem mengekstrak data pasien urutan <strong>kedua</strong>.
                    </div>
                </div>

                <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 font-mono text-sm flex flex-col">
                    <div class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700">
                        <span class="text-slate-400 text-xs">Terminal Editor Pyodide</span>
                        <button onclick="window.runAktivitas31_1()" id="btnRun31_1" class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors shadow-sm active:scale-95">
                            Cek Jawaban
                        </button>
                    </div>
                    
                    <div class="flex font-mono text-[12px] md:text-sm leading-[1.625] text-[#d4d4d4] overflow-x-auto">
                        <div class="flex flex-col text-[#858585] text-right select-none py-6 pl-4 pr-4 border-r border-[#404040] bg-[#1e1e1e] shrink-0 z-10">
                             <span>1</span><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span><span>7</span>
                        </div>
                        
                        <div class="flex flex-col whitespace-pre py-6 pl-4 pr-6 z-0">
                            <div><span class="text-[#9cdcfe]">antrean_pasien</span> = [<span class="text-[#ce9178]">"Pasien_A"</span>, <span class="text-[#ce9178]">"Pasien_B"</span>, <span class="text-[#ce9178]">"Pasien_C"</span>]</div>
                            <div>&nbsp;</div>
                            <div class="text-[#6a9955]"># Panggil pasien urutan kedua (karena pasien pertama absen)!</div>
                            
                            <div class="flex items-center h-[26px] mt-1 mb-1">
                                <span class="text-[#9cdcfe]">pasien_dipanggil</span> = <span class="text-[#9cdcfe]">antrean_pasien</span>.<span class="text-[#dcdcaa]">pop</span>(<input type="text" id="input31_1_1" class="bg-[#3c3c3c] dark:bg-slate-700 text-[#b5cea8] border border-slate-500 dark:border-slate-500 rounded px-2 py-0.5 mx-1 w-12 outline-none focus:border-blue-400 dark:focus:border-blue-500 focus:bg-[#2d2d2d] dark:focus:bg-slate-800 text-center transition-colors shadow-inner font-bold h-6" autocomplete="off" spellcheck="false">)
                            </div>

                            <div>&nbsp;</div>
                            <div class="leading-none"><span class="text-[#dcdcaa]">print</span>(<span class="text-[#ce9178]">"Pasien yang dilayani:"</span>, pasien_dipanggil)</div>
                            <div class="leading-none mt-[6.5px]"><span class="text-[#dcdcaa]">print</span>(<span class="text-[#ce9178]">"Sisa antrean:"</span>, antrean_pasien)</div>
                        </div>
                    </div>

                    <div class="px-5 pb-5 pt-0 bg-[#1e1e1e]">
                        <hr class="border-slate-700 mb-4 mt-2">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-slate-500 text-[10px] font-bold tracking-widest uppercase">OUTPUT TERMINAL</span>
                            <span id="status-terminal-31-1" class="bg-slate-800 text-slate-400 px-2 py-0.5 rounded text-[10px]">Ready</span>
                        </div>
                        <div id="console-text-31-1" class="text-[#4af626] whitespace-pre-wrap break-words leading-relaxed text-sm italic opacity-60">(Output terminal akan tampil di sini setelah dijalankan)</div>
                    </div>
                </div>

                <div id="alert-31-1" class="hidden mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border transition-all text-center"></div>

                <div id="feedback-edukatif-31-1" class="hidden mt-4 bg-green-50 dark:bg-green-950/40 border border-green-200 dark:border-green-800 p-6 rounded-xl shadow-sm transition-colors">
                    <h4 class="font-bold text-green-900 dark:text-green-400 mb-3 flex items-center gap-2 border-b border-green-200 dark:border-green-800 pb-2">
                        Pembahasan Evaluasi
                    </h4>
                    <ul class="list-disc list-outside ml-4 text-sm text-green-800 dark:text-green-200 space-y-2 text-justify">
                        <li>Luar biasa! Dalam Python, penghitungan indeks <em>List</em> selalu dimulai dari 0. Sehingga urutan pertama adalah indeks 0, dan urutan kedua adalah indeks <code class="bg-green-100 dark:bg-green-900/60 text-green-800 dark:text-green-200 px-2 py-0.5 rounded font-bold border border-green-300 dark:border-green-700 font-mono">1</code>.</li>
                        <li>Dengan menggunakan <code class="bg-green-100 dark:bg-green-900/60 text-green-800 dark:text-green-200 px-1.5 py-0.5 rounded font-bold border border-green-300 dark:border-green-700 font-mono text-xs">pop(1)</code>, Anda berhasil mengekstrak Pasien_B tanpa membuang Pasien_A dari dalam daftar antrean!</li>
                    </ul>
                </div>
            </div>

            {{-- SOAL 2: MENCEGAH INFINITE LOOP --}}
            <div id="activity-31-2-container" class="mb-10 opacity-50 pointer-events-none transition-opacity duration-500">
                <h4 class="font-bold text-slate-800 dark:text-slate-200 text-lg mb-3">2. Mencegah Infinite Loop</h4>
                <div class="bg-blue-50 dark:bg-blue-950/30 border border-blue-200 dark:border-blue-800 rounded-xl p-6 mb-6 shadow-sm transition-colors">
                    <p class="text-sm text-blue-900 dark:text-blue-200 leading-relaxed text-justify mb-3">
                        <strong>Skenario:</strong> Sebuah <em>drone</em> pengantar barang menggunakan radar BFS untuk mencari alamat. Namun, <em>drone</em> tersebut <em>error</em> dan terbang bolak-balik antara rumah A dan rumah B tanpa henti (<em>infinite loop</em>) karena lupa mencatat rumah yang sudah didatangi.
                    </p>
                    <div class="bg-white/80 dark:bg-slate-800/80 p-4 rounded border border-blue-200 dark:border-blue-700 font-medium text-blue-900 dark:text-blue-300 text-sm shadow-sm leading-relaxed transition-colors">
                        <strong>Tugas Anda:</strong> Lengkapi baris logika <code>if</code> di bawah ini menggunakan operator <code class="bg-blue-100 dark:bg-blue-900/60 px-1.5 py-0.5 rounded text-blue-700 dark:text-blue-300 border border-blue-200 dark:border-blue-700 font-mono text-xs">not in</code> agar <em>drone</em> hanya memproses rumah yang belum ada di dalam daftar <code>buku_tamu</code>.
                    </div>
                </div>

                <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 font-mono text-sm flex flex-col">
                    <div class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700">
                        <span class="text-slate-400 text-xs">Terminal Editor Pyodide</span>
                        <button onclick="window.runAktivitas31_2()" id="btnRun31_2" class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors shadow-sm active:scale-95">
                            Cek Jawaban
                        </button>
                    </div>
                    
                    <div class="flex font-mono text-[12px] md:text-sm leading-[1.625] text-[#d4d4d4] overflow-x-auto">
                        <div class="flex flex-col text-[#858585] text-right select-none py-6 pl-4 pr-4 border-r border-[#404040] bg-[#1e1e1e] shrink-0 z-10">
                             <span>1</span><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span><span>7</span><span>8</span><span>9</span>
                        </div>
                        
                        <div class="flex flex-col whitespace-pre py-6 pl-4 pr-6 z-0">
                            <div><span class="text-[#9cdcfe]">buku_tamu</span> = [<span class="text-[#ce9178]">"Rumah_A"</span>]</div>
                            <div><span class="text-[#9cdcfe]">simpul_saat_ini</span> = <span class="text-[#ce9178]">"Rumah_B"</span></div>
                            <div>&nbsp;</div>
                            <div class="text-[#6a9955]"># Cek apakah simpul_saat_ini BELUM ADA di dalam buku_tamu</div>
                            
                            <div class="flex items-center h-[26px] mt-1 mb-1">
                                <span class="text-[#c586c0]">if</span> <span class="text-[#9cdcfe]">simpul_saat_ini</span> <input type="text" id="input31_2_1" class="bg-[#3c3c3c] dark:bg-slate-700 text-[#c586c0] border border-slate-500 dark:border-slate-500 rounded px-2 py-0.5 mx-1 w-12 outline-none focus:border-blue-400 dark:focus:border-blue-500 focus:bg-[#2d2d2d] dark:focus:bg-slate-800 text-center transition-colors shadow-inner font-bold h-6" autocomplete="off" spellcheck="false"> <input type="text" id="input31_2_2" class="bg-[#3c3c3c] dark:bg-slate-700 text-[#c586c0] border border-slate-500 dark:border-slate-500 rounded px-2 py-0.5 mx-1 w-10 outline-none focus:border-blue-400 dark:focus:border-blue-500 focus:bg-[#2d2d2d] dark:focus:bg-slate-800 text-center transition-colors shadow-inner font-bold h-6" autocomplete="off" spellcheck="false"> <span class="text-[#9cdcfe]">buku_tamu</span>:
                            </div>

                            <div class="leading-none mt-[6.5px]">&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-[#9cdcfe]">buku_tamu</span>.<span class="text-[#dcdcaa]">append</span>(<span class="text-[#9cdcfe]">simpul_saat_ini</span>)</div>
                            <div class="leading-none mt-[6.5px]">&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-[#dcdcaa]">print</span>(<span class="text-[#ce9178]">"Mengeksplorasi:"</span>, <span class="text-[#9cdcfe]">simpul_saat_ini</span>)</div>
                            <div class="leading-none mt-[6.5px]"><span class="text-[#c586c0]">else</span>:</div>
                            <div class="leading-none mt-[6.5px]">&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-[#dcdcaa]">print</span>(<span class="text-[#ce9178]">"Sudah pernah dikunjungi, lewati!"</span>)</div>
                        </div>
                    </div>

                    <div class="px-5 pb-5 pt-0 bg-[#1e1e1e]">
                        <hr class="border-slate-700 mb-4 mt-2">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-slate-500 text-[10px] font-bold tracking-widest uppercase">OUTPUT TERMINAL</span>
                            <span id="status-terminal-31-2" class="bg-slate-800 text-slate-400 px-2 py-0.5 rounded text-[10px]">Ready</span>
                        </div>
                        <div id="console-text-31-2" class="text-[#4af626] whitespace-pre-wrap break-words leading-relaxed text-sm italic opacity-60">(Output terminal akan tampil di sini setelah dijalankan)</div>
                    </div>
                </div>

                <div id="alert-31-2" class="hidden mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border transition-all text-center"></div>

                <div id="feedback-edukatif-31-2" class="hidden mt-4 bg-green-50 dark:bg-green-950/40 border border-green-200 dark:border-green-800 p-6 rounded-xl shadow-sm transition-colors">
                    <h4 class="font-bold text-green-900 dark:text-green-400 mb-3 border-b border-green-200 dark:border-green-800 pb-2">
                        Pembahasan Evaluasi
                    </h4>
                    <p class="text-sm text-green-800 dark:text-green-200 leading-relaxed text-justify">
                        Tepat sekali! Operator <code>not in</code> adalah penyelamat hidup algoritma penelusuran. Tanpa variabel pencatat jejak dan pengecekan ini, program komputer akan terjebak bolak-balik di simpul yang sama hingga memori penuh atau <em>crash</em>.
                    </p>
                </div>
            </div>

            {{-- SOAL 3: MEMASUKKAN TETANGGA KE ANTREAN --}}
            <div id="activity-31-3-container" class="mb-4 opacity-50 pointer-events-none transition-opacity duration-500">
                <h4 class="font-bold text-slate-800 dark:text-slate-200 text-lg mb-3">3. Memasukkan Tetangga ke Antrean</h4>
                <div class="bg-blue-50 dark:bg-blue-950/30 border border-blue-200 dark:border-blue-800 rounded-xl p-6 mb-6 shadow-sm transition-colors">
                    <p class="text-sm text-blue-900 dark:text-blue-200 leading-relaxed text-justify mb-3">
                        <strong>Skenario:</strong> Radar BFS Anda baru saja tiba di titik "Pasar". Kini, Anda harus memasukkan semua lokasi yang terhubung dengan Pasar (yaitu "Toko", "Bank", "Parkiran") ke dalam antrean tunggu.
                    </p>
                    <div class="bg-white/80 dark:bg-slate-800/80 p-4 rounded border border-blue-200 dark:border-blue-700 font-medium text-blue-900 dark:text-blue-300 text-sm shadow-sm leading-relaxed transition-colors">
                        <strong>Tugas Anda:</strong> Gunakan fungsi <code class="bg-blue-100 dark:bg-blue-900/60 px-1.5 py-0.5 rounded text-blue-700 dark:text-blue-300 border border-blue-200 dark:border-blue-700 font-mono text-xs">.extend()</code> untuk memasukkan seluruh isi list tetangga ke bagian belakang antrean BFS.
                    </div>
                </div>

                <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 font-mono text-sm flex flex-col">
                    <div class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700">
                        <span class="text-slate-400 text-xs">Terminal Editor Pyodide</span>
                        <button onclick="window.runAktivitas31_3()" id="btnRun31_3" class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors shadow-sm active:scale-95">
                            Cek Jawaban
                        </button>
                    </div>
                    
                    <div class="flex font-mono text-[12px] md:text-sm leading-[1.625] text-[#d4d4d4] overflow-x-auto">
                        <div class="flex flex-col text-[#858585] text-right select-none py-6 pl-4 pr-4 border-r border-[#404040] bg-[#1e1e1e] shrink-0 z-10">
                             <span>1</span><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span><span>7</span>
                        </div>
                        
                        <div class="flex flex-col whitespace-pre py-6 pl-4 pr-6 z-0">
                            <div><span class="text-[#9cdcfe]">antrean</span> = [<span class="text-[#ce9178]">"Rumah"</span>]</div>
                            <div><span class="text-[#9cdcfe]">tetangga_pasar</span> = [<span class="text-[#ce9178]">"Toko"</span>, <span class="text-[#ce9178]">"Bank"</span>, <span class="text-[#ce9178]">"Parkiran"</span>]</div>
                            <div>&nbsp;</div>
                            <div class="text-[#6a9955]"># Masukkan seluruh tetangga_pasar ke dalam antrean sekaligus!</div>
                            
                            <div class="flex items-center h-[26px] mt-1 mb-1">
                                <span class="text-[#9cdcfe]">antrean</span>.<input type="text" id="input31_3_1" class="bg-[#3c3c3c] dark:bg-slate-700 text-[#dcdcaa] border border-slate-500 dark:border-slate-500 rounded px-2 py-0.5 mx-1 w-16 outline-none focus:border-blue-400 dark:focus:border-blue-500 focus:bg-[#2d2d2d] dark:focus:bg-slate-800 text-center transition-colors shadow-inner font-bold h-6" autocomplete="off" spellcheck="false">(<input type="text" id="input31_3_2" class="bg-[#3c3c3c] dark:bg-slate-700 text-[#9cdcfe] border border-slate-500 dark:border-slate-500 rounded px-2 py-0.5 mx-1 w-32 outline-none focus:border-blue-400 dark:focus:border-blue-500 focus:bg-[#2d2d2d] dark:focus:bg-slate-800 text-center transition-colors shadow-inner font-bold h-6" autocomplete="off" spellcheck="false" placeholder="variabel...">)
                            </div>

                            <div>&nbsp;</div>
                            <div class="leading-none"><span class="text-[#dcdcaa]">print</span>(<span class="text-[#ce9178]">"Isi antrean sekarang:"</span>, antrean)</div>
                        </div>
                    </div>

                    <div class="px-5 pb-5 pt-0 bg-[#1e1e1e]">
                        <hr class="border-slate-700 mb-4 mt-2">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-slate-500 text-[10px] font-bold tracking-widest uppercase">OUTPUT TERMINAL</span>
                            <span id="status-terminal-31-3" class="bg-slate-800 text-slate-400 px-2 py-0.5 rounded text-[10px]">Ready</span>
                        </div>
                        <div id="console-text-31-3" class="text-[#4af626] whitespace-pre-wrap break-words leading-relaxed text-sm italic opacity-60">(Output terminal akan tampil di sini setelah dijalankan)</div>
                    </div>
                </div>

                <div id="alert-31-3" class="hidden mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border transition-all text-center"></div>

                <div id="feedback-edukatif-31-3" class="hidden mt-4 bg-green-50 dark:bg-green-950/40 border border-green-200 dark:border-green-800 p-6 rounded-xl shadow-sm transition-colors">
                    <h4 class="font-bold text-green-900 dark:text-green-400 mb-3 border-b border-green-200 dark:border-green-800 pb-2">
                        Pembahasan Evaluasi
                    </h4>
                    <p class="text-sm text-green-800 dark:text-green-200 leading-relaxed text-justify">
                        Sintaks Anda sempurna! Fungsi <code>.extend()</code> sangat vital dalam BFS karena ia memungkinkan kita memasukkan sebuah <em>list</em> utuh ke dalam <em>list</em> lainnya secara mendatar (tidak bersarang). Semua tetangga baru kini antre di posisi belakang menunggu giliran.
                    </p>
                </div>
            </div>
        </div>

        {{-- Navigasi Bawah --}}
        <div class="flex justify-between gap-4 mt-12 pt-6 border-t border-slate-200 dark:border-slate-700">
            <button type="button" onclick="prevStep()" class="px-6 py-2.5 rounded-lg border border-slate-300 dark:border-slate-700 font-bold text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 transition shadow-sm active:scale-95">
                Kembali
            </button>
            <button type="button" id="btnNext31" onclick="nextStep()" class="px-6 py-2.5 bg-slate-900 dark:bg-slate-700 hover:bg-slate-800 dark:hover:bg-slate-600 text-white font-bold rounded-lg shadow-md transition-all active:scale-95 opacity-50 cursor-not-allowed" disabled>
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

        // FUNGSI LINE NUMBERS EDITOR SANDBOX 3.1
        window.syncLineNumbers31 = function() {
            const editor = document.getElementById('editor-sandbox-31');
            const lineNumEl = document.getElementById('line-numbers-31');
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

        window.net_isolasi_31 = null;
        window.nodes_31 = null;
        window.edges_31 = null;
        window.step_anim_31 = 0;

        document.addEventListener("DOMContentLoaded", function() {
            
            const editor31 = document.getElementById('editor-sandbox-31');
            if(editor31) {
                editor31.addEventListener('input', window.syncLineNumbers31);
            }

            window.nodes_31 = new vis.DataSet([
                { id: 'A', label: 'A\n(Start)', x: 0, y: -150, color: '#e2e8f0', font: {size: 14} },
                { id: 'B', label: 'B', x: -80, y: -60, color: '#e2e8f0' },
                { id: 'C', label: 'C', x: 80, y: -60, color: '#e2e8f0' },
                { id: 'D', label: 'D', x: -80, y: 30, color: '#e2e8f0' },
                { id: 'F', label: 'F', x: 80, y: 30, color: '#e2e8f0' },
                { id: 'E', label: 'E\n(Target)', x: -80, y: 120, color: '#e2e8f0', font: {size: 14} }
            ]);

            window.edges_31 = new vis.DataSet([
                { id: 'eAB', from: 'A', to: 'B', color: '#cbd5e1' },
                { id: 'eAC', from: 'A', to: 'C', color: '#cbd5e1' },
                { id: 'eBD', from: 'B', to: 'D', color: '#cbd5e1' },
                { id: 'eCF', from: 'C', to: 'F', color: '#cbd5e1' },
                { id: 'eDE', from: 'D', to: 'E', color: '#cbd5e1' }
            ]);

            const container = document.getElementById('bfs_isolasi_31');
            const options = {
                physics: false,
                interaction: { dragNodes: false, dragView: false, zoomView: false, hover: false, selectable: false },
                nodes: { shape: 'circle', font: { color: '#64748b', size: 16, bold: true }, borderWidth: 2, borderColor: 'white', margin: 12 },
                edges: { width: 3, arrows: 'to' }
            };

            if(container) {
                try {
                    window.net_isolasi_31 = new vis.Network(container, { nodes: window.nodes_31, edges: window.edges_31 }, options);
                    const forceCenterGraph = setInterval(() => {
                        if (container.offsetWidth > 0 && window.net_isolasi_31) {
                            window.net_isolasi_31.redraw();
                            window.net_isolasi_31.fit({ animation: false });
                        }
                    }, 200);
                    setTimeout(() => { clearInterval(forceCenterGraph); }, 3000);

                    if (window.ResizeObserver) {
                        new ResizeObserver(() => {
                            if (window.net_isolasi_31) {
                                window.net_isolasi_31.redraw();
                                window.net_isolasi_31.fit({ animation: false });
                            }
                        }).observe(container);
                    }
                } catch (error) { console.error(error); }
            }

            const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
            
            // Restore Sandbox
            const savedCode = localStorage.getItem('sandbox_3_1_code_' + userId);
            const defaultCode31 = `def jalankan_bfs(graf, titik_awal):
    dikunjungi = []
    antrean = [titik_awal]           # Menyimpan antrean simpul yang akan dicek

    while antrean:                   # Selama antrean belum kosong
        simpul_saat_ini = antrean.pop(0) # Ambil antrean paling DEPAN (Indeks 0)

        if simpul_saat_ini not in dikunjungi:
            dikunjungi.append(simpul_saat_ini) # Tandai sudah dikunjungi

            # Tambahkan semua tetangganya ke dalam antrean
            antrean.extend(graf[simpul_saat_ini])

    return dikunjungi

# Dictionary Graf
graf_kota = {
    'A': ['B', 'C'],
    'B': ['D'],
    'C': ['F'],
    'D': ['E'], 'E': [], 'F': []
}

print("Hasil Penelusuran BFS:", jalankan_bfs(graf_kota, 'A'))`;

            // BUKA GEMBOK UTAMA JIKA SANDBOX SUDAH SELESAI
            if(localStorage.getItem('sandbox_3_1_done_' + userId) === 'true') {
                document.getElementById('output-explanation-31').classList.remove('hidden');
                
                // UNLOCK MAIN WRAPPER
                document.getElementById('main-activity-wrapper-31').classList.remove('opacity-50', 'pointer-events-none');
                const lockMsg = document.getElementById('lock-message-31');
                if(lockMsg) lockMsg.style.display = 'none';

                if(savedCode && editor31) {
                    editor31.value = savedCode; 
                } else if(editor31) {
                    editor31.value = defaultCode31;
                }
                setTimeout(window.syncLineNumbers31, 100);
                
                const btnRunSandbox = document.getElementById('btnRunSandbox31');
                if (btnRunSandbox) {
                    btnRunSandbox.innerHTML = '<i class="fa-solid fa-check"></i> Program Berhasil';
                    btnRunSandbox.classList.replace('bg-blue-600', 'bg-emerald-600');
                    btnRunSandbox.classList.replace('hover:bg-blue-500', 'hover:bg-emerald-500');
                }
                
                const outText = document.getElementById('sandbox-output-text');
                if (outText) {
                    outText.innerHTML = "Hasil Penelusuran BFS: ['A', 'B', 'C', 'D', 'F', 'E']";
                    outText.classList.remove('italic', 'opacity-60');
                    document.getElementById('status-sandbox-31').innerText = "Success";
                    document.getElementById('status-sandbox-31').className = "bg-green-700 text-white px-2 py-0.5 rounded text-[10px]";
                }
            } else {
                if(editor31) editor31.value = defaultCode31;
                setTimeout(window.syncLineNumbers31, 100);
            }

            // CEK PROGRESS MASING-MASING SUB-AKTIVITAS
            const isDoneServer = {{ isset($progress['3.1']) && $progress['3.1']->score == 100 ? 'true' : 'false' }};
            const isDoneLocal1 = localStorage.getItem('act_3_1_1_done_v2_' + userId) === 'true';
            const isDoneLocal2 = localStorage.getItem('act_3_1_2_done_v2_' + userId) === 'true';
            const isDoneLocal3 = localStorage.getItem('act_3_1_3_done_v2_' + userId) === 'true';

            if(isDoneServer || isDoneLocal1) { window.kunciJawaban31_1(localStorage.getItem('act_3_1_1_ans_v2_' + userId)); }
            if(isDoneServer || isDoneLocal2) { window.kunciJawaban31_2(); }
            if(isDoneServer || isDoneLocal3) { window.kunciJawaban31_3(); }
        });

        window.nextStepBFS_31 = function() {
            if (!window.nodes_31) return;
            const infoPanel = document.getElementById('bfs-info-panel');
            const btn = document.getElementById('btnNextBFS');
            window.step_anim_31++;

            if (window.step_anim_31 === 1) {
                window.nodes_31.update({id: 'A', color: '#3b82f6', font: {color: 'white'}});
                infoPanel.innerHTML = `<strong>Langkah 1:</strong> Memulai dari <span class="text-blue-400 font-bold mx-1">Simpul A (Level 0)</span> dan masuk antrean.`;
            } 
            else if (window.step_anim_31 === 2) {
                window.nodes_31.update([{id: 'B', color: '#10b981', font: {color: 'white'}}, {id: 'C', color: '#10b981', font: {color: 'white'}}]);
                window.edges_31.update([{id: 'eAB', color: '#10b981'}, {id: 'eAC', color: '#10b981'}]);
                infoPanel.innerHTML = `<strong>Langkah 2:</strong> Menyapu melebar! <span class="text-emerald-400 font-bold mx-1">Simpul B dan C (Level 1)</span> dikunjungi secara bersamaan.`;
            }
            else if (window.step_anim_31 === 3) {
                window.nodes_31.update([{id: 'D', color: '#a855f7', font: {color: 'white'}}, {id: 'F', color: '#a855f7', font: {color: 'white'}}]); 
                window.edges_31.update([{id: 'eBD', color: '#a855f7'}, {id: 'eCF', color: '#a855f7'}]);
                infoPanel.innerHTML = `<strong>Langkah 3:</strong> Turun menyapu area di bawahnya yaitu <span class="text-purple-400 font-bold mx-1">D dan F (Level 2)</span>.`;
            }
            else if (window.step_anim_31 === 4) {
                window.nodes_31.update([{id: 'E', color: '#f59e0b', font: {color: 'white'}}]); 
                window.edges_31.update([{id: 'eDE', color: '#f59e0b'}]);
                infoPanel.innerHTML = `<strong>Langkah 4:</strong> Terakhir menemukan target <span class="text-amber-400 font-bold mx-1">E (Level 3)</span>. Penelusuran Selesai!`;
                btn.disabled = true;
                btn.innerHTML = `<i class="fa-solid fa-flag-checkered mr-1"></i> Selesai`;
                btn.className = "bg-slate-300 dark:bg-slate-700 text-slate-500 dark:text-slate-400 px-4 py-1.5 rounded text-xs font-bold cursor-not-allowed shadow-none";
            }
        }

        window.resetBFS_31 = function() {
            if (!window.nodes_31) return;
            window.step_anim_31 = 0;
            window.nodes_31.forEach(n => window.nodes_31.update({id: n.id, color: '#e2e8f0', font: {color: '#64748b'}}));
            window.edges_31.forEach(e => window.edges_31.update({id: e.id, color: '#cbd5e1'}));
            
            document.getElementById('bfs-info-panel').innerHTML = `<i class="fa-solid fa-hand-pointer text-blue-400 animate-bounce"></i> Tekan tombol <strong>Langkah Selanjutnya</strong> untuk memulai simulasi.`;
            const btn = document.getElementById('btnNextBFS');
            btn.disabled = false;
            btn.innerHTML = `Langkah Selanjutnya <i class="fa-solid fa-play ml-1"></i>`;
            btn.className = "bg-blue-600 hover:bg-blue-700 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors shadow-sm active:scale-95";
        }

        // --- VALIDASI SANDBOX 3.1 ---
        window.runSandbox31 = async function() {
            const editor = document.getElementById('editor-sandbox-31');
            const code = editor.value; 
            const outputText = document.getElementById('sandbox-output-text');
            const statusTerm = document.getElementById('status-sandbox-31');
            const explanation = document.getElementById('output-explanation-31');
            const btnRunSandbox = document.getElementById('btnRunSandbox31');

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
                const hasPopZero = cleanCode.includes("pop(0)");
                const hasWhile = cleanCode.includes("while");
                const hasAppend = cleanCode.includes("append");

                if (hasPopZero && hasWhile && hasAppend && stdout.includes("['A', 'B', 'C', 'D', 'F', 'E']")) {
                    outputText.className = "text-[#4af626]";
                    outputText.innerHTML = stdout.replace(/\n/g, '<br>');
                    
                    statusTerm.innerText = "Success";
                    statusTerm.className = "bg-green-700 text-white px-2 py-0.5 rounded text-[10px]";

                    btnRunSandbox.innerHTML = '<i class="fa-solid fa-check"></i> Program Berhasil';
                    btnRunSandbox.classList.replace('bg-blue-600', 'bg-emerald-600');
                    btnRunSandbox.classList.replace('hover:bg-blue-500', 'hover:bg-emerald-500');
                    
                    const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                    localStorage.setItem('sandbox_3_1_done_' + userId, 'true');
                    localStorage.setItem('sandbox_3_1_code_' + userId, code);

                    explanation.classList.remove('hidden');
                    
                    // UNLOCK MAIN WRAPPER SETELAH SANDBOX BENAR
                    document.getElementById('main-activity-wrapper-31').classList.remove('opacity-50', 'pointer-events-none');
                    const lockMsg = document.getElementById('lock-message-31');
                    if(lockMsg) lockMsg.style.display = 'none';
                    
                    setTimeout(() => { explanation.scrollIntoView({ behavior: 'smooth', block: 'center' }); }, 300);

                } else {
                    outputText.className = "text-[#ffbd2e]";
                    outputText.innerHTML = stdout.replace(/\n/g, '<br>') + `<br>> Validasi Gagal: Pastikan Anda mengetik fungsi BFS lengkap (terdapat while, pop(0), dan append) persis seperti contoh.`;
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
                    btnRunSandbox.innerHTML = '<i class="fa-solid fa-rotate-right"></i> Coba Lagi';
                    btnRunSandbox.disabled = false;
                }
            }
        }

        // --- VALIDASI AKTIVITAS 1 ---
        window.runAktivitas31_1 = async function() {
            const inputVal = document.getElementById('input31_1_1').value.trim();
            const alertBox = document.getElementById('alert-31-1');
            const consoleText = document.getElementById('console-text-31-1');
            const statusTerm = document.getElementById('status-terminal-31-1');
            const btnRun = document.getElementById('btnRun31_1');

            consoleText.classList.remove('italic', 'opacity-60');

            if(inputVal === "") {
                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-yellow-50 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-400 border-yellow-200 dark:border-yellow-800 text-center transition-colors";
                alertBox.innerHTML = "<i class='fa-solid fa-triangle-exclamation mr-1'></i> Error: Syntax Tidak Lengkap. Masih ada bagian kode yang kosong.";
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

                if(inputVal === "1" && stdout.includes("Pasien_B")) {
                    const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                    localStorage.setItem('act_3_1_1_done_v2_' + userId, 'true'); 
                    localStorage.setItem('act_3_1_1_ans_v2_' + userId, inputVal); 

                    alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-green-50 dark:bg-green-900/30 text-green-800 dark:text-green-400 border-green-400 dark:border-green-800 text-center transition-colors";
                    alertBox.innerHTML = "<i class='fa-solid fa-check-circle mr-1'></i> Kompilasi Berhasil! Anda telah melompati antrean dan memanggil pasien urutan kedua.";
                    alertBox.classList.remove('hidden');

                    statusTerm.innerText = "Success";
                    statusTerm.className = "bg-green-700 text-white px-2 py-0.5 rounded text-[10px]";

                    consoleText.className = "text-[#4af626] whitespace-pre-wrap break-words leading-relaxed text-sm";
                    consoleText.innerHTML = stdout.replace(/\n/g, '<br>');

                    window.kunciJawaban31_1(inputVal);

                } else {
                    statusTerm.innerText = "Logic Error";
                    statusTerm.className = "bg-amber-600 text-white px-2 py-0.5 rounded text-[10px]";
                    
                    consoleText.className = "text-[#ff5f56] whitespace-pre-wrap break-words leading-relaxed text-sm";
                    consoleText.innerHTML = stdout.replace(/\n/g, '<br>') + `<br><span class="text-[#ffbd2e]">> Validasi Gagal: Anda tidak memanggil Pasien_B.</span>`;

                    alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-amber-50 dark:bg-amber-900/30 text-amber-800 dark:text-amber-400 border-amber-300 dark:border-amber-800 text-center transition-colors";
                    alertBox.innerHTML = "<i class='fa-solid fa-circle-xmark mr-1'></i> Logika Kurang Tepat: Ingat, indeks pada List Python selalu dimulai dari angka 0. Jika Anda ingin mengambil urutan KEDUA, indeks ke berapakah yang harus dipanggil?";
                    alertBox.classList.remove('hidden');
                }

            } catch (err) {
                consoleText.className = "text-[#ff5f56] whitespace-pre-wrap break-words leading-relaxed text-sm";
                consoleText.innerHTML = "Traceback (most recent call last):<br>" + err.message;
                statusTerm.innerText = "Error";
                statusTerm.className = "bg-red-800 text-red-200 px-2 py-0.5 rounded text-[10px]";

                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-red-50 dark:bg-red-900/30 text-red-800 dark:text-red-400 border-red-300 dark:border-red-800 text-center transition-colors";
                alertBox.innerHTML = "<i class='fa-solid fa-circle-xmark mr-1'></i> Syntax Error: Pastikan Anda hanya mengisi bagian dalam kurung dengan angka (Integer) saja.";
                alertBox.classList.remove('hidden');
            } finally {
                btnRun.innerHTML = 'Cek Jawaban';
                btnRun.disabled = false;
            }
        }

        // --- VALIDASI AKTIVITAS 2 ---
        window.runAktivitas31_2 = async function() {
            const inputVal1 = document.getElementById('input31_2_1').value.trim().toLowerCase();
            const inputVal2 = document.getElementById('input31_2_2').value.trim().toLowerCase();
            
            const alertBox = document.getElementById('alert-31-2');
            const consoleText = document.getElementById('console-text-31-2');
            const statusTerm = document.getElementById('status-terminal-31-2');
            const btnRun = document.getElementById('btnRun31_2');

            consoleText.classList.remove('italic', 'opacity-60');

            if(inputVal1 === "" || inputVal2 === "") {
                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-yellow-50 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-400 border-yellow-200 dark:border-yellow-800 text-center transition-colors";
                alertBox.innerHTML = "<i class='fa-solid fa-triangle-exclamation mr-1'></i> Error: Syntax Tidak Lengkap. Masih ada bagian kode yang kosong.";
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
buku_tamu = ["Rumah_A"]
simpul_saat_ini = "Rumah_B"

if simpul_saat_ini ${inputVal1} ${inputVal2} buku_tamu:
    buku_tamu.append(simpul_saat_ini)
    print("Mengeksplorasi:", simpul_saat_ini)
else:
    print("Sudah pernah dikunjungi, lewati!")
                `;
                
                py.runPython(pythonCode);
                const stdout = py.runPython('sys.stdout.getvalue()');

                if(inputVal1 === "not" && inputVal2 === "in" && stdout.includes("Mengeksplorasi: Rumah_B")) {
                    const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                    localStorage.setItem('act_3_1_2_done_v2_' + userId, 'true'); 

                    alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-green-50 dark:bg-green-900/30 text-green-800 dark:text-green-400 border-green-400 dark:border-green-800 text-center transition-colors";
                    alertBox.innerHTML = "<i class='fa-solid fa-check-circle mr-1'></i> Kompilasi Berhasil! Operator 'not in' berhasil mencegah infinite loop.";
                    alertBox.classList.remove('hidden');

                    statusTerm.innerText = "Success";
                    statusTerm.className = "bg-green-700 text-white px-2 py-0.5 rounded text-[10px]";

                    consoleText.className = "text-[#4af626] whitespace-pre-wrap break-words leading-relaxed text-sm";
                    consoleText.innerHTML = stdout.replace(/\n/g, '<br>');

                    window.kunciJawaban31_2();

                } else {
                    statusTerm.innerText = "Logic Error";
                    statusTerm.className = "bg-amber-600 text-white px-2 py-0.5 rounded text-[10px]";
                    
                    consoleText.className = "text-[#ff5f56] whitespace-pre-wrap break-words leading-relaxed text-sm";
                    consoleText.innerHTML = stdout.replace(/\n/g, '<br>') + `<br><span class="text-[#ffbd2e]">> Validasi Gagal: Kata kunci operator Python yang Anda masukkan kurang tepat.</span>`;

                    alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-amber-50 dark:bg-amber-900/30 text-amber-800 dark:text-amber-400 border-amber-300 dark:border-amber-800 text-center transition-colors";
                    alertBox.innerHTML = "<i class='fa-solid fa-circle-xmark mr-1'></i> Logika Kurang Tepat: Gunakan dua kata kunci bawaan Python untuk mengecek apakah sebuah data 'TIDAK ADA DI DALAM' sebuah list.";
                    alertBox.classList.remove('hidden');
                }

            } catch (err) {
                consoleText.className = "text-[#ff5f56] whitespace-pre-wrap break-words leading-relaxed text-sm";
                consoleText.innerHTML = "Traceback (most recent call last):<br>" + err.message;
                statusTerm.innerText = "Error";
                statusTerm.className = "bg-red-800 text-red-200 px-2 py-0.5 rounded text-[10px]";

                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-red-50 dark:bg-red-900/30 text-red-800 dark:text-red-400 border-red-300 dark:border-red-800 text-center transition-colors";
                alertBox.innerHTML = "<i class='fa-solid fa-circle-xmark mr-1'></i> Syntax Error: Pastikan ejaan operator Anda benar dalam bahasa Inggris.";
                alertBox.classList.remove('hidden');
            } finally {
                btnRun.innerHTML = 'Cek Jawaban';
                btnRun.disabled = false;
            }
        }

        // --- VALIDASI AKTIVITAS 3 ---
        window.runAktivitas31_3 = async function() {
            const inputVal1 = document.getElementById('input31_3_1').value.trim().toLowerCase();
            const inputVal2 = document.getElementById('input31_3_2').value.trim();
            
            const alertBox = document.getElementById('alert-31-3');
            const consoleText = document.getElementById('console-text-31-3');
            const statusTerm = document.getElementById('status-terminal-31-3');
            const btnRun = document.getElementById('btnRun31_3');

            consoleText.classList.remove('italic', 'opacity-60');

            if(inputVal1 === "" || inputVal2 === "") {
                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-yellow-50 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-400 border-yellow-200 dark:border-yellow-800 text-center transition-colors";
                alertBox.innerHTML = "<i class='fa-solid fa-triangle-exclamation mr-1'></i> Error: Syntax Tidak Lengkap. Masih ada bagian kode yang kosong.";
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
antrean = ["Rumah"]
tetangga_pasar = ["Toko", "Bank", "Parkiran"]

antrean.${inputVal1}(${inputVal2})

print("Isi antrean sekarang:", antrean)
                `;
                
                py.runPython(pythonCode);
                const stdout = py.runPython('sys.stdout.getvalue()');

                if(inputVal1 === "extend" && inputVal2 === "tetangga_pasar" && stdout.includes("'Toko', 'Bank', 'Parkiran'")) {
                    const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                    localStorage.setItem('act_3_1_3_done_v2_' + userId, 'true'); 

                    alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-green-50 dark:bg-green-900/30 text-green-800 dark:text-green-400 border-green-400 dark:border-green-800 text-center transition-colors";
                    alertBox.innerHTML = "<i class='fa-solid fa-check-circle mr-1'></i> Kompilasi Berhasil! Anda sukses menggabungkan dua buah antrean tanpa membuatnya bersarang (nested).";
                    alertBox.classList.remove('hidden');

                    statusTerm.innerText = "Success";
                    statusTerm.className = "bg-green-700 text-white px-2 py-0.5 rounded text-[10px]";

                    consoleText.className = "text-[#4af626] whitespace-pre-wrap break-words leading-relaxed text-sm";
                    consoleText.innerHTML = stdout.replace(/\n/g, '<br>');

                    window.kunciJawaban31_3();

                    // DIRECT FETCH: TEMBAK LANGSUNG KE CONTROLLER (ANTI GAGAL) SETELAH FULL 3 SOAL SELESAI
                    fetch("{{ route('submit.score') }}", { 
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            chapter: "bab3",
                            section: "3.1",
                            score: 100,
                            answer: "Berhasil Live Coding 3.1"
                        })
                    })
                    .then(async response => {
                        const data = await response.json();
                        if (!response.ok) throw new Error(data.message || 'Server menolak data');
                    })
                    .catch(error => {
                        console.error("❌ GAGAL SIMPAN KE DB:", error);
                    });

                } else {
                    statusTerm.innerText = "Logic Error";
                    statusTerm.className = "bg-amber-600 text-white px-2 py-0.5 rounded text-[10px]";
                    
                    consoleText.className = "text-[#ff5f56] whitespace-pre-wrap break-words leading-relaxed text-sm";
                    consoleText.innerHTML = stdout.replace(/\n/g, '<br>') + `<br><span class="text-[#ffbd2e]">> Validasi Gagal: Pastikan nama fungsi dan variabel yang Anda panggil sudah tepat.</span>`;

                    alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-amber-50 dark:bg-amber-900/30 text-amber-800 dark:text-amber-400 border-amber-300 dark:border-amber-800 text-center transition-colors";
                    alertBox.innerHTML = "<i class='fa-solid fa-circle-xmark mr-1'></i> Logika Kurang Tepat: Untuk menggabungkan dua List secara mendatar, gunakan fungsi 'extend'. Pastikan juga variabel yang dipanggil adalah 'tetangga_pasar'.";
                    alertBox.classList.remove('hidden');
                }

            } catch (err) {
                consoleText.className = "text-[#ff5f56] whitespace-pre-wrap break-words leading-relaxed text-sm";
                consoleText.innerHTML = "Traceback (most recent call last):<br>" + err.message;
                statusTerm.innerText = "Error";
                statusTerm.className = "bg-red-800 text-red-200 px-2 py-0.5 rounded text-[10px]";

                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-red-50 dark:bg-red-900/30 text-red-800 dark:text-red-400 border-red-300 dark:border-red-800 text-center transition-colors";
                alertBox.innerHTML = "<i class='fa-solid fa-circle-xmark mr-1'></i> Syntax Error: Nama variabel atau sintaks yang Anda ketikkan salah/tidak terdefinisi.";
                alertBox.classList.remove('hidden');
            } finally {
                btnRun.innerHTML = 'Cek Jawaban';
                btnRun.disabled = false;
            }
        }


        // ==========================================
        // KUNCI JAWABAN & UNLOCK BERUNTUN
        // ==========================================
        window.kunciJawaban31_1 = function(answeredValue) {
            const el = document.getElementById('input31_1_1');
            if(el) {
                el.value = answeredValue || "1"; 
                el.disabled = true;
                el.classList.remove('bg-[#3c3c3c]', 'dark:bg-slate-700', 'text-[#b5cea8]', 'border-slate-500', 'dark:border-slate-500');
                el.classList.add('bg-emerald-600', 'text-white', 'border-emerald-500', 'cursor-not-allowed', 'shadow-inner');
            }

            const btnRun = document.getElementById('btnRun31_1');
            if(btnRun) {
                btnRun.innerHTML = '<i class="fa-solid fa-check"></i> Diselesaikan';
                btnRun.classList.replace('bg-blue-600', 'bg-slate-600');
                btnRun.classList.replace('hover:bg-blue-500', 'cursor-not-allowed');
                btnRun.disabled = true;
            }

            document.getElementById('feedback-edukatif-31-1').classList.remove('hidden');

            // UNLOCK ACTIVITY 2
            document.getElementById('activity-31-2-container').classList.remove('opacity-50', 'pointer-events-none');
        }

        window.kunciJawaban31_2 = function() {
            const el1 = document.getElementById('input31_2_1');
            const el2 = document.getElementById('input31_2_2');
            
            if(el1) {
                el1.value = "not"; 
                el1.disabled = true;
                el1.classList.remove('bg-[#3c3c3c]', 'dark:bg-slate-700', 'text-[#c586c0]', 'border-slate-500', 'dark:border-slate-500');
                el1.classList.add('bg-emerald-600', 'text-white', 'border-emerald-500', 'cursor-not-allowed', 'shadow-inner');
            }
            if(el2) {
                el2.value = "in"; 
                el2.disabled = true;
                el2.classList.remove('bg-[#3c3c3c]', 'dark:bg-slate-700', 'text-[#c586c0]', 'border-slate-500', 'dark:border-slate-500');
                el2.classList.add('bg-emerald-600', 'text-white', 'border-emerald-500', 'cursor-not-allowed', 'shadow-inner');
            }

            const btnRun = document.getElementById('btnRun31_2');
            if(btnRun) {
                btnRun.innerHTML = '<i class="fa-solid fa-check"></i> Diselesaikan';
                btnRun.classList.replace('bg-blue-600', 'bg-slate-600');
                btnRun.classList.replace('hover:bg-blue-500', 'cursor-not-allowed');
                btnRun.disabled = true;
            }

            document.getElementById('feedback-edukatif-31-2').classList.remove('hidden');

            // UNLOCK ACTIVITY 3
            document.getElementById('activity-31-3-container').classList.remove('opacity-50', 'pointer-events-none');
        }

        window.kunciJawaban31_3 = function() {
            const el1 = document.getElementById('input31_3_1');
            const el2 = document.getElementById('input31_3_2');
            
            if(el1) {
                el1.value = "extend"; 
                el1.disabled = true;
                el1.classList.remove('bg-[#3c3c3c]', 'dark:bg-slate-700', 'text-[#dcdcaa]', 'border-slate-500', 'dark:border-slate-500');
                el1.classList.add('bg-emerald-600', 'text-white', 'border-emerald-500', 'cursor-not-allowed', 'shadow-inner');
            }
            if(el2) {
                el2.value = "tetangga_pasar"; 
                el2.disabled = true;
                el2.classList.remove('bg-[#3c3c3c]', 'dark:bg-slate-700', 'text-[#9cdcfe]', 'border-slate-500', 'dark:border-slate-500');
                el2.classList.add('bg-emerald-600', 'text-white', 'border-emerald-500', 'cursor-not-allowed', 'shadow-inner');
            }

            const btnRun = document.getElementById('btnRun31_3');
            if(btnRun) {
                btnRun.innerHTML = '<i class="fa-solid fa-check"></i> Diselesaikan';
                btnRun.classList.replace('bg-blue-600', 'bg-slate-600');
                btnRun.classList.replace('hover:bg-blue-500', 'cursor-not-allowed');
                btnRun.disabled = true;
            }

            document.getElementById('feedback-edukatif-31-3').classList.remove('hidden');

            // UNLOCK NEXT BUTTON
            const btnNext = document.getElementById('btnNext31');
            if(btnNext) {
                btnNext.disabled = false;
                btnNext.classList.remove('opacity-50', 'cursor-not-allowed');
                btnNext.classList.replace('bg-slate-900', 'bg-blue-600');
                btnNext.classList.replace('dark:bg-slate-700', 'dark:bg-blue-600');
                btnNext.classList.replace('hover:bg-slate-800', 'hover:bg-blue-700');
            }
        }
    </script>
</section>