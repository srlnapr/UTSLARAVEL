<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PelangganController extends Controller
{
    public function index()
    {
        $profile = DB::table('profile')->get();
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
}
