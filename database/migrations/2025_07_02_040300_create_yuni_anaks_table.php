<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('yuni_anaks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_anak', 100);
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->foreignId('ibu_id')->constrained('yuni_ibus')->onDelete('cascade');
            $table->foreignId('posyandu_id')->constrained('yuni_posyandus')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('yuni_anaks');
    }
};
