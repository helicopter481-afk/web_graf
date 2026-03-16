<section id="step-4" class="step-slide">
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-8 md:p-10 max-w-6xl mx-auto -mt-8">
        
        {{-- JUDUL HALAMAN --}}
        <h2 class="text-2xl md:text-3xl font-bold mb-6 text-slate-900 border-b border-slate-200 pb-4 flex items-center gap-3">
            <i class="fa-solid fa-book-bookmark text-blue-600"></i> Rangkuman Materi 4
        </h2>

        {{-- KONTEN RANGKUMAN --}}
        <div class="text-slate-700 text-base leading-relaxed text-justify">
            <ul class="list-disc list-outside ml-6 space-y-4">
                
                {{-- Poin 1: Kelemahan BFS --}}
                <li>
                    <strong>Kelemahan BFS:</strong> Walaupun bagus untuk penelusuran graf tak berbobot, algoritma BFS murni tidak dapat mencari rute paling efisien pada dunia nyata karena ia menganggap semua jalan memiliki jarak/waktu tempuh yang sama.
                </li>

                {{-- Poin 2: Graf Berbobot & Nested Dict --}}
                <li>
                    <strong>Graf Berbobot (<em>Weighted Graph</em>):</strong> Untuk menyimpan graf yang memiliki nilai beban (seperti jarak kilometer atau tarif), struktur data yang digunakan di Python adalah <strong>Nested Dictionary</strong> (Dictionary di dalam Dictionary), di mana simpul tetangga menjadi <em>Key</em> dan bobotnya menjadi <em>Value</em>.
                </li>

                {{-- Poin 3: Logika Infinity --}}
                <li>
                    <strong>Logika <em>Infinity</em>:</strong> Dalam algoritma Dijkstra, jarak dari titik awal ke titik asal diatur menjadi 0. Sedangkan jarak ke semua simpul lain yang belum diketahui rutenya wajib diatur ke nilai <strong>Tak Terhingga</strong> atau <code class="bg-slate-100 text-blue-700 px-1.5 py-0.5 rounded shadow-sm border border-slate-200 font-mono text-sm">float('inf')</code> pada Python sebagai pancingan komputasi.
                </li>

                {{-- Poin 4: Relaxation --}}
                <li>
                    <strong>Proses <em>Relaxation</em>:</strong> Merupakan jantung dari algoritma Dijkstra. Ini adalah proses perbandingan di mana komputer menguji rute alternatif. Jika total jarak rute baru terbukti <strong>lebih kecil/lebih cepat</strong> daripada catatan jarak di tabel lama, maka komputer akan memperbarui (<em>update</em>) catatan tersebut.
                </li>

                {{-- Poin 5: Sifat Greedy --}}
                <li>
                    <strong>Sifat <em>Greedy</em>:</strong> Algoritma Dijkstra bekerja dengan prinsip <em>Greedy</em> (Rakus), yaitu selalu mengambil keputusan paling optimal/terkecil saat itu juga berdasarkan data yang ada di depan mata.
                </li>

                {{-- Poin 6: Limitasi --}}
                <li>
                    <strong>Limitasi:</strong> Algoritma Dijkstra memiliki satu kelemahan mutlak, yaitu ia <strong>tidak dapat memproses graf yang memiliki bobot negatif</strong> (misal: jarak/biaya bernilai minus).
                </li>

            </ul>
        </div>

        {{-- NAVIGASI BAWAH --}}
        <div class="flex justify-between gap-4 mt-12 pt-6 border-t border-slate-200">
            <button type="button" onclick="prevStep()"
                class="px-6 py-2.5 rounded-lg border border-slate-300 text-slate-600 hover:bg-slate-50 text-sm font-bold transition shadow-sm active:scale-95">
                Kembali
            </button>
            <button type="button" onclick="nextStep()"
                class="px-6 py-2.5 rounded-lg bg-blue-600 text-white hover:bg-blue-700 text-sm font-bold shadow-md transition flex items-center gap-2 active:scale-95">
                Lanjut <i class="fa-solid fa-laptop-code"></i>
            </button>
        </div>
        
    </div>
</section>