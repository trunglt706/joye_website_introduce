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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('group_id')->index()->nullable();
            $table->string('slug')->unique();
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('background')->nullable();
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->enum('status', ['draft', 'active', 'blocked'])->index()->nullable()->default('draft');
            $table->timestamps();
            $table->foreign('group_id')->references('id')->on('blog_groups');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
