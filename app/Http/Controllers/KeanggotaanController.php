<?php

namespace App\Http\Controllers;

use App\Models\Keanggotaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeanggotaanController extends Controller
{
    
    public function index()
    
    {
        $anggota = Keanggotaan::latest()->get();

    // Hitung jumlah masing-masing jenis anggota
         $jumlahAnggotaPenuh = Keanggotaan::where('keterangan', 'anggota_penuh')->count();
         $jumlahAnggotaMuda = Keanggotaan::where('keterangan', 'anggota_muda')->count();

        $anggota = Keanggotaan::latest()->get();
        if(Auth::check() && Auth::user()->username === 'fahdganteng'){
            return view('admin.adminkeanggotaan', compact('anggota'));
        }
        return view('keanggotaan', compact('anggota','jumlahAnggotaPenuh', 'jumlahAnggotaMuda'));
    }

    public function create()
    {
        return view('admin.keanggotaan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required|unique:keanggotaan,nim',
            'no_anggota' => 'required|unique:keanggotaan,no_anggota',
            'jurusan' => 'required',
            'status' => 'required',
            'keterangan' => 'required',
        ],[
        'nim.unique' => 'NIM sudah terdaftar.',
        'no_anggota.unique' => 'Nomor anggota sudah digunakan.',
        'nim.required' => 'NIM wajib diisi.',
        'no_anggota.required' => 'Nomor anggota wajib diisi.',
    ]);
        // dd($request->all());

        Keanggotaan::create($request->all());

        return redirect()->route('dataAnggota')->with('success', 'Anggota baru berhasil ditambahkan.');
    }

    public function dataAnggota(){

if (!auth()->check() || auth()->user()->username !== 'fahdganteng') {
        abort(404); // Tidak menampilkan apa-apa, langsung error 404
    }

        $dataAnggota = Keanggotaan::all();
        return view('admin.adminkeanggotaan',compact('dataAnggota'));
    }

    public function edit($id)
    {
        $anggota = Keanggotaan::findOrFail($id);
        return view('admin.formTambahAnggota', compact('anggota'));
    }

    public function update(Request $request, $id)
    {

        // dd($id);
        $request->validate([
            'nama' => 'required',
            'nim' => 'required|unique:keanggotaan,nim,' . $id,
            'no_anggota' => 'required|unique:keanggotaan,no_anggota,' . $id,
            'jurusan' => 'required',
            'status' => 'required',
            'keterangan' => 'required',
        ], [
        'nim.unique' => 'NIM sudah terdaftar.',
        'no_anggota.unique' => 'Nomor anggota sudah digunakan.',
    ]);

        $anggota = Keanggotaan::findOrFail($id);
        $anggota->update($request->all());

        return redirect()->route('dataAnggota')->with('success', 'Data anggota berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $anggota = Keanggotaan::findOrFail($id);
        $anggota->delete();

        return redirect()->route('dataAnggota')->with('success', 'Anggota berhasil dihapus.');
    }

    public function detailAnggotaMuda()
{
    $anggotaMuda = Keanggotaan::where('keterangan', 'anggota_muda')->get();
    return view('keanggotaan.detail_muda', compact('anggotaMuda'));
}

public function detailAnggotaPenuh()
{
    $anggotaPenuh = Keanggotaan::where('keterangan', 'anggota_penuh')->get();
$alumni = Keanggotaan::where('keterangan', 'alumni')->get();
return view('keanggotaan.detail_penuh', compact('anggotaPenuh', 'alumni'));

}




}
