<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_code',
        'weight',
        'type',
        'question_text',
        'options',
        'correct_answer',
        'explanation',
        'chapter_code'
        // Pastikan field untuk gambar (misal 'image' atau 'question_image') ada di sini jika Anda menyimpannya di tabel ini
    ];

    protected $casts = [
        'options' => 'array',
        'correct_answer' => 'array', // ✅ PERBAIKAN: Ubah 'string' jadi 'array'
        'weight' => 'integer'
    ];
}