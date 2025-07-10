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
        Schema::table('yuni_posyandus', function (Blueprint $table) {
            $table->string('no_hp', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('nama_ketua', 100)->nullable();
            $table->string('no_hp_ketua', 20)->nullable();
            $table->text('deskripsi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('yuni_posyandus', function (Blueprint $table) {
            $table->dropColumn(['no_hp', 'email', 'nama_ketua', 'no_hp_ketua', 'deskripsi']);
        });
    }
};
