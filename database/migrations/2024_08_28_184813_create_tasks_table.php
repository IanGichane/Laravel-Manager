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
            $table->uuid('id');
            $table->unsignedBigInteger('user_id');
            // Another way to add a relation between user and task:if a user is deleted the task is also deleted
            //   $table->foreignid('user_id')->constrained()->onDelete('cascade);
            $table->text('title')->nullable();
            $table->text('description')->nullable();
            $table->date('due_date');
            $table->boolean('complete')->default(false);
            $table->boolean('in_progress')->default(false);
            $table->timestamps();

            $table->index('user_id');
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
