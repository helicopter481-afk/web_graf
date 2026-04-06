<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('content_questions', function (Blueprint $table) {
            // Menambahkan foreign key ke tabel users
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete()->after('explanation');
        });
    }

    public function down(): void
    {
        Schema::table('content_questions', function (Blueprint $table) {
            $table->dropForeign(['created_by']);
            $table->dropColumn('created_by');
        });
    }
};