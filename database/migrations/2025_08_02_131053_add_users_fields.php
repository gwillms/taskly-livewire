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
            $table->unsignedBigInteger('setor_id')->nullable()->after('nome');
            $table->unsignedBigInteger('filial_id')->nullable()->after('setor_id');

            $table->foreign('setor_id')->references('id')->on('tasks_section')->onDelete('set null');
            $table->foreign('filial_id')->references('id')->on('tasks_branch')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks_user', function (Blueprint $table) {
            $table->dropForeign(['setor_id']);
            $table->dropForeign(['filial_id']);

            $table->dropColumn(['setor_id', 'filial_id']);
        });
    }
};
