<?php

use Illuminate\Support\Facades\Route;
use App\Models\Kota;

Route::get('/kota/{provinsi_id}', function ($provinsi_id) {
    return Kota::where('provinsi_id', $provinsi_id)->get(['id', 'nama']);
});

Route::get('/api/artikel/search', function(Request $request) {
    $query = $request->input('search', '');
    $artikel = \App\Models\Artikel::query()
        ->where('judul', 'like', "%{$query}%")
        ->orWhere('deskripsi', 'like', "%{$query}%")
        ->paginate(10);
    return response()->json($artikel);
});

use App\Http\Controllers\Api\ArtikelController;


