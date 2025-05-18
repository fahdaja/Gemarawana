<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galery;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        'image_path' => 'required|string',
    ]);

    $base64Image = $request->input('image_path');

    // Extract base64 string tanpa prefix "data:image/jpeg;base64,"
    if (preg_match('/^data:image\/(\w+);base64,/', $base64Image, $type)) {
        $image = substr($base64Image, strpos($base64Image, ',') + 1);
        $image = str_replace(' ', '+', $image);
        $type = strtolower($type[1]); // jpg, png, dll

        if (!in_array($type, ['jpg', 'jpeg', 'png'])) {
            return back()->withErrors(['image_path' => 'Format gambar tidak didukung.']);
        }

         $imageName = 'galeri/' . Str::random(10) . '.' . $type;
       Storage::disk('public')->put($imageName, base64_decode($image));
} else {
    return back()->withErrors(['image_path' => 'Gambar tidak valid.']);
}

    Galery::create([
        'judul' => $request->judul,
        'image_path' => $imageName,
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

