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
        Schema::create('roles_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('roles_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('roles_id')->references('id')->on('roles')->nullOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles_user');
    }
};
