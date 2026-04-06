<section id="step-6" class="step-slide">

    {{-- Import Vis.js untuk Misi 1 --}}
    <script type="text/javascript" src="https://unpkg.com/vis-network/standalone/umd/vis-network.min.js"></script>

    <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm p-8 md:p-10 max-w-6xl mx-auto -mt-8 transition-colors">

        {{-- JUDUL PRAKTIKUM --}}
        <div class="border-b border-slate-200 dark:border-slate-700 pb-6 mb-8 flex items-center justify-between transition-colors">
            <div>
                <h2 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white mb-2 flex items-center gap-3">
                    <i class="fa-solid fa-laptop-code text-blue-600 dark:text-blue-500"></i> Praktikum Materi 4
                </h2>
                <p class="text-slate-500 dark:text-slate-400 font-medium">Uji kompetensi pemrograman Anda secara langsung (Live Coding).</p>
            </div>
            <div class="hidden md:flex flex-col items-end">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Status Praktikum</span>
                <span class="bg-blue-50 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 px-3 py-1.5 rounded-full text-xs font-bold shadow-sm border border-blue-200 dark:border-blue-800 flex items-center gap-2 transition-colors">
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
                Saatnya merakit kepingan memori, <em>infinity</em>, dan logika <em>relaxation</em> menjadi satu kesatuan mesin Dijkstra! Anda dihadapkan pada kanvas editor kosong. Ketikkan kode Anda dari awal (<em>from scratch</em>) berdasarkan instruksi misi. Sistem otomatis akan memvalidasi algoritma Anda.
            </p>
        </div>

        {{-- ========================================== --}}
        {{-- MISI 1: NESTED DICTIONARY --}}
        {{-- ========================================== --}}
        <div class="mb-12 border-2 border-slate-200 dark:border-slate-700 rounded-xl overflow-hidden shadow-sm hover:border-blue-300 dark:hover:border-blue-600 transition-colors">
            <div class="bg-slate-50 dark:bg-slate-800/50 px-6 py-4 border-b border-slate-200 dark:border-slate-700 flex justify-between items-center transition-colors">
                <h3 class="font-bold text-slate-800 dark:text-slate-200 text-lg flex items-center gap-2">
                    <span class="bg-blue-600 text-white w-6 h-6 rounded-full flex items-center justify-center text-sm shadow-sm">1</span>
                    Misi 1: Fondasi Memori Peta
                </h3>
                <span id="badge-misi-1" class="hidden bg-green-500 text-white px-3 py-1 rounded text-xs font-bold shadow-sm flex items-center gap-1"><i class="fa-solid fa-check"></i> Selesai</span>
            </div>
            <div class="p-6 bg-white dark:bg-slate-900 transition-colors">
                
                <div class="grid md:grid-cols-12 gap-8 mb-6 items-center">
                    <div class="md:col-span-7 flex flex-col justify-center">
                        <p class="text-sm text-slate-700 dark:text-slate-300 leading-relaxed text-justify mb-3">
                            <strong>Skenario:</strong> Aplikasi navigasi Anda butuh memori graf untuk 3 kota: A, B, dan C. Jarak dari <strong>A ke B adalah 4 KM</strong>, dan jarak dari <strong>A ke C adalah 7 KM</strong>.
                        </p>
                        <div class="text-sm text-slate-700 dark:text-slate-300 leading-relaxed mb-2">
                            <strong>Tugas Anda:</strong> Buat sebuah variabel <code>peta_rute</code> bertipe <em>Nested Dictionary</em> untuk menyimpan data simpul "A" beserta kedua tetangga dan angka bobotnya.
                        </div>
                    </div>
                    
                    {{-- ILUSTRASI VISUAL MISI 1: GRAF VIS.JS --}}
                    <div class="md:col-span-5 flex items-center justify-center">
                        <img src="{{ asset('images/gambarprak41.png') }}" alt="Ilustrasi DFS" class="w-full max-w-sm rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 object-contain bg-slate-50 dark:bg-slate-800">
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
                    <div class="flex font-mono text-[12px] md:text-sm text-[#d4d4d4] bg-[#1e1e1e] relative min-h-[140px] leading-[1.625]">
                        <div id="line-numbers-misi1" class="text-[#858585] text-right select-none py-5 pl-4 pr-4 border-r border-[#404040] bg-[#1e1e1e] shrink-0 z-10 leading-[1.625]">
                            <div>1</div>
                        </div>
                        <textarea id="editor-misi-1" class="w-full bg-transparent text-[#d4d4d4] outline-none resize-none py-5 pl-4 pr-6 whitespace-pre overflow-x-auto z-0 leading-[1.625]" spellcheck="false" placeholder="# Definisikan peta_rute di sini..." oninput="window.syncLineNumbersMisi1()"></textarea>
                    </div>
                    
                    {{-- Simulasi Output Terminal Misi 1 --}}
                    <div id="output-misi-1" class="hidden border-t border-slate-700 bg-black p-5 text-xs font-mono shrink-0 leading-relaxed"></div>
                </div>

                {{-- Feedback Box Misi 1 --}}
                <div id="alert-misi-1" class="hidden mt-4 transition-all duration-500 text-left"></div>
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- MISI 2: LOGIKA INFINITY --}}
        {{-- ========================================== --}}
        <div class="mb-12 border-2 border-slate-200 dark:border-slate-700 rounded-xl overflow-hidden shadow-sm hover:border-amber-300 dark:hover:border-amber-600 transition-colors">
            <div class="bg-slate-50 dark:bg-slate-800/50 px-6 py-4 border-b border-slate-200 dark:border-slate-700 flex justify-between items-center transition-colors">
                <h3 class="font-bold text-slate-800 dark:text-slate-200 text-lg flex items-center gap-2">
                    <span class="bg-amber-500 text-white w-6 h-6 rounded-full flex items-center justify-center text-sm shadow-sm">2</span>
                    Misi 2: Mengatur Jarak Awal
                </h3>
                <span id="badge-misi-2" class="hidden bg-green-500 text-white px-3 py-1 rounded text-xs font-bold shadow-sm flex items-center gap-1"><i class="fa-solid fa-check"></i> Selesai</span>
            </div>
            <div class="p-6 bg-white dark:bg-slate-900 transition-colors">
                
                <div class="grid md:grid-cols-12 gap-8 mb-6 items-center">
                    <div class="md:col-span-7 flex flex-col justify-center">
                        <p class="text-sm text-slate-700 dark:text-slate-300 leading-relaxed text-justify mb-3">
                            <strong>Skenario:</strong> Algoritma akan segera berjalan. Titik awal Anda adalah "Start". Sebelum penelusuran dimulai, tabel memori wajib disiapkan dengan asumsi jarak belum terukur.
                        </p>
                        <div class="text-sm text-slate-700 dark:text-slate-300 leading-relaxed mb-2">
                            <strong>Tugas Anda:</strong> Buat sebuah variabel bernama <code>catatan_jarak</code> bertipe Dictionary.
                            <ul class="list-disc list-outside ml-5 mt-2 space-y-1.5">
                                <li>Beri jarak <strong>0</strong> untuk key "Start" (karena ini titik mula).</li>
                                <li>Beri jarak <strong>Tak Terhingga (Infinity)</strong> untuk key "Titik_X" dan "Titik_Y" menggunakan fungsi bawaan Python <code>float('inf')</code>.</li>
                            </ul>
                        </div>
                    </div>

                    {{-- ILUSTRASI VISUAL MISI 2: TABEL HTML --}}
                    <div class="md:col-span-5 flex items-center justify-center">
                        <img src="{{ asset('images/gambarprak42.png') }}" alt="Ilustrasi DFS" class="w-full max-w-sm rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 object-contain bg-slate-50 dark:bg-slate-800">
                    </div>
                </div>

                {{-- Sandbox Editor Misi 2 DENGAN DYNAMIC LINE NUMBERS --}}
                <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-md border border-slate-700 font-mono text-sm flex flex-col">
                    <div class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700 shrink-0 z-10">
                        <span class="text-slate-400 text-xs">Terminal Editor (main.py)</span>
                        <button onclick="window.koreksiMisi2()" id="btnMisi2" class="bg-amber-600 hover:bg-amber-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors flex items-center gap-2 shadow-sm active:scale-95">
                            <i class="fa-solid fa-play"></i> Cek Kode
                        </button>
                    </div>
                    <div class="flex font-mono text-[12px] md:text-sm text-[#d4d4d4] bg-[#1e1e1e] relative min-h-[140px] leading-[1.625]">
                        <div id="line-numbers-misi2" class="text-[#858585] text-right select-none py-5 pl-4 pr-4 border-r border-[#404040] bg-[#1e1e1e] shrink-0 z-10 leading-[1.625]">
                            <div>1</div>
                        </div>
                        <textarea id="editor-misi-2" class="w-full bg-transparent text-[#d4d4d4] outline-none resize-none py-5 pl-4 pr-6 whitespace-pre overflow-x-auto z-0 leading-[1.625]" spellcheck="false" placeholder="# Definisikan catatan_jarak di sini..." oninput="window.syncLineNumbersMisi2()"></textarea>
                    </div>

                    {{-- Simulasi Output Terminal Misi 2 --}}
                    <div id="output-misi-2" class="hidden border-t border-slate-700 bg-black p-5 text-xs font-mono shrink-0 leading-relaxed"></div>
                </div>

                {{-- Feedback Box Misi 2 --}}
                <div id="alert-misi-2" class="hidden mt-4 transition-all duration-500 text-left"></div>
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- MISI 3: PROSES RELAXATION --}}
        {{-- ========================================== --}}
        <div class="mb-10 border-2 border-slate-200 dark:border-slate-700 rounded-xl overflow-hidden shadow-sm hover:border-emerald-300 dark:hover:border-emerald-600 transition-colors">
            <div class="bg-slate-50 dark:bg-slate-800/50 px-6 py-4 border-b border-slate-200 dark:border-slate-700 flex justify-between items-center transition-colors">
                <h3 class="font-bold text-slate-800 dark:text-slate-200 text-lg flex items-center gap-2">
                    <span class="bg-emerald-600 text-white w-6 h-6 rounded-full flex items-center justify-center text-sm shadow-sm">3</span>
                    Misi 3: Logika Keputusan
                </h3>
                <span id="badge-misi-3" class="hidden bg-green-500 text-white px-3 py-1 rounded text-xs font-bold shadow-sm flex items-center gap-1"><i class="fa-solid fa-check"></i> Selesai</span>
            </div>
            <div class="p-6 bg-white dark:bg-slate-900 transition-colors">
                
                <div class="grid md:grid-cols-12 gap-8 mb-6 items-center">
                    <div class="md:col-span-7 flex flex-col justify-center">
                        <p class="text-sm text-slate-700 dark:text-slate-300 leading-relaxed text-justify mb-3">
                            <strong>Skenario:</strong> Di sinilah mesin mengambil keputusan! Anda sedang meninjau rute ke "Kota_Z". Di tabel lama, tercatat <code>jarak_lama = 20</code>. Anda baru saja menemukan rute alternatif, yaitu <code>jalur_alternatif = 12</code>.
                        </p>
                        <div class="text-sm text-slate-700 dark:text-slate-300 leading-relaxed mb-2">
                            <strong>Tugas Anda:</strong> Buat blok kondisi <code>if</code> di bawah variabel yang disediakan. Jika <code>jalur_alternatif</code> ternyata <strong>kurang dari</strong> <code>jarak_lama</code>, maka <strong>timpa (assign ulang)</strong> nilai variabel <code>jarak_lama</code> menjadi sama dengan <code>jalur_alternatif</code>!
                        </div>
                    </div>

                    {{-- ILUSTRASI VISUAL MISI 3: PSEUDOCODE HTML --}}
                    <div class="md:col-span-5 flex items-center justify-center">
                        <img src="{{ asset('images/gambarprak43.png') }}" alt="Ilustrasi DFS" class="w-full max-w-sm rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 object-contain bg-slate-50 dark:bg-slate-800">
                    </div>
                </div>

                {{-- Sandbox Editor Misi 3 DENGAN DYNAMIC LINE NUMBERS --}}
                <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-md border border-slate-700 font-mono text-sm flex flex-col">
                    <div class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700 shrink-0 z-10">
                        <span class="text-slate-400 text-xs">Terminal Editor (main.py)</span>
                        <button onclick="window.koreksiMisi3()" id="btnMisi3" class="bg-emerald-600 hover:bg-emerald-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors flex items-center gap-2 shadow-sm active:scale-95">
                            <i class="fa-solid fa-play"></i> Cek Kode
                        </button>
                    </div>
                    
                    <div class="flex font-mono text-[12px] md:text-sm text-[#d4d4d4] bg-[#1e1e1e] relative min-h-[160px] leading-[1.625]">
                        <div id="line-numbers-misi3" class="text-[#858585] text-right select-none py-5 pl-4 pr-4 border-r border-[#404040] bg-[#1e1e1e] shrink-0 z-10 leading-[1.625]">
                            <div>1</div>
                        </div>
                        <textarea id="editor-misi-3" class="w-full bg-transparent text-[#d4d4d4] outline-none resize-none py-5 pl-4 pr-6 whitespace-pre overflow-x-auto z-0 leading-[1.625]" spellcheck="false" oninput="window.syncLineNumbersMisi3()">jarak_lama = 20
jalur_alternatif = 12

# Buat blok logika if Anda di bawah ini:
</textarea>
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
                <p class="text-sm text-blue-800 dark:text-blue-200 mb-4 leading-relaxed font-medium">Berdasarkan 3 Misi yang baru saja Anda selesaikan di atas, jelaskan secara singkat alur dan logika dari masing-masing kode pembentuk algoritma Dijkstra yang telah Anda susun.</p>
                <textarea id="penjelasan-praktikum" class="w-full border-2 border-blue-200 dark:border-blue-700 dark:bg-slate-800 dark:text-slate-200 rounded-lg p-4 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none resize-y min-h-[120px] placeholder:text-slate-400 dark:placeholder:text-slate-500 font-medium text-slate-700 transition-colors" placeholder="Ketik laporan penjelasan Anda di sini..."></textarea>

                <button onclick="submitLaporanPraktikum()" id="btn-submit-praktikum" class="w-full mt-4 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg shadow-md transition-all active:scale-95 flex justify-center items-center gap-2">
                    <i class="fa-solid fa-cloud-arrow-up"></i> SIMPAN LAPORAN KE DOSEN
                </button>
                <div id="alert-laporan" class="hidden text-center p-3 rounded-lg text-sm font-bold mt-3 transition-colors"></div>
            </div>
        </div>

        {{-- Navigasi Bawah --}}
        <div class="flex justify-between gap-4 mt-12 pt-6 border-t border-slate-200 dark:border-slate-700 transition-colors">
            <button type="button" onclick="prevStep()" class="px-6 py-2.5 rounded-lg border border-slate-300 dark:border-slate-700 font-bold text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 transition shadow-sm active:scale-95">
                ← Kembali ke Rangkuman
            </button>
            <button type="button" id="btnFinishPraktikum" onclick="nextStep()" class="px-6 py-2.5 bg-slate-900 dark:bg-slate-700 hover:bg-slate-800 dark:hover:bg-slate-600 text-white font-bold rounded-lg shadow-md transition-all active:scale-95 opacity-50 cursor-not-allowed hidden" disabled>
                Lanjut Refleksi <i class="fa-solid fa-arrow-right ml-2"></i>
            </button>
        </div>

    </div>

    {{-- SCRIPT SISTEM AUTO-KOREKSI CERDAS --}}
    <script>
        // --- INISIALISASI EDITOR & LINE NUMBERS (M1, M2, M3) ---
        window.syncLineNumbersMisi1 = function() {
            const editor = document.getElementById('editor-misi-1');
            const lineNumEl = document.getElementById('line-numbers-misi1');
            if(!editor || !lineNumEl) return;
            editor.style.height = 'auto'; 
            if (editor.scrollHeight > 0) editor.style.height = editor.scrollHeight + 'px'; 
            else editor.style.height = '140px'; 
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
            else editor.style.height = '140px'; 
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
            else editor.style.height = '160px'; 
            lineNumEl.style.height = editor.style.height;
            const lines = editor.value.split('\n').length;
            let numHtml = '';
            for (let i = 1; i <= lines; i++) numHtml += `<div>${i}</div>`;
            lineNumEl.innerHTML = numHtml;
        }

        document.addEventListener("DOMContentLoaded", function() {
            const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";

            // Inisialisasi Misi 1
            if (localStorage.getItem('prak4_misi1_' + userId) === 'true') {
                const ed1 = document.getElementById('editor-misi-1');
                ed1.value = localStorage.getItem('prak4_misi1_code_' + userId) || "";
                setTimeout(window.syncLineNumbersMisi1, 100);
                if (ed1.value.trim() !== "") window.koreksiMisi1();
            } else { setTimeout(window.syncLineNumbersMisi1, 100); }

            // Inisialisasi Misi 2
            if (localStorage.getItem('prak4_misi2_' + userId) === 'true') {
                const ed2 = document.getElementById('editor-misi-2');
                ed2.value = localStorage.getItem('prak4_misi2_code_' + userId) || "";
                setTimeout(window.syncLineNumbersMisi2, 100);
                if (ed2.value.trim() !== "") window.koreksiMisi2();
            } else { setTimeout(window.syncLineNumbersMisi2, 100); }

            // Inisialisasi Misi 3
            if (localStorage.getItem('prak4_misi3_' + userId) === 'true') {
                const ed3 = document.getElementById('editor-misi-3');
                ed3.value = localStorage.getItem('prak4_misi3_code_' + userId) || "";
                setTimeout(window.syncLineNumbersMisi3, 100);
                if (ed3.value.trim() !== "") window.koreksiMisi3();
            } else { setTimeout(window.syncLineNumbersMisi3, 100); }

            cekSemuaMisiSelesai();
            initVisualizationsPrak4();
        });

        // FUNGSI MARK SELESAI
        function markMisiSelesai(misiId) {
            document.getElementById('badge-misi-' + misiId).classList.remove('hidden');
            const btn = document.getElementById('btnMisi' + misiId);

            btn.innerHTML = '<i class="fa-solid fa-check-double"></i> Code Valid';
            btn.className = `bg-green-600 hover:bg-green-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors flex items-center gap-2 shadow-sm active:scale-95`;
        }

        // FUNGSI CEK STATUS MISI SELESAI (DENGAN PENYIMPANAN TEKS)
        function cekSemuaMisiSelesai() {
            const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
            const m1 = localStorage.getItem('prak4_misi1_' + userId) === 'true';
            const m2 = localStorage.getItem('prak4_misi2_' + userId) === 'true';
            const m3 = localStorage.getItem('prak4_misi3_' + userId) === 'true';

            // Munculkan kotak laporan
            if (m1 && m2 && m3) {
                document.getElementById('area-laporan-praktikum').classList.remove('hidden');
            }

            // Cek apakah laporan sudah disubmit
            if (localStorage.getItem('prak4_laporan_dikirim_' + userId) === 'true') {
                const savedText = localStorage.getItem('prak4_laporan_teks_' + userId);

                // Cegah tombol hijau kalau isinya nyangkut kosong
                if (savedText && savedText.trim() !== '') {
                    const textarea = document.getElementById('penjelasan-praktikum');
                    textarea.value = savedText;
                    textarea.readOnly = true;
                    textarea.classList.add('bg-slate-100', 'dark:bg-slate-900', 'cursor-not-allowed');

                    const btnNext = document.getElementById('btnFinishPraktikum');
                    btnNext.disabled = false;
                    btnNext.classList.remove('hidden', 'opacity-50', 'cursor-not-allowed', 'bg-slate-900');
                    btnNext.classList.add('bg-blue-600', 'hover:bg-blue-700');
                    btnNext.classList.replace('dark:bg-slate-700', 'dark:bg-blue-600');
                    btnNext.classList.replace('dark:hover:bg-slate-600', 'dark:hover:bg-blue-700');

                    const btnSubmit = document.getElementById('btn-submit-praktikum');
                    btnSubmit.innerHTML = '<i class="fa-solid fa-check"></i> LAPORAN TERKIRIM';
                    btnSubmit.classList.replace('bg-blue-600', 'bg-green-600');
                    btnSubmit.classList.replace('hover:bg-blue-700', 'hover:bg-green-700');
                } else {
                    localStorage.removeItem('prak4_laporan_dikirim_' + userId);
                }
            }
        }

        function cleanString(str) {
            return str.replace(/\s+/g, '').replace(/'/g, '"');
        }

        // ==========================================
        // VALIDATOR CERDAS MISI 1 (NESTED DICT)
        // ==========================================
        window.koreksiMisi1 = function() {
            const code = document.getElementById('editor-misi-1').value;
            const outBox = document.getElementById('output-misi-1');
            const alertBox = document.getElementById('alert-misi-1');

            outBox.classList.remove('hidden');
            window.syncLineNumbersMisi1();

            if (code.trim() === "") {
                outBox.innerHTML =
                    '<span class="text-slate-400">&gt; root@dijkstra: python main.py</span><br><span class="text-[#ff5f56]">SyntaxError: File kosong. Silakan tulis kode Anda.</span>';
                alertBox.classList.add('hidden');
                return;
            }

            const cleanCode = cleanString(code.replace(/#.*/g, ''));
            const hasVar = cleanCode.includes('peta_rute=');
            const hasA = cleanCode.includes('"A":{');
            const hasB = cleanCode.includes('"B":4');
            const hasC = cleanCode.includes('"C":7');

            if (hasVar && hasA && hasB && hasC) {
                outBox.innerHTML =
                    `<span class="text-slate-400">&gt; root@dijkstra: python main.py</span><br><span class="text-[#d4d4d4]">Sistem menjalankan dictionary Anda...</span><br><span class="text-[#4af626]">Kompilasi Berhasil. Memori graf telah tersimpan.</span>`;

                alertBox.className = "mt-4 p-5 rounded-lg text-sm shadow-sm border bg-green-50 dark:bg-green-900/30 border-green-300 dark:border-green-800 text-left transition-colors";
                alertBox.innerHTML = `
                    <div class="font-bold text-green-800 dark:text-green-400 mb-2 flex items-center gap-2">
                        <i class="fa-solid fa-circle-check text-green-600 dark:text-green-500 text-lg"></i> Berhasil! Format Nested Dictionary Anda sudah tepat.
                    </div>
                    <p class="text-green-800 dark:text-green-200 leading-relaxed text-justify">
                        <strong>💡 Analisis:</strong> Anda telah membuat variabel <code>peta_rute</code> yang menyimpan kamus di dalam kamus. Ini memungkinkan komputer untuk mencari rute secara langsung dan cepat tanpa perlu membaca seluruh isi data satu per satu.
                    </p>`;
                alertBox.classList.remove('hidden');

                const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                localStorage.setItem('prak4_misi1_' + userId, 'true');
                localStorage.setItem('prak4_misi1_code_' + userId, code);
                markMisiSelesai(1);
                cekSemuaMisiSelesai();
            } else {
                outBox.innerHTML =
                    `<span class="text-slate-400">&gt; root@dijkstra: python main.py</span><br><span class="text-[#ff5f56]">Traceback (most recent call last):<br>KeyError: Struktur Data tidak valid.</span>`;

                let err = '<ul class="list-disc ml-5 font-normal mt-2 space-y-1 text-red-800 dark:text-red-200">';
                if (!hasVar) err += '<li>Pastikan nama variabelnya sama persis: <code>peta_rute = </code></li>';
                if (!hasA) err +=
                    '<li>Buat kunci utama <code>"A"</code> yang isinya adalah kamus kurung kurawal baru <code>{}</code></li>';
                if (!hasB || !hasC) err +=
                    '<li>Pastikan di dalam simpul "A" memuat <code>"B": 4</code> dan <code>"C": 7</code>.</li>';
                err += '</ul>';

                alertBox.className =
                    "mt-4 p-5 rounded-lg text-sm shadow-sm border bg-red-50 dark:bg-red-900/30 text-red-800 dark:text-red-200 border-red-300 dark:border-red-800 text-left transition-colors";
                alertBox.innerHTML = '<strong class="text-red-800 dark:text-red-400">❌ Auto-Koreksi Gagal. Analisis Kesalahan:</strong>' + err;
                alertBox.classList.remove('hidden');
            }
        }

        // ==========================================
        // VALIDATOR CERDAS MISI 2 (INFINITY)
        // ==========================================
        window.koreksiMisi2 = function() {
            const code = document.getElementById('editor-misi-2').value;
            const outBox = document.getElementById('output-misi-2');
            const alertBox = document.getElementById('alert-misi-2');

            outBox.classList.remove('hidden');
            window.syncLineNumbersMisi2();

            if (code.trim() === "") {
                outBox.innerHTML =
                    '<span class="text-slate-400">&gt; root@dijkstra: python main.py</span><br><span class="text-[#ff5f56]">SyntaxError: File kosong. Silakan tulis kode Anda.</span>';
                alertBox.classList.add('hidden');
                return;
            }

            const cleanCode = cleanString(code.replace(/#.*/g, ''));
            const hasVar = cleanCode.includes('catatan_jarak=');
            const hasStart = cleanCode.includes('"Start":0');
            const hasInf = cleanCode.includes('float("inf")') || cleanCode.includes("float('inf')");
            const hasX = cleanCode.includes('"Titik_X"');
            const hasY = cleanCode.includes('"Titik_Y"');

            if (hasVar && hasStart && hasInf && hasX && hasY) {
                outBox.innerHTML =
                    `<span class="text-slate-400">&gt; root@dijkstra: python main.py</span><br><span class="text-[#d4d4d4]">Inisialisasi tabel jarak...</span><br><span class="text-[#4af626]">Kompilasi Berhasil. Tabel siap digunakan.</span>`;

                alertBox.className = "mt-4 p-5 rounded-lg text-sm shadow-sm border bg-green-50 dark:bg-green-900/30 border-green-300 dark:border-green-800 text-left transition-colors";
                alertBox.innerHTML = `
                    <div class="font-bold text-green-800 dark:text-green-400 mb-2 flex items-center gap-2">
                        <i class="fa-solid fa-circle-check text-green-600 dark:text-green-500 text-lg"></i> Luar biasa! Tabel awal Anda sangat presisi.
                    </div>
                    <p class="text-green-800 dark:text-green-200 leading-relaxed text-justify">
                        <strong>💡 Analisis:</strong> Anda telah memberikan nilai <code>0</code> pada titik Start (karena itu tempat kita berdiri saat ini). Memberikan nilai <code>float('inf')</code> pada titik lain menjamin algoritma akan selalu berhasil menggantinya ketika kelak menemukan rute nyata menuju titik tersebut.
                    </p>`;
                alertBox.classList.remove('hidden');

                const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                localStorage.setItem('prak4_misi2_' + userId, 'true');
                localStorage.setItem('prak4_misi2_code_' + userId, code);
                markMisiSelesai(2);
                cekSemuaMisiSelesai();
            } else {
                outBox.innerHTML =
                    `<span class="text-slate-400">&gt; root@dijkstra: python main.py</span><br><span class="text-[#ff5f56]">Traceback (most recent call last):<br>ValueError: Angka inisialisasi tidak valid.</span>`;

                let err = '<ul class="list-disc ml-5 font-normal mt-2 space-y-1 text-red-800 dark:text-red-200">';
                if (!hasVar) err += '<li>Nama variabel harus persis: <code>catatan_jarak = {}</code></li>';
                if (!hasStart) err += '<li>Titik "Start" harus diisi dengan angka 0.</li>';
                if (!hasX || !hasY) err +=
                    '<li>Pastikan Anda menulis key <code>"Titik_X"</code> dan <code>"Titik_Y"</code>.</li>';
                if (!hasInf) err += '<li>Gunakan fungsi <code>float(\'inf\')</code> untuk nilai tak terhingga!</li>';
                err += '</ul>';

                alertBox.className =
                    "mt-4 p-5 rounded-lg text-sm shadow-sm border bg-red-50 dark:bg-red-900/30 text-red-800 dark:text-red-200 border-red-300 dark:border-red-800 text-left transition-colors";
                alertBox.innerHTML = '<strong class="text-red-800 dark:text-red-400">❌ Auto-Koreksi Gagal. Analisis Kesalahan:</strong>' + err;
                alertBox.classList.remove('hidden');
            }
        }

        // ==========================================
        // VALIDATOR CERDAS MISI 3 (RELAXATION)
        // ==========================================
        window.koreksiMisi3 = function() {
            const code = document.getElementById('editor-misi-3').value;
            const outBox = document.getElementById('output-misi-3');
            const alertBox = document.getElementById('alert-misi-3');

            outBox.classList.remove('hidden');
            window.syncLineNumbersMisi3();

            if (code.trim() === "") {
                outBox.innerHTML =
                    '<span class="text-slate-400">&gt; root@dijkstra: python main.py</span><br><span class="text-[#ff5f56]">SyntaxError: File kosong. Silakan tulis kode Anda.</span>';
                alertBox.classList.add('hidden');
                return;
            }

            const cleanCode = cleanString(code.replace(/#.*/g, ''));
            const hasIf = cleanCode.includes('ifjalur_alternatif<jarak_lama:');
            const hasAssign = cleanCode.includes('jarak_lama=jalur_alternatif');

            if (hasIf && hasAssign) {
                outBox.innerHTML =
                    `<span class="text-slate-400">&gt; root@dijkstra: python main.py</span><br><span class="text-[#d4d4d4]">Mengeksekusi logika Relaxation...</span><br><span class="text-[#4af626]">Status: Rute Diperbarui!<br>Kompilasi Berhasil!</span>`;

                alertBox.className = "mt-4 p-5 rounded-lg text-sm shadow-sm border bg-green-50 dark:bg-green-900/30 border-green-300 dark:border-green-800 text-left transition-colors";
                alertBox.innerHTML = `
                    <div class="font-bold text-green-800 dark:text-green-400 mb-2 flex items-center gap-2">
                        <i class="fa-solid fa-circle-check text-green-600 dark:text-green-500 text-lg"></i> Brilian! Logika Relaxation Anda sempurna.
                    </div>
                    <p class="text-green-800 dark:text-green-200 leading-relaxed text-justify">
                        <strong>💡 Analisis:</strong> Blok <code>if</code> Anda sukses membandingkan bobot, dan ketika jalur alternatif lebih murah, variabel jarak di memori berhasil Anda timpa ulang dengan nilai baru. Inilah mekanisme utama bagaimana Dijkstra selalu menemukan rute terbaik.
                    </p>`;
                alertBox.classList.remove('hidden');

                const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                localStorage.setItem('prak4_misi3_' + userId, 'true');
                localStorage.setItem('prak4_misi3_code_' + userId, code);
                markMisiSelesai(3);
                cekSemuaMisiSelesai();
            } else {
                outBox.innerHTML =
                    `<span class="text-slate-400">&gt; root@dijkstra: python main.py</span><br><span class="text-[#ff5f56]">Traceback (most recent call last):<br>LogicError: Pembaruan rute gagal dilakukan.</span>`;

                let err = '<ul class="list-disc ml-5 font-normal mt-2 space-y-1 text-red-800 dark:text-red-200">';
                if (!hasIf) err +=
                    '<li>Pastikan Anda membuat logika kondisi <code>if jalur_alternatif < jarak_lama:</code></li>';
                if (!hasAssign) err +=
                    '<li>Jika syarat terpenuhi, ganti isi variabel lama menjadi nilai alternatif dengan cara <code>jarak_lama = jalur_alternatif</code>.</li>';
                err += '</ul>';

                alertBox.className =
                    "mt-4 p-5 rounded-lg text-sm shadow-sm border bg-red-50 dark:bg-red-900/30 text-red-800 dark:text-red-200 border-red-300 dark:border-red-800 text-left transition-colors";
                alertBox.innerHTML = '<strong class="text-red-800 dark:text-red-400">❌ Auto-Koreksi Gagal. Analisis Kesalahan Logika:</strong>' + err;
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
                alertBox.classList.remove('hidden', 'bg-green-100', 'dark:bg-green-900/40', 'text-green-700', 'dark:text-green-300');
                alertBox.classList.add('bg-red-100', 'dark:bg-red-900/40', 'text-red-700', 'dark:text-red-300');
                alertBox.innerHTML =
                    '<i class="fa-solid fa-triangle-exclamation mr-2"></i> Laporan tidak boleh kosong. Harap ketik penjelasan Anda terlebih dahulu.';
                document.getElementById('penjelasan-praktikum').focus();
                return;
            }

            const codeMisi1 = document.getElementById('editor-misi-1').value;
            const codeMisi2 = document.getElementById('editor-misi-2').value;
            const codeMisi3 = document.getElementById('editor-misi-3').value;

            // KITA BUAT OBJECT MURNI
            const payloadData = {
                kode: "=== MISI 1 (Nested Dict) ===\n" + codeMisi1 + "\n\n=== MISI 2 (Infinity) ===\n" + codeMisi2 +
                    "\n\n=== MISI 3 (Relaxation) ===\n" + codeMisi3,
                output: "Semua komponen Dijkstra berhasil divalidasi oleh sistem Auto-Corrector.",
                penjelasan: penjelasan,
                status: "pending"
            };

            const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
            localStorage.setItem('prak4_laporan_teks_' + userId, penjelasan);

            btnSubmit.disabled = true;
            btnSubmit.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> MENYIMPAN...';

            fetch("{{ route('submit.quiz') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        chapter_code: 'bab4',
                        section_code: '4.6_praktikum',
                        score: 1,
                        answers: payloadData // DIKIRIM SEBAGAI OBJECT MURNI 
                    })
                })
                .then(res => res.json())
                .then(data => {
                    alertBox.classList.remove('hidden', 'bg-red-100', 'dark:bg-red-900/40', 'text-red-700', 'dark:text-red-300');
                    alertBox.classList.add('bg-green-100', 'dark:bg-green-900/40', 'text-green-700', 'dark:text-green-300');
                    alertBox.innerHTML =
                        '<i class="fa-solid fa-circle-check mr-2"></i> Laporan Praktikum berhasil dikirim! Menunggu review Dosen.';

                    btnSubmit.innerHTML = '<i class="fa-solid fa-check"></i> LAPORAN TERKIRIM';
                    btnSubmit.classList.replace('bg-blue-600', 'bg-green-600');
                    btnSubmit.classList.replace('hover:bg-blue-700', 'hover:bg-green-700');

                    btnNext.disabled = false;
                    btnNext.classList.remove('hidden', 'opacity-50', 'cursor-not-allowed', 'bg-slate-900');
                    btnNext.classList.add('bg-blue-600', 'hover:bg-blue-700');
                    btnNext.classList.replace('dark:bg-slate-700', 'dark:bg-blue-600');
                    btnNext.classList.replace('dark:hover:bg-slate-600', 'dark:hover:bg-blue-700');

                    localStorage.setItem('prak4_laporan_dikirim_' + userId, 'true');

                    if (typeof simpanProgressAktivitas === 'function') {
                        simpanProgressAktivitas('bab4', '4.6_praktikum', 100);
                    }
                })
                .catch(err => {
                    console.error(err);
                    alertBox.classList.remove('hidden', 'bg-green-100', 'dark:bg-green-900/40', 'text-green-700', 'dark:text-green-300');
                    alertBox.classList.add('bg-red-100', 'dark:bg-red-900/40', 'text-red-700', 'dark:text-red-300');
                    alertBox.innerHTML =
                        '<i class="fa-solid fa-triangle-exclamation mr-2"></i> Gagal mengirim laporan. Periksa koneksi internet Anda.';

                    btnSubmit.disabled = false;
                    btnSubmit.innerHTML = '<i class="fa-solid fa-cloud-arrow-up"></i> COBA LAGI';
                });
        }

        // ================================================= --}}
        // KONFIGURASI VISUALISASI GRAF Misi 1 (VIS.JS)
        // ================================================= --}}
        function initVisualizationsPrak4() {
            // Gaya Simpul & Garis (Aman di Light/Dark mode)
            const commonNodes = {
                shape: 'dot', size: 20, font: { size: 14, color: '#475569', bold: true }, 
                color: { background: '#dbeafe', border: '#3b82f6', highlight: { background: '#eff6ff', border: '#2563eb' } }, 
                borderWidth: 2
            };
            const commonEdges = {
                width: 3, color: { color: '#94a3b8', highlight: '#3b82f6', hover: '#94a3b8' },
                font: { align: 'top', size: 14, color: '#475569', strokeWidth: 3, strokeColor: '#ffffff', bold: true },
                smooth: { type: 'continuous' }
            };
            const options = { nodes: commonNodes, edges: commonEdges, physics: { enabled: false }, interaction: { zoomView: false, dragView: false } };

            const cMisi1 = document.getElementById('viz-misi4-1');
            if(cMisi1) {
                const nodesMisi1 = new vis.DataSet([
                    { id: 'A', label: 'Simpul A', x: -100, y: 0, color: { background: '#fef3c7', border: '#f59e0b'}, font: {color: '#92400e'} }, 
                    { id: 'B', label: 'Simpul B\n(4 KM)', x: 100, y: -80, color: { background: '#d1fae5', border: '#10b981'}, font: {color: '#065f46'} }, 
                    { id: 'C', label: 'Simpul C\n(7 KM)', x: 100, y: 80, color: { background: '#d1fae5', border: '#10b981'}, font: {color: '#065f46'} }, 
                ]);
                const edgesMisi1 = new vis.DataSet([
                    { from: 'A', to: 'B', label: '4' }, 
                    { from: 'A', to: 'C', label: '7' }
                ]);
                const net1 = new vis.Network(cMisi1, { nodes: nodesMisi1, edges: edgesMisi1 }, options);
                net1.once('afterDrawing', () => net1.fit({ animation: false }));
            }
        }
    </script>
</section>