<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Provinsi;
use App\Models\Kota;

class LokasiController extends Controller
{
    public function getProvinsi()
    {
        return response()->json(Provinsi::all());
    }

   public function getKotaByProvinsi($provinsi_id)
    {
        return response()->json(Kota::where('provinsi_id', $provinsi_id)->get());
    }
}
