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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->string('description')->nullable(true);
            $table->string('status')->default('backlog')->nullable(false);
            $table->string('priority')->default('undefined')->nullable(false);
            $table->dateTime('assigned_at')->nullable(true);
            $table->dateTime('expected_at')->nullable(true);
            $table->dateTime('due_at')->nullable(true);
            $table->dateTime('started_at')->nullable(true);
            $table->dateTime('finished_at')->nullable(true);
            $table->softDeletes('deleted_at', 0)->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};