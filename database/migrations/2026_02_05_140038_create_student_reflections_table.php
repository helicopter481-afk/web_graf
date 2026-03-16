<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('student_reflections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('users')->onDelete('cascade');
            $table->string('chapter_code'); // Contoh: 'bab1'
            $table->json('answers');        // Kita simpan 4 jawaban sekaligus dalam format JSON
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('student_reflections');
    }
};