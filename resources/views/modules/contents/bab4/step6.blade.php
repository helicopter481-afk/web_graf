<section id="step-6" class="step-slide">
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-8 md:p-10 max-w-6xl mx-auto -mt-8">

        {{-- JUDUL PRAKTIKUM --}}
        <div class="border-b border-slate-200 pb-6 mb-8 flex items-center justify-between">
            <div>
                <h2 class="text-2xl md:text-3xl font-bold text-slate-900 mb-2 flex items-center gap-3">
                    <i class="fa-solid fa-laptop-code text-blue-600"></i> Praktikum Materi 4
                </h2>
                <p class="text-slate-500 font-medium">Uji kompetensi pemrograman Anda secara langsung (Live Coding).</p>
            </div>
            <div class="hidden md:flex flex-col items-end">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Status Praktikum</span>
                <span
                    class="bg-blue-50 text-blue-700 px-3 py-1.5 rounded-full text-xs font-bold shadow-sm border border-blue-200 flex items-center gap-2">
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
                Saatnya merakit kepingan memori, <em>infinity</em>, dan logika <em>relaxation</em> menjadi satu kesatuan
                mesin Dijkstra! Anda dihadapkan pada kanvas editor kosong. Ketikkan kode Anda dari awal (<em>from
                    scratch</em>) berdasarkan instruksi misi. Sistem otomatis akan memvalidasi algoritma Anda.
            </p>
        </div>

        {{-- ========================================== --}}
        {{-- MISI 1: NESTED DICTIONARY --}}
        {{-- ========================================== --}}
        <div
            class="mb-12 border-2 border-slate-200 rounded-xl overflow-hidden shadow-sm hover:border-blue-300 transition-colors">
            <div class="bg-slate-50 px-6 py-4 border-b border-slate-200 flex justify-between items-center">
                <h3 class="font-bold text-slate-800 text-lg flex items-center gap-2">
                    <span
                        class="bg-blue-600 text-white w-6 h-6 rounded-full flex items-center justify-center text-sm shadow-sm">1</span>
                    Misi 1: Fondasi Memori Peta
                </h3>
                <span id="badge-misi-1"
                    class="hidden bg-green-500 text-white px-3 py-1 rounded text-xs font-bold shadow-sm flex items-center gap-1"><i
                        class="fa-solid fa-check"></i> Selesai</span>
            </div>
            <div class="p-6 bg-white">
                <p class="text-sm text-slate-700 leading-relaxed text-justify mb-3">
                    <strong>Skenario:</strong> Aplikasi navigasi Anda butuh memori graf untuk 3 kota: A, B, dan C. Jarak
                    dari <strong>A ke B adalah 4</strong>. Jarak dari <strong>A ke C adalah 7</strong>.
                </p>
                <div class="text-sm text-slate-700 leading-relaxed mb-6">
                    <strong>Tugas Anda:</strong> Buat sebuah variabel <code>peta_rute</code> bertipe <em>Nested
                        Dictionary</em> untuk menyimpan data simpul "A" beserta kedua tetangga dan angka bobotnya (B: 4
                    dan C: 7).
                </div>

                {{-- Sandbox Editor Misi 1 --}}
                <div
                    class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-md border border-slate-700 font-mono text-sm flex flex-col">
                    <div
                        class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700 shrink-0">
                        <span class="text-slate-400 text-xs">Terminal Editor (main.py)</span>
                        <button onclick="window.koreksiMisi1()" id="btnMisi1"
                            class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors flex items-center gap-2 shadow-sm active:scale-95">
                            <i class="fa-solid fa-play"></i> Cek Kode
                        </button>
                    </div>
                    <textarea id="editor-misi-1"
                        class="w-full min-h-[140px] bg-[#1e1e1e] text-[#d4d4d4] p-5 font-mono text-sm outline-none resize-none leading-relaxed overflow-hidden"
                        spellcheck="false" placeholder="# Definisikan peta_rute di sini..." oninput="window.autoResizeEditor(this)"></textarea>

                    {{-- Simulasi Output Terminal Misi 1 --}}
                    <div id="output-misi-1"
                        class="hidden border-t border-slate-700 bg-black p-5 text-xs font-mono shrink-0 leading-relaxed">
                    </div>
                </div>

                {{-- Feedback Box Misi 1 --}}
                <div id="alert-misi-1" class="hidden mt-4 transition-all duration-500 text-left"></div>
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- MISI 2: LOGIKA INFINITY --}}
        {{-- ========================================== --}}
        <div
            class="mb-12 border-2 border-slate-200 rounded-xl overflow-hidden shadow-sm hover:border-amber-300 transition-colors">
            <div class="bg-slate-50 px-6 py-4 border-b border-slate-200 flex justify-between items-center">
                <h3 class="font-bold text-slate-800 text-lg flex items-center gap-2">
                    <span
                        class="bg-amber-500 text-white w-6 h-6 rounded-full flex items-center justify-center text-sm shadow-sm">2</span>
                    Misi 2: Mengatur Jarak Awal
                </h3>
                <span id="badge-misi-2"
                    class="hidden bg-green-500 text-white px-3 py-1 rounded text-xs font-bold shadow-sm flex items-center gap-1"><i
                        class="fa-solid fa-check"></i> Selesai</span>
            </div>
            <div class="p-6 bg-white">
                <p class="text-sm text-slate-700 leading-relaxed text-justify mb-3">
                    <strong>Skenario:</strong> Algoritma akan segera berjalan. Titik awal Anda adalah "Start".
                </p>
                <div class="text-sm text-slate-700 leading-relaxed mb-6">
                    <strong>Tugas Anda:</strong> Buat sebuah variabel bernama <code>catatan_jarak</code> bertipe
                    Dictionary biasa.
                    <ul class="list-disc list-outside ml-5 mt-2 mb-4 space-y-1.5">
                        <li>Beri jarak <strong>0</strong> untuk key "Start".</li>
                        <li>Beri jarak <strong>Tak Terhingga</strong> untuk key "Titik_X" dan "Titik_Y" menggunakan
                            fungsi bawaan Python.</li>
                    </ul>
                </div>

                {{-- Sandbox Editor Misi 2 --}}
                <div
                    class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-md border border-slate-700 font-mono text-sm flex flex-col">
                    <div
                        class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700 shrink-0">
                        <span class="text-slate-400 text-xs">Terminal Editor (main.py)</span>
                        <button onclick="window.koreksiMisi2()" id="btnMisi2"
                            class="bg-amber-600 hover:bg-amber-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors flex items-center gap-2 shadow-sm active:scale-95">
                            <i class="fa-solid fa-play"></i> Cek Kode
                        </button>
                    </div>
                    <textarea id="editor-misi-2"
                        class="w-full min-h-[140px] bg-[#1e1e1e] text-[#d4d4d4] p-5 font-mono text-sm outline-none resize-none leading-relaxed overflow-hidden"
                        spellcheck="false" placeholder="# Definisikan catatan_jarak di sini..." oninput="window.autoResizeEditor(this)"></textarea>

                    {{-- Simulasi Output Terminal Misi 2 --}}
                    <div id="output-misi-2"
                        class="hidden border-t border-slate-700 bg-black p-5 text-xs font-mono shrink-0 leading-relaxed">
                    </div>
                </div>

                {{-- Feedback Box Misi 2 --}}
                <div id="alert-misi-2" class="hidden mt-4 transition-all duration-500 text-left"></div>
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- MISI 3: PROSES RELAXATION --}}
        {{-- ========================================== --}}
        <div
            class="mb-10 border-2 border-slate-200 rounded-xl overflow-hidden shadow-sm hover:border-emerald-300 transition-colors">
            <div class="bg-slate-50 px-6 py-4 border-b border-slate-200 flex justify-between items-center">
                <h3 class="font-bold text-slate-800 text-lg flex items-center gap-2">
                    <span
                        class="bg-emerald-600 text-white w-6 h-6 rounded-full flex items-center justify-center text-sm shadow-sm">3</span>
                    Misi 3: Logika Keputusan
                </h3>
                <span id="badge-misi-3"
                    class="hidden bg-green-500 text-white px-3 py-1 rounded text-xs font-bold shadow-sm flex items-center gap-1"><i
                        class="fa-solid fa-check"></i> Selesai</span>
            </div>
            <div class="p-6 bg-white">
                <p class="text-sm text-slate-700 leading-relaxed text-justify mb-3">
                    <strong>Skenario:</strong> Di sinilah mesin mengambil keputusan! Anda sedang meninjau rute ke
                    "Kota_Z". Di tabel lama, tercatat <code>jarak_lama = 20</code>. Anda baru saja menemukan
                    <code>jalur_alternatif = 12</code>.
                </p>
                <div class="text-sm text-slate-700 leading-relaxed mb-6">
                    <strong>Tugas Anda:</strong> Buat blok kondisi <code>if</code>. Jika jalur alternatif ternyata
                    <strong>kurang dari</strong> jarak lama, maka <strong>ubah nilai</strong> variabel
                    <code>jarak_lama</code> menjadi sama dengan jalur alternatif!
                </div>

                {{-- Sandbox Editor Misi 3 --}}
                <div
                    class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-md border border-slate-700 font-mono text-sm flex flex-col">
                    <div
                        class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700 shrink-0">
                        <span class="text-slate-400 text-xs">Terminal Editor (main.py)</span>
                        <button onclick="window.koreksiMisi3()" id="btnMisi3"
                            class="bg-emerald-600 hover:bg-emerald-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors flex items-center gap-2 shadow-sm active:scale-95">
                            <i class="fa-solid fa-play"></i> Cek Kode
                        </button>
                    </div>
                    <textarea id="editor-misi-3"
                        class="w-full min-h-[160px] bg-[#1e1e1e] text-[#d4d4d4] p-5 font-mono text-sm outline-none resize-none leading-relaxed overflow-hidden"
                        spellcheck="false" oninput="window.autoResizeEditor(this)">
jarak_lama = 20
jalur_alternatif = 12

# Buat blok logika if Anda di bawah ini:
</textarea>

                    {{-- Simulasi Output Terminal Misi 3 --}}
                    <div id="output-misi-3"
                        class="hidden border-t border-slate-700 bg-black p-5 text-xs font-mono shrink-0 leading-relaxed">
                    </div>
                </div>

                {{-- Feedback Box Misi 3 --}}
                <div id="alert-misi-3" class="hidden mt-4 transition-all duration-500 text-left"></div>
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- AREA LAPORAN PRAKTIKUM (MUNCUL JIKA SEMUA MISI SELESAI) --}}
        {{-- ========================================== --}}
        <div id="area-laporan-praktikum" class="hidden border-t-2 border-dashed border-slate-300 pt-8 mt-10">
            <div class="bg-blue-50 border-2 border-blue-200 rounded-xl p-6 shadow-sm relative overflow-hidden">
                <div class="absolute top-0 left-0 w-1.5 h-full bg-blue-500"></div>
                <label
                    class="block text-base font-black text-blue-900 mb-2 flex items-center gap-2 uppercase tracking-wide">
                    <i class="fa-solid fa-pen-nib"></i> Laporan Akhir Praktikum
                </label>
                {{-- INSTRUKSI DIREVISI: FOKUS KE KODE SAJA --}}
                <p class="text-sm text-blue-800 mb-4 leading-relaxed font-medium">Berdasarkan 3 Misi yang baru saja Anda
                    selesaikan di atas, jelaskan secara singkat alur dan logika dari masing-masing kode pembentuk
                    algoritma Dijkstra yang telah Anda susun.</p>
                <textarea id="penjelasan-praktikum"
                    class="w-full border-2 border-blue-200 rounded-lg p-4 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none resize-y min-h-[120px] placeholder:text-slate-400 font-medium text-slate-700"
                    placeholder="Ketik laporan penjelasan Anda di sini..."></textarea>

                <button onclick="submitLaporanPraktikum()" id="btn-submit-praktikum"
                    class="w-full mt-4 py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 shadow-md transition-all active:scale-95 flex justify-center items-center gap-2">
                    <i class="fa-solid fa-cloud-arrow-up"></i> SIMPAN LAPORAN KE DOSEN
                </button>
                <div id="alert-laporan" class="hidden text-center p-3 rounded-lg text-sm font-bold mt-3"></div>
            </div>
        </div>

        {{-- Navigasi Bawah --}}
        <div class="flex justify-between gap-4 mt-12 pt-6 border-t border-slate-200">
            <button type="button" onclick="prevStep()"
                class="px-6 py-2.5 rounded-lg border border-slate-300 font-bold text-slate-600 hover:bg-slate-50 transition shadow-sm active:scale-95">
                ← Kembali ke Rangkuman
            </button>
            <button type="button" id="btnFinishPraktikum" onclick="nextStep()"
                class="px-6 py-2.5 bg-slate-900 hover:bg-slate-800 text-white font-bold rounded-lg shadow-md transition-all active:scale-95 opacity-50 cursor-not-allowed hidden"
                disabled>
                Lanjut Refleksi <i class="fa-solid fa-arrow-right ml-2"></i>
            </button>
        </div>

    </div>

    {{-- SCRIPT SISTEM AUTO-KOREKSI CERDAS --}}
    <script>
        // FUNGSI SUPER RESIZE
        window.autoResizeEditor = function(el) {
            if (!el) return;
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
            if (localStorage.getItem('prak4_misi1_' + userId) === 'true') {
                const ed1 = document.getElementById('editor-misi-1');
                ed1.value = localStorage.getItem('prak4_misi1_code_' + userId) || "";
                window.autoResizeEditor(ed1);
                if (ed1.value.trim() !== "") window.koreksiMisi1();
            }

            // Inisialisasi Misi 2
            if (localStorage.getItem('prak4_misi2_' + userId) === 'true') {
                const ed2 = document.getElementById('editor-misi-2');
                ed2.value = localStorage.getItem('prak4_misi2_code_' + userId) || "";
                window.autoResizeEditor(ed2);
                if (ed2.value.trim() !== "") window.koreksiMisi2();
            }

            // Inisialisasi Misi 3
            if (localStorage.getItem('prak4_misi3_' + userId) === 'true') {
                const ed3 = document.getElementById('editor-misi-3');
                ed3.value = localStorage.getItem('prak4_misi3_code_' + userId) || "";
                window.autoResizeEditor(ed3);
                if (ed3.value.trim() !== "") window.koreksiMisi3();
            }

            cekSemuaMisiSelesai();
        });

        // FUNGSI MARK SELESAI
        function markMisiSelesai(misiId) {
            document.getElementById('badge-misi-' + misiId).classList.remove('hidden');
            const btn = document.getElementById('btnMisi' + misiId);

            btn.innerHTML = '<i class="fa-solid fa-check-double"></i> Code Valid';
            btn.className =
                `bg-green-600 hover:bg-green-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors flex items-center gap-2 shadow-sm active:scale-95`;
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

                    const btnNext = document.getElementById('btnFinishPraktikum');
                    btnNext.disabled = false;
                    btnNext.classList.remove('hidden', 'opacity-50', 'cursor-not-allowed', 'bg-slate-900');
                    btnNext.classList.add('bg-blue-600', 'hover:bg-blue-700');

                    const btnSubmit = document.getElementById('btn-submit-praktikum');
                    btnSubmit.innerHTML = '<i class="fa-solid fa-check"></i> LAPORAN TERKIRIM';
                    btnSubmit.classList.replace('bg-blue-600', 'bg-green-600');
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
            window.autoResizeEditor(document.getElementById('editor-misi-1'));

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

                alertBox.className = "mt-4 p-5 rounded-lg text-sm shadow-sm border bg-green-50 border-green-300";
                alertBox.innerHTML = `
                    <div class="font-bold text-green-800 mb-2 flex items-center gap-2">
                        <i class="fa-solid fa-circle-check text-green-600 text-lg"></i> Berhasil! Format Nested Dictionary Anda sudah tepat.
                    </div>
                    <p class="text-green-800 leading-relaxed text-justify">
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

                let err = '<ul class="list-disc ml-5 font-normal mt-2 space-y-1">';
                if (!hasVar) err += '<li>Pastikan nama variabelnya sama persis: <code>peta_rute = </code></li>';
                if (!hasA) err +=
                    '<li>Buat kunci utama <code>"A"</code> yang isinya adalah kamus kurung kurawal baru <code>{}</code></li>';
                if (!hasB || !hasC) err +=
                    '<li>Pastikan di dalam simpul "A" memuat <code>"B": 4</code> dan <code>"C": 7</code>.</li>';
                err += '</ul>';

                alertBox.className =
                    "mt-4 p-5 rounded-lg text-sm shadow-sm border bg-red-50 text-red-800 border-red-300";
                alertBox.innerHTML = '<strong>❌ Auto-Koreksi Gagal. Analisis Kesalahan:</strong>' + err;
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
            window.autoResizeEditor(document.getElementById('editor-misi-2'));

            if (code.trim() === "") {
                outBox.innerHTML =
                    '<span class="text-slate-400">&gt; root@dijkstra: python main.py</span><br><span class="text-[#ff5f56]">SyntaxError: File kosong. Silakan tulis kode Anda.</span>';
                alertBox.classList.add('hidden');
                return;
            }

            const cleanCode = cleanString(code.replace(/#.*/g, ''));
            const hasVar = cleanCode.includes('catatan_jarak=');
            const hasStart = cleanCode.includes('"Start":0');
            const hasInf = cleanCode.includes('float("inf")');
            const hasX = cleanCode.includes('"Titik_X"');
            const hasY = cleanCode.includes('"Titik_Y"');

            if (hasVar && hasStart && hasInf && hasX && hasY) {
                outBox.innerHTML =
                    `<span class="text-slate-400">&gt; root@dijkstra: python main.py</span><br><span class="text-[#d4d4d4]">Inisialisasi tabel jarak...</span><br><span class="text-[#4af626]">Kompilasi Berhasil. Tabel siap digunakan.</span>`;

                alertBox.className = "mt-4 p-5 rounded-lg text-sm shadow-sm border bg-green-50 border-green-300";
                alertBox.innerHTML = `
                    <div class="font-bold text-green-800 mb-2 flex items-center gap-2">
                        <i class="fa-solid fa-circle-check text-green-600 text-lg"></i> Luar biasa! Tabel awal Anda sangat presisi.
                    </div>
                    <p class="text-green-800 leading-relaxed text-justify">
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

                let err = '<ul class="list-disc ml-5 font-normal mt-2 space-y-1">';
                if (!hasVar) err += '<li>Nama variabel harus persis: <code>catatan_jarak = {}</code></li>';
                if (!hasStart) err += '<li>Titik "Start" harus diisi dengan angka 0.</li>';
                if (!hasX || !hasY) err +=
                    '<li>Pastikan Anda menulis key <code>"Titik_X"</code> dan <code>"Titik_Y"</code>.</li>';
                if (!hasInf) err += '<li>Gunakan fungsi <code>float(\'inf\')</code> untuk nilai tak terhingga!</li>';
                err += '</ul>';

                alertBox.className =
                    "mt-4 p-5 rounded-lg text-sm shadow-sm border bg-red-50 text-red-800 border-red-300";
                alertBox.innerHTML = '<strong>❌ Auto-Koreksi Gagal. Analisis Kesalahan:</strong>' + err;
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
            window.autoResizeEditor(document.getElementById('editor-misi-3'));

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

                alertBox.className = "mt-4 p-5 rounded-lg text-sm shadow-sm border bg-green-50 border-green-300";
                alertBox.innerHTML = `
                    <div class="font-bold text-green-800 mb-2 flex items-center gap-2">
                        <i class="fa-solid fa-circle-check text-green-600 text-lg"></i> Brilian! Logika Relaxation Anda sempurna.
                    </div>
                    <p class="text-green-800 leading-relaxed text-justify">
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

                let err = '<ul class="list-disc ml-5 font-normal mt-2 space-y-1">';
                if (!hasIf) err +=
                    '<li>Pastikan Anda membuat logika kondisi <code>if jalur_alternatif < jarak_lama:</code></li>';
                if (!hasAssign) err +=
                    '<li>Jika syarat terpenuhi, ganti isi variabel lama menjadi nilai alternatif dengan cara <code>jarak_lama = jalur_alternatif</code>.</li>';
                err += '</ul>';

                alertBox.className =
                    "mt-4 p-5 rounded-lg text-sm shadow-sm border bg-red-50 text-red-800 border-red-300";
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
                    alertBox.classList.remove('hidden', 'bg-red-100', 'text-red-700');
                    alertBox.classList.add('bg-green-100', 'text-green-700');
                    alertBox.innerHTML =
                        '<i class="fa-solid fa-circle-check mr-2"></i> Laporan Praktikum berhasil dikirim! Menunggu review Dosen.';

                    btnSubmit.innerHTML = '<i class="fa-solid fa-check"></i> LAPORAN TERKIRIM';
                    btnSubmit.classList.replace('bg-blue-600', 'bg-green-600');

                    btnNext.disabled = false;
                    btnNext.classList.remove('hidden', 'opacity-50', 'cursor-not-allowed', 'bg-slate-900');
                    btnNext.classList.add('bg-blue-600', 'hover:bg-blue-700');

                    localStorage.setItem('prak4_laporan_dikirim_' + userId, 'true');

                    if (typeof simpanProgressAktivitas === 'function') {
                        simpanProgressAktivitas('bab4', '4.6_praktikum', 100);
                    }
                })
                .catch(err => {
                    console.error(err);
                    alertBox.classList.remove('hidden', 'bg-green-100', 'text-green-700');
                    alertBox.classList.add('bg-red-100', 'text-red-700');
                    alertBox.innerHTML =
                        '<i class="fa-solid fa-triangle-exclamation mr-2"></i> Gagal mengirim laporan. Periksa koneksi internet Anda.';

                    btnSubmit.disabled = false;
                    btnSubmit.innerHTML = '<i class="fa-solid fa-cloud-arrow-up"></i> COBA LAGI';
                });
        }
    </script>
</section>
