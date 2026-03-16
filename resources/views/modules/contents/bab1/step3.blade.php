<section id="step-3" class="step-slide">
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-10 -mt-8">

        {{-- Header Materi --}}
        <div class="border-b border-slate-200 pb-6 mb-8">
            <h2 class="text-3xl font-bold text-slate-900 mb-2">1.3 Jenis-Jenis Karakteristik Graf</h2>
            <p class="text-slate-500 font-medium">Klasifikasi graf berdasarkan orientasi arah dan bobot/nilai.</p>
        </div>

        {{-- Pengantar Materi --}}
        <div class="mb-10 text-slate-700 leading-relaxed space-y-4 text-justify">
            <p>
                Setelah menganalisis komponen dasar graf (simpul, sisi, dan derajat), Anda juga perlu memahami bahwa graf memiliki variasi struktur berdasarkan karakteristik sisi (<em>edge</em>) yang menghubungkannya. Memahami variasi ini sangat krusial bagi seorang <em>engineer</em> untuk menentukan struktur data dan algoritma mana yang paling efisien untuk sebuah studi kasus.
            </p>
            <p>
                Secara fundamental, graf diklasifikasikan ke dalam dua kategori utama: berdasarkan orientasi arah dan berdasarkan nilai (bobot).
            </p>
        </div>

        {{-- ======================================================== --}}
        {{-- BAGIAN A: ORIENTASI ARAH --}}
        {{-- ======================================================== --}}
        <div class="mb-12">
            <h3 class="text-xl font-bold text-slate-900 mb-4 border-b-2 border-blue-500 inline-block pb-1">A. Berdasarkan Orientasi Arah (Konektivitas)</h3>
            <p class="text-slate-700 leading-relaxed mb-6 text-justify">
                Dalam merepresentasikan relasi dunia nyata, tidak semua hubungan bersifat timbal balik. Hal ini melahirkan dua jenis graf:
            </p>

            <div class="grid md:grid-cols-2 gap-6 mb-8">
                <div class="bg-slate-50 border border-slate-200 p-5 rounded-xl shadow-sm">
                    <h4 class="font-bold text-slate-900 mb-2 flex items-center gap-2"><span class="w-6 h-6 bg-blue-600 text-white rounded-full flex items-center justify-center text-xs">1</span> Graf Tak Berarah (Undirected Graph)</h4>
                    <p class="text-sm text-slate-700 mb-3 text-justify">Sisi yang menghubungkan antar simpul tidak memiliki orientasi arah (digambarkan dengan garis lurus biasa tanpa panah). Relasi bersifat dua arah (<em>bi-directional</em>).</p>
                    <div class="bg-white p-3 rounded border border-slate-200 text-sm text-slate-600">
                        <strong>💡 Analogi:</strong> Hubungan pertemanan (mutual) di Facebook. Jika Andi berteman dengan Budi, maka otomatis Budi berteman dengan Andi.
                    </div>
                </div>
                <div class="bg-slate-50 border border-slate-200 p-5 rounded-xl shadow-sm">
                    <h4 class="font-bold text-slate-900 mb-2 flex items-center gap-2"><span class="w-6 h-6 bg-blue-600 text-white rounded-full flex items-center justify-center text-xs">2</span> Graf Berarah (Directed Graph / Digraph)</h4>
                    <p class="text-sm text-slate-700 mb-3 text-justify">Sisi memiliki arah spesifik yang ditandai dengan anak panah. Relasi hanya berlaku searah sesuai penunjukan panah tersebut (<em>uni-directional</em>).</p>
                    <div class="bg-white p-3 rounded border border-slate-200 text-sm text-slate-600">
                        <strong>💡 Analogi:</strong> Sistem Follower di Instagram atau X. Andi bisa mengikuti (<em>follow</em>) Budi, tetapi Budi belum tentu mengikuti Andi kembali.
                    </div>
                </div>
            </div>

            {{-- INTERAKTIF A: GRAF ARAH --}}
            <div class="bg-blue-50 border border-blue-200 rounded-xl p-6 shadow-sm mb-6">
                <h4 class="font-bold text-blue-900 mb-3">Visualisasi Interaktif: Graf Berarah vs Tak Berarah</h4>
                <p class="text-sm text-blue-800 mb-4">
                    <strong>Tugas Eksplorasi:</strong> Cobalah simulasikan pengiriman paket data (<em>packet routing</em>) dengan <strong>mengklik secara berurutan dua simpul</strong> (Simpul Awal lalu Simpul Tujuan). Perhatikan pesan <em>error</em> atau <em>success</em> yang muncul!
                </p>

                <div class="flex flex-col md:flex-row gap-6">
                    <div class="flex-1">
                        <div id="vis-arah" class="w-full h-64 bg-white border border-slate-300 rounded-lg shadow-inner cursor-pointer"></div>
                        <div id="route-logger" class="mt-3 p-3 bg-white border border-slate-300 rounded text-sm font-mono text-slate-600 text-center shadow-sm">
                            Pilih Simpul Awal...
                        </div>
                    </div>

                    {{-- TUGAS ANALISIS ARAH --}}
                    <div class="flex-1 bg-white border border-slate-200 rounded-lg p-5 shadow-sm">
                        <p class="font-bold text-slate-800 text-sm mb-3">Tugas Analisis:</p>
                        <p class="text-xs text-slate-600 mb-4 leading-relaxed">Berdasarkan percobaan rute pada graf di samping, manakah skenario perpindahan data yang <strong>VALID</strong> dan bisa dieksekusi oleh sistem komputer? <em class="text-blue-600">(Pilih semua yang tepat)</em></p>
                        
                        <div class="space-y-2 mb-4">
                            <label class="flex items-center gap-2 cursor-pointer hover:bg-slate-50 p-2 rounded transition">
                                <input type="checkbox" name="chk_arah" value="AB" class="w-4 h-4 text-blue-600"> <span class="text-xs font-semibold text-slate-700">Data dikirim dari Simpul A ke Simpul B</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer hover:bg-slate-50 p-2 rounded transition">
                                <input type="checkbox" name="chk_arah" value="BA" class="w-4 h-4 text-blue-600"> <span class="text-xs font-semibold text-slate-700">Data dikirim dari Simpul B ke Simpul A</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer hover:bg-slate-50 p-2 rounded transition">
                                <input type="checkbox" name="chk_arah" value="CB" class="w-4 h-4 text-blue-600"> <span class="text-xs font-semibold text-slate-700">Data dikirim dari Simpul C ke Simpul B</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer hover:bg-slate-50 p-2 rounded transition">
                                <input type="checkbox" name="chk_arah" value="BD" class="w-4 h-4 text-blue-600"> <span class="text-xs font-semibold text-slate-700">Data dikirim dari Simpul B menuju D (melewati C)</span>
                            </label>
                        </div>
                        <div id="alert-arah" class="hidden p-2 rounded text-xs font-bold mb-3"></div>
                        <button onclick="cekAnalisisArah()" id="btn-cek-arah" class="w-full bg-slate-800 hover:bg-slate-900 text-white font-bold py-2 rounded shadow transition active:scale-95 text-sm">Cek Jawaban</button>
                    </div>
                </div>

                {{-- KESIMPULAN ARAH --}}
                <div id="kesimpulan-arah" class="hidden mt-6 bg-white border border-green-300 p-4 rounded-lg shadow-sm">
                    <p class="text-sm text-green-800 leading-relaxed text-justify">
                        <strong class="text-green-900"><i class="fa-solid fa-check-circle"></i> Kesimpulan Evaluasi:</strong> Tepat sekali! Pada <strong>Graf Tak Berarah</strong> (Simpul A dan B), data bebas bergerak bolak-balik. Namun, pada <strong>Graf Berarah</strong> (Simpul B ke C), komputer secara logis akan menolak rute yang melawan arah anak panah. Logika inilah yang dipakai sistem jalan satu arah (<em>One-Way</em>) pada aplikasi navigasi.
                    </p>
                </div>
            </div>
        </div>

        <div class="border-t border-slate-200 my-10"></div>

        {{-- ======================================================== --}}
        {{-- BAGIAN B: BERDASARKAN NILAI/BOBOT --}}
        {{-- ======================================================== --}}
        <div class="mb-12">
            <h3 class="text-xl font-bold text-slate-900 mb-4 border-b-2 border-amber-500 inline-block pb-1">B. Berdasarkan Nilai/Bobot (Weight)</h3>
            <p class="text-slate-700 leading-relaxed mb-6 text-justify">
                Dalam banyak kasus komputasi industri, mengetahui "apakah dua titik terhubung" saja tidaklah cukup. Komputer juga perlu tahu "seberapa besar biaya/jarak untuk melewatinya".
            </p>

            <ul class="list-decimal pl-5 space-y-4 text-slate-700 text-justify mb-8">
                <li>
                    <strong>Graf Tak Berbobot (Unweighted Graph):</strong> Sisi hanya merepresentasikan ada atau tidaknya hubungan. Semua sisi dianggap memiliki nilai atau jarak yang sama (seragam).
                </li>
                <li>
                    <strong>Graf Berbobot (Weighted Graph):</strong> Setiap sisi memiliki nilai ukur atau atribut kuantitatif (<em>weight</em>). Bobot ini bisa merepresentasikan jarak fisik (kilometer), waktu tempuh (menit), biaya ongkos kirim (Rupiah), atau tingkat kepadatan (<em>bandwidth</em> jaringan).
                </li>
            </ul>

            {{-- INTERAKTIF B: GRAF BOBOT --}}
            <div class="bg-amber-50 border border-amber-200 rounded-xl p-6 shadow-sm mb-6">
                <h4 class="font-bold text-amber-900 mb-3">Visualisasi Interaktif: Mencari Rute Terpendek</h4>
                
                <div class="flex flex-col md:flex-row gap-6 items-center">
                    <div class="flex-1 w-full">
                        <div id="vis-bobot" class="w-full h-56 bg-white border border-slate-300 rounded-lg shadow-inner"></div>
                    </div>

                    {{-- TUGAS ANALISIS BOBOT --}}
                    <div class="flex-1 w-full bg-white border border-slate-200 rounded-lg p-5 shadow-sm">
                        <p class="font-bold text-slate-800 text-sm mb-3">Tugas Analisis:</p>
                        <p class="text-xs text-slate-600 mb-4 leading-relaxed text-justify">Sebagai algoritma navigasi, Anda diminta mencari rute paling efisien (waktu terkecil) dari <strong>Rumah</strong> menuju <strong>Kampus</strong>. Jika Anda memperhitungkan <strong>angka bobot</strong> pada garis tersebut, rute manakah yang secara logis harus dipilih oleh algoritma?</p>
                        
                        <div class="flex items-center gap-3 mb-2">
                            <label class="font-bold text-sm text-slate-700">Ketik (ATAS / BAWAH):</label>
                            <input type="text" id="ans-bobot" class="w-24 p-2 border border-slate-300 rounded focus:border-blue-500 outline-none font-bold text-slate-800 text-center uppercase" placeholder="...">
                        </div>
                        
                        <div id="alert-bobot" class="hidden p-2 rounded text-xs font-bold my-3"></div>
                        <button onclick="cekAnalisisBobot()" id="btn-cek-bobot" class="w-full bg-slate-800 hover:bg-slate-900 text-white font-bold py-2 mt-2 rounded shadow transition active:scale-95 text-sm">Kirim Jawaban & Tampilkan Kesimpulan</button>
                    </div>
                </div>

                {{-- KESIMPULAN BOBOT --}}
                <div id="kesimpulan-bobot" class="hidden mt-6 bg-white border border-green-300 p-4 rounded-lg shadow-sm">
                    <p class="text-sm text-green-800 leading-relaxed text-justify">
                        <strong class="text-green-900"><i class="fa-solid fa-check-circle"></i> Kesimpulan Evaluasi:</strong> Analisis optimasi yang sangat baik! Meskipun jumlah langkahnya sama (melewati 1 simpul perantara), <strong>Rute Atas</strong> memiliki total bobot jauh lebih kecil (2 + 2 = 4 menit) dibandingkan <strong>Rute Bawah</strong> (8 + 7 = 15 menit). Pada <strong>Graf Berbobot</strong>, algoritma pencarian rute terpendek (seperti algoritma Dijkstra yang akan kita pelajari nanti) tidak lagi menghitung jumlah titik, melainkan mengalkulasi total angka bobot terkecil.
                    </p>
                </div>
            </div>
        </div>


        <div class="border-t-[3px] border-dashed border-slate-200 my-10"></div>

        {{-- ========================================== --}}
        {{-- AKTIVITAS 1.3 (EVALUASI AKHIR MATERI)      --}}
        {{-- ========================================== --}}

        {{-- CEK STATUS SERVER --}}
        @php
            $isDone13 = isset($progress['1.3']) && $progress['1.3']->score == 100;
        @endphp

        <div class="bg-white">
            <div class="flex items-center gap-3 mb-6">
                <span class="bg-slate-900 text-white text-xs font-bold px-3 py-1 rounded uppercase tracking-wider shadow-sm">Aktivitas 1.3</span>
                <h3 class="text-2xl font-bold text-slate-900">Analisis Model Data di Dunia Nyata</h3>
            </div>

            <div class="text-slate-700 leading-relaxed text-justify space-y-4 mb-8">
                <p>Sebagai seorang lulusan Ilmu Komputer, Anda akan sering dituntut untuk menerjemahkan studi kasus di dunia nyata ke dalam model struktur data yang tepat.</p>
                <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-r-lg text-blue-900 font-medium">
                    <strong>Tugas Anda:</strong> Analisislah tiga skenario sistem digital di bawah ini. Tentukan karakteristik graf apa yang paling efisien dan akurat untuk memodelkan masing-masing skenario tersebut!
                </div>
            </div>

            {{-- KUIS AKTIVITAS 1.3 --}}
            <div class="space-y-6" id="quizContainer13">
                
                {{-- SOAL 1 --}}
                <div class="quiz-item bg-white border border-slate-200 rounded-xl p-6 shadow-sm hover:border-blue-300 transition-colors">
                    <div class="flex gap-3 mb-3 items-baseline">
                        <span class="bg-slate-800 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs font-bold shrink-0">1</span>
                        <div class="text-slate-800 text-sm leading-relaxed">
                            <strong>Analisis Sistem Transaksi Keuangan:</strong> Dalam sistem <em>database</em> sebuah bank, Budi mentransfer dana sebesar Rp500.000 ke rekening Siti. Aliran perpindahan dana ini bersifat mutlak dari pengirim ke penerima, dan tidak berarti Siti mentransfer balik ke Budi. Untuk memastikan tidak ada <em>error</em> arah aliran dana, arsitektur data transaksi ini harus dimodelkan sebagai... <br>
                            <em class="text-slate-500 text-xs">(Ketik: Graf Berarah / Graf Tak Berarah)</em>
                        </div>
                    </div>
                    <div class="pl-9 mt-3 flex items-center gap-3">
                        <label class="font-bold text-sm text-slate-700">Jawaban:</label>
                        <input type="text" id="q1_3_1" class="w-64 p-2.5 border border-slate-300 rounded-lg focus:border-blue-500 focus:ring focus:ring-blue-100 outline-none font-bold text-slate-800" placeholder="Ketik jawaban...">
                    </div>
                </div>

                {{-- SOAL 2 --}}
                <div class="quiz-item bg-white border border-slate-200 rounded-xl p-6 shadow-sm hover:border-blue-300 transition-colors">
                    <div class="flex gap-3 mb-3 items-baseline">
                        <span class="bg-slate-800 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs font-bold shrink-0">2</span>
                        <div class="text-slate-800 text-sm leading-relaxed">
                            <strong>Analisis Sistem Logistik & Ekspedisi:</strong> Sebuah perusahaan logistik memetakan rute pengiriman paket antar provinsi. Agar algoritma sistem bisa memilih rute ongkos kirim termurah bagi pelanggan, sistem tidak hanya menyimpan data "kota mana terhubung ke kota mana", tetapi juga menyimpan data "biaya tol" pada setiap ruas jalan penghubungnya. Model ini disebut sebagai... <br>
                            <em class="text-slate-500 text-xs">(Ketik: Graf Berbobot / Graf Tak Berbobot)</em>
                        </div>
                    </div>
                    <div class="pl-9 mt-3 flex items-center gap-3">
                        <label class="font-bold text-sm text-slate-700">Jawaban:</label>
                        <input type="text" id="q1_3_2" class="w-64 p-2.5 border border-slate-300 rounded-lg focus:border-blue-500 focus:ring focus:ring-blue-100 outline-none font-bold text-slate-800" placeholder="Ketik jawaban...">
                    </div>
                </div>

                {{-- SOAL 3 --}}
                <div class="quiz-item bg-white border border-slate-200 rounded-xl p-6 shadow-sm hover:border-blue-300 transition-colors">
                    <div class="flex gap-3 mb-4 items-baseline">
                        <span class="bg-slate-800 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs font-bold shrink-0">3</span>
                        <div class="text-slate-800 text-sm leading-relaxed">
                            <strong>Pemodelan Aplikasi Navigasi Kompleks:</strong> Aplikasi navigasi modern seperti Google Maps memiliki dua fitur penting di area perkotaan: sistem mengenali aturan jalan satu arah (<em>one-way street</em>) dan sistem selalu mengalkulasi estimasi waktu tempuh (dalam menit) untuk menghindari kemacetan. Berdasarkan dua fitur komputasi tersebut, peta digital di perkotaan wajib dimodelkan dengan menggabungkan <strong>dua</strong> karakteristik graf sekaligus, yaitu... <br>
                            
                        </div>
                    </div>
                    <div class="space-y-2 pl-9">
                        <label class="flex items-center gap-3 p-3 border rounded-lg cursor-pointer hover:bg-slate-50 transition">
                            <input type="checkbox" name="q1_3_3" value="tak_berarah" class="w-5 h-5 text-blue-600 rounded">
                            <span class="text-sm text-slate-700">Graf Tak Berarah (<em>Undirected Graph</em>)</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 border rounded-lg cursor-pointer hover:bg-slate-50 transition">
                            <input type="checkbox" name="q1_3_3" value="berarah" class="w-5 h-5 text-blue-600 rounded">
                            <span class="text-sm text-slate-700">Graf Berarah (<em>Directed Graph</em>)</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 border rounded-lg cursor-pointer hover:bg-slate-50 transition">
                            <input type="checkbox" name="q1_3_3" value="tak_berbobot" class="w-5 h-5 text-blue-600 rounded">
                            <span class="text-sm text-slate-700">Graf Tak Berbobot (<em>Unweighted Graph</em>)</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 border rounded-lg cursor-pointer hover:bg-slate-50 transition">
                            <input type="checkbox" name="q1_3_3" value="berbobot" class="w-5 h-5 text-blue-600 rounded">
                            <span class="text-sm text-slate-700">Graf Berbobot (<em>Weighted Graph</em>)</span>
                        </label>
                    </div>
                </div>
            </div>

            {{-- AREA FEEDBACK & SUBMIT --}}
            <div class="mt-8">
                <div id="statusAlert13" class="hidden p-4 rounded-lg mb-4 text-sm font-bold border shadow-sm"></div>
                
                {{-- BOX PEMBAHASAN AKHIR --}}
                <div id="feedback13" class="hidden p-6 rounded-xl bg-blue-50 border border-blue-200 text-slate-800 text-sm leading-relaxed mb-6 shadow-sm">
                    <h4 class="font-bold text-blue-900 mb-3 flex items-center gap-2 border-b border-blue-200 pb-2">
                        <i class="fa-solid fa-graduation-cap text-blue-600 text-lg"></i> Kesimpulan Evaluasi:
                    </h4>
                    <p class="text-justify">
                        Pemahaman abstraksi Anda sudah sangat tajam! Di dunia industri yang sebenarnya, sebuah sistem hampir selalu menggunakan gabungan karakteristik graf. Contohnya pada Google Maps (Soal No 3), jalan satu arah direpresentasikan dengan <strong>Graf Berarah</strong> (panah jalur), sementara waktu tempuh kemacetannya direpresentasikan dengan <strong>Graf Berbobot</strong> (angka menit pada sisi). Pemilihan model graf yang tepat di awal akan sangat menentukan keberhasilan <em>coding</em> dan algoritma Anda ke depannya!
                    </p>
                </div>

                <div class="flex justify-end mt-4">
                    <button type="button" id="btnPeriksa13" onclick="checkAktivitas13()" class="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold rounded-lg shadow-md transition-all active:scale-95 flex items-center gap-2">
                        <i class="fa-solid fa-paper-plane"></i> Kirim & Periksa Jawaban
                    </button>
                </div>
            </div>

            {{-- FOOTER NAVIGASI --}}
            <div class="flex justify-between gap-4 mt-12 pt-6 border-t-2 border-slate-100">
                <button type="button" onclick="prevStep()" class="btn-secondary px-6 py-2.5 rounded-lg border border-slate-300 font-bold text-slate-600 hover:bg-slate-50 transition">Kembali</button>
                <button id="btnNext13" type="button" onclick="nextStep()" class="btn-primary bg-slate-900 text-white px-6 py-2.5 rounded-lg font-bold opacity-50 cursor-not-allowed transition hover:bg-slate-800" disabled>Lanjut</button>
            </div>

        </div>
    </div>

    {{-- ======================================================== --}}
    {{-- SCRIPT: VIS.JS & LOGIKA INTERAKTIF/PERSISTENCE           --}}
    {{-- ======================================================== --}}
    <script>
        // Global variables untuk routing game
        let routeNodesSelected = [];
        let networkArah;

        document.addEventListener("DOMContentLoaded", function() {
            
            const currentUserId = "{{ auth()->check() ? auth()->id() : 'guest' }}";

            // ==========================================
            // 1. INIT VIS.JS GRAF ARAH (Game Routing)
            // ==========================================
            const nodesArah = new vis.DataSet([
                { id: 'A', label: 'A', x: -100, y: -50, color: { background: '#3b82f6', border: '#2563eb' }, font: { color: 'white', size: 16, bold: true } },
                { id: 'B', label: 'B', x: 100, y: -50, color: { background: '#3b82f6', border: '#2563eb' }, font: { color: 'white', size: 16, bold: true } },
                { id: 'C', label: 'C', x: 100, y: 100, color: { background: '#8b5cf6', border: '#7c3aed' }, font: { color: 'white', size: 16, bold: true } },
                { id: 'D', label: 'D', x: -100, y: 100, color: { background: '#f59e0b', border: '#d97706' }, font: { color: 'white', size: 16, bold: true } }
            ]);

            const edgesArah = new vis.DataSet([
                { from: 'A', to: 'B', color: { color: '#94a3b8' }, width: 3 }, // Tak berarah
                { from: 'B', to: 'C', arrows: 'to', color: { color: '#ef4444' }, width: 3 }, // Berarah
                { from: 'C', to: 'D', arrows: 'to', color: { color: '#ef4444' }, width: 3 }  // Berarah
            ]);

            const containerArah = document.getElementById('vis-arah');
            networkArah = new vis.Network(containerArah, { nodes: nodesArah, edges: edgesArah }, {
                physics: false,
                interaction: { dragNodes: false, zoomView: false, dragView: false, hover: true },
                nodes: { shape: 'circle', margin: 15, borderWidth: 2 }
            });

            // Logika Klik Simulasi Routing
            networkArah.on("click", function (params) {
                if (params.nodes.length > 0) {
                    const clickedNode = params.nodes[0];
                    const logger = document.getElementById('route-logger');
                    
                    if (routeNodesSelected.length === 0) {
                        routeNodesSelected.push(clickedNode);
                        logger.innerHTML = `Mulai dari <strong>Simpul ${clickedNode}</strong>... (Pilih tujuan)`;
                        logger.className = "mt-3 p-3 bg-blue-50 border border-blue-200 rounded text-sm font-mono text-blue-800 text-center";
                    } else if (routeNodesSelected.length === 1) {
                        const start = routeNodesSelected[0];
                        const end = clickedNode;
                        
                        if (start === end) {
                            routeNodesSelected = [];
                            logger.innerHTML = "Pilih Simpul Awal...";
                            logger.className = "mt-3 p-3 bg-white border border-slate-300 rounded text-sm font-mono text-slate-600 text-center";
                            return;
                        }

                        // Cek validasi rute secara hardcode untuk graf A-B-C-D ini
                        let isValid = false;
                        let msg = "";
                        
                        // A-B tak berarah (bisa A->B, B->A)
                        if ((start==='A' && end==='B') || (start==='B' && end==='A')) { isValid = true; msg = `Paket berhasil dikirim dari ${start} ke ${end}. (Garis dua arah)`; }
                        // B->C berarah (hanya B->C)
                        else if (start==='B' && end==='C') { isValid = true; msg = `Paket berhasil dikirim dari ${start} ke ${end}. (Sesuai arah panah)`; }
                        else if (start==='C' && end==='B') { isValid = false; msg = `ERROR: Gagal dari C ke B. Melawan arah panah!`; }
                        // C->D berarah (hanya C->D)
                        else if (start==='C' && end==='D') { isValid = true; msg = `Paket berhasil dikirim dari ${start} ke ${end}. (Sesuai arah panah)`; }
                        else if (start==='D' && end==='C') { isValid = false; msg = `ERROR: Gagal dari D ke C. Melawan arah panah!`; }
                        // Multi-hop valid: A->C, A->D, B->D
                        else if (start==='A' && end==='C') { isValid = true; msg = `Routing sukses: A -> B -> C.`; }
                        else if (start==='A' && end==='D') { isValid = true; msg = `Routing sukses: A -> B -> C -> D.`; }
                        else if (start==='B' && end==='D') { isValid = true; msg = `Routing sukses: B -> C -> D.`; }
                        // Multi-hop invalid (karena macet di C->B atau D->C)
                        else { isValid = false; msg = `ERROR: Rute dari ${start} ke ${end} tidak tersedia atau terblokir arah panah.`; }

                        if (isValid) {
                            logger.innerHTML = `✅ ${msg}`;
                            logger.className = "mt-3 p-3 bg-green-50 border border-green-300 rounded text-sm font-mono text-green-800 text-center";
                        } else {
                            logger.innerHTML = `❌ ${msg}`;
                            logger.className = "mt-3 p-3 bg-red-50 border border-red-300 rounded text-sm font-mono text-red-800 text-center animate-pulse";
                        }
                        
                        // Reset selection untuk coba lagi
                        routeNodesSelected = [];
                        setTimeout(() => {
                            if(routeNodesSelected.length === 0) {
                                logger.innerHTML = "Klik simpul untuk mencoba lagi...";
                                logger.className = "mt-3 p-3 bg-white border border-slate-300 rounded text-sm font-mono text-slate-600 text-center transition-all duration-500";
                            }
                        }, 3000);
                    }
                }
            });

            // ==========================================
            // 2. INIT VIS.JS GRAF BOBOT
            // ==========================================
            const nodesBobot = new vis.DataSet([
                { id: 'R', label: 'Rumah', x: -150, y: 0, color: { background: '#10b981', border: '#059669' }, font: { color: 'white', size: 14, bold: true } },
                { id: 'T', label: 'Taman\n(Rute Atas)', x: 0, y: -80, color: { background: '#3b82f6', border: '#2563eb' }, font: { color: 'white', size: 12 } },
                { id: 'P', label: 'Pasar\n(Rute Bawah)', x: 0, y: 80, color: { background: '#3b82f6', border: '#2563eb' }, font: { color: 'white', size: 12 } },
                { id: 'K', label: 'Kampus', x: 150, y: 0, color: { background: '#f59e0b', border: '#d97706' }, font: { color: 'white', size: 14, bold: true } }
            ]);

            const edgesBobot = new vis.DataSet([
                { from: 'R', to: 'T', label: '2 mnt', font: { align: 'top', size: 14, color: '#0f172a', bold:true }, width: 3, color: '#94a3b8' },
                { from: 'T', to: 'K', label: '2 mnt', font: { align: 'top', size: 14, color: '#0f172a', bold:true }, width: 3, color: '#94a3b8' },
                { from: 'R', to: 'P', label: '8 mnt', font: { align: 'bottom', size: 14, color: '#dc2626', bold:true }, width: 3, color: '#94a3b8' },
                { from: 'P', to: 'K', label: '7 mnt', font: { align: 'bottom', size: 14, color: '#dc2626', bold:true }, width: 3, color: '#94a3b8' }
            ]);

            const containerBobot = document.getElementById('vis-bobot');
            const networkBobot = new vis.Network(containerBobot, { nodes: nodesBobot, edges: edgesBobot }, {
                physics: false,
                interaction: { dragNodes: false, zoomView: false, dragView: false },
                nodes: { shape: 'box', margin: 10, borderWidth: 2 }
            });

            // Handle Resize
            const resizeObserver = new ResizeObserver(() => {
                if(containerArah.offsetWidth > 0) { networkArah.redraw(); networkArah.fit({ animation: false }); }
                if(containerBobot.offsetWidth > 0) { networkBobot.redraw(); networkBobot.fit({ animation: false }); }
            });
            resizeObserver.observe(containerArah);
            resizeObserver.observe(containerBobot);

            const slide4 = document.getElementById('step-4');
            if (slide4) {
                new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) setTimeout(() => window.dispatchEvent(new Event('resize')), 100);
                    });
                }).observe(slide4);
            }

            // ========================================================
            // 3. LOGIKA PEMBERSIHAN MEMORI UNTUK AKUN BARU
            // ========================================================
            const savedUserId13 = localStorage.getItem('graf_active_user_13');
            if (savedUserId13 !== currentUserId) {
                // Reset Kuis Mini Arah
                localStorage.removeItem('analisis_arah_done_user_' + savedUserId13);
                localStorage.removeItem('ans_arah_cb_user_' + savedUserId13);
                // Reset Kuis Mini Bobot
                localStorage.removeItem('analisis_bobot_done_user_' + savedUserId13);
                localStorage.removeItem('ans_bobot_txt_user_' + savedUserId13);
                // Reset Aktivitas 1.3 Utama
                localStorage.removeItem('act_1_3_done_user_' + savedUserId13);
                localStorage.removeItem('user_ans_1_3_1_user_' + savedUserId13);
                localStorage.removeItem('user_ans_1_3_2_user_' + savedUserId13);
                localStorage.removeItem('user_ans_1_3_3_user_' + savedUserId13);
                
                localStorage.setItem('graf_active_user_13', currentUserId);
            }

            // ========================================================
            // 4. RESTORE STATE KUIS MINI (Arah & Bobot)
            // ========================================================
            if(localStorage.getItem('analisis_arah_done_user_' + currentUserId) === 'true') {
                let savedCbArah = JSON.parse(localStorage.getItem('ans_arah_cb_user_' + currentUserId)) || ['AB', 'BA', 'BD'];
                savedCbArah.forEach(val => {
                    let cb = document.querySelector(`input[name="chk_arah"][value="${val}"]`);
                    if(cb) cb.checked = true;
                });
                document.querySelectorAll('input[name="chk_arah"]').forEach(el => el.disabled = true);
                const btnArah = document.getElementById('btn-cek-arah');
                if(btnArah) {
                    btnArah.disabled = true;
                    btnArah.className = "w-full bg-green-600 text-white font-bold py-2 rounded text-sm cursor-not-allowed";
                    btnArah.innerHTML = "✔ Dianalisis";
                }
                document.getElementById('kesimpulan-arah').classList.remove('hidden');
            }

            if(localStorage.getItem('analisis_bobot_done_user_' + currentUserId) === 'true') {
                const inpBobot = document.getElementById('ans-bobot');
                if(inpBobot) {
                    inpBobot.value = localStorage.getItem('ans_bobot_txt_user_' + currentUserId) || "ATAS";
                    inpBobot.disabled = true;
                    inpBobot.classList.add('bg-green-50', 'border-green-400', 'text-green-800');
                }
                const btnBobot = document.getElementById('btn-cek-bobot');
                if(btnBobot) {
                    btnBobot.disabled = true;
                    btnBobot.className = "w-full bg-green-600 text-white font-bold py-2 mt-2 rounded text-sm cursor-not-allowed";
                    btnBobot.innerHTML = "✔ Dianalisis";
                }
                document.getElementById('kesimpulan-bobot').classList.remove('hidden');
            }

            // ========================================================
            // 5. LOGIKA PERSISTENCE AKTIVITAS 1.3 UTAMA (DATABASE)
            // ========================================================
            @if($isDone13)
                // Restore Q1 (Input Text)
                document.getElementById('q1_3_1').value = localStorage.getItem('user_ans_1_3_1_user_' + currentUserId) || "Graf Berarah";
                // Restore Q2 (Input Text)
                document.getElementById('q1_3_2').value = localStorage.getItem('user_ans_1_3_2_user_' + currentUserId) || "Graf Berbobot";

                // Restore Q3 (Checkbox)
                let savedCb13 = JSON.parse(localStorage.getItem('user_ans_1_3_3_user_' + currentUserId)) || ['berarah', 'berbobot'];
                savedCb13.forEach(val => {
                    let cb = document.querySelector(`input[name="q1_3_3"][value="${val}"]`);
                    if(cb) cb.checked = true;
                });

                // Lock UI
                document.querySelectorAll('input[name="q1_3_3"]').forEach(el => el.disabled = true);
                document.getElementById('q1_3_1').disabled = true;
                document.getElementById('q1_3_2').disabled = true;
                document.getElementById('q1_3_1').classList.add('bg-green-50', 'border-green-400', 'text-green-800');
                document.getElementById('q1_3_2').classList.add('bg-green-50', 'border-green-400', 'text-green-800');

                // Show Success
                const alertBox13 = document.getElementById('statusAlert13');
                if(alertBox13) {
                    alertBox13.className = "p-4 rounded-lg mb-4 text-sm font-bold border bg-green-50 border-green-400 text-green-700 shadow-sm";
                    alertBox13.innerHTML = "✔ Anda sudah menyelesaikan Aktivitas 1.3 ini dengan sempurna.";
                    alertBox13.classList.remove('hidden');
                }

                document.getElementById('feedback13').classList.remove('hidden');
                
                const btnP = document.getElementById('btnPeriksa13');
                if(btnP) btnP.classList.add('hidden');

                const btnN = document.getElementById('btnNext13');
                if(btnN) {
                    btnN.disabled = false;
                    btnN.classList.remove('opacity-50', 'cursor-not-allowed');
                }
            @endif
        });

        // ---------------------------------------------
        // FUNGSI CEK MINI: ARAH
        // ---------------------------------------------
        function cekAnalisisArah() {
            const cbAB = document.querySelector('input[name="chk_arah"][value="AB"]').checked;
            const cbBA = document.querySelector('input[name="chk_arah"][value="BA"]').checked;
            const cbCB = document.querySelector('input[name="chk_arah"][value="CB"]').checked;
            const cbBD = document.querySelector('input[name="chk_arah"][value="BD"]').checked;
            
            const alertBox = document.getElementById('alert-arah');

            if (!(cbAB || cbBA || cbCB || cbBD)) {
                alertBox.className = "p-2 rounded text-xs font-bold bg-yellow-50 text-yellow-800 border border-yellow-200 mt-2 block";
                alertBox.innerText = "⚠️ Pilih minimal satu rute.";
                return;
            }

            // Kunci Jawaban: AB, BA, BD benar. CB salah.
            if (cbAB && cbBA && cbBD && !cbCB) {
                alertBox.classList.add('hidden');
                
                const currentUserId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                localStorage.setItem('analisis_arah_done_user_' + currentUserId, 'true');
                
                let checkedCb = [];
                document.querySelectorAll('input[name="chk_arah"]:checked').forEach(cb => checkedCb.push(cb.value));
                localStorage.setItem('ans_arah_cb_user_' + currentUserId, JSON.stringify(checkedCb));

                document.querySelectorAll('input[name="chk_arah"]').forEach(el => el.disabled = true);
                
                const btnCek = document.getElementById('btn-cek-arah');
                btnCek.disabled = true;
                btnCek.className = "w-full bg-green-600 text-white font-bold py-2 rounded shadow text-sm cursor-not-allowed transition-all";
                btnCek.innerHTML = "✔ Dianalisis";

                document.getElementById('kesimpulan-arah').classList.remove('hidden');
            } else {
                alertBox.className = "p-2 rounded text-xs font-bold bg-red-50 text-red-800 border border-red-200 mt-2 block animate-pulse";
                alertBox.innerHTML = "❌ Kurang tepat. <br><span class='font-normal'>Ingat: C ke B dilarang karena melawan arah panah. Sisanya diperbolehkan!</span>";
            }
        }

        // ---------------------------------------------
        // FUNGSI CEK MINI: BOBOT
        // ---------------------------------------------
        function cekAnalisisBobot() {
            const inputAns = document.getElementById('ans-bobot');
            const val = inputAns.value.trim().toUpperCase();
            const alertBox = document.getElementById('alert-bobot');

            if (val === '') {
                alertBox.className = "p-2 rounded text-xs font-bold bg-yellow-50 text-yellow-800 border border-yellow-200 mt-2 block";
                alertBox.innerText = "⚠️ Silakan ketik ATAS atau BAWAH.";
                return;
            }

            if (val === 'ATAS') {
                alertBox.classList.add('hidden');
                
                const currentUserId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                localStorage.setItem('analisis_bobot_done_user_' + currentUserId, 'true');
                localStorage.setItem('ans_bobot_txt_user_' + currentUserId, inputAns.value);

                inputAns.disabled = true;
                inputAns.classList.add('bg-green-50', 'border-green-400', 'text-green-800');
                
                const btnCek = document.getElementById('btn-cek-bobot');
                btnCek.disabled = true;
                btnCek.className = "w-full bg-green-600 text-white font-bold py-2 mt-2 rounded shadow text-sm cursor-not-allowed transition-all";
                btnCek.innerHTML = "✔ Dianalisis";

                document.getElementById('kesimpulan-bobot').classList.remove('hidden');
            } else {
                alertBox.className = "p-2 rounded text-xs font-bold bg-red-50 text-red-800 border border-red-200 mt-2 block animate-pulse";
                alertBox.innerHTML = "❌ Logika kurang tepat. <br><span class='font-normal'>Coba jumlahkan angka pada Rute Atas (2+2) dan Rute Bawah (8+7). Pilih hasil terkecil!</span>";
            }
        }

        // ---------------------------------------------
        // FUNGSI CEK AKTIVITAS 1.3 UTAMA (DATABASE)
        // ---------------------------------------------
        function checkAktivitas13() {
            const rawAns1 = document.getElementById('q1_3_1').value;
            const ans1 = rawAns1.trim().toLowerCase();

            const rawAns2 = document.getElementById('q1_3_2').value;
            const ans2 = rawAns2.trim().toLowerCase();

            const cbTakArah = document.querySelector('input[name="q1_3_3"][value="tak_berarah"]').checked;
            const cbArah = document.querySelector('input[name="q1_3_3"][value="berarah"]').checked;
            const cbTakBobot = document.querySelector('input[name="q1_3_3"][value="tak_berbobot"]').checked;
            const cbBobot = document.querySelector('input[name="q1_3_3"][value="berbobot"]').checked;

            const alertBox = document.getElementById('statusAlert13');
            const btnNext = document.getElementById('btnNext13');
            const feedbackBox = document.getElementById('feedback13');
            const btnPeriksa = document.getElementById('btnPeriksa13');

            // Validasi kosong
            if (ans1 === '' || ans2 === '' || !(cbTakArah || cbArah || cbTakBobot || cbBobot)) {
                alertBox.className = "p-4 rounded-lg mb-4 text-sm font-bold border bg-yellow-50 border-yellow-200 text-yellow-800 text-center";
                alertBox.innerHTML = "⚠️ Silakan jawab semua soal analisis terlebih dahulu.";
                alertBox.classList.remove('hidden');
                return;
            }

            let benar = 0;
            
            // Cek No 1: Graf Berarah (Toleransi kata)
            if (['graf berarah', 'berarah', 'directed graph', 'directed'].includes(ans1)) benar++;
            
            // Cek No 2: Graf Berbobot (Toleransi kata)
            if (['graf berbobot', 'berbobot', 'weighted graph', 'weighted'].includes(ans2)) benar++;

            // Cek No 3: Graf Berarah & Graf Berbobot
            if (cbArah && cbBobot && !cbTakArah && !cbTakBobot) benar++;

            if (benar === 3) {
                const currentUserId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                
                // Simpan persis teks dari user
                localStorage.setItem('user_ans_1_3_1_user_' + currentUserId, rawAns1);
                localStorage.setItem('user_ans_1_3_2_user_' + currentUserId, rawAns2);
                let checkedCb = [];
                document.querySelectorAll('input[name="q1_3_3"]:checked').forEach(cb => checkedCb.push(cb.value));
                localStorage.setItem('user_ans_1_3_3_user_' + currentUserId, JSON.stringify(checkedCb));

                alertBox.className = "p-4 rounded-lg mb-5 text-sm font-bold border bg-green-50 border-green-400 text-green-700 shadow-sm";
                alertBox.innerHTML = "🎉 Sempurna! Anda berhasil memodelkan studi kasus dunia nyata dengan tepat.";
                
                document.getElementById('q1_3_1').classList.add('bg-green-50', 'border-green-400', 'text-green-800');
                document.getElementById('q1_3_2').classList.add('bg-green-50', 'border-green-400', 'text-green-800');

                feedbackBox.classList.remove('hidden');
                btnPeriksa.classList.add('hidden');

                if(btnNext) {
                    btnNext.disabled = false;
                    btnNext.classList.remove('opacity-50', 'cursor-not-allowed');
                }

                document.querySelectorAll('input[name="q1_3_3"]').forEach(el => el.disabled = true);
                document.getElementById('q1_3_1').disabled = true;
                document.getElementById('q1_3_2').disabled = true;

                if (typeof simpanProgressAktivitas === 'function') {
                    simpanProgressAktivitas('bab1', '1.3', 100);
                } else {
                    console.warn("Fungsi simpanProgressAktivitas tidak ditemukan.");
                }
            } else {
                alertBox.className = "p-4 rounded-lg mb-5 text-sm font-bold border bg-red-50 border-red-300 text-red-700 animate-pulse shadow-sm";
                alertBox.innerHTML = `❌ Pemodelan Anda belum tepat. <br><span class="font-normal text-xs mt-1 block">Silakan baca ulang definisi masing-masing graf dan perbaiki analisis Anda!</span>`;
            }
            alertBox.classList.remove('hidden');
        }
    </script>
</section>