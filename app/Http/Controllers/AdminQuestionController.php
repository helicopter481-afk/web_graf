<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContentQuestion;
use Illuminate\Support\Facades\Log;

class AdminQuestionController extends Controller
{
    public function index()
    {
        $questions = ContentQuestion::orderBy('section_code', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        return view('admin.questions.index', compact('questions'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'chapter_code' => 'required',
            'section_code' => 'required',
            'type' => 'required',
            'question_text' => 'required',
            'correct_answer' => 'required',
            'weight' => 'required|numeric|min:1|max:100'
        ]);

        // ========================================
        // 🔧 PERBAIKAN 1: Decode Options Konsisten
        // ========================================
        $options = $this->decodeJsonSafe($request->options);
        
        // ========================================
        // 🔧 PERBAIKAN 2: Decode Correct Answer
        // ========================================
        $correctAnswer = $this->decodeJsonSafe($request->correct_answer);

        ContentQuestion::create([
            'chapter_code' => $request->chapter_code,
            'section_code' => $request->section_code,
            'type' => $request->type,
            'question_text' => $request->question_text,
            'options' => $options,
            'correct_answer' => $correctAnswer, // ✅ Sekarang konsisten
            'explanation' => $request->explanation,
            'weight' => floatval($request->weight)
        ]);

        return redirect()->back()->with('success', 'Soal berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $question = ContentQuestion::findOrFail($id);

        $request->validate([
            'section_code' => 'required',
            'weight' => 'required|numeric|min:1|max:100',
            'type' => 'required',
            'question_text' => 'required',
            'correct_answer' => 'required'
        ]);

        // ========================================
        // 🔧 PERBAIKAN 3: Decode Semua Data JSON
        // ========================================
        $options = $this->decodeJsonSafe($request->options);
        $correctAnswer = $this->decodeJsonSafe($request->correct_answer);

        $question->update([
            'section_code' => $request->section_code,
            'weight' => $request->weight,           // ✅ Paling Simpel
            'type' => $request->type,
            'question_text' => $request->question_text,
            'options' => $options,
            'correct_answer' => $correctAnswer,
            'explanation' => $request->explanation,
            'chapter_code' => $request->chapter_code,
        ]);

        return redirect()->back()->with('success', 'Soal berhasil diperbarui!');
    }

    public function destroy($id)
    {
        ContentQuestion::destroy($id);
        return redirect()->back()->with('success', 'Soal berhasil dihapus!');
    }

    // ========================================
    // 🔧 HELPER METHOD: Decode JSON Aman
    // ========================================
    /**
     * Decode JSON string dengan fallback aman
     * 
     * @param mixed $data - Bisa string JSON atau sudah array
     * @return mixed - Array/Object hasil decode, atau data asli
     */
    private function decodeJsonSafe($data)
    {
        // Kalau sudah array/object, return langsung
        if (is_array($data) || is_object($data)) {
            return $data;
        }

        // Kalau null atau kosong
        if (empty($data)) {
            return null;
        }

        // Decode JSON
        if (is_string($data)) {
            $decoded = json_decode($data, true);
            
            // Cek error
            if (json_last_error() === JSON_ERROR_NONE) {
                return $decoded;
            } else {
                Log::warning("JSON decode failed: " . json_last_error_msg(), [
                    'data' => $data
                ]);
                return $data; // Return asli kalau gagal
            }
        }

        return $data;
    }
}