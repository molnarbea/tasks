<?php

use App\Models\Task;
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
            $table->string('title');
            $table->text('description')->nullable();
            $table->date('end_date')->nullable();
            $table->boolean('status')->default(false);
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('projects_id')->constrained('projects');
            $table->timestamps();
        });

        Task::create([
            'title' => 'Task 1',
            'description' => 'Description for Task 1',
            'end_date' => now()->addDays(7),
            'status' => false,
            'user_id' => 1,
            'projects_id' => 1,
        ]);

        Task::create([
            'title' => 'Task 2',
            'description' => 'Description for Task 2',
            'end_date' => now()->addDays(14),
            'status' => false,
            'user_id' => 2,
            'projects_id' => 1,
        ]);

        Task::create([
            'title' => 'Task 3',
            'description' => 'Description for Task 3',
            'end_date' => now()->addDays(21),
            'status' => false,
            'user_id' => 1,
            'projects_id' => 2,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
