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
        Schema::table('yuni_kaders', function (Blueprint $table) {
            $table->enum('jenis_kelamin', ['L', 'P'])->after('nama_kader');
            $table->string('tempat_lahir', 255)->after('jenis_kelamin');
            $table->date('tanggal_lahir')->after('tempat_lahir');
            $table->text('alamat')->after('tanggal_lahir');
            $table->string('email', 255)->nullable()->after('no_hp');
            $table->string('pendidikan', 100)->after('email');
            $table->string('pekerjaan', 255)->after('pendidikan');
            $table->date('tanggal_bergabung')->after('posyandu_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('yuni_kaders', function (Blueprint $table) {
            $table->dropColumn(['jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'email', 'pendidikan', 'pekerjaan', 'tanggal_bergabung']);
        });
    }
};
