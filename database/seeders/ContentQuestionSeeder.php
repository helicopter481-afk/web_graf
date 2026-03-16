<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContentQuestion;

class ContentQuestionSeeder extends Seeder
{
    public function run()
    {
        // ==========================================
        // 1. AKTIVITAS 1.1
        // ==========================================
        
        ContentQuestion::create([
            'chapter_code' => 'bab1',
            'section_code' => '1.1',
            'type' => 'multiple_choice',
            'question_text' => "Perhatikan kekacauan kabel pada Gambar A.\n\nSaat teknisi membuat diagram logika pada Gambar B, elemen fisik yang sengaja dibuang demi penyederhanaan adalah...",
            // PERHATIKAN: options langsung Array [] (Tanpa json_encode)
            'options' => [
                'A' => 'Jenis perangkat keras',
                'B' => 'Koneksi antar-alat',
                'C' => 'Keruwetan, warna, dan kelengkungan kabel fisik',
                'D' => 'Jumlah komputer yang ada'
            ],
            'correct_answer' => 'C',
            'explanation' => 'Tepat. Detail fisik seperti kekusutan kabel tidak relevan dalam graf.'
        ]);

        ContentQuestion::create([
            'chapter_code' => 'bab1',
            'section_code' => '1.1',
            'type' => 'multiple_choice',
            'question_text' => 'Pada Gambar B, perangkat yang rumit (Server/PC) disederhanakan visualisasinya menjadi bentuk...',
            'options' => [
                'A' => 'Foto 3 Dimensi',
                'B' => 'Titik atau Ikon Sederhana (Simpul)',
                'C' => 'Tabel Data',
                'D' => 'Paragraf Teks'
            ],
            'correct_answer' => 'B',
            'explanation' => 'Benar. Objek rumit disederhanakan menjadi Simpul (Vertex).'
        ]);

        ContentQuestion::create([
            'chapter_code' => 'bab1',
            'section_code' => '1.1',
            'type' => 'multiple_choice',
            'question_text' => 'Alasan utama Gambar B lebih efektif untuk memahami alur jaringan dibandingkan Gambar A adalah...',
            'options' => [
                'A' => 'Karena gambarnya lebih estetik',
                'B' => 'Karena diagram kanan memperjelas siapa terhubung ke siapa tanpa gangguan visual',
                'C' => 'Karena foto asli resolusinya rendah',
                'D' => 'Karena diagram kanan bisa dijual mahal'
            ],
            'correct_answer' => 'B',
            'explanation' => 'Tepat. Abstraksi menghilangkan "noise" agar fokus pada logika hubungan.'
        ]);

        // ==========================================
        // 2. AKTIVITAS 1.2
        // ==========================================

        ContentQuestion::create([
            'chapter_code' => 'bab1',
            'section_code' => '1.2',
            'type' => 'multiple_choice',
            'question_text' => 'Berdasarkan visualisasi graf di atas, simpul yang paling berpengaruh dalam jaringan ditunjukkan oleh simpul dengan jumlah koneksi terbanyak. Simpul tersebut adalah...',
            'options' => [
                'A' => 'Simpul A',
                'B' => 'Simpul B',
                'C' => 'Simpul C',
                'D' => 'Simpul D'
            ],
            'correct_answer' => 'C',
            'explanation' => 'Benar. Simpul C terhubung ke 3 simpul lain (B, D, E), paling banyak dibanding yang lain.'
        ]);

        ContentQuestion::create([
            'chapter_code' => 'bab1',
            'section_code' => '1.2',
            'type' => 'multiple_choice',
            'question_text' => 'Jika sisi antara C dan D dihapus, perubahan struktur graf yang paling tepat adalah...',
            'options' => [
                'A' => 'Derajat simpul C dan D berkurang',
                'B' => 'Graf menjadi graf berarah',
                'C' => 'Jumlah simpul bertambah',
                'D' => 'Semua simpul memiliki derajat sama'
            ],
            'correct_answer' => 'A',
            'explanation' => 'Tepat. Menghapus sebuah sisi otomatis mengurangi derajat kedua simpul yang tadinya terhubung.'
        ]);

        ContentQuestion::create([
            'chapter_code' => 'bab1',
            'section_code' => '1.2',
            'type' => 'multiple_choice',
            'question_text' => 'Penambahan sisi baru antara A dan E paling tepat berdampak pada...',
            'options' => [
                'A' => 'Menghapus simpul lain',
                'B' => 'Meningkatkan keterhubungan jaringan',
                'C' => 'Mengurangi jumlah simpul',
                'D' => 'Tidak mengubah struktur graf'
            ],
            'correct_answer' => 'B',
            'explanation' => 'Benar. Menambah sisi berarti menambah jalur koneksi, sehingga keterhubungan jaringan meningkat.'
        ]);

        // ==========================================
        // 3. AKTIVITAS 1.3 (Drag & Drop)
        // ==========================================

        ContentQuestion::create([
            'chapter_code' => 'bab1',
            'section_code' => '1.3',
            'type' => 'drag_and_drop',
            'question_text' => "Anda adalah seorang Data Engineer di sebuah E-Commerce.\n\nTugas Anda adalah memetakan data belanja ke dalam model Graf. Tarik item data di sebelah kiri dan masukkan ke dalam Kategori Graf yang tepat di sebelah kanan.",
            'options' => [
                ['id' => 'ec1', 'text' => 'Harga Barang (Rp)', 'category' => 'distractor'],
                ['id' => 'ec2', 'text' => 'Warna Kemasan', 'category' => 'distractor'],
                ['id' => 'ec3', 'text' => 'Total Transaksi', 'category' => 'degree'],
                ['id' => 'ec4', 'text' => 'Transaksi "Membeli"', 'category' => 'edge'],
                ['id' => 'ec5', 'text' => 'Akun Pembeli', 'category' => 'vertex'],
                ['id' => 'ec6', 'text' => 'Produk Sepatu', 'category' => 'vertex']
            ],
            'correct_answer' => 'check_json',
            'explanation' => 'Analisis Kunci Jawaban: Harga & Warna adalah atribut (bukan graf). Total Transaksi adalah Derajat.'
        ]);

        // ==========================================
        // 4. EVALUASI AKHIR
        // ==========================================

        // Misi 1 (Boolean) - FIXED
        ContentQuestion::create([
            'chapter_code' => 'bab1',
            'section_code' => 'evaluasi',
            'type' => 'boolean', 
            'question_text' => 'Pernyataan: "Dalam struktur data graf, panjang garis (sisi) yang digambarkan di layar komputer SELALU mewakili jarak fisik yang sebenarnya di dunia nyata (misalnya: garis panjang berarti jaraknya jauh)."\n\nApakah pernyataan ini Benar atau Salah?',
            // Update: Gunakan Key => Value agar input value-nya teks, bukan angka 0/1
            'options' => [
                'benar' => 'Benar', 
                'salah' => 'Salah'
            ],
            'correct_answer' => 'salah', // Ini akan cocok dengan key 'salah' di atas
            'explanation' => 'Tepat! Graf adalah abstraksi logika. Panjang visual garis tidak selalu mencerminkan jarak fisik.'
        ]);

        // Misi 2 (Isian Kode)
        ContentQuestion::create([
            'chapter_code' => 'bab1',
            'section_code' => 'evaluasi',
            'type' => 'fill_blank_multi',
            'question_text' => "Lengkapi potongan kode Python di bawah ini dengan tipe struktur data yang tepat.\n\nSeorang programmer ingin membuat graf sederhana. Ia tahu bahwa:\n1. Daftar Simpul (Nodes) sifatnya dinamis (bisa ditambah/hapus).\n2. Hubungan Sisi (Edges) sifatnya tetap/tidak boleh diubah isinya (immutable).\n\nBantu ia melengkapi kode tersebut.",
            'options' => null,
            // Perhatikan: Kunci jawaban Isian/Checkbox biarkan json_encode KARENA struktur ini unik dan kadang tidak di-cast otomatis untuk validasi
            'correct_answer' => json_encode(['(', ')', '(', ')']), 
            'explanation' => 'Benar! Kita menggunakan ( ) atau Tuple untuk Sisi (Edges) karena hubungan antar simpul bersifat tetap/immutable.'
        ]);

        // Misi 3 (Angka)
        ContentQuestion::create([
            'chapter_code' => 'bab1',
            'section_code' => 'evaluasi',
            'type' => 'number',
            'question_text' => "Perhatikan kasus berikut:\n\nDalam sebuah graf jaringan pertemanan:\n- Budi berteman dengan Ali.\n- Budi berteman dengan Citra.\n- Budi berteman dengan Deni.\n- Budi berteman dengan Eka.\n\nBerapakah nilai Derajat (Degree) dari simpul Budi? (Tulis angkanya saja)",
            'options' => null,
            'correct_answer' => '4',
            'explanation' => 'Benar (4). Budi terhubung ke 4 orang teman, maka derajatnya adalah 4.'
        ]);

        // Misi 4 (Checkbox)
        ContentQuestion::create([
            'chapter_code' => 'bab1',
            'section_code' => 'evaluasi',
            'type' => 'checkbox',
            'question_text' => "Anda sedang merancang graf untuk aplikasi E-Commerce.\n\nManakah dari item data berikut yang LAYAK dijadikan sebagai Simpul (Vertex)?\n(Ingat: Simpul adalah Entitas/Objek, bukan Sifat).",
            'options' => [
                'akun' => 'Akun Pembeli (User)',
                'harga' => 'Harga Barang (Rupiah)',
                'toko' => 'Toko Penjual (Merchant)',
                'tanggal' => 'Tanggal Transaksi',
                'produk' => 'Produk (Barang)'
            ],
            // Correct Answer tetap JSON string karena kolomnya string biasa di DB
            'correct_answer' => json_encode(['akun', 'toko', 'produk']),
            'explanation' => 'Sempurna! Akun, Toko, dan Produk adalah entitas. Harga dan Tanggal adalah atribut.'
        ]);

        // Misi 5 (Logika)
        ContentQuestion::create([
            'chapter_code' => 'bab1',
            'section_code' => 'evaluasi',
            'type' => 'multiple_choice',
            'question_text' => "Pilih satu jawaban logis.\n\nJika Graf Peta menunjukkan bahwa Rumah terhubung ke Pasar, dan Pasar terhubung ke Kampus, tetapi TIDAK ADA garis langsung dari Rumah ke Kampus.\n\nBagaimana cara komputer mencatat rute dari Rumah ke Kampus?",
            'options' => [
                'A' => 'Komputer membuat garis lurus baru secara otomatis.',
                'B' => 'Komputer menyatakan rute tidak mungkin dilewati.',
                'C' => 'Komputer mencatat rute sebagai urutan: Rumah -> Pasar -> Kampus.',
                'D' => 'Komputer menghapus Pasar agar rutenya jadi dekat.'
            ],
            'correct_answer' => 'C',
            'explanation' => 'Logis! Rute dibentuk dengan menelusuri sisi yang ada.'
        ]);
    }
}