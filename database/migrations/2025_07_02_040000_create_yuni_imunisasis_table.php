<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('yuni_imunisasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_imunisasi', 100);
            $table->text('deskripsi')->nullable();
            $table->date('tanggal');
            $table->foreignId('posyandu_id')->constrained('yuni_posyandus')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('yuni_imunisasis');
    }
};
