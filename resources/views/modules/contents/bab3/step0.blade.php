<section id="step-0" class="step-slide step-active">
    {{-- Import Vis.js untuk visualisasi --}}
    <script type="text/javascript" src="https://unpkg.com/vis-network/standalone/umd/vis-network.min.js"></script>

    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-8 md:p-10 max-w-6xl mx-auto">

        {{-- JUDUL UTAMA  --}}
        <h2 class="text-2xl md:text-3xl font-bold mb-6 text-slate-900 border-b border-slate-100 pb-4">
            Materi 3: Penelusuran Graf (Graph Traversal)
        </h2>

        {{-- BAGIAN ATAS: Narasi & Gambar (Grid Rasio 7:5) --}}
        <div class="grid md:grid-cols-12 gap-8 items-start">

            {{-- Kolom Kiri: Narasi Paragraf (Lebar 7 Kolom) --}}
            <div class="md:col-span-7 flex flex-col justify-start">
                <div class="prose prose-slate text-slate-600 leading-relaxed text-justify mt-1">
                    <p class="mb-4">
                        Saat komputer ditugaskan mencari data di dalam graf, ia tidak bisa melihat keseluruhan peta
                        sekaligus seperti mata manusia. Komputer harus bergerak merayap selangkah demi selangkah. Proses
                        penjelajahan sistematis inilah yang dinamakan <strong>Penelusuran Graf (<em>Graph
                                Traversal</em>)</strong>.
                    </p>
                    <p class="mb-2">
                        Terdapat dua "gaya" algoritma utama yang digunakan mesin komputer dalam menelusuri data. Agar
                        lebih mudah memahaminya, bayangkan Anda adalah seorang kapten kelotok (perahu) di Banjarmasin
                        yang sedang mendata dermaga di jaringan sungai:
                    </p>
                    <ul class="list-disc pl-5 space-y-2 text-sm md:text-base text-slate-700 mb-4">
                        <li>
                            <strong>Breadth-First Search (BFS) / Menyapu Melebar:</strong> Anda mendatangi seluruh
                            dermaga di sepanjang sungai utama terlebih dahulu secara merata, baru kemudian berbelok
                            masuk mengecek anak-anak sungai.
                        </li>
                        <li>
                            <strong>Depth-First Search (DFS) / Menelusuri Mendalam:</strong> Anda menyusuri satu cabang
                            anak sungai terus-menerus sampai mentok di ujung jalan buntu, barulah Anda putar balik
                            (<em>backtrack</em>) untuk mencoba cabang yang lain.
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Kolom Kanan: Gambar Interaktif Animasi Graf (Lebar 5 Kolom) --}}
            <div
                class="md:col-span-5 rounded-xl overflow-hidden shadow-lg border border-slate-200 relative group min-h-[350px] bg-slate-900 flex flex-col">

                {{-- Container Graf Vis.js --}}
                <div id="traversal-vis" class="w-full h-full absolute inset-0 cursor-crosshair z-10 bg-slate-50"></div>

                {{-- Panel Kontrol Simulasi & Gradient Bawah --}}
                <div
                    class="absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-slate-900 to-transparent z-20 pointer-events-none flex flex-col justify-end p-4">
                    <!-- Teks kecil petunjuk -->
                    <p class="text-slate-500 text-[10px] text-center mb-40 opacity-150">
                        Klik button dibawah untuk melihat perbedaan
                    </p>
                    <div class="flex justify-center gap-3 mb-2 pointer-events-auto relative z-30">
                        <button id="btn-bfs" onclick="showBFS()"
                            class="px-4 py-1.5 bg-blue-600 text-white text-xs font-bold rounded shadow-sm border border-blue-400 hover:bg-blue-500 transition-colors">
                            Simulasi BFS
                        </button>
                        <button id="btn-dfs" onclick="showDFS()"
                            class="px-4 py-1.5 bg-slate-700 text-slate-200 text-xs font-bold rounded shadow-sm border border-slate-500 hover:bg-orange-600 hover:text-white transition-colors">
                            Simulasi DFS
                        </button>
                    </div>
                    <p id="traversal-desc" class="text-slate-200 text-[11px] text-center leading-relaxed font-medium">
                        <span class="text-black-400 font-bold">BFS (Melebar):</span> Menyapu semua simpul di level
                        terdekat secara merata.
                    </p>
                </div>
            </div>

        </div>

        {{-- BAGIAN TENGAH: Tujuan Pembelajaran (Full Width membentang) --}}
        <div class="mt-10 bg-blue-50/40 p-6 rounded-xl border border-blue-100">
            <p class="text-slate-700 mb-4 text-justify">
                Pada materi ini, kita akan membongkar logika kedua "mesin" tersebut dan mempraktikkan langsung bagaimana
                menuliskannya ke dalam kode Python.
            </p>

            <h3 class="text-lg font-bold text-slate-900 mb-3 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Tujuan Pembelajaran
            </h3>

            <p class="text-sm text-slate-600 mb-3">Setelah menyelesaikan materi ini, mahasiswa diharapkan mampu:</p>
            <ul class="list-disc list-outside ml-5 text-sm text-slate-700 space-y-2">
                <li>Membedakan logika kerja dan mekanisme struktur data penyusun antara algoritma BFS
                    dan DFS.</li>
                <li>Mengimplementasikan algoritma BFS menggunakan logika struktur data antrean
                    (<em>Queue: First-In First-Out</em>).</li>
                <li>Mengimplementasikan algoritma DFS menggunakan logika struktur data tumpukan
                    (<em>Stack: Last-In First-Out</em>).</li>
            </ul>
        </div>

        {{-- BAGIAN BAWAH: Navigasi --}}
        <div class="mt-8 pt-6 border-t border-slate-100 flex justify-end">
            <button onclick="nextStep()"
                class="group bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 px-6 rounded-lg transition-all duration-300 shadow-sm flex items-center gap-2">
                Mulai Belajar
            </button>
        </div>

    </div>

    {{-- SCRIPT LOGIKA VISUALISASI TRAVERSAL --}}
    <script>
        let traversalNet = null;
        let tNodes = null;
        let tEdges = null;

        function initTraversalGraph() {
            const container = document.getElementById('traversal-vis');
            if (!container || traversalNet) return;

            // Membuat node dengan struktur pohon (Hierarchical)
            tNodes = new vis.DataSet([{
                    id: 1,
                    label: '1',
                    level: 0
                },
                {
                    id: 2,
                    label: '2',
                    level: 1
                },
                {
                    id: 3,
                    label: '3',
                    level: 1
                },
                {
                    id: 4,
                    label: '4',
                    level: 2
                },
                {
                    id: 5,
                    label: '5',
                    level: 2
                },
                {
                    id: 6,
                    label: '6',
                    level: 2
                },
                {
                    id: 7,
                    label: '7',
                    level: 2
                }
            ]);

            tEdges = new vis.DataSet([{
                    id: 'e12',
                    from: 1,
                    to: 2
                },
                {
                    id: 'e13',
                    from: 1,
                    to: 3
                },
                {
                    id: 'e24',
                    from: 2,
                    to: 4
                },
                {
                    id: 'e25',
                    from: 2,
                    to: 5
                },
                {
                    id: 'e36',
                    from: 3,
                    to: 6
                },
                {
                    id: 'e37',
                    from: 3,
                    to: 7
                }
            ]);

            const options = {
                physics: false,
                interaction: {
                    dragNodes: false,
                    dragView: false,
                    zoomView: false,
                    hover: false,
                    selectable: false
                },
                layout: {
                    hierarchical: {
                        enabled: true,
                        direction: 'UD',
                        sortMethod: 'directed',
                        levelSeparation: 60,
                        nodeSpacing: 60
                    }
                },
                nodes: {
                    shape: 'dot',
                    size: 16,
                    font: {
                        color: 'white',
                        size: 12,
                        bold: true
                    },
                    borderWidth: 2
                },
                edges: {
                    width: 2,
                    smooth: {
                        type: 'cubicBezier',
                        forceDirection: 'vertical',
                        roundness: 0.4
                    }
                }
            };

            traversalNet = new vis.Network(container, {
                nodes: tNodes,
                edges: tEdges
            }, options);
            traversalNet.once('afterDrawing', function() {
                traversalNet.fit({
                    animation: false
                });
            });

            // Tampilkan BFS secara default saat pertama diload
            showBFS();
        }

        // Fungsi Menampilkan Visual BFS
        window.showBFS = function() {
            if (!tNodes) return;
            const colorBFS = {
                background: '#3b82f6',
                border: '#1d4ed8'
            }; // Biru
            const colorGray = {
                background: '#cbd5e1',
                border: '#94a3b8'
            }; // Abu-abu

            tNodes.update([{
                    id: 1,
                    color: colorBFS
                }, {
                    id: 2,
                    color: colorBFS
                }, {
                    id: 3,
                    color: colorBFS
                },
                {
                    id: 4,
                    color: colorGray
                }, {
                    id: 5,
                    color: colorGray
                }, {
                    id: 6,
                    color: colorGray
                }, {
                    id: 7,
                    color: colorGray
                }
            ]);
            tEdges.update([{
                    id: 'e12',
                    color: '#3b82f6',
                    width: 3
                }, {
                    id: 'e13',
                    color: '#3b82f6',
                    width: 3
                },
                {
                    id: 'e24',
                    color: '#cbd5e1',
                    width: 2
                }, {
                    id: 'e25',
                    color: '#cbd5e1',
                    width: 2
                },
                {
                    id: 'e36',
                    color: '#cbd5e1',
                    width: 2
                }, {
                    id: 'e37',
                    color: '#cbd5e1',
                    width: 2
                }
            ]);

            // Update styling tombol
            document.getElementById('btn-bfs').className =
                "px-4 py-1.5 bg-blue-600 text-white text-xs font-bold rounded shadow-sm border border-blue-400";
            document.getElementById('btn-dfs').className =
                "px-4 py-1.5 bg-slate-700 text-slate-200 text-xs font-bold rounded shadow-sm border border-slate-500 hover:bg-orange-600 hover:text-white transition-colors";
            document.getElementById('traversal-desc').innerHTML =
                '<span class="text-blue-400 font-bold">BFS (Melebar):</span> Menyapu semua simpul di level terdekat secara merata.';
        }

        // Fungsi Menampilkan Visual DFS
        window.showDFS = function() {
            if (!tNodes) return;
            const colorDFS = {
                background: '#f97316',
                border: '#c2410c'
            }; // Oranye
            const colorGray = {
                background: '#cbd5e1',
                border: '#94a3b8'
            }; // Abu-abu

            tNodes.update([{
                    id: 1,
                    color: colorDFS
                }, {
                    id: 2,
                    color: colorDFS
                }, {
                    id: 3,
                    color: colorGray
                },
                {
                    id: 4,
                    color: colorDFS
                }, {
                    id: 5,
                    color: colorGray
                }, {
                    id: 6,
                    color: colorGray
                }, {
                    id: 7,
                    color: colorGray
                }
            ]);
            tEdges.update([{
                    id: 'e12',
                    color: '#f97316',
                    width: 3
                }, {
                    id: 'e13',
                    color: '#cbd5e1',
                    width: 2
                },
                {
                    id: 'e24',
                    color: '#f97316',
                    width: 3
                }, {
                    id: 'e25',
                    color: '#cbd5e1',
                    width: 2
                },
                {
                    id: 'e36',
                    color: '#cbd5e1',
                    width: 2
                }, {
                    id: 'e37',
                    color: '#cbd5e1',
                    width: 2
                }
            ]);

            // Update styling tombol
            document.getElementById('btn-dfs').className =
                "px-4 py-1.5 bg-orange-600 text-white text-xs font-bold rounded shadow-sm border border-orange-400";
            document.getElementById('btn-bfs').className =
                "px-4 py-1.5 bg-slate-700 text-slate-200 text-xs font-bold rounded shadow-sm border border-slate-500 hover:bg-blue-600 hover:text-white transition-colors";
            document.getElementById('traversal-desc').innerHTML =
                '<span class="text-orange-400 font-bold">DFS (Mendalam):</span> Menembus satu cabang hingga ujung (jalan buntu).';
        }

        document.addEventListener("DOMContentLoaded", function() {
            // Beri sedikit jeda agar kontainer siap sebelum merender graf
            setTimeout(initTraversalGraph, 500);
        });
    </script>
</section>
