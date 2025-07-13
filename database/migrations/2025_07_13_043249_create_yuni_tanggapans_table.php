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
        Schema::create('yuni_tanggapans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengaduan_id')->constrained('yuni_pengaduans')->onDelete('cascade');
            $table->foreignId('admin_id')->constrained('yuni_admins')->onDelete('cascade');
            $table->text('isi_tanggapan');
            $table->enum('status_tanggapan', ['dibaca', 'diproses', 'selesai'])->default('dibaca');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yuni_tanggapans');
    }
};
