<?php

use App\Models\Project;
use App\Models\User;
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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();

            $table->string('name')->unique();
            $table->string('path');

            $table->foreignIdFor(Project::class)
                ->constrained('projects')->onDelete('cascade');

            $table->foreignIdFor(User::class, 'author_id')
                ->constrained('users')->onDelete('cascade');

            $table->timestamps();

            $table->foreignIdFor(User::class, 'updater_id')
                ->constrained('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
