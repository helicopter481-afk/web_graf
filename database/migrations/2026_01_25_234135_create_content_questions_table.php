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
        Schema::create('content_questions', function (Blueprint $table) {
            $table->id();
            $table->string('chapter_code'); // Contoh: 'bab1'
            $table->string('section_code'); // Contoh: '1.1' atau 'evaluasi'
            $table->string('type');         // 'multiple_choice', 'boolean', 'fill_blank'
            $table->text('question_text');  // Pertanyaannya
            $table->json('options')->nullable(); // Opsi A,B,C,D (Bisa null kalau isian)
            $table->string('correct_answer'); // Kunci jawaban
            $table->text('explanation')->nullable(); // Penjelasan kalau benar
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content_questions');
    }
};
