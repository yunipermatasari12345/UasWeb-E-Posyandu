<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('yuni_beritas')->insert([
            [
                'judul' => 'Posyandu Melati Gelar Imunisasi Gratis',
                'slug' => Str::slug('Posyandu Melati Gelar Imunisasi Gratis'),
                'kategori' => 'Kesehatan',
                'ringkasan' => 'Imunisasi gratis untuk balita di Posyandu Melati.',
                'konten' => 'Posyandu Melati mengadakan imunisasi gratis untuk balita di wilayah Bandung Wetan. Kegiatan ini diikuti oleh puluhan balita dan didukung penuh oleh kader serta tenaga kesehatan.',
                'penulis' => 'Admin',
                'status' => 'published',
                'gambar' => null,
                'tags' => 'imunisasi,balita',
                'meta_description' => 'Imunisasi gratis di Posyandu Melati',
                'created_at' => Carbon::now()->subDays(2),
                'updated_at' => Carbon::now()->subDays(2),
            ],
            [
                'judul' => 'Penyuluhan Gizi untuk Ibu Hamil',
                'slug' => Str::slug('Penyuluhan Gizi untuk Ibu Hamil'),
                'kategori' => 'Penyuluhan',
                'ringkasan' => 'Penyuluhan gizi bagi ibu hamil di Posyandu Melati.',
                'konten' => 'Kegiatan penyuluhan gizi bagi ibu hamil diadakan di Posyandu Melati. Narasumber dari Puskesmas memberikan edukasi pentingnya asupan gizi seimbang.',
                'penulis' => 'Kader Siti',
                'status' => 'published',
                'gambar' => null,
                'tags' => 'gizi,ibu hamil',
                'meta_description' => 'Penyuluhan gizi untuk ibu hamil',
                'created_at' => Carbon::now()->subDay(),
                'updated_at' => Carbon::now()->subDay(),
            ],
        ]);
    }
}
