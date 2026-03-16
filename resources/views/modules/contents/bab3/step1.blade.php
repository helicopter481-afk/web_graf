<section id="step-1" class="step-slide">
    {{-- IMPORT VIS JS --}}
    <script type="text/javascript" src="https://unpkg.com/vis-network/standalone/umd/vis-network.min.js"></script>

    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-8 md:p-10 max-w-6xl mx-auto -mt-8">

        {{-- JUDUL MATERI --}}
        <div class="border-b border-slate-200 pb-6 mb-8">
            <h2 class="text-2xl md:text-3xl font-bold text-slate-900 mb-2">3.1 Breadth-First Search (BFS)</h2>
            <p class="text-slate-500 font-medium">Menelusuri graf secara melebar (Level demi Level) menggunakan Queue.</p>
        </div>

        {{-- KONTEN TEORI --}}
        <div class="prose prose-slate text-slate-700 leading-relaxed text-justify mb-6 max-w-none">
            <p>
                Algoritma BFS menjelajahi graf secara <strong>melebar</strong> atau level demi level. Bayangkan seperti radar atau gelombang air yang tercipta saat Anda melempar batu ke danau: ia akan menyentuh area yang paling dekat terlebih dahulu sebelum menyebar ke area yang lebih jauh.
            </p><br>
            <p>
                Untuk mengingat simpul mana yang harus dikunjungi selanjutnya, BFS menggunakan struktur data <strong>Queue (Antrean)</strong>. Prinsipnya sama seperti antrean di kasir: <strong>Siapa yang datang pertama, ia yang dilayani pertama (<em>First-In First-Out / FIFO</em>)</strong>. Di Python, <em>Queue</em> bisa diimplementasikan dengan mengambil elemen pada indeks ke-0 menggunakan perintah <code>pop(0)</code>.
            </p>
        </div>

        {{-- INFO SKENARIO BIASA DENGAN TITIK AWAL & TARGET --}}
        <p class="text-sm text-slate-700 mb-4 bg-slate-50 p-3 rounded border border-slate-200">
            <strong>Skenario Simulasi:</strong> Komputer memetakan area graf di bawah ini dimulai dari <strong>Simpul A (Titik Awal)</strong>, dengan target mencari keberadaan <strong>Simpul E (Titik Target)</strong>.
        </p>

        {{-- VISUALISASI INTERAKTIF BFS --}}
        <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 shadow-inner w-full flex flex-col items-center mb-10 group relative">
            <div class="w-full flex justify-between items-center mb-3">
                <span class="font-bold text-slate-700 text-sm">Simulasi BFS</span>
                <div class="flex gap-2">
                    <button onclick="window.resetBFS_31()" class="bg-white border border-slate-300 hover:bg-slate-100 text-slate-700 px-3 py-1 rounded text-xs font-bold transition-colors shadow-sm">
                        Ulangi
                    </button>
                    <button id="btnNextBFS" onclick="window.nextStepBFS_31()" class="bg-blue-600 hover:bg-blue-500 text-white px-3 py-1 rounded text-xs font-bold transition-colors shadow-sm">
                        Langkah Selanjutnya
                    </button>
                </div>
            </div>
            
            {{-- Ditinggikan menjadi 400px agar terhindar dari panel bawah yang menutupi node E --}}
            <div id="bfs_isolasi_31" class="w-full h-[400px] bg-white rounded-lg border border-slate-200 shadow-sm relative overflow-hidden cursor-crosshair"></div>
            
            {{-- Panel Info Interaktif --}}
            <div class="absolute bottom-6 left-0 right-0 px-4 flex justify-center pointer-events-none">
                <div id="bfs-info-panel" class="bg-slate-900 text-white text-sm px-1 py-0 rounded-full shadow-lg text-center transition-all duration-300 w-auto max-w-4xl ml-auto mb-4 mr-5">
                    Tekan tombol <strong class="text-blue-400 mx-1">Langkah Selanjutnya</strong> untuk memulai simulasi BFS.
                </div>
            </div>
        </div>
        {{-- PENJELASAN LANGKAH SIMULASI BFS --}}
        <div class="mb-10 p-6 bg-white border border-slate-200 rounded-xl shadow-sm">
            <h4 class="font-bold text-slate-800 text-sm mb-4 flex items-center gap-2">
                <i class="fa-solid fa-shoe-prints text-blue-500"></i> Rincian Alur Penelusuran BFS:
            </h4>
            <ul class="list-disc list-outside ml-5 text-sm text-slate-700 space-y-3 leading-relaxed text-justify">
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

        {{-- CONTOH KODE PROGRAM (ANTI-COPY) --}}
        <div>
            <h3 class="text-lg font-bold text-slate-800 mb-3">Contoh Kode Program BFS:</h3>
            
            {{-- IDE Block (View Only) --}}
            <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 select-none pointer-events-none mb-4">
                <div class="bg-[#2d2d2d] px-4 py-2.5 flex items-center gap-2 border-b border-slate-700">
                    <div class="w-3 h-3 rounded-full bg-[#ff5f56]"></div>
                    <div class="w-3 h-3 rounded-full bg-[#ffbd2e]"></div>
                    <div class="w-3 h-3 rounded-full bg-[#27c93f]"></div>
                    <span class="text-slate-400 text-xs ml-2 font-mono">bfs_traversal.py (Hanya Baca)</span>
                </div>
                <div class="p-5 font-mono text-sm leading-loose overflow-x-auto text-[#d4d4d4]">
                    <div><span class="text-[#569cd6]">def</span> <span class="text-[#dcdcaa]">jalankan_bfs</span>(graf, titik_awal):</div>
                    <div class="ml-4">dikunjungi <span class="text-[#d4d4d4]">=</span> []</div>
                    <div class="ml-4 mb-3">antrean <span class="text-[#d4d4d4]">=</span> [titik_awal] <span class="text-[#6a9955]"># Menyimpan antrean simpul yang akan dicek</span></div>

                    <div class="ml-4"><span class="text-[#c586c0]">while</span> antrean: <span class="text-[#6a9955]"># Selama antrean belum kosong</span></div>
                    <div class="ml-8">simpul_saat_ini <span class="text-[#d4d4d4]">=</span> antrean.<span class="text-[#dcdcaa]">pop</span>(<span class="text-[#b5cea8]">0</span>) <span class="text-[#6a9955]"># Ambil antrean paling DEPAN (Indeks 0)</span></div>

                    <div class="ml-8 mt-3"><span class="text-[#c586c0]">if</span> simpul_saat_ini <span class="text-[#c586c0]">not in</span> dikunjungi:</div>
                    <div class="ml-12">dikunjungi.<span class="text-[#dcdcaa]">append</span>(simpul_saat_ini) <span class="text-[#6a9955]"># Tandai sudah dikunjungi</span></div>

                    <div class="ml-12 mt-3"><span class="text-[#6a9955]"># Tambahkan semua tetangganya ke dalam antrean</span></div>
                    <div class="ml-12 mb-3">antrean.<span class="text-[#dcdcaa]">extend</span>(graf[simpul_saat_ini])</div>

                    <div class="ml-4"><span class="text-[#c586c0]">return</span> dikunjungi</div>

                    <div class="mt-4"><span class="text-[#6a9955]"># Dictionary Graf</span></div>
                    <div>graf_kota <span class="text-[#d4d4d4]">=</span> {</div>
                    <div class="ml-4"><span class="text-[#ce9178]">'A'</span>: [<span class="text-[#ce9178]">'B'</span>, <span class="text-[#ce9178]">'C'</span>],</div>
                    <div class="ml-4"><span class="text-[#ce9178]">'B'</span>: [<span class="text-[#ce9178]">'D'</span>],</div>
                    <div class="ml-4"><span class="text-[#ce9178]">'C'</span>: [<span class="text-[#ce9178]">'F'</span>],</div>
                    <div class="ml-4"><span class="text-[#ce9178]">'D'</span>: [<span class="text-[#ce9178]">'E'</span>], <span class="text-[#ce9178]">'E'</span>: [], <span class="text-[#ce9178]">'F'</span>: []</div>
                    <div>}</div>

                    <div class="mt-4"><span class="text-[#dcdcaa]">print</span>(<span class="text-[#ce9178]">"Hasil Penelusuran BFS:"</span>, jalankan_bfs(graf_kota, <span class="text-[#ce9178]">'A'</span>))</div>
                </div>
            </div>
            

            {{-- PENJELASAN KODE PROGRAM --}}
            <div class="mb-10 p-4 border border-slate-200 rounded-xl bg-slate-50">
                <h4 class="font-bold text-slate-800 text-base mb-3">Penjelasan Kode:</h4>
                <ul class="list-disc list-outside ml-5 text-sm text-slate-700 space-y-2 leading-relaxed text-justify">
                    <li>Komentar pada kode (tanda <code>#</code>) hanya untuk penjelasan agar mudah dipahami. Komentar tidak dijalankan oleh Python.</li>
                    <li>Pada <code>antrean = [titik_awal]</code>, kita menyiapkan variabel tipe <em>List</em> sebagai wadah struktur data <em>Queue</em> (Antrean).</li>
                    <li>Perintah <code>antrean.pop(0)</code> adalah fungsi utama yang membedakan BFS. Fungsi ini akan memaksa program menarik data urutan ke-0 (paling depan) dari dalam list antrean.</li>
                    <li>Perintah <code>antrean.extend()</code> digunakan untuk memasukkan (mengantrekan) semua tetangga dari simpul saat ini ke bagian paling belakang dari list antrean.</li>
                </ul>
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- INTERACTIVE SANDBOX: KETIK ULANG KODE --}}
        {{-- ========================================== --}}
        <div class="mb-10 bg-blue-50/30 border-2 border-blue-200 p-6 rounded-xl shadow-sm">
            <h3 class="text-lg font-bold text-slate-800 mb-2">Coba Sendiri!</h3>
            <p class="text-sm text-slate-600 mb-4">
                Ketik ulang keseluruhan kode pada contoh di atas ke dalam editor di bawah ini (tidak perlu mengetik komentarnya). Biasakan jari Anda dengan sintaks Python!
            </p>

            <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 font-mono text-sm flex flex-col">
                <div class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700 shrink-0">
                    <span class="text-slate-400 text-xs">Terminal Editor Pyodide</span>
                    <button onclick="window.runSandbox31()" id="btnRunSandbox31" class="bg-green-600 hover:bg-green-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors shadow-sm">
                        Jalankan Program
                    </button>
                </div>
                
                <textarea id="editor-sandbox-31" class="w-full min-h-[160px] bg-[#1e1e1e] text-[#d4d4d4] px-5 pt-5 pb-2 font-mono text-sm outline-none resize-none leading-relaxed overflow-hidden" spellcheck="false" placeholder="# Ketik kode Python di sini..." oninput="window.autoResizeEditor(this)"></textarea>

                {{-- WADAH OUTPUT --}}
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
        <div id="output-explanation-31" class="mb-12 hidden transition-all duration-700">
            <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm">
                <h4 class="font-bold text-slate-800 text-sm mb-3">Output Program:</h4>
                <div class="bg-black text-[#4af626] font-mono text-sm p-4 rounded-md shadow-inner mb-6">
                    Hasil Penelusuran BFS: ['A', 'B', 'C', 'D', 'F', 'E']
                </div>
                
                <h4 class="font-bold text-slate-800 text-sm mb-3">Analisis Output:</h4>
                <ul class="list-disc list-outside ml-4 text-sm text-slate-700 space-y-2 text-justify">
                    <li>Sesuai dengan hasil eksekusi, algoritma BFS mengunjungi tetangga terdekat dari 'A' terlebih dahulu (yaitu 'B' dan 'C').</li>
                    <li>Setelah itu, barulah algoritma turun ke level berikutnya untuk mengunjungi 'D' dan 'F', lalu yang terakhir adalah 'E'.</li>
                    <li>Hal ini membuktikan bahwa sifat FIFO (Antrean) membuat pencarian target dilakukan secara merata (level demi level).</li>
                </ul>
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- AKTIVITAS 3.1: FILL IN THE BLANKS (DIUBAH KE INDEKS 1) --}}
        {{-- ========================================== --}}
        <div id="activity-31-container" class="mt-12 pt-8 border-t-[3px] border-dashed border-slate-200 opacity-50 pointer-events-none transition-opacity duration-500">
            
            <div class="flex items-center gap-3 mb-6">
                <span class="bg-yellow-500 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider shadow-sm">💡 Aktivitas 3.1</span>
                <h3 class="font-bold text-slate-900 text-xl">Live Coding: Fleksibilitas Indeks</h3>
            </div>

            <div class="bg-blue-50 border border-blue-200 rounded-xl p-6 mb-6 shadow-sm">
                <p class="text-sm text-blue-900 leading-relaxed text-justify mb-3">
                    <strong>Skenario:</strong> Anda sedang membuat sistem antrean rumah sakit. Tiba-tiba, pasien di urutan pertama (Pasien_A) sedang ke toilet. Sistem harus melompati antrean dan memanggil pasien di urutan <strong>kedua</strong> (Pasien_B) terlebih dahulu.
                </p>
                <div class="bg-white/80 p-4 rounded border border-blue-200 font-medium text-blue-900 text-sm shadow-sm leading-relaxed flex flex-wrap items-center gap-2">
                    <strong>Tugas Anda:</strong> Lengkapi bagian 
                    <span class="bg-blue-100 px-1.5 py-0.5 rounded text-blue-700 font-mono text-xs">pop(____)</span> 
                    di bawah ini agar sistem mengekstrak data pasien urutan <strong>kedua</strong>.
                </div>
            </div>

            <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 font-mono text-sm flex flex-col">
                <div class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700">
                    <span class="text-slate-400 text-xs">Terminal Editor Pyodide</span>
                    <button onclick="window.runAktivitas31()" id="btnRun31" class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors shadow-sm">
                        Jalankan & Periksa
                    </button>
                </div>
                
                <div class="p-6 leading-relaxed text-[#d4d4d4] overflow-x-auto whitespace-nowrap">
                    <div><span class="text-[#9cdcfe]">antrean_pasien</span> = [<span class="text-[#ce9178]">"Pasien_A"</span>, <span class="text-[#ce9178]">"Pasien_B"</span>, <span class="text-[#ce9178]">"Pasien_C"</span>]</div>
                    <br>
                    <div class="text-[#6a9955]"># Panggil pasien urutan kedua (karena pasien pertama absen)!</div>
                    
                    <div class="flex items-center mt-1">
                        <span class="text-[#9cdcfe]">pasien_dipanggil</span> = <span class="text-[#9cdcfe]">antrean_pasien</span>.<span class="text-[#dcdcaa]">pop</span>(<input type="text" id="input31_1" class="bg-[#3c3c3c] text-[#b5cea8] border border-slate-500 rounded px-2 py-0.5 mx-1 w-12 outline-none focus:border-blue-400 focus:bg-[#2d2d2d] text-center transition-colors shadow-inner" autocomplete="off" spellcheck="false">)
                    </div>

                    <br>
                    <div><span class="text-[#dcdcaa]">print</span>(<span class="text-[#ce9178]">"Pasien yang dilayani:"</span>, pasien_dipanggil)</div>
                    <div><span class="text-[#dcdcaa]">print</span>(<span class="text-[#ce9178]">"Sisa antrean:"</span>, antrean_pasien)</div>
                    
                    <div class="mt-6 pt-4 border-t border-slate-700">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-slate-500 text-[10px] font-bold tracking-widest uppercase">OUTPUT TERMINAL</span>
                            <span id="status-terminal-31" class="bg-slate-800 text-slate-400 px-2 py-0.5 rounded text-[10px]">Ready</span>
                        </div>
                        <div id="console-text-31" class="text-[#4af626] whitespace-pre-wrap break-words leading-relaxed text-sm italic opacity-60">(Output terminal akan tampil di sini setelah dijalankan)</div>
                    </div>
                </div>
            </div>

            <div id="alert-31" class="hidden mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border transition-all"></div>

            <div id="feedback-edukatif-31" class="hidden mt-4 bg-[#f0fdf4] border border-[#bbf7d0] p-6 rounded-xl shadow-sm">
                <h4 class="font-bold text-[#166534] mb-3 flex items-center gap-2">Penjelasan Sintaks</h4>
                <ul class="list-disc list-outside ml-4 text-sm text-[#166534] space-y-2">
                    <li>Luar biasa! Dalam Python, penghitungan indeks <em>List</em> selalu dimulai dari 0. Sehingga urutan pertama adalah indeks 0, dan urutan kedua adalah indeks <code class="bg-[#dcfce7] px-2 py-0.5 rounded font-bold border border-[#bbf7d0]">1</code>.</li>
                    <li>Dengan menggunakan <code>pop(1)</code>, Anda berhasil mengekstrak Pasien_B tanpa membuang Pasien_A dari dalam daftar antrean!</li>
                </ul>
            </div>

        </div>

        <div class="flex justify-between gap-4 mt-12 pt-6 border-t border-slate-200">
            <button type="button" onclick="prevStep()" class="px-6 py-2.5 rounded-lg border border-slate-300 font-bold text-slate-600 hover:bg-slate-50 transition shadow-sm active:scale-95">
                Kembali
            </button>
            <button type="button" id="btnNext31" onclick="nextStep()" class="px-6 py-2.5 bg-slate-900 hover:bg-slate-800 text-white font-bold rounded-lg shadow-md transition-all active:scale-95 opacity-50 cursor-not-allowed" disabled>
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

        window.net_isolasi_31 = null;
        window.nodes_31 = null;
        window.edges_31 = null;
        window.step_anim_31 = 0;

        document.addEventListener("DOMContentLoaded", function() {
            
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
                interaction: { dragNodes: false, zoomView: false, hover: false, selectable: false },
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
            if(localStorage.getItem('sandbox_3_1_done_' + userId) === 'true') {
                document.getElementById('output-explanation-31').classList.remove('hidden');
                document.getElementById('activity-31-container').classList.remove('opacity-50', 'pointer-events-none');
                
                const editor = document.getElementById('editor-sandbox-31');
                const savedCode = localStorage.getItem('sandbox_3_1_code_' + userId);
                if(savedCode) {
                    editor.value = savedCode; 
                    window.autoResizeEditor(editor); 
                }
                
                const btnRunSandbox = document.getElementById('btnRunSandbox31');
                if (btnRunSandbox) {
                    btnRunSandbox.innerHTML = 'Program Berhasil';
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
            }

            // Restore Activity (MENGGUNAKAN KEY V2 UNTUK MENGHAPUS CACHE LAMA)
            const isDoneServer = {{ isset($progress['3.1']) && $progress['3.1']->score == 100 ? 'true' : 'false' }};
            const savedValue = localStorage.getItem('act_3_1_ans_v2_' + userId) || "1";

            if(isDoneServer || localStorage.getItem('act_3_1_done_v2_' + userId) === 'true') {
                window.kunciJawaban31(savedValue);
            }
        });

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
                window.nodes_31.update([{id: 'B', color: '#3b82f6', font: {color: 'white'}}, {id: 'C', color: '#3b82f6', font: {color: 'white'}}]);
                window.edges_31.update([{id: 'eAB', color: '#3b82f6'}, {id: 'eAC', color: '#3b82f6'}]);
                infoPanel.innerHTML = `<strong>Langkah 2:</strong> Menyapu melebar! <span class="text-blue-400 font-bold mx-1">Simpul B dan C (Level 1)</span> dikunjungi.`;
            }
            else if (window.step_anim_31 === 3) {
                window.nodes_31.update([{id: 'D', color: '#3b82f6', font: {color: 'white'}}, {id: 'F', color: '#3b82f6', font: {color: 'white'}}]); 
                window.edges_31.update([{id: 'eBD', color: '#3b82f6'}, {id: 'eCF', color: '#3b82f6'}]);
                infoPanel.innerHTML = `<strong>Langkah 3:</strong> Turun menyapu level berikutnya <span class="text-blue-400 font-bold mx-1">D dan F (Level 2)</span>.`;
            }
            else if (window.step_anim_31 === 4) {
                window.nodes_31.update([{id: 'E', color: '#3b82f6', font: {color: 'white'}}]); 
                window.edges_31.update([{id: 'eDE', color: '#3b82f6'}]);
                infoPanel.innerHTML = `<strong>Langkah 4:</strong> Terakhir menemukan target <span class="text-blue-400 font-bold mx-1">E (Level 3)</span>. Selesai!`;
                btn.disabled = true;
                btn.className = "bg-slate-300 text-slate-500 px-3 py-1 rounded text-xs font-bold cursor-not-allowed shadow-none";
            }
        }

        window.resetBFS_31 = function() {
            if (!window.nodes_31) return;
            window.step_anim_31 = 0;
            window.nodes_31.forEach(n => window.nodes_31.update({id: n.id, color: '#e2e8f0', font: {color: '#64748b'}}));
            window.edges_31.forEach(e => window.edges_31.update({id: e.id, color: '#cbd5e1'}));
            
            document.getElementById('bfs-info-panel').innerHTML = `Tekan tombol <span class="text-blue-400 font-bold mx-1">Langkah Selanjutnya</span> untuk memulai simulasi BFS.`;
            const btn = document.getElementById('btnNextBFS');
            btn.disabled = false;
            btn.className = "bg-blue-600 hover:bg-blue-500 text-white px-3 py-1 rounded text-xs font-bold transition-colors shadow-sm";
        }

        // --- VALIDASI SANDBOX 3.1 ---
        window.runSandbox31 = async function() {
            const editor = document.getElementById('editor-sandbox-31');
            const code = editor.value; 
            const outputText = document.getElementById('sandbox-output-text');
            const statusTerm = document.getElementById('status-sandbox-31');
            const explanation = document.getElementById('output-explanation-31');
            const actContainer = document.getElementById('activity-31-container');
            const btnRunSandbox = document.getElementById('btnRunSandbox31');

            window.autoResizeEditor(editor);
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
                const hasPopZero = cleanCode.includes("pop(0)");
                const hasWhile = cleanCode.includes("while");
                const hasAppend = cleanCode.includes("append");

                if (hasPopZero && hasWhile && hasAppend && stdout.includes("['A', 'B', 'C', 'D', 'F', 'E']")) {
                    outputText.className = "text-[#4af626]";
                    outputText.innerHTML = stdout.replace(/\n/g, '<br>');
                    
                    statusTerm.innerText = "Success";
                    statusTerm.className = "bg-green-700 text-white px-2 py-0.5 rounded text-[10px]";

                    btnRunSandbox.innerHTML = 'Program Berhasil';
                    btnRunSandbox.classList.replace('bg-blue-600', 'bg-emerald-600');
                    btnRunSandbox.classList.replace('hover:bg-blue-500', 'hover:bg-emerald-500');
                    
                    const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                    localStorage.setItem('sandbox_3_1_done_' + userId, 'true');
                    localStorage.setItem('sandbox_3_1_code_' + userId, code);

                    explanation.classList.remove('hidden');
                    actContainer.classList.remove('opacity-50', 'pointer-events-none');
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
                    btnRunSandbox.innerHTML = 'Coba Lagi';
                    btnRunSandbox.disabled = false;
                }
            }
        }

        // --- VALIDASI AKTIVITAS 3.1 (KUNCI JAWABAN = 1) ---
        window.runAktivitas31 = async function() {
            const inputVal = document.getElementById('input31_1').value.trim();
            const alertBox = document.getElementById('alert-31');
            const consoleText = document.getElementById('console-text-31');
            const statusTerm = document.getElementById('status-terminal-31');
            const btnRun = document.getElementById('btnRun31');

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

                if(inputVal === "1" && stdout.includes("Pasien_B")) {
                    const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                    localStorage.setItem('act_3_1_done_v2_' + userId, 'true'); // Key diubah v2
                    localStorage.setItem('act_3_1_ans_v2_' + userId, inputVal); // Key diubah v2

                    alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-green-50 text-green-800 border-green-400";
                    alertBox.innerHTML = "✅ Kompilasi Berhasil! Anda telah melompati antrean dan memanggil pasien urutan kedua.";
                    alertBox.classList.remove('hidden');

                    statusTerm.innerText = "Success";
                    statusTerm.className = "bg-green-700 text-white px-2 py-0.5 rounded text-[10px]";

                    consoleText.className = "text-[#4af626] whitespace-pre-wrap break-words leading-relaxed text-sm";
                    consoleText.innerHTML = stdout.replace(/\n/g, '<br>');

                    window.kunciJawaban31(inputVal);

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
        section: "3.1",
        score: 100,
        answer: "Berhasil Live Coding 3.1"
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
                    consoleText.innerHTML = stdout.replace(/\n/g, '<br>') + `<br><span class="text-[#ffbd2e]">> Validasi Gagal: Anda tidak memanggil Pasien_B.</span>`;

                    alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-amber-50 text-amber-800 border-amber-300 animate-pulse";
                    alertBox.innerHTML = "❌ Logika Kurang Tepat: Ingat, indeks pada List Python selalu dimulai dari angka 0. Jika Anda ingin mengambil urutan KEDUA, indeks ke berapakah yang harus dipanggil?";
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

        window.kunciJawaban31 = function(answeredValue) {
            const el = document.getElementById('input31_1');
            if(el) {
                el.value = answeredValue || "1"; 
                el.disabled = true;
                el.classList.replace('text-[#b5cea8]', 'text-[#4af626]');
                el.classList.add('bg-green-900/30', 'border-green-500', 'cursor-not-allowed');
            }

            const btnRun = document.getElementById('btnRun31');
            if(btnRun) {
                btnRun.innerHTML = 'Diselesaikan';
                btnRun.classList.replace('bg-blue-600', 'bg-slate-600');
                btnRun.classList.replace('hover:bg-blue-500', 'cursor-not-allowed');
                btnRun.disabled = true;
            }

            const consoleText = document.getElementById('console-text-31');
            if (consoleText && consoleText.innerHTML.includes('Output terminal')) {
                 consoleText.classList.remove('italic', 'opacity-60');
                 consoleText.className = "text-[#4af626] whitespace-pre-wrap break-words leading-relaxed text-sm";
                 consoleText.innerHTML = "Pasien yang dilayani: Pasien_B<br>Sisa antrean: ['Pasien_A', 'Pasien_C']";
            }

            document.getElementById('feedback-edukatif-31').classList.remove('hidden');

            const btnNext = document.getElementById('btnNext31');
            if(btnNext) {
                btnNext.disabled = false;
                btnNext.classList.remove('opacity-50', 'cursor-not-allowed');
                btnNext.classList.replace('bg-slate-900', 'bg-blue-600');
                btnNext.classList.replace('hover:bg-slate-800', 'hover:bg-blue-700');
            }
        }
    </script>
</section>