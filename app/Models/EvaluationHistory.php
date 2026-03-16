<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluationHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'chapter_code',
        'section_code',
        'score',
        'answer'
    ];

    protected $casts = [
        'answer' => 'array'
    ];
}
