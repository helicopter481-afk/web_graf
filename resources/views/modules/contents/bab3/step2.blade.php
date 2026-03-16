<section id="step-2" class="step-slide">
    {{-- IMPORT VIS JS --}}
    <script type="text/javascript" src="https://unpkg.com/vis-network/standalone/umd/vis-network.min.js"></script>

    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-8 md:p-10 max-w-6xl mx-auto -mt-8">

        {{-- JUDUL MATERI --}}
        <div class="border-b border-slate-200 pb-6 mb-8 flex justify-between items-center">
            <div>
                <h2 class="text-2xl md:text-3xl font-bold text-slate-900 mb-2">3.2 Depth-First Search (DFS)</h2>
                <p class="text-slate-500 font-medium">Menelusuri graf secara mendalam (Menembus Jalan Buntu) menggunakan Stack.</p>
            </div>
        </div>

        {{-- KONTEN TEORI --}}
        <div class="prose prose-slate text-slate-700 leading-relaxed text-justify mb-6 max-w-none">
            <p>
                Berbeda dengan BFS, algoritma DFS menjelajahi graf secara <strong>mendalam</strong>. Bayangkan Anda masuk ke dalam labirin: Anda akan terus berjalan menelusuri satu lorong sampai menemukan jalan buntu (<em>dead end</em>). Jika buntu, Anda akan mundur selangkah (<em>backtrack</em>) dan mencoba lorong lain.
            </p><br>
            <p>
                DFS menggunakan struktur data <strong>Stack (Tumpukan)</strong>. Prinsipnya seperti tumpukan piring: <strong>Piring yang ditaruh terakhir akan diambil paling pertama (<em>Last-In First-Out / LIFO</em>)</strong>. Di Python, kita mengambil elemen paling terakhir dengan fungsi <strong>pop()</strong> (tanpa angka di dalam kurung).
            </p>
        </div>

        {{-- INFO SKENARIO BIASA DENGAN TITIK AWAL & TARGET --}}
        <p class="text-sm text-slate-700 mb-4 bg-slate-50 p-3 rounded border border-slate-200">
            <strong>Skenario Simulasi:</strong> Komputer memetakan area graf di bawah ini dimulai dari <strong>Simpul A (Titik Awal)</strong>, dengan target mencari keberadaan <strong>Simpul D (Titik Target)</strong>.
        </p>

        {{-- VISUALISASI INTERAKTIF DFS (ANTI KEPOTONG) --}}
        <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 shadow-inner w-full flex flex-col items-center mb-10 group relative">
            <div class="w-full flex justify-between items-center mb-3">
                <span class="font-bold text-slate-700 text-sm">Simulasi DFS</span>
                <div class="flex gap-2">
                    <button onclick="window.resetDFS_32()" class="bg-white border border-slate-300 hover:bg-slate-100 text-slate-700 px-3 py-1 rounded text-xs font-bold transition-colors shadow-sm">
                        Ulangi
                    </button>
                    <button id="btnNextDFS" onclick="window.nextStepDFS_32()" class="bg-orange-600 hover:bg-orange-500 text-white px-3 py-1 rounded text-xs font-bold transition-colors shadow-sm">
                        Langkah Selanjutnya
                    </button>
                </div>
            </div>
            
            {{-- Ditinggikan menjadi 400px agar terhindar dari panel bawah yang menutupi node D/E/F --}}
            <div id="dfs_isolasi_32" class="w-full h-[400px] bg-white rounded-lg border border-slate-200 shadow-sm relative overflow-hidden cursor-crosshair"></div>
            
            {{-- Panel Info Interaktif --}}
            <div class="absolute bottom-6 left-0 right-0 px-4 flex justify-center pointer-events-none">
                <div id="dfs-info-panel" class="bg-slate-900 text-white text-sm px-1 py-0 rounded-full shadow-lg text-center transition-all duration-300 w-auto max-w-2xl">
                    Tekan tombol <strong class="text-orange-400 mx-1">Langkah Selanjutnya</strong> untuk melihat cara DFS menembus kedalaman.
                </div>
            </div>
        </div>
        {{-- PENJELASAN LANGKAH SIMULASI DFS --}}
        <div class="mb-10 p-6 bg-white border border-slate-200 rounded-xl shadow-sm">
            <h4 class="font-bold text-slate-800 text-sm mb-4 flex items-center gap-2">
                <i class="fa-solid fa-shoe-prints text-orange-500"></i> Rincian Alur Penelusuran DFS:
            </h4>
            <ul class="list-disc list-outside ml-5 text-sm text-slate-700 space-y-3 leading-relaxed text-justify">
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

        {{-- CONTOH KODE PROGRAM (ANTI-COPY) --}}
        <div>
            <h3 class="text-lg font-bold text-slate-800 mb-3">Contoh Kode Program DFS:</h3>
            
            {{-- IDE Block (View Only) --}}
            <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 select-none pointer-events-none mb-4">
                <div class="bg-[#2d2d2d] px-4 py-2.5 flex items-center gap-2 border-b border-slate-700">
                    <div class="w-3 h-3 rounded-full bg-[#ff5f56]"></div>
                    <div class="w-3 h-3 rounded-full bg-[#ffbd2e]"></div>
                    <div class="w-3 h-3 rounded-full bg-[#27c93f]"></div>
                    <span class="text-slate-400 text-xs ml-2 font-mono">dfs_traversal.py (Hanya Baca)</span>
                </div>
                <div class="p-6 overflow-x-auto text-sm font-mono text-[#d4d4d4] leading-relaxed">
                    <div><span class="text-[#569cd6]">def</span> <span class="text-[#dcdcaa]">jalankan_dfs</span>(graf, titik_awal):</div>
                    <div class="ml-4">dikunjungi <span class="text-[#d4d4d4]">=</span> []</div>
                    <div class="ml-4 mb-3">stack <span class="text-[#d4d4d4]">=</span> [titik_awal] <span class="text-[#6a9955]"># Menyimpan tumpukan simpul yang akan dicek</span></div>

                    <div class="ml-4"><span class="text-[#c586c0]">while</span> stack: <span class="text-[#6a9955]"># Selama tumpukan belum kosong</span></div>
                    <div class="ml-8">simpul_saat_ini <span class="text-[#d4d4d4]">=</span> stack.<span class="text-[#dcdcaa]">pop</span>() <span class="text-[#6a9955]"># Ambil data paling BELAKANG/ATAS (LIFO)</span></div>

                    <div class="ml-8 mt-3"><span class="text-[#c586c0]">if</span> simpul_saat_ini <span class="text-[#c586c0]">not in</span> dikunjungi:</div>
                    <div class="ml-12">dikunjungi.<span class="text-[#dcdcaa]">append</span>(simpul_saat_ini) <span class="text-[#6a9955]"># Tandai sudah dikunjungi</span></div>

                    <div class="ml-12 mt-3"><span class="text-[#6a9955]"># Tambahkan semua tetangganya ke dalam tumpukan</span></div>
                    <div class="ml-12 mb-3">stack.<span class="text-[#dcdcaa]">extend</span>(graf[simpul_saat_ini])</div>

                    <div class="ml-4"><span class="text-[#c586c0]">return</span> dikunjungi</div>

                    <div class="mt-4"><span class="text-[#6a9955]"># Dictionary Graf (Format sedikit berbeda dari BFS)</span></div>
                    <div>graf_kota <span class="text-[#d4d4d4]">=</span> {</div>
                    <div class="ml-4"><span class="text-[#ce9178]">'A'</span>: [<span class="text-[#ce9178]">'B'</span>, <span class="text-[#ce9178]">'C'</span>],</div>
                    <div class="ml-4"><span class="text-[#ce9178]">'B'</span>: [<span class="text-[#ce9178]">'D'</span>, <span class="text-[#ce9178]">'E'</span>],</div>
                    <div class="ml-4"><span class="text-[#ce9178]">'C'</span>: [<span class="text-[#ce9178]">'F'</span>],</div>
                    <div class="ml-4"><span class="text-[#ce9178]">'D'</span>: [], <span class="text-[#ce9178]">'E'</span>: [], <span class="text-[#ce9178]">'F'</span>: []</div>
                    <div>}</div>

                    <div class="mt-4"><span class="text-[#dcdcaa]">print</span>(<span class="text-[#ce9178]">"Hasil Penelusuran DFS:"</span>, jalankan_dfs(graf_kota, <span class="text-[#ce9178]">'A'</span>))</div>
                </div>
            </div>

            {{-- PENJELASAN KODE PROGRAM --}}
            <div class="mb-10 p-4 border border-slate-200 rounded-xl bg-slate-50">
                <h4 class="font-bold text-slate-800 text-base mb-3">Penjelasan Kode:</h4>
                <ul class="list-disc list-outside ml-5 text-sm text-slate-700 space-y-2 leading-relaxed text-justify">
                    <li>Komentar pada kode (tanda <code>#</code>) tidak dijalankan oleh Python, hanya sebagai panduan membaca.</li>
                    <li>Pada variabel <code>stack = [titik_awal]</code>, kita menggunakan tipe data <em>List</em> sebagai representasi dari <em>Stack</em> (Tumpukan).</li>
                    <li>Perintah <code>stack.pop()</code> tanpa angka indeks di dalamnya adalah penggerak utama DFS. Ini memerintahkan Python untuk selalu mengambil data <strong>paling terakhir/atas</strong> sesuai prinsip LIFO.</li>
                    <li>Perintah <code>stack.extend()</code> digunakan untuk menumpuk (memasukkan) cabang-cabang jalan baru yang ditemukan di atas tumpukan yang lama.</li>
                </ul>
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- INTERACTIVE SANDBOX: KETIK ULANG KODE --}}
        {{-- ========================================== --}}
        <div class="mb-10 bg-orange-50/30 border-2 border-orange-200 p-6 rounded-xl shadow-sm">
            <h3 class="text-lg font-bold text-slate-800 mb-2">Coba Sendiri!</h3>
            <p class="text-sm text-slate-600 mb-4">
                Ketik ulang keseluruhan kode pada contoh di atas ke dalam editor di bawah ini (tidak perlu mengetik komentarnya). Perhatikan perubahan dari <code>pop(0)</code> menjadi <code>pop()</code>.
            </p>

            <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 font-mono text-sm relative flex flex-col">
                <div class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700 shrink-0">
                    <span class="text-slate-400 text-xs">Terminal Editor Pyodide</span>
                    <button onclick="window.runSandbox32()" id="btnRunSandbox32" class="bg-green-600 hover:bg-green-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors flex items-center gap-2 shadow-sm">
                        Jalankan Program
                    </button>
                </div>
                
                <textarea id="editor-sandbox-32" class="w-full min-h-[160px] bg-[#1e1e1e] text-[#d4d4d4] px-5 pt-5 pb-2 font-mono text-sm outline-none resize-none leading-relaxed overflow-hidden" spellcheck="false" placeholder="# Ketik kode Python di sini..." oninput="window.autoResizeEditor32(this)"></textarea>

                {{-- WADAH OUTPUT --}}
                <div class="px-5 pb-5 pt-2 bg-[#1e1e1e]">
                    <hr class="border-slate-700 mb-4">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-slate-500 text-[10px] font-bold tracking-widest uppercase">OUTPUT TERMINAL</span>
                        <span id="status-sandbox-32" class="bg-slate-800 text-slate-400 px-2 py-0.5 rounded text-[10px]">Ready</span>
                    </div>
                    <div id="sandbox-output-text-32" class="text-[#4af626] whitespace-pre-wrap break-words min-h-[20px] italic opacity-60">(Output akan tampil di sini setelah dijalankan)</div>
                </div>
            </div>
        </div>

        {{-- OUTPUT EXPLANATION (MUNCUL SETELAH SANDBOX BERHASIL) --}}
        <div id="output-explanation-32" class="mb-12 hidden transition-all duration-700">
            <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm">
                <h4 class="font-bold text-slate-800 text-sm mb-3">Output Program:</h4>
                <div class="bg-black text-[#4af626] font-mono text-sm p-4 rounded-md shadow-inner mb-6">
                    Hasil Penelusuran DFS: ['A', 'C', 'F', 'B', 'E', 'D']
                </div>
                
                <h4 class="font-bold text-slate-800 text-sm mb-3">Analisis Output:</h4>
                <ul class="list-disc list-outside ml-4 text-sm text-slate-700 space-y-2 text-justify">
                    <li>Lihat perbedaannya! DFS tidak membaca simpul 'B' dan 'C' secara berurutan seperti pada BFS.</li>
                    <li>Karena kita menggunakan perintah <code>pop()</code>, DFS menembus lurus ke kedalaman graf: dari 'A' langsung menuju 'C', lalu 'F' (sampai mentok buntu).</li>
                    <li>Setelah itu, barulah sistem kembali (<em>backtrack</em>) untuk memproses cabang lainnya ('B', 'E', 'D').</li>
                </ul>
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- AKTIVITAS 3.2: FILL IN THE BLANKS (TERKUNCI) --}}
        {{-- ========================================== --}}
        <div id="activity-32-container" class="mt-12 pt-8 border-t-[3px] border-dashed border-slate-200 opacity-50 pointer-events-none transition-opacity duration-500">
            
            <div class="flex items-center gap-3 mb-6">
                <span class="bg-yellow-500 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider shadow-sm">💡 Aktivitas 3.2</span>
                <h3 class="font-bold text-slate-900 text-xl">Live Coding: Variasi Python <em>List</em></h3>
            </div>

            <div class="bg-orange-50 border border-orange-200 rounded-xl p-6 mb-6 shadow-sm">
                <p class="text-sm text-orange-900 leading-relaxed text-justify mb-3">
                    <strong>Skenario:</strong> Dalam pemrograman Python, seringkali kita tidak hanya mengambil data antrean terdepan, namun kita juga perlu mengambil data dari urutan <strong>paling terakhir</strong> (misalnya untuk logika <em>Stack / LIFO</em> yang dipelajari di DFS).
                </p>
                <div class="bg-white/80 p-4 rounded border border-orange-200 font-medium text-orange-900 text-sm shadow-sm leading-relaxed flex flex-wrap items-center gap-2">
                    <strong>Tugas Anda:</strong> Lengkapi bagian 
                    <span class="bg-orange-100 px-1.5 py-0.5 rounded text-orange-700 font-mono text-xs">pop(____)</span> 
                    di bawah ini agar memanggil data Pasien_C (urutan <strong>paling terakhir</strong>).
                </div>
            </div>

            <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 font-mono text-sm flex flex-col">
                <div class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700 shrink-0">
                    <span class="text-slate-400 text-xs">Terminal Editor Pyodide</span>
                    <button onclick="window.runAktivitas32()" id="btnRun32" class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors flex items-center gap-2 shadow-sm">
                        Jalankan & Periksa
                    </button>
                </div>
                
                <div class="p-6 leading-relaxed text-[#d4d4d4] overflow-x-auto whitespace-nowrap">
                    <div><span class="text-[#9cdcfe]">antrean_pasien</span> = [<span class="text-[#ce9178]">"Pasien_A"</span>, <span class="text-[#ce9178]">"Pasien_B"</span>, <span class="text-[#ce9178]">"Pasien_C"</span>]</div>
                    <br>
                    <div class="text-[#6a9955]"># Panggil pasien yang terakhir kali datang!</div>
                    
                    <div class="flex items-center mt-1">
                        <span class="text-[#9cdcfe]">pasien_dipanggil</span> = <span class="text-[#9cdcfe]">antrean_pasien</span>.<span class="text-[#dcdcaa]">pop</span>(<input type="text" id="input32_1" class="bg-[#3c3c3c] text-[#b5cea8] border border-slate-500 rounded px-2 py-0.5 mx-1 w-16 outline-none focus:border-blue-400 focus:bg-[#2d2d2d] text-center transition-colors shadow-inner" autocomplete="off" spellcheck="false">)
                    </div>

                    <br>
                    <div><span class="text-[#dcdcaa]">print</span>(<span class="text-[#ce9178]">"Pasien yang dilayani:"</span>, pasien_dipanggil)</div>
                    <div><span class="text-[#dcdcaa]">print</span>(<span class="text-[#ce9178]">"Sisa antrean:"</span>, antrean_pasien)</div>
                    
                    <div class="mt-6 pt-4 border-t border-slate-700">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-slate-500 text-[10px] font-bold tracking-widest uppercase">OUTPUT TERMINAL</span>
                            <span id="status-terminal-32" class="bg-slate-800 text-slate-400 px-2 py-0.5 rounded text-[10px]">Ready</span>
                        </div>
                        <div id="console-text-32" class="text-[#4af626] whitespace-pre-wrap break-words leading-relaxed text-sm italic opacity-60">(Output terminal akan tampil di sini setelah dijalankan)</div>
                    </div>
                </div>
            </div>

            <div id="alert-32" class="hidden mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border transition-all"></div>

            <div id="feedback-edukatif-32" class="hidden mt-4 bg-[#f0fdf4] border border-[#bbf7d0] p-6 rounded-xl shadow-sm">
                <h4 class="font-bold text-[#166534] mb-3 flex items-center gap-2">Penjelasan Sintaks</h4>
                <p class="text-sm text-[#166534] leading-relaxed text-justify mb-3">
                    Luar biasa! Anda telah memanggil elemen ketiga yang berada di indeks ke- <code class="bg-[#dcfce7] px-2 py-0.5 rounded font-bold border border-[#bbf7d0]">2</code>.
                </p>
                <div class="bg-white/80 p-4 rounded-lg border border-[#bbf7d0] text-sm text-[#166534] leading-relaxed shadow-sm">
                    <strong class="flex items-center gap-2 mb-2"><i class="fa-regular fa-lightbulb text-yellow-500"></i> Tahukah Anda?</strong>
                    Di Python, ada trik cepat untuk mengambil elemen <strong>paling akhir</strong> tanpa harus menghitung jumlah datanya secara manual, yaitu menggunakan indeks negatif <code class="bg-[#dcfce7] px-1.5 py-0.5 rounded font-bold">pop(-1)</code>.<br><br>
                    Anda juga dapat menuliskan fungsi <code class="bg-[#dcfce7] px-1.5 py-0.5 rounded font-bold">pop()</code> (kosong tanpa angka). Jika dikosongkan, secara otomatis fungsi ini akan memotong elemen paling belakang (sama persis kerjanya dengan `pop(-1)`).
                </div>
            </div>

        </div>

        <div class="flex justify-between gap-4 mt-12 pt-6 border-t border-slate-200">
            <button type="button" onclick="prevStep()" class="px-6 py-2.5 rounded-lg border border-slate-300 font-bold text-slate-600 hover:bg-slate-50 transition shadow-sm active:scale-95">
                Kembali
            </button>
            <button type="button" id="btnNext32" onclick="nextStep()" class="px-6 py-2.5 bg-slate-900 hover:bg-slate-800 text-white font-bold rounded-lg shadow-md transition-all active:scale-95 opacity-50 cursor-not-allowed" disabled>
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

        window.net_isolasi_32 = null;
        window.nodes_32 = null;
        window.edges_32 = null;
        window.step_anim_32 = 0;

        document.addEventListener("DOMContentLoaded", function() {
            
            // X & Y Manual diubah ke atas agar graf tidak tertutup panel
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
                interaction: { dragNodes: false, zoomView: false, hover: false, selectable: false },
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
            if(localStorage.getItem('sandbox_3_2_done_' + userId) === 'true') {
                document.getElementById('output-explanation-32').classList.remove('hidden');
                document.getElementById('activity-32-container').classList.remove('opacity-50', 'pointer-events-none');
                
                const editor = document.getElementById('editor-sandbox-32');
                const savedCode = localStorage.getItem('sandbox_3_2_code_' + userId);
                if(savedCode) {
                    editor.value = savedCode; 
                    window.autoResizeEditor32(editor); 
                }
                
                const btnRunSandbox = document.getElementById('btnRunSandbox32');
                if (btnRunSandbox) {
                    btnRunSandbox.innerHTML = 'Program Berhasil';
                    btnRunSandbox.classList.replace('bg-green-600', 'bg-emerald-600');
                    btnRunSandbox.classList.replace('hover:bg-green-500', 'hover:bg-emerald-500');
                }
                
                const outText = document.getElementById('sandbox-output-text-32');
                if (outText) {
                    outText.innerHTML = "Hasil Penelusuran DFS: ['A', 'C', 'F', 'B', 'E', 'D']";
                    outText.classList.remove('italic', 'opacity-60');
                    document.getElementById('status-sandbox-32').innerText = "Success";
                    document.getElementById('status-sandbox-32').className = "bg-green-700 text-white px-2 py-0.5 rounded text-[10px]";
                }
            }

            // Restore Activity
            const isDoneServer = {{ isset($progress['3.2']) && $progress['3.2']->score == 100 ? 'true' : 'false' }};
            const savedValue = localStorage.getItem('act_3_2_ans_' + userId) || "2";

            if(isDoneServer || localStorage.getItem('act_3_2_done_' + userId) === 'true') {
                window.kunciJawaban32(savedValue);
            }
        });

        window.autoResizeEditor32 = function(el) {
            if(!el) return;
            el.style.height = 'auto'; 
            if (el.scrollHeight > 0) {
                el.style.height = el.scrollHeight + 'px';
            } else {
                const lineCount = (el.value.match(/\n/g) || []).length + 1;
                el.style.height = (lineCount * 22 + 40) + 'px'; 
            }
        };

        window.nextStepDFS_32 = function() {
            if (!window.nodes_32) return;
            const infoPanel = document.getElementById('dfs-info-panel');
            const btn = document.getElementById('btnNextDFS');
            window.step_anim_32++;

            if (window.step_anim_32 === 1) {
                window.nodes_32.update({id: 'A', color: '#ea580c', font: {color: 'white'}}); 
                infoPanel.innerHTML = `<strong>Langkah 1:</strong> Memulai penelusuran dari <span class="text-orange-400 font-bold mx-1">Simpul A (Start)</span>.`;
            } 
            else if (window.step_anim_32 === 2) {
                window.nodes_32.update([{id: 'C', color: '#ea580c', font: {color: 'white'}}, {id: 'F', color: '#ea580c', font: {color: 'white'}}]);
                window.edges_32.update([{id: 'eAC', color: '#ea580c'}, {id: 'eCF', color: '#ea580c'}]);
                infoPanel.innerHTML = `<strong>Langkah 2:</strong> Menukik ke dalam! Robot menembus cabang <span class="text-orange-400 font-bold mx-1">A &rarr; C &rarr; F</span>.`;
            }
            else if (window.step_anim_32 === 3) {
                window.nodes_32.update([{id: 'B', color: '#f97316', font: {color: 'white'}}, {id: 'E', color: '#f97316', font: {color: 'white'}}]); 
                window.edges_32.update([{id: 'eAB', color: '#f97316'}, {id: 'eBE', color: '#f97316'}]);
                infoPanel.innerHTML = `<strong>Langkah 3:</strong> <em>Backtrack!</em> F buntu. Mundur dan coba cabang: <span class="text-orange-400 font-bold mx-1">B &rarr; E</span>.`;
            }
            else if (window.step_anim_32 === 4) {
                window.nodes_32.update([{id: 'D', color: '#10b981', font: {color: 'white'}}]); 
                window.edges_32.update([{id: 'eBD', color: '#10b981'}]);
                infoPanel.innerHTML = `<strong>Langkah 4:</strong> E buntu. Mundur ke B, lalu menuju <span class="text-green-400 font-bold mx-1">Simpul D (Target)</span>. Selesai!`;
                btn.disabled = true;
                btn.className = "bg-slate-300 text-slate-500 px-3 py-1 rounded text-xs font-bold cursor-not-allowed shadow-none";
            }
        }

        window.resetDFS_32 = function() {
            if (!window.nodes_32) return;
            window.step_anim_32 = 0;
            window.nodes_32.forEach(n => window.nodes_32.update({id: n.id, color: '#e2e8f0', font: {color: '#64748b'}}));
            window.edges_32.forEach(e => window.edges_32.update({id: e.id, color: '#cbd5e1'}));
            
            document.getElementById('dfs-info-panel').innerHTML = `Tekan tombol <span class="text-orange-400 font-bold mx-1">Langkah Selanjutnya</span> untuk melihat cara DFS menembus kedalaman.`;
            const btn = document.getElementById('btnNextDFS');
            btn.disabled = false;
            btn.className = "bg-orange-600 hover:bg-orange-500 text-white px-3 py-1 rounded text-xs font-bold transition-colors shadow-sm";
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

            window.autoResizeEditor32(editor);
            outputText.classList.remove('italic', 'opacity-60');

            if(code.trim() === "") {
                outputText.className = "text-[#ff5f56]"; 
                outputText.innerHTML = "SyntaxError: Unexpected EOF while parsing. (Editor masih kosong!)";
                return;
            }

            btnRunSandbox.innerHTML = 'Loading...';
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

                    btnRunSandbox.innerHTML = 'Program Berhasil';
                    btnRunSandbox.classList.replace('bg-green-600', 'bg-emerald-600');
                    btnRunSandbox.classList.replace('hover:bg-green-500', 'hover:bg-emerald-500');
                    
                    const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                    localStorage.setItem('sandbox_3_2_done_' + userId, 'true');
                    localStorage.setItem('sandbox_3_2_code_' + userId, code);

                    explanation.classList.remove('hidden');
                    actContainer.classList.remove('opacity-50', 'pointer-events-none');
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

        // --- VALIDASI AKTIVITAS 3.2 ---
        window.runAktivitas32 = async function() {
            const inputVal = document.getElementById('input32_1').value.trim();
            const alertBox = document.getElementById('alert-32');
            const consoleText = document.getElementById('console-text-32');
            const statusTerm = document.getElementById('status-terminal-32');
            const btnRun = document.getElementById('btnRun32');

            consoleText.classList.remove('italic', 'opacity-60');

            if(inputVal === "") {
                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-yellow-50 text-yellow-800 border-yellow-200";
                alertBox.innerHTML = "⚠️ Error: Syntax Tidak Lengkap. Masih ada bagian kode yang kosong.";
                alertBox.classList.remove('hidden');
                consoleText.innerHTML = "SyntaxError: Unexpected token '____'";
                consoleText.className = "text-[#ff5f56] whitespace-pre-wrap break-words leading-relaxed text-sm";
                return;
            }

            btnRun.innerHTML = 'Memproses...';
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
                    localStorage.setItem('act_3_2_done_' + userId, 'true');
                    localStorage.setItem('act_3_2_ans_' + userId, inputVal);

                    alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-green-50 text-green-800 border-green-400";
                    alertBox.innerHTML = "✅ Kompilasi Berhasil! Anda telah memanggil elemen terakhir dengan akurat.";
                    alertBox.classList.remove('hidden');

                    statusTerm.innerText = "Success";
                    statusTerm.className = "bg-green-700 text-white px-2 py-0.5 rounded text-[10px]";

                    consoleText.className = "text-[#4af626] whitespace-pre-wrap break-words leading-relaxed text-sm";
                    consoleText.innerHTML = stdout.replace(/\n/g, '<br>');

                    window.kunciJawaban32(inputVal);

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
        section: "3.2",
        score: 100,
        answer: "Berhasil Live Coding 3.2"
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
                    statusTerm.innerText = "Logic Error";
                    statusTerm.className = "bg-amber-600 text-white px-2 py-0.5 rounded text-[10px]";
                    
                    consoleText.className = "text-[#ff5f56] whitespace-pre-wrap break-words leading-relaxed text-sm";
                    consoleText.innerHTML = stdout.replace(/\n/g, '<br>') + `<br><span class="text-[#ffbd2e]">> Validasi Gagal: Anda tidak mengambil Pasien_C (elemen terakhir).</span>`;

                    alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-amber-50 text-amber-800 border-amber-300 animate-pulse";
                    alertBox.innerHTML = "❌ Logika Kurang Tepat: Untuk mengambil data paling belakang, pastikan Anda memasukkan indeks yang benar (yaitu indeks ke-2).";
                    alertBox.classList.remove('hidden');
                }

            } catch (err) {
                consoleText.className = "text-[#ff5f56] whitespace-pre-wrap break-words leading-relaxed text-sm";
                consoleText.innerHTML = "Traceback (most recent call last):<br>" + err.message;
                statusTerm.innerText = "Error";
                statusTerm.className = "bg-red-800 text-red-200 px-2 py-0.5 rounded text-[10px]";

                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-red-50 text-red-800 border-red-300 animate-pulse";
                alertBox.innerHTML = "❌ Syntax Error: Pastikan Anda hanya mengisi bagian dalam kurung dengan angka (Integer) saja.";
                alertBox.classList.remove('hidden');
            } finally {
                btnRun.innerHTML = 'Jalankan & Periksa';
                btnRun.disabled = false;
            }
        }

        window.kunciJawaban32 = function(answeredValue) {
            const el = document.getElementById('input32_1');
            if(el) {
                el.value = answeredValue || "2"; 
                el.disabled = true;
                el.classList.replace('text-[#b5cea8]', 'text-[#4af626]');
                el.classList.add('bg-green-900/30', 'border-green-500', 'cursor-not-allowed');
            }

            const btnRun = document.getElementById('btnRun32');
            if(btnRun) {
                btnRun.innerHTML = 'Diselesaikan';
                btnRun.classList.replace('bg-blue-600', 'bg-slate-600');
                btnRun.classList.replace('hover:bg-blue-500', 'cursor-not-allowed');
                btnRun.disabled = true;
            }

            const consoleText = document.getElementById('console-text-32');
            if (consoleText && consoleText.innerHTML.includes('Output terminal')) {
                 consoleText.classList.remove('italic', 'opacity-60');
                 consoleText.className = "text-[#4af626] whitespace-pre-wrap break-words leading-relaxed text-sm";
                 consoleText.innerHTML = "Pasien yang dilayani: Pasien_C<br>Sisa antrean: ['Pasien_A', 'Pasien_B']";
            }

            document.getElementById('feedback-edukatif-32').classList.remove('hidden');

            const btnNext = document.getElementById('btnNext32');
            if(btnNext) {
                btnNext.disabled = false;
                btnNext.classList.remove('opacity-50', 'cursor-not-allowed');
                btnNext.classList.replace('bg-slate-900', 'bg-blue-600');
                btnNext.classList.replace('hover:bg-slate-800', 'hover:bg-blue-700');
            }
        }
    </script>
</section>