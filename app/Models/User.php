<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    use HasFactory;

    protected $guarded = ['id']; // Biar aman saat mass assignment

   // 1. RELASI KE TABEL PROGRESS (Perbaikan Class Not Found)
    public function progress()
    {
        // Menggunakan StudentProgress::class dan foreign key 'student_id'
        return $this->hasMany(StudentProgress::class, 'student_id');
    }

    // 2. RELASI KE TABEL REFLECTION (Perbaikan Undefined Relationship)
    public function reflection()
    {
        // Menggunakan StudentReflection::class dan foreign key 'student_id'
        return $this->hasMany(StudentReflection::class, 'student_id');
    }
    // RELASI KE KELAS
    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class, 'class_id');
    }
}