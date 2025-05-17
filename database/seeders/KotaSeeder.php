<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kota;
use App\Models\Provinsi;

class KotaSeeder extends Seeder
{
    public function run()
    {
    
        $data = [
        'Aceh' => ['Banda Aceh', 'Lhokseumawe'],
        'Sumatera Utara' => ['Medan', 'Binjai'],
        'Jawa Barat' => ['Bandung', 'Bogor', 'Bekasi'],
        'DKI Jakarta' => ['Jakarta Barat', 'Jakarta Selatan', 'Jakarta Timur', 'Jakarta Utara', 'Jakarta Pusat'],
        'Jawa Tengah' => ['Semarang', 'Solo', 'Magelang'],
        'Jawa Timur' => ['Surabaya', 'Malang', 'Kediri'],
        'Bali' => ['Denpasar', 'Singaraja'],
        'Kalimantan Timur' => ['Balikpapan', 'Samarinda'],
        'Sulawesi Selatan' => ['Makassar', 'Parepare'],
        'Papua' => ['Jayapura', 'Wamena']
        ];

        foreach ($data as $provinsi => $kotas) {
            $prov = Provinsi::where('nama', $provinsi)->first();
            foreach ($kotas as $kota) {
                Kota::create([
                    'provinsi_id' => $prov->id,
                    'nama' => $kota
                ]);
            }
        }
    }
}

