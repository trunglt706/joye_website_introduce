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
        Schema::create('blog_groups', function (Blueprint $table) {
            $table->id()->index();
            $table->string('slug')->unique();
            $table->string('code')->unique();
            $table->string('name');
            $table->string('image')->nullable();
            $table->integer('numering')->nullable()->default(0);
            $table->enum('status', ['active', 'blocked'])->index()->nullable()->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_groups');
    }
};
