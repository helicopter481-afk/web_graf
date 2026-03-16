<section id="step-5" class="step-slide">
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-10 -mt-8">
        <h2 class="text-3xl font-bold mb-6 text-slate-900 border-b pb-4">
            Rangkuman Materi 1
        </h2>

        <div class="text-slate-700 text-base leading-relaxed text-justify">
            <ul class="list-disc list-outside ml-6 space-y-4">
                <li>
                    <strong>Graf</strong> digunakan oleh komputer untuk merepresentasikan hubungan antarobjek melalui
                    proses abstraksi, yaitu menyederhanakan permasalahan fisik di dunia nyata menjadi model logika agar
                    dapat diproses secara komputasi.
                </li>

                <li>
                    Sebuah struktur graf tersusun atas tiga komponen fundamental:
                    <ul class="list-[circle] list-outside ml-6 mt-2 space-y-2">
                        <li><strong>Simpul (Vertex):</strong> Mewakili entitas atau objek data, seperti lokasi suatu
                            kota atau akun pengguna.</li>
                        <li><strong>Sisi (Edge):</strong> Mewakili konektivitas atau relasi antar-entitas, seperti jalan
                            raya atau status pertemanan.</li>
                        <li><strong>Derajat (Degree):</strong> Menyatakan total jumlah sisi yang terhubung pada sebuah
                            simpul. Semakin tinggi nilainya, semakin krusial simpul tersebut dalam jaringan.</li>
                    </ul>
                </li>

                <li>
                    Berdasarkan karakteristik sisinya, graf diklasifikasikan ke dalam beberapa jenis untuk menyesuaikan
                    kebutuhan algoritma:
                    <ul class="list-[circle] list-outside ml-6 mt-2 space-y-2">
                        <li><strong>Berdasarkan Arah:</strong> <strong>Graf Tak Berarah</strong> (<em>Undirected</em>)
                            untuk relasi timbal balik (dua arah), dan <strong>Graf Berarah</strong> (<em>Directed</em>)
                            untuk relasi searah yang memiliki orientasi.</li>
                        <li><strong>Berdasarkan Bobot:</strong> <strong>Graf Tak Berbobot</strong> (<em>Unweighted</em>)
                            yang hanya peduli pada status koneksi, dan <strong>Graf Berbobot</strong>
                            (<em>Weighted</em>) yang memiliki nilai ukur pada sisinya (seperti jarak km atau waktu
                            tempuh).</li>
                    </ul>
                </li>

                <li>
                    Pemodelan graf menjadi fondasi logika bagi berbagai teknologi modern, seperti:
                    <ul class="list-[circle] list-outside ml-6 mt-2 space-y-2">
                        <li><strong>Sistem Navigasi:</strong> Menggunakan kombinasi <em>Graf Berarah</em> dan <em>Graf
                                Berbobot</em> untuk menghitung rute paling efisien secara algoritmik.</li>
                        <li><strong>Jejaring Sosial:</strong> Menggunakan struktur graf untuk menelusuri hubungan
                            pertemanan secara tidak langsung (<em>indirect connection</em>) melalui simpul perantara.
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

        {{-- Navigasi --}}
        <div class="flex justify-between gap-4 mt-12 pt-6 border-t border-slate-200">
            <button type="button" onclick="prevStep()"
                class="px-5 py-2 rounded-lg border border-slate-300 
                       text-slate-600 hover:bg-slate-50 
                       text-sm font-medium transition">
                Kembali
            </button>
            <button type="button" onclick="nextStep()"
                class="px-6 py-2 rounded-lg bg-blue-600 
                       text-white hover:bg-blue-700 
                       text-sm font-medium shadow-sm transition">
                Lanjut
            </button>
        </div>
    </div>
</section>
