<section id="step-2" class="step-slide">
    {{-- IMPORT VIS JS --}}
    <script type="text/javascript" src="https://unpkg.com/vis-network/standalone/umd/vis-network.min.js"></script>

    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-8 md:p-10 max-w-6xl mx-auto -mt-8">
        
        {{-- JUDUL MATERI --}}
        <div class="border-b border-slate-200 pb-6 mb-8">
            <h2 class="text-2xl md:text-3xl font-bold text-slate-900 mb-2">2.2 Adjacency List (Daftar Ketetanggaan)</h2>
        </div>

        {{-- PENGANTAR TEORI --}}
        <div class="prose prose-slate text-slate-700 leading-relaxed text-justify mb-8 max-w-none">
            <p>
                Menyimpan sisi dalam bentuk <em>Tuple</em> (seperti subbab 2.1) akan membuat komputer bekerja lambat jika jumlah datanya mencapai jutaan. Solusi standar industri yang paling sering digunakan adalah <strong>Adjacency List</strong>.
            </p>
            <p>
                Di Python, <em>Adjacency List</em> dibuat menggunakan <strong>Dictionary <code>{}</code></strong>.
            </p>
            <ul class="list-disc list-outside ml-5 space-y-2 mt-2 mb-4 text-slate-800 font-medium">
                <li><strong>Key (Kunci):</strong> Merupakan nama simpul asal.</li>
                <li><strong>Value (Nilai):</strong> Merupakan List <code>[]</code> yang berisi daftar simpul tetangga yang terhubung dengannya.</li>
            </ul>
            <p>
                Representasi ini juga menjadi penentu utama apakah sebuah graf itu <strong>Tak Berarah (<em>Undirected</em>)</strong> atau <strong>Berarah (<em>Directed</em>)</strong>.
            </p>
        </div>

        {{-- ========================================== --}}
        {{-- VISUALISASI INTERAKTIF (BARU DITAMBAHKAN) --}}
        {{-- ========================================== --}}
        <div class="bg-slate-50 p-6 rounded-xl border border-slate-200 shadow-inner w-full flex flex-col items-center mb-10">
            <div class="flex flex-wrap justify-center gap-3 mb-4">
                <button id="btn-mutual" onclick="window.switchGraphType('mutual')" class="px-5 py-2.5 bg-blue-600 text-white text-sm font-bold rounded-lg shadow-md transition-all active:scale-95 border-2 border-blue-700">
                    <i class="fa-solid fa-arrows-left-right mr-2"></i> Graf Mutual (Tak Berarah)
                </button>
                <button id="btn-follower" onclick="window.switchGraphType('follower')" class="px-5 py-2.5 bg-white text-slate-600 text-sm font-bold rounded-lg shadow-sm hover:bg-slate-100 transition-all border-2 border-slate-300 active:scale-95">
                    <i class="fa-solid fa-arrow-right-long mr-2"></i> Graf Follower (Berarah)
                </button>
            </div>
            
            <div id="graf_interaktif_22" class="w-full h-[280px] bg-white rounded-lg border border-slate-200 shadow-sm relative overflow-hidden pointer-events-none"></div>
            
            <div id="graf-info-22" class="w-full mt-4 p-4 bg-blue-50 border border-blue-300 rounded-lg text-sm text-blue-900 text-center font-medium shadow-sm transition-all duration-300">
                <strong>💡 Graf Mutual:</strong> Garis tidak memiliki panah. Jika Andi berteman dengan Budi, maka otomatis Budi juga berteman dengan Andi (Hubungan dua arah).
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- CONTOH KODE PROGRAM (ANTI-COPY & FULL PANJANG) --}}
        {{-- ========================================== --}}
        <div class="mb-8">
            <h3 class="text-lg font-bold text-slate-800 mb-3">Contoh Kode Program:</h3>
            
            {{-- IDE Block (TIDAK BISA SCROLL, FULL HEIGHT, NO COPY) --}}
            <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 select-none pointer-events-none flex flex-col h-auto">
                <div class="bg-[#2d2d2d] px-3 py-2.5 flex items-center gap-2 border-b border-slate-700 shrink-0">
                    <div class="w-2.5 h-2.5 rounded-full bg-[#ff5f56]"></div>
                    <div class="w-2.5 h-2.5 rounded-full bg-[#ffbd2e]"></div>
                    <div class="w-2.5 h-2.5 rounded-full bg-[#27c93f]"></div>
                    <span class="text-slate-400 text-[10px] ml-2 font-mono">perbandingan_graf.py (Hanya Baca)</span>
                </div>
                
                <div class="p-5 font-mono text-[13px] leading-loose text-[#d4d4d4]">
                    <div class="text-[#6a9955]"># 1. Graf Tak Berarah (Simetris / Dua Arah)</div>
                    <div class="text-[#6a9955]"># Jika Andi terhubung ke Budi, maka Budi WAJIB terhubung ke Andi</div>
                    <div><span class="text-[#9cdcfe]">graf_mutual</span> = <span class="text-[#yellow-300]">{</span></div>
                    <div>&nbsp;&nbsp;<span class="text-[#ce9178]">"Andi"</span>: [<span class="text-[#ce9178]">"Budi"</span>, <span class="text-[#ce9178]">"Citra"</span>],</div>
                    <div>&nbsp;&nbsp;<span class="text-[#ce9178]">"Budi"</span>: [<span class="text-[#ce9178]">"Andi"</span>],&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-[#6a9955]"># Budi membalas relasi Andi</span></div>
                    <div>&nbsp;&nbsp;<span class="text-[#ce9178]">"Citra"</span>: [<span class="text-[#ce9178]">"Andi"</span>]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-[#6a9955]"># Citra membalas relasi Andi</span></div>
                    <div><span class="text-[#yellow-300]">}</span></div>

                    <div class="text-[#6a9955] mt-6"># 2. Graf Berarah (Asimetris / Satu Arah)</div>
                    <div class="text-[#6a9955]"># Andi mem-follow Budi, tapi Budi tidak mem-follow Andi</div>
                    <div><span class="text-[#9cdcfe]">graf_follower</span> = <span class="text-[#yellow-300]">{</span></div>
                    <div>&nbsp;&nbsp;<span class="text-[#ce9178]">"Andi"</span>: [<span class="text-[#ce9178]">"Budi"</span>, <span class="text-[#ce9178]">"Citra"</span>],</div>
                    <div>&nbsp;&nbsp;<span class="text-[#ce9178]">"Budi"</span>: [],&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-[#6a9955]"># Budi tidak mem-follow siapa-siapa</span></div>
                    <div>&nbsp;&nbsp;<span class="text-[#ce9178]">"Citra"</span>: [<span class="text-[#ce9178]">"Andi"</span>]</div>
                    <div><span class="text-[#yellow-300]">}</span></div>
                    
                    <div class="text-[#6a9955] mt-6"># Menampilkan siapa saja yang di-follow oleh Andi</div>
                    <div><span class="text-[#dcdcaa]">print</span>(<span class="text-[#ce9178]">"Andi mem-follow:"</span>, <span class="text-[#9cdcfe]">graf_follower</span>[<span class="text-[#ce9178]">"Andi"</span>])</div>
                    <div class="text-[#6a9955] mt-2"># Menampilkan siapa saja yang di-follow oleh Budi</div>
                    <div><span class="text-[#dcdcaa]">print</span>(<span class="text-[#ce9178]">"Budi mem-follow:"</span>, <span class="text-[#9cdcfe]">graf_follower</span>[<span class="text-[#ce9178]">"Budi"</span>])</div>
                </div>
            </div>
        </div>

        {{-- PENJELASAN KODE --}}
        <div class="mt-4 mb-10">
            <h4 class="font-bold text-slate-800 text-sm mb-3">Penjelasan Kode:</h4>
            <ul class="list-disc list-outside ml-4 text-sm text-slate-700 space-y-3 text-justify">
                <li>Komentar pada kode (tanda <code>#</code>) hanya untuk penjelasan agar mudah dipahami. Komentar tidak dijalankan oleh Python, jadi kalau dihapus pun program tetap berjalan normal dan hasilnya tidak berubah.</li>
                <li>Pada <code>graf_mutual</code>, setiap relasi ditulis bolak-balik. Ini memastikan jalur bisa dilewati dari kedua arah.</li>
                <li>Pada <code>graf_follower</code>, <em>Key</em> <strong>"Budi"</strong> memiliki <em>Value</em> berupa <em>List</em> kosong <code>[]</code>. Ini menandakan Budi adalah titik buntu (<em>dead end</em>) karena ia tidak memiliki jalur keluar menuju simpul manapun.</li>
                <li>Untuk melihat data spesifik di dalam <em>Dictionary</em>, kita memanggil nama variabelnya diikuti kunci di dalam kurung siku, contohnya: <code>graf_follower["Andi"]</code>.</li>
            </ul>
        </div>


        {{-- ========================================== --}}
        {{-- INTERACTIVE SANDBOX: KETIK ULANG KODE --}}
        {{-- ========================================== --}}
        <div class="mb-10 p-6 border-2 border-blue-200 bg-blue-50/30 rounded-xl shadow-sm">
            <h3 class="text-lg font-bold text-slate-800 mb-2 flex items-center gap-2">
                <i class="fa-solid fa-keyboard text-blue-600"></i> Coba Sendiri!
            </h3>
            <p class="text-sm text-slate-600 mb-4 text-justify">
                Ketik ulang keseluruhan kode pada contoh di atas ke dalam editor di bawah ini (tidak perlu mengetik komentarnya). Biasakan jari Anda dengan sintaks Dictionary Python!
            </p>

            <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 font-mono text-sm relative flex flex-col">
                <div class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700 shrink-0">
                    <span class="text-slate-400 text-xs tracking-wider">Terminal Editor (main.py)</span>
                    <button onclick="window.runSandbox22()" id="btnRunSandbox-22" class="bg-green-600 hover:bg-green-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors flex items-center gap-2 shadow-sm">
                        <i class="fa-solid fa-play"></i> Jalankan Program
                    </button>
                </div>
                
                <textarea id="editor-sandbox-22" class="w-full min-h-[160px] bg-[#1e1e1e] text-[#d4d4d4] p-5 font-mono text-sm outline-none resize-none overflow-hidden leading-relaxed" spellcheck="false" placeholder="# Ketik kode Python di sini..." oninput="window.autoResizeEditor(this)"></textarea>

                <div id="console-sandbox-22" class="hidden border-t border-slate-700 bg-black p-4 text-xs font-mono shrink-0">
                    <span class="text-slate-400">> root@graflearn: python main.py</span><br>
                    <div id="sandbox-output-text-22" class="mt-2 leading-relaxed"></div>
                </div>
            </div>
        </div>

        {{-- OUTPUT EXPLANATION (MUNCUL SETELAH SANDBOX BERHASIL) --}}
        <div id="output-explanation-22" class="mb-12 hidden transition-all duration-700">
            <h3 class="text-lg font-bold text-slate-800 mb-3">Output Program:</h3>
            
            <div class="bg-black text-[#4af626] font-mono text-sm p-4 rounded-lg shadow-inner mb-4 inline-block pr-20">
                Andi mem-follow: ['Budi', 'Citra']<br>
                Budi mem-follow: []
            </div>

            <p class="text-sm text-slate-700 text-justify leading-relaxed">
                Output tersebut menunjukkan hubungan pertemanan atau follow dalam bentuk graf berarah, di mana Andi mengikuti Budi dan Citra, sedangkan Budi tidak mengikuti siapa pun karena daftar follow-nya kosong, sehingga hubungan ini bersifat satu arah dari Andi ke Budi dan Citra.
            </p>
        </div>


        {{-- ========================================== --}}
        {{-- AKTIVITAS 2.2: LIVE CODING DEBUGGING --}}
        {{-- ========================================== --}}
        <div id="activity-22-container" class="mt-12 pt-8 border-t-[3px] border-dashed border-slate-200 opacity-50 pointer-events-none transition-opacity duration-500">
            
            <div class="flex items-center gap-3 mb-6">
                <span class="bg-yellow-500 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider shadow-sm">💡 Aktivitas 2.2</span>
                <h3 class="font-bold text-slate-900 text-xl">Live Coding: Debugging Arah Jaringan</h3>
            </div>

            <p class="text-sm text-slate-700 leading-relaxed text-justify mb-3">
                <strong>Skenario:</strong> Kode di bawah ini adalah program jalan satu arah (<em>Directed Graph</em>). Kendaraan dari "Pasar" bisa ke "Kampus", tetapi tidak bisa kembali karena <em>value</em> dari "Kampus" masih kosong.
            </p>
            <p class="text-sm text-slate-700 leading-relaxed text-justify mb-6">
                <strong>Tugas Anda:</strong> Modifikasi <em>dictionary</em> di bawah ini dengan mengisi <em>list</em> kosong pada "Kampus" agar rute tersebut memiliki jalur akses kembali ke "Pasar" (mengubahnya menjadi rute dua arah)!
            </p>

            <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 font-mono text-sm flex flex-col">
                <div class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700 shrink-0">
                    <span class="text-slate-400 text-xs">Terminal Editor Pyodide</span>
                    <button onclick="window.runAktivitas22()" id="btnRun22" class="bg-green-600 hover:bg-green-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors flex items-center gap-2 shadow-sm">
                        <i class="fa-solid fa-play"></i> Run Code
                    </button>
                </div>
                
                <div class="p-6 leading-relaxed text-[#d4d4d4] overflow-x-auto whitespace-nowrap flex-1">
                    <div><span class="text-[#9cdcfe]">rute_jalan</span> = <span class="text-[#yellow-300]">{</span></div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-[#ce9178]">"Rumah"</span>: [<span class="text-[#ce9178]">"Pasar"</span>],</div>
                    <div>&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-[#ce9178]">"Pasar"</span>: [<span class="text-[#ce9178]">"Kampus"</span>],</div>
                    
                    <div class="flex items-center">
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-[#ce9178]">"Kampus"</span>: [
                        <input type="text" id="input22_1" class="bg-[#3c3c3c] text-[#ce9178] border border-slate-600 rounded px-2 py-0.5 mx-1 w-28 outline-none focus:border-blue-400 focus:bg-[#2d2d2d] text-center transition-colors shadow-inner" autocomplete="off" spellcheck="false" placeholder='"..."'>
                        ]
                    </div>
                    
                    <div class="mb-4"><span class="text-[#yellow-300]">}</span></div>

                    <div class="text-[#6a9955]"># Sistem akan mengecek apakah Kampus bisa kembali ke Pasar</div>
                    <div><span class="text-[#dcdcaa]">print</span>(<span class="text-[#ce9178]">"Jalur keluar dari Kampus:"</span>, <span class="text-[#9cdcfe]">rute_jalan</span>[<span class="text-[#ce9178]">"Kampus"</span>])</div>
                </div>

                <div id="console-output-22" class="hidden border-t border-slate-700 bg-black p-4 text-xs font-mono shrink-0">
                    <span class="text-slate-400">> root@graflearn: python main.py</span><br>
                    <div id="console-text-22" class="mt-2 leading-relaxed"></div>
                </div>
            </div>

            <div id="alert-22" class="hidden mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border transition-all text-center"></div>

            <div id="feedback-edukatif-22" class="hidden mt-6 bg-blue-50/50 border border-blue-200 p-6 rounded-xl shadow-sm text-slate-800 text-sm leading-relaxed">
                <h4 class="font-bold text-blue-900 mb-3 flex items-center gap-2 border-b border-blue-200 pb-2">
                    <i class="fa-solid fa-lightbulb text-yellow-500"></i> Pembahasan: Mengapa Jawabannya Harus "Pasar"?
                </h4>
                <ul class="list-disc pl-5 space-y-3 text-slate-700 text-justify">
                    <li>Konsep utama jalan dua arah (<strong>Graf Tak Berarah</strong>) adalah sifatnya yang <strong>simetris (timbal-balik)</strong>.</li>
                    <li>Pada kode baris sebelumnya, dicatat bahwa dari <code class="bg-white px-1 rounded border border-slate-300 text-blue-600 font-mono shadow-sm">"Pasar"</code> terdapat jalan menuju <code class="bg-white px-1 rounded border border-slate-300 text-blue-600 font-mono shadow-sm">"Kampus"</code>.</li>
                    <li>Agar rute tersebut tidak menjadi jalan buntu (satu arah), maka dari node <code class="bg-white px-1 rounded border border-slate-300 text-blue-600 font-mono shadow-sm">"Kampus"</code> <strong>wajib</strong> memiliki rute kembali ke titik asalnya, yaitu <code class="bg-white px-1.5 py-0.5 rounded border border-slate-300 text-green-700 font-bold font-mono shadow-sm">"Pasar"</code>.</li>
                    <li>Selain itu, karena nama lokasi adalah bentuk teks, ia <strong>wajib</strong> diapit oleh sepasang tanda kutip ganda atau tunggal agar tidak dianggap sebagai variabel kosong oleh sistem Python.</li>
                </ul>
            </div>
        </div>

        {{-- Navigasi Bawah --}}
        <div class="flex justify-between gap-4 mt-12 pt-6 border-t border-slate-200">
            <button type="button" onclick="prevStep()" class="px-6 py-2.5 rounded-lg border border-slate-300 font-bold text-slate-600 hover:bg-slate-50 transition shadow-sm">
                Kembali
            </button>
            <button type="button" id="btnNext22" onclick="nextStep()" class="px-6 py-2.5 bg-slate-900 hover:bg-slate-800 text-white font-bold rounded-lg shadow-md transition-all active:scale-95 opacity-50 cursor-not-allowed" disabled>
                Lanjut
            </button>
        </div>

    </div>

    {{-- SCRIPT KHUSUS STEP 2.2 --}}
    <script>
        // ==========================================
        // AUTO RESIZE EDITOR
        // ==========================================
        window.autoResizeEditor = function(el) {
            if(!el) return;
            el.style.height = 'auto'; 
            if (el.scrollHeight > 0) {
                el.style.height = el.scrollHeight + 'px'; 
            } else {
                const lineCount = (el.value.match(/\n/g) || []).length + 1;
                el.style.height = (lineCount * 24 + 40) + 'px'; 
            }
        };

        window.net_isolasi_22 = null;
        window.edges_22 = null;

        document.addEventListener("DOMContentLoaded", function() {
            // ==========================================
            // GRAF INTERAKTIF 2.2 (MUTUAL VS FOLLOWER)
            // ==========================================
            const nodesData = [
                { id: 'Andi', label: 'Andi', x: -100, y: 0, color: { background: '#3b82f6', border: '#2563eb' }, font: { color: 'white', size: 16, face: 'Arial' }, shape: 'circle' },
                { id: 'Budi', label: 'Budi', x: 100, y: -60, color: { background: '#10b981', border: '#059669' }, font: { color: 'white', size: 16, face: 'Arial' }, shape: 'circle' },
                { id: 'Citra', label: 'Citra', x: 100, y: 60, color: { background: '#f59e0b', border: '#d97706' }, font: { color: 'white', size: 16, face: 'Arial' }, shape: 'circle' }
            ];

            // Dataset Sisi (Edges)
            const mutualEdges = [
                { id: 'e1', from: 'Andi', to: 'Budi', width: 3, color: '#94a3b8' },
                { id: 'e2', from: 'Andi', to: 'Citra', width: 3, color: '#94a3b8' }
            ];

            const followerEdges = [
                { id: 'e1', from: 'Andi', to: 'Budi', width: 3, color: '#94a3b8', arrows: 'to' },
                { id: 'e2', from: 'Andi', to: 'Citra', width: 3, color: '#94a3b8', arrows: 'to' },
                { id: 'e3', from: 'Citra', to: 'Andi', width: 3, color: '#94a3b8', arrows: 'to' }
            ];

            window.edges_22 = new vis.DataSet(mutualEdges);
            const container = document.getElementById('graf_interaktif_22');

            const options = {
                physics: false,
                interaction: { dragNodes: false, dragView: false, zoomView: false }
            };

            if (container) {
                window.net_isolasi_22 = new vis.Network(container, { nodes: nodesData, edges: window.edges_22 }, options);

                // 🔥 SUPER OBSERVER ANTI-KEPOTONG 🔥
                // Grafik akan digambar ulang persis saat section ini terlihat oleh mata user!
                const observer = new IntersectionObserver((entries) => {
                    if (entries[0].isIntersecting && window.net_isolasi_22) {
                        let ticks = 0;
                        let interval = setInterval(() => {
                            window.net_isolasi_22.redraw();
                            window.net_isolasi_22.fit({ animation: false });
                            ticks++;
                            if(ticks > 5) clearInterval(interval); // Paksa redraw 5x cepat agar tidak meleset
                        }, 50);
                    }
                });
                observer.observe(document.getElementById('step-2'));
            }

            // ==========================================
            // LOGIKA TOGGLE BUTTON
            // ==========================================
            window.switchGraphType = function(type) {
                const btnM = document.getElementById('btn-mutual');
                const btnF = document.getElementById('btn-follower');
                const info = document.getElementById('graf-info-22');

                if (type === 'mutual') {
                    window.edges_22.clear();
                    window.edges_22.add(mutualEdges);
                    
                    btnM.className = "px-5 py-2.5 bg-blue-600 text-white text-sm font-bold rounded-lg shadow-md transition-all border-2 border-blue-700";
                    btnF.className = "px-5 py-2.5 bg-white text-slate-600 text-sm font-bold rounded-lg shadow-sm hover:bg-slate-100 transition-all border-2 border-slate-300";
                    
                    info.className = "w-full mt-4 p-4 bg-blue-50 border border-blue-300 rounded-lg text-sm text-blue-900 text-center font-medium shadow-sm transition-all duration-300";
                    info.innerHTML = "<strong>💡 Graf Mutual:</strong> Garis tidak memiliki panah. Jika Andi berteman dengan Budi, maka otomatis Budi juga berteman dengan Andi (Hubungan dua arah).";
                } else {
                    window.edges_22.clear();
                    window.edges_22.add(followerEdges);
                    
                    btnF.className = "px-5 py-2.5 bg-indigo-600 text-white text-sm font-bold rounded-lg shadow-md transition-all border-2 border-indigo-700";
                    btnM.className = "px-5 py-2.5 bg-white text-slate-600 text-sm font-bold rounded-lg shadow-sm hover:bg-slate-100 transition-all border-2 border-slate-300";
                    
                    info.className = "w-full mt-4 p-4 bg-indigo-50 border border-indigo-300 rounded-lg text-sm text-indigo-900 text-center font-medium shadow-sm transition-all duration-300";
                    info.innerHTML = "<strong>💡 Graf Follower:</strong> Garis memiliki panah (Satu Arah). Andi mem-follow Budi (panah ke Budi). Tapi karena Budi tidak membalas follow, tidak ada panah dari Budi ke Andi.";
                }
            }

            // ==========================================
            // CEK PERSISTENCE SANDBOX & ACTIVITY
            // ==========================================
            const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
            const savedSandboxCode = localStorage.getItem('sandbox_2_2_code_' + userId);
            
            if(localStorage.getItem('sandbox_2_2_done_' + userId) === 'true') {
                const editor = document.getElementById('editor-sandbox-22');
                if(savedSandboxCode) editor.value = savedSandboxCode;
                window.renderHasilSandbox22(false);
                setTimeout(() => window.autoResizeEditor(editor), 100);
            }

            const keyDone = 'act_2_2_livecode_done_' + userId;
            const isDoneServer = {{ isset($progress['2.2']) && $progress['2.2']->score == 100 ? 'true' : 'false' }};
            
            if(isDoneServer || localStorage.getItem(keyDone) === 'true') {
                window.kunciJawaban22();
            }
        });

        // ==========================================
        // VALIDASI SANDBOX 2.2
        // ==========================================
        window.runSandbox22 = function() {
            const editor = document.getElementById('editor-sandbox-22');
            const code = editor.value; 
            const consoleBox = document.getElementById('console-sandbox-22');
            const outputText = document.getElementById('sandbox-output-text-22'); 
            const btnRunSandbox = document.getElementById('btnRunSandbox-22');

            consoleBox.classList.remove('hidden');

            if(code.trim() === "") {
                outputText.className = "text-[#ff5f56]"; 
                outputText.innerHTML = "SyntaxError: Editor masih kosong. Silakan ketik kodenya terlebih dahulu!";
                return;
            }

            const codeWithoutComments = code.replace(/#.*/g, '');
            const cleanCode = codeWithoutComments.replace(/\s+/g, '').replace(/'/g, '"');

            const hasMutual = cleanCode.includes('graf_mutual={');
            const hasFollower = cleanCode.includes('graf_follower={') && cleanCode.includes('"Andi":["Budi","Citra"]') && cleanCode.includes('"Budi":[]');
            const hasPrint1 = cleanCode.includes('print(') && cleanCode.includes('graf_follower["Andi"]');
            const hasPrint2 = cleanCode.includes('print(') && cleanCode.includes('graf_follower["Budi"]');

            if(hasMutual && hasFollower && hasPrint1 && hasPrint2) {
                outputText.className = "text-[#4af626]"; 
                outputText.innerHTML = "Andi mem-follow: ['Budi', 'Citra']<br>Budi mem-follow: []";
                
                btnRunSandbox.innerHTML = '<i class="fa-solid fa-check"></i> Program Berhasil';
                btnRunSandbox.classList.replace('bg-green-600', 'bg-emerald-600');
                
                const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                localStorage.setItem('sandbox_2_2_done_' + userId, 'true');
                localStorage.setItem('sandbox_2_2_code_' + userId, code);

                window.renderHasilSandbox22(true);

            } else {
                outputText.className = "text-[#ffbd2e]"; 
                let errorMsg = "Program gagal dieksekusi atau belum lengkap.<br>";
                
                if(!hasMutual) errorMsg += "- Anda belum membuat variabel <code>graf_mutual</code>.<br>";
                if(!hasFollower) errorMsg += "- Struktur <code>graf_follower</code> Anda keliru. Pastikan Budi memiliki list kosong [].<br>";
                if(!hasPrint1 || !hasPrint2) errorMsg += "- Anda belum mencetak (print) data Andi atau Budi dari graf_follower.<br>";
                
                outputText.innerHTML = errorMsg;
                btnRunSandbox.innerHTML = '<i class="fa-solid fa-rotate-right"></i> Coba Lagi';
            }
        }

        window.renderHasilSandbox22 = function(doScroll) {
            const explanationBox = document.getElementById('output-explanation-22');
            const actContainer = document.getElementById('activity-22-container');
            
            explanationBox.classList.remove('hidden');
            actContainer.classList.remove('opacity-50', 'pointer-events-none');
            
            if(doScroll) {
                setTimeout(() => {
                    explanationBox.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }, 300);
            }
        }

        // ==========================================
        // VALIDASI AKTIVITAS 2.2 
        // ==========================================
        window.runAktivitas22 = function() {
            let inputUserRaw = document.getElementById('input22_1').value.trim();
            let inputUserLower = inputUserRaw.toLowerCase();
            let inputClean = inputUserLower.replace(/['"]/g, '');
            
            const alertBox = document.getElementById('alert-22');
            const consoleBox = document.getElementById('console-output-22');
            const consoleText = document.getElementById('console-text-22');

            if(inputUserRaw === "") {
                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-yellow-50 text-yellow-800 border-yellow-200 text-center";
                alertBox.innerHTML = "⚠️ Error: Nilai rute tidak boleh kosong. Silakan ketik nama lokasi untuk rute kembali.";
                alertBox.classList.remove('hidden');
                consoleBox.classList.add('hidden');
                return;
            }

            const hasValidQuotes = (inputUserRaw.startsWith('"') && inputUserRaw.endsWith('"')) || 
                                   (inputUserRaw.startsWith("'") && inputUserRaw.endsWith("'"));

            if(inputClean === "pasar") {
                if (hasValidQuotes && inputUserRaw.length >= 7) { 
                    const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                    localStorage.setItem('act_2_2_livecode_done_' + userId, 'true');

                    alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-green-50 text-green-800 border-green-400 text-center";
                    alertBox.innerHTML = "✅ Debugging Berhasil! Anda sukses merubah jalan satu arah menjadi dua arah (bolak-balik) dengan sintaks Python yang sempurna.";
                    alertBox.classList.remove('hidden');

                    consoleBox.classList.remove('hidden');
                    consoleText.className = "mt-2 text-[#4af626]";
                    consoleText.innerHTML = "Jalur keluar dari Kampus: ['Pasar']";

                    window.kunciJawaban22();

                    if (typeof simpanProgressAktivitas === 'function') {
                        simpanProgressAktivitas('bab2', '2.2', 100);
                    }
                } else {
                    alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-red-50 text-red-800 border-red-300 animate-pulse text-center";
                    alertBox.innerHTML = "❌ Syntax Error: Anda lupa atau salah menggunakan tanda kutip! Karena kata 'Pasar' adalah teks (String), Anda wajib mengapitnya dengan pasangan tanda kutip. (Contoh: \"Pasar\" atau 'Pasar').";
                    alertBox.classList.remove('hidden');
                    
                    consoleBox.classList.remove('hidden');
                    consoleText.className = "mt-2 text-[#ff5f56]";
                    consoleText.innerHTML = `Traceback (most recent call last):<br>NameError: name '${inputClean}' is not defined.<br>Peringatan: Python mengira itu adalah variabel, bukan teks String!`;
                }

            } else if (inputClean === "rumah") {
                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-red-50 text-red-800 border-red-300 text-center";
                alertBox.innerHTML = "❌ Logika Graf Salah: Secara struktur, Kampus tidak terhubung langsung ke Rumah. Anda harus membuat rute kembali ke titik sebelumnya (Pasar).";
                alertBox.classList.remove('hidden');
                
                consoleBox.classList.remove('hidden');
                consoleText.className = "mt-2 text-[#ffbd2e]";
                consoleText.innerHTML = `Jalur keluar dari Kampus: [${inputUserRaw}]<br>Peringatan: Kendaraan Anda melompat (terbang) melewati node!`;
                
            } else if (inputClean === "kampus") {
                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-red-50 text-red-800 border-red-300 text-center";
                alertBox.innerHTML = "❌ Logika Graf Salah: Jika Anda memasukkan 'Kampus', itu artinya kendaraan berputar-putar di dalam kampus sendiri (Self-Loop). Kita butuh rute kembali.";
                alertBox.classList.remove('hidden');
                
                consoleBox.classList.remove('hidden');
                consoleText.className = "mt-2 text-[#ffbd2e]";
                consoleText.innerHTML = `Jalur keluar dari Kampus: [${inputUserRaw}]<br>Peringatan: Terjadi Self-Loop!`;
                
            } else {
                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-red-50 text-red-800 border-red-300 text-center";
                alertBox.innerHTML = "❌ Logika Salah: Lokasi tersebut tidak ada dalam peta rute. Untuk mengubah jalan satu arah menjadi dua arah, masukkan nama lokasi asal sebelum Kampus.";
                alertBox.classList.remove('hidden');
                
                consoleBox.classList.remove('hidden');
                consoleText.className = "mt-2 text-[#ff5f56]";
                consoleText.innerHTML = `Jalur keluar dari Kampus: [${inputUserRaw}]<br>Error: Node tidak ditemukan dalam graf!`;
            }
        }

        window.kunciJawaban22 = function() {
            const el = document.getElementById('input22_1');
            if(el) {
                el.value = '"Pasar"';
                el.disabled = true;
                el.classList.remove('bg-[#3c3c3c]', 'text-[#ce9178]', 'border-slate-600');
                el.classList.add('bg-emerald-600', 'text-white', 'border-emerald-500', 'font-bold', 'cursor-not-allowed', 'shadow-inner');
            }

            const btnRun = document.getElementById('btnRun22');
            if(btnRun) {
                btnRun.innerHTML = '<i class="fa-solid fa-check"></i> Code Valid';
                btnRun.classList.replace('bg-green-600', 'bg-slate-600');
                btnRun.classList.replace('hover:bg-green-500', 'cursor-not-allowed');
                btnRun.disabled = true;
            }

            document.getElementById('feedback-edukatif-22').classList.remove('hidden');

            const btnNext = document.getElementById('btnNext22');
            if(btnNext) {
                btnNext.disabled = false;
                btnNext.classList.remove('opacity-50', 'cursor-not-allowed');
            }
        }
    </script>
</section>