<section id="step-3" class="step-slide">
    {{-- IMPORT VIS JS --}}
    <script type="text/javascript" src="https://unpkg.com/vis-network/standalone/umd/vis-network.min.js"></script>

    <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm p-8 md:p-10 max-w-6xl mx-auto -mt-8 transition-colors">
        
        {{-- JUDUL MATERI --}}
        <div class="border-b border-slate-200 dark:border-slate-700 pb-6 mb-8">
            <h2 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white mb-2">2.3 Adjacency Matrix (Matriks Ketetanggaan)</h2>
            <p class="text-slate-500 dark:text-slate-400 font-medium text-justify">Merepresentasikan Graf menggunakan format Array atau List 2 Dimensi (Baris & Kolom).</p>
        </div>

        {{-- PENGANTAR TEORI --}}
        <div class="prose prose-slate dark:prose-invert text-slate-700 dark:text-slate-300 leading-relaxed text-justify mb-8 max-w-none">
            <p>
                Selain menggunakan <em>Dictionary</em>, graf juga dapat direpresentasikan menggunakan format Matrix 2 Dimensi (Baris dan Kolom). Di Python, matriks direpresentasikan menggunakan struktur <strong>List di dalam List</strong>.
            </p>
            <p>
                Format matriks sangat fleksibel. Pada <strong>Graf Tak Berbobot</strong>, isi matriks murni hanya angka <code>1</code> (terhubung) dan <code>0</code> (terputus). Sedangkan pada <strong>Graf Berbobot</strong>, angka <code>1</code> tersebut diganti dengan nilai jarak, biaya, atau waktu tempuh.
            </p>

            <div class="bg-amber-50 dark:bg-slate-800 border-l-4 border-amber-500 dark:border-amber-500 p-5 rounded-r-lg mt-6 mb-6 shadow-inner transition-colors">
                <h4 class="font-bold text-amber-900 dark:text-amber-300 mb-2 text-sm uppercase tracking-wider flex items-center gap-2">
                    <i class="fa-solid fa-list-ol"></i> Aturan Penulisan Adjacency Matrix:
                </h4>
                <ul class="list-disc list-outside ml-4 text-amber-900 dark:text-slate-300 space-y-1.5 text-sm">
                    <li>Indeks <strong>Baris</strong> mewakili <strong>Simpul Asal</strong> (Dari).</li>
                    <li>Indeks <strong>Kolom</strong> mewakili <strong>Simpul Tujuan</strong> (Ke).</li>
                    <li>Angka <strong>0</strong> menandakan <strong>tidak ada</strong> jalur langsung antar simpul tersebut.</li>
                    <li>Angka <strong>1</strong> (Tak Berbobot) atau <strong>Angka Jarak</strong> (Berbobot) menandakan <strong>adanya</strong> jalur relasi.</li>
                </ul>
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- UI WEB 1: GRAF TAK BERBOBOT (0 DAN 1)      --}}
        {{-- ========================================== --}}
        <div class="bg-slate-50 dark:bg-slate-800/50 p-6 rounded-xl border border-slate-200 dark:border-slate-700 shadow-inner mb-8 overflow-hidden transition-colors">
            <div class="border-b border-slate-200 dark:border-slate-700 pb-4 mb-5 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h3 class="font-bold text-slate-800 dark:text-slate-200 text-sm"><i class="fa-solid fa-table-cells text-blue-500 mr-2"></i> Interaktif 1: Matriks Graf Tak Berbobot (1 & 0)</h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-1"><em>Klik pada <strong>garis (sisi)</strong> di graf untuk melihat letak angka <strong>1 (Tersambung)</strong> di tabel matriks!</em></p>
                </div>
                <div class="shrink-0 font-mono text-[10px] bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-200 px-3 py-1.5 rounded border border-blue-200 dark:border-blue-700 shadow-sm uppercase font-bold tracking-widest text-center">
                    Tak Berarah
                </div>
            </div>

            <div class="grid lg:grid-cols-2 gap-6 items-stretch">
                {{-- Canvas Vis.js Tak Berbobot --}}
                <div class="bg-white dark:bg-slate-900 rounded-lg border border-slate-300 dark:border-slate-700 shadow-sm h-[280px] relative overflow-hidden flex flex-col transition-all">
                    <div id="vis_matrix_uw_23" class="w-full flex-1 cursor-default outline-none"></div>
                </div>

                {{-- Visualisasi Tabel Matriks Tak Berbobot --}}
                <div class="bg-white dark:bg-slate-900 rounded-lg border border-slate-300 dark:border-slate-700 shadow-sm p-4 h-[280px] flex flex-col justify-between transition-colors">
                    <table class="w-full text-center border-collapse text-xs md:text-sm rounded-lg overflow-hidden">
                        <thead class="bg-slate-100 dark:bg-slate-800">
                            <tr>
                                <th class="p-2 border border-slate-300 dark:border-slate-600 text-slate-600 dark:text-slate-300 text-[10px] font-semibold">Asal \ Tujuan</th>
                                <th class="p-2 border border-slate-300 dark:border-slate-600 text-slate-800 dark:text-slate-100 font-bold w-1/4 leading-tight">0<br><span class="text-[9px] font-normal text-slate-500 dark:text-slate-400 leading-none">Simpul A</span></th>
                                <th class="p-2 border border-slate-300 dark:border-slate-600 text-slate-800 dark:text-slate-100 font-bold w-1/4 leading-tight">1<br><span class="text-[9px] font-normal text-slate-500 dark:text-slate-400 leading-none">Simpul B</span></th>
                                <th class="p-2 border border-slate-300 dark:border-slate-600 text-slate-800 dark:text-slate-100 font-bold w-1/4 leading-tight">2<br><span class="text-[9px] font-normal text-slate-500 dark:text-slate-400 leading-none">Simpul C</span></th>
                            </tr>
                        </thead>
                        <tbody class="text-sm font-mono">
                            <tr>
                                <th class="p-2 border border-slate-300 dark:border-slate-600 bg-slate-50 dark:bg-slate-800 text-slate-700 dark:text-slate-300 text-left pl-3 leading-tight">0 <span class="text-[9px] font-normal text-slate-500 dark:text-slate-400 ml-1">Simpul A</span></th>
                                <td id="cell-uw-0-0" class="p-2 transition-all duration-300 text-slate-400 dark:text-slate-500 font-normal border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900">0</td>
                                <td id="cell-uw-0-1" class="p-2 transition-all duration-300 text-blue-700 dark:text-blue-300 font-bold border border-slate-300 dark:border-slate-600 bg-blue-50 dark:bg-slate-800">1</td>
                                <td id="cell-uw-0-2" class="p-2 transition-all duration-300 text-slate-400 dark:text-slate-500 font-normal border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900">0</td>
                            </tr>
                            <tr>
                                <th class="p-2 border border-slate-300 dark:border-slate-600 bg-slate-50 dark:bg-slate-800 text-slate-700 dark:text-slate-300 text-left pl-3 leading-tight">1 <span class="text-[9px] font-normal text-slate-500 dark:text-slate-400 ml-1">Simpul B</span></th>
                                <td id="cell-uw-1-0" class="p-2 transition-all duration-300 text-blue-700 dark:text-blue-300 font-bold border border-slate-300 dark:border-slate-600 bg-blue-50 dark:bg-slate-800">1</td>
                                <td id="cell-uw-1-1" class="p-2 transition-all duration-300 text-slate-400 dark:text-slate-500 font-normal border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900">0</td>
                                <td id="cell-uw-1-2" class="p-2 transition-all duration-300 text-blue-700 dark:text-blue-300 font-bold border border-slate-300 dark:border-slate-600 bg-blue-50 dark:bg-slate-800">1</td>
                            </tr>
                            <tr>
                                <th class="p-2 border border-slate-300 dark:border-slate-600 bg-slate-50 dark:bg-slate-800 text-slate-700 dark:text-slate-300 text-left pl-3 leading-tight">2 <span class="text-[9px] font-normal text-slate-500 dark:text-slate-400 ml-1">Simpul C</span></th>
                                <td id="cell-uw-2-0" class="p-2 transition-all duration-300 text-slate-400 dark:text-slate-500 font-normal border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900">0</td>
                                <td id="cell-uw-2-1" class="p-2 transition-all duration-300 text-blue-700 dark:text-blue-300 font-bold border border-slate-300 dark:border-slate-600 bg-blue-50 dark:bg-slate-800">1</td>
                                <td id="cell-uw-2-2" class="p-2 transition-all duration-300 text-slate-400 dark:text-slate-500 font-normal border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900">0</td>
                            </tr>
                        </tbody>
                    </table>
                    <div id="info-matrix-uw-23" class="mt-4 text-[11px] text-center text-slate-500 dark:text-slate-400 bg-slate-100 dark:bg-slate-800 px-3 py-2 rounded border border-slate-200 dark:border-slate-700 h-[46px] flex items-center justify-center transition-colors shadow-inner">
                        <em>Pilih murni pada <strong>garis (sisi)</strong> di graf untuk melihat letak data.</em>
                    </div>
                </div>
            </div>

            {{-- PENJELASAN VISUALISASI TAK BERBOBOT --}}
            <div class="mt-6 bg-white dark:bg-slate-900 p-5 rounded-lg border border-slate-200 dark:border-slate-700 shadow-sm transition-colors overflow-hidden prose prose-slate dark:prose-invert prose-sm prose-compact max-w-none prose-justify">
                <h4 class="font-bold text-slate-800 dark:text-slate-200 text-sm mb-2 flex items-center gap-2">
                    <i class="fa-solid fa-microscope text-blue-500"></i> Analisis Visual: Matriks Tak Berbobot
                </h4>
                <ul class="list-disc list-outside ml-4 text-sm text-slate-600 dark:text-slate-300 space-y-2">
                    <li><strong>Angka 1 (Tersambung):</strong> Menandakan adanya sisi/garis yang menghubungkan dua simpul. Contoh: Simpul A terhubung dengan Simpul B, maka baris 0 kolom 1 bernilai <strong>1</strong>.</li>
                    <li><strong>Angka 0 (Terputus):</strong> Menandakan tidak ada jalan langsung. Contoh: Simpul A tidak terhubung langsung ke Simpul C, maka nilainya <strong>0</strong>.</li>
                    <li><strong>Diagonal Nol:</strong> Deretan angka 0 yang membelah tabel miring terjadi karena sebuah simpul secara logika tidak memiliki garis yang mengarah ke dirinya sendiri (tidak ada <em>self-loop</em>).</li>
                </ul>
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- UI WEB 2: GRAF BERBOBOT (JARAK)            --}}
        {{-- ========================================== --}}
        <div class="bg-slate-50 dark:bg-slate-800/50 p-6 rounded-xl border border-slate-200 dark:border-slate-700 shadow-inner mb-8 overflow-hidden transition-colors">
            <div class="border-b border-slate-200 dark:border-slate-700 pb-4 mb-5 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h3 class="font-bold text-slate-800 dark:text-slate-200 text-sm"><i class="fa-solid fa-road text-amber-500 mr-2"></i> Interaktif 2: Matriks Graf Berbobot (Jarak KM)</h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-1"><em>Klik pada <strong>garis jarak</strong> di graf untuk melihat bagaimana nilai 1 berubah menjadi bobot jarak!</em></p>
                </div>
                <div class="shrink-0 font-mono text-[10px] bg-amber-100 dark:bg-amber-900/50 text-amber-800 dark:text-amber-300 px-3 py-1.5 rounded border border-amber-200 dark:border-amber-700 shadow-sm uppercase font-bold tracking-widest text-center">
                    Tak Berarah
                </div>
            </div>

            <div class="grid lg:grid-cols-2 gap-6 items-stretch">
                {{-- Canvas Vis.js Berbobot --}}
                <div class="bg-white dark:bg-slate-900 rounded-lg border border-slate-300 dark:border-slate-700 shadow-sm h-[280px] relative overflow-hidden flex flex-col transition-all">
                    <div id="vis_matrix_23" class="w-full flex-1 cursor-default outline-none"></div>
                </div>

                {{-- Visualisasi Tabel Matriks Berbobot --}}
                <div class="bg-white dark:bg-slate-900 rounded-lg border border-slate-300 dark:border-slate-700 shadow-sm p-4 h-[280px] flex flex-col justify-between transition-colors">
                    <table class="w-full text-center border-collapse text-xs md:text-sm rounded-lg overflow-hidden">
                        <thead class="bg-slate-100 dark:bg-slate-800">
                            <tr>
                                <th class="p-2 border border-slate-300 dark:border-slate-600 text-slate-600 dark:text-slate-300 text-[10px] font-semibold">Asal \ Tujuan</th>
                                <th class="p-2 border border-slate-300 dark:border-slate-600 text-slate-800 dark:text-slate-100 font-bold w-1/4 leading-tight">0<br><span class="text-[9px] font-normal text-slate-500 dark:text-slate-400 leading-none">Jakarta</span></th>
                                <th class="p-2 border border-slate-300 dark:border-slate-600 text-slate-800 dark:text-slate-100 font-bold w-1/4 leading-tight">1<br><span class="text-[9px] font-normal text-slate-500 dark:text-slate-400 leading-none">Bandung</span></th>
                                <th class="p-2 border border-slate-300 dark:border-slate-600 text-slate-800 dark:text-slate-100 font-bold w-1/4 leading-tight">2<br><span class="text-[9px] font-normal text-slate-500 dark:text-slate-400 leading-none">Semarang</span></th>
                            </tr>
                        </thead>
                        <tbody class="text-sm font-mono">
                            <tr>
                                <th class="p-2 border border-slate-300 dark:border-slate-600 bg-slate-50 dark:bg-slate-800 text-slate-700 dark:text-slate-300 text-left pl-3 leading-tight">0 <span class="text-[9px] font-normal text-slate-500 dark:text-slate-400 ml-1">Jakarta</span></th>
                                <td id="cell-0-0" class="p-2 transition-all duration-300 text-slate-400 dark:text-slate-500 font-normal border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900">0</td>
                                <td id="cell-0-1" class="p-2 transition-all duration-300 text-slate-800 dark:text-slate-200 font-bold border border-slate-300 dark:border-slate-600 bg-amber-50 dark:bg-slate-800">150</td>
                                <td id="cell-0-2" class="p-2 transition-all duration-300 text-slate-400 dark:text-slate-500 font-normal border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900">0</td>
                            </tr>
                            <tr>
                                <th class="p-2 border border-slate-300 dark:border-slate-600 bg-slate-50 dark:bg-slate-800 text-slate-700 dark:text-slate-300 text-left pl-3 leading-tight">1 <span class="text-[9px] font-normal text-slate-500 dark:text-slate-400 ml-1">Bandung</span></th>
                                <td id="cell-1-0" class="p-2 transition-all duration-300 text-slate-800 dark:text-slate-200 font-bold border border-slate-300 dark:border-slate-600 bg-amber-50 dark:bg-slate-800">150</td>
                                <td id="cell-1-1" class="p-2 transition-all duration-300 text-slate-400 dark:text-slate-500 font-normal border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900">0</td>
                                <td id="cell-1-2" class="p-2 transition-all duration-300 text-slate-800 dark:text-slate-200 font-bold border border-slate-300 dark:border-slate-600 bg-amber-50 dark:bg-slate-800">250</td>
                            </tr>
                            <tr>
                                <th class="p-2 border border-slate-300 dark:border-slate-600 bg-slate-50 dark:bg-slate-800 text-slate-700 dark:text-slate-300 text-left pl-3 leading-tight">2 <span class="text-[9px] font-normal text-slate-500 dark:text-slate-400 ml-1">Semarang</span></th>
                                <td id="cell-2-0" class="p-2 transition-all duration-300 text-slate-400 dark:text-slate-500 font-normal border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900">0</td>
                                <td id="cell-2-1" class="p-2 transition-all duration-300 text-slate-800 dark:text-slate-200 font-bold border border-slate-300 dark:border-slate-600 bg-amber-50 dark:bg-slate-800">250</td>
                                <td id="cell-2-2" class="p-2 transition-all duration-300 text-slate-400 dark:text-slate-500 font-normal border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900">0</td>
                            </tr>
                        </tbody>
                    </table>
                    <div id="info-matrix-23" class="mt-4 text-[11px] text-center text-slate-500 dark:text-slate-400 bg-slate-100 dark:bg-slate-800 px-3 py-2 rounded border border-slate-200 dark:border-slate-700 h-[46px] flex items-center justify-center transition-colors shadow-inner">
                        <em>Pilih murni pada garis (sisi) KM di graf untuk melihat letak data.</em>
                    </div>
                </div>
            </div>

            {{-- PENJELASAN VISUALISASI BERBOBOT --}}
            <div class="mt-6 bg-white dark:bg-slate-900 p-5 rounded-lg border border-slate-200 dark:border-slate-700 shadow-sm transition-colors overflow-hidden prose prose-slate dark:prose-invert prose-sm prose-compact max-w-none prose-justify">
                <h4 class="font-bold text-slate-800 dark:text-slate-200 text-sm mb-2 flex items-center gap-2">
                    <i class="fa-solid fa-microscope text-amber-500"></i> Analisis Visual: Matriks Berbobot
                </h4>
                <ul class="list-disc list-outside ml-4 text-sm text-slate-600 dark:text-slate-300 space-y-2">
                    <li><strong>Mengganti Nilai 1:</strong> Pada graf berbobot, angka <code>1</code> diubah menjadi angka nilai/bobot sebenarnya. Contoh: Baris 1 (Bandung) menyilang dengan Kolom 2 (Semarang) kini berisi angka <strong>250</strong>.</li>
                    <li><strong>Efek Cermin (Simetris):</strong> Karena kedua graf di atas adalah <strong>Tak Berarah (Dua Arah)</strong>, nilai di atas garis diagonal 0 sama persis dengan di bawahnya. Jarak Jakarta &rarr; Bandung (150) sama persis dengan Bandung &rarr; Jakarta (150).</li>
                </ul>
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- CONTOH KODE PROGRAM (GABUNGAN MATRIKS) --}}
        {{-- ========================================== --}}
        <div class="mb-10">
            <h3 class="text-lg font-bold text-slate-800 dark:text-slate-100 mb-3">Contoh Kode Program:</h3>
            
            <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 select-none flex flex-col h-auto">
                <div class="bg-[#2d2d2d] px-4 py-2.5 flex items-center gap-2 border-b border-slate-700 shrink-0">
                    <div class="w-2.5 h-2.5 rounded-full bg-[#ff5f56]"></div>
                    <div class="w-2.5 h-2.5 rounded-full bg-[#ffbd2e]"></div>
                    <div class="w-2.5 h-2.5 rounded-full bg-[#27c93f]"></div>
                    <span class="text-slate-400 text-[10px] ml-2 font-mono leading-none">graf_matriks.py (Hanya Baca)</span>
                </div>
                
                {{-- CODE BLOCK WITH LINE NUMBERS --}}
                <div class="flex p-4 md:p-6 font-mono text-[12px] md:text-sm leading-[1.625] text-[#d4d4d4] overflow-x-auto">
                    {{-- Line Numbers --}}
                    <div class="flex flex-col text-[#858585] text-right select-none pr-4 md:pr-6 border-r border-[#404040] mr-4 md:mr-6 shrink-0 z-10 bg-[#1e1e1e]">
                        <span>1</span><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span><span>7</span><span>8</span><span>9</span><span>10</span><span>11</span><span>12</span><span>13</span><span>14</span><span>15</span><span>16</span><span>17</span>
                    </div>
                    
                    {{-- Code Content (DENGAN NBSP) --}}
                    <div class="flex flex-col whitespace-pre flex-1">
                        <div class="text-[#6a9955]"># 1. Matriks Tak Berbobot (Nilai 0 dan 1)</div>
                        <div class="z-0"><span class="text-[#9cdcfe]">matrix_tak_berbobot</span> = [</div>
                        <div>&nbsp;&nbsp;&nbsp;&nbsp;[<span class="text-[#b5cea8]">0</span>, <span class="text-[#b5cea8]">1</span>, <span class="text-[#b5cea8]">0</span>],&nbsp;&nbsp;<span class="text-[#6a9955]"># Baris 0 (Simpul A)</span></div>
                        <div>&nbsp;&nbsp;&nbsp;&nbsp;[<span class="text-[#b5cea8]">1</span>, <span class="text-[#b5cea8]">0</span>, <span class="text-[#b5cea8]">1</span>],&nbsp;&nbsp;<span class="text-[#6a9955]"># Baris 1 (Simpul B)</span></div>
                        <div>&nbsp;&nbsp;&nbsp;&nbsp;[<span class="text-[#b5cea8]">0</span>, <span class="text-[#b5cea8]">1</span>, <span class="text-[#b5cea8]">0</span>]&nbsp;&nbsp;&nbsp;<span class="text-[#6a9955]"># Baris 2 (Simpul C)</span></div>
                        <div class="z-0">]</div>
                        <div class="z-0">&nbsp;</div>
                        <div class="text-[#6a9955]"># 2. Matriks Berbobot (Jarak dalam KM)</div>
                        <div class="z-0"><span class="text-[#9cdcfe]">matrix_bobot</span> = [</div>
                        <div>&nbsp;&nbsp;&nbsp;&nbsp;[<span class="text-[#b5cea8]">0</span>, <span class="text-[#b5cea8]">150</span>, <span class="text-[#b5cea8]">0</span>],&nbsp;&nbsp;<span class="text-[#6a9955]"># Baris 0 (Jakarta)</span></div>
                        <div>&nbsp;&nbsp;&nbsp;&nbsp;[<span class="text-[#b5cea8]">150</span>, <span class="text-[#b5cea8]">0</span>, <span class="text-[#b5cea8]">250</span>],&nbsp;&nbsp;<span class="text-[#6a9955]"># Baris 1 (Bandung)</span></div>
                        <div>&nbsp;&nbsp;&nbsp;&nbsp;[<span class="text-[#b5cea8]">0</span>, <span class="text-[#b5cea8]">250</span>, <span class="text-[#b5cea8]">0</span>]&nbsp;&nbsp;&nbsp;<span class="text-[#6a9955]"># Baris 2 (Semarang)</span></div>
                        <div class="z-0">]</div>
                        <div class="z-0">&nbsp;</div>
                        <div class="text-[#6a9955]"># Mengekstrak jarak Bandung (Baris 1) ke Semarang (Kolom 2)</div>
                        <div><span class="text-[#9cdcfe]">jarak</span> = <span class="text-[#9cdcfe]">matrix_bobot</span>[<span class="text-[#b5cea8]">1</span>][<span class="text-[#b5cea8]">2</span>]</div>
                        <div><span class="text-[#dcdcaa]">print</span>(<span class="text-[#ce9178]">"Jarak dari Bandung ke Semarang adalah:"</span>, <span class="text-[#9cdcfe]">jarak</span>, <span class="text-[#ce9178]">"KM"</span>)</div>
                    </div>
                </div>

            </div>
        </div>

        {{-- PENJELASAN KODE DENGAN REFERENSI BARIS --}}
        <div class="mt-4 mb-10 bg-slate-50 dark:bg-slate-900 p-6 rounded-lg border border-slate-200 dark:border-slate-700 shadow-sm transition-colors overflow-hidden prose prose-slate dark:prose-invert prose-sm prose-compact max-w-none prose-justify">
            <h4 class="font-bold text-slate-800 dark:text-slate-200 text-sm mb-3">Penjelasan Kode:</h4>
            <ul class="list-disc list-outside ml-4 text-sm text-slate-700 dark:text-slate-300 space-y-3">
                <li><strong>Baris 2 sampai 6:</strong> Menginisialisasi matriks untuk graf tak berbobot. Isinya hanya angka <code>1</code> (ada sisi) dan <code>0</code> (tidak ada sisi).</li>
                <li><strong>Baris 9 sampai 13:</strong> Menginisialisasi matriks untuk graf berbobot. Angka 1 diganti dengan nilai jarak sesungguhnya (misal 150 KM atau 250 KM).</li>
                <li><strong>Baris 16 & 17:</strong> Komputer selalu membaca <strong>Baris</strong> dari atas ke bawah, lalu <strong>Kolom</strong> dari kiri ke kanan. Saat perintah <code>matrix_bobot[1][2]</code> dipanggil pada Baris 16, komputer akan turun ke <strong>Baris indeks 1</strong>, lalu menelusuri <strong>Kolom indeks 2</strong> untuk mendapatkan nilai <code>250</code>.</li>
            </ul>
        </div>


        {{-- ========================================== --}}
        {{-- INTERACTIVE SANDBOX DENGAN DYNAMIC LINE NUMBERS --}}
        {{-- ========================================== --}}
        <div class="mb-10 p-6 border-2 border-indigo-200 dark:border-indigo-800/60 bg-indigo-50/30 dark:bg-indigo-950/20 rounded-xl shadow-sm transition-colors">
            <h3 class="text-lg font-bold text-slate-800 dark:text-slate-100 mb-2 flex items-center gap-2">
                <i class="fa-solid fa-keyboard text-indigo-600 dark:text-indigo-400"></i> Coba Sendiri!
            </h3>
            <p class="text-sm text-slate-600 dark:text-slate-300 mb-4 text-justify">
                Ketik ulang keseluruhan kode pada contoh di atas ke dalam editor di bawah ini (tidak perlu mengetik komentarnya). Biasakan jari Anda dengan sintaks Array 2 Dimensi!
            </p>

            <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 font-mono text-sm relative">
                <div class="bg-[#2d2d2d] px-4 py-2.5 flex items-center justify-between border-b border-slate-700 shrink-0">
                    <span class="text-slate-400 text-xs tracking-wider z-0">Terminal Editor (main.py)</span>
                    <button onclick="window.runSandbox23()" id="btnRunSandbox-23" class="bg-indigo-600 hover:bg-indigo-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors flex items-center gap-2 shadow-sm active:scale-95 z-10">
                        <i class="fa-solid fa-play"></i> Jalankan Program
                    </button>
                </div>
                
                {{-- DYNAMIC EDITOR LAYOUT --}}
                <div class="flex font-mono text-[12px] md:text-sm text-[#d4d4d4] bg-[#1e1e1e] relative min-h-[160px] leading-[1.625]">
                    {{-- Container Angka Baris (Kiri) --}}
                    <div id="line-numbers-23" class="text-[#858585] text-right select-none py-5 pl-4 pr-4 border-r border-[#404040] bg-[#1e1e1e] shrink-0 z-10 leading-[1.625]">
                        <div>1</div>
                    </div>
                    
                    {{-- Textarea Editor (Kanan) --}}
                    <textarea id="editor-sandbox-23" class="w-full bg-transparent text-[#d4d4d4] outline-none resize-none py-5 pl-4 pr-6 whitespace-pre overflow-x-auto z-0 leading-[1.625]" spellcheck="false" placeholder="# Ketik kode Python di sini..." oninput="window.autoResizeEditor23(this)"></textarea>
                </div>

                {{-- Console Output Sandbox --}}
                <div id="console-sandbox-23" class="hidden border-t border-slate-700 bg-black p-5 text-xs font-mono">
                    <span class="text-slate-400 z-0">> root@graflearn: python main.py</span><br>
                    <div id="sandbox-output-text-23" class="mt-2 leading-relaxed whitespace-pre z-0"></div>
                </div>
            </div>
        </div>

        {{-- OUTPUT EXPLANATION (MUNCUL SETELAH SANDBOX BERHASIL) --}}
        <div id="output-explanation-23" class="mb-12 hidden transition-all duration-700 border-l-4 border-green-400 dark:border-green-600 pl-6 py-2 overflow-hidden prose prose-slate dark:prose-invert prose-sm prose-compact max-w-none prose-justify">
            <h3 class="text-lg font-bold text-slate-800 dark:text-slate-100 mb-3">Analisis Output:</h3>
            
            <div class="bg-black text-[#4af626] font-mono text-sm p-4 rounded-lg shadow-inner mb-4 inline-block pr-20 border border-green-900 dark:border-green-700">
                Jarak dari Bandung ke Semarang adalah: 250 KM
            </div>

            <p class="text-sm text-slate-700 dark:text-slate-300 leading-relaxed space-y-2">
                Output tersebut membuktikan bahwa program berhasil menampilkan data jarak antar lokasi menggunakan teknik ekstraksi indeks <strong>Baris (Bandung=1)</strong> dan <strong>Kolom (Semarang=2)</strong> pada Array 2 Dimensi secara tepat.
            </p>
        </div>


        {{-- ========================================== --}}
        {{-- BLOK AKTIVITAS UTAMA 2.3 (TERKUNCI SECARA DEFAULT) --}}
        {{-- ========================================== --}}
        <div id="main-activity-wrapper-23" class="mt-12 pt-8 border-t-[3px] border-dashed border-slate-200 dark:border-slate-700 transition-all duration-700 opacity-50 pointer-events-none relative">
            
            {{-- Pesan Terkunci --}}
            <div id="lock-message-23" class="absolute top-20 left-1/2 -translate-x-1/2 z-10 flex items-center justify-center w-full">
                <div class="bg-slate-800/90 dark:bg-slate-900/90 border border-slate-600 text-white text-sm px-6 py-3 rounded-full font-bold shadow-xl backdrop-blur-sm flex items-center gap-3">
                    <i class="fa-solid fa-lock text-slate-400"></i> Selesaikan "Coba Sendiri" untuk membuka aktivitas
                </div>
            </div>

            <div class="flex items-center gap-3 mb-8">
                <span class="bg-indigo-600 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider shadow-sm">Aktivitas 2.3</span>
                <h3 class="font-bold text-slate-900 dark:text-slate-100 text-xl">Uji Pemahaman Adjacency Matrix</h3>
            </div>

            {{-- SOAL 1: EKSTRAKSI MATRIKS --}}
            <div id="activity-23-1-container" class="mb-10 transition-opacity duration-500">
                <h4 class="font-bold text-slate-800 dark:text-slate-200 text-lg mb-3">1. Ekstraksi Data Jarak</h4>
                <div class="bg-indigo-50 dark:bg-indigo-900/20 border border-indigo-200 dark:border-indigo-800 rounded-xl p-6 mb-6 shadow-sm transition-colors">
                    <p class="text-sm text-indigo-900 dark:text-indigo-200 leading-relaxed text-justify mb-3">
                        <strong>Skenario:</strong> Anda adalah analis data logistik yang menggunakan matriks jarak tak berarah antar 3 kota besar. Keterangan Indeks: <strong>0</strong> = Jakarta, <strong>1</strong> = Bandung, <strong>2</strong> = Semarang.
                    </p>
                    <div class="bg-white/80 dark:bg-slate-800/80 p-4 rounded border border-indigo-200 dark:border-indigo-700 font-medium text-indigo-900 dark:text-indigo-300 text-sm shadow-sm leading-relaxed transition-colors">
                        <strong>Tugas Anda:</strong> Ganti tanda tanya (?) pada kode editor di bawah ini menggunakan <strong>indeks baris dan kolom yang tepat</strong> untuk melacak jarak dari <strong>Jakarta (Indeks 0)</strong> menuju <strong>Bandung (Indeks 1)</strong>!
                    </div>
                </div>

                <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 font-mono text-sm flex flex-col">
                    <div class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700 shrink-0">
                        <span class="text-slate-400 text-xs">Terminal Editor Pyodide</span>
                        <button onclick="window.runAktivitas23_1()" id="btnRun23_1" class="bg-indigo-600 hover:bg-indigo-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors flex items-center gap-2 shadow-sm active:scale-95">
                            Cek Jawaban
                        </button>
                    </div>
                    
                    <div class="p-6 leading-relaxed text-[#d4d4d4] overflow-x-auto whitespace-nowrap flex-1">
                        <div class="text-[#6a9955]"># Keterangan Indeks: 0 (Jakarta), 1 (Bandung), 2 (Semarang)</div>
                        <div><span class="text-[#9cdcfe]">matrix_kota</span> = [</div>
                        <div>&nbsp;&nbsp;&nbsp;&nbsp;[<span class="text-[#b5cea8]">0</span>, <span class="text-[#b5cea8]">150</span>, <span class="text-[#b5cea8]">400</span>],&nbsp;&nbsp;&nbsp;<span class="text-[#6a9955]"># Baris 0 (Jakarta)</span></div>
                        <div>&nbsp;&nbsp;&nbsp;&nbsp;[<span class="text-[#b5cea8]">150</span>, <span class="text-[#b5cea8]">0</span>, <span class="text-[#b5cea8]">250</span>],&nbsp;&nbsp;&nbsp;<span class="text-[#6a9955]"># Baris 1 (Bandung)</span></div>
                        <div>&nbsp;&nbsp;&nbsp;&nbsp;[<span class="text-[#b5cea8]">400</span>, <span class="text-[#b5cea8]">250</span>, <span class="text-[#b5cea8]">0</span>]&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-[#6a9955]"># Baris 2 (Semarang)</span></div>
                        <div class="mb-4">]</div>

                        <div class="text-[#6a9955]"># Instruksi: Ambil data Dari Jakarta (Baris 0) Ke Bandung (Kolom 1)</div>
                        <div class="flex items-center leading-none mt-1">
                            <span class="text-[#9cdcfe]">jarak_dicari</span> = <span class="text-[#9cdcfe]">matrix_kota</span>[<input type="text" id="input23_1_1" class="bg-[#3c3c3c] dark:bg-slate-700 text-[#b5cea8] border border-slate-600 dark:border-slate-500 rounded px-1.5 py-1 mx-0.5 w-10 outline-none focus:border-green-400 focus:bg-[#2d2d2d] text-center transition-colors shadow-inner font-bold font-mono text-sm leading-none" autocomplete="off" placeholder="?">][<input type="text" id="input23_1_2" class="bg-[#3c3c3c] dark:bg-slate-700 text-[#b5cea8] border border-slate-600 dark:border-slate-500 rounded px-1.5 py-1 mx-0.5 w-10 outline-none focus:border-green-400 focus:bg-[#2d2d2d] text-center transition-colors shadow-inner font-bold font-mono text-sm leading-none" autocomplete="off" placeholder="?">]
                        </div>
                        
                        <div class="mt-4 leading-loose leading-none"><span class="text-[#dcdcaa]">print</span>(<span class="text-[#ce9178]">"Jarak Jakarta ke Bandung:"</span>, <span class="text-[#9cdcfe]">jarak_dicari</span>, <span class="text-[#ce9178]">"KM"</span>)</div>
                    </div>

                    <div id="console-output-23-1" class="hidden border-t border-slate-700 bg-black p-5 text-xs font-mono shrink-0">
                        <span class="text-slate-400">> root@graflearn: python main.py</span><br>
                        <div id="console-text-23-1" class="mt-2 leading-relaxed"></div>
                    </div>
                </div>

                <div id="alert-23-1" class="hidden mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border transition-all text-center"></div>

                <div id="feedback-edukatif-23-1" class="hidden mt-4 bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-800 p-6 rounded-xl shadow-sm text-slate-800 dark:text-slate-200 text-sm leading-relaxed transition-all">
                    <h4 class="font-bold text-green-900 dark:text-green-400 mb-3 flex items-center gap-2 border-b border-green-200 dark:border-green-800 pb-2">
                        <i class="fa-solid fa-lightbulb text-yellow-500"></i> Pembahasan Evaluasi
                    </h4>
                    <ul class="list-disc pl-5 space-y-2 text-green-800 dark:text-green-200 text-justify">
                        <li>Instruksi meminta melacak rute dari <strong>Jakarta</strong> menuju <strong>Bandung</strong>.</li>
                        <li>Sesuai keterangan di graf dan komentar kode, kota <strong>Jakarta</strong> berada pada Baris indeks ke-<code class="bg-white dark:bg-slate-800 px-1.5 py-0.5 rounded text-indigo-700 dark:text-indigo-400 shadow-sm border border-slate-200 dark:border-slate-700 font-mono font-bold leading-none">0</code>, dan kota <strong>Bandung</strong> berada pada Kolom indeks ke-<code class="bg-white dark:bg-slate-800 px-1.5 py-0.5 rounded text-indigo-700 dark:text-indigo-400 shadow-sm border border-slate-200 dark:border-slate-700 font-mono font-bold leading-none">1</code>.</li>
                        <li>Sehingga, rumus ekstraksinya adalah <code class="bg-white dark:bg-slate-800 px-2 py-1 rounded text-green-700 dark:text-green-400 font-bold shadow-sm border border-slate-200 dark:border-slate-700 font-mono font-bold leading-none">matrix_kota[0][1]</code> yang menghasilkan nilai data 150 KM.</li>
                    </ul>
                </div>
            </div>

            {{-- SOAL 2: EFEK CERMIN (SIMETRIS) --}}
            <div id="activity-23-2-container" class="mb-10 opacity-50 pointer-events-none transition-opacity duration-500">
                <h4 class="font-bold text-slate-800 dark:text-slate-200 text-lg mb-3">2. Memanfaatkan Efek Cermin (Simetris)</h4>
                <div class="bg-indigo-50 dark:bg-indigo-900/20 border border-indigo-200 dark:border-indigo-800 rounded-xl p-6 mb-6 shadow-sm transition-colors">
                    <p class="text-sm text-indigo-900 dark:text-indigo-200 leading-relaxed text-justify mb-3">
                        <strong>Skenario:</strong> Pada graf jalan raya 2 arah, jarak pergi pasti sama dengan jarak pulang. Jika rute pergi dari Jakarta (0) ke Bandung (1) adalah <code>matrix_kota[0][1]</code>, carilah jarak sebaliknya.
                    </p>
                    <div class="bg-white/80 dark:bg-slate-800/80 p-4 rounded border border-indigo-200 dark:border-indigo-700 font-medium text-indigo-900 dark:text-indigo-300 text-sm shadow-sm leading-relaxed transition-colors">
                        <strong>Tugas Anda:</strong> Ekstrak jarak pulang dari <strong>Bandung (1)</strong> kembali ke <strong>Jakarta (0)</strong> menggunakan konsep Baris dan Kolom yang dibalik.
                    </div>
                </div>

                <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 font-mono text-sm flex flex-col">
                    <div class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700 shrink-0">
                        <span class="text-slate-400 text-xs">Terminal Editor Pyodide</span>
                        <button onclick="window.runAktivitas23_2()" id="btnRun23_2" class="bg-indigo-600 hover:bg-indigo-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors flex items-center gap-2 shadow-sm active:scale-95">
                            Cek Jawaban
                        </button>
                    </div>
                    
                    <div class="p-6 leading-relaxed text-[#d4d4d4] overflow-x-auto whitespace-nowrap flex-1">
                        <div><span class="text-[#9cdcfe]">matrix_kota</span> = [</div>
                        <div>&nbsp;&nbsp;&nbsp;&nbsp;[<span class="text-[#b5cea8]">0</span>, <span class="text-[#b5cea8]">150</span>, <span class="text-[#b5cea8]">400</span>],</div>
                        <div>&nbsp;&nbsp;&nbsp;&nbsp;[<span class="text-[#b5cea8]">150</span>, <span class="text-[#b5cea8]">0</span>, <span class="text-[#b5cea8]">250</span>],</div>
                        <div>&nbsp;&nbsp;&nbsp;&nbsp;[<span class="text-[#b5cea8]">400</span>, <span class="text-[#b5cea8]">250</span>, <span class="text-[#b5cea8]">0</span>]</div>
                        <div class="mb-4">]</div>

                        <div class="text-[#6a9955]"># Lacak jarak pulang dari Bandung (Indeks 1) ke Jakarta (Indeks 0)</div>
                        <div class="flex items-center leading-none mt-1">
                            <span class="text-[#9cdcfe]">jarak_pulang</span> = <span class="text-[#9cdcfe]">matrix_kota</span>[<input type="text" id="input23_2_1" class="bg-[#3c3c3c] dark:bg-slate-700 text-[#b5cea8] border border-slate-600 dark:border-slate-500 rounded px-1.5 py-1 mx-0.5 w-10 outline-none focus:border-green-400 focus:bg-[#2d2d2d] text-center transition-colors shadow-inner font-bold font-mono text-sm leading-none" autocomplete="off" placeholder="?">][<input type="text" id="input23_2_2" class="bg-[#3c3c3c] dark:bg-slate-700 text-[#b5cea8] border border-slate-600 dark:border-slate-500 rounded px-1.5 py-1 mx-0.5 w-10 outline-none focus:border-green-400 focus:bg-[#2d2d2d] text-center transition-colors shadow-inner font-bold font-mono text-sm leading-none" autocomplete="off" placeholder="?">]
                        </div>
                        
                        <div class="mt-4 leading-loose leading-none"><span class="text-[#dcdcaa]">print</span>(<span class="text-[#ce9178]">"Jarak pulang:"</span>, <span class="text-[#9cdcfe]">jarak_pulang</span>, <span class="text-[#ce9178]">"KM"</span>)</div>
                    </div>

                    <div id="console-output-23-2" class="hidden border-t border-slate-700 bg-black p-5 text-xs font-mono shrink-0">
                        <span class="text-slate-400">> root@graflearn: python main.py</span><br>
                        <div id="console-text-23-2" class="mt-2 leading-relaxed"></div>
                    </div>
                </div>

                <div id="alert-23-2" class="hidden mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border transition-all text-center"></div>

                <div id="feedback-edukatif-23-2" class="hidden mt-4 bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-800 p-6 rounded-xl shadow-sm text-slate-800 dark:text-slate-200 text-sm leading-relaxed transition-all">
                    <h4 class="font-bold text-green-900 dark:text-green-400 mb-3 border-b border-green-200 dark:border-green-800 pb-2">
                        Pembahasan Evaluasi
                    </h4>
                    <p class="text-sm text-green-800 dark:text-green-200 leading-relaxed text-justify">
                        Brilian! Anda telah membuktikan pemahaman tentang konsep 'Efek Cermin' (<em>Symmetric</em>) pada matriks Graf Tak Berarah. Jika rute berangkat (Jakarta ke Bandung) ada di koordinat <code>[0][1]</code>, maka rute pulangnya (Bandung ke Jakarta) pasti berada pada koordinat yang dibalik, yaitu <code>[1][0]</code>. Ini adalah properti matematika dasar dalam matriks graf!
                    </p>
                </div>
            </div>

            {{-- SOAL 3: MENGUBAH BOBOT MATRIX --}}
            <div id="activity-23-3-container" class="mb-4 opacity-50 pointer-events-none transition-opacity duration-500">
                <h4 class="font-bold text-slate-800 dark:text-slate-200 text-lg mb-3">3. Modifikasi Bobot Matriks</h4>
                <div class="bg-indigo-50 dark:bg-indigo-900/20 border border-indigo-200 dark:border-indigo-800 rounded-xl p-6 mb-6 shadow-sm transition-colors">
                    <p class="text-sm text-indigo-900 dark:text-indigo-200 leading-relaxed text-justify mb-3">
                        <strong>Skenario:</strong> Pemerintah baru saja meresmikan Tol Trans Jawa! Waktu tempuh dari Bandung (Indeks 1) ke Semarang (Indeks 2) yang tadinya 250 KM kini terpangkas menjadi 200 KM.
                    </p>
                    <div class="bg-white/80 dark:bg-slate-800/80 p-4 rounded border border-indigo-200 dark:border-indigo-700 font-medium text-indigo-900 dark:text-indigo-300 text-sm shadow-sm leading-relaxed transition-colors">
                        <strong>Tugas Anda:</strong> Timpa (ubah) nilai pada koordinat rute Bandung ke Semarang di dalam matriks tersebut dengan nilai (angka numerik) jalan pintas yang baru.
                    </div>
                </div>

                <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 font-mono text-sm flex flex-col">
                    <div class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700 shrink-0">
                        <span class="text-slate-400 text-xs">Terminal Editor Pyodide</span>
                        <button onclick="window.runAktivitas23_3()" id="btnRun23_3" class="bg-indigo-600 hover:bg-indigo-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors flex items-center gap-2 shadow-sm active:scale-95">
                            Cek Jawaban
                        </button>
                    </div>
                    
                    <div class="p-6 leading-relaxed text-[#d4d4d4] overflow-x-auto whitespace-nowrap flex-1">
                        <div class="text-[#6a9955]"># 0 (Jakarta), 1 (Bandung), 2 (Semarang)</div>
                        <div><span class="text-[#9cdcfe]">matrix_kota</span> = [</div>
                        <div>&nbsp;&nbsp;&nbsp;&nbsp;[<span class="text-[#b5cea8]">0</span>, <span class="text-[#b5cea8]">150</span>, <span class="text-[#b5cea8]">400</span>],</div>
                        <div>&nbsp;&nbsp;&nbsp;&nbsp;[<span class="text-[#b5cea8]">150</span>, <span class="text-[#b5cea8]">0</span>, <span class="text-[#b5cea8]">250</span>],</div>
                        <div>&nbsp;&nbsp;&nbsp;&nbsp;[<span class="text-[#b5cea8]">400</span>, <span class="text-[#b5cea8]">250</span>, <span class="text-[#b5cea8]">0</span>]</div>
                        <div class="mb-4">]</div>

                        <div class="text-[#6a9955]"># Update jarak Bandung -> Semarang menjadi 200 KM</div>
                        <div class="flex items-center leading-none mt-1">
                            <span class="text-[#9cdcfe]">matrix_kota</span>[<input type="text" id="input23_3_1" class="bg-[#3c3c3c] dark:bg-slate-700 text-[#b5cea8] border border-slate-600 dark:border-slate-500 rounded px-1.5 py-1 mx-0.5 w-10 outline-none focus:border-green-400 focus:bg-[#2d2d2d] text-center transition-colors shadow-inner font-bold font-mono text-sm leading-none" autocomplete="off" placeholder="?">][<input type="text" id="input23_3_2" class="bg-[#3c3c3c] dark:bg-slate-700 text-[#b5cea8] border border-slate-600 dark:border-slate-500 rounded px-1.5 py-1 mx-0.5 w-10 outline-none focus:border-green-400 focus:bg-[#2d2d2d] text-center transition-colors shadow-inner font-bold font-mono text-sm leading-none" autocomplete="off" placeholder="?">] = <input type="text" id="input23_3_3" class="bg-[#3c3c3c] dark:bg-slate-700 text-[#b5cea8] border border-slate-600 dark:border-slate-500 rounded px-1.5 py-1 mx-0.5 w-16 outline-none focus:border-green-400 focus:bg-[#2d2d2d] text-center transition-colors shadow-inner font-bold font-mono text-sm leading-none" autocomplete="off" placeholder="...">
                        </div>
                        
                        <div class="mt-4 leading-loose leading-none"><span class="text-[#dcdcaa]">print</span>(<span class="text-[#ce9178]">"Jarak baru Bandung-Semarang:"</span>, <span class="text-[#9cdcfe]">matrix_kota</span>[<span class="text-[#b5cea8]">1</span>][<span class="text-[#b5cea8]">2</span>], <span class="text-[#ce9178]">"KM"</span>)</div>
                    </div>

                    <div id="console-output-23-3" class="hidden border-t border-slate-700 bg-black p-5 text-xs font-mono shrink-0">
                        <span class="text-slate-400">> root@graflearn: python main.py</span><br>
                        <div id="console-text-23-3" class="mt-2 leading-relaxed"></div>
                    </div>
                </div>

                <div id="alert-23-3" class="hidden mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border transition-all text-center"></div>

                <div id="feedback-edukatif-23-3" class="hidden mt-4 bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-800 p-6 rounded-xl shadow-sm text-slate-800 dark:text-slate-200 text-sm leading-relaxed transition-all">
                    <h4 class="font-bold text-green-900 dark:text-green-400 mb-3 border-b border-green-200 dark:border-green-800 pb-2">
                        Pembahasan Evaluasi
                    </h4>
                    <p class="text-sm text-green-800 dark:text-green-200 leading-relaxed text-justify">
                        Eksekusi yang amat presisi! Representasi matriks 2 Dimensi tidak hanya digunakan untuk menyimpan status 'Terhubung/Tidak', tetapi sangat optimal untuk memanipulasi bobot angka (seperti jarak, waktu, atau biaya) secara instan. Perintah penugasan <code>=</code> langsung menimpa data lama (250) dengan rute jalan pintas yang baru (200).
                    </p>
                </div>
            </div>

        </div>

        {{-- Navigasi Bawah --}}
        <div class="flex justify-between gap-4 mt-12 pt-6 border-t border-slate-200 dark:border-slate-700">
            <button type="button" onclick="prevStep()" class="px-6 py-2.5 rounded-lg border border-slate-300 dark:border-slate-700 font-bold text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 transition shadow-sm active:scale-95">
                 Kembali
            </button>
            <button type="button" id="btnNext23" onclick="nextStep()" class="px-6 py-2.5 bg-slate-900 dark:bg-slate-700 hover:bg-slate-800 dark:hover:bg-slate-600 text-white font-bold rounded-lg shadow-md transition-all active:scale-95 opacity-50 cursor-not-allowed" disabled>
                Lanjut
            </button>
        </div>

    </div>

    {{-- SCRIPT KHUSUS STEP 2.3 --}}
    <script>
        // ==========================================
        // FUNGSI AUTO RESIZE EDITOR (DIPERBAIKI)
        // ==========================================
        window.autoResizeEditor23 = function(el) {
            if(!el) return;
            el.style.height = 'auto'; 
            if (el.scrollHeight > 0) {
                el.style.height = el.scrollHeight + 'px'; 
            } else {
                const lineCount = (el.value.match(/\n/g) || []).length + 1;
                el.style.height = (lineCount * 22 + 40) + 'px'; 
            }
            if(el.id === 'editor-sandbox-23') window.syncLineNumbers23();
        };

        window.syncLineNumbers23 = function() {
            const editor = document.getElementById('editor-sandbox-23');
            const lineNumEl = document.getElementById('line-numbers-23');
            if(!editor || !lineNumEl) return;

            lineNumEl.style.height = editor.style.height;
            const lines = editor.value.split('\n').length;
            let numHtml = '';
            for (let i = 1; i <= lines; i++) {
                numHtml += `<div>${i}</div>`;
            }
            lineNumEl.innerHTML = numHtml;
        }

        window.gl_net_matrix_23 = null;
        window.gl_net_matrix_uw_23 = null;

        document.addEventListener("DOMContentLoaded", function() {
            
            const editor23 = document.getElementById('editor-sandbox-23');
            if(editor23) {
                editor23.addEventListener('input', window.syncLineNumbers23);
            }

            // ==========================================
            // 1A. INIT GRAF UNWEIGHTED (TAK BERBOBOT)
            // ==========================================
            const containerMatrixUW = document.getElementById('vis_matrix_uw_23');
            const infoMatrixUW = document.getElementById('info-matrix-uw-23');
            
            const nodesUW = new vis.DataSet([
                { id: 0, label: '0\n(Simpul A)', x: -150, y: 0, color: { background: '#3b82f6', border: '#2563eb' }, font: { color: 'white', size: 14, bold: true, face: 'Arial' }, shape: 'circle', margin: 12, fixed: true },
                { id: 1, label: '1\n(Simpul B)', x: 0, y: 0, color: { background: '#8b5cf6', border: '#7c3aed' }, font: { color: 'white', size: 14, bold: true, face: 'Arial' }, shape: 'circle', margin: 12, fixed: true },
                { id: 2, label: '2\n(Simpul C)', x: 150, y: 0, color: { background: '#f59e0b', border: '#d97706' }, font: { color: 'white', size: 14, bold: true, face: 'Arial' }, shape: 'circle', margin: 12, fixed: true }
            ]);

            const edgesUW = new vis.DataSet([
                { id: 'e_uw_0_1', from: 0, to: 1, color: { color: '#94a3b8', highlight: '#60a5fa', hover: '#60a5fa' }, width: 3, selectionWidth: 2, hoverWidth: 2 },
                { id: 'e_uw_1_2', from: 1, to: 2, color: { color: '#94a3b8', highlight: '#60a5fa', hover: '#60a5fa' }, width: 3, selectionWidth: 2, hoverWidth: 2 }
            ]);

            const optionsMatrixUW = {
                physics: false,
                interaction: { dragNodes: false, dragView: false, zoomView: false, hover: true, selectable: true, multiselect: false },
                nodes: { borderWidth: 2 },
                edges: { smooth: { enabled: false } },
                layout: { randomSeed: 2 }
            };

            if(containerMatrixUW) {
                window.gl_net_matrix_uw_23 = new vis.Network(containerMatrixUW, { nodes: nodesUW, edges: edgesUW }, optionsMatrixUW);
                
                window.gl_net_matrix_uw_23.on("click", function (params) {
                    const baseResetClass = "p-2 transition-all duration-300 border border-slate-300 dark:border-slate-600 z-0";
                    const classVal = `${baseResetClass} text-blue-700 dark:text-blue-300 font-bold bg-blue-50 dark:bg-slate-800`;
                    const classZero = `${baseResetClass} text-slate-400 dark:text-slate-500 font-normal bg-white dark:bg-slate-900`;
                    
                    document.getElementById('cell-uw-0-0').className = classZero;
                    document.getElementById('cell-uw-0-1').className = classVal;
                    document.getElementById('cell-uw-0-2').className = classZero;
                    
                    document.getElementById('cell-uw-1-0').className = classVal;
                    document.getElementById('cell-uw-1-1').className = classZero;
                    document.getElementById('cell-uw-1-2').className = classVal;
                    
                    document.getElementById('cell-uw-2-0').className = classZero;
                    document.getElementById('cell-uw-2-1').className = classVal;
                    document.getElementById('cell-uw-2-2').className = classZero;

                    if (params.edges.length > 0 && params.nodes.length === 0) { 
                        const edgeId = params.edges[0];
                        const edgeData = edgesUW.get(edgeId);
                        
                        const cell1 = document.getElementById(`cell-uw-${edgeData.from}-${edgeData.to}`);
                        const cell2 = document.getElementById(`cell-uw-${edgeData.to}-${edgeData.from}`);
                        
                        const highlightClassUW = "p-2 transition-all duration-300 border-2 border-blue-500 dark:border-blue-400 bg-blue-200 dark:bg-blue-900 text-blue-900 dark:text-white font-black scale-105 shadow-md relative z-10";

                        if(cell1) cell1.className = highlightClassUW;
                        if(cell2) cell2.className = highlightClassUW;

                        infoMatrixUW.innerHTML = `Garis dipilih. Nilai <strong class="text-blue-700 dark:text-blue-300">1 (Tersambung)</strong> dicatat simetris pada sel <code class="bg-white dark:bg-slate-800 px-1.5 py-0.5 border border-blue-200 dark:border-blue-700 rounded text-blue-700 dark:text-blue-300 font-mono font-bold shadow-sm leading-none z-0">[${edgeData.from}][${edgeData.to}]</code> & <code class="bg-white dark:bg-slate-800 px-1.5 py-0.5 border border-blue-200 dark:border-blue-700 rounded text-blue-700 dark:text-blue-300 font-mono font-bold shadow-sm leading-none z-0">[${edgeData.to}][${edgeData.from}]</code>.`;
                        infoMatrixUW.className = "mt-4 text-[11px] text-center text-blue-900 dark:text-blue-100 bg-blue-50 dark:bg-blue-950/40 border-blue-200 dark:border-blue-700 px-3 py-2 rounded border font-medium h-[46px] flex items-center justify-center shadow-inner transition-colors z-0";

                    } else {
                        window.gl_net_matrix_uw_23.unselectAll(); 
                        infoMatrixUW.innerHTML = '<em>Pilih murni pada <strong>garis (sisi)</strong> di graf untuk melihat letak data.</em>';
                        infoMatrixUW.className = "mt-4 text-[11px] text-center text-slate-500 dark:text-slate-400 bg-slate-100 dark:bg-slate-800 px-3 py-2 rounded border border-slate-200 dark:border-slate-700 h-[46px] flex items-center justify-center transition-colors shadow-inner z-0";
                    }
                });

                window.gl_net_matrix_uw_23.on("hoverEdge", function () { containerMatrixUW.classList.add('cursor-pointer'); });
                window.gl_net_matrix_uw_23.on("blurEdge", function () { containerMatrixUW.classList.remove('cursor-pointer'); });
            }

            // ==========================================
            // 1B. INIT GRAF WEIGHTED (BERBOBOT KM)
            // ==========================================
            const containerMatrix = document.getElementById('vis_matrix_23');
            const infoMatrix = document.getElementById('info-matrix-23');
            
            const nodesW = new vis.DataSet([
                { id: 0, label: '0\n(Jakarta)', x: -160, y: 0, color: { background: '#3b82f6', border: '#2563eb' }, font: { color: 'white', size: 14, bold: true, face: 'Arial' }, shape: 'circle', margin: 12, fixed: true },
                { id: 1, label: '1\n(Bandung)', x: 0, y: 0, color: { background: '#10b981', border: '#059669' }, font: { color: 'white', size: 14, bold: true, face: 'Arial' }, shape: 'circle', margin: 12, fixed: true },
                { id: 2, label: '2\n(Semarang)', x: 160, y: 0, color: { background: '#f59e0b', border: '#d97706' }, font: { color: 'white', size: 14, bold: true, face: 'Arial' }, shape: 'circle', margin: 12, fixed: true }
            ]);

            const edgesW = new vis.DataSet([
                { id: 'e_0_1', from: 0, to: 1, label: '150 KM', font: { align: 'top', size: 13, color: '#a5b4fc', bold: true, face: 'Arial' }, color: { color: '#94a3b8', highlight: '#fbbf24', hover: '#fbbf24' }, width: 3, selectionWidth: 2, hoverWidth: 2 },
                { id: 'e_1_2', from: 1, to: 2, label: '250 KM', font: { align: 'top', size: 13, color: '#a5b4fc', bold: true, face: 'Arial' }, color: { color: '#94a3b8', highlight: '#fbbf24', hover: '#fbbf24' }, width: 3, selectionWidth: 2, hoverWidth: 2 }
            ]);

            if(containerMatrix) {
                window.gl_net_matrix_23 = new vis.Network(containerMatrix, { nodes: nodesW, edges: edgesW }, optionsMatrixUW);
                
                infoMatrix.innerHTML = '<em>Pilih murni pada <strong>garis (sisi) KM</strong> di graf untuk melihat letak data.</em>';

                window.gl_net_matrix_23.on("click", function (params) {
                    const baseResetClass = "p-2 transition-all duration-300 border border-slate-300 dark:border-slate-600 leading-tight z-0";
                    const classValW = `${baseResetClass} text-slate-800 dark:text-slate-200 font-bold bg-amber-50 dark:bg-slate-800`;
                    const classZeroW = `${baseResetClass} text-slate-400 dark:text-slate-500 font-normal bg-white dark:bg-slate-900`;
                    
                    document.getElementById('cell-0-0').className = classZeroW;
                    document.getElementById('cell-0-1').className = classValW;
                    document.getElementById('cell-0-2').className = classZeroW;
                    
                    document.getElementById('cell-1-0').className = classValW;
                    document.getElementById('cell-1-1').className = classZeroW;
                    document.getElementById('cell-1-2').className = classValW;
                    
                    document.getElementById('cell-2-0').className = classZeroW;
                    document.getElementById('cell-2-1').className = classValW;
                    document.getElementById('cell-2-2').className = classZeroW;

                    if (params.edges.length > 0 && params.nodes.length === 0) { 
                        const edgeId = params.edges[0];
                        const edgeData = edgesW.get(edgeId);
                        
                        const cell1 = document.getElementById(`cell-${edgeData.from}-${edgeData.to}`);
                        const cell2 = document.getElementById(`cell-${edgeData.to}-${edgeData.from}`);
                        
                        const highlightClassW = "p-2 transition-all duration-300 border-2 border-amber-500 dark:border-amber-400 bg-amber-200 dark:bg-amber-900 text-amber-900 dark:text-white font-black scale-105 shadow-md relative z-10 leading-tight";

                        if(cell1) cell1.className = highlightClassW;
                        if(cell2) cell2.className = highlightClassW;

                        infoMatrix.innerHTML = `Garis dipilih. Jarak <strong class="text-amber-700 dark:text-amber-300">${edgeData.label}</strong> disimpan simetris pada sel <code class="bg-white dark:bg-slate-800 px-1.5 py-0.5 border border-amber-200 dark:border-amber-700 rounded text-amber-700 dark:text-amber-300 font-mono font-bold shadow-sm leading-none z-0">[${edgeData.from}][${edgeData.to}]</code> & <code class="bg-white dark:bg-slate-800 px-1.5 py-0.5 border border-amber-200 dark:border-amber-700 rounded text-amber-700 dark:text-amber-300 font-mono font-bold shadow-sm leading-none z-0">[${edgeData.to}][${edgeData.from}]</code>.`;
                        infoMatrix.className = "mt-4 text-[11px] text-center text-amber-950 dark:text-amber-100 bg-amber-100 dark:bg-amber-950/40 border-amber-300 dark:border-amber-700 px-3 py-2 rounded border font-medium h-[46px] flex items-center justify-center shadow-inner transition-colors z-0";

                    } else {
                        window.gl_net_matrix_23.unselectAll(); 
                        infoMatrix.innerHTML = '<em>Pilih murni pada <strong>garis (sisi) KM</strong> di graf untuk melihat letak data.</em>';
                        infoMatrix.className = "mt-4 text-[11px] text-center text-slate-500 dark:text-slate-400 bg-slate-100 dark:bg-slate-800 px-3 py-2 rounded border border-slate-200 dark:border-slate-700 h-[46px] flex items-center justify-center transition-colors shadow-inner z-0";
                    }
                });

                window.gl_net_matrix_23.on("hoverEdge", function () { containerMatrix.classList.add('cursor-pointer'); });
                window.gl_net_matrix_23.on("blurEdge", function () { containerMatrix.classList.remove('cursor-pointer'); });
            }

            const resizeObserverMatrix = new ResizeObserver(() => {
                if (containerMatrixUW && containerMatrixUW.offsetWidth > 0 && window.gl_net_matrix_uw_23) {
                    window.gl_net_matrix_uw_23.redraw();
                    window.gl_net_matrix_uw_23.fit({ animation: false });
                }
                if (containerMatrix && containerMatrix.offsetWidth > 0 && window.gl_net_matrix_23) {
                    window.gl_net_matrix_23.redraw();
                    window.gl_net_matrix_23.fit({ animation: false });
                }
            });
            if(containerMatrixUW) resizeObserverMatrix.observe(containerMatrixUW);
            if(containerMatrix) resizeObserverMatrix.observe(containerMatrix);


            // ==========================================
            // 2. CEK PERSISTENCE SANDBOX & AKTIVITAS
            // ==========================================
            const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
            const savedSandboxCode = localStorage.getItem('sandbox_2_3_code_' + userId);
            
            const defaultCode23 = `# 1. Matriks Tak Berbobot (Nilai 0 dan 1)
matrix_tak_berbobot = [
    [0, 1, 0],  # Baris 0 (Simpul A)
    [1, 0, 1],  # Baris 1 (Simpul B)
    [0, 1, 0]   # Baris 2 (Simpul C)
]

# 2. Matriks Berbobot (Jarak dalam KM)
matrix_bobot = [
    [0, 150, 0],  # Baris 0 (Jakarta)
    [150, 0, 250],  # Baris 1 (Bandung)
    [0, 250, 0]   # Baris 2 (Semarang)
]

# Mengekstrak jarak Bandung (Baris 1) ke Semarang (Kolom 2)
jarak = matrix_bobot[1][2]
print("Jarak dari Bandung ke Semarang adalah:", jarak, "KM")`;

            // BUKA GEMBOK UTAMA JIKA SANDBOX SUDAH SELESAI
            if(localStorage.getItem('sandbox_2_3_done_' + userId) === 'true') {
                const editor = document.getElementById('editor-sandbox-23');
                if(savedSandboxCode && editor) {
                    editor.value = savedSandboxCode;
                } else if(editor) {
                    editor.value = defaultCode23;
                }
                window.renderHasilSandbox23(false);
                setTimeout(() => window.autoResizeEditor23(editor), 100);
            } else {
                const editor = document.getElementById('editor-sandbox-23');
                if(editor) editor.value = defaultCode23;
                setTimeout(() => window.autoResizeEditor23(editor), 100);
            }

            const isDoneServer = {{ isset($progress['2.3']) && $progress['2.3']->score == 100 ? 'true' : 'false' }};
            const isDoneLocal1 = localStorage.getItem('act_2_3_1_done_user_' + userId) === 'true';
            const isDoneLocal2 = localStorage.getItem('act_2_3_2_done_user_' + userId) === 'true';
            const isDoneLocal3 = localStorage.getItem('act_2_3_3_done_user_' + userId) === 'true';

            if(isDoneServer || isDoneLocal1) window.kunciJawaban23_1();
            if(isDoneServer || isDoneLocal2) window.kunciJawaban23_2();
            if(isDoneServer || isDoneLocal3) window.kunciJawaban23_3();
        });

        // ==========================================
        // FUNGSI 1: VALIDASI SANDBOX 2.3
        // ==========================================
        window.runSandbox23 = function() {
            const editor = document.getElementById('editor-sandbox-23');
            const code = editor.value; 
            const consoleBox = document.getElementById('console-sandbox-23');
            const outputText = document.getElementById('sandbox-output-text-23'); 
            const btnRunSandbox = document.getElementById('btnRunSandbox-23');

            consoleBox.classList.remove('hidden');

            if(code.trim() === "") {
                outputText.className = "text-[#ff5f56]"; 
                outputText.innerHTML = "SyntaxError: Editor masih kosong. Silakan ketik kodenya terlebih dahulu!";
                return;
            }

            const codeWithoutComments = code.replace(/#.*/g, '');
            const cleanCode = codeWithoutComments.replace(/\s+/g, '').replace(/'/g, '"');

            const hasMatrixStructure = cleanCode.includes('matrix_bobot=[') && cleanCode.includes('[0,150,0]') && cleanCode.includes('[150,0,250]') && cleanCode.includes('[0,250,0]');
            const hasExtraction = cleanCode.includes('matrix_bobot[1][2]');
            const hasPrint = cleanCode.includes('print(');

            if((hasMatrixStructure || cleanCode.includes('matrix_bobot=')) && hasExtraction && hasPrint) {
                outputText.className = "text-[#4af626]"; 
                outputText.innerHTML = "Jarak dari Bandung ke Semarang adalah: 250 KM";
                
                btnRunSandbox.innerHTML = '<i class="fa-solid fa-check"></i> Program Berhasil';
                btnRunSandbox.classList.replace('bg-indigo-600', 'bg-emerald-600');
                
                const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                localStorage.setItem('sandbox_2_3_done_' + userId, 'true');
                localStorage.setItem('sandbox_2_3_code_' + userId, code);

                window.renderHasilSandbox23(true);
            } else {
                outputText.className = "text-[#ffbd2e]"; 
                let errorMsg = "Program gagal dieksekusi atau belum lengkap.<br>";
                if(!hasMatrixStructure) errorMsg += "- Struktur matriks <code>matrix_bobot</code> Anda keliru. Pastikan nilainya persis seperti di contoh kode atas.<br>";
                if(!hasExtraction) errorMsg += "- Anda belum mengekstrak jarak Bandung ke Semarang menggunakan indeks <code>[1][2]</code>.<br>";
                if(!hasPrint) errorMsg += "- Anda belum memanggil perintah <code>print()</code>.<br>";
                
                outputText.innerHTML = errorMsg;
                btnRunSandbox.innerHTML = '<i class="fa-solid fa-rotate-right"></i> Coba Lagi';
            }
        }

        window.renderHasilSandbox23 = function(doScroll) {
            const explanationBox = document.getElementById('output-explanation-23');
            const actContainer = document.getElementById('main-activity-wrapper-23');
            const lockMsg = document.getElementById('lock-message-23');
            
            explanationBox.classList.remove('hidden');
            actContainer.classList.remove('opacity-50', 'pointer-events-none');
            if(lockMsg) lockMsg.style.display = 'none';
            
            if(doScroll) {
                setTimeout(() => { explanationBox.scrollIntoView({ behavior: 'smooth', block: 'center' }); }, 300);
            }
        }

        // ==========================================
        // FUNGSI 2: VALIDASI AKTIVITAS 1
        // ==========================================
        window.runAktivitas23_1 = function() {
            let input1Raw = document.getElementById('input23_1_1').value.trim();
            let input2Raw = document.getElementById('input23_1_2').value.trim();
            
            const alertBox = document.getElementById('alert-23-1');
            const consoleBox = document.getElementById('console-output-23-1');
            const consoleText = document.getElementById('console-text-23-1');

            alertBox.classList.add('hidden');
            consoleBox.classList.add('hidden');

            if(input1Raw === "" || input2Raw === "") {
                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-yellow-50 dark:bg-yellow-950/40 text-yellow-800 dark:text-yellow-200 border-yellow-200 dark:border-yellow-700 text-center";
                alertBox.innerHTML = "<i class='fa-solid fa-triangle-exclamation mr-1'></i> Error: Indeks baris dan kolom tidak boleh kosong. Silakan isi dengan angka indeks yang tepat.";
                alertBox.classList.remove('hidden');
                return;
            }

            if(input1Raw === "0" && input2Raw === "1") {
                const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                localStorage.setItem('act_2_3_1_done_user_' + userId, 'true');

                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-green-50 dark:bg-green-950/40 text-green-800 dark:text-green-200 border-green-400 dark:border-green-700 text-center";
                alertBox.innerHTML = "<i class='fa-solid fa-check-circle mr-1'></i> Analisis Tepat! Anda berhasil mengekstrak jarak Jakarta (Baris 0) ke Bandung (Kolom 1).";
                alertBox.classList.remove('hidden');

                consoleBox.classList.remove('hidden');
                consoleText.className = "mt-2 text-[#4af626]";
                consoleText.innerHTML = "Jarak Jakarta ke Bandung: 150 KM";

                window.kunciJawaban23_1();

            } else if (input1Raw === "1" && input2Raw === "0") {
                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-red-50 dark:bg-red-950/40 text-red-800 dark:text-red-200 border-red-300 dark:border-red-700 animate-pulse text-center";
                alertBox.innerHTML = "<i class='fa-solid fa-circle-xmark mr-1'></i> Logika Terbalik: Angka 150 KM memang benar, tetapi kode Anda `[1][0]` itu artinya membaca dari Bandung menuju Jakarta. Instruksi meminta Jakarta ke Bandung.";
                alertBox.classList.remove('hidden');
                consoleBox.classList.remove('hidden');
                consoleText.className = "mt-2 text-[#ffbd2e]";
                consoleText.innerHTML = `Jarak Jakarta ke Bandung: 150 KM<br>Peringatan: Arah pembacaan matriks terbalik (Baris 1, Kolom 0)!`;
                
            } else if ((input1Raw === "0" && input2Raw === "2") || (input1Raw === "2" && input2Raw === "0")) {
                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-red-50 dark:bg-red-950/40 text-red-800 dark:text-red-200 border-red-300 dark:border-red-700 animate-pulse text-center";
                alertBox.innerHTML = "<i class='fa-solid fa-circle-xmark mr-1'></i> Rute Keliru: Anda malah mengekstrak jarak antara Jakarta dan Semarang (Indeks 2). Cek kembali indeks kota Bandung.";
                alertBox.classList.remove('hidden');
                consoleBox.classList.remove('hidden');
                consoleText.className = "mt-2 text-[#ff5f56]";
                consoleText.innerHTML = `Jarak Jakarta ke Bandung: 400 KM<br>Peringatan: Data yang diambil adalah jarak ke Semarang!`;
                
            } else {
                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-red-50 dark:bg-red-950/40 text-red-800 dark:text-red-200 border-red-300 dark:border-red-700 text-center";
                alertBox.innerHTML = `<i class='fa-solid fa-circle-xmark mr-1'></i> IndexError: Indeks matriks \`[${input1Raw}][${input2Raw}]\` tidak menghasilkan rute yang tepat, atau berada di luar batas. Ingat, Jakarta adalah indeks 0 dan Bandung indeks 1.`;
                alertBox.classList.remove('hidden');
                consoleBox.classList.remove('hidden');
                consoleText.className = "mt-2 text-[#ff5f56]";
                consoleText.innerHTML = `Traceback (most recent call last):<br>IndexError: list index out of range atau salah sasaran.`;
            }
        }

        // ==========================================
        // FUNGSI 3: VALIDASI AKTIVITAS 2
        // ==========================================
        window.runAktivitas23_2 = function() {
            let input1Raw = document.getElementById('input23_2_1').value.trim();
            let input2Raw = document.getElementById('input23_2_2').value.trim();
            
            const alertBox = document.getElementById('alert-23-2');
            const consoleBox = document.getElementById('console-output-23-2');
            const consoleText = document.getElementById('console-text-23-2');

            alertBox.classList.add('hidden');
            consoleBox.classList.add('hidden');

            if(input1Raw === "" || input2Raw === "") {
                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-yellow-50 dark:bg-yellow-950/40 text-yellow-800 dark:text-yellow-200 border-yellow-200 dark:border-yellow-700 text-center";
                alertBox.innerHTML = "<i class='fa-solid fa-triangle-exclamation mr-1'></i> Error: Indeks baris dan kolom tidak boleh kosong.";
                alertBox.classList.remove('hidden');
                return;
            }

            if(input1Raw === "1" && input2Raw === "0") {
                const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                localStorage.setItem('act_2_3_2_done_user_' + userId, 'true');

                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-green-50 dark:bg-green-950/40 text-green-800 dark:text-green-200 border-green-400 dark:border-green-700 text-center";
                alertBox.innerHTML = "<i class='fa-solid fa-check-circle mr-1'></i> Tepat sekali! Jarak pulang Bandung ke Jakarta dibaca menggunakan Baris 1 (Bandung) dan Kolom 0 (Jakarta).";
                alertBox.classList.remove('hidden');

                consoleBox.classList.remove('hidden');
                consoleText.className = "mt-2 text-[#4af626]";
                consoleText.innerHTML = "Jarak pulang: 150 KM";

                window.kunciJawaban23_2();

            } else {
                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-red-50 dark:bg-red-950/40 text-red-800 dark:text-red-200 border-red-300 dark:border-red-700 animate-pulse text-center";
                alertBox.innerHTML = "<i class='fa-solid fa-circle-xmark mr-1'></i> Logika Keliru: Pastikan Anda membalik indeks rute berangkatnya. Jarak pulangnya harus dari Bandung (Indeks 1) ke Jakarta (Indeks 0).";
                alertBox.classList.remove('hidden');
                consoleBox.classList.remove('hidden');
                consoleText.className = "mt-2 text-[#ff5f56]";
                consoleText.innerHTML = `Traceback (most recent call last):<br>IndexError atau Pemilihan Titik Salah.`;
            }
        }

        // ==========================================
        // FUNGSI 4: VALIDASI AKTIVITAS 3
        // ==========================================
        window.runAktivitas23_3 = function() {
            let input1Raw = document.getElementById('input23_3_1').value.trim();
            let input2Raw = document.getElementById('input23_3_2').value.trim();
            let input3Raw = document.getElementById('input23_3_3').value.trim();
            
            const alertBox = document.getElementById('alert-23-3');
            const consoleBox = document.getElementById('console-output-23-3');
            const consoleText = document.getElementById('console-text-23-3');

            alertBox.classList.add('hidden');
            consoleBox.classList.add('hidden');

            if(input1Raw === "" || input2Raw === "" || input3Raw === "") {
                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-yellow-50 dark:bg-yellow-950/40 text-yellow-800 dark:text-yellow-200 border-yellow-200 dark:border-yellow-700 text-center";
                alertBox.innerHTML = "<i class='fa-solid fa-triangle-exclamation mr-1'></i> Error: Semua isian wajib dilengkapi. Termasuk nilai rute barunya.";
                alertBox.classList.remove('hidden');
                return;
            }

            if(input1Raw === "1" && input2Raw === "2" && input3Raw === "200") {
                const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                localStorage.setItem('act_2_3_3_done_user_' + userId, 'true');

                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-green-50 dark:bg-green-950/40 text-green-800 dark:text-green-200 border-green-400 dark:border-green-700 text-center";
                alertBox.innerHTML = "<i class='fa-solid fa-check-circle mr-1'></i> Sempurna! Anda berhasil menimpa (mengupdate) nilai rute lama dengan jarak pintas yang baru.";
                alertBox.classList.remove('hidden');

                consoleBox.classList.remove('hidden');
                consoleText.className = "mt-2 text-[#4af626]";
                consoleText.innerHTML = "Jarak baru Bandung-Semarang: 200 KM";

                window.kunciJawaban23_3();

                // BARU DI-SAVE PROGRESS SAAT SEMUA AKTIVITAS SELESAI
                fetch("{{ route('submit.score') }}", { 
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        chapter: "bab2",
                        section: "2.3",
                        score: 100,
                        answer: "Berhasil Live Coding 2.3 (Full)"
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
                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-red-50 dark:bg-red-950/40 text-red-800 dark:text-red-200 border-red-300 dark:border-red-700 animate-pulse text-center";
                alertBox.innerHTML = "<i class='fa-solid fa-circle-xmark mr-1'></i> SyntaxError: Terdapat kesalahan. Pastikan urutan baris, kolom, dan angka nilai barunya (200) terisi dengan tepat.";
                alertBox.classList.remove('hidden');
                consoleBox.classList.remove('hidden');
                consoleText.className = "mt-2 text-[#ff5f56]";
                consoleText.innerHTML = `Traceback (most recent call last):<br>Peringatan: Assignment gagal.`;
            }
        }


        // ==========================================
        // FUNGSI UNLOCK & KUNCI JAWABAN
        // ==========================================
        window.kunciJawaban23_1 = function() {
            const in1 = document.getElementById('input23_1_1');
            const in2 = document.getElementById('input23_1_2');

            if(in1) {
                in1.value = "0";
                in1.disabled = true;
                in1.classList.remove('bg-[#3c3c3c]', 'dark:bg-slate-700', 'text-[#b5cea8]', 'border-slate-600', 'dark:border-slate-500');
                in1.classList.add('bg-emerald-600', 'text-white', 'border-emerald-500', 'cursor-not-allowed', 'shadow-inner');
            }
            if(in2) {
                in2.value = "1";
                in2.disabled = true;
                in2.classList.remove('bg-[#3c3c3c]', 'dark:bg-slate-700', 'text-[#b5cea8]', 'border-slate-600', 'dark:border-slate-500');
                in2.classList.add('bg-emerald-600', 'text-white', 'border-emerald-500', 'cursor-not-allowed', 'shadow-inner');
            }

            const btnRunAct = document.getElementById('btnRun23_1');
            if(btnRunAct) {
                btnRunAct.innerHTML = '<i class="fa-solid fa-check"></i> Diselesaikan';
                btnRunAct.classList.replace('bg-indigo-600', 'bg-slate-600');
                btnRunAct.classList.replace('hover:bg-indigo-500', 'cursor-not-allowed');
                btnRunAct.disabled = true;
            }

            document.getElementById('feedback-edukatif-23-1').classList.remove('hidden');
            
            // UNLOCK ACTIVITY 2
            document.getElementById('activity-23-2-container').classList.remove('opacity-50', 'pointer-events-none');
        }

        window.kunciJawaban23_2 = function() {
            const in1 = document.getElementById('input23_2_1');
            const in2 = document.getElementById('input23_2_2');

            if(in1) {
                in1.value = "1";
                in1.disabled = true;
                in1.classList.remove('bg-[#3c3c3c]', 'dark:bg-slate-700', 'text-[#b5cea8]', 'border-slate-600', 'dark:border-slate-500');
                in1.classList.add('bg-emerald-600', 'text-white', 'border-emerald-500', 'cursor-not-allowed', 'shadow-inner');
            }
            if(in2) {
                in2.value = "0";
                in2.disabled = true;
                in2.classList.remove('bg-[#3c3c3c]', 'dark:bg-slate-700', 'text-[#b5cea8]', 'border-slate-600', 'dark:border-slate-500');
                in2.classList.add('bg-emerald-600', 'text-white', 'border-emerald-500', 'cursor-not-allowed', 'shadow-inner');
            }

            const btnRunAct = document.getElementById('btnRun23_2');
            if(btnRunAct) {
                btnRunAct.innerHTML = '<i class="fa-solid fa-check"></i> Diselesaikan';
                btnRunAct.classList.replace('bg-indigo-600', 'bg-slate-600');
                btnRunAct.classList.replace('hover:bg-indigo-500', 'cursor-not-allowed');
                btnRunAct.disabled = true;
            }

            document.getElementById('feedback-edukatif-23-2').classList.remove('hidden');

            // UNLOCK ACTIVITY 3
            document.getElementById('activity-23-3-container').classList.remove('opacity-50', 'pointer-events-none');
        }

        window.kunciJawaban23_3 = function() {
            const in1 = document.getElementById('input23_3_1');
            const in2 = document.getElementById('input23_3_2');
            const in3 = document.getElementById('input23_3_3');

            if(in1) {
                in1.value = "1";
                in1.disabled = true;
                in1.classList.remove('bg-[#3c3c3c]', 'dark:bg-slate-700', 'text-[#b5cea8]', 'border-slate-600', 'dark:border-slate-500');
                in1.classList.add('bg-emerald-600', 'text-white', 'border-emerald-500', 'cursor-not-allowed', 'shadow-inner');
            }
            if(in2) {
                in2.value = "2";
                in2.disabled = true;
                in2.classList.remove('bg-[#3c3c3c]', 'dark:bg-slate-700', 'text-[#b5cea8]', 'border-slate-600', 'dark:border-slate-500');
                in2.classList.add('bg-emerald-600', 'text-white', 'border-emerald-500', 'cursor-not-allowed', 'shadow-inner');
            }
            if(in3) {
                in3.value = "200";
                in3.disabled = true;
                in3.classList.remove('bg-[#3c3c3c]', 'dark:bg-slate-700', 'text-[#b5cea8]', 'border-slate-600', 'dark:border-slate-500');
                in3.classList.add('bg-emerald-600', 'text-white', 'border-emerald-500', 'cursor-not-allowed', 'shadow-inner');
            }

            const btnRunAct = document.getElementById('btnRun23_3');
            if(btnRunAct) {
                btnRunAct.innerHTML = '<i class="fa-solid fa-check"></i> Diselesaikan';
                btnRunAct.classList.replace('bg-indigo-600', 'bg-slate-600');
                btnRunAct.classList.replace('hover:bg-indigo-500', 'cursor-not-allowed');
                btnRunAct.disabled = true;
            }

            document.getElementById('feedback-edukatif-23-3').classList.remove('hidden');

            // UNLOCK NEXT BUTTON
            const btnNext = document.getElementById('btnNext23');
            if(btnNext) {
                btnNext.disabled = false;
                btnNext.classList.remove('opacity-50', 'cursor-not-allowed');
            }
        }
    </script>
</section>