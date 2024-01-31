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
        // mendapatkan data beasiswa dengan id
        $beasiswa = Beasiswa::find($id);
        // dd($beasiswa);
        return view('beasiswa.edit', compact(['beasiswa']));
    }

    public function update($id, Request $request)
    {
        // mendapatkan data beasiswa dengan id
        $beasiswa = Beasiswa::find($id);
        // mengupdate dan mengecualikan _token, submit
        $beasiswa->update($request->except(['_token', 'submit']));
        // Redirect atau lakukan tindakan lain setelah penyimpanan
        return redirect('/hasil');
    }

    public function destroy($id)
    {
        // mendapatkan data beasiswa dengan id
        $beasiswa = Beasiswa::find($id);
        // menjalankan perintah delete
        $beasiswa->delete();
        // Redirect atau lakukan tindakan lain setelah penyimpanan
        return redirect('/hasil');
    }

    public function chart()
    {
        // Ambil data beasiswa dari database
        $beasiswa = Beasiswa::all();

        // Format data untuk grafik (misalnya, jumlah beasiswa per semester)
        $data = $beasiswa->groupBy('semester')->map->count();

        return view('beasiswa.chart', compact('data'));
    }

    public function getIpkByNama(Request $request)
    {
        $nama = $request->input('nama');

        // Lakukan query ke database untuk mendapatkan IPK berdasarkan nama
        $ipk = Beasiswa::where('nama', $nama)->value('ipk_terakhir');

        return response()->json(['ipk' => $ipk]);
    }
}
