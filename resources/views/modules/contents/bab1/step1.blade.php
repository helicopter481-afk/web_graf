<section id="step-1" class="step-slide">
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-10 -mt-8">

        {{-- Header --}}
        <div class="border-b border-slate-200 pb-6 mb-8">
            <h2 class="text-3xl font-bold text-slate-900 mb-2">
                1.1 Mengapa Kita Perlu Graf?
            </h2>
            <p class="text-slate-500 font-medium">
                Peran abstraksi graf dalam menyelesaikan permasalahan komputasi.
            </p>
        </div>

        {{-- Pengantar (Diperkaya) --}}
        <div class="mb-10 text-slate-700 leading-relaxed space-y-4 text-justify">
            <p>
                Di era digital, aplikasi seperti <em>Google Maps</em> atau sistem rekomendasi pertemanan di media sosial
                mampu menyelesaikan masalah pencarian rute dengan sangat efisien. Namun, tahukah Anda? Komputer sama
                sekali tidak memiliki mata untuk memandang peta jalanan, kemacetan, atau foto profil layaknya manusia.
            </p>
            <p>
                Untuk memproses informasi dunia nyata yang kompleks, komputer harus mengubahnya menjadi bahasa matematis
                atau <strong>struktur diskrit</strong>. Tanpa pemodelan ini, secanggih apa pun algoritma kecerdasan
                buatan, ia tidak akan bisa memecahkan masalah navigasi karena mesin tidak memahami bentuk dasar dari
                dunia fisik kita.
            </p>
            <div class="bg-slate-50 border-l-4 border-slate-400 p-4 rounded-r-lg mt-4 text-slate-800">
                <p>
                    Sebelum kita melangkah lebih jauh, mari kita panggil kembali memori Anda dari mata kuliah
                    <strong>Matematika Diskrit</strong>! Proses menyederhanakan realitas visual yang rumit menjadi model
                    logika komputasi yang siap diproses mesin ini disebut dengan <strong>Abstraksi</strong>.
                </p>
            </div>
        </div>

        {{-- AREA INTERAKTIF: GAMBAR & KILAS BALIK --}}
        <div class="grid md:grid-cols-2 gap-8 mb-12 items-start">

            {{-- KIRI: Peta Visual (Terkunci dengan aspect-ratio agar presisi) --}}
            <div class="flex flex-col h-full w-full">
                <div class="border-2 border-slate-200 rounded-xl overflow-hidden mb-3 shadow-sm bg-slate-50 aspect-[4/3] flex items-center justify-center p-4">
                    <img src="{{ asset('images/peta_kota_visual.png') }}" alt="Perspektif Visual Dunia Nyata"
                        class="w-full h-full object-contain rounded-lg">
                </div>
                <p class="text-xs text-center font-bold text-slate-500 uppercase tracking-wide">
                    Perspektif Visual (Dunia Nyata)
                </p>
            </div>

            {{-- KANAN: Kilas Balik & Hasil Graf --}}
            <div class="flex flex-col h-full w-full relative">

                {{-- KOTAK KILAS BALIK --}}
                <div id="kuis-pemanasan" class="bg-amber-50 border border-amber-200 rounded-xl p-6 shadow-sm transition-all duration-700 flex flex-col justify-center aspect-[4/3]">
                    <h4 class="font-bold text-amber-900 mb-2 flex items-center gap-2 text-lg">
                        Kilas Balik: Uji Ingatan
                    </h4>
                    <p id="kuis-instruksi" class="text-sm text-amber-800 mb-4 text-justify leading-relaxed">
                        Perhatikan ilustrasi peta kota di samping. Jika Anda ditugaskan menjadi seorang <em>Software Engineer</em> yang harus mengubah peta tersebut ke dalam bentuk komputasi, tebaklah pasangan elemen graf yang paling tepat!
                    </p>

                    <div class="space-y-3">
                        <div class="bg-white/60 p-2.5 rounded-lg border border-amber-100">
                            <label class="block text-xs font-bold text-slate-800 mb-1">Pertanyaan 1:</label>
                            <p class="text-xs text-slate-600 mb-1.5">Elemen "Lokasi" (Rumah, Kampus) diabstraksikan menjadi titik, disebut...</p>
                            <select id="ans-pemanasan-1"
                                class="w-full border border-slate-300 rounded p-1.5 text-xs focus:border-blue-500 outline-none font-semibold text-slate-700 transition">
                                <option value="">-- Pilih Elemen --</option>
                                <option value="simpul">Simpul (Vertex)</option>
                                <option value="sisi">Sisi (Edge)</option>
                            </select>
                        </div>
                        <div class="bg-white/60 p-2.5 rounded-lg border border-amber-100">
                            <label class="block text-xs font-bold text-slate-800 mb-1">Pertanyaan 2:</label>
                            <p class="text-xs text-slate-600 mb-1.5">Elemen "Jalan Raya" yang menghubungkan lokasi tersebut diabstraksikan menjadi garis, disebut...</p>
                            <select id="ans-pemanasan-2"
                                class="w-full border border-slate-300 rounded p-1.5 text-xs focus:border-blue-500 outline-none font-semibold text-slate-700 transition">
                                <option value="">-- Pilih Elemen --</option>
                                <option value="simpul">Simpul (Vertex)</option>
                                <option value="sisi">Sisi (Edge)</option>
                            </select>
                        </div>

                        <div id="alert-pemanasan" class="hidden p-2 rounded text-xs font-bold text-center mt-2"></div>

                        <button onclick="cekPemanasan11()" id="btn-cek-pemanasan"
                            class="w-full bg-slate-800 hover:bg-slate-900 text-white font-bold py-2 mt-2 rounded shadow transition-transform active:scale-95 text-sm">
                            Buka Penjelasan Logika
                        </button>
                    </div>
                </div>

                {{-- HASIL GAMBAR GRAF (Terkunci dengan aspect-[4/3] agar 100% sama dengan gambar kiri) --}}
                <div id="gambar-graf-container" class="hidden absolute inset-0 bg-white flex-col w-full animate-fade-in transition-all duration-700 z-10">
                    <div class="border-2 border-green-400 rounded-xl overflow-hidden mb-3 shadow-md bg-green-50 aspect-[4/3] flex items-center justify-center p-4 relative">
                        <div class="absolute top-2 right-2 bg-green-500 text-white text-[10px] font-bold px-2 py-1 rounded shadow z-10">BERHASIL DIBUKA</div>
                        <img src="{{ asset('images/peta_kota_graf.png') }}" alt="Perspektif Komputasi Graf" class="w-full h-full object-contain rounded-lg relative z-0">
                    </div>
                    <p class="text-xs text-center font-bold text-green-600 uppercase tracking-wide">
                        Perspektif Komputasi (Abstraksi Graf)
                    </p>
                </div>

            </div>
        </div>

        {{-- PENJELASAN MATERI (Awalnya Sembunyi, muncul dari bawah) --}}
        <div id="penjelasan-lanjutan" class="hidden opacity-0 transform translate-y-6 transition-all duration-1000 mb-12">

            <div class="bg-green-50 border border-green-200 text-green-800 p-5 rounded-xl font-bold mb-8 flex gap-3 items-center shadow-sm">
                <i class="fa-solid fa-circle-check text-3xl text-green-500"></i>
                <span class="leading-relaxed">Tepat sekali! Berdasarkan ilustrasi abstraksi di atas, kita dapat melihat perpindahan dari dunia nyata ke dunia komputasi:</span>
            </div>

            <div class="text-slate-700 leading-relaxed space-y-6 text-justify">
                <ul class="space-y-6 list-none pl-0">
                    <li class="pl-4 border-l-4 border-slate-300 relative">
                        <div class="absolute -left-2.5 top-1 w-4 h-4 bg-slate-400 rounded-full border-2 border-white">
                        </div>
                        <strong class="text-slate-900">Perspektif Visual (Dunia Nyata):</strong><br>
                        Peta kota memiliki detail visual yang kompleks seperti warna gedung, pohon, dan variasi lebar
                        jalan raya. Detail ini indah bagi mata manusia, tetapi membebani memori dan tidak relevan untuk
                        perhitungan rute oleh algoritma komputer.
                    </li>
                    <li class="pl-4 border-l-4 border-blue-400 relative">
                        <div class="absolute -left-2.5 top-1 w-4 h-4 bg-blue-500 rounded-full border-2 border-white">
                        </div>
                        <strong class="text-blue-900">Perspektif Komputasi (Abstraksi Graf):</strong><br>
                        Sistem komputer menyederhanakan peta tersebut dengan membuang seluruh detail visual yang tidak
                        penting. Persoalan dunia nyata direpresentasikan murni secara logis dengan memetakan objek ke
                        dalam dua elemen dasar:

                        {{-- Komponen Graf --}}
                        <div class="grid sm:grid-cols-2 gap-4 mt-5 mb-2">
                            <div class="bg-blue-50 border border-blue-200 p-5 rounded-xl shadow-sm hover:shadow-md transition">
                                <strong class="block text-blue-900 mb-2 text-lg"><i
                                        class="fa-solid fa-circle text-[10px] mr-2"></i>Simpul (Vertex)</strong>
                                <span class="text-sm text-blue-800">Entitas atau titik lokasi utama. <br>(Contoh: Rumah,
                                    Kampus, Mall).</span>
                            </div>
                            <div class="bg-blue-50 border border-blue-200 p-5 rounded-xl shadow-sm hover:shadow-md transition">
                                <strong class="block text-blue-900 mb-2 text-lg"><i
                                        class="fa-solid fa-minus text-[10px] mr-2"></i>Sisi (Edge)</strong>
                                <span class="text-sm text-blue-800">Relasi atau jalur yang menghubungkan antarentitas.
                                    <br>(Contoh: Garis jalan raya).</span>
                            </div>
                        </div>
                    </li>
                </ul>

                <p class="bg-slate-900 text-white p-6 rounded-xl font-medium mt-8 shadow-lg leading-relaxed">
                    Dengan demikian, graf bukanlah sekadar gambar titik dan garis biasa,
                    melainkan sebuah <strong>alat pemodelan (<em>modeling tool</em>)</strong> yang vital. Algoritma graf
                    menjadi fondasi bagi komputer untuk menyelesaikan masalah rumit, mulai dari pencarian rute terpendek
                    (<em>shortest path</em>) hingga analisis jaringan sosial.
                </p>
            </div>

            {{-- Referensi --}}
            <p class="text-xs text-slate-400 mt-8">
                Referensi: Rosen (2019); Munir (2010); Cormen et al. (2009)
            </p>
        </div>

        <div class="border-t-[3px] border-dashed border-slate-200 my-10"></div>

        {{-- ========================================== --}}
        {{-- AKTIVITAS 1.1 (FULL HARDCODE & PERSISTENT) --}}
        {{-- ========================================== --}}

        {{-- CEK STATUS SERVER: Apakah siswa sudah pernah menyelesaikan 1.1? --}}
        @php
            $isDone11 = isset($progress['1.1']) && $progress['1.1']->score == 100;
        @endphp

        <div class="flex items-center gap-3 mb-6">
            <span class="bg-slate-900 text-white text-xs font-bold px-2 py-1 rounded uppercase tracking-wider">Aktivitas
                1.1</span>
            <h3 class="text-2xl font-bold text-slate-900">Tantangan Abstraksi Jaringan</h3>
        </div>

        {{-- PREMIS CERITA / SOAL CERITA --}}
        <div class="bg-blue-50 border border-blue-100 rounded-lg p-6 mb-8 shadow-sm">
            <h4 class="font-bold text-blue-900 mb-4 text-base flex items-center gap-2 border-b border-blue-200 pb-2">
                <i class="fa-solid fa-briefcase text-blue-700"></i> Studi Kasus: Troubleshooting Jaringan
            </h4>

            <div class="text-sm text-blue-800 leading-relaxed text-justify space-y-3">
                <p>
                    Sebagai seorang <em>Network Engineer</em>, Budi ditugaskan untuk melakukan
                    <em>troubleshooting</em> koneksi internet yang bermasalah di
                    <strong>"Lab Komputer 1"</strong>.
                </p>
                <p>
                    Saat menginspeksi ruang server secara fisik, Budi dihadapkan pada
                    infrastruktur jaringan yang sangat semrawut. Kabel <em>LAN</em> saling silang,
                    adaptor daya tercampur, dan perangkat <em>switch</em> berada di tengah
                    kekacauan tersebut (Perhatikan <strong>Gambar A</strong> di bawah).
                </p>
                <p>
                    Untuk mempercepat proses analisis tanpa harus membongkar kabel secara fisik,
                    Budi melakukan observasi dan memetakan struktur jaringan tersebut ke dalam
                    sebuah <strong>diagram topologi logika</strong> yang bersih dan terstruktur
                    (Perhatikan <strong>Gambar B</strong> di bawah). Transformasi visual ini mempermudah
                    timnya untuk menemukan titik masalah koneksi.
                </p>
                <div class="bg-white/60 rounded p-3 mt-4 border border-blue-200">
                    <p class="font-semibold text-blue-900">
                        Tugas Anda: Berdasarkan transformasi dari ruang fisik (Gambar A)
                        ke diagram topologi (Gambar B) tersebut, lakukan analisis terkait
                        pola pikir abstraksi graf yang digunakan Budi!
                    </p>
                </div>
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-4 mb-8">
            <div class="bg-white p-2 rounded-lg border border-slate-300 shadow-sm transition hover:shadow-md">
                <img src="{{ asset('images/semrawut.jpeg') }}" alt="Kabel Semrawut"
                    class="w-full h-48 object-cover rounded mb-2">
                <p class="text-xs text-slate-600 font-mono text-center font-bold bg-slate-100 py-1 rounded">Gambar A: Ruang Server LAN Semrawut</p>
            </div>
            <div class="bg-white p-2 rounded-lg border border-slate-300 shadow-sm transition hover:shadow-md">
                <img src="{{ asset('images/topologi_star.png') }}" alt="Topologi Star"
                    class="w-full h-48 object-contain rounded mb-2">
                <p class="text-xs text-slate-600 font-mono text-center font-bold bg-slate-100 py-1 rounded">Gambar B: Diagram Topologi Jaringan yang rapi</p>
            </div>
        </div>

        {{-- SOAL-SOAL MANUAL --}}
        <div class="space-y-6" id="quizContainer11">

            {{-- SOAL 1 (CHECKBOX - BISA PILIH LEBIH DARI SATU) --}}
            <div class="quiz-item bg-white border border-slate-200 rounded-xl p-6 shadow-sm hover:border-blue-300 transition-colors">
                <div class="flex gap-2 mb-4 items-baseline">
                    <span class="bg-slate-800 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs font-bold shrink-0">1</span>
                    <div class="text-slate-800 text-sm leading-relaxed">
                        Dalam transformasi Gambar A menjadi Gambar B, Budi melakukan penyederhanaan (abstraksi). Manakah
                        dari elemen visual berikut yang sengaja <strong>diabaikan</strong> (dibuang) karena tidak
                        relevan dengan logika struktur jaringan? <br><em
                            class="text-blue-600 text-xs mt-1 block">(Pilih semua jawaban yang tepat)</em>
                    </div>
                </div>
                <div class="space-y-2 pl-8">
                    <label class="flex items-center gap-3 p-3 border rounded-lg cursor-pointer hover:bg-slate-50 transition">
                        <input type="checkbox" name="q1_1_1" value="jumlah" class="w-5 h-5 text-blue-600 rounded">
                        <span class="text-sm text-slate-700">Jumlah perangkat keras komputer</span>
                    </label>
                    <label class="flex items-center gap-3 p-3 border rounded-lg cursor-pointer hover:bg-slate-50 transition">
                        <input type="checkbox" name="q1_1_1" value="warna" class="w-5 h-5 text-blue-600 rounded">
                        <span class="text-sm text-slate-700">Warna dan kelengkungan fisik kabel</span>
                    </label>
                    <label class="flex items-center gap-3 p-3 border rounded-lg cursor-pointer hover:bg-slate-50 transition">
                        <input type="checkbox" name="q1_1_1" value="koneksi" class="w-5 h-5 text-blue-600 rounded">
                        <span class="text-sm text-slate-700">Hubungan konektivitas antar alat</span>
                    </label>
                    <label class="flex items-center gap-3 p-3 border rounded-lg cursor-pointer hover:bg-slate-50 transition">
                        <input type="checkbox" name="q1_1_1" value="tumpukan"
                            class="w-5 h-5 text-blue-600 rounded">
                        <span class="text-sm text-slate-700">Tumpukan barang dan jenis lantai ruangan</span>
                    </label>
                </div>
            </div>

            {{-- SOAL 2 (ISIAN SINGKAT) --}}
            <div class="quiz-item bg-white border border-slate-200 rounded-xl p-6 shadow-sm hover:border-blue-300 transition-colors">
                <div class="flex gap-2 mb-3 items-baseline">
                    <span class="bg-slate-800 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs font-bold shrink-0">2</span>
                    <div class="text-slate-800 text-sm leading-relaxed">
                        Pada Gambar B, perangkat komputer dan switch fisik yang rumit disederhanakan visualnya menjadi
                        sebuah titik atau ikon bulat. Mengingat kembali materi awal, representasi objek dalam sebuah
                        graf komputasi secara teknis disebut sebagai...
                    </div>
                </div>
                <div class="pl-8 mt-2 relative">
                    <input type="text" id="q1_1_2"
                        class="w-full md:w-1/2 p-3 border border-slate-300 rounded-lg focus:border-blue-500 focus:ring focus:ring-blue-100 outline-none font-bold text-slate-800"
                        placeholder="Ketik jawaban di sini...">
                    <p class="text-[11px] text-slate-400 mt-2 italic">*Clue: Berawalan huruf S atau V</p>
                </div>
            </div>

            {{-- SOAL 3 (ISIAN SINGKAT) --}}
            <div class="quiz-item bg-white border border-slate-200 rounded-xl p-6 shadow-sm hover:border-blue-300 transition-colors">
                <div class="flex gap-2 mb-3 items-baseline">
                    <span class="bg-slate-800 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs font-bold shrink-0">3</span>
                    <div class="text-slate-800 text-sm leading-relaxed">
                        Garis lurus yang menghubungkan antar perangkat pada Gambar B memperjelas alur konektivitas logis
                        tanpa adanya gangguan <em>noise</em> kabel kusut. Elemen garis yang merepresentasikan relasi
                        antarsimpul ini disebut sebagai...
                    </div>
                </div>
                <div class="pl-8 mt-2 relative">
                    <input type="text" id="q1_1_3"
                        class="w-full md:w-1/2 p-3 border border-slate-300 rounded-lg focus:border-blue-500 focus:ring focus:ring-blue-100 outline-none font-bold text-slate-800"
                        placeholder="Ketik jawaban di sini...">
                    <p class="text-[11px] text-slate-400 mt-2 italic">*Clue: Berawalan huruf S atau E</p>
                </div>
            </div>

        </div>

        {{-- AREA FEEDBACK & TOMBOL CEK --}}
        <div class="mt-8">
            <div id="statusAlert11" class="hidden p-4 rounded-lg mb-4 text-sm font-bold border"></div>

            {{-- BOX PEMBAHASAN --}}
            <div id="feedback11" class="hidden p-6 rounded-xl bg-blue-50 border border-blue-200 text-slate-700 text-sm leading-relaxed mb-6 shadow-sm">
                <h4 class="font-bold text-blue-900 mb-4 flex items-center gap-2 border-b border-blue-200 pb-3">
                    <i class="fa-solid fa-list-check text-blue-600 text-lg"></i> Pembahasan Analisis
                </h4>
                <ul class="space-y-4">
                    <li class="flex gap-3">
                        <span class="text-blue-500 font-bold shrink-0">1.</span>
                        <span>Tepat! Warna kabel dan kondisi lantai ruangan sengaja dibuang karena komputer tidak membutuhkan detail fisik tersebut. Mengabaikan informasi yang tidak relevan inilah yang disebut proses abstraksi.</span>
                    </li>
                    <li class="flex gap-3">
                        <span class="text-blue-500 font-bold shrink-0">2.</span>
                        <span>Benar! Titik atau ikon PC dan Switch tersebut bertindak sebagai entitas objek, yang dalam teori graf disebut sebagai <strong>Simpul (Vertex)</strong>.</span>
                    </li>
                    <li class="flex gap-3">
                        <span class="text-blue-500 font-bold shrink-0">3.</span>
                        <span>Betul! Garis lurus yang menunjukkan relasi atau konektivitas antar perangkat tersebut dinamakan <strong>Sisi (Edge)</strong>.</span>
                    </li>
                </ul>
            </div>

            <div class="flex justify-end mt-4">
                <button type="button" id="btnPeriksa11" onclick="checkAktivitas11()"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg shadow font-bold text-sm transition-all active:scale-95 flex items-center gap-2">
                    <i class="fa-solid fa-paper-plane"></i> Kirim & Periksa Jawaban
                </button>
            </div>
        </div>

        {{-- FOOTER NAVIGASI --}}
        <div class="flex justify-between gap-4 mt-10 pt-6 border-t-2 border-slate-100">
            <button type="button" onclick="prevStep()"
                class="btn-secondary px-6 py-2.5 rounded-lg border border-slate-300 font-bold text-slate-600 hover:bg-slate-50 transition">
                Kembali</button>
            <button id="btnNext11" type="button" onclick="nextStep()"
                class="btn-primary bg-slate-900 text-white px-6 py-2.5 rounded-lg font-bold opacity-50 cursor-not-allowed transition hover:bg-slate-800"
                disabled>Lanjut</button>
        </div>

    </div>

    {{-- SCRIPT INTERAKSI KILAS BALIK & AKTIVITAS --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            // ==========================================
            // LOGIKA PEMBERSIHAN MEMORI UNTUK AKUN BARU
            // Jika user baru login (di DB belum selesai), hapus sisa jawaban user lama di browser
            // ==========================================
            const currentUserId = '{{ auth()->check() ? auth()->id() : 'guest' }}';
            const savedUserId = localStorage.getItem('graf_active_user');

            // Jika user ID di browser beda dengan yang login sekarang, RESET SEMUA
            if (savedUserId !== currentUserId) {
                localStorage.removeItem('kilas_balik_1_1_done');
                localStorage.removeItem('user_ans_1_1_1');
                localStorage.removeItem('user_ans_1_1_2');
                localStorage.removeItem('user_ans_1_1_3');
                localStorage.setItem('graf_active_user', currentUserId); // Simpan ID baru
            }

            // ==========================================
            // LOGIKA PERSISTENCE KILAS BALIK (LOCAL STORAGE)
            // ==========================================
            if (localStorage.getItem('kilas_balik_1_1_done') === 'true') {
                bukaPemanasanOtomatis();
            }

            // ==========================================
            // LOGIKA PERSISTENCE AKTIVITAS 1.1 (DATABASE)
            // ==========================================
            @if ($isDone11)
                // 1. Centang otomatis checkbox yang direkam dari pilihan user sebelumnya
                let savedCb = JSON.parse(localStorage.getItem('user_ans_1_1_1')) || ['warna', 'tumpukan'];
                savedCb.forEach(val => {
                    let cb = document.querySelector(`input[name="q1_1_1"][value="${val}"]`);
                    if(cb) cb.checked = true;
                });

                // 2. Isi teks PERCIS seperti yang diketik user sebelum refresh
                let ans2Val = localStorage.getItem('user_ans_1_1_2') || "Simpul";
                let ans3Val = localStorage.getItem('user_ans_1_1_3') || "Sisi";
                
                document.getElementById('q1_1_2').value = ans2Val;
                document.getElementById('q1_1_3').value = ans3Val;

                // 3. Kunci semua inputan agar tidak bisa diubah
                document.querySelectorAll('input[name="q1_1_1"]').forEach(el => el.disabled = true);
                document.getElementById('q1_1_2').disabled = true;
                document.getElementById('q1_1_3').disabled = true;

                // Tampilan warna background sukses di input
                document.getElementById('q1_1_2').classList.add('bg-green-50', 'border-green-400', 'text-green-800');
                document.getElementById('q1_1_3').classList.add('bg-green-50', 'border-green-400', 'text-green-800');

                // 4. Tampilkan pesan berhasil
                const alertBox = document.getElementById('statusAlert11');
                alertBox.className = "p-4 rounded-lg mb-4 text-sm font-bold border bg-green-50 border-green-400 text-green-700";
                alertBox.innerHTML = "✔ Anda sudah menyelesaikan Aktivitas 1.1 ini dengan sempurna.";
                alertBox.classList.remove('hidden');

                // 5. Buka kotak pembahasan
                document.getElementById('feedback11').classList.remove('hidden');

                // 6. Hilangkan tombol periksa
                document.getElementById('btnPeriksa11').classList.add('hidden');

                // 7. Buka tombol lanjut
                const btnNext = document.getElementById('btnNext11');
                btnNext.disabled = false;
                btnNext.classList.remove('opacity-50', 'cursor-not-allowed');
            @endif
        });

        // ---------------------------------------------
        // FUNGSI CEK KILAS BALIK (BAGIAN ATAS)
        // ---------------------------------------------
        function bukaPemanasanOtomatis() {
            document.getElementById('kuis-pemanasan').style.display = 'none';

            const gambarGraf = document.getElementById('gambar-graf-container');
            const penjelasan = document.getElementById('penjelasan-lanjutan');

            gambarGraf.classList.remove('hidden');
            gambarGraf.classList.add('flex'); 

            penjelasan.classList.remove('hidden', 'opacity-0', 'translate-y-6');
        }

        function cekPemanasan11() {
            const ans1 = document.getElementById('ans-pemanasan-1').value;
            const ans2 = document.getElementById('ans-pemanasan-2').value;
            const alertBox = document.getElementById('alert-pemanasan');

            if (!ans1 || !ans2) {
                alertBox.className = "p-2 rounded text-xs font-bold bg-yellow-50 text-yellow-800 border border-yellow-200 mt-2 block";
                alertBox.innerText = "⚠️ Harap lengkapi tebakan Anda.";
                return;
            }

            if (ans1 === 'simpul' && ans2 === 'sisi') {
                alertBox.classList.add('hidden');
                localStorage.setItem('kilas_balik_1_1_done', 'true');

                const kuisBox = document.getElementById('kuis-pemanasan');
                kuisBox.style.display = 'none';

                const gambarGraf = document.getElementById('gambar-graf-container');
                const penjelasan = document.getElementById('penjelasan-lanjutan');

                gambarGraf.classList.remove('hidden');
                gambarGraf.classList.add('flex');
                penjelasan.classList.remove('hidden');

                setTimeout(() => {
                    penjelasan.classList.remove('opacity-0', 'translate-y-6');
                }, 50);

            } else {
                alertBox.className = "p-2 rounded text-xs font-bold bg-red-50 text-red-800 border border-red-200 mt-2 block animate-pulse";
                alertBox.innerHTML = "❌ Jawaban masing kurang tepat";
            }
        }

        // ---------------------------------------------
        // FUNGSI CEK AKTIVITAS 1.1 (BAGIAN BAWAH)
        // ---------------------------------------------
        function checkAktivitas11() {
            const cbJumlah = document.querySelector('input[name="q1_1_1"][value="jumlah"]').checked;
            const cbWarna = document.querySelector('input[name="q1_1_1"][value="warna"]').checked;
            const cbKoneksi = document.querySelector('input[name="q1_1_1"][value="koneksi"]').checked;
            const cbTumpukan = document.querySelector('input[name="q1_1_1"][value="tumpukan"]').checked;

            // Ambil teks persis seperti yang diketik
            const rawAns2 = document.getElementById('q1_1_2').value;
            const rawAns3 = document.getElementById('q1_1_3').value;
            
            // Format untuk pengecekan kunci jawaban
            const ans2 = rawAns2.trim().toLowerCase();
            const ans3 = rawAns3.trim().toLowerCase();

            const alertBox = document.getElementById('statusAlert11');
            const btnNext = document.getElementById('btnNext11');
            const feedbackBox = document.getElementById('feedback11');
            const btnPeriksa = document.getElementById('btnPeriksa11');

            if (!(cbJumlah || cbWarna || cbKoneksi || cbTumpukan) || ans2 === '' || ans3 === '') {
                alertBox.className = "p-4 rounded-lg mb-4 text-sm font-bold border bg-yellow-50 border-yellow-200 text-yellow-800 text-center";
                alertBox.innerHTML = "⚠️ Silakan lengkapi analisis Anda untuk ketiga soal di atas (Pilih minimal 1 checkbox pada soal no 1).";
                alertBox.classList.remove('hidden');
                return;
            }

            let benar = 0;
            let total = 3;

            // Cek No 1
            if (cbWarna && cbTumpukan && !cbJumlah && !cbKoneksi) benar++;

            // Cek No 2
            const validAns2 = ['simpul', 'vertex', 'node', 'simpul (vertex)', 'vertex (simpul)'];
            if (validAns2.includes(ans2)) benar++;

            // Cek No 3
            const validAns3 = ['sisi', 'edge', 'link', 'sisi (edge)', 'edge (sisi)'];
            if (validAns3.includes(ans3)) benar++;

            if (benar === total) {
                // SIMPAN TEKS ASLI KE BROWSER
                localStorage.setItem('user_ans_1_1_2', rawAns2);
                localStorage.setItem('user_ans_1_1_3', rawAns3);
                
                let checkedCb = [];
                document.querySelectorAll('input[name="q1_1_1"]:checked').forEach(cb => checkedCb.push(cb.value));
                localStorage.setItem('user_ans_1_1_1', JSON.stringify(checkedCb));

                alertBox.className = "p-4 rounded-lg mb-5 text-sm font-bold border bg-green-50 border-green-400 text-green-700 shadow-sm";
                alertBox.innerHTML = "Luar Biasa! Semua analisis komputasi Anda tepat. Silakan baca pembahasan ringkas di bawah, lalu lanjut ke materi berikutnya.";

                document.getElementById('q1_1_2').classList.add('bg-green-50', 'border-green-400', 'text-green-800');
                document.getElementById('q1_1_3').classList.add('bg-green-50', 'border-green-400', 'text-green-800');

                feedbackBox.classList.remove('hidden');
                btnPeriksa.classList.add('hidden');
                btnNext.disabled = false;
                btnNext.classList.remove('opacity-50', 'cursor-not-allowed');

                document.querySelectorAll('input[name="q1_1_1"]').forEach(el => el.disabled = true);
                document.getElementById('q1_1_2').disabled = true;
                document.getElementById('q1_1_3').disabled = true;

                // SIMPAN KE DB
                if (typeof simpanProgressAktivitas === 'function') {
                    simpanProgressAktivitas('bab1', '1.1', 100);
                } else {
                    console.warn("Fungsi simpanProgressAktivitas belum tersedia.");
                }

            } else {
                alertBox.className = "p-4 rounded-lg mb-5 text-sm font-bold border bg-red-50 border-red-300 text-red-700 animate-pulse shadow-sm";
                alertBox.innerHTML = `❌ Ops, masih ada analisis yang kurang tepat. <br><span class="font-normal text-xs mt-1 block">Silakan periksa kembali jawaban Anda, terutama pada pemisahan antara elemen fisik dan logis!</span>`;
            }

            alertBox.classList.remove('hidden');
        }
    </script>
</section>