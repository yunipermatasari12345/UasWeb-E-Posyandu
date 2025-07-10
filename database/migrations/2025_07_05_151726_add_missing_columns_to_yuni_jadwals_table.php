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
        Schema::table('yuni_jadwals', function (Blueprint $table) {
            $table->string('jenis_kegiatan', 100)->after('kegiatan');
            $table->text('deskripsi')->nullable()->after('jam');
            $table->string('target_peserta', 255)->nullable()->after('deskripsi');
            $table->string('penanggung_jawab', 255)->nullable()->after('target_peserta');
            $table->enum('status', ['Direncanakan', 'Berlangsung', 'Selesai', 'Dibatalkan'])->default('Direncanakan')->after('penanggung_jawab');
            $table->text('catatan')->nullable()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('yuni_jadwals', function (Blueprint $table) {
            $table->dropColumn(['jenis_kegiatan', 'deskripsi', 'target_peserta', 'penanggung_jawab', 'status', 'catatan']);
        });
    }
};
