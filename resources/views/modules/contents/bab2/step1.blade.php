<section id="step-1" class="step-slide">
    {{-- IMPORT VIS JS --}}
    <script type="text/javascript" src="https://unpkg.com/vis-network/standalone/umd/vis-network.min.js"></script>

    <div
        class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm p-8 md:p-10 max-w-6xl mx-auto -mt-8 transition-colors">

        {{-- JUDUL MATERI --}}
        <div class="border-b border-slate-200 dark:border-slate-700 pb-6 mb-8 transition-colors">
            <h2 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white mb-2">2.1 Implementasi Dasar (Simpul
                dan Sisi)</h2>
            <p class="text-slate-500 dark:text-slate-400 font-medium">Menerjemahkan Simpul (Vertex) dan Sisi (Edge) ke
                dalam memori komputer.</p>
        </div>

        {{-- KONTEN TEORI --}}
        <div
            class="prose prose-slate dark:prose-invert text-slate-700 dark:text-slate-300 leading-relaxed text-justify mb-8 max-w-none">
            <p>
                Cara paling mendasar untuk menerjemahkan graf ke dalam memori komputer adalah dengan menyimpan data
                Simpul (<em>Vertex</em>) dan Sisi (<em>Edge</em>) ke dalam dua wadah tipe data yang berbeda.
            </p>
        </div>

        {{-- VISUALISASI GRAF DASAR (INTERAKTIF DENGAN INFO PANEL) --}}
        <div
            class="bg-slate-50 dark:bg-slate-800/50 p-5 rounded-xl border border-slate-200 dark:border-slate-700 shadow-inner w-full flex flex-col items-center mb-8 group transition-colors">

            <div id="graf_isolasi_21"
                class="w-full h-[200px] cursor-pointer bg-white dark:bg-slate-900 rounded-lg border border-slate-200 dark:border-slate-700 shadow-sm relative overflow-hidden transition-colors">
            </div>

            <div id="graf-info-panel"
                class="w-full mt-4 p-3 bg-blue-50/50 dark:bg-slate-800/50 border border-blue-200 dark:border-slate-700 rounded-lg text-sm text-slate-600 dark:text-slate-400 text-center transition-all min-h-[50px] flex items-center justify-center">
                <em><i class="fa-solid fa-hand-pointer text-blue-400 dark:text-blue-500 mr-2"></i>Klik salah satu titik
                    (simpul) atau garis (sisi) untuk melihat representasi kodenya.</em>
            </div>

            <span
                class="text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mt-3">Visualisasi
                Interaktif - Graf Dasar</span>
        </div>

        {{-- PENJELASAN TIPE DATA (LIST VS TUPLE) --}}
        <div class="mb-10">
            <p class="text-slate-700 dark:text-slate-300 leading-relaxed text-justify mb-5">
                Berdasarkan simulasi klik di atas, komputer membedakan cara menyimpan titik dan garis menggunakan dua
                tipe data bawaan Python. Mengapa harus dibedakan?
            </p>

            <div class="space-y-5">
                {{-- Penjelasan List --}}
                <div
                    class="bg-white dark:bg-slate-800/80 border border-slate-200 dark:border-slate-700 p-5 rounded-xl shadow-sm hover:border-blue-300 dark:hover:border-blue-500 transition-colors">
                    <h4 class="font-bold text-blue-700 dark:text-blue-400 text-lg mb-2 flex items-center gap-2">
                        <i class="fa-solid fa-list-ul"></i> 1. Mengapa Simpul menggunakan List <code>[ ... ]</code> ?
                    </h4>
                    <p class="text-sm text-slate-700 dark:text-slate-300 mb-3 text-justify leading-relaxed">
                        Sifat utama <em>List</em> adalah <strong>Bisa Diedit (Mutable)</strong>. Di dalam program,
                        jumlah titik lokasi (simpul) bisa saja bertambah seiring berjalannya waktu. Dengan
                        <em>List</em>, kita punya wadah elastis yang mengizinkan kita menambahkan data simpul baru kapan
                        saja menggunakan fungsi <code>.append()</code>.
                    </p>
                    <div
                        class="bg-blue-50 dark:bg-blue-900/30 px-4 py-3 rounded text-sm text-blue-900 dark:text-blue-300 font-medium border border-blue-100 dark:border-blue-800">
                        <i class="fa-solid fa-lightbulb text-yellow-500 mr-1"></i> <strong>Pemahaman Sederhana:</strong>
                        <em>List</em> itu seperti <strong>Grup WhatsApp</strong>. Kita bisa dengan bebas menambahkan
                        kontak teman yang baru dikenal ke dalamnya kapan saja.
                    </div>
                </div>

                {{-- Penjelasan Tuple --}}
                <div
                    class="bg-white dark:bg-slate-800/80 border border-slate-200 dark:border-slate-700 p-5 rounded-xl shadow-sm hover:border-purple-300 dark:hover:border-purple-500 transition-colors">
                    <h4 class="font-bold text-purple-700 dark:text-purple-400 text-lg mb-2 flex items-center gap-2">
                        <i class="fa-solid fa-link"></i> 2. Mengapa Sisi dibungkus dengan Tuple <code>( ... )</code> ?
                    </h4>
                    <p class="text-sm text-slate-700 dark:text-slate-300 mb-3 text-justify leading-relaxed">
                        Sifat utama <em>Tuple</em> adalah <strong>Terkunci Permanen (Immutable)</strong>. Isinya tidak
                        bisa diedit setelah dibuat. Sebuah sisi/garis secara hukum logika hanya boleh memiliki TEPAT DUA
                        ujung. <em>Tuple</em> digunakan untuk "mengunci" pasangan dua titik ini, mencegah terjadinya
                        <em>bug</em> di mana program tanpa sengaja memasukkan titik ketiga ke dalam garis yang sama.
                    </p>
                    <div
                        class="bg-purple-50 dark:bg-purple-900/30 px-4 py-3 rounded text-sm text-purple-900 dark:text-purple-300 font-medium border border-purple-100 dark:border-purple-800">
                        <i class="fa-solid fa-lightbulb text-yellow-500 mr-1"></i> <strong>Pemahaman Sederhana:</strong>
                        <em>Tuple</em> itu seperti <strong>Tiket Kereta Api</strong> (Jakarta - Bandung). Tiket ini
                        bersifat mutlak mengikat dua tujuan. Kita tidak bisa mencoret dan menambah kota ketiga di tiket
                        yang sama.
                    </div>
                </div>
            </div>
        </div>

        {{-- CONTOH KODE PROGRAM DENGAN LINE NUMBERS --}}
        <div class="mb-8">
            <h3 class="text-lg font-bold text-slate-800 dark:text-slate-100 mb-3">Contoh Kode Program:</h3>

            <div
                class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 select-none flex flex-col h-auto">
                <div class="bg-[#2d2d2d] px-4 py-2.5 flex items-center gap-2 border-b border-slate-700 shrink-0">
                    <div class="w-3 h-3 rounded-full bg-[#ff5f56]"></div>
                    <div class="w-3 h-3 rounded-full bg-[#ffbd2e]"></div>
                    <div class="w-3 h-3 rounded-full bg-[#27c93f]"></div>
                    <span class="text-slate-400 text-xs ml-2 font-mono">contoh_graf.py (Hanya Baca)</span>
                </div>

                {{-- CODE BLOCK --}}
                <div class="flex font-mono text-[12px] md:text-sm text-[#d4d4d4] overflow-x-auto">
                    <div
                        class="flex flex-col text-[#858585] text-right select-none py-5 pl-4 pr-4 border-r border-[#404040] bg-[#1e1e1e] leading-[1.625] shrink-0">
                        <span>1</span><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span><span>7</span><span>8</span><span>9</span><span>10</span>
                    </div>

                    <div class="flex flex-col whitespace-pre py-5 pl-4 pr-6 leading-[1.625]">
                        <div class="text-[#6a9955]"># 1. Membuat data awal</div>
                        <div><span class="text-[#9cdcfe]">nodes</span> = [<span class="text-[#ce9178]">'A'</span>, <span
                                class="text-[#ce9178]">'B'</span>, <span class="text-[#ce9178]">'C'</span>]</div>
                        <div><span class="text-[#9cdcfe]">edges</span> = [(<span class="text-[#ce9178]">'A'</span>,
                            <span class="text-[#ce9178]">'B'</span>), (<span class="text-[#ce9178]">'B'</span>, <span
                                class="text-[#ce9178]">'C'</span>)]</div>
                        <div class="text-[#6a9955]"># 2. Menambahkan Simpul baru menggunakan .append()</div>
                        <div><span class="text-[#9cdcfe]">nodes</span>.<span class="text-[#dcdcaa]">append</span>(<span
                                class="text-[#ce9178]">'D'</span>)</div>
                        <div class="text-[#6a9955]"># 3. Menambahkan Sisi baru menggunakan .append()</div>
                        <div><span class="text-[#9cdcfe]">edges</span>.<span class="text-[#dcdcaa]">append</span>((<span
                                class="text-[#ce9178]">'C'</span>, <span class="text-[#ce9178]">'D'</span>))</div>
                        <div class="text-[#6a9955]"># Menampilkan hasil ke layar</div>
                        <div><span class="text-[#dcdcaa]">print</span>(<span class="text-[#ce9178]"">"Daftar
                                Simpul:"</span>, <span class="text-[#9cdcfe]">nodes</span>)</div>
                        <div><span class="text-[#dcdcaa]">print</span>(<span class="text-[#ce9178]"">"Daftar
                                Sisi:"</span>, <span class="text-[#9cdcfe]">edges</span>)</div>
                    </div>
                </div>
            </div>

            <div
                class="mt-4 bg-slate-50 dark:bg-slate-800/50 p-6 rounded-xl border border-slate-200 dark:border-slate-700 shadow-sm transition-colors">
                <h4 class="font-bold text-slate-800 dark:text-slate-200 text-sm mb-4">Pembedahan Sintaks (Langkah demi
                    Langkah):</h4>
                <ul
                    class="list-disc list-outside ml-5 text-sm text-slate-700 dark:text-slate-300 space-y-3 text-justify">
                    <li><strong>Baris 1, 4, 6, 8 (Komentar):</strong> Tanda <code>#</code> adalah catatan pengingat bagi
                        <em>programmer</em>. Komputer akan mengabaikannya.</li>
                    <li><strong>Baris 2 & 3 (Inisialisasi):</strong> Pendefinisian graf awal. Variabel
                        <code>nodes</code> memakai kurung siku <code>[]</code> (List), sedangkan relasi di
                        <code>edges</code> dibungkus kurung biasa <code>()</code> (Tuple).</li>
                    <li><strong>Baris 5 (Menambah Simpul Baru):</strong> Kita memanggil perintah
                        <code>.append('D')</code> untuk mendaftarkan titik lokasi 'D' secara langsung ke dalam memori.
                    </li>
                    <li><strong>Baris 7 (Menambah Relasi Baru):</strong> Ini bagian yang penting. Harus menggunakan dua
                        lapis kurung <code>(('C', 'D'))</code>.
                        <ul class="list-[circle] ml-4 mt-2 space-y-1">
                            <li>Kurung terluar <code>append( ... )</code> adalah perintah untuk memasukkan data.</li>
                            <li>Kurung di dalam <code>('C', 'D')</code> menyatukan titik C dan D menjadi satu rute utuh
                                (<em>Tuple</em>).</li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- INTERACTIVE SANDBOX DENGAN DYNAMIC LINE NUMBERS --}}
        {{-- ========================================== --}}
        <div
            class="mb-10 p-6 border-2 border-blue-200 dark:border-blue-900 bg-blue-50/30 dark:bg-blue-900/10 rounded-xl shadow-sm transition-colors">
            <h3 class="text-lg font-bold text-slate-800 dark:text-slate-100 mb-2 flex items-center gap-2">
                <i class="fa-solid fa-keyboard text-blue-600 dark:text-blue-400"></i> Coba Sendiri!
            </h3>
            <p class="text-sm text-slate-600 dark:text-slate-400 mb-4 text-justify">
                Ketik ulang keseluruhan kode pada contoh di atas ke dalam editor di bawah ini (tidak perlu mengetik
                komentarnya).
            </p>

            <div
                class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 font-mono text-sm relative">
                <div
                    class="bg-[#2d2d2d] px-4 py-2.5 flex items-center justify-between border-b border-slate-700 shrink-0">
                    <span class="text-slate-400 text-xs tracking-wider">Terminal Editor (main.py)</span>
                    <button onclick="window.runSandbox21()" id="btnRunSandbox"
                        class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors flex items-center gap-2 shadow-sm active:scale-95">
                        <i class="fa-solid fa-play"></i> Jalankan Program
                    </button>
                </div>

                <div class="flex font-mono text-[12px] md:text-sm text-[#d4d4d4] bg-[#1e1e1e] relative min-h-[160px]">
                    <div id="line-numbers-21"
                        class="text-[#858585] text-right select-none py-5 pl-4 pr-4 border-r border-[#404040] bg-[#1e1e1e] leading-[1.625] shrink-0">
                        <div>1</div>
                    </div>
                    <textarea id="editor-sandbox-21"
                        class="w-full bg-transparent text-[#d4d4d4] outline-none resize-none py-5 pl-4 pr-6 leading-[1.625] whitespace-pre overflow-x-auto"
                        spellcheck="false" placeholder="# Ketik kode Python di sini..."></textarea>
                </div>

                <div id="console-sandbox-21" class="hidden border-t border-slate-700 bg-black p-5 text-xs font-mono">
                    <span class="text-slate-400">> root@graflearn: python main.py</span><br>
                    <div id="sandbox-output-text" class="mt-2 leading-relaxed"></div>
                </div>
            </div>
        </div>

        {{-- OUTPUT EXPLANATION (MUNCUL SETELAH SANDBOX BERHASIL) --}}
        <div id="output-explanation-21" class="mb-12 hidden transition-all duration-700">
            <h4 class="font-bold text-slate-800 text-sm mb-2 border-b pb-2">Analisis Output Program:</h4>
            <p class="text-sm text-slate-700 mt-3 text-justify leading-relaxed">
                Berdasarkan program yang berhasil Anda jalankan, outputnya akan terlihat seperti ini: <br>
                <code class="bg-slate-100 px-2 py-1 rounded text-blue-700 font-bold block mt-2 mb-2">Daftar Simpul:
                    ['A', 'B', 'C', 'D']</code>
                <code class="bg-slate-100 px-2 py-1 rounded text-blue-700 font-bold block mb-3">Daftar Sisi: [('A',
                    'B'), ('B', 'C'), ('C', 'D')]</code>
                Output tersebut membuktikan bahwa kini komputer telah menyimpan struktur graf yang utuh di dalam
                memorinya. Graf tersebut memiliki empat simpul (A, B, C, D) yang saling terhubung secara berurutan
                membentuk jalur <strong>A &rarr; B &rarr; C &rarr; D</strong>.
            </p>
        </div>

        {{-- ========================================== --}}
        {{-- BLOK AKTIVITAS UTAMA 2.1 (TERKUNCI SECARA DEFAULT) --}}
        {{-- ========================================== --}}
        <div id="main-activity-wrapper"
            class="mt-12 pt-8 border-t-[3px] border-dashed border-slate-200 dark:border-slate-700 transition-all duration-700 opacity-50 pointer-events-none relative">

            {{-- Pesan Terkunci (Hilang saat Sandbox sukses) --}}
            <div id="lock-message"
                class="absolute top-20 left-1/2 -translate-x-1/2 z-10 flex items-center justify-center w-full">
                <div
                    class="bg-slate-800/90 dark:bg-slate-900/90 border border-slate-600 text-white text-sm px-6 py-3 rounded-full font-bold shadow-xl backdrop-blur-sm flex items-center gap-3">
                    <i class="fa-solid fa-lock text-slate-400"></i> Selesaikan "Coba Sendiri" untuk membuka aktivitas
                </div>
            </div>

            <div class="flex items-center gap-3 mb-8">
                <span
                    class="bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider shadow-sm">Aktivitas
                    2.1</span>
                <h3 class="font-bold text-slate-900 dark:text-slate-100 text-xl">Uji Pemahaman Dasar</h3>
            </div>

            {{-- SOAL 1: MENAMBAH ENTITAS --}}
            <div id="activity-21-1-container" class="mb-10 transition-opacity duration-500">
                <h4 class="font-bold text-slate-800 dark:text-slate-200 text-lg mb-3">1. Menambah Entitas Baru</h4>
                <div
                    class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-xl p-6 mb-6 shadow-sm transition-colors">
                    <p class="text-sm text-blue-900 dark:text-blue-200 leading-relaxed text-justify mb-3">
                        <strong>Skenario:</strong> Misalkan Anda adalah developer yang sedang mengelola aplikasi rute
                        angkot. Saat ini rute di memori komputer hanya memuat halte "Pasar" dan "Kampus". Hari ini
                        pemerintah membangun halte baru bernama "Taman", dan ada jalan lurus yang menghubungkan "Kampus"
                        langsung menuju ke "Taman".
                    </p>
                    <div
                        class="bg-white/80 dark:bg-slate-800/80 p-4 rounded border border-blue-200 dark:border-blue-700 font-medium text-blue-900 dark:text-blue-300 text-sm shadow-sm leading-relaxed transition-colors">
                        <strong>Tugas Anda:</strong> Lengkapi kode di bawah ini menggunakan perintah <code
                            class="bg-blue-100 dark:bg-blue-900/60 px-1 rounded text-blue-700 dark:text-blue-300 border border-blue-200 dark:border-blue-800 font-mono text-xs">append</code>
                        yang baru saja Anda pelajari untuk menambahkan simpul halte "Taman" dan merekam sisi lintasan
                        ("Kampus", "Taman") ke dalam memori komputer!
                    </div>
                </div>

                <div
                    class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 font-mono text-sm">
                    <div
                        class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700 shrink-0">
                        <span class="text-slate-400 text-xs">Terminal Editor Pyodide</span>
                        <button onclick="window.runAktivitas21_1()" id="btnRun21_1"
                            class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors flex items-center gap-2 shadow-sm active:scale-95">
                            Cek Jawaban
                        </button>
                    </div>

                    <div class="p-6 leading-relaxed text-[#d4d4d4] overflow-x-auto whitespace-nowrap">
                        <div><span class="text-[#9cdcfe]">simpul_rute</span> = [<span
                                class="text-[#ce9178]">"Pasar"</span>, <span class="text-[#ce9178]">"Kampus"</span>]
                        </div>
                        <div class="mb-4"><span class="text-[#9cdcfe]">sisi_rute</span> = [(<span
                                class="text-[#ce9178]">"Pasar"</span>, <span class="text-[#ce9178]">"Kampus"</span>)]
                        </div>

                        <div class="text-[#6a9955]"># Tulis kode Anda di bawah ini:</div>

                        <div class="flex items-center">
                            <span class="text-[#9cdcfe]">simpul_rute</span>.<input type="text" id="input21_1_1"
                                class="bg-[#3c3c3c] dark:bg-slate-700 text-[#dcdcaa] border border-slate-600 dark:border-slate-500 rounded px-1.5 py-0.5 mx-1 w-24 outline-none focus:border-blue-400 focus:bg-[#2d2d2d] dark:focus:bg-slate-800 text-center transition-colors shadow-inner font-bold"
                                autocomplete="off" spellcheck="false">(<span class="text-[#ce9178]">"Taman"</span>)
                        </div>

                        <div class="flex items-center mt-1">
                            <span class="text-[#9cdcfe]">sisi_rute</span>.<input type="text" id="input21_1_2"
                                class="bg-[#3c3c3c] dark:bg-slate-700 text-[#dcdcaa] border border-slate-600 dark:border-slate-500 rounded px-1.5 py-0.5 mx-1 w-24 outline-none focus:border-blue-400 focus:bg-[#2d2d2d] dark:focus:bg-slate-800 text-center transition-colors shadow-inner font-bold"
                                autocomplete="off" spellcheck="false">((<input type="text" id="input21_1_3"
                                class="bg-[#3c3c3c] dark:bg-slate-700 text-[#ce9178] border border-slate-600 dark:border-slate-500 rounded px-1.5 py-0.5 mx-1 w-28 outline-none focus:border-blue-400 focus:bg-[#2d2d2d] dark:focus:bg-slate-800 text-center transition-colors shadow-inner font-bold"
                                placeholder='"..."' autocomplete="off" spellcheck="false">, <input type="text"
                                id="input21_1_4"
                                class="bg-[#3c3c3c] dark:bg-slate-700 text-[#ce9178] border border-slate-600 dark:border-slate-500 rounded px-1.5 py-0.5 mx-1 w-28 outline-none focus:border-blue-400 focus:bg-[#2d2d2d] dark:focus:bg-slate-800 text-center transition-colors shadow-inner font-bold"
                                placeholder='"..."' autocomplete="off" spellcheck="false">))
                        </div>

                        <div class="mt-4"><span class="text-[#dcdcaa]">print</span>(simpul_rute)</div>
                        <div><span class="text-[#dcdcaa]">print</span>(sisi_rute)</div>
                    </div>

                    <div id="console-output-21-1"
                        class="hidden border-t border-slate-700 bg-black p-5 text-xs font-mono">
                        <span class="text-slate-400">> root@graflearn: python main.py</span><br>
                        <div id="console-text-21-1" class="mt-2 text-[#4af626] leading-relaxed"></div>
                    </div>
                </div>

                <div id="alert-21-1"
                    class="hidden mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border transition-all text-center">
                </div>

                <div id="feedback-edukatif-21-1"
                    class="hidden mt-4 bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-800 p-6 rounded-xl shadow-sm text-slate-800 dark:text-slate-200 text-sm leading-relaxed transition-all">
                    <h4
                        class="font-bold text-green-900 dark:text-green-400 mb-3 flex items-center gap-2 border-b border-green-200 dark:border-green-800 pb-2">
                        <i class="fa-solid fa-lightbulb text-yellow-500"></i> Pembahasan Evaluasi
                    </h4>
                    <p class="text-sm text-green-800 dark:text-green-200 leading-relaxed text-justify mb-2">
                        Luar biasa! Anda telah memahami cara kerja arsitektur data graf secara fundamental.
                    </p>
                    <ul class="list-disc pl-5 text-sm text-green-800 dark:text-green-200 space-y-2 text-justify">
                        <li>Karena simpul ("Taman") adalah entitas mandiri, kita menambahkannya seperti data string
                            biasa.</li>
                        <li>Namun, jalan ("Kampus", "Taman") adalah relasi berpasangan. Oleh karena itu, kita
                            <strong>wajib membungkusnya dalam kurung pelindung (Tuple)</strong> agar sistem
                            menganggapnya sebagai satu kesatuan rute yang solid.</li>
                    </ul>
                </div>
            </div>

            {{-- SOAL 2: MENAMBAH RANTAI RELASI --}}
            <div id="activity-21-2-container"
                class="mb-10 opacity-50 pointer-events-none transition-opacity duration-500 relative">
                <h4 class="font-bold text-slate-800 dark:text-slate-200 text-lg mb-3">2. Rantai Relasi (Menambah Simpul
                    dan Sisi)</h4>
                <div
                    class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-xl p-6 mb-6 shadow-sm transition-colors">
                    <p class="text-sm text-blue-900 dark:text-blue-200 leading-relaxed text-justify mb-3">
                        <strong>Skenario:</strong> Setelah halte "Taman" selesai, pemerintah langsung menyambungnya ke
                        halte "Stasiun".
                    </p>
                    <div
                        class="bg-white/80 dark:bg-slate-800/80 p-4 rounded border border-blue-200 dark:border-blue-700 font-medium text-blue-900 dark:text-blue-300 text-sm shadow-sm leading-relaxed transition-colors">
                        <strong>Tugas Anda:</strong> Gunakan fungsi <code
                            class="bg-blue-100 dark:bg-blue-900/60 px-1 rounded text-blue-700 dark:text-blue-300 border border-blue-200 dark:border-blue-800 font-mono text-xs">append()</code>
                        untuk memasukkan "Stasiun" ke dalam list <code>simpul_rute</code>, lalu tambahkan rute lintasan
                        ("Taman", "Stasiun") ke dalam memori <code>sisi_rute</code>.
                    </div>
                </div>

                <div
                    class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 font-mono text-sm">
                    <div
                        class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700 shrink-0">
                        <span class="text-slate-400 text-xs">Terminal Editor Pyodide</span>
                        <button onclick="window.runAktivitas21_2()" id="btnRun21_2"
                            class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors flex items-center gap-2 shadow-sm active:scale-95">
                            Cek Jawaban
                        </button>
                    </div>

                    <div class="p-6 leading-relaxed text-[#d4d4d4] overflow-x-auto whitespace-nowrap">
                        <div><span class="text-[#9cdcfe]">simpul_rute</span> = [<span
                                class="text-[#ce9178]">"Pasar"</span>, <span class="text-[#ce9178]">"Kampus"</span>,
                            <span class="text-[#ce9178]">"Taman"</span>]</div>
                        <div class="mb-4"><span class="text-[#9cdcfe]">sisi_rute</span> = [(<span
                                class="text-[#ce9178]">"Pasar"</span>, <span class="text-[#ce9178]">"Kampus"</span>),
                            (<span class="text-[#ce9178]">"Kampus"</span>, <span
                                class="text-[#ce9178]">"Taman"</span>)]</div>

                        <div class="text-[#6a9955]"># Tambahkan simpul "Stasiun" di bawah ini:</div>
                        <div class="flex items-center mb-2">
                            <span class="text-[#9cdcfe]">simpul_rute</span>.<input type="text" id="input21_2_1"
                                class="bg-[#3c3c3c] dark:bg-slate-700 text-[#dcdcaa] border border-slate-600 dark:border-slate-500 rounded px-1.5 py-0.5 mx-1 w-24 outline-none focus:border-blue-400 focus:bg-[#2d2d2d] dark:focus:bg-slate-800 text-center transition-colors shadow-inner font-bold"
                                autocomplete="off" spellcheck="false">(<input type="text" id="input21_2_2"
                                class="bg-[#3c3c3c] dark:bg-slate-700 text-[#ce9178] border border-slate-600 dark:border-slate-500 rounded px-1.5 py-0.5 mx-1 w-28 outline-none focus:border-blue-400 focus:bg-[#2d2d2d] dark:focus:bg-slate-800 text-center transition-colors shadow-inner font-bold"
                                placeholder='"..."' autocomplete="off" spellcheck="false">)
                        </div>

                        <div class="text-[#6a9955]"># Tambahkan sisi dari Taman ke Stasiun di bawah ini:</div>
                        <div class="flex items-center">
                            <span class="text-[#9cdcfe]">sisi_rute</span>.<input type="text" id="input21_2_3"
                                class="bg-[#3c3c3c] dark:bg-slate-700 text-[#dcdcaa] border border-slate-600 dark:border-slate-500 rounded px-1.5 py-0.5 mx-1 w-24 outline-none focus:border-blue-400 focus:bg-[#2d2d2d] dark:focus:bg-slate-800 text-center transition-colors shadow-inner font-bold"
                                autocomplete="off" spellcheck="false">(<input type="text" id="input21_2_4"
                                class="bg-[#3c3c3c] dark:bg-slate-700 text-[#ce9178] border border-slate-600 dark:border-slate-500 rounded px-1.5 py-0.5 mx-1 w-48 outline-none focus:border-blue-400 focus:bg-[#2d2d2d] dark:focus:bg-slate-800 text-center transition-colors shadow-inner font-bold"
                                placeholder='(("...", "..."))' autocomplete="off" spellcheck="false">)
                        </div>

                        <div class="mt-4"><span class="text-[#dcdcaa]">print</span>(simpul_rute)</div>
                        <div><span class="text-[#dcdcaa]">print</span>(sisi_rute)</div>
                    </div>

                    <div id="console-output-21-2"
                        class="hidden border-t border-slate-700 bg-black p-5 text-xs font-mono">
                        <span class="text-slate-400">> root@graflearn: python main.py</span><br>
                        <div id="console-text-21-2" class="mt-2 text-[#4af626] leading-relaxed"></div>
                    </div>
                </div>

                <div id="alert-21-2"
                    class="hidden mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border transition-all text-center">
                </div>

                <div id="feedback-edukatif-21-2"
                    class="hidden mt-4 bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-800 p-6 rounded-xl shadow-sm text-slate-800 dark:text-slate-200 text-sm leading-relaxed transition-all">
                    <h4
                        class="font-bold text-green-900 dark:text-green-400 mb-3 border-b border-green-200 dark:border-green-800 pb-2">
                        Pembahasan Evaluasi
                    </h4>
                    <p class="text-sm text-green-800 dark:text-green-200 leading-relaxed text-justify mb-2">
                        Tepat sekali! Anda menggunakan <code>.append("Stasiun")</code> untuk menambahkan simpul baru.
                        Perhatikan bahwa untuk menambahkan sisi, Anda wajib membungkusnya dengan tanda kurung ganda
                        <code>(("Taman", "Stasiun"))</code>. Kurung terluar adalah milik fungsi <code>append()</code>,
                        sedangkan kurung di dalamnya menandakan tipe data <em>Tuple</em> yang bersifat
                        <em>immutable</em>.
                    </p>
                </div>
            </div>

            {{-- SOAL 3: MENUTUP RUTE TUPLE --}}
            <div id="activity-21-3-container"
                class="mb-4 opacity-50 pointer-events-none transition-opacity duration-500 relative">
                <h4 class="font-bold text-slate-800 dark:text-slate-200 text-lg mb-3">3. Menutup Jalur Melingkar dengan
                    Tuple</h4>
                <div
                    class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-xl p-6 mb-6 shadow-sm transition-colors">
                    <p class="text-sm text-blue-900 dark:text-blue-200 leading-relaxed text-justify mb-3">
                        <strong>Skenario:</strong> Ingat, sebuah rute/sisi harus selalu berbentuk pasangan Tuple
                        <code>()</code>. Kita ingin menutup jalur lintasan melingkar dengan menghubungkan halte
                        "Stasiun" agar bisa kembali menuju ke "Pasar".
                    </p>
                    <div
                        class="bg-white/80 dark:bg-slate-800/80 p-4 rounded border border-blue-200 dark:border-blue-700 font-medium text-blue-900 dark:text-blue-300 text-sm shadow-sm leading-relaxed transition-colors">
                        <strong>Tugas Anda:</strong> Ketikkan secara manual tambahan sisi tersebut dengan format
                        <em>Tuple</em> yang benar di dalam fungsi <code>append()</code> yang sudah disediakan.
                    </div>
                </div>

                <div
                    class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 font-mono text-sm">
                    <div
                        class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700 shrink-0">
                        <span class="text-slate-400 text-xs">Terminal Editor Pyodide</span>
                        <button onclick="window.runAktivitas21_3()" id="btnRun21_3"
                            class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors flex items-center gap-2 shadow-sm active:scale-95">
                            Cek Jawaban
                        </button>
                    </div>

                    <div class="p-6 leading-relaxed text-[#d4d4d4] overflow-x-auto whitespace-nowrap">
                        <div class="mb-4"><span class="text-[#9cdcfe]">sisi_rute</span> = [(<span
                                class="text-[#ce9178]">"Pasar"</span>, <span class="text-[#ce9178]">"Kampus"</span>),
                            (<span class="text-[#ce9178]">"Kampus"</span>, <span
                                class="text-[#ce9178]">"Taman"</span>), (<span class="text-[#ce9178]">"Taman"</span>,
                            <span class="text-[#ce9178]">"Stasiun"</span>)]</div>

                        <div class="text-[#6a9955]"># Buat jalan dari "Stasiun" kembali ke "Pasar":</div>

                        <div class="flex items-center mt-1">
                            <span class="text-[#9cdcfe]">sisi_rute</span>.<span class="text-[#dcdcaa]">append</span>(
                            <input type="text" id="input21_3_1"
                                class="bg-[#3c3c3c] dark:bg-slate-700 text-[#ce9178] border border-slate-600 dark:border-slate-500 rounded px-1.5 py-0.5 mx-1 w-48 outline-none focus:border-blue-400 focus:bg-[#2d2d2d] dark:focus:bg-slate-800 text-center transition-colors shadow-inner font-bold"
                                placeholder='("...", "...")' autocomplete="off" spellcheck="false"> )
                        </div>

                        <div class="mt-4"><span class="text-[#dcdcaa]">print</span>(<span
                                class="text-[#ce9178]">"Rute Melingkar Selesai:"</span>, sisi_rute)</div>
                    </div>

                    <div id="console-output-21-3"
                        class="hidden border-t border-slate-700 bg-black p-5 text-xs font-mono">
                        <span class="text-slate-400">> root@graflearn: python main.py</span><br>
                        <div id="console-text-21-3" class="mt-2 text-[#4af626] leading-relaxed"></div>
                    </div>
                </div>

                <div id="alert-21-3"
                    class="hidden mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border transition-all text-center">
                </div>

                <div id="feedback-edukatif-21-3"
                    class="hidden mt-4 bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-800 p-6 rounded-xl shadow-sm text-slate-800 dark:text-slate-200 text-sm leading-relaxed transition-all">
                    <h4
                        class="font-bold text-green-900 dark:text-green-400 mb-3 border-b border-green-200 dark:border-green-800 pb-2">
                        Pembahasan Evaluasi
                    </h4>
                    <p class="text-sm text-green-800 dark:text-green-200 leading-relaxed text-justify mb-2">
                        Sempurna! Anda telah berhasil menutup rute melingkar. Pembuatan relasi antar dua titik di Python
                        menggunakan pendekatan dasar selalu ditulis dengan format <code>(Titik_Awal,
                            Titik_Tujuan)</code>. Ingat, penggunaan <em>Tuple</em> memastikan integritas data graf Anda
                        tetap utuh.
                    </p>
                </div>
            </div>
        </div>

        {{-- Navigasi Bawah --}}
        <div class="flex justify-between gap-4 mt-12 pt-6 border-t border-slate-200 dark:border-slate-700">
            <button type="button" onclick="prevStep()"
                class="px-6 py-2.5 rounded-lg border border-slate-300 dark:border-slate-700 font-bold text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 transition shadow-sm active:scale-95">
                Kembali
            </button>
            <button type="button" id="btnNext21" onclick="nextStep()"
                class="px-6 py-2.5 bg-slate-900 dark:bg-slate-700 hover:bg-slate-800 dark:hover:bg-slate-600 text-white font-bold rounded-lg shadow-md transition-all active:scale-95 opacity-50 cursor-not-allowed"
                disabled>
                Lanjut
            </button>
        </div>

    </div>

    <script>
        // ==========================================
        // DYNAMIC LINE NUMBERS & EDITOR SYNC LOGIC
        // ==========================================
        function syncLineNumbers21() {
            const editor = document.getElementById('editor-sandbox-21');
            const lineNumEl = document.getElementById('line-numbers-21');
            if (!editor || !lineNumEl) return;

            editor.style.height = 'auto';
            if (editor.scrollHeight > 0) {
                editor.style.height = editor.scrollHeight + 'px';
            } else {
                const lineCount = (editor.value.match(/\n/g) || []).length + 1;
                editor.style.height = (lineCount * 24 + 40) + 'px';
            }

            const lines = editor.value.split('\n').length;
            let numHtml = '';
            for (let i = 1; i <= lines; i++) {
                numHtml += `<div>${i}</div>`;
            }
            lineNumEl.innerHTML = numHtml;
        }

        window.net_isolasi_21 = null;

        document.addEventListener("DOMContentLoaded", function() {

            const editor21 = document.getElementById('editor-sandbox-21');
            if (editor21) {
                editor21.addEventListener('input', syncLineNumbers21);
            }

            // ==========================================
            // 1. INIT GRAF VISUAL A-B-C
            // ==========================================
            const nodes = new vis.DataSet([{
                    id: 'A',
                    label: 'A',
                    x: -100,
                    y: 0,
                    color: {
                        background: '#3b82f6',
                        border: '#2563eb',
                        highlight: {
                            background: '#f59e0b',
                            border: '#d97706'
                        },
                        hover: {
                            background: '#60a5fa',
                            border: '#3b82f6'
                        }
                    },
                    font: {
                        color: 'white',
                        size: 18,
                        face: 'Arial'
                    },
                    fixed: {
                        x: false,
                        y: false
                    }
                },
                {
                    id: 'B',
                    label: 'B',
                    x: 0,
                    y: 0,
                    color: {
                        background: '#3b82f6',
                        border: '#2563eb',
                        highlight: {
                            background: '#f59e0b',
                            border: '#d97706'
                        },
                        hover: {
                            background: '#60a5fa',
                            border: '#3b82f6'
                        }
                    },
                    font: {
                        color: 'white',
                        size: 18,
                        face: 'Arial'
                    },
                    fixed: {
                        x: false,
                        y: false
                    }
                },
                {
                    id: 'C',
                    label: 'C',
                    x: 100,
                    y: 0,
                    color: {
                        background: '#3b82f6',
                        border: '#2563eb',
                        highlight: {
                            background: '#f59e0b',
                            border: '#d97706'
                        },
                        hover: {
                            background: '#60a5fa',
                            border: '#3b82f6'
                        }
                    },
                    font: {
                        color: 'white',
                        size: 18,
                        face: 'Arial'
                    },
                    fixed: {
                        x: false,
                        y: false
                    }
                }
            ]);

            const edges = new vis.DataSet([{
                    id: 'e1',
                    from: 'A',
                    to: 'B',
                    color: {
                        color: '#94a3b8',
                        hover: '#cbd5e1',
                        highlight: '#f59e0b'
                    },
                    width: 3
                },
                {
                    id: 'e2',
                    from: 'B',
                    to: 'C',
                    color: {
                        color: '#94a3b8',
                        hover: '#cbd5e1',
                        highlight: '#f59e0b'
                    },
                    width: 3
                }
            ]);

            const container = document.getElementById('graf_isolasi_21');

            const options = {
                physics: false,
                interaction: {
                    dragNodes: true,
                    dragView: false,
                    zoomView: false,
                    hover: true,
                    selectable: true
                },
                nodes: {
                    shape: 'circle',
                    margin: 12,
                    borderWidth: 2
                },
                edges: {
                    smooth: {
                        enabled: false
                    }
                }
            };

            if (container) {
                try {
                    window.net_isolasi_21 = new vis.Network(container, {
                        nodes,
                        edges
                    }, options);

                    const observer21 = new IntersectionObserver((entries) => {
                        if (entries[0].isIntersecting && window.net_isolasi_21) {
                            setTimeout(() => {
                                window.net_isolasi_21.setSize('100%', '200px');
                                window.net_isolasi_21.redraw();
                                window.net_isolasi_21.fit({
                                    animation: false
                                });
                            }, 50);
                        }
                    });
                    observer21.observe(container);

                    const infoPanel = document.getElementById('graf-info-panel');

                    const resetPanel = function() {
                        infoPanel.innerHTML =
                            `<em><i class="fa-solid fa-hand-pointer text-blue-400 dark:text-blue-500 mr-2"></i>Klik salah satu titik (simpul) atau garis (sisi) untuk melihat representasi kodenya.</em>`;
                        infoPanel.className =
                            "w-full mt-4 p-3 bg-blue-50/50 dark:bg-slate-800/50 border border-blue-200 dark:border-slate-700 rounded-lg text-sm text-slate-600 dark:text-slate-400 text-center transition-all min-h-[50px] flex items-center justify-center";
                    };

                    // Gunakan Event 'click' terpusat agar tidak tabrakan
                    window.net_isolasi_21.on("click", function(params) {
                        if (params.nodes.length > 0) {
                            // Prioritaskan Simpul (Vertex) jika diklik
                            const nodeId = params.nodes[0];
                            infoPanel.innerHTML =
                                `<div><span class="text-blue-800 dark:text-blue-300 font-bold block mb-1">Anda Memilih Simpul (Vertex)</span>Dalam kode Python, simpul ini ditulis sebagai String <span class="bg-white dark:bg-slate-800 border border-blue-200 dark:border-slate-600 px-2 py-0.5 rounded text-blue-600 dark:text-blue-400 font-mono shadow-sm mx-1">'${nodeId}'</span> yang disimpan di dalam <strong>List</strong>.</div>`;
                            infoPanel.className =
                                "w-full mt-4 p-3 bg-blue-100 dark:bg-blue-900/40 border border-blue-300 dark:border-blue-700 rounded-lg text-sm text-blue-800 dark:text-blue-200 text-center transition-all min-h-[50px] flex items-center justify-center scale-[1.02]";
                            setTimeout(() => {
                                infoPanel.classList.remove('scale-[1.02]');
                            }, 200);
                        } else if (params.edges.length > 0) {
                            // Jika murni Sisi (Edge) yang diklik
                            const edgeId = params.edges[0];
                            const edgeData = edges.get(edgeId);
                            infoPanel.innerHTML =
                                `<div><span class="text-indigo-800 dark:text-indigo-300 font-bold block mb-1">Anda Memilih Sisi (Edge)</span>Menghubungkan <strong>${edgeData.from}</strong> dan <strong>${edgeData.to}</strong>. Dalam Python ditulis sebagai Tuple <span class="bg-white dark:bg-slate-800 border border-indigo-200 dark:border-slate-600 px-2 py-0.5 rounded text-indigo-600 dark:text-indigo-400 font-mono shadow-sm mx-1">('${edgeData.from}', '${edgeData.to}')</span>.</div>`;
                            infoPanel.className =
                                "w-full mt-4 p-3 bg-indigo-50 dark:bg-indigo-900/40 border border-indigo-200 dark:border-indigo-700 rounded-lg text-sm text-indigo-800 dark:text-indigo-200 text-center transition-all min-h-[50px] flex items-center justify-center scale-[1.02]";
                            setTimeout(() => {
                                infoPanel.classList.remove('scale-[1.02]');
                            }, 200);
                        } else {
                            // Jika mengklik canvas kosong (background)
                            resetPanel();
                        }
                    });

                } catch (error) {
                    console.error("Gagal memuat VisJS 2.1 Isolasi:", error);
                }
            }

            const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";

            const savedSandboxCode = localStorage.getItem('sandbox_2_1_code_' + userId);

            // BUKA GEMBOK UTAMA JIKA SANDBOX SUDAH SELESAI
            if (localStorage.getItem('sandbox_2_1_done_' + userId) === 'true') {
                document.getElementById('output-explanation-21').classList.remove('hidden');

                // UNLOCK MAIN WRAPPER
                document.getElementById('main-activity-wrapper').classList.remove('opacity-50',
                    'pointer-events-none');
                const lockMsg = document.getElementById('lock-message');
                if (lockMsg) lockMsg.style.display = 'none';

                if (savedSandboxCode) {
                    editor21.value = savedSandboxCode;
                } else {
                    editor21.value =
                        "nodes = ['A', 'B', 'C']\nedges = [('A', 'B'), ('B', 'C')]\n\nnodes.append('D')\nedges.append(('C', 'D'))\n\nprint(\"Daftar Simpul:\", nodes)\nprint(\"Daftar Sisi:\", edges)";
                }

                setTimeout(syncLineNumbers21, 100);
            } else {
                setTimeout(syncLineNumbers21, 100);
            }

            // CEK PROGRESS MASING-MASING SUB-AKTIVITAS
            const isDoneServer = {{ isset($progress['2.1']) && $progress['2.1']->score == 100 ? 'true' : 'false' }};
            const isDoneLocal1 = localStorage.getItem('act_2_1_1_done_user_' + userId) === 'true';
            const isDoneLocal2 = localStorage.getItem('act_2_1_2_done_user_' + userId) === 'true';
            const isDoneLocal3 = localStorage.getItem('act_2_1_3_done_user_' + userId) === 'true';

            // Jika di server sudah tamat, buka semua gemboknya
            if (isDoneServer || isDoneLocal1) {
                window.kunciJawaban21_1();
            }
            if (isDoneServer || isDoneLocal2) {
                window.kunciJawaban21_2();
            }
            if (isDoneServer || isDoneLocal3) {
                window.kunciJawaban21_3();
            }
        });

        window.runSandbox21 = function() {
            const editor = document.getElementById('editor-sandbox-21');
            const code = editor.value;
            const consoleBox = document.getElementById('console-sandbox-21');
            const outputText = document.getElementById('sandbox-output-text');
            const explanation = document.getElementById('output-explanation-21');
            const btnRunSandbox = document.getElementById('btnRunSandbox');

            consoleBox.classList.remove('hidden');

            if (code.trim() === "") {
                outputText.className = "text-[#ff5f56]";
                outputText.innerHTML = "SyntaxError: Unexpected EOF while parsing. (Editor masih kosong!)";
                return;
            }

            const codeWithoutComments = code.replace(/#.*/g, '');
            const cleanCode = codeWithoutComments.replace(/\s+/g, '').replace(/'/g, '"');

            const hasNodesInit = cleanCode.includes('nodes=["A","B","C"]');
            const hasEdgesInit = cleanCode.includes('edges=[("A","B"),("B","C")]');
            const hasAppendNode = cleanCode.includes('nodes.append("D")');
            const hasAppendEdge = cleanCode.includes('edges.append(("C","D"))');
            const hasPrintNodes = cleanCode.includes('print(') && cleanCode.includes(',nodes)');
            const hasPrintEdges = cleanCode.includes('print(') && cleanCode.includes(',edges)');

            if (hasNodesInit && hasEdgesInit && hasAppendNode && hasAppendEdge && hasPrintNodes && hasPrintEdges) {
                outputText.className = "text-[#4af626]";
                outputText.innerHTML =
                    "Daftar Simpul: ['A', 'B', 'C', 'D']<br>Daftar Sisi: [('A', 'B'), ('B', 'C'), ('C', 'D')]";

                btnRunSandbox.innerHTML = '<i class="fa-solid fa-check"></i> Program Berhasil';
                btnRunSandbox.classList.replace('bg-blue-600', 'bg-emerald-600');

                const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                localStorage.setItem('sandbox_2_1_done_' + userId, 'true');
                localStorage.setItem('sandbox_2_1_code_' + userId, code);

                explanation.classList.remove('hidden');

                // UNLOCK MAIN WRAPPER SETELAH SANDBOX BENAR
                document.getElementById('main-activity-wrapper').classList.remove('opacity-50', 'pointer-events-none');
                const lockMsg = document.getElementById('lock-message');
                if (lockMsg) lockMsg.style.display = 'none';

                setTimeout(() => {
                    explanation.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                }, 300);

            } else {
                outputText.className = "text-[#ffbd2e]";
                outputText.innerHTML =
                    "Program gagal dieksekusi atau tidak lengkap.<br>Pastikan Anda mengetik <strong>keseluruhan kode</strong> mulai dari pembuatan variabel (<code>nodes</code> dan <code>edges</code>), perintah <code>append()</code>, hingga perintah <code>print()</code> persis seperti contoh di atas.";

                btnRunSandbox.innerHTML = '<i class="fa-solid fa-rotate-right"></i> Coba Lagi';
            }
        }

        // FUNGSI VALIDASI AKTIVITAS 1
        window.runAktivitas21_1 = function() {
            const i1 = document.getElementById('input21_1_1').value.trim().toLowerCase();
            const i2 = document.getElementById('input21_1_2').value.trim().toLowerCase();
            let i3 = document.getElementById('input21_1_3').value.trim().toLowerCase().replace(/['"]/g, '');
            let i4 = document.getElementById('input21_1_4').value.trim().toLowerCase().replace(/['"]/g, '');

            const alertBox = document.getElementById('alert-21-1');
            const consoleBox = document.getElementById('console-output-21-1');
            const consoleText = document.getElementById('console-text-21-1');

            if (!i1 || !i2 || !i3 || !i4) {
                alertBox.className =
                    "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-yellow-50 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-400 border-yellow-200 dark:border-yellow-800 text-center transition-colors";
                alertBox.innerHTML =
                    "<i class='fa-solid fa-triangle-exclamation mr-1'></i> Error: Syntax Tidak Lengkap. Masih ada bagian kode yang kosong.";
                alertBox.classList.remove('hidden');
                consoleBox.classList.add('hidden');
                return;
            }

            let isCorrect = false;
            if (i1 === 'append' && i2 === 'append') {
                if ((i3 === 'kampus' && i4 === 'taman') || (i3 === 'taman' && i4 === 'kampus')) {
                    isCorrect = true;
                }
            }

            if (isCorrect) {
                const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                localStorage.setItem('act_2_1_1_done_user_' + userId, 'true');

                alertBox.className =
                    "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-green-50 dark:bg-green-900/30 text-green-800 dark:text-green-400 border-green-400 dark:border-green-800 text-center transition-colors";
                alertBox.innerHTML =
                    "<i class='fa-solid fa-check-circle mr-1'></i> Kompilasi Berhasil! Anda telah menguasai cara menambah simpul dan sisi ke dalam array/list.";
                alertBox.classList.remove('hidden');

                consoleBox.classList.remove('hidden');
                consoleText.className = "mt-2 text-[#4af626]";
                consoleText.innerHTML = "['Pasar', 'Kampus', 'Taman']<br>[('Pasar', 'Kampus'), ('Kampus', 'Taman')]";

                window.kunciJawaban21_1();
            } else {
                alertBox.className =
                    "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-red-50 dark:bg-red-900/30 text-red-800 dark:text-red-400 border-red-300 dark:border-red-800 animate-pulse text-center transition-colors";
                alertBox.innerHTML =
                    "<i class='fa-solid fa-circle-xmark mr-1'></i> SyntaxError: Terdapat kesalahan. Pastikan Anda menggunakan fungsi 'append' dan menuliskan nama rutenya dengan benar.";
                alertBox.classList.remove('hidden');

                consoleBox.classList.remove('hidden');
                consoleText.className = "mt-2 text-[#ff5f56]";
                consoleText.innerHTML =
                    "Traceback (most recent call last):<br>&nbsp;&nbsp;File \"main.py\", line 5<br>AttributeError: 'list' object has no attribute atau Invalid Syntax.";
            }
        }

        // FUNGSI VALIDASI AKTIVITAS 2
        window.runAktivitas21_2 = function() {
            const i1 = document.getElementById('input21_2_1').value.trim().toLowerCase();
            let i2 = document.getElementById('input21_2_2').value.trim().toLowerCase().replace(/['"]/g, '');
            const i3 = document.getElementById('input21_2_3').value.trim().toLowerCase();
            let i4 = document.getElementById('input21_2_4').value.trim().toLowerCase().replace(/['"\s]/g, '');

            const alertBox = document.getElementById('alert-21-2');
            const consoleBox = document.getElementById('console-output-21-2');
            const consoleText = document.getElementById('console-text-21-2');

            if (!i1 || !i2 || !i3 || !i4) {
                alertBox.className =
                    "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-yellow-50 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-400 border-yellow-200 dark:border-yellow-800 text-center transition-colors";
                alertBox.innerHTML =
                    "<i class='fa-solid fa-triangle-exclamation mr-1'></i> Error: Syntax Tidak Lengkap. Masih ada bagian kode yang kosong.";
                alertBox.classList.remove('hidden');
                consoleBox.classList.add('hidden');
                return;
            }

            let isCorrect = false;
            if (i1 === 'append' && i2 === 'stasiun' && i3 === 'append') {
                if (i4 === '((taman,stasiun))' || i4 === '((stasiun,taman))') {
                    isCorrect = true;
                }
            }

            if (isCorrect) {
                const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                localStorage.setItem('act_2_1_2_done_user_' + userId, 'true');

                alertBox.className =
                    "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-green-50 dark:bg-green-900/30 text-green-800 dark:text-green-400 border-green-400 dark:border-green-800 text-center transition-colors";
                alertBox.innerHTML =
                    "<i class='fa-solid fa-check-circle mr-1'></i> Tepat sekali! Anda menggunakan fungsi append untuk mendaftarkan titik baru dan menyambungnya menggunakan pasangan Tuple.";
                alertBox.classList.remove('hidden');

                consoleBox.classList.remove('hidden');
                consoleText.className = "mt-2 text-[#4af626]";
                consoleText.innerHTML =
                    "['Pasar', 'Kampus', 'Taman', 'Stasiun']<br>[('Pasar', 'Kampus'), ('Kampus', 'Taman'), ('Taman', 'Stasiun')]";

                window.kunciJawaban21_2();
            } else {
                alertBox.className =
                    "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-red-50 dark:bg-red-900/30 text-red-800 dark:text-red-400 border-red-300 dark:border-red-800 animate-pulse text-center transition-colors";
                alertBox.innerHTML =
                    "<i class='fa-solid fa-circle-xmark mr-1'></i> SyntaxError: Terdapat kesalahan. Pastikan Anda mengetik nama simpul ('Stasiun') dan membungkus sisinya dengan kurung ganda (('Taman', 'Stasiun')).";
                alertBox.classList.remove('hidden');

                consoleBox.classList.remove('hidden');
                consoleText.className = "mt-2 text-[#ff5f56]";
                consoleText.innerHTML =
                    "Traceback (most recent call last):<br>&nbsp;&nbsp;File \"main.py\", line 4<br>Invalid Syntax.";
            }
        }

        // FUNGSI VALIDASI AKTIVITAS 3
        window.runAktivitas21_3 = function() {
            const i1 = document.getElementById('input21_3_1').value.trim().toLowerCase().replace(/['"\s]/g, '');

            const alertBox = document.getElementById('alert-21-3');
            const consoleBox = document.getElementById('console-output-21-3');
            const consoleText = document.getElementById('console-text-21-3');

            if (!i1) {
                alertBox.className =
                    "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-yellow-50 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-400 border-yellow-200 dark:border-yellow-800 text-center transition-colors";
                alertBox.innerHTML =
                    "<i class='fa-solid fa-triangle-exclamation mr-1'></i> Error: Syntax Tidak Lengkap. Masih ada bagian kode yang kosong.";
                alertBox.classList.remove('hidden');
                consoleBox.classList.add('hidden');
                return;
            }

            if (i1 === '(stasiun,pasar)' || i1 === '(pasar,stasiun)') {
                const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                localStorage.setItem('act_2_1_3_done_user_' + userId, 'true');

                alertBox.className =
                    "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-green-50 dark:bg-green-900/30 text-green-800 dark:text-green-400 border-green-400 dark:border-green-800 text-center transition-colors";
                alertBox.innerHTML =
                    "<i class='fa-solid fa-check-circle mr-1'></i> Sempurna! Anda berhasil memformat pasangan data String ke dalam sebuah Tuple () agar sah dibaca sebagai rute graf.";
                alertBox.classList.remove('hidden');

                consoleBox.classList.remove('hidden');
                consoleText.className = "mt-2 text-[#4af626]";
                consoleText.innerHTML =
                    "Rute Melingkar Selesai: [('Pasar', 'Kampus'), ('Kampus', 'Taman'), ('Taman', 'Stasiun'), ('Stasiun', 'Pasar')]";

                window.kunciJawaban21_3();

                // BARU DI-SAVE PROGRESS SAAT SEMUA AKTIVITAS (1, 2, 3) SELESAI
                fetch("{{ route('submit.score') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            chapter: "bab2",
                            section: "2.1",
                            score: 100,
                            answer: "Berhasil Live Coding 2.1 (Full)"
                        })
                    })
                    .then(async response => {
                        const data = await response.json();
                        if (!response.ok) throw new Error(data.message || 'Server menolak data');
                    })
                    .catch(error => {
                        console.error("GAGAL SIMPAN KE DB:", error);
                    });

            } else {
                alertBox.className =
                    "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-red-50 dark:bg-red-900/30 text-red-800 dark:text-red-400 border-red-300 dark:border-red-800 animate-pulse text-center transition-colors";
                alertBox.innerHTML =
                    "<i class='fa-solid fa-circle-xmark mr-1'></i> SyntaxError: Terdapat kesalahan format. Pastikan Anda membungkus teks nama rutenya dengan kurung biasa dan tanda petik.";
                alertBox.classList.remove('hidden');

                consoleBox.classList.remove('hidden');
                consoleText.className = "mt-2 text-[#ff5f56]";
                consoleText.innerHTML =
                    "Traceback (most recent call last):<br>&nbsp;&nbsp;File \"main.py\", line 3<br>NameError: name is not defined atau Invalid Format.";
            }
        }

        // KUNCI JAWABAN (1) & UNLOCK AKTIVITAS (2)
        window.kunciJawaban21_1 = function() {
            const inputs = ['input21_1_1', 'input21_1_2', 'input21_1_3', 'input21_1_4'];
            const correctValues = ['append', 'append', '"Kampus"', '"Taman"'];

            inputs.forEach((id, idx) => {
                const el = document.getElementById(id);
                if (el) {
                    el.value = correctValues[idx];
                    el.disabled = true;
                    el.classList.remove('bg-[#3c3c3c]', 'dark:bg-slate-700', 'text-[#dcdcaa]', 'text-[#ce9178]',
                        'border-slate-600', 'dark:border-slate-500');
                    el.classList.add('bg-emerald-600', 'text-white', 'border-emerald-500', 'font-bold',
                        'cursor-not-allowed', 'shadow-inner');
                }
            });

            const btnRun = document.getElementById('btnRun21_1');
            if (btnRun) {
                btnRun.innerHTML = 'Diselesaikan';
                btnRun.classList.replace('bg-blue-600', 'bg-slate-600');
                btnRun.classList.replace('hover:bg-blue-500', 'cursor-not-allowed');
                btnRun.disabled = true;
            }

            document.getElementById('feedback-edukatif-21-1').classList.remove('hidden');

            // UNLOCK ACTIVITY 2
            document.getElementById('activity-21-2-container').classList.remove('opacity-50', 'pointer-events-none');
        }

        // KUNCI JAWABAN (2) & UNLOCK AKTIVITAS (3)
        window.kunciJawaban21_2 = function() {
            const inputs = ['input21_2_1', 'input21_2_2', 'input21_2_3', 'input21_2_4'];
            const correctValues = ['append', '"Stasiun"', 'append', '(("Taman", "Stasiun"))'];

            inputs.forEach((id, idx) => {
                const el = document.getElementById(id);
                if (el) {
                    el.value = correctValues[idx];
                    el.disabled = true;
                    el.classList.remove('bg-[#3c3c3c]', 'dark:bg-slate-700', 'text-[#dcdcaa]', 'text-[#ce9178]',
                        'border-slate-600', 'dark:border-slate-500');
                    el.classList.add('bg-emerald-600', 'text-white', 'border-emerald-500', 'font-bold',
                        'cursor-not-allowed', 'shadow-inner');
                }
            });

            const btnRun = document.getElementById('btnRun21_2');
            if (btnRun) {
                btnRun.innerHTML = 'Diselesaikan';
                btnRun.classList.replace('bg-blue-600', 'bg-slate-600');
                btnRun.classList.replace('hover:bg-blue-500', 'cursor-not-allowed');
                btnRun.disabled = true;
            }

            document.getElementById('feedback-edukatif-21-2').classList.remove('hidden');

            // UNLOCK ACTIVITY 3
            document.getElementById('activity-21-3-container').classList.remove('opacity-50', 'pointer-events-none');
        }

        // KUNCI JAWABAN (3) & UNLOCK TOMBOL NEXT BAB
        window.kunciJawaban21_3 = function() {
            const el = document.getElementById('input21_3_1');
            if (el) {
                el.value = '("Stasiun", "Pasar")';
                el.disabled = true;
                el.classList.remove('bg-[#3c3c3c]', 'dark:bg-slate-700', 'text-[#ce9178]', 'border-slate-600',
                    'dark:border-slate-500');
                el.classList.add('bg-emerald-600', 'text-white', 'border-emerald-500', 'font-bold',
                    'cursor-not-allowed', 'shadow-inner');
            }

            const btnRun = document.getElementById('btnRun21_3');
            if (btnRun) {
                btnRun.innerHTML = 'Diselesaikan';
                btnRun.classList.replace('bg-blue-600', 'bg-slate-600');
                btnRun.classList.replace('hover:bg-blue-500', 'cursor-not-allowed');
                btnRun.disabled = true;
            }

            document.getElementById('feedback-edukatif-21-3').classList.remove('hidden');

            // UNLOCK NEXT BUTTON (FINAL)
            const btnNext = document.getElementById('btnNext21');
            if (btnNext) {
                btnNext.disabled = false;
                btnNext.classList.remove('opacity-50', 'cursor-not-allowed');
                btnNext.classList.replace('bg-slate-900', 'bg-blue-600');
                btnNext.classList.replace('dark:bg-slate-700', 'dark:bg-blue-600');
                btnNext.classList.replace('hover:bg-slate-800', 'hover:bg-blue-700');
            }
        }
    </script>
</section>
