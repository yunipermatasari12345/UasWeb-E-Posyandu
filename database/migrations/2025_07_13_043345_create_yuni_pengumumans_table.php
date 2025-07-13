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
        Schema::create('yuni_pengumumans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->constrained('yuni_admins')->onDelete('cascade');
            $table->string('judul', 200);
            $table->text('isi_pengumuman');
            $table->enum('kategori', ['jadwal', 'imunisasi', 'penyuluhan', 'umum']);
            $table->enum('prioritas', ['biasa', 'penting', 'urgent'])->default('biasa');
            $table->date('tanggal_berlaku')->nullable();
            $table->boolean('is_aktif')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yuni_pengumumans');
    }
};
