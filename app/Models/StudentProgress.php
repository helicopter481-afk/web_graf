<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentProgress extends Model
{
    protected $table = 'student_progress';

    protected $guarded = [];

    protected $casts = [
        'answer' => 'array', // 🔥 WAJIB supaya JSON otomatis jadi array
    ];
}
