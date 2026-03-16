<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Bab1Seeder extends Seeder
{
    public function run()
    {
        $data = [
            // MISI 1 (Radio / True False)
            [
                'chapter_id' => 1, 'section' => 'evaluasi_bab1', 'type' => 'radio',
                'question_text' => 'Pernyataan: "Dalam struktur data graf, panjang garis (sisi) yang digambarkan di layar komputer SELALU mewakili jarak fisik yang sebenarnya."',
                'options' => json_encode(['Benar' => 'Benar', 'Salah' => 'Salah']),
                'correct_answer' => 'Salah',
                'explanation' => 'Graf adalah abstraksi logika. Panjang garis visual seringkali tidak relevan.'
            ],
            // MISI 2 (Isian Khusus)
            [
                'chapter_id' => 1, 'section' => 'evaluasi_bab1', 'type' => 'fill_blank_complex',
                'question_text' => 'Lengkapi kode: edges = ___"Jakarta", "Bandung"___',
                'options' => null,
                'correct_answer' => 'tuple',
                'explanation' => 'Sisi disimpan sebagai Tuple () karena bersifat immutable.'
            ],
            // MISI 3 (Isian Angka)
            [
                'chapter_id' => 1, 'section' => 'evaluasi_bab1', 'type' => 'text',
                'question_text' => 'Berapakah nilai Derajat (Degree) dari simpul Budi? (Budi berteman dengan Ali, Citra, Deni, Eka)',
                'options' => null,
                'correct_answer' => '4',
                'explanation' => 'Derajat adalah jumlah koneksi. Budi punya 4 teman.'
            ],
            // MISI 4 (Checkbox)
            [
                'chapter_id' => 1, 'section' => 'evaluasi_bab1', 'type' => 'checkbox',
                'question_text' => 'Manakah yang LAYAK dijadikan Simpul (Vertex)?',
                'options' => json_encode([
                    'akun' => 'Akun Pembeli', 'harga' => 'Harga Barang', 
                    'toko' => 'Toko Penjual', 'tanggal' => 'Tanggal', 'produk' => 'Produk'
                ]),
                'correct_answer' => json_encode(['akun', 'toko', 'produk']),
                'explanation' => 'Harga dan Tanggal adalah atribut, bukan entitas.'
            ],
            // MISI 5 (Pilihan Ganda)
            [
                'chapter_id' => 1, 'section' => 'evaluasi_bab1', 'type' => 'radio',
                'question_text' => 'Jika tidak ada garis langsung Rumah ke Kampus, bagaimana komputer mencatat rute?',
                'options' => json_encode([
                    'A' => 'Membuat garis lurus baru',
                    'B' => 'Menyatakan rute mustahil',
                    'C' => 'Mencatat urutan: Rumah -> Pasar -> Kampus',
                    'D' => 'Menghapus Pasar'
                ]),
                'correct_answer' => 'C',
                'explanation' => 'Graf menelusuri sisi antar-simpul perantara.'
            ],
        ];
        
        DB::table('questions')->insert($data);
        $this->call(ContentQuestionSeeder::class);
    }
}