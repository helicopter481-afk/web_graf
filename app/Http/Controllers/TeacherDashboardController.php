<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Configuration;
use App\Models\StudentProgress;
use Illuminate\Support\Facades\Hash;
use App\Models\EvaluationHistory;
use App\Models\StudentReflection;

class TeacherDashboardController extends Controller
{
    public function index()
    {
        $configKKM = Configuration::where('key', 'kkm')->first();
        $kkm = $configKKM ? (int) $configKKM->value : 75;

        $studentsA1 = User::where('role', 'student')->where('kelas', 'A1')->get();
        $studentsA2 = User::where('role', 'student')->where('kelas', 'A2')->get();

        $dataA1 = $this->formatStudentData($studentsA1);
        $dataA2 = $this->formatStudentData($studentsA2);

        $dbData = [
            'A1' => $dataA1,
            'A2' => $dataA2
        ];

        return view('teacher_dashboard', [
            'dbData' => json_encode($dbData),
            'kkm' => $kkm
        ]);
    }

    private function formatStudentData($students)
    {
        $formatted = [];
        $totalActivities = ['bab1' => 4, 'bab2' => 5, 'bab3' => 4, 'bab4' => 4, 'bab5' => 4];

        foreach ($students as $user) {
            $scoresArray = [0, 0, 0, 0, 0];
            $totalCompletedAll = 0;
            $totalPossibleAll = array_sum($totalActivities);

            $detailScores = [];
            $historyData = [];
            $reflectionDataAll = [];

            for ($i = 1; $i <= 5; $i++) {
                $chapterCode = 'bab' . $i;
                $quizCode = 'quiz' . $i;

                $evalRecord = StudentProgress::where('student_id', $user->id)
                    ->where('chapter_code', $chapterCode)->where('section_code', $quizCode)->first();
                $scoresArray[$i - 1] = $evalRecord ? $evalRecord->score : 0;

                $completedCount = StudentProgress::where('student_id', $user->id)
                    ->where('chapter_code', $chapterCode)->count();
                $totalCompletedAll += $completedCount;

                $progressRaw = StudentProgress::where('student_id', $user->id)
                    ->where('chapter_code', $chapterCode)->get();

                foreach ($progressRaw as $p) {
                    $detailScores[$p->section_code] = [
                        'score' => $p->score,
                        'time' => Carbon::parse($p->updated_at)->setTimezone('Asia/Makassar')->format('d/m/Y H:i'),
                        'answer' => $p->answer
                    ];
                }

                $historyRaw = EvaluationHistory::where('student_id', $user->id)
                    ->where('chapter_code', $chapterCode)
                    ->where('section_code', $quizCode)
                    ->orderBy('created_at', 'desc')->get();

                foreach ($historyRaw as $h) {
                    // MENCEGAH BUG JSON: Cek tipe data karena Laravel mungkin sudah melakukan auto-casting
                    $ansData = $h->answer;
                    if (is_string($ansData)) {
                        $decoded = json_decode($ansData, true);
                        if (json_last_error() === JSON_ERROR_NONE) {
                            $ansData = $decoded;
                        }
                    }

                    $historyData[] = [
                        'chapter_code' => $chapterCode,
                        'section_code' => $quizCode,
                        'score' => $h->score,
                        'answer' => $ansData, // <--- INI KUNCI UTAMANYA
                        'time' => Carbon::parse($h->created_at)->setTimezone('Asia/Makassar')->format('d/m/Y H:i:s')
                    ];
                }

                $reflectionRecord = StudentReflection::where('student_id', $user->id)
                    ->where('chapter_code', $chapterCode)->first();

                if ($reflectionRecord) {
                    $reflectionDataAll[$chapterCode] = $reflectionRecord->answers;
                }
            }

            $progressPercent = ($totalCompletedAll > 0) ? ($totalCompletedAll / $totalPossibleAll) * 100 : 0;
            if ($progressPercent > 100)
                $progressPercent = 100;

            $formatted[] = [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'scores' => $scoresArray,
                'progress' => round($progressPercent),
                'detail_scores' => $detailScores,
                'eval_history' => $historyData,
                'reflections_raw' => $reflectionDataAll,
                'reflection' => isset($reflectionDataAll['bab1']) ? $reflectionDataAll['bab1'] : null
            ];
        }
        return $formatted;
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required', 'email' => 'required|email|unique:users', 'password' => 'required']);
        User::create(['name' => $request->name, 'email' => $request->email, 'password' => Hash::make($request->password), 'role' => 'student', 'kelas' => 'A1']);
        return back()->with('success', 'Siswa berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password'))
            $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('success', 'Data diupdate!');
    }

    public function destroy($id)
    {
        StudentProgress::where('student_id', $id)->delete();
        EvaluationHistory::where('student_id', $id)->delete();
        StudentReflection::where('student_id', $id)->delete();
        User::destroy($id);
        return back()->with('success', 'Siswa dihapus!');
    }

    public function updateKKM(Request $request)
    {
        Configuration::updateOrCreate(['key' => 'kkm'], ['value' => $request->kkm_value]);
        return back();
    }

    public function reviewPraktikum(Request $request)
    {
        $request->validate(['student_id' => 'required', 'chapter_code' => 'required', 'section_code' => 'required', 'score' => 'required|numeric|min:0|max:100']);
        $progress = StudentProgress::where('student_id', $request->student_id)->where('chapter_code', $request->chapter_code)->where('section_code', $request->section_code)->first();

        if ($progress) {
            $answers = json_decode($progress->answer, true);
            while (is_string($answers)) {
                $temp = json_decode($answers, true);
                if (json_last_error() === JSON_ERROR_NONE) {
                    $answers = $temp;
                } else {
                    break;
                }
            }
            if (!is_array($answers)) {
                $answers = [];
            }
            $answers['status'] = 'reviewed';
            $progress->score = $request->score;
            $progress->answer = json_encode($answers);
            $progress->save();
            return response()->json(['success' => true, 'message' => 'Nilai berhasil disimpan']);
        }
        return response()->json(['success' => false, 'message' => 'Data praktikum mahasiswa tidak ditemukan'], 404);
    }
}