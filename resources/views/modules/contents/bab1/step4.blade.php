<section id="step-4" class="step-slide">
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-10 -mt-8">

        {{-- Header --}}
        <div class="border-b border-slate-200 pb-6 mb-8">
            <h2 class="text-3xl font-bold text-slate-900 mb-2">1.4 Representasi Graf dalam Kehidupan Nyata</h2>
            <p class="text-slate-500 font-medium text-sm">Memahami aplikasi graf pada sistem transportasi, komunikasi, hingga interaksi sosial.</p>
        </div>

        {{-- Intro Text --}}
        <div class="mb-8 text-slate-700 leading-relaxed text-m space-y-4 text-justify">
            <p>
                Graf bukan sekadar entitas matematika abstrak, melainkan struktur fundamental yang menopang berbagai teknologi modern. Dalam praktiknya, graf digunakan untuk memodelkan hubungan antarobjek yang saling terhubung di berbagai bidang, seperti jaringan transportasi, komunikasi, hingga interaksi sosial.
            </p>
            <p>
                Untuk memahami relevansi teori yang telah Anda pelajari, kita akan membedah dua contoh penerapan graf dan mengidentifikasi karakteristiknya di dunia nyata.
            </p>
        </div>

        {{-- ======================================================== --}}
        {{-- BAGIAN 1: SISTEM TRANSPORTASI & NAVIGASI --}}
        {{-- ======================================================== --}}
        <h3 class="text-xl font-bold text-slate-900 mb-4 border-b-2 border-blue-500 inline-block pb-1">Penerapan Graf pada Sistem Transportasi dan Navigasi</h3>
        <div class="mb-10 text-justify">
            <div class="mb-6">
                <p class="text-slate-700 leading-relaxed mb-4">
                    Salah satu penerapan graf yang paling krusial terdapat pada sistem transportasi. Aplikasi peta digital (seperti Google Maps) memodelkan suatu wilayah sebagai jaringan lokasi yang saling terhubung.
                </p>
                <ul class="list-disc pl-6 mb-4 text-slate-700 space-y-2">
                    <li><strong>Simpul (Vertex):</strong> Merepresentasikan lokasi, persimpangan, atau titik jemput.</li>
                    <li><strong>Sisi (Edge):</strong> Merepresentasikan ruas jalan raya yang menghubungkan lokasi-lokasi tersebut.</li>
                </ul>
                <p class="text-slate-700 leading-relaxed mb-4">
                    Jika kita mengaitkannya dengan materi sebelumnya, peta digital merupakan bentuk <strong>Graf Berbobot (<em>Weighted Graph</em>)</strong> karena setiap sisi memiliki nilai ukur jarak (km) atau waktu tempuh (menit). Peta juga menerapkan <strong>Graf Berarah (<em>Directed Graph</em>)</strong> untuk memodelkan sistem jalan satu arah.
                </p>
                <p class="text-slate-700 leading-relaxed font-medium">Mari kita lakukan simulasi <em>pathfinding</em> (pencarian jalur) dasar berikut ini.</p>
                
                <div class="bg-blue-50 border-l-4 border-blue-500 p-5 rounded-r shadow-sm mb-6 mt-6">
                    <h4 class="font-bold text-blue-900 text-base mb-2">Simulasi Interaktif: Logika Algoritma Navigasi</h4>
                    <p class="text-sm text-blue-800 leading-relaxed text-justify mb-3">
                        Tugas Anda adalah memandu sistem untuk mencari rute penjemputan dari posisi awal <strong>(Rumah)</strong> menuju <strong>Pasar</strong>, lalu mengantarkannya ke <strong>Kampus</strong>.
                    </p>
                    <div class="bg-white/60 p-3 rounded border border-blue-100 text-xs text-blue-900 font-medium">
                        <strong>Panduan simulasi:</strong> Klik pada lingkaran lokasi (simpul) untuk memindahkan kendaraan. Pergerakan hanya dapat dilakukan jika terdapat garis jalan (sisi) yang menghubungkan dua lokasi.
                    </div>
                </div>
            </div>

            {{-- === SIMULASI OJEK ONLINE === --}}
            <div id="ojekApp" class="sim-card max-w-[800px] mx-auto border border-slate-300 rounded-xl overflow-hidden shadow-sm relative mb-6">
                <header class="bg-slate-800 text-white p-4 flex justify-between items-center">
                    <div>
                        <h2 class="font-bold">Simulasi Navigasi Graf</h2>
                        <p class="text-xs text-slate-300 mt-1">Tugas: Lakukan penjemputan di <b>Pasar</b>, lalu antar ke <b>Kampus</b>.</p>
                    </div>
                    <div class="bg-white text-slate-800 text-xs font-bold px-3 py-1.5 rounded-full shadow-sm" id="mission-status">Status: Menunggu Penjemputan</div>
                </header>
                <div class="relative bg-slate-50 w-full h-[350px] flex items-center justify-center overflow-hidden border-b border-slate-200">
                    <div id="toast-msg" class="absolute top-4 left-1/2 -translate-x-1/2 bg-slate-900 text-white px-4 py-2 rounded-lg text-sm shadow-lg font-bold opacity-0 transition-opacity pointer-events-none z-10">Notifikasi</div>
                    
                    <svg viewBox="150 0 600 400" class="w-full h-full">
                        <g id="edges-layer-ojek">
                            <path id="jalur-Rumah-Taman" d="M250 200 L450 80" stroke="#cbd5e1" stroke-width="4" class="transition-all duration-300" />
                            <path id="jalur-Rumah-Pasar" d="M250 200 L450 320" stroke="#cbd5e1" stroke-width="4" class="transition-all duration-300" />
                            <path id="jalur-Taman-Kampus" d="M450 80 L650 200" stroke="#cbd5e1" stroke-width="4" class="transition-all duration-300" />
                            <path id="jalur-Pasar-Kampus" d="M450 320 L650 200" stroke="#cbd5e1" stroke-width="4" class="transition-all duration-300" />
                            <path id="jalur-Taman-Pasar" d="M450 80 L450 320" stroke="#cbd5e1" stroke-width="4" class="transition-all duration-300" />
                        </g>
                        <g id="nodes-layer-ojek">
                            <g class="cursor-pointer transition-transform hover:scale-110" style="transform-origin: 250px 200px;" onclick="pindahLokasiOjek('Rumah', 250, 200)">
                                <circle cx="250" cy="200" r="30" fill="white" stroke="#3b82f6" stroke-width="3" />
                                <text x="250" y="206" text-anchor="middle" font-size="20">🏠</text>
                                <text x="250" y="248" text-anchor="middle" font-size="12" font-weight="bold" fill="#475569">Rumah</text>
                            </g>
                            <g class="cursor-pointer transition-transform hover:scale-110" style="transform-origin: 450px 80px;" onclick="pindahLokasiOjek('Taman', 450, 80)">
                                <circle cx="450" cy="80" r="30" fill="white" stroke="#10b981" stroke-width="3" />
                                <text x="450" y="86" text-anchor="middle" font-size="20">🌳</text>
                                <text x="450" y="128" text-anchor="middle" font-size="12" font-weight="bold" fill="#475569">Taman</text>
                            </g>
                            <g class="cursor-pointer transition-transform hover:scale-110" style="transform-origin: 450px 320px;" onclick="pindahLokasiOjek('Pasar', 450, 320)">
                                <circle cx="450" cy="320" r="30" fill="white" stroke="#f59e0b" stroke-width="3" />
                                <text x="450" y="326" text-anchor="middle" font-size="20">🛒</text>
                                <text x="450" y="368" text-anchor="middle" font-size="12" font-weight="bold" fill="#475569">Pasar</text>
                            </g>
                            <g class="cursor-pointer transition-transform hover:scale-110" style="transform-origin: 650px 200px;" onclick="pindahLokasiOjek('Kampus', 650, 200)">
                                <circle cx="650" cy="200" r="30" fill="white" stroke="#ef4444" stroke-width="3" />
                                <text x="650" y="206" text-anchor="middle" font-size="20">🎓</text>
                                <text x="650" y="248" text-anchor="middle" font-size="12" font-weight="bold" fill="#475569">Kampus</text>
                            </g>
                        </g>
                        <text id="ikon-motor-14" x="0" y="0" transform="translate(250, 200)" text-anchor="middle" dominant-baseline="central" font-size="28" class="transition-all duration-700 ease-in-out pointer-events-none drop-shadow-md">🛵</text>
                    </svg>
                </div>
                <footer class="bg-white p-4 flex justify-between items-center text-sm">
                    <div id="instruction" class="text-slate-600">Posisi Awal: <b class="text-slate-900">Rumah</b>. Klik lokasi tujuan untuk berpindah.</div>
                    <button class="bg-slate-200 hover:bg-slate-300 text-slate-800 px-4 py-2 rounded font-bold transition" onclick="resetSimulasiOjek()">Reset Simulasi</button>
                </footer>
            </div>

            {{-- KUIS ANALISIS RUTE --}}
            <div id="edu-panel-navigasi">
                <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-6 mb-8">
                    <h4 class="font-bold text-slate-900 mb-3 text-lg">Tugas Analisis:</h4>
                    <p class="text-sm text-slate-700 leading-relaxed mb-4 text-justify">
                        Sistem komputasi tidak melihat peta dari seberapa "bagus" jalanannya, melainkan dari jumlah langkah atau bobotnya. Bandingkan dua skenario rute penjemputan berikut berdasarkan simulasi yang Anda lakukan:
                    </p>
                    <ul class="list-disc pl-6 mb-6 text-sm text-slate-700 space-y-2 font-medium">
                        <li>Rute A: Rumah → Pasar → Kampus</li>
                        <li>Rute B: Rumah → Pasar → Taman → Kampus</li>
                    </ul>

                    <div class="space-y-4">
                        <div class="flex flex-wrap items-center gap-3">
                            <label class="text-sm text-slate-800 md:w-auto w-full">Berapakah total jumlah "Sisi" (<em>Edge</em>) yang harus dilalui pada <strong>Rute A</strong>?</label>
                            <input type="text" id="ans-rute-A" class="w-16 p-2 text-center border border-slate-300 rounded focus:border-blue-500 outline-none font-bold text-slate-800 text-sm" placeholder="...">
                            
                        </div>
                        <div class="flex flex-wrap items-center gap-3">
                            <label class="text-sm text-slate-800 md:w-auto w-full">Berapakah total jumlah "Sisi" (<em>Edge</em>) yang harus dilalui pada <strong>Rute B</strong>?</label>
                            <input type="text" id="ans-rute-B" class="w-16 p-2 text-center border border-slate-300 rounded focus:border-blue-500 outline-none font-bold text-slate-800 text-sm" placeholder="...">
                            
                        </div>
                        <div class="flex flex-wrap items-center gap-3 pt-2">
                            <label class="text-sm text-slate-800 md:w-auto w-full">Berdasarkan prinsip efisiensi, rute manakah yang akan dipilih secara otomatis oleh algoritma? (Ketik A / B):</label>
                            <input type="text" id="ans-rute-pilihan" class="w-16 p-2 text-center border border-slate-400 rounded focus:border-blue-600 outline-none font-bold text-blue-900 text-sm uppercase" placeholder="...">
                            
                        </div>
                        <button onclick="cekAnalisisNavigasi()" id="btn-cek-navigasi" class="bg-slate-800 hover:bg-slate-900 text-white font-bold px-6 py-2.5 rounded-lg shadow-sm text-sm transition mt-3">Cek Analisis & Tampilkan Logika Algoritma</button>
                    </div>
                    
                    <div id="alert-navigasi" class="hidden mt-4 p-3 rounded text-sm font-bold text-center"></div>

                    {{-- KESIMPULAN RUTE --}}
                    <div id="kesimpulan-navigasi" class="hidden mt-6 bg-green-50 border border-green-200 p-6 rounded-lg shadow-sm">
                        <h4 class="font-bold text-green-900 mb-2 flex items-center gap-2"> Kesimpulan Evaluasi Rute:</h4>
                        <p class="text-sm text-green-800 leading-relaxed text-justify">
                            Analisis matematis yang akurat! Algoritma pencarian rute (<em>pathfinding</em>) selalu bekerja dengan mencari total bobot atau jumlah sisi terkecil. <strong>Rute A</strong> langsung menyajikan lintasan terpendek (2 sisi) tanpa harus mengunjungi simpul perantara tambahan (Taman) yang membuat lintasan membengkak menjadi 3 sisi. Konsep optimasi berbasis bobot jarak menggunakan <strong>Algoritma Dijkstra</strong> akan kita kupas tuntas pada Materi 5.
                        </p>
                    </div>
                </div>
            </div>

        </div>

        <div class="border-t border-slate-200 my-10"></div>

        {{-- ======================================================== --}}
        {{-- BAGIAN 2: JEJARING SOSIAL --}}
        {{-- ======================================================== --}}
        <h3 class="text-xl font-bold text-slate-900 mb-4 border-b-2 border-blue-500 inline-block pb-1">Penerapan Graf pada Jejaring Sosial</h3>
        <div class="mb-10">
            <p class="text-slate-700 leading-relaxed text-justify mb-4">
                Selain sistem transportasi, graf menjadi fondasi utama dalam analisis media sosial. <em>Platform</em> membangun graf raksasa berskala global untuk merepresentasikan interaksi sosial pengguna.
            </p>
            <p class="text-slate-700 leading-relaxed text-justify mb-4">
                Berbeda dengan jalan raya, graf pertemanan mutual (seperti <em>Facebook</em>) direpresentasikan sebagai <strong>Graf Tak Berarah (<em>Undirected Graph</em>)</strong>, sedangkan hubungan <em>follower</em> (seperti <em>Instagram</em>) menggunakan <strong>Graf Berarah (<em>Directed Graph</em>)</strong>.
            </p>

            <ul class="list-disc list-inside space-y-2 mb-6 ml-2 text-base text-slate-700">
                <li><strong>Simpul (Vertex):</strong> Merepresentasikan akun pengguna (<em>User</em>).</li>
                <li><strong>Sisi (Edge):</strong> Mengartikulasikan status relasi/koneksi antar pengguna.</li>
            </ul>

            <h4 class="font-bold text-slate-900 text-lg mb-3">Simulasi Interaktif: Analisis Algoritma Rekomendasi Teman</h4>
            <p class="mb-6 text-slate-700 text-base text-justify">
                Pernahkah Anda melihat fitur <em>"Teman yang Mungkin Anda Kenal"</em>? Fitur ini bekerja murni menggunakan penelusuran struktur graf. Mari kita buktikan!
            </p>

            {{-- === SIMULASI SOSMED === --}}
            <div class="sim-card max-w-[800px] mx-auto border border-slate-300 rounded-xl overflow-hidden shadow-sm relative mb-6">
                <header class="bg-blue-600 text-white p-5">
                    <h2 class="font-bold text-lg mb-3">Simulasi Struktur Data Graf: Interaksi Sosial</h2>
                    <div class="bg-blue-700/50 p-4 rounded text-sm border border-blue-500">
                        <p class="font-bold text-blue-100 mb-2">Panduan Penggunaan:</p>
                        <ul class="list-disc list-inside space-y-1 text-blue-50">
                            <li>Posisi awal berada pada simpul <b>Andi</b>.</li>
                            <li>Tujuan akhir adalah mencapai simpul <b>Dani</b>.</li>
                            <li>Klik pada simpul teman yang terhubung langsung (bertetangga) untuk membuat jalur.</li>
                            <li>Perhatikan bagaimana garis (Sisi) berwarna biru saat Anda memilih jalur yang valid.</li>
                        </ul>
                    </div>
                </header>
                <div class="relative bg-white w-full h-[350px] flex items-center justify-center border-b border-slate-200">
                    <div id="toast-jejaring" class="absolute top-4 left-1/2 -translate-x-1/2 bg-red-600 text-white px-4 py-2 rounded-lg text-sm shadow-lg font-bold opacity-0 transition-opacity pointer-events-none z-10">Peringatan: Simpul tidak terhubung langsung.</div>
                    
                    <svg viewBox="150 0 500 400" class="w-full h-full">
                        <defs>
                            <symbol id="icon-user-jejaring" viewBox="0 0 24 24">
                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                            </symbol>
                        </defs>
                        <g id="edges-jejaring">
                            <path id="jalur-Andi-Budi" d="M250 200 L400 80" stroke="#cbd5e1" stroke-width="3" class="transition-all duration-300" />
                            <path id="jalur-Andi-Citra" d="M250 200 L400 320" stroke="#cbd5e1" stroke-width="3" class="transition-all duration-300" />
                            <path id="jalur-Budi-Dani" d="M400 80 L550 200" stroke="#cbd5e1" stroke-width="3" class="transition-all duration-300" />
                            <path id="jalur-Citra-Dani" d="M400 320 L550 200" stroke="#cbd5e1" stroke-width="3" class="transition-all duration-300" />
                            <path id="jalur-Budi-Citra" d="M400 80 L400 320" stroke="#cbd5e1" stroke-width="3" class="transition-all duration-300" />
                        </g>
                        <g id="nodes-jejaring">
                            <g class="cursor-pointer transition-transform hover:scale-110" style="transform-origin: 250px 200px;" onclick="klikUserSosmed('Andi', 250, 200)">
                                <circle cx="250" cy="200" r="30" fill="white" stroke="#3b82f6" stroke-width="3" />
                                <use href="#icon-user-jejaring" x="234" y="184" width="32" height="32" fill="#3b82f6" />
                                <text x="250" y="250" text-anchor="middle" font-size="14" font-weight="bold" fill="#475569">Andi</text>
                            </g>
                            <g class="cursor-pointer transition-transform hover:scale-110" style="transform-origin: 400px 80px;" onclick="klikUserSosmed('Budi', 400, 80)">
                                <circle cx="400" cy="80" r="30" fill="white" stroke="#94a3b8" stroke-width="3" id="bulatan-Budi" />
                                <use href="#icon-user-jejaring" x="384" y="64" width="32" height="32" fill="#94a3b8" id="ikon-Budi" />
                                <text x="400" y="130" text-anchor="middle" font-size="14" font-weight="bold" fill="#475569">Budi</text>
                            </g>
                            <g class="cursor-pointer transition-transform hover:scale-110" style="transform-origin: 400px 320px;" onclick="klikUserSosmed('Citra', 400, 320)">
                                <circle cx="400" cy="320" r="30" fill="white" stroke="#94a3b8" stroke-width="3" id="bulatan-Citra" />
                                <use href="#icon-user-jejaring" x="384" y="304" width="32" height="32" fill="#94a3b8" id="ikon-Citra" />
                                <text x="400" y="370" text-anchor="middle" font-size="14" font-weight="bold" fill="#475569">Citra</text>
                            </g>
                            <g class="cursor-pointer transition-transform hover:scale-110" style="transform-origin: 550px 200px;" onclick="klikUserSosmed('Dani', 550, 200)">
                                <circle cx="550" cy="200" r="30" fill="white" stroke="#94a3b8" stroke-width="3" id="bulatan-Dani" />
                                <use href="#icon-user-jejaring" x="534" y="184" width="32" height="32" fill="#94a3b8" id="ikon-Dani" />
                                <text x="550" y="250" text-anchor="middle" font-size="14" font-weight="bold" fill="#475569">Dani</text>
                            </g>
                        </g>
                    </svg>
                </div>
                <footer class="bg-slate-50 p-4 flex justify-between items-center text-sm">
                    <div id="instruksi-jejaring" class="text-slate-600">Posisi saat ini: <b class="text-blue-600">Andi</b>. Menunggu input pengguna...</div>
                    <button class="bg-slate-800 hover:bg-slate-900 text-white px-4 py-2 rounded font-bold transition shadow" onclick="resetSimulasiSosmed()">Reset Simulasi</button>
                </footer>
            </div>

            {{-- KUIS ANALISIS SOSMED --}}
            <div id="kuis-analisis-sosmed">
                <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-6 mb-8">
                    <h4 class="font-bold text-slate-900 mb-3 text-lg">Tugas Analisis:</h4>
                    <p class="text-sm text-slate-700 leading-relaxed mb-4 text-justify">
                        Pada layar Anda, Andi dan Dani tidak saling terhubung langsung oleh sebuah "Sisi". Namun, fitur <em>"Teman yang Mungkin Anda Kenal"</em> bisa bekerja dengan menelusuri simpul perantara (<em>mutual friend</em>).
                    </p>
                    <p class="text-sm text-slate-700 leading-relaxed mb-4 text-justify">
                        Berdasarkan eksplorasi klik Anda, ternyata terdapat <strong>dua kemungkinan rute terpendek</strong> yang sama-sama efisien. Siapa sajakah <strong>dua nama akun (simpul)</strong> yang bisa bertindak sebagai jembatan perantara terpendek dari Andi menuju Dani?
                    </p>

                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <label class="text-sm font-semibold text-slate-800 w-36">Simpul Perantara 1:</label>
                            <input type="text" id="ans-sosmed-1" class="w-40 p-2 border border-slate-300 rounded focus:border-blue-500 outline-none font-bold text-slate-800 text-sm" placeholder="Ketik nama...">
                            
                        </div>
                        <div class="flex items-center gap-3">
                            <label class="text-sm font-semibold text-slate-800 w-36">Simpul Perantara 2:</label>
                            <input type="text" id="ans-sosmed-2" class="w-40 p-2 border border-slate-300 rounded focus:border-blue-500 outline-none font-bold text-slate-800 text-sm" placeholder="Ketik nama...">
                            
                        </div>
                        <div class="pt-2">
                            <button onclick="cekAnalisisSosmed()" id="btn-cek-sosmed" class="bg-slate-800 hover:bg-slate-900 text-white font-bold px-6 py-2.5 rounded-lg shadow-sm text-sm transition mt-2">Cek Analisis & Tampilkan Logika Sistem</button>
                        </div>
                    </div>
                    
                    <div id="alert-sosmed" class="hidden mt-4 p-3 rounded text-sm font-bold text-center"></div>

                    {{-- KESIMPULAN SOSMED --}}
                    <div id="kesimpulan-sosmed" class="hidden mt-6 bg-blue-50 border border-blue-200 p-6 rounded-lg shadow-sm">
                        <h4 class="font-bold text-blue-900 mb-2 flex items-center gap-2">Kesimpulan Evaluasi Jaringan:</h4>
                        <p class="text-sm text-blue-800 leading-relaxed text-justify">
                            Tepat sekali! Rekomendasi pertemanan tersebut muncul akibat adanya Hubungan Tidak Langsung (<em>Indirect Connection</em>). Algoritma media sosial menemukan dua rute terpendek yang sama efisiennya: lintasan <strong>Andi → Budi → Dani</strong> dan <strong>Andi → Citra → Dani</strong> (keduanya hanya butuh 2 langkah). Sistem akan memprioritaskan merekomendasikan orang yang memiliki "jarak" lompatan paling sedikit dengan profil Anda.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="border-t-[3px] border-dashed border-slate-200 my-10"></div>

        {{-- ========================================================= --}}
        {{-- BAGIAN 3: AKTIVITAS 1.4 (EVALUASI DRAG & DROP E-COMMERCE) --}}
        {{-- ========================================================= --}}
        @php
            $isDone14 = isset($progress['1.4']) && $progress['1.4']->score == 100;
        @endphp

        <div class="bg-white" id="aktivitas-1-4">
            <div class="flex items-center gap-3 mb-6">
                <span class="bg-slate-900 text-white text-xs font-bold px-3 py-1 rounded uppercase tracking-wider shadow-sm">Aktivitas 1.4</span>
                <h3 class="text-2xl font-bold text-slate-900">Bedah Data E-Commerce</h3>
            </div>

            <div class="text-slate-700 leading-relaxed text-justify space-y-4 mb-6">
                <p>Sebagai seorang Data Engineer di perusahaan <em>E-Commerce</em>, Anda dituntut mampu memilah raw data (data mentah) ke dalam model Graf yang efisien.</p>
                <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-r text-blue-900 text-sm font-medium">
                    Tarik elemen data dari sebelah kiri dan letakkan ke dalam kategori struktur Graf yang tepat di sebelah kanan. <br><span class="text-red-600">Peringatan: Terdapat 2 item data pengecoh yang bukan merupakan struktur graf! Biarkan item tersebut tetap di luar.</span>
                </div>
            </div>

            {{-- KANVAS DRAG & DROP --}}
            <div class="bg-slate-50 border border-slate-300 rounded-xl shadow-sm p-6 mb-8 flex flex-col md:flex-row gap-6">
                
                {{-- KIRI: Sumber Data --}}
                <div class="flex-1">
                    <p class="text-xs font-bold text-slate-500 uppercase mb-3 tracking-wider text-center">ITEM DATA (TARIK DARI SINI)</p>
                    <div id="zone-source-14" class="flex flex-col gap-3 min-h-[300px] p-4 border-2 border-dashed border-slate-300 rounded-lg bg-white items-center transition-colors drop-zone" ondragover="allowDrop14(event)" ondrop="drop14(event)">
                        
                        <div id="item-14-1" class="draggable-item w-[90%] bg-white border border-slate-300 shadow-sm px-4 py-3 rounded cursor-grab active:cursor-grabbing text-sm font-medium text-slate-700 hover:border-blue-400 hover:shadow-md text-center transition-shadow" draggable="true" ondragstart="drag14(event)" ondragend="dragEnd14(event)" data-answer="source">
                            Warna Kemasan
                        </div>
                        <div id="item-14-2" class="draggable-item w-[90%] bg-white border border-slate-300 shadow-sm px-4 py-3 rounded cursor-grab active:cursor-grabbing text-sm font-medium text-slate-700 hover:border-blue-400 hover:shadow-md text-center transition-shadow" draggable="true" ondragstart="drag14(event)" ondragend="dragEnd14(event)" data-answer="degree">
                            Total Transaksi
                        </div>
                        <div id="item-14-3" class="draggable-item w-[90%] bg-white border border-slate-300 shadow-sm px-4 py-3 rounded cursor-grab active:cursor-grabbing text-sm font-medium text-slate-700 hover:border-blue-400 hover:shadow-md text-center transition-shadow" draggable="true" ondragstart="drag14(event)" ondragend="dragEnd14(event)" data-answer="edge">
                            Transaksi "Membeli"
                        </div>
                        <div id="item-14-4" class="draggable-item w-[90%] bg-white border border-slate-300 shadow-sm px-4 py-3 rounded cursor-grab active:cursor-grabbing text-sm font-medium text-slate-700 hover:border-blue-400 hover:shadow-md text-center transition-shadow" draggable="true" ondragstart="drag14(event)" ondragend="dragEnd14(event)" data-answer="vertex">
                            Akun Pembeli
                        </div>
                        <div id="item-14-5" class="draggable-item w-[90%] bg-white border border-slate-300 shadow-sm px-4 py-3 rounded cursor-grab active:cursor-grabbing text-sm font-medium text-slate-700 hover:border-blue-400 hover:shadow-md text-center transition-shadow" draggable="true" ondragstart="drag14(event)" ondragend="dragEnd14(event)" data-answer="source">
                            Harga Barang (Rp)
                        </div>
                        <div id="item-14-6" class="draggable-item w-[90%] bg-white border border-slate-300 shadow-sm px-4 py-3 rounded cursor-grab active:cursor-grabbing text-sm font-medium text-slate-700 hover:border-blue-400 hover:shadow-md text-center transition-shadow" draggable="true" ondragstart="drag14(event)" ondragend="dragEnd14(event)" data-answer="vertex">
                            Produk Sepatu
                        </div>

                    </div>
                </div>

                {{-- KANAN: Target Kategori (Auto Expand) --}}
                <div class="flex-[2]">
                    <p class="text-xs font-bold text-slate-500 uppercase mb-3 tracking-wider text-center">KATEGORI GRAF</p>
                    
                    {{-- DIHAPUSKAN: overflow-y-auto dan height fix agar kotak melar ke bawah otomatis --}}
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-stretch min-h-[300px]">
                        
                        <div class="bg-white border border-blue-200 rounded-lg shadow-sm flex flex-col drop-zone transition-colors" ondragover="allowDrop14(event)" ondrop="drop14(event)" id="zone-vertex-14">
                            <div class="bg-blue-50/80 px-3 py-3 border-b border-blue-100 flex justify-center items-center gap-2 rounded-t-lg shrink-0">
                                <div class="w-3 h-3 rounded-full bg-blue-600"></div>
                                <h4 class="font-bold text-blue-700 text-xs uppercase tracking-wide">Simpul (Vertex)</h4>
                            </div>
                            <div class="zone-content flex-grow p-3 flex flex-col items-center gap-3 bg-white rounded-b-lg"></div>
                        </div>

                        <div class="bg-white border border-green-200 rounded-lg shadow-sm flex flex-col drop-zone transition-colors" ondragover="allowDrop14(event)" ondrop="drop14(event)" id="zone-edge-14">
                            <div class="bg-green-50/80 px-3 py-3 border-b border-green-100 flex justify-center items-center gap-2 rounded-t-lg shrink-0">
                                <div class="w-5 h-1.5 rounded bg-green-600"></div>
                                <h4 class="font-bold text-green-700 text-xs uppercase tracking-wide">Sisi (Edge)</h4>
                            </div>
                            <div class="zone-content flex-grow p-3 flex flex-col items-center gap-3 bg-white rounded-b-lg"></div>
                        </div>

                        <div class="bg-white border border-purple-200 rounded-lg shadow-sm flex flex-col drop-zone transition-colors" ondragover="allowDrop14(event)" ondrop="drop14(event)" id="zone-degree-14">
                            <div class="bg-purple-50/80 px-3 py-3 border-b border-purple-100 flex justify-center items-center gap-2 rounded-t-lg shrink-0">
                                <span class="font-bold text-purple-700 text-[9px] border border-purple-400 px-1 rounded bg-white">123</span>
                                <h4 class="font-bold text-purple-700 text-xs uppercase tracking-wide">Derajat (Degree)</h4>
                            </div>
                            <div class="zone-content flex-grow p-3 flex flex-col items-center gap-3 bg-white rounded-b-lg"></div>
                        </div>

                    </div>
                </div>
            </div>

            {{-- AREA FEEDBACK & SUBMIT --}}
            <div class="mt-4">
                <div id="statusAlert14" class="hidden p-4 rounded-lg mb-4 text-sm font-bold border shadow-sm"></div>
                
                {{-- BOX PEMBAHASAN AKHIR --}}
                <div id="feedback14" class="hidden p-6 rounded-xl bg-blue-50 border border-blue-200 text-slate-800 text-sm leading-relaxed mb-6 shadow-sm">
                    <h4 class="font-bold text-blue-900 mb-3 flex items-center gap-2 border-b border-blue-200 pb-2">
                        Evaluasi Kunci Jawaban:
                    </h4>
                    <ul class="space-y-3 list-disc pl-5 text-justify">
                        <li><strong>Simpul (Vertex):</strong> Akun Pembeli dan Produk Sepatu (Keduanya merepresentasikan entitas fisik/digital).</li>
                        <li><strong>Sisi (Edge):</strong> Transaksi "Membeli" (Merepresentasikan relasi yang menghubungkan pembeli dan produk).</li>
                        <li><strong>Derajat (Degree):</strong> Total Transaksi (Semakin sering pembeli bertransaksi, semakin tinggi jumlah koneksi/derajatnya).</li>
                        <li><strong>Elemen Pengecoh (Diabaikan):</strong> Harga Barang dan Warna Kemasan. Keduanya merupakan <em>atribut</em> atau sifat barang, bukan struktur pembentuk topologi graf itu sendiri.</li>
                    </ul>
                </div>

                <div class="flex justify-end gap-3 mt-4">
                    <button type="button" id="btnReset14" onclick="resetAktivitas14()" class="px-5 py-2.5 bg-white border border-slate-300 hover:bg-slate-50 text-slate-700 rounded-lg text-sm font-bold transition-all shadow-sm">
                        Reset Posisi
                    </button>
                    <button type="button" id="btnPeriksa14" onclick="checkAktivitas14()" class="px-8 py-3 bg-slate-800 hover:bg-slate-900 text-white text-sm font-bold rounded-lg shadow-md transition-all active:scale-95 flex items-center gap-2">
                        <i class="fa-solid fa-paper-plane"></i> Periksa Jawaban
                    </button>
                </div>
            </div>

            {{-- FOOTER NAVIGASI UTAMA --}}
            <div class="flex justify-between gap-4 mt-12 pt-6 border-t-2 border-slate-100">
                <button type="button" onclick="prevStep()" class="btn-secondary px-6 py-2.5 rounded-lg border border-slate-300 font-bold text-slate-600 hover:bg-slate-50 transition">Kembali</button>
                <button id="btnNext14" type="button" onclick="nextStep()" class="btn-primary bg-slate-900 text-white px-6 py-2.5 rounded-lg font-bold opacity-50 cursor-not-allowed transition hover:bg-slate-800" disabled>Lanjut</button>
            </div>

        </div>
    </div>

    {{-- ======================================================== --}}
    {{-- SCRIPT GLOBAL: OJEK, SOSMED, DAN DRAG DROP 1.4           --}}
    {{-- ======================================================== --}}
    <script>
        const currentUserId = "{{ auth()->check() ? auth()->id() : 'guest' }}";

        // Variabel Status untuk membuka tombol Lanjut (Harus Semua True)
        let isNavigasiDone = false;
        let isSosmedDone = false;
        let isAct14Done = false;

        function checkAllStep5Completion() {
            const btnNext = document.getElementById('btnNext14');
            if (isNavigasiDone && isSosmedDone && isAct14Done) {
                if(btnNext) {
                    btnNext.disabled = false;
                    btnNext.classList.remove('opacity-50', 'cursor-not-allowed');
                }
            } else {
                if(btnNext) {
                    btnNext.disabled = true;
                    btnNext.classList.add('opacity-50', 'cursor-not-allowed');
                }
            }
        }

        // ==========================================
        // 1. LOGIKA SIMULASI OJEK ONLINE (RUTE)
        // ==========================================
        let ojekState = 0; 
        let currentOjekNode = 'Rumah';
        let ojekVisited = ['Rumah'];
        let hasSimOjekPlayed = false;

        function pindahLokasiOjek(targetNode, cx, cy) {
            const motor = document.getElementById('ikon-motor-14'); // FIX ID
            const status = document.getElementById('mission-status');
            
            const validRoutes = {
                'Rumah': ['Taman', 'Pasar'],
                'Taman': ['Rumah', 'Kampus', 'Pasar'],
                'Pasar': ['Rumah', 'Kampus', 'Taman'],
                'Kampus': ['Taman', 'Pasar']
            };

            if (!validRoutes[currentOjekNode].includes(targetNode)) {
                tampilToastOjek('Jalur tidak terhubung langsung!', 'error');
                return;
            }

            if(motor) {
                motor.setAttribute('transform', `translate(${cx}, ${cy})`);
            }
            
            // Ubah warna sisi menggunakan inline style
            const edgeId = `jalur-${currentOjekNode}-${targetNode}`;
            const altEdgeId = `jalur-${targetNode}-${currentOjekNode}`;
            const edgeEl = document.getElementById(edgeId) || document.getElementById(altEdgeId);
            if (edgeEl) {
                edgeEl.style.stroke = '#3b82f6';
                edgeEl.style.strokeWidth = '6px';
            }

            currentOjekNode = targetNode;
            if(!ojekVisited.includes(targetNode)) ojekVisited.push(targetNode);

            if (ojekState === 0 && targetNode === 'Pasar') {
                ojekState = 2;
                status.innerHTML = "Status: Penumpang diangkut. Lanjut ke Kampus!";
                status.className = "bg-yellow-100 text-yellow-800 text-xs font-bold px-3 py-1.5 rounded-full shadow-sm";
                tampilToastOjek('Penumpang berhasil dijemput!', 'success');
            } else if (ojekState === 2 && targetNode === 'Kampus') {
                ojekState = 3;
                status.innerHTML = "Status: Misi Selesai!";
                status.className = "bg-green-100 text-green-800 text-xs font-bold px-3 py-1.5 rounded-full shadow-sm";
                tampilToastOjek('Misi Selesai!', 'success');
                hasSimOjekPlayed = true;
            } else if (targetNode === 'Kampus' && ojekState < 2) {
                tampilToastOjek('Jemput penumpang di Pasar dulu!', 'error');
            }
        }

        function tampilToastOjek(msg, type) {
            const toast = document.getElementById('toast-msg');
            toast.innerText = msg;
            toast.className = `absolute top-4 left-1/2 -translate-x-1/2 px-4 py-2 rounded-lg text-sm shadow-lg font-bold transition-opacity z-10 ${type === 'error' ? 'bg-red-600 text-white' : 'bg-green-600 text-white'}`;
            toast.style.opacity = '1';
            setTimeout(() => { toast.style.opacity = '0'; }, 2000);
        }

        function resetSimulasiOjek() {
            ojekState = 0;
            currentOjekNode = 'Rumah';
            ojekVisited = ['Rumah'];
            hasSimOjekPlayed = false;
            
            const motor = document.getElementById('ikon-motor-14');
            if(motor) motor.setAttribute('transform', `translate(250, 200)`);
            
            document.getElementById('mission-status').innerHTML = "Status: Menunggu Penjemputan";
            document.getElementById('mission-status').className = "bg-white text-slate-800 text-xs font-bold px-3 py-1.5 rounded-full shadow-sm";
            
            const edges = ['jalur-Rumah-Taman', 'jalur-Rumah-Pasar', 'jalur-Taman-Kampus', 'jalur-Pasar-Kampus', 'jalur-Taman-Pasar'];
            edges.forEach(id => {
                const el = document.getElementById(id);
                if(el) { 
                    el.style.stroke = '#cbd5e1'; 
                    el.style.strokeWidth = '4px'; 
                }
            });

            document.getElementById('kesimpulan-navigasi').classList.add('hidden');
            const inpA = document.getElementById('ans-rute-A');
            const inpB = document.getElementById('ans-rute-B');
            const inpP = document.getElementById('ans-rute-pilihan');
            if(inpA) { inpA.value = ''; inpA.disabled = false; inpA.classList.remove('bg-green-50'); }
            if(inpB) { inpB.value = ''; inpB.disabled = false; inpB.classList.remove('bg-green-50'); }
            if(inpP) { inpP.value = ''; inpP.disabled = false; inpP.classList.remove('bg-green-50'); }
            document.getElementById('btn-cek-navigasi').style.display = 'block';
            document.getElementById('alert-navigasi').classList.add('hidden');
            
            isNavigasiDone = false;
            checkAllStep5Completion();
        }

        function cekAnalisisNavigasi() {
            const ansA = document.getElementById('ans-rute-A').value.trim();
            const ansB = document.getElementById('ans-rute-B').value.trim();
            const ansP = document.getElementById('ans-rute-pilihan').value.trim().toUpperCase();
            const alertBox = document.getElementById('alert-navigasi');

            // WAJIB MAIN SIMULASI DULU
            if(!hasSimOjekPlayed && localStorage.getItem('kuis_navigasi_done_' + currentUserId) !== 'true') {
                alertBox.className = "mt-4 p-3 rounded text-sm font-bold bg-yellow-50 text-yellow-800 border border-yellow-200";
                alertBox.innerText = "⚠️ Selesaikan simulasi navigasi di atas terlebih dahulu (sampai tiba di Kampus) sebelum mengecek jawaban.";
                alertBox.classList.remove('hidden');
                return;
            }

            if(ansA === '' || ansB === '' || ansP === '') {
                alertBox.className = "mt-4 p-3 rounded text-sm font-bold bg-yellow-50 text-yellow-800 border border-yellow-200";
                alertBox.innerText = "⚠️ Lengkapi semua isian terlebih dahulu.";
                alertBox.classList.remove('hidden');
                return;
            }

            if(ansA === '2' && ansB === '3' && ansP === 'A') {
                alertBox.classList.add('hidden');
                document.getElementById('kesimpulan-navigasi').classList.remove('hidden');
                
                document.getElementById('ans-rute-A').disabled = true;
                document.getElementById('ans-rute-B').disabled = true;
                document.getElementById('ans-rute-pilihan').disabled = true;
                document.getElementById('ans-rute-A').classList.add('bg-green-50', 'border-green-400');
                document.getElementById('ans-rute-B').classList.add('bg-green-50', 'border-green-400');
                document.getElementById('ans-rute-pilihan').classList.add('bg-green-50', 'border-green-400');
                document.getElementById('btn-cek-navigasi').style.display = 'none';

                localStorage.setItem('kuis_navigasi_done_' + currentUserId, 'true');
                isNavigasiDone = true;
                checkAllStep5Completion();
            } else {
                alertBox.className = "mt-4 p-3 rounded text-sm font-bold bg-red-50 text-red-800 border border-red-200 animate-pulse";
                alertBox.innerHTML = "❌ Jawaban kurang tepat. Coba hitung lagi jumlah garis (sisi) yang dilalui pada masing-masing rute.";
                alertBox.classList.remove('hidden');
            }
        }

        // ==========================================
        // 2. LOGIKA SIMULASI MEDIA SOSIAL (MUTUAL FRIEND)
        // ==========================================
        let currentSosmedNode = 'Andi';
        let sosmedVisited = ['Andi'];
        let hasSimSosmedPlayed = false;
        
        function klikUserSosmed(targetNode, cx, cy) {
            const toast = document.getElementById('toast-jejaring');
            const instruction = document.getElementById('instruksi-jejaring');

            const sosmedRoutes = {
                'Andi': ['Budi', 'Citra'],
                'Budi': ['Andi', 'Citra', 'Dani'],
                'Citra': ['Andi', 'Budi', 'Dani'],
                'Dani': ['Budi', 'Citra']
            };

            if (!sosmedRoutes[currentSosmedNode].includes(targetNode)) {
                toast.innerText = 'Simpul tidak terhubung langsung!';
                toast.className = 'absolute top-4 left-1/2 -translate-x-1/2 bg-red-600 text-white px-4 py-2 rounded-lg text-sm shadow-lg font-bold z-10 transition-opacity';
                toast.style.opacity = '1';
                setTimeout(() => { toast.style.opacity = '0'; }, 2000);
                return;
            }

            // PERBAIKAN: Gunakan style.stroke agar tidak diganggu CSS class Tailwind
            const edgeId1 = `jalur-${currentSosmedNode}-${targetNode}`;
            const edgeId2 = `jalur-${targetNode}-${currentSosmedNode}`;
            const edgeEl = document.getElementById(edgeId1) || document.getElementById(edgeId2);
            if (edgeEl) {
                edgeEl.style.stroke = '#3b82f6';
                edgeEl.style.strokeWidth = '5px';
            }

            const targetCircle = document.getElementById('bulatan-' + targetNode);
            const targetIcon = document.getElementById('ikon-' + targetNode);
            if(targetCircle) targetCircle.setAttribute('stroke', '#3b82f6');
            if(targetIcon) targetIcon.setAttribute('fill', '#3b82f6');

            currentSosmedNode = targetNode;
            sosmedVisited.push(targetNode);
            instruction.innerHTML = `Posisi saat ini: <b class="text-blue-600">${targetNode}</b>. Menunggu input pengguna...`;

            if (targetNode === 'Dani') {
                toast.innerText = 'Tujuan (Dani) Berhasil Ditemukan!';
                toast.className = 'absolute top-4 left-1/2 -translate-x-1/2 bg-green-600 text-white px-4 py-2 rounded-lg text-sm shadow-lg font-bold z-10 transition-opacity';
                toast.style.opacity = '1';
                setTimeout(() => { toast.style.opacity = '0'; }, 3000);
                
                instruction.innerHTML = `Pencarian Selesai! Jalur: <b>${sosmedVisited.join(' → ')}</b>`;
                hasSimSosmedPlayed = true;
            }
        }

        function resetSimulasiSosmed() {
            currentSosmedNode = 'Andi';
            sosmedVisited = ['Andi'];
            hasSimSosmedPlayed = false;
            document.getElementById('instruksi-jejaring').innerHTML = 'Posisi saat ini: <b class="text-blue-600">Andi</b>. Menunggu input pengguna...';
            
            const edges = ['jalur-Andi-Budi', 'jalur-Andi-Citra', 'jalur-Budi-Dani', 'jalur-Citra-Dani', 'jalur-Budi-Citra'];
            edges.forEach(id => {
                const el = document.getElementById(id);
                if(el) { el.style.stroke = '#cbd5e1'; el.style.strokeWidth = '3px'; }
            });

            const nodes = ['Budi', 'Citra', 'Dani'];
            nodes.forEach(id => {
                const circle = document.getElementById('bulatan-' + id);
                const icon = document.getElementById('ikon-' + id);
                if(circle) circle.setAttribute('stroke', '#94a3b8');
                if(icon) icon.setAttribute('fill', '#94a3b8');
            });

            document.getElementById('kesimpulan-sosmed').classList.add('hidden');
            const ans1 = document.getElementById('ans-sosmed-1');
            const ans2 = document.getElementById('ans-sosmed-2');
            if(ans1) { ans1.value = ''; ans1.disabled = false; ans1.classList.remove('bg-green-50'); }
            if(ans2) { ans2.value = ''; ans2.disabled = false; ans2.classList.remove('bg-green-50'); }
            document.getElementById('btn-cek-sosmed').style.display = 'block';
            document.getElementById('alert-sosmed').classList.add('hidden');

            isSosmedDone = false;
            checkAllStep5Completion();
        }

        function cekAnalisisSosmed() {
            const rawA = document.getElementById('ans-sosmed-1').value.trim().toLowerCase();
            const rawB = document.getElementById('ans-sosmed-2').value.trim().toLowerCase();
            const alertBox = document.getElementById('alert-sosmed');

            // WAJIB MAIN SIMULASI DULU
            if(!hasSimSosmedPlayed && localStorage.getItem('kuis_sosmed_done_' + currentUserId) !== 'true') {
                alertBox.className = "mt-4 p-3 rounded text-sm font-bold bg-yellow-50 text-yellow-800 border border-yellow-200";
                alertBox.innerText = "⚠️ Selesaikan simulasi pencarian teman di atas (sampai mencapai target Dani) sebelum mengecek jawaban.";
                alertBox.classList.remove('hidden');
                return;
            }

            if(rawA === '' || rawB === '') {
                alertBox.className = "mt-4 p-3 rounded text-sm font-bold bg-yellow-50 text-yellow-800 border border-yellow-200";
                alertBox.innerText = "⚠️ Ketikkan kedua nama simpul perantara terlebih dahulu.";
                alertBox.classList.remove('hidden');
                return;
            }

            const isBudi = rawA === 'budi' || rawB === 'budi';
            const isCitra = rawA === 'citra' || rawB === 'citra';

            if(isBudi && isCitra) {
                alertBox.classList.add('hidden');
                document.getElementById('kesimpulan-sosmed').classList.remove('hidden');
                
                document.getElementById('ans-sosmed-1').disabled = true;
                document.getElementById('ans-sosmed-2').disabled = true;
                document.getElementById('ans-sosmed-1').classList.add('bg-green-50', 'border-green-400');
                document.getElementById('ans-sosmed-2').classList.add('bg-green-50', 'border-green-400');
                document.getElementById('btn-cek-sosmed').style.display = 'none';

                localStorage.setItem('kuis_sosmed_done_' + currentUserId, 'true');
                localStorage.setItem('user_ans_sosmed_1_' + currentUserId, document.getElementById('ans-sosmed-1').value);
                localStorage.setItem('user_ans_sosmed_2_' + currentUserId, document.getElementById('ans-sosmed-2').value);

                isSosmedDone = true;
                checkAllStep5Completion();
            } else {
                alertBox.className = "mt-4 p-3 rounded text-sm font-bold bg-red-50 text-red-800 border border-red-200 animate-pulse";
                alertBox.innerHTML = "❌ Kurang tepat. Lihat kembali grafnya, dari Andi menuju Dani bisa melewati siapa saja?";
                alertBox.classList.remove('hidden');
            }
        }

        // ==========================================
        // 3. LOGIKA DRAG & DROP NATIVE (AKTIVITAS 1.4)
        // ==========================================
        function allowDrop14(ev) {
            ev.preventDefault();
            const dropZone = ev.target.closest('.drop-zone');
            if (dropZone) dropZone.classList.add('bg-slate-100');
        }

        function drag14(ev) {
            ev.dataTransfer.setData("text", ev.target.id);
            setTimeout(() => { ev.target.classList.add('opacity-50'); }, 0);
        }

        function dragEnd14(ev) {
            ev.target.classList.remove('opacity-50');
            document.querySelectorAll('.drop-zone').forEach(el => el.classList.remove('bg-slate-100'));
        }

        function drop14(ev) {
            ev.preventDefault();
            const data = ev.dataTransfer.getData("text");
            const item = document.getElementById(data);
            
            document.querySelectorAll('.drop-zone').forEach(el => el.classList.remove('bg-slate-100'));
            
            if(item) {
                item.classList.remove('opacity-50');

                const dropZone = ev.target.closest('.drop-zone');
                if(dropZone) {
                    const contentArea = dropZone.querySelector('.zone-content') || dropZone;
                    contentArea.appendChild(item);
                    
                    if(dropZone.id === 'zone-source-14') {
                        item.classList.remove('w-[95%]');
                    } else {
                        item.classList.add('w-[95%]');
                    }
                }
            }
        }

        document.addEventListener("dragover", function(event) {
            document.querySelectorAll('.drop-zone').forEach(el => el.classList.remove('bg-slate-100'));
        }, false);

        // ==========================================
        // 4. MAIN INIT & PERSISTENCE LOAD
        // ==========================================
        document.addEventListener("DOMContentLoaded", function() {
            
            // A. PEMBERSIHAN MEMORI UNTUK AKUN BARU
            const savedUserId14 = localStorage.getItem('graf_active_user_14');
            if (savedUserId14 !== currentUserId) {
                localStorage.removeItem('kuis_navigasi_done_' + savedUserId14);
                localStorage.removeItem('kuis_sosmed_done_' + savedUserId14);
                localStorage.removeItem('user_ans_sosmed_1_' + savedUserId14);
                localStorage.removeItem('user_ans_sosmed_2_' + savedUserId14);
                localStorage.setItem('graf_active_user_14', currentUserId);
            }

            // B. LOAD KUIS NAVIGASI 
            if(localStorage.getItem('kuis_navigasi_done_' + currentUserId) === 'true') {
                isNavigasiDone = true;
                
                // Simulasikan Rute Akhir Ojek
                const motor = document.getElementById('ikon-motor-14');
                if(motor) motor.setAttribute('transform', `translate(650, 200)`);
                const elRumahPasar = document.getElementById('jalur-Rumah-Pasar');
                const elPasarKampus = document.getElementById('jalur-Pasar-Kampus');
                if(elRumahPasar) { elRumahPasar.style.stroke = '#3b82f6'; elRumahPasar.style.strokeWidth = '6px'; }
                if(elPasarKampus) { elPasarKampus.style.stroke = '#3b82f6'; elPasarKampus.style.strokeWidth = '6px'; }

                const statOjek = document.getElementById('mission-status');
                if(statOjek) {
                    statOjek.innerHTML = "Status: Misi Selesai!";
                    statOjek.className = "bg-green-100 text-green-800 text-xs font-bold px-3 py-1.5 rounded-full shadow-sm";
                }

                document.getElementById('ans-rute-A').value = "2";
                document.getElementById('ans-rute-B').value = "3";
                document.getElementById('ans-rute-pilihan').value = "A";
                document.getElementById('ans-rute-A').disabled = true;
                document.getElementById('ans-rute-B').disabled = true;
                document.getElementById('ans-rute-pilihan').disabled = true;
                document.getElementById('ans-rute-A').classList.add('bg-green-50', 'border-green-400');
                document.getElementById('ans-rute-B').classList.add('bg-green-50', 'border-green-400');
                document.getElementById('ans-rute-pilihan').classList.add('bg-green-50', 'border-green-400');
                document.getElementById('btn-cek-navigasi').style.display = 'none';
                document.getElementById('kesimpulan-navigasi').classList.remove('hidden');
            }

            // C. LOAD KUIS SOSMED
            if(localStorage.getItem('kuis_sosmed_done_' + currentUserId) === 'true') {
                isSosmedDone = true;

                // Simulasikan Rute Akhir Sosmed
                const edgesToColor = ['jalur-Andi-Budi', 'jalur-Andi-Citra', 'jalur-Budi-Dani', 'jalur-Citra-Dani'];
                edgesToColor.forEach(id => {
                    const el = document.getElementById(id);
                    if(el) { el.style.stroke = '#3b82f6'; el.style.strokeWidth = '5px'; }
                });
                const nodesToColor = ['Budi', 'Citra', 'Dani'];
                nodesToColor.forEach(id => {
                    const circle = document.getElementById('bulatan-' + id);
                    const icon = document.getElementById('ikon-' + id);
                    if(circle) circle.setAttribute('stroke', '#3b82f6');
                    if(icon) icon.setAttribute('fill', '#3b82f6');
                });

                const instSosmed = document.getElementById('instruksi-jejaring');
                if(instSosmed) instSosmed.innerHTML = `Pencarian Selesai! Jalur: <b>Andi → Budi → Dani</b> atau <b>Andi → Citra → Dani</b>`;

                document.getElementById('ans-sosmed-1').value = localStorage.getItem('user_ans_sosmed_1_' + currentUserId) || "Budi";
                document.getElementById('ans-sosmed-2').value = localStorage.getItem('user_ans_sosmed_2_' + currentUserId) || "Citra";
                document.getElementById('ans-sosmed-1').disabled = true;
                document.getElementById('ans-sosmed-2').disabled = true;
                document.getElementById('ans-sosmed-1').classList.add('bg-green-50', 'border-green-400');
                document.getElementById('ans-sosmed-2').classList.add('bg-green-50', 'border-green-400');
                document.getElementById('btn-cek-sosmed').style.display = 'none';
                document.getElementById('kesimpulan-sosmed').classList.remove('hidden');
            }

            // D. LOAD AKTIVITAS 1.4 DARI DATABASE
            @if($isDone14)
                isAct14Done = true;
                const moveItem = (itemId, zoneId) => {
                    const item = document.getElementById(itemId);
                    const zone = document.getElementById(zoneId).querySelector('.zone-content') || document.getElementById(zoneId);
                    if(item && zone) {
                        zone.appendChild(item);
                        item.draggable = false; 
                        item.classList.remove('cursor-grab', 'hover:border-blue-400', 'hover:shadow-md');
                        item.classList.add('cursor-default', 'bg-slate-50', 'text-slate-500', 'w-[95%]');
                    }
                };

                moveItem('item-14-2', 'zone-degree-14');
                moveItem('item-14-3', 'zone-edge-14');
                moveItem('item-14-4', 'zone-vertex-14');
                moveItem('item-14-6', 'zone-vertex-14');
                
                const alertBox = document.getElementById('statusAlert14');
                alertBox.className = "p-4 rounded-lg mb-4 text-sm font-bold border bg-green-50 border-green-400 text-green-700 shadow-sm";
                alertBox.innerHTML = "✔ Anda sudah menyelesaikan aktivitas pemetaan data ini dengan sempurna.";
                alertBox.classList.remove('hidden');

                document.getElementById('feedback14').classList.remove('hidden');
                document.getElementById('btnPeriksa14').classList.add('hidden');
                document.getElementById('btnReset14').classList.add('hidden');
            @endif

            checkAllStep5Completion();
        });

        // ---------------------------------------------
        // FUNGSI CEK AKTIVITAS 1.4 (DATABASE)
        // ---------------------------------------------
        function checkAktivitas14() {
            const items = document.querySelectorAll('.draggable-item');
            let isAllCorrect = true;
            let totalPlaced = 0;

            items.forEach(item => {
                const correctCategory = item.getAttribute('data-answer'); 
                const currentContainer = item.parentElement.closest('.drop-zone'); 
                // ID zone format: zone-vertex-14
                const currentCategory = currentContainer ? currentContainer.id.replace('zone-', '').replace('-14', '') : 'source';

                if (currentCategory !== 'source') totalPlaced++;
                if (currentCategory !== correctCategory) isAllCorrect = false;
            });

            const alertBox = document.getElementById('statusAlert14');

            if (totalPlaced === 0) {
                alertBox.className = "p-4 rounded-lg mb-4 text-sm font-bold border bg-yellow-50 border-yellow-200 text-yellow-800 text-center";
                alertBox.innerHTML = "⚠️ Anda belum memindahkan item data apa pun. Silakan tarik item ke dalam kotak kategori.";
                alertBox.classList.remove('hidden');
                return;
            }

            if (isAllCorrect) {
                alertBox.className = "p-4 rounded-lg mb-4 text-sm font-bold border bg-green-50 border-green-400 text-green-700 shadow-sm";
                alertBox.innerHTML = "🎉 Luar biasa! Anda berhasil memetakan semua data ke dalam struktur Graf dengan sangat akurat.";
                
                document.getElementById('feedback14').classList.remove('hidden');
                document.getElementById('btnPeriksa14').classList.add('hidden');
                document.getElementById('btnReset14').classList.add('hidden');

                items.forEach(el => {
                    el.draggable = false;
                    el.classList.remove('cursor-grab');
                    el.classList.add('cursor-default', 'bg-slate-50', 'text-slate-500');
                });

                isAct14Done = true;
                checkAllStep5Completion();

                // KIRIM NILAI KE DATABASE
                if (typeof simpanProgressAktivitas === 'function') {
                    simpanProgressAktivitas('bab1', '1.4', 100);
                }
            } else {
                alertBox.className = "p-4 rounded-lg mb-4 text-sm font-bold border bg-red-50 border-red-300 text-red-700 animate-pulse shadow-sm";
                alertBox.innerHTML = `❌ Penempatan Anda masih belum tepat. Ingat, ada dua data yang bertindak sebagai pengecoh! Silakan coba lagi.`;
            }
            alertBox.classList.remove('hidden');
        }

        function resetAktivitas14() {
            const sourceZone = document.getElementById('zone-source-14');
            const items = document.querySelectorAll('.draggable-item');
            
            items.forEach(item => {
                sourceZone.appendChild(item);
                item.classList.remove('opacity-50', 'w-[95%]');
            });

            document.getElementById('statusAlert14').classList.add('hidden');
        }
    </script>
</section>