<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Kolom Role: admin / student (Default student)
            $table->string('role')->default('student')->after('email');

            // Kolom Kelas: A1 / A2 (Boleh null untuk admin)
            $table->string('kelas')->nullable()->after('role');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'kelas']);
        });
    }
};