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
        Schema::table('yuni_balitas', function (Blueprint $table) {
            $table->enum('jenis_kelamin', ['L', 'P'])->after('nama_balita');
            $table->string('tempat_lahir', 255)->after('jenis_kelamin');
            $table->decimal('berat_lahir', 5, 2)->after('tanggal_lahir');
            $table->decimal('panjang_lahir', 5, 2)->after('berat_lahir');
            $table->integer('umur')->nullable()->after('panjang_lahir');
            $table->string('no_hp_ortu', 20)->after('nama_ortu');
            $table->text('catatan')->nullable()->after('posyandu_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('yuni_balitas', function (Blueprint $table) {
            $table->dropForeign(['posyandu_id']);
            $table->dropColumn(['jenis_kelamin', 'tempat_lahir', 'berat_lahir', 'panjang_lahir', 'umur', 'no_hp_ortu', 'posyandu_id', 'catatan']);
        });
    }
};
