<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Quiz4Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1. Bersihkan soal lama agar tidak dobel
        DB::table('content_questions')
            ->where('chapter_code', 'bab4')
            ->where('section_code', 'quiz4')
            ->delete();

        // 2. Data 10 Soal Quiz Bab 4 (Bobot 10 poin per soal = Total 100)
        $soal = [
            // --- Q1 ---
            [
                'chapter_code' => 'bab4',
                'section_code' => 'quiz4',
                'type' => 'MULTIPLE_CHOICE',
                'weight' => 10,
                'question_text' => '<p>Mengapa algoritma BFS tidak cocok digunakan untuk sistem navigasi Google Maps di dunia nyata?</p>',
                'options' => json_encode([
                    "A" => "BFS tidak bisa memproses simpul lebih dari 100 buah.",
                    "B" => "BFS menganggap semua jalur memiliki jarak tempuh yang persis sama.",
                    "C" => "BFS selalu terjebak di jalan buntu.",
                    "D" => "BFS memakan terlalu banyak RAM komputer."
                ]),
                'correct_answer' => json_encode(["B"]),
                'explanation' => 'Kelemahan utama BFS adalah ia tidak mengenali angka "bobot" (seperti jarak kilometer atau indikator kemacetan).'
            ],
            // --- Q2 ---
            [
                'chapter_code' => 'bab4',
                'section_code' => 'quiz4',
                'type' => 'FILL_BLANK',
                'weight' => 10,
                'question_text' => '<p>Untuk menyimpan graf yang memiliki nilai beban/jarak di dalam Python, kita tidak bisa memakai Dictionary biasa. Kita harus menggunakan Dictionary di dalam Dictionary, yang secara teknis disebut sebagai ________ Dictionary. <em>(Ketik 1 Kata Bahasa Inggris)</em></p>',
                'options' => json_encode([]),
                'correct_answer' => json_encode(["Nested", "nested"]),
                'explanation' => 'Nested berarti bersarang. Ini memungkinkan kita menjadikan nama tetangga sebagai Key, dan jarak tempuhnya sebagai Value.'
            ],
            // --- Q3 ---
            [
                'chapter_code' => 'bab4',
                'section_code' => 'quiz4',
                'type' => 'NUMBER',
                'weight' => 10,
                'question_text' => '<p>Diberikan kode: <code>peta = {"Rumah": {"Pasar": 5, "Kampus": 10}}</code>. Jika komputer mengeksekusi <code>print(peta["Rumah"]["Pasar"])</code>, angka berapa yang akan keluar di layar?</p>',
                'options' => json_encode([]),
                'correct_answer' => json_encode(["5"]),
                'explanation' => 'Kode tersebut akan masuk ke Key "Rumah", lalu mencari Key "Pasar" di dalamnya, yang memiliki value angka 5.'
            ],
            // --- Q4 ---
            [
                'chapter_code' => 'bab4',
                'section_code' => 'quiz4',
                'type' => 'BOOLEAN',
                'weight' => 10,
                'question_text' => '<p>Dalam mempersiapkan algoritma Dijkstra, nilai jarak pada tabel untuk <strong>titik asal/awal</strong> (tempat kita berdiri saat ini) harus selalu diisi dengan angka 0.</p>',
                'options' => json_encode(["benar" => "Benar", "salah" => "Salah"]),
                'correct_answer' => json_encode(["benar"]),
                'explanation' => 'Benar. Jarak dari titik A menuju titik A itu sendiri adalah nol kilometer.'
            ],
            // --- Q5 ---
            [
                'chapter_code' => 'bab4',
                'section_code' => 'quiz4',
                'type' => 'FILL_BLANK',
                'weight' => 10,
                'question_text' => '<p>Ketikkan secara persis kode fungsi bawaan Python (beserta kurungnya) yang digunakan untuk merepresentasikan nilai tak terhingga (<em>Infinity</em>) dalam tabel jarak Dijkstra!</p>',
                'options' => json_encode([]),
                'correct_answer' => json_encode(["float('inf')", 'float("inf")']),
                'explanation' => 'float(\'inf\') adalah standar Python untuk nilai matematika tak terhingga, menjamin angka rute apa pun pasti lebih kecil dari nilai ini di pengecekan pertama.'
            ],
            // --- Q6 ---
            [
                'chapter_code' => 'bab4',
                'section_code' => 'quiz4',
                'type' => 'MULTIPLE_CHOICE',
                'weight' => 10,
                'question_text' => '<p>Mengapa algoritma Dijkstra memberikan nilai tak terhingga (<em>Infinity</em>) pada semua simpul yang belum dikunjungi di awal program?</p>',
                'options' => json_encode([
                    "A" => "Agar memori komputer tidak penuh.",
                    "B" => "Karena jarak aslinya memang tidak bisa dihitung.",
                    "C" => "Agar rute nyata apa pun yang kelak ditemukan komputer pasti dianggap lebih kecil/lebih baik untuk menggantikan nilai awal tersebut.",
                    "D" => "Untuk mencegah error saat program crash."
                ]),
                'correct_answer' => json_encode(["C"]),
                'explanation' => 'Infinity bertindak sebagai angka "pancingan". Rute sejauh 100 KM pun akan di-update (karena 100 < Infinity) dan menggantikan data kosong tersebut.'
            ],
            // --- Q7 ---
            [
                'chapter_code' => 'bab4',
                'section_code' => 'quiz4',
                'type' => 'MULTIPLE_CHOICE',
                'weight' => 10,
                'question_text' => '<p>Proses inti di mana komputer menemukan rute baru yang bobotnya lebih kecil dari rute lama, lalu mengganti/memperbarui data di tabel jarak, dikenal dengan istilah...</p>',
                'options' => json_encode([
                    "A" => "Backtracking",
                    "B" => "Overloading",
                    "C" => "Relaxation",
                    "D" => "Greedy Matching"
                ]),
                'correct_answer' => json_encode(["C"]),
                'explanation' => 'Relaxation (Melonggarkan) adalah istilah resmi dalam ilmu algoritma graf saat kita sukses meng-update jarak terpendek yang baru.'
            ],
            // --- Q8 ---
            [
                'chapter_code' => 'bab4',
                'section_code' => 'quiz4',
                'type' => 'CHECKBOX',
                'weight' => 10,
                'question_text' => '<p>Algoritma Dijkstra dikenal menggunakan metode <em>Greedy</em> (Rakus). Apa sifat dari metode ini pada setiap perulangannya? (Pilih dua)</p>',
                'options' => json_encode([
                    "A" => "Komputer selalu mencari simpul dengan jarak tempuh paling kecil saat itu.",
                    "B" => "Komputer mengecek semua kemungkinan rute secara acak.",
                    "C" => "Keputusan yang diambil saat itu dianggap yang paling optimal.",
                    "D" => "Komputer selalu bergerak ke arah utara peta terlebih dahulu."
                ]),
                'correct_answer' => json_encode(["A", "C"]),
                'explanation' => 'Sifat rakus (Greedy) berarti algoritma selalu memilih rute dengan angka termurah/terkecil yang ada di depan mata tanpa ragu-ragu dengan anggapan itu adalah langkah paling optimal.'
            ],
            // --- Q9 ---
            [
                'chapter_code' => 'bab4',
                'section_code' => 'quiz4',
                'type' => 'BOOLEAN',
                'weight' => 10,
                'question_text' => '<p>Algoritma Dijkstra akan tetap berfungsi dengan sempurna meskipun kita memberikan angka bobot minus/negatif (misalnya: rute jalan dengan tarif -5000).</p>',
                'options' => json_encode(["benar" => "Benar", "salah" => "Salah"]),
                'correct_answer' => json_encode(["salah"]),
                'explanation' => 'Salah. Kelemahan mutlak Dijkstra adalah ia TIDAK BISA menangani graf berbobot negatif. Bobot negatif akan merusak logika Greedy-nya dan membuat program terjebak.'
            ],
            // --- Q10 ---
            [
                'chapter_code' => 'bab4',
                'section_code' => 'quiz4',
                'type' => 'FILL_BLANK',
                'weight' => 10,
                'question_text' => '<p>Jika BFS diibaratkan seperti air yang menyebar melebar dan merata, maka algoritma Dijkstra sering diibaratkan bekerja dengan cara mencari aliran air ke jalur yang memiliki... <em>(Ketik 1 kata)</em></p>',
                'options' => json_encode([]),
                // Sistem akan membenarkan jawaban jika siswa mengetik salah satu dari array di bawah ini
                'correct_answer' => json_encode(["bobot", "beban", "hambatan"]),
                'explanation' => 'Dijkstra secara spesifik merancang rutenya untuk menghindari bobot (hambatan/jarak/tarif) yang besar dan mencari angka bobot terkecil.'
            ],
        ];

        DB::table('content_questions')->insert($soal);
    }
}