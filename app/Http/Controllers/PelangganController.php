<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

use function Laravel\Prompts\confirm;

class PelangganController extends Controller
{
    public function index()
    {
        $profile = DB::table('profile')->get();

        $title = 'Peringatan !';
        $text = "Apakah anda yakin ingin menghapus ?";
        $icon = "Question";
        confirmDelete($title, $text);
        
        return view('pelanggan.indexpelanggan', compact('profile'));
    }

    public function tambahpelanggan()
    {
        return view('pelanggan.tambahpelanggan');
    }

    public function store(Request $request) // Mengubah nama method menjadi store sesuai dengan konvensi Laravel
    {
        $request->validate([
            'nama' => 'required',
            'nohp' => 'required',
            'alamat' => 'required',
        ]);

        DB::table('profile')->insert([
            'nama_lengkap' => $request->nama,
            'no_hp' => $request->nohp,
            'alamat' => $request->alamat,
        ]);
        
        Alert::success('Success', 'Data Berhasil Disimpan');
        return redirect('/pelanggan')->with('success', 'Data Berhasil Disimpan');
    }

    public function show($id)
    {
        $profile = DB::table('profile')->find($id);
        return view('pelanggan.detailpelanggan', compact('profile'));
    }

    public function edit($id) {
        $profile = DB::table('profile')->find($id);
        return view('pelanggan.editpelanggan', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
        'nama' => 'required',
        'nohp' => 'required|',
        'alamat' => 'required|',
        ]);

        $request = DB::table('profile')
            ->where('id', $id)
            ->update([ //kolom yang mau diambil
                'nama_lengkap' => $request->nama,
                'no_hp' => $request->nohp,
                'alamat' => $request->alamat,
            ]);
        Alert::success('Success', 'Data Berhasil di Update');
        return redirect('/pelanggan');
    }

    public function destroy($id) {
        $profile = DB::table('profile')->where('id', $id)->delete();
        Alert::success('Success', 'Data Berhasil di Hapus');
        return redirect('/pelanggan');
    }
}
