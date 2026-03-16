<section id="step-0" class="step-slide step-active">
    {{-- Import Vis.js untuk visualisasi --}}
    <script type="text/javascript" src="https://unpkg.com/vis-network/standalone/umd/vis-network.min.js"></script>

    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-8 md:p-10 max-w-6xl mx-auto">

        {{-- JUDUL UTAMA  --}}
        <h2 class="text-2xl md:text-3xl font-bold mb-6 text-slate-900 border-b border-slate-100 pb-4">
            Materi 4: Algoritma Jalur Terpendek (Dijkstra)
        </h2>

        {{-- BAGIAN ATAS: Narasi & Gambar (Grid Rasio 7:5) --}}
        <div class="grid md:grid-cols-12 gap-8 items-start">

            {{-- Kolom Kiri: Narasi Paragraf (Lebar 7 Kolom) --}}
            <div class="md:col-span-7 flex flex-col justify-start">
                <div class="prose prose-slate text-slate-600 leading-relaxed text-justify mt-1 max-w-none">
                    <p class="mb-4">
                        Pada materi sebelumnya, Anda telah belajar bahwa algoritma <em>Breadth-First Search</em> (BFS) sangat hebat dalam mencari target. Namun, BFS memiliki satu kelemahan fatal di dunia nyata: <strong>BFS menganggap semua jalan memiliki jarak dan waktu tempuh yang persis sama.</strong>
                    </p>
                    <p class="mb-4">
                        Bayangkan Anda berada di Kayutangi dan ingin menuju Duta Mall. Jika menggunakan logika BFS murni, komputer mungkin akan menyuruh Anda lewat jalan pintas karena jumlah belokannya lebih sedikit (hanya 1 ruas jalan). Padahal, jalan pintas tersebut macet total dan memakan waktu 60 menit. Sementara itu, ada jalan raya memutar yang melewati 3 ruas jalan, tapi sangat lancar dan bisa ditempuh hanya dalam 25 menit.
                    </p>
                    <p class="mb-4">
                        Bagaimana cara kita mengajari komputer untuk tidak sekadar mencari jalan dengan "belokan paling sedikit", melainkan jalan dengan <strong>"total bobot (waktu/jarak) paling kecil"</strong>?
                    </p>
                    <p class="mb-2">
                        Di sinilah <strong>Algoritma Dijkstra</strong> hadir sebagai pahlawan. Diciptakan oleh ilmuwan komputer legendaris Edsger W. Dijkstra pada tahun 1956, algoritma ini menjadi fondasi utama dari seluruh aplikasi navigasi modern yang Anda gunakan hari ini (seperti Google Maps).
                    </p>
                </div>
            </div>

            {{-- Kolom Kanan: Gambar Interaktif (Dipisah Fisik Atas-Bawah Anti Tumpang Tindih) --}}
            <div class="md:col-span-5 rounded-xl overflow-hidden shadow-lg border border-slate-200 relative flex flex-col h-[480px] bg-slate-50">

                {{-- RUANG ATAS: Container Graf Vis.js (DIKUNCI MATI) --}}
                <div id="dijkstra-vis" class="w-full absolute inset-x-0 top-0 bottom-[140px] z-10 focus:outline-none"></div>

                {{-- RUANG BAWAH: Panel Kontrol Solid (TIDAK MELAYANG, TAPI TERPISAH) --}}
                <div class="absolute inset-x-0 bottom-0 h-[140px] bg-slate-900 border-t-4 border-blue-500 p-4 z-20 flex flex-col justify-center">
                    <p class="text-slate-400 text-[10px] text-center mb-2 uppercase tracking-widest font-bold">
                        Pilih Logika Pencarian Rute
                    </p>
                    <div class="flex justify-center gap-3 mb-3">
                        <button id="btn-mode-bfs" onclick="showBFSMode()"
                            class="px-5 py-2 bg-blue-600 text-white text-xs font-bold rounded-lg shadow-md hover:bg-blue-500 transition-all active:scale-95">
                            Logika BFS
                        </button>
                        <button id="btn-mode-dijkstra" onclick="showDijkstraMode()"
                            class="px-5 py-2 bg-slate-800 text-slate-300 text-xs font-bold rounded-lg shadow-md border border-slate-600 hover:bg-emerald-600 hover:text-white transition-all active:scale-95">
                            Logika Dijkstra
                        </button>
                    </div>
                    <div class="bg-black/40 py-2 px-3 rounded text-center border border-slate-700 h-[44px] flex items-center justify-center">
                        <p id="route-desc" class="text-slate-200 text-[11px] leading-relaxed font-medium m-0">
                            </p>
                    </div>
                </div>
            </div>

        </div>

        {{-- BAGIAN TENGAH: Tujuan Pembelajaran --}}
        <div class="mt-10 bg-emerald-50/40 p-6 md:p-8 rounded-xl border border-emerald-100 shadow-sm">
            <h3 class="text-lg font-bold text-slate-900 mb-4 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-600" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Tujuan Pembelajaran
            </h3>

            <p class="text-sm text-slate-600 mb-4 font-medium">Setelah mempelajari bab ini, mahasiswa diharapkan mampu:</p>
            <ul class="list-none space-y-3 text-sm md:text-base text-slate-700">
                <li class="flex items-start gap-3">
                    <span class="bg-emerald-100 text-emerald-700 font-bold w-6 h-6 rounded-full flex items-center justify-center shrink-0 mt-0.5 text-xs">1</span>
                    <span class="leading-relaxed">Mengimplementasikan struktur data Graf Berbobot (<em>Weighted Graph</em>) menggunakan memori <em>Nested Dictionary</em>.</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="bg-emerald-100 text-emerald-700 font-bold w-6 h-6 rounded-full flex items-center justify-center shrink-0 mt-0.5 text-xs">2</span>
                    <span class="leading-relaxed">Menganalisis penggunaan nilai tak terhingga (<em>Infinity</em>) sebagai fondasi awal komputasi pencarian nilai minimum.</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="bg-emerald-100 text-emerald-700 font-bold w-6 h-6 rounded-full flex items-center justify-center shrink-0 mt-0.5 text-xs">3</span>
                    <span class="leading-relaxed">Membangun dan merakit logika inti Algoritma Dijkstra (<em>Relaxation</em>) untuk memecahkan masalah rute terpendek di dunia nyata.</span>
                </li>
            </ul>
        </div>

        {{-- BAGIAN BAWAH: Navigasi --}}
        <div class="mt-8 pt-6 border-t border-slate-100 flex justify-end">
            <button onclick="nextStep()"
                class="group bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 px-6 rounded-lg transition-all duration-300 shadow-sm flex items-center gap-2 active:scale-95">
                Mulai Belajar <i class="fa-solid fa-arrow-right ml-1 group-hover:translate-x-1 transition-transform"></i>
            </button>
        </div>

    </div>

    {{-- SCRIPT LOGIKA VISUALISASI (LOCKED & JALUR AMAN) --}}
    <script>
        let routeNet = null;
        let rNodes = null;
        let rEdges = null;

        function initRouteGraph() {
            const container = document.getElementById('dijkstra-vis');
            if (!container || routeNet) return;

            // Membuat Node: Membentuk lengkungan (C dan D ditaruh di atas)
            // Fitur 'fixed: true' mencegah node digeser sama sekali.
            rNodes = new vis.DataSet([
                { id: 'A', label: 'A\n(Awal)', x: -160, y: 70, fixed: true, color: { background: '#1e293b', border: '#0f172a' }, font: { color: 'white', size: 13, bold: true } },
                { id: 'B', label: 'B\n(Tujuan)', x: 160, y: 70, fixed: true, color: { background: '#1e293b', border: '#0f172a' }, font: { color: 'white', size: 13, bold: true } },
                
                // C dan D ditaruh di atas, membentuk jembatan agar tidak menabrak garis bawah
                { id: 'C', label: 'C\n(Jalur 1)', x: -70, y: -70, fixed: true, color: { background: '#f8fafc', border: '#cbd5e1' }, font: { color: '#475569', size: 11, bold: true } },
                { id: 'D', label: 'D\n(Jalur 2)', x: 70, y: -70, fixed: true, color: { background: '#f8fafc', border: '#cbd5e1' }, font: { color: '#475569', size: 11, bold: true } },
                
                // Dummy node transparan untuk mengunci viewport kamera agar selalu pas di tengah
                { id: 'd_top', x: 0, y: -120, fixed: true, hidden: true },
                { id: 'd_bot', x: 0, y: 120, fixed: true, hidden: true }
            ]);

            // Membuat Rute (Garis Lurus tegas agar jelas arahnya)
            rEdges = new vis.DataSet([
                // Jalur Bawah (Macet)
                { id: 'eAB', from: 'A', to: 'B', label: '60 Menit', font: { size: 14, align: 'bottom', strokeWidth: 4, strokeColor: '#ffffff', color: '#ef4444', bold: true }, width: 2, color: '#cbd5e1', arrows: 'to', smooth: false },
                
                // Jalur Atas (Lancar)
                { id: 'eAC', from: 'A', to: 'C', label: '10 Mnt', font: { size: 12, align: 'top', strokeWidth: 4, strokeColor: '#ffffff', color: '#64748b', bold: true }, width: 2, color: '#cbd5e1', arrows: 'to', smooth: false },
                { id: 'eCD', from: 'C', to: 'D', label: '5 Mnt', font: { size: 12, align: 'top', strokeWidth: 4, strokeColor: '#ffffff', color: '#64748b', bold: true }, width: 2, color: '#cbd5e1', arrows: 'to', smooth: false },
                { id: 'eDB', from: 'D', to: 'B', label: '10 Mnt', font: { size: 12, align: 'top', strokeWidth: 4, strokeColor: '#ffffff', color: '#64748b', bold: true }, width: 2, color: '#cbd5e1', arrows: 'to', smooth: false }
            ]);

            const options = {
                physics: false, // Mematikan efek membal-membal
                interaction: { 
                    dragNodes: false,  // Tidak bisa ditarik
                    dragView: false,   // Kanvas tidak bisa digeser
                    zoomView: false,   // Tidak bisa di-zoom scroll
                    hover: false, 
                    selectable: false  // Tidak muncul border biru kalau diklik
                },
                nodes: { shape: 'circle', margin: 12, borderWidth: 2 }
            };

            routeNet = new vis.Network(container, { nodes: rNodes, edges: rEdges }, options);
            
            // Paskan layar sekali saja di awal
            routeNet.once('afterDrawing', function() {
                routeNet.fit({ animation: false });
            });

            // Render awal mode BFS
            showBFSMode();
        }

        // --- FUNGSI MODE BFS ---
        window.showBFSMode = function() {
            if (!rNodes) return;
            
            // Redupkan C dan D dengan teks abu-abu gelap agar tetap TERTULIS dan TERBACA jelas
            rNodes.update([
                { id: 'C', color: { background: '#f8fafc', border: '#e2e8f0' }, font: { color: '#64748b' } },
                { id: 'D', color: { background: '#f8fafc', border: '#e2e8f0' }, font: { color: '#64748b' } }
            ]);
            
            // Redupkan jalur atas, Highlight jalur macet
            rEdges.update([
                { id: 'eAC', color: '#f1f5f9', width: 2, font: { color: '#cbd5e1' } },
                { id: 'eCD', color: '#f1f5f9', width: 2, font: { color: '#cbd5e1' } },
                { id: 'eDB', color: '#f1f5f9', width: 2, font: { color: '#cbd5e1' } },
                
                { id: 'eAB', color: '#ef4444', width: 5, font: { color: '#b91c1c', size: 16 } } // Garis & Teks Merah Terang
            ]);

            // Update UI Tombol & Teks
            document.getElementById('btn-mode-bfs').className = "px-5 py-2 bg-blue-600 text-white text-xs font-bold rounded-lg shadow-md border border-blue-500 transition-all";
            document.getElementById('btn-mode-dijkstra').className = "px-5 py-2 bg-slate-800 text-slate-400 text-xs font-bold rounded-lg shadow-md border border-slate-700 hover:bg-emerald-600 hover:text-white transition-all";
            
            document.getElementById('route-desc').innerHTML = 'Logika <span class="text-blue-400 font-bold">BFS</span> memilih jalur lurus <span class="text-white">A &rarr; B</span> karena jumlah jalan paling sedikit (1 langkah).<br> Total Waktu: <span class="text-red-400 font-bold">60 Menit (Macet).</span>';
        }

        // --- FUNGSI MODE DIJKSTRA ---
        window.showDijkstraMode = function() {
            if (!rNodes) return;
            
            // Terangkan Node C dan D dengan Hijau Terang
            rNodes.update([
                { id: 'C', color: { background: '#22c55e', border: '#15803d' }, font: { color: '#ffffff' } },
                { id: 'D', color: { background: '#22c55e', border: '#15803d' }, font: { color: '#ffffff' } }
            ]);

            // Redupkan jalur macet, Terangkan jalur memutar
            rEdges.update([
                { id: 'eAB', color: '#f1f5f9', width: 2, font: { color: '#cbd5e1', size: 12 } }, 
                
                { id: 'eAC', color: '#22c55e', width: 5, font: { color: '#15803d', size: 14 } },
                { id: 'eCD', color: '#22c55e', width: 5, font: { color: '#15803d', size: 14 } },
                { id: 'eDB', color: '#22c55e', width: 5, font: { color: '#15803d', size: 14 } }
            ]);

            // Update UI Tombol & Teks
            document.getElementById('btn-mode-dijkstra').className = "px-5 py-2 bg-emerald-600 text-white text-xs font-bold rounded-lg shadow-md border border-emerald-500 transition-all";
            document.getElementById('btn-mode-bfs').className = "px-5 py-2 bg-slate-800 text-slate-400 text-xs font-bold rounded-lg shadow-md border border-slate-700 hover:bg-blue-600 hover:text-white transition-all";
            
            document.getElementById('route-desc').innerHTML = 'Logika <span class="text-emerald-400 font-bold">Dijkstra</span> menghitung bobot terkecil. Rute <span class="text-white">A &rarr; C &rarr; D &rarr; B</span> dipilih. Total Waktu: <span class="text-emerald-400 font-bold">10 + 5 + 10 = 25 Menit.</span>';
        }

        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(initRouteGraph, 200); 
        });
    </script>
</section>