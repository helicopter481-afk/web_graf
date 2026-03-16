<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentReflection extends Model
{
    use HasFactory;

    protected $table = 'student_reflections';

    protected $fillable = [
        'student_id',
        'chapter_code',
        'answers' 
    ];

    // --- TAMBAHKAN INI (WAJIB) ---
    // Ini memerintahkan Laravel: 
    // "Kalau simpan ke DB, jadikan JSON. Kalau ambil dari DB, jadikan Array."
    protected $casts = [
        'answers' => 'array',
    ];
}