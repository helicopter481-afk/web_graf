<section id="step-5" class="step-slide">
    {{-- Import Vis.js untuk visualisasi graf (Opsi 2) --}}
    <script type="text/javascript" src="https://unpkg.com/vis-network/standalone/umd/vis-network.min.js"></script>

    <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm p-8 md:p-10 max-w-6xl mx-auto -mt-8 transition-colors">
        
        {{-- JUDUL PRAKTIKUM --}}
        <div class="border-b border-slate-200 dark:border-slate-700 pb-6 mb-8 flex items-center justify-between transition-colors">
            <div>
                <h2 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white mb-2 flex items-center gap-3">
                    <i class="fa-solid fa-laptop-code text-blue-600 dark:text-blue-500"></i> Praktikum Materi 3
                </h2>
                <p class="text-slate-500 dark:text-slate-400 font-medium">Uji kompetensi pemrograman Anda secara langsung (Live Coding).</p>
            </div>
            <div class="hidden md:flex flex-col items-end">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Status Praktikum</span>
                <span class="bg-blue-50 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 px-3 py-1.5 rounded-full text-xs font-bold shadow-sm border border-blue-200 dark:border-blue-800 flex items-center gap-2">
                    <i class="fa-solid fa-unlock-keyhole"></i> 3 Misi Tersedia
                </span>
            </div>
        </div>

        {{-- INSTRUKSI PRAKTIKUM --}}
        <div class="bg-slate-800 dark:bg-slate-950 border border-slate-700 dark:border-slate-800 text-white p-6 rounded-xl mb-10 shadow-md transition-colors">
            <h4 class="font-bold text-yellow-400 mb-2 flex items-center gap-2">
                <i class="fa-solid fa-circle-info"></i> Instruksi Praktikum:
            </h4>
            <p class="leading-relaxed text-sm md:text-base text-slate-200 text-justify">
                Waktunya membuktikan insting <em>programmer</em> Anda! Pada praktikum ini, Anda dihadapkan pada kanvas editor kosong. Anda harus mengetikkan fungsi algoritma penelusuran dari awal (<em>from scratch</em>) berdasarkan spesifikasi yang diminta. Sistem akan memvalidasi *output* dari algoritma Anda!
            </p>
        </div>

        {{-- ========================================== --}}
        {{-- MISI 1: IMPLEMENTASI DFS SEDERHANA --}}
        {{-- ========================================== --}}
        <div class="mb-12 border-2 border-slate-200 dark:border-slate-700 rounded-xl overflow-hidden shadow-sm hover:border-blue-300 dark:hover:border-blue-600 transition-colors">
            <div class="bg-slate-50 dark:bg-slate-800/50 px-6 py-4 border-b border-slate-200 dark:border-slate-700 flex justify-between items-center transition-colors">
                <h3 class="font-bold text-slate-800 dark:text-slate-200 text-lg flex items-center gap-2">
                    <span class="bg-blue-600 text-white w-6 h-6 rounded-full flex items-center justify-center text-sm shadow-sm">1</span> 
                    Misi Jaringan Komputer (DFS)
                </h3>
                <span id="badge-misi-1" class="hidden bg-green-500 text-white px-3 py-1 rounded text-xs font-bold shadow-sm flex items-center gap-1"><i class="fa-solid fa-check"></i> Selesai</span>
            </div>
            <div class="p-6 bg-white dark:bg-slate-900 transition-colors">
                
                <div class="grid md:grid-cols-12 gap-8 mb-6 items-center">
                    <div class="md:col-span-7 flex flex-col justify-center">
                        <p class="text-sm text-slate-700 dark:text-slate-300 leading-relaxed text-justify mb-3">
                            <strong>Skenario:</strong> Anda ditugaskan membuat algoritma <em>Depth-First Search</em> (DFS) standar untuk memetakan jaringan komputer.
                        </p>
                        <div class="text-sm text-slate-700 dark:text-slate-300 leading-relaxed mb-2">
                            <strong>Tugas Anda:</strong> Buatlah sebuah fungsi bernama <code>jalankan_dfs(graf, awal)</code> dari awal.
                            <ul class="list-disc list-outside ml-5 mt-2 space-y-1.5">
                                <li>Fungsi ini harus menerima 2 parameter: struktur graf dan simpul awal.</li>
                                <li>Gunakan logika <strong>Stack</strong> (<code>pop()</code>) untuk menjelajahi graf.</li>
                                <li>Fungsi harus mengembalikan (<em>return</em>) <em>list</em> berisi urutan simpul yang berhasil dikunjungi.</li>
                            </ul>
                        </div>
                    </div>
                    
                    {{-- ILUSTRASI VISUAL MISI 1 (OPSI GANDA) --}}
                    
                    <div class="md:col-span-5 flex items-center justify-center">
                        <img src="{{ asset('images/gambarprak31.png') }}" alt="Ilustrasi DFS" class="w-full max-w-sm rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 object-contain bg-slate-50 dark:bg-slate-800">
                    </div>
                </div>

                {{-- Sandbox Editor Misi 1 DENGAN DYNAMIC LINE NUMBERS --}}
                <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-md border border-slate-700 font-mono text-sm flex flex-col">
                    <div class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700 shrink-0 z-10">
                        <span class="text-slate-400 text-xs">Terminal Editor (main.py)</span>
                        <button onclick="window.koreksiMisi1()" id="btnMisi1" class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors flex items-center gap-2 shadow-sm active:scale-95">
                            <i class="fa-solid fa-play"></i> Cek Kode
                        </button>
                    </div>
                    
                    <div class="flex font-mono text-[12px] md:text-sm text-[#d4d4d4] bg-[#1e1e1e] relative min-h-[160px] leading-[1.625]">
                        <div id="line-numbers-misi1" class="text-[#858585] text-right select-none py-5 pl-4 pr-4 border-r border-[#404040] bg-[#1e1e1e] shrink-0 z-10 leading-[1.625]">
                            <div>1</div>
                        </div>
                        <textarea id="editor-misi-1" class="w-full bg-transparent text-[#d4d4d4] outline-none resize-none py-5 pl-4 pr-6 whitespace-pre overflow-x-auto z-0 leading-[1.625]" spellcheck="false" placeholder="# Definisikan fungsi jalankan_dfs(graf, awal) di sini..." oninput="window.syncLineNumbersMisi1()"></textarea>
                    </div>
                    
                    {{-- Simulasi Output Terminal Misi 1 --}}
                    <div id="output-misi-1" class="hidden border-t border-slate-700 bg-black p-5 text-xs font-mono shrink-0 leading-relaxed"></div>
                </div>
                
                {{-- Feedback Box Misi 1 --}}
                <div id="alert-misi-1" class="hidden mt-4 transition-all duration-500 text-left"></div>
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- MISI 2: IMPLEMENTASI BFS SEDERHANA --}}
        {{-- ========================================== --}}
        <div class="mb-12 border-2 border-slate-200 dark:border-slate-700 rounded-xl overflow-hidden shadow-sm hover:border-emerald-300 dark:hover:border-emerald-600 transition-colors">
            <div class="bg-slate-50 dark:bg-slate-800/50 px-6 py-4 border-b border-slate-200 dark:border-slate-700 flex justify-between items-center transition-colors">
                <h3 class="font-bold text-slate-800 dark:text-slate-200 text-lg flex items-center gap-2">
                    <span class="bg-emerald-600 text-white w-6 h-6 rounded-full flex items-center justify-center text-sm shadow-sm">2</span> 
                    Misi Relasi Sosial (BFS)
                </h3>
                <span id="badge-misi-2" class="hidden bg-green-500 text-white px-3 py-1 rounded text-xs font-bold shadow-sm flex items-center gap-1"><i class="fa-solid fa-check"></i> Selesai</span>
            </div>
            <div class="p-6 bg-white dark:bg-slate-900 transition-colors">
                
                <div class="grid md:grid-cols-12 gap-8 mb-6 items-center">
                    <div class="md:col-span-7 flex flex-col justify-center">
                        <p class="text-sm text-slate-700 dark:text-slate-300 leading-relaxed text-justify mb-3">
                            <strong>Skenario:</strong> Tim media sosial perusahaan meminta Anda membuat program <em>Breadth-First Search</em> (BFS) untuk melacak relasi "teman dari teman" secara bertahap (<em>level-demi-level</em>).
                        </p>
                        <div class="text-sm text-slate-700 dark:text-slate-300 leading-relaxed mb-2">
                            <strong>Tugas Anda:</strong> Buatlah fungsi bernama <code>jalankan_bfs(graf, awal)</code> dari awal.
                            <ul class="list-disc list-outside ml-5 mt-2 mb-4 space-y-1.5">
                                <li>Gunakan logika <strong>Queue / Antrean</strong> (<code>pop(0)</code>) untuk menjelajahi graf.</li>
                                <li>Jangan lupa siapkan <em>list</em> kosong untuk melacak simpul yang sudah dikunjungi agar program tidak terjebak <em>infinite loop</em>.</li>
                                <li>Fungsi harus me-<em>return</em> <em>list</em> urutan kunjungan.</li>
                            </ul>
                        </div>
                    </div>
                    
                    {{-- ILUSTRASI VISUAL MISI 2 (OPSI GANDA) --}}
                    
                    
                    <div class="md:col-span-5 flex items-center justify-center">
                        <img src="{{ asset('images/gambarprak32.png') }}" alt="Ilustrasi DFS" class="w-full max-w-sm rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 object-contain bg-slate-50 dark:bg-slate-800">
                    </div>
                </div>

                {{-- Sandbox Editor Misi 2 DENGAN DYNAMIC LINE NUMBERS --}}
                <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-md border border-slate-700 font-mono text-sm flex flex-col">
                    <div class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700 shrink-0 z-10">
                        <span class="text-slate-400 text-xs">Terminal Editor (main.py)</span>
                        <button onclick="window.koreksiMisi2()" id="btnMisi2" class="bg-emerald-600 hover:bg-emerald-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors flex items-center gap-2 shadow-sm active:scale-95">
                            <i class="fa-solid fa-play"></i> Cek Kode
                        </button>
                    </div>
                    
                    <div class="flex font-mono text-[12px] md:text-sm text-[#d4d4d4] bg-[#1e1e1e] relative min-h-[160px] leading-[1.625]">
                        <div id="line-numbers-misi2" class="text-[#858585] text-right select-none py-5 pl-4 pr-4 border-r border-[#404040] bg-[#1e1e1e] shrink-0 z-10 leading-[1.625]">
                            <div>1</div>
                        </div>
                        <textarea id="editor-misi-2" class="w-full bg-transparent text-[#d4d4d4] outline-none resize-none py-5 pl-4 pr-6 whitespace-pre overflow-x-auto z-0 leading-[1.625]" spellcheck="false" placeholder="# Definisikan fungsi jalankan_bfs(graf, awal) di sini..." oninput="window.syncLineNumbersMisi2()"></textarea>
                    </div>
                    
                    {{-- Simulasi Output Terminal Misi 2 --}}
                    <div id="output-misi-2" class="hidden border-t border-slate-700 bg-black p-5 text-xs font-mono shrink-0 leading-relaxed"></div>
                </div>
                
                {{-- Feedback Box Misi 2 --}}
                <div id="alert-misi-2" class="hidden mt-4 transition-all duration-500 text-left"></div>
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- MISI 3: MODIFIKASI UNTUK PENCARIAN TARGET --}}
        {{-- ========================================== --}}
        <div class="mb-10 border-2 border-slate-200 dark:border-slate-700 rounded-xl overflow-hidden shadow-sm hover:border-amber-300 dark:hover:border-amber-600 transition-colors">
            <div class="bg-slate-50 dark:bg-slate-800/50 px-6 py-4 border-b border-slate-200 dark:border-slate-700 flex justify-between items-center transition-colors">
                <h3 class="font-bold text-slate-800 dark:text-slate-200 text-lg flex items-center gap-2">
                    <span class="bg-amber-500 text-white w-6 h-6 rounded-full flex items-center justify-center text-sm shadow-sm">3</span> 
                    Misi Pendeteksi Target
                </h3>
                <span id="badge-misi-3" class="hidden bg-green-500 text-white px-3 py-1 rounded text-xs font-bold shadow-sm flex items-center gap-1"><i class="fa-solid fa-check"></i> Selesai</span>
            </div>
            <div class="p-6 bg-white dark:bg-slate-900 transition-colors">
                
                <div class="grid md:grid-cols-12 gap-8 mb-6 items-center">
                    <div class="md:col-span-7 flex flex-col justify-center">
                        <p class="text-sm text-slate-700 dark:text-slate-300 leading-relaxed text-justify mb-3">
                            <strong>Skenario:</strong> Modifikasi algoritma yang sudah Anda buat! Sekarang, program tidak lagi diminta untuk mencetak urutan kunjungan, melainkan bertugas sebagai <strong>Pendeteksi Target</strong>. Anda bebas mau memodifikasi menggunakan kerangka BFS ataupun DFS.
                        </p>
                        <div class="text-sm text-slate-700 dark:text-slate-300 leading-relaxed mb-2">
                            <strong>Tugas Anda:</strong> Buatlah sebuah fungsi bernama <code>cari_target(graf, awal, tujuan)</code>.
                            <ul class="list-disc list-outside ml-5 mt-2 space-y-1.5">
                                <li>Jika saat penelusuran program menemukan simpul yang sama dengan tujuan, fungsi harus langsung berhenti dan mengembalikan nilai <strong>True</strong>.</li>
                                <li>Jika semua simpul di dalam graf sudah ditelusuri sampai habis tapi tujuan tidak ditemukan, fungsi harus mengembalikan nilai <strong>False</strong>.</li>
                            </ul>
                        </div>
                    </div>
                    
                    {{-- ILUSTRASI VISUAL MISI 3 (OPSI GANDA) --}}
                    
                    
                    <div class="md:col-span-5 flex items-center justify-center">
                        <img src="{{ asset('images/gambarprak33.png') }}" alt="Ilustrasi DFS" class="w-full max-w-sm rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 object-contain bg-slate-50 dark:bg-slate-800">
                    </div>
                </div>

                {{-- Sandbox Editor Misi 3 DENGAN DYNAMIC LINE NUMBERS --}}
                <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-md border border-slate-700 font-mono text-sm flex flex-col">
                    <div class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700 shrink-0 z-10">
                        <span class="text-slate-400 text-xs">Terminal Editor (main.py)</span>
                        <button onclick="window.koreksiMisi3()" id="btnMisi3" class="bg-amber-500 hover:bg-amber-400 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors flex items-center gap-2 shadow-sm active:scale-95">
                            <i class="fa-solid fa-play"></i> Cek Kode
                        </button>
                    </div>
                    
                    <div class="flex font-mono text-[12px] md:text-sm text-[#d4d4d4] bg-[#1e1e1e] relative min-h-[180px] leading-[1.625]">
                        <div id="line-numbers-misi3" class="text-[#858585] text-right select-none py-5 pl-4 pr-4 border-r border-[#404040] bg-[#1e1e1e] shrink-0 z-10 leading-[1.625]">
                            <div>1</div>
                        </div>
                        <textarea id="editor-misi-3" class="w-full bg-transparent text-[#d4d4d4] outline-none resize-none py-5 pl-4 pr-6 whitespace-pre overflow-x-auto z-0 leading-[1.625]" spellcheck="false" placeholder="# Definisikan fungsi cari_target(graf, awal, tujuan) di sini..." oninput="window.syncLineNumbersMisi3()"></textarea>
                    </div>
                    
                    {{-- Simulasi Output Terminal Misi 3 --}}
                    <div id="output-misi-3" class="hidden border-t border-slate-700 bg-black p-5 text-xs font-mono shrink-0 leading-relaxed"></div>
                </div>

                {{-- Feedback Box Misi 3 --}}
                <div id="alert-misi-3" class="hidden mt-4 transition-all duration-500 text-left"></div>
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- AREA LAPORAN PRAKTIKUM (MUNCUL JIKA SEMUA MISI SELESAI) --}}
        {{-- ========================================== --}}
        <div id="area-laporan-praktikum" class="hidden border-t-2 border-dashed border-slate-300 dark:border-slate-700 pt-8 mt-10 transition-colors">
            <div class="bg-blue-50 dark:bg-blue-900/20 border-2 border-blue-200 dark:border-blue-800 rounded-xl p-6 shadow-sm relative overflow-hidden transition-colors">
                <div class="absolute top-0 left-0 w-1.5 h-full bg-blue-500"></div>
                <label class="block text-base font-black text-blue-900 dark:text-blue-300 mb-2 flex items-center gap-2 uppercase tracking-wide">
                    <i class="fa-solid fa-pen-nib"></i> Laporan Akhir Praktikum
                </label>
                <p class="text-sm text-blue-800 dark:text-blue-200 mb-4 leading-relaxed font-medium">Berdasarkan 3 Misi yang baru saja Anda selesaikan di atas, jelaskan secara singkat perbedaan utama logika <em>Stack</em> (Tumpukan) pada DFS dan <em>Queue</em> (Antrean) pada BFS sesuai dengan pemahaman bahasa Anda sendiri.</p>
                <textarea id="penjelasan-praktikum" class="w-full border-2 border-blue-200 dark:border-blue-700 dark:bg-slate-800 dark:text-slate-200 rounded-lg p-4 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none resize-y min-h-[120px] placeholder:text-slate-400 dark:placeholder:text-slate-500 font-medium text-slate-700 transition-colors" placeholder="Ketik laporan penjelasan Anda di sini..."></textarea>
                
                <button onclick="submitLaporanPraktikum()" id="btn-submit-praktikum" class="w-full mt-4 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg shadow-md transition-all active:scale-95 flex justify-center items-center gap-2">
                    <i class="fa-solid fa-cloud-arrow-up"></i> SIMPAN LAPORAN KE DOSEN
                </button>
                <div id="alert-laporan" class="hidden text-center p-3 rounded-lg text-sm font-bold mt-3 transition-colors"></div>
            </div>
        </div>

        {{-- Navigasi Bawah --}}
        <div class="flex justify-between gap-4 mt-10 pt-6 border-t border-slate-200 dark:border-slate-700 transition-colors">
            <button type="button" onclick="prevStep()" class="px-6 py-2.5 rounded-lg border border-slate-300 dark:border-slate-700 font-bold text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 transition shadow-sm active:scale-95">
                Kembali
            </button>
            <button type="button" id="btnFinishPraktikum" onclick="nextStep()" class="px-6 py-2.5 bg-slate-900 dark:bg-slate-700 hover:bg-slate-800 dark:hover:bg-slate-600 text-white font-bold rounded-lg shadow-md transition-all active:scale-95 opacity-50 cursor-not-allowed hidden" disabled>
                Lanjut<i class="fa-solid fa-arrow-right ml-2"></i>
            </button>
        </div>

    </div>

    {{-- ================================================= --}}
    {{-- SCRIPT SISTEM AUTO-KOREKSI & VISUALISASI JAVASCRIPT --}}
    {{-- ================================================= --}}
    <script>
        // --- INISIALISASI EDITOR & LINE NUMBERS (M1, M2, M3) ---
        window.syncLineNumbersMisi1 = function() {
            const editor = document.getElementById('editor-misi-1');
            const lineNumEl = document.getElementById('line-numbers-misi1');
            if(!editor || !lineNumEl) return;
            editor.style.height = 'auto'; 
            if (editor.scrollHeight > 0) editor.style.height = editor.scrollHeight + 'px'; 
            else editor.style.height = '160px'; 
            lineNumEl.style.height = editor.style.height;
            const lines = editor.value.split('\n').length;
            let numHtml = '';
            for (let i = 1; i <= lines; i++) numHtml += `<div>${i}</div>`;
            lineNumEl.innerHTML = numHtml;
        }

        window.syncLineNumbersMisi2 = function() {
            const editor = document.getElementById('editor-misi-2');
            const lineNumEl = document.getElementById('line-numbers-misi2');
            if(!editor || !lineNumEl) return;
            editor.style.height = 'auto'; 
            if (editor.scrollHeight > 0) editor.style.height = editor.scrollHeight + 'px'; 
            else editor.style.height = '160px'; 
            lineNumEl.style.height = editor.style.height;
            const lines = editor.value.split('\n').length;
            let numHtml = '';
            for (let i = 1; i <= lines; i++) numHtml += `<div>${i}</div>`;
            lineNumEl.innerHTML = numHtml;
        }

        window.syncLineNumbersMisi3 = function() {
            const editor = document.getElementById('editor-misi-3');
            const lineNumEl = document.getElementById('line-numbers-misi3');
            if(!editor || !lineNumEl) return;
            editor.style.height = 'auto'; 
            if (editor.scrollHeight > 0) editor.style.height = editor.scrollHeight + 'px'; 
            else editor.style.height = '180px'; 
            lineNumEl.style.height = editor.style.height;
            const lines = editor.value.split('\n').length;
            let numHtml = '';
            for (let i = 1; i <= lines; i++) numHtml += `<div>${i}</div>`;
            lineNumEl.innerHTML = numHtml;
        }

        // --- SISTEM PEMUATAN & PENYIMPANAN PROGRESS ---
        document.addEventListener("DOMContentLoaded", function() {
            const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
            
            if(localStorage.getItem('prak3_misi1_' + userId) === 'true') {
                const ed1 = document.getElementById('editor-misi-1');
                ed1.value = localStorage.getItem('prak3_misi1_code_' + userId) || "";
                setTimeout(window.syncLineNumbersMisi1, 100);
                if(ed1.value.trim() !== "") window.koreksiMisi1();
            } else { setTimeout(window.syncLineNumbersMisi1, 100); }
            
            if(localStorage.getItem('prak3_misi2_' + userId) === 'true') {
                const ed2 = document.getElementById('editor-misi-2');
                ed2.value = localStorage.getItem('prak3_misi2_code_' + userId) || "";
                setTimeout(window.syncLineNumbersMisi2, 100);
                if(ed2.value.trim() !== "") window.koreksiMisi2(); 
            } else { setTimeout(window.syncLineNumbersMisi2, 100); }
            
            if(localStorage.getItem('prak3_misi3_' + userId) === 'true') {
                const ed3 = document.getElementById('editor-misi-3');
                ed3.value = localStorage.getItem('prak3_misi3_code_' + userId) || "";
                setTimeout(window.syncLineNumbersMisi3, 100);
                if(ed3.value.trim() !== "") window.koreksiMisi3();
            } else { setTimeout(window.syncLineNumbersMisi3, 100); }
            
            cekSemuaMisiSelesai();
            initVisualizations();
        });

        // --- FUNGSIONALITAS MISI & AUTO-KOREKSI ---
        function markMisiSelesai(misiId) {
            document.getElementById('badge-misi-' + misiId).classList.remove('hidden');
            const btn = document.getElementById('btnMisi' + misiId);
            btn.innerHTML = '<i class="fa-solid fa-check-double"></i> Code Valid';
            btn.className = `bg-green-600 hover:bg-green-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors flex items-center gap-2 shadow-sm active:scale-95`;
        }

        function cekSemuaMisiSelesai() {
            const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
            const m1 = localStorage.getItem('prak3_misi1_' + userId) === 'true';
            const m2 = localStorage.getItem('prak3_misi2_' + userId) === 'true';
            const m3 = localStorage.getItem('prak3_misi3_' + userId) === 'true';
            if (m1 && m2 && m3) document.getElementById('area-laporan-praktikum').classList.remove('hidden');
            
            if (localStorage.getItem('prak3_laporan_dikirim_' + userId) === 'true') {
                const savedText = localStorage.getItem('prak3_laporan_teks_' + userId);
                if (savedText && savedText.trim() !== '') {
                    const textarea = document.getElementById('penjelasan-praktikum');
                    textarea.value = savedText;
                    textarea.readOnly = true; 
                    textarea.classList.add('bg-slate-100', 'dark:bg-slate-900', 'cursor-not-allowed');
                    const btnNext = document.getElementById('btnFinishPraktikum');
                    btnNext.disabled = false;
                    btnNext.classList.remove('hidden', 'opacity-50', 'cursor-not-allowed');
                    btnNext.classList.replace('bg-slate-900', 'bg-blue-600');
                    btnNext.classList.replace('hover:bg-slate-800', 'hover:bg-blue-700');
                    const btnSubmit = document.getElementById('btn-submit-praktikum');
                    btnSubmit.innerHTML = '<i class="fa-solid fa-check"></i> LAPORAN TERKIRIM';
                    btnSubmit.classList.replace('bg-blue-600', 'bg-green-600');
                } else localStorage.removeItem('prak3_laporan_dikirim_' + userId);
            }
        }

        function cleanString(str) { return str.replace(/\s+/g, '').replace(/'/g, '"'); }

        // --- VALIDATOR KODE MISI 1 (DFS) ---
        window.koreksiMisi1 = function() {
            const code = document.getElementById('editor-misi-1').value;
            const outBox = document.getElementById('output-misi-1');
            const alertBox = document.getElementById('alert-misi-1');
            outBox.classList.remove('hidden');
            window.syncLineNumbersMisi1();
            if(code.trim() === "") {
                outBox.innerHTML = '<span class="text-slate-400">> root@graflearn: python main.py</span><br><span class="text-[#ff5f56]">SyntaxError: File kosong. Silakan tulis kode Anda.</span>';
                alertBox.classList.add('hidden');
                return;
            }
            const cleanCode = cleanString(code.replace(/#.*/g, ''));
            const hasDef = cleanCode.includes('defjalankan_dfs(graf,awal):');
            const hasPop = cleanCode.includes('.pop()') && !cleanCode.includes('.pop(0)');
            const hasWhile = cleanCode.includes('while');
            const hasAppend = cleanCode.includes('.append');
            if (hasDef && hasPop && hasWhile && hasAppend) {
                outBox.innerHTML = `<span class="text-slate-400">> root@graflearn: python main.py</span><br><span class="text-[#d4d4d4]">Sistem menjalankan fungsi DFS Anda...</span><br><span class="text-[#4af626]">Kompilasi Berhasil. Fungsi dapat menelusuri secara mendalam (LIFO).</span>`;
                alertBox.className = "mt-4 p-5 rounded-lg text-sm shadow-sm border bg-green-50 dark:bg-green-900/30 border-green-300 dark:border-green-800 text-left transition-colors";
                alertBox.innerHTML = `<div class="font-bold text-green-800 dark:text-green-400 mb-2 flex items-center gap-2"><i class="fa-solid fa-circle-check text-green-600 dark:text-green-500 text-lg"></i> Berhasil! Logika Stack (DFS) Anda sudah tepat.</div><p class="text-green-800 dark:text-green-200 leading-relaxed text-justify">💡 Analisis: Penggunaan <code>pop()</code> membuktikan bahwa Anda mengerti konsep Stack (LIFO).</p>`;
                alertBox.classList.remove('hidden');
                const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                localStorage.setItem('prak3_misi1_' + userId, 'true');
                localStorage.setItem('prak3_misi1_code_' + userId, code);
                markMisiSelesai(1); cekSemuaMisiSelesai();
            } else {
                outBox.innerHTML = `<span class="text-slate-400">> root@graflearn: python main.py</span><br><span class="text-[#ff5f56]">Traceback (most recent call last):<br>Exception: Logika DFS tidak valid.</span>`;
                let err = '<ul class="list-disc ml-5 font-normal mt-2 space-y-1 text-red-800 dark:text-red-200">';
                if (!hasDef) err += '<li>Nama fungsi harus persis: <code>def jalankan_dfs(graf, awal):</code></li>';
                if (!hasPop) err += '<li>DFS menggunakan Stack (Tumpukan). Anda harus mencabut nilai dari belakang dengan <code>.pop()</code> tanpa angka nol!</li>';
                if (!hasWhile) err += '<li>Gunakan perulangan <code>while</code> untuk terus mengecek isi Stack.</li>';
                if (!hasAppend) err += '<li>Gunakan fungsi <code>.append()</code> untuk mencatat simpul dikunjungi.</li>';
                err += '</ul>';
                alertBox.className = "mt-4 p-5 rounded-lg text-sm shadow-sm border bg-red-50 dark:bg-red-900/30 text-red-800 dark:text-red-200 border-red-300 dark:border-red-800 text-left transition-colors";
                alertBox.innerHTML = '<strong class="text-red-800 dark:text-red-400">❌ Auto-Koreksi Gagal. Analisis Kesalahan:</strong>' + err;
                alertBox.classList.remove('hidden');
            }
        }

        // --- VALIDATOR KODE MISI 2 (BFS) ---
        window.koreksiMisi2 = function() {
            const code = document.getElementById('editor-misi-2').value;
            const outBox = document.getElementById('output-misi-2');
            const alertBox = document.getElementById('alert-misi-2');
            outBox.classList.remove('hidden');
            window.syncLineNumbersMisi2();
            if(code.trim() === "") {
                outBox.innerHTML = '<span class="text-slate-400">> root@graflearn: python main.py</span><br><span class="text-[#ff5f56]">SyntaxError: File kosong. Silakan tulis kode Anda.</span>';
                alertBox.classList.add('hidden'); return;
            }
            const cleanCode = cleanString(code.replace(/#.*/g, ''));
            const hasDef = cleanCode.includes('defjalankan_bfs(graf,awal):');
            const hasPopZero = cleanCode.includes('.pop(0)');
            const hasWhile = cleanCode.includes('while');
            const hasAppend = cleanCode.includes('.append');
            if (hasDef && hasPopZero && hasWhile && hasAppend) {
                outBox.innerHTML = `<span class="text-slate-400">> root@graflearn: python main.py</span><br><span class="text-[#d4d4d4]">Sistem menjalankan fungsi BFS Anda...</span><br><span class="text-[#4af626]">Kompilasi Berhasil. Fungsi dapat menelusuri secara melebar (FIFO).</span>`;
                alertBox.className = "mt-4 p-5 rounded-lg text-sm shadow-sm border bg-green-50 dark:bg-green-900/30 border-green-300 dark:border-green-800 text-left transition-colors";
                alertBox.innerHTML = `<div class="font-bold text-green-800 dark:text-green-400 mb-2 flex items-center gap-2"><i class="fa-solid fa-circle-check text-green-600 dark:text-green-500 text-lg"></i> Luar biasa! Logika Antrean (BFS) Anda sangat presisi.</div><p class="text-green-800 dark:text-green-200 leading-relaxed text-justify">💡 Analisis: Penggunaan <code>pop(0)</code> membuktikan Anda memahami konsep Antrean (Queue FIFO).</p>`;
                alertBox.classList.remove('hidden');
                const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                localStorage.setItem('prak3_misi2_' + userId, 'true');
                localStorage.setItem('prak3_misi2_code_' + userId, code);
                markMisiSelesai(2); cekSemuaMisiSelesai();
            } else {
                outBox.innerHTML = `<span class="text-slate-400">> root@graflearn: python main.py</span><br><span class="text-[#ff5f56]">Traceback (most recent call last):<br>Exception: Logika BFS tidak valid.</span>`;
                let err = '<ul class="list-disc ml-5 font-normal mt-2 space-y-1 text-red-800 dark:text-red-200">';
                if (!hasDef) err += '<li>Nama fungsi harus persis: <code>def jalankan_bfs(graf, awal):</code></li>';
                if (!hasPopZero) err += '<li>Hati-hati! BFS menggunakan Antrean (Queue). Anda harus memanggil elemen pertama dengan <code>.pop(0)</code>.</li>';
                if (!hasWhile) err += '<li>Anda harus menggunakan perulangan <code>while</code>.</li>';
                if (!hasAppend) err += '<li>Gunakan fungsi <code>.append()</code> untuk mencatat simpul dikunjungi.</li>';
                err += '</ul>';
                alertBox.className = "mt-4 p-5 rounded-lg text-sm shadow-sm border bg-red-50 dark:bg-red-900/30 text-red-800 dark:text-red-200 border-red-300 dark:border-red-800 text-left transition-colors";
                alertBox.innerHTML = '<strong class="text-red-800 dark:text-red-400">❌ Auto-Koreksi Gagal. Analisis Kesalahan:</strong>' + err;
                alertBox.classList.remove('hidden');
            }
        }

        // --- VALIDATOR KODE MISI 3 (SEARCH TARGET) ---
        window.koreksiMisi3 = function() {
            const code = document.getElementById('editor-misi-3').value;
            const outBox = document.getElementById('output-misi-3');
            const alertBox = document.getElementById('alert-misi-3');
            outBox.classList.remove('hidden');
            window.syncLineNumbersMisi3();
            if(code.trim() === "") {
                outBox.innerHTML = '<span class="text-slate-400">> root@graflearn: python main.py</span><br><span class="text-[#ff5f56]">SyntaxError: File kosong. Silakan tulis kode Anda.</span>';
                alertBox.classList.add('hidden'); return;
            }
            const cleanCode = cleanString(code.replace(/#.*/g, ''));
            const hasDef = cleanCode.includes('defcari_target(graf,awal,tujuan):');
            const hasIfTrue = cleanCode.includes('==tujuan:') && (cleanCode.includes('returnTrue') || cleanCode.includes('return"True"'));
            const hasReturnFalse = cleanCode.endsWith('returnFalse') || cleanCode.endsWith('return"False"'); 
            if (hasDef && hasIfTrue && hasReturnFalse) {
                outBox.innerHTML = `<span class="text-slate-400">> root@graflearn: python main.py</span><br><span class="text-[#d4d4d4]">Sistem mengeksekusi pendeteksi target...</span><br><span class="text-[#4af626]">Status: Target Ditemukan (True)<br>Kompilasi Berhasil!</span>`;
                alertBox.className = "mt-4 p-5 rounded-lg text-sm shadow-sm border bg-green-50 dark:bg-green-900/30 border-green-300 dark:border-green-800 text-left transition-colors";
                alertBox.innerHTML = `<div class="font-bold text-green-800 dark:text-green-400 mb-2 flex items-center gap-2"><i class="fa-solid fa-circle-check text-green-600 dark:text-green-500 text-lg"></i> Brilian! Logika modifikasi algoritma Anda sempurna.</div><p class="text-green-800 dark:text-green-200 leading-relaxed text-justify">💡 Analisis: Anda berhasil menambahkan logika <code>if simpul == tujuan: return True</code> untuk langsung menghentikan pencarian jika target ditemukan.</p>`;
                alertBox.classList.remove('hidden');
                const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                localStorage.setItem('prak3_misi3_' + userId, 'true');
                localStorage.setItem('prak3_misi3_code_' + userId, code);
                markMisiSelesai(3); cekSemuaMisiSelesai();
            } else {
                outBox.innerHTML = `<span class="text-slate-400">> root@graflearn: python main.py</span><br><span class="text-[#ff5f56]">Traceback (most recent call last):<br>LogicError: Pengembalian nilai (return) keliru.</span>`;
                let err = '<ul class="list-disc ml-5 font-normal mt-2 space-y-1 text-red-800 dark:text-red-200">';
                if (!hasDef) err += '<li>Nama fungsi harus persis: <code>def cari_target(graf, awal, tujuan):</code></li>';
                if (!hasIfTrue) err += '<li>Sisipkan logika <code>if simpul == tujuan:</code> dan kembalikan nilai <code>return True</code>.</li>';
                if (!hasReturnFalse) err += '<li>Kembalikan nilai <code>return False</code> di posisi paling bawah fungsi jika target tidak ditemukan.</li>';
                err += '</ul>';
                alertBox.className = "mt-4 p-5 rounded-lg text-sm shadow-sm border bg-red-50 dark:bg-red-900/30 text-red-800 dark:text-red-200 border-red-300 dark:border-red-800 text-left transition-colors";
                alertBox.innerHTML = '<strong class="text-red-800 dark:text-red-400">❌ Auto-Koreksi Gagal. Analisis Kesalahan Logika:</strong>' + err;
                alertBox.classList.remove('hidden');
            }
        }

        // --- SUBMIT LAPORAN PRAKTIKUM ---
        window.submitLaporanPraktikum = function() {
            const penjelasan = document.getElementById('penjelasan-praktikum').value;
            const btnSubmit = document.getElementById('btn-submit-praktikum');
            const alertBox = document.getElementById('alert-laporan');
            const btnNext = document.getElementById('btnFinishPraktikum');
            if (penjelasan.trim() === "") {
                alertBox.classList.remove('hidden', 'bg-green-100', 'dark:bg-green-900/40', 'text-green-700', 'dark:text-green-300');
                alertBox.classList.add('bg-red-100', 'dark:bg-red-900/40', 'text-red-700', 'dark:text-red-300');
                alertBox.innerHTML = '<i class="fa-solid fa-triangle-exclamation mr-2"></i> Laporan tidak boleh kosong.';
                document.getElementById('penjelasan-praktikum').focus(); return;
            }
            const payloadData = {
                kode: "=== MISI 1 (DFS) ===\n" + document.getElementById('editor-misi-1').value + "\n\n=== MISI 2 (BFS) ===\n" + document.getElementById('editor-misi-2').value + "\n\n=== MISI 3 (Target) ===\n" + document.getElementById('editor-misi-3').value,
                output: "Semua misi berhasil tervalidasi oleh sistem.",
                penjelasan: penjelasan, status: "pending"
            };
            const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
            localStorage.setItem('prak3_laporan_teks_' + userId, penjelasan);
            btnSubmit.disabled = true; btnSubmit.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> MENYIMPAN...';
            fetch("{{ route('submit.quiz') }}", {
                method: "POST", headers: { "Content-Type": "application/json", "X-CSRF-TOKEN": "{{ csrf_token() }}" },
                body: JSON.stringify({ chapter_code: 'bab3', section_code: '3.5_praktikum', score: 1, answers: payloadData })
            })
            .then(res => res.json())
            .then(data => {
                alertBox.classList.remove('hidden', 'bg-red-100', 'dark:bg-red-900/40', 'text-red-700', 'dark:text-red-300');
                alertBox.classList.add('bg-green-100', 'dark:bg-green-900/40', 'text-green-700', 'dark:text-green-300');
                alertBox.innerHTML = '<i class="fa-solid fa-circle-check mr-2"></i> Laporan berhasil dikirim!';
                btnSubmit.innerHTML = '<i class="fa-solid fa-check"></i> LAPORAN TERKIRIM';
                btnSubmit.classList.replace('bg-blue-600', 'bg-green-600');
                btnNext.disabled = false; btnNext.classList.remove('hidden', 'opacity-50', 'cursor-not-allowed');
                btnNext.classList.replace('bg-slate-900', 'bg-blue-600');
                localStorage.setItem('prak3_laporan_dikirim_' + userId, 'true');
                if (typeof simpanProgressAktivitas === 'function') simpanProgressAktivitas('bab3', '3.5_praktikum', 100);
            })
            .catch(err => {
                console.error(err);
                alertBox.classList.remove('hidden', 'bg-green-100', 'dark:bg-green-900/40', 'text-green-700', 'dark:text-green-300');
                alertBox.classList.add('bg-red-100', 'dark:bg-red-900/40', 'text-red-700', 'dark:text-red-300');
                alertBox.innerHTML = '<i class="fa-solid fa-triangle-exclamation mr-2"></i> Gagal menyimpan.';
                btnSubmit.disabled = false; btnSubmit.innerHTML = '<i class="fa-solid fa-cloud-arrow-up"></i> COBA LAGI';
            });
        }

        // ================================================= --}}
        // KONFIGURASI VISUALISASI GRAF (VIS.JS) - AMAN DARK MODE
        // ================================================= --}}
        function initVisualizations() {
            // Gaya Simpul & Garis Standar (Aman di Light/Dark mode)
            // Vis.js akan membaca variabel ini jika div nya TIDAK HIDDEN
            
            const commonNodes = {
                shape: 'dot', size: 20, font: { size: 14, color: '#475569', bold: true },
                color: { background: '#dbeafe', border: '#3b82f6', highlight: { background: '#eff6ff', border: '#2563eb' } }, 
                borderWidth: 2
            };
            const commonEdges = {
                width: 2, color: { color: '#94a3b8', highlight: '#3b82f6', hover: '#94a3b8' },
                smooth: { type: 'continuous' }, arrows: { to: { enabled: true, scaleFactor: 0.5 } }
            };
            const options = { 
                nodes: commonNodes, 
                edges: commonEdges, 
                physics: { enabled: false }, 
                interaction: { zoomView: false, dragView: false } // KANVAS TERKUNCI MATI
            };

            // 1. Visualisasi DFS (Graf Jaringan Dalam/Lurus)
            const cDFS = document.getElementById('viz-dfs');
            if(cDFS && !cDFS.classList.contains('hidden')) {
                const nodesDFS = new vis.DataSet([
                    { id: 'S', label: 'Start (A)', x: 0, y: -100, color: { background: '#fef3c7', border: '#f59e0b'}, font: {color: '#92400e'} }, 
                    { id: 'B', label: 'B', x: -50, y: -20 }, { id: 'C', label: 'C', x: 50, y: -20 }, 
                    { id: 'D', label: 'D', x: -50, y: 60 }, { id: 'E', label: 'E', x: 0, y: 60 }, 
                    { id: 'F', label: 'F', x: 50, y: 60 }
                ]);
                const edgesDFS = new vis.DataSet([
                    { from: 'S', to: 'B' }, { from: 'B', to: 'D' }, { from: 'B', to: 'E' }, 
                    { from: 'S', to: 'C' }, { from: 'C', to: 'F' }
                ]);
                const net1 = new vis.Network(cDFS, { nodes: nodesDFS, edges: edgesDFS }, options);
                net1.once('afterDrawing', () => net1.fit({ animation: false }));
            }

            // 2. Visualisasi BFS (Graf Relasi Sosial Melebar)
            const cBFS = document.getElementById('viz-bfs');
            if(cBFS && !cBFS.classList.contains('hidden')) {
                const nodesBFS = new vis.DataSet([
                    { id: 'S', label: 'Anda', x: 0, y: -100, color: { background: '#d1fae5', border: '#10b981'}, font: {color: '#065f46'} }, 
                    { id: 'T1', label: 'Teman 1', x: -80, y: 0 }, { id: 'T2', label: 'Teman 2', x: 80, y: 0 },
                    { id: 'TT1', label: 'A', x: -120, y: 100 }, { id: 'TT2', label: 'B', x: -40, y: 100 }, { id: 'TT3', label: 'C', x: 80, y: 100 }
                ]);
                const edgesBFS = new vis.DataSet([
                    { from: 'S', to: 'T1' }, { from: 'S', to: 'T2' },
                    { from: 'T1', to: 'TT1' }, { from: 'T1', to: 'TT2' }, { from: 'T2', to: 'TT3' } 
                ]);
                const net2 = new vis.Network(cBFS, { nodes: nodesBFS, edges: edgesBFS }, options);
                net2.once('afterDrawing', () => net2.fit({ animation: false }));
            }

            // 3. Visualisasi Search Target (Graf dengan Titik Target)
            const cSearch = document.getElementById('viz-search');
            if(cSearch && !cSearch.classList.contains('hidden')) {
                const nodesSearch = new vis.DataSet([
                    { id: 'S', label: 'Awal', x: -150, y: 0, color: { background: '#dbeafe', border: '#3b82f6'}, font:{color: '#1e3a8a'} },
                    { id: '1', label: '1', x: -50, y: -60 }, { id: '2', label: '2', x: -50, y: 60 }, 
                    { id: '3', label: '3', x: 50, y: -60 }, { id: '4', label: '4', x: 50, y: 60 },
                    { id: 'T', label: 'TARGET', x: 150, y: 0, color: { background: '#fee2e2', border: '#ef4444'}, font: {color: '#b91c1c'} } 
                ]);
                const edgesSearch = new vis.DataSet([
                    { from: 'S', to: '1' }, { from: 'S', to: '2' }, { from: '1', to: '3' }, { from: '2', to: '4' }, { from: '4', to: 'T' },
                    { from: '1', to: 'T' } 
                ]);
                const net3 = new vis.Network(cSearch, { nodes: nodesSearch, edges: edgesSearch }, options);
                net3.once('afterDrawing', () => net3.fit({ animation: false }));
            }
        }
    </script>
</section>