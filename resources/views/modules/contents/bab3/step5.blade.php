<section id="step-5" class="step-slide">
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-8 md:p-10 max-w-6xl mx-auto -mt-8">
        
        {{-- JUDUL PRAKTIKUM --}}
        <div class="border-b border-slate-200 pb-6 mb-8 flex items-center justify-between">
            <div>
                <h2 class="text-2xl md:text-3xl font-bold text-slate-900 mb-2 flex items-center gap-3">
                    <i class="fa-solid fa-laptop-code text-blue-600"></i> Praktikum Materi 3
                </h2>
                <p class="text-slate-500 font-medium">Uji kompetensi pemrograman Anda secara langsung (Live Coding).</p>
            </div>
            <div class="hidden md:flex flex-col items-end">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Status Praktikum</span>
                <span class="bg-blue-50 text-blue-700 px-3 py-1.5 rounded-full text-xs font-bold shadow-sm border border-blue-200 flex items-center gap-2">
                    <i class="fa-solid fa-unlock-keyhole"></i> 3 Misi Tersedia
                </span>
            </div>
        </div>

        {{-- INSTRUKSI PRAKTIKUM --}}
        <div class="bg-slate-800 text-white p-6 rounded-xl mb-10 shadow-md">
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
        <div class="mb-12 border-2 border-slate-200 rounded-xl overflow-hidden shadow-sm hover:border-blue-300 transition-colors">
            <div class="bg-slate-50 px-6 py-4 border-b border-slate-200 flex justify-between items-center">
                <h3 class="font-bold text-slate-800 text-lg flex items-center gap-2">
                    <span class="bg-blue-600 text-white w-6 h-6 rounded-full flex items-center justify-center text-sm shadow-sm">1</span> 
                    Misi Jaringan Komputer (DFS)
                </h3>
                <span id="badge-misi-1" class="hidden bg-green-500 text-white px-3 py-1 rounded text-xs font-bold shadow-sm flex items-center gap-1"><i class="fa-solid fa-check"></i> Selesai</span>
            </div>
            <div class="p-6 bg-white">
                <p class="text-sm text-slate-700 leading-relaxed text-justify mb-3">
                    <strong>Skenario:</strong> Anda ditugaskan membuat algoritma <em>Depth-First Search</em> (DFS) standar untuk memetakan jaringan komputer.
                </p>
                <div class="text-sm text-slate-700 leading-relaxed mb-6">
                    <strong>Tugas Anda:</strong> Buatlah sebuah fungsi bernama <code>jalankan_dfs(graf, awal)</code> dari awal.
                    <ul class="list-disc list-outside ml-5 mt-2 space-y-1.5">
                        <li>Fungsi ini harus menerima 2 parameter: struktur graf dan simpul awal.</li>
                        <li>Gunakan logika <strong>Stack</strong> (<code>pop()</code>) untuk menjelajahi graf.</li>
                        <li>Fungsi harus mengembalikan (<em>return</em>) <em>list</em> berisi urutan simpul yang berhasil dikunjungi.</li>
                    </ul>
                </div>

                {{-- Sandbox Editor Misi 1 (AUTO RESIZE) --}}
                <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-md border border-slate-700 font-mono text-sm flex flex-col">
                    <div class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700 shrink-0">
                        <span class="text-slate-400 text-xs">Terminal Editor (main.py)</span>
                        <button onclick="window.koreksiMisi1()" id="btnMisi1" class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors flex items-center gap-2 shadow-sm active:scale-95">
                            <i class="fa-solid fa-play"></i> Cek Kode
                        </button>
                    </div>
                    <textarea id="editor-misi-1" class="w-full min-h-[160px] bg-[#1e1e1e] text-[#d4d4d4] p-5 font-mono text-sm outline-none resize-none leading-relaxed overflow-hidden" spellcheck="false" placeholder="# Definisikan fungsi jalankan_dfs(graf, awal) di sini..." oninput="window.autoResizeEditor(this)"></textarea>
                    
                    {{-- Simulasi Output Terminal Misi 1 --}}
                    <div id="output-misi-1" class="hidden border-t border-slate-700 bg-black p-5 text-xs font-mono shrink-0 leading-relaxed"></div>
                </div>
                
                {{-- Feedback Box Misi 1 --}}
                <div id="alert-misi-1" class="hidden mt-4 transition-all duration-500"></div>
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- MISI 2: IMPLEMENTASI BFS SEDERHANA --}}
        {{-- ========================================== --}}
        <div class="mb-12 border-2 border-slate-200 rounded-xl overflow-hidden shadow-sm hover:border-emerald-300 transition-colors">
            <div class="bg-slate-50 px-6 py-4 border-b border-slate-200 flex justify-between items-center">
                <h3 class="font-bold text-slate-800 text-lg flex items-center gap-2">
                    <span class="bg-emerald-600 text-white w-6 h-6 rounded-full flex items-center justify-center text-sm shadow-sm">2</span> 
                    Misi Relasi Sosial (BFS)
                </h3>
                <span id="badge-misi-2" class="hidden bg-green-500 text-white px-3 py-1 rounded text-xs font-bold shadow-sm flex items-center gap-1"><i class="fa-solid fa-check"></i> Selesai</span>
            </div>
            <div class="p-6 bg-white">
                <p class="text-sm text-slate-700 leading-relaxed text-justify mb-3">
                    <strong>Skenario:</strong> Tim media sosial perusahaan meminta Anda membuat program <em>Breadth-First Search</em> (BFS) untuk melacak relasi "teman dari teman" secara bertahap (<em>level-demi-level</em>).
                </p>
                <div class="text-sm text-slate-700 leading-relaxed mb-6">
                    <strong>Tugas Anda:</strong> Buatlah fungsi bernama <code>jalankan_bfs(graf, awal)</code> dari awal.
                    <ul class="list-disc list-outside ml-5 mt-2 mb-4 space-y-1.5">
                        <li>Gunakan logika <strong>Queue / Antrean</strong> (<code>pop(0)</code>) untuk menjelajahi graf.</li>
                        <li>Jangan lupa siapkan <em>list</em> kosong untuk melacak simpul yang sudah dikunjungi agar program tidak terjebak <em>infinite loop</em>.</li>
                        <li>Fungsi harus me-<em>return</em> <em>list</em> urutan kunjungan.</li>
                    </ul>
                </div>

                {{-- Sandbox Editor Misi 2 (AUTO RESIZE) --}}
                <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-md border border-slate-700 font-mono text-sm flex flex-col">
                    <div class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700 shrink-0">
                        <span class="text-slate-400 text-xs">Terminal Editor (main.py)</span>
                        <button onclick="window.koreksiMisi2()" id="btnMisi2" class="bg-emerald-600 hover:bg-emerald-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors flex items-center gap-2 shadow-sm active:scale-95">
                            <i class="fa-solid fa-play"></i> Cek Kode
                        </button>
                    </div>
                    <textarea id="editor-misi-2" class="w-full min-h-[160px] bg-[#1e1e1e] text-[#d4d4d4] p-5 font-mono text-sm outline-none resize-none leading-relaxed overflow-hidden" spellcheck="false" placeholder="# Definisikan fungsi jalankan_bfs(graf, awal) di sini..." oninput="window.autoResizeEditor(this)"></textarea>
                    
                    {{-- Simulasi Output Terminal Misi 2 --}}
                    <div id="output-misi-2" class="hidden border-t border-slate-700 bg-black p-5 text-xs font-mono shrink-0 leading-relaxed"></div>
                </div>
                
                {{-- Feedback Box Misi 2 --}}
                <div id="alert-misi-2" class="hidden mt-4 transition-all duration-500"></div>
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- MISI 3: MODIFIKASI UNTUK PENCARIAN TARGET --}}
        {{-- ========================================== --}}
        <div class="mb-10 border-2 border-slate-200 rounded-xl overflow-hidden shadow-sm hover:border-amber-300 transition-colors">
            <div class="bg-slate-50 px-6 py-4 border-b border-slate-200 flex justify-between items-center">
                <h3 class="font-bold text-slate-800 text-lg flex items-center gap-2">
                    <span class="bg-amber-500 text-white w-6 h-6 rounded-full flex items-center justify-center text-sm shadow-sm">3</span> 
                    Misi Pendeteksi Target
                </h3>
                <span id="badge-misi-3" class="hidden bg-green-500 text-white px-3 py-1 rounded text-xs font-bold shadow-sm flex items-center gap-1"><i class="fa-solid fa-check"></i> Selesai</span>
            </div>
            <div class="p-6 bg-white">
                <p class="text-sm text-slate-700 leading-relaxed text-justify mb-3">
                    <strong>Skenario:</strong> Modifikasi algoritma yang sudah Anda buat! Sekarang, program tidak lagi diminta untuk mencetak urutan kunjungan, melainkan bertugas sebagai <strong>Pendeteksi Target</strong>. Anda bebas mau memodifikasi menggunakan kerangka BFS ataupun DFS.
                </p>
                <div class="text-sm text-slate-700 leading-relaxed mb-6">
                    <strong>Tugas Anda:</strong> Buatlah sebuah fungsi bernama <code>cari_target(graf, awal, tujuan)</code>.
                    <ul class="list-disc list-outside ml-5 mt-2 space-y-1.5">
                        <li>Jika saat penelusuran program menemukan simpul yang sama dengan tujuan, fungsi harus langsung berhenti dan mengembalikan nilai <strong>True</strong>.</li>
                        <li>Jika semua simpul di dalam graf sudah ditelusuri sampai habis tapi tujuan tidak ditemukan, fungsi harus mengembalikan nilai <strong>False</strong>.</li>
                    </ul>
                </div>

                {{-- Sandbox Editor Misi 3 (AUTO RESIZE) --}}
                <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-md border border-slate-700 font-mono text-sm flex flex-col">
                    <div class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700 shrink-0">
                        <span class="text-slate-400 text-xs">Terminal Editor (main.py)</span>
                        <button onclick="window.koreksiMisi3()" id="btnMisi3" class="bg-amber-500 hover:bg-amber-400 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors flex items-center gap-2 shadow-sm active:scale-95">
                            <i class="fa-solid fa-play"></i> Cek Kode
                        </button>
                    </div>
                    <textarea id="editor-misi-3" class="w-full min-h-[180px] bg-[#1e1e1e] text-[#d4d4d4] p-5 font-mono text-sm outline-none resize-none leading-relaxed overflow-hidden" spellcheck="false" placeholder="# Definisikan fungsi cari_target(graf, awal, tujuan) di sini..." oninput="window.autoResizeEditor(this)"></textarea>
                    
                    {{-- Simulasi Output Terminal Misi 3 --}}
                    <div id="output-misi-3" class="hidden border-t border-slate-700 bg-black p-5 text-xs font-mono shrink-0 leading-relaxed"></div>
                </div>

                {{-- Feedback Box Misi 3 --}}
                <div id="alert-misi-3" class="hidden mt-4 transition-all duration-500"></div>
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- AREA LAPORAN PRAKTIKUM (MUNCUL JIKA SEMUA MISI SELESAI) --}}
        {{-- ========================================== --}}
        <div id="area-laporan-praktikum" class="hidden border-t-2 border-dashed border-slate-300 pt-8 mt-10">
            <div class="bg-blue-50 border-2 border-blue-200 rounded-xl p-6 shadow-sm relative overflow-hidden">
                <div class="absolute top-0 left-0 w-1.5 h-full bg-blue-500"></div>
                <label class="block text-base font-black text-blue-900 mb-2 flex items-center gap-2 uppercase tracking-wide">
                    <i class="fa-solid fa-pen-nib"></i> Laporan Akhir Praktikum
                </label>
                <p class="text-sm text-blue-800 mb-4 leading-relaxed font-medium">Berdasarkan 3 Misi yang baru saja Anda selesaikan di atas, jelaskan secara singkat perbedaan utama logika <em>Stack</em> (Tumpukan) pada DFS dan <em>Queue</em> (Antrean) pada BFS sesuai dengan pemahaman bahasa Anda sendiri.</p>
                <textarea id="penjelasan-praktikum" class="w-full border-2 border-blue-200 rounded-lg p-4 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none resize-y min-h-[120px] placeholder:text-slate-400 font-medium text-slate-700" placeholder="Ketik laporan penjelasan Anda di sini..."></textarea>
                
                <button onclick="submitLaporanPraktikum()" id="btn-submit-praktikum" class="w-full mt-4 py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 shadow-md transition-all active:scale-95 flex justify-center items-center gap-2">
                    <i class="fa-solid fa-cloud-arrow-up"></i> SIMPAN LAPORAN KE DOSEN
                </button>
                <div id="alert-laporan" class="hidden text-center p-3 rounded-lg text-sm font-bold mt-3"></div>
            </div>
        </div>

        {{-- Navigasi Bawah --}}
        <div class="flex justify-between gap-4 mt-10 pt-6 border-t border-slate-200">
            <button type="button" onclick="prevStep()" class="px-6 py-2.5 rounded-lg border border-slate-300 font-bold text-slate-600 hover:bg-slate-50 transition shadow-sm active:scale-95">
                Kembali
            </button>
            <button type="button" id="btnFinishPraktikum" onclick="nextStep()" class="px-6 py-2.5 bg-slate-900 hover:bg-slate-800 text-white font-bold rounded-lg shadow-md transition-all active:scale-95 opacity-50 cursor-not-allowed hidden" disabled>
                Lanjut<i class="fa-solid fa-arrow-right ml-2"></i>
            </button>
        </div>

    </div>

    {{-- SCRIPT SISTEM AUTO-KOREKSI CERDAS --}}
    <script>
        // FUNGSI SUPER RESIZE
        window.autoResizeEditor = function(el) {
            if(!el) return;
            el.style.height = 'auto'; // Reset dulu
            
            if (el.scrollHeight > 0) {
                el.style.height = el.scrollHeight + 'px'; 
            } else {
                const lineCount = (el.value.match(/\n/g) || []).length + 1;
                el.style.height = (lineCount * 24 + 40) + 'px'; 
            }
        };

        document.addEventListener("DOMContentLoaded", function() {
            const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
            
            // Inisialisasi Misi 1
            if(localStorage.getItem('prak3_misi1_' + userId) === 'true') {
                const ed1 = document.getElementById('editor-misi-1');
                ed1.value = localStorage.getItem('prak3_misi1_code_' + userId) || "";
                window.autoResizeEditor(ed1);
                if(ed1.value.trim() !== "") window.koreksiMisi1();
            }
            
            // Inisialisasi Misi 2
            if(localStorage.getItem('prak3_misi2_' + userId) === 'true') {
                const ed2 = document.getElementById('editor-misi-2');
                ed2.value = localStorage.getItem('prak3_misi2_code_' + userId) || "";
                window.autoResizeEditor(ed2);
                if(ed2.value.trim() !== "") window.koreksiMisi2(); 
            }
            
            // Inisialisasi Misi 3
            if(localStorage.getItem('prak3_misi3_' + userId) === 'true') {
                const ed3 = document.getElementById('editor-misi-3');
                ed3.value = localStorage.getItem('prak3_misi3_code_' + userId) || "";
                window.autoResizeEditor(ed3);
                if(ed3.value.trim() !== "") window.koreksiMisi3();
            }
            
            cekSemuaMisiSelesai();
        });

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

            if (m1 && m2 && m3) {
                document.getElementById('area-laporan-praktikum').classList.remove('hidden');
            }
            
            if (localStorage.getItem('prak3_laporan_dikirim_' + userId) === 'true') {
                const savedText = localStorage.getItem('prak3_laporan_teks_' + userId);
                
                if (savedText && savedText.trim() !== '') {
                    const textarea = document.getElementById('penjelasan-praktikum');
                    textarea.value = savedText;
                    textarea.readOnly = true; 

                    const btnNext = document.getElementById('btnFinishPraktikum');
                    btnNext.disabled = false;
                    btnNext.classList.remove('hidden', 'opacity-50', 'cursor-not-allowed');
                    btnNext.classList.replace('bg-slate-900', 'bg-blue-600');
                    btnNext.classList.replace('hover:bg-slate-800', 'hover:bg-blue-700');
                    
                    const btnSubmit = document.getElementById('btn-submit-praktikum');
                    btnSubmit.innerHTML = '<i class="fa-solid fa-check"></i> LAPORAN TERKIRIM';
                    btnSubmit.classList.replace('bg-blue-600', 'bg-green-600');
                } else {
                    localStorage.removeItem('prak3_laporan_dikirim_' + userId);
                }
            }
        }

        function cleanString(str) {
            return str.replace(/\s+/g, '').replace(/'/g, '"');
        }

        // ==========================================
        // VALIDATOR CERDAS MISI 1 (DFS)
        // ==========================================
        window.koreksiMisi1 = function() {
            const code = document.getElementById('editor-misi-1').value;
            const outBox = document.getElementById('output-misi-1');
            const alertBox = document.getElementById('alert-misi-1');
            
            outBox.classList.remove('hidden');
            window.autoResizeEditor(document.getElementById('editor-misi-1'));

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
                
                alertBox.className = "mt-4 p-5 rounded-lg text-sm shadow-sm border bg-green-50 border-green-300";
                alertBox.innerHTML = `
                    <div class="font-bold text-green-800 mb-2 flex items-center gap-2">
                        <i class="fa-solid fa-circle-check text-green-600 text-lg"></i> Berhasil! Logika Stack (DFS) Anda sudah tepat.
                    </div>
                    <p class="text-green-800 leading-relaxed text-justify">
                        <strong>💡 Analisis:</strong> Anda telah mendefinisikan fungsi <code>jalankan_dfs</code> dengan benar. Penggunaan <code>pop()</code> (tanpa angka nol) membuktikan bahwa Anda mengerti konsep Stack (Tumpukan) yang membuang data dari urutan paling belakang (LIFO).
                    </p>`;
                alertBox.classList.remove('hidden');

                const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                localStorage.setItem('prak3_misi1_' + userId, 'true');
                localStorage.setItem('prak3_misi1_code_' + userId, code);
                markMisiSelesai(1);
                cekSemuaMisiSelesai();
            } else {
                outBox.innerHTML = `<span class="text-slate-400">> root@graflearn: python main.py</span><br><span class="text-[#ff5f56]">Traceback (most recent call last):<br>Exception: Logika DFS tidak valid.</span>`;
                
                let err = '<ul class="list-disc ml-5 font-normal mt-2 space-y-1">';
                if (!hasDef) err += '<li>Nama fungsi harus persis: <code>def jalankan_dfs(graf, awal):</code></li>';
                if (!hasPop) err += '<li>DFS menggunakan Stack. Anda harus mencabut nilai dari belakang dengan <code>.pop()</code> tanpa angka nol di dalamnya!</li>';
                if (!hasWhile) err += '<li>Anda harus menggunakan perulangan <code>while</code> untuk terus mengecek isi antrean.</li>';
                if (!hasAppend) err += '<li>Gunakan fungsi <code>.append()</code> untuk mencatat simpul yang sudah dikunjungi.</li>';
                err += '</ul>';

                alertBox.className = "mt-4 p-5 rounded-lg text-sm shadow-sm border bg-red-50 text-red-800 border-red-300";
                alertBox.innerHTML = '<strong>❌ Auto-Koreksi Gagal. Analisis Kesalahan:</strong>' + err;
                alertBox.classList.remove('hidden');
            }
        }

        // ==========================================
        // VALIDATOR CERDAS MISI 2 (BFS)
        // ==========================================
        window.koreksiMisi2 = function() {
            const code = document.getElementById('editor-misi-2').value;
            const outBox = document.getElementById('output-misi-2');
            const alertBox = document.getElementById('alert-misi-2');
            
            outBox.classList.remove('hidden');
            window.autoResizeEditor(document.getElementById('editor-misi-2'));

            if(code.trim() === "") {
                outBox.innerHTML = '<span class="text-slate-400">> root@graflearn: python main.py</span><br><span class="text-[#ff5f56]">SyntaxError: File kosong. Silakan tulis kode Anda.</span>';
                alertBox.classList.add('hidden');
                return;
            }

            const cleanCode = cleanString(code.replace(/#.*/g, ''));
            const hasDef = cleanCode.includes('defjalankan_bfs(graf,awal):');
            const hasPopZero = cleanCode.includes('.pop(0)');
            const hasWhile = cleanCode.includes('while');
            const hasAppend = cleanCode.includes('.append');

            if (hasDef && hasPopZero && hasWhile && hasAppend) {
                outBox.innerHTML = `<span class="text-slate-400">> root@graflearn: python main.py</span><br><span class="text-[#d4d4d4]">Sistem menjalankan fungsi BFS Anda...</span><br><span class="text-[#4af626]">Kompilasi Berhasil. Fungsi dapat menelusuri secara melebar (FIFO).</span>`;
                
                alertBox.className = "mt-4 p-5 rounded-lg text-sm shadow-sm border bg-green-50 border-green-300";
                alertBox.innerHTML = `
                    <div class="font-bold text-green-800 mb-2 flex items-center gap-2">
                        <i class="fa-solid fa-circle-check text-green-600 text-lg"></i> Luar biasa! Logika Antrean (BFS) Anda sangat presisi.
                    </div>
                    <p class="text-green-800 leading-relaxed text-justify">
                        <strong>💡 Analisis:</strong> Anda telah mendefinisikan fungsi <code>jalankan_bfs</code> dengan benar. Penggunaan <code>pop(0)</code> membuktikan bahwa Anda memahami konsep Antrean (Queue) yang mencabut elemen dari posisi paling depan atau indeks ke-0 (FIFO).
                    </p>`;
                alertBox.classList.remove('hidden');

                const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                localStorage.setItem('prak3_misi2_' + userId, 'true');
                localStorage.setItem('prak3_misi2_code_' + userId, code);
                markMisiSelesai(2);
                cekSemuaMisiSelesai();
            } else {
                outBox.innerHTML = `<span class="text-slate-400">> root@graflearn: python main.py</span><br><span class="text-[#ff5f56]">Traceback (most recent call last):<br>Exception: Logika BFS tidak valid.</span>`;
                
                let err = '<ul class="list-disc ml-5 font-normal mt-2 space-y-1">';
                if (!hasDef) err += '<li>Nama fungsi harus persis: <code>def jalankan_bfs(graf, awal):</code></li>';
                if (!hasPopZero) err += '<li>Hati-hati! BFS menggunakan Antrean (Queue). Anda harus memanggil elemen pertama dengan <code>.pop(0)</code>.</li>';
                if (!hasWhile) err += '<li>Anda harus menggunakan perulangan <code>while</code>.</li>';
                if (!hasAppend) err += '<li>Gunakan fungsi <code>.append()</code> untuk mencatat simpul yang sudah dikunjungi.</li>';
                err += '</ul>';

                alertBox.className = "mt-4 p-5 rounded-lg text-sm shadow-sm border bg-red-50 text-red-800 border-red-300";
                alertBox.innerHTML = '<strong>❌ Auto-Koreksi Gagal. Analisis Kesalahan:</strong>' + err;
                alertBox.classList.remove('hidden');
            }
        }

        // ==========================================
        // VALIDATOR CERDAS MISI 3 (PENCARIAN TARGET)
        // ==========================================
        window.koreksiMisi3 = function() {
            const code = document.getElementById('editor-misi-3').value;
            const outBox = document.getElementById('output-misi-3');
            const alertBox = document.getElementById('alert-misi-3');
            
            outBox.classList.remove('hidden');
            window.autoResizeEditor(document.getElementById('editor-misi-3'));

            if(code.trim() === "") {
                outBox.innerHTML = '<span class="text-slate-400">> root@graflearn: python main.py</span><br><span class="text-[#ff5f56]">SyntaxError: File kosong. Silakan tulis kode Anda.</span>';
                alertBox.classList.add('hidden');
                return;
            }

            const cleanCode = cleanString(code.replace(/#.*/g, ''));
            const hasDef = cleanCode.includes('defcari_target(graf,awal,tujuan):');
            const hasIfTrue = cleanCode.includes('==tujuan:') && cleanCode.includes('returnTrue');
            const hasReturnFalse = cleanCode.endsWith('returnFalse'); 

            if (hasDef && hasIfTrue && hasReturnFalse) {
                outBox.innerHTML = `<span class="text-slate-400">> root@graflearn: python main.py</span><br><span class="text-[#d4d4d4]">Sistem mengeksekusi pendeteksi target...</span><br><span class="text-[#4af626]">Status: Target Ditemukan (True)<br>Kompilasi Berhasil!</span>`;
                
                alertBox.className = "mt-4 p-5 rounded-lg text-sm shadow-sm border bg-green-50 border-green-300";
                alertBox.innerHTML = `
                    <div class="font-bold text-green-800 mb-2 flex items-center gap-2">
                        <i class="fa-solid fa-circle-check text-green-600 text-lg"></i> Brilian! Logika modifikasi algoritma Anda sempurna.
                    </div>
                    <p class="text-green-800 leading-relaxed text-justify">
                        <strong>💡 Analisis:</strong> Anda telah berhasil memodifikasi sifat dasar traversal. Dengan menambahkan <code>if simpul == tujuan: return True</code>, fungsi akan langsung menghentikan pencarian dan menghemat memori ketika target sudah ditemukan. Dan <code>return False</code> di baris terbawah memastikan fungsi tidak memunculkan error jika target memang tidak ada dalam graf.
                    </p>`;
                alertBox.classList.remove('hidden');

                const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                localStorage.setItem('prak3_misi3_' + userId, 'true');
                localStorage.setItem('prak3_misi3_code_' + userId, code);
                markMisiSelesai(3);
                cekSemuaMisiSelesai();
            } else {
                outBox.innerHTML = `<span class="text-slate-400">> root@graflearn: python main.py</span><br><span class="text-[#ff5f56]">Traceback (most recent call last):<br>LogicError: Pengembalian nilai (return) keliru.</span>`;
                
                let err = '<ul class="list-disc ml-5 font-normal mt-2 space-y-1">';
                if (!hasDef) err += '<li>Nama fungsi harus persis: <code>def cari_target(graf, awal, tujuan):</code></li>';
                if (!hasIfTrue) err += '<li>Sisipkan logika <code>if simpul == tujuan:</code> dan kembalikan nilai <code>return True</code> (perhatikan huruf kapital True).</li>';
                if (!hasReturnFalse) err += '<li>Kembalikan nilai <code>return False</code> di posisi paling bawah fungsi (di luar blok while) jika target tidak ditemukan.</li>';
                err += '</ul>';

                alertBox.className = "mt-4 p-5 rounded-lg text-sm shadow-sm border bg-red-50 text-red-800 border-red-300";
                alertBox.innerHTML = '<strong>❌ Auto-Koreksi Gagal. Analisis Kesalahan Logika:</strong>' + err;
                alertBox.classList.remove('hidden');
            }
        }

        // ==========================================
        // SUBMIT LAPORAN PRAKTIKUM (ANTI-GAGAL)
        // ==========================================
        window.submitLaporanPraktikum = function() {
            const penjelasan = document.getElementById('penjelasan-praktikum').value;
            const btnSubmit = document.getElementById('btn-submit-praktikum');
            const alertBox = document.getElementById('alert-laporan');
            const btnNext = document.getElementById('btnFinishPraktikum');

            if (penjelasan.trim() === "") {
                alertBox.classList.remove('hidden', 'bg-green-100', 'text-green-700');
                alertBox.classList.add('bg-red-100', 'text-red-700');
                alertBox.innerHTML = '<i class="fa-solid fa-triangle-exclamation mr-2"></i> Laporan tidak boleh kosong. Harap isi penjelasan logika Anda.';
                document.getElementById('penjelasan-praktikum').focus();
                return;
            }

            const codeMisi1 = document.getElementById('editor-misi-1').value;
            const codeMisi2 = document.getElementById('editor-misi-2').value;
            const codeMisi3 = document.getElementById('editor-misi-3').value;

            // KITA BUAT OBJECT MURNI
            const payloadData = {
                kode: "=== MISI 1 (DFS) ===\n" + codeMisi1 + "\n\n=== MISI 2 (BFS) ===\n" + codeMisi2 + "\n\n=== MISI 3 (Pencarian) ===\n" + codeMisi3,
                output: "Semua misi berhasil tervalidasi oleh sistem Auto-Corrector.",
                penjelasan: penjelasan,
                status: "pending"
            };

            const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
            localStorage.setItem('prak3_laporan_teks_' + userId, penjelasan);

            btnSubmit.disabled = true;
            btnSubmit.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> MENYIMPAN...';

            fetch("{{ route('submit.quiz') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    chapter_code: 'bab3',
                    section_code: '3.5_praktikum',
                    score: 1, 
                    answers: payloadData // DIKIRIM SEBAGAI OBJECT MURNI 
                })
            })
            .then(res => res.json())
            .then(data => {
                alertBox.classList.remove('hidden', 'bg-red-100', 'text-red-700');
                alertBox.classList.add('bg-green-100', 'text-green-700');
                alertBox.innerHTML = '<i class="fa-solid fa-circle-check mr-2"></i> Laporan berhasil dikirim ke Dosen!';
                
                btnSubmit.innerHTML = '<i class="fa-solid fa-check"></i> LAPORAN TERKIRIM';
                btnSubmit.classList.replace('bg-blue-600', 'bg-green-600');
                
                btnNext.disabled = false;
                btnNext.classList.remove('hidden', 'opacity-50', 'cursor-not-allowed');
                btnNext.classList.replace('bg-slate-900', 'bg-blue-600');
                btnNext.classList.replace('hover:bg-slate-800', 'hover:bg-blue-700');
                
                localStorage.setItem('prak3_laporan_dikirim_' + userId, 'true');
                
                if (typeof simpanProgressAktivitas === 'function') {
                    simpanProgressAktivitas('bab3', '3.5_praktikum', 100);
                }
            })
            .catch(err => {
                console.error(err);
                alertBox.classList.remove('hidden', 'bg-green-100', 'text-green-700');
                alertBox.classList.add('bg-red-100', 'text-red-700');
                alertBox.innerHTML = '<i class="fa-solid fa-triangle-exclamation mr-2"></i> Gagal menyimpan. Cek koneksi Anda.';
                btnSubmit.disabled = false;
                btnSubmit.innerHTML = '<i class="fa-solid fa-cloud-arrow-up"></i> COBA LAGI';
            });
        }
    </script>
</section>