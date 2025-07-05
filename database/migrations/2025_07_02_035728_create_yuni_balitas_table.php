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
         Schema::create('yuni_balitas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_balita', 100);
            $table->date('tanggal_lahir');
            $table->string('nama_ortu', 100);
            $table->string('alamat', 255)->nullable();
            $table->foreignId('posyandu_id')->constrained('yuni_posyandus')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yuni_balitas');
    }
};
