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
            $table->unsignedBigInteger('diagonose_id')->nullable();
            $table->unsignedBigInteger('patient_id')->nullable();
            $table->foreign('diagonose_id')->references('id')->on('diagonoses')->nullOnDelete();
            $table->foreign('patient_id')->references('id')->on('patients')->nullOnDelete();
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
