<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galery;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function __construct()
    {
        // Middleware hanya untuk method yang butuh admin
        $this->middleware('auth')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }
      public function index()
    {
//         if (session('username') !== 'fahdganteng') {
//     abort(403, 'Hanya uncle sam yang boleh mengakses halaman ini.');
// }
        $galeri = Galery::latest()->get();
        $galeri = Galery::all();
        if (Auth::check() && Auth::user()->username === 'fahdganteng'){ 
            return view('admin.admingaleri', compact('galeri'));
        }
       
        return view('galerikegiatan', compact('galeri'));

    }

    public function create()
    {
        
        return view('admin.galeri.create');
    }

   public function store(Request $request)
{
    $request->validate([
        'judul' => 'required',
        'image_base64' => 'required|string',
    ]);

    $imageData = $request->input('image_base64');

    // Extract base64 string tanpa prefix "data:image/jpeg;base64,"
    if (preg_match('/^data:image\/(\w+);base64,/', $imageData, $type)) {
        $imageData = substr($imageData, strpos($imageData, ',') + 1);
        $type = strtolower($type[1]); // jpg, png, dll

        if (!in_array($type, ['jpg', 'jpeg', 'png'])) {
            return back()->withErrors(['image_base64' => 'Format gambar tidak didukung.']);
        }

        $imageData = base64_decode($imageData);
        if ($imageData === false) {
            return back()->withErrors(['image_base64' => 'Data gambar tidak valid.']);
        }
    } else {
        return back()->withErrors(['image_base64' => 'Format gambar tidak valid.']);
    }

    // Simpan file ke storage/public/galeri dengan nama unik
    $filename = 'galeri/' . uniqid() . '.' . $type;
    Storage::disk('public')->put($filename, $imageData);

    Galery::create([
        'judul' => $request->judul,
        'image_path' => $filename,
    ]);

    return redirect()->route('admin.galeri.index')->with('success', 'Foto berhasil ditambahkan ke galeri.');
}

    public function edit($id)
    {
        $galeri = Galery::findOrFail($id);
        return view('admin.formeditgaleri', compact('galeri'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
        ]);

        $galeri = Galery::findOrFail($id);
        $data = ['judul' => $request->judul];

        if ($request->hasFile('image_path')) {
            $path = $request->file('image_path')->store('galeri', 'public');
            $data['image_path'] = $path;
        }

        $galeri->update($data);

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $galeri = Galery::findOrFail($id);
        // hapus file gambar dari storage
        if (Storage::disk('public')->exists($galeri->image_path)) {
    Storage::disk('public')->delete($galeri->image_path);
}
        $galeri->delete();

        return redirect()->route('admin.galeri.index')->with('success', 'Foto berhasil dihapus dari galeri.');
    }
}

