<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tasks_user', function (Blueprint $table) {
            $table->unsignedBigInteger('filial_id')->nullable()->after('active');
            $table->unsignedBigInteger('setor_id')->nullable()->after('filial_id');

            $table->foreign('filial_id')->references('id')->on('tasks_branch')->onDelete('set null');
            $table->foreign('setor_id')->references('id')->on('tasks_section')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('tasks_user', function (Blueprint $table) {
            $table->dropForeign(['filial_id']);
            $table->dropForeign(['setor_id']);
            $table->dropColumn(['filial_id', 'setor_id']);
        });
    }
};
