<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('rentals', function (Blueprint $table) {
        $table->id();
        $table->foreignId('car_id')->constrained('cars')->onDelete('cascade');
        $table->boolean('has_driver');
        $table->string('sim_image');
        $table->string('ktp_image');
        $table->string('payment_proof');
        // tambahkan kolom-kolom lain jika diperlukan
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
