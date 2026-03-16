<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('student_progress', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id'); // Nanti ini relasi ke User
            $table->string('chapter_code'); // Contoh: 'bab1'
            $table->string('section_code'); // Contoh: 'evaluasi'
            $table->integer('score');       // Nilai 0-100
            $table->timestamps();

            // Agar 1 siswa cuma punya 1 nilai per section (kalau ngerjain lagi, nilai diupdate)
            $table->unique(['student_id', 'chapter_code', 'section_code']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_progress');
    }
};
