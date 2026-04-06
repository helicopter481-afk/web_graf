<section id="step-6" class="step-slide">
    <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm p-8 md:p-10 max-w-6xl mx-auto -mt-8 transition-colors">
        
        {{-- JUDUL PRAKTIKUM --}}
        <div class="border-b border-slate-200 dark:border-slate-700 pb-6 mb-8 flex items-center justify-between transition-colors">
            <div>
                <h2 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white mb-2 flex items-center gap-3">
                    <i class="fa-solid fa-laptop-code text-blue-600 dark:text-blue-500"></i> Praktikum Materi 2
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
                Pada evaluasi ini, tidak ada lagi soal pilihan ganda. Anda dihadapkan pada kanvas editor kosong. Ketikkan kode Python dari awal (<em>from scratch</em>) menggunakan cara yang telah diajarkan sebelumnya. Sistem <strong>Auto-Koreksi</strong> akan mengevaluasi variabel dan struktur data Anda secara otomatis! Editor tidak akan dikunci jika Anda menjawab benar, sehingga Anda tetap bisa bereksperimen.
            </p>
        </div>

        {{-- ========================================== --}}
        {{-- MISI 1: IMPLEMENTASI DASAR (TUPLE & LIST) --}}
        {{-- ========================================== --}}
        <div class="mb-12 border-2 border-slate-200 dark:border-slate-700 rounded-xl overflow-hidden shadow-sm hover:border-blue-300 dark:hover:border-blue-600 transition-colors">
            <div class="bg-slate-50 dark:bg-slate-800/50 px-6 py-4 border-b border-slate-200 dark:border-slate-700 flex justify-between items-center transition-colors">
                <h3 class="font-bold text-slate-800 dark:text-slate-200 text-lg flex items-center gap-2">
                    <span class="bg-blue-600 text-white w-6 h-6 rounded-full flex items-center justify-center text-sm shadow-sm">1</span> 
                    Misi Pariwisata
                </h3>
                <span id="badge-misi-1" class="hidden bg-green-500 text-white px-3 py-1 rounded text-xs font-bold shadow-sm flex items-center gap-1"><i class="fa-solid fa-check"></i> Selesai</span>
            </div>
            <div class="p-6 bg-white dark:bg-slate-900 transition-colors">
                
                <div class="grid md:grid-cols-12 gap-8 mb-6">
                    <div class="md:col-span-7 flex flex-col justify-center">
                        <p class="text-sm text-slate-700 dark:text-slate-300 leading-relaxed text-justify mb-3">
                            <strong>Skenario:</strong> Anda ditugaskan mencatat data rute pariwisata dasar. Terdapat 3 lokasi utama: "Pantai", "Gunung", dan "Danau". Turis hanya bisa berjalan dari Pantai menuju Gunung, lalu dari Gunung menuju Danau.
                        </p>
                        <div class="text-sm text-slate-700 dark:text-slate-300 leading-relaxed mb-2">
                            <strong>Tugas Anda:</strong>
                            <ul class="list-disc list-outside ml-5 mt-2 space-y-1.5">
                                <li>Buat variabel <code>simpul_wisata</code> bertipe <strong>List</strong> untuk menyimpan ketiga nama lokasi tersebut.</li>
                                <li>Buat variabel <code>jalur_wisata</code> bertipe <strong>List of Tuples</strong> untuk menyimpan dua hubungan rute perjalanannya.</li>
                            </ul>
                        </div>
                    </div>
                     {{-- ILUSTRASI VISUAL MISI 1 (OPSI GANDA) --}}
                    <div class="md:col-span-5 flex items-center justify-center">
                        <img src="{{ asset('images/gambarprak21.png') }}" alt="Ilustrasi DFS" class="w-full max-w-sm rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 object-contain bg-slate-50 dark:bg-slate-800">
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
                    
                    <div class="flex font-mono text-[12px] md:text-sm text-[#d4d4d4] bg-[#1e1e1e] relative min-h-[120px] leading-[1.625]">
                        <div id="line-numbers-misi1" class="text-[#858585] text-right select-none py-5 pl-4 pr-4 border-r border-[#404040] bg-[#1e1e1e] shrink-0 z-10 leading-[1.625]">
                            <div>1</div>
                        </div>
                        <textarea id="editor-misi-1" class="w-full bg-transparent text-[#d4d4d4] outline-none resize-none py-5 pl-4 pr-6 whitespace-pre overflow-x-auto z-0 leading-[1.625]" spellcheck="false" placeholder="# Ketik kode variabel simpul_wisata dan jalur_wisata di sini..." oninput="window.syncLineNumbersMisi1()"></textarea>
                    </div>
                    
                    {{-- Simulasi Output Terminal Misi 1 --}}
                    <div id="output-misi-1" class="hidden border-t border-slate-700 bg-black p-5 text-xs font-mono shrink-0 leading-relaxed"></div>
                </div>
                
                {{-- Feedback Box Misi 1 --}}
                <div id="alert-misi-1" class="hidden mt-4 transition-all duration-500 text-left"></div>
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- MISI 2: ADJACENCY LIST (DIRECTED GRAPH) --}}
        {{-- ========================================== --}}
        <div class="mb-12 border-2 border-slate-200 dark:border-slate-700 rounded-xl overflow-hidden shadow-sm hover:border-emerald-300 dark:hover:border-emerald-600 transition-colors">
            <div class="bg-slate-50 dark:bg-slate-800/50 px-6 py-4 border-b border-slate-200 dark:border-slate-700 flex justify-between items-center transition-colors">
                <h3 class="font-bold text-slate-800 dark:text-slate-200 text-lg flex items-center gap-2">
                    <span class="bg-emerald-600 text-white w-6 h-6 rounded-full flex items-center justify-center text-sm shadow-sm">2</span> 
                    Misi Robot Logistik
                </h3>
                <span id="badge-misi-2" class="hidden bg-green-500 text-white px-3 py-1 rounded text-xs font-bold shadow-sm flex items-center gap-1"><i class="fa-solid fa-check"></i> Selesai</span>
            </div>
            <div class="p-6 bg-white dark:bg-slate-900 transition-colors">
                
                <div class="grid md:grid-cols-12 gap-8 mb-6">
                    <div class="md:col-span-7 flex flex-col justify-center">
                        <p class="text-sm text-slate-700 dark:text-slate-300 leading-relaxed text-justify mb-3">
                            <strong>Skenario:</strong> Sebuah pabrik menggunakan robot logistik yang bergerak searah (<em>Directed Graph</em>). Aturannya:
                        </p>
                        <ul class="list-disc list-outside ml-5 mt-2 mb-4 space-y-1.5 text-sm text-slate-700 dark:text-slate-300">
                            <li>Dari "Gudang_A", robot bisa pergi ke "Gudang_B" dan "Gudang_C".</li>
                            <li>Dari "Gudang_B", robot hanya bisa pergi ke "Gudang_C".</li>
                            <li>"Gudang_C" adalah titik buntu (<em>dead end</em>); robot tidak bisa pergi ke mana-mana dari sini.</li>
                        </ul>
                        <p class="text-sm text-slate-700 dark:text-slate-300 leading-relaxed mb-2">
                            <strong>Tugas Anda:</strong> Buat sebuah variabel bernama <code>graf_robot</code> bertipe <strong>Dictionary</strong> (<em>Adjacency List</em>) untuk merepresentasikan secara logis aturan pergerakan robot tersebut!
                        </p>
                    </div>
                    {{-- ILUSTRASI VISUAL MISI 2 (OPSI GANDA) --}}
                    <div class="md:col-span-5 flex items-center justify-center">
                        <img src="{{ asset('images/gambarprak22.png') }}" alt="Ilustrasi DFS" class="w-full max-w-sm rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 object-contain bg-slate-50 dark:bg-slate-800">
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
                    
                    <div class="flex font-mono text-[12px] md:text-sm text-[#d4d4d4] bg-[#1e1e1e] relative min-h-[120px] leading-[1.625]">
                        <div id="line-numbers-misi2" class="text-[#858585] text-right select-none py-5 pl-4 pr-4 border-r border-[#404040] bg-[#1e1e1e] shrink-0 z-10 leading-[1.625]">
                            <div>1</div>
                        </div>
                        <textarea id="editor-misi-2" class="w-full bg-transparent text-[#d4d4d4] outline-none resize-none py-5 pl-4 pr-6 whitespace-pre overflow-x-auto z-0 leading-[1.625]" spellcheck="false" placeholder="# Ketik kode variabel graf_robot di sini..." oninput="window.syncLineNumbersMisi2()"></textarea>
                    </div>
                    
                    {{-- Simulasi Output Terminal Misi 2 --}}
                    <div id="output-misi-2" class="hidden border-t border-slate-700 bg-black p-5 text-xs font-mono shrink-0 leading-relaxed"></div>
                </div>
                
                {{-- Feedback Box Misi 2 --}}
                <div id="alert-misi-2" class="hidden mt-4 transition-all duration-500 text-left"></div>
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- MISI 3: ADJACENCY MATRIX --}}
        {{-- ========================================== --}}
        <div class="mb-10 border-2 border-slate-200 dark:border-slate-700 rounded-xl overflow-hidden shadow-sm hover:border-amber-300 dark:hover:border-amber-600 transition-colors">
            <div class="bg-slate-50 dark:bg-slate-800/50 px-6 py-4 border-b border-slate-200 dark:border-slate-700 flex justify-between items-center transition-colors">
                <h3 class="font-bold text-slate-800 dark:text-slate-200 text-lg flex items-center gap-2">
                    <span class="bg-amber-500 text-white w-6 h-6 rounded-full flex items-center justify-center text-sm shadow-sm">3</span> 
                    Misi Tarif Ongkir
                </h3>
                <span id="badge-misi-3" class="hidden bg-green-500 text-white px-3 py-1 rounded text-xs font-bold shadow-sm flex items-center gap-1"><i class="fa-solid fa-check"></i> Selesai</span>
            </div>
            <div class="p-6 bg-white dark:bg-slate-900 transition-colors">
                
                <div class="grid md:grid-cols-12 gap-8 mb-6">
                    <div class="md:col-span-7 flex flex-col justify-center">
                        <p class="text-sm text-slate-700 dark:text-slate-300 leading-relaxed text-justify mb-3">
                            <strong>Skenario:</strong> Aplikasi pengiriman barang membutuhkan matriks tarif ongkos kirim antar 3 kota. Data di-<em>mapping</em> menggunakan indeks: <strong>0 = Jakarta, 1 = Bogor, 2 = Depok</strong>.
                        </p>
                        <div class="text-sm text-slate-700 dark:text-slate-300 leading-relaxed mb-4">
                            <strong>Data Tarif (Bobot):</strong>
                            <ul class="list-disc list-outside ml-5 mt-2 space-y-1.5">
                                <li>Ongkir Jakarta ke Bogor = 15000, Jakarta ke Depok = 10000.</li>
                                <li>Ongkir Bogor ke Jakarta = 15000, Bogor ke Depok = 5000.</li>
                                <li>Ongkir Depok ke Jakarta = 10000, Depok ke Bogor = 5000. <em>(Catatan: Ongkir ke kota yang sama adalah 0)</em></li>
                            </ul>
                        </div>
                        <p class="text-sm text-slate-700 dark:text-slate-300 leading-relaxed mb-2">
                            <strong>Tugas Anda:</strong> Buat sebuah variabel bernama <code>matriks_ongkir</code> bertipe <strong>List 2 Dimensi</strong> (3 baris x 3 kolom) yang menyimpan angka-angka tarif tersebut secara berurutan sesuai indeks kotanya.
                        </p>
                    </div>
                    {{-- ILUSTRASI VISUAL MISI 3 (OPSI GANDA) --}}
                    <div class="md:col-span-5 flex items-center justify-center">
                        <img src="{{ asset('images/gambarprak23.png') }}" alt="Ilustrasi DFS" class="w-full max-w-sm rounded-lg shadow-sm border border-slate-200 dark:border-slate-700 object-contain bg-slate-50 dark:bg-slate-800">
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
                    
                    <div class="flex font-mono text-[12px] md:text-sm text-[#d4d4d4] bg-[#1e1e1e] relative min-h-[120px] leading-[1.625]">
                        <div id="line-numbers-misi3" class="text-[#858585] text-right select-none py-5 pl-4 pr-4 border-r border-[#404040] bg-[#1e1e1e] shrink-0 z-10 leading-[1.625]">
                            <div>1</div>
                        </div>
                        <textarea id="editor-misi-3" class="w-full bg-transparent text-[#d4d4d4] outline-none resize-none py-5 pl-4 pr-6 whitespace-pre overflow-x-auto z-0 leading-[1.625]" spellcheck="false" placeholder="# Ketik kode variabel matriks_ongkir di sini..." oninput="window.syncLineNumbersMisi3()"></textarea>
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
                <p class="text-sm text-blue-800 dark:text-blue-200 mb-4 leading-relaxed font-medium">Berdasarkan 3 Misi yang baru saja Anda selesaikan, tuliskan laporan singkat yang menjelaskan <strong>alur dan cara kerja</strong> dari masing-masing kode Python yang telah Anda buat di atas.</p>
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
                Lanjut<i class="fa-solid fa-flag-checkered ml-2"></i>
            </button>
        </div>

    </div>

    {{-- SCRIPT SISTEM AUTO-KOREKSI & SUBMIT LAPORAN --}}
    <script>
        // FUNGSI LINE NUMBERS EDITOR MISI 1
        window.syncLineNumbersMisi1 = function() {
            const editor = document.getElementById('editor-misi-1');
            const lineNumEl = document.getElementById('line-numbers-misi1');
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

        // FUNGSI LINE NUMBERS EDITOR MISI 2
        window.syncLineNumbersMisi2 = function() {
            const editor = document.getElementById('editor-misi-2');
            const lineNumEl = document.getElementById('line-numbers-misi2');
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

        // FUNGSI LINE NUMBERS EDITOR MISI 3
        window.syncLineNumbersMisi3 = function() {
            const editor = document.getElementById('editor-misi-3');
            const lineNumEl = document.getElementById('line-numbers-misi3');
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

        document.addEventListener("DOMContentLoaded", function() {
            const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
            
            if(localStorage.getItem('prak2_misi1_v2_' + userId) === 'true') {
                const ed1 = document.getElementById('editor-misi-1');
                ed1.value = localStorage.getItem('prak2_misi1_code_v2_' + userId);
                setTimeout(window.syncLineNumbersMisi1, 100);
                window.koreksiMisi1();
            } else {
                setTimeout(window.syncLineNumbersMisi1, 100);
            }
            
            if(localStorage.getItem('prak2_misi2_v2_' + userId) === 'true') {
                const ed2 = document.getElementById('editor-misi-2');
                ed2.value = localStorage.getItem('prak2_misi2_code_v2_' + userId);
                setTimeout(window.syncLineNumbersMisi2, 100);
                window.koreksiMisi2(); 
            } else {
                setTimeout(window.syncLineNumbersMisi2, 100);
            }
            
            if(localStorage.getItem('prak2_misi3_v2_' + userId) === 'true') {
                const ed3 = document.getElementById('editor-misi-3');
                ed3.value = localStorage.getItem('prak2_misi3_code_v2_' + userId);
                setTimeout(window.syncLineNumbersMisi3, 100);
                window.koreksiMisi3();
            } else {
                setTimeout(window.syncLineNumbersMisi3, 100);
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
            const m1 = localStorage.getItem('prak2_misi1_v2_' + userId) === 'true';
            const m2 = localStorage.getItem('prak2_misi2_v2_' + userId) === 'true';
            const m3 = localStorage.getItem('prak2_misi3_v2_' + userId) === 'true';

            // Jika semua Misi selesai, munculkan Kotak Laporan
            if (m1 && m2 && m3) {
                document.getElementById('area-laporan-praktikum').classList.remove('hidden');
            }

            // Cek jika laporan sudah pernah dikirim sebelumnya
            if (localStorage.getItem('prak2_laporan_dikirim_' + userId) === 'true') {
                const savedText = localStorage.getItem('prak2_laporan_teks_' + userId);
                
                // LOGIKA ANTI-NYANGKUT: Hanya kunci form kalau teksnya benar-benar ada isinya
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
                    btnNext.classList.replace('dark:bg-slate-700', 'dark:bg-blue-600');
                    btnNext.classList.replace('dark:hover:bg-slate-600', 'dark:hover:bg-blue-700');
                    
                    const btnSubmit = document.getElementById('btn-submit-praktikum');
                    btnSubmit.innerHTML = '<i class="fa-solid fa-check"></i> LAPORAN TERKIRIM';
                    btnSubmit.classList.replace('bg-blue-600', 'bg-green-600');
                    btnSubmit.classList.replace('hover:bg-blue-700', 'hover:bg-green-700');
                } else {
                    // Jika kosong (karena error/cache lama), hapus status terkirim agar bisa ngetik lagi
                    localStorage.removeItem('prak2_laporan_dikirim_' + userId);
                }
            }
        }

        function cleanString(str) {
            return str.replace(/\s+/g, '').replace(/'/g, '"');
        }

        // ==========================================
        // VALIDATOR CERDAS MISI 1 (LIST & TUPLE)
        // ==========================================
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
            const cekSimpul = cleanCode.includes('simpul_wisata=["Pantai","Gunung","Danau"]');
            const cekJalur = cleanCode.includes('jalur_wisata=[("Pantai","Gunung"),("Gunung","Danau")]');

            if (cekSimpul && cekJalur) {
                outBox.innerHTML = `<span class="text-slate-400">> root@graflearn: python main.py</span><br><span class="text-[#d4d4d4]">Sistem memproses variabel...</span><br><span class="text-[#4af626]">Simpul Wisata: ['Pantai', 'Gunung', 'Danau']<br>Jalur Wisata: [('Pantai', 'Gunung'), ('Gunung', 'Danau')]</span>`;
                
                alertBox.className = "mt-4 p-5 rounded-lg text-sm shadow-sm border bg-green-50 dark:bg-green-900/30 border-green-300 dark:border-green-800 text-left transition-colors";
                alertBox.innerHTML = `
                    <div class="font-bold text-green-800 dark:text-green-400 mb-2 flex items-center gap-2">
                        <i class="fa-solid fa-circle-check text-green-600 dark:text-green-500 text-lg"></i> Berhasil! Anda menggunakan List dan Tuple dengan sempurna.
                    </div>
                    <p class="text-green-800 dark:text-green-200 leading-relaxed text-justify">
                        <strong>💡 Analisis:</strong> Variabel <code>simpul_wisata</code> menggunakan <strong>List [...]</strong> karena daftar destinasi wisata bersifat dinamis. Sedangkan <code>jalur_wisata</code> menggunakan <strong>Tuple (...)</strong> karena rute spesifik antar lokasi adalah entitas tetap yang <em>immutable</em>.
                    </p>`;
                alertBox.classList.remove('hidden');

                const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                localStorage.setItem('prak2_misi1_v2_' + userId, 'true');
                localStorage.setItem('prak2_misi1_code_v2_' + userId, code);
                markMisiSelesai(1);
                cekSemuaMisiSelesai();
            } else {
                outBox.innerHTML = `<span class="text-slate-400">> root@graflearn: python main.py</span><br><span class="text-[#ff5f56]">Traceback (most recent call last):<br>TypeError: Struktur data tidak memenuhi kriteria.</span>`;
                
                let err = '<ul class="list-disc ml-5 font-normal mt-2 space-y-1 text-red-800 dark:text-red-200">';
                if (!cekSimpul) err += '<li>Variabel <code>simpul_wisata</code> belum menggunakan List <strong>[]</strong> yang berisi "Pantai", "Gunung", "Danau".</li>';
                if (!cekJalur) err += '<li>Variabel <code>jalur_wisata</code> belum menggunakan Tuple <strong>()</strong> di dalam List <strong>[]</strong> untuk merepresentasikan 2 rute tersebut.</li>';
                err += '</ul>';

                alertBox.className = "mt-4 p-5 rounded-lg text-sm shadow-sm border bg-red-50 dark:bg-red-900/30 text-red-800 dark:text-red-200 border-red-300 dark:border-red-800 text-left transition-colors";
                alertBox.innerHTML = '<strong class="text-red-800 dark:text-red-400">❌ Auto-Koreksi Gagal. Analisis Kesalahan:</strong>' + err + '<div class="mt-3 text-xs italic text-red-600 dark:text-red-400 bg-red-100 dark:bg-red-950/50 p-2 rounded border border-red-200 dark:border-red-800">Peringatan: Perhatikan penggunaan tanda kurung siku [], kurung biasa (), dan huruf kapital!</div>';
                alertBox.classList.remove('hidden');
            }
        }

        // ==========================================
        // VALIDATOR CERDAS MISI 2 (DICTIONARY)
        // ==========================================
        window.koreksiMisi2 = function() {
            const code = document.getElementById('editor-misi-2').value;
            const outBox = document.getElementById('output-misi-2');
            const alertBox = document.getElementById('alert-misi-2');
            
            outBox.classList.remove('hidden');
            window.syncLineNumbersMisi2();

            if(code.trim() === "") {
                outBox.innerHTML = '<span class="text-slate-400">> root@graflearn: python main.py</span><br><span class="text-[#ff5f56]">SyntaxError: File kosong. Silakan tulis kode Anda.</span>';
                alertBox.classList.add('hidden');
                return;
            }

            const cleanCode = cleanString(code.replace(/#.*/g, ''));
            const hasVar = cleanCode.includes('graf_robot={');
            const hasA = cleanCode.includes('"Gudang_A":["Gudang_B","Gudang_C"]') || cleanCode.includes('"Gudang_A":["Gudang_C","Gudang_B"]');
            const hasB = cleanCode.includes('"Gudang_B":["Gudang_C"]');
            const hasC = cleanCode.includes('"Gudang_C":[]');

            if (hasVar && hasA && hasB && hasC) {
                outBox.innerHTML = `<span class="text-slate-400">> root@graflearn: python main.py</span><br><span class="text-[#d4d4d4]">Sistem membangun rute robot...</span><br><span class="text-[#4af626]">Gudang_A &rarr; ['Gudang_B', 'Gudang_C']<br>Gudang_B &rarr; ['Gudang_C']<br>Gudang_C &rarr; [] (Dead-End Reached)</span>`;
                
                alertBox.className = "mt-4 p-5 rounded-lg text-sm shadow-sm border bg-green-50 dark:bg-green-900/30 border-green-300 dark:border-green-800 text-left transition-colors";
                alertBox.innerHTML = `
                    <div class="font-bold text-green-800 dark:text-green-400 mb-2 flex items-center gap-2">
                        <i class="fa-solid fa-circle-check text-green-600 dark:text-green-500 text-lg"></i> Luar biasa! Logika Adjacency List (Directed) Anda sangat akurat.
                    </div>
                    <p class="text-green-800 dark:text-green-200 leading-relaxed text-justify">
                        <strong>💡 Analisis:</strong> Dalam <em>Dictionary</em> ini, lokasi awal bertindak sebagai <strong>Kunci</strong> dan daftar tujuan bertindak sebagai <strong>Nilai</strong>. Karena pergerakan robot ini bersifat Searah (Directed), lokasi Gudang_C dideklarasikan dengan list kosong <code>[]</code> untuk memberi tahu algoritma bahwa proses pergerakan otomatis harus dihentikan di titik tersebut.
                    </p>`;
                alertBox.classList.remove('hidden');

                const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                localStorage.setItem('prak2_misi2_v2_' + userId, 'true');
                localStorage.setItem('prak2_misi2_code_v2_' + userId, code);
                markMisiSelesai(2);
                cekSemuaMisiSelesai();
            } else {
                outBox.innerHTML = `<span class="text-slate-400">> root@graflearn: python main.py</span><br><span class="text-[#ff5f56]">Traceback (most recent call last):<br>KeyError atau ValueError: Pemetaan rute tidak valid.</span>`;
                
                let err = '<ul class="list-disc ml-5 font-normal mt-2 space-y-1 text-red-800 dark:text-red-200">';
                if (!hasVar) err += '<li>Variabel <code>graf_robot</code> belum dideklarasikan dengan format Dictionary <strong>{}</strong>.</li>';
                if (!hasA) err += '<li>Kunci <code>"Gudang_A"</code> harus memuat list <code>["Gudang_B", "Gudang_C"]</code>.</li>';
                if (!hasB) err += '<li>Kunci <code>"Gudang_B"</code> harus memuat list <code>["Gudang_C"]</code>.</li>';
                if (!hasC) err += '<li>Kunci <code>"Gudang_C"</code> harus ditulis dan memiliki value list kosong <code>[]</code> (karena buntu).</li>';
                err += '</ul>';

                alertBox.className = "mt-4 p-5 rounded-lg text-sm shadow-sm border bg-red-50 dark:bg-red-900/30 text-red-800 dark:text-red-200 border-red-300 dark:border-red-800 text-left transition-colors";
                alertBox.innerHTML = '<strong class="text-red-800 dark:text-red-400">❌ Auto-Koreksi Gagal. Analisis Kesalahan:</strong>' + err;
                alertBox.classList.remove('hidden');
            }
        }

        // ==========================================
        // VALIDATOR CERDAS MISI 3 (MATRIX 2D)
        // ==========================================
        window.koreksiMisi3 = function() {
            const code = document.getElementById('editor-misi-3').value;
            const outBox = document.getElementById('output-misi-3');
            const alertBox = document.getElementById('alert-misi-3');
            
            outBox.classList.remove('hidden');
            window.syncLineNumbersMisi3();

            if(code.trim() === "") {
                outBox.innerHTML = '<span class="text-slate-400">> root@graflearn: python main.py</span><br><span class="text-[#ff5f56]">SyntaxError: File kosong. Silakan tulis kode Anda.</span>';
                alertBox.classList.add('hidden');
                return;
            }

            const cleanCode = cleanString(code.replace(/#.*/g, ''));
            const hasVar = cleanCode.includes('matriks_ongkir=[');
            const row0 = cleanCode.includes('[0,15000,10000]'); // Jakarta
            const row1 = cleanCode.includes('[15000,0,5000]');  // Bogor
            const row2 = cleanCode.includes('[10000,5000,0]');  // Depok

            if (hasVar && row0 && row1 && row2) {
                outBox.innerHTML = `<span class="text-slate-400">> root@graflearn: python main.py</span><br><span class="text-[#d4d4d4]">Sistem membaca Array 2D...</span><br><span class="text-[#4af626]">Baris 0 (Jkt): [0, 15000, 10000]<br>Baris 1 (Bgr): [15000, 0, 5000]<br>Baris 2 (Dpk): [10000, 5000, 0]</span>`;
                
                alertBox.className = "mt-4 p-5 rounded-lg text-sm shadow-sm border bg-green-50 dark:bg-green-900/30 border-green-300 dark:border-green-800 text-left transition-colors";
                alertBox.innerHTML = `
                    <div class="font-bold text-green-800 dark:text-green-400 mb-2 flex items-center gap-2">
                        <i class="fa-solid fa-circle-check text-green-600 dark:text-green-500 text-lg"></i> Sempurna! Anda berhasil merancang matriks tarif dengan sangat presisi.
                    </div>
                    <p class="text-green-800 dark:text-green-200 leading-relaxed text-justify">
                        <strong>💡 Analisis:</strong> Pada matriks 3x3 ini, baris mewakili <em>Kota Asal</em> dan kolom mewakili <em>Kota Tujuan</em>. Anda menempatkan angka <strong>0</strong> secara menyilang diagonal <code>([0][0], [1][1], [2][2])</code> secara tepat karena tidak ada tarif pengiriman ke kota itu sendiri. Nilai ongkir yang ada merupakan bentuk representasi komputer terhadap <em>Weighted Graph</em>!
                    </p>`;
                alertBox.classList.remove('hidden');

                const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                localStorage.setItem('prak2_misi3_v2_' + userId, 'true');
                localStorage.setItem('prak2_misi3_code_v2_' + userId, code);
                markMisiSelesai(3);
                cekSemuaMisiSelesai();
            } else {
                outBox.innerHTML = `<span class="text-slate-400">> root@graflearn: python main.py</span><br><span class="text-[#ff5f56]">Traceback (most recent call last):<br>IndexError: Data Array 2 Dimensi keliru.</span>`;
                
                let err = '<ul class="list-disc ml-5 font-normal mt-2 space-y-1 text-red-800 dark:text-red-200">';
                if (!hasVar) err += '<li>Variabel utama <code>matriks_ongkir</code> belum menggunakan List 2D (kurung siku terluar <code>[]</code>).</li>';
                if (!row0) err += '<li><strong>Baris 0 (Jakarta)</strong> keliru. Ingat: Ongkir ke Jakarta=0, ke Bogor=15000, ke Depok=10000.</li>';
                if (!row1) err += '<li><strong>Baris 1 (Bogor)</strong> keliru. Ingat: Ongkir ke Jakarta=15000, ke Bogor=0, ke Depok=5000.</li>';
                if (!row2) err += '<li><strong>Baris 2 (Depok)</strong> keliru. Ingat: Ongkir ke Jakarta=10000, ke Bogor=5000, ke Depok=0.</li>';
                err += '</ul>';

                alertBox.className = "mt-4 p-5 rounded-lg text-sm shadow-sm border bg-red-50 dark:bg-red-900/30 text-red-800 dark:text-red-200 border-red-300 dark:border-red-800 text-left transition-colors";
                alertBox.innerHTML = '<strong class="text-red-800 dark:text-red-400">❌ Auto-Koreksi Gagal. Analisis Kesalahan Matriks:</strong>' + err;
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
                alertBox.innerHTML = '<i class="fa-solid fa-triangle-exclamation mr-2"></i> Laporan tidak boleh kosong. Harap isi penjelasan logika Anda.';
                document.getElementById('penjelasan-praktikum').focus();
                return;
            }

            const codeMisi1 = document.getElementById('editor-misi-1').value;
            const codeMisi2 = document.getElementById('editor-misi-2').value;
            const codeMisi3 = document.getElementById('editor-misi-3').value;

            // KITA BUAT OBJECT MURNI
            const payloadData = {
                kode: "MISI 1:\n" + codeMisi1 + "\n\nMISI 2:\n" + codeMisi2 + "\n\nMISI 3:\n" + codeMisi3,
                output: "Berhasil divalidasi oleh sistem.",
                penjelasan: penjelasan,
                status: "pending"
            };

            const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
            localStorage.setItem('prak2_laporan_teks_' + userId, penjelasan);

            btnSubmit.disabled = true;
            btnSubmit.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> MENYIMPAN...';

            fetch("{{ route('submit.quiz') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    chapter_code: 'bab2',
                    section_code: '2.5_praktikum',
                    score: 1, 
                    answers: payloadData // DIKIRIM SEBAGAI OBJECT MURNI (TANPA STRINGIFY LAGI)
                })
            })
            .then(res => res.json())
            .then(data => {
                alertBox.classList.remove('hidden', 'bg-red-100', 'dark:bg-red-900/40', 'text-red-700', 'dark:text-red-300');
                alertBox.classList.add('bg-green-100', 'dark:bg-green-900/40', 'text-green-700', 'dark:text-green-300');
                alertBox.innerHTML = '<i class="fa-solid fa-circle-check mr-2"></i> Laporan berhasil dikirim ke Dosen!';
                
                btnSubmit.innerHTML = '<i class="fa-solid fa-check"></i> LAPORAN TERKIRIM';
                btnSubmit.classList.replace('bg-blue-600', 'bg-green-600');
                btnSubmit.classList.replace('hover:bg-blue-700', 'hover:bg-green-700');
                
                btnNext.disabled = false;
                btnNext.classList.remove('hidden', 'opacity-50', 'cursor-not-allowed');
                btnNext.classList.replace('bg-slate-900', 'bg-blue-600');
                btnNext.classList.replace('hover:bg-slate-800', 'hover:bg-blue-700');
                btnNext.classList.replace('dark:bg-slate-700', 'dark:bg-blue-600');
                btnNext.classList.replace('dark:hover:bg-slate-600', 'dark:hover:bg-blue-700');
                
                localStorage.setItem('prak2_laporan_dikirim_' + userId, 'true');
            })
            .catch(err => {
                console.error(err);
                alertBox.classList.remove('hidden', 'bg-green-100', 'dark:bg-green-900/40', 'text-green-700', 'dark:text-green-300');
                alertBox.classList.add('bg-red-100', 'dark:bg-red-900/40', 'text-red-700', 'dark:text-red-300');
                alertBox.innerHTML = '<i class="fa-solid fa-triangle-exclamation mr-2"></i> Gagal menyimpan. Cek koneksi Anda.';
                btnSubmit.disabled = false;
                btnSubmit.innerHTML = '<i class="fa-solid fa-cloud-arrow-up"></i> COBA LAGI';
            });
        }
    </script>
</section>