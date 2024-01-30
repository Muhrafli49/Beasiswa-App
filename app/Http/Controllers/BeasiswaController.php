<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beasiswa;

class beasiswaController extends Controller
{

    public function hasil()
    {
        $beasiswa = Beasiswa::all();
        return view('beasiswa.hasil', compact(['beasiswa']));
    }

    public function beasiswa()
    {
        return view('beasiswa.beasiswa');
    }

    public function store(Request $request)
    {
        // dd($request->except(['_token', 'submit']));
        $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
        ]);

        // Ambil data dari request kecuali _token dan submit
        $data = $request->except(['_token', 'submit']);

        // Set status ajuannya
        $data['status_ajuan'] = 'Belum di verifikasi';

        // Buat objek Beasiswa dan simpan data
        Beasiswa::create($data);

        // Redirect atau lakukan tindakan lain setelah penyimpanan
        return redirect('/hasil');
    }

    public function edit($id)
    {
        $beasiswa = Beasiswa::find($id);
        // dd($beasiswa);
        return view('beasiswa.edit', compact(['beasiswa']));
    }

    public function update($id, Request $request)
    {
        $beasiswa = Beasiswa::find($id);
        $beasiswa->update($request->except(['_token', 'submit']));
        return redirect('/hasil');
    }

    public function destroy($id)
    {
        $beasiswa = Beasiswa::find($id);
        $beasiswa->delete();
        return redirect('/hasil');
    }
}
