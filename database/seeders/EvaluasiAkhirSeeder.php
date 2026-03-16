<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EvaluasiAkhirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1. Hapus soal evaluasi lama agar tidak dobel/tumpang tindih jika dijalankan ulang
        DB::table('content_questions')
            ->where('chapter_code', 'evaluasi')
            ->where('section_code', 'ujian_akhir')
            ->delete();

        // 2. Siapkan 20 Soal Evaluasi Akhir (Bobot 5 poin per soal = Total 100)
        // PERBAIKAN: Semua string tunggal (terutama untuk LIVE_CODING, FILL_BLANK, dan NUMBER) 
        // wajib di-json_encode agar tidak melanggar Constraint Tipe Kolom JSON MySQL.
        
        $soal = [
            // --- Q1 ---
            [
                'chapter_code' => 'evaluasi',
                'section_code' => 'ujian_akhir',
                'type' => 'MULTIPLE_CHOICE',
                'weight' => 5,
                'question_text' => '<p>Jika Anda diminta merancang struktur <em>database</em> untuk fitur "Follower" pada media sosial X/Twitter (di mana pengguna A bisa mengikuti pengguna B, tapi pengguna B tidak harus mengikuti pengguna A balik), jenis graf apa yang wajib digunakan ialah ...</p>',
                'options' => json_encode([
                    "A" => "Undirected Graph",
                    "B" => "Directed Graph",
                    "C" => "Weighted Graph",
                    "D" => "Tree",
                    "E" => "List"
                ]),
                'correct_answer' => json_encode(["B"]),
                'explanation' => 'Fitur follower bersifat satu arah (Directed Graph). Jika A follow B, panah/relasi hanya mengarah dari A ke B. Berbeda dengan Facebook (Undirected) yang harus timbal balik (Mutual).'
            ],
            // --- Q2 ---
            [
                'chapter_code' => 'evaluasi',
                'section_code' => 'ujian_akhir',
                'type' => 'MULTIPLE_CHOICE',
                'weight' => 5,
                'question_text' => '<p>Alasan <em>Programmer</em> modern lebih sering menggunakan <em>Adjacency List</em> (Dictionary) daripada <em>Adjacency Matrix</em> (Array 2D) untuk memetakan jalan raya di seluruh Indonesia ...</p>',
                'options' => json_encode([
                    "A" => "Karena Matrix lebih lambat diakses.",
                    "B" => "Karena Matrix memakan memori RAM terlalu besar untuk menyimpan angka 0 pada kota yang tidak terhubung langsung (Sparse Graph).",
                    "C" => "Karena List bisa menyimpan bobot, Matrix tidak.",
                    "D" => "Karena Python tidak mendukung struktur Array 2D.",
                    "E" => "A dan C benar"
                ]),
                'correct_answer' => json_encode(["B"]),
                'explanation' => 'Adjacency Matrix sangat boros memori pada graf yang "jarang" (Sparse Graph) karena harus mengalokasikan ruang untuk menyimpan puluhan ribu angka 0.'
            ],
            // --- Q3 ---
            [
                'chapter_code' => 'evaluasi',
                'section_code' => 'ujian_akhir',
                'type' => 'LIVE_CODING',
                'weight' => 5,
                'question_text' => '<p>Diberikan graf: Node "Kampus" terhubung ke "Pasar", "Kost", dan "Kafe". Buatlah sebuah variabel List di Python bernama <strong>kampus</strong> yang berisi ketiga tempat tersebut. Kemudian, gunakan fungsi bawaan Python untuk menghitung dan mencetak (<em>print</em>) total jumlah tetangga/jalan (derajat) dari simpul kampus tersebut!</p>',
                'options' => json_encode('# Ketik kodemu dari awal di kode editor yang disediakan'), // Diubah ke json_encode
                'correct_answer' => json_encode('3'), // Diubah ke json_encode
                'explanation' => 'Kodingan yang benar: kampus = ["Pasar", "Kost", "Kafe"] lalu print(len(kampus)). Fungsi len() digunakan untuk menghitung jumlah elemen list.'
            ],
            // --- Q4 ---
            [
                'chapter_code' => 'evaluasi',
                'section_code' => 'ujian_akhir',
                'type' => 'LIVE_CODING',
                'weight' => 5,
                'question_text' => '<p>Buatlah variabel <em>Dictionary</em> bernama <strong>peta</strong> yang merepresentasikan graf tak berarah berikut: "A terhubung ke B". Pastikan Anda mendefinisikan koneksi untuk <strong>keduanya</strong> karena ini graf tak berarah! Setelah itu, cetak tetangga dari "B"!</p>',
                'options' => json_encode('# Ketik kodemu dari awal di kode editor yang disediakan.'), // Diubah ke json_encode
                'correct_answer' => json_encode("['A']"), // Diubah ke json_encode
                'explanation' => 'Karena graf tak berarah, format yang benar: peta = {"A": ["B"], "B": ["A"]}. Cetak print(peta["B"]) menghasilkan [\'A\'].'
            ],
            // --- Q5 ---
            [
                'chapter_code' => 'evaluasi',
                'section_code' => 'ujian_akhir',
                'type' => 'CHECKBOX',
                'weight' => 5,
                'question_text' => '<p>Manakah dari pernyataan di bawah ini yang merupakan pasangan Algoritma dan Struktur Data yang tepat? (Pilih dua)</p>',
                'options' => json_encode([
                    "A" => "BFS menggunakan logika Antrean (Queue - FIFO)",
                    "B" => "BFS menggunakan logika Tumpukan (Stack - LIFO)",
                    "C" => "DFS menggunakan logika Antrean (Queue - FIFO)",
                    "D" => "DFS menggunakan logika Tumpukan (Stack - LIFO)"
                ]),
                'correct_answer' => json_encode(["A", "D"]),
                'explanation' => 'BFS menyebar luas secara adil menggunakan antrean (FIFO). DFS melesat tajam ke kedalaman menggunakan tumpukan (LIFO).'
            ],
            // --- Q6 ---
            [
                'chapter_code' => 'evaluasi',
                'section_code' => 'ujian_akhir',
                'type' => 'MULTIPLE_CHOICE',
                'weight' => 5,
                'question_text' => '<p>Jika Anda sedang memprogram robot AI untuk menyusuri labirin lorong (<em>maze</em>) sempit hingga ke ujung jalan buntu, lalu menyuruh robot itu mundur kembali ke persimpangan sebelumnya jika menabrak tembok (<em>backtracking</em>), algoritma penelusuran yang Anda terapkan ialah...</p>',
                'options' => json_encode([
                    "A" => "Dijkstra",
                    "B" => "BFS (Breadth-First Search)",
                    "C" => "DFS (Depth-First Search)",
                    "D" => "Bubble Sort",
                    "E" => "Selection Sort"
                ]),
                'correct_answer' => json_encode(["C"]),
                'explanation' => 'Menelusuri hingga ujung terdalam dan mundur kembali (backtracking) adalah ciri khas mutlak dari metode Depth-First Search (DFS).'
            ],
            // --- Q7 ---
            [
                'chapter_code' => 'evaluasi',
                'section_code' => 'ujian_akhir',
                'type' => 'BOOLEAN',
                'weight' => 5,
                'question_text' => '<p>Dalam penelusuran graf (BFS/DFS), kita WAJIB menyiapkan sebuah tempat penyimpanan (misal: visited = []) untuk mengingat simpul mana saja yang sudah dikunjungi.</p>',
                'options' => json_encode(["benar" => "Benar", "salah" => "Salah"]),
                'correct_answer' => json_encode(["benar"]),
                'explanation' => 'Benar! Tanpa memori visited, komputer akan mondar-mandir di jalan memutar (cycle) selamanya hingga program crash (Infinite Loop).'
            ],
            // --- Q8 ---
            [
                'chapter_code' => 'evaluasi',
                'section_code' => 'ujian_akhir',
                'type' => 'LIVE_CODING',
                'weight' => 5,
                'question_text' => '<p>DFS menggunakan mekanisme Tumpukan (LIFO - Terakhir Masuk Pertama Keluar). Buatlah sebuah <em>list</em> bernama <strong>tumpukan</strong> berisi angka [10, 20, 30]. Cabut elemen terakhir dari <em>list</em> tersebut dan cetaklah ke layar!</p>',
                'options' => json_encode('# Ketik kode di kode editor yang disediakan.'), // Diubah ke json_encode
                'correct_answer' => json_encode('30'), // Diubah ke json_encode
                'explanation' => 'Siswa harus memanggil tumpukan.pop() tanpa angka di dalam kurung, lalu mencetaknya.'
            ],
            // --- Q9 ---
            [
                'chapter_code' => 'evaluasi',
                'section_code' => 'ujian_akhir',
                'type' => 'LIVE_CODING',
                'weight' => 5,
                'question_text' => '<p>BFS menggunakan mekanisme Antrean (FIFO - Pertama Masuk Pertama Keluar). Buatlah sebuah <em>list</em> bernama <strong>antrean</strong> berisi teks ["A", "B", "C"]. Cabut elemen pertama/terdepan dari antrean tersebut dan cetaklah ke layar!</p>',
                'options' => json_encode('# Ketik kodemu dari awal di kode editor yang disediakan'), // Diubah ke json_encode
                'correct_answer' => json_encode('A'), // Diubah ke json_encode
                'explanation' => 'Siswa harus memanggil antrean.pop(0) dengan angka nol di dalam kurung untuk mencabut elemen pertama.'
            ],
            // --- Q10 ---
            [
                'chapter_code' => 'evaluasi',
                'section_code' => 'ujian_akhir',
                'type' => 'FILL_BLANK',
                'weight' => 5,
                'question_text' => '<p>BFS mengukur rute terpendek berdasarkan "jumlah persimpangan jalan" (hop), bukan berdasarkan jarak kilometer aktual. Karena itu, BFS hanya cocok beroperasi pada jenis graf... <em>(Ketik 2 kata)</em></p>',
                'options' => json_encode([]),
                'correct_answer' => json_encode(["tak berbobot"]),
                'explanation' => 'BFS murni hanya efektif di Graf Tak Berbobot (Unweighted Graph) karena ia menganggap semua jalan punya biaya yang sama persis.'
            ],
            // --- Q11 ---
            [
                'chapter_code' => 'evaluasi',
                'section_code' => 'ujian_akhir',
                'type' => 'FILL_BLANK',
                'weight' => 5,
                'question_text' => '<p>Dalam prosesnya, algoritma Dijkstra selalu mengambil keputusan yang paling murah/terkecil saat itu juga yang ada di depan mata. Metode pengambilan keputusan "rakus" ini dalam ilmu komputer disebut dengan algoritma... <em>(Ketik 1 kata Bahasa Inggris)</em></p>',
                'options' => json_encode([]),
                'correct_answer' => json_encode(["greedy"]),
                'explanation' => 'Algoritma Greedy (Rakus) berarti selalu mengambil opsi local optimum dengan harapan mencapai global optimum.'
            ],
            // --- Q12 ---
            [
                'chapter_code' => 'evaluasi',
                'section_code' => 'ujian_akhir',
                'type' => 'NUMBER',
                'weight' => 5,
                'question_text' => '<p>Saat menyusun tabel memori awal Dijkstra, jarak ke semua kota yang belum dieksplorasi diatur menjadi <em>Infinity</em> (Tak Terhingga). Namun, nilai jarak untuk <strong>titik asal</strong> (tempat kita berdiri saat ini) harus diatur ke angka...?</p>',
                'options' => json_encode([]),
                'correct_answer' => json_encode(["0"]),
                'explanation' => 'Jarak dari kota tempat kita berada (titik Start) ke tempat itu sendiri adalah 0 kilometer.'
            ],
            // --- Q13 ---
            [
                'chapter_code' => 'evaluasi',
                'section_code' => 'ujian_akhir',
                'type' => 'MULTIPLE_CHOICE',
                'weight' => 5,
                'question_text' => '<p>Algoritma Dijkstra dijamin berhasil menemukan rute tercepat, KECUALI jika di dalam graf tersebut terdapat kondisi...</p>',
                'options' => json_encode([
                    "A" => "Jumlah simpul yang ganjil",
                    "B" => "Siklus/Jalan memutar (Cycle)",
                    "C" => "Jalan yang hanya punya satu arah",
                    "D" => "Bobot jarak bernilai negatif (Minus)",
                    "E" => "A dan B benar"
                ]),
                'correct_answer' => json_encode(["D"]),
                'explanation' => 'Dijkstra akan menghasilkan output keliru jika ada bobot negatif (misal: diskon biaya -50), karena ia merusak logika dasar asumsi Greedy yang terus bertambah.'
            ],
            // --- Q14 ---
            [
                'chapter_code' => 'evaluasi',
                'section_code' => 'ujian_akhir',
                'type' => 'LIVE_CODING',
                'weight' => 5,
                'question_text' => '<p>Algoritma Dijkstra memerlukan angka pancingan yang lebih besar dari angka apapun di dunia nyata agar dapat tergantikan (<em>update</em>). Cetaklah (print) sintaks tipe desimal di Python yang merepresentasikan <strong>Tak Terhingga (Infinity)</strong>.</p>',
                'options' => json_encode('# Ketik kodemu dari awal di kode editor yang disediakan:'), // Diubah ke json_encode
                'correct_answer' => json_encode('inf'), // Diubah ke json_encode
                'explanation' => 'Siswa harus mengetik print(float(\'inf\')) yang merupakan standar Python.'
            ],
            // --- Q15 ---
            [
                'chapter_code' => 'evaluasi',
                'section_code' => 'ujian_akhir',
                'type' => 'LIVE_CODING',
                'weight' => 5,
                'question_text' => '<p>Anda adalah <em>programmer</em> Google Maps. Simpan data ini ke dalam <em>Nested Dictionary</em> bernama peta: "Jarak dari kota P ke kota Q adalah 45". Cetaklah langsung angka 45 tersebut dari dalam <em>dictionary</em>!</p>',
                'options' => json_encode('# Ketik kode di kode editor yang disediakan.'), // Diubah ke json_encode
                'correct_answer' => json_encode('45'), // Diubah ke json_encode
                'explanation' => 'Siswa harus merakit peta = {"P": {"Q": 45}} lalu mencetaknya print(peta["P"]["Q"]).'
            ],
            // --- Q16 ---
            [
                'chapter_code' => 'evaluasi',
                'section_code' => 'ujian_akhir',
                'type' => 'FILL_BLANK_MULTI',
                'weight' => 5,
                'question_text' => '<p>Tabel memori Anda saat ini mencatat jarak menuju "Duta Mall" adalah 25. Komputer Anda menemukan rute memutar lewat "Siring" yang memakan jarak 10. Jarak lanjutan dari "Siring" menuju "Duta Mall" adalah 5. Berapakah total kalkulasi rute baru ini [1], dan apakah program akan memperbarui (me-replace) jarak di tabel memori? (Ketik True/False) [2]</p>',
                'options' => json_encode(["Total kalkulasi rute baru [1]", "Update memori? (True/False) [2]"]),
                'correct_answer' => json_encode(["15", "True"]),
                'explanation' => 'Rute baru = 10 + 5 = 15. Karena 15 lebih kecil (<) dari 25, maka memori lama akan dihapus dan diganti dengan 15. Proses ini disebut Relaxation.'
            ],
            // --- Q17 ---
            [
                'chapter_code' => 'evaluasi',
                'section_code' => 'ujian_akhir',
                'type' => 'LIVE_CODING',
                'weight' => 5,
                'question_text' => '<p>Rangkai proses <em>Relaxation</em> murni dengan kode Python!</p><ol><li>Buat variabel <code>lama = 100</code>.</li><li>Buat variabel <code>baru = 60 + 20</code>.</li><li>Gunakan logika kondisional (if) untuk membandingkan keduanya. Jika yang baru lebih efisien (lebih kecil), timpa variabel lama dengan nilai baru.</li><li>Cetak (print) nilai variabel lama di akhir program.</li></ol>',
                'options' => json_encode('# Ketik kodemu dari awal di kode editor yang disediakan'), // Diubah ke json_encode
                'correct_answer' => json_encode('80'), // Diubah ke json_encode
                'explanation' => 'Jika blok if baru < lama: lama = baru berhasil ditulis, output printnya adalah 80.'
            ],
            // --- Q18 ---
            [
                'chapter_code' => 'evaluasi',
                'section_code' => 'ujian_akhir',
                'type' => 'NUMBER',
                'weight' => 5,
                'question_text' => '<p>Diberikan kode Python: <code>memori = float(\'inf\')</code>. Kemudian <code>jarak = 55</code>. Jika dieksekusi blok <code>if jarak < memori: memori = jarak</code>, berapakah nilai memori sekarang? (Ketik angkanya saja)</p>',
                'options' => json_encode([]),
                'correct_answer' => json_encode(["55"]),
                'explanation' => 'Angka 55 tentu saja lebih kecil daripada Tak Terhingga (Infinity). Maka memori berhasil di-update menjadi 55.'
            ],
            // --- Q19 ---
            [
                'chapter_code' => 'evaluasi',
                'section_code' => 'ujian_akhir',
                'type' => 'LIVE_CODING',
                'weight' => 5,
                'question_text' => '<p>Dijkstra perlu mengecek semua tetangga untuk diuji. Diberikan dictionary: <code>tetangga = {"A": 5, "B": 8}</code>. Gunakan perulangan for untuk mencetak KUNCI (<em>keys</em>) dari dictionary tersebut, satu per baris! (Sistem akan mengecek huruf B tercetak).</p>',
                'options' => json_encode('# Ketik kodemu dari awal di kode editor yang sudah disediakan.'), // Diubah ke json_encode
                'correct_answer' => json_encode('B'), // Diubah ke json_encode
                'explanation' => 'Siswa harus menulis: tetangga = {"A": 5, "B": 8} lalu for kota in tetangga: print(kota)'
            ],
            // --- Q20 ---
            [
                'chapter_code' => 'evaluasi',
                'section_code' => 'ujian_akhir',
                'type' => 'MULTIPLE_CHOICE',
                'weight' => 5,
                'question_text' => '<p>Di bawah ini adalah urutan siklus Algoritma Dijkstra yang paling tepat dari awal hingga akhir, yaitu...</p>',
                'options' => json_encode([
                    "A" => "Set Infinity -> Cek tetangga -> Lakukan perbandingan & update (Relaxation) -> Ulangi untuk simpul terdekat berikutnya",
                    "B" => "Tambah Queue -> Cek semua sisi -> Kunjungi berdasar level",
                    "C" => "Tambah Stack -> Mundur saat buntu -> Selesai",
                    "D" => "Set 0 pada semua simpul -> Cabut dengan pop() -> Selesai",
                    "E" => "Semua Benar"
                ]),
                'correct_answer' => json_encode(["A"]),
                'explanation' => 'Inisialisasi -> Cek Tetangga -> Relaxation -> Pilih simpul Greedy berikutnya, adalah inti utuh dari Dijkstra.'
            ],
        ];

        DB::table('content_questions')->insert($soal);
    }
}