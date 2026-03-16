<section id="step-1" class="step-slide">
    {{-- IMPORT VIS JS --}}
    <script type="text/javascript" src="https://unpkg.com/vis-network/standalone/umd/vis-network.min.js"></script>

    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-8 md:p-10 max-w-6xl mx-auto -mt-8">

        {{-- JUDUL MATERI --}}
        <div class="border-b border-slate-200 pb-6 mb-8">
            <h2 class="text-2xl md:text-3xl font-bold text-slate-900 mb-2">2.1 Implementasi Dasar (Simpul dan Sisi)</h2>
            <p class="text-slate-500 font-medium">Menerjemahkan Simpul (Vertex) dan Sisi (Edge) ke dalam memori komputer.</p>
        </div>

        {{-- KONTEN TEORI --}}
        <div class="prose prose-slate text-slate-700 leading-relaxed text-justify mb-8 max-w-none">
            <p>
                Cara paling mendasar untuk menerjemahkan graf ke dalam memori komputer adalah dengan menyimpan data Simpul (<em>Vertex</em>) dan Sisi (<em>Edge</em>) ke dalam dua wadah (variabel) yang berbeda.
            </p>
        </div>

        {{-- VISUALISASI GRAF DASAR (INTERAKTIF DENGAN INFO PANEL) --}}
        <div class="bg-slate-50 p-5 rounded-xl border border-slate-200 shadow-inner w-full flex flex-col items-center mb-8 group">
            
            {{-- ID KANVAS DIUBAH TOTAL AGAR TIDAK BENTROK DENGAN JS EXTERNAL --}}
            <div id="graf_isolasi_21" class="w-full h-[200px] cursor-pointer bg-white rounded-lg border border-slate-200 shadow-sm relative overflow-hidden"></div>
            
            {{-- Panel Info Interaktif (Muncul saat diklik) --}}
            <div id="graf-info-panel" class="w-full mt-4 p-3 bg-blue-50/50 border border-blue-200 rounded-lg text-sm text-slate-600 text-center transition-all min-h-[50px] flex items-center justify-center">
                <em><i class="fa-solid fa-hand-pointer text-blue-400 mr-1"></i> Klik salah satu titik (simpul) atau garis (sisi) untuk melihat representasi kodenya.</em>
            </div>
            
            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mt-3">Visualisasi Interaktif - Graf Dasar</span>
        </div>

        <div class="prose prose-slate text-slate-700 leading-relaxed text-justify mb-8 max-w-none">
            <p>Berdasarkan simulasi klik di atas, untuk merepresentasikan gambar tersebut kita menggunakan dua tipe data bawaan Python:</p>
            <ol class="list-decimal list-outside ml-5 space-y-3">
                <li>
                    <strong>List <code>[]</code> untuk Simpul:</strong> Digunakan karena ukurannya dinamis (bisa ditambah/dihapus). Jika ada lokasi baru, kita bisa menambahkannya menggunakan perintah <code>.append()</code>.
                </li>
                <li>
                    <strong>Tuple <code>()</code> untuk Sisi:</strong> Digunakan karena bersifat <em>immutable</em> (tidak bisa diubah isinya sembarangan). Sisi disimpan sebagai pasangan dua simpul di dalam sebuah <em>List</em>.
                </li>
            </ol>
        </div>

        {{-- CONTOH KODE PROGRAM (ANTI-COPY) --}}
        <div class="mb-8">
            <h3 class="text-lg font-bold text-slate-800 mb-3">Contoh Kode Program:</h3>
            
            {{-- IDE Block (View Only) --}}
            <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 select-none pointer-events-none">
                <div class="bg-[#2d2d2d] px-4 py-2.5 flex items-center gap-2 border-b border-slate-700">
                    <div class="w-3 h-3 rounded-full bg-[#ff5f56]"></div>
                    <div class="w-3 h-3 rounded-full bg-[#ffbd2e]"></div>
                    <div class="w-3 h-3 rounded-full bg-[#27c93f]"></div>
                    <span class="text-slate-400 text-xs ml-2 font-mono">contoh_graf.py (Hanya Baca)</span>
                </div>
                <div class="p-5 font-mono text-sm leading-loose overflow-x-auto">
                    <div class="text-[#6a9955]"># 1. Membuat data awal</div>
                    <div><span class="text-[#9cdcfe]">nodes</span> <span class="text-[#d4d4d4]">=</span> <span class="text-[#d4d4d4]">[</span><span class="text-[#ce9178]">'A'</span><span class="text-[#d4d4d4]">,</span> <span class="text-[#ce9178]">'B'</span><span class="text-[#d4d4d4]">,</span> <span class="text-[#ce9178]">'C'</span><span class="text-[#d4d4d4]">]</span></div>
                    <div class="mb-3"><span class="text-[#9cdcfe]">edges</span> <span class="text-[#d4d4d4]">=</span> <span class="text-[#d4d4d4]">[</span><span class="text-[#d4d4d4]">(</span><span class="text-[#ce9178]">'A'</span><span class="text-[#d4d4d4]">,</span> <span class="text-[#ce9178]">'B'</span><span class="text-[#d4d4d4]">)</span><span class="text-[#d4d4d4]">,</span> <span class="text-[#d4d4d4]">(</span><span class="text-[#ce9178]">'B'</span><span class="text-[#d4d4d4]">,</span> <span class="text-[#ce9178]">'C'</span><span class="text-[#d4d4d4]">)</span><span class="text-[#d4d4d4]">]</span></div>
                    
                    <div class="text-[#6a9955]"># 2. Menambahkan Simpul baru menggunakan .append()</div>
                    <div class="mb-3"><span class="text-[#9cdcfe]">nodes</span><span class="text-[#d4d4d4]">.</span><span class="text-[#dcdcaa]">append</span><span class="text-[#d4d4d4]">(</span><span class="text-[#ce9178]">'D'</span><span class="text-[#d4d4d4]">)</span></div>

                    <div class="text-[#6a9955]"># 3. Menambahkan Sisi baru menggunakan .append()</div>
                    <div class="mb-3"><span class="text-[#9cdcfe]">edges</span><span class="text-[#d4d4d4]">.</span><span class="text-[#dcdcaa]">append</span><span class="text-[#d4d4d4]">(</span><span class="text-[#d4d4d4]">(</span><span class="text-[#ce9178]">'C'</span><span class="text-[#d4d4d4]">,</span> <span class="text-[#ce9178]">'D'</span><span class="text-[#d4d4d4]">)</span><span class="text-[#d4d4d4]">)</span></div>

                    <div class="text-[#6a9955]"># Menampilkan hasil ke layar</div>
                    <div><span class="text-[#dcdcaa]">print</span><span class="text-[#d4d4d4]">(</span><span class="text-[#ce9178]"">"Daftar Simpul:"</span><span class="text-[#d4d4d4]">,</span> <span class="text-[#9cdcfe]">nodes</span><span class="text-[#d4d4d4]">)</span></div>
                    <div><span class="text-[#dcdcaa]">print</span><span class="text-[#d4d4d4]">(</span><span class="text-[#ce9178]"">"Daftar Sisi:"</span><span class="text-[#d4d4d4]">,</span> <span class="text-[#9cdcfe]">edges</span><span class="text-[#d4d4d4]">)</span></div>
                </div>
            </div>

            {{-- Penjelasan Kode --}}
            <div class="mt-4 bg-slate-50 p-5 rounded-lg border border-slate-200">
                <h4 class="font-bold text-slate-800 text-sm mb-3">Penjelasan Kode:</h4>
                <ul class="list-disc list-outside ml-4 text-sm text-slate-700 space-y-2 text-justify">
                    <li>Komentar pada kode (tanda <code>#</code>) hanya untuk penjelasan agar mudah dipahami. Komentar tidak dijalankan oleh Python, jadi kalau dihapus pun program tetap berjalan normal.</li>
                    <li>Pada baris pertama, kita mendefinisikan graf awal yang hanya memiliki simpul A, B, dan C.</li>
                    <li>Perintah <code>nodes.append('D')</code> berfungsi untuk menyisipkan data 'D' ke urutan paling belakang pada list nodes.</li>
                    <li>Perintah <code>edges.append(('C', 'D'))</code> menyisipkan relasi baru. Perhatikan ada <strong>dua kurung</strong> <code>(('C', 'D'))</code>, kurung luar milik <code>append()</code>, kurung dalam adalah format <em>Tuple</em> untuk membungkus sepasang titik.</li>
                </ul>
            </div>
        </div>

        {{-- ========================================== --}}
        {{-- INTERACTIVE SANDBOX: KETIK ULANG KODE --}}
        {{-- ========================================== --}}
        <div class="mb-10 p-6 border-2 border-blue-200 bg-blue-50/30 rounded-xl shadow-sm">
            <h3 class="text-lg font-bold text-slate-800 mb-2 flex items-center gap-2">
                <i class="fa-solid fa-keyboard text-blue-600"></i> Coba Sendiri!
            </h3>
            <p class="text-sm text-slate-600 mb-4">
                Ketik ulang keseluruhan kode pada contoh di atas ke dalam editor di bawah ini (tidak perlu mengetik komentarnya). Biasakan jari Anda dengan sintaks Python!
            </p>

            <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 font-mono text-sm relative">
                <div class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700">
                    <span class="text-slate-400 text-xs">Terminal Editor (main.py)</span>
                    <button onclick="window.runSandbox21()" id="btnRunSandbox" class="bg-green-600 hover:bg-green-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors flex items-center gap-2 shadow-sm">
                        <i class="fa-solid fa-play"></i> Jalankan Program
                    </button>
                </div>
                
                <textarea id="editor-sandbox-21" class="w-full min-h-[160px] bg-[#1e1e1e] text-[#d4d4d4] p-5 font-mono text-sm outline-none resize-none overflow-hidden leading-relaxed" spellcheck="false" placeholder="# Ketik kode Python di sini..." oninput="window.autoResizeEditor(this)"></textarea>

                <div id="console-sandbox-21" class="hidden border-t border-slate-700 bg-black p-4 text-xs font-mono">
                    <span class="text-slate-400">> root@graflearn: python main.py</span><br>
                    <div id="sandbox-output-text" class="mt-2"></div>
                </div>
            </div>
        </div>

        {{-- OUTPUT EXPLANATION (MUNCUL SETELAH SANDBOX BERHASIL) --}}
        <div id="output-explanation-21" class="mb-12 hidden transition-all duration-700">
            <h4 class="font-bold text-slate-800 text-sm mb-2 border-b pb-2">Analisis Output Program:</h4>
            <p class="text-sm text-slate-700 mt-3 text-justify leading-relaxed">
                Berdasarkan program yang berhasil Anda jalankan, outputnya akan terlihat seperti ini: <br>
                <code class="bg-slate-100 px-2 py-1 rounded text-blue-700 font-bold block mt-2 mb-2">Daftar Simpul: ['A', 'B', 'C', 'D']</code>
                <code class="bg-slate-100 px-2 py-1 rounded text-blue-700 font-bold block mb-3">Daftar Sisi: [('A', 'B'), ('B', 'C'), ('C', 'D')]</code>
                Output tersebut membuktikan bahwa kini komputer telah menyimpan struktur graf yang utuh di dalam memorinya. Graf tersebut memiliki empat simpul (A, B, C, D) yang saling terhubung secara berurutan membentuk jalur <strong>A &rarr; B &rarr; C &rarr; D</strong>.
            </p>
        </div>

        {{-- ========================================== --}}
        {{-- AKTIVITAS 2.1: FILL IN THE BLANKS --}}
        {{-- ========================================== --}}
        <div id="activity-21-container" class="mt-12 pt-8 border-t-[3px] border-dashed border-slate-200 opacity-50 pointer-events-none transition-opacity duration-500">
            
            <div class="flex items-center gap-3 mb-6">
                <span class="bg-yellow-500 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider shadow-sm">💡 Aktivitas 2.1</span>
                <h3 class="font-bold text-slate-900 text-xl">Uji Pemahaman: Menambah Entitas Baru</h3>
            </div>

            <div class="bg-blue-50 border border-blue-200 rounded-xl p-6 mb-6 shadow-sm">
                <p class="text-sm text-blue-900 leading-relaxed text-justify mb-3">
                    <strong>Skenario:</strong> Misalkan Anda adalah developer yang sedang mengelola aplikasi rute angkot. Saat ini rute di memori komputer hanya memuat halte "Pasar" dan "Kampus". Hari ini pemerintah membangun halte baru bernama "Taman", dan ada jalan lurus yang menghubungkan "Kampus" langsung menuju ke "Taman".
                </p>
                <div class="bg-white/80 p-4 rounded border border-blue-200 font-medium text-blue-900 text-sm shadow-sm leading-relaxed">
                    <strong>Tugas Anda:</strong> Lengkapi kode di bawah ini menggunakan perintah <code class="bg-blue-100 px-1 rounded text-blue-700">append</code> yang baru saja Anda pelajari untuk menambahkan simpul halte "Taman" dan merekam sisi lintasan ("Kampus", "Taman") ke dalam memori komputer!
                </div>
            </div>

            <div class="bg-[#1e1e1e] rounded-xl overflow-hidden shadow-lg border border-slate-700 font-mono text-sm">
                <div class="bg-[#2d2d2d] px-4 py-2 flex items-center justify-between border-b border-slate-700">
                    <span class="text-slate-400 text-xs">Terminal Editor Pyodide</span>
                    <button onclick="window.runAktivitas21()" id="btnRun21" class="bg-green-600 hover:bg-green-500 text-white px-4 py-1.5 rounded text-xs font-bold transition-colors flex items-center gap-2">
                        <i class="fa-solid fa-play"></i> Cek Jawaban
                    </button>
                </div>
                
                <div class="p-6 leading-relaxed text-[#d4d4d4] overflow-x-auto whitespace-nowrap">
                    <div><span class="text-[#9cdcfe]">simpul_rute</span> = [<span class="text-[#ce9178]">"Pasar"</span>, <span class="text-[#ce9178]">"Kampus"</span>]</div>
                    <div class="mb-4"><span class="text-[#9cdcfe]">sisi_rute</span> = [(<span class="text-[#ce9178]">"Pasar"</span>, <span class="text-[#ce9178]">"Kampus"</span>)]</div>

                    <div class="text-[#6a9955]"># Tulis kode Anda di bawah ini:</div>
                    
                    <div class="flex items-center">
                        <span class="text-[#9cdcfe]">simpul_rute</span>.<input type="text" id="input21_1" class="bg-[#3c3c3c] text-[#dcdcaa] border border-slate-600 rounded px-1.5 py-0.5 mx-1 w-24 outline-none focus:border-blue-400 focus:bg-[#2d2d2d] text-center transition-colors" autocomplete="off" spellcheck="false">(<span class="text-[#ce9178]">"Taman"</span>)
                    </div>
                    
                    <div class="flex items-center mt-1">
                        <span class="text-[#9cdcfe]">sisi_rute</span>.<input type="text" id="input21_2" class="bg-[#3c3c3c] text-[#dcdcaa] border border-slate-600 rounded px-1.5 py-0.5 mx-1 w-24 outline-none focus:border-blue-400 focus:bg-[#2d2d2d] text-center transition-colors" autocomplete="off" spellcheck="false">((<input type="text" id="input21_3" class="bg-[#3c3c3c] text-[#ce9178] border border-slate-600 rounded px-1.5 py-0.5 mx-1 w-28 outline-none focus:border-blue-400 focus:bg-[#2d2d2d] text-center transition-colors" placeholder='"..."' autocomplete="off" spellcheck="false">, <input type="text" id="input21_4" class="bg-[#3c3c3c] text-[#ce9178] border border-slate-600 rounded px-1.5 py-0.5 mx-1 w-28 outline-none focus:border-blue-400 focus:bg-[#2d2d2d] text-center transition-colors" placeholder='"..."' autocomplete="off" spellcheck="false">))
                    </div>

                    <div class="mt-4"><span class="text-[#dcdcaa]">print</span>(simpul_rute)</div>
                    <div><span class="text-[#dcdcaa]">print</span>(sisi_rute)</div>
                </div>

                <div id="console-output-21" class="hidden border-t border-slate-700 bg-black p-4 text-xs font-mono">
                    <span class="text-slate-400">> root@graflearn: python main.py</span><br>
                    <div id="console-text-21" class="mt-2 text-[#4af626]"></div>
                </div>
            </div>

            <div id="alert-21" class="hidden mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border transition-all"></div>

            <div id="feedback-edukatif-21" class="hidden mt-4 bg-green-50 border border-green-200 p-5 rounded-xl shadow-sm">
                <h4 class="font-bold text-green-900 mb-2 flex items-center gap-2">
                    <i class="fa-solid fa-lightbulb text-yellow-500"></i> Penjelasan Sintaks
                </h4>
                <p class="text-sm text-green-800 leading-relaxed text-justify mb-2">
                    Luar biasa! Anda telah memahami konsep penambahan data pada graf.
                </p>
                <ul class="list-disc list-outside ml-4 text-sm text-green-800 space-y-1">
                    <li>Karena simpul hanya butuh satu entitas tunggal, formatnya adalah string biasa: <code class="bg-green-200 px-1 rounded">"Taman"</code>.</li>
                    <li>Namun, karena sisi (edge) <strong>menghubungkan dua lokasi</strong>, formatnya harus dibungkus dalam sebuah <em>Tuple</em> (pasangan data yang tidak bisa dipisah): <code class="bg-green-200 px-1 rounded">("Kampus", "Taman")</code>.</li>
                </ul>
            </div>

        </div>

        {{-- Navigasi Bawah --}}
        <div class="flex justify-between gap-4 mt-12 pt-6 border-t border-slate-200">
            <button type="button" onclick="prevStep()" class="px-6 py-2.5 rounded-lg border border-slate-300 font-bold text-slate-600 hover:bg-slate-50 transition">
                Kembali
            </button>
            <button type="button" id="btnNext21" onclick="nextStep()" class="px-6 py-2.5 bg-slate-900 hover:bg-slate-800 text-white font-bold rounded-lg shadow-md transition-all active:scale-95 opacity-50 cursor-not-allowed" disabled>
                Lanjut
            </button>
        </div>

    </div>

    <script>
        window.autoResizeEditor = function(el) {
            if(!el) return;
            el.style.height = 'auto'; 
            if (el.scrollHeight > 0) {
                el.style.height = el.scrollHeight + 'px'; 
            } else {
                const lineCount = (el.value.match(/\n/g) || []).length + 1;
                el.style.height = (lineCount * 24 + 40) + 'px'; 
            }
        };

        window.net_isolasi_21 = null;

        document.addEventListener("DOMContentLoaded", function() {
            // ==========================================
            // 1. INIT GRAF VISUAL A-B-C (TIDAK ADA LAGI BOLD: TRUE)
            // ==========================================
            const nodes = new vis.DataSet([
                { id: 'A', label: 'A', x: -100, y: 0, color: { background: '#3b82f6', border: '#2563eb', highlight: { background: '#f59e0b', border: '#d97706' }, hover: { background: '#60a5fa', border: '#3b82f6' } }, font: { color: 'white', size: 18, face: 'Arial' }, fixed: { x: false, y: false } },
                { id: 'B', label: 'B', x: 0, y: 0, color: { background: '#3b82f6', border: '#2563eb', highlight: { background: '#f59e0b', border: '#d97706' }, hover: { background: '#60a5fa', border: '#3b82f6' } }, font: { color: 'white', size: 18, face: 'Arial' }, fixed: { x: false, y: false } },
                { id: 'C', label: 'C', x: 100, y: 0, color: { background: '#3b82f6', border: '#2563eb', highlight: { background: '#f59e0b', border: '#d97706' }, hover: { background: '#60a5fa', border: '#3b82f6' } }, font: { color: 'white', size: 18, face: 'Arial' }, fixed: { x: false, y: false } }
            ]);

            const edges = new vis.DataSet([
                { id: 'e1', from: 'A', to: 'B', color: { color: '#94a3b8', hover: '#cbd5e1', highlight: '#f59e0b' }, width: 3 },
                { id: 'e2', from: 'B', to: 'C', color: { color: '#94a3b8', hover: '#cbd5e1', highlight: '#f59e0b' }, width: 3 }
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
                nodes: { shape: 'circle', margin: 12, borderWidth: 2 },
                edges: { smooth: { enabled: false } }
            };

            if(container) {
                try {
                    window.net_isolasi_21 = new vis.Network(container, { nodes, edges }, options);

                    // ==========================================
                    // SISTEM OBSERVER ANTI-NYANGKUT SAAT GANTI SLIDE
                    // ==========================================
                    const observer21 = new IntersectionObserver((entries) => {
                        if(entries[0].isIntersecting && window.net_isolasi_21) {
                            // Tunggu 50ms agar CSS slider benar-benar selesai
                            setTimeout(() => {
                                window.net_isolasi_21.setSize('100%', '200px');
                                window.net_isolasi_21.redraw();
                                window.net_isolasi_21.fit({ animation: false });
                            }, 50);
                        }
                    });
                    observer21.observe(container);

                    // Event Listener Info Panel
                    const infoPanel = document.getElementById('graf-info-panel');

                    window.net_isolasi_21.on("selectNode", function (params) {
                        const nodeId = params.nodes[0];
                        infoPanel.innerHTML = `<div><span class="text-blue-800 font-bold block mb-1">Anda Memilih Simpul (Vertex)</span>Dalam kode Python, simpul ini ditulis sebagai String <span class="bg-white border border-blue-200 px-2 py-0.5 rounded text-blue-600 font-mono shadow-sm mx-1">'${nodeId}'</span> yang disimpan di dalam <strong>List</strong>.</div>`;
                        infoPanel.className = "w-full mt-4 p-3 bg-blue-100 border border-blue-300 rounded-lg text-sm text-blue-800 text-center transition-all min-h-[50px] flex items-center justify-center scale-[1.02]";
                        setTimeout(() => { infoPanel.classList.remove('scale-[1.02]'); }, 200);
                    });

                    window.net_isolasi_21.on("selectEdge", function (params) {
                        if (params.nodes.length === 0) { 
                            const edgeId = params.edges[0];
                            const edgeData = edges.get(edgeId);
                            infoPanel.innerHTML = `<div><span class="text-indigo-800 font-bold block mb-1">Anda Memilih Sisi (Edge)</span>Menghubungkan <strong>${edgeData.from}</strong> dan <strong>${edgeData.to}</strong>. Dalam Python ditulis sebagai Tuple <span class="bg-white border border-indigo-200 px-2 py-0.5 rounded text-indigo-600 font-mono shadow-sm mx-1">('${edgeData.from}', '${edgeData.to}')</span>.</div>`;
                            infoPanel.className = "w-full mt-4 p-3 bg-indigo-50 border border-indigo-200 rounded-lg text-sm text-indigo-800 text-center transition-all min-h-[50px] flex items-center justify-center scale-[1.02]";
                            setTimeout(() => { infoPanel.classList.remove('scale-[1.02]'); }, 200);
                        }
                    });

                    const resetPanel = function() {
                        infoPanel.innerHTML = `<em><i class="fa-solid fa-hand-pointer text-blue-400 mr-1"></i> Klik salah satu titik (simpul) atau garis (sisi) untuk melihat representasi kodenya.</em>`;
                        infoPanel.className = "w-full mt-4 p-3 bg-blue-50/50 border border-blue-200 rounded-lg text-sm text-slate-600 text-center transition-all min-h-[50px] flex items-center justify-center";
                    };

                    window.net_isolasi_21.on("deselectNode", function (params) { if(params.edges.length === 0) resetPanel(); });
                    window.net_isolasi_21.on("deselectEdge", function (params) { if(params.nodes.length === 0) resetPanel(); });

                } catch (error) {
                    console.error("Gagal memuat VisJS 2.1 Isolasi:", error);
                }
            }


            const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
            
            const savedSandboxCode = localStorage.getItem('sandbox_2_1_code_' + userId);
            if(localStorage.getItem('sandbox_2_1_done_' + userId) === 'true') {
                document.getElementById('output-explanation-21').classList.remove('hidden');
                document.getElementById('activity-21-container').classList.remove('opacity-50', 'pointer-events-none');
                
                const editor = document.getElementById('editor-sandbox-21');
                if(savedSandboxCode) {
                    editor.value = savedSandboxCode; 
                } else {
                    editor.value = "nodes = ['A', 'B', 'C']\nedges = [('A', 'B'), ('B', 'C')]\n\nnodes.append('D')\nedges.append(('C', 'D'))\n\nprint(\"Daftar Simpul:\", nodes)\nprint(\"Daftar Sisi:\", edges)";
                }
                
                setTimeout(() => window.autoResizeEditor(editor), 100);
            }

            const keyDone = 'act_2_1_done_user_' + userId;
            const isDoneServer = {{ isset($progress['2.1']) && $progress['2.1']->score == 100 ? 'true' : 'false' }};
            const isDoneLocal = localStorage.getItem(keyDone) === 'true';

            if(isDoneServer || isDoneLocal) {
                window.kunciJawaban21();
            }
        });

        window.runSandbox21 = function() {
            const editor = document.getElementById('editor-sandbox-21');
            const code = editor.value; 
            const consoleBox = document.getElementById('console-sandbox-21');
            const outputText = document.getElementById('sandbox-output-text');
            const explanation = document.getElementById('output-explanation-21');
            const actContainer = document.getElementById('activity-21-container');
            const btnRunSandbox = document.getElementById('btnRunSandbox');

            consoleBox.classList.remove('hidden');

            if(code.trim() === "") {
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

            if(hasNodesInit && hasEdgesInit && hasAppendNode && hasAppendEdge && hasPrintNodes && hasPrintEdges) {
                outputText.className = "text-[#4af626]"; 
                outputText.innerHTML = "Daftar Simpul: ['A', 'B', 'C', 'D']<br>Daftar Sisi: [('A', 'B'), ('B', 'C'), ('C', 'D')]";
                
                btnRunSandbox.innerHTML = '<i class="fa-solid fa-check"></i> Program Berhasil';
                btnRunSandbox.classList.replace('bg-green-600', 'bg-emerald-600');
                
                const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                localStorage.setItem('sandbox_2_1_done_' + userId, 'true');
                localStorage.setItem('sandbox_2_1_code_' + userId, code); 

                explanation.classList.remove('hidden');
                actContainer.classList.remove('opacity-50', 'pointer-events-none');
                
                setTimeout(() => {
                    explanation.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }, 300);

            } else {
                outputText.className = "text-[#ffbd2e]"; 
                outputText.innerHTML = "Program gagal dieksekusi atau tidak lengkap.<br>Pastikan Anda mengetik <strong>keseluruhan kode</strong> mulai dari pembuatan variabel (<code>nodes</code> dan <code>edges</code>), perintah <code>append()</code>, hingga perintah <code>print()</code> persis seperti contoh di atas.";
                
                btnRunSandbox.innerHTML = '<i class="fa-solid fa-rotate-right"></i> Coba Lagi';
            }
        }

        window.runAktivitas21 = function() {
            const i1 = document.getElementById('input21_1').value.trim().toLowerCase();
            const i2 = document.getElementById('input21_2').value.trim().toLowerCase();
            let i3 = document.getElementById('input21_3').value.trim().toLowerCase().replace(/['"]/g, '');
            let i4 = document.getElementById('input21_4').value.trim().toLowerCase().replace(/['"]/g, '');

            const alertBox = document.getElementById('alert-21');
            const consoleBox = document.getElementById('console-output-21');
            const consoleText = document.getElementById('console-text-21');

            if(!i1 || !i2 || !i3 || !i4) {
                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-yellow-50 text-yellow-800 border-yellow-200";
                alertBox.innerHTML = "⚠️ Error: Syntax Tidak Lengkap. Masih ada bagian kode yang kosong.";
                alertBox.classList.remove('hidden');
                consoleBox.classList.add('hidden');
                return;
            }

            let isCorrect = false;
            
            if(i1 === 'append' && i2 === 'append') {
                if((i3 === 'kampus' && i4 === 'taman') || (i3 === 'taman' && i4 === 'kampus')) {
                    isCorrect = true;
                }
            }

            if(isCorrect) {
                const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                localStorage.setItem('act_2_1_done_user_' + userId, 'true');

                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-green-50 text-green-800 border-green-400";
                alertBox.innerHTML = "✅ Kompilasi Berhasil! Anda telah menguasai cara menambah simpul dan sisi ke dalam array/list.";
                alertBox.classList.remove('hidden');

                consoleBox.classList.remove('hidden');
                consoleText.className = "mt-2 text-[#4af626]";
                consoleText.innerHTML = "['Pasar', 'Kampus', 'Taman']<br>[('Pasar', 'Kampus'), ('Kampus', 'Taman')]";

                window.kunciJawaban21();

                if (typeof simpanProgressAktivitas === 'function') {
                    simpanProgressAktivitas('bab2', '2.1', 100);
                }

            } else {
                alertBox.className = "mt-4 p-4 rounded-lg text-sm font-bold shadow-sm border bg-red-50 text-red-800 border-red-300 animate-pulse";
                alertBox.innerHTML = "❌ SyntaxError: Terdapat kesalahan. Pastikan Anda menggunakan fungsi 'append' dan menuliskan nama rutenya dengan benar.";
                alertBox.classList.remove('hidden');
                
                consoleBox.classList.remove('hidden');
                consoleText.className = "mt-2 text-[#ff5f56]";
                consoleText.innerHTML = "Traceback (most recent call last):<br>&nbsp;&nbsp;File \"main.py\", line 5<br>AttributeError: 'list' object has no attribute or Invalid Syntax.";
            }
        }

        window.kunciJawaban21 = function() {
            const inputs = ['input21_1', 'input21_2', 'input21_3', 'input21_4'];
            const correctValues = ['append', 'append', '"Kampus"', '"Taman"'];

            inputs.forEach((id, idx) => {
                const el = document.getElementById(id);
                if(el) {
                    el.value = correctValues[idx];
                    el.disabled = true;
                    el.classList.remove('bg-[#3c3c3c]', 'text-[#dcdcaa]', 'text-[#ce9178]', 'border-slate-600');
                    el.classList.add('bg-emerald-600', 'text-white', 'border-emerald-500', 'font-bold', 'cursor-not-allowed', 'shadow-inner');
                }
            });

            const btnRun = document.getElementById('btnRun21');
            if(btnRun) {
                btnRun.innerHTML = '<i class="fa-solid fa-check"></i> Diselesaikan';
                btnRun.classList.replace('bg-green-600', 'bg-slate-600');
                btnRun.classList.replace('hover:bg-green-500', 'cursor-not-allowed');
                btnRun.disabled = true;
            }

            document.getElementById('feedback-edukatif-21').classList.remove('hidden');

            const btnNext = document.getElementById('btnNext21');
            if(btnNext) {
                btnNext.disabled = false;
                btnNext.classList.remove('opacity-50', 'cursor-not-allowed');
            }
        }
    </script>
</section>