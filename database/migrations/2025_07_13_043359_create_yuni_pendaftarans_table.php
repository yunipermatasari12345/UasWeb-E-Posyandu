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
        Schema::create('yuni_pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('nama_anak', 100);
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('nama_ibu', 100);
            $table->string('nik_ibu', 30)->nullable();
            $table->string('alamat', 255);
            $table->string('no_hp', 20);
            $table->enum('jenis_pendaftaran', ['balita', 'ibu_hamil']);
            $table->integer('usia_kehamilan')->nullable(); // untuk ibu hamil
            $table->text('catatan')->nullable();
            $table->enum('status', ['pending', 'disetujui', 'ditolak'])->default('pending');
            $table->text('catatan_admin')->nullable(); // feedback dari admin
            $table->foreignId('admin_id')->nullable()->constrained('yuni_admins')->onDelete('set null');
            $table->timestamp('tanggal_validasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yuni_pendaftarans');
    }
};
