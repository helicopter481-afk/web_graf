<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Quiz3Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1. Bersihkan soal lama agar tidak dobel/tumpang tindih
        DB::table('content_questions')
            ->where('chapter_code', 'bab3')
            ->where('section_code', 'quiz3')
            ->delete();

        // 2. Data 10 Soal Quiz Bab 3 (Bobot 10 poin per soal = Total 100)
        $soal = [
            // --- Q1 ---
            [
                'chapter_code' => 'bab3',
                'section_code' => 'quiz3',
                'type' => 'BOOLEAN',
                'weight' => 10,
                'question_text' => '<p><strong>Konsep Dasar Penelusuran:</strong> Tujuan utama dari algoritma <em>Graph Traversal</em> (seperti BFS dan DFS) adalah untuk menciptakan simpul dan sisi baru secara otomatis di dalam memori komputer.</p>',
                'options' => json_encode(["benar" => "Benar", "salah" => "Salah"]),
                'correct_answer' => json_encode(["salah"]),
                'explanation' => 'Traversal bukan bertujuan menciptakan data baru, melainkan metode untuk "mengunjungi" atau "menjelajahi" simpul-simpul yang sudah ada secara sistematis.'
            ],
            // --- Q2 ---
            [
                'chapter_code' => 'bab3',
                'section_code' => 'quiz3',
                'type' => 'FILL_BLANK',
                'weight' => 10,
                'question_text' => '<p><strong>Struktur Data BFS:</strong> Algoritma <em>Breadth-First Search</em> (BFS) yang menjelajah secara melebar (level demi level) harus dipasangkan dengan struktur data antrean. Dalam bahasa Inggris, struktur data ini disebut... <em>(Ketik 1 Kata)</em></p>',
                'options' => json_encode([]),
                'correct_answer' => json_encode(["Queue", "queue", "QUEUE"]),
                'explanation' => 'BFS menggunakan Queue (Antrean) dengan hukum siapa yang masuk pertama, ia yang diproses pertama (FIFO).'
            ],
            // --- Q3 ---
            [
                'chapter_code' => 'bab3',
                'section_code' => 'quiz3',
                'type' => 'MULTIPLE_CHOICE',
                'weight' => 10,
                'question_text' => '<p><strong>Hukum Tumpukan (DFS):</strong> Algoritma DFS (<em>Depth-First Search</em>) menggunakan memori Tumpukan (<em>Stack</em>). Aturan utama dari struktur data ini adalah LIFO, yang merupakan singkatan dari...</p>',
                'options' => json_encode([
                    "A" => "Last-In Fast-Out",
                    "B" => "Last-In First-Out",
                    "C" => "Level-In First-Out",
                    "D" => "Loop-In First-Out"
                ]),
                'correct_answer' => json_encode(["B"]),
                'explanation' => 'LIFO (Last-In First-Out) berarti data yang terakhir kali dimasukkan ke dalam memori akan menjadi data yang pertama kali dikeluarkan/diproses.'
            ],
            // --- Q4 ---
            [
                'chapter_code' => 'bab3',
                'section_code' => 'quiz3',
                'type' => 'CHECKBOX',
                'weight' => 10,
                'question_text' => '<p><strong>Visualisasi Logika Traversal:</strong> Pernyataan manakah yang Tepat mengenai karakteristik fisik penelusuran graf? (Pilih dua)</p>',
                'options' => json_encode([
                    "A" => "BFS cocok dianalogikan seperti gelombang air yang menyebar perlahan.",
                    "B" => "DFS cocok dianalogikan seperti orang yang mencari jalan di labirin hingga ujung.",
                    "C" => "BFS selalu mencari rute yang paling jauh terlebih dahulu.",
                    "D" => "DFS mengecek semua tetangga terdekat secara bersamaan sebelum maju."
                ]),
                'correct_answer' => json_encode(["A", "B"]),
                'explanation' => 'BFS melebar menyentuh tetangga terdekat layaknya riak air, sementara DFS menukik menelusuri satu lorong sedalam mungkin seperti di labirin.'
            ],
            // --- Q5 ---
            [
                'chapter_code' => 'bab3',
                'section_code' => 'quiz3',
                'type' => 'FILL_BLANK',
                'weight' => 10,
                'question_text' => '<p><strong>Sintaks Antrean (FIFO):</strong> Dalam bahasa Python, untuk mencabut elemen pertama dari sebuah List agar meniru hukum Queue (BFS), kita menggunakan fungsi spesifik yaitu... <em>(Ketik nama fungsinya, misal: print())</em></p>',
                'options' => json_encode([]),
                'correct_answer' => json_encode(["pop(0)", "pop(0) "]),
                'explanation' => 'Angka 0 di dalam kurung memerintahkan Python untuk membuang dan mengambil data dari indeks ke-0 (paling depan).'
            ],
            // --- Q6 ---
            [
                'chapter_code' => 'bab3',
                'section_code' => 'quiz3',
                'type' => 'FILL_BLANK',
                'weight' => 10,
                'question_text' => '<p><strong>Sintaks Tumpukan (LIFO):</strong> Kebalikan dari soal sebelumnya, untuk meniru hukum <em>Stack</em> (DFS), kita membuang dan mengambil data dari posisi paling belakang. Fungsi Python yang digunakan adalah... <em>(Ketik fungsinya)</em></p>',
                'options' => json_encode([]),
                'correct_answer' => json_encode(["pop()", "pop() "]),
                'explanation' => 'Jika kurung dibiarkan kosong, fungsi pop() secara default akan selalu mengambil elemen yang posisinya paling akhir di dalam List.'
            ],
            // --- Q7 ---
            [
                'chapter_code' => 'bab3',
                'section_code' => 'quiz3',
                'type' => 'MULTIPLE_CHOICE',
                'weight' => 10,
                'question_text' => '<p><strong>Pentingnya Variabel "Dikunjungi":</strong> Dalam kode BFS maupun DFS, kita selalu membuat list kosong bernama dikunjungi = []. Apa bencana komputasi yang akan terjadi jika kita tidak menggunakan variabel pelacak ini?</p>',
                'options' => json_encode([
                    "A" => "Graf akan otomatis berubah menjadi Graf Berbobot.",
                    "B" => "Komputer akan langsung mati karena memori penuh.",
                    "C" => "Program bisa terjebak bolak-balik di simpul yang sama (Infinite Loop).",
                    "D" => "Fungsi extend() pada Python tidak akan bisa berjalan."
                ]),
                'correct_answer' => json_encode(["C"]),
                'explanation' => 'Tanpa mencatat simpul mana yang sudah didatangi, algoritma akan terus mengunjungi A ke B, lalu kembali dari B ke A tanpa henti (infinite loop).'
            ],
            // --- Q8 ---
            [
                'chapter_code' => 'bab3',
                'section_code' => 'quiz3',
                'type' => 'FILL_BLANK',
                'weight' => 10,
                'question_text' => '<p><strong>Manipulasi Multi-Data:</strong> Saat kita ingin menambahkan seluruh tetangga dari sebuah simpul ke dalam Stack atau Queue sekaligus (memasukkan sebuah list ke dalam list), fungsi bawaan Python apa yang paling tepat digunakan? <em>(Contoh format: append())</em></p>',
                'options' => json_encode([]),
                'correct_answer' => json_encode(["extend()", "extend() "]),
                'explanation' => 'extend() digunakan untuk menggabungkan dua list, sementara append() hanya memasukkan satu item utuh.'
            ],
            // --- Q9 ---
            [
                'chapter_code' => 'bab3',
                'section_code' => 'quiz3',
                'type' => 'MULTIPLE_CHOICE',
                'weight' => 10,
                'question_text' => '<p><strong>Pemilihan Algoritma:</strong> Jika Anda ingin membuat fitur "Cari teman dari temannya teman Anda" di media sosial (mencari relasi terdekat secara bertahap), algoritma manakah yang secara logis harus digunakan?</p>',
                'options' => json_encode([
                    "A" => "DFS (Depth-First Search)",
                    "B" => "BFS (Breadth-First Search)",
                    "C" => "Dijkstra Algorithm",
                    "D" => "Random Search"
                ]),
                'correct_answer' => json_encode(["B"]),
                'explanation' => 'BFS memindai jaringan lapis demi lapis (level terdekat dulu), sehingga sangat akurat untuk menemukan relasi "teman dari teman" sebelum mencari orang yang lebih jauh.'
            ],
            // --- Q10 ---
            [
                'chapter_code' => 'bab3',
                'section_code' => 'quiz3',
                'type' => 'FILL_BLANK',
                'weight' => 10,
                'question_text' => '<p><strong>Hasil Penelusuran DFS:</strong> Sebuah algoritma DFS mengeksekusi graf berikut: <code>graf = {"A": ["B", "C"], "B": [], "C": []}</code>. Karena menggunakan <em>Stack</em> (pop()), komputer akan mengambil elemen terakhir yang dimasukkan ke antrean. Siapakah simpul yang akan dikunjungi <strong>tepat setelah</strong> simpul "A"? <em>(Ketik 1 Huruf Saja)</em></p>',
                'options' => json_encode([]),
                'correct_answer' => json_encode(["C", "c"]),
                'explanation' => 'Saat A diproses, B dan C masuk ke Stack. Karena C masuk paling belakang ["B", "C"], maka saat fungsi pop() dipanggil, data "C" lah yang akan dicabut lebih dulu!'
            ],
        ];

        DB::table('content_questions')->insert($soal);
    }
}