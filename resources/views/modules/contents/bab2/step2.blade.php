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
        {{-- VISUALISASI INTERAKTIF --}}
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
            
            <div id="graf-info-22" class="w-full mt-4 p-4 bg-blue-50 dark:bg-blue-900/30 border border-blue-300 dark:border-blue-700 rounded-lg text-sm text-blue-900 dark:text-blue-100 text-center font-medium shadow-sm transition-all duration-300">
                <strong>💡 Graf Mutual:</strong> Garis tidak memiliki panah. Jika Andi berteman dengan Budi, maka otomatis Budi juga berteman dengan Andi (Hubungan dua arah).
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- CONTOH KODE PROGRAM (ANTI-COPY & FULL PANJANG) --}}
        {{-- ========================================== --}}
        <div class="mb-8">
            <h3 class="text-lg font-bold text-slate-800 mb-3">Contoh Kode Program:</h3>
            
            {{-- IDE Block --}}
            <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 select-none flex flex-col h-auto">
                <div class="bg-[#2d2d2d] px-3 py-2.5 flex items-center gap-2 border-b border-slate-700 shrink-0">
                    <div class="w-2.5 h-2.5 rounded-full bg-[#ff5f56]"></div>
                    <div class="w-2.5 h-2.5 rounded-full bg-[#ffbd2e]"></div>
                    <div class="w-2.5 h-2.5 rounded-full bg-[#27c93f]"></div>
                    <span class="text-slate-400 text-[10px] ml-2 font-mono">perbandingan_graf.py (Hanya Baca)</span>
                </div>
                
                {{-- CODE BLOCK WITH LINE NUMBERS --}}
                <div class="flex p-4 md:p-6 font-mono text-[12px] md:text-sm leading-[1.625] text-[#d4d4d4] overflow-x-auto">
                    {{-- Line Numbers --}}
                    <div class="flex flex-col text-[#858585] text-right select-none pr-4 md:pr-6 border-r border-[#404040] mr-4 md:mr-6 shrink-0">
                        <span>1</span><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span><span>7</span><span>8</span><span>9</span><span>10</span><span>11</span><span>12</span><span>13</span><span>14</span><span>15</span><span>16</span><span>17</span><span>18</span><span>19</span><span>20</span><span>21</span>
                    </div>
                    
                    {{-- Code Content (DENGAN NBSP AGAR TIDAK COLLAPSE) --}}
                    <div class="flex flex-col whitespace-pre">
                        <div class="text-[#6a9955]"># 1. Graf Tak Berarah (Simetris / Dua Arah)</div>
                        <div class="text-[#6a9955]"># Jika Andi terhubung ke Budi, maka Budi WAJIB terhubung ke Andi</div>
                        <div><span class="text-[#9cdcfe]">graf_mutual</span> = <span class="text-[#facc15]">{</span></div>
                        <div>&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-[#ce9178]">"Andi"</span>: [<span class="text-[#ce9178]">"Budi"</span>, <span class="text-[#ce9178]">"Citra"</span>],</div>
                        <div>&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-[#ce9178]">"Budi"</span>: [<span class="text-[#ce9178]">"Andi"</span>],&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-[#6a9955]"># Budi membalas relasi Andi</span></div>
                        <div>&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-[#ce9178]">"Citra"</span>: [<span class="text-[#ce9178]">"Andi"</span>]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-[#6a9955]"># Citra membalas relasi Andi</span></div>
                        <div><span class="text-[#facc15]">}</span></div>
                        <div>&nbsp;</div>
                        <div class="text-[#6a9955]"># 2. Graf Berarah (Asimetris / Satu Arah)</div>
                        <div class="text-[#6a9955]"># Andi mem-follow Budi, tapi Budi tidak mem-follow Andi</div>
                        <div><span class="text-[#9cdcfe]">graf_follower</span> = <span class="text-[#facc15]">{</span></div>
                        <div>&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-[#ce9178]">"Andi"</span>: [<span class="text-[#ce9178]">"Budi"</span>, <span class="text-[#ce9178]">"Citra"</span>],</div>
                        <div>&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-[#ce9178]">"Budi"</span>: [],&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-[#6a9955]"># Budi tidak mem-follow siapa-siapa</span></div>
                        <div>&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-[#ce9178]">"Citra"</span>: [<span class="text-[#ce9178]">"Andi"</span>]</div>
                        <div><span class="text-[#facc15]">}</span></div>
                        <div>&nbsp;</div>
                        <div class="text-[#6a9955]"># Menampilkan siapa saja yang di-follow oleh Andi</div>
                        <div><span class="text-[#dcdcaa]">print</span>(<span class="text-[#ce9178]">"Andi mem-follow:"</span>, <span class="text-[#9cdcfe]">graf_follower</span>[<span class="text-[#ce9178]">"Andi"</span>])</div>
                        <div>&nbsp;</div>
                        <div class="text-[#6a9955]"># Menampilkan siapa saja yang di-follow oleh Budi</div>
                        <div><span class="text-[#dcdcaa]">print</span>(<span class="text-[#ce9178]">"Budi mem-follow:"</span>, <span class="text-[#9cdcfe]">graf_follower</span>[<span class="text-[#ce9178]">"Budi"</span>])</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- PENJELASAN KODE DENGAN REFERENSI BARIS --}}
        <div class="mt-4 mb-10 bg-slate-50 p-6 rounded-xl border border-slate-200 shadow-sm">
            <h4 class="font-bold text-slate-800 text-sm mb-4">Pembedahan Sintaks:</h4>
            <ul class="list-disc list-outside ml-5 text-sm text-slate-700 space-y-3 text-justify">
                <li><strong>Baris 3 sampai 7 (Graf Tak Berarah):</strong> Pada <code>graf_mutual</code>, setiap relasi dicatat bolak-balik. Di Baris 4 Andi berteman dengan Budi, maka di Baris 5 Budi WAJIB memiliki relasi kembali ke Andi. Ini memastikan jalan bisa dilewati dari kedua arah.</li>
                <li><strong>Baris 11 sampai 15 (Graf Berarah):</strong> Pada <code>graf_follower</code>, relasi hanya berlaku searah. Di Baris 12 Andi mem-follow Budi. Namun lihat <strong>Baris 13</strong>, Budi memiliki <em>List</em> kosong <code>[]</code>. Ini menandakan Budi adalah "jalan buntu" karena ia tidak mem-follow siapa pun kembali.</li>
                <li><strong>Baris 18 & 21 (Mencetak Data):</strong> Untuk melihat rute dari sebuah titik, kita memanggil nama <em>Dictionary</em>-nya diikuti Kunci (nama titik) di dalam kurung siku. Contohnya: <code>graf_follower["Andi"]</code>.</li>
            </ul>
        </div>


        {{-- ========================================== --}}
        {{-- INTERACTIVE SANDBOX DENGAN DYNAMIC LINE NUMBERS --}}
        {{-- ========================================== --}}
        <div class="mb-10 p-6 border-2 border-blue-200 bg-blue-50/30 rounded-xl shadow-sm">
            <h3 class="text-lg font-bold text-slate-800 mb-2 flex items-center gap-2">
                <i class="fa-solid fa-keyboard text-blue-600"></i> Coba Sendiri!
            </h3>
            <p class="text-sm text-slate-600 mb-4 text-justify">
                Ketik ulang keseluruhan kode pada contoh di atas ke dalam editor di bawah ini (tidak perlu mengetik komentarnya). Tambahkan perintah <code>print()</code> di akhir baris untuk mengecek outputnya!
            </p>

            <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 font-mono text-sm relative flex flex-col">
                <div class="bg-[#2d2d2d] px-4 py-2.5 flex items-center justify-between border-b border-slate-700 shrink-0">
                    <span class="text-slate-400 text-xs tracking-wider">Terminal Editor (main.py)</span>
                    <button onclick="window.runSandbox22()" id="btnRunSandbox-22" class="bg-green-600 hover:bg-green-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors flex items-center gap-2 shadow-sm">
                        <i class="fa-solid fa-play"></i> Jalankan Program
                    </button>
                </div>
                
                {{-- DYNAMIC EDITOR LAYOUT --}}
                <div class="flex font-mono text-[12px] md:text-sm text-[#d4d4d4] bg-[#1e1e1e] relative min-h-[160px]">
                    {{-- Container Angka Baris (Kiri) --}}
                    <div id="line-numbers-22" class="text-[#858585] text-right select-none py-5 pl-4 pr-4 border-r border-[#404040] bg-[#1e1e1e] leading-[1.625] shrink-0">
                        <div>1</div>
                    </div>
                    
                    {{-- Textarea Editor (Kanan) --}}
                    <textarea id="editor-sandbox-22" class="w-full bg-transparent text-[#d4d4d4] outline-none resize-none py-5 pl-4 pr-6 leading-[1.625] whitespace-pre overflow-x-auto" spellcheck="false" placeholder="# Ketik kode Python di sini..." oninput="window.autoResizeEditor(this)"></textarea>
                </div>

                <div id="console-sandbox-22" class="hidden border-t border-slate-700 bg-black p-5 text-xs font-mono shrink-0">
                    <span class="text-slate-400">> root@graflearn: python main.py</span><br>
                    <div id="sandbox-output-text-22" class="mt-2 leading-relaxed"></div>
                </div>
            </div>
        </div>

        {{-- OUTPUT EXPLANATION (MUNCUL SETELAH SANDBOX BERHASIL) --}}
        <div id="output-explanation-22" class="mb-12 hidden transition-all duration-700">
            <h3 class="text-lg font-bold text-slate-800 mb-3">Output Program:</h3>
            
            <div class="bg-black text-[#4af626] font-mono text-sm p-4 rounded-lg shadow-inner mb-4 inline-block pr-20 border border-green-900">
                Andi mem-follow: ['Budi', 'Citra']<br>
                Budi mem-follow: []
            </div>

            <p class="text-sm text-slate-700 text-justify leading-relaxed">
                Output tersebut membuktikan bahwa komputer membaca <code>graf_follower</code> secara hierarkis dan satu arah. Karena list teman Budi kosong <code>[]</code>, program mencetaknya kosong (sebagai jalan buntu), tanpa ada hubungan kembali ke Andi.
            </p>
        </div>


        {{-- ========================================== --}}
        {{-- BLOK AKTIVITAS UTAMA 2.2 (TERKUNCI SECARA DEFAULT) --}}
        {{-- ========================================== --}}
        <div id="main-activity-wrapper-22" class="mt-12 pt-8 border-t-[3px] border-dashed border-slate-200 dark:border-slate-700 transition-all duration-700 opacity-50 pointer-events-none relative">
            
            {{-- Pesan Terkunci --}}
            <div id="lock-message-22" class="absolute top-20 left-1/2 -translate-x-1/2 z-10 flex items-center justify-center w-full">
                <div class="bg-slate-800/90 dark:bg-slate-900/90 border border-slate-600 text-white text-sm px-6 py-3 rounded-full font-bold shadow-xl backdrop-blur-sm flex items-center gap-3">
                    <i class="fa-solid fa-lock text-slate-400"></i> Selesaikan "Coba Sendiri" untuk membuka aktivitas
                </div>
            </div>

            <div class="flex items-center gap-3 mb-8">
                <span class="bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider shadow-sm">Aktivitas 2.2</span>
                <h3 class="font-bold text-slate-900 dark:text-slate-100 text-xl">Uji Pemahaman Adjacency List</h3>
            </div>

            {{-- SOAL 1: DEBUGGING ARAH JARINGAN --}}
            <div id="activity-22-1-container" class="mb-10 transition-opacity duration-500">
                <h4 class="font-bold text-slate-800 dark:text-slate-200 text-lg mb-3">1. Debugging Arah Jaringan</h4>
                <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-xl p-6 mb-6 shadow-sm transition-colors">
                    <p class="text-sm text-blue-900 dark:text-blue-200 leading-relaxed text-justify mb-3">
                        <strong>Skenario:</strong> Kode di bawah ini adalah program jalan satu arah (<em>Directed Graph</em>). Kendaraan dari "Pasar" bisa ke "Kampus", tetapi tidak bisa kembali karena <em>value</em> dari "Kampus" masih kosong.
                    </p>
                    <div class="bg-white/80 dark:bg-slate-800/80 p-4 rounded border border-blue-200 dark:border-blue-700 font-medium text-blue-900 dark:text-blue-300 text-sm shadow-sm leading-relaxed transition-colors">
                        <strong>Tugas Anda:</strong> Modifikasi <em>dictionary</em> di bawah ini dengan mengisi <em>list</em> kosong pada "Kampus" agar rute tersebut memiliki jalur akses kembali ke "Pasar" (mengubahnya menjadi rute dua arah)!
                    </div>
                </div>

                <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 font-mono text-sm flex flex-col">
                    <div class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700 shrink-0">
                        <span class="text-slate-400 text-xs">Terminal Editor Pyodide</span>
                        <button onclick="window.runAktivitas22_1()" id="btnRun22_1" class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors flex items-center gap-2 shadow-sm active:scale-95">
                            Cek Jawaban
                        </button>
                    </div>
                    
                    <div class="p-6 leading-relaxed text-[#d4d4d4] overflow-x-auto whitespace-nowrap flex-1">
                        <div><span class="text-[#9cdcfe]">rute_jalan</span> = <span class="text-[#facc15]">{</span></div>
                        <div>&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-[#ce9178]">"Rumah"</span>: [<span class="text-[#ce9178]">"Pasar"</span>],</div>
                        <div>&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-[#ce9178]">"Pasar"</span>: [<span class="text-[#ce9178]">"Kampus"</span>],</div>
                        
                        <div class="flex items-center">
                            &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-[#ce9178]">"Kampus"</span>: [
                            <input type="text" id="input22_1_1" class="bg-[#3c3c3c] dark:bg-slate-700 text-[#ce9178] border border-slate-600 dark:border-slate-500 rounded px-2 py-0.5 mx-1 w-28 outline-none focus:border-blue-400 focus:bg-[#2d2d2d] dark:focus:bg-slate-800 text-center transition-colors shadow-inner font-bold" autocomplete="off" spellcheck="false" placeholder='"..."'>
                            ]
                        </div>
                        
                        <div class="mb-4"><span class="text-[#facc15]">}</span></div>

                        <div class="text-[#6a9955]"># Sistem akan mengecek apakah Kampus bisa kembali ke Pasar</div>
                        <div><span class="text-[#dcdcaa]">print</span>(<span class="text-[#ce9178]">"Jalur keluar dari Kampus:"</span>, <span class="text-[#9cdcfe]">rute_jalan</span>[<span class="text-[#ce9178]">"Kampus"</span>])</div>
                    </div>

                    <div id="console-output-22-1" class="hidden border-t border-slate-700 bg-black p-5 text-xs font-mono shrink-0">
                        <span class="text-slate-400">> root@graflearn: python main.py</span><br>
                        <div id="console-text-22-1" class="mt-2 leading-relaxed"></div>
                    </div>
                </div>

                <div id="alert-22-1" class="hidden mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border transition-all text-center"></div>

                <div id="feedback-edukatif-22-1" class="hidden mt-4 bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-800 p-6 rounded-xl shadow-sm text-slate-800 dark:text-slate-200 text-sm leading-relaxed transition-all">
                    <h4 class="font-bold text-green-900 dark:text-green-400 mb-3 border-b border-green-200 dark:border-green-800 pb-2">
                        Pembahasan Evaluasi
                    </h4>
                    <ul class="list-disc pl-5 space-y-3 text-green-800 dark:text-green-200 text-justify">
                        <li>Konsep utama jalan dua arah (<strong>Graf Tak Berarah</strong>) adalah sifatnya yang <strong>simetris (timbal-balik)</strong>.</li>
                        <li>Agar rute tidak buntu, maka <em>List</em> dari "Kampus" <strong>wajib</strong> diisi dengan rute kembali ke titik asalnya, yaitu <code class="bg-white dark:bg-slate-800 px-1.5 py-0.5 rounded border border-slate-300 dark:border-slate-700 text-green-700 dark:text-green-400 font-bold font-mono shadow-sm">"Pasar"</code> lengkap dengan sepasang tanda kutip agar dibaca sebagai teks string.</li>
                    </ul>
                </div>
            </div>

            {{-- SOAL 2: MENCIPTAKAN DEAD END --}}
            <div id="activity-22-2-container" class="mb-10 opacity-50 pointer-events-none transition-opacity duration-500">
                <h4 class="font-bold text-slate-800 dark:text-slate-200 text-lg mb-3">2. Menciptakan Titik Buntu (Dead End)</h4>
                <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-xl p-6 mb-6 shadow-sm transition-colors">
                    <p class="text-sm text-blue-900 dark:text-blue-200 leading-relaxed text-justify mb-3">
                        <strong>Skenario:</strong> Terjadi perbaikan jalan raya. Akses KELUAR dari "Rumah" diblokir total sehingga rute dari "Rumah" menuju "Pasar" terputus sementara.
                    </p>
                    <div class="bg-white/80 dark:bg-slate-800/80 p-4 rounded border border-blue-200 dark:border-blue-700 font-medium text-blue-900 dark:text-blue-300 text-sm shadow-sm leading-relaxed transition-colors">
                        <strong>Tugas Anda:</strong> Ubah <em>value</em> dari key "Rumah" di dalam *dictionary* menjadi sebuah List kosong <code>[]</code> untuk menyimulasikan bahwa "Rumah" kini menjadi jalan buntu (*Dead End*).
                    </div>
                </div>

                <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 font-mono text-sm flex flex-col">
                    <div class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700 shrink-0">
                        <span class="text-slate-400 text-xs">Terminal Editor Pyodide</span>
                        <button onclick="window.runAktivitas22_2()" id="btnRun22_2" class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors flex items-center gap-2 shadow-sm active:scale-95">
                            Cek Jawaban
                        </button>
                    </div>
                    
                    <div class="p-6 leading-relaxed text-[#d4d4d4] overflow-x-auto whitespace-nowrap flex-1">
                        <div><span class="text-[#9cdcfe]">rute_jalan</span> = <span class="text-[#facc15]">{</span></div>
                        <div>&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-[#ce9178]">"Rumah"</span>: [<span class="text-[#ce9178]">"Pasar"</span>],</div>
                        <div>&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-[#ce9178]">"Pasar"</span>: [<span class="text-[#ce9178]">"Kampus"</span>, <span class="text-[#ce9178]">"Rumah"</span>],</div>
                        <div>&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-[#ce9178]">"Kampus"</span>: [<span class="text-[#ce9178]">"Pasar"</span>]</div>
                        <div class="mb-4"><span class="text-[#facc15]">}</span></div>

                        <div class="text-[#6a9955]"># Jadikan "Rumah" sebagai jalan buntu (Timpa dengan List Kosong)</div>
                        <div class="flex items-center">
                            <span class="text-[#9cdcfe]">rute_jalan</span>[<span class="text-[#ce9178]">"Rumah"</span>] = <input type="text" id="input22_2_1" class="bg-[#3c3c3c] dark:bg-slate-700 text-[#dcdcaa] border border-slate-600 dark:border-slate-500 rounded px-2 py-0.5 mx-1 w-16 outline-none focus:border-blue-400 focus:bg-[#2d2d2d] dark:focus:bg-slate-800 text-center transition-colors shadow-inner font-bold" autocomplete="off" spellcheck="false" placeholder="[ ]">
                        </div>
                        
                        <div class="mt-4"><span class="text-[#dcdcaa]">print</span>(<span class="text-[#ce9178]">"Jalur keluar Rumah:"</span>, <span class="text-[#9cdcfe]">rute_jalan</span>[<span class="text-[#ce9178]">"Rumah"</span>])</div>
                    </div>

                    <div id="console-output-22-2" class="hidden border-t border-slate-700 bg-black p-5 text-xs font-mono shrink-0">
                        <span class="text-slate-400">> root@graflearn: python main.py</span><br>
                        <div id="console-text-22-2" class="mt-2 leading-relaxed"></div>
                    </div>
                </div>

                <div id="alert-22-2" class="hidden mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border transition-all text-center"></div>

                <div id="feedback-edukatif-22-2" class="hidden mt-4 bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-800 p-6 rounded-xl shadow-sm text-slate-800 dark:text-slate-200 text-sm leading-relaxed transition-all">
                    <h4 class="font-bold text-green-900 dark:text-green-400 mb-3 border-b border-green-200 dark:border-green-800 pb-2">
                        Pembahasan Evaluasi
                    </h4>
                    <p class="text-sm text-green-800 dark:text-green-200 leading-relaxed text-justify">
                        Logika yang brilian! Dalam representasi <em>Adjacency List</em> menggunakan Dictionary, sebuah Key (simpul) yang memiliki Value berupa List Kosong <code>[]</code> secara komputasi dibaca sebagai jalan buntu (<em>Dead End</em>). Artinya, ada rute masuk menuju ke Rumah (dari Pasar), tapi tidak ada satupun rute keluar dari Rumah.
                    </p>
                </div>
            </div>

            {{-- SOAL 3: MENAMBAH RELASI DINAMIS --}}
            <div id="activity-22-3-container" class="mb-4 opacity-50 pointer-events-none transition-opacity duration-500">
                <h4 class="font-bold text-slate-800 dark:text-slate-200 text-lg mb-3">3. Menambah Relasi Dinamis</h4>
                <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-xl p-6 mb-6 shadow-sm transition-colors">
                    <p class="text-sm text-blue-900 dark:text-blue-200 leading-relaxed text-justify mb-3">
                        <strong>Skenario:</strong> Karena rute jalan raya ditutup, pemerintah membuka tol baru dari "Pasar" yang langsung tembus menuju ke "Stasiun".
                    </p>
                    <div class="bg-white/80 dark:bg-slate-800/80 p-4 rounded border border-blue-200 dark:border-blue-700 font-medium text-blue-900 dark:text-blue-300 text-sm shadow-sm leading-relaxed transition-colors">
                        <strong>Tugas Anda:</strong> Ambil data <code>rute_jalan["Pasar"]</code> lalu gunakan fungsi <code class="bg-blue-100 dark:bg-blue-900/60 px-1 rounded text-blue-700 dark:text-blue-300 border border-blue-200 dark:border-blue-800 font-mono text-xs">.append()</code> untuk menyisipkan tujuan "Stasiun" secara dinamis ke dalam *list* tujuannya.
                    </div>
                </div>

                <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 font-mono text-sm flex flex-col">
                    <div class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700 shrink-0">
                        <span class="text-slate-400 text-xs">Terminal Editor Pyodide</span>
                        <button onclick="window.runAktivitas22_3()" id="btnRun22_3" class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors flex items-center gap-2 shadow-sm active:scale-95">
                            Cek Jawaban
                        </button>
                    </div>
                    
                    <div class="p-6 leading-relaxed text-[#d4d4d4] overflow-x-auto whitespace-nowrap flex-1">
                        <div class="mb-4"><span class="text-[#9cdcfe]">rute_jalan</span> = <span class="text-[#facc15]">{</span><span class="text-[#ce9178]">"Pasar"</span>: [<span class="text-[#ce9178]">"Kampus"</span>]<span class="text-[#facc15]">}</span></div>

                        <div class="text-[#6a9955]"># Tambahkan "Stasiun" ke dalam daftar tujuan Pasar</div>
                        <div class="flex items-center">
                            <span class="text-[#9cdcfe]">rute_jalan</span>[<span class="text-[#ce9178]">"Pasar"</span>].<input type="text" id="input22_3_1" class="bg-[#3c3c3c] dark:bg-slate-700 text-[#dcdcaa] border border-slate-600 dark:border-slate-500 rounded px-2 py-0.5 mx-1 w-20 outline-none focus:border-blue-400 focus:bg-[#2d2d2d] dark:focus:bg-slate-800 text-center transition-colors shadow-inner font-bold" autocomplete="off" spellcheck="false">(<input type="text" id="input22_3_2" class="bg-[#3c3c3c] dark:bg-slate-700 text-[#ce9178] border border-slate-600 dark:border-slate-500 rounded px-2 py-0.5 mx-1 w-28 outline-none focus:border-blue-400 focus:bg-[#2d2d2d] dark:focus:bg-slate-800 text-center transition-colors shadow-inner font-bold" autocomplete="off" spellcheck="false" placeholder='"..."'>)
                        </div>
                        
                        <div class="mt-4"><span class="text-[#dcdcaa]">print</span>(<span class="text-[#ce9178]">"Tujuan Pasar baru:"</span>, <span class="text-[#9cdcfe]">rute_jalan</span>[<span class="text-[#ce9178]">"Pasar"</span>])</div>
                    </div>

                    <div id="console-output-22-3" class="hidden border-t border-slate-700 bg-black p-5 text-xs font-mono shrink-0">
                        <span class="text-slate-400">> root@graflearn: python main.py</span><br>
                        <div id="console-text-22-3" class="mt-2 leading-relaxed"></div>
                    </div>
                </div>

                <div id="alert-22-3" class="hidden mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border transition-all text-center"></div>

                <div id="feedback-edukatif-22-3" class="hidden mt-4 bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-800 p-6 rounded-xl shadow-sm text-slate-800 dark:text-slate-200 text-sm leading-relaxed transition-all">
                    <h4 class="font-bold text-green-900 dark:text-green-400 mb-3 border-b border-green-200 dark:border-green-800 pb-2">
                        Pembahasan Evaluasi
                    </h4>
                    <p class="text-sm text-green-800 dark:text-green-200 leading-relaxed text-justify">
                        Sintaks Anda sempurna! Karena nilai (<em>value</em>) dari Key <code>"Pasar"</code> adalah sebuah tipe data List Python murni, kita bisa memanipulasinya menggunakan fungsi <code>.append()</code> secara langsung. Cara ini sangat efisien untuk meng-update graf secara dinamis tanpa harus menulis ulang seluruh struktur datanya.
                    </p>
                </div>
            </div>
        </div>

        {{-- Navigasi Bawah --}}
        <div class="flex justify-between gap-4 mt-12 pt-6 border-t border-slate-200 dark:border-slate-700">
            <button type="button" onclick="prevStep()" class="px-6 py-2.5 rounded-lg border border-slate-300 dark:border-slate-700 font-bold text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 transition shadow-sm active:scale-95">
                Kembali
            </button>
            <button type="button" id="btnNext22" onclick="nextStep()" class="px-6 py-2.5 bg-slate-900 dark:bg-slate-700 hover:bg-slate-800 dark:hover:bg-slate-600 text-white font-bold rounded-lg shadow-md transition-all active:scale-95 opacity-50 cursor-not-allowed" disabled>
                Lanjut
            </button>
        </div>

    </div>

    {{-- SCRIPT KHUSUS STEP 2.2 --}}
    <script>
        // ==========================================
        // DYNAMIC LINE NUMBERS & EDITOR SYNC LOGIC
        // ==========================================
        window.syncLineNumbers22 = function() {
            const editor = document.getElementById('editor-sandbox-22');
            const lineNumEl = document.getElementById('line-numbers-22');
            if(!editor || !lineNumEl) return;

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

        window.autoResizeEditor = function(el) {
            if(el.id === 'editor-sandbox-22') window.syncLineNumbers22();
        }

        window.net_isolasi_22 = null;
        window.edges_22 = null;

        document.addEventListener("DOMContentLoaded", function() {
            
            const editor22 = document.getElementById('editor-sandbox-22');
            if(editor22) {
                editor22.addEventListener('input', window.syncLineNumbers22);
            }

            // ==========================================
            // GRAF INTERAKTIF 2.2 (MUTUAL VS FOLLOWER)
            // ==========================================
            const nodesData = [
                { id: 'Andi', label: 'Andi', x: -100, y: 0, color: { background: '#3b82f6', border: '#2563eb' }, font: { color: 'white', size: 16, face: 'Arial' }, shape: 'circle' },
                { id: 'Budi', label: 'Budi', x: 100, y: -60, color: { background: '#10b981', border: '#059669' }, font: { color: 'white', size: 16, face: 'Arial' }, shape: 'circle' },
                { id: 'Citra', label: 'Citra', x: 100, y: 60, color: { background: '#f59e0b', border: '#d97706' }, font: { color: 'white', size: 16, face: 'Arial' }, shape: 'circle' }
            ];

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

                const observer = new IntersectionObserver((entries) => {
                    if (entries[0].isIntersecting && window.net_isolasi_22) {
                        let ticks = 0;
                        let interval = setInterval(() => {
                            window.net_isolasi_22.redraw();
                            window.net_isolasi_22.fit({ animation: false });
                            ticks++;
                            if(ticks > 5) clearInterval(interval); 
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
                    
                    btnM.className = "px-5 py-2.5 bg-blue-600 text-white text-sm font-bold rounded-lg shadow-md transition-all active:scale-95 border-2 border-blue-700";
                    btnF.className = "px-5 py-2.5 bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-300 text-sm font-bold rounded-lg shadow-sm hover:bg-slate-100 dark:hover:bg-slate-700 transition-all border-2 border-slate-300 dark:border-slate-600 active:scale-95";
                    
                    info.className = "w-full mt-4 p-4 bg-blue-50 dark:bg-blue-900/30 border border-blue-300 dark:border-blue-700 rounded-lg text-sm text-blue-900 dark:text-blue-100 text-center font-medium shadow-sm transition-all duration-300";
                    info.innerHTML = "<strong><i class='fa-solid fa-lightbulb text-yellow-500 mr-1'></i> Graf Mutual:</strong> Garis tidak memiliki panah. Jika Andi berteman dengan Budi, maka otomatis Budi juga berteman dengan Andi (Hubungan dua arah).";
                } else {
                    window.edges_22.clear();
                    window.edges_22.add(followerEdges);
                    
                    btnF.className = "px-5 py-2.5 bg-indigo-600 text-white text-sm font-bold rounded-lg shadow-md transition-all active:scale-95 border-2 border-indigo-700";
                    btnM.className = "px-5 py-2.5 bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-300 text-sm font-bold rounded-lg shadow-sm hover:bg-slate-100 dark:hover:bg-slate-700 transition-all border-2 border-slate-300 dark:border-slate-600 active:scale-95";
                    
                    info.className = "w-full mt-4 p-4 bg-indigo-50 dark:bg-indigo-900/30 border border-indigo-300 dark:border-indigo-700 rounded-lg text-sm text-indigo-900 dark:text-indigo-100 text-center font-medium shadow-sm transition-all duration-300";
                    info.innerHTML = "<strong><i class='fa-solid fa-lightbulb text-yellow-500 mr-1'></i> Graf Follower:</strong> Garis memiliki panah (Satu Arah). Andi mem-follow Budi (panah ke Budi). Tapi karena Budi tidak membalas follow, tidak ada panah dari Budi ke Andi.";
                }
            }

            // ==========================================
            // CEK PERSISTENCE SANDBOX & ACTIVITY
            // ==========================================
            const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
            const savedSandboxCode = localStorage.getItem('sandbox_2_2_code_' + userId);
            
            const defaultCode22 = `# 1. Graf Tak Berarah (Simetris / Dua Arah)
# Jika Andi terhubung ke Budi, maka Budi WAJIB terhubung ke Andi
graf_mutual = {
    "Andi": ["Budi", "Citra"],
    "Budi": ["Andi"],        # Budi membalas relasi Andi
    "Citra": ["Andi"]        # Citra membalas relasi Andi
}

# 2. Graf Berarah (Asimetris / Satu Arah)
# Andi mem-follow Budi, tapi Budi tidak mem-follow Andi
graf_follower = {
    "Andi": ["Budi", "Citra"],
    "Budi": [],              # Budi tidak mem-follow siapa-siapa
    "Citra": ["Andi"]
}

# Menampilkan siapa saja yang di-follow oleh Andi
print("Andi mem-follow:", graf_follower["Andi"])

# Menampilkan siapa saja yang di-follow oleh Budi
print("Budi mem-follow:", graf_follower["Budi"])`;

            // BUKA GEMBOK UTAMA JIKA SANDBOX SUDAH SELESAI
            if(localStorage.getItem('sandbox_2_2_done_' + userId) === 'true') {
                if(savedSandboxCode && editor22) {
                    editor22.value = savedSandboxCode;
                } else if(editor22) {
                    editor22.value = defaultCode22;
                }
                
                window.renderHasilSandbox22(false);
                setTimeout(window.syncLineNumbers22, 100);
            } else {
                if(editor22) editor22.value = defaultCode22;
                setTimeout(window.syncLineNumbers22, 100);
            }

            // CEK PROGRESS MASING-MASING SUB-AKTIVITAS
            const isDoneServer = {{ isset($progress['2.2']) && $progress['2.2']->score == 100 ? 'true' : 'false' }};
            const isDoneLocal1 = localStorage.getItem('act_2_2_1_done_user_' + userId) === 'true';
            const isDoneLocal2 = localStorage.getItem('act_2_2_2_done_user_' + userId) === 'true';
            const isDoneLocal3 = localStorage.getItem('act_2_2_3_done_user_' + userId) === 'true';

            if(isDoneServer || isDoneLocal1) { window.kunciJawaban22_1(); }
            if(isDoneServer || isDoneLocal2) { window.kunciJawaban22_2(); }
            if(isDoneServer || isDoneLocal3) { window.kunciJawaban22_3(); }
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
                btnRunSandbox.classList.replace('bg-blue-600', 'bg-emerald-600');
                
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
                btnRunSandbox.innerHTML = 'Coba Lagi';
            }
        }

        window.renderHasilSandbox22 = function(doScroll) {
            const explanationBox = document.getElementById('output-explanation-22');
            const actContainer = document.getElementById('main-activity-wrapper-22');
            const lockMsg = document.getElementById('lock-message-22');
            
            explanationBox.classList.remove('hidden');
            actContainer.classList.remove('opacity-50', 'pointer-events-none');
            if(lockMsg) lockMsg.style.display = 'none';
            
            if(doScroll) {
                setTimeout(() => {
                    explanationBox.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }, 300);
            }
        }

        // ==========================================
        // VALIDASI AKTIVITAS 1
        // ==========================================
        window.runAktivitas22_1 = function() {
            let inputUserRaw = document.getElementById('input22_1_1').value.trim();
            let inputUserLower = inputUserRaw.toLowerCase();
            let inputClean = inputUserLower.replace(/['"]/g, '');
            
            const alertBox = document.getElementById('alert-22-1');
            const consoleBox = document.getElementById('console-output-22-1');
            const consoleText = document.getElementById('console-text-22-1');

            if(inputUserRaw === "") {
                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-yellow-50 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-400 border-yellow-200 dark:border-yellow-800 text-center transition-colors";
                alertBox.innerHTML = "<i class='fa-solid fa-triangle-exclamation mr-1'></i> Error: Nilai rute tidak boleh kosong. Silakan ketik nama lokasi untuk rute kembali.";
                alertBox.classList.remove('hidden');
                consoleBox.classList.add('hidden');
                return;
            }

            const hasValidQuotes = (inputUserRaw.startsWith('"') && inputUserRaw.endsWith('"')) || 
                                   (inputUserRaw.startsWith("'") && inputUserRaw.endsWith("'"));

            if(inputClean === "pasar") {
                if (hasValidQuotes && inputUserRaw.length >= 7) { 
                    const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                    localStorage.setItem('act_2_2_1_done_user_' + userId, 'true');

                    alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-green-50 dark:bg-green-900/30 text-green-800 dark:text-green-400 border-green-400 dark:border-green-800 text-center transition-colors";
                    alertBox.innerHTML = "<i class='fa-solid fa-check-circle mr-1'></i> Debugging Berhasil! Anda sukses merubah jalan satu arah menjadi dua arah dengan sintaks Python yang sempurna.";
                    alertBox.classList.remove('hidden');

                    consoleBox.classList.remove('hidden');
                    consoleText.className = "mt-2 text-[#4af626]";
                    consoleText.innerHTML = "Jalur keluar dari Kampus: ['Pasar']";

                    window.kunciJawaban22_1();
                } else {
                    alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-red-50 dark:bg-red-900/30 text-red-800 dark:text-red-400 border-red-300 dark:border-red-800 animate-pulse text-center transition-colors";
                    alertBox.innerHTML = "<i class='fa-solid fa-circle-xmark mr-1'></i> Syntax Error: Anda lupa atau salah menggunakan tanda kutip! Karena kata 'Pasar' adalah teks (String), Anda wajib mengapitnya dengan tanda kutip.";
                    alertBox.classList.remove('hidden');
                    
                    consoleBox.classList.remove('hidden');
                    consoleText.className = "mt-2 text-[#ff5f56]";
                    consoleText.innerHTML = `Traceback (most recent call last):<br>NameError: name '${inputClean}' is not defined.`;
                }
            } else if (inputClean === "rumah" || inputClean === "kampus") {
                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-red-50 dark:bg-red-900/30 text-red-800 dark:text-red-400 border-red-300 dark:border-red-800 animate-pulse text-center transition-colors";
                alertBox.innerHTML = "<i class='fa-solid fa-circle-xmark mr-1'></i> Logika Graf Salah: Kendaraan tidak bisa lompat node (ke Rumah) atau berputar di tempat (ke Kampus). Kita butuh rute kembali ke titik sebelumnya.";
                alertBox.classList.remove('hidden');
                
                consoleBox.classList.remove('hidden');
                consoleText.className = "mt-2 text-[#ffbd2e]";
                consoleText.innerHTML = `Jalur keluar dari Kampus: [${inputUserRaw}]<br>Peringatan: Terjadi anomali rute!`;
            } else {
                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-red-50 dark:bg-red-900/30 text-red-800 dark:text-red-400 border-red-300 dark:border-red-800 animate-pulse text-center transition-colors";
                alertBox.innerHTML = "<i class='fa-solid fa-circle-xmark mr-1'></i> Logika Salah: Lokasi tersebut tidak ada dalam peta rute. Masukkan nama lokasi asal sebelum Kampus.";
                alertBox.classList.remove('hidden');
                
                consoleBox.classList.remove('hidden');
                consoleText.className = "mt-2 text-[#ff5f56]";
                consoleText.innerHTML = `Error: Node tidak ditemukan dalam graf!`;
            }
        }

        // ==========================================
        // VALIDASI AKTIVITAS 2
        // ==========================================
        window.runAktivitas22_2 = function() {
            const i1 = document.getElementById('input22_2_1').value.trim().replace(/\s/g, '');

            const alertBox = document.getElementById('alert-22-2');
            const consoleBox = document.getElementById('console-output-22-2');
            const consoleText = document.getElementById('console-text-22-2');

            if(i1 === "") {
                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-yellow-50 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-400 border-yellow-200 dark:border-yellow-800 text-center transition-colors";
                alertBox.innerHTML = "<i class='fa-solid fa-triangle-exclamation mr-1'></i> Error: Syntax Tidak Lengkap. Masih ada bagian kode yang kosong.";
                alertBox.classList.remove('hidden');
                consoleBox.classList.add('hidden');
                return;
            }

            if(i1 === '[]') {
                const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                localStorage.setItem('act_2_2_2_done_user_' + userId, 'true');

                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-green-50 dark:bg-green-900/30 text-green-800 dark:text-green-400 border-green-400 dark:border-green-800 text-center transition-colors";
                alertBox.innerHTML = "<i class='fa-solid fa-check-circle mr-1'></i> Tepat sekali! Menyimpan <em>list</em> kosong ke dalam <em>Dictionary</em> adalah cara Python mengenali sebuah titik buntu (*Dead End*).";
                alertBox.classList.remove('hidden');

                consoleBox.classList.remove('hidden');
                consoleText.className = "mt-2 text-[#4af626]";
                consoleText.innerHTML = "Jalur keluar Rumah: []";

                window.kunciJawaban22_2();
            } else {
                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-red-50 dark:bg-red-900/30 text-red-800 dark:text-red-400 border-red-300 dark:border-red-800 animate-pulse text-center transition-colors";
                alertBox.innerHTML = "<i class='fa-solid fa-circle-xmark mr-1'></i> SyntaxError: Terdapat kesalahan. Pastikan Anda mengetik simbol kurung siku buka dan tutup secara bergandengan.";
                alertBox.classList.remove('hidden');
                
                consoleBox.classList.remove('hidden');
                consoleText.className = "mt-2 text-[#ff5f56]";
                consoleText.innerHTML = "Traceback (most recent call last):<br>TypeError atau Invalid Syntax.";
            }
        }

        // ==========================================
        // VALIDASI AKTIVITAS 3
        // ==========================================
        window.runAktivitas22_3 = function() {
            const i1 = document.getElementById('input22_3_1').value.trim().toLowerCase();
            const i2 = document.getElementById('input22_3_2').value.trim().toLowerCase().replace(/['"]/g, '');

            const alertBox = document.getElementById('alert-22-3');
            const consoleBox = document.getElementById('console-output-22-3');
            const consoleText = document.getElementById('console-text-22-3');

            if(!i1 || !i2) {
                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-yellow-50 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-400 border-yellow-200 dark:border-yellow-800 text-center transition-colors";
                alertBox.innerHTML = "<i class='fa-solid fa-triangle-exclamation mr-1'></i> Error: Syntax Tidak Lengkap. Masih ada bagian kode yang kosong.";
                alertBox.classList.remove('hidden');
                consoleBox.classList.add('hidden');
                return;
            }

            if(i1 === 'append' && i2 === 'stasiun') {
                const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                localStorage.setItem('act_2_2_3_done_user_' + userId, 'true');

                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-green-50 dark:bg-green-900/30 text-green-800 dark:text-green-400 border-green-400 dark:border-green-800 text-center transition-colors";
                alertBox.innerHTML = "<i class='fa-solid fa-check-circle mr-1'></i> Sempurna! Anda berhasil memodifikasi data <em>Dictionary</em> secara instan menggunakan fungsi <code>.append()</code>.";
                alertBox.classList.remove('hidden');

                consoleBox.classList.remove('hidden');
                consoleText.className = "mt-2 text-[#4af626]";
                consoleText.innerHTML = "Tujuan Pasar baru: ['Kampus', 'Stasiun']";

                window.kunciJawaban22_3();

                // BARU DI-SAVE PROGRESS SAAT SEMUA AKTIVITAS SELESAI
                fetch("{{ route('submit.score') }}", { 
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        chapter: "bab2",
                        section: "2.2",
                        score: 100,
                        answer: "Berhasil Live Coding 2.2 (Full)"
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
                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-red-50 dark:bg-red-900/30 text-red-800 dark:text-red-400 border-red-300 dark:border-red-800 animate-pulse text-center transition-colors";
                alertBox.innerHTML = "<i class='fa-solid fa-circle-xmark mr-1'></i> SyntaxError: Terdapat kesalahan pengetikan nama fungsi atau lokasi rute barunya.";
                alertBox.classList.remove('hidden');
                
                consoleBox.classList.remove('hidden');
                consoleText.className = "mt-2 text-[#ff5f56]";
                consoleText.innerHTML = "Traceback (most recent call last):<br>AttributeError atau NameError.";
            }
        }


        // KUNCI JAWABAN (1) & UNLOCK AKTIVITAS (2)
        window.kunciJawaban22_1 = function() {
            const el = document.getElementById('input22_1_1');
            if(el) {
                el.value = '"Pasar"';
                el.disabled = true;
                el.classList.remove('bg-[#3c3c3c]', 'dark:bg-slate-700', 'text-[#ce9178]', 'border-slate-600', 'dark:border-slate-500');
                el.classList.add('bg-emerald-600', 'text-white', 'border-emerald-500', 'font-bold', 'cursor-not-allowed', 'shadow-inner');
            }

            const btnRun = document.getElementById('btnRun22_1');
            if(btnRun) {
                btnRun.innerHTML = 'Diselesaikan';
                btnRun.classList.replace('bg-blue-600', 'bg-slate-600');
                btnRun.classList.replace('hover:bg-blue-500', 'cursor-not-allowed');
                btnRun.disabled = true;
            }

            document.getElementById('feedback-edukatif-22-1').classList.remove('hidden');

            // UNLOCK ACTIVITY 2
            document.getElementById('activity-22-2-container').classList.remove('opacity-50', 'pointer-events-none');
        }

        // KUNCI JAWABAN (2) & UNLOCK AKTIVITAS (3)
        window.kunciJawaban22_2 = function() {
            const el = document.getElementById('input22_2_1');
            if(el) {
                el.value = '[]';
                el.disabled = true;
                el.classList.remove('bg-[#3c3c3c]', 'dark:bg-slate-700', 'text-[#dcdcaa]', 'border-slate-600', 'dark:border-slate-500');
                el.classList.add('bg-emerald-600', 'text-white', 'border-emerald-500', 'font-bold', 'cursor-not-allowed', 'shadow-inner');
            }

            const btnRun = document.getElementById('btnRun22_2');
            if(btnRun) {
                btnRun.innerHTML = 'Diselesaikan';
                btnRun.classList.replace('bg-blue-600', 'bg-slate-600');
                btnRun.classList.replace('hover:bg-blue-500', 'cursor-not-allowed');
                btnRun.disabled = true;
            }

            document.getElementById('feedback-edukatif-22-2').classList.remove('hidden');

            // UNLOCK ACTIVITY 3
            document.getElementById('activity-22-3-container').classList.remove('opacity-50', 'pointer-events-none');
        }

        // KUNCI JAWABAN (3) & UNLOCK TOMBOL NEXT BAB
        window.kunciJawaban22_3 = function() {
            const inputs = ['input22_3_1', 'input22_3_2'];
            const correctValues = ['append', '"Stasiun"'];

            inputs.forEach((id, idx) => {
                const el = document.getElementById(id);
                if(el) {
                    el.value = correctValues[idx];
                    el.disabled = true;
                    el.classList.remove('bg-[#3c3c3c]', 'dark:bg-slate-700', 'text-[#dcdcaa]', 'text-[#ce9178]', 'border-slate-600', 'dark:border-slate-500');
                    el.classList.add('bg-emerald-600', 'text-white', 'border-emerald-500', 'font-bold', 'cursor-not-allowed', 'shadow-inner');
                }
            });

            const btnRun = document.getElementById('btnRun22_3');
            if(btnRun) {
                btnRun.innerHTML = 'Diselesaikan';
                btnRun.classList.replace('bg-blue-600', 'bg-slate-600');
                btnRun.classList.replace('hover:bg-blue-500', 'cursor-not-allowed');
                btnRun.disabled = true;
            }
            
            document.getElementById('feedback-edukatif-22-3').classList.remove('hidden');

            // UNLOCK NEXT BUTTON (FINAL)
            const btnNext = document.getElementById('btnNext22');
            if(btnNext) {
                btnNext.disabled = false;
                btnNext.classList.remove('opacity-50', 'cursor-not-allowed');
                btnNext.classList.replace('bg-slate-900', 'bg-blue-600');
                btnNext.classList.replace('dark:bg-slate-700', 'dark:bg-blue-600');
                btnNext.classList.replace('hover:bg-slate-800', 'hover:bg-blue-700');
            }
        }
    </script>
</section>