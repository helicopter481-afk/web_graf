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

    <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm p-8 md:p-10 max-w-6xl mx-auto transition-colors">

        {{-- JUDUL MATERI --}}
        <div class="border-b border-slate-200 dark:border-slate-700 pb-6 mb-8 text-left">
            <h2 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white mb-2">4.2 Logika <span class="italic font-serif text-blue-600 dark:text-blue-400">Infinity</span> dan Tabel Jarak</h2>
            <p class="text-slate-500 dark:text-slate-400 font-medium">Mempersiapkan buku catatan algoritma sebelum memulai pencarian rute terpendek.</p>
        </div>

        {{-- KONTEN TEORI & VISUALISASI TABEL --}}
        <div class="grid md:grid-cols-12 gap-8 mb-10 items-center">
            
            {{-- Kolom Kiri: Teori --}}
            <div class="md:col-span-7 prose prose-slate dark:prose-invert text-slate-700 dark:text-slate-300 leading-relaxed text-justify max-w-none flex flex-col h-full">
                <p class="mb-3">
                    Berbeda dengan penelusuran biasa, Algoritma Dijkstra bekerja seperti seorang akuntan. Ia membuat sebuah <strong>"Tabel Catatan"</strong> memori untuk menyimpan informasi jarak terpendek ke setiap titik yang diketahui sejauh ini.
                </p>
                <p>
                    <strong>Aturan utamanya:</strong> Sebelum penelusuran dimulai, komputer sama sekali tidak tahu seberapa jauh jarak ke lokasi-lokasi lain. Oleh karena itu, jarak ke semua lokasi selain titik awal dianggap <strong>Tak Terhingga (Belum diketahui)</strong>. 
                </p>
                <div class="bg-blue-50 dark:bg-blue-950/30 p-4 rounded-lg border border-blue-200 dark:border-blue-800 mt-2 transition-colors">
                    <p class="text-sm text-blue-900 dark:text-blue-200 m-0">
                        Di dalam bahasa Python, kita menggunakan fungsi khusus yaitu <code class="bg-white dark:bg-slate-800 px-1.5 py-0.5 rounded text-blue-600 dark:text-blue-400 border border-blue-200 dark:border-blue-700 font-bold shadow-sm">float('inf')</code> untuk merepresentasikan angka <em>Infinity</em> (Tak Terhingga). Angka ini selalu lebih besar dari angka numerik berapapun.
                    </p>
                </div>
            </div>

            {{-- Kolom Kanan: Visualisasi Tabel Dinamis --}}
            <div class="md:col-span-5 bg-slate-50 dark:bg-slate-800/50 border-2 border-slate-200 dark:border-slate-700 rounded-xl overflow-hidden shadow-inner flex flex-col items-center transition-colors">
                <div class="bg-slate-200/80 dark:bg-slate-800/80 py-2 px-4 border-b border-slate-300 dark:border-slate-700 flex justify-between items-center w-full backdrop-blur-sm">
                    <span class="text-xs font-bold text-slate-700 dark:text-slate-300 uppercase tracking-widest">Simulasi Tabel Memori</span>
                    <i class="fa-solid fa-table-list text-slate-500 dark:text-slate-400"></i>
                </div>
                
                <div class="p-6 w-full flex flex-col items-center">
                    <p class="text-xs text-slate-500 dark:text-slate-400 mb-3 text-center font-bold">Klik tombol untuk menginisialisasi tabel pencarian dari titik awal "Rumah".</p>
                    
                    <table class="w-full bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 rounded-lg shadow-sm text-center overflow-hidden mb-4 transition-colors">
                        <thead class="bg-slate-100 dark:bg-slate-800 border-b border-slate-200 dark:border-slate-700 text-xs text-slate-600 dark:text-slate-300 uppercase">
                            <tr>
                                <th class="py-2 border-r border-slate-200 dark:border-slate-700">Lokasi</th>
                                <th class="py-2">Jarak dari Rumah</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm font-medium text-slate-700 dark:text-slate-300">
                            <tr class="border-b border-slate-100 dark:border-slate-700/50">
                                <td class="py-2.5 border-r border-slate-200 dark:border-slate-700 bg-blue-50/50 dark:bg-blue-900/20">Rumah (Start)</td>
                                <td class="py-2.5 transition-all duration-500 text-slate-400 dark:text-slate-500" id="val-rumah">?</td>
                            </tr>
                            <tr class="border-b border-slate-100 dark:border-slate-700/50">
                                <td class="py-2.5 border-r border-slate-200 dark:border-slate-700">Pasar</td>
                                <td class="py-2.5 transition-all duration-500 text-slate-400 dark:text-slate-500" id="val-pasar">?</td>
                            </tr>
                            <tr>
                                <td class="py-2.5 border-r border-slate-200 dark:border-slate-700">Kampus</td>
                                <td class="py-2.5 transition-all duration-500 text-slate-400 dark:text-slate-500" id="val-kampus">?</td>
                            </tr>
                        </tbody>
                    </table>

                    <button id="btn-init-table" onclick="initDijkstraTable()" class="bg-blue-600 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded-lg text-sm shadow-md transition-colors active:scale-95 w-full">
                        <i class="fa-solid fa-wand-magic-sparkles mr-1"></i> Jalankan Inisialisasi Dijkstra
                    </button>

                    <div id="table-feedback" class="hidden mt-4 bg-emerald-50 dark:bg-emerald-950/30 border border-emerald-200 dark:border-emerald-800 text-emerald-800 dark:text-emerald-300 text-xs p-3 rounded-lg text-center leading-relaxed font-medium transition-colors">
                        Keren! Jarak <strong>Rumah ke Rumah adalah 0</strong>. Sedangkan lokasi lain diset <strong>Infinity (Tak Terhingga)</strong> karena rutenya belum dieksplorasi.
                    </div>
                </div>
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- CONTOH KODE PROGRAM (DENGAN LINE NUMBERS) --}}
        {{-- ========================================== --}}
        <div class="mb-8">
            <h3 class="text-lg font-bold text-slate-800 dark:text-slate-100 mb-3 flex items-center gap-2 text-left">
                <i class="fa-solid fa-laptop-code text-slate-500"></i> Contoh Kode Program:
            </h3>
            
            {{-- Tampilan Gambar Kode (Hanya Baca) --}}
            <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 select-none pointer-events-none mb-6 anti-copas text-left flex flex-col h-auto">
                <div class="bg-[#2d2d2d] px-4 py-2.5 flex items-center gap-2 border-b border-slate-700 shrink-0">
                    <div class="flex gap-1.5">
                        <div class="w-3 h-3 rounded-full bg-[#ff5f56]"></div>
                        <div class="w-3 h-3 rounded-full bg-[#ffbd2e]"></div>
                        <div class="w-3 h-3 rounded-full bg-[#27c93f]"></div>
                    </div>
                    <span class="text-slate-400 text-xs ml-2 font-mono">inisialisasi_tabel.py (Hanya Baca)</span>
                </div>
                
                {{-- CODE BLOCK WITH LINE NUMBERS --}}
                <div class="flex font-mono text-[12px] md:text-sm leading-[1.625] text-[#d4d4d4] overflow-x-auto">
                    {{-- Line Numbers --}}
                    <div class="flex flex-col text-[#858585] text-right select-none py-5 pl-4 pr-4 border-r border-[#404040] bg-[#1e1e1e] shrink-0 leading-[1.625] z-10">
                        <span>1</span><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span><span>7</span><span>8</span><span>9</span><span>10</span><span>11</span><span>12</span>
                    </div>
                    
                    {{-- Code Content (Presisi 12 Baris) --}}
                    <div class="flex flex-col whitespace-pre py-5 pl-4 pr-6 leading-[1.625] z-0">
                        <div class="text-[#6a9955] z-0"># Titik awal kita adalah "Rumah"</div>
                        <div class="z-0"><span class="text-[#9cdcfe]">lokasi</span> = [<span class="text-[#ce9178]">"Rumah"</span>, <span class="text-[#ce9178]">"Pasar"</span>, <span class="text-[#ce9178]">"Kampus"</span>]</div>
                        <div class="z-0"><span class="text-[#9cdcfe]">tabel_jarak</span> = {}</div>
                        <div class="z-0">&nbsp;</div>
                        <div class="text-[#6a9955] z-0"># Mengisi semua jarak dengan Infinity terlebih dahulu</div>
                        <div class="z-0"><span class="text-[#c586c0]">for</span> tempat <span class="text-[#c586c0]">in</span> lokasi:</div>
                        <div class="ml-4 z-0">tabel_jarak[tempat] = <span class="text-[#dcdcaa]">float</span>(<span class="text-[#ce9178]">'inf'</span>)</div>
                        <div class="z-0">&nbsp;</div>
                        <div class="text-[#6a9955] z-0"># Karena kita SEDANG berada di Rumah, jarak ke Rumah adalah 0</div>
                        <div class="z-0">tabel_jarak[<span class="text-[#ce9178]">"Rumah"</span>] = <span class="text-[#b5cea8]">0</span></div>
                        <div class="z-0">&nbsp;</div>
                        <div class="z-0"><span class="text-[#dcdcaa]">print</span>(<span class="text-[#ce9178]">"Tabel Jarak Awal:"</span>, tabel_jarak)</div>
                    </div>
                </div>
            </div>

            {{-- PENJELASAN KODE PROGRAM --}}
            <div class="p-6 border border-slate-200 dark:border-slate-700 rounded-xl bg-slate-50 dark:bg-slate-800/50 shadow-sm text-left transition-colors">
                <h4 class="font-bold text-slate-800 dark:text-slate-200 text-sm mb-4">Pembedahan Sintaks (Langkah demi Langkah):</h4>
                <ul class="list-disc list-outside ml-5 text-sm text-slate-700 dark:text-slate-300 space-y-3 leading-relaxed text-justify">
                    <li><strong>Baris 2 & 3 (Inisialisasi):</strong> Kita mendata <code>lokasi</code> yang ada di peta ("Rumah", "Pasar", "Kampus"). Lalu membuat "Buku Catatan" kosong bernama <code>tabel_jarak</code>.</li>
                    <li><strong>Baris 6 & 7 (Memberi Nilai Awal):</strong> Komputer mengulang (<em>looping</em>) memanggil semua tempat, lalu mengisi catatannya dengan nilai <code class="bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 px-1.5 py-0.5 rounded text-blue-600 dark:text-blue-400 font-bold shadow-sm font-mono">float('inf')</code>. Mengapa? Karena sebelum program berjalan, jarak ke tempat manapun belum diketahui, jadi dianggap "Tak Terhingga" (sangat jauh).</li>
                    <li><strong>Baris 10 (Menetapkan Titik Awal):</strong> Karena kita <strong>sudah berada</strong> di "Rumah", maka jarak tempuh dari Rumah menuju Rumah otomatis adalah <strong>0</strong>. Nilai nol inilah yang akan menjadi pijakan pertama komputer untuk mengeksplorasi graf!</li>
                </ul>
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- INTERACTIVE SANDBOX: KETIK ULANG KODE --}}
        {{-- ========================================== --}}
        <div class="mb-10 bg-blue-50/30 dark:bg-blue-950/20 border-2 border-blue-200 dark:border-blue-800/60 p-6 rounded-xl shadow-sm text-left transition-colors">
            <h3 class="text-lg font-bold text-slate-800 dark:text-slate-100 mb-2">Buktikan Pemahaman Anda!</h3>
            <p class="text-sm text-slate-600 dark:text-slate-300 mb-4">
                Ketik ulang keseluruhan kode contoh di atas ke dalam editor di bawah ini (baris komentar warna hijau tidak wajib diketik). Jalankan programnya untuk <strong>membuka kunci</strong> penjelasan output serta Aktivitas 4.2!
            </p>

            <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 font-mono text-sm flex flex-col">
                <div class="bg-[#2d2d2d] px-4 py-2.5 flex items-center justify-between border-b border-slate-700 shrink-0 z-10">
                    <span class="text-slate-400 text-xs">Terminal Editor Pyodide</span>
                    <button onclick="window.runDemoBox42()" id="btn-demo42" class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors shadow-sm active:scale-95">
                        <i class="fa-solid fa-play mr-1"></i> Jalankan Kode
                    </button>
                </div>
                
                {{-- DYNAMIC EDITOR LAYOUT (AUTO LINE NUMBERS) --}}
                <div class="flex font-mono text-[12px] md:text-sm text-[#d4d4d4] bg-[#1e1e1e] relative min-h-[180px] leading-[1.625]">
                    {{-- Container Angka Baris (Kiri) --}}
                    <div id="line-numbers-demo42" class="text-[#858585] text-right select-none py-5 pl-4 pr-4 border-r border-[#404040] bg-[#1e1e1e] shrink-0 z-10 leading-[1.625]">
                        <div>1</div>
                    </div>
                    
                    {{-- Textarea Editor (Kanan) --}}
                    <textarea id="editor-demo42" class="w-full bg-transparent text-[#d4d4d4] outline-none resize-none py-5 pl-4 pr-6 whitespace-pre overflow-x-auto z-0 leading-[1.625]" spellcheck="false" placeholder="# Ketik ulang kode Python di sini..." oninput="window.syncLineNumbersDemo42()"></textarea>
                </div>

                {{-- WADAH OUTPUT (RATA KIRI & RAPI) --}}
                <div class="px-5 pb-5 pt-2 bg-[#1e1e1e] text-left w-full z-0">
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
            <div id="lock-overlay-42" class="absolute inset-0 z-30 flex flex-col items-center justify-center bg-white/50 dark:bg-slate-900/50 backdrop-blur-[3px] rounded-xl transition-opacity duration-500">
                <div class="bg-white dark:bg-slate-800 p-5 rounded-2xl shadow-xl flex flex-col items-center border border-slate-200 dark:border-slate-700 animate-bounce">
                    <i class="fa-solid fa-lock text-4xl text-slate-400 dark:text-slate-500 mb-3"></i>
                    <p class="text-sm font-bold text-slate-600 dark:text-slate-300 text-center">Konten Terkunci</p>
                    <p class="text-xs text-slate-500 dark:text-slate-400 text-center mt-1">Ketik dan jalankan kode di atas<br>dengan benar untuk membuka.</p>
                </div>
            </div>

            {{-- Penjelasan Output Program --}}
            <div id="explanation-box-42" class="mb-10 p-6 border border-slate-200 dark:border-slate-700 rounded-xl bg-white dark:bg-slate-800/50 shadow-sm scroll-mt-24 transition-colors">
                <h4 class="font-bold text-slate-800 dark:text-slate-200 text-base mb-3">Penjelasan Output Program:</h4>
                <div class="bg-black text-[#4af626] text-left font-mono text-sm p-4 rounded-md shadow-inner mb-4 inline-block block w-fit border border-slate-800 dark:border-green-900/50">
                    Tabel Jarak Awal: {'Rumah': 0, 'Pasar': inf, 'Kampus': inf}
                </div>
                <p class="text-sm text-slate-700 dark:text-slate-300 text-justify leading-relaxed mb-3">
                    Output di atas menunjukkan bahwa:
                </p>
                <ul class="list-disc list-outside ml-5 text-sm text-slate-700 dark:text-slate-300 space-y-2 leading-relaxed text-justify">
                    <li>Jarak dari <strong>Rumah ke Rumah</strong> adalah <strong>0</strong>, karena itu adalah titik awal (kita sudah berada di sana).</li>
                    <li>Jarak ke <strong>Pasar</strong> dan <strong>Kampus</strong> masih bernilai <strong>inf (infinity)</strong>, artinya jaraknya belum diketahui atau belum dihitung.</li>
                    <li>Nilai <code>inf</code> digunakan sebagai tanda awal bahwa suatu lokasi belum memiliki jarak pasti. Nantinya, nilai tersebut akan diperbarui dengan angka nyata setelah proses perhitungan rute jarak terpendek (Dijkstra) berjalan.</li>
                </ul>
            </div>

            {{-- ========================================== --}}
        {{-- AKTIVITAS 4.2: UJI PEMAHAMAN BERJENJANG --}}
        {{-- ========================================== --}}
        <div id="activity-42-container" class="border-2 border-slate-200 dark:border-slate-700 rounded-xl overflow-hidden shadow-sm transition-colors mt-12">
            <div class="bg-yellow-50 dark:bg-yellow-900/40 px-6 py-4 border-b border-yellow-200 dark:border-yellow-700/50 flex justify-between items-center transition-colors">
                <h3 class="font-bold text-yellow-800 dark:text-yellow-400 text-lg flex items-center gap-2">
                    <i class="fa-solid fa-lightbulb text-yellow-600"></i> Aktivitas 4.2 – Uji Pemahaman Tabel Jarak
                </h3>
                <span id="badge-act42" class="hidden bg-green-500 text-white px-3 py-1 rounded text-xs font-bold shadow-sm flex items-center gap-1"><i class="fa-solid fa-check"></i> Selesai</span>
            </div>
            
            <div class="p-6 bg-white dark:bg-slate-900 transition-colors">

                {{-- SOAL 1: INISIASI INFINITY --}}
                <div id="activity-42-1-container" class="mb-10 transition-opacity duration-500">
                    <h4 class="font-bold text-slate-800 dark:text-slate-200 text-lg mb-3">1. Inisiasi <em>Infinity</em> (Tak Terhingga)</h4>
                    <div class="bg-white/80 dark:bg-slate-800/80 p-4 rounded border border-blue-200 dark:border-blue-800/50 font-medium text-blue-900 dark:text-blue-300 text-sm shadow-sm leading-relaxed mb-6 transition-colors">
                        <strong>Tugas Anda:</strong> Buat sebuah variabel bernama <code>jarak_sementara</code> dan berikan nilai matematis <em>Tak Terhingga (Infinity)</em> menggunakan fungsi bawaan Python!
                    </div>

                    <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 font-mono text-sm flex flex-col">
                        <div class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700 z-10">
                            <span class="text-slate-400 text-xs">Terminal Aktivitas (main.py)</span>
                            <button onclick="window.runAktivitas42_1()" id="btnRunAct42_1" class="bg-yellow-600 hover:bg-yellow-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors shadow-sm active:scale-95">
                                Jalankan & Periksa
                            </button>
                        </div>
                        
                        <div class="flex font-mono text-[12px] md:text-sm leading-[1.625] text-[#d4d4d4] overflow-x-auto text-left z-0">
                            <div class="flex flex-col text-[#858585] text-right select-none py-6 pl-4 pr-4 border-r border-[#404040] bg-[#1e1e1e] shrink-0">
                                 <span>1</span><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span>
                            </div>
                            
                            <div class="flex flex-col whitespace-pre py-6 pl-4 pr-6 w-full text-left">
<div class="text-[#6a9955]"># Tulis fungsi Infinity Python di bawah ini:</div>
<div class="mt-1 mb-1">
    <span class="text-[#9cdcfe]">jarak_sementara</span> = <input type="text" id="input42_1_1" class="inline-block align-middle bg-[#3c3c3c] dark:bg-slate-700 text-[#dcdcaa] border border-slate-500 dark:border-slate-500 rounded px-2 mx-1 w-32 outline-none focus:border-blue-400 focus:bg-[#2d2d2d] dark:focus:bg-slate-800 text-center transition-colors shadow-inner h-6 leading-none text-sm" autocomplete="off" spellcheck="false" placeholder=".............">
</div>
<div> </div>
<div class="text-[#6a9955]"># Mengecek apakah sistem berhasil membaca logika matematika</div>
<div><span class="text-[#c586c0]">if</span> <span class="text-[#9cdcfe]">jarak_sementara</span> > <span class="text-[#b5cea8]">999999999</span>:</div>
<div>    <span class="text-[#dcdcaa]">print</span>(<span class="text-[#ce9178]">"Berhasil! Nilai ini lebih besar dari angka berapapun."</span>)</div>
                            </div>
                        </div>

                        <div class="px-5 pb-5 pt-0 bg-[#1e1e1e] text-left w-full z-0">
                            <hr class="border-slate-700 mb-4 mt-2">
                            <div class="flex justify-between items-center mb-3">
                                <span class="text-slate-500 text-[10px] font-bold tracking-widest uppercase">OUTPUT TERMINAL</span>
                                <span id="status-terminal-42-1" class="bg-slate-800 text-slate-400 px-2 py-0.5 rounded text-[10px]">Ready</span>
                            </div>
                            <div id="console-text-42-1" class="block text-left text-[#4af626] whitespace-pre-wrap break-words leading-relaxed text-sm italic opacity-60 m-0 p-0">(Output terminal akan tampil di sini setelah dijalankan)</div>
                        </div>
                    </div>

                    <div id="alert-42-1" class="hidden mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border transition-all text-left"></div>

                    <div id="feedback-edukatif-42-1" class="hidden mt-4 bg-[#f0fdf4] dark:bg-green-950/40 border border-[#bbf7d0] dark:border-green-800 p-6 rounded-xl shadow-sm text-left transition-colors">
                        <h4 class="font-bold text-[#166534] dark:text-green-400 mb-2 flex items-center gap-2"><i class="fa-solid fa-check-circle"></i> Kunci Jawaban Sistem:</h4>
                        <p class="text-sm text-[#166534] dark:text-green-200 leading-relaxed mb-0">
                            Tepat Sekali! Anda berhasil memanggil fungsi <code class="bg-[#dcfce7] dark:bg-green-900/60 px-1.5 py-0.5 rounded font-bold border border-[#bbf7d0] dark:border-green-700 font-mono text-xs">float('inf')</code> yang dapat mengalahkan angka numerik berapapun besarnya dalam Python. Nilai ini sangat penting sebagai patokan tebakan terburuk sebelum Dijkstra menemukan rute aslinya.
                        </p>
                    </div>
                </div>

                {{-- SOAL 2: TITIK NOL DIJKSTRA --}}
                <div id="activity-42-2-container" class="mb-10 opacity-50 pointer-events-none transition-opacity duration-500 relative">
                    <h4 class="font-bold text-slate-800 dark:text-slate-200 text-lg mb-3">2. Menetapkan Titik Nol (Start Node)</h4>
                    <p class="text-sm text-slate-700 dark:text-slate-300 leading-relaxed text-justify mb-3">
                        <strong>Skenario:</strong> Anda sedang berada di "Rumah". Sebelum algoritma Dijkstra berjalan menyebar mencari rute ke kota lain, komputer harus mencatat jarak keberadaan Anda saat ini di dalam buku memori.
                    </p>
                    <div class="bg-white/80 dark:bg-slate-800/80 p-4 rounded border border-blue-200 dark:border-blue-800/50 font-medium text-blue-900 dark:text-blue-300 text-sm shadow-sm leading-relaxed mb-6 transition-colors">
                        <strong>Tugas Anda:</strong> Isikan nilai yang benar ke dalam tabel jarak untuk titik "Rumah". <em>(Clue: Berapakah jarak dari Rumah menuju ke Rumah itu sendiri?)</em>
                    </div>

                    <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 font-mono text-sm flex flex-col">
                        <div class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700 z-10">
                            <span class="text-slate-400 text-xs">Terminal Aktivitas (main.py)</span>
                            <button onclick="window.runAktivitas42_2()" id="btnRunAct42_2" class="bg-yellow-600 hover:bg-yellow-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors shadow-sm active:scale-95">
                                Jalankan & Periksa
                            </button>
                        </div>
                        
                        <div class="flex font-mono text-[12px] md:text-sm leading-[1.625] text-[#d4d4d4] overflow-x-auto text-left z-0">
                            <div class="flex flex-col text-[#858585] text-right select-none py-6 pl-4 pr-4 border-r border-[#404040] bg-[#1e1e1e] shrink-0">
                                 <span>1</span><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span><span>7</span><span>8</span>
                            </div>
                            
                            <div class="flex flex-col whitespace-pre py-6 pl-4 pr-6 w-full text-left">
<div><span class="text-[#9cdcfe]">tabel_jarak</span> = {</div>
<div>    <span class="text-[#ce9178]">"Rumah"</span>: <span class="text-[#dcdcaa]">float</span>(<span class="text-[#ce9178]">'inf'</span>),</div>
<div>    <span class="text-[#ce9178]">"Pasar"</span>: <span class="text-[#dcdcaa]">float</span>(<span class="text-[#ce9178]">'inf'</span>)</div>
<div>}</div>
<div> </div>
<div class="text-[#6a9955]"># Update jarak titik start Anda saat ini!</div>
<div class="mt-1 mb-1">
    <span class="text-[#9cdcfe]">tabel_jarak</span>[<span class="text-[#ce9178]">"Rumah"</span>] = <input type="text" id="input42_2_1" class="inline-block align-middle bg-[#3c3c3c] dark:bg-slate-700 text-[#b5cea8] border border-slate-500 dark:border-slate-500 rounded px-2 mx-1 w-16 outline-none focus:border-blue-400 focus:bg-[#2d2d2d] dark:focus:bg-slate-800 text-center transition-colors shadow-inner h-6 leading-none text-sm" autocomplete="off" spellcheck="false" placeholder="...">
</div>
<div> </div>
<div><span class="text-[#dcdcaa]">print</span>(<span class="text-[#ce9178]">"Jarak awal Rumah:"</span>, <span class="text-[#9cdcfe]">tabel_jarak</span>[<span class="text-[#ce9178]">"Rumah"</span>])</div>
                            </div>
                        </div>

                        <div class="px-5 pb-5 pt-0 bg-[#1e1e1e] text-left w-full z-0">
                            <hr class="border-slate-700 mb-4 mt-2">
                            <div class="flex justify-between items-center mb-3">
                                <span class="text-slate-500 text-[10px] font-bold tracking-widest uppercase">OUTPUT TERMINAL</span>
                                <span id="status-terminal-42-2" class="bg-slate-800 text-slate-400 px-2 py-0.5 rounded text-[10px]">Ready</span>
                            </div>
                            <div id="console-text-42-2" class="block text-left text-[#4af626] whitespace-pre-wrap break-words leading-relaxed text-sm italic opacity-60 m-0 p-0">(Output terminal akan tampil di sini setelah dijalankan)</div>
                        </div>
                    </div>

                    <div id="alert-42-2" class="hidden mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border transition-all text-left"></div>

                    <div id="feedback-edukatif-42-2" class="hidden mt-4 bg-[#f0fdf4] dark:bg-green-950/40 border border-[#bbf7d0] dark:border-green-800 p-6 rounded-xl shadow-sm text-left transition-colors">
                        <h4 class="font-bold text-[#166534] dark:text-green-400 mb-2 flex items-center gap-2"><i class="fa-solid fa-check-circle"></i> Pembahasan Evaluasi:</h4>
                        <p class="text-sm text-[#166534] dark:text-green-200 leading-relaxed mb-0">
                            Tepat sekali! Titik awal (<em>Start Node</em>) dalam algoritma Dijkstra <strong>wajib</strong> disetel menjadi <code>0</code>. Ini adalah pijakan pertama komputer. Dari angka 0 inilah, jarak ke kota-kota tetangga nantinya akan dihitung dan dijumlahkan.
                        </p>
                    </div>
                </div>

                {{-- SOAL 3: OTOMATISASI TABEL DENGAN LOOPING --}}
                <div id="activity-42-3-container" class="mb-4 opacity-50 pointer-events-none transition-opacity duration-500 relative">
                    <h4 class="font-bold text-slate-800 dark:text-slate-200 text-lg mb-3">3. Otomatisasi Tabel dengan Looping</h4>
                    <p class="text-sm text-slate-700 dark:text-slate-300 leading-relaxed text-justify mb-3">
                        <strong>Skenario:</strong> Jika ada 1.000 lokasi di peta graf Anda, tidak mungkin Anda mengetik pengisian tabel jarak awal secara manual satu per satu.
                    </p>
                    <div class="bg-white/80 dark:bg-slate-800/80 p-4 rounded border border-blue-200 dark:border-blue-800/50 font-medium text-blue-900 dark:text-blue-300 text-sm shadow-sm leading-relaxed mb-6 transition-colors">
                        <strong>Tugas Anda:</strong> Gunakan perulangan <code>for</code> untuk mengisi jarak seluruh lokasi dari dalam <em>list</em> menjadi Tak Terhingga (<em>Infinity</em>) ke dalam <em>Dictionary</em> secara otomatis!
                    </div>

                    <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 font-mono text-sm flex flex-col">
                        <div class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700 z-10">
                            <span class="text-slate-400 text-xs">Terminal Aktivitas (main.py)</span>
                            <button onclick="window.runAktivitas42_3()" id="btnRunAct42_3" class="bg-yellow-600 hover:bg-yellow-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors shadow-sm active:scale-95">
                                Jalankan & Periksa
                            </button>
                        </div>
                        
                        <div class="flex font-mono text-[12px] md:text-sm leading-[1.625] text-[#d4d4d4] overflow-x-auto text-left z-0">
                            <div class="flex flex-col text-[#858585] text-right select-none py-6 pl-4 pr-4 border-r border-[#404040] bg-[#1e1e1e] shrink-0">
                                 <span>1</span><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span><span>7</span><span>8</span><span>9</span>
                            </div>
                            
                            <div class="flex flex-col whitespace-pre py-6 pl-4 pr-6 w-full text-left">
<div><span class="text-[#9cdcfe]">daftar_lokasi</span> = [<span class="text-[#ce9178]">"A"</span>, <span class="text-[#ce9178]">"B"</span>, <span class="text-[#ce9178]">"C"</span>, <span class="text-[#ce9178]">"D"</span>, <span class="text-[#ce9178]">"E"</span>]</div>
<div><span class="text-[#9cdcfe]">tabel_jarak</span> = {}</div>
<div> </div>
<div class="text-[#6a9955]"># Looping untuk memasukkan semua lokasi ke tabel jarak</div>
<div><span class="text-[#c586c0]">for</span> lokasi <span class="text-[#c586c0]">in</span> <span class="text-[#9cdcfe]">daftar_lokasi</span>:</div>
<div class="mt-1 mb-1">
    <span class="text-[#9cdcfe]">tabel_jarak</span>[<input type="text" id="input42_3_1" class="inline-block align-middle bg-[#3c3c3c] dark:bg-slate-700 text-[#9cdcfe] border border-slate-500 dark:border-slate-500 rounded px-2 mx-1 w-20 outline-none focus:border-blue-400 focus:bg-[#2d2d2d] dark:focus:bg-slate-800 text-center transition-colors shadow-inner h-6 leading-none text-sm" autocomplete="off" spellcheck="false" placeholder="variabel">] = <input type="text" id="input42_3_2" class="inline-block align-middle bg-[#3c3c3c] dark:bg-slate-700 text-[#dcdcaa] border border-slate-500 dark:border-slate-500 rounded px-2 mx-1 w-28 outline-none focus:border-blue-400 focus:bg-[#2d2d2d] dark:focus:bg-slate-800 text-center transition-colors shadow-inner h-6 leading-none text-sm" autocomplete="off" spellcheck="false" placeholder="nilai...">
</div>
<div> </div>
<div><span class="text-[#dcdcaa]">print</span>(<span class="text-[#9cdcfe]">tabel_jarak</span>)</div>
                            </div>
                        </div>

                        <div class="px-5 pb-5 pt-0 bg-[#1e1e1e] text-left w-full z-0">
                            <hr class="border-slate-700 mb-4 mt-2">
                            <div class="flex justify-between items-center mb-3">
                                <span class="text-slate-500 text-[10px] font-bold tracking-widest uppercase">OUTPUT TERMINAL</span>
                                <span id="status-terminal-42-3" class="bg-slate-800 text-slate-400 px-2 py-0.5 rounded text-[10px]">Ready</span>
                            </div>
                            <div id="console-text-42-3" class="block text-left text-[#4af626] whitespace-pre-wrap break-words leading-relaxed text-sm italic opacity-60 m-0 p-0">(Output terminal akan tampil di sini setelah dijalankan)</div>
                        </div>
                    </div>

                    <div id="alert-42-3" class="hidden mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border transition-all text-left"></div>

                    <div id="feedback-edukatif-42-3" class="hidden mt-4 bg-[#f0fdf4] dark:bg-green-950/40 border border-[#bbf7d0] dark:border-green-800 p-6 rounded-xl shadow-sm text-left transition-colors">
                        <h4 class="font-bold text-[#166534] dark:text-green-400 mb-2 flex items-center gap-2"><i class="fa-solid fa-check-circle"></i> Pembahasan Evaluasi:</h4>
                        <p class="text-sm text-[#166534] dark:text-green-200 leading-relaxed mb-0">
                            Brilian! Anda memanggil variabel loop <code>lokasi</code> sebagai kunci baru untuk <em>Dictionary</em>, lalu mengisi semuanya serentak dengan nilai <code>float('inf')</code>. Ini adalah sintaks efisien standar industri yang selalu dipakai *programmer* untuk menyiapkan tabel memori kosong sesaat sebelum mesin Dijkstra dijalankan.
                        </p>
                    </div>
                </div>

            </div>
        </div>

        {{-- Navigasi Bawah --}}
        <div class="flex justify-between gap-4 mt-12 pt-6 border-t border-slate-200 dark:border-slate-700 transition-colors">
            <button type="button" onclick="prevStep()" class="px-6 py-2.5 rounded-lg border border-slate-300 dark:border-slate-700 font-bold text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 transition shadow-sm active:scale-95">
                Kembali
            </button>
            <button type="button" id="btnNext42" onclick="nextStep()" class="px-6 py-2.5 bg-slate-900 dark:bg-slate-700 hover:bg-slate-800 dark:hover:bg-slate-600 text-white font-bold rounded-lg shadow-md transition-all active:scale-95 opacity-50 cursor-not-allowed" disabled>
                Lanjut
            </button>
        </div>

    </div>

    {{-- SCRIPT LOGIKA (ANTI BUG, PYODIDE SAFE, BERJENJANG) --}}
    <script>
        // --- 1. VISUALISASI TABEL DINAMIS ---
        function initDijkstraTable() {
            const valRumah = document.getElementById('val-rumah');
            const valPasar = document.getElementById('val-pasar');
            const valKampus = document.getElementById('val-kampus');
            const feedback = document.getElementById('table-feedback');
            const btn = document.getElementById('btn-init-table');

            valRumah.innerHTML = '<i class="fa-solid fa-spinner fa-spin text-slate-400"></i>';
            valPasar.innerHTML = '<i class="fa-solid fa-spinner fa-spin text-slate-400"></i>';
            valKampus.innerHTML = '<i class="fa-solid fa-spinner fa-spin text-slate-400"></i>';
            
            setTimeout(() => {
                valRumah.innerText = '0';
                valRumah.className = 'py-2.5 text-green-600 dark:text-green-400 font-black text-lg bg-green-50/50 dark:bg-green-900/20';
                
                valPasar.innerHTML = '&infin;';
                valPasar.className = 'py-2.5 text-red-500 dark:text-red-400 font-black text-2xl';
                
                valKampus.innerHTML = '&infin;';
                valKampus.className = 'py-2.5 text-red-500 dark:text-red-400 font-black text-2xl';

                feedback.classList.remove('hidden');
                
                btn.innerHTML = '<i class="fa-solid fa-check mr-1"></i> Inisialisasi Selesai';
                btn.classList.replace('bg-blue-600', 'bg-emerald-600');
                btn.classList.replace('hover:bg-blue-700', 'hover:bg-emerald-700');
                btn.disabled = true;
            }, 800);
        }

        // --- 2. FUNGSI LINE NUMBERS EDITOR SANDBOX DEMO 4.2 ---
        window.syncLineNumbersDemo42 = function() {
            const editor = document.getElementById('editor-demo42');
            const lineNumEl = document.getElementById('line-numbers-demo42');
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

        function cleanCodeStr(str) {
            return str.replace(/\s+/g, '').replace(/'/g, '"');
        }

        // --- 3. PYODIDE GLOBAL LOADER ---
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

        // --- 4. INIT & PERSISTENCE SAFE ---
        document.addEventListener("DOMContentLoaded", function() {
            const edDemo = document.getElementById('editor-demo42');
            if (edDemo) edDemo.addEventListener('input', window.syncLineNumbersDemo42);

            const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
            
            // Cek Status Sandbox Demo
            if (localStorage.getItem('materi4_2_demo_' + userId) === 'true') {
                const outDemoText = document.getElementById('output-demo42');
                const statusDemo = document.getElementById('status-demo42');
                const btnDemo = document.getElementById('btn-demo42');
                
                if (edDemo && outDemoText && statusDemo && btnDemo) {
                    edDemo.value = localStorage.getItem('materi4_2_demo_code_' + userId) || "";
                    
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

                    unlockSection42(true);
                    setTimeout(window.syncLineNumbersDemo42, 100);
                }
            } else {
                setTimeout(window.syncLineNumbersDemo42, 100);
            }

            // Cek Status Aktivitas Berjenjang
            const isDoneServer = {{ isset($progress['4.2']) && $progress['4.2']->score == 100 ? 'true' : 'false' }};
            const isDoneLocal1 = localStorage.getItem('act_4_2_1_done_v2_' + userId) === 'true';
            const isDoneLocal2 = localStorage.getItem('act_4_2_2_done_v2_' + userId) === 'true';
            const isDoneLocal3 = localStorage.getItem('act_4_2_3_done_v2_' + userId) === 'true';

            if (isDoneServer || isDoneLocal1) {
                window.kunciJawabanAktivitas42_1(localStorage.getItem('act_4_2_1_ans1_v2_' + userId));
            }
            if (isDoneServer || isDoneLocal2) {
                window.kunciJawabanAktivitas42_2(localStorage.getItem('act_4_2_2_ans1_v2_' + userId));
            }
            if (isDoneServer || isDoneLocal3) {
                window.kunciJawabanAktivitas42_3(localStorage.getItem('act_4_2_3_ans1_v2_' + userId), localStorage.getItem('act_4_2_3_ans2_v2_' + userId));
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
                let stdout = py.runPython('sys.stdout.getvalue()').trim();
                
                const clean = cleanCodeStr(code.replace(/#.*/g, ''));
                const hasDict = clean.includes('tabel_jarak={}');
                const hasInf = clean.includes('float("inf")') || clean.includes("float('inf')");
                const hasZero = clean.includes('tabel_jarak["Rumah"]=0');
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
            const btnAct = document.getElementById('btnRunAct42_1');
            const in1 = document.getElementById('input42_1_1');

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

        // --- 6. VALIDATOR AKTIVITAS 4.2 (SOAL 1) ---
        window.runAktivitas42_1 = async function() {
            const in1 = document.getElementById('input42_1_1').value.trim();
            const alertBox = document.getElementById('alert-42-1');
            const consoleText = document.getElementById('console-text-42-1');
            const statusTerm = document.getElementById('status-terminal-42-1');
            const btnRun = document.getElementById('btnRunAct42_1');

            if(!consoleText || !alertBox || !statusTerm || !btnRun) return;
            consoleText.classList.remove('italic', 'opacity-60');

            if(in1 === "") {
                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-yellow-50 dark:bg-yellow-950/40 text-yellow-800 dark:text-yellow-400 border-yellow-200 dark:border-yellow-800 text-left transition-colors";
                alertBox.innerHTML = "<i class='fa-solid fa-triangle-exclamation mr-1'></i> Error: Kotak input masih kosong.";
                alertBox.classList.remove('hidden');
                consoleText.innerHTML = "SyntaxError: invalid syntax";
                consoleText.className = "text-[#ff5f56] whitespace-pre-wrap break-words leading-relaxed text-sm text-left block";
                return;
            }

            btnRun.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Memproses...';
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
                let stdout = py.runPython('sys.stdout.getvalue()').trim();

                if(stdout.includes("Berhasil") && !stdout.includes("Error")) {
                    const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                    localStorage.setItem('act_4_2_1_done_v2_' + userId, 'true'); 
                    localStorage.setItem('act_4_2_1_ans1_v2_' + userId, in1);

                    alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-green-50 dark:bg-green-950/40 text-green-800 dark:text-green-400 border-green-400 dark:border-green-800 text-left transition-colors";
                    alertBox.innerHTML = "<i class='fa-solid fa-check-circle mr-1'></i> Tepat Sekali! Anda berhasil memanggil fungsi <code class='bg-green-100 dark:bg-green-900/60 px-1 rounded border border-green-300 dark:border-green-700 font-mono'>float('inf')</code> yang dapat mengalahkan angka numerik berapapun besarnya dalam Python.";
                    alertBox.classList.remove('hidden');

                    statusTerm.innerText = "Success";
                    statusTerm.className = "bg-green-700 text-white px-2 py-0.5 rounded text-[10px]";

                    consoleText.className = "text-[#4af626] whitespace-pre-wrap break-words leading-relaxed text-sm text-left block font-bold";
                    consoleText.innerHTML = `
                        <div class="mb-1 text-slate-400 font-normal">&gt; python main.py</div>
                        <div>${stdout.replace(/\n/g, '<br>')}</div>
                    `;

                    window.kunciJawabanAktivitas42_1(in1);

                } else {
                    statusTerm.innerText = "Logic Error";
                    statusTerm.className = "bg-amber-600 text-white px-2 py-0.5 rounded text-[10px]";
                    
                    consoleText.className = "text-[#ff5f56] whitespace-pre-wrap break-words leading-relaxed text-sm text-left block";
                    consoleText.innerHTML = `
                        <div class="mb-1 text-slate-400">&gt; python main.py</div>
                        <div>${stdout.replace(/\n/g, '<br>')}</div>
                    `;

                    alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-amber-50 dark:bg-amber-950/40 text-amber-800 dark:text-amber-400 border-amber-300 dark:border-amber-800 text-left transition-colors";
                    alertBox.innerHTML = "<i class='fa-solid fa-circle-xmark mr-1'></i> Salah: Gunakan fungsi tipe data desimal untuk memanggil string 'inf' (infinity) di Python.";
                    alertBox.classList.remove('hidden');
                }

            } catch (err) {
                consoleText.className = "text-[#ff5f56] whitespace-pre-wrap break-words leading-relaxed text-sm text-left block";
                consoleText.innerHTML = "Traceback (most recent call last):<br>" + err.message;
                statusTerm.innerText = "Syntax Error";
                statusTerm.className = "bg-red-800 text-red-200 px-2 py-0.5 rounded text-[10px]";

                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-red-50 dark:bg-red-950/40 text-red-800 dark:text-red-400 border-red-300 dark:border-red-800 text-left transition-colors";
                alertBox.innerHTML = "<i class='fa-solid fa-circle-xmark mr-1'></i> Syntax Error: Terdapat kesalahan ketik pada input Anda.";
                alertBox.classList.remove('hidden');
            } finally {
                if (btnRun.innerHTML.includes('Memproses')) {
                    btnRun.innerHTML = 'Jalankan & Periksa';
                    btnRun.disabled = false;
                }
            }
        }

        // --- 7. VALIDATOR AKTIVITAS 4.2 (SOAL 2) ---
        window.runAktivitas42_2 = async function() {
            const in1 = document.getElementById('input42_2_1').value.trim();
            const alertBox = document.getElementById('alert-42-2');
            const consoleText = document.getElementById('console-text-42-2');
            const statusTerm = document.getElementById('status-terminal-42-2');
            const btnRun = document.getElementById('btnRunAct42_2');

            if(!consoleText || !alertBox || !statusTerm || !btnRun) return;
            consoleText.classList.remove('italic', 'opacity-60');

            if(in1 === "") {
                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-yellow-50 dark:bg-yellow-950/40 text-yellow-800 dark:text-yellow-400 border-yellow-200 dark:border-yellow-800 text-left transition-colors";
                alertBox.innerHTML = "<i class='fa-solid fa-triangle-exclamation mr-1'></i> Error: Kotak input masih kosong.";
                alertBox.classList.remove('hidden');
                consoleText.innerHTML = "SyntaxError: invalid syntax";
                consoleText.className = "text-[#ff5f56] whitespace-pre-wrap break-words leading-relaxed text-sm text-left block";
                return;
            }

            btnRun.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Memproses...';
            btnRun.disabled = true;

            try {
                const py = await window.ensurePyodideReady();
                py.runPython(`import sys\nfrom io import StringIO\nsys.stdout = StringIO()`);
                
                const pythonCode = `
tabel_jarak = {"Rumah": float('inf'), "Pasar": float('inf')}
try:
    tabel_jarak["Rumah"] = ${in1}
    print("Jarak awal Rumah:", tabel_jarak["Rumah"])
except Exception as e:
    print("Error:", e)
`;
                py.runPython(pythonCode);
                let stdout = py.runPython('sys.stdout.getvalue()').trim();

                if(stdout.includes("Jarak awal Rumah: 0") && !stdout.includes("Error")) {
                    const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                    localStorage.setItem('act_4_2_2_done_v2_' + userId, 'true'); 
                    localStorage.setItem('act_4_2_2_ans1_v2_' + userId, in1);

                    alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-green-50 dark:bg-green-950/40 text-green-800 dark:text-green-400 border-green-400 dark:border-green-800 text-left transition-colors";
                    alertBox.innerHTML = "<i class='fa-solid fa-check-circle mr-1'></i> Kompilasi Berhasil! Anda telah merubah jarak titik start dari infinity menjadi 0.";
                    alertBox.classList.remove('hidden');

                    statusTerm.innerText = "Success";
                    statusTerm.className = "bg-green-700 text-white px-2 py-0.5 rounded text-[10px]";

                    consoleText.className = "text-[#4af626] whitespace-pre-wrap break-words leading-relaxed text-sm text-left block font-bold";
                    consoleText.innerHTML = `
                        <div class="mb-1 text-slate-400 font-normal">&gt; python main.py</div>
                        <div>${stdout.replace(/\n/g, '<br>')}</div>
                    `;

                    window.kunciJawabanAktivitas42_2(in1);

                } else {
                    statusTerm.innerText = "Logic Error";
                    statusTerm.className = "bg-amber-600 text-white px-2 py-0.5 rounded text-[10px]";
                    
                    consoleText.className = "text-[#ff5f56] whitespace-pre-wrap break-words leading-relaxed text-sm text-left block";
                    consoleText.innerHTML = `
                        <div class="mb-1 text-slate-400">&gt; python main.py</div>
                        <div>${stdout.replace(/\n/g, '<br>')}</div>
                    `;

                    alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-amber-50 dark:bg-amber-950/40 text-amber-800 dark:text-amber-400 border-amber-300 dark:border-amber-800 text-left transition-colors";
                    alertBox.innerHTML = "<i class='fa-solid fa-circle-xmark mr-1'></i> Logika Salah: Pikirkan kembali, berapa meter/kilometer jarak untuk pergi dari Rumah Anda... menuju ke Rumah Anda sendiri?";
                    alertBox.classList.remove('hidden');
                }

            } catch (err) {
                consoleText.className = "text-[#ff5f56] whitespace-pre-wrap break-words leading-relaxed text-sm text-left block";
                consoleText.innerHTML = "Traceback (most recent call last):<br>" + err.message;
                statusTerm.innerText = "Syntax Error";
                statusTerm.className = "bg-red-800 text-red-200 px-2 py-0.5 rounded text-[10px]";

                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-red-50 dark:bg-red-950/40 text-red-800 dark:text-red-400 border-red-300 dark:border-red-800 text-left transition-colors";
                alertBox.innerHTML = "<i class='fa-solid fa-circle-xmark mr-1'></i> Syntax Error: Terdapat kesalahan ketik pada input Anda.";
                alertBox.classList.remove('hidden');
            } finally {
                if (btnRun.innerHTML.includes('Memproses')) {
                    btnRun.innerHTML = 'Jalankan & Periksa';
                    btnRun.disabled = false;
                }
            }
        }

        // --- 8. VALIDATOR AKTIVITAS 4.2 (SOAL 3) ---
        window.runAktivitas42_3 = async function() {
            const in1 = document.getElementById('input42_3_1').value.trim();
            const in2 = document.getElementById('input42_3_2').value.trim();
            const alertBox = document.getElementById('alert-42-3');
            const consoleText = document.getElementById('console-text-42-3');
            const statusTerm = document.getElementById('status-terminal-42-3');
            const btnRun = document.getElementById('btnRunAct42_3');

            if(!consoleText || !alertBox || !statusTerm || !btnRun) return;
            consoleText.classList.remove('italic', 'opacity-60');

            if(in1 === "" || in2 === "") {
                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-yellow-50 dark:bg-yellow-950/40 text-yellow-800 dark:text-yellow-400 border-yellow-200 dark:border-yellow-800 text-left transition-colors";
                alertBox.innerHTML = "<i class='fa-solid fa-triangle-exclamation mr-1'></i> Error: Syntax Tidak Lengkap. Masih ada kotak input yang kosong.";
                alertBox.classList.remove('hidden');
                consoleText.innerHTML = "SyntaxError: Key/Value cannot be empty.";
                consoleText.className = "text-[#ff5f56] whitespace-pre-wrap break-words leading-relaxed text-sm text-left block";
                return;
            }

            btnRun.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Memproses...';
            btnRun.disabled = true;

            try {
                const py = await window.ensurePyodideReady();
                py.runPython(`import sys\nfrom io import StringIO\nsys.stdout = StringIO()`);
                
                const pythonCode = `
daftar_lokasi = ["A", "B", "C", "D", "E"]
tabel_jarak = {}
try:
    for lokasi in daftar_lokasi:
        tabel_jarak[${in1}] = ${in2}
    print(tabel_jarak)
except Exception as e:
    print("Error:", e)
`;
                py.runPython(pythonCode);
                let stdout = py.runPython('sys.stdout.getvalue()').trim();

                if(stdout.includes("'A': inf") && !stdout.includes("Error")) {
                    const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                    localStorage.setItem('act_4_2_3_done_v2_' + userId, 'true'); 
                    localStorage.setItem('act_4_2_3_ans1_v2_' + userId, in1);
                    localStorage.setItem('act_4_2_3_ans2_v2_' + userId, in2);

                    alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-green-50 dark:bg-green-950/40 text-green-800 dark:text-green-400 border-green-400 dark:border-green-800 text-left transition-colors";
                    alertBox.innerHTML = "<i class='fa-solid fa-check-circle mr-1'></i> Kompilasi Berhasil! Seluruh lokasi berhasil didaftarkan ke dictionary dan diisi dengan Infinity.";
                    alertBox.classList.remove('hidden');

                    statusTerm.innerText = "Success";
                    statusTerm.className = "bg-green-700 text-white px-2 py-0.5 rounded text-[10px]";

                    consoleText.className = "text-[#4af626] whitespace-pre-wrap break-words leading-relaxed text-sm text-left block font-bold";
                    consoleText.innerHTML = `
                        <div class="mb-1 text-slate-400 font-normal">&gt; python main.py</div>
                        <div>${stdout.replace(/\n/g, '<br>')}</div>
                    `;

                    window.kunciJawabanAktivitas42_3(in1, in2);

                    // TEMBAK DB KETIKA KETIGANYA SELESAI
                    fetch("{{ route('submit.score') }}", { 
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
                    }).catch(error => { console.error("GAGAL SIMPAN KE DB:", error); });

                } else {
                    statusTerm.innerText = "Logic Error";
                    statusTerm.className = "bg-amber-600 text-white px-2 py-0.5 rounded text-[10px]";
                    
                    consoleText.className = "text-[#ff5f56] whitespace-pre-wrap break-words leading-relaxed text-sm text-left block";
                    consoleText.innerHTML = `
                        <div class="mb-1 text-slate-400">&gt; python main.py</div>
                        <div>${stdout.replace(/\n/g, '<br>')}</div>
                    `;

                    alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-amber-50 dark:bg-amber-950/40 text-amber-800 dark:text-amber-400 border-amber-300 dark:border-amber-800 text-left transition-colors";
                    alertBox.innerHTML = "<i class='fa-solid fa-circle-xmark mr-1'></i> Logika Keliru: Pastikan Anda memanggil variabel yang berputar di dalam For Loop sebagai Key, lalu menyetel valuenya menjadi fungsi Infinity.";
                    alertBox.classList.remove('hidden');
                }

            } catch (err) {
                consoleText.className = "text-[#ff5f56] whitespace-pre-wrap break-words leading-relaxed text-sm text-left block";
                consoleText.innerHTML = "Traceback (most recent call last):<br>" + err.message;
                statusTerm.innerText = "Syntax Error";
                statusTerm.className = "bg-red-800 text-red-200 px-2 py-0.5 rounded text-[10px]";

                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-red-50 dark:bg-red-950/40 text-red-800 dark:text-red-400 border-red-300 dark:border-red-800 text-left transition-colors";
                alertBox.innerHTML = "<i class='fa-solid fa-circle-xmark mr-1'></i> Syntax Error: Terdapat kesalahan ketik pada input Anda.";
                alertBox.classList.remove('hidden');
            } finally {
                if (btnRun.innerHTML.includes('Memproses')) {
                    btnRun.innerHTML = 'Jalankan & Periksa';
                    btnRun.disabled = false;
                }
            }
        }


        // --- 9. FUNGSI UPDATE UI JAWABAN BENAR ---
        window.kunciJawabanAktivitas42_1 = function(val1) {
            const in1 = document.getElementById('input42_1_1');
            
            if(in1) {
                in1.value = val1 || "float('inf')"; 
                in1.disabled = true;
                in1.classList.replace('text-[#dcdcaa]', 'text-white');
                in1.classList.add('bg-emerald-500', 'border-emerald-400', 'font-bold', 'cursor-not-allowed', 'shadow-md');
            }

            const btnRun = document.getElementById('btnRunAct42_1');
            if(btnRun) {
                btnRun.innerHTML = 'Diselesaikan';
                btnRun.classList.replace('bg-yellow-600', 'bg-slate-600');
                btnRun.classList.replace('hover:bg-yellow-500', 'cursor-not-allowed');
                btnRun.disabled = true;
            }

            const consoleText = document.getElementById('console-text-42-1');
            if (consoleText && consoleText.innerHTML.includes('Output terminal')) {
                 consoleText.classList.remove('italic', 'opacity-60');
                 consoleText.className = "text-[#4af626] whitespace-pre-wrap break-words leading-relaxed text-sm text-left block font-bold";
                 consoleText.innerHTML = `
                    <div class="mb-1 text-slate-400 font-normal">&gt; python main.py</div>
                    <div>Berhasil! Nilai ini lebih besar dari angka berapapun.</div>
                 `;
            }

            const feedbackEdu = document.getElementById('feedback-edukatif-42-1');
            if(feedbackEdu) feedbackEdu.classList.remove('hidden');

            document.getElementById('activity-42-2-container').classList.remove('opacity-50', 'pointer-events-none');
        }

        window.kunciJawabanAktivitas42_2 = function(val1) {
            const in1 = document.getElementById('input42_2_1');
            
            if(in1) {
                in1.value = val1 || "0"; 
                in1.disabled = true;
                in1.classList.replace('text-[#b5cea8]', 'text-white');
                in1.classList.add('bg-emerald-500', 'border-emerald-400', 'font-bold', 'cursor-not-allowed', 'shadow-md');
            }

            const btnRun = document.getElementById('btnRunAct42_2');
            if(btnRun) {
                btnRun.innerHTML = 'Diselesaikan';
                btnRun.classList.replace('bg-yellow-600', 'bg-slate-600');
                btnRun.classList.replace('hover:bg-yellow-500', 'cursor-not-allowed');
                btnRun.disabled = true;
            }

            const consoleText = document.getElementById('console-text-42-2');
            if (consoleText && consoleText.innerHTML.includes('Output terminal')) {
                 consoleText.classList.remove('italic', 'opacity-60');
                 consoleText.className = "text-[#4af626] whitespace-pre-wrap break-words leading-relaxed text-sm text-left block font-bold";
                 consoleText.innerHTML = `
                    <div class="mb-1 text-slate-400 font-normal">&gt; python main.py</div>
                    <div>Jarak awal Rumah: 0</div>
                 `;
            }

            const feedbackEdu = document.getElementById('feedback-edukatif-42-2');
            if(feedbackEdu) feedbackEdu.classList.remove('hidden');

            document.getElementById('activity-42-3-container').classList.remove('opacity-50', 'pointer-events-none');
        }

        window.kunciJawabanAktivitas42_3 = function(val1, val2) {
            const in1 = document.getElementById('input42_3_1');
            const in2 = document.getElementById('input42_3_2');
            
            if(in1) {
                in1.value = val1 || 'lokasi'; 
                in1.disabled = true;
                in1.classList.replace('text-[#9cdcfe]', 'text-white');
                in1.classList.add('bg-emerald-500', 'border-emerald-400', 'font-bold', 'cursor-not-allowed', 'shadow-md');
            }
            if(in2) {
                in2.value = val2 || "float('inf')"; 
                in2.disabled = true;
                in2.classList.replace('text-[#dcdcaa]', 'text-white');
                in2.classList.add('bg-emerald-500', 'border-emerald-400', 'font-bold', 'cursor-not-allowed', 'shadow-md');
            }

            const btnRun = document.getElementById('btnRunAct42_3');
            if(btnRun) {
                btnRun.innerHTML = 'Diselesaikan';
                btnRun.classList.replace('bg-yellow-600', 'bg-slate-600');
                btnRun.classList.replace('hover:bg-yellow-500', 'cursor-not-allowed');
                btnRun.disabled = true;
            }

            const consoleText = document.getElementById('console-text-42-3');
            if (consoleText && consoleText.innerHTML.includes('Output terminal')) {
                 consoleText.classList.remove('italic', 'opacity-60');
                 consoleText.className = "text-[#4af626] whitespace-pre-wrap break-words leading-relaxed text-sm text-left block font-bold";
                 consoleText.innerHTML = `
                    <div class="mb-1 text-slate-400 font-normal">&gt; python main.py</div>
                    <div>{'A': inf, 'B': inf, 'C': inf, 'D': inf, 'E': inf}</div>
                 `;
            }

            const feedbackEdu = document.getElementById('feedback-edukatif-42-3');
            if(feedbackEdu) feedbackEdu.classList.remove('hidden');

            const btnNext = document.getElementById('btnNext42');
            if(btnNext) {
                btnNext.disabled = false;
                btnNext.classList.remove('opacity-50', 'cursor-not-allowed', 'bg-slate-900');
                btnNext.classList.add('bg-blue-600', 'hover:bg-blue-700');
            }
            
            const badgeAct = document.getElementById('badge-act42');
            if(badgeAct) badgeAct.classList.remove('hidden');
        }
    </script>
</section>