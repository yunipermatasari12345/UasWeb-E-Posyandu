<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('yuni_ibus', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ibu', 100);
            $table->string('nik', 30)->nullable();
            $table->string('alamat', 255)->nullable();
            $table->string('no_hp', 20)->nullable();
            $table->foreignId('posyandu_id')->constrained('yuni_posyandus')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('yuni_ibus');
    }
};
