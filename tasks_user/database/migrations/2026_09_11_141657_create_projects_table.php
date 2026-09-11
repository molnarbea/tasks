<?php

use App\Models\Projects;
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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('costs');
            $table->integer('time');
            $table->foreignId('manager_id')->constrained('users');
            $table->timestamps();
        });

        Projects::create([
            'name' => 'Project 1',
            'costs' => 1000,
            'time' => 30,
            'manager_id' => 1,
        ]);

        Projects::create([
            'name' => 'Project 2',
            'costs' => 2000,
            'time' => 60,
            'manager_id' => 2,
        ]);

        Projects::create([
            'name' => 'Project 3',
            'costs' => 3000,
            'time' => 90,
            'manager_id' => 1,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('projects');

        
    }
};
