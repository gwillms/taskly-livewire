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
        Schema::create('tasks_task', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('status_id')->nullable();
            $table->unsignedBigInteger('setor_id')->nullable();
            $table->unsignedBigInteger('filial_id')->nullable();
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->text('chamado');
            $table->json('anexo')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('status_id')->references('id')->on('tasks_status')->onDelete('set null');
            $table->foreign('setor_id')->references('id')->on('tasks_section')->onDelete('set null');
            $table->foreign('filial_id')->references('id')->on('tasks_branch')->onDelete('set null');
            $table->foreign('employee_id')->references('id')->on('tasks_user')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks_task');
    }
};
