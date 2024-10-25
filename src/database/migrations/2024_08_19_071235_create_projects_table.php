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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('link')->nullable();
            $table->string('description')->nullable();
            $table->text('content')->nullable();
            $table->enum('status', ['active', 'blocked'])->index()->nullable()->default('active');
            $table->boolean('project')->nullable()->default(1);
            $table->boolean('customer')->nullable()->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
