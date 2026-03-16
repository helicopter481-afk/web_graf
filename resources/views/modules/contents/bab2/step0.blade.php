<section id="step-0" class="step-slide">
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-8 md:p-10 max-w-6xl mx-auto">

        {{-- BAGIAN ATAS: Narasi & Ilustrasi (Grid Rasio 7:5) --}}
        <div class="grid md:grid-cols-12 gap-8 items-start">
            
            {{-- Kolom Kiri: Narasi (Lebar 7 Kolom) --}}
            <div class="md:col-span-7 flex flex-col justify-center">
                <h2 class="text-2xl md:text-3xl font-bold mb-6 text-slate-900 leading-tight">
                   Materi 2:<br>Representasi Graf di Komputer
                </h2>
                <div class="prose prose-slate text-slate-700 leading-relaxed text-justify">
                    <p class="mb-4">
                        Pada Materi 1, Anda telah berhasil memahami konsep abstraksi graf secara visual. Anda sudah bisa mengenali komponen utamanya dan membedakan jenis-jenisnya. Namun, di dalam dunia pemrograman yang sebenarnya, mesin komputer tidak memiliki mata untuk "melihat" gambar titik dan garis di atas layar.
                    </p>
                    <p class="mb-4">
                        Agar algoritma navigasi atau sistem rekomendasi dapat diproses oleh CPU komputer, visualisasi graf tersebut harus diterjemahkan secara harfiah ke dalam memori melalui pemodelan <strong>Struktur Data (<em>Data Structure</em>)</strong>. Bagaimana cara komputer merekam data bahwa lokasi A terhubung dengan lokasi B? Bagaimana komputer mengenali sebuah jalan satu arah?
                    </p>
                    <p>
                        Pada materi ini, kita akan meninggalkan sejenak representasi visual dan beralih sepenuhnya ke ranah <em>coding</em>. Kita akan membedah dan mempraktikkan langsung bagaimana menerjemahkan graf ke dalam memori komputer menggunakan bahasa pemrograman <strong>Python</strong>.
                    </p>
                </div>
            </div>

            {{-- Kolom Kanan: Ilustrasi Graf to Code (Lebar 5 Kolom) --}}
            <div class="md:col-span-5 rounded-xl overflow-hidden shadow-lg border border-slate-700 flex flex-col bg-slate-900 text-white select-none">
                {{-- Header Terminal --}}
                <div class="bg-slate-950 px-4 py-2.5 flex items-center gap-2 border-b border-slate-800">
                    <div class="w-3 h-3 rounded-full bg-red-500"></div>
                    <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                    <div class="w-3 h-3 rounded-full bg-green-500"></div>
                    <span class="text-[11px] text-slate-400 ml-2 font-mono tracking-wider">Visual_to_Code.py</span>
                </div>
                
                {{-- Body Ilustrasi --}}
                <div class="p-6 flex flex-col items-center justify-center gap-4 relative">
                    
                    {{-- 1. Gambar Graf Visual --}}
                    <div class="bg-slate-100 p-4 rounded-xl shadow-inner w-full flex justify-center border border-slate-300">
                       <svg width="120" height="90" viewBox="0 0 100 80" class="drop-shadow-sm">
                            <line x1="20" y1="60" x2="50" y2="20" stroke="#94a3b8" stroke-width="4"/>
                            <line x1="50" y1="20" x2="80" y2="60" stroke="#94a3b8" stroke-width="4"/>
                            <line x1="20" y1="60" x2="80" y2="60" stroke="#94a3b8" stroke-width="4"/>
                            <circle cx="20" cy="60" r="14" fill="#3b82f6" stroke="#2563eb" stroke-width="2"/>
                            <text x="20" y="65" text-anchor="middle" fill="white" font-size="14" font-family="sans-serif" font-weight="bold">A</text>
                            <circle cx="50" cy="20" r="14" fill="#3b82f6" stroke="#2563eb" stroke-width="2"/>
                            <text x="50" y="25" text-anchor="middle" fill="white" font-size="14" font-family="sans-serif" font-weight="bold">B</text>
                            <circle cx="80" cy="60" r="14" fill="#3b82f6" stroke="#2563eb" stroke-width="2"/>
                            <text x="80" y="65" text-anchor="middle" fill="white" font-size="14" font-family="sans-serif" font-weight="bold">C</text>
                       </svg>
                    </div>

                    {{-- 2. Panah Transisi --}}
                    <div class="text-emerald-400 my-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 animate-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                        </svg>
                    </div>

                    {{-- 3. Kode Python --}}
                    <div class="w-full bg-slate-950 p-4 rounded-lg border border-slate-800 font-mono text-sm leading-loose shadow-inner">
                        <span class="text-pink-400 font-bold">graph</span> <span class="text-white">=</span> <span class="text-yellow-300">{</span><br>
                        &nbsp;&nbsp;<span class="text-green-400">'A'</span><span class="text-white">:</span> <span class="text-blue-300">['B', 'C']</span><span class="text-white">,</span><br>
                        &nbsp;&nbsp;<span class="text-green-400">'B'</span><span class="text-white">:</span> <span class="text-blue-300">['A', 'C']</span><span class="text-white">,</span><br>
                        &nbsp;&nbsp;<span class="text-green-400">'C'</span><span class="text-white">:</span> <span class="text-blue-300">['A', 'B']</span><br>
                        <span class="text-yellow-300">}</span>
                    </div>

                </div>
                
                {{-- Footer Ilustrasi --}}
                <div class="bg-slate-950/50 p-4 shrink-0 mt-auto border-t border-slate-800">
                    <p class="text-slate-400 text-xs leading-relaxed text-center">
                        Proses abstraksi: Mengubah bentuk visual menjadi struktur data <em>Dictionary</em> dan <em>List</em>.
                    </p>
                </div>
            </div>

        </div>

        {{-- BAGIAN TENGAH: Tujuan Pembelajaran (Full Width membentang) --}}
        <div class="mt-10 bg-blue-50/50 p-6 md:p-8 rounded-xl border border-blue-100 shadow-sm">
            <h3 class="text-lg font-bold text-slate-900 mb-4 flex items-center gap-3">
                <div class="bg-blue-600 text-white p-1.5 rounded-lg shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                Tujuan Pembelajaran
            </h3>
            
            <p class="text-sm text-slate-700 mb-5 font-medium">Setelah menyelesaikan materi interaktif pada materi ini, mahasiswa diharapkan mampu:</p>
            
            <ul class="list-decimal list-outside ml-5 text-sm text-slate-700 space-y-3 leading-relaxed">
                <li>Mengimplementasikan komponen graf visual (simpul dan sisi) ke dalam bentuk struktur data dasar Python (List dan Tuple).</li>
                <li>Menganalisis perbedaan struktur kode (<em>coding</em>) antara Graf Berarah dan Tak Berarah menggunakan representasi <em>Adjacency List</em> (Dictionary).</li>
                <li>Membangun representasi matriks komputasi (<em>Adjacency Matrix</em>) untuk mengolah data logis pada Graf Berbobot (<em>Weighted Graph</em>) melalui aktivitas <em>live coding</em>.</li>
            </ul>
        </div>

        {{-- BAGIAN BAWAH: Navigasi --}}
        <div class="mt-8 pt-6 border-t border-slate-100 flex justify-end">
            <button onclick="nextStep()"
                class="group bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-xl transition-all duration-300 shadow-md hover:shadow-lg flex items-center gap-3 active:scale-95">
                Mulai Belajar  
            </button>
        </div>

    </div>
</section>