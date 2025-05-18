<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Provinsi;
use App\Models\Kota;
use Illuminate\Support\Str;
class ArtikelController extends Controller
{
    public function __construct()
    {
        // Middleware hanya untuk method yang butuh admin
        $this->middleware('auth')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }
    public function index(Request $request)
{
    $search = $request->query('search');

    $query = Artikel::query();

    if ($search) {
        $query->where('judul', 'like', '%' . $search . '%');
        // Jika ingin juga cari di deskripsi dan lokasi, bisa tambahkan orWhere seperti ini:
        // $query->where(function($q) use ($search) {
        //     $q->where('judul', 'like', '%' . $search . '%')
        //       ->orWhere('deskripsi', 'like', '%' . $search . '%')
        //       ->orWhere('lokasi', 'like', '%' . $search . '%');
        // });
    }

    $artikel = $query->latest()->paginate(5);

    // appends harus dipanggil dari objek paginator, dan jangan assign ulang variabel $artikel
    $artikel->appends($request->only('search'));

    $provinsi = Provinsi::all();
    $kota = Kota::all();

    if (Auth::check() && Auth::user()->username === 'fahdganteng') {
        return view('admin.adminartikel', compact('artikel', 'provinsi', 'kota'));
    }

    return view('artikelkegiatan', compact('artikel'));
}


    public function create()
    {
        $provinsi = Provinsi::all();
        $kota = Kota::all();
        return view('admin.artikel.create', compact('provinsi', 'kota'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'image_path' => 'required|string',
            'lokasi' => 'required|string',
            'provinsi_id' => 'required|exists:provinsi,id',
            'kota_id' => 'required|exists:kota,id',
        ]);

        $base64Image = $request->input('image_path');

// Pastikan format base64 valid
if (preg_match('/^data:image\/(\w+);base64,/', $base64Image, $type)) {
    $image = substr($base64Image, strpos($base64Image, ',') + 1);
    $image = str_replace(' ', '+', $image);
    $extension = strtolower($type[1]); // jpeg, png, jpg

    if (!in_array($extension, ['jpg', 'jpeg', 'png'])) {
        return back()->withErrors(['image_path' => 'Format gambar tidak didukung.']);
    }

    $imageName = 'artikel/' . Str::random(10) . '.' . $extension;
    Storage::disk('public')->put($imageName, base64_decode($image));
} else {
    return back()->withErrors(['image_path' => 'Gambar tidak valid.']);
}

        Artikel::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'image_path' => $imageName,
            'lokasi' => $request->lokasi,
            'provinsi_id' => $request->provinsi_id,
            'kota_id' => $request->kota_id,
        ]);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        $provinsi = Provinsi::all();
    $kota = Kota::where('provinsi_id', $artikel->provinsi_id)->get();
        return view('admin.editartikel', compact('artikel', 'provinsi', 'kota'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
        'judul' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'provinsi_id' => 'required|exists:provinsi,id',
        'kota_id' => 'required|exists:kota,id',
        'image_path' => 'nullable|image|max:2048',
        'lokasi' => 'required|string',
        ]);

        $artikel = Artikel::findOrFail($id);

        $artikel->judul = $request->judul;
        $artikel->deskripsi = $request->deskripsi;
        $artikel->provinsi_id = $request->provinsi_id;
        $artikel->kota_id = $request->kota_id;
        $artikel->lokasi = $request->lokasi;

        if ($request->hasFile('image_path')) {
        // Hapus gambar lama jika ada
        if ($artikel->image_path && Storage::exists($artikel->image_path)) {
            Storage::delete($artikel->image_path);
        }
        $path = $request->file('image_path')->store('artikel', 'public');
        $artikel->image_path = $path;
    }

    $artikel->save();

    return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil diupdate');
}

    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);
        $artikel->delete();

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil dihapus.');
    }
}
