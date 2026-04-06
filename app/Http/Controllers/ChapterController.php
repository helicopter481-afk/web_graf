<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ContentQuestion;
use App\Models\StudentProgress;
use App\Models\EvaluationHistory;
use App\Models\StudentReflection;

class ChapterController extends Controller
{
    // ==========================================
    // FUNGSI UTAMA PEMUATAN MODUL (BAB 1 - 4 & EVALUASI)
    // ==========================================
    public function showBab1(Request $request)
    {
        $studentId = Auth::id();
        $activeBab = $request->query('bab', 1);

        $quiz1 = ContentQuestion::where('chapter_code', 'bab1')->where('section_code', 'quiz1')->orderBy('id', 'asc')->get();
        $quiz2 = ContentQuestion::where('chapter_code', 'bab2')->where('section_code', 'quiz2')->orderBy('id', 'asc')->get();
        $quiz3 = ContentQuestion::where('chapter_code', 'bab3')->where('section_code', 'quiz3')->orderBy('id', 'asc')->get();
        $quiz4 = ContentQuestion::whereIn('chapter_code', ['bab4', 'materi4'])->where('section_code', 'quiz4')->orderBy('id', 'asc')->get();
        
        $evaluasi = ContentQuestion::where('chapter_code', 'evaluasi')
            ->where('section_code', 'ujian_akhir')
            ->get()
            ->shuffle(); 
            
        // ---------------------------------------------------
        // MENCARI DURASI KUIS DARI DATABASE
        // ---------------------------------------------------
        $waktuMenit = 10; // Default dasar 10 menit

        if ($activeBab == 1 && $quiz1->isNotEmpty()) {
            $waktuMenit = $quiz1->first()->waktu_menit ?? 10;
        } elseif ($activeBab == 2 && $quiz2->isNotEmpty()) {
            $waktuMenit = $quiz2->first()->waktu_menit ?? 10;
        } elseif ($activeBab == 3 && $quiz3->isNotEmpty()) {
            $waktuMenit = $quiz3->first()->waktu_menit ?? 10;
        } elseif ($activeBab == 4 && $quiz4->isNotEmpty()) {
            $waktuMenit = $quiz4->first()->waktu_menit ?? 10;
        } elseif ($activeBab == 99 && $evaluasi->isNotEmpty()) {
            $waktuMenit = $evaluasi->first()->waktu_menit ?? 40; // Default 40 menit untuk evaluasi
        }

        // 1. Ambil data progress harian (Aktivitas 1.1, Praktikum, dll)
        $progressData = StudentProgress::where('student_id', $studentId)->get()->keyBy('section_code');

        // 2. Ambil data Quiz (Diambil dari Evaluation History terbaru)
        $lastQuiz1 = EvaluationHistory::where('student_id', $studentId)->where('chapter_code', 'bab1')->where('section_code', 'quiz1')->latest()->first();
        if ($lastQuiz1) $progressData->put('quiz1', (object)['score' => $lastQuiz1->score, 'answers' => $lastQuiz1->answer ?? [], 'status' => 'Selesai']);

        $lastQuiz2 = EvaluationHistory::where('student_id', $studentId)->where('chapter_code', 'bab2')->where('section_code', 'quiz2')->latest()->first();
        if ($lastQuiz2) $progressData->put('quiz2', (object)['score' => $lastQuiz2->score, 'answers' => $lastQuiz2->answer ?? [], 'status' => 'Selesai']);

        $lastQuiz3 = EvaluationHistory::where('student_id', $studentId)->where('chapter_code', 'bab3')->where('section_code', 'quiz3')->latest()->first();
        if ($lastQuiz3) $progressData->put('quiz3', (object)['score' => $lastQuiz3->score, 'answers' => $lastQuiz3->answer ?? [], 'status' => 'Selesai']);

        $lastQuiz4 = EvaluationHistory::where('student_id', $studentId)->whereIn('chapter_code', ['bab4', 'materi4'])->where('section_code', 'quiz4')->latest()->first();
        if ($lastQuiz4) $progressData->put('quiz4', (object)['score' => $lastQuiz4->score, 'answers' => $lastQuiz4->answer ?? [], 'status' => 'Selesai']);

        $lastEvaluasi = EvaluationHistory::where('student_id', $studentId)->where('chapter_code', 'evaluasi')->where('section_code', 'ujian_akhir')->latest()->first();
        if ($lastEvaluasi) $progressData->put('ujian_akhir', (object)['score' => $lastEvaluasi->score, 'answers' => $lastEvaluasi->answer ?? [], 'status' => 'Selesai']);

        // 3. PENTING: Ambil data Refleksi dan masukkan ke dalam objek progressData
        $reflections = StudentReflection::where('student_id', $studentId)->get();
        foreach ($reflections as $ref) {
            // Karena nama activity di Dashboard Dosen adalah refleksi1, refleksi2, dst
            $refNumber = str_replace('bab', '', $ref->chapter_code); 
            $progressData->put('refleksi' . $refNumber, (object)['score' => 100, 'answers' => $ref->answers, 'status' => 'Selesai']);
        }

        return view('modules.index', [
            'quiz1'      => $quiz1,
            'quiz2'      => $quiz2, 
            'quiz3'      => $quiz3, 
            'quiz4'      => $quiz4, 
            'evaluasi'   => $evaluasi,      
            'waktuMenit' => $waktuMenit,    
            'progress'   => $progressData
        ])->with('activeBab', $activeBab);
    }


    // ==========================================
    // FUNGSI SUBMIT QUIZ & PRAKTIKUM
    // ==========================================
    public function submitQuiz(Request $request)
    {
        $studentId = Auth::id();
        if (!$studentId) return response()->json(['message' => 'Sesi habis.'], 401);

        $chapterCode = $request->input('chapter_code', 'bab1');
        $sectionCode = $request->input('section_code', 'quiz1');
        
        $rawAnswers = $request->input('answers');
        if (empty($rawAnswers)) {
            $rawAnswers = []; 
        }

        // ===================================================================
        // CEK APAKAH INI SUBMIT PRAKTIKUM
        // ===================================================================
        if (str_contains($sectionCode, 'praktikum')) {
            $rawAnswers = $request->input('answers');
            $answerToSave = is_string($rawAnswers) ? $rawAnswers : json_encode($rawAnswers, JSON_UNESCAPED_SLASHES);

            $currentProgress = StudentProgress::where('student_id', $studentId)
                ->where('chapter_code', $chapterCode)
                ->where('section_code', $sectionCode)
                ->first();

            if ($currentProgress) {
                $currentProgress->answer = $answerToSave; 
                $currentProgress->save();
            } else {
                $newProgress = new StudentProgress();
                $newProgress->student_id = $studentId;
                $newProgress->chapter_code = $chapterCode;
                $newProgress->section_code = $sectionCode;
                $newProgress->score = 1;
                $newProgress->answer = $answerToSave;
                $newProgress->save();
            }

            return response()->json([
                'status' => 'success',
                'score'  => 1,
                'message'=> 'Laporan praktikum tersimpan.'
            ]);
        }
        // ===================================================================

        // JIKA INI KUIS/EVALUASI BIASA:
        if ($chapterCode === 'evaluasi') {
            $questions = ContentQuestion::where('chapter_code', 'evaluasi')->where('section_code', 'ujian_akhir')->get();
        } else {
            $questions = ContentQuestion::where('chapter_code', $chapterCode)->where('section_code', $sectionCode)->get();
        }

        $earnedScore = 0;
        $detailedAnswers = []; // ARRAY BARU UNTUK MENYIMPAN ANALISIS ITEM SOAL

        foreach ($questions as $index => $q) {
            $nomorUrut = $index + 1;
            $keyInput = 'soal_' . $nomorUrut;
            $studentAns = $rawAnswers[$keyInput] ?? null;
            $bobot = $q->weight ?? 10;
            
            $isCorrect = false;
            // Format jawaban user agar rapi saat ditampilkan di tabel Dosen
            $displayAnswer = is_array($studentAns) ? implode(', ', $studentAns) : (string)$studentAns;

            if (is_null($studentAns) || $studentAns === "") {
                // Rekam sebagai tidak dijawab
                $detailedAnswers[] = [
                    'id' => $q->id,
                    'question_text' => strip_tags($q->question_text),
                    'user_answer' => 'Tidak dijawab',
                    'is_correct' => false
                ];
                continue;
            }

            $kunciRaw = $q->correct_answer;
            if (is_null($kunciRaw)) {
                $detailedAnswers[] = [
                    'id' => $q->id,
                    'question_text' => strip_tags($q->question_text),
                    'user_answer' => $displayAnswer,
                    'is_correct' => false
                ];
                continue;
            }
            
            // LOGIKA PENILAIAN BENAR/SALAH
            if ($q->type === 'CHECKBOX') {
                $ansArray = is_array($studentAns) ? $studentAns : [$studentAns];
                $kunciArray = is_array($kunciRaw) ? $kunciRaw : json_decode($kunciRaw, true) ?? explode(',', str_replace(['[',']','"'], '', $kunciRaw));

                $ansArray = array_map(fn($val) => trim(strtoupper($val)), $ansArray);
                $kunciArray = array_map(fn($val) => trim(strtoupper($val)), $kunciArray);
                sort($ansArray); sort($kunciArray);

                if ($ansArray == $kunciArray && count($ansArray) > 0) $isCorrect = true;
            }
            elseif ($q->type === 'LIVE_CODING') {
                $ansStr = trim((string)$studentAns);
                $kunciStr = trim(str_replace(['[', ']', '"', "'"], '', (string)$kunciRaw));
                if (strpos($ansStr, $kunciStr) !== false && !str_contains(strtoupper($ansStr), 'SALAH:')) {
                    $isCorrect = true;
                }
            }
            elseif ($q->type === 'DRAG_AND_DROP') {
                // Validasi dilakukan di Frontend untuk tipe ini, kita terima status dari clientScore
            }
            elseif ($q->type === 'TABLE_DROPDOWN' || $q->type === 'FILL_BLANK_MULTI') {
                $ansArray = is_array($studentAns) ? $studentAns : [$studentAns];
                $kunciArray = is_array($kunciRaw) ? $kunciRaw : json_decode($kunciRaw, true) ?? [];
                
                if (is_array($kunciArray)) {
                    $benarSemua = true;
                    foreach($kunciArray as $i => $k) {
                        $uVal = trim(strtoupper($ansArray[$i] ?? ''));
                        $kOps = array_map('trim', explode('/', strtoupper($k)));
                        if (!in_array($uVal, $kOps) || $uVal === "") {
                            $benarSemua = false;
                        }
                    }
                    if ($benarSemua && count($ansArray) > 0) $isCorrect = true;
                }
            }
            else {
                $ansStr = trim(strtoupper((string)(is_array($studentAns) ? $studentAns[0] : $studentAns)));
                if (is_array($kunciRaw)) {
                    $kOps = array_map(fn($v) => trim(strtoupper((string)$v)), $kunciRaw);
                    if (in_array($ansStr, $kOps)) $isCorrect = true;
                } else {
                    $kOps = array_map('trim', explode('/', strtoupper((string)$kunciRaw)));
                    if (in_array($ansStr, $kOps)) $isCorrect = true;
                }
                if ($ansStr === "") $isCorrect = false;
            }

            // Tambah skor jika benar
            if ($isCorrect) {
                $earnedScore += $bobot;
            }

            // REKAM DATA UNTUK DITAMPILKAN DI MODAL DOSEN
            $detailedAnswers[] = [
                'id' => $q->id,
                'question_text' => strip_tags($q->question_text),
                'user_answer' => $displayAnswer,
                'is_correct' => $isCorrect
            ];
        }

        $clientScore = $request->input('score', 0);
        $finalGrade = ($earnedScore == 0 && $clientScore > 0) ? $clientScore : $earnedScore;
        
        // PENTING: Simpan Array DetailedAnswers menjadi JSON ke database
        $answerToSave = json_encode($detailedAnswers, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

        // MEMAKSA DATA MASUK MENGGUNAKAN DIRECT ASSIGNMENT
        $newHistory = new EvaluationHistory();
        $newHistory->student_id = $studentId;
        $newHistory->chapter_code = $chapterCode;
        $newHistory->section_code = $sectionCode;
        $newHistory->score = $finalGrade;
        $newHistory->answer = $answerToSave; // Disimpan di sini
        $newHistory->save();

        $currentProgress = StudentProgress::where('student_id', $studentId)
            ->where('chapter_code', $chapterCode)
            ->where('section_code', $sectionCode)
            ->first();

        if ($currentProgress) {
            if ($finalGrade >= $currentProgress->score) {
                $currentProgress->score = $finalGrade;
                $currentProgress->answer = $answerToSave; // Disimpan di sini juga
                $currentProgress->save();
            }
        } else {
            $newProg = new StudentProgress();
            $newProg->student_id = $studentId;
            $newProg->chapter_code = $chapterCode;
            $newProg->section_code = $sectionCode;
            $newProg->score = $finalGrade;
            $newProg->answer = $answerToSave;
            $newProg->save();
        }

        return response()->json([
            'status' => 'success',
            'score'  => $finalGrade,
            'message'=> 'Evaluasi berhasil disimpan.'
        ]);
    }


    public function showBab2() { return redirect('/modul?bab=2'); }
    public function showBab3() { return redirect('/modul?bab=3'); }
    public function showBab4() { return redirect('/modul?bab=4'); }
    public function showEvaluasi() { return redirect('/modul?bab=99'); }

    // ==========================================
    // FUNGSI PENYIMPANAN NILAI AKTIVITAS (UNIVERSAL CATCHER)
    // ==========================================
    public function submitScore(Request $request) {
        // Terima berbagai macam format penamaan dari Front-End
        $chapter = $request->input('chapter') ?? $request->input('chapter_code');
        $section = $request->input('section') ?? $request->input('section_code');
        $score = $request->input('score', 0);
        $answer = $request->input('answer') ?? $request->input('answers');
        
        if(!$chapter || !$section) {
            return response()->json(['error' => 'Data tidak lengkap'], 400);
        }
        
        $prog = StudentProgress::where('student_id', Auth::id())
             ->where('chapter_code', $chapter)
             ->where('section_code', $section)->first();
             
        $ansStr = is_string($answer) ? $answer : json_encode($answer);
             
        if($prog) {
            if($score >= $prog->score) {
                $prog->score = $score;
                $prog->answer = $ansStr;
                $prog->save();
            }
        } else {
            $newP = new StudentProgress();
            $newP->student_id = Auth::id();
            $newP->chapter_code = $chapter;
            $newP->section_code = $section;
            $newP->score = $score;
            $newP->answer = $ansStr;
            $newP->save();
        }
        return response()->json(['message' => 'Nilai berhasil disimpan!']);
    }

    // ==========================================
    // FUNGSI PENYIMPANAN REFLEKSI
    // ==========================================
    public function submitReflection(Request $request) {
        $request->validate(['chapter' => 'required', 'answers' => 'required|array']);
        
        $ref = StudentReflection::where('student_id', Auth::id())->where('chapter_code', $request->chapter)->first();
        
        // PENTING: Gunakan json_encode karena tipe data database mungkin string biasa jika tidak dicast
        $jsonAnswers = json_encode($request->answers);

        if($ref) {
            $ref->answers = $jsonAnswers;
            $ref->save();
        } else {
            $newR = new StudentReflection();
            $newR->student_id = Auth::id();
            $newR->chapter_code = $request->chapter;
            $newR->answers = $jsonAnswers;
            $newR->save();
        }
        
        return response()->json([
            'status' => 'success',
            'message' => 'Refleksi disimpan!', 
            'redirect' => route('dashboard')
        ]);
    }
}