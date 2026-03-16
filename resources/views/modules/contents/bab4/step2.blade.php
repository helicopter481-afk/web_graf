<section id="step-2" class="step-slide">

    <style>
        /* CSS Animasi Buka Kunci (Unlock) */
        .unlock-transition {
            transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .locked-content {
            filter: blur(8px) grayscale(50%);
            opacity: 0.6;
            pointer-events: none;
            user-select: none;
        }
        .unlocked-content {
            filter: blur(0) grayscale(0%);
            opacity: 1;
            pointer-events: auto;
            user-select: auto;
        }
        /* Anti Copy untuk contoh kode */
        .anti-copas {
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            pointer-events: none;
        }
    </style>

    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-8 md:p-10 max-w-6xl mx-auto -mt-8">

        {{-- JUDUL MATERI --}}
        <div class="border-b border-slate-200 pb-6 mb-8 text-left">
            <h2 class="text-2xl md:text-3xl font-bold text-slate-900 mb-2">4.2 Logika <span class="italic font-serif">Infinity</span> dan Tabel Jarak</h2>
            <p class="text-slate-500 font-medium">Mempersiapkan buku catatan algoritma sebelum memulai pencarian rute terpendek.</p>
        </div>

        {{-- KONTEN TEORI & VISUALISASI TABEL --}}
        <div class="grid md:grid-cols-12 gap-8 mb-10 items-center">
            
            {{-- Kolom Kiri: Teori --}}
            <div class="md:col-span-7 prose prose-slate text-slate-700 leading-relaxed text-justify max-w-none flex flex-col h-full">
                <p class="mb-3">
                    Berbeda dengan penelusuran biasa, Algoritma Dijkstra bekerja seperti seorang akuntan. Ia membuat sebuah <strong>"Tabel Catatan"</strong> memori untuk menyimpan informasi jarak terpendek ke setiap titik yang diketahui sejauh ini.
                </p>
                <p>
                    <strong>Aturan utamanya:</strong> Sebelum penelusuran dimulai, komputer sama sekali tidak tahu seberapa jauh jarak ke lokasi-lokasi lain. Oleh karena itu, jarak ke semua lokasi selain titik awal dianggap <strong>Tak Terhingga (Belum diketahui)</strong>. 
                </p>
                <p>
                    Di dalam bahasa Python, kita menggunakan tipe data <em>float</em> khusus yaitu <code class="bg-slate-100 px-1.5 py-0.5 rounded text-blue-600 font-bold">float('inf')</code> untuk merepresentasikan angka <em>Infinity</em> (Tak Terhingga).
                </p>
            </div>

            {{-- Kolom Kanan: Visualisasi Tabel Dinamis --}}
            <div class="md:col-span-5 bg-slate-50 border-2 border-slate-200 rounded-xl overflow-hidden shadow-inner flex flex-col items-center">
                <div class="bg-slate-200/80 py-2 px-4 border-b border-slate-300 flex justify-between items-center w-full backdrop-blur-sm">
                    <span class="text-xs font-bold text-slate-700 uppercase tracking-widest">Simulasi Tabel Memori</span>
                    <i class="fa-solid fa-table-list text-slate-500"></i>
                </div>
                
                <div class="p-6 w-full flex flex-col items-center">
                    <p class="text-xs text-slate-500 mb-3 text-center font-bold">Klik tombol untuk menginisialisasi tabel pencarian dari titik awal "Rumah".</p>
                    
                    <table class="w-full bg-white border border-slate-200 rounded-lg shadow-sm text-center overflow-hidden mb-4">
                        <thead class="bg-slate-100 border-b border-slate-200 text-xs text-slate-600 uppercase">
                            <tr>
                                <th class="py-2 border-r border-slate-200">Lokasi</th>
                                <th class="py-2">Jarak dari Rumah</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm font-medium text-slate-700">
                            <tr class="border-b border-slate-100">
                                <td class="py-2.5 border-r border-slate-200 bg-blue-50/50">Rumah (Start)</td>
                                <td class="py-2.5 transition-all duration-500" id="val-rumah">?</td>
                            </tr>
                            <tr class="border-b border-slate-100">
                                <td class="py-2.5 border-r border-slate-200">Pasar</td>
                                <td class="py-2.5 transition-all duration-500" id="val-pasar">?</td>
                            </tr>
                            <tr>
                                <td class="py-2.5 border-r border-slate-200">Kampus</td>
                                <td class="py-2.5 transition-all duration-500" id="val-kampus">?</td>
                            </tr>
                        </tbody>
                    </table>

                    <button id="btn-init-table" onclick="initDijkstraTable()" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg text-sm shadow-md transition-colors active:scale-95 w-full">
                        <i class="fa-solid fa-wand-magic-sparkles mr-1"></i> Jalankan Inisialisasi Dijkstra
                    </button>

                    <div id="table-feedback" class="hidden mt-4 bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs p-3 rounded-lg text-center leading-relaxed font-medium">
                        Keren! Jarak <strong>Rumah ke Rumah adalah 0</strong>. Sedangkan lokasi lain diset <strong>Infinity (Tak Terhingga)</strong> karena rutenya belum dieksplorasi.
                    </div>
                </div>
            </div>
        </div>

        {{-- CONTOH KODE PROGRAM (ANTI-COPY) --}}
        <div class="mb-8">
            <h3 class="text-lg font-bold text-slate-800 mb-3 flex items-center gap-2 text-left">
                <i class="fa-solid fa-laptop-code text-slate-500"></i> Contoh Kode Program:
            </h3>
            
            {{-- Tampilan Gambar Kode (Hanya Baca) --}}
            <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 select-none pointer-events-none mb-6 anti-copas text-left">
                <div class="bg-[#2d2d2d] px-4 py-2.5 flex items-center gap-2 border-b border-slate-700">
                    <div class="flex gap-1.5">
                        <div class="w-3 h-3 rounded-full bg-[#ff5f56]"></div>
                        <div class="w-3 h-3 rounded-full bg-[#ffbd2e]"></div>
                        <div class="w-3 h-3 rounded-full bg-[#27c93f]"></div>
                    </div>
                    <span class="text-slate-400 text-xs ml-2 font-mono">Contoh Kode dari Modul (Hanya Baca)</span>
                </div>
                <div class="p-6 font-mono text-sm leading-loose overflow-x-auto text-[#d4d4d4]">
<span class="text-[#6a9955]"># Titik awal kita adalah "Rumah"</span>
<div><span class="text-[#9cdcfe]">lokasi</span> = [<span class="text-[#ce9178]">"Rumah"</span>, <span class="text-[#ce9178]">"Pasar"</span>, <span class="text-[#ce9178]">"Kampus"</span>]</div>
<div><span class="text-[#9cdcfe]">tabel_jarak</span> = {}</div>
<br>
<span class="text-[#6a9955]"># Mengisi semua jarak dengan Infinity terlebih dahulu</span>
<div><span class="text-[#c586c0]">for</span> tempat <span class="text-[#c586c0]">in</span> lokasi:</div>
<div class="ml-4">tabel_jarak[tempat] = <span class="text-[#dcdcaa]">float</span>(<span class="text-[#ce9178]">'inf'</span>)</div>
<br>
<span class="text-[#6a9955]"># Karena kita SEDANG berada di Rumah, jarak ke Rumah adalah 0</span>
<div>tabel_jarak[<span class="text-[#ce9178]">"Rumah"</span>] = <span class="text-[#b5cea8]">0</span></div>
<br>
<div><span class="text-[#dcdcaa]">print</span>(<span class="text-[#ce9178]">"Tabel Jarak Awal:"</span>, tabel_jarak)</div>
                </div>
            </div>

            {{-- PENJELASAN KODE PROGRAM --}}
            <div class="p-6 border border-slate-200 rounded-xl bg-slate-50 shadow-sm text-left">
                <h4 class="font-bold text-slate-800 text-sm mb-3">Penjelasan Kode:</h4>
                <ul class="list-disc list-outside ml-5 text-sm text-slate-700 space-y-2 leading-relaxed text-justify">
                    <li>Kode ini menunjukkan proses membuat <strong>tabel jarak awal</strong> seperti pada algoritma pencarian jarak (Dijkstra).</li>
                    <li>Pertama, dibuat daftar <code>lokasi</code> yaitu "Rumah", "Pasar", dan "Kampus". Lalu dibuat dictionary kosong bernama <code>tabel_jarak</code> untuk menyimpan data dari titik awal ke setiap lokasi.</li>
                    <li>Selanjutnya (menggunakan perulangan <code>for</code>), semua lokasi diisi dengan nilai <code>float('inf')</code>, yang berarti <strong>tak hingga (infinity)</strong>. Ini menandakan bahwa jarak ke semua tempat awalnya belum diketahui atau dianggap sangat jauh.</li>
                    <li>Karena posisi awal berada di "Rumah", maka jarak ke "Rumah" diubah menjadi <strong>0</strong>. Artinya, jarak dari Rumah ke Rumah sendiri adalah nol.</li>
                </ul>
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- INTERACTIVE SANDBOX: KETIK ULANG KODE --}}
        {{-- ========================================== --}}
        <div class="mb-10 bg-blue-50/30 border-2 border-blue-200 p-6 rounded-xl shadow-sm text-left">
            <h3 class="text-lg font-bold text-slate-800 mb-2">Buktikan Pemahaman Anda!</h3>
            <p class="text-sm text-slate-600 mb-4">
                Ketik ulang keseluruhan kode contoh di atas ke dalam editor di bawah ini (baris komentar warna hijau tidak wajib diketik). Jalankan programnya untuk <strong>membuka kunci</strong> penjelasan output serta Aktivitas 4.2!
            </p>

            <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 font-mono text-sm flex flex-col">
                <div class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700 shrink-0">
                    <span class="text-slate-400 text-xs">Terminal Editor Pyodide</span>
                    <button onclick="window.runDemoBox42()" id="btn-demo42" class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors shadow-sm active:scale-95">
                        <i class="fa-solid fa-play mr-1"></i> Jalankan Kode
                    </button>
                </div>
                
                <textarea id="editor-demo42" class="w-full min-h-[180px] bg-[#1e1e1e] text-[#d4d4d4] px-5 pt-5 pb-2 font-mono text-sm outline-none resize-none leading-relaxed overflow-hidden text-left" spellcheck="false" placeholder="# Ketik ulang kode Python di sini..." oninput="window.autoResizeEditor(this)"></textarea>

                {{-- WADAH OUTPUT (RATA KIRI & RAPI) --}}
                <div class="px-5 pb-5 pt-2 bg-[#1e1e1e] text-left w-full">
                    <hr class="border-slate-700 mb-4">
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-slate-500 text-[10px] font-bold tracking-widest uppercase">OUTPUT TERMINAL</span>
                        <span id="status-demo42" class="bg-slate-800 text-slate-400 px-2 py-0.5 rounded text-[10px]">Ready</span>
                    </div>
                    <div id="output-demo42" class="block text-left text-[#4af626] whitespace-pre-wrap break-words min-h-[20px] italic opacity-60 m-0 p-0">(Output terminal akan tampil di sini setelah dijalankan)</div>
                </div>
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- KONTEN TERKUNCI (OUTPUT + AKTIVITAS 4.2) --}}
        {{-- ========================================== --}}
        <div id="locked-section-42" class="relative locked-content unlock-transition pb-6 text-left">
            
            {{-- Overlay Gembok --}}
            <div id="lock-overlay-42" class="absolute inset-0 z-30 flex flex-col items-center justify-center bg-white/50 backdrop-blur-[3px] rounded-xl transition-opacity duration-500">
                <div class="bg-white p-5 rounded-2xl shadow-xl flex flex-col items-center border border-slate-200 animate-bounce">
                    <i class="fa-solid fa-lock text-4xl text-slate-400 mb-3"></i>
                    <p class="text-sm font-bold text-slate-600 text-center">Konten Terkunci</p>
                    <p class="text-xs text-slate-500 text-center mt-1">Ketik dan jalankan kode di atas<br>dengan benar untuk membuka.</p>
                </div>
            </div>

            {{-- Penjelasan Output Program --}}
            <div id="explanation-box-42" class="mb-10 p-6 border border-slate-200 rounded-xl bg-white shadow-sm scroll-mt-24">
                <h4 class="font-bold text-slate-800 text-base mb-3">Penjelasan Output Program:</h4>
                <div class="bg-black text-[#4af626] text-left font-mono text-sm p-4 rounded-md shadow-inner mb-4 inline-block block w-fit">
                    Tabel Jarak Awal: {'Rumah': 0, 'Pasar': inf, 'Kampus': inf}
                </div>
                <p class="text-sm text-slate-700 text-justify leading-relaxed mb-3">
                    Output di atas menunjukkan bahwa:
                </p>
                <ul class="list-disc list-outside ml-5 text-sm text-slate-700 space-y-2 leading-relaxed text-justify">
                    <li>Jarak dari <strong>Rumah ke Rumah</strong> adalah <strong>0</strong>, karena itu adalah titik awal (kita sudah berada di sana).</li>
                    <li>Jarak ke <strong>Pasar</strong> dan <strong>Kampus</strong> masih bernilai <strong>inf (infinity)</strong>, artinya jaraknya belum diketahui atau belum dihitung.</li>
                    <li>Nilai <code>inf</code> digunakan sebagai tanda awal bahwa suatu lokasi belum memiliki jarak pasti. Nantinya, nilai tersebut akan diperbarui dengan angka nyata setelah proses perhitungan jarak (Dijkstra) dilakukan.</li>
                </ul>
            </div>

            {{-- AKTIVITAS 4.2: FILL IN THE BLANKS --}}
            <div id="activity-42-container" class="border-2 border-slate-200 rounded-xl overflow-hidden shadow-sm">
                <div class="bg-yellow-50 px-6 py-4 border-b border-yellow-200 flex justify-between items-center">
                    <h3 class="font-bold text-yellow-800 text-lg flex items-center gap-2">
                        <i class="fa-solid fa-lightbulb text-yellow-600"></i> Aktivitas 4.2 – Live Coding: Inisiasi <em>Infinity</em>
                    </h3>
                    <span id="badge-act42" class="hidden bg-green-500 text-white px-3 py-1 rounded text-xs font-bold shadow-sm flex items-center gap-1"><i class="fa-solid fa-check"></i> Selesai</span>
                </div>
                <div class="p-6 bg-white">
                    <div class="bg-white/80 p-4 rounded border border-blue-200 font-medium text-blue-900 text-sm shadow-sm leading-relaxed mb-6">
                        <strong>Tugas Anda:</strong> Buat sebuah variabel bernama <code>jarak_sementara</code> dan berikan nilai matematis <em>Tak Terhingga (Infinity)</em> menggunakan fungsi bawaan Python!
                    </div>

                    <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 font-mono text-sm flex flex-col">
                        <div class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700">
                            <span class="text-slate-400 text-xs">Terminal Aktivitas (main.py)</span>
                            <button onclick="window.runAktivitas42()" id="btnRunAct42" class="bg-yellow-600 hover:bg-yellow-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors shadow-sm active:scale-95" disabled>
                                Jalankan & Periksa
                            </button>
                        </div>
                        
                        <div class="p-6 leading-relaxed text-[#d4d4d4] overflow-x-auto whitespace-nowrap text-left">
                            <div class="text-[#6a9955]"># Tulis fungsi Infinity Python di bawah ini:</div>
                            <div class="flex items-center mt-1 text-left mb-4">
                                <span class="text-[#9cdcfe]">jarak_sementara</span> = <input type="text" id="input42_1" class="bg-[#3c3c3c] text-[#dcdcaa] border border-slate-500 rounded px-2 py-0.5 mx-1 w-32 outline-none focus:border-blue-400 focus:bg-[#2d2d2d] text-center transition-colors shadow-inner" autocomplete="off" spellcheck="false" disabled placeholder=".............">
                            </div>

                            <div class="text-[#6a9955]"># Mengecek apakah sistem berhasil membaca logika matematika</div>
                            <div><span class="text-[#c586c0]">if</span> <span class="text-[#9cdcfe]">jarak_sementara</span> > <span class="text-[#b5cea8]">999999999</span>:</div>
                            <div class="ml-4"><span class="text-[#dcdcaa]">print</span>(<span class="text-[#ce9178]">"Berhasil! Nilai ini lebih besar dari angka berapapun."</span>)</div>
                            
                            {{-- WADAH OUTPUT (RATA KIRI & RAPI) --}}
                            <div class="mt-6 pt-4 border-t border-slate-700 text-left w-full">
                                <div class="flex justify-between items-center mb-3">
                                    <span class="text-slate-500 text-[10px] font-bold tracking-widest uppercase">OUTPUT TERMINAL</span>
                                    <span id="status-act42" class="bg-slate-800 text-slate-400 px-2 py-0.5 rounded text-[10px]">Ready</span>
                                </div>
                                <div id="console-text-42" class="block text-left text-[#4af626] whitespace-pre-wrap break-words leading-relaxed text-sm italic opacity-60 m-0 p-0">(Output terminal akan tampil di sini setelah dijalankan)</div>
                            </div>
                        </div>
                    </div>

                    <div id="alert-42" class="hidden mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border transition-all text-left"></div>
                </div>
            </div>

            {{-- Navigasi Bawah --}}
            <div class="flex justify-between gap-4 mt-12 pt-6 border-t border-slate-200">
                <button type="button" onclick="prevStep()" class="px-6 py-2.5 rounded-lg border border-slate-300 font-bold text-slate-600 hover:bg-slate-50 transition shadow-sm active:scale-95">
                    Kembali
                </button>
                <button type="button" id="btnNext42" onclick="nextStep()" class="px-6 py-2.5 bg-slate-900 hover:bg-slate-800 text-white font-bold rounded-lg shadow-md transition-all active:scale-95 opacity-50 cursor-not-allowed" disabled>
                    Lanjut
                </button>
            </div>
        </div>

    </div>

    {{-- SCRIPT LOGIKA (ANTI BUG, PYODIDE SAFE) --}}
    <script>
        // --- 1. VISUALISASI TABEL DINAMIS ---
        function initDijkstraTable() {
            const valRumah = document.getElementById('val-rumah');
            const valPasar = document.getElementById('val-pasar');
            const valKampus = document.getElementById('val-kampus');
            const feedback = document.getElementById('table-feedback');
            const btn = document.getElementById('btn-init-table');

            // Set Loading state
            valRumah.innerHTML = '<i class="fa-solid fa-spinner fa-spin text-slate-400"></i>';
            valPasar.innerHTML = '<i class="fa-solid fa-spinner fa-spin text-slate-400"></i>';
            valKampus.innerHTML = '<i class="fa-solid fa-spinner fa-spin text-slate-400"></i>';
            
            setTimeout(() => {
                valRumah.innerText = '0';
                valRumah.className = 'py-2.5 text-green-600 font-black text-lg bg-green-50/50';
                
                valPasar.innerHTML = '&infin;';
                valPasar.className = 'py-2.5 text-red-500 font-black text-2xl';
                
                valKampus.innerHTML = '&infin;';
                valKampus.className = 'py-2.5 text-red-500 font-black text-2xl';

                feedback.classList.remove('hidden');
                
                btn.innerHTML = '<i class="fa-solid fa-check mr-1"></i> Inisialisasi Selesai';
                btn.classList.replace('bg-blue-600', 'bg-emerald-600');
                btn.classList.replace('hover:bg-blue-700', 'hover:bg-emerald-700');
                btn.disabled = true;
            }, 800);
        }

        // --- 2. FUNGSI AUTO RESIZE EDITOR ---
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

        function cleanCodeStr(str) {
            return str.replace(/\s+/g, '').replace(/'/g, '"');
        }

        // --- 3. PYODIDE GLOBAL LOADER (SANGAT AMAN ANTI ERROR NULL) ---
        window.pyodideReadyPromise = null;
        window.ensurePyodideReady = async function() {
            if (window.pyodide) return window.pyodide;
            if (!window.pyodideReadyPromise) {
                window.pyodideReadyPromise = new Promise((resolve, reject) => {
                    if (window.loadPyodide) {
                        window.loadPyodide({ indexURL: 'https://cdn.jsdelivr.net/pyodide/v0.24.1/full/' })
                            .then(resolve).catch(reject);
                    } else {
                        const script = document.createElement('script');
                        script.src = 'https://cdn.jsdelivr.net/pyodide/v0.24.1/full/pyodide.js';
                        script.onload = () => {
                            window.loadPyodide({ indexURL: 'https://cdn.jsdelivr.net/pyodide/v0.24.1/full/' })
                                .then(resolve).catch(reject);
                        };
                        script.onerror = () => reject(new Error("Gagal memuat Pyodide script."));
                        document.head.appendChild(script);
                    }
                });
            }
            window.pyodide = await window.pyodideReadyPromise;
            return window.pyodide;
        };

        // --- 4. INIT & PERSISTENCE ---
        document.addEventListener("DOMContentLoaded", function() {
            const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
            
            // Cek Status Sandbox Demo (PERSISTENCE SAFE)
            if (localStorage.getItem('materi4_2_demo_' + userId) === 'true') {
                const edDemo = document.getElementById('editor-demo42');
                const outDemoText = document.getElementById('output-demo42');
                const statusDemo = document.getElementById('status-demo42');
                const btnDemo = document.getElementById('btn-demo42');
                
                if (edDemo && outDemoText && statusDemo && btnDemo) {
                    edDemo.value = localStorage.getItem('materi4_2_demo_code_' + userId) || "";
                    window.autoResizeEditor(edDemo);
                    
                    // Format Output Blok yang Rapi Rata Kiri
                    outDemoText.innerHTML = `
                        <div class="mb-1 text-slate-400">&gt; python main.py</div>
                        <div class="text-[#4af626]">Tabel Jarak Awal: {'Rumah': 0, 'Pasar': inf, 'Kampus': inf}</div>
                    `;
                    outDemoText.classList.remove('italic', 'opacity-60');
                    
                    statusDemo.innerText = "Success";
                    statusDemo.className = "bg-green-700 text-white px-2 py-0.5 rounded text-[10px]";

                    btnDemo.innerHTML = 'Program Berhasil';
                    btnDemo.classList.replace('bg-blue-600', 'bg-emerald-600');
                    btnDemo.classList.replace('hover:bg-blue-500', 'hover:bg-emerald-500');

                    unlockSection42(true); // Unlock instantly
                }
            }

            // Cek Status Aktivitas (PERSISTENCE SAFE)
            const isDoneServer = {{ isset($progress['4.2']) && $progress['4.2']->score == 100 ? 'true' : 'false' }};
            const savedInput1 = localStorage.getItem('act_4_2_ans1_' + userId) || "float('inf')";

            if (isDoneServer || localStorage.getItem('act_4_2_done_' + userId) === 'true') {
                window.kunciJawabanAktivitas42(savedInput1);
            }
        });

        // --- 5. VALIDATOR SANDBOX DEMO KODE ---
        window.runDemoBox42 = async function() {
            const code = document.getElementById('editor-demo42').value;
            const outText = document.getElementById('output-demo42');
            const statusTerm = document.getElementById('status-demo42');
            const btnRun = document.getElementById('btn-demo42');
            
            if(!outText || !statusTerm || !btnRun) return;

            outText.classList.remove('italic', 'opacity-60');
            window.autoResizeEditor(document.getElementById('editor-demo42'));

            if (code.trim() === "") {
                outText.innerHTML = '<span class="text-[#ff5f56]">SyntaxError: Editor kosong. Ketikkan contoh kode di atas.</span>';
                return;
            }

            btnRun.innerHTML = 'Memproses...';
            btnRun.disabled = true;
            statusTerm.innerText = "Running...";
            statusTerm.className = "bg-yellow-600 text-white px-2 py-0.5 rounded text-[10px] animate-pulse";

            try {
                const py = await window.ensurePyodideReady();
                py.runPython(`import sys\nfrom io import StringIO\nsys.stdout = StringIO()`);
                py.runPython(code);
                let stdout = py.runPython('sys.stdout.getvalue()');
                stdout = stdout.trim(); 
                
                const clean = cleanCodeStr(code.replace(/#.*/g, ''));
                const hasDict = clean.includes('tabel_jarak={}');
                const hasInf = clean.includes('float("inf")') || clean.includes("float('inf')");
                const hasZero = clean.includes('tabel_jarak["Rumah"]=0');
                // Regex check for dictionary print output because order doesn't matter
                const hasPrintMatch = stdout.includes("'Rumah': 0") && stdout.includes("'Pasar': inf") && stdout.includes("'Kampus': inf");

                if (hasDict && hasInf && hasZero && hasPrintMatch) {
                    outText.innerHTML = `
                        <div class="mb-1 text-slate-400">&gt; python main.py</div>
                        <div class="text-[#4af626]">${stdout.replace(/\n/g, '<br>')}</div>
                    `;
                    
                    statusTerm.innerText = "Success";
                    statusTerm.className = "bg-green-700 text-white px-2 py-0.5 rounded text-[10px]";

                    btnRun.innerHTML = 'Program Berhasil';
                    btnRun.classList.replace('bg-blue-600', 'bg-emerald-600');
                    btnRun.classList.replace('hover:bg-blue-500', 'hover:bg-emerald-500');

                    const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                    localStorage.setItem('materi4_2_demo_' + userId, 'true');
                    localStorage.setItem('materi4_2_demo_code_' + userId, code);
                    
                    unlockSection42(false); 
                } else {
                    outText.innerHTML = `
                        <div class="mb-1 text-slate-400">&gt; python main.py</div>
                        <div class="text-[#ffbd2e]">${stdout.replace(/\n/g, '<br>')} <br><br>> Validasi Gagal: Pastikan Anda mengetik perulangan float('inf') dan nilai 0 pada "Rumah" sesuai contoh.</div>
                    `;
                    statusTerm.innerText = "Logic Error";
                    statusTerm.className = "bg-amber-600 text-white px-2 py-0.5 rounded text-[10px]";
                }
            } catch (err) {
                outText.innerHTML = `<span class="text-[#ff5f56]">Traceback (most recent call last):<br>${err.message}</span>`;
                statusTerm.innerText = "Error";
                statusTerm.className = "bg-red-800 text-red-200 px-2 py-0.5 rounded text-[10px]";
            } finally {
                if (btnRun.innerHTML.includes('Memproses')) {
                    btnRun.innerHTML = 'Coba Lagi';
                    btnRun.disabled = false;
                }
            }
        };

        function unlockSection42(isInstant = false) {
            const section = document.getElementById('locked-section-42');
            const overlay = document.getElementById('lock-overlay-42');
            const btnAct = document.getElementById('btnRunAct42');
            const in1 = document.getElementById('input42_1');

            if(!section || !overlay) return;

            section.classList.remove('locked-content');
            section.classList.add('unlocked-content');
            
            if (isInstant) {
                overlay.style.display = 'none';
            } else {
                overlay.classList.add('opacity-0');
                setTimeout(() => { overlay.classList.add('hidden'); }, 500);
                setTimeout(() => { 
                    const explanationBox = document.getElementById('explanation-box-42');
                    if (explanationBox) {
                        explanationBox.scrollIntoView({ behavior: 'smooth', block: 'center' }); 
                    }
                }, 600);
            }

            if(btnAct) btnAct.disabled = false;
            if(in1) in1.disabled = false;
        }

        // --- 6. VALIDATOR AKTIVITAS 4.2 ---
        window.runAktivitas42 = async function() {
            const in1 = document.getElementById('input42_1').value.trim();
            const alertBox = document.getElementById('alert-42');
            const consoleText = document.getElementById('console-text-42');
            const statusTerm = document.getElementById('status-act42');
            const btnRun = document.getElementById('btnRunAct42');

            if(!consoleText || !alertBox || !statusTerm || !btnRun) return;

            consoleText.classList.remove('italic', 'opacity-60');

            if(in1 === "") {
                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-yellow-50 text-yellow-800 border-yellow-200 text-left";
                alertBox.innerHTML = "⚠️ Error: Kotak input masih kosong.";
                alertBox.classList.remove('hidden');
                consoleText.innerHTML = "SyntaxError: invalid syntax";
                consoleText.className = "text-[#ff5f56] whitespace-pre-wrap break-words leading-relaxed text-sm text-left block";
                return;
            }

            btnRun.innerHTML = 'Memproses...';
            btnRun.disabled = true;

            try {
                const py = await window.ensurePyodideReady();
                py.runPython(`import sys\nfrom io import StringIO\nsys.stdout = StringIO()`);
                
                const pythonCode = `
try:
    jarak_sementara = ${in1}
    if jarak_sementara > 999999999:
        print("Berhasil! Nilai ini lebih besar dari angka berapapun.")
    else:
        print("Gagal: Nilai tidak cukup besar untuk menjadi Infinity.")
except Exception as e:
    print("Error:", e)
`;
                
                py.runPython(pythonCode);
                let stdout = py.runPython('sys.stdout.getvalue()');
                stdout = stdout.trim();

                if(stdout.includes("Berhasil") && !stdout.includes("Error")) {
                    const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                    localStorage.setItem('act_4_2_done_' + userId, 'true'); 
                    localStorage.setItem('act_4_2_ans1_' + userId, in1);

                    alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-green-50 text-green-800 border-green-400 text-left";
                    alertBox.innerHTML = "✅ Tepat Sekali! Anda berhasil memanggil fungsi <code>float('inf')</code> yang dapat mengalahkan angka numerik berapapun besarnya dalam Python.";
                    alertBox.classList.remove('hidden');

                    statusTerm.innerText = "Success";
                    statusTerm.className = "bg-green-700 text-white px-2 py-0.5 rounded text-[10px]";

                    consoleText.className = "text-[#4af626] whitespace-pre-wrap break-words leading-relaxed text-sm text-left block";
                    consoleText.innerHTML = `
                        <div class="mb-1 text-slate-400">&gt; python main.py</div>
                        <div>${stdout.replace(/\n/g, '<br>')}</div>
                    `;

                    window.kunciJawabanAktivitas42(in1);

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
        section: "4.2",
        score: 100,
        answer: "Berhasil Live Coding 4.2"
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
                    statusTerm.innerText = "Error";
                    statusTerm.className = "bg-amber-600 text-white px-2 py-0.5 rounded text-[10px]";
                    
                    consoleText.className = "text-[#ff5f56] whitespace-pre-wrap break-words leading-relaxed text-sm text-left block";
                    consoleText.innerHTML = `
                        <div class="mb-1 text-slate-400">&gt; python main.py</div>
                        <div>${stdout.replace(/\n/g, '<br>')}</div>
                    `;

                    alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-amber-50 text-amber-800 border-amber-300 animate-pulse text-left";
                    alertBox.innerHTML = "❌ Salah: Gunakan fungsi tipe data desimal untuk memanggil string 'inf' (infinity) di Python.";
                    alertBox.classList.remove('hidden');
                }

            } catch (err) {
                consoleText.className = "text-[#ff5f56] whitespace-pre-wrap break-words leading-relaxed text-sm text-left block";
                consoleText.innerHTML = "Traceback (most recent call last):<br>" + err.message;
                statusTerm.innerText = "Syntax Error";
                statusTerm.className = "bg-red-800 text-red-200 px-2 py-0.5 rounded text-[10px]";

                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-red-50 text-red-800 border-red-300 animate-pulse text-left";
                alertBox.innerHTML = "❌ Syntax Error: Terdapat kesalahan ketik pada input Anda.";
                alertBox.classList.remove('hidden');
            } finally {
                if (btnRun.innerHTML.includes('Memproses')) {
                    btnRun.innerHTML = 'Jalankan & Periksa';
                    btnRun.disabled = false;
                }
            }
        }

        window.kunciJawabanAktivitas42 = function(val1) {
            const in1 = document.getElementById('input42_1');
            
            if(in1) {
                in1.value = val1 || "float('inf')"; 
                in1.disabled = true;
                in1.classList.replace('text-[#dcdcaa]', 'text-[#4af626]');
                in1.classList.add('bg-green-900/30', 'border-green-500', 'cursor-not-allowed');
            }

            const btnRun = document.getElementById('btnRunAct42');
            if(btnRun) {
                btnRun.innerHTML = 'Diselesaikan';
                btnRun.classList.replace('bg-yellow-600', 'bg-slate-600');
                btnRun.classList.replace('hover:bg-yellow-500', 'cursor-not-allowed');
                btnRun.disabled = true;
            }

            const consoleText = document.getElementById('console-text-42');
            if (consoleText && consoleText.innerHTML.includes('Output terminal')) {
                 consoleText.classList.remove('italic', 'opacity-60');
                 consoleText.className = "text-[#4af626] whitespace-pre-wrap break-words leading-relaxed text-sm text-left block";
                 consoleText.innerHTML = `
                    <div class="mb-1 text-slate-400">&gt; python main.py</div>
                    <div>Berhasil! Nilai ini lebih besar dari angka berapapun.</div>
                 `;
            }
            
            const badgeAct = document.getElementById('badge-act42');
            if(badgeAct) badgeAct.classList.remove('hidden');

            const btnNext = document.getElementById('btnNext42');
            if(btnNext) {
                btnNext.disabled = false;
                btnNext.classList.remove('opacity-50', 'cursor-not-allowed', 'bg-slate-900');
                btnNext.classList.add('bg-blue-600', 'hover:bg-blue-700');
            }
        }
    </script>
</section>