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
        Schema::table('content_questions', function (Blueprint $table) {
            // Default bobot 10 poin per soal
            $table->integer('weight')->default(10)->after('type');
        });
    }

    public function down()
    {
        Schema::table('content_questions', function (Blueprint $table) {
            $table->dropColumn('weight');
        });
    }
};
