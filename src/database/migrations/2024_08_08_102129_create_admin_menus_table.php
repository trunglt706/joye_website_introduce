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
        Schema::create('admin_menus', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->nullable();
            $table->string('route_name')->nullable();
            $table->string('name');
            $table->string('icon')->nullable();
            $table->integer('numering')->nullable();
            $table->json('active_route_name')->nullable();
            $table->json('roles')->nullable();
            $table->enum('status', ['active', 'blocked'])->default('blocked');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_menus');
    }
};
