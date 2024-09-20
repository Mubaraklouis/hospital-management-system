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
        Schema::create('diagonose_patient', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('diagonose_id');
            $table->unsignedBigInteger('patient_id');
            $table->foreign('diagonose_id')->references('id')->on('diagonoses');
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diagonose_patient');
    }
};
