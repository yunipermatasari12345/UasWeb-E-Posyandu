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
        Schema::create('yuni_kaders', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kader', 100);
            $table->string('no_hp', 20)->nullable();
            // relasi ke posyandu
            $table->foreignId('posyandu_id')
                  ->constrained('yuni_posyandus')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yuni_kaders');
    }
};
