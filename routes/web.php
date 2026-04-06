<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\TeacherDashboardController;
use App\Http\Controllers\AdminQuestionController;
use App\Http\Controllers\DashboardController;
use App\Models\StudentProgress;
use App\Models\EvaluationHistory;

/*
|--------------------------------------------------------------------------
| 1. RUTE UTAMA (LANDING PAGE)
|--------------------------------------------------------------------------
| Ini adalah halaman pertama kali saat user membuka website.
| Diakses oleh semua orang (Guest maupun User Login).
*/
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return view('landing');
})->name('landing');

// Rute Halaman Statis Publik
Route::get('/materi', function () { return view('materi'); })->name('materi.public');
Route::get('/petunjuk', function () { return view('petunjuk'); })->name('petunjuk.public');
Route::get('/tentang', function () { return view('tentang'); })->name('tentang.public');

/*
|--------------------------------------------------------------------------
| 2. GUEST ROUTES (Hanya untuk yang BELUM LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {

    // Login
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');

    // Register
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');

    // Lupa Sandi
    Route::get('/lupa-sandi', function () {
        return view('auth.lupasandi');
    })->name('lupasandi');

});


/*
|--------------------------------------------------------------------------
| 3. AUTHENTICATED ROUTES (Harus LOGIN dulu)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // --- FITUR UMUM ---
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // ✅ DASHBOARD UTAMA
    Route::get('/beranda', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/hasil-nilai', [DashboardController::class, 'hasilNilai'])->name('hasil.nilai');
    Route::put('/profile/update', [DashboardController::class, 'updateProfile'])->name('profile.update');

    // --- AREA SISWA (MATERI & MODUL) ---
    Route::get('/bab1', [ChapterController::class, 'showBab1'])->name('bab1');
    Route::get('/bab2', [ChapterController::class, 'showBab2'])->name('bab2');
    Route::get('/bab3', [ChapterController::class, 'showBab3'])->name('bab3');
    Route::get('/bab4', [ChapterController::class, 'showBab4'])->name('bab4');
    // Route::get('/bab5', [ChapterController::class, 'showBab5'])->name('bab5');
    // Route::get('/bab6', [ChapterController::class, 'showBab6'])->name('bab6');
    Route::get('/evaluasi-akhir', [ChapterController::class, 'showEvaluasi'])->name('evaluasi');

    Route::get('/modul', [ChapterController::class, 'showBab1'])->name('modules.index');

    // Submit Data
    Route::post('/submit-score', [ChapterController::class, 'submitScore'])->name('submit.score');
    Route::post('/submit-reflection', [ChapterController::class, 'submitReflection'])->name('submit.reflection');
    

    // ✅✅✅ INI ROUTE BARU YANG HARUS DITAMBAHKAN ✅✅✅
    Route::post('/submit-quiz', [ChapterController::class, 'submitQuiz'])->name('submit.quiz');

    // Fitur Tambahan
    Route::get('/jalankan-kode', fn() => view('run_code'))->name('run.code');


    // --- AREA ADMIN (GURU) ---
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [TeacherDashboardController::class, 'index'])->name('dashboard');
        Route::post('/student', [TeacherDashboardController::class, 'store'])->name('student.store');
        Route::put('/student/{id}', [TeacherDashboardController::class, 'update'])->name('student.update');
        Route::delete('/student/{id}', [TeacherDashboardController::class, 'destroy'])->name('student.destroy');
        Route::post('/kkm', [TeacherDashboardController::class, 'updateKKM'])->name('kkm.update');
        
        // ✅ ROUTE UNTUK UPDATE WAKTU KUIS MASSAL (Penting: Harus diletakkan di atas resource 'questions')
        Route::post('/questions/update-time', [AdminQuestionController::class, 'updateTime'])->name('questions.update_time');
        
        Route::resource('questions', AdminQuestionController::class);
        
        // ✅ INI YANG BENAR:
        Route::post('/review-praktikum', [TeacherDashboardController::class, 'reviewPraktikum'])->name('review.praktikum');
    });

});

Route::get('/cek-debug', function () {
    $user = Auth::user(); // User yang sedang login

    return [
        '1. INFO USER LOGIN' => $user,
        '2. HISTORY EVALUASI (Semua Data)' => EvaluationHistory::latest()->get(),
        '3. PROGRESS UTAMA' => StudentProgress::all(),
    ];
});