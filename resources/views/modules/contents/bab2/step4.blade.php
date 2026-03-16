<section id="step-4" class="step-slide">
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-10 max-w-6xl mx-auto -mt-8">
        
        <h2 class="text-3xl font-bold mb-6 text-slate-900 border-b pb-4">
            2.4 Rangkuman
        </h2>

        <div class="text-slate-700 text-base leading-relaxed text-justify">
            <ul class="list-disc list-outside ml-6 space-y-4">
                <li>
                    Agar dapat diproses oleh algoritma komputer, representasi visual dari sebuah graf harus diterjemahkan ke dalam bentuk <strong>Struktur Data</strong> menggunakan bahasa pemrograman (seperti Python).
                </li>

                <li>
                    <strong>Implementasi Dasar:</strong>
                    <ul class="list-[circle] list-outside ml-6 mt-2 space-y-2">
                        <li><strong>Simpul (<em>Vertex</em>)</strong> disimpan menggunakan tipe data <strong>List <code>[]</code></strong> karena jumlah entitas di dunia nyata bersifat dinamis (dapat ditambah menggunakan fungsi <code>.append()</code>).</li>
                        <li><strong>Sisi (<em>Edge</em>)</strong> disimpan menggunakan tipe data <strong>Tuple <code>()</code></strong> karena relasi spesifik bersifat <em>immutable</em> (tidak boleh diubah isinya secara sembarangan untuk menjaga integritas data).</li>
                    </ul>
                </li>

                <li>
                    <strong>Adjacency List (Daftar Ketetanggaan):</strong> * Merupakan metode penyimpanan graf yang paling efisien, diimplementasikan menggunakan tipe data <strong>Dictionary <code>{}</code></strong>.
                    <ul class="list-[circle] list-outside ml-6 mt-2 space-y-2">
                        <li>Simpul asal bertindak sebagai <strong>Kunci (<em>Key</em>)</strong>, sedangkan daftar simpul tujuan bertindak sebagai <strong>Nilai (<em>Value</em>)</strong>.</li>
                        <li>Penulisan relasi pada <em>Dictionary</em> ini menentukan jenis arah graf: <strong>Graf Tak Berarah</strong> ditulis secara simetris (timbal balik), sedangkan <strong>Graf Berarah</strong> ditulis secara asimetris (satu arah). Simpul yang memiliki nilai <em>List</em> kosong <code>[]</code> menandakan titik buntu (<em>dead end</em>).</li>
                    </ul>
                </li>

                <li>
                    <strong>Adjacency Matrix (Matriks Ketetanggaan):</strong>
                    <ul class="list-[circle] list-outside ml-6 mt-2 space-y-2">
                        <li>Diimplementasikan menggunakan <strong>List 2 Dimensi</strong> (Baris merepresentasikan simpul asal, Kolom merepresentasikan simpul tujuan).</li>
                        <li>Matriks ini sangat ideal untuk memodelkan <strong>Graf Berbobot (<em>Weighted Graph</em>)</strong>, di mana angka di dalam matriks tidak hanya menandakan status koneksi, tetapi merepresentasikan nilai ukur nyata seperti jarak tempuh atau biaya logistik.</li>
                    </ul>
                </li>
            </ul>
        </div>

        {{-- Navigasi Bawah --}}
        <div class="flex justify-between gap-4 mt-12 pt-6 border-t border-slate-200">
            <button type="button" onclick="prevStep()"
                class="px-5 py-2.5 rounded-lg border border-slate-300 
                       text-slate-600 hover:bg-slate-50 
                       text-sm font-medium transition">
                Kembali
            </button>
            <button type="button" onclick="nextStep()"
                class="px-6 py-2.5 rounded-lg bg-blue-600 
                       text-white hover:bg-blue-700 
                       text-sm font-medium shadow-sm transition flex items-center gap-2">
                Lanjut <i class="fa-solid fa-arrow-right"></i>
            </button>
        </div>
    </div>
</section>