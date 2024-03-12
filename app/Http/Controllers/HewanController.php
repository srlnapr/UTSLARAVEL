<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
class HewanController extends Controller
{
    public function index()
    {
        $hewan = DB::table('hewan')->get(); // Mendapatkan semua data hewan dari tabel hewan
        
        return view('hewan.indexhewan', compact('hewan')); // Mengirimkan data hewan ke view
    }
    
    public function tambahHewan()
    {
        return view('hewan.tambahhewan');
    }
    
    public function simpanHewan(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'usia' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required',
        ]);
    
        DB::table('hewan')->insert([
            'Nama_Hewan' => $request->nama,
            'Jenis_Hewan' => $request->jenis,
            'Usia_Hewan' => $request->usia,
            'Harga_Hewan' => $request->harga,
            'Deskripsi_Hewan' => $request->deskripsi,
            'Stok' => $request->stok,
        ]);
        
        Alert::success('Success', 'Data Berhasil Disimpan');
        return redirect('/hewan')->with('success', 'Data Berhasil Disimpan');
    }
    
    public function show($id)
    {
        $hewan = DB::table('hewan')->where('ID_hewan', $id)->first();
        return view('hewan.detailhewan', compact('hewan'));
    }
    
    
    public function edit($id) {
        $hewan = DB::table('hewan')->where('ID_hewan', $id)->first();
        return view('hewan.edithewan', compact('hewan'));
    }
    
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'usia' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required',
        ]);
    
        DB::table('hewan')
            ->where('ID_hewan', $id)
            ->update([
                'Nama_Hewan' => $request->nama,
                'Jenis_Hewan' => $request->jenis,
                'Usia_Hewan' => $request->usia,
                'Harga_Hewan' => $request->harga,
                'Deskripsi_Hewan' => $request->deskripsi,
                'Stok' => $request->stok,
            ]);
        
        Alert::success('Success', 'Data Berhasil di Update');
        return redirect('/hewan');
    }
    
    public function destroy($id) {
        DB::table('hewan')->where('ID_hewan', $id)->delete();
        Alert::success('Success', 'Data Berhasil di Hapus');
        return redirect('/hewan');
    }
    }
