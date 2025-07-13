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
        Schema::create('yuni_riwayat_penimbangans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('balita_id')->constrained('yuni_balitas')->onDelete('cascade');
            $table->foreignId('admin_id')->constrained('yuni_admins')->onDelete('cascade');
            $table->date('tanggal_penimbangan');
            $table->float('berat_badan');
            $table->float('tinggi_badan');
            $table->float('lingkar_kepala')->nullable();
            $table->enum('status_gizi', ['sangat_kurang', 'kurang', 'baik', 'lebih', 'obesitas'])->nullable();
            $table->text('catatan')->nullable();
            $table->text('saran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yuni_riwayat_penimbangans');
    }
};
