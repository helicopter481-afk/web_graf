<section id="step-2" class="step-slide">
    {{-- IMPORT VIS JS --}}
    <script type="text/javascript" src="https://unpkg.com/vis-network/standalone/umd/vis-network.min.js"></script>
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-10 -mt-8">
        {{-- Header Materi --}}
        <div class="border-b border-slate-200 pb-6 mb-8">
            <h2 class="text-3xl font-bold text-slate-900 mb-2">1.2 Komponen Utama Graf</h2>
            <p class="text-slate-500 font-medium">Memahami elemen pembentuk struktur graf: Simpul, Sisi, dan Derajat.</p>
        </div>

        <div class="space-y-6 mb-8">
            {{-- TEKS PENGANTAR --}}
            <div class="text-slate-700 leading-relaxed space-y-4 text-justify">
                <p>Pada submateri sebelumnya telah dijelaskan bahwa komputer memandang dunia nyata melalui proses abstraksi, yaitu menyederhanakan permasalahan kompleks agar dapat diproses secara komputasi. Dalam ilmu komputer, hasil dari proses abstraksi tersebut direpresentasikan dalam bentuk <strong>graf</strong>. Oleh karena itu, pemahaman terhadap komponen utama graf menjadi penting sebelum graf digunakan lebih lanjut dalam perancangan algoritma.</p>
                <p>Sebuah graf <em>G</em> didefinisikan secara formal sebagai pasangan himpunan ( <em>V</em>, <em>E</em> ), di mana <em>V</em> merupakan himpunan simpul dan <em>E</em> merupakan himpunan sisi yang menghubungkan pasangan simpul tersebut.</p>
                <p>Untuk memvisualisasikan abstraksi matematis tersebut, silakan lakukan eksplorasi pada laboratorium mini di bawah ini. <br><br> <strong>Tugas Eksplorasi:</strong> Buatlah minimal <strong>3 Titik (Simpul)</strong> dan hubungkan dengan minimal <strong>3 Garis (Sisi)</strong> untuk membuka materi di bawahnya.</p>
            </div>

            {{-- PANDUAN TOMBOL --}}
            <div class="bg-slate-50 border border-slate-200 rounded-xl p-5">
                <h4 class="text-sm font-bold text-slate-800 mb-4 flex items-center gap-2">Panduan:</h4>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="flex items-start gap-3">
                        <div class="mt-1 min-w-[24px] h-6 flex items-center justify-center bg-blue-100 text-blue-600 rounded text-xs font-bold">1</div>
                        <div>
                            <span class="text-xs font-bold text-slate-900 bg-white border border-slate-200 px-2 py-1 rounded shadow-sm mb-1 inline-block">Tambah Titik</span>
                            <p class="text-xs text-slate-600 leading-snug mt-1">Aktifkan mode ini, lalu <strong>klik area kosong</strong> pada kanvas untuk membuat Simpul baru.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="mt-1 min-w-[24px] h-6 flex items-center justify-center bg-slate-200 text-slate-600 rounded text-xs font-bold">2</div>
                        <div>
                            <span class="text-xs font-bold text-slate-700 bg-white border border-slate-200 px-2 py-1 rounded shadow-sm mb-1 inline-block">Hubungkan Titik</span>
                            <p class="text-xs text-slate-600 leading-snug mt-1">Klik & tahan dari satu titik, lalu <strong>tarik garis</strong> ke titik lainnya untuk membuat Sisi.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="mt-1 min-w-[24px] h-6 flex items-center justify-center bg-red-100 text-red-600 rounded text-xs font-bold">3</div>
                        <div>
                            <span class="text-xs font-bold text-red-600 bg-red-50 border border-red-100 px-2 py-1 rounded shadow-sm mb-1 inline-block">Ulangi</span>
                            <p class="text-xs text-slate-600 leading-snug mt-1">Jika terjadi kesalahan atau ingin mencoba lagi, tekan tombol ini untuk <strong>reset kanvas</strong>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- 1. SANDBOX (Main Lab) --}}
        <div class="sb-container">
            <div class="sb-header">
                <h3 class="sb-title">Laboratorium Graf</h3>
                <div class="progress-pill" id="progress-text">PROGRESS: 0/3 TITIK | 0/3 GARIS</div>
            </div>
            <div class="sb-toolbar">
                <button id="btn-node" class="sb-btn active" onclick="setMode('addNode')">Tambah Titik</button>
                <button id="btn-edge" class="sb-btn" onclick="setMode('addEdge')">Hubungkan Titik</button>
                <button class="sb-btn sb-btn-reset" onclick="confirmReset()">Ulangi</button>
            </div>
            <div style="position: relative;">
                <div id="app-toast" class="custom-toast"><span id="toast-icon">⚠️</span> <span id="toast-msg">Error</span></div>
                <div id="reset-modal" class="modal-overlay">
                    <div class="modal-box">
                        <span style="font-size: 30px; margin-bottom: 10px; display: block;">🗑️</span>
                        <span class="modal-title">Ulangi dari awal?</span>
                        <div class="modal-actions mt-4">
                            <button class="btn-cancel" onclick="closeModal()">Batal</button>
                            <button class="btn-confirm" onclick="executeReset()">Ya, Ulangi</button>
                        </div>
                    </div>
                </div>
                <div id="mynetwork"></div>
                <div class="mode-label" id="mode-text">Mode: Klik area kosong untuk menambah titik.</div>
            </div>
        </div>

        {{-- WRAPPER KONTEN TERKUNCI --}}
        <div class="relative min-h-[500px]">
            <div id="main-lock-overlay" class="main-lock-overlay">
                <span>🔒</span><span>Selesaikan Misi Laboratorium di atas untuk membuka materi</span>
            </div>

            <div id="locked-content-area" class="content-locked">
                <div class="text-slate-700 mb-8 font-medium text-center bg-blue-50 p-4 rounded-lg border border-blue-100 text-blue-900">
                    Selamat! Anda telah berhasil membuat representasi visual dari Graf.
                    <p class="text-center mt-2">Berdasarkan hasil eksplorasi pada simulasi tersebut, graf tersusun atas beberapa komponen utama berikut.</p>
                </div>

                <div class="section-divider my-10 border-t border-slate-200"></div>

                {{-- MATERI TEKS --}}
                <div class="mb-10">
                    <h3 class="text-xl font-bold text-slate-900 mb-6">Definisi Komponen Graf</h3>
                    <div class="grid gap-6 md:grid-cols-3 mb-8">
                        <div class="bg-slate-50 p-5 rounded-lg border border-slate-200">
                            <div class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center font-bold text-sm mb-3">1</div>
                            <h4 class="font-bold text-slate-900 mb-2">Simpul (Vertex)</h4>
                            <p class="text-sm text-slate-600 mb-3">Objek bulat yang Anda ciptakan pertama kali disebut Simpul atau Vertex.</p>
                            <ul class="text-sm text-slate-700 space-y-2 list-disc pl-4">
                                <li><strong>Definisi:</strong> bagian graf yang merepresentasikan entitas atau objek data yang bersifat diskrit.</li>
                                <li><strong>Notasi:</strong> Dalam himpunan matematika, simpul sering dinotasikan sebagai <em>V</em>.</li>
                            </ul>
                        </div>
                        <div class="bg-slate-50 p-5 rounded-lg border border-slate-200">
                            <div class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center font-bold text-sm mb-3">2</div>
                            <h4 class="font-bold text-slate-900 mb-2">Sisi (Edge)</h4>
                            <p class="text-sm text-slate-600 mb-3">Garis yang menghubungkan dua simpul disebut Sisi atau Edge.</p>
                            <ul class="text-sm text-slate-700 space-y-2 list-disc pl-4">
                                <li><strong>Definisi:</strong> Komponen yang merepresentasikan relasi atau hubungan antara dua simpul.</li>
                                <li><strong>Notasi:</strong> Dalam himpunan matematika, sisi dinotasikan sebagai <em>E</em>.</li>
                            </ul>
                        </div>
                        <div class="bg-slate-50 p-5 rounded-lg border border-slate-200">
                            <div class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center font-bold text-sm mb-3">3</div>
                            <h4 class="font-bold text-slate-900 mb-2">Derajat (Degree)</h4>
                            <p class="text-sm text-slate-600 mb-3">Perhatikan jumlah garis yang menempel pada satu simpul.</p>
                            <ul class="text-sm text-slate-700 space-y-2 list-disc pl-4">
                                <li><strong>Definisi:</strong> Jumlah sisi yang terhubung langsung dengan simpul tersebut.</li>
                                <li><strong>Notasi:</strong> Derajat dari simpul <em>V</em> dinotasikan sebagai <em>deg(v)</em>.</li>
                                <li><strong>Analogi:</strong> Jika simpul dianalogikan sebagai sebuah rumah, maka derajat menunjukkan jumlah jalan yang menuju ke rumah tersebut.</li>
                            </ul>
                        </div>
                    </div>

                    {{-- BRIDGING KE JEMBATAN (GABUNGAN FUN FACT) --}}
                    <div class="space-y-6">
                        <div class="bg-indigo-50 border-l-4 border-indigo-500 p-6 rounded-r-lg shadow-sm">
                            <div class="flex items-center gap-2 mb-3">
                                <span class="text-xl">🔍</span>
                                <h4 class="font-bold text-indigo-900 text-lg">Fun Fact Sejarah</h4>
                            </div>
                            <p class="text-slate-700 leading-relaxed text-sm mb-4 text-justify">
                                Pemahaman mengenai komponen graf berawal dari permasalahan nyata yang dikenal sebagai <strong>Tujuh Jembatan Königsberg</strong> pada abad ke-18. Leonhard Euler (1736) menunjukkan bahwa permasalahan fisik dapat disederhanakan menjadi representasi titik dan garis. Pendekatan ini menjadi fondasi awal perkembangan teori graf modern.
                            </p>
                        </div>

                        <div class="bg-gradient-to-r from-amber-500 via-orange-500 to-red-500 rounded-t-xl px-6 py-5 shadow-lg">
                            <h4 class="text-xl font-extrabold text-white drop-shadow-md">Tantangan: 7 Jembatan Königsberg</h4>
                        </div>

                        <div class="bg-white rounded-b-xl p-6 border-2 border-orange-300 shadow-md">
                            <div class="text-sm text-slate-700 space-y-3 text-justify">
                                <p class="leading-relaxed">
                                    Pada tahun 1736, muncul sebuah teka-teki yang membingungkan:
                                    <em class="text-slate-900 font-semibold">"Bisakah melewati semua jembatan hanya dengan satu kali perjalanan?"</em>
                                </p>
                                <div class="bg-slate-50 border border-slate-300 rounded-lg p-4">
                                    <p class="font-semibold text-slate-900 mb-2">Instruksi permainan:</p>
                                    <p class="text-slate-600 mb-3">Klik daratan (huruf) untuk memulai, kemudian klik jembatan yang menyala untuk berpindah.</p>
                                    <p class="text-slate-900"><strong>Target:</strong> Melewati 7 jembatan tanpa mengulang jalur yang sama dengan 3 kali kesempatan. Tekan button "reset" untuk mengulang kesempatan. Button "Graf" untuk melihat bentuk graf yang terbentuk.</p>
                                </div>
                            </div>
                        </div>

                        {{-- 2. GAME JEMBATAN (App Container) --}}
                        <div>
                            <div id="app-container">
                                <header class="kg-game-header">
                                    <h2>7 Jembatan Königsberg</h2>
                                    <div class="attempt-box"><span>❤️ Kesempatan:</span> <span id="attempt-count">3</span>/3</div>
                                </header>
                                <div class="map-wrapper">
                                    <svg viewBox="0 0 900 500" id="game-svg" preserveAspectRatio="xMidYMid meet">
                                        <g id="bridges-layer">
                                            <g id="b1" class="bridge-group" onclick="crossBridge('b1', 'C', 'A', 280, 140)">
                                                <rect x="265" y="60" width="30" height="170" class="bridge-body" transform="rotate(-15 280 140)" />
                                            </g>
                                            <g id="b2" class="bridge-group" onclick="crossBridge('b2', 'C', 'A', 460, 140)">
                                                <rect x="445" y="60" width="30" height="170" class="bridge-body" transform="rotate(15 460 140)" />
                                            </g>
                                            <g id="b3" class="bridge-group" onclick="crossBridge('b3', 'B', 'A', 280, 360)">
                                                <rect x="265" y="270" width="30" height="170" class="bridge-body" transform="rotate(15 280 360)" />
                                            </g>
                                            <g id="b4" class="bridge-group" onclick="crossBridge('b4', 'B', 'A', 460, 360)">
                                                <rect x="445" y="270" width="30" height="170" class="bridge-body" transform="rotate(-15 460 360)" />
                                            </g>
                                            <g id="b5" class="bridge-group" onclick="crossBridge('b5', 'A', 'D', 630, 250)">
                                                <rect x="540" y="235" width="180" height="30" class="bridge-body" />
                                            </g>
                                            <g id="b6" class="bridge-group" onclick="crossBridge('b6', 'C', 'D', 740, 150)">
                                                <rect x="725" y="70" width="30" height="160" class="bridge-body" transform="rotate(-45 740 150)" />
                                            </g>
                                            <g id="b7" class="bridge-group" onclick="crossBridge('b7', 'B', 'D', 740, 350)">
                                                <rect x="725" y="270" width="30" height="160" class="bridge-body" transform="rotate(45 740 350)" />
                                            </g>
                                        </g>
                                        <g id="lands-layer">
                                            <path id="land-C" class="land-shape" d="M -50,-50 L 950,-50 L 950,80 Q 850,120 700,130 T 400,120 T -50,150 Z" onclick="setStartNode('C')" />
                                            <path id="land-B" class="land-shape" d="M -50,550 L 950,550 L 950,420 Q 850,380 700,370 T 400,380 T -50,350 Z" onclick="setStartNode('B')" />
                                            <path id="land-D" class="land-shape" d="M 950,80 L 950,420 Q 800,380 750,300 Q 680,250 750,200 Q 800,120 950,80 Z" onclick="setStartNode('D')" />
                                            <ellipse id="land-A" class="land-shape" cx="370" cy="250" rx="200" ry="75" onclick="setStartNode('A')" />
                                        </g>
                                        <g id="labels-layer">
                                            <text x="370" y="260" text-anchor="middle" class="region-label">A</text>
                                            <text x="450" y="60" text-anchor="middle" class="region-label">C</text>
                                            <text x="450" y="440" text-anchor="middle" class="region-label">B</text>
                                            <text x="860" y="260" text-anchor="middle" class="region-label">D</text>
                                        </g>
                                        <g id="graph-overlay" class="graph-layer">
                                            <path class="g-edge" d="M 450,60 Q 300,100 370,250" />
                                            <path class="g-edge" d="M 450,60 Q 440,100 370,250" />
                                            <path class="g-edge" d="M 450,440 Q 300,400 370,250" />
                                            <path class="g-edge" d="M 450,440 Q 440,400 370,250" />
                                            <path class="g-edge" d="M 370,250 L 860,250" />
                                            <path class="g-edge" d="M 450,60 Q 700,100 860,250" />
                                            <path class="g-edge" d="M 450,440 Q 700,400 860,250" />
                                            <circle class="g-node" cx="450" cy="60" /> <text class="g-text" x="450" y="60">C</text>
                                            <circle class="g-node" cx="450" cy="440" /> <text class="g-text" x="450" y="440">B</text>
                                            <circle class="g-node" cx="370" cy="250" /> <text class="g-text" x="370" y="250">A</text>
                                            <circle class="g-node" cx="860" cy="250" /> <text class="g-text" x="860" y="250">D</text>
                                        </g>
                                        <g id="player" class="player-token" transform="translate(10,10)" style="opacity:0;">
                                            <circle cx="0" cy="0" r="15" fill="#dc2626" stroke="white" stroke-width="3" />
                                            <circle cx="0" cy="0" r="6" fill="white" />
                                        </g>
                                    </svg>
                                </div>
                                <footer class="kg-footer">
                                    <div class="status-text"><span id="status-icon">📍</span> <span id="status-text">Klik huruf A, B, C, atau D untuk mulai.</span></div>
                                    <div>
                                        <button class="btn-graph" onclick="toggleGraph(this)">👁️ Graf</button>
                                        <button class="btn-reset-game" onclick="resetBridgeGame()">🗑️ Reset</button>
                                    </div>
                                </footer>
                            </div>
                            
                            {{-- EDU SECTION (KOTAK PENJELASAN) --}}
                            <div id="edu-section" style="display: none;">
                                <div class="edu-content text-justify">
                                    <h3>💡 Hasil Percobaan: Kenapa Selalu Gagal?</h3>
                                    <p>Jangan khawatir! Kegagalanmu membuktikan teori matematika yang ditemukan oleh <b>Leonhard Euler</b> pada tahun 1736. Ia membuktikan bahwa rute tersebut memang tidak ada karena jumlah derajat ganjilnya berlebih. Sebuah graf hanya bisa dilewati tepat satu kali (Lintasan Euler) jika jumlah simpul berderajat ganjil maksimal hanya dua.</p>
                                    <p><b>Analisis Peta Ini:</b></p>
                                    <ul class="list-disc pl-5 space-y-2 mt-2">
                                        <li>Wilayah A (Pulau) punya <b>5</b> jembatan (Ganjil).</li>
                                        <li>Wilayah B, C, dan D masing-masing punya <b>3</b> jembatan (Ganjil).</li>
                                    </ul>
                                    <p class="mt-4">Karena ke-4 wilayah memiliki derajat ganjil, maka mustahil membuat rute tanpa mengangkat pena. Inilah sejarah lahirnya <b>Teori Graf!</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- BRIDGING KE EKSPLORASI DERAJAT --}}
                <div class="mb-10 pt-8 border-t border-slate-200">
                    <p class="text-slate-700 leading-relaxed mb-6 text-justify">
                        Melalui simulasi Jembatan Königsberg, dapat dipahami bahwa keberhasilan atau kegagalan suatu permasalahan graf ditentukan oleh struktur hubungannya, bukan oleh bentuk visualnya. Oleh karena itu, dalam pemrograman komputer, representasi visual perlu diterjemahkan ke dalam struktur data agar dapat dianalisis secara komputasi. Berikut adalah contoh sederhana representasi graf menggunakan bahasa pemrograman Python.
                    </p>
                    
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Eksplorasi Visual: Dinamika Derajat Simpul</h3>
                    <p class="text-slate-600 mb-6 text-sm leading-relaxed text-justify">Setelah memahami Teorema Euler, mari kita amati bagaimana sebuah garis (sisi) memengaruhi nilai derajat secara <em>real-time</em>.</p>
                    
                    {{-- 3. VISUALISASI DERAJAT --}}
                    <div class="bg-slate-50 border border-slate-200 rounded-xl p-6 shadow-sm mb-8 max-w-4xl mx-auto">
                        <div id="visNetwork4_new" class="w-full h-[350px] bg-white border border-slate-300 rounded-lg overflow-hidden shadow-inner"></div>
                        <div class="mt-5 flex gap-4 justify-center">
                            <button id="btn-tambah-sisi-baru" onclick="window.tambahSisiBaruCD()" class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-bold transition-all shadow flex items-center gap-2"><span>➕</span> Tambah Sisi (C–D)</button>
                            <button onclick="window.resetGrafBaruCD()" class="px-6 py-2.5 bg-white border border-slate-300 hover:bg-slate-50 text-slate-700 rounded-lg text-sm font-bold transition-all shadow-sm">Reset</button>
                        </div>
                    </div>

                    {{-- KUIS INTERAKTIF: ANALISIS DERAJAT --}}
                    <div class="p-8 bg-white border border-slate-200 rounded-xl shadow-sm">
                        <div class="space-y-5 text-sm text-slate-700 text-justify">
                            <p><strong>Kondisi Awal:</strong> Simpul C dan D masing-masing hanya terhubung dengan 1 sisi (Derajat 1 / Ganjil).</p>
                            <p><strong>Instruksi:</strong> Tekan tombol <strong>"Tambah Sisi (C-D)"</strong> pada panel di atas dan amati perubahan pada graf.</p>
                            
                            <div class="bg-blue-50 border border-blue-200 p-6 rounded-lg mt-4 shadow-sm">
                                <p class="font-bold text-blue-900 mb-3 text-base">Tugas Analisis:</p>
                                <p class="mb-5 leading-relaxed">Setelah Anda mengeklik tombol "Tambah Sisi (C-D)", berapakah jumlah total penambahan derajat pada keseluruhan graf tersebut?</p>
                                
                                <div class="flex items-center gap-4">
                                    <label class="font-bold text-slate-700">Jawaban:</label>
                                    <input type="text" id="ans-derajat" class="w-24 p-3 border border-slate-300 rounded-lg focus:border-blue-500 focus:ring focus:ring-blue-100 outline-none font-bold text-slate-800 text-center text-lg" placeholder="...">
                                    <button onclick="window.cekAnalisisDerajat()" id="btn-cek-derajat" class="bg-slate-800 hover:bg-slate-900 text-white px-6 py-3 rounded-lg font-bold transition-all active:scale-95 shadow-sm">Cek Jawaban</button>
                                </div>
                                <div id="alert-derajat" class="hidden mt-4 p-3 rounded-lg text-sm font-bold shadow-sm"></div>
                            </div>

                            <div id="kesimpulan-derajat" class="hidden mt-6 bg-green-50 border border-green-300 p-6 rounded-xl shadow-sm transition-all duration-500">
                                <h4 class="font-bold text-green-900 mb-3 flex items-center gap-2 text-base">
                                    <i class="fa-solid fa-check-circle text-green-600"></i> Kesimpulan Evaluasi
                                </h4>
                                <p class="text-green-800 leading-relaxed">
                                    Tepat! Penambahan 1 sisi baru antara C dan D menyebabkan derajat Simpul C bertambah 1 dan derajat Simpul D bertambah 1. Eksplorasi ini membuktikan prinsip fundamental graf: <strong class="text-green-900">Setiap penambahan 1 sisi akan selalu menyumbang/menambah total derajat graf sebanyak 2.</strong>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- AKTIVITAS 1.2 --}}
                @php
                    $isDone12 = isset($progress['1.2']) && $progress['1.2']->score == 100;
                @endphp

                <div class="mt-12 pt-8 border-t-[3px] border-dashed border-slate-200">
                    <div class="bg-white">
                        <div class="flex items-center gap-3 mb-6">
                            <span class="bg-yellow-500 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider shadow-sm">💡 Aktivitas 1.2</span>
                            <h4 class="font-bold text-slate-900 text-xl">Studi Kasus: Analisis Jaringan Komunikasi</h4>
                        </div>

                        <div class="bg-blue-50 border border-blue-100 rounded-xl p-6 mb-8 shadow-sm">
                            <div class="text-sm text-blue-800 leading-relaxed text-justify space-y-4">
                                <p>Sebuah perusahaan memiliki 5 kantor cabang (A, B, C, D, E) yang terhubung dalam satu jaringan komunikasi. Kantor C bertindak sebagai <strong>server pusat</strong> yang menghubungkan cabang-cabang lainnya.</p>
                                <div class="bg-white/70 p-3 rounded border border-blue-200 font-semibold text-blue-900 shadow-sm">
                                    Tugas Anda: Analisislah struktur topologi graf di bawah ini untuk menjawab evaluasi teknis jaringan!
                                </div>
                            </div>
                        </div>

                        <div class="bg-white p-2 rounded-xl border border-slate-300 shadow-sm mb-8">
                            <div id="vis-lima-simpul" class="w-full h-[300px] bg-slate-50 border border-slate-200 rounded-lg outline-none"></div>
                            <p class="text-center text-xs font-bold text-slate-500 mt-2 pb-2">Gambar 9: Contoh Graf Lima Simpul</p>
                        </div>

                        <div class="space-y-6" id="quizContainer12">
                            <div class="quiz-item bg-white border border-slate-200 rounded-xl p-6 shadow-sm hover:border-blue-300 transition-colors">
                                <div class="flex gap-3 mb-3 items-baseline">
                                    <span class="bg-slate-800 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs font-bold shrink-0">1</span>
                                    <div class="text-slate-800 text-sm leading-relaxed">
                                        Berdasarkan visualisasi graf tersebut, simpul manakah yang memegang peran paling krusial (memiliki nilai derajat tertinggi) sehingga jika simpul ini mati, mayoritas jaringan akan lumpuh?
                                    </div>
                                </div>
                                <div class="pl-9 mt-2 flex flex-wrap items-center gap-3">
                                    <label class="font-bold text-sm text-slate-700">Jawaban:</label>
                                    <input type="text" id="q1_2_1" class="w-48 p-2.5 border border-slate-300 rounded-lg focus:border-blue-500 outline-none font-bold text-slate-800" placeholder="Ketik simpul...">
                                </div>
                            </div>

                            <div class="quiz-item bg-white border border-slate-200 rounded-xl p-6 shadow-sm hover:border-blue-300 transition-colors">
                                <div class="flex gap-3 mb-4 items-baseline">
                                    <span class="bg-slate-800 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs font-bold shrink-0">2</span>
                                    <div class="text-slate-800 text-sm leading-relaxed">
                                        Jika terjadi kerusakan fisik pada kabel sehingga sisi yang menghubungkan C dan D terputus (dihapus), apa dampak struktural yang terjadi pada graf tersebut? <br><em class="text-blue-600 text-xs mt-1 block">(Pilih semua pernyataan yang tepat)</em>
                                    </div>
                                </div>
                                <div class="space-y-2 pl-9">
                                    <label class="flex items-center gap-3 p-3 border rounded-lg cursor-pointer hover:bg-slate-50 transition">
                                        <input type="checkbox" name="q1_2_2" value="opt1" class="w-5 h-5 text-blue-600 rounded">
                                        <span class="text-sm text-slate-700">Derajat Simpul C berkurang 1</span>
                                    </label>
                                    <label class="flex items-center gap-3 p-3 border rounded-lg cursor-pointer hover:bg-slate-50 transition">
                                        <input type="checkbox" name="q1_2_2" value="opt2" class="w-5 h-5 text-blue-600 rounded">
                                        <span class="text-sm text-slate-700">Simpul D menjadi simpul terisolasi (derajat 0)</span>
                                    </label>
                                    <label class="flex items-center gap-3 p-3 border rounded-lg cursor-pointer hover:bg-slate-50 transition">
                                        <input type="checkbox" name="q1_2_2" value="opt3" class="w-5 h-5 text-blue-600 rounded">
                                        <span class="text-sm text-slate-700">Total sisi (edge) dalam graf bertambah</span>
                                    </label>
                                    <label class="flex items-center gap-3 p-3 border rounded-lg cursor-pointer hover:bg-slate-50 transition">
                                        <input type="checkbox" name="q1_2_2" value="opt4" class="w-5 h-5 text-blue-600 rounded">
                                        <span class="text-sm text-slate-700">Koneksi dari A ke B ikut terputus</span>
                                    </label>
                                </div>
                            </div>

                            <div class="quiz-item bg-white border border-slate-200 rounded-xl p-6 shadow-sm hover:border-blue-300 transition-colors">
                                <div class="flex gap-3 mb-3 items-baseline">
                                    <span class="bg-slate-800 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs font-bold shrink-0">3</span>
                                    <div class="text-slate-800 text-sm leading-relaxed">
                                        Untuk mencegah putusnya komunikasi jika jalur tengah bermasalah, teknisi menambahkan satu sisi cadangan <em>(backup link)</em> langsung antara simpul A dan E. Penambahan sisi baru ini secara otomatis akan meningkatkan nilai ____________ dari simpul A dan E secara bersamaan.
                                    </div>
                                </div>
                                <div class="pl-9 mt-2 flex flex-wrap items-center gap-3">
                                    <label class="font-bold text-sm text-slate-700">Jawaban:</label>
                                    <input type="text" id="q1_2_3" class="w-48 p-2.5 border border-slate-300 rounded-lg focus:border-blue-500 outline-none font-bold text-slate-800" placeholder="Ketik jawaban...">
                                </div>
                            </div>
                        </div>

                        <div class="mt-8">
                            <div id="statusAlert12" class="hidden p-4 rounded-lg mb-4 text-sm font-bold border shadow-sm"></div>
                            <div id="feedback12" class="hidden p-6 rounded-xl bg-blue-50 border border-blue-200 text-slate-800 text-sm leading-relaxed mb-6 shadow-sm">
                                <h4 class="font-bold text-blue-900 mb-3 flex items-center gap-2 border-b border-blue-200 pb-2">Kesimpulan Evaluasi:</h4>
                                <p class="text-justify">Analisis yang tajam! Dalam topologi jaringan, simpul dengan derajat tertinggi (seperti Simpul C) disebut sebagai <em>Central Node</em> atau titik kritis. Memahami konsep <strong>Simpul, Sisi, dan Derajat</strong> tidak hanya berguna di atas kertas matematis, tetapi juga sangat aplikatif di dunia nyata untuk memetakan kekuatan dan kerentanan sebuah infrastruktur jaringan komputer.</p>
                            </div>
                            <div class="flex justify-end mt-4">
                                <button type="button" id="btnPeriksa12" onclick="window.checkAktivitas12()" class="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold rounded-lg shadow-md transition-all active:scale-95 flex items-center gap-2">
                                    <i class="fa-solid fa-paper-plane"></i> Kirim & Periksa Jawaban
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between gap-4 mt-12 pt-6 border-t-2 border-slate-100">
                    <button type="button" onclick="prevStep()" class="btn-secondary px-6 py-2.5 rounded-lg border border-slate-300 font-bold text-slate-600 hover:bg-slate-50 transition">Kembali</button>
                    <button id="btnNext12" type="button" onclick="nextStep()" class="btn-primary bg-slate-900 text-white px-6 py-2.5 rounded-lg font-bold opacity-50 cursor-not-allowed transition hover:bg-slate-800" disabled>Lanjut</button>
                </div>
            </div>

            <script>
              
                window.gl_nodes_derajat = null;
                window.gl_edges_derajat = null;
                window.gl_net_derajat = null;
                window.gl_net_lima = null;
                
                document.addEventListener("DOMContentLoaded", function() {
                    const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                    
                    const keyDerajat = 'analisis_derajat_done_user_' + userId;
                    const keyQ1 = 'user_ans_1_2_1_user_' + userId;
                    const keyQ2 = 'user_ans_1_2_2_user_' + userId;
                    const keyQ3 = 'user_ans_1_2_3_user_' + userId;
                    const storageKeyDone = 'lab_1_2_done_user_' + userId;
                    const storageKeyData = 'lab_1_2_data_user_' + userId;
                    const keyKg = 'konigsberg_global_done';

                    // ========================================================
                    // 0. INIT VIS.JS EKSPLORASI DERAJAT
                    // ========================================================
                    window.gl_nodes_derajat = new vis.DataSet([
                        { id: 'A', label: 'A', x: -150, y: -100, color: { background: '#3b82f6', border: '#2563eb' }, font: { color: 'white', size: 24, face: 'Inter', bold: true } },
                        { id: 'B', label: 'B', x: 150, y: -100, color: { background: '#3b82f6', border: '#2563eb' }, font: { color: 'white', size: 24, face: 'Inter', bold: true } },
                        { id: 'C', label: 'C', x: -150, y: 100, color: { background: '#10b981', border: '#059669' }, font: { color: 'white', size: 24, face: 'Inter', bold: true } },
                        { id: 'D', label: 'D', x: 150, y: 100, color: { background: '#f59e0b', border: '#d97706' }, font: { color: 'white', size: 24, face: 'Inter', bold: true } }
                    ]);
                    window.gl_edges_derajat = new vis.DataSet([
                        { id: 'e1', from: 'A', to: 'B', color: { color: '#cbd5e1' }, width: 4 },
                        { id: 'e2', from: 'A', to: 'C', color: { color: '#cbd5e1' }, width: 4 },
                        { id: 'e3', from: 'B', to: 'D', color: { color: '#cbd5e1' }, width: 4 }
                    ]);
                    const container4 = document.getElementById('visNetwork4_new');
                    window.gl_net_derajat = new vis.Network(container4, { nodes: window.gl_nodes_derajat, edges: window.gl_edges_derajat }, {
                        physics: false,
                        interaction: { dragNodes: false, dragView: false, zoomView: false },
                        nodes: { shape: 'circle', margin: 20, borderWidth: 3 }
                    });

                    // ========================================================
                    // 1. INIT VIS.JS GRAF LIMA SIMPUL
                    // ========================================================
                    const nodes12 = new vis.DataSet([
                        { id: 'A', label: 'A', x: 0, y: -150, color: { background: '#3b82f6', border: '#2563eb' }, font: { color: 'white', size: 18 } },
                        { id: 'B', label: 'B', x: 0, y: -75,  color: { background: '#3b82f6', border: '#2563eb' }, font: { color: 'white', size: 18 } },
                        { id: 'C', label: 'C', x: 0, y: 0,    color: { background: '#8b5cf6', border: '#7c3aed' }, font: { color: 'white', size: 18 } },
                        { id: 'E', label: 'E', x: -100, y: 75, color: { background: '#f59e0b', border: '#d97706' }, font: { color: 'white', size: 18 } },
                        { id: 'D', label: 'D', x: 100, y: 75,  color: { background: '#10b981', border: '#059669' }, font: { color: 'white', size: 18 } }
                    ]);

                    const edges12 = new vis.DataSet([
                        { from: 'A', to: 'B', color: { color: '#cbd5e1' }, width: 3 },
                        { from: 'B', to: 'C', color: { color: '#cbd5e1' }, width: 3 },
                        { from: 'C', to: 'D', color: { color: '#cbd5e1' }, width: 3 },
                        { from: 'C', to: 'E', color: { color: '#cbd5e1' }, width: 3 }
                    ]);

                    const container12 = document.getElementById('vis-lima-simpul');
                    window.gl_net_lima = new vis.Network(container12, { nodes: nodes12, edges: edges12 }, {
                        physics: false, 
                        interaction: { dragNodes: false, dragView: false, zoomView: false, hover: true },
                        nodes: { shape: 'circle', margin: 10, borderWidth: 2 }
                    });

                    // ========================================================
                    // 🔥 SISTEM PEMAKSA RENDER GRAF AGAR TIDAK NUMPUK DI POJOK
                    // ========================================================
                    function forceFixVisJs() {
                        setTimeout(() => {
                            const step3 = document.getElementById('step-3');
                            // Hanya rapikan jika step 3 sedang aktif / tampil
                            if (step3 && (step3.classList.contains('step-active') || step3.style.display !== 'none')) {
                                if (window.gl_net_derajat) { window.gl_net_derajat.redraw(); window.gl_net_derajat.fit({ animation: false }); }
                                if (window.gl_net_lima) { window.gl_net_lima.redraw(); window.gl_net_lima.fit({ animation: false }); }
                                if (typeof window.sbNetwork !== 'undefined' && window.sbNetwork) { window.sbNetwork.redraw(); window.sbNetwork.fit({ animation: false }); }
                            }
                        }, 150); // Beri waktu CSS untuk merender layar sebelum di-fit
                    }

                    // Panggil setiap kali user klik tombol navigasi (Sidebar / Lanjut / Kembali)
                    document.body.addEventListener('click', function(e) {
                        if (e.target.closest('button') || e.target.closest('.sidebar-nav-item')) {
                            forceFixVisJs();
                        }
                    });
                    
                    // Panggil juga jika ukuran layar berubah
                    window.addEventListener('resize', forceFixVisJs);


                    // --- PEMBERSIHAN MEMORI UNTUK AKUN BARU ---
                    const savedUserId12 = localStorage.getItem('graf_active_user_12');
                    if (savedUserId12 && savedUserId12 !== userId) {
                        localStorage.removeItem(storageKeyDone);
                        localStorage.removeItem(storageKeyData);
                        localStorage.removeItem(keyQ1);
                        localStorage.removeItem(keyQ2);
                        localStorage.removeItem(keyQ3);
                        localStorage.removeItem('act_1_2_done_user_' + savedUserId12);
                        localStorage.removeItem(keyDerajat);
                    }
                    localStorage.setItem('graf_active_user_12', userId);

                    // ========================================================
                    // LOGIKA PERSISTENCE LAB UTAMA (MENGEMBALIKAN GAMBAR SISWA)
                    // ========================================================
                    const isLabDoneLocal = localStorage.getItem(storageKeyDone) === 'true';
                    const isLabDoneServer = {{ isset($progress['lab1.2']) && $progress['lab1.2']->score == 100 ? 'true' : 'false' }};
                    const lockOverlay = document.getElementById('main-lock-overlay');
                    const lockedContent = document.getElementById('locked-content-area');
                    const progressText = document.getElementById('progress-text');

                    let isRestoringLab = isLabDoneLocal || isLabDoneServer;

                    // SIMPAN GRAF BUATAN SISWA KE LOKAL (JIKA BELUM TERSIMPAN)
                    if (lockedContent && !isRestoringLab) {
                        const observerLab = new MutationObserver((mutations) => {
                            mutations.forEach((mutation) => {
                                if (!lockedContent.classList.contains('content-locked')) {
                                    localStorage.setItem(storageKeyDone, 'true');
                                    
                                    setTimeout(() => {
                                        try {
                                            if (typeof window.sbNodes !== 'undefined' && typeof window.sbEdges !== 'undefined') {
                                                if(window.sbNodes.get().length > 0) {
                                                    const finalData = { nodes: window.sbNodes.get(), edges: window.sbEdges.get() };
                                                    localStorage.setItem(storageKeyData, JSON.stringify(finalData));
                                                }
                                            }
                                        } catch(e) { console.error("Gagal simpan graf:", e); }
                                    }, 500); 
                                    observerLab.disconnect();
                                }
                            });
                        });
                        observerLab.observe(lockedContent, { attributes: true, attributeFilter: ['class'] });
                    }

                    // KEMBALIKAN GRAF SAAT HALAMAN DI-REFRESH
                    if (isRestoringLab) {
                        if (lockOverlay) lockOverlay.style.display = 'none';
                        if (lockedContent) {
                            lockedContent.classList.remove('content-locked');
                            lockedContent.style.opacity = '1';
                            lockedContent.style.pointerEvents = 'auto';
                        }
                        if (progressText) {
                            progressText.innerHTML = "☑ MISI SELESAI!";
                            progressText.style.backgroundColor = "#dcfce7";
                            progressText.style.color = "#166534";
                        }
                        
                        // Eksekusi pengembalian data Node dan Edge milik siswa
                        const sandboxContainer = document.getElementById('mynetwork');
                        if (sandboxContainer && typeof vis !== 'undefined') {
                            const restoreTimer = setInterval(() => {
                                // Tunggu sampai sbNetwork (dari bab1.js) siap
                                if (typeof window.sbNodes !== 'undefined' && typeof window.sbEdges !== 'undefined' && typeof window.sbNetwork !== 'undefined') {
                                    clearInterval(restoreTimer);
                                    
                                    const savedGraphData = localStorage.getItem(storageKeyData);
                                    window.sbNodes.clear();
                                    window.sbEdges.clear();
                                    
                                    let hasValidData = false;
                                    if (savedGraphData) {
                                        const parsed = JSON.parse(savedGraphData);
                                        if (parsed.nodes && parsed.nodes.length > 0) {
                                            window.sbNodes.add(parsed.nodes);
                                            window.sbEdges.add(parsed.edges);
                                            hasValidData = true;
                                        }
                                    }
                                    
                                    if (!hasValidData) {
                                        window.sbNodes.add([{id:1,label:'A',x:-50,y:-50},{id:2,label:'B',x:50,y:-50},{id:3,label:'C',x:0,y:50}]);
                                        window.sbEdges.add([{from:1,to:2},{from:2,to:3},{from:3,to:1}]);
                                    }
                                    
                                    if (typeof isMissionFinished !== 'undefined') window.isMissionFinished = true;
                                    document.querySelectorAll('.sb-toolbar').forEach(tb => tb.style.display = 'none');
                                    const modeText = document.getElementById('mode-text');
                                    if (modeText) modeText.innerHTML = "<strong>Mode Review:</strong> Anda telah menaklukkan laboratorium ini.";

                                    forceFixVisJs();
                                }
                            }, 100);
                        }
                    }

                    // --- KUIS DERAJAT PERSISTENCE ---
                    if(localStorage.getItem(keyDerajat) === 'true') {
                        window.tambahSisiBaruCD(true);
                        window.bukaAnalisisDerajatOtomatis();
                    }

                    // --- KUIS AKTIVITAS 1.2 PERSISTENCE ---
                    const isDone12Server = {{ isset($progress['1.2']) && $progress['1.2']->score == 100 ? 'true' : 'false' }};
                    const isDone12Local = localStorage.getItem('act_1_2_done_user_' + userId) === 'true';

                    if(isDone12Server || isDone12Local) {
                        document.getElementById('q1_2_1').value = localStorage.getItem(keyQ1) || "C";
                        document.getElementById('q1_2_3').value = localStorage.getItem(keyQ3) || "Derajat";
                        let savedCb = JSON.parse(localStorage.getItem(keyQ2)) || ['opt1', 'opt2'];
                        savedCb.forEach(val => {
                            let cb = document.querySelector(`input[name="q1_2_2"][value="${val}"]`);
                            if(cb) cb.checked = true;
                        });
                        document.querySelectorAll('input[name="q1_2_2"]').forEach(el => el.disabled = true);
                        document.getElementById('q1_2_1').disabled = true;
                        document.getElementById('q1_2_3').disabled = true;
                        document.getElementById('q1_2_1').classList.add('bg-green-50', 'border-green-400', 'text-green-800');
                        document.getElementById('q1_2_3').classList.add('bg-green-50', 'border-green-400', 'text-green-800');
                        const alertBox = document.getElementById('statusAlert12');
                        if(alertBox) {
                            alertBox.className = "p-4 rounded-lg mb-5 text-sm font-bold border bg-green-50 border-green-400 text-green-700 shadow-sm";
                            alertBox.innerHTML = "✔ Anda sudah menyelesaikan aktivitas ini dengan sempurna.";
                            alertBox.classList.remove('hidden');
                        }
                        const fbBox = document.getElementById('feedback12');
                        if(fbBox) fbBox.classList.remove('hidden');
                        const btnPeriksa = document.getElementById('btnPeriksa12');
                        if(btnPeriksa) btnPeriksa.classList.add('hidden');
                        const btnNext = document.getElementById('btnNext12');
                        if(btnNext) {
                            btnNext.disabled = false;
                            btnNext.classList.remove('opacity-50', 'cursor-not-allowed');
                        }
                    }
                });

                window.tambahSisiBaruCD = function() {
                    if(typeof window.gl_edges_derajat !== 'undefined' && window.gl_edges_derajat !== null) {
                        try { window.gl_edges_derajat.add({ id: 'eCD', from: 'C', to: 'D', color: { color: '#ef4444' }, width: 5 }); } catch (e) {}
                    }
                    const btnAdd = document.getElementById('btn-tambah-sisi-baru');
                    if (btnAdd) {
                        btnAdd.innerHTML = '✔ Sisi Ditambahkan';
                        btnAdd.className = 'px-6 py-2.5 bg-slate-400 text-white rounded-lg text-sm font-bold shadow-sm flex items-center gap-2 cursor-not-allowed justify-center';
                        btnAdd.disabled = true;
                    }
                };

                window.resetGrafBaruCD = function() {
                    if(typeof window.gl_edges_derajat !== 'undefined' && window.gl_edges_derajat !== null) {
                        try { window.gl_edges_derajat.remove('eCD'); } catch(e){}
                    }
                    const btnAdd = document.getElementById('btn-tambah-sisi-baru');
                    if (btnAdd) {
                        btnAdd.innerHTML = '<span>➕</span> Tambah Sisi (C–D)';
                        btnAdd.className = 'px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-bold transition-all shadow flex items-center gap-2 justify-center';
                        btnAdd.disabled = false;
                    }
                    const inputAns = document.getElementById('ans-derajat');
                    if(inputAns && !inputAns.disabled) inputAns.value = '';
                };

                window.bukaAnalisisDerajatOtomatis = function() {
                    const inputAns = document.getElementById('ans-derajat');
                    const btnCek = document.getElementById('btn-cek-derajat');
                    const kesimpulan = document.getElementById('kesimpulan-derajat');
                    if(inputAns) {
                        inputAns.value = '2';
                        inputAns.disabled = true;
                        inputAns.classList.add('bg-green-50', 'border-green-400', 'text-green-800');
                    }
                    if(btnCek) btnCek.style.display = 'none';
                    if(kesimpulan) kesimpulan.classList.remove('hidden');
                }

                window.cekAnalisisDerajat = function() {
                    const inputAns = document.getElementById('ans-derajat');
                    const val = inputAns.value.trim().toLowerCase();
                    const alertBox = document.getElementById('alert-derajat');
                    const btnCek = document.getElementById('btn-cek-derajat');
                    const kesimpulan = document.getElementById('kesimpulan-derajat');

                    if (val === '') {
                        alertBox.className = "p-3 mt-3 rounded-lg text-sm font-bold bg-yellow-50 text-yellow-800 border border-yellow-200 block";
                        alertBox.innerText = "⚠️ Silakan isi jawaban terlebih dahulu.";
                        return;
                    }
                    if (val === '2' || val === 'dua') {
                        alertBox.classList.add('hidden');
                        inputAns.disabled = true;
                        inputAns.classList.add('bg-green-50', 'border-green-400', 'text-green-800');
                        btnCek.style.display = 'none';
                        kesimpulan.classList.remove('hidden');
                        const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                        localStorage.setItem('analisis_derajat_done_user_' + userId, 'true');
                    } else {
                        alertBox.className = "p-3 mt-3 rounded-lg text-sm font-bold bg-red-50 text-red-800 border border-red-200 block animate-pulse";
                        alertBox.innerHTML = "❌ Jawaban kurang tepat. Coba hitung lagi total penambahan derajat di Simpul C dan D digabung.";
                    }
                }

                window.checkAktivitas12 = function() {
                    const rawAns1 = document.getElementById('q1_2_1').value;
                    const ans1 = rawAns1.trim().toLowerCase();
                    const cbOpt1 = document.querySelector('input[name="q1_2_2"][value="opt1"]').checked;
                    const cbOpt2 = document.querySelector('input[name="q1_2_2"][value="opt2"]').checked;
                    const cbOpt3 = document.querySelector('input[name="q1_2_2"][value="opt3"]').checked;
                    const cbOpt4 = document.querySelector('input[name="q1_2_2"][value="opt4"]').checked;
                    const rawAns3 = document.getElementById('q1_2_3').value;
                    const ans3 = rawAns3.trim().toLowerCase();
                    const alertBox = document.getElementById('statusAlert12');
                    const btnNext = document.getElementById('btnNext12');
                    const feedbackBox = document.getElementById('feedback12');
                    const btnPeriksa = document.getElementById('btnPeriksa12');

                    if (ans1 === '' || ans3 === '' || !(cbOpt1 || cbOpt2 || cbOpt3 || cbOpt4)) {
                        alertBox.className = "p-4 rounded-lg mb-4 text-sm font-bold border bg-yellow-50 border-yellow-200 text-yellow-800 text-center";
                        alertBox.innerHTML = "⚠️ Silakan jawab semua pertanyaan terlebih dahulu.";
                        alertBox.classList.remove('hidden');
                        return;
                    }
                    let benar = 0;
                    if (['c', 'simpul c', 'simpul c '].includes(ans1)) benar++;
                    if (cbOpt1 && cbOpt2 && !cbOpt3 && !cbOpt4) benar++;
                    if (['derajat', 'degree', 'derajat '].includes(ans3)) benar++;

                    if (benar === 3) {
                        const userId = "{{ auth()->check() ? auth()->id() : 'guest' }}";
                        localStorage.setItem('user_ans_1_2_1_user_' + userId, rawAns1);
                        localStorage.setItem('user_ans_1_2_3_user_' + userId, rawAns3);
                        let checkedCb = [];
                        document.querySelectorAll('input[name="q1_2_2"]:checked').forEach(cb => checkedCb.push(cb.value));
                        localStorage.setItem('user_ans_1_2_2_user_' + userId, JSON.stringify(checkedCb));
                        localStorage.setItem('act_1_2_done_user_' + userId, 'true');

                        alertBox.className = "p-4 rounded-lg mb-5 text-sm font-bold border bg-green-50 border-green-400 text-green-700 shadow-sm";
                        alertBox.innerHTML = "✔ Luar biasa! Seluruh analisis Anda tepat. Silakan baca kesimpulan di bawah, lalu lanjut ke materi berikutnya.";
                        
                        document.getElementById('q1_2_1').classList.add('bg-green-50', 'border-green-400', 'text-green-800');
                        document.getElementById('q1_2_3').classList.add('bg-green-50', 'border-green-400', 'text-green-800');
                        feedbackBox.classList.remove('hidden');
                        btnPeriksa.classList.add('hidden');
                        if(btnNext) {
                            btnNext.disabled = false;
                            btnNext.classList.remove('opacity-50', 'cursor-not-allowed');
                        }
                        document.querySelectorAll('input[name="q1_2_2"]').forEach(el => el.disabled = true);
                        document.getElementById('q1_2_1').disabled = true;
                        document.getElementById('q1_2_3').disabled = true;

                        if (typeof simpanProgressAktivitas === 'function') simpanProgressAktivitas('bab1', '1.2', 100);
                    } else {
                        alertBox.className = "p-4 rounded-lg mb-5 text-sm font-bold border bg-red-50 border-red-300 text-red-700 animate-pulse shadow-sm";
                        alertBox.innerHTML = `❌ Analisis Anda masih belum tepat. Silakan periksa kembali struktur graf pada gambar!`;
                    }
                    alertBox.classList.remove('hidden');
                }
            </script>
        </div>
</section>