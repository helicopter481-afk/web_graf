<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\StudentProgress;
use App\Models\EvaluationHistory; 
use App\Models\StudentReflection;
use App\Models\Configuration;
use Illuminate\Support\Facades\Storage; 

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Ambil KKM dari DB atau Default 75
        $kkmConfig = Configuration::where('key', 'kkm')->first();
        $kkm = $kkmConfig ? (int) $kkmConfig->value : 75;

        // ====================================================
        // LOGIK 1: ADMIN / DOSEN
        // ====================================================
        if ($user->role === 'admin') {
            // Ambil semua siswa dengan relasi progress dan reflection
            // Tambahkan relasi history (jika Anda memiliki tabel evaluation_histories)
            $students = User::where('role', 'student')
                ->with(['progress', 'reflection'])
                ->get();

            // Kita juga akan menarik EvaluationHistory secara manual jika relasinya belum didefinisikan di Model User
            $allHistories = EvaluationHistory::all()->groupBy('student_id');

            $dbData = [];

            foreach ($students as $student) {
                // 1. Setup Default Nilai: [Bab1, Bab2, Bab3, Bab4, Evaluasi]
                $scores = [0, 0, 0, 0, 0];
                $detailScores = [];
                $evalHistory = [];

                // 2. Mapping Nilai dari Table Progress
                foreach ($student->progress as $p) {
                    // Mapping Array Skor Utama (Untuk Baris Tabel Admin)
                    if ($p->section_code == 'quiz1')
                        $scores[0] = $p->score;
                    if ($p->section_code == 'quiz2')
                        $scores[1] = $p->score;
                    if ($p->section_code == 'quiz3')
                        $scores[2] = $p->score;
                    if ($p->section_code == 'quiz4')
                        $scores[3] = $p->score; // BARU: Bab 4
                    if ($p->section_code == 'ujian_akhir')
                        $scores[4] = $p->score; // BARU: Evaluasi Akhir

                    // Mapping Detail Skor (Untuk Modal Detail)
                    $detailScores[$p->section_code] = [
                        'score' => $p->score,
                        'time' => $p->updated_at->format('d/m/Y H:i'),
                    ];
                }

                // Mengambil History Uji Coba dari tabel evaluation_histories
                $studentHistories = $allHistories->get($student->id);
                if ($studentHistories) {
                    foreach ($studentHistories as $h) {
                        $evalHistory[] = [
                            'chapter_code' => $h->chapter_code,
                            'section_code' => $h->section_code,
                            'score' => $h->score,
                            'time' => $h->created_at->format('d M H:i')
                        ];
                    }
                }

                // 3. Mapping Refleksi (Menggunakan tabel student_reflections)
                $reflectionData = [];
                $reflectionsRaw = []; // Untuk mengakomodasi lebih dari 1 bab

                // Cek jika siswa memiliki data refleksi (Asumsi model memiliki relasi hasMany atau get semua untuk siswa ini)
                $studentReflections = StudentReflection::where('student_id', $student->id)->get();

                foreach ($studentReflections as $ref) {
                    // Decode jawaban JSON
                    $ans = is_string($ref->answers) ? json_decode($ref->answers, true) : $ref->answers;
                    $reflectionsRaw[$ref->chapter_code] = $ans;
                }

                // Fallback untuk backward compatibility (jika dulu hanya bab 1)
                if (isset($reflectionsRaw['bab1'])) {
                    $reflectionData = [
                        'q1' => $reflectionsRaw['bab1']['q1'] ?? '-',
                        'q2' => $reflectionsRaw['bab1']['q2'] ?? '-',
                        'q3' => $reflectionsRaw['bab1']['q3'] ?? '-',
                        'q4' => $reflectionsRaw['bab1']['q4'] ?? '-',
                    ];
                }

                // 4. Hitung Progress Total Siswa (Berdasarkan jumlah aktivitas yang diselesaikan)
                // Total poin maksimal adalah 5 aktivitas utama (Quiz 1-4 & Evaluasi) * 100 = 500
                $totalPoints = array_sum($scores);
                $filledItems = count(array_filter($scores, fn($s) => $s > 0));
                // Kalkulasi kasar progress (Anda bisa sesuaikan bobotnya nanti)
                $progressPercent = $filledItems > 0 ? round(($filledItems / 5) * 100) : 0;

                // 5. Susun Struktur Data Siswa
                $studentObj = [
                    'id' => $student->id,
                    'name' => $student->name,
                    'email' => $student->email,
                    'progress' => $progressPercent,
                    'scores' => $scores,
                    'detail_scores' => $detailScores,
                    'eval_history' => $evalHistory,
                    'reflection' => $reflectionData, // Lama
                    'reflections_raw' => $reflectionsRaw // Baru (mendukung banyak bab)
                ];

                // 6. Masukkan ke Kelas yang sesuai secara DINAMIS
                $kelas = $student->kelas ?? 'Tanpa Kelas';

                // Jika array untuk kelas ini belum ada, buatkan rumahnya
                if (!isset($dbData[$kelas])) {
                    $dbData[$kelas] = [];
                }

                // Masukkan siswa ke dalam rumah kelasnya
                $dbData[$kelas][] = $studentObj;
            }

            // Return ke View Admin
            return view('teacher_dashboard', [
                'dbData' => json_encode($dbData),
                'kkm' => $kkm
            ]);
        }


        // ====================================================
        // LOGIK 2: MAHASISWA (Dashboard Mahasiswa)
        // ====================================================

        $roleLabel = 'Mahasiswa';

        // Hitung Progress Belajar: Menghitung berapa quiz yang nilainya di atas KKM
        $completedModules = StudentProgress::where('student_id', $user->id)
            ->whereIn('section_code', ['quiz1', 'quiz2', 'quiz3', 'quiz4', 'ujian_akhir']) // BARU: Tambah quiz4 & ujian
            ->where('score', '>=', $kkm)
            ->count();

        $totalModules = 5; // Bab 1, 2, 3, 4, Evaluasi
        $progressPercent = ($totalModules > 0) ? round(($completedModules / $totalModules) * 100) : 0;

        // Data Modul
        $modules = [
            [
                'id' => 1,
                'title' => 'Dasar-Dasar Graf',
                'desc' => 'Konsep dasar dan terminologi graf',
                'route' => 'bab1', // Akan memanggil route modul?bab=1
            ],
            [
                'id' => 2,
                'title' => 'Representasi Graf',
                'desc' => 'Directed dan undirected graph',
                'route' => 'bab2', // Akan memanggil route modul?bab=2
            ],
            [
                'id' => 3,
                'title' => 'Penelusuran Graf',
                'desc' => 'Algoritma BFS dan DFS',
                'route' => 'bab3', // Akan memanggil route modul?bab=3
            ],
            [
                'id' => 4,
                'title' => 'Pencarian Jalur Terpendek',
                'desc' => 'Weighted graph dan algoritma Dijkstra',
                'route' => 'bab4', // Akan memanggil route modul?bab=4
            ],
            [
                'id' => 99,
                'title' => 'Evaluasi Akhir',
                'desc' => 'Pengujian Pemahaman Semua Materi',
                'route' => '99', // Ini akan mengarah ke /modul?bab=99
            ],
        ];

        return view('dashboard_empty', compact('user', 'roleLabel', 'progressPercent', 'completedModules', 'modules'));
    }
    // ===============================================
    // FUNGSI BARU: HALAMAN HASIL & NILAI SISWA
    // ===============================================
    public function hasilNilai()
    {
        $user = Auth::user();
        
        // 1. Ambil seluruh data progress siswa (Aktivitas biasa)
        $progress = StudentProgress::where('student_id', $user->id)->get()->groupBy('chapter_code');
        
        // 2. Ambil seluruh data evaluasi tertinggi siswa (Quiz/Ujian)
        // Kita ambil nilai tertinggi saja untuk ditampilkan di rekap
        $evaluations = EvaluationHistory::where('student_id', $user->id)
            ->selectRaw('chapter_code, section_code, MAX(score) as max_score')
            ->groupBy('chapter_code', 'section_code')
            ->get()
            ->groupBy('chapter_code');

        // 3. Hitung Statistik Singkat
        $totalAktivitas = StudentProgress::where('student_id', $user->id)->where('score', '>', 0)->count();
        $rataRataKuis = EvaluationHistory::where('student_id', $user->id)
            ->where('section_code', 'LIKE', 'quiz%')
            ->avg('score') ?? 0;

        return view('modules.hasil_nilai', compact('user', 'progress', 'evaluations', 'totalAktivitas', 'rataRataKuis'));
    }
    // ==================================================
    // FUNGSI UPDATE PROFIL SISWA (NAMA & FOTO OPSIONAL)
    // ==================================================
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // 1. Validasi: Nama wajib, Foto opsional
        $request->validate([
            'name'   => 'required|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'name.required'   => 'Nama lengkap tidak boleh kosong.',
            'avatar.image'    => 'File yang dipilih harus berupa gambar.',
            'avatar.mimes'    => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'avatar.max'      => 'Ukuran gambar maksimal adalah 2MB.',
        ]);

        // 2. Simpan update nama
        $user->name = $request->name;

        // 3. Simpan update foto (Jika user memilih file foto baru)
        if ($request->hasFile('avatar')) {
            // Hapus foto lama agar server tidak penuh
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }

            // Upload foto baru
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $path;
        }

        // 4. Eksekusi simpan ke database
        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }
}


