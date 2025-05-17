<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Kota;
use App\Models\Provinsi;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Nonaktifkan foreign key check
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Hapus isi tabel
        Kota::truncate();
        Provinsi::truncate();

        // Aktifkan kembali foreign key check
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Jalankan seeder
        $this->call([
            ProvinsiSeeder::class,
            KotaSeeder::class,
        ]);
    }
}
